<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ApplicationForm;
use App\Models\Requirement;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ApplicationController extends Controller
{
    public function index()
    {
        $applications = ApplicationForm::with('user')
            ->where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->get();

        return view('user.index', compact('applications'));
    }

    public function create()
    {
        $user = auth()->user();
        return view('forms.information', compact('user'));
    }

    public function store(Request $request)
    {
        $user = auth()->user();

        if ($user->submission_count >= 2) {
            session()->flash('submission_limit_reached', true);
            return redirect()->back(); 
        }

        // 1. VALIDATION
        $request->validate([
            // Personal Info
            'first_name' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'last_name' => 'required|string|max:255',
            'contact_number' => 'required|string|max:20',
            'house_no' => 'required|string|max:255',
            'street' => 'required|string|max:255',
            'barangay' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'province' => 'required|string|max:255',
            'region' => 'nullable|string|max:255',
            'zipcode' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'birthdate' => 'required|date',
            'birthplace' => 'required|string|max:255',
            'civil_status' => 'required|string',
            'sex' => 'required|string',
            'language' => 'required|string|max:100',
            
            // Degree & Goals
            'degree_program_field' => 'required|string|max:255',
            'first_priority' => 'nullable|string|max:255',
            'second_priority' => 'nullable|string|max:255',
            'third_priority' => 'nullable|string|max:255',
            'goals_objectives' => 'required|string',
            'learning_activities' => 'required|string',
            'overseas_applicants' => 'required|string',
            'equivalency_accreditation' => 'required',

            // Education (Arrays)
            'degree_program' => 'required|array',
            'school_address' => 'required|array', 
            'inclusive_dates' => 'required|array',

            // Work Experience (Arrays)
            'position_designation' => 'required|array',
            'dates_of_employment' => 'required|array',
            'address_of_company' => 'required|array',
            'status_of_employment' => 'required|array',
            'designation_of_immediate' => 'required|array',
            'reasons_for_moving' => 'required|array',
            'responsibilities_in_position' => 'required|array',

            // Files (Arrays - 5MB Max)
            'profile_image' => 'required|image|max:5120',
            'original_school_credentials' => 'required|array',
            'certificate_of_employment' => 'required|array',
            'nbi_barangay_clearance' => 'nullable|array',
            'recommendation_letter' => 'nullable|array',
            'proficiency_certificate' => 'nullable|array',
            
            // Declaration
            'declaration_place' => 'required|string',
            'declaration_day' => 'required|string',
            'declaration_month_year' => 'required|string',
            'printed_name' => 'required|string',
            'community_tax_certificate' => 'required|string',
            'issued_on' => 'required|date',
            'issued_at' => 'required|string',
        ]); 

        // 2. Handle Profile Image
        $profilePath = null;
        if($request->hasFile('profile_image')){
            $file = $request->file('profile_image');
            $filename = time().'_profile.'.$file->getClientOriginalExtension();
            $file->storeAs('public/profile_images', $filename); 
            $profilePath = 'storage/profile_images/' . $filename;
        }

        // 3. Create Application Record
        ApplicationForm::create([
            'user_id' => auth()->id(),
            // Map inputs...
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name,
            'last_name' => $request->last_name,
            'contact_number' => $request->contact_number,
            'house_no' => $request->house_no,
            'street' => $request->street,
            'barangay' => $request->barangay,
            'city' => $request->city,
            'province' => $request->province,
            'region' => $request->region,
            'zipcode' => $request->zipcode,
            'country' => $request->country,
            'birthdate' => $request->birthdate,
            'birthplace' => $request->birthplace,
            'civil_status' => $request->civil_status,
            'sex' => $request->sex,
            'language' => $request->language,
            'degree_program_field' => $request->degree_program_field,
            'first_priority' => $request->first_priority,
            'second_priority' => $request->second_priority,
            'third_priority' => $request->third_priority,
            'goals_objectives' => $request->goals_objectives,
            'learning_activities' => $request->learning_activities,
            'overseas_applicants' => $request->overseas_applicants,
            'equivalency_accreditation' => $request->equivalency_accreditation,
            
            // Encode Arrays to JSON
            'degree_program' => json_encode($request->degree_program),
            'school_address' => json_encode($request->school_address),
            'inclusive_dates' => json_encode($request->inclusive_dates),
            'training_program' => json_encode($request->training_program ?? []),
            'certificate_obtained' => json_encode($request->certificate_obtained ?? []),
            'dates_attendance' => json_encode($request->dates_attendance ?? []),
            'certification_examination' => json_encode($request->certification_examination ?? []),
            'certifying_agency' => json_encode($request->certifying_agency ?? []),
            'date_certified' => json_encode($request->date_certified ?? []),
            'rating' => json_encode($request->rating ?? []),
            'position_designation' => json_encode($request->position_designation),
            'dates_of_employment' => json_encode($request->dates_of_employment),
            'address_of_company' => json_encode($request->address_of_company),
            'status_of_employment' => json_encode($request->status_of_employment),
            'designation_of_immediate' => json_encode($request->designation_of_immediate),
            'reasons_for_moving' => json_encode($request->reasons_for_moving),
            'responsibilities_in_position' => json_encode($request->responsibilities_in_position),
            'case_of_self_employment' => json_encode($request->case_of_self_employment ?? []),
            'awards_conferred' => json_encode($request->awards_conferred ?? []),
            'conferring_organizations' => json_encode($request->conferring_organizations ?? []),
            'date_awarded' => json_encode($request->date_awarded ?? []),
            'community_awards_conferred' => json_encode($request->community_awards_conferred ?? []),
            'community_conferring_organizations' => json_encode($request->community_conferring_organizations ?? []),
            'community_date_awarded' => json_encode($request->community_date_awarded ?? []),
            'work_awards_conferred' => json_encode($request->work_awards_conferred ?? []),
            'work_community_conferring_organizations' => json_encode($request->work_community_conferring_organizations ?? []),
            'work_community_date_awarded' => json_encode($request->work_community_date_awarded ?? []),

            'accomplishment_description' => $request->accomplishment_description,
            'date_accomplished' => $request->date_accomplished,
            'address_of_publishing' => $request->address_of_publishing,
            'leisure_activities' => $request->leisure_activities,
            'special_skills' => $request->special_skills,
            'work_related_activities' => $request->work_related_activities,
            'volunteer_activities' => $request->volunteer_activities,
            'travels_cite_places' => $request->travels_cite_places,
            'essay_of_degree' => $request->essay_of_degree,
            'declaration_place' => $request->declaration_place,
            'declaration_day' => $request->declaration_day,
            'declaration_month_year' => $request->declaration_month_year,
            'printed_name' => $request->printed_name,
            'community_tax_certificate' => $request->community_tax_certificate,
            'issued_on' => $request->issued_on,
            'issued_at' => $request->issued_at,
            'profile_image' => $profilePath,
        ]);

        $user->increment('submission_count');

        // 4. Handle Requirements (Multiple Files Loop)
        $requirementFields = [
            'original_school_credentials',
            'certificate_of_employment',
            'nbi_barangay_clearance',
            'recommendation_letter',
            'proficiency_certificate'
        ];

        $requirement = Requirement::firstOrNew(['user_id' => $user->id]);

        foreach ($requirementFields as $field) {
            if ($request->hasFile($field)) {
                $filePaths = [];
                // Loop through file array
                foreach($request->file($field) as $key => $file) {
                    $filename = $user->id . '_' . $field . '_' . $key . '_' . time() . '.' . $file->getClientOriginalExtension();
                    
                    // SAVE TO STORAGE
                    $file->storeAs('public/requirements', $filename);
                    
                    // SAVE PUBLIC PATH (THIS IS WHAT ASSET() NEEDS)
                    $filePaths[] = 'storage/requirements/' . $filename; 
                }
                // Save array as JSON
                $requirement->$field = json_encode($filePaths);
            }
        }
        $requirement->save();

        session()->flash('submission_success', true);
        return redirect()->route('user.index')->with('success', 'Application submitted successfully!');
    }

    // --- VIEW METHOD (Decodes Data) ---
    public function view($id)
    {
        $application = ApplicationForm::with('user')->findOrFail($id);
        $requirement = Requirement::where('user_id', $application->user_id)->first();
    
        // Safe Decode Helper
        $safeDecode = function($data) {
            if (is_array($data)) return $data;
            if (is_string($data)) {
                $decoded = json_decode($data, true);
                return is_array($decoded) ? $decoded : []; 
            }
            return [];
        };
        
        return view('application.view', [
            'application' => $application,
            'requirement' => $requirement,
            // Decode your JSON fields here
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

    public function show($id) { return $this->view($id); }

    // --- EDIT METHOD ---
    public function edit($id)
    {
        $application = ApplicationForm::with('user')->findOrFail($id);
        
        // Check if user owns this application
        if ($application->user_id !== Auth::id()) {
            return redirect()->route('user.index')->with('error', 'Unauthorized action.');
        }
        
        $requirement = Requirement::where('user_id', $application->user_id)->first();
        
        // Safe Decode Helper
        $safeDecode = function($data) {
            if (is_array($data)) return $data;
            if (is_string($data)) {
                $decoded = json_decode($data, true);
                return is_array($decoded) ? $decoded : [];
            }
            return [];
        };
        
        return view('application.edit', [
            'application' => $application,
            'requirement' => $requirement,
            'degree_programs' => $safeDecode($application->degree_program),
            'school_addresses' => $safeDecode($application->school_address),
            'inclusive_dates' => $safeDecode($application->inclusive_dates),
            'training_program' => $safeDecode($application->training_program),
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

    // --- UPDATE METHOD ---
    public function update(Request $request, $id)
    {
        $application = ApplicationForm::findOrFail($id);
        
        // Check if user owns this application
        if ($application->user_id !== Auth::id()) {
            return redirect()->route('user.index')->with('error', 'Unauthorized action.');
        }
        
        // Validation (make files nullable for update)
        // Note: first_name, middle_name, last_name are excluded from validation
        // because they are read-only in the edit form and cannot be changed
        $request->validate([
            'contact_number' => 'required|string|max:20',
            'house_no' => 'required|string|max:255',
            'street' => 'required|string|max:255',
            'barangay' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'province' => 'required|string|max:255',
            'region' => 'nullable|string|max:255',
            'zipcode' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'birthdate' => 'required|date',
            'birthplace' => 'required|string|max:255',
            'civil_status' => 'required|string',
            'sex' => 'required|string',
            'language' => 'required|string|max:100',
            'degree_program_field' => 'required|string|max:255',
            'first_priority' => 'nullable|string|max:255',
            'second_priority' => 'nullable|string|max:255',
            'third_priority' => 'nullable|string|max:255',
            'goals_objectives' => 'required|string',
            'learning_activities' => 'required|string',
            'overseas_applicants' => 'required|string',
            'equivalency_accreditation' => 'required',
            'degree_program' => 'required|array',
            'school_address' => 'required|array',
            'inclusive_dates' => 'required|array',
            'position_designation' => 'nullable|string',
            'dates_of_employment' => 'nullable|string',
            'address_of_company' => 'nullable|string',
            'status_of_employment' => 'nullable|string',
            'designation_of_immediate' => 'nullable|string',
            'reasons_for_moving' => 'nullable|string',
            'responsibilities_in_position' => 'nullable|string',
            'case_of_self_employment' => 'nullable|string',
            'profile_image' => 'nullable|image|max:5120',
            'declaration_place' => 'required|string',
            'declaration_day' => 'required|string',
            'declaration_month_year' => 'required|string',
            'printed_name' => 'required|string',
            'community_tax_certificate' => 'required|string',
            'issued_on' => 'required|date',
            'issued_at' => 'required|string',
        ]);
        
        // Handle Profile Image update
        if ($request->hasFile('profile_image')) {
            $file = $request->file('profile_image');
            $filename = time() . '_profile.' . $file->getClientOriginalExtension();
            $file->storeAs('public/profile_images', $filename);
            $application->profile_image = 'storage/profile_images/' . $filename;
        }
        
        // Track changes before updating
        // Note: Name fields are NOT tracked as they cannot be changed
        $trackedFields = [
            'contact_number',
            'house_no', 'street', 'barangay', 'city', 'province', 'region', 'zipcode', 'country',
            'birthdate', 'birthplace', 'civil_status', 'sex', 'language',
            'degree_program_field', 'first_priority', 'second_priority', 'third_priority',
            'goals_objectives', 'learning_activities', 'overseas_applicants', 'equivalency_accreditation',
            'position_designation', 'dates_of_employment', 'address_of_company', 
            'status_of_employment', 'designation_of_immediate', 'reasons_for_moving',
            'responsibilities_in_position', 'case_of_self_employment',
            'accomplishment_description', 'date_accomplished', 'address_of_publishing',
            'leisure_activities', 'special_skills', 'work_related_activities',
            'volunteer_activities', 'travels_cite_places', 'essay_of_degree',
            'declaration_place', 'declaration_day', 'declaration_month_year',
            'printed_name', 'community_tax_certificate', 'issued_on', 'issued_at'
        ];
        
        $changes = [];
        $fieldLabels = [
            'contact_number' => 'Contact Number',
            'house_no' => 'House No.',
            'street' => 'Street',
            'barangay' => 'Barangay',
            'city' => 'City',
            'province' => 'Province',
            'region' => 'Region',
            'zipcode' => 'Zipcode',
            'country' => 'Country',
            'birthdate' => 'Birthdate',
            'birthplace' => 'Birthplace',
            'civil_status' => 'Civil Status',
            'sex' => 'Sex',
            'language' => 'Language',
            'degree_program_field' => 'Degree Program Field',
            'first_priority' => 'First Priority',
            'second_priority' => 'Second Priority',
            'third_priority' => 'Third Priority',
            'goals_objectives' => 'Goals & Objectives',
            'learning_activities' => 'Learning Activities',
            'overseas_applicants' => 'Overseas Applicants',
            'equivalency_accreditation' => 'Equivalency Accreditation',
            'position_designation' => 'Position/Designation',
            'dates_of_employment' => 'Dates of Employment',
            'address_of_company' => 'Address of Company',
            'status_of_employment' => 'Status of Employment',
            'designation_of_immediate' => 'Designation of Immediate Supervisor',
            'reasons_for_moving' => 'Reasons for Moving',
            'responsibilities_in_position' => 'Responsibilities in Position',
            'case_of_self_employment' => 'Self Employment References',
            'accomplishment_description' => 'Accomplishment Description',
            'date_accomplished' => 'Date Accomplished',
            'address_of_publishing' => 'Address of Publishing',
            'leisure_activities' => 'Leisure Activities',
            'special_skills' => 'Special Skills',
            'work_related_activities' => 'Work Related Activities',
            'volunteer_activities' => 'Volunteer Activities',
            'travels_cite_places' => 'Travels - Places Visited',
            'essay_of_degree' => 'Essay of Degree',
            'declaration_place' => 'Declaration Place',
            'declaration_day' => 'Declaration Day',
            'declaration_month_year' => 'Declaration Month/Year',
            'printed_name' => 'Printed Name',
            'community_tax_certificate' => 'Community Tax Certificate',
            'issued_on' => 'Issued On',
            'issued_at' => 'Issued At',
        ];
        
        foreach ($trackedFields as $field) {
            $oldValue = $application->$field;
            $newValue = $request->$field;
            
            // Normalize for comparison (handle JSON/array fields)
            $normalizedOld = is_array($oldValue) ? json_encode($oldValue) : (string)$oldValue;
            $normalizedNew = is_array($newValue) ? json_encode($newValue) : (string)$newValue;
            
            if ($normalizedOld !== $normalizedNew) {
                $changes[] = [
                    'field' => $field,
                    'label' => $fieldLabels[$field] ?? ucfirst(str_replace('_', ' ', $field)),
                    'old_value' => $oldValue,
                    'new_value' => $newValue,
                    'changed_at' => now()->toDateTimeString(),
                ];
            }
        }
        
        // Check array fields for changes (education section)
        $arrayFields = ['degree_program', 'school_address', 'inclusive_dates'];
        $arrayLabels = [
            'degree_program' => 'Degree Program',
            'school_address' => 'School Address',
            'inclusive_dates' => 'Inclusive Dates',
        ];
        
        foreach ($arrayFields as $field) {
            $oldValue = $application->$field;
            $newValue = $request->$field;
            
            $normalizedOld = is_array($oldValue) ? $oldValue : json_decode($oldValue, true);
            $normalizedNew = is_array($newValue) ? $newValue : (array)$newValue;
            
            if (json_encode($normalizedOld) !== json_encode($normalizedNew)) {
                $changes[] = [
                    'field' => $field,
                    'label' => $arrayLabels[$field] ?? ucfirst(str_replace('_', ' ', $field)),
                    'old_value' => $normalizedOld,
                    'new_value' => $normalizedNew,
                    'changed_at' => now()->toDateTimeString(),
                ];
            }
        }
        
        // Update application fields
        // Note: first_name, middle_name, last_name are NOT updated to prevent fraud
        // Name must remain the same as when the account was registered
        $application->fill([
            'contact_number' => $request->contact_number,
            'house_no' => $request->house_no ?? '',
            'street' => $request->street ?? '',
            'barangay' => $request->barangay ?? '',
            'city' => $request->city ?? '',
            'province' => $request->province ?? '',
            'region' => $request->region ?? '',
            'zipcode' => $request->zipcode ?? '',
            'country' => $request->country ?? '',
            'birthdate' => $request->birthdate,
            'birthplace' => $request->birthplace ?? '',
            'civil_status' => $request->civil_status ?? '',
            'sex' => $request->sex ?? '',
            'language' => $request->language ?? '',
            'degree_program_field' => $request->degree_program_field ?? '',
            'first_priority' => $request->first_priority ?? '',
            'second_priority' => $request->second_priority ?? '',
            'third_priority' => $request->third_priority ?? '',
            'goals_objectives' => $request->goals_objectives ?? '',
            'learning_activities' => $request->learning_activities ?? '',
            'overseas_applicants' => $request->overseas_applicants ?? '',
            'equivalency_accreditation' => $request->equivalency_accreditation ?? '',
            'degree_program' => json_encode($request->degree_program ?? []),
            'school_address' => json_encode($request->school_address ?? []),
            'inclusive_dates' => json_encode($request->inclusive_dates ?? []),
            'training_program' => json_encode($request->training_program ?? []),
            'certificate_obtained' => json_encode($request->certificate_obtained ?? []),
            'dates_attendance' => json_encode($request->dates_attendance ?? []),
            'certification_examination' => json_encode($request->certification_examination ?? []),
            'certifying_agency' => json_encode($request->certifying_agency ?? []),
            'date_certified' => json_encode($request->date_certified ?? []),
            'rating' => json_encode($request->rating ?? []),
            // Work experience fields - wrap in array and encode as JSON to maintain consistency
            'position_designation' => is_array($request->position_designation) 
                ? json_encode($request->position_designation) 
                : json_encode([$request->position_designation ?? '']),
            'dates_of_employment' => is_array($request->dates_of_employment) 
                ? json_encode($request->dates_of_employment) 
                : json_encode([$request->dates_of_employment ?? '']),
            'address_of_company' => is_array($request->address_of_company) 
                ? json_encode($request->address_of_company) 
                : json_encode([$request->address_of_company ?? '']),
            'status_of_employment' => is_array($request->status_of_employment) 
                ? json_encode($request->status_of_employment) 
                : json_encode([$request->status_of_employment ?? '']),
            'designation_of_immediate' => is_array($request->designation_of_immediate) 
                ? json_encode($request->designation_of_immediate) 
                : json_encode([$request->designation_of_immediate ?? '']),
            'reasons_for_moving' => is_array($request->reasons_for_moving) 
                ? json_encode($request->reasons_for_moving) 
                : json_encode([$request->reasons_for_moving ?? '']),
            'responsibilities_in_position' => is_array($request->responsibilities_in_position) 
                ? json_encode($request->responsibilities_in_position) 
                : json_encode([$request->responsibilities_in_position ?? '']),
            'case_of_self_employment' => is_array($request->case_of_self_employment) 
                ? json_encode($request->case_of_self_employment) 
                : json_encode([$request->case_of_self_employment ?? '']),
            'awards_conferred' => json_encode($request->awards_conferred ?? []),
            'conferring_organizations' => json_encode($request->conferring_organizations ?? []),
            'date_awarded' => json_encode($request->date_awarded ?? []),
            'community_awards_conferred' => json_encode($request->community_awards_conferred ?? []),
            'community_conferring_organizations' => json_encode($request->community_conferring_organizations ?? []),
            'community_date_awarded' => json_encode($request->community_date_awarded ?? []),
            'work_awards_conferred' => json_encode($request->work_awards_conferred ?? []),
            'work_community_conferring_organizations' => json_encode($request->work_community_conferring_organizations ?? []),
            'work_community_date_awarded' => json_encode($request->work_community_date_awarded ?? []),
            'accomplishment_description' => $request->accomplishment_description ?? '',
            'date_accomplished' => $request->date_accomplished ?? '',
            'address_of_publishing' => $request->address_of_publishing ?? '',
            'leisure_activities' => $request->leisure_activities ?? '',
            'special_skills' => $request->special_skills ?? '',
            'work_related_activities' => $request->work_related_activities ?? '',
            'volunteer_activities' => $request->volunteer_activities ?? '',
            'travels_cite_places' => $request->travels_cite_places ?? '',
            'essay_of_degree' => $request->essay_of_degree ?? '',
            'declaration_place' => $request->declaration_place ?? '',
            'declaration_day' => $request->declaration_day ?? '',
            'declaration_month_year' => $request->declaration_month_year ?? '',
            'printed_name' => $request->printed_name ?? '',
            'community_tax_certificate' => $request->community_tax_certificate ?? '',
            'issued_on' => $request->issued_on ?? '',
            'issued_at' => $request->issued_at ?? '',
        ]);
        
        // If there are changes, update tracking fields and reset status for re-evaluation
        if (!empty($changes)) {
            // Get existing changes log and append new changes
            $existingLog = $application->changes_log ?? [];
            $newLogEntry = [
                'updated_at' => now()->toDateTimeString(),
                'updated_by' => Auth::user()->name ?? Auth::user()->email,
                'changes' => $changes,
            ];
            $existingLog[] = $newLogEntry;
            
            $application->changes_log = $existingLog;
            $application->last_user_update = now();
            $application->needs_review = true;
            
            // Store previous status and reset to pending for re-evaluation
            if ($application->status && $application->status !== 'pending') {
                $application->previous_status = $application->status;
                $application->status = 'pending';
            }
        }
        
        $application->save();
        
        $message = !empty($changes) 
            ? 'Application updated successfully! Your application will be re-evaluated by the admin.'
            : 'Application saved successfully!';
        
        return redirect()->route('user.index')->with('success', $message);
    }

    public function updateDegree(Request $request, $id)
    {
        $request->validate(['degree_program' => 'required|string|max:255']);
        $application = ApplicationForm::findOrFail($id);
        $application->degree_program = $request->degree_program;
        $application->save();
        return back()->with('success', 'Degree program updated successfully.');
    }

    public function destroy($id)
    {
        $application = ApplicationForm::findOrFail($id);
        if ($application->user_id !== Auth::id()) {
            return redirect()->back()->with('error', 'Unauthorized action.');
        }
        $application->delete();
        $user = Auth::user();
        if ($user->submission_count > 0) {
            $user->decrement('submission_count');
        }
        return redirect()->back()->with('success', 'Application deleted successfully.');
    }
}