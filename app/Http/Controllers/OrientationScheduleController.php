<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrientationSchedule;
use App\Models\ApplicationForm;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrientationScheduled;
use Illuminate\Support\Carbon;
use App\Models\User;
use Illuminate\Support\Facades\Log;

class OrientationScheduleController extends Controller
{
    /**
     * Display a listing of orientation schedules.
     */
    public function index()
    {
        $schedules = OrientationSchedule::with('applicant')->get();
        return view('admin.orientation.index', compact('schedules'));
    }

    /**
     * Show the form for creating a new orientation schedule.
     */
    public function create(Request $request)
    {
        $applicantIds = $request->input('applicant_ids', []);

        if (empty($applicantIds)) {
            return redirect()->route('admin.accepted.applicants')->with('error', 'Please select at least one applicant before scheduling orientation.');
        }

        $applicants = ApplicationForm::whereIn('id', $applicantIds)->get();
        return view('admin.accepted_applicants.orientation_schedule', compact('applicants', 'applicantIds'));
    }

    /**
     * Store a newly created orientation schedule.
     */
    public function store(Request $request)
    {
        $request->validate([
            'applicant_ids' => 'required|array',
            'applicant_ids.*' => 'exists:application_forms,id',
            'orientation_platform' => 'required|string',
            'meeting_link' => 'required|url',
            'meeting_id' => 'nullable|string',
            'meeting_password' => 'nullable|string',
            'notes' => 'nullable|string',
            'schedule.date_time' => 'required|string',
        ]);

        [$selectedDate, $selectedTime] = explode('|', $request->input('schedule.date_time'));

        foreach ($request->input('applicant_ids') as $applicantId) {
            $applicant = ApplicationForm::find($applicantId);
            $user = User::find($applicant->user_id);

            if (!$user || empty($user->email)) {
                return redirect()->back()->with('error', "Applicant {$applicant->full_name} is missing an email address.");
            }

            // Check if applicant already has an orientation scheduled
            $existingSchedule = OrientationSchedule::where('applicant_id', $applicantId)->first();
            if ($existingSchedule) {
                return redirect()->back()->with('error', "Applicant {$applicant->full_name} already has a scheduled orientation.");
            }

            OrientationSchedule::create([
                'applicant_id' => $applicantId,
                'orientation_date' => $selectedDate,
                'orientation_time' => $selectedTime,
                'orientation_platform' => $request->input('orientation_platform'),
                'meeting_link' => $request->input('meeting_link'),
                'meeting_id' => $request->input('meeting_id'),
                'meeting_password' => $request->input('meeting_password'),
                'notes' => $request->input('notes'),
            ]);

            try {
                Mail::to($user->email)->send(new OrientationScheduled($applicant, [
                    'date' => $selectedDate,
                    'time' => $selectedTime,
                    'platform' => $request->input('orientation_platform'),
                    'meeting_link' => $request->input('meeting_link'),
                    'meeting_id' => $request->input('meeting_id'),
                    'meeting_password' => $request->input('meeting_password'),
                    'notes' => $request->input('notes'),
                ]));
            } catch (\Exception $e) {
                Log::error("Failed to send orientation email: " . $e->getMessage());
            }
        }

        return redirect()->route('admin.accepted.applicants')->with('success', 'Virtual orientation scheduled successfully, and invitation emails sent!');
    }

    /**
     * Show the reschedule form for orientation.
     */
    public function showRescheduleForm($id)
    {
        $schedule = OrientationSchedule::find($id);

        if (!$schedule) {
            return redirect()->back()->with('error', 'Orientation schedule not found.');
        }

        $applicant = ApplicationForm::find($schedule->applicant_id);

        if (!$applicant) {
            return redirect()->back()->with('error', 'Applicant not found.');
        }

        $today = Carbon::now();
        $startOfWeek = $today->startOfWeek();
        $weekDates = [];
        for ($i = 0; $i < 5; $i++) {
            $weekDates[$i] = $startOfWeek->copy()->addDays($i);
        }

        return view('admin.accepted_applicants.orientation_reschedule', [
            'schedule' => $schedule,
            'applicants' => [$applicant],
            'weekDates' => $weekDates
        ]);
    }

    /**
     * Update the rescheduled orientation.
     */
    public function updateReschedule(Request $request, $id)
    {
        Log::info('🔄 Rescheduling orientation for schedule ID: ' . $id);

        $request->validate([
            'orientation_platform' => 'required|string',
            'meeting_link' => 'required|url',
            'meeting_id' => 'nullable|string',
            'meeting_password' => 'nullable|string',
            'notes' => 'nullable|string',
            'schedule.date_time' => 'required|string',
        ]);

        $schedule = OrientationSchedule::findOrFail($id);
        $applicant = ApplicationForm::find($schedule->applicant_id);

        if (!$applicant) {
            Log::error('❌ Applicant not found for schedule ID: ' . $id);
            return back()->with('error', 'Applicant not found.');
        }

        if (!$applicant->user) {
            Log::error('❌ User not found for applicant ID: ' . $applicant->id);
            return back()->with('error', 'User not found.');
        }

        Log::info('✅ Found applicant: ' . $applicant->first_name . ' ' . $applicant->last_name);
        Log::info('📧 Sending reschedule email to: ' . $applicant->user->email);

        $schedule->update([
            'orientation_platform' => $request->input('orientation_platform'),
            'meeting_link' => $request->input('meeting_link'),
            'meeting_id' => $request->input('meeting_id'),
            'meeting_password' => $request->input('meeting_password'),
            'notes' => $request->input('notes'),
            'orientation_date' => explode('|', $request->input('schedule.date_time'))[0],
            'orientation_time' => explode('|', $request->input('schedule.date_time'))[1],
        ]);

        try {
            Mail::to($applicant->user->email)->send(new OrientationScheduled($applicant, [
                'date' => $schedule->orientation_date,
                'time' => $schedule->orientation_time,
                'platform' => $schedule->orientation_platform,
                'meeting_link' => $schedule->meeting_link,
                'meeting_id' => $schedule->meeting_id,
                'meeting_password' => $schedule->meeting_password,
                'notes' => $schedule->notes,
            ]));
            Log::info('✅ Reschedule email sent successfully!');
            return redirect()->route('admin.accepted.applicants')->with('success', 'Orientation rescheduled and email sent.');
        } catch (\Exception $e) {
            Log::error('❌ Failed to send reschedule email: ' . $e->getMessage());
            return back()->with('error', 'Failed to send reschedule email.');
        }
    }
}
