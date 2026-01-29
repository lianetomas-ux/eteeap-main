@extends('layouts.admin')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-[#f8fdf8] via-[#f0f7f0] to-[#e8f5e8] p-3 sm:p-4 md:p-6 lg:p-8">

    <div class="max-w-[8.5in] mx-auto">

        {{-- Header Card with Actions - Hidden on Print --}}
        <div class="bg-gradient-to-r from-[#006633] to-[#004d26] rounded-2xl p-4 sm:p-6 mb-6 shadow-xl no-print">
            <div class="flex flex-col lg:flex-row items-start lg:items-center justify-between gap-4">
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 bg-[#FFD700]/20 rounded-xl flex items-center justify-center">
                        <svg class="w-6 h-6 text-[#FFD700]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-xl sm:text-2xl font-bold text-white">Application Details</h1>
                        <p class="text-white/70 text-sm">Assessor Review Panel</p>
                    </div>
                </div>
                <div class="flex flex-wrap items-center gap-3">
                    <a href="{{ route('assessor.dashboard') }}" class="inline-flex items-center gap-2 bg-white/10 hover:bg-white/20 text-white font-medium px-4 py-2 rounded-xl transition-all border border-white/20 text-sm">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                        </svg>
                        Back to Dashboard
                    </a>
                    <button onclick="printApplication()" class="inline-flex items-center gap-2 bg-[#FFD700] hover:bg-[#e5c200] text-[#006633] font-bold px-4 py-2 rounded-xl transition-all shadow-lg text-sm">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"/>
                        </svg>
                        Print Application
                    </button>
                    <button onclick="printWorkExperienceSummary()" class="inline-flex items-center gap-2 bg-white/10 hover:bg-white/20 text-white font-semibold px-4 py-2 rounded-xl transition-all border border-white/20 text-sm">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                        Print Work Experience
                    </button>
                </div>
            </div>
        </div>

        {{-- Printable Application Form --}}
        <div id="applicationDetails" class="print-area">
            @if($application)
            
            <div class="print-content bg-white rounded-2xl shadow-xl overflow-hidden">
                <div class="p-6 sm:p-8 md:p-10 lg:p-12">
                    
                    {{-- Header --}}
                    <div class="print-header text-center mb-6">
                        <div class="flex items-center justify-center gap-4 sm:gap-6 mb-4">
                            <img src="{{ asset('images/cl.png') }}" alt="CLSU Logo" class="w-14 h-14 sm:w-16 sm:h-16 md:w-20 md:h-20">
                            <div class="text-center">
                                <p class="text-xs sm:text-sm">Republic of the Philippines</p>
                                <h2 class="text-base sm:text-lg md:text-xl font-bold uppercase text-[#006633]">Central Luzon State University</h2>
                                <p class="text-xs sm:text-sm italic">Science City of Muñoz, Nueva Ecija</p>
                            </div>
                            <img src="{{ asset('images/eteeap.png') }}" alt="ETEEAP Logo" class="h-10 sm:h-12 md:h-16">
                        </div>
                        <p class="text-xs sm:text-sm font-bold text-[#006633]">EXPANDED TERTIARY EDUCATION EQUIVALENCY AND ACCREDITATION PROGRAM (ETEEAP)</p>
                    </div>

                    {{-- Form Title and ID Picture --}}
                    <div class="flex flex-col sm:flex-row justify-between items-start none gap-4">
                        <div>
                            <h1 class="text-xl sm:text-2xl md:text-3xl font-bold text-[#006633] tracking-wide">APPLICATION FORM</h1>
                        </div>
                        <div class="w-[1.5in] h-[1.5in] border border-black flex flex-col items-center justify-center overflow-hidden flex-shrink-0 bg-gray-50">
                            @if ($application->profile_image)
                                <img src="{{ asset($application->profile_image) }}" alt="Profile Image" class="w-full h-full object-cover">
                            @else
                                <span class="text-lg font-bold text-red-800">2" x 2"</span>
                                <span class="text-xs text-red-800">ID Picture</span>
                            @endif
                        </div>
                    </div>

                    {{-- Instruction --}}
                    <h3 class="text-center font-bold underline mb-2 text-sm sm:text-base">INSTRUCTION</h3>
                    <p class="text-xs sm:text-sm text-justify mb-6 indent-8">
                        Please type or clearly print your answers to all questions. Provide complete and detailed information required by the questions. All the declarations that you make are under oath. Discovery of any false claim in this application form will disqualify you from participating in the program.
                    </p>

                    {{-- Section I: Personal Information --}}
                    <h2 class="font-bold text-sm uppercase mb-4 mt-6 text-[#006633]">I. PERSONAL INFORMATION</h2>

                    <div class="mb-4">
                        <p class="text-sm mb-2">1. Name:</p>
                        <div class="flex flex-col sm:flex-row gap-2 sm:gap-4">
                            <div class="flex-1 text-center">
                                <div class="border-b border-black min-h-[24px] px-2 font-medium">{{ $application->last_name ?? '' }}</div>
                                <p class="text-xs mt-1">Last Name</p>
                            </div>
                            <div class="flex-1 text-center">
                                <div class="border-b border-black min-h-[24px] px-2 font-medium">{{ $application->first_name ?? '' }}</div>
                                <p class="text-xs mt-1">First Name</p>
                            </div>
                            <div class="w-full sm:w-24 text-center">
                                <div class="border-b border-black min-h-[24px] px-2 font-medium">{{ $application->middle_name ? substr($application->middle_name, 0, 1) . '.' : '' }}</div>
                                <p class="text-xs mt-1">Middle Initial</p>
                            </div>
                        </div>
                    </div>

                    @php
                        $personalFields = [
                            ['2. Address:', trim(($application->house_no ?? '') . ' ' . ($application->street ?? '') . ' ' . ($application->barangay ?? '') . ' ' . ($application->city ?? '') . ' ' . ($application->province ?? ''))],
                            ['Zip Code:', $application->zipcode ?? '', true],
                            ['3. Telephone No:', $application->contact_number ?? ''],
                            ['4. Birthdate:', $application->birthdate ?? ''],
                            ['5. Birthplace:', $application->birthplace ?? ''],
                            ['6. Civil Status:', $application->civil_status ?? ''],
                            ['7. Gender:', $application->sex ?? ''],
                            ['8. Language and Dialect Spoken:', $application->language ?? ''],
                            ['9. Degree Program or field being applied for:', $application->displayField('degree_program_field') ?? ''],
                            ['First Priority:', $application->displayField('first_priority') ?? '', true],
                            ['Second Priority:', $application->displayField('second_priority') ?? '', true],
                            ['Third Priority:', $application->displayField('third_priority') ?? '', true],
                        ];
                    @endphp

                    @foreach($personalFields as $field)
                        <div class="flex items-baseline mb-2 text-sm {{ isset($field[2]) && $field[2] ? 'ml-5' : '' }}">
                            <span class="whitespace-nowrap mr-2">{{ $field[0] }}</span>
                            <span class="flex-1 border-b border-dotted border-black min-h-[18px] px-2 font-medium">{{ $field[1] }}</span>
                        </div>
                    @endforeach

                    {{-- Textarea Fields --}}
                    @php
                        $textareaFields = [
                            ['10. Statement of your goals, objectives, or purposes in applying for the degree.', $application->goals_objectives ?? ''],
                            ['11. Indicate how much time you plan to devote for personal learning activities.', $application->learning_activities ?? ''],
                            ['12. For overseas applicants, describe your accreditation plan.', $application->overseas_applicants ?? ''],
                        ];
                    @endphp

                    @foreach($textareaFields as $field)
                        <div class="mb-4">
                            <p class="text-sm mb-2">{{ $field[0] }}</p>
                            <div class="border border-dotted border-black min-h-[40px] p-2 text-sm font-medium whitespace-pre-wrap">{{ $field[1] }}</div>
                        </div>
                    @endforeach

                    {{-- Checkbox Question --}}
                    <div class="mb-4">
                        <p class="text-sm mb-2">13. How soon do you need to complete equivalency accreditation?</p>
                        <div class="flex flex-wrap gap-2 sm:gap-4 ml-5">
                            @foreach(['less than one (1) year', '1 year', '2 years', '3 years', '4 years', 'more than 5 years'] as $option)
                                <div class="flex items-center gap-2 text-xs sm:text-sm">
                                    <div class="w-3 h-3 border border-black flex items-center justify-center">
                                        @if($application->equivalency_accreditation == $option)
                                            <span class="text-xs font-bold">✓</span>
                                        @endif
                                    </div>
                                    <span>{{ $option }}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    {{-- Section II: Education --}}
                    <h2 class="font-bold text-sm uppercase mb-2 mt-8 text-[#006633]">II. EDUCATION:</h2>
                    <p class="text-sm mb-4">This section will require you to provide information on your past formal, non-formal and informal learning experiences.</p>

                    <h3 class="font-bold text-sm mb-2">1. Formal Education</h3>
                    <div class="overflow-x-auto">
                        <table class="w-full border-collapse text-xs sm:text-sm mb-2">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="border border-black p-2 text-left" style="width: 35%;">Course/Degree Program</th>
                                    <th class="border border-black p-2 text-left" style="width: 40%;">Name of School/Address</th>
                                    <th class="border border-black p-2 text-left" style="width: 25%;">Inclusive Dates</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($degree_programs ?? [] as $index => $program)
                                <tr>
                                    <td class="border border-black p-2">{{ $program }}</td>
                                    <td class="border border-black p-2">{{ $school_addresses[$index] ?? '' }}</td>
                                    <td class="border border-black p-2">{{ $inclusive_dates[$index] ?? '' }}</td>
                                </tr>
                                @empty
                                <tr>
                                    <td class="border border-black p-2">&nbsp;</td>
                                    <td class="border border-black p-2"></td>
                                    <td class="border border-black p-2"></td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <p class="text-xs italic mb-4">Note: All entries should be supported by authenticated photocopy of appropriate certificates/diploma.</p>

                    <h3 class="font-bold text-sm mb-2">2. Non-Formal Education</h3>
                    <div class="overflow-x-auto">
                        <table class="w-full border-collapse text-xs sm:text-sm mb-2">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="border border-black p-2 text-left" style="width: 35%;">Title of Training Program</th>
                                    <th class="border border-black p-2 text-left" style="width: 40%;">Certificate Obtained</th>
                                    <th class="border border-black p-2 text-left" style="width: 25%;">Inclusive Dates</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($training_programs ?? [] as $index => $program)
                                <tr>
                                    <td class="border border-black p-2">{{ $program }}</td>
                                    <td class="border border-black p-2">{{ $certificate_obtained[$index] ?? '' }}</td>
                                    <td class="border border-black p-2">{{ $dates_attendance[$index] ?? '' }}</td>
                                </tr>
                                @empty
                                <tr>
                                    <td class="border border-black p-2">&nbsp;</td>
                                    <td class="border border-black p-2"></td>
                                    <td class="border border-black p-2"></td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <h3 class="font-bold text-sm mb-2">3. Certification Examinations</h3>
                    <div class="overflow-x-auto">
                        <table class="w-full border-collapse text-xs sm:text-sm mb-2">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="border border-black p-2 text-left">Title</th>
                                    <th class="border border-black p-2 text-left">Certifying Agency</th>
                                    <th class="border border-black p-2 text-left">Date</th>
                                    <th class="border border-black p-2 text-left">Rating</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($certification_examination ?? [] as $index => $exam)
                                <tr>
                                    <td class="border border-black p-2">{{ $exam }}</td>
                                    <td class="border border-black p-2">{{ $certifying_agency[$index] ?? '' }}</td>
                                    <td class="border border-black p-2">{{ $date_certified[$index] ?? '' }}</td>
                                    <td class="border border-black p-2">{{ $rating[$index] ?? '' }}</td>
                                </tr>
                                @empty
                                <tr>
                                    <td class="border border-black p-2">&nbsp;</td>
                                    <td class="border border-black p-2"></td>
                                    <td class="border border-black p-2"></td>
                                    <td class="border border-black p-2"></td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    {{-- Section III: Paid Work --}}
                    <h2 class="font-bold text-sm uppercase mb-4 mt-8 text-[#006633]">III. PAID WORK AND OTHER EXPERIENCES</h2>

                    @if(count($position_designation ?? []) > 0)
                        @foreach($position_designation as $index => $position)
                            @php
                                // Format dates and replace "Present" with current date
                                $datesOfEmp = $dates_of_employment[$index] ?? "";
                                $datesOfEmp = preg_replace_callback('/(\d{4})-(\d{2})-(\d{2})/', function($m) {
                                    return date('F j, Y', strtotime($m[0]));
                                }, $datesOfEmp);
                                $datesOfEmp = preg_replace('/\bPresent\b/i', date('F j, Y'), $datesOfEmp);
                            @endphp
                            <div class="mb-6 pb-4 {{ $index > 0 ? 'border-t border-gray-300 pt-4' : '' }}">
                                <p class="text-xs font-bold text-gray-600 mb-2 bg-gray-100 px-2 py-1 rounded">Work Experience #{{ $index + 1 }}</p>
                                
                                @php
                                    $workFields = [
                                        ['1. Position/Designation:', $position ?? ''],
                                        ['2. Inclusive Dates:', $datesOfEmp],
                                        ['3. Company:', $address_of_company[$index] ?? ''],
                                        ['4. Status:', $status_of_employment[$index] ?? ''],
                                        ['5. Supervisor:', $designation_of_immediate[$index] ?? ''],
                                        ['6. Reason for leaving:', $reasons_for_moving[$index] ?? ''],
                                    ];
                                @endphp

                                @foreach($workFields as $wf)
                                    <div class="flex items-baseline mb-2 text-sm">
                                        <span class="whitespace-nowrap mr-2">{{ $wf[0] }}</span>
                                        <span class="flex-1 border-b border-dotted border-black min-h-[18px] px-2 font-medium">{{ $wf[1] }}</span>
                                    </div>
                                @endforeach

                                <div class="mb-4">
                                    <p class="text-sm mb-2">7. Functions and responsibilities:</p>
                                    <div class="border border-dotted border-black min-h-[40px] p-2 text-sm font-medium whitespace-pre-wrap">{{ $responsibilities_in_position[$index] ?? '' }}</div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <p class="text-sm text-gray-500 italic">No work experience records found.</p>
                    @endif

                    {{-- Section IV: Awards --}}
                    <h2 class="font-bold text-sm uppercase mb-2 mt-8 text-[#006633]">IV. HONORS, AWARDS, AND CITATIONS</h2>

                    @php
                        $awardTables = [
                            ['1. Academic Award', $awards_conferred ?? [], $conferring_organizations ?? [], $date_awarded ?? []],
                            ['2. Community/Civic Award', $community_awards_conferred ?? [], $community_conferring_organizations ?? [], $community_date_awarded ?? []],
                            ['3. Work Related Award', $work_awards_conferred ?? [], $work_community_conferring_organizations ?? [], $work_community_date_awarded ?? []],
                        ];
                    @endphp

                    @foreach($awardTables as $table)
                        <h3 class="font-bold text-sm mb-2">{{ $table[0] }}</h3>
                        <div class="overflow-x-auto">
                            <table class="w-full border-collapse text-xs sm:text-sm mb-4">
                                <thead>
                                    <tr class="bg-gray-100">
                                        <th class="border border-black p-2 text-left">Award</th>
                                        <th class="border border-black p-2 text-left">Organization</th>
                                        <th class="border border-black p-2 text-left">Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($table[1] as $index => $award)
                                    <tr>
                                        <td class="border border-black p-2">{{ $award }}</td>
                                        <td class="border border-black p-2">{{ $table[2][$index] ?? '' }}</td>
                                        <td class="border border-black p-2">{{ $table[3][$index] ?? '' }}</td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td class="border border-black p-2">&nbsp;</td>
                                        <td class="border border-black p-2"></td>
                                        <td class="border border-black p-2"></td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    @endforeach

                    {{-- Section V: Creative Works --}}
                    <h2 class="font-bold text-sm uppercase mb-2 mt-8 text-[#006633]">V. CREATIVE WORKS AND ACCOMPLISHMENTS</h2>

                    <div class="mb-4">
                        <p class="text-sm mb-2">1. Description:</p>
                        <div class="border border-dotted border-black min-h-[40px] p-2 text-sm font-medium whitespace-pre-wrap">{{ $application->accomplishment_description ?? '' }}</div>
                    </div>

                    <div class="flex items-baseline mb-2 text-sm">
                        <span class="whitespace-nowrap mr-2">2. Date Accomplished:</span>
                        <span class="flex-1 border-b border-dotted border-black min-h-[18px] px-2 font-medium">{{ $application->date_accomplished ?? '' }}</span>
                    </div>

                    <div class="mb-4">
                        <p class="text-sm mb-2">3. Publishing Agency:</p>
                        <div class="border border-dotted border-black min-h-[40px] p-2 text-sm font-medium whitespace-pre-wrap">{{ $application->address_of_publishing ?? '' }}</div>
                    </div>

                    {{-- Section VI: Lifelong Learning --}}
                    <h2 class="font-bold text-sm uppercase mb-2 mt-8 text-[#006633]">VI. LIFELONG LEARNING EXPERIENCE</h2>

                    @php
                        $lifelongSections = [
                            ['1. Hobbies/Leisure Activities', $application->leisure_activities ?? ''],
                            ['2. Special Skills', $application->special_skills ?? ''],
                            ['3. Work-Related Activities', $application->work_related_activities ?? ''],
                            ['4. Volunteer Activities', $application->volunteer_activities ?? ''],
                            ['5. Travels', $application->travels_cite_places ?? ''],
                        ];
                    @endphp

                    @foreach($lifelongSections as $section)
                        <h3 class="font-bold text-sm mb-1">{{ $section[0] }}</h3>
                        <div class="border border-dotted border-black min-h-[40px] p-2 text-sm font-medium whitespace-pre-wrap mb-4">{{ $section[1] }}</div>
                    @endforeach

                    <h3 class="font-bold text-sm mb-2">Essay:</h3>
                    <div class="border border-dotted border-black min-h-[60px] p-2 text-sm font-medium whitespace-pre-wrap mb-6">{{ $application->essay ?? '' }}</div>

                    {{-- Declaration --}}
                    <p class="text-sm text-justify mb-6 indent-8">
                        I declare under oath that, the foregoing claims and information I have disclosed are true and correct. Done in
                        <span class="border-b border-black px-2 font-medium">{{ $application->declaration_place ?? '_______________' }}</span>
                        on this
                        <span class="border-b border-black px-2 font-medium">{{ $application->declaration_day ?? '____' }}</span>
                        day of
                        <span class="border-b border-black px-2 font-medium">{{ $application->declaration_month_year ?? '_______________' }}</span>.
                    </p>

                    {{-- Signature --}}
                    <div class="mb-6">
                        <p class="font-bold text-sm mb-2">Signed:</p>
                        <div class="text-center mt-8">
                            @if ($application->signature_image)
                                <img src="{{ asset('storage/signature_images/' . $application->signature_image) }}" 
                                     alt="Signature" 
                                     class="mx-auto max-w-[200px] max-h-[60px] object-contain mb-2">
                            @endif
                            <div class="border-b border-black w-3/5 mx-auto min-h-[24px] font-medium">{{ $application->printed_name ?? '' }}</div>
                            <p class="text-sm font-bold mt-1">Printed Name and Signature of Applicant</p>
                        </div>
                    </div>

                    {{-- CTC Section --}}
                    <div class="text-sm mb-6">
                        <div class="flex items-baseline gap-2 mb-2 flex-wrap">
                            <span>Community Tax Certificate:</span>
                            <span class="border-b border-dotted border-black px-2 min-w-[150px] font-medium">{{ $application->community_tax_certificate ?? '' }}</span>
                        </div>
                        <div class="flex items-baseline gap-2 flex-wrap">
                            <span>Issued on:</span>
                            <span class="border-b border-dotted border-black px-2 min-w-[100px] font-medium">{{ $application->issued_on ?? '' }}</span>
                            <span class="ml-4">at</span>
                            <span class="border-b border-dotted border-black px-2 min-w-[150px] font-medium">{{ $application->issued_at ?? '' }}</span>
                        </div>
                    </div>

                    <p class="text-xs italic">ACA.ETE.YYY.F.001 (Revision No. 1; April 14, 2025)</p>

                </div>
            </div>

            @else
                <div class="bg-white rounded-2xl p-8 text-center shadow-lg">
                    <div class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                        </svg>
                    </div>
                    <p class="text-gray-700 font-medium">No application found.</p>
                </div>
            @endif
        </div>

        {{-- Uploaded Requirements Section --}}
        @if (isset($requirement) && $requirement)
        <div class="mt-8 no-print">
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
                <div class="bg-gradient-to-r from-[#006633] to-[#004d26] p-4 sm:p-6">
                    <h2 class="text-lg sm:text-xl font-bold text-white flex items-center gap-3">
                        <div class="w-10 h-10 bg-[#FFD700]/20 rounded-xl flex items-center justify-center">
                            <svg class="w-5 h-5 text-[#FFD700]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                        </div>
                        Uploaded Requirements
                    </h2>
                </div>
                
                <div class="p-4 sm:p-6">
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-5 gap-4">
                        @php
                            $requirements = [
                                'original_school_credentials' => 'School Credentials',
                                'certificate_of_employment' => 'Certificate of Employment',
                                'nbi_barangay_clearance' => 'NBI / Barangay Clearance',
                                'recommendation_letter' => 'Recommendation Letter',
                                'proficiency_certificate' => 'Proficiency Certificate'
                            ];
                        @endphp

                        @foreach ($requirements as $key => $label)
                            <div class="bg-gray-50 rounded-xl p-4 border border-gray-200 hover:shadow-md transition-shadow">
                                <p class="text-[#006633] font-semibold text-xs sm:text-sm mb-3 text-center">{{ $label }}</p>
                                @php
                                    // Decode JSON array to get file paths
                                    $rawValue = $requirement->$key ?? null;
                                    $filePaths = [];
                                    if ($rawValue) {
                                        if (is_string($rawValue)) {
                                            $decoded = json_decode($rawValue, true);
                                            $filePaths = is_array($decoded) ? $decoded : [$rawValue];
                                        } elseif (is_array($rawValue)) {
                                            $filePaths = $rawValue;
                                        }
                                    }
                                @endphp
                                @if(count($filePaths) > 0)
                                    @php
                                        // Get the first file path
                                        $filePath = $filePaths[0];
                                        // Ensure path starts with storage/
                                        if (!str_starts_with($filePath, 'storage/')) {
                                            $filePath = 'storage/requirements/' . $filePath;
                                        }
                                        $fileExists = file_exists(public_path($filePath));
                                        $isPdf = strtolower(pathinfo($filePath, PATHINFO_EXTENSION)) === 'pdf';
                                    @endphp
                                    @if ($fileExists)
                                        @if($isPdf)
                                            {{-- PDF File Display --}}
                                            <a href="{{ asset($filePath) }}" target="_blank" class="block">
                                                <div class="w-full h-24 sm:h-32 bg-red-50 rounded-lg border border-red-200 flex flex-col items-center justify-center hover:bg-red-100 transition-colors cursor-pointer">
                                                    <svg class="w-8 h-8 sm:w-10 sm:h-10 text-red-500 mb-2" fill="currentColor" viewBox="0 0 24 24">
                                                        <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8l-6-6zM6 20V4h7v5h5v11H6zm2-6h8v2H8v-2zm0-3h8v2H8v-2zm0 6h5v2H8v-2z"/>
                                                    </svg>
                                                    <p class="text-red-600 text-xs font-medium">PDF Document</p>
                                                    <p class="text-red-500 text-xs mt-1">Click to view</p>
                                                </div>
                                            </a>
                                        @else
                                            {{-- Image File Display --}}
                                            <a href="{{ asset($filePath) }}" target="_blank" class="block">
                                                <img src="{{ asset($filePath) }}" 
                                                     alt="{{ $label }}"
                                                     class="w-full h-24 sm:h-32 object-cover rounded-lg border border-gray-200 hover:opacity-80 transition-opacity cursor-pointer">
                                            </a>
                                        @endif
                                    @else
                                        <div class="w-full h-24 sm:h-32 bg-red-50 rounded-lg border border-red-200 flex items-center justify-center">
                                            <p class="text-red-500 text-xs text-center px-2">File not found</p>
                                        </div>
                                    @endif
                                @else
                                    <div class="w-full h-24 sm:h-32 bg-gray-100 rounded-lg border border-gray-200 flex items-center justify-center">
                                        <p class="text-gray-400 text-xs text-center">No file</p>
                                    </div>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        @endif

    </div>
</div>

<style>
    /* Print Styles */
    @media print {
        /* Reset and base print styles */
        * {
            box-sizing: border-box;
        }
        
        html, body {
            width: 100%;
            height: auto;
            margin: 0 !important;
            padding: 0 !important;
            overflow: visible !important;
            background: white !important;
            -webkit-print-color-adjust: exact !important;
            print-color-adjust: exact !important;
        }
        
        body * {
            visibility: hidden;
        }
        
        .print-area, .print-area * {
            visibility: visible !important;
        }
        
        .print-area {
            position: absolute !important;
            left: 0 !important;
            top: 0 !important;
            width: 100% !important;
            padding: 0 !important;
            margin: 0 !important;
        }
        
        .no-print, #mobile-sidebar, nav, aside, footer, .no-print * {
            display: none !important;
            visibility: hidden !important;
        }
        
        .print-content {
            box-shadow: none !important;
            border-radius: 0 !important;
            border: none !important;
            max-width: none !important;
            width: 100% !important;
            padding: 0 !important;
            background: white !important;
        }
        
        .print-content > div {
            padding: 0.4in 0.5in !important;
        }
        
        /* Page break controls */
        h2, h3, .print-header {
            page-break-after: avoid;
            break-after: avoid;
        }
        
        table, .work-experience-item {
            page-break-inside: avoid;
            break-inside: avoid;
        }
        
        tr {
            page-break-inside: avoid;
            break-inside: avoid;
        }
        
        /* Section breaks */
        .section-break {
            page-break-before: auto;
        }
        
        /* Font sizes for print - more compact */
        .print-area {
            font-size: 10pt !important;
            line-height: 1.3 !important;
        }
        
        .print-area h1 {
            font-size: 16pt !important;
        }
        
        .print-area h2 {
            font-size: 11pt !important;
            margin-top: 8px !important;
            margin-bottom: 5px !important;
        }
        
        .print-area h3 {
            font-size: 10pt !important;
            margin-bottom: 3px !important;
        }
        
        .print-area p, .print-area span, .print-area td, .print-area th {
            font-size: 9pt !important;
        }
        
        .print-area .text-xs {
            font-size: 8pt !important;
        }
        
        /* Reduce spacing */
        .print-area .mb-2 {
            margin-bottom: 3px !important;
        }
        
        .print-area .mb-4 {
            margin-bottom: 6px !important;
        }
        
        .print-area .mb-6 {
            margin-bottom: 10px !important;
        }
        
        .print-area .mt-6 {
            margin-top: 8px !important;
        }
        
        .print-area .mt-8 {
            margin-top: 10px !important;
        }
        
        .print-area .p-2 {
            padding: 3px !important;
        }
        
        .print-area .p-4 {
            padding: 6px !important;
        }
        
        /* Tables compact */
        .print-area table {
            margin-bottom: 6px !important;
        }
        
        .print-area th, .print-area td {
            padding: 3px 5px !important;
        }
        
        /* Textarea boxes compact */
        .print-area .min-h-\[40px\] {
            min-height: 20px !important;
        }
        
        .print-area .min-h-\[60px\] {
            min-height: 30px !important;
        }
        
        /* Ensure borders print */
        .border, .border-b, .border-black, [class*="border"] {
            border-color: black !important;
        }
        
        /* Hide wrapper margins */
        #wrapper, #page-wrapper, .wrapper-content {
            padding: 0 !important;
            margin: 0 !important;
            background: white !important;
        }
        
        /* Ensure images print */
        img {
            max-width: 100% !important;
            page-break-inside: avoid;
        }
        
        /* Header compact */
        .print-header {
            margin-bottom: 8px !important;
        }
        
        .print-header img {
            width: 45px !important;
            height: 45px !important;
        }
        
        /* Remove background colors except where needed */
        .bg-gray-100 {
            background-color: #f3f4f6 !important;
        }
    }
    
    @page {
        size: letter;
        margin: 0.4in 0.5in;
    }
</style>

<script>
function printApplication() {
    window.print();
}

function printWorkExperienceSummary() {
    // Build work experience data
    var workExpRows = '';
    @foreach($position_designation ?? [] as $index => $position)
    @php
        // Format dates and replace "Present" with current date for print
        $printDatesOfEmp = $dates_of_employment[$index] ?? "";
        $printDatesOfEmp = preg_replace_callback('/(\d{4})-(\d{2})-(\d{2})/', function($m) {
            return date('F j, Y', strtotime($m[0]));
        }, $printDatesOfEmp);
        $printDatesOfEmp = preg_replace('/\bPresent\b/i', date('F j, Y'), $printDatesOfEmp);
    @endphp
    workExpRows += `<tr>
        <td style="border: 1px solid #000; padding: 4px 6px; font-size: 8pt;">{{ $index + 1 }}</td>
        <td style="border: 1px solid #000; padding: 4px 6px; font-size: 8pt;">{{ addslashes($position ?? "") }}</td>
        <td style="border: 1px solid #000; padding: 4px 6px; font-size: 8pt;">{{ $printDatesOfEmp }}</td>
        <td style="border: 1px solid #000; padding: 4px 6px; font-size: 8pt;">{{ addslashes(str_replace(["\r\n", "\n", "\r"], " ", $address_of_company[$index] ?? "")) }}</td>
        <td style="border: 1px solid #000; padding: 4px 6px; font-size: 8pt;">{{ $status_of_employment[$index] ?? "" }}</td>
        <td style="border: 1px solid #000; padding: 4px 6px; font-size: 8pt;">{{ addslashes(str_replace(["\r\n", "\n", "\r"], " ", $responsibilities_in_position[$index] ?? "")) }}</td>
    </tr>`;
    @endforeach
    if(workExpRows === '') {
        workExpRows = '<tr><td colspan="6" style="border: 1px solid #000; padding: 6px; text-align: center; font-size: 9pt;">No work experience records</td></tr>';
    }

    var printContent = `<!DOCTYPE html>
<html>
<head>
    <title>Work Experience Summary - {{ $application->first_name ?? '' }} {{ $application->last_name ?? '' }}</title>
    <style>
        @page { size: landscape; margin: 10mm; }
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: "Times New Roman", Times, serif; font-size: 9pt; line-height: 1.25; color: #000; background: #fff; }
        .header { display: flex; align-items: center; justify-content: center; gap: 15px; margin-bottom: 12px; padding-bottom: 10px; border-bottom: 2px solid #006633; }
        .header img { height: 50px; }
        .header-text { text-align: center; }
        .header-text .university { font-weight: bold; font-size: 12pt; color: #006633; }
        .header-text p { margin: 1px 0; font-size: 9pt; }
        h1 { text-align: center; font-size: 13pt; color: #006633; margin: 12px 0; text-transform: uppercase; }
        .applicant-info { background: #f5f5f5; padding: 10px; border-radius: 6px; margin-bottom: 12px; }
        .applicant-info p { margin: 3px 0; font-size: 9pt; }
        .applicant-info strong { color: #006633; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th { background: #006633; color: white; padding: 6px 8px; font-size: 9pt; border: 1px solid #000; text-align: left; }
        td { padding: 5px 6px; font-size: 8pt; border: 1px solid #000; vertical-align: top; }
        tr:nth-child(even) { background: #f9f9f9; }
        .footer { margin-top: 20px; text-align: center; font-size: 8pt; color: #666; border-top: 1px solid #ccc; padding-top: 10px; }
        .print-date { position: absolute; top: 8px; right: 12px; font-size: 8pt; color: #666; }
    </style>
</head>
<body>
    <div class="print-date">Printed: ${new Date().toLocaleDateString()}</div>
    <div class="header">
        <img src="{{ asset('images/cl.png') }}" alt="CLSU Logo">
        <div class="header-text">
            <p>Republic of the Philippines</p>
            <p class="university">CENTRAL LUZON STATE UNIVERSITY</p>
            <p style="font-style: italic;">Science City of Muñoz, Nueva Ecija</p>
            <p style="font-weight: bold; color: #006633; margin-top: 3px; font-size: 9pt;">EXPANDED TERTIARY EDUCATION EQUIVALENCY AND ACCREDITATION PROGRAM (ETEEAP)</p>
        </div>
        <img src="{{ asset('images/eteeap.png') }}" alt="ETEEAP Logo" style="height: 40px;">
    </div>
    
    <h1>Summary of Work Experience</h1>
    
    <div class="applicant-info">
        <p><strong>Applicant Name:</strong> {{ $application->first_name ?? '' }} {{ $application->middle_name ?? '' }} {{ $application->last_name ?? '' }}</p>
        <p><strong>Program Applied:</strong> {{ $application->displayField('degree_program_field') ?? 'N/A' }}</p>
        <p><strong>Contact Number:</strong> {{ $application->contact_number ?? 'N/A' }}</p>
    </div>
    
    <table>
        <thead>
            <tr>
                <th style="width: 4%;">#</th>
                <th style="width: 16%;">Position/Designation</th>
                <th style="width: 11%;">Inclusive Dates</th>
                <th style="width: 20%;">Company/Organization</th>
                <th style="width: 10%;">Status</th>
                <th style="width: 39%;">Functions & Responsibilities</th>
            </tr>
        </thead>
        <tbody>
            ${workExpRows}
        </tbody>
    </table>
    
    <div class="footer">
        <p>This document is system-generated from CLSU ETEEAP Application System</p>
        <p>ACA.ETE.YYY.F.001 (Revision No. 1; April 14, 2025)</p>
    </div>
</body>
</html>`;

    var printWindow = window.open('', '_blank');
    printWindow.document.write(printContent);
    printWindow.document.close();
    printWindow.focus();
    setTimeout(function() {
        printWindow.print();
        printWindow.close();
    }, 500);
}
</script>

@endsection
