@extends('layouts.app')

@section('title', 'Application Details')

@section('content')

<section class="relative min-h-screen overflow-hidden">
    
    <!-- Background with CLSU Green Gradient Overlay -->
    <div class="fixed inset-0 bg-cover bg-center bg-no-repeat" 
         style="background-image: url('{{ asset('inspinia/img/landing/r.jpg') }}');">
        <div class="absolute inset-0 bg-gradient-to-br from-[#087A29]/95 via-[#065a1f]/90 to-[#043d15]/95"></div>
    </div>

    <!-- Floating Decorative Elements -->
    <div class="fixed top-20 left-10 w-72 h-72 bg-[#F9B233]/10 rounded-full blur-3xl animate-pulse pointer-events-none"></div>
    <div class="fixed bottom-20 right-10 w-96 h-96 bg-[#F9B233]/10 rounded-full blur-3xl animate-pulse pointer-events-none" style="animation-delay: 1s;"></div>

    <!-- Main Content -->
    <div class="relative z-10 container mx-auto px-4 py-8 lg:py-12">
        
        <!-- Header Card -->
        <div class="glass-card rounded-2xl p-6 mb-6 no-print mx-auto" style="max-width: 8.5in;">
            <div class="flex flex-col md:flex-row items-start md:items-center justify-between gap-4">
                <div>
                    <h1 class="text-2xl md:text-3xl font-bold text-white flex items-center gap-3">
                        <div class="w-12 h-12 bg-[#F9B233]/20 rounded-xl flex items-center justify-center">
                            <svg class="w-6 h-6 text-[#F9B233]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                        </div>
                        My Application Form Details
                    </h1>
                    <p class="text-white/70 mt-2 ml-15">You can print your application form for your records</p>
                </div>
                <div class="flex items-center gap-3">
                    <a href="{{ route('user.index') }}" class="inline-flex items-center gap-2 bg-white/10 hover:bg-white/20 text-white font-semibold px-5 py-2.5 rounded-xl transition-all border border-white/20">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                        </svg>
                        Back
                    </a>
                    <button onclick="printApplication()" class="inline-flex items-center gap-2 bg-[#F9B233] hover:bg-[#e5a42e] text-[#087A29] font-bold px-5 py-2.5 rounded-xl transition-all shadow-lg hover:shadow-xl hover:-translate-y-0.5">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"/>
                        </svg>
                        Print Application
                    </button>
                    <button onclick="printWorkExperience()" class="inline-flex items-center gap-2 bg-white/10 hover:bg-white/20 text-white font-semibold px-5 py-2.5 rounded-xl transition-all border border-white/20">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                        Print Work Experience
                    </button>
                </div>
            </div>
        </div>

        <!-- Printable Application Form -->
        <div id="applicationDetails" class="print-area">
            @if($application)
            
            <div class="print-content bg-white rounded-2xl shadow-xl mx-auto" style="max-width: 8.5in;">
                <div class="p-8 md:p-12">
                    
                    <!-- Header -->
                    <div class="print-header mb-6">
                        <div class="flex flex-col items-center text-center p-4 w-full">
                            <div class="flex items-center justify-center gap-4">
                                <img src="{{ asset('images/cl.png') }}" alt="CLSU Logo" class="w-24 h-24">
                                <h2 class="text-4xl md:text-5xl font-bold text-[#087A29] whitespace-nowrap" style="font-family: 'Times New Roman', serif;">Central Luzon State University</h2>
                            </div>
                            <p class="text-sm -mt-2">Science City of Muñoz, 3120 Nueva Ecija, Philippines</p>
                            <p class="text-sm flex items-center justify-center gap-5 mt-1">
                                <span class="flex items-center gap-1"><svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"/></svg>(6344) 940-8785</span>
                                <span class="flex items-center gap-1"><svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/></svg>op@clsu.edu.ph</span>
                                <span class="flex items-center gap-1"><svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 17.93c-3.95-.49-7-3.85-7-7.93 0-.62.08-1.21.21-1.79L9 15v1c0 1.1.9 2 2 2v1.93zm6.9-2.54c-.26-.81-1-1.39-1.9-1.39h-1v-3c0-.55-.45-1-1-1H8v-2h2c.55 0 1-.45 1-1V7h2c1.1 0 2-.9 2-2v-.41c2.93 1.19 5 4.06 5 7.41 0 2.08-.8 3.97-2.1 5.39z"/></svg>clsu.edu.ph</span>
                            </p>
                        </div>
                    </div>

                    <!-- Form Title and ID Picture with Instruction -->
                    <div class="">
                        <div class="flex justify-between items-start gap-4">
                            <div class="flex-1">
                                <h1 class="text-3xl md:text-4xl font-bold text-black tracking-wide mb-4" style="font-family: Arial, sans-serif;">APPLICATION FORM</h1>
                                
                                <!-- Instruction -->
                                <h3 class="font-bold underline mb-2 text-sm">INSTRUCTION</h3>
                                <p class="text-sm text-justify">
                                    Please type or clearly print your answers to all questions. Provide complete and detailed information required by the questions. All the declarations that you make are under oath. Discovery of any false claim in this application form will disqualify you from participating in the program.
                                </p>
                            </div>
                            <div class="w-[2in] h-[2in] border-2 border-black flex flex-col items-center justify-center overflow-hidden flex-shrink-0">
                                @if ($application->profile_image)
                                    <img src="{{ asset($application->profile_image) }}" alt="Profile Image" class="w-full h-full object-cover">
                                @else
                                    <span class="text-xl font-bold">2" x 2"</span>
                                    <span class="text-sm mt-2">ID Picture</span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- Section I: Personal Information -->
                    <h2 class="font-bold text-sm uppercase mb-4 mt-6">I. PERSONAL INFORMATION</h2>

                    <div class="mb-4">
                        <p class="text-sm mb-2">1. Name:</p>
                        <div class="flex gap-4">
                            <div class="flex-1 text-center">
                                <div class="border-b border-black min-h-[24px] px-2 font-medium">{{ $application->last_name ?? '' }}</div>
                                <p class="text-xs mt-1">Last Name</p>
                            </div>
                            <div class="flex-1 text-center">
                                <div class="border-b border-black min-h-[24px] px-2 font-medium">{{ $application->first_name ?? '' }}</div>
                                <p class="text-xs mt-1">First Name</p>
                            </div>
                            <div class="w-24 text-center">
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

                    <!-- Textarea Fields -->
                    @php
                        $textareaFields = [
                            ['10. Statement of your goals, objectives, or purposes in applying for the degree.', $application->goals_objectives ?? ''],
                            ['11. Indicate how much time you plan to devote for personal learning activities so that you can finish the requirements in the prescribed program. Be specific.', $application->learning_activities ?? ''],
                            ['12. For overseas applicants, describe how much you plan to obtain accreditation/equivalency. (e.g. when you plan to come to the Philippines.)', $application->overseas_applicants ?? ''],
                        ];
                    @endphp

                    @foreach($textareaFields as $field)
                        <div class="mb-4">
                            <p class="text-sm mb-2">{{ $field[0] }}</p>
                            <div class="border border-dotted border-black min-h-[40px] p-2 text-sm font-medium whitespace-pre-wrap">{{ $field[1] }}</div>
                        </div>
                    @endforeach

                    <!-- Checkbox Question -->
                    <div class="mb-4">
                        <p class="text-sm mb-2">13. How soon do you need to complete equivalency accreditation?</p>
                        <div class="flex flex-wrap gap-4 ml-5">
                            @foreach(['less than one (1) year', '1 year', '2 years', '3 years', '4 years', 'more than 5 years'] as $option)
                                <div class="flex items-center gap-2 text-sm">
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

                    <!-- Section II: Education -->
                    <h2 class="font-bold text-sm uppercase mb-2 mt-8">II. EDUCATION:</h2>
                    <p class="text-sm mb-4">This section will require you to provide information on your past formal, non-formal and informal learning experiences.</p>

                    <h3 class="font-bold text-sm mb-2">1. Formal Education</h3>
                    <table class="w-full border-collapse text-sm mb-2">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="border border-black p-2 text-left" style="width: 35%;">Course/Degree Program</th>
                                <th class="border border-black p-2 text-left" style="width: 40%;">Name of School/Address</th>
                                <th class="border border-black p-2 text-left" style="width: 25%;">Inclusive Dates of Attendance</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($degree_programs as $index => $program)
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
                    <p class="text-xs italic mb-4">Note: All entries should be supported by authenticated photocopy of appropriate certificates/diploma obtained from the institution through the program.</p>

                    <h3 class="font-bold text-sm mb-2">2. Non-Formal Education</h3>
                    <p class="text-sm mb-2">Non-formal education refers to structured and short-term training programs conducted for particular purpose such as skills development, values orientation and the like.</p>
                    <table class="w-full border-collapse text-sm mb-2">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="border border-black p-2 text-left" style="width: 35%;">Title of Training Program</th>
                                <th class="border border-black p-2 text-left" style="width: 40%;">Title of Certificate Obtained</th>
                                <th class="border border-black p-2 text-left" style="width: 25%;">Inclusive Dates of Attendance</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($training_programs as $index => $program)
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
                    <p class="text-xs italic mb-4">Note: All entries should be supported by authenticated photocopy of appropriate certificates/diploma obtained from the institution through the program.</p>

                    <h3 class="font-bold text-sm mb-2">3. Other Certification Examination</h3>
                    <p class="text-sm mb-2">Please give detailed information on certification examinations taken for vocational and other skills.</p>
                    <table class="w-full border-collapse text-sm mb-2">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="border border-black p-2 text-left" style="width: 25%;">Title of Certification Examination</th>
                                <th class="border border-black p-2 text-left" style="width: 30%;">Name/Address of Certifying Agency</th>
                                <th class="border border-black p-2 text-left" style="width: 25%;">Date Certified</th>
                                <th class="border border-black p-2 text-left" style="width: 20%;">Rating</th>
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
                    <p class="text-xs italic mb-4">Note: All entries should be supported by authenticated photocopy of appropriate certificates/diploma obtained from the institution through the program.</p>

                    <!-- Section III: Paid Work -->
                    <h2 class="font-bold text-sm uppercase mb-4 mt-8">III. PAID WORK AND OTHER EXPERIENCES</h2>

                    @if(is_array($position_designation ?? null) && count($position_designation) > 0)
                        @foreach($position_designation ?? [] as $index => $position)
                            @php
                                // Format dates and replace "Present" with current date
                                $datesOfEmp = $dates_of_employment[$index] ?? "";
                                $datesOfEmp = preg_replace_callback('/(\d{4})-(\d{2})-(\d{2})/', function($m) {
                                    return date('F j, Y', strtotime($m[0]));
                                }, $datesOfEmp);
                                $datesOfEmp = preg_replace('/\bPresent\b/i', date('F j, Y'), $datesOfEmp);
                            @endphp
                            <div class="mb-6 pb-4 {{ $index > 0 ? 'border-t border-gray-300 pt-4' : '' }}">
                                <p class="text-xs font-bold text-gray-600 mb-2">Work Experience #{{ $index + 1 }}</p>
                                
                                <div class="flex items-baseline mb-2 text-sm">
                                    <span class="whitespace-nowrap mr-2">1. Position/Designation:</span>
                                    <span class="flex-1 border-b border-dotted border-black min-h-[18px] px-2 font-medium">{{ $position ?? '' }}</span>
                                </div>
                                
                                <div class="flex items-baseline mb-2 text-sm">
                                    <span class="whitespace-nowrap mr-2">2. Inclusive Dates of Employment:</span>
                                    <span class="flex-1 border-b border-dotted border-black min-h-[18px] px-2 font-medium">{{ $datesOfEmp }}</span>
                                </div>
                                
                                <div class="flex items-baseline mb-2 text-sm">
                                    <span class="whitespace-nowrap mr-2">3. Name and Address of Company:</span>
                                    <span class="flex-1 border-b border-dotted border-black min-h-[18px] px-2 font-medium">{{ $address_of_company[$index] ?? '' }}</span>
                                </div>
                                
                                <div class="flex items-baseline mb-2 text-sm">
                                    <span class="whitespace-nowrap mr-2">4. Terms/Status of Employment:</span>
                                    <span class="flex-1 border-b border-dotted border-black min-h-[18px] px-2 font-medium">{{ $status_of_employment[$index] ?? '' }}</span>
                                </div>
                                
                                <div class="flex items-baseline mb-2 text-sm">
                                    <span class="whitespace-nowrap mr-2">5. Name and Designation of Immediate Supervisor:</span>
                                    <span class="flex-1 border-b border-dotted border-black min-h-[18px] px-2 font-medium">{{ $designation_of_immediate[$index] ?? '' }}</span>
                                </div>
                                
                                <div class="flex items-baseline mb-2 text-sm">
                                    <span class="whitespace-nowrap mr-2">6. Reason(s) for moving on to the next job:</span>
                                    <span class="flex-1 border-b border-dotted border-black min-h-[18px] px-2 font-medium">{{ $reasons_for_moving[$index] ?? '' }}</span>
                                </div>

                                <div class="mb-4">
                                    <p class="text-sm mb-2">7. Describe actual functions and responsibilities in position occupied.</p>
                                    <div class="border border-dotted border-black min-h-[40px] p-2 text-sm font-medium whitespace-pre-wrap">{{ $responsibilities_in_position[$index] ?? '' }}</div>
                                </div>

                                @if(isset($case_of_self_employment[$index]) && !empty($case_of_self_employment[$index]) && $case_of_self_employment[$index] !== 'N/A')
                                <div class="mb-4">
                                    <p class="text-sm mb-2">8. In case of self-employment, name three (3) reference persons:</p>
                                    <div class="border border-dotted border-black min-h-[40px] p-2 text-sm font-medium whitespace-pre-wrap">{{ $case_of_self_employment[$index] ?? '' }}</div>
                                </div>
                                @endif
                            </div>
                        @endforeach
                    @else
                        <div class="flex items-baseline mb-2 text-sm">
                            <span class="whitespace-nowrap mr-2">1. Position/Designation:</span>
                            <span class="flex-1 border-b border-dotted border-black min-h-[18px] px-2 font-medium"></span>
                        </div>
                        <div class="flex items-baseline mb-2 text-sm">
                            <span class="whitespace-nowrap mr-2">2. Inclusive Dates of Employment:</span>
                            <span class="flex-1 border-b border-dotted border-black min-h-[18px] px-2 font-medium"></span>
                        </div>
                        <div class="flex items-baseline mb-2 text-sm">
                            <span class="whitespace-nowrap mr-2">3. Name and Address of Company:</span>
                            <span class="flex-1 border-b border-dotted border-black min-h-[18px] px-2 font-medium"></span>
                        </div>
                        <div class="flex items-baseline mb-2 text-sm">
                            <span class="whitespace-nowrap mr-2">4. Terms/Status of Employment:</span>
                            <span class="flex-1 border-b border-dotted border-black min-h-[18px] px-2 font-medium"></span>
                        </div>
                        <div class="flex items-baseline mb-2 text-sm">
                            <span class="whitespace-nowrap mr-2">5. Name and Designation of Immediate Supervisor:</span>
                            <span class="flex-1 border-b border-dotted border-black min-h-[18px] px-2 font-medium"></span>
                        </div>
                        <div class="flex items-baseline mb-2 text-sm">
                            <span class="whitespace-nowrap mr-2">6. Reason(s) for moving on to the next job:</span>
                            <span class="flex-1 border-b border-dotted border-black min-h-[18px] px-2 font-medium"></span>
                        </div>
                        <div class="mb-4">
                            <p class="text-sm mb-2">7. Describe actual functions and responsibilities in position occupied.</p>
                            <div class="border border-dotted border-black min-h-[40px] p-2 text-sm font-medium whitespace-pre-wrap"></div>
                        </div>
                        <div class="mb-4">
                            <p class="text-sm mb-2">8. In case of self-employment, name three (3) reference persons:</p>
                            <div class="border border-dotted border-black min-h-[40px] p-2 text-sm font-medium whitespace-pre-wrap"></div>
                        </div>
                    @endif
                    <p class="text-xs italic mb-4">Note: Use another sheet if necessary, following the above format.</p>

                    <!-- Section IV: Honors, Awards -->
                    <h2 class="font-bold text-sm uppercase mb-2 mt-8">IV. HONORS, AWARDS, AND CITATIONS RECEIVED</h2>
                    <p class="text-sm mb-4">In this section, please describe all the awards you have received from schools, community and civic organizations, as well as citations for work excellence, outstanding accomplishments, community service, etc.</p>

                    @php
                        $awardTables = [
                            ['1. Academic Award', $awards_conferred ?? [], $conferring_organizations ?? [], $date_awarded ?? []],
                            ['2. Community and Civic Organization Award/Citation', $community_awards_conferred ?? [], $community_conferring_organizations ?? [], $community_date_awarded ?? []],
                            ['3. Work Related Award/Citation', $work_awards_conferred ?? [], $work_community_conferring_organizations ?? [], $work_community_date_awarded ?? []],
                        ];
                    @endphp

                    @foreach($awardTables as $table)
                        <h3 class="font-bold text-sm mb-2">{{ $table[0] }}</h3>
                        <table class="w-full border-collapse text-sm mb-4">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="border border-black p-2 text-left" style="width: 30%;">Awards Conferred</th>
                                    <th class="border border-black p-2 text-left" style="width: 50%;">Name and Address of Conferring Organizations</th>
                                    <th class="border border-black p-2 text-left" style="width: 20%;">Date Awarded</th>
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
                    @endforeach

                    <!-- Section V: Creative Works -->
                    <h2 class="font-bold text-sm uppercase mb-2 mt-8">V. CREATIVE WORKS AND SPECIAL ACCOMPLISHMENTS</h2>
                    <p class="text-sm mb-4 text-justify">In this section, enumerate the various creative works you have accomplished and other special accomplishments. Examples of these are inventions, published and unpublished literary fiction and nonfiction writings, musical work, products of visual performing arts, exceptional accomplishments in sports, social, cultural and leisure activities, etc. which can lead one to conclude the level of expertise you have obtained on certain field of interest. Include also participation in competitions and prizes obtained.</p>

                    <div class="mb-4">
                        <p class="text-sm mb-2">1. Description:</p>
                        <div class="border border-dotted border-black min-h-[40px] p-2 text-sm font-medium whitespace-pre-wrap">{{ $application->accomplishment_description ?? '' }}</div>
                    </div>

                    <div class="flex items-baseline mb-2 text-sm">
                        <span class="whitespace-nowrap mr-2">2. Date Accomplished:</span>
                        <span class="flex-1 border-b border-dotted border-black min-h-[18px] px-2 font-medium">{{ $application->date_accomplished ?? '' }}</span>
                    </div>

                    <div class="mb-4">
                        <p class="text-sm mb-2">3. Name and Address of Publishing Agency (if written, published work), or an Association/institution which can attest to the quality of the work.</p>
                        <div class="border border-dotted border-black min-h-[40px] p-2 text-sm font-medium whitespace-pre-wrap">{{ $application->address_of_publishing ?? '' }}</div>
                    </div>
                    <p class="text-xs italic mb-4">Note: Use additional sheet if necessary, following the same format.</p>

                    <!-- Section VI: Lifelong Learning -->
                    <h2 class="font-bold text-sm uppercase mb-2 mt-8">VI. LIFELONG LEARNING EXPERIENCE</h2>
                    <p class="text-sm mb-4">In this section, please indicate the various life experiences from which you must have derived some learning experiences. Please include here unpaid volunteer work.</p>

                    @php
                        $lifelongSections = [
                            ['1. Hobbies/Leisure Activities', 'Leisure activities which involve rating skills for competition and other purposes (e.g. "belt concept in Taekwondo) may also indicate your level for ease in evaluation. On the other hand, watching Negosiyete on a regular basis can be considered a learning opportunity.', $application->leisure_activities ?? ''],
                            ['2. Special Skills', 'Note down those special skills which you think must be related to the field of study you want to pursue.', $application->special_skills ?? ''],
                            ['3. Work-Related Activities', 'Some work-related activities are occasions for you to learn something new. For example, being assigned to projects beyond your usual job description where you learned new skills and knowledge. Please do not include formal training programs you already cited. However, you may include here experiences which can be classified as on-the-job training or apprenticeship.', $application->work_related_activities ?? ''],
                            ['4. Volunteer Activities', 'List only volunteer activities that demonstrate learning opportunities, and are related to the course you are applying for credit. (e.g. counseling programs, sports coaching, project organizing or coordination, organizational leadership, and the like).', $application->volunteer_activities ?? ''],
                            ['5. Travels: Cite places visited and purpose of travel', 'Include write-up of the nature of travel undertaken, whether for leisure, employment, business or other purposes. State in clear terms what new learning experiences was obtained from these travels and how it helped you become a better person.', $application->travels_cite_places ?? ''],
                        ];
                    @endphp

                    @foreach($lifelongSections as $section)
                        <h3 class="font-bold text-sm mb-1">{{ $section[0] }}</h3>
                        <p class="text-xs mb-2">{{ $section[1] }}</p>
                        <div class="border border-dotted border-black min-h-[40px] p-2 text-sm font-medium whitespace-pre-wrap mb-4">{{ $section[2] }}</div>
                    @endforeach

                    <h3 class="font-bold text-sm mb-2">VI. To sum up, please write an essay on how the degree you are seeking can contribute to your personal development, your community, your workplace, society, and country.</h3>
                    <div class="border border-dotted border-black min-h-[60px] p-2 text-sm font-medium whitespace-pre-wrap mb-6">{{ $application->essay ?? '' }}</div>

                    <!-- Data Privacy Notice -->
                    <div class="text-xs text-justify mb-6">
                        <p><span class="font-bold">DATA PRIVACY NOTICE.</span> Central Luzon State University (CLSU) values your privacy and upholds its commitment to protecting personal data in compliance with Republic Act No. 10173, also known as the Data Privacy Act of 2012. This form collects personal data such as Full name (Last, First, Middle), ID photo, Sex, Civil status, Birthdate, Birthplace, Address Zip code, Telephone number(s), Community Tax Certificate number, Government-issued IDs, NSO-authenticated birth certificate, Formal education history (schools attended, course/degree, dates), Non-formal education/training (titles, certificates, dates), Certification exams (name, agency, date certified, rating), Most recent academic record or diploma, Work Experience, Employer name and address, Inclusive dates of employment, Status/terms of employment, Functions and responsibilities, Academic, civic/community, and work-related awards (with conferring organizations and dates), Creative works and accomplishments (with validating institutions), Work-related learning activities, Volunteer activities (description, purpose), Travel history (places visited, purposes, learning outcomes) etc.</p>
                        <br>
                        <p>The data you provide will be used solely for the purpose of <strong>evaluating your application to a program under ETEEAP</strong>. Your personal data will be processed fairly and lawfully, accessed only by authorized CLSU personnel, and stored securely with appropriate safeguards to ensure confidentiality, integrity, and availability. Data will be retained only as long as necessary to fulfill the stated purpose. CLSU will not share your personal data with any third party without your knowledge and explicit consent, unless required by law.</p>
                        <br>
                        <p>You have the right to be informed, to access and correct your personal data, to object to or restrict its processing, to withdraw consent at any time, and to seek redress in case of any violation of your rights under the Data Privacy Act.</p>
                        <br>
                        <p>For questions or to exercise your rights, you may contact the CLSU Data Protection Officer at <span class="text-blue-600 underline">dpo@clsu.edu.ph</span>.</p>
                    </div>

                    <!-- Consent Box -->
                    <div class="none consent-section">
                        <p class="text-sm mb-4"><span class="font-bold">CONSENT:</span> I have read and understood the Data Privacy Notice above. I voluntarily consent to the collection, use, and processing of my personal data by CLSU for the purpose of evaluating my ETEEAP application, in accordance with the Data Privacy Act of 2012 (RA 10173).</p>
                        
                        <div class="mb-4">
                            <div class="border-b border-black w-80 min-h-[24px] text-center font-medium">{{ $application->printed_name ?? '' }}</div>
                            <p class="text-xs mt-1">Signature over Printed Name</p>
                        </div>
                        
                        <div class="flex items-baseline gap-2 text-sm">
                            <span>Date:</span>
                            <span class="border-b border-black px-4 min-w-[150px] font-medium">{{ $application->created_at ? $application->created_at->format('F d, Y') : '' }}</span>
                        </div>
                    </div>

                    <!-- Declaration -->
                    <p class="text-sm text-justify mb-6 indent-8">
                        I declare under oath that, the foregoing claims and information I have disclosed are true and correct. Done in
                        <span class="border-b border-black px-2 font-medium">{{ $application->declaration_place ?? '_______________' }}</span>
                        on this
                        <span class="border-b border-black px-2 font-medium">{{ $application->declaration_day ?? '____' }}</span>
                        day of
                        <span class="border-b border-black px-2 font-medium">{{ $application->declaration_month_year ?? '_______________' }}</span>.
                    </p>

                    <!-- Signature -->
                    <div class="mb-6">
                        <p class="font-bold text-sm mb-2">Signed:</p>
                        <div class="text-center mt-8">
                            <div class="border-b border-black w-3/5 mx-auto min-h-[24px] font-medium">{{ $application->printed_name ?? '' }}</div>
                            <p class="text-sm font-bold mt-1">Printed Name and Signature of Applicant</p>
                        </div>
                    </div>

                    <!-- CTC Section -->
                    <div class="text-sm mb-6">
                        <div class="flex items-baseline gap-2 mb-2">
                            <span>Community Tax Certificate:</span>
                            <span class="border-b border-dotted border-black px-2 min-w-[150px] font-medium">{{ $application->community_tax_certificate ?? '' }}</span>
                        </div>
                        <div class="flex items-baseline gap-2">
                            <span>Issued on:</span>
                            <span class="border-b border-dotted border-black px-2 min-w-[100px] font-medium">{{ $application->issued_on ?? '' }}</span>
                            <span class="ml-4">at</span>
                            <span class="border-b border-dotted border-black px-2 min-w-[150px] font-medium">{{ $application->issued_at ?? '' }}</span>
                        </div>
                    </div>

                    <!-- Footer -->
                    <p class="text-xs italic inline-footer">ACA.ETE.YYY.F.001 (Revision No. 1; April 14, 2025)</p>

                </div>
            </div>

            @else
                <div class="glass-card rounded-2xl p-8 text-center">
                    <div class="w-16 h-16 bg-red-500/20 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                        </svg>
                    </div>
                    <p class="text-white font-medium">No application found.</p>
                </div>
            @endif
        </div>

        <!-- Uploaded Requirements Section -->
        <div class="mt-8 no-print">
            <div class="glass-card rounded-2xl overflow-hidden">
                <div class="p-6 border-b border-white/10">
                    <h2 class="text-xl md:text-2xl font-bold text-white flex items-center gap-3">
                        <div class="w-10 h-10 bg-[#F9B233]/20 rounded-xl flex items-center justify-center">
                            <svg class="w-5 h-5 text-[#F9B233]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                        </div>
                        Your Uploaded Requirements
                    </h2>
                    <p class="text-white/60 mt-1 ml-13">Click any image to view it in full size</p>
                </div>
                
                <div class="p-6">
                    @if ($requirement)
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-5 gap-4">
                            @php
                                $requirements = [
                                    'original_school_credentials' => 'Original School Credentials',
                                    'certificate_of_employment' => 'Certificate of Employment',
                                    'nbi_barangay_clearance' => 'NBI / Barangay Clearance',
                                    'recommendation_letter' => 'Recommendation Letter',
                                    'proficiency_certificate' => 'Proficiency Certificate'
                                ];
                            @endphp

                            @foreach ($requirements as $key => $label)
                                <div class="bg-white/5 rounded-xl p-4 border border-white/10">
                                    <p class="text-white font-medium text-sm mb-3 text-center">{{ $label }}</p>
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
                                            $imagePath = $filePaths[0];
                                            // Remove leading 'storage/' if the path already starts with it
                                            if (!str_starts_with($imagePath, 'storage/')) {
                                                $imagePath = 'storage/requirements/' . $imagePath;
                                            }
                                            $fullPath = public_path($imagePath);
                                            
                                            // Check if file is a PDF
                                            $isPdf = strtolower(pathinfo($imagePath, PATHINFO_EXTENSION)) === 'pdf';
                                        @endphp
                                        @if($isPdf)
                                            {{-- PDF File Display --}}
                                            <div class="aspect-square rounded-lg overflow-hidden bg-white/10 flex flex-col items-center justify-center cursor-pointer hover:ring-2 hover:ring-[#F9B233] transition-all"
                                                 onclick="window.open('{{ asset($imagePath) }}', '_blank')">
                                                <svg class="w-12 h-12 text-red-400 mb-2" fill="currentColor" viewBox="0 0 24 24">
                                                    <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8l-6-6zM6 20V4h7v5h5v11H6zm2-6h8v2H8v-2zm0-3h8v2H8v-2zm0 6h5v2H8v-2z"/>
                                                </svg>
                                                <p class="text-white/70 text-xs text-center px-2">PDF Document</p>
                                                <p class="text-[#F9B233] text-xs mt-1">Click to view</p>
                                            </div>
                                        @else
                                            {{-- Image File Display --}}
                                            <div class="aspect-square rounded-lg overflow-hidden bg-white/10 cursor-pointer hover:ring-2 hover:ring-[#F9B233] transition-all"
                                                 onclick="openImageModal('{{ asset($imagePath) }}', '{{ $label }}')">
                                                <img src="{{ asset($imagePath) }}" 
                                                     alt="{{ $label }}" 
                                                     class="w-full h-full object-cover hover:scale-105 transition-transform duration-300"
                                                     onerror="this.parentElement.innerHTML='<div class=\'flex flex-col items-center justify-center h-full\'><svg class=\'w-10 h-10 text-red-400 mb-2\' fill=\'none\' stroke=\'currentColor\' viewBox=\'0 0 24 24\'><path stroke-linecap=\'round\' stroke-linejoin=\'round\' stroke-width=\'2\' d=\'M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z\'/></svg><p class=\'text-red-400 text-xs text-center\'>Image not found</p></div>'">
                                            </div>
                                        @endif
                                        <p class="text-center mt-2">
                                            <a href="{{ asset($imagePath) }}" 
                                               target="_blank"
                                               class="text-[#F9B233] hover:text-[#ffcc66] text-xs inline-flex items-center gap-1">
                                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                                                </svg>
                                                Open in new tab
                                            </a>
                                        </p>
                                    @else
                                        <div class="aspect-square rounded-lg bg-white/5 flex flex-col items-center justify-center">
                                            <svg class="w-10 h-10 text-white/30 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                            </svg>
                                            <p class="text-red-400 text-xs">No file uploaded</p>
                                        </div>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-8">
                            <div class="w-16 h-16 bg-white/10 rounded-full flex items-center justify-center mx-auto mb-4">
                                <svg class="w-8 h-8 text-white/40" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                            </div>
                            <p class="text-white/60 font-medium">No uploaded requirements yet.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>

    </div>
</section>

<!-- Image Modal -->
<div id="imageModal" class="fixed inset-0 z-50 hidden">
    <!-- Backdrop -->
    <div class="absolute inset-0 bg-black/80 backdrop-blur-sm" onclick="closeImageModal()"></div>
    
    <!-- Modal Content -->
    <div class="flex items-center justify-center min-h-screen p-4">
        <div class="relative max-w-4xl w-full">
            <!-- Close Button -->
            <button type="button" onclick="closeImageModal()" class="absolute -top-12 right-0 text-white hover:text-[#F9B233] transition-colors">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
            
            <!-- Image Title -->
            <p id="imageTitle" class="text-white font-medium text-center mb-4"></p>
            
            <!-- Image -->
            <div class="bg-white rounded-xl overflow-hidden shadow-2xl">
                <img id="modalImage" src="" alt="" class="w-full h-auto max-h-[80vh] object-contain">
            </div>
            
            <!-- Open in New Tab Link -->
            <p class="text-center mt-4">
                <a id="imageLink" href="" target="_blank" class="text-[#F9B233] hover:text-[#ffcc66] inline-flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                    </svg>
                    Open in new tab
                </a>
            </p>
        </div>
    </div>
</div>

<style>
    /* Glassmorphism Card */
    .glass-card {
        background: rgba(255, 255, 255, 0.08);
        backdrop-filter: blur(16px);
        -webkit-backdrop-filter: blur(16px);
        border: 1px solid rgba(255, 255, 255, 0.12);
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.15);
    }

    /* Print Styles */
    @media print {
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
        
        .no-print, #imageModal, .glass-card, nav, aside, footer, .no-print * {
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
            margin: 0 !important;
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
        
        table {
            page-break-inside: avoid;
            break-inside: avoid;
        }
        
        tr {
            page-break-inside: avoid;
            break-inside: avoid;
        }
        
        .consent-section {
            page-break-inside: avoid;
            break-inside: avoid;
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
            margin-top: 10px !important;
            margin-bottom: 6px !important;
        }
        
        .print-area h3 {
            font-size: 10pt !important;
            margin-bottom: 4px !important;
        }
        
        .print-area p, .print-area span, .print-area td, .print-area th {
            font-size: 9pt !important;
        }
        
        .print-area .text-xs {
            font-size: 8pt !important;
        }
        
        /* Reduce spacing */
        .print-area .mb-2 {
            margin-bottom: 4px !important;
        }
        
        .print-area .mb-4 {
            margin-bottom: 8px !important;
        }
        
        .print-area .mb-6 {
            margin-bottom: 12px !important;
        }
        
        .print-area .mb-8 {
            margin-bottom: 15px !important;
        }
        
        .print-area .mt-6 {
            margin-top: 10px !important;
        }
        
        .print-area .mt-8 {
            margin-top: 12px !important;
        }
        
        .print-area .p-2 {
            padding: 4px !important;
        }
        
        .print-area .p-4 {
            padding: 8px !important;
        }
        
        /* Tables compact */
        .print-area table {
            margin-bottom: 8px !important;
        }
        
        .print-area th, .print-area td {
            padding: 4px 6px !important;
        }
        
        /* Textarea boxes compact */
        .print-area .min-h-\[40px\] {
            min-height: 25px !important;
        }
        
        .print-area .min-h-\[60px\] {
            min-height: 35px !important;
        }
        
        /* Ensure borders print */
        .border, .border-b, .border-black, [class*="border"] {
            border-color: black !important;
        }
        
        /* Hide wrapper margins */
        #wrapper, #page-wrapper, .wrapper-content, section {
            padding: 0 !important;
            margin: 0 !important;
            background: white !important;
        }
        
        /* Fixed elements removal */
        .fixed {
            position: static !important;
            display: none !important;
        }
        
        /* Ensure images print */
        img {
            max-width: 100% !important;
            page-break-inside: avoid;
        }
        
        /* Header compact */
        .print-header {
            margin-bottom: 10px !important;
        }
        
        .print-header img {
            width: 70px !important;
            height: 70px !important;
        }
        
        .print-header h2 {
            font-size: 24pt !important;
            color: #087A29 !important;
            font-family: 'Times New Roman', serif !important;
        }
        
        .print-header .flex.items-center.justify-center.gap-4 {
            gap: 12px !important;
        }
        
        /* Footer inline */
        .inline-footer {
            margin-top: 15px !important;
        }
    }
    
    @page {
        size: letter;
        margin: 0.4in 0.5in;
    }
</style>

<script>
function openImageModal(src, title) {
    document.getElementById('modalImage').src = src;
    document.getElementById('imageTitle').textContent = title;
    document.getElementById('imageLink').href = src;
    document.getElementById('imageModal').classList.remove('hidden');
    document.body.style.overflow = 'hidden';
}

function closeImageModal() {
    document.getElementById('imageModal').classList.add('hidden');
    document.body.style.overflow = 'auto';
}

// Close modal on Escape key
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        closeImageModal();
    }
});

function printApplication() {
    var printWindow = window.open('', '_blank', 'width=900,height=700');
    
    var logoUrl = '{{ asset("images/cl.png") }}';
    var eteeapLogoUrl = '{{ asset("images/eteeap.png") }}';
    var profileImgUrl = '{{ $application->profile_image ? asset($application->profile_image) : "" }}';
    
    // Application Data
    var appData = {
        lastName: '{{ addslashes($application->last_name ?? "") }}',
        firstName: '{{ addslashes($application->first_name ?? "") }}',
        middleInitial: '{{ $application->middle_name ? substr($application->middle_name, 0, 1) . "." : "" }}',
        address: '{{ addslashes(trim(($application->house_no ?? "") . " " . ($application->street ?? "") . " " . ($application->barangay ?? "") . " " . ($application->city ?? "") . " " . ($application->province ?? ""))) }}',
        zipcode: '{{ $application->zipcode ?? "" }}',
        telephone: '{{ $application->contact_number ?? "" }}',
        birthdate: '{{ $application->birthdate ?? "" }}',
        birthplace: '{{ addslashes($application->birthplace ?? "") }}',
        civilStatus: '{{ $application->civil_status ?? "" }}',
        sex: '{{ $application->sex ?? "" }}',
        language: '{{ addslashes($application->language ?? "") }}',
        degreeProgram: '{{ addslashes($application->displayField("degree_program_field") ?? "") }}',
        firstPriority: '{{ addslashes($application->displayField("first_priority") ?? "") }}',
        secondPriority: '{{ addslashes($application->displayField("second_priority") ?? "") }}',
        thirdPriority: '{{ addslashes($application->displayField("third_priority") ?? "") }}',
        goalsObjectives: `{{ addslashes(str_replace(["\r\n", "\n", "\r"], "\\n", $application->goals_objectives ?? "")) }}`,
        learningActivities: `{{ addslashes(str_replace(["\r\n", "\n", "\r"], "\\n", $application->learning_activities ?? "")) }}`,
        overseasApplicants: `{{ addslashes(str_replace(["\r\n", "\n", "\r"], "\\n", $application->overseas_applicants ?? "")) }}`,
        equivalencyAccreditation: '{{ $application->equivalency_accreditation ?? "" }}',
        accomplishmentDescription: `{{ addslashes(str_replace(["\r\n", "\n", "\r"], "\\n", $application->accomplishment_description ?? "")) }}`,
        dateAccomplished: '{{ $application->date_accomplished ?? "" }}',
        addressOfPublishing: `{{ addslashes(str_replace(["\r\n", "\n", "\r"], "\\n", $application->address_of_publishing ?? "")) }}`,
        leisureActivities: `{{ addslashes(str_replace(["\r\n", "\n", "\r"], "\\n", $application->leisure_activities ?? "")) }}`,
        specialSkills: `{{ addslashes(str_replace(["\r\n", "\n", "\r"], "\\n", $application->special_skills ?? "")) }}`,
        workRelatedActivities: `{{ addslashes(str_replace(["\r\n", "\n", "\r"], "\\n", $application->work_related_activities ?? "")) }}`,
        volunteerActivities: `{{ addslashes(str_replace(["\r\n", "\n", "\r"], "\\n", $application->volunteer_activities ?? "")) }}`,
        travelsCitePlaces: `{{ addslashes(str_replace(["\r\n", "\n", "\r"], "\\n", $application->travels_cite_places ?? "")) }}`,
        essay: `{{ addslashes(str_replace(["\r\n", "\n", "\r"], "\\n", $application->essay ?? "")) }}`,
        declarationPlace: '{{ addslashes($application->declaration_place ?? "") }}',
        declarationDay: '{{ $application->declaration_day ?? "" }}',
        declarationMonthYear: '{{ $application->declaration_month_year ?? "" }}',
        printedName: '{{ addslashes($application->printed_name ?? "") }}',
        communityTaxCertificate: '{{ addslashes($application->community_tax_certificate ?? "") }}',
        issuedOn: '{{ $application->issued_on ?? "" }}',
        issuedAt: '{{ addslashes($application->issued_at ?? "") }}',
        createdAt: '{{ $application->created_at ? $application->created_at->format("F d, Y") : "" }}'
    };
    
    // Education Data
    var formalEducationRows = '';
    @foreach($degree_programs ?? [] as $index => $program)
    formalEducationRows += '<tr><td>{{ addslashes($program) }}</td><td>{{ addslashes($school_addresses[$index] ?? "") }}</td><td>{{ $inclusive_dates[$index] ?? "" }}</td></tr>';
    @endforeach
    if(formalEducationRows === '') formalEducationRows = '<tr><td>&nbsp;</td><td></td><td></td></tr>';
    
    var nonFormalRows = '';
    @foreach($training_programs ?? [] as $index => $program)
    nonFormalRows += '<tr><td>{{ addslashes($program) }}</td><td>{{ addslashes($certificate_obtained[$index] ?? "") }}</td><td>{{ $dates_attendance[$index] ?? "" }}</td></tr>';
    @endforeach
    if(nonFormalRows === '') nonFormalRows = '<tr><td>&nbsp;</td><td></td><td></td></tr>';
    
    var certificationRows = '';
    @foreach($certification_examination ?? [] as $index => $exam)
    certificationRows += '<tr><td>{{ addslashes($exam) }}</td><td>{{ addslashes($certifying_agency[$index] ?? "") }}</td><td>{{ $date_certified[$index] ?? "" }}</td><td>{{ $rating[$index] ?? "" }}</td></tr>';
    @endforeach
    if(certificationRows === '') certificationRows = '<tr><td>&nbsp;</td><td></td><td></td><td></td></tr>';
    
    // Work Experience Data
    var workExpRows = '';
    @foreach($position_designation ?? [] as $index => $position)
    @php
        $datesOfEmp = $dates_of_employment[$index] ?? "";
        // Format dates to "Month Day, Year" format
        $datesOfEmp = preg_replace_callback('/(\d{4})-(\d{2})-(\d{2})/', function($m) {
            return date('F j, Y', strtotime($m[0]));
        }, $datesOfEmp);
        // Replace "Present" with current date in proper format
        $datesOfEmp = preg_replace('/\bPresent\b/i', date('F j, Y'), $datesOfEmp);
    @endphp
    workExpRows += '<div class="work-entry">' +
        '<div class="field-row"><span class="label">1. Position/Designation:</span><span class="value">{{ addslashes($position) }}</span></div>' +
        '<div class="field-row"><span class="label">2. Inclusive Dates of Employment:</span><span class="value">{{ $datesOfEmp }}</span></div>' +
        '<div class="field-row"><span class="label">3. Name and Address of Company:</span><span class="value">{{ addslashes(str_replace(["\r\n", "\n", "\r"], " ", $address_of_company[$index] ?? "")) }}</span></div>' +
        '<div class="field-row"><span class="label">4. Terms/Status of Employment:</span><span class="value">{{ $status_of_employment[$index] ?? "" }}</span></div>' +
        '<div class="field-row"><span class="label">5. Name and Designation of Immediate Supervisor:</span><span class="value">{{ addslashes(str_replace(["\r\n", "\n", "\r"], " ", $designation_of_immediate[$index] ?? "")) }}</span></div>' +
        '<div class="field-row"><span class="label">6. Reason(s) for moving on to the next job:</span><span class="value">{{ addslashes(str_replace(["\r\n", "\n", "\r"], " ", $reasons_for_moving[$index] ?? "")) }}</span></div>' +
        '<div class="textarea-field"><p class="label">7. Describe actual functions and responsibilities in position occupied.</p><div class="textarea-value">{{ addslashes(str_replace(["\r\n", "\n", "\r"], " ", $responsibilities_in_position[$index] ?? "")) }}</div></div>' +
        @if(is_array($case_of_self_employment ?? null) && isset($case_of_self_employment[$index]) && !empty($case_of_self_employment[$index]) && $case_of_self_employment[$index] !== 'N/A')
        '<div class="textarea-field"><p class="label">8. In case of self-employment, name three (3) reference persons:</p><div class="textarea-value">{{ addslashes(str_replace(["\r\n", "\n", "\r"], " ", $case_of_self_employment[$index] ?? "")) }}</div></div>' +
        @endif
        '</div>';
    @endforeach
    
    // Awards Data
    var academicAwardsRows = '';
    @foreach($awards_conferred ?? [] as $index => $award)
    academicAwardsRows += '<tr><td>{{ addslashes($award) }}</td><td>{{ addslashes($conferring_organizations[$index] ?? "") }}</td><td>{{ $date_awarded[$index] ?? "" }}</td></tr>';
    @endforeach
    if(academicAwardsRows === '') academicAwardsRows = '<tr><td>&nbsp;</td><td></td><td></td></tr>';
    
    var communityAwardsRows = '';
    @foreach($community_awards_conferred ?? [] as $index => $award)
    communityAwardsRows += '<tr><td>{{ addslashes($award) }}</td><td>{{ addslashes($community_conferring_organizations[$index] ?? "") }}</td><td>{{ $community_date_awarded[$index] ?? "" }}</td></tr>';
    @endforeach
    if(communityAwardsRows === '') communityAwardsRows = '<tr><td>&nbsp;</td><td></td><td></td></tr>';
    
    var workAwardsRows = '';
    @foreach($work_awards_conferred ?? [] as $index => $award)
    workAwardsRows += '<tr><td>{{ addslashes($award) }}</td><td>{{ addslashes($work_community_conferring_organizations[$index] ?? "") }}</td><td>{{ $work_community_date_awarded[$index] ?? "" }}</td></tr>';
    @endforeach
    if(workAwardsRows === '') workAwardsRows = '<tr><td>&nbsp;</td><td></td><td></td></tr>';
    
    var htmlContent = `<!DOCTYPE html>
<html>
<head>
<title>CLSU ETEEAP Application Form</title>
<style>
@page { size: letter; margin: 10mm 12mm 12mm 12mm; }
* { margin: 0; padding: 0; box-sizing: border-box; }
body { font-family: "Times New Roman", Times, serif; font-size: 10pt; line-height: 1.2; color: #000; background: #fff; }

/* Main Form Table */
.form-table { width: 100%; border-collapse: collapse; border: 2px solid #000; }
.form-table td { border: 1px solid #000; padding: 2px 4px; vertical-align: top; }
.form-table .no-border { border: none; }
.form-table .border-bottom { border-bottom: 1px solid #000; }

/* Header */
.header-cell { text-align: center; padding: 12px; border: none !important; }
.header-row { display: flex; align-items: center; justify-content: center; gap: 15px; }
.header-cell img.logo { width: 80px; height: 80px; vertical-align: middle; }
.header-text { display: inline-block; vertical-align: middle; text-align: left; }
.header-text p { margin: 0; font-size: 10pt; }
.header-text .university { font-weight: bold; font-size: 26pt; color: #087A29; font-family: "Times New Roman", serif; }
.header-text .contact-info { font-size: 10pt; margin-top: 4px; text-align: center; }
.header-subtext { text-align: center; margin-top: -5px; }
.program-title { font-size: 9pt; font-weight: bold; text-align: center; padding: 3px; }

/* Title Row */
.title-row td { padding: 8px; }
.form-title { font-size: 20pt; font-weight: bold; color: #166534; letter-spacing: 2px; }
.photo-box { width: 1in; height: 1in; border: 2px solid #000; text-align: center; display: flex; flex-direction: column; align-items: center; justify-content: center; }
.photo-box img { width: 100%; height: 100%; object-fit: cover; }
.photo-box span { font-size: 14pt; font-weight: bold; color: #991b1b; }
.photo-label { font-size: 9pt; }

/* Section Headers */
.section-header { background: #d9d9d9; font-weight: bold; font-size: 10pt; padding: 3px 5px; }

/* Field Cells */
.label-cell { font-weight: normal; white-space: nowrap; width: auto; padding-right: 5px; }
.value-cell { border-bottom: 1px solid #000 !important; }
.field-label { font-size: 9pt; }
.field-value { font-size: 10pt; min-height: 14px; }

/* Instruction */
.instruction { font-size: 9pt; text-align: justify; padding: 4px 8px; }
.instruction-title { text-align: center; font-weight: bold; text-decoration: underline; font-size: 10pt; }

/* Sub-tables for education, work, etc */
.sub-table { width: 100%; border-collapse: collapse; margin: 0; }
.sub-table th, .sub-table td { border: 1px solid #000; padding: 2px 4px; font-size: 9pt; }
.sub-table th { background: #e8e8e8; font-weight: bold; text-align: center; }

/* Work Experience */
.work-item { margin-bottom: 3px; font-size: 9pt; }
.work-label { font-weight: bold; }

/* Checkboxes */
.checkbox { display: inline-block; width: 12px; height: 12px; border: 1px solid #000; text-align: center; font-size: 10pt; margin-right: 3px; vertical-align: middle; }
.checkbox-row { font-size: 9pt; }

/* Signatures */
.signature-line { border-bottom: 1px solid #000; min-height: 18px; text-align: center; }
.signature-label { font-size: 8pt; text-align: center; }

/* Footer */
.footer { font-size: 8pt; font-style: italic; text-align: center; padding: 3px; border-top: 1px solid #000; }

/* Keep together */
.keep-together { page-break-inside: avoid; }

@media print {
    body { -webkit-print-color-adjust: exact; print-color-adjust: exact; }
    .form-table { page-break-inside: auto; }
    tr { page-break-inside: avoid; }
}
</style>
</head>
<body>

<table class="form-table">
    <!-- HEADER -->
    <tr>
        <td colspan="6" class="header-cell">
            <div class="header-row">
                <img src="${logoUrl}" alt="CLSU Logo" class="logo">
                <span class="university" style="font-weight: bold; font-size: 26pt; color: #087A29; font-family: 'Times New Roman', serif;">Central Luzon State University</span>
            </div>
            <p class="header-subtext">Science City of Muñoz, 3120 Nueva Ecija, Philippines</p>
            <p class="contact-info" style="text-align: center;">☎ (6344) 940-8785 &nbsp;&nbsp;&nbsp;&nbsp; ✉ op@clsu.edu.ph &nbsp;&nbsp;&nbsp;&nbsp; ⊕ clsu.edu.ph</p>
        </td>
    </tr>
    <tr>
        <td colspan="6" class="program-title">EXPANDED TERTIARY EDUCATION EQUIVALENCY AND ACCREDITATION PROGRAM</td>
    </tr>
    
    <!-- TITLE ROW with Instruction -->
    <tr class="title-row">
        <td colspan="6" style="padding: 10px;">
            <div style="display: flex; justify-content: space-between; align-items: flex-start;">
                <div style="flex: 1;">
                    <span class="form-title">APPLICATION FORM</span>
                    <div style="margin-top: 12px;">
                        <p style="font-weight: bold; text-decoration: underline; font-size: 10pt; margin-bottom: 5px;">INSTRUCTION</p>
                        <p style="font-size: 9pt; text-align: justify;">Please type or clearly print your answers to all questions. Provide complete and detailed information required by the questions. All the declarations that you make are under oath. Discovery of any false claim in this application form will disqualify you from participating in the program.</p>
                    </div>
                </div>
                <div style="width: 2in; text-align: center; margin-left: 15px;">
                    <div class="photo-box" style="width: 2in; height: 2in;">
                        ${profileImgUrl ? '<img src="' + profileImgUrl + '" alt="ID Photo">' : '<span>2" x 2"</span><br><span class="photo-label">ID Picture</span>'}
                    </div>
                </div>
            </div>
        </td>
    </tr>
    
    <!-- I. PERSONAL INFORMATION -->
    <tr>
        <td colspan="6" class="section-header">I. PERSONAL INFORMATION</td>
    </tr>
    
    <!-- Name -->
    <tr>
        <td colspan="6" style="padding: 3px 5px;">
            <div style="font-size: 9pt; margin-bottom: 2px;">1. Name:</div>
            <table style="width: 100%; border: none;">
                <tr>
                    <td style="border: none; text-align: center; width: 35%; border-bottom: 1px solid #000;">${appData.lastName}</td>
                    <td style="border: none; text-align: center; width: 35%; border-bottom: 1px solid #000;">${appData.firstName}</td>
                    <td style="border: none; text-align: center; width: 15%; border-bottom: 1px solid #000;">${appData.middleInitial}</td>
                </tr>
                <tr>
                    <td style="border: none; text-align: center; font-size: 8pt;">Last Name</td>
                    <td style="border: none; text-align: center; font-size: 8pt;">First Name</td>
                    <td style="border: none; text-align: center; font-size: 8pt;">M.I.</td>
                </tr>
            </table>
        </td>
    </tr>
    
    <!-- Address -->
    <tr>
        <td colspan="4" style="font-size: 9pt;">2. Address: <span style="border-bottom: 1px solid #000; padding: 0 5px;">${appData.address}</span></td>
        <td colspan="2" style="font-size: 9pt;">Zip Code: <span style="border-bottom: 1px solid #000; padding: 0 5px;">${appData.zipcode}</span></td>
    </tr>
    
    <!-- Telephone, Birthdate -->
    <tr>
        <td colspan="3" style="font-size: 9pt;">3. Telephone No: <span style="border-bottom: 1px solid #000; padding: 0 5px;">${appData.telephone}</span></td>
        <td colspan="3" style="font-size: 9pt;">4. Birthdate: <span style="border-bottom: 1px solid #000; padding: 0 5px;">${appData.birthdate}</span></td>
    </tr>
    
    <!-- Birthplace, Civil Status -->
    <tr>
        <td colspan="3" style="font-size: 9pt;">5. Birthplace: <span style="border-bottom: 1px solid #000; padding: 0 5px;">${appData.birthplace}</span></td>
        <td colspan="3" style="font-size: 9pt;">6. Civil Status: <span style="border-bottom: 1px solid #000; padding: 0 5px;">${appData.civilStatus}</span></td>
    </tr>
    
    <!-- Gender, Language -->
    <tr>
        <td colspan="3" style="font-size: 9pt;">7. Gender: <span style="border-bottom: 1px solid #000; padding: 0 5px;">${appData.sex}</span></td>
        <td colspan="3" style="font-size: 9pt;">8. Language and Dialect Spoken: <span style="border-bottom: 1px solid #000; padding: 0 5px;">${appData.language}</span></td>
    </tr>
    
    <!-- Degree Program -->
    <tr>
        <td colspan="6" style="font-size: 9pt;">9. Degree Program or field being applied for: <span style="border-bottom: 1px solid #000; padding: 0 5px;">${appData.degreeProgram}</span></td>
    </tr>
    
    <!-- Priorities -->
    <tr>
        <td colspan="2" style="font-size: 9pt; padding-left: 20px;">First Priority: <span style="border-bottom: 1px solid #000; padding: 0 5px;">${appData.firstPriority}</span></td>
        <td colspan="2" style="font-size: 9pt;">Second Priority: <span style="border-bottom: 1px solid #000; padding: 0 5px;">${appData.secondPriority}</span></td>
        <td colspan="2" style="font-size: 9pt;">Third Priority: <span style="border-bottom: 1px solid #000; padding: 0 5px;">${appData.thirdPriority}</span></td>
    </tr>
    
    <!-- Goals -->
    <tr>
        <td colspan="6" style="font-size: 9pt;">
            <div>10. Statement of your goals, objectives, or purposes in applying for the degree.</div>
            <div style="border: 1px solid #000; min-height: 25px; padding: 2px 4px; margin-top: 2px;">${appData.goalsObjectives}</div>
        </td>
    </tr>
    
    <!-- Learning Activities -->
    <tr>
        <td colspan="6" style="font-size: 9pt;">
            <div>11. Indicate how much time you plan to devote for personal learning activities so that you can finish the requirements in the prescribed program.</div>
            <div style="border: 1px solid #000; min-height: 20px; padding: 2px 4px; margin-top: 2px;">${appData.learningActivities}</div>
        </td>
    </tr>
    
    <!-- Overseas -->
    <tr>
        <td colspan="6" style="font-size: 9pt;">
            <div>12. For overseas applicants, describe how much you plan to obtain accreditation/equivalency.</div>
            <div style="border: 1px solid #000; min-height: 20px; padding: 2px 4px; margin-top: 2px;">${appData.overseasApplicants}</div>
        </td>
    </tr>
    
    <!-- Equivalency Timeline -->
    <tr>
        <td colspan="6" style="font-size: 9pt;" class="checkbox-row">
            <div>13. How soon do you need to complete equivalency accreditation?</div>
            <div style="margin-left: 15px; margin-top: 2px;">
                <span class="checkbox">${appData.equivalencyAccreditation === 'less than one (1) year' ? '✓' : ''}</span> less than one (1) year
                <span class="checkbox" style="margin-left: 10px;">${appData.equivalencyAccreditation === '1 year' ? '✓' : ''}</span> 1 year
                <span class="checkbox" style="margin-left: 10px;">${appData.equivalencyAccreditation === '2 years' ? '✓' : ''}</span> 2 years
                <span class="checkbox" style="margin-left: 10px;">${appData.equivalencyAccreditation === '3 years' ? '✓' : ''}</span> 3 years
                <span class="checkbox" style="margin-left: 10px;">${appData.equivalencyAccreditation === '4 years' ? '✓' : ''}</span> 4 years
                <span class="checkbox" style="margin-left: 10px;">${appData.equivalencyAccreditation === 'more than 5 years' ? '✓' : ''}</span> more than 5 years
            </div>
        </td>
    </tr>
    
    <!-- II. EDUCATION -->
    <tr>
        <td colspan="6" class="section-header">II. EDUCATION</td>
    </tr>
    
    <!-- Formal Education -->
    <tr>
        <td colspan="6" style="padding: 3px;">
            <div style="font-size: 9pt; font-weight: bold; margin-bottom: 2px;">1. Formal Education</div>
            <table class="sub-table">
                <thead><tr><th style="width: 35%;">Course/Degree Program</th><th style="width: 40%;">Name of School/Address</th><th style="width: 25%;">Inclusive Dates</th></tr></thead>
                <tbody>${formalEducationRows}</tbody>
            </table>
        </td>
    </tr>
    
    <!-- Non-Formal Education -->
    <tr>
        <td colspan="6" style="padding: 3px;">
            <div style="font-size: 9pt; font-weight: bold; margin-bottom: 2px;">2. Non-Formal Education</div>
            <table class="sub-table">
                <thead><tr><th style="width: 35%;">Title of Training Program</th><th style="width: 40%;">Title of Certificate Obtained</th><th style="width: 25%;">Inclusive Dates of Attendance</th></tr></thead>
                <tbody>${nonFormalRows}</tbody>
            </table>
        </td>
    </tr>
    
    <!-- Certification -->
    <tr>
        <td colspan="6" style="padding: 3px;">
            <div style="font-size: 9pt; font-weight: bold; margin-bottom: 2px;">3. Other Certification Examination</div>
            <table class="sub-table">
                <thead><tr><th style="width: 25%;">Title of Certification Examination</th><th style="width: 30%;">Certifying Agency</th><th style="width: 25%;">Date Certified</th><th style="width: 20%;">Rating</th></tr></thead>
                <tbody>${certificationRows}</tbody>
            </table>
            <div style="font-size: 8pt; font-style: italic; margin-top: 2px;">Note: All entries should be supported by authenticated photocopy of appropriate certificates/diploma.</div>
        </td>
    </tr>
    
    <!-- III. PAID WORK AND OTHER EXPERIENCES -->
    <tr>
        <td colspan="6" class="section-header">III. PAID WORK AND OTHER EXPERIENCES</td>
    </tr>
    <tr>
        <td colspan="6" style="padding: 5px; font-size: 9pt;">
            ${workExpRows || '<div style="font-style: italic; color: #666;">No work experience entries.</div>'}
            <div style="font-size: 8pt; font-style: italic; margin-top: 3px;">Note: Use another sheet if necessary, following the above format.</div>
        </td>
    </tr>
    
    <!-- IV. HONORS, AWARDS -->
    <tr>
        <td colspan="6" class="section-header">IV. HONORS, AWARDS, AND CITATIONS RECEIVED</td>
    </tr>
    
    <tr>
        <td colspan="6" style="padding: 3px;">
            <div style="font-size: 9pt; font-weight: bold; margin-bottom: 2px;">1. Academic Award</div>
            <table class="sub-table">
                <thead><tr><th style="width: 35%;">Awards Conferred</th><th style="width: 45%;">Conferring Organizations</th><th style="width: 20%;">Date</th></tr></thead>
                <tbody>${academicAwardsRows}</tbody>
            </table>
        </td>
    </tr>
    
    <tr>
        <td colspan="6" style="padding: 3px;">
            <div style="font-size: 9pt; font-weight: bold; margin-bottom: 2px;">2. Community and Civic Organization Award/Citation</div>
            <table class="sub-table">
                <thead><tr><th style="width: 35%;">Awards Conferred</th><th style="width: 45%;">Conferring Organizations</th><th style="width: 20%;">Date</th></tr></thead>
                <tbody>${communityAwardsRows}</tbody>
            </table>
        </td>
    </tr>
    
    <tr>
        <td colspan="6" style="padding: 3px;">
            <div style="font-size: 9pt; font-weight: bold; margin-bottom: 2px;">3. Work Related Award/Citation</div>
            <table class="sub-table">
                <thead><tr><th style="width: 35%;">Awards Conferred</th><th style="width: 45%;">Conferring Organizations</th><th style="width: 20%;">Date</th></tr></thead>
                <tbody>${workAwardsRows}</tbody>
            </table>
        </td>
    </tr>
    
    <!-- V. CREATIVE WORKS -->
    <tr>
        <td colspan="6" class="section-header">V. CREATIVE WORKS AND SPECIAL ACCOMPLISHMENTS</td>
    </tr>
    <tr>
        <td colspan="6" style="font-size: 9pt; padding: 3px;">
            <div>1. Description:</div>
            <div style="border: 1px solid #000; min-height: 20px; padding: 2px 4px; margin-top: 2px;">${appData.accomplishmentDescription}</div>
        </td>
    </tr>
    <tr>
        <td colspan="3" style="font-size: 9pt;">2. Date Accomplished: <span style="border-bottom: 1px solid #000; padding: 0 5px;">${appData.dateAccomplished}</span></td>
        <td colspan="3" style="font-size: 9pt;">3. Name and Address of Publishing Agency or Association: <span style="border-bottom: 1px solid #000; padding: 0 5px;">${appData.addressOfPublishing}</span></td>
    </tr>
    
    <!-- VI. LIFELONG LEARNING EXPERIENCE -->
    <tr>
        <td colspan="6" class="section-header">VI. LIFELONG LEARNING EXPERIENCE</td>
    </tr>
    <tr>
        <td colspan="6" style="font-size: 8pt; font-style: italic; padding: 2px 5px;">In this section, please indicate the various life experiences from which you must have derived some learning experiences. Please include here unpaid volunteer work.</td>
    </tr>
    
    <tr>
        <td colspan="6" style="font-size: 9pt; padding: 3px;">
            <div><strong>1. Hobbies/Leisure Activities</strong> <span style="font-size: 8pt; font-style: italic;">(Leisure activities which involve rating skills for competition and other purposes may also indicate your level for ease in evaluation.)</span></div>
            <div style="border: 1px solid #000; min-height: 18px; padding: 2px 4px; margin-top: 2px;">${appData.leisureActivities}</div>
        </td>
    </tr>
    
    <tr>
        <td colspan="6" style="font-size: 9pt; padding: 3px;">
            <div><strong>2. Special Skills</strong> <span style="font-size: 8pt; font-style: italic;">(Note down those special skills which you think must be related to the field of study you want to pursue.)</span></div>
            <div style="border: 1px solid #000; min-height: 18px; padding: 2px 4px; margin-top: 2px;">${appData.specialSkills}</div>
        </td>
    </tr>
    
    <tr>
        <td colspan="6" style="font-size: 9pt; padding: 3px;">
            <div><strong>3. Work-Related Activities</strong> <span style="font-size: 8pt; font-style: italic;">(Some work-related activities are occasions for you to learn something new. Please do not include formal training programs you already cited.)</span></div>
            <div style="border: 1px solid #000; min-height: 18px; padding: 2px 4px; margin-top: 2px;">${appData.workRelatedActivities}</div>
        </td>
    </tr>
    
    <tr>
        <td colspan="6" style="font-size: 9pt; padding: 3px;">
            <div><strong>4. Volunteer Activities</strong> <span style="font-size: 8pt; font-style: italic;">(List only volunteer activities that demonstrate learning opportunities, and are related to the course you are applying for credit.)</span></div>
            <div style="border: 1px solid #000; min-height: 18px; padding: 2px 4px; margin-top: 2px;">${appData.volunteerActivities}</div>
        </td>
    </tr>
    
    <tr>
        <td colspan="6" style="font-size: 9pt; padding: 3px;">
            <div><strong>5. Travels: Cite places visited and purpose of travel</strong> <span style="font-size: 8pt; font-style: italic;">(Include write-up of the nature of travel undertaken, whether for leisure, employment, business or other purposes.)</span></div>
            <div style="border: 1px solid #000; min-height: 18px; padding: 2px 4px; margin-top: 2px;">${appData.travelsCitePlaces}</div>
        </td>
    </tr>
    
    <!-- VII. ESSAY -->
    <tr>
        <td colspan="6" class="section-header">VII. Essay: How the degree you are seeking can contribute to your personal development, your community, your workplace, society, and country.</td>
    </tr>
    <tr>
        <td colspan="6" style="padding: 3px;">
            <div style="border: 1px solid #000; min-height: 40px; padding: 3px 5px; font-size: 9pt;">${appData.essay}</div>
        </td>
    </tr>
    
    <!-- DATA PRIVACY NOTICE -->
    <tr>
        <td colspan="6" style="font-size: 8pt; text-align: justify; padding: 5px;">
            <strong>DATA PRIVACY NOTICE.</strong> Central Luzon State University (CLSU) values your privacy and upholds its commitment to protecting personal data in compliance with Republic Act No. 10173, also known as the Data Privacy Act of 2012. The data you provide will be used solely for the purpose of evaluating your application to a program under ETEEAP. Your personal data will be processed fairly and lawfully, accessed only by authorized CLSU personnel, and stored securely with appropriate safeguards. You have the right to be informed, to access and correct your personal data, to object to or restrict its processing, to withdraw consent at any time, and to seek redress in case of any violation of your rights. For questions or to exercise your rights, contact the CLSU Data Protection Officer at dpo@clsu.edu.ph.
        </td>
    </tr>
    
    <!-- CONSENT -->
    <tr>
        <td colspan="6" style="font-size: 9pt; padding: 5px; border: 2px solid #000;">
            <strong>CONSENT:</strong> I have read and understood the Data Privacy Notice above. I voluntarily consent to the collection, use, and processing of my personal data by CLSU for the purpose of evaluating my ETEEAP application, in accordance with the Data Privacy Act of 2012 (RA 10173).
            <table style="width: 100%; margin-top: 10px; border: none;">
                <tr>
                    <td style="border: none; width: 60%;">
                        <div class="signature-line">${appData.printedName}</div>
                        <div class="signature-label">Signature over Printed Name</div>
                    </td>
                    <td style="border: none; width: 40%;">
                        <div class="signature-line">${appData.createdAt}</div>
                        <div class="signature-label">Date</div>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    
    <!-- DECLARATION -->
    <tr>
        <td colspan="6" style="font-size: 9pt; text-align: justify; padding: 5px;">
            I declare under oath that, the foregoing claims and information I have disclosed are true and correct. Done in <span style="border-bottom: 1px solid #000; padding: 0 10px;">${appData.declarationPlace}</span> on this <span style="border-bottom: 1px solid #000; padding: 0 10px;">${appData.declarationDay}</span> day of <span style="border-bottom: 1px solid #000; padding: 0 10px;">${appData.declarationMonthYear}</span>.
        </td>
    </tr>
    
    <!-- SIGNED -->
    <tr>
        <td colspan="6" style="padding: 10px;">
            <div style="font-weight: bold; font-size: 9pt;">Signed:</div>
            <table style="width: 60%; margin: 15px auto 5px auto; border: none;">
                <tr>
                    <td style="border: none; text-align: center;">
                        <div class="signature-line">${appData.printedName}</div>
                        <div class="signature-label" style="font-weight: bold;">Printed Name and Signature of Applicant</div>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    
    <!-- CTC -->
    <tr>
        <td colspan="6" style="font-size: 9pt; padding: 5px;">
            Community Tax Certificate: <span style="border-bottom: 1px solid #000; padding: 0 15px;">${appData.communityTaxCertificate}</span>
            <span style="margin-left: 20px;">Issued on: <span style="border-bottom: 1px solid #000; padding: 0 15px;">${appData.issuedOn}</span></span>
            <span style="margin-left: 20px;">at <span style="border-bottom: 1px solid #000; padding: 0 15px;">${appData.issuedAt}</span></span>
        </td>
    </tr>
    
    <!-- FOOTER -->
    <tr>
        <td colspan="6" class="footer">ACA.ETE.YYY.F.001 (Revision No. 1; April 14, 2025)</td>
    </tr>
</table>

</body>
</html>`;
    
    printWindow.document.write(htmlContent);
    printWindow.document.close();
    
    printWindow.onload = function() {
        setTimeout(function() {
            printWindow.focus();
            printWindow.print();
            printWindow.close();
        }, 500);
    };
}

function printWorkExperience() {
    var printWindow = window.open('', '_blank', 'width=1100,height=800');
    
    var name = '{{ trim(($application->first_name ?? "") . " " . ($application->middle_name ?? "") . " " . ($application->last_name ?? "")) }}';
    var program = '{{ $application->displayField("degree_program_field") ?? "" }}';
    var logoUrl = '{{ asset("images/cl.png") }}';
    
    // Work Experience Data from Database
    @php
        $workExpData = [];
        $totalYears = 0;
        $totalMonths = 0;
        
        if(is_array($position_designation ?? null) && count($position_designation) > 0) {
            foreach($position_designation as $index => $position) {
                $dates = $dates_of_employment[$index] ?? '';
                $years = 0;
                $months = 0;
                
                // Try to calculate years from dates string (format: "YYYY-MM-DD to YYYY-MM-DD" or "YYYY-MM-DD to Present")
                if(preg_match('/(\d{4}-\d{2}-\d{2})\s+to\s+(\d{4}-\d{2}-\d{2}|Present)/i', $dates, $matches)) {
                    $startDate = new DateTime($matches[1]);
                    $endDate = strtolower($matches[2]) === 'present' ? new DateTime() : new DateTime($matches[2]);
                    $interval = $startDate->diff($endDate);
                    $years = $interval->y;
                    $months = $interval->m;
                    $totalYears += $years;
                    $totalMonths += $months;
                }
                
                // Format dates to "Month Day, Year" format and replace "Present" with current date
                $datesForPrint = preg_replace_callback('/(\d{4})-(\d{2})-(\d{2})/', function($m) {
                    return date('F j, Y', strtotime($m[0]));
                }, $dates);
                $datesForPrint = preg_replace('/\bPresent\b/i', date('F j, Y'), $datesForPrint);
                
                $workExpData[] = [
                    'dates' => $datesForPrint,
                    'position' => $position,
                    'company' => $address_of_company[$index] ?? '',
                    'years' => $years,
                    'months' => $months,
                    'responsibilities' => $responsibilities_in_position[$index] ?? ''
                ];
            }
            
            // Convert excess months to years
            $totalYears += floor($totalMonths / 12);
            $totalMonths = $totalMonths % 12;
        }
    @endphp
    
    var workExpRows = '';
    @if(count($workExpData) > 0)
        @foreach($workExpData as $exp)
            workExpRows += '<tr>' +
                '<td>{{ addslashes($exp["dates"]) }}</td>' +
                '<td>{{ addslashes($exp["position"]) }}</td>' +
                '<td>{{ addslashes(str_replace(["\r\n", "\n", "\r"], " ", $exp["company"])) }}</td>' +
                '<td style="text-align:center;">{{ $exp["years"] > 0 || $exp["months"] > 0 ? $exp["years"] . " yr" . ($exp["months"] > 0 ? ", " . $exp["months"] . " mo" : "") : "" }}</td>' +
                '<td>{{ addslashes(str_replace(["\r\n", "\n", "\r"], " ", $exp["responsibilities"])) }}</td>' +
                '</tr>';
        @endforeach
    @endif
    
    // Add empty rows if less than 10
    var rowCount = {{ count($workExpData) }};
    for(var i = rowCount; i < 10; i++) {
        workExpRows += '<tr><td>&nbsp;</td><td></td><td></td><td></td><td></td></tr>';
    }
    
    var totalYearsDisplay = '{{ $totalYears > 0 || $totalMonths > 0 ? $totalYears . " yr" . ($totalMonths > 0 ? ", " . $totalMonths . " mo" : "") : "" }}';
    
    var htmlContent = '<!DOCTYPE html>' +
        '<html>' +
        '<head>' +
        '<title>CLSU ETEEAP - Summary of Relevant Work Experience</title>' +
        '<style>' +
        '@page { size: letter landscape; margin: 8mm 10mm 12mm 10mm; }' +
        '* { margin: 0; padding: 0; box-sizing: border-box; }' +
        'body { font-family: Times New Roman, Times, serif; font-size: 9pt; line-height: 1.2; color: #000; background: #fff; -webkit-print-color-adjust: exact; print-color-adjust: exact; }' +
        '.page { padding: 3mm; }' +
        '.header { display: flex; align-items: center; gap: 12px; margin-bottom: 8px; padding: 10px; }' +
        '.header img { width: 60px; height: 60px; }' +
        '.header-text { text-align: left; }' +
        '.header-text p { margin: 0; font-size: 9pt; }' +
        '.header-text .university { font-weight: bold; font-size: 20pt; color: #087A29; font-family: Times New Roman, serif; }' +
        '.program-title { text-align: center; font-size: 9pt; margin: 3px 0; }' +
        '.form-title { text-align: center; font-weight: bold; font-size: 11pt; margin: 5px 0; }' +
        '.info-table { width: 100%; border-collapse: collapse; margin-bottom: 5px; }' +
        '.info-table td { border: 1px solid #000; padding: 3px 6px; font-size: 9pt; }' +
        '.info-table .label { font-weight: bold; width: 200px; background: #f5f5f5; }' +
        '.main-table { width: 100%; border-collapse: collapse; margin-bottom: 5px; }' +
        '.main-table th, .main-table td { border: 1px solid #000; padding: 3px 5px; text-align: left; vertical-align: top; font-size: 8pt; }' +
        '.main-table th { background: #e8e8e8; font-weight: bold; text-align: center; }' +
        '.main-table td { height: 18px; }' +
        '.total-row td { font-weight: bold; }' +
        '.privacy-notice { font-size: 7pt; text-align: justify; margin: 5px 0; line-height: 1.15; }' +
        '.consent-box { border: 1px solid #000; padding: 6px; margin: 6px 0; font-size: 8pt; page-break-inside: avoid; }' +
        '.signature-section { margin-top: 12px; display: flex; gap: 60px; }' +
        '.signature-field { min-width: 250px; }' +
        '.signature-line { border-bottom: 1px solid #000; min-height: 20px; margin-bottom: 2px; }' +
        '.signature-label { font-size: 7pt; }' +
        '.footer { position: fixed; bottom: 3mm; left: 10mm; font-size: 8pt; font-style: italic; }' +
        '.page-break { page-break-before: always; }' +
        '</style>' +
        '</head>' +
        '<body>' +
        '<div class="page">' +
        '<div class="header">' +
        '<img src="' + logoUrl + '" alt="CLSU Logo">' +
        '<div class="header-text">' +
        '<p class="university">Central Luzon State University</p>' +
        '<p>Science City of Muñoz, 3120 Nueva Ecija, Philippines</p>' +
        '<p style="font-size: 9pt;">☎ (6344) 940-8785 &nbsp;&nbsp;&nbsp; ✉ op@clsu.edu.ph &nbsp;&nbsp;&nbsp; ⊕ clsu.edu.ph</p>' +
        '</div>' +
        '</div>' +
        '<div class="program-title">EXPANDED TERTIARY EDUCATION EQUIVALENCY<br>AND ACCREDITATION PROGRAM (ETEEAP)</div>' +
        '<div class="form-title">SUMMARY OF RELEVANT WORK EXPERIENCE</div>' +
        '<table class="info-table">' +
        '<tr><td class="label">Name:</td><td>' + name + '</td></tr>' +
        '<tr><td class="label">Intended Program Under ETEEAP:</td><td>' + program + '</td></tr>' +
        '</table>' +
        '<table class="main-table">' +
        '<thead><tr>' +
        '<th style="width:11%">Inclusive Date</th>' +
        '<th style="width:14%">Position</th>' +
        '<th style="width:24%">Institution and Address</th>' +
        '<th style="width:9%">Number of Years</th>' +
        '<th style="width:42%">Brief description of duties and responsibilities relevant to the program applied for</th>' +
        '</tr></thead>' +
        '<tbody>' +
        workExpRows +
        '<tr class="total-row"><td colspan="3" style="text-align:right;padding-right:12px;">Total</td><td style="text-align:center;">' + totalYearsDisplay + '</td><td></td></tr>' +
        '</tbody>' +
        '</table>' +
        '<div class="privacy-notice">' +
        '<strong>DATA PRIVACY NOTICE</strong><br>' +
        'Central Luzon State University (CLSU) values your privacy and upholds its commitment to protecting personal data in compliance with Republic Act No. 10173, also known as the Data Privacy Act of 2012. This form collects personal data such as Full name (Last, First, Middle), Inclusive dates of employment, Position/Job Title, Place of work, Number of years of employment, and duties and responsibilities.<br><br>' +
        'The data you provide will be used solely for the purpose of' +
        '</div>' +
        '<div class="footer">ACA.ETE.YYY.F.007 (Revision No. 1; April 14, 2025)</div>' +
        '</div>' +
        '<div class="page page-break">' +
        '<div class="privacy-notice">' +
        '(1) evaluating your application to a program under ETEEAP;<br>' +
        '(2) communicating with you regarding your eligibility, application status, and program requirements;<br>' +
        '(3) verifying submitted information and coordinating with relevant academic units; and<br>' +
        '(4) preparing institutional reports for submission to CHED or other authorized bodies, in compliance with regulatory requirements.<br><br>' +
        'Your personal data will be processed fairly and lawfully, accessed only by authorized CLSU personnel, and stored securely with appropriate safeguards to ensure confidentiality, integrity, and availability. Data will be retained only as long as necessary to fulfill the stated purpose. CLSU will not share your personal data with any third party without your knowledge and explicit consent, unless required by law.<br><br>' +
        'You have the right to be informed, to access and correct your personal data, to object to or restrict its processing, to withdraw consent at any time, and to seek redress in case of any violation of your rights under the Data Privacy Act.<br><br>' +
        'For questions or to exercise your rights, you may contact the CLSU Data Protection Officer at <span style="color:blue;text-decoration:underline;">dpo@clsu.edu.ph</span>.' +
        '</div>' +
        '<div class="consent-box">' +
        '<strong>CONSENT:</strong> I have read and understood the Data Privacy Notice above. I voluntarily consent to the collection, use, and processing of my personal data by CLSU for the purpose of evaluating my ETEEAP application, in accordance with the Data Privacy Act of 2012 (RA 10173).' +
        '<div class="signature-section">' +
        '<div class="signature-field"><div class="signature-line"></div><div class="signature-label">Signature over Printed Name</div></div>' +
        '<div class="signature-field" style="max-width:160px;"><div class="signature-line"></div><div class="signature-label">Date</div></div>' +
        '</div>' +
        '</div>' +
        '<div class="footer">ACA.ETE.YYY.F.007 (Revision No. 1; April 14, 2025)</div>' +
        '</div>' +
        '</body>' +
        '</html>';
    
    printWindow.document.write(htmlContent);
    printWindow.document.close();
    
    printWindow.onload = function() {
        setTimeout(function() {
            printWindow.focus();
            printWindow.print();
            printWindow.close();
        }, 500);
    };
}
</script>

@include('partials.footer')
@endsection