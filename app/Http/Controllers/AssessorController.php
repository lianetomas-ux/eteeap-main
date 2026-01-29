<?php

namespace App\Http\Controllers;

use App\Models\ApplicationForm;
use Illuminate\Http\Request;
use App\Exports\ApplicationsExport;
use Maatwebsite\Excel\Facades\Excel;

class AssessorController extends Controller
{
    /**
     * Display the assessor dashboard with summary stats
     */
    public function index()
    {
        $applications = ApplicationForm::with('user')->get();

        // Pending applications - new submissions
        $pendingApplications = $applications->where('status', 'Pending');

        // Applications forwarded by Admin
        $fromAdminApplications = $applications->where('status', 'Accepted by Admin');

        // Applications accepted by Assessor / Ready for Interview (for tracking)
        $acceptedApplications = $applications->filter(function ($app) {
            return $app->status === 'Ready for Interview' ||
                   str_starts_with($app->status, 'Accepted by Assessor') ||
                   str_starts_with($app->status, 'Accepted by Department') ||
                   str_starts_with($app->status, 'Accepted by College');
        });

        // Applications rejected by Assessor, Department Coordinator, or College Coordinator
        $rejectedApplications = $applications->filter(function ($app) {
            return str_starts_with($app->status, 'Rejected by');
        });

        return view('admin.assessor.dashboard', compact(
            'applications',
            'pendingApplications',
            'fromAdminApplications',
            'acceptedApplications',
            'rejectedApplications'
        ));
    }

    /**
     * Display the applications management page with tabs
     */
    public function applications()
    {
        $applications = ApplicationForm::with('user')->get();

        // Pending applications - new submissions
        $pendingApplications = $applications->where('status', 'Pending');

        // Applications forwarded by Admin (needs assessor review)
        $fromAdminApplications = $applications->where('status', 'Accepted by Admin');

        // Applications accepted by Assessor / Ready for Interview
        $acceptedApplications = $applications->filter(function ($app) {
            return $app->status === 'Ready for Interview' ||
                   str_starts_with($app->status, 'Accepted by Assessor') ||
                   str_starts_with($app->status, 'Accepted by Department') ||
                   str_starts_with($app->status, 'Accepted by College');
        });

        // Applications rejected by Assessor, Department Coordinator, or College Coordinator
        $rejectedApplications = $applications->filter(function ($app) {
            return str_starts_with($app->status, 'Rejected by');
        });

        return view('admin.assessor.applications', compact(
            'pendingApplications',
            'fromAdminApplications',
            'acceptedApplications',
            'rejectedApplications'
        ));
    }

    /**
     * View a single application
     */
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
        
        return view('admin.assessor.application_view', [
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

    /**
     * Accept an application
     * Flow: Assessor accepts -> Ready for Interview -> Final Admission List
     */
    public function accept($id)
    {
        $application = ApplicationForm::findOrFail($id);
        $application->status = 'Ready for Interview';
        $application->save();

        return back()->with('success', 'Application has been accepted and is now ready for interview.');
    }

    /**
     * Reject an application
     */
    public function reject(Request $request, $id)
    {
        $request->validate([
            'remarks' => 'required|string|max:1000',
        ]);

        $application = ApplicationForm::findOrFail($id);
        $application->status = 'Rejected by Assessor';
        $application->remarks = $request->remarks;
        $application->save();

        return back()->with('success', 'Application has been rejected.');
    }

    /**
     * Unreject an application - return to Pending status
     */
    public function unreject($id)
    {
        $application = ApplicationForm::findOrFail($id);
        $application->status = 'Pending';
        $application->remarks = null;
        $application->save();

        return back()->with('success', 'Application has been unrejected and returned to Pending status.');
    }

    /**
     * Export all applications
     */
    public function exportAll()
    {
        return Excel::download(new ApplicationsExport(), 'all_applications.xlsx');
    }

    /**
     * Export pending applications
     */
    public function exportPending()
    {
        return Excel::download(new ApplicationsExport('pending'), 'pending_applications.xlsx');
    }


    /**
     * Export accepted applications
     */
    public function exportAccepted()
    {
        return Excel::download(new ApplicationsExport('accepted'), 'accepted_applications.xlsx');
    }

    /**
     * Export rejected applications
     */
    public function exportRejected()
    {
        return Excel::download(new ApplicationsExport('rejected'), 'rejected_applications.xlsx');
    }
}