@extends('layouts.admin')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-[#FFFEF7] via-[#f0f7f0] to-[#FEFDFB] p-3 sm:p-4 md:p-6 lg:p-8 relative">

    {{-- Background decoration --}}
    <div class="absolute top-0 left-0 right-0 h-[200px] md:h-[300px] pointer-events-none opacity-30">
        <div class="absolute top-[40%] left-[20%] w-[80%] h-[50%] bg-[#006633] rounded-full blur-[100px] opacity-10"></div>
        <div class="absolute top-[30%] right-[20%] w-[60%] h-[40%] bg-[#D4AF37] rounded-full blur-[100px] opacity-15"></div>
    </div>

    <div class="flex justify-center relative z-10">
        <div class="w-full max-w-2xl">

            {{-- Back Button --}}
            <a href="{{ route('admin.courses.index') }}" class="inline-flex items-center gap-2 text-[#006633] hover:text-[#004d26] font-medium mb-4 transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                </svg>
                Back to Courses
            </a>

            <div class="bg-[#FEFDFB] rounded-2xl sm:rounded-[20px] shadow-[0_4px_6px_rgba(0,102,51,0.04),0_20px_40px_rgba(0,102,51,0.08)] border border-[rgba(0,102,51,0.12)] overflow-hidden">

                {{-- Card Header --}}
                <div class="bg-gradient-to-br from-[#006633] to-[#004d26] p-4 sm:p-5 md:p-6 lg:p-8 relative overflow-hidden">
                    {{-- Decorative elements --}}
                    <div class="absolute -top-1/2 -right-[10%] w-[150px] md:w-[200px] h-[150px] md:h-[200px] bg-[#FFD700] rounded-full blur-2xl opacity-15 pointer-events-none"></div>
                    <div class="absolute bottom-0 left-0 right-0 h-[2px] md:h-1 bg-gradient-to-r from-[#FFD700] via-[#D4AF37] to-[#FFD700]"></div>

                    <h5 class="text-white text-lg sm:text-xl md:text-2xl font-semibold flex items-center gap-2 md:gap-3 m-0 relative z-10" style="font-family: 'Playfair Display', Georgia, serif;">
                        <div class="w-10 h-10 bg-[#FFD700]/20 rounded-xl flex items-center justify-center">
                            <svg class="w-5 h-5 text-[#FFD700]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                            </svg>
                        </div>
                        <span>Add New Course</span>
                    </h5>
                    <p class="text-white/70 text-sm mt-2 ml-12 md:ml-14">Fill in the details below to create a new course</p>
                </div>

                <div class="p-4 sm:p-5 md:p-6 lg:p-8">
                    
                    {{-- Validation Errors --}}
                    @if($errors->any())
                        <div data-validation-errors="{{ json_encode($errors->all()) }}" style="display: none;"></div>
                    @endif

                    <form method="POST" action="{{ route('admin.courses.store') }}" class="space-y-6">
                        @csrf

                        {{-- Department Field --}}
                        <div>
                            <label for="department_id" class="block text-sm font-semibold text-gray-700 mb-2">
                                <span class="flex items-center gap-2">
                                    <svg class="w-4 h-4 text-[#006633]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                                    </svg>
                                    Department
                                    <span class="text-red-500">*</span>
                                </span>
                            </label>
                            <select name="department_id" id="department_id" 
                                    class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-[#006633]/20 focus:border-[#006633] transition-all bg-white text-gray-700 @error('department_id') border-red-500 @enderror" 
                                    required>
                                <option value="">Select Department</option>
                                @foreach($departments as $department)
                                    <option value="{{ $department->id }}" {{ old('department_id') == $department->id ? 'selected' : '' }}>
                                        {{ $department->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('department_id')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Course Code Field --}}
                        <div>
                            <label for="course_code" class="block text-sm font-semibold text-gray-700 mb-2">
                                <span class="flex items-center gap-2">
                                    <svg class="w-4 h-4 text-[#006633]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14"/>
                                    </svg>
                                    Course Code
                                    <span class="text-red-500">*</span>
                                </span>
                            </label>
                            <input type="text" 
                                   name="course_code" 
                                   id="course_code" 
                                   value="{{ old('course_code') }}"
                                   placeholder="e.g., BSIT, BSCS, BSN"
                                   class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-[#006633]/20 focus:border-[#006633] transition-all @error('course_code') border-red-500 @enderror" 
                                   required>
                            @error('course_code')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Course Name Field --}}
                        <div>
                            <label for="course_name" class="block text-sm font-semibold text-gray-700 mb-2">
                                <span class="flex items-center gap-2">
                                    <svg class="w-4 h-4 text-[#006633]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                                    </svg>
                                    Course Name
                                    <span class="text-red-500">*</span>
                                </span>
                            </label>
                            <input type="text" 
                                   name="course_name" 
                                   id="course_name" 
                                   value="{{ old('course_name') }}"
                                   placeholder="e.g., Bachelor of Science in Information Technology"
                                   class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-[#006633]/20 focus:border-[#006633] transition-all @error('course_name') border-red-500 @enderror" 
                                   required>
                            @error('course_name')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Divider --}}
                        <div class="border-t border-gray-200 pt-6">
                            <div class="flex flex-col sm:flex-row justify-end gap-3">
                                <a href="{{ route('admin.courses.index') }}" 
                                   class="inline-flex items-center justify-center gap-2 px-6 py-3 bg-gray-100 text-gray-700 font-semibold rounded-xl hover:bg-gray-200 transition-all">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                    </svg>
                                    Cancel
                                </a>
                                <button type="submit" 
                                        class="inline-flex items-center justify-center gap-2 px-6 py-3 bg-gradient-to-br from-[#006633] to-[#004d26] text-white font-semibold rounded-xl hover:shadow-lg hover:-translate-y-0.5 transition-all">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                    </svg>
                                    Create Course
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection