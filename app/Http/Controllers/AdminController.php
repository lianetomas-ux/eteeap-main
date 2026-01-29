<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ApplicationForm;
use Illuminate\Support\Facades\Mail;
use App\Mail\ApplicationRejected;
use App\Mail\AdminComposeEmail;
use App\Models\User;
use App\Models\InterviewSchedule;
use App\Exports\ApplicationsExport;
use Maatwebsite\Excel\Facades\Excel;

class AdminController extends Controller
{
  

    public function edit($id)
{
    
    $user = User::findOrFail($id);

    
    return view('admin.users.edit', compact('user'));
}

public function update(Request $request, $id)
{
    $user = User::findOrFail($id);
    $validated = $request->validate([
        'first_name' => ['required','string','max:255'],
        'middle_name' => ['nullable','string','max:255'],
        'surname' => ['required','string','max:255'],
        'extension' => ['nullable','string','max:50'],
        'email' => ['required','email','max:255', \Illuminate\Validation\Rule::unique('users','email')->ignore($user->id)],
        'role' => ['required','integer','in:1,2,3,4,5'],
        'password' => ['nullable','string','min:8','confirmed'],
    ]);

    $user->first_name = $validated['first_name'];
    $user->middle_name = $validated['middle_name'] ?? null;
    $user->surname = $validated['surname'];
    $user->extension = $validated['extension'] ?? null;
    $user->email = $validated['email'];
    $user->role = $validated['role'];

    // Also update the name field (combined full name)
    $user->name = $this->buildFullName(
        $validated['first_name'],
        $validated['middle_name'] ?? null,
        $validated['surname'],
        $validated['extension'] ?? null
    );

    if (!empty($validated['password'])) {
        $user->password = \Illuminate\Support\Facades\Hash::make($validated['password']);
    }

    $user->save();

    $message = 'User updated successfully.';
    if (!empty($validated['password'])) {
        $message = 'User updated successfully. Password has been changed.';
    }

    return redirect()->route('admin.users.index')->with('success', $message);
}






    
public function index(Request $request)
{
   
    $roleFilter = $request->input('role', 'all'); 
    $search = $request->input('search', ''); 

   
    $query = User::query();

    if ($roleFilter != 'all') {
     
        $query->where('role', $this->getRoleByFilter($roleFilter));
    }

    if ($search) {
  
        $query->where(function ($query) use ($search) {
            $query->where('name', 'like', "%$search%")
                ->orWhere('email', 'like', "%$search%");
        });
    }

    
    $users = $query->get();

    return view('admin.users.index', compact('users', 'roleFilter', 'search'));
}


private function getRoleByFilter($roleFilter)
{
    $roles = [
        'admin' => 2,
        'assessor' => 3,
        'applicant' => 1,
    ];

    return $roles[$roleFilter] ?? null; 
}


public function users()
{
    $users = \App\Models\User::all(); 

    return view('admin.users.index', compact('users'));
}


public function applications()
{
    $applications = ApplicationForm::with('user')->get();

    $pendingApplications = $applications->where('status', 'Pending');

   
    $acceptedApplications = $applications->filter(function ($app) {
        return str_starts_with($app->status, 'Accepted by');
    });

    
    $rejectedApplications = $applications->filter(function ($app) {
        return str_starts_with($app->status, 'Rejected by');
    });

    return view('admin.applications', compact('pendingApplications', 'acceptedApplications', 'rejectedApplications'));
}



    public function view($id)
    {
        $application = ApplicationForm::findOrFail($id);
        $requirement = \App\Models\Requirement::where('user_id', $application->user_id)->first();
        
        // Safe Decode Helper
        $safeDecode = function($data) {
            if (is_array($data)) return $data;
            if (is_string($data)) {
                $decoded = json_decode($data, true);
                return is_array($decoded) ? $decoded : []; 
            }
            return [];
        };
        
        return view('admin.application_view', [
            'application' => $application,
            'requirement' => $requirement,
            // Decode JSON fields for proper display
            'degree_programs' => $safeDecode($application->degree_program),
            'school_addresses' => $safeDecode($application->school_address),
            'inclusive_dates' => $safeDecode($application->inclusive_dates),
            'training_programs' => $safeDecode($application->training_program),
            'certificate_obtained' => $safeDecode($application->certificate_obtained),
            'dates_attendance' => $safeDecode($application->dates_attendance),
            'certification_examination' => $safeDecode($application->certification_examination),
            'certifying_agency' => $safeDecode($application->certifying_agency),
            'date_certified' => $safeDecode($application->date_certified),
            'rating' => $safeDecode($application->rating),
            'position_designation' => $safeDecode($application->position_designation),
            'dates_of_employment' => $safeDecode($application->dates_of_employment),
            'address_of_company' => $safeDecode($application->address_of_company),
            'status_of_employment' => $safeDecode($application->status_of_employment),
            'designation_of_immediate' => $safeDecode($application->designation_of_immediate),
            'reasons_for_moving' => $safeDecode($application->reasons_for_moving),
            'responsibilities_in_position' => $safeDecode($application->responsibilities_in_position),
            'case_of_self_employment' => $safeDecode($application->case_of_self_employment),
            'awards_conferred' => $safeDecode($application->awards_conferred),
            'conferring_organizations' => $safeDecode($application->conferring_organizations),
            'date_awarded' => $safeDecode($application->date_awarded),
            'community_awards_conferred' => $safeDecode($application->community_awards_conferred),
            'community_conferring_organizations' => $safeDecode($application->community_conferring_organizations),
            'community_date_awarded' => $safeDecode($application->community_date_awarded),
            'work_awards_conferred' => $safeDecode($application->work_awards_conferred),
            'work_community_conferring_organizations' => $safeDecode($application->work_community_conferring_organizations),
            'work_community_date_awarded' => $safeDecode($application->work_community_date_awarded),
        ]);
    }

    public function accept($id)
    {
        $application = ApplicationForm::findOrFail($id);
        $application->status = 'Accepted by Admin';
        $application->save();

        return back()->with('success', 'Application has been accepted and forwarded to the Assessor.');
    }

   public function reject(Request $request, $id)
{
    
    // ✅ Validate remarks input
    $request->validate([
        'remarks' => 'required|string|max:1000',
    ]);

    // ✅ Find the application and user
    $application = ApplicationForm::findOrFail($id);
    $user = $application->user;

    if (!$user || !$user->email) {
        return back()->with('error', 'Applicant email not found.');
    }

    // ✅ Update status and remarks
    $application->status = 'Rejected by Admin';
    $application->remarks = $request->remarks;
    $application->save();

    // ✅ Send rejection email with remarks
    Mail::to($user->email)->send(new ApplicationRejected($application));

    return back()->with('success', 'Application has been rejected and the applicant has been notified.');
}

    public function unreject($id)
{
    $application = ApplicationForm::findOrFail($id);
    $application->status = 'Pending'; 
    $application->save();

    return back()->with('success', 'Application has been moved back to Pending.');
}
public function reschedule($id)
{
    $schedule = InterviewSchedule::findOrFail($id);
    return view('admin.accepted_applicants.reschedule', compact('schedule'));
}
public function adminHome()
{
    return view('admin.adminhome');  
}

public function exportExcel()
{
    return Excel::download(new ApplicationsExport, 'applications.xlsx');
}

public function exportAll()
{
    return Excel::download(new ApplicationsExport(), 'all_applications.xlsx');
}

public function exportPending()
{
    return Excel::download(new ApplicationsExport('pending'), 'pending_applications.xlsx');
}

public function exportAccepted()
{
    return Excel::download(new ApplicationsExport('accepted'), 'accepted_applications.xlsx');
}

public function exportRejected()
{
    return Excel::download(new ApplicationsExport('rejected'), 'rejected_applications.xlsx');
}

/**
 * Mark application as reviewed after user made changes
 */
public function markReviewed($id)
{
    $application = ApplicationForm::findOrFail($id);
    
    // Clear the review flag
    $application->needs_review = false;
    
    // Optionally keep the changes_log for history, or clear it:
    // $application->changes_log = null;
    
    $application->save();
    
    return back()->with('success', 'Application changes have been reviewed.');
}

/**
 * Send a composed email to a user
 */
public function composeEmail(Request $request)
{
    $request->validate([
        'recipient_email' => 'required|email',
        'recipient_name' => 'nullable|string|max:255',
        'email_subject' => 'required|string|max:255',
        'email_body' => 'required|string|max:5000',
    ]);

    try {
        Mail::to($request->recipient_email)
            ->send(new AdminComposeEmail(
                $request->email_subject,
                $request->email_body,
                $request->recipient_name
            ));

        return back()->with('success', 'Email sent successfully to ' . $request->recipient_email);
    } catch (\Exception $e) {
        return back()->with('error', 'Failed to send email: ' . $e->getMessage());
    }
}

/**
 * Get users list for email compose (AJAX)
 */
public function getUsersForEmail(Request $request)
{
    $search = $request->get('search', '');
    
    $users = User::where('role', 1) // Applicants only
        ->where(function($query) use ($search) {
            $query->where('email', 'like', "%{$search}%")
                  ->orWhere('first_name', 'like', "%{$search}%")
                  ->orWhere('surname', 'like', "%{$search}%");
        })
        ->select('id', 'email', 'first_name', 'middle_name', 'surname')
        ->limit(20)
        ->get()
        ->map(function($user) {
            return [
                'id' => $user->id,
                'email' => $user->email,
                'name' => trim($user->first_name . ' ' . ($user->middle_name ?? '') . ' ' . $user->surname),
            ];
        });
    
    return response()->json($users);
}

/**
 * Build full name from parts.
 */
private function buildFullName($firstName, $middleName, $surname, $extension)
{
    $nameParts = [$firstName];
    
    if ($middleName) {
        $nameParts[] = $middleName;
    }
    
    $nameParts[] = $surname;
    
    if ($extension) {
        $nameParts[] = $extension;
    }
    
    return implode(' ', $nameParts);
}
   
}
