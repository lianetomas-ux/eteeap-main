@extends('layouts.app')

@section('content')

<div class="min-h-screen bg-gradient-to-br from-gray-50 to-green-50">
    <div class="py-8 lg:py-12 px-4 sm:px-6 lg:px-8">
        
        <body data-page="create" data-user-id="{{ auth()->id() }}">

        <form action="{{ route('application.store') }}" method="POST" enctype="multipart/form-data" id="multiStepForm">
            @csrf
           
            <input type="hidden" name="region" id="final_region">
            <input type="hidden" name="province" id="final_province">
            <input type="hidden" name="city" id="final_city">
            <input type="hidden" name="barangay" id="final_barangay">

            <div class="max-w-5xl mx-auto">
                <div class="bg-white rounded-2xl shadow-xl border-t-4 border-green-500 overflow-hidden">
                    
                    <!-- Header Section -->
                    <div class="p-6 bg-white">
                        <div class="flex flex-col md:flex-row items-center justify-center gap-4 mb-6">
                            <img src="{{ asset('images/cl.png') }}" alt="CLSU Logo" class="w-20 h-20 object-contain">
                            <div class="text-center">
                                <p class="text-sm text-gray-500 uppercase tracking-wide">Republic of the Philippines</p>
                                <h1 class="text-xl md:text-2xl font-bold text-gray-800">CENTRAL LUZON STATE UNIVERSITY</h1>
                                <p class="text-sm text-gray-500">Science City of Muñoz, Nueva Ecija</p>
                            </div>
                            <img src="{{ asset('images/eteeap.png') }}" alt="ETEEAP Logo" class="h-14 object-contain">
                        </div>

                        <hr class="border-gray-200">

                        <!-- Step Progress Bar -->
                        <div class="py-8">
                            <div class="flex justify-between items-center">
                                <div class="step-indicator active flex flex-col items-center flex-1 cursor-pointer relative z-10" data-step="1">
                                    <div class="step-circle w-10 h-10 md:w-12 md:h-12 rounded-full bg-green-500 text-white flex items-center justify-center font-bold text-sm md:text-base border-2 border-green-500 transition-all shadow-lg">1</div>
                                    <div class="step-label hidden md:block mt-2 text-xs font-semibold text-green-600 text-center">Photo & Docs</div>
                                </div>
                                <div class="step-line flex-1 h-1 bg-gray-200 -mx-1 relative z-0"></div>
                                <div class="step-indicator flex flex-col items-center flex-1 cursor-pointer relative z-10" data-step="2">
                                    <div class="step-circle w-10 h-10 md:w-12 md:h-12 rounded-full bg-white text-gray-400 flex items-center justify-center font-bold text-sm md:text-base border-2 border-gray-200 transition-all">2</div>
                                    <div class="step-label hidden md:block mt-2 text-xs font-semibold text-gray-400 text-center">Personal Info</div>
                                </div>
                                <div class="step-line flex-1 h-1 bg-gray-200 -mx-1 relative z-0"></div>
                                <div class="step-indicator flex flex-col items-center flex-1 cursor-pointer relative z-10" data-step="3">
                                    <div class="step-circle w-10 h-10 md:w-12 md:h-12 rounded-full bg-white text-gray-400 flex items-center justify-center font-bold text-sm md:text-base border-2 border-gray-200 transition-all">3</div>
                                    <div class="step-label hidden md:block mt-2 text-xs font-semibold text-gray-400 text-center">Education</div>
                                </div>
                                <div class="step-line flex-1 h-1 bg-gray-200 -mx-1 relative z-0"></div>
                                <div class="step-indicator flex flex-col items-center flex-1 cursor-pointer relative z-10" data-step="4">
                                    <div class="step-circle w-10 h-10 md:w-12 md:h-12 rounded-full bg-white text-gray-400 flex items-center justify-center font-bold text-sm md:text-base border-2 border-gray-200 transition-all">4</div>
                                    <div class="step-label hidden md:block mt-2 text-xs font-semibold text-gray-400 text-center">Work Exp</div>
                                </div>
                                <div class="step-line flex-1 h-1 bg-gray-200 -mx-1 relative z-0"></div>
                                <div class="step-indicator flex flex-col items-center flex-1 cursor-pointer relative z-10" data-step="5">
                                    <div class="step-circle w-10 h-10 md:w-12 md:h-12 rounded-full bg-white text-gray-400 flex items-center justify-center font-bold text-sm md:text-base border-2 border-gray-200 transition-all">5</div>
                                    <div class="step-label hidden md:block mt-2 text-xs font-semibold text-gray-400 text-center">Awards</div>
                                </div>
                                <div class="step-line flex-1 h-1 bg-gray-200 -mx-1 relative z-0"></div>
                                <div class="step-indicator flex flex-col items-center flex-1 cursor-pointer relative z-10" data-step="6">
                                    <div class="step-circle w-10 h-10 md:w-12 md:h-12 rounded-full bg-white text-gray-400 flex items-center justify-center font-bold text-sm md:text-base border-2 border-gray-200 transition-all">6</div>
                                    <div class="step-label hidden md:block mt-2 text-xs font-semibold text-gray-400 text-center">Creative Works</div>
                                </div>
                                <div class="step-line flex-1 h-1 bg-gray-200 -mx-1 relative z-0"></div>
                                <div class="step-indicator flex flex-col items-center flex-1 cursor-pointer relative z-10" data-step="7">
                                    <div class="step-circle w-10 h-10 md:w-12 md:h-12 rounded-full bg-white text-gray-400 flex items-center justify-center font-bold text-sm md:text-base border-2 border-gray-200 transition-all">7</div>
                                    <div class="step-label hidden md:block mt-2 text-xs font-semibold text-gray-400 text-center">Declaration</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="p-6 bg-white">
                        
                        <!-- Step 1: Photo & Documents -->
                        <div class="form-step" id="step-1">
                            <div class="text-center mb-8">
                                <h3 class="inline-block text-lg md:text-xl font-bold text-green-700 uppercase tracking-wide border-b-4 border-green-500 pb-2">
                                    <i class="fas fa-camera mr-2"></i> Photo & Required Documents
                                </h3>
                            </div>
                            
                            <div class="flex justify-center mt-6">
                                <div class="text-center">
                                    <div class="bg-gray-50 rounded-xl p-6 shadow-sm border border-gray-100">
                                        <div id="preview-box" class="w-44 h-44 border-2 border-dashed border-gray-300 rounded-lg flex items-center justify-center overflow-hidden mx-auto bg-white">
                                            <img id="image-preview" src="#" alt="Preview" class="hidden w-full h-full object-cover" />
                                            <span class="text-gray-400 text-sm" id="placeholder-text">Photo Preview</span>
                                        </div>
                                        <label class="block mt-4 mb-2 font-bold text-gray-700">2x2 ID Picture <span class="text-red-500">*</span></label>
                                        <input type="file" name="profile_image" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-green-50 file:text-green-700 hover:file:bg-green-100 cursor-pointer" accept="image/*" required onchange="previewImage(event)">
                                    </div>
                                </div>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-8">
                                @php
                                    $fields = [
                                        'original_school_credentials' => 'Original School Credentials',
                                        'certificate_of_employment' => 'Certificate of Employment',
                                        'nbi_barangay_clearance' => 'NBI/Barangay Clearance',
                                        'recommendation_letter' => 'Recommendation Letter',
                                        'proficiency_certificate' => 'Proficiency Certificate'
                                    ];
                                @endphp
                                @foreach($fields as $name => $label)
                                    <div class="bg-gray-50 rounded-xl p-5 border border-gray-100 shadow-sm">
                                        <label class="block font-bold text-gray-700 mb-3">{{ $label }} <span class="text-red-500">*</span></label>
                                        
                                        <div id="wrapper_{{ $name }}">
                                            <div class="flex items-center gap-2 mb-2">
                                                <span class="inline-flex items-center px-3 py-2 bg-green-500 text-white rounded-l-lg">
                                                    <i class="fas fa-file-upload"></i>
                                                </span>
                                                <input type="file" name="{{ $name }}[]" class="flex-1 block w-full text-sm text-gray-500 border border-gray-300 rounded-r-lg py-2 px-3 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent" accept=".jpg,.jpeg,.png,.pdf" required>
                                            </div>
                                        </div>

                                        <button type="button" class="add-file-btn mt-2 inline-flex items-center gap-1 px-3 py-1.5 text-sm font-medium text-green-600 border border-green-500 rounded-lg hover:bg-green-50 transition-colors" data-target="{{ $name }}">
                                            <i class="fas fa-plus-circle"></i> Add Another File
                                        </button>
                                        <p class="text-xs text-gray-500 mt-2"><i class="fas fa-info-circle"></i> Upload files separately (e.g., File 1, then add File 2).</p>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- Step 2: Personal Information -->
                        <div class="form-step hidden" id="step-2">
                            <div class="text-center mb-8">
                                <h3 class="inline-block text-lg md:text-xl font-bold text-green-700 uppercase tracking-wide border-b-4 border-green-500 pb-2">
                                    <i class="fas fa-user mr-2"></i> I. Personal Information
                                </h3>
                            </div>

                            <div class="space-y-6">
                                <h5 class="text-green-600 font-bold text-lg border-b-2 border-green-200 pb-2">Basic Details</h5>
                                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">First Name <span class="text-red-500">*</span></label>
                                        <input type="text" name="first_name" value="{{ $user->first_name ?? '' }}" class="w-full px-4 py-3 border border-gray-300 rounded-lg bg-gray-100 cursor-not-allowed" readonly required>
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Middle Name <span class="text-gray-400 text-xs">(Optional)</span></label>
                                        <input type="text" name="middle_name" value="{{ $user->middle_name ?? '' }}" class="w-full px-4 py-3 border border-gray-300 rounded-lg bg-gray-100 cursor-not-allowed" readonly>
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Last Name <span class="text-red-500">*</span></label>
                                        <input type="text" name="last_name" value="{{ $user->surname ?? '' }}" class="w-full px-4 py-3 border border-gray-300 rounded-lg bg-gray-100 cursor-not-allowed" readonly required>
                                    </div>
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">1. Contact Number <span class="text-red-500">*</span></label>
                                    <input type="text" name="contact_number" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all" required>
                                </div>

                                <h5 class="text-green-600 font-bold text-lg border-b-2 border-green-200 pb-2 mt-6">Address & Origin</h5>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">2. Address <span class="text-red-500">*</span></label>
                                    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                                        <div>
                                            <label class="block text-xs text-gray-500 mb-1">House No.</label>
                                            <input type="text" name="house_no" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all" required>
                                        </div>
                                        <div>
                                            <label class="block text-xs text-gray-500 mb-1">Street/Subdivision</label>
                                            <input type="text" name="street" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all" required>
                                        </div>
                                        <div>
                                            <label class="block text-xs text-gray-500 mb-1">Country</label>
                                            <select name="country" id="country_selector" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all bg-white cursor-pointer" required>
                                                <option value="" disabled selected>Select Country</option>
                                                <option value="Philippines">Philippines</option>
                                                <option value="Others">Others</option>
                                            </select>
                                        </div>
                                        <div>
                                            <label class="block text-xs text-gray-500 mb-1">Zipcode</label>
                                            <input type="text" name="zipcode" id="zipcode_field" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all" placeholder="Enter Zipcode" required>
                                        </div>
                                    </div>
                                    
                                    <div id="ph_address_fields" class="hidden grid grid-cols-1 md:grid-cols-4 gap-4 mt-4">
                                        <div>
                                            <label class="block text-xs text-gray-500 mb-1">Region</label>
                                            <select id="region_selector" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all bg-white cursor-pointer">
                                                <option value="" disabled selected>Select Region</option>
                                            </select>
                                        </div>
                                        <div>
                                            <label class="block text-xs text-gray-500 mb-1">Province</label>
                                            <select id="province_selector" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all bg-white cursor-pointer disabled:bg-gray-100" disabled>
                                                <option value="" disabled selected>Select Province</option>
                                            </select>
                                        </div>
                                        <div>
                                            <label class="block text-xs text-gray-500 mb-1">City/Municipality</label>
                                            <select id="city_selector" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all bg-white cursor-pointer disabled:bg-gray-100" disabled>
                                                <option value="" disabled selected>Select City</option>
                                            </select>
                                        </div>
                                        <div>
                                            <label class="block text-xs text-gray-500 mb-1">Barangay</label>
                                            <select id="barangay_selector" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all bg-white cursor-pointer disabled:bg-gray-100" disabled>
                                                <option value="" disabled selected>Select Barangay</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div id="other_address_fields" class="hidden grid grid-cols-1 md:grid-cols-3 gap-4 mt-4">
                                        <input type="text" id="input_province" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all" placeholder="Province/State">
                                        <input type="text" id="input_city" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all" placeholder="City">
                                        <input type="text" id="input_barangay" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all" placeholder="Barangay">
                                    </div>
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">3. Birthdate <span class="text-red-500">*</span></label>
                                        <input type="date" name="birthdate" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all" required>
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">4. Birthplace <span class="text-red-500">*</span></label>
                                        <input type="text" name="birthplace" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all" required>
                                    </div>
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">5. Civil Status <span class="text-red-500">*</span></label>
                                        <select name="civil_status" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all bg-white cursor-pointer" required>
                                            <option value="Single">Single</option>
                                            <option value="Married">Married</option>
                                        </select>
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">6. Sex <span class="text-red-500">*</span></label>
                                        <select name="sex" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all bg-white cursor-pointer" required>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">7. Language Spoken <span class="text-red-500">*</span></label>
                                        <input type="text" name="language" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all" required>
                                    </div>
                                </div>

                                <h5 class="text-green-600 font-bold text-lg border-b-2 border-green-200 pb-2 mt-6">Program Application</h5>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Degree Program <span class="text-red-500">*</span></label>
                                    <input type="text" name="degree_program_field" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all" required>
                                </div>
                                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">First Priority <span class="text-red-500">*</span></label>
                                        <input type="text" name="first_priority" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all" required>
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Second Priority <span class="text-red-500">*</span></label>
                                        <input type="text" name="second_priority" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all" required>
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Third Priority <span class="text-red-500">*</span></label>
                                        <input type="text" name="third_priority" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all" required>
                                    </div>
                                </div>
                                
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">10. Statement of Goals <span class="text-red-500">*</span></label>
                                    <textarea name="goals_objectives" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all" rows="3" required></textarea>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">11. Time for Learning <span class="text-red-500">*</span></label>
                                    <textarea name="learning_activities" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all" rows="3" required></textarea>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">12. Overseas Accreditation Plans <span class="text-red-500">*</span></label>
                                    <textarea name="overseas_applicants" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all" rows="3" required></textarea>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">13. Accreditation Timeline <span class="text-red-500">*</span></label>
                                    <select name="equivalency_accreditation" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all bg-white cursor-pointer" required>
                                        <option value="Less than 1 year">Less than 1 year</option>
                                        <option value="1 year">1 year</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- Step 3: Education -->
                        <div class="form-step hidden" id="step-3">
                            <div class="text-center mb-8">
                                <h3 class="inline-block text-lg md:text-xl font-bold text-green-700 uppercase tracking-wide border-b-4 border-green-500 pb-2">
                                    <i class="fas fa-graduation-cap mr-2"></i> II. EDUCATION
                                </h3>
                                <p class="text-gray-500 mt-2">Information on your past formal, non-formal and informal learning experiences.</p>
                            </div>
                            
                            <div class="space-y-8">
                                <!-- Formal Education -->
                                <div>
                                    <div class="flex justify-between items-center mb-4">
                                        <h5 class="text-green-600 font-bold text-lg">1. Formal Education</h5>
                                        <button type="button" class="inline-flex items-center gap-1 px-3 py-1.5 text-sm font-medium text-yellow-700 bg-yellow-100 rounded-lg hover:bg-yellow-200 transition-colors shadow-sm" onclick="fillNA('formalEducationTable')">
                                            <i class="fas fa-magic"></i> Fill N/A
                                        </button>
                                    </div>
                                    <div class="overflow-x-auto rounded-lg border border-gray-200">
                                        <table class="min-w-full divide-y divide-gray-200">
                                            <thead class="bg-green-500">
                                                <tr>
                                                    <th class="px-4 py-3 text-left text-xs font-semibold text-white uppercase tracking-wider">Course/Degree Program</th>
                                                    <th class="px-4 py-3 text-left text-xs font-semibold text-white uppercase tracking-wider">Name of School/Address</th>
                                                    <th class="px-4 py-3 text-left text-xs font-semibold text-white uppercase tracking-wider">Inclusive Dates</th>
                                                    <th class="px-4 py-3 text-center text-xs font-semibold text-white uppercase tracking-wider w-12">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody id="formalEducationTable" class="bg-white divide-y divide-gray-200">
                                                <tr class="hover:bg-gray-50">
                                                    <td class="px-4 py-3"><input type="text" name="degree_program[]" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent" required></td>
                                                    <td class="px-4 py-3"><input type="text" name="school_address[]" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent" required></td>
                                                    <td class="px-4 py-3"><input type="text" name="inclusive_dates[]" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent" required></td>
                                                    <td class="px-4 py-3 text-center"><button type="button" class="removeRow w-8 h-8 inline-flex items-center justify-center text-white bg-red-500 rounded-full hover:bg-red-600 transition-colors"><i class="fas fa-minus"></i></button></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <button type="button" class="mt-3 inline-flex items-center gap-1 px-3 py-1.5 text-sm font-medium text-green-600 border border-green-500 rounded-lg hover:bg-green-50 transition-colors" id="addFormalRow">
                                        <i class="fas fa-plus"></i> Add Row
                                    </button>
                                </div>

                                <hr class="border-gray-200">

                                <!-- Non-Formal Education -->
                                <div>
                                    <div class="flex justify-between items-center mb-4">
                                        <h5 class="text-green-600 font-bold text-lg">2. Non-Formal Education</h5>
                                        <button type="button" class="inline-flex items-center gap-1 px-3 py-1.5 text-sm font-medium text-yellow-700 bg-yellow-100 rounded-lg hover:bg-yellow-200 transition-colors shadow-sm" onclick="fillNA('nonFormalEducationTable')">
                                            <i class="fas fa-magic"></i> Fill N/A
                                        </button>
                                    </div>
                                    <div class="overflow-x-auto rounded-lg border border-gray-200">
                                        <table class="min-w-full divide-y divide-gray-200">
                                            <thead class="bg-green-500">
                                                <tr>
                                                    <th class="px-4 py-3 text-left text-xs font-semibold text-white uppercase tracking-wider">Title of Training Program</th>
                                                    <th class="px-4 py-3 text-left text-xs font-semibold text-white uppercase tracking-wider">Title of Certificate Obtained</th>
                                                    <th class="px-4 py-3 text-left text-xs font-semibold text-white uppercase tracking-wider">Inclusive Dates</th>
                                                    <th class="px-4 py-3 text-center text-xs font-semibold text-white uppercase tracking-wider w-12">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody id="nonFormalEducationTable" class="bg-white divide-y divide-gray-200">
                                                <tr class="hover:bg-gray-50">
                                                    <td class="px-4 py-3"><input type="text" name="training_program[]" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent" required></td>
                                                    <td class="px-4 py-3"><input type="text" name="certificate_obtained[]" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent" required></td>
                                                    <td class="px-4 py-3"><input type="text" name="dates_attendance[]" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent" required></td>
                                                    <td class="px-4 py-3 text-center"><button type="button" class="removeRow w-8 h-8 inline-flex items-center justify-center text-white bg-red-500 rounded-full hover:bg-red-600 transition-colors"><i class="fas fa-minus"></i></button></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <button type="button" class="mt-3 inline-flex items-center gap-1 px-3 py-1.5 text-sm font-medium text-green-600 border border-green-500 rounded-lg hover:bg-green-50 transition-colors" id="addNonFormalRow">
                                        <i class="fas fa-plus"></i> Add Row
                                    </button>
                                </div>

                                <hr class="border-gray-200">

                                <!-- Certification Examination -->
                                <div>
                                    <div class="flex justify-between items-center mb-4">
                                        <h5 class="text-green-600 font-bold text-lg">3. Other Certification Examination</h5>
                                        <button type="button" class="inline-flex items-center gap-1 px-3 py-1.5 text-sm font-medium text-yellow-700 bg-yellow-100 rounded-lg hover:bg-yellow-200 transition-colors shadow-sm" onclick="fillNA('certificationTable')">
                                            <i class="fas fa-magic"></i> Fill N/A
                                        </button>
                                    </div>
                                    <div class="overflow-x-auto rounded-lg border border-gray-200">
                                        <table class="min-w-full divide-y divide-gray-200">
                                            <thead class="bg-green-500">
                                                <tr>
                                                    <th class="px-4 py-3 text-left text-xs font-semibold text-white uppercase tracking-wider">Title of Exam</th>
                                                    <th class="px-4 py-3 text-left text-xs font-semibold text-white uppercase tracking-wider">Agency Address/Name</th>
                                                    <th class="px-4 py-3 text-left text-xs font-semibold text-white uppercase tracking-wider">Date Certified</th>
                                                    <th class="px-4 py-3 text-left text-xs font-semibold text-white uppercase tracking-wider">Rating</th>
                                                    <th class="px-4 py-3 text-center text-xs font-semibold text-white uppercase tracking-wider w-12">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody id="certificationTable" class="bg-white divide-y divide-gray-200">
                                                <tr class="hover:bg-gray-50">
                                                    <td class="px-4 py-3"><input type="text" name="certification_examination[]" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent" required></td>
                                                    <td class="px-4 py-3"><input type="text" name="certifying_agency[]" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent" required></td>
                                                    <td class="px-4 py-3"><input type="text" name="date_certified[]" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent" required></td>
                                                    <td class="px-4 py-3"><input type="text" name="rating[]" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent" required></td>
                                                    <td class="px-4 py-3 text-center"><button type="button" class="removeRow w-8 h-8 inline-flex items-center justify-center text-white bg-red-500 rounded-full hover:bg-red-600 transition-colors"><i class="fas fa-minus"></i></button></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <button type="button" class="mt-3 inline-flex items-center gap-1 px-3 py-1.5 text-sm font-medium text-green-600 border border-green-500 rounded-lg hover:bg-green-50 transition-colors" id="addCertificationRow">
                                        <i class="fas fa-plus"></i> Add Row
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Step 4: Work Experience -->
                        <div class="form-step hidden" id="step-4">
                            <div class="text-center mb-8">
                                <h3 class="inline-block text-lg md:text-xl font-bold text-green-700 uppercase tracking-wide border-b-4 border-green-500 pb-2">
                                    <i class="fas fa-briefcase mr-2"></i> III. Paid Work and Other Experiences
                                </h3>
                            </div>
                            
                            <div class="space-y-6">
                                <div class="flex items-center justify-between bg-green-50 border border-green-200 rounded-lg p-4">
                                    <span class="text-green-700 text-sm"><i class="fas fa-info-circle mr-2"></i> List your experiences in reverse chronological order (most recent first).</span>
                                    <button type="button" class="inline-flex items-center gap-1 px-3 py-1.5 text-sm font-medium text-yellow-700 bg-yellow-100 rounded-lg hover:bg-yellow-200 transition-colors shadow-sm" onclick="fillNA('workExperienceWrapper')">
                                        <i class="fas fa-magic"></i> Fill N/A
                                    </button>
                                </div>

                                <div id="workExperienceWrapper"></div>

                                <div class="text-center mt-6">
                                    <button type="button" class="inline-flex items-center gap-2 px-6 py-3 text-lg font-medium text-green-600 border-2 border-green-500 rounded-xl hover:bg-green-50 transition-colors shadow-sm" id="addWorkExpBtn">
                                        <i class="fas fa-plus-circle"></i> Add Work Experience
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Step 5: Awards -->
                        <div class="form-step hidden" id="step-5">
                            <div class="text-center mb-8">
                                <h3 class="inline-block text-lg md:text-xl font-bold text-green-700 uppercase tracking-wide border-b-4 border-green-500 pb-2">
                                    <i class="fas fa-award mr-2"></i> IV. Honors, Awards, and Citations
                                </h3>
                            </div>
                            
                            <div class="space-y-8">
                                <!-- Academic Award -->
                                <div>
                                    <div class="flex justify-between items-center mb-4">
                                        <h5 class="text-green-600 font-bold text-lg">1. Academic Award</h5>
                                        <button type="button" class="inline-flex items-center gap-1 px-3 py-1.5 text-sm font-medium text-yellow-700 bg-yellow-100 rounded-lg hover:bg-yellow-200 transition-colors shadow-sm" onclick="fillNA('AcademicTable')">
                                            <i class="fas fa-magic"></i> Fill N/A
                                        </button>
                                    </div>
                                    <div class="overflow-x-auto rounded-lg border border-gray-200">
                                        <table class="min-w-full divide-y divide-gray-200">
                                            <thead class="bg-green-500">
                                                <tr>
                                                    <th class="px-4 py-3 text-left text-xs font-semibold text-white uppercase tracking-wider">Award Conferred</th>
                                                    <th class="px-4 py-3 text-left text-xs font-semibold text-white uppercase tracking-wider">Organization</th>
                                                    <th class="px-4 py-3 text-left text-xs font-semibold text-white uppercase tracking-wider">Date</th>
                                                    <th class="px-4 py-3 text-center text-xs font-semibold text-white uppercase tracking-wider w-12">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody id="AcademicTable" class="bg-white divide-y divide-gray-200">
                                                <tr class="hover:bg-gray-50">
                                                    <td class="px-4 py-3"><input type="text" name="awards_conferred[]" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent" required placeholder="Award Conferred"></td>
                                                    <td class="px-4 py-3"><input type="text" name="conferring_organizations[]" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent" required placeholder="Organization"></td>
                                                    <td class="px-4 py-3"><input type="text" name="date_awarded[]" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent" required placeholder="Date"></td>
                                                    <td class="px-4 py-3 text-center"><button type="button" class="removeRow w-8 h-8 inline-flex items-center justify-center text-white bg-red-500 rounded-full hover:bg-red-600 transition-colors"><i class="fas fa-minus"></i></button></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <button type="button" class="mt-3 inline-flex items-center gap-1 px-3 py-1.5 text-sm font-medium text-green-600 border border-green-500 rounded-lg hover:bg-green-50 transition-colors" id="AcademicRow">
                                        <i class="fas fa-plus"></i> Add Row
                                    </button>
                                </div>
                                
                                <hr class="border-gray-200">
                                
                                <!-- Community Award -->
                                <div>
                                    <div class="flex justify-between items-center mb-4">
                                        <h5 class="text-green-600 font-bold text-lg">2. Community Award</h5>
                                        <button type="button" class="inline-flex items-center gap-1 px-3 py-1.5 text-sm font-medium text-yellow-700 bg-yellow-100 rounded-lg hover:bg-yellow-200 transition-colors shadow-sm" onclick="fillNA('AwardTable')">
                                            <i class="fas fa-magic"></i> Fill N/A
                                        </button>
                                    </div>
                                    <div class="overflow-x-auto rounded-lg border border-gray-200">
                                        <table class="min-w-full divide-y divide-gray-200">
                                            <thead class="bg-green-500">
                                                <tr>
                                                    <th class="px-4 py-3 text-left text-xs font-semibold text-white uppercase tracking-wider">Award Conferred</th>
                                                    <th class="px-4 py-3 text-left text-xs font-semibold text-white uppercase tracking-wider">Organization</th>
                                                    <th class="px-4 py-3 text-left text-xs font-semibold text-white uppercase tracking-wider">Date</th>
                                                    <th class="px-4 py-3 text-center text-xs font-semibold text-white uppercase tracking-wider w-12">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody id="AwardTable" class="bg-white divide-y divide-gray-200">
                                                <tr class="hover:bg-gray-50">
                                                    <td class="px-4 py-3"><input type="text" name="community_awards_conferred[]" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent" required placeholder="Award Conferred"></td>
                                                    <td class="px-4 py-3"><input type="text" name="community_conferring_organizations[]" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent" required placeholder="Organization"></td>
                                                    <td class="px-4 py-3"><input type="text" name="community_date_awarded[]" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent" required placeholder="Date"></td>
                                                    <td class="px-4 py-3 text-center"><button type="button" class="removeRow w-8 h-8 inline-flex items-center justify-center text-white bg-red-500 rounded-full hover:bg-red-600 transition-colors"><i class="fas fa-minus"></i></button></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <button type="button" class="mt-3 inline-flex items-center gap-1 px-3 py-1.5 text-sm font-medium text-green-600 border border-green-500 rounded-lg hover:bg-green-50 transition-colors" id="AwardRow">
                                        <i class="fas fa-plus"></i> Add Row
                                    </button>
                                </div>

                                <hr class="border-gray-200">
                                
                                <!-- Work Related Award -->
                                <div>
                                    <div class="flex justify-between items-center mb-4">
                                        <h5 class="text-green-600 font-bold text-lg">3. Work Related Award</h5>
                                        <button type="button" class="inline-flex items-center gap-1 px-3 py-1.5 text-sm font-medium text-yellow-700 bg-yellow-100 rounded-lg hover:bg-yellow-200 transition-colors shadow-sm" onclick="fillNA('CitationTable')">
                                            <i class="fas fa-magic"></i> Fill N/A
                                        </button>
                                    </div>
                                    <div class="overflow-x-auto rounded-lg border border-gray-200">
                                        <table class="min-w-full divide-y divide-gray-200">
                                            <thead class="bg-green-500">
                                                <tr>
                                                    <th class="px-4 py-3 text-left text-xs font-semibold text-white uppercase tracking-wider">Award Conferred</th>
                                                    <th class="px-4 py-3 text-left text-xs font-semibold text-white uppercase tracking-wider">Organization</th>
                                                    <th class="px-4 py-3 text-left text-xs font-semibold text-white uppercase tracking-wider">Date</th>
                                                    <th class="px-4 py-3 text-center text-xs font-semibold text-white uppercase tracking-wider w-12">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody id="CitationTable" class="bg-white divide-y divide-gray-200">
                                                <tr class="hover:bg-gray-50">
                                                    <td class="px-4 py-3"><input type="text" name="work_awards_conferred[]" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent" required placeholder="Award Conferred"></td>
                                                    <td class="px-4 py-3"><input type="text" name="work_community_conferring_organizations[]" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent" required placeholder="Organization"></td>
                                                    <td class="px-4 py-3"><input type="text" name="work_community_date_awarded[]" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent" required placeholder="Date"></td>
                                                    <td class="px-4 py-3 text-center"><button type="button" class="removeRow w-8 h-8 inline-flex items-center justify-center text-white bg-red-500 rounded-full hover:bg-red-600 transition-colors"><i class="fas fa-minus"></i></button></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <button type="button" class="mt-3 inline-flex items-center gap-1 px-3 py-1.5 text-sm font-medium text-green-600 border border-green-500 rounded-lg hover:bg-green-50 transition-colors" id="CitationRow">
                                        <i class="fas fa-plus"></i> Add Row
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Step 6: Creative Works -->
                        <div class="form-step hidden" id="step-6">
                            <div class="text-center mb-8">
                                <h3 class="inline-block text-lg md:text-xl font-bold text-green-700 uppercase tracking-wide border-b-4 border-green-500 pb-2">
                                    <i class="fas fa-lightbulb mr-2"></i> V. Creative Works
                                </h3>
                            </div>
                            
                            <div class="space-y-6">
                                <div class="text-right">
                                    <button type="button" class="inline-flex items-center gap-1 px-3 py-1.5 text-sm font-medium text-yellow-700 bg-yellow-100 rounded-lg hover:bg-yellow-200 transition-colors shadow-sm" onclick="fillNA('creative-container')">
                                        <i class="fas fa-magic"></i> Fill N/A
                                    </button>
                                </div>
                                <div id="creative-container" class="bg-gray-50 p-6 rounded-xl border border-gray-200 space-y-4">
                                    <div>
                                        <label class="block text-sm font-bold text-gray-700 mb-1">1. Description <span class="text-red-500">*</span></label>
                                        <textarea name="accomplishment_description" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all" rows="3" required></textarea>
                                    </div>
                                    <div>
                                        <label class="block text-sm font-bold text-gray-700 mb-1">2. Date Accomplished <span class="text-red-500">*</span></label>
                                        <input type="date" name="date_accomplished" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all" required>
                                    </div>
                                    <div>
                                        <label class="block text-sm font-bold text-gray-700 mb-1">3. Name and Address of Publishing Agency <span class="text-red-500">*</span></label>
                                        <textarea name="address_of_publishing" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all" rows="2" required></textarea>
                                    </div>
                                </div>

                                <div class="text-center mt-10 mb-6">
                                    <h3 class="inline-block text-lg md:text-xl font-bold text-green-700 uppercase tracking-wide border-b-4 border-green-500 pb-2">
                                        <i class="fas fa-book-open mr-2"></i> VI. Lifelong Learning
                                    </h3>
                                </div>
                                
                                <div class="text-right">
                                    <button type="button" class="inline-flex items-center gap-1 px-3 py-1.5 text-sm font-medium text-yellow-700 bg-yellow-100 rounded-lg hover:bg-yellow-200 transition-colors shadow-sm" onclick="fillNA('lifelong-container')">
                                        <i class="fas fa-magic"></i> Fill N/A
                                    </button>
                                </div>
                                <div id="lifelong-container" class="space-y-4">
                                    <div class="bg-white rounded-xl border-l-4 border-green-500 shadow-sm p-5">
                                        <h5 class="text-green-600 font-bold mb-2">1. Hobbies/Leisure Activities</h5>
                                        <label class="block text-xs text-gray-500 mb-2">Activities involving rating skills...</label>
                                        <textarea name="leisure_activities" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all" rows="2" required></textarea>
                                    </div>
                                    <div class="bg-white rounded-xl border-l-4 border-green-500 shadow-sm p-5">
                                        <h5 class="text-green-600 font-bold mb-2">2. Special Skills</h5>
                                        <label class="block text-xs text-gray-500 mb-2">Note down special skills...</label>
                                        <textarea name="special_skills" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all" rows="2" required></textarea>
                                    </div>
                                    <div class="bg-white rounded-xl border-l-4 border-green-500 shadow-sm p-5">
                                        <h5 class="text-green-600 font-bold mb-2">3. Work-Related Activities</h5>
                                        <label class="block text-xs text-gray-500 mb-2">Work-related activities...</label>
                                        <textarea name="work_related_activities" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all" rows="2" required></textarea>
                                    </div>
                                    <div class="bg-white rounded-xl border-l-4 border-green-500 shadow-sm p-5">
                                        <h5 class="text-green-600 font-bold mb-2">4. Volunteer Activities</h5>
                                        <label class="block text-xs text-gray-500 mb-2">List only volunteer activities...</label>
                                        <textarea name="volunteer_activities" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all" rows="2" required></textarea>
                                    </div>
                                    <div class="bg-white rounded-xl border-l-4 border-green-500 shadow-sm p-5">
                                        <h5 class="text-green-600 font-bold mb-2">5. Travels</h5>
                                        <label class="block text-xs text-gray-500 mb-2">Cite places visited and purpose...</label>
                                        <textarea name="travels_cite_places" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all" rows="2" required></textarea>
                                    </div>
                                    
                                    <div class="bg-green-600 rounded-xl shadow-lg p-6 text-white">
                                        <label class="block font-bold mb-2">ESSAY: How the degree contributes to development <span class="text-yellow-300">*</span></label>
                                        <textarea name="essay_of_degree" class="w-full px-4 py-3 border-0 rounded-lg focus:ring-2 focus:ring-green-300 bg-white/90 text-gray-800" rows="6" required></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Step 7: Declaration -->
                        <div class="form-step hidden" id="step-7">
                            <div class="text-center mb-8">
                                <h3 class="inline-block text-lg md:text-xl font-bold text-green-700 uppercase tracking-wide border-b-4 border-green-500 pb-2">
                                    <i class="fas fa-file-signature mr-2"></i> Declaration
                                </h3>
                            </div>
                            <div class="space-y-6">
                                <div class="bg-gray-50 border border-gray-200 rounded-xl p-6 text-center">
                                    <p class="text-lg italic text-gray-700">"I declare under oath that the foregoing claims and information I have disclosed are true and correct."</p>
                                </div>
                                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-6">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Done in <span class="text-red-500">*</span></label>
                                        <input type="text" name="declaration_place" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">on this <span class="text-red-500">*</span></label>
                                        <input type="text" name="declaration_day" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">day of <span class="text-red-500">*</span></label>
                                        <input type="text" name="declaration_month_year" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all">
                                    </div>
                                </div>
                                <h5 class="text-green-600 font-bold text-lg border-b-2 border-green-200 pb-2 mt-8">Signature</h5>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Printed Name <span class="text-red-500">*</span></label>
                                    <input type="text" name="printed_name" value="{{ $user->name ?? '' }}" class="w-full px-4 py-3 border border-gray-300 rounded-lg bg-gray-100 cursor-not-allowed font-bold" readonly required>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Community Tax Certificate <span class="text-red-500">*</span></label>
                                    <input type="text" name="community_tax_certificate" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all" required>
                                </div>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Issued on <span class="text-red-500">*</span></label>
                                        <input type="date" name="issued_on" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all" required>
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Issued at <span class="text-red-500">*</span></label>
                                        <input type="text" name="issued_at" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all" required>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Navigation Buttons -->
                        <div class="flex flex-col sm:flex-row justify-between items-center gap-4 mt-8 pt-6 border-t border-gray-200">
                            <button type="button" class="hidden w-full sm:w-auto inline-flex items-center justify-center gap-2 px-6 py-3 text-gray-600 bg-gray-100 rounded-xl hover:bg-gray-200 transition-colors font-medium" id="prevBtn">
                                <i class="fas fa-arrow-left"></i> Previous
                            </button>
                            <a href="{{ url('/') }}" class="w-full sm:w-auto inline-flex items-center justify-center px-6 py-3 text-red-600 border border-red-500 rounded-xl hover:bg-red-50 transition-colors font-medium" id="cancelBtn">Cancel Application</a>
                            <div class="flex gap-3 w-full sm:w-auto">
                                <button type="button" class="flex-1 sm:flex-none inline-flex items-center justify-center gap-2 px-8 py-3 text-white bg-green-500 rounded-xl hover:bg-green-600 transition-colors font-medium shadow-lg" id="nextBtn">
                                    Next <i class="fas fa-arrow-right"></i>
                                </button>
                                <button type="button" class="hidden flex-1 sm:flex-none inline-flex items-center justify-center gap-2 px-8 py-3 text-white bg-green-600 rounded-xl hover:bg-green-700 transition-colors font-medium shadow-lg" id="submitBtn">
                                    Submit Application <i class="fas fa-check-circle"></i>
                                </button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </form>
        </body>
    </div>
</div>

{{-- Success Message --}}
@if(session('success'))
    <div data-success-message="{{ session('success') }}" style="display: none;"></div>
@endif

{{-- Validation Errors --}}
@if($errors->any())
    <div data-validation-errors="{{ json_encode($errors->all()) }}" style="display: none;"></div>
@endif

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    // --- 1. GLOBAL SAFETY & INIT ---
    $(document).ready(function() {
        // Force enable Zipcode and make sure it's editable
        $('#zipcode_field').prop('readonly', false).prop('disabled', false).removeClass('bg-light');

        // Check for Laravel validation errors or Success Message
        @if(session('success'))
            // Handled by global SweetAlert
        @endif

        @if($errors->any())
            // Handled by global SweetAlert
        @endif
    });

    // --- 2. SUBMIT INTERCEPTION & ADDRESS LOGIC ---
    document.getElementById('submitBtn').addEventListener('click', function(e) {
        e.preventDefault(); // Stop normal form submission

        Swal.fire({
            title: 'Are you sure?',
            text: "Do you want to submit your application? Please review your details.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#22c55e',
            cancelButtonColor: '#ef4444',
            confirmButtonText: 'Yes, Submit Application!'
        }).then((result) => {
            if (result.isConfirmed) {
                // --- CRITICAL: Populate Hidden Inputs before submitting ---
                
                const country = $('#country_selector').val();
                
                if (country === 'Philippines') {
                    // Get Text from dropdown options (split by | if needed, though previously it was value)
                    // Based on your loadRegions logic, value is "Code" or "Code|Name". 
                    // Let's use the visible text or the raw value if that's what backend expects.
                    // Assuming your backend wants the NAME:
                    
                    $('#final_region').val( $("#region_selector option:selected").text().trim() );
                    
                    // For province/city, your value is likely "code|name". Let's clean it up.
                    let provVal = $('#province_selector').val();
                    $('#final_province').val( provVal ? provVal.split('|')[1] : '' );

                    let cityVal = $('#city_selector').val();
                    $('#final_city').val( cityVal ? cityVal.split('|')[1] : '' );

                    // Barangay is just name
                    $('#final_barangay').val( $('#barangay_selector').val() );

                } else {
                    // Take from manual inputs
                    $('#final_region').val('N/A'); // Or empty
                    $('#final_province').val( $('#input_province').val() );
                    $('#final_city').val( $('#input_city').val() );
                    $('#final_barangay').val( $('#input_barangay').val() );
                }

                // Show Loading
                Swal.fire({
                    title: 'Submitting...',
                    html: 'Please wait while we process your application.',
                    allowOutsideClick: false,
                    didOpen: () => {
                        Swal.showLoading();
                    }
                });

                // Submit the form
                document.getElementById('multiStepForm').submit();
            }
        });
    });

    // --- 3. FILL N/A FUNCTION ---
    function fillNA(containerId) {
        Swal.fire({
            title: 'Auto-fill "N/A"?',
            text: "Fill empty fields in this section with 'N/A'?",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#22c55e',
            confirmButtonText: 'Yes, fill it!'
        }).then((result) => {
            if (result.isConfirmed) {
                const container = document.getElementById(containerId);
                const inputs = container.querySelectorAll(`input[type="text"], textarea`);
                let count = 0;
                
                inputs.forEach(input => {
                    if (!input.value.trim() && !input.readOnly && !input.classList.contains('hidden')) {
                        input.value = "N/A";
                        count++;
                    }
                });
                
                if(count > 0){
                    const Toast = Swal.mixin({
                        toast: true, position: 'top-end', showConfirmButton: false, timer: 2000
                    });
                    Toast.fire({ icon: 'success', title: 'Filled ' + count + ' fields' });
                } else {
                    Swal.fire({title: 'Info', text: 'No empty fields found.', icon: 'info', confirmButtonColor: '#22c55e'});
                }
            }
        });
    }

    $(document).ready(function() {
        let currentStep = 1;
        const totalSteps = 7;

        function showStep(step) {
            $('.form-step').addClass('hidden');
            $(`#step-${step}`).removeClass('hidden');
            
            // Update Indicators
            $('.step-indicator').each(function() {
                const stepNum = $(this).data('step');
                const circle = $(this).find('.step-circle');
                const label = $(this).find('.step-label');
                
                // Reset classes
                circle.removeClass('bg-green-500 bg-green-700 text-white text-gray-400 border-green-500 border-green-700 border-gray-200 shadow-lg scale-110');
                label.removeClass('text-green-600 text-gray-400');
                
                if (stepNum < step) {
                    // Completed
                    circle.addClass('bg-green-700 text-white border-green-700');
                    label.addClass('text-green-600');
                } else if (stepNum === step) {
                    // Active
                    circle.addClass('bg-green-500 text-white border-green-500 shadow-lg scale-110');
                    label.addClass('text-green-600');
                } else {
                    // Not reached
                    circle.addClass('bg-white text-gray-400 border-gray-200');
                    label.addClass('text-gray-400');
                }
            });
            
            // Update lines
            $('.step-line').each(function(index) {
                if (index < step - 1) {
                    $(this).removeClass('bg-gray-200').addClass('bg-green-500');
                } else {
                    $(this).removeClass('bg-green-500').addClass('bg-gray-200');
                }
            });
            
            // Buttons
            if(step > 1) {
                $('#prevBtn').removeClass('hidden');
            } else {
                $('#prevBtn').addClass('hidden');
            }
            
            if(step === 1) {
                $('#cancelBtn').removeClass('hidden');
            } else {
                $('#cancelBtn').addClass('hidden');
            }
            
            if(step < totalSteps) {
                $('#nextBtn').removeClass('hidden');
                $('#submitBtn').addClass('hidden');
            } else {
                $('#nextBtn').addClass('hidden');
                $('#submitBtn').removeClass('hidden');
            }
            
            $('html, body').animate({ scrollTop: 0 }, 400);
        }

        // Validate Step before Next
        function validateStep(step) {
            let isValid = true;
            $(`#step-${step} [required]`).each(function() {
                if (!$(this).hasClass('hidden') && $(this).is(':visible') && !$(this).val()) {
                    isValid = false;
                    $(this).addClass('border-red-500 ring-2 ring-red-200'); 
                } else {
                    $(this).removeClass('border-red-500 ring-2 ring-red-200');
                }
            });
            return isValid;
        }

        $('#nextBtn').click(function() {
            if(validateStep(currentStep)) {
                currentStep++; 
                showStep(currentStep);
            } else {
                Swal.fire({ title: 'Missing Info', text: 'Please fill in all required fields marked with *', icon: 'warning', confirmButtonColor: '#22c55e' });
            }
        });

        $('#prevBtn').click(function() { if (currentStep > 1) { currentStep--; showStep(currentStep); } });
        
        // Initial Show
        showStep(1);
        $(document).on('input', '.border-red-500', function() { $(this).removeClass('border-red-500 ring-2 ring-red-200'); });

        // Add Row Logic (Steps 3 & 5)
        $('.inline-flex').not('#addWorkExpBtn, .add-file-btn').click(function(){
            let btnId = $(this).attr('id');
            let tableId = '';
            let inputs = [];

            if(btnId === 'addFormalRow') { tableId='formalEducationTable'; inputs=['degree_program','school_address','inclusive_dates']; }
            else if(btnId === 'addNonFormalRow') { tableId='nonFormalEducationTable'; inputs=['training_program','certificate_obtained','dates_attendance']; }
            else if(btnId === 'addCertificationRow') { tableId='certificationTable'; inputs=['certification_examination','certifying_agency','date_certified','rating']; }
            else if(btnId === 'AcademicRow') { tableId='AcademicTable'; inputs=['awards_conferred','conferring_organizations','date_awarded']; }
            else if(btnId === 'AwardRow') { tableId='AwardTable'; inputs=['community_awards_conferred','community_conferring_organizations','community_date_awarded']; }
            else if(btnId === 'CitationRow') { tableId='CitationTable'; inputs=['work_awards_conferred','work_community_conferring_organizations','work_community_date_awarded']; }

            if(tableId) {
                let row = `<tr class="hover:bg-gray-50">`;
                inputs.forEach(name => { row += `<td class="px-4 py-3"><input type="text" name="${name}[]" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent" required></td>`; });
                row += `<td class="px-4 py-3 text-center"><button type="button" class="removeRow w-8 h-8 inline-flex items-center justify-center text-white bg-red-500 rounded-full hover:bg-red-600 transition-colors"><i class="fas fa-minus"></i></button></td></tr>`;
                $('#'+tableId).append(row);
            }
        });
        
        $(document).on("click", ".removeRow", function() { $(this).closest("tr").remove(); });

        // --- DYNAMIC FILE INPUTS (STEP 1) ---
        $('.add-file-btn').click(function() {
            const fieldName = $(this).data('target');
            const wrapper = $('#wrapper_' + fieldName);
            const newRow = `
                <div class="flex items-center gap-2 mb-2">
                    <span class="inline-flex items-center px-3 py-2 bg-green-500 text-white rounded-l-lg">
                        <i class="fas fa-file-upload"></i>
                    </span>
                    <input type="file" name="${fieldName}[]" class="flex-1 block w-full text-sm text-gray-500 border border-gray-300 rounded-r-lg py-2 px-3 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent" accept=".jpg,.jpeg,.png,.pdf" required>
                    <button type="button" class="remove-file-row px-3 py-2 text-red-500 border border-red-500 rounded-lg hover:bg-red-50 transition-colors">
                        <i class="fas fa-times"></i>
                    </button>
                </div>`;
            wrapper.append(newRow);
        });

        $(document).on('click', '.remove-file-row', function() {
            $(this).closest('.flex').remove();
        });

        // --- WORK EXPERIENCE LOGIC START ---

        function addWorkExperienceEntry() {
            const entryId = Date.now(); // Unique ID
            const html = `
            <div class="mb-6 bg-white rounded-xl border border-gray-200 border-l-4 border-l-green-500 shadow-sm hover:shadow-md transition-shadow work-exp-card" id="card_${entryId}">
                <div class="p-6 relative">
                    <button type="button" class="remove-work-exp absolute top-4 right-4 inline-flex items-center gap-1 px-3 py-1.5 text-sm font-medium text-red-600 border border-red-500 rounded-lg hover:bg-red-50 transition-colors">
                        <i class="fas fa-trash"></i> Remove
                    </button>
                    
                    <h5 class="text-green-600 font-bold text-lg mb-4"><i class="fas fa-briefcase mr-2"></i> Experience Entry</h5>

                    <div class="bg-gray-50 rounded-lg p-4 mb-4">
                        <label class="flex items-center gap-3 cursor-pointer">
                            <input type="checkbox" class="self-employed-toggle w-5 h-5 text-green-500 rounded border-gray-300 focus:ring-green-500" data-target="${entryId}">
                            <div>
                                <span class="font-bold text-gray-800">Is this Self-Employment?</span>
                                <p class="text-xs text-gray-500">Check this if you were self-employed for this role.</p>
                            </div>
                        </label>
                    </div>

                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-1">1. Position/Designation <span class="text-red-500">*</span></label>
                            <input type="text" name="position_designation[]" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all" required>
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-1">2. Inclusive Dates <span class="text-red-500">*</span></label>
                            <div class="grid grid-cols-1 md:grid-cols-5 gap-4 items-end">
                                <div class="md:col-span-2">
                                    <label class="block text-xs text-gray-500 mb-1">Start Date</label>
                                    <input type="date" class="date-start w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all" data-id="${entryId}" required>
                                </div>
                                <div class="md:col-span-2">
                                    <label class="block text-xs text-gray-500 mb-1">End Date</label>
                                    <input type="date" class="date-end w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all" id="end_date_${entryId}" data-id="${entryId}" required>
                                </div>
                                <div class="flex items-center gap-2 pt-5">
                                    <input type="checkbox" class="present-toggle w-5 h-5 text-green-500 rounded border-gray-300 focus:ring-green-500" id="present_${entryId}" data-id="${entryId}">
                                    <label for="present_${entryId}" class="text-sm font-medium text-gray-700">Present</label>
                                </div>
                            </div>
                        </div>
                        
                        <div class="bg-blue-50 border border-blue-200 rounded-lg p-3">
                             <label class="block text-xs text-gray-500 mb-1">Calculated Duration:</label>
                             <input type="text" class="duration-display w-full bg-transparent font-bold text-blue-600 text-lg border-0 p-0 focus:ring-0" value="0 Years, 0 Months" readonly>
                        </div>

                        <input type="hidden" name="dates_of_employment[]" class="dates-hidden-field">

                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-1">3. Name and Address of Company <span class="text-red-500">*</span></label>
                            <textarea name="address_of_company[]" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all" rows="2" required></textarea>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-bold text-gray-700 mb-1">4. Terms/Status <span class="text-red-500">*</span></label>
                                <input type="text" name="status_of_employment[]" id="status_${entryId}" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all" required>
                            </div>
                            <div>
                                <label class="block text-sm font-bold text-gray-700 mb-1">5. Supervisor Name <span class="text-red-500">*</span></label>
                                <input type="text" name="designation_of_immediate[]" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all" required>
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-1">6. Reason(s) for Leaving <span class="text-red-500">*</span></label>
                            <textarea name="reasons_for_moving[]" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all" rows="2" required></textarea>
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-1">7. Functions & Responsibilities <span class="text-red-500">*</span></label>
                            <textarea name="responsibilities_in_position[]" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all" rows="3" required></textarea>
                        </div>

                        <div class="hidden reference-box bg-yellow-50 border border-yellow-300 rounded-lg p-4" id="ref_box_${entryId}">
                            <label class="block text-sm font-bold text-gray-800 mb-1">8. Self-Employment References <span class="text-red-500">*</span></label>
                            <p class="text-xs text-gray-500 mb-2">Provide 3 references (Name, Contact, Relationship).</p>
                            <textarea name="case_of_self_employment[]" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all" rows="3"></textarea>
                        </div>
                    </div>
                </div>
            </div>`;
            
            $('#workExperienceWrapper').append(html);
        }

        addWorkExperienceEntry();

        $('#addWorkExpBtn').click(function() { addWorkExperienceEntry(); });

        $(document).on('click', '.remove-work-exp', function() {
            if ($('#workExperienceWrapper .work-exp-card').length > 1) {
                $(this).closest('.work-exp-card').fadeOut(300, function(){ $(this).remove(); });
            } else {
                Swal.fire({title: 'Notice', text: 'You must have at least one work experience entry. Use N/A if none.', icon: 'info', confirmButtonColor: '#22c55e'});
            }
        });

        // Self Employment Toggle
        $(document).on('change', '.self-employed-toggle', function() {
            const targetId = $(this).data('target');
            const refBox = $(`#ref_box_${targetId}`);
            const statusField = $(`#status_${targetId}`);
            const refTextarea = refBox.find('textarea');

            if ($(this).is(':checked')) {
                refBox.removeClass('hidden');
                refTextarea.prop('required', true); 
                statusField.val('Self-Employed').prop('readonly', true).addClass('bg-gray-100');
            } else {
                refBox.addClass('hidden');
                refTextarea.prop('required', false).val(''); 
                statusField.val('').prop('readonly', false).removeClass('bg-gray-100');
            }
        });

        // Date Calculation
        function updateDuration(card) {
            const startDateVal = card.find('.date-start').val();
            const isPresent = card.find('.present-toggle').is(':checked');
            let endDateVal = card.find('.date-end').val();
            
            if (isPresent) {
                const today = new Date().toISOString().split('T')[0];
                card.find('.date-end').val(today).prop('readonly', true).addClass('bg-green-100 text-green-700 font-bold');
                endDateVal = today; 
            } else {
                card.find('.date-end').prop('readonly', false).removeClass('bg-green-100 text-green-700 font-bold');
            }

            if (startDateVal && (endDateVal || isPresent)) {
                const start = new Date(startDateVal);
                const end = new Date(endDateVal);

                if (end < start) {
                    card.find('.duration-display').val("Invalid Dates (End is before Start)");
                    card.find('.duration-display').addClass('text-red-500').removeClass('text-blue-600');
                    return;
                }

                let years = end.getFullYear() - start.getFullYear();
                let months = end.getMonth() - start.getMonth();
                if (months < 0) { years--; months += 12; }

                const durationText = `${years} Year(s), ${months} Month(s)`;
                card.find('.duration-display').removeClass('text-red-500').addClass('text-blue-600').val(durationText);

                const endString = isPresent ? 'Present' : endDateVal;
                card.find('.dates-hidden-field').val(`${startDateVal} to ${endString}`);

            } else {
                card.find('.duration-display').val("0 Years, 0 Months");
                card.find('.dates-hidden-field').val("");
            }
        }

        $(document).on('change', '.date-start, .date-end, .present-toggle', function() {
            const card = $(this).closest('.work-exp-card');
            updateDuration(card);
        });

        // --- WORK EXPERIENCE LOGIC END ---

    });

    function previewImage(event) {
        const preview = document.getElementById('image-preview');
        const text = document.getElementById('placeholder-text');
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) { 
                preview.src = e.target.result; 
                preview.style.display = 'block';
                preview.classList.remove('hidden');
                text.style.display = 'none';
            };
            reader.readAsDataURL(file);
        }
    }
</script>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const countrySelect = document.getElementById('country_selector');
    const phFields = document.getElementById('ph_address_fields');
    const otherFields = document.getElementById('other_address_fields');
    const regionSelect = document.getElementById('region_selector');
    const provinceSelect = document.getElementById('province_selector');
    const citySelect = document.getElementById('city_selector');
    const barangaySelect = document.getElementById('barangay_selector');
    
    // API Base URL
    const apiBase = 'https://isaacdarcilla.github.io/philippine-addresses';

    countrySelect.addEventListener('change', function() {
        if (this.value === 'Philippines') {
            phFields.classList.remove('hidden');
            phFields.classList.add('grid');
            otherFields.classList.add('hidden');
            otherFields.classList.remove('grid');
            [regionSelect, provinceSelect, citySelect, barangaySelect].forEach(el => el.disabled = false);
            provinceSelect.disabled = true; citySelect.disabled = true; barangaySelect.disabled = true;
            document.querySelectorAll('#ph_address_fields select').forEach(el => el.required = true);
            document.querySelectorAll('#other_address_fields input').forEach(el => el.required = false);
            if (regionSelect.options.length <= 1) loadRegions();
        } else {
            phFields.classList.add('hidden');
            phFields.classList.remove('grid');
            otherFields.classList.remove('hidden');
            otherFields.classList.add('grid');
            document.querySelectorAll('#ph_address_fields select').forEach(el => el.required = false);
            document.querySelectorAll('#other_address_fields input').forEach(el => el.required = true);
        }
    });

    async function fetchData(endpoint) {
        const response = await fetch(`${apiBase}/${endpoint}.json`);
        return await response.json();
    }
    async function loadRegions() {
        const regions = await fetchData('region');
        regionSelect.innerHTML = '<option value="" disabled selected>Select Region</option>';
        regions.forEach(reg => { regionSelect.appendChild(new Option(reg.region_name, reg.region_code)); });
    }
    regionSelect.addEventListener('change', async function() {
        provinceSelect.innerHTML = '<option value="" disabled selected>Loading...</option>';
        const provinces = await fetchData('province');
        const filtered = provinces.filter(p => p.region_code === this.value);
        provinceSelect.innerHTML = '<option value="" disabled selected>Select Province</option>';
        filtered.forEach(p => { provinceSelect.appendChild(new Option(p.province_name, `${p.province_code}|${p.province_name}`)); });
        provinceSelect.disabled = false;
        document.getElementById('region_text').value = regionSelect.options[regionSelect.selectedIndex].text;
    });
    provinceSelect.addEventListener('change', async function() {
        citySelect.innerHTML = '<option value="" disabled selected>Loading...</option>';
        const [code, name] = this.value.split('|');
        const cities = await fetchData('city');
        const filtered = cities.filter(c => c.province_code === code);
        citySelect.innerHTML = '<option value="" disabled selected>Select City</option>';
        filtered.forEach(c => { citySelect.appendChild(new Option(c.city_name, `${c.city_code}|${c.city_name}`)); });
        citySelect.disabled = false;
    });
    citySelect.addEventListener('change', async function() {
        barangaySelect.innerHTML = '<option value="" disabled selected>Loading...</option>';
        const [code, name] = this.value.split('|');
        const barangays = await fetchData('barangay');
        const filtered = barangays.filter(b => b.city_code === code);
        barangaySelect.innerHTML = '<option value="" disabled selected>Select Barangay</option>';
        filtered.forEach(b => { barangaySelect.appendChild(new Option(b.brgy_name, b.brgy_name)); });
        barangaySelect.disabled = false;
    });
    
    // NOTE: The submit event listener that was splitting strings is REMOVED 
    // because that logic is now handled in the SweetAlert confirm block.
});
</script>
@endsection