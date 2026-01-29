<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ApplicationForm;
use Illuminate\Support\Facades\Mail;
use App\Mail\ApplicationRejected;
use App\Models\User;

class CollegeCoordinatorController extends Controller
{
    public function index()
    {
    $applications = ApplicationForm::with('user')->where('status', 'Accepted by Department Coordinator')->get();
    return view('admin.college_coordinator.dashboard', compact('applications'));
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
        
        return view('admin.college_coordinator.application_view', [
            'application' => $application,
            'requirement' => $requirement,
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
        $application->status = 'Accepted by College Coordinator'; // Final stage
        $application->save();

        return back()->with('success', 'Application is now in the Final Admission List.');
    }

   public function reject(Request $request, $id)
{
    // ✅ Validate input
    $request->validate([
        'remarks' => 'required|string|max:1000',
    ]);

    // ✅ Find and update application
    $application = ApplicationForm::findOrFail($id);
    $application->status = 'Rejected by College Coordinator';
    $application->remarks = $request->remarks;
    $application->save();

    // ✅ Send email to the user
    $user = User::find($application->user_id);
    if ($user && $user->email) {
        Mail::to($user->email)->send(new ApplicationRejected($application));
    }

    return back()->with('error', 'Application has been rejected and the applicant has been notified.');
}
}
