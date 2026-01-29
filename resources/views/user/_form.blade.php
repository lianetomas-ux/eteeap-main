<div data-page="edit" data-user-id="{{ auth()->id() }}">

    <!-- Header -->
    <div class="flex items-center justify-center gap-6 mb-6">
        <div class="flex-shrink-0">
            <img src="{{ asset('images/cl.png') }}" alt="Logo" class="w-24">
        </div>
        <div class="text-center leading-tight">
            <p class="text-lg font-medium text-gray-700">Republic of the Philippines</p>
            <h3 class="text-xl font-bold text-gray-900">CENTRAL LUZON STATE UNIVERSITY</h3>
            <p class="text-lg font-medium text-gray-700">Science City of Muñoz, Nueva Ecija</p>
        </div>
        <div class="flex-shrink-0">
            <img src="{{ asset('images/eteeap.png') }}" alt="Logo" class="w-36">
        </div>
    </div>
    
    <h4 class="text-center text-lg font-semibold text-gray-800 mb-2">EXPANDED TERTIARY EDUCATION EQUIVALENCY AND ACCREDITATION PROGRAM (ETEEAP)</h4>
    <h1 class="text-center text-3xl font-bold text-gray-900 mb-6">APPLICATION FORM</h1>
  
    <!-- Profile Photo -->
    <div class="flex justify-end mb-6">
        <div class="w-48 h-48 border-2 border-gray-400 rounded-lg flex items-center justify-center bg-gray-50">
            @if ($application->profile_image)
                <img src="{{ asset($application->profile_image) }}" alt="Profile Image" class="max-w-full max-h-full object-contain rounded">
            @else
                <span class="text-sm text-gray-400">2x2 Photo</span>
            @endif
        </div>
    </div>
       
    <h2 class="text-center text-2xl font-bold text-gray-900 mb-4">INSTRUCTION</h2>
    <p class="text-gray-700 mb-6 leading-relaxed">Please type or clearly print your answers to all questions. Provide complete and detailed information required by the questions. All the declarations that you make are under oath. Discovery of any false claim in this application form will disqualify you from participating in the program.</p>

    <!-- Personal Information Section -->
    <div class="bg-green-50 border-l-4 border-green-500 px-4 py-2 mb-6">
        <h3 class="text-xl font-bold text-gray-900">Personal Information</h3>
    </div>

    <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700 mb-1">Application ID</label>
        <input type="text" name="id" class="w-32 px-3 py-2 border border-gray-300 rounded-lg bg-gray-100 text-gray-600" value="{{ $application->id }}" readonly>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-2">
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">1. First Name <i class="fas fa-lock text-gray-400 text-xs ml-1" title="Cannot be changed"></i></label>
            <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-lg bg-gray-100 text-gray-600 cursor-not-allowed" value="{{ $application->first_name ?? '' }}" readonly>
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Middle Name <i class="fas fa-lock text-gray-400 text-xs ml-1" title="Cannot be changed"></i></label>
            <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-lg bg-gray-100 text-gray-600 cursor-not-allowed" value="{{ $application->middle_name ?? '' }}" readonly>
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Last Name <i class="fas fa-lock text-gray-400 text-xs ml-1" title="Cannot be changed"></i></label>
            <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-lg bg-gray-100 text-gray-600 cursor-not-allowed" value="{{ $application->last_name ?? '' }}" readonly>
        </div>
    </div>
    <p class="text-xs text-gray-500 mb-4"><i class="fas fa-info-circle mr-1"></i>Name fields cannot be changed to prevent fraud. Contact admin if you need to correct your name.</p>

    <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700 mb-1">Contact Number</label>
        <input type="text" name="contact_number" class="w-full md:w-1/3 px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500" value="{{ $application->contact_number }}">
    </div>

    <!-- Address -->
    <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700 mb-2">2. Address</label>
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-3">
            <div>
                <label class="block text-xs text-gray-500 mb-1">House No.</label>
                <input type="text" name="house_no" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500" value="{{ $application->house_no ?? '' }}">
            </div>
            <div>
                <label class="block text-xs text-gray-500 mb-1">Street</label>
                <input type="text" name="street" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500" value="{{ $application->street ?? '' }}">
            </div>
            <div>
                <label class="block text-xs text-gray-500 mb-1">Barangay</label>
                <input type="text" name="barangay" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500" value="{{ $application->barangay ?? '' }}">
            </div>
            <div>
                <label class="block text-xs text-gray-500 mb-1">City</label>
                <input type="text" name="city" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500" value="{{ $application->city ?? '' }}">
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div>
                <label class="block text-xs text-gray-500 mb-1">Province</label>
                <input type="text" name="province" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500" value="{{ $application->province ?? '' }}">
            </div>
            <div>
                <label class="block text-xs text-gray-500 mb-1">Zip Code</label>
                <input type="text" name="zipcode" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500" value="{{ $application->zipcode ?? '' }}">
            </div>
            <div>
                <label class="block text-xs text-gray-500 mb-1">Country</label>
                <input type="text" name="country" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500" value="{{ $application->country ?? 'Philippines' }}">
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">3. Birthdate</label>
            <input type="text" name="birthdate" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500" value="{{ $application->birthdate }}">
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">4. Birthplace</label>
            <input type="text" name="birthplace" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500" value="{{ $application->birthplace }}">
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">5. Civil Status</label>
            <select name="civil_status" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 bg-white" required>
                <option value="Single" {{ $application->civil_status == 'Single' ? 'selected' : '' }}>Single</option>
                <option value="Married" {{ $application->civil_status == 'Married' ? 'selected' : '' }}>Married</option>
                <option value="Divorced" {{ $application->civil_status == 'Divorced' ? 'selected' : '' }}>Divorced</option>
                <option value="Widowed" {{ $application->civil_status == 'Widowed' ? 'selected' : '' }}>Widowed</option>
            </select>
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">6. Sex</label>
            <select name="sex" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 bg-white" required>
                <option value="Male" {{ $application->sex == 'Male' ? 'selected' : '' }}>Male</option>
                <option value="Female" {{ $application->sex == 'Female' ? 'selected' : '' }}>Female</option>
                <option value="Other" {{ $application->sex == 'Other' ? 'selected' : '' }}>Other</option>
            </select>
        </div>
    </div>

    <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700 mb-1">7. Language and Dialect Spoken</label>
        <input type="text" name="language" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500" value="{{ $application->language }}">
    </div>

    <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700 mb-1">Degree Program Field</label>
        <input type="text" name="degree_program_field" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500" value="{{ $application->displayField('degree_program_field') }}">
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">First Priority</label>
            <input type="text" name="first_priority" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500" value="{{ $application->displayField('first_priority') }}">
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Second Priority</label>
            <input type="text" name="second_priority" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500" value="{{ $application->displayField('second_priority') }}">
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Third Priority</label>
            <input type="text" name="third_priority" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500" value="{{ $application->displayField('third_priority') }}">
        </div>
    </div>

    <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700 mb-1">10. Statement of your goals, objectives, or purposes in applying for the degree</label>
        <textarea name="goals_objectives" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 auto-resize" rows="3">{{ $application->goals_objectives }}</textarea>
    </div>

    <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700 mb-1">11. Indicate how much time you plan to devote for personal learning activities so that you can finish the requirements in the prescribed program. Be specific.</label>
        <textarea name="learning_activities" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 auto-resize" rows="3">{{ $application->learning_activities }}</textarea>
    </div>

    <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700 mb-1">12. For overseas applicants, describe how much you plan to obtain accreditation/equivalency (e.g. when you plan to come to the Philippines)</label>
        <textarea name="overseas_applicants" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 auto-resize" rows="3">{{ $application->overseas_applicants }}</textarea>
    </div>

    <div class="mb-6">
        <label class="block text-sm font-medium text-gray-700 mb-1">13. How soon do you need to complete equivalency accreditation</label>
        <input type="text" name="equivalency_accreditation" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500" value="{{ $application->equivalency_accreditation }}">
    </div>

    <!-- Education Section -->
    <div class="bg-blue-50 border-l-4 border-blue-500 px-4 py-2 mb-4">
        <h3 class="text-xl font-bold text-gray-900">II. Education</h3>
    </div>
    <p class="text-gray-600 mb-4">This section will require you to provide information on your past formal, non-formal and informal learning experiences.</p>

    <!-- 1. Formal Education -->
    <h4 class="text-lg font-semibold text-gray-800 mb-3">1. Formal Education</h4>
    <div class="overflow-x-auto mb-6">
        <table class="w-full border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border border-gray-300 px-4 py-2 text-left text-sm font-semibold text-gray-700">Degree Program</th>
                    <th class="border border-gray-300 px-4 py-2 text-left text-sm font-semibold text-gray-700">School Address</th>
                    <th class="border border-gray-300 px-4 py-2 text-left text-sm font-semibold text-gray-700">Inclusive Dates</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($degree_programs as $index => $program)
                <tr>
                    <td class="border border-gray-300 p-2">
                        <textarea name="degree_program[]" class="w-full px-2 py-1 border border-gray-300 rounded focus:ring-2 focus:ring-green-500 focus:border-green-500 auto-resize">{{ str_replace(['[', ']', '"'], '', $program) }}</textarea>
                    </td>
                    <td class="border border-gray-300 p-2">
                        <textarea name="school_address[]" class="w-full px-2 py-1 border border-gray-300 rounded focus:ring-2 focus:ring-green-500 focus:border-green-500 auto-resize">{{ str_replace(['[', ']', '"'], '', $school_addresses[$index] ?? '') }}</textarea>
                    </td>
                    <td class="border border-gray-300 p-2">
                        <textarea name="inclusive_dates[]" class="w-full px-2 py-1 border border-gray-300 rounded focus:ring-2 focus:ring-green-500 focus:border-green-500 auto-resize">{{ str_replace(['[', ']', '"'], '', $inclusive_dates[$index] ?? '') }}</textarea>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <p class="text-sm text-gray-500 italic mb-6">Note: All entries should be supported by authenticated photocopy of appropriate certificates/diploma obtained from the institution through the program.</p>

    <!-- 2. Non-Formal Education -->
    <h4 class="text-lg font-semibold text-gray-800 mb-2">2. Non-Formal Education</h4>
    <p class="text-gray-600 text-sm mb-3">Non-formal education refers to structured and short-term training programs conducted for a particular purpose such as skills development, values orientation, and the like.</p>
    <div class="overflow-x-auto mb-6">
        <table class="w-full border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border border-gray-300 px-4 py-2 text-left text-sm font-semibold text-gray-700">Title of Training Program</th>
                    <th class="border border-gray-300 px-4 py-2 text-left text-sm font-semibold text-gray-700">Title of Certificate Obtained</th>
                    <th class="border border-gray-300 px-4 py-2 text-left text-sm font-semibold text-gray-700">Inclusive Dates of Attendance</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($training_program as $index => $program)
                <tr>
                    <td class="border border-gray-300 p-2">
                        <textarea name="training_program[]" class="w-full px-2 py-1 border border-gray-300 rounded focus:ring-2 focus:ring-green-500 focus:border-green-500 auto-resize">{{ str_replace(['[', ']', '"'], '', $program) }}</textarea>
                    </td>
                    <td class="border border-gray-300 p-2">
                        <textarea name="certificate_obtained[]" class="w-full px-2 py-1 border border-gray-300 rounded focus:ring-2 focus:ring-green-500 focus:border-green-500 auto-resize">{{ str_replace(['[', ']', '"'], '', $certificate_obtained[$index] ?? '') }}</textarea>
                    </td>
                    <td class="border border-gray-300 p-2">
                        <textarea name="dates_attendance[]" class="w-full px-2 py-1 border border-gray-300 rounded focus:ring-2 focus:ring-green-500 focus:border-green-500 auto-resize">{{ str_replace(['[', ']', '"'], '', $dates_attendance[$index] ?? '') }}</textarea>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <p class="text-sm text-gray-500 italic mb-6">Note: All entries should be supported by authenticated photocopy of appropriate certificates/diploma obtained from the institution through the program.</p>

    <!-- 3. Other Certification Examination -->
    <h4 class="text-lg font-semibold text-gray-800 mb-2">3. Other Certification Examination</h4>
    <p class="text-gray-600 text-sm mb-3">Please give detailed information on certification examinations taken for vocational and other skills.</p>
    <div class="overflow-x-auto mb-6">
        <table class="w-full border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border border-gray-300 px-4 py-2 text-left text-sm font-semibold text-gray-700">Title of Certification Examination</th>
                    <th class="border border-gray-300 px-4 py-2 text-left text-sm font-semibold text-gray-700">Name/Address of Certifying Agency</th>
                    <th class="border border-gray-300 px-4 py-2 text-left text-sm font-semibold text-gray-700">Date Certified</th>
                    <th class="border border-gray-300 px-4 py-2 text-left text-sm font-semibold text-gray-700">Rating</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($date_certified as $index => $program)
                <tr>
                    <td class="border border-gray-300 p-2">
                        <textarea name="certification_examination[]" class="w-full px-2 py-1 border border-gray-300 rounded focus:ring-2 focus:ring-green-500 focus:border-green-500 auto-resize">{{ str_replace(['[', ']', '"'], '', $certification_examination[$index] ?? '') }}</textarea>
                    </td>
                    <td class="border border-gray-300 p-2">
                        <textarea name="certifying_agency[]" class="w-full px-2 py-1 border border-gray-300 rounded focus:ring-2 focus:ring-green-500 focus:border-green-500 auto-resize">{{ str_replace(['[', ']', '"'], '', $certifying_agency[$index] ?? '') }}</textarea>
                    </td>
                    <td class="border border-gray-300 p-2">
                        <textarea name="date_certified[]" class="w-full px-2 py-1 border border-gray-300 rounded focus:ring-2 focus:ring-green-500 focus:border-green-500 auto-resize">{{ str_replace(['[', ']', '"'], '', $program) }}</textarea>
                    </td>
                    <td class="border border-gray-300 p-2">
                        <textarea name="rating[]" class="w-full px-2 py-1 border border-gray-300 rounded focus:ring-2 focus:ring-green-500 focus:border-green-500 auto-resize">{{ str_replace(['[', ']', '"'], '', $rating[$index] ?? '') }}</textarea>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <p class="text-sm text-gray-500 italic mb-6">Note: All entries should be supported by authenticated photocopy of appropriate certificates/diploma obtained from the institution through the program.</p>

    <!-- Work Experience Section -->
    <div class="bg-purple-50 border-l-4 border-purple-500 px-4 py-2 mb-4">
        <h3 class="text-xl font-bold text-gray-900">III. PAID WORK AND OTHER EXPERIENCES</h3>
    </div>

    <div class="space-y-4 mb-6">
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">1. Position/Designation</label>
            <textarea name="position_designation" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 auto-resize" rows="2">{{ $application->displayField('position_designation') }}</textarea>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">2. Inclusive Dates of Employment (Attach service record if any)</label>
            <textarea name="dates_of_employment" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 auto-resize" rows="2">{{ $application->displayField('dates_of_employment') }}</textarea>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">3. Name and Address of Company</label>
            <textarea name="address_of_company" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 auto-resize" rows="2">{{ $application->displayField('address_of_company') }}</textarea>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">4. Terms/Status of Employment</label>
            <textarea name="status_of_employment" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 auto-resize" rows="2">{{ $application->displayField('status_of_employment') }}</textarea>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">5. Name and Designation of Immediate Supervisor</label>
            <textarea name="designation_of_immediate" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 auto-resize" rows="2">{{ $application->displayField('designation_of_immediate') }}</textarea>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">6. Reason(s) for moving on to the next job</label>
            <textarea name="reasons_for_moving" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 auto-resize" rows="2">{{ $application->displayField('reasons_for_moving') }}</textarea>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">7. Describe actual functions and responsibilities in position occupied</label>
            <textarea name="responsibilities_in_position" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 auto-resize" rows="3">{{ $application->displayField('responsibilities_in_position') }}</textarea>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">8. In case of self-employment, name three (3) reference persons</label>
            <textarea name="case_of_self_employment" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 auto-resize" rows="2">{{ $application->displayField('case_of_self_employment') }}</textarea>
        </div>
    </div>

    <p class="text-sm text-gray-500 italic mb-6">Note: Use another sheet if necessary, following the above format.</p>

    <!-- Awards Section -->
    <div class="bg-yellow-50 border-l-4 border-yellow-500 px-4 py-2 mb-4">
        <h3 class="text-xl font-bold text-gray-900">IV. HONORS, AWARDS, AND CITATIONS RECEIVED</h3>
    </div>
    <p class="text-gray-600 mb-4">In this section, please describe all the awards you have received from schools, community and civic organizations, as well as citations for work excellence, outstanding accomplishments, community service, etc.</p>

    <!-- Academic Awards -->
    <h4 class="text-lg font-semibold text-gray-800 mb-3">1. Academic Award</h4>
    <div class="overflow-x-auto mb-6">
        <table class="w-full border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border border-gray-300 px-4 py-2 text-left text-sm font-semibold text-gray-700">Awards Conferred</th>
                    <th class="border border-gray-300 px-4 py-2 text-left text-sm font-semibold text-gray-700">Name and Address of Conferring Organizations</th>
                    <th class="border border-gray-300 px-4 py-2 text-left text-sm font-semibold text-gray-700">Date Awarded</th>
                </tr>
            </thead>
            <tbody id="academicTable">
                @foreach ($awards_conferred as $index => $program)
                <tr>
                    <td class="border border-gray-300 p-2">
                        <textarea name="awards_conferred[]" class="w-full px-2 py-1 border border-gray-300 rounded focus:ring-2 focus:ring-green-500 focus:border-green-500 auto-resize">{{ str_replace(['[', ']', '"'], '', $program) }}</textarea>
                    </td>
                    <td class="border border-gray-300 p-2">
                        <textarea name="conferring_organizations[]" class="w-full px-2 py-1 border border-gray-300 rounded focus:ring-2 focus:ring-green-500 focus:border-green-500 auto-resize">{{ str_replace(['[', ']', '"'], '', $conferring_organizations[$index] ?? '') }}</textarea>
                    </td>
                    <td class="border border-gray-300 p-2">
                        <textarea name="date_awarded[]" class="w-full px-2 py-1 border border-gray-300 rounded focus:ring-2 focus:ring-green-500 focus:border-green-500 auto-resize">{{ str_replace(['[', ']', '"'], '', $date_awarded[$index] ?? '') }}</textarea>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Community Awards -->
    <h4 class="text-lg font-semibold text-gray-800 mb-3">2. Community and Civic Organization Award/Citation</h4>
    <div class="overflow-x-auto mb-6">
        <table class="w-full border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border border-gray-300 px-4 py-2 text-left text-sm font-semibold text-gray-700">Awards Conferred</th>
                    <th class="border border-gray-300 px-4 py-2 text-left text-sm font-semibold text-gray-700">Name and Address of Conferring Organizations</th>
                    <th class="border border-gray-300 px-4 py-2 text-left text-sm font-semibold text-gray-700">Date Awarded</th>
                </tr>
            </thead>
            <tbody id="communityTable">
                @foreach ($community_awards_conferred as $index => $program)
                <tr>
                    <td class="border border-gray-300 p-2">
                        <textarea name="community_awards_conferred[]" class="w-full px-2 py-1 border border-gray-300 rounded focus:ring-2 focus:ring-green-500 focus:border-green-500 auto-resize">{{ str_replace(['[', ']', '"'], '', $program) }}</textarea>
                    </td>
                    <td class="border border-gray-300 p-2">
                        <textarea name="community_conferring_organizations[]" class="w-full px-2 py-1 border border-gray-300 rounded focus:ring-2 focus:ring-green-500 focus:border-green-500 auto-resize">{{ str_replace(['[', ']', '"'], '', $community_conferring_organizations[$index] ?? '') }}</textarea>
                    </td>
                    <td class="border border-gray-300 p-2">
                        <textarea name="community_date_awarded[]" class="w-full px-2 py-1 border border-gray-300 rounded focus:ring-2 focus:ring-green-500 focus:border-green-500 auto-resize">{{ str_replace(['[', ']', '"'], '', $community_date_awarded[$index] ?? '') }}</textarea>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Work Awards -->
    <h4 class="text-lg font-semibold text-gray-800 mb-3">3. Work Related Award/Citation</h4>
    <div class="overflow-x-auto mb-6">
        <table class="w-full border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border border-gray-300 px-4 py-2 text-left text-sm font-semibold text-gray-700">Awards Conferred</th>
                    <th class="border border-gray-300 px-4 py-2 text-left text-sm font-semibold text-gray-700">Name and Address of Conferring Organizations</th>
                    <th class="border border-gray-300 px-4 py-2 text-left text-sm font-semibold text-gray-700">Date Awarded</th>
                </tr>
            </thead>
            <tbody id="workTable">
                @foreach ($work_awards_conferred as $index => $program)
                <tr>
                    <td class="border border-gray-300 p-2">
                        <textarea name="work_awards_conferred[]" class="w-full px-2 py-1 border border-gray-300 rounded focus:ring-2 focus:ring-green-500 focus:border-green-500 auto-resize">{{ str_replace(['[', ']', '"'], '', $program) }}</textarea>
                    </td>
                    <td class="border border-gray-300 p-2">
                        <textarea name="work_community_conferring_organizations[]" class="w-full px-2 py-1 border border-gray-300 rounded focus:ring-2 focus:ring-green-500 focus:border-green-500 auto-resize">{{ str_replace(['[', ']', '"'], '', $work_community_conferring_organizations[$index] ?? '') }}</textarea>
                    </td>
                    <td class="border border-gray-300 p-2">
                        <textarea name="work_community_date_awarded[]" class="w-full px-2 py-1 border border-gray-300 rounded focus:ring-2 focus:ring-green-500 focus:border-green-500 auto-resize">{{ str_replace(['[', ']', '"'], '', $work_community_date_awarded[$index] ?? '') }}</textarea>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Creative Works Section -->
    <div class="bg-pink-50 border-l-4 border-pink-500 px-4 py-2 mb-4">
        <h3 class="text-xl font-bold text-gray-900">V. CREATIVE WORKS AND SPECIAL ACCOMPLISHMENTS</h3>
    </div>
    <p class="text-gray-600 text-sm mb-4">In this section, enumerate the various creative works you have accomplished and other special accomplishments. Examples of these are inventions, published and unpublished literary fiction and nonfiction writings, musical work, products of visual performing arts, exceptional accomplishments in sports, social, cultural and leisure activities, etc. which can lead one to conclude the level of expertise you have obtained on certain field of interest. Include also participation in competitions and prizes obtained.</p>

    <div class="space-y-4 mb-6">
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">1. Description</label>
            <textarea name="accomplishment_description" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 auto-resize" rows="3">{{ $application->accomplishment_description }}</textarea>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">2. Date Accomplished</label>
            <textarea name="date_accomplished" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 auto-resize" rows="2">{{ $application->date_accomplished }}</textarea>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">3. Name and Address of Publishing Agency (if written, published work), or an Association/institution which can attest to the quality of the work</label>
            <textarea name="address_of_publishing" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 auto-resize" rows="2">{{ $application->address_of_publishing }}</textarea>
        </div>
    </div>

    <p class="text-sm text-gray-500 italic mb-6">Note: Use additional sheet if necessary, following the same format.</p>

    <!-- Lifelong Learning Section -->
    <div class="bg-teal-50 border-l-4 border-teal-500 px-4 py-2 mb-4">
        <h3 class="text-xl font-bold text-gray-900">VI. LIFELONG LEARNING EXPERIENCE</h3>
    </div>
    <p class="text-gray-600 mb-4">In this section, please indicate the various life experiences from which you must have derived some learning experiences. Please include here unpaid volunteer work.</p>

    <div class="space-y-4 mb-6">
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">1. Hobbies/Leisure Activities</label>
            <textarea name="leisure_activities" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 auto-resize" rows="2">{{ $application->leisure_activities }}</textarea>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">2. Special Skills</label>
            <textarea name="special_skills" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 auto-resize" rows="2">{{ $application->special_skills }}</textarea>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">3. Work-Related Activities</label>
            <textarea name="work_related_activities" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 auto-resize" rows="2">{{ $application->work_related_activities }}</textarea>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">4. Volunteer Activities</label>
            <textarea name="volunteer_activities" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 auto-resize" rows="2">{{ $application->volunteer_activities }}</textarea>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">5. Travels: Cite places visited and purpose of travel</label>
            <p class="text-xs text-gray-500 mb-2">Include write-up of the nature of travel undertaken, whether for leisure, employment, business or other purposes. State in clear terms what new learning experiences was obtained from these travels and how it helped you become a better person.</p>
            <textarea name="travels_cite_places" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 auto-resize" rows="3">{{ $application->travels_cite_places }}</textarea>
        </div>
    </div>

    <!-- Declaration Section -->
    <div class="bg-gray-100 rounded-lg p-6 mb-6">
        <p class="text-gray-700 leading-relaxed">
            I declare under oath that the foregoing claims and information I have disclosed are true and correct.
            Done in <input type="text" name="declaration_place" class="inline-block w-40 px-2 py-1 border border-gray-300 rounded focus:ring-2 focus:ring-green-500 focus:border-green-500" value="{{ $application->declaration_place }}">
            on this <input type="text" name="declaration_day" class="inline-block w-16 px-2 py-1 border border-gray-300 rounded focus:ring-2 focus:ring-green-500 focus:border-green-500" value="{{ $application->declaration_day }}">
            day of <input type="text" name="declaration_month_year" class="inline-block w-40 px-2 py-1 border border-gray-300 rounded focus:ring-2 focus:ring-green-500 focus:border-green-500" value="{{ $application->declaration_month_year }}">.
        </p>
    </div>

    <h4 class="text-lg font-semibold text-gray-800 mb-4">Signed:</h4>

    <div class="space-y-4 mb-6">
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Printed Name and Signature of Applicant</label>
            <input type="text" name="printed_name" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500" value="{{ old('printed_name', $application->printed_name) }}">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Community Tax Certificate</label>
            <input type="text" name="community_tax_certificate" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500" value="{{ old('community_tax_certificate', $application->community_tax_certificate) }}">
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Issued on</label>
                <input type="date" name="issued_on" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500" value="{{ old('issued_on', $application->issued_on) }}">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Issued at</label>
                <input type="text" name="issued_at" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500" value="{{ old('issued_at', $application->issued_at) }}">
            </div>
        </div>
    </div>

    <!-- Requirements Upload Section -->
    <div class="bg-orange-50 border-l-4 border-orange-500 px-4 py-2 mb-6">
        <h3 class="text-xl font-bold text-gray-900">Edit Uploaded Requirements</h3>
    </div>

    @php
        $fields = [
            'original_school_credentials' => 'Original School Credentials',
            'certificate_of_employment' => 'Certificate of Employment',
            'nbi_barangay_clearance' => 'NBI/Barangay Clearance',
            'recommendation_letter' => 'Recommendation Letter',
            'proficiency_certificate' => 'Proficiency Certificate'
        ];
    @endphp

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
        @foreach($fields as $name => $label)
            <div class="bg-white border border-gray-200 rounded-xl shadow-sm p-4">
                <label for="{{ $name }}" class="block text-sm font-semibold text-gray-700 mb-2">{{ $label }}</label>
                <input 
                    type="file" 
                    name="requirements[{{ $name }}]" 
                    id="{{ $name }}" 
                    data-field="{{ $name }}"
                    class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-medium file:bg-green-50 file:text-green-700 hover:file:bg-green-100 fileInput"
                    accept=".jpg,.jpeg,.png,.pdf"
                >
                <div class="mt-3 text-center">
                    @php
                        // Decode JSON array to get file paths
                        $rawValue = (!empty($requirement) && !empty($requirement->$name)) ? $requirement->$name : null;
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
                            $isPdf = strtolower(pathinfo($filePath, PATHINFO_EXTENSION)) === 'pdf';
                        @endphp
                        @if($isPdf)
                            {{-- PDF File Display --}}
                            <a href="{{ asset($filePath) }}" target="_blank" class="inline-flex flex-col items-center p-4 bg-red-50 rounded-lg border border-red-200 hover:bg-red-100 transition">
                                <svg class="w-12 h-12 text-red-500 mb-2" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8l-6-6zM6 20V4h7v5h5v11H6zm2-6h8v2H8v-2zm0-3h8v2H8v-2zm0 6h5v2H8v-2z"/>
                                </svg>
                                <span class="text-red-600 text-sm font-medium">PDF Document</span>
                                <span class="text-red-500 text-xs mt-1">Click to view</span>
                            </a>
                            <p class="text-xs text-gray-500 mt-2">Current: {{ basename($filePath) }}</p>
                        @else
                            {{-- Image File Display --}}
                            <a href="{{ asset($filePath) }}" target="_blank">
                                <img src="{{ asset($filePath) }}" class="max-h-40 mx-auto rounded-lg shadow hover:opacity-75 transition clickable-image cursor-pointer">
                            </a>
                            <p class="text-xs text-gray-500 mt-2">Current: {{ basename($filePath) }}</p>
                        @endif
                    @else
                        <p class="text-sm text-red-500">No file uploaded.</p>
                    @endif
                    <img 
                        id="preview_{{ $name }}" 
                        class="previewImage max-h-40 mx-auto rounded-lg shadow mt-2 cursor-pointer clickable-image hidden"
                        src="" 
                        data-bs-toggle="modal" 
                        data-bs-target="#imageModal"
                    >
                    <p id="filename_{{ $name }}" class="text-xs text-gray-500 mt-2 hidden"></p>
                    <button type="button" class="mt-2 px-3 py-1 text-sm text-red-600 border border-red-300 rounded-lg hover:bg-red-50 transition clearBtn hidden" data-field="{{ $name }}">Clear</button>
                </div>
                @error('requirements.' . $name)
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>
        @endforeach
    </div>

    <!-- Modal for image preview -->
    <div class="fixed inset-0 bg-black bg-opacity-50 z-50 hidden" id="imageModal">
        <div class="flex items-center justify-center min-h-screen p-4">
            <div class="bg-white rounded-xl shadow-2xl max-w-4xl max-h-[90vh] overflow-auto">
                <div class="p-4 text-center">
                    <img id="modalImage" src="" class="max-w-full max-h-[80vh] mx-auto rounded-lg">
                </div>
                <div class="p-4 border-t text-center">
                    <button type="button" onclick="document.getElementById('imageModal').classList.add('hidden')" class="px-4 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600 transition">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('.fileInput').forEach(function(input) {
            input.addEventListener('change', function(e) {
                const field = this.getAttribute('data-field');
                const preview = document.getElementById('preview_' + field);
                const file = this.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        preview.src = e.target.result;
                        preview.classList.remove('hidden');
                    };
                    reader.readAsDataURL(file);
                } else {
                    preview.src = '';        
                    preview.classList.add('hidden');
                }
            });
        });
        document.querySelectorAll('.clickable-image').forEach(function(img) {
            img.addEventListener('click', function() {
                document.getElementById('modalImage').src = this.src;
                document.getElementById('imageModal').classList.remove('hidden');
            });
        });
    });
    </script>
</div>
