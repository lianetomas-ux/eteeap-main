@extends('layouts.admin')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-[#f8fdf8] via-[#f0f7f0] to-[#e8f5e8] p-4 sm:p-6 lg:p-8 relative overflow-hidden">

    {{-- Animated Background Elements --}}
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute top-20 left-10 w-72 h-72 bg-[#006633]/5 rounded-full blur-3xl float-animation"></div>
        <div class="absolute top-40 right-20 w-96 h-96 bg-[#D4AF37]/5 rounded-full blur-3xl float-animation" style="animation-delay: -2s;"></div>
        <div class="absolute bottom-20 left-1/3 w-80 h-80 bg-emerald-400/5 rounded-full blur-3xl float-animation" style="animation-delay: -4s;"></div>
    </div>

    <div class="flex justify-center relative z-10">
        <div class="w-full max-w-7xl">

            <div class="modern-card rounded-3xl overflow-hidden">

                {{-- Card Header --}}
                <div class="animated-gradient p-6 sm:p-8 lg:p-10 relative overflow-hidden flex flex-col sm:flex-row flex-wrap justify-between items-start sm:items-center gap-4">
                    {{-- Decorative elements --}}
                    <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/5 to-transparent"></div>
                    <div class="absolute -top-1/2 -right-[10%] w-[200px] h-[200px] bg-[#FFD700] rounded-full blur-3xl opacity-20 pointer-events-none"></div>
                    
                    <h5 class="text-white text-xl sm:text-2xl lg:text-3xl font-bold flex items-center gap-3 m-0 relative z-10" style="font-family: 'Playfair Display', Georgia, serif;">
                        <div class="w-14 h-14 bg-[#FFD700]/20 backdrop-blur-xl rounded-2xl flex items-center justify-center border border-[#FFD700]/30 shadow-lg shadow-[#FFD700]/20">
                            <i class="fa fa-graduation-cap text-[#FFD700] text-xl"></i>
                        </div>
                        <span>Courses Management</span>
                    </h5>
                    <a href="{{ route('admin.courses.create') }}" class="btn-modern w-full sm:w-auto bg-gradient-to-r from-[#D4AF37] to-[#FFD700] text-[#004d26] px-6 py-3.5 rounded-2xl font-bold text-sm inline-flex items-center justify-center gap-2 shadow-xl shadow-[#D4AF37]/40 transition-all duration-300 hover:scale-105 relative z-10 no-underline">
                        <i class="fa fa-plus"></i>
                        <span>Add New Course</span>
                    </a>
                </div>

                <div class="p-5 sm:p-6 lg:p-8">
                    {{-- Success Message --}}
                    @if(session('success'))
                        <div data-success-message="{{ session('success') }}" style="display: none;"></div>
                    @endif

                    {{-- Search and Filter Bar --}}
                    <div class="flex flex-col sm:flex-row gap-4 mb-8">
                        <div class="relative flex-1">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 text-[#006633]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                                </svg>
                            </div>
                            <input type="text" id="searchInput" placeholder="Search courses..." class="input-modern w-full pl-12 pr-5 py-4 border-2 border-gray-200 rounded-2xl focus:border-[#006633] focus:ring-4 focus:ring-[#006633]/10 transition-all text-sm bg-white">
                        </div>
                        <select id="departmentFilter" class="px-5 py-4 border-2 border-gray-200 rounded-2xl focus:ring-4 focus:ring-[#006633]/10 focus:border-[#006633] transition-all text-sm bg-white min-w-[200px]">
                            <option value="">All Departments</option>
                            @foreach(\App\Models\Department::orderBy('name')->get() as $department)
                                <option value="{{ $department->name }}">{{ $department->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Desktop Table View --}}
                    <div class="hidden md:block overflow-x-auto rounded-2xl border border-gray-200 shadow-sm">
                        <table class="w-full table-auto border-collapse" id="coursesTable">
                            <thead>
                                <tr class="bg-gradient-to-r from-gray-50 to-gray-100">
                                    <th class="px-6 py-5 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">
                                        <div class="flex items-center gap-2">
                                            <div class="w-8 h-8 bg-[#006633]/10 rounded-lg flex items-center justify-center">
                                                <svg class="w-4 h-4 text-[#006633]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14"/>
                                                </svg>
                                            </div>
                                            Course Code
                                        </div>
                                    </th>
                                    <th class="px-6 py-5 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">
                                        <div class="flex items-center gap-2">
                                            <div class="w-8 h-8 bg-[#006633]/10 rounded-lg flex items-center justify-center">
                                                <svg class="w-4 h-4 text-[#006633]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                                                </svg>
                                            </div>
                                            Course Name
                                        </div>
                                    </th>
                                    <th class="px-6 py-5 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">
                                        <div class="flex items-center gap-2">
                                            <div class="w-8 h-8 bg-[#006633]/10 rounded-lg flex items-center justify-center">
                                                <svg class="w-4 h-4 text-[#006633]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                                                </svg>
                                            </div>
                                            Department
                                        </div>
                                    </th>
                                    <th class="px-6 py-5 text-center text-xs font-bold text-gray-600 uppercase tracking-wider">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-100">
                                @forelse($courses as $course)
                                    <tr class="course-row table-row-modern hover:bg-gradient-to-r hover:from-[#006633]/[0.02] hover:to-[#D4AF37]/[0.02]" data-department="{{ $course->department->name }}">
                                        <td class="px-6 py-5 whitespace-nowrap">
                                            <span class="inline-flex items-center px-4 py-2 rounded-xl bg-gradient-to-r from-[#006633]/10 to-[#006633]/5 text-[#006633] font-bold text-sm border border-[#006633]/20">
                                                {{ $course->course_code }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-5">
                                            <span class="text-gray-800 font-semibold">{{ $course->course_name }}</span>
                                        </td>
                                        <td class="px-6 py-5 whitespace-nowrap">
                                            <span class="inline-flex items-center gap-2 text-gray-600 text-sm">
                                                <span class="w-3 h-3 bg-gradient-to-r from-[#D4AF37] to-[#FFD700] rounded-full shadow-sm"></span>
                                                {{ $course->department->name }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-5 whitespace-nowrap text-center">
                                            <div class="flex items-center justify-center gap-3">
                                                <a href="{{ route('admin.courses.edit', $course) }}" class="btn-modern inline-flex items-center gap-2 px-4 py-2.5 bg-gradient-to-r from-blue-50 to-indigo-50 text-blue-600 rounded-xl hover:from-blue-100 hover:to-indigo-100 transition-all text-sm font-semibold border border-blue-200">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                                    </svg>
                                                    Edit
                                                </a>
                                                <form method="POST" action="{{ route('admin.courses.destroy', $course) }}" class="inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" data-confirm-delete="Are you sure you want to delete this course?" class="btn-modern inline-flex items-center gap-2 px-4 py-2.5 bg-gradient-to-r from-red-50 to-rose-50 text-red-600 rounded-xl hover:from-red-100 hover:to-rose-100 transition-all text-sm font-semibold border border-red-200">
                                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                                        </svg>
                                                        Delete
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="px-6 py-16 text-center">
                                            <div class="flex flex-col items-center justify-center">
                                                <div class="w-20 h-20 bg-gradient-to-br from-gray-100 to-gray-50 rounded-2xl flex items-center justify-center mb-5 shadow-inner">
                                                    <svg class="w-10 h-10 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                                                    </svg>
                                                </div>
                                                <p class="text-gray-600 font-bold text-lg mb-1">No courses found</p>
                                                <p class="text-gray-400 text-sm">Get started by adding a new course</p>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    {{-- Mobile Card View --}}
                    <div class="md:hidden space-y-4" id="mobileCards">
                        @forelse($courses as $course)
                            <div class="course-card bg-white rounded-2xl border border-gray-200 p-5 shadow-sm hover:shadow-lg hover:border-[#006633]/20 transition-all duration-300" data-department="{{ $course->department->name }}">
                                <div class="flex items-start justify-between mb-4">
                                    <span class="inline-flex items-center px-3 py-1 rounded-lg bg-[#006633]/10 text-[#006633] font-semibold text-sm">
                                        {{ $course->course_code }}
                                    </span>
                                    <span class="inline-flex items-center gap-1.5 text-gray-500 text-xs">
                                        <span class="w-2 h-2 bg-[#D4AF37] rounded-full"></span>
                                        {{ $course->department->name }}
                                    </span>
                                </div>
                                <h4 class="text-gray-800 font-semibold mb-4">{{ $course->course_name }}</h4>
                                <div class="flex items-center gap-2 pt-3 border-t border-gray-100">
                                    <a href="{{ route('admin.courses.edit', $course) }}" class="flex-1 inline-flex items-center justify-center gap-1.5 px-3 py-2 bg-blue-50 text-blue-600 rounded-lg hover:bg-blue-100 transition-colors text-sm font-medium">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                        </svg>
                                        Edit
                                    </a>
                                    <form method="POST" action="{{ route('admin.courses.destroy', $course) }}" class="flex-1">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" data-confirm-delete="Are you sure you want to delete this course?" class="w-full inline-flex items-center justify-center gap-1.5 px-3 py-2 bg-red-50 text-red-600 rounded-lg hover:bg-red-100 transition-colors text-sm font-medium">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                            </svg>
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @empty
                            <div class="bg-white rounded-xl border border-gray-200 p-8 text-center">
                                <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                                    <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                                    </svg>
                                </div>
                                <p class="text-gray-500 font-medium">No courses found</p>
                                <p class="text-gray-400 text-sm mt-1">Get started by adding a new course</p>
                            </div>
                        @endforelse
                    </div>

                    {{-- Pagination --}}
                    @if(method_exists($courses, 'hasPages') && $courses->hasPages())
                        <div class="mt-6 flex flex-col items-center gap-3">
                            {{-- Pagination Numbers --}}
                            <div class="flex items-center gap-1">
                                {{-- Previous Button --}}
                                @if($courses->onFirstPage())
                                    <span class="px-3 py-2 text-gray-400 bg-gray-100 rounded-lg cursor-not-allowed">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                                        </svg>
                                    </span>
                                @else
                                    <a href="{{ $courses->previousPageUrl() }}" class="px-3 py-2 text-gray-600 bg-white border border-gray-200 rounded-lg hover:bg-[#006633] hover:text-white hover:border-[#006633] transition-all">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                                        </svg>
                                    </a>
                                @endif

                                {{-- Page Numbers --}}
                                @foreach($courses->getUrlRange(1, $courses->lastPage()) as $page => $url)
                                    @if($page == $courses->currentPage())
                                        <span class="px-4 py-2 bg-gradient-to-br from-[#006633] to-[#004d26] text-white font-semibold rounded-lg shadow-md">
                                            {{ $page }}
                                        </span>
                                    @else
                                        <a href="{{ $url }}" class="px-4 py-2 text-gray-600 bg-white border border-gray-200 rounded-lg hover:bg-[#006633] hover:text-white hover:border-[#006633] transition-all">
                                            {{ $page }}
                                        </a>
                                    @endif
                                @endforeach

                                {{-- Next Button --}}
                                @if($courses->hasMorePages())
                                    <a href="{{ $courses->nextPageUrl() }}" class="px-3 py-2 text-gray-600 bg-white border border-gray-200 rounded-lg hover:bg-[#006633] hover:text-white hover:border-[#006633] transition-all">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                        </svg>
                                    </a>
                                @else
                                    <span class="px-3 py-2 text-gray-400 bg-gray-100 rounded-lg cursor-not-allowed">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                        </svg>
                                    </span>
                                @endif
                            </div>

                            {{-- Results Count --}}
                            <p class="text-sm text-gray-500">
                                Showing <span class="font-medium text-gray-700">{{ $courses->firstItem() }}</span> 
                                to <span class="font-medium text-gray-700">{{ $courses->lastItem() }}</span> 
                                of <span class="font-medium text-gray-700">{{ $courses->total() }}</span> results
                            </p>
                        </div>
                    @else
                        {{-- Results Count (only show if no pagination) --}}
                        <div class="mt-4 text-center text-sm text-gray-500">
                            Showing <span class="font-medium text-gray-700">{{ $courses->count() }}</span> 
                            {{ Str::plural('course', $courses->count()) }}
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>

{{-- Custom Styling --}}
<style>
    /* Department dropdown styling */
    #departmentFilter {
        min-width: 180px;
    }
    
    #departmentFilter option {
        padding: 8px 12px;
    }
</style>

{{-- Search and Filter Script --}}
<script>
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('searchInput');
    const departmentFilter = document.getElementById('departmentFilter');
    const tableRows = document.querySelectorAll('.course-row');
    const mobileCards = document.querySelectorAll('.course-card');

    function filterCourses() {
        const searchTerm = searchInput.value.toLowerCase();
        const selectedDepartment = departmentFilter.value;

        // Filter table rows
        tableRows.forEach(row => {
            const text = row.textContent.toLowerCase();
            const department = row.dataset.department;
            const matchesSearch = text.includes(searchTerm);
            const matchesDepartment = !selectedDepartment || department === selectedDepartment;
            row.style.display = matchesSearch && matchesDepartment ? '' : 'none';
        });

        // Filter mobile cards
        mobileCards.forEach(card => {
            const text = card.textContent.toLowerCase();
            const department = card.dataset.department;
            const matchesSearch = text.includes(searchTerm);
            const matchesDepartment = !selectedDepartment || department === selectedDepartment;
            card.style.display = matchesSearch && matchesDepartment ? '' : 'none';
        });
    }

    searchInput.addEventListener('input', filterCourses);
    departmentFilter.addEventListener('change', filterCourses);
});
</script>
@endsection