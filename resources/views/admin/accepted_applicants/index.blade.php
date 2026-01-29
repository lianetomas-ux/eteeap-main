@extends('layouts.admin')

@section('content')

<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Playfair+Display:wght@500;600;700&display=swap" rel="stylesheet">

<style>
/* Custom scrollbar */
.custom-scrollbar::-webkit-scrollbar {
    height: 8px;
}
.custom-scrollbar::-webkit-scrollbar-track {
    background: #f1f5f9;
    border-radius: 10px;
}
.custom-scrollbar::-webkit-scrollbar-thumb {
    background: linear-gradient(135deg, #006633, #004d26);
    border-radius: 10px;
}
.custom-scrollbar::-webkit-scrollbar-thumb:hover {
    background: #004d26;
}
</style>

<div class="min-h-screen bg-gradient-to-br from-[#f8fdf8] via-[#f0f7f0] to-[#e8f5e8] py-4 sm:py-6 lg:py-8 px-3 sm:px-4 lg:px-6 relative overflow-hidden">
    
    {{-- Animated Background Elements --}}
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute top-20 left-10 w-72 h-72 bg-[#006633]/5 rounded-full blur-3xl float-animation"></div>
        <div class="absolute top-40 right-20 w-96 h-96 bg-[#D4AF37]/5 rounded-full blur-3xl float-animation" style="animation-delay: -2s;"></div>
        <div class="absolute bottom-20 left-1/3 w-80 h-80 bg-emerald-400/5 rounded-full blur-3xl float-animation" style="animation-delay: -4s;"></div>
    </div>

    {{-- Success Message --}}
    @if(session('success'))
        <div data-success-message="{{ session('success') }}" style="display: none;"></div>
    @endif

    {{-- Page Header --}}
    <div class="relative z-10 mb-6 sm:mb-8">
        <div class="modern-card rounded-3xl overflow-hidden mb-6">
            <div class="animated-gradient p-6 sm:p-8 relative overflow-hidden">
                <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/5 to-transparent"></div>
                <div class="absolute -top-1/2 -right-[10%] w-[200px] h-[200px] bg-[#FFD700]/10 rounded-full blur-3xl pointer-events-none"></div>
                
                <div class="relative z-10 flex flex-col lg:flex-row lg:justify-between lg:items-center gap-4">
                    <div class="flex items-center gap-4">
                        <div class="w-14 h-14 sm:w-16 sm:h-16 bg-[#FFD700]/20 backdrop-blur-xl rounded-2xl flex items-center justify-center border border-[#FFD700]/30 shadow-lg shadow-[#FFD700]/20">
                            <i class="fa fa-users text-[#FFD700] text-2xl sm:text-3xl"></i>
                        </div>
                        <div>
                            <h1 class="font-bold text-2xl sm:text-3xl lg:text-4xl text-white mb-1" style="font-family: 'Playfair Display', Georgia, serif;">
                                Accepted Applicants
                            </h1>
                            <p class="text-white/70 text-sm sm:text-base">Schedule orientation first, then interview for final approvals</p>
                        </div>
                    </div>
                </div>
                
                {{-- Search Bar --}}
                <div class="relative mt-6 max-w-md">
                    <div class="absolute left-4 top-1/2 -translate-y-1/2 w-8 h-8 bg-white/10 rounded-lg flex items-center justify-center">
                        <i class="fa fa-search text-white/70 text-sm"></i>
                    </div>
                    <input type="text" id="searchInput" 
                           class="w-full py-3 pl-14 pr-5 text-sm bg-white/10 backdrop-blur-xl border border-white/20 rounded-2xl text-white placeholder-white/50 transition-all duration-300 focus:outline-none focus:border-white/40 focus:ring-4 focus:ring-white/10"
                           placeholder="Search by name or degree...">
                </div>
            </div>
        </div>
    </div>

    {{-- ==================== ORIENTATION SCHEDULING SECTION (FIRST STEP) ==================== --}}
    <div class="relative z-10 modern-card rounded-2xl sm:rounded-3xl overflow-hidden mb-6 sm:mb-8">
        
        {{-- Section Header --}}
        <div class="relative flex flex-col sm:flex-row sm:justify-between sm:items-center gap-2 sm:gap-0 px-4 sm:px-6 py-4 sm:py-5 bg-gradient-to-r from-[#D4AF37] to-[#FFD700]">
            <h2 class="font-bold text-base sm:text-lg lg:text-xl text-white flex items-center gap-3" style="font-family: 'Playfair Display', Georgia, serif;">
                <div class="w-10 h-10 bg-white/20 rounded-xl flex items-center justify-center">
                    <i class="fa fa-video-camera text-white"></i>
                </div>
                Schedule Virtual Orientation (Step 1)
            </h2>
            <span class="bg-white/20 backdrop-blur-sm text-white px-4 py-2 rounded-xl text-xs sm:text-sm font-bold w-fit shadow-lg">
                {{ $applications->filter(fn($app) => !$app->orientationSchedule)->count() }} Pending Orientation
            </span>
            <div class="absolute bottom-0 left-0 right-0 h-1 bg-gradient-to-r from-[#006633] via-[#004d26] to-[#006633]"></div>
        </div>
        
        <form action="{{ route('orientation.create') }}" method="GET" id="orientationForm">
            @csrf
            
            {{-- Desktop Table --}}
            <div class="hidden md:block overflow-x-auto custom-scrollbar">
                <table class="w-full border-collapse min-w-[600px]">
                    <thead class="bg-gradient-to-b from-gray-50 to-gray-100">
                        <tr>
                            <th class="px-4 lg:px-5 py-4 text-center text-xs font-bold uppercase tracking-wider text-gray-600 border-b-2 border-[#D4AF37]/30 w-16">
                                <input type="checkbox" id="selectAllOrientation" class="w-5 h-5 accent-[#D4AF37] cursor-pointer rounded">
                            </th>
                            <th class="px-4 lg:px-5 py-4 text-left text-xs font-bold uppercase tracking-wider text-gray-600 border-b-2 border-[#D4AF37]/30">
                                <div class="flex items-center gap-2">
                                    <div class="w-7 h-7 bg-[#D4AF37]/20 rounded-lg flex items-center justify-center">
                                        <i class="fa fa-user text-[#D4AF37] text-xs"></i>
                                    </div>
                                    Applicant
                                </div>
                            </th>
                            <th class="px-4 lg:px-5 py-4 text-left text-xs font-bold uppercase tracking-wider text-gray-600 border-b-2 border-[#D4AF37]/30">
                                <div class="flex items-center gap-2">
                                    <div class="w-7 h-7 bg-[#D4AF37]/20 rounded-lg flex items-center justify-center">
                                        <i class="fa fa-graduation-cap text-[#D4AF37] text-xs"></i>
                                    </div>
                                    Degree Program
                                </div>
                            </th>
                            <th class="px-4 lg:px-5 py-4 text-left text-xs font-bold uppercase tracking-wider text-gray-600 border-b-2 border-[#D4AF37]/30">
                                <div class="flex items-center gap-2">
                                    <div class="w-7 h-7 bg-[#D4AF37]/20 rounded-lg flex items-center justify-center">
                                        <i class="fa fa-info-circle text-[#D4AF37] text-xs"></i>
                                    </div>
                                    Status
                                </div>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $hasNoOrientation = false; @endphp
                        @foreach($applications as $application)
                            @if(!$application->orientationSchedule)
                                @php $hasNoOrientation = true; @endphp
                                <tr class="orientation-pending-row table-row-modern hover:bg-gradient-to-r hover:from-[#D4AF37]/5 hover:to-transparent transition-all duration-200">
                                    <td class="px-4 lg:px-5 py-4 text-center border-b border-gray-100">
                                        <input type="checkbox" name="applicant_ids[]" 
                                               value="{{ $application->id }}" 
                                               class="orientation-checkbox w-5 h-5 accent-[#D4AF37] cursor-pointer rounded">
                                    </td>
                                    <td class="px-4 lg:px-5 py-4 border-b border-gray-100">
                                        <div class="flex flex-col">
                                            <span class="applicant-name font-bold text-gray-800 text-sm">{{ $application->first_name }} {{ $application->middle_name }} {{ $application->last_name }}</span>
                                            <span class="text-xs text-gray-400 mt-0.5">ID: {{ $application->user->unique_id ?? $application->user_id }}</span>
                                        </div>
                                    </td>
                                    <td class="degree-program px-4 lg:px-5 py-4 border-b border-gray-100 text-gray-700 text-sm font-medium">{{ $application->displayField('degree_program') }}</td>
                                    <td class="px-4 lg:px-5 py-4 border-b border-gray-100">
                                        @if($application->status == 'Ready for Interview' || $application->status == 'Accepted by Assessor')
                                            <span class="badge-modern inline-flex items-center gap-2 px-4 py-2 rounded-xl text-xs font-bold uppercase tracking-wide text-purple-800 bg-gradient-to-r from-purple-100 to-purple-50 border border-purple-200">
                                                <i class="fa fa-calendar-check-o"></i> Ready for Interview
                                            </span>
                                        @elseif($application->status == 'Final Admission List')
                                            <span class="badge-modern inline-flex items-center gap-2 px-4 py-2 rounded-xl text-xs font-bold uppercase tracking-wide text-white bg-gradient-to-r from-[#008844] to-[#006633] shadow-lg shadow-[#006633]/20">
                                                <i class="fa fa-star"></i> Approved
                                            </span>
                                        @else
                                            <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full text-xs font-semibold uppercase tracking-wide text-blue-800 bg-gradient-to-r from-[#dbeafe] to-[#bfdbfe]">
                                                {{ $application->status }}
                                            </span>
                                        @endif
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                        @if(!$hasNoOrientation)
                            <tr>
                                <td colspan="4" class="py-16 text-center">
                                    <i class="fa fa-video-camera text-5xl text-[#D4AF37]/30 mb-4 block"></i>
                                    <p class="text-gray-400 text-sm">All applicants have orientation scheduled</p>
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
            
            {{-- Pagination for Orientation Desktop --}}
            @if($hasNoOrientation)
            <div class="hidden md:flex flex-col sm:flex-row items-center justify-between gap-4 px-4 sm:px-6 py-4 border-t border-[#D4AF37]/10 bg-gradient-to-b from-white to-[#f8fafc]">
                <div class="text-sm text-gray-600">
                    Showing <span id="orientation-start" class="font-semibold">1</span> to <span id="orientation-end" class="font-semibold">10</span> of <span id="orientation-total" class="font-semibold">{{ $applications->filter(fn($app) => !$app->orientationSchedule)->count() }}</span> applicants
                </div>
                <div class="flex items-center gap-2">
                    <button type="button" onclick="changePage('orientation', -1)" class="px-3 py-2 rounded-lg border border-gray-300 text-gray-700 hover:bg-gray-50 disabled:opacity-50 disabled:cursor-not-allowed transition-colors" id="orientation-prev">
                        <i class="fa fa-chevron-left"></i>
                    </button>
                    <div id="orientation-pages" class="flex items-center gap-1"></div>
                    <button type="button" onclick="changePage('orientation', 1)" class="px-3 py-2 rounded-lg border border-gray-300 text-gray-700 hover:bg-gray-50 disabled:opacity-50 disabled:cursor-not-allowed transition-colors" id="orientation-next">
                        <i class="fa fa-chevron-right"></i>
                    </button>
                </div>
            </div>
            @endif

            {{-- Mobile Card View --}}
            <div class="md:hidden p-3 sm:p-4 space-y-3">
                @php $hasNoOrientationMobile = false; @endphp
                @foreach($applications as $application)
                    @if(!$application->orientationSchedule)
                        @php $hasNoOrientationMobile = true; @endphp
                        <div class="orientation-pending-row bg-white rounded-xl p-4 border border-[#D4AF37]/20 shadow-sm hover:shadow-md transition-all duration-200">
                            <div class="flex items-start gap-3">
                                <input type="checkbox" name="applicant_ids[]" 
                                       value="{{ $application->id }}" 
                                       class="orientation-checkbox mt-1 w-5 h-5 accent-[#D4AF37] cursor-pointer flex-shrink-0">
                                
                                <div class="flex-1 min-w-0">
                                    <div class="flex items-start justify-between gap-2 mb-2">
                                        <div class="flex-1">
                                            <h3 class="applicant-name font-semibold text-gray-900 text-sm mb-0.5">
                                                {{ $application->first_name }} {{ $application->middle_name }} {{ $application->last_name }}
                                            </h3>
                                            <p class="text-xs text-gray-400">ID: {{ $application->user->unique_id ?? $application->user_id }}</p>
                                        </div>
                                        @if($application->status == 'Ready for Interview' || $application->status == 'Accepted by Assessor')
                                            <span class="inline-flex items-center gap-1 px-2 py-1 rounded-full text-[10px] font-semibold uppercase text-purple-800 bg-gradient-to-r from-purple-100 to-purple-50 whitespace-nowrap">
                                                <i class="fa fa-calendar-check-o"></i> Ready for Interview
                                            </span>
                                        @elseif($application->status == 'Final Admission List')
                                            <span class="inline-flex items-center gap-1 px-2 py-1 rounded-full text-[10px] font-semibold uppercase text-white bg-gradient-to-r from-[#008844] to-[#006633] whitespace-nowrap">
                                                <i class="fa fa-star"></i> Approved
                                            </span>
                                        @else
                                            <span class="inline-flex items-center gap-1 px-2 py-1 rounded-full text-[10px] font-semibold uppercase text-blue-800 bg-gradient-to-r from-[#dbeafe] to-[#bfdbfe] whitespace-nowrap">
                                                {{ $application->status }}
                                            </span>
                                        @endif
                                    </div>
                                    
                                    <div class="degree-program text-xs text-gray-600 bg-gray-50 rounded-lg px-3 py-2 mt-2">
                                        <i class="fa fa-graduation-cap text-[#006633] mr-1"></i>
                                        {{ $application->displayField('degree_program') }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
                
                @if(!$hasNoOrientationMobile)
                    <div class="py-16 text-center">
                        <i class="fa fa-video-camera text-5xl text-[#D4AF37]/30 mb-4 block"></i>
                        <p class="text-gray-400 text-sm">All applicants have orientation scheduled</p>
                    </div>
                @endif
            </div>
            
            @if($hasNoOrientation)
            <div class="px-4 sm:px-6 py-4 sm:py-6 text-center border-t border-[#D4AF37]/10 bg-gradient-to-b from-[#f8fafc] to-white">
                <button type="submit" 
                        class="inline-flex items-center gap-2 px-6 sm:px-8 py-2.5 sm:py-3 rounded-full text-white font-semibold text-sm sm:text-base transition-all duration-200 hover:-translate-y-0.5 hover:shadow-xl w-full sm:w-auto justify-center bg-gradient-to-r from-[#D4AF37] to-[#FFD700] shadow-lg shadow-[#D4AF37]/30">
                    <i class="fa fa-video-camera"></i>
                    Schedule Virtual Orientation
                </button>
            </div>
            @endif
        </form>
    </div>

    {{-- ==================== INTERVIEW SCHEDULING SECTION (STEP 2) ==================== --}}
    <div class="relative z-10 bg-[#FEFDFB] rounded-xl sm:rounded-2xl overflow-hidden border border-[#006633]/10 mb-6 sm:mb-8 shadow-lg">
        
        {{-- Section Header --}}
        <div class="relative flex flex-col sm:flex-row sm:justify-between sm:items-center gap-2 sm:gap-0 px-4 sm:px-6 py-4 sm:py-5 bg-gradient-to-r from-[#3b82f6] to-[#2563eb]">
            <h2 class="font-playfair font-semibold text-base sm:text-lg lg:text-xl text-white flex items-center gap-2">
                <i class="fa fa-calendar text-white/80"></i>
                Schedule Interview (Step 2)
            </h2>
            <span class="bg-white/20 text-white px-3 sm:px-4 py-1 sm:py-1.5 rounded-full text-xs sm:text-sm font-semibold w-fit">
                {{ $applications->filter(fn($app) => $app->orientationSchedule && !$app->schedule)->count() }} Pending Interview
            </span>
            <div class="absolute bottom-0 left-0 right-0 h-1 bg-gradient-to-r from-[#93c5fd] via-white/50 to-[#93c5fd]"></div>
        </div>
        
        <form action="{{ route('schedule.create') }}" method="GET" id="scheduleForm">
            @csrf
            
            {{-- Desktop Table --}}
            <div class="hidden md:block overflow-x-auto custom-scrollbar">
                <table class="w-full border-collapse min-w-[600px]">
                    <thead class="bg-gradient-to-b from-[#f8fafc] to-[#f1f5f9]">
                        <tr>
                            <th class="px-4 lg:px-5 py-3 sm:py-4 text-center text-xs font-semibold uppercase tracking-wide text-gray-600 border-b-2 border-blue-100 w-16">
                                <input type="checkbox" id="selectAllNotScheduled" class="w-4 h-4 accent-[#3b82f6] cursor-pointer">
                            </th>
                            <th class="px-4 lg:px-5 py-3 sm:py-4 text-left text-xs font-semibold uppercase tracking-wide text-gray-600 border-b-2 border-blue-100">Applicant</th>
                            <th class="px-4 lg:px-5 py-3 sm:py-4 text-left text-xs font-semibold uppercase tracking-wide text-gray-600 border-b-2 border-blue-100">Degree Program</th>
                            <th class="px-4 lg:px-5 py-3 sm:py-4 text-left text-xs font-semibold uppercase tracking-wide text-gray-600 border-b-2 border-blue-100">Orientation Status</th>
                            <th class="px-4 lg:px-5 py-3 sm:py-4 text-left text-xs font-semibold uppercase tracking-wide text-gray-600 border-b-2 border-blue-100">Interview Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $hasInterviewPending = false; @endphp
                        @foreach($applications as $application)
                            @if($application->orientationSchedule && !$application->schedule)
                                @php $hasInterviewPending = true; @endphp
                                <tr class="not-scheduled-row hover:bg-gradient-to-r hover:from-blue-50 hover:to-transparent transition-all duration-200">
                                    <td class="px-4 lg:px-5 py-3 sm:py-4 text-center border-b border-gray-100">
                                        <input type="checkbox" name="applicant_ids[]" 
                                               value="{{ $application->id }}" 
                                               class="not-scheduled-checkbox w-4 h-4 sm:w-5 sm:h-5 accent-[#3b82f6] cursor-pointer">
                                    </td>
                                    <td class="px-4 lg:px-5 py-3 sm:py-4 border-b border-gray-100">
                                        <div class="flex flex-col">
                                            <span class="applicant-name font-semibold text-gray-800 text-sm">{{ $application->first_name }} {{ $application->middle_name }} {{ $application->last_name }}</span>
                                            <span class="text-xs text-gray-400">ID: {{ $application->user->unique_id ?? $application->user_id }}</span>
                                        </div>
                                    </td>
                                    <td class="degree-program px-4 lg:px-5 py-3 sm:py-4 border-b border-gray-100 text-gray-700 text-sm">{{ $application->displayField('degree_program') }}</td>
                                    <td class="px-4 lg:px-5 py-3 sm:py-4 border-b border-gray-100">
                                        <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full text-xs font-semibold uppercase tracking-wide text-green-800 bg-gradient-to-r from-[#dcfce7] to-[#bbf7d0]">
                                            <i class="fa fa-check"></i> Orientation Completed
                                        </span>
                                    </td>
                                    <td class="px-4 lg:px-5 py-3 sm:py-4 border-b border-gray-100">
                                        <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full text-xs font-semibold uppercase tracking-wide text-amber-800 bg-gradient-to-r from-[#fef3c7] to-[#fde68a]">
                                            <i class="fa fa-clock-o"></i> Pending
                                        </span>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                        @if(!$hasInterviewPending)
                            <tr>
                                <td colspan="5" class="py-16 text-center">
                                    <i class="fa fa-calendar text-5xl text-[#3b82f6]/30 mb-4 block"></i>
                                    <p class="text-gray-400 text-sm">No applicants pending interview scheduling</p>
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>

            {{-- Mobile Card View --}}
            <div class="md:hidden p-3 sm:p-4 space-y-3">
                @php $hasInterviewPendingMobile = false; @endphp
                @foreach($applications as $application)
                    @if($application->orientationSchedule && !$application->schedule)
                        @php $hasInterviewPendingMobile = true; @endphp
                        <div class="not-scheduled-row bg-white rounded-xl p-4 border border-blue-200 shadow-sm hover:shadow-md transition-all duration-200">
                            <div class="flex items-start gap-3">
                                <input type="checkbox" name="applicant_ids[]" 
                                       value="{{ $application->id }}" 
                                       class="not-scheduled-checkbox mt-1 w-5 h-5 accent-[#3b82f6] cursor-pointer flex-shrink-0">
                                
                                <div class="flex-1 min-w-0">
                                    <div class="flex items-start justify-between gap-2 mb-2">
                                        <div class="flex-1">
                                            <h3 class="applicant-name font-semibold text-gray-900 text-sm mb-0.5">
                                                {{ $application->first_name }} {{ $application->middle_name }} {{ $application->last_name }}
                                            </h3>
                                            <p class="text-xs text-gray-400">ID: {{ $application->user->unique_id ?? $application->user_id }}</p>
                                        </div>
                                        <span class="inline-flex items-center gap-1 px-2 py-1 rounded-full text-[10px] font-semibold uppercase text-amber-800 bg-gradient-to-r from-[#fef3c7] to-[#fde68a] whitespace-nowrap">
                                            <i class="fa fa-clock-o"></i> Pending Interview
                                        </span>
                                    </div>
                                    
                                    <div class="degree-program text-xs text-gray-600 bg-gray-50 rounded-lg px-3 py-2 mt-2">
                                        <i class="fa fa-graduation-cap text-[#3b82f6] mr-1"></i>
                                        {{ $application->displayField('degree_program') }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
                
                @if(!$hasInterviewPendingMobile)
                    <div class="py-16 text-center">
                        <i class="fa fa-calendar text-5xl text-[#3b82f6]/30 mb-4 block"></i>
                        <p class="text-gray-400 text-sm">No applicants pending interview scheduling</p>
                    </div>
                @endif
            </div>
            
            @if($hasInterviewPending)
            <div class="px-4 sm:px-6 py-4 sm:py-6 text-center border-t border-blue-100 bg-gradient-to-b from-[#f8fafc] to-white">
                <button type="submit" 
                        class="inline-flex items-center gap-2 px-6 sm:px-8 py-2.5 sm:py-3 rounded-full text-white font-semibold text-sm sm:text-base transition-all duration-200 hover:-translate-y-0.5 hover:shadow-xl w-full sm:w-auto justify-center bg-gradient-to-r from-[#3b82f6] to-[#2563eb] shadow-lg shadow-[#3b82f6]/30">
                    <i class="fa fa-calendar"></i>
                    Schedule Interview
                </button>
            </div>
            @endif
        </form>
    </div>

    {{-- ==================== SCHEDULED SECTION ==================== --}}
    <div class="relative z-10 bg-[#FEFDFB] rounded-xl sm:rounded-2xl overflow-hidden border border-[#006633]/10 shadow-lg">
        
        {{-- Section Header --}}
        <div class="relative flex flex-col sm:flex-row sm:justify-between sm:items-center gap-2 sm:gap-0 px-4 sm:px-6 py-4 sm:py-5 bg-gradient-to-r from-[#006633] to-[#004d26]">
            <h2 class="font-playfair font-semibold text-base sm:text-lg lg:text-xl text-white flex items-center gap-2">
                <i class="fa fa-calendar-check text-[#FFD700]"></i>
                Scheduled Applicants
            </h2>
            <span class="bg-white/20 text-white px-3 sm:px-4 py-1 sm:py-1.5 rounded-full text-xs sm:text-sm font-semibold w-fit">
                {{ $applications->filter(fn($app) => $app->schedule)->count() }} Scheduled
            </span>
            <div class="absolute bottom-0 left-0 right-0 h-1 bg-gradient-to-r from-[#FFD700] via-[#D4AF37] to-[#FFD700]"></div>
        </div>
        
        {{-- Desktop Table --}}
        <div class="hidden lg:block overflow-x-auto custom-scrollbar">
            <table class="w-full border-collapse">
                <thead class="bg-gradient-to-b from-[#f8fafc] to-[#f1f5f9]">
                    <tr>
                        <th class="px-5 py-4 text-left text-xs font-semibold uppercase tracking-wide text-gray-600 border-b-2 border-[#006633]/10">Applicant</th>
                        <th class="px-5 py-4 text-left text-xs font-semibold uppercase tracking-wide text-gray-600 border-b-2 border-[#006633]/10">Degree Program</th>
                        <th class="px-5 py-4 text-left text-xs font-semibold uppercase tracking-wide text-gray-600 border-b-2 border-[#006633]/10">Status</th>
                        <th class="px-5 py-4 text-left text-xs font-semibold uppercase tracking-wide text-gray-600 border-b-2 border-[#006633]/10">Interview Schedule</th>
                        <th class="px-5 py-4 text-left text-xs font-semibold uppercase tracking-wide text-gray-600 border-b-2 border-[#006633]/10">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @php $hasScheduled = false; @endphp
                    @foreach($applications as $application)
                        @if($application->schedule)
                            @php $hasScheduled = true; @endphp
                            <tr class="scheduled-row hover:bg-gradient-to-r hover:from-[#006633]/5 hover:to-[#D4AF37]/5 transition-all duration-200">
                                <td class="px-5 py-4 border-b border-gray-100">
                                    <div class="flex flex-col">
                                        <span class="applicant-name font-semibold text-gray-800">{{ $application->first_name }} {{ $application->middle_name }} {{ $application->last_name }}</span>
                                        <span class="text-xs text-gray-400">ID: {{ $application->user->unique_id ?? $application->user_id }}</span>
                                    </div>
                                </td>
                                <td class="degree-program px-5 py-4 border-b border-gray-100 text-gray-700 text-sm">{{ $application->displayField('degree_program') }}</td>
                                <td class="px-5 py-4 border-b border-gray-100">
                                    @if($application->status == 'Ready for Interview' || $application->status == 'Accepted by Assessor')
                                        <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full text-xs font-semibold uppercase tracking-wide text-purple-800 bg-gradient-to-r from-purple-100 to-purple-50">
                                            <i class="fa fa-calendar-check-o"></i> Ready for Interview
                                        </span>
                                    @elseif($application->status == 'Final Admission List')
                                        <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full text-xs font-semibold uppercase tracking-wide text-white bg-gradient-to-r from-[#008844] to-[#006633]">
                                            <i class="fa fa-star"></i> Approved
                                        </span>
                                    @else
                                        <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full text-xs font-semibold uppercase tracking-wide text-blue-800 bg-gradient-to-r from-[#dbeafe] to-[#bfdbfe]">
                                            {{ $application->status }}
                                        </span>
                                    @endif
                                </td>
                                <td class="px-5 py-4 border-b border-gray-100">
                                    <div class="text-sm space-y-1">
                                        <div class="flex items-center gap-2">
                                            <i class="fa fa-calendar text-[#006633]"></i>
                                            <span class="text-gray-700">{{ $application->schedule->interview_date }}</span>
                                        </div>
                                        <div class="flex items-center gap-2">
                                            <i class="fa fa-clock text-[#006633]"></i>
                                            <span class="text-gray-700">{{ $application->schedule->interview_time }}</span>
                                        </div>
                                        <div class="flex items-center gap-2">
                                            <i class="fa fa-map-marker text-[#006633]"></i>
                                            <span class="text-gray-700">{{ $application->schedule->interview_location }}</span>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-5 py-4 border-b border-gray-100">
                                    <div class="flex flex-wrap gap-2">
                                        <a href="{{ route('schedule.reschedule', $application->schedule->id) }}" 
                                           class="inline-flex items-center gap-1.5 px-3 py-2 rounded-lg text-xs font-semibold transition-all duration-200 hover:-translate-y-0.5 hover:shadow-lg no-underline bg-gradient-to-r from-[#D4AF37] to-[#fbbf24] text-[#004d26]">
                                            <i class="fa fa-refresh"></i> Reschedule
                                        </a>
                                        @if($application->status == 'Ready for Interview' || $application->status == 'Accepted by Assessor')
                                            <button type="button" 
                                                    class="inline-flex items-center gap-1.5 px-3 py-2 rounded-lg text-xs font-semibold text-white transition-all duration-200 hover:-translate-y-0.5 hover:shadow-lg border-0 cursor-pointer bg-gradient-to-r from-[#008844] to-[#006633]"
                                                    onclick="showApproveModal({{ $application->id }})">
                                                <i class="fa fa-check"></i> Approve
                                            </button>
                                            <button type="button" 
                                                    class="inline-flex items-center gap-1.5 px-3 py-2 rounded-lg text-xs font-semibold text-white transition-all duration-200 hover:-translate-y-0.5 hover:shadow-lg border-0 cursor-pointer bg-gradient-to-r from-[#f87171] to-[#ef4444]"
                                                    onclick="showRejectModal({{ $application->id }}, '{{ $application->first_name }} {{ $application->middle_name }} {{ $application->last_name }}')">
                                                <i class="fa fa-times"></i> Reject
                                            </button>
                                        @elseif($application->status == 'Final Admission List')
                                            <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-md text-xs font-semibold text-green-800 bg-gradient-to-r from-[#dcfce7] to-[#bbf7d0]">
                                                <i class="fa fa-check-circle"></i> Approved
                                            </span>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                    @if(!$hasScheduled)
                        <tr>
                            <td colspan="5" class="py-16 text-center">
                                <i class="fa fa-calendar text-5xl text-[#006633]/30 mb-4 block"></i>
                                <p class="text-gray-400 text-sm">No scheduled applicants yet</p>
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
        
        {{-- Pagination for Scheduled Desktop --}}
        @if($hasScheduled)
        <div class="hidden lg:flex flex-col sm:flex-row items-center justify-between gap-4 px-4 sm:px-6 py-4 border-t border-[#006633]/10 bg-gradient-to-b from-white to-[#f8fafc]">
            <div class="text-sm text-gray-600">
                Showing <span id="scheduled-start" class="font-semibold">1</span> to <span id="scheduled-end" class="font-semibold">10</span> of <span id="scheduled-total" class="font-semibold">{{ $applications->filter(fn($app) => $app->schedule)->count() }}</span> applicants
            </div>
            <div class="flex items-center gap-2">
                <button type="button" onclick="changePage('scheduled', -1)" class="px-3 py-2 rounded-lg border border-gray-300 text-gray-700 hover:bg-gray-50 disabled:opacity-50 disabled:cursor-not-allowed transition-colors" id="scheduled-prev">
                    <i class="fa fa-chevron-left"></i>
                </button>
                <div id="scheduled-pages" class="flex items-center gap-1"></div>
                <button type="button" onclick="changePage('scheduled', 1)" class="px-3 py-2 rounded-lg border border-gray-300 text-gray-700 hover:bg-gray-50 disabled:opacity-50 disabled:cursor-not-allowed transition-colors" id="scheduled-next">
                    <i class="fa fa-chevron-right"></i>
                </button>
            </div>
        </div>
        @endif

        {{-- Mobile/Tablet Cards --}}
        <div class="lg:hidden p-3 sm:p-4 space-y-4">
            @php $hasScheduledMobile = false; @endphp
            @foreach($applications as $application)
                @if($application->schedule)
                    @php $hasScheduledMobile = true; @endphp
                    <div class="scheduled-row bg-white rounded-xl p-4 border border-[#006633]/10 shadow-sm">
                        {{-- Applicant Info --}}
                        <div class="flex items-start justify-between gap-2 mb-3 pb-3 border-b border-gray-100">
                            <div class="flex-1">
                                <h3 class="applicant-name font-semibold text-gray-900 text-sm mb-0.5">
                                    {{ $application->first_name }} {{ $application->middle_name }} {{ $application->last_name }}
                                </h3>
                                <p class="text-xs text-gray-400 mb-2">ID: {{ $application->user->unique_id ?? $application->user_id }}</p>
                                <div class="degree-program text-xs text-gray-600 bg-gray-50 rounded-lg px-2.5 py-1.5">
                                    <i class="fa fa-graduation-cap text-[#006633] mr-1"></i>
                                    {{ $application->displayField('degree_program') }}
                                </div>
                            </div>
                            @if($application->status == 'Ready for Interview' || $application->status == 'Accepted by Assessor')
                                <span class="inline-flex items-center gap-1 px-2 py-1 rounded-full text-[10px] font-semibold uppercase text-purple-800 bg-gradient-to-r from-purple-100 to-purple-50 whitespace-nowrap">
                                    <i class="fa fa-calendar-check-o"></i> Ready for Interview
                                </span>
                            @elseif($application->status == 'Final Admission List')
                                <span class="inline-flex items-center gap-1 px-2 py-1 rounded-full text-[10px] font-semibold uppercase text-white bg-gradient-to-r from-[#008844] to-[#006633] whitespace-nowrap">
                                    <i class="fa fa-star"></i> Approved
                                </span>
                            @else
                                <span class="inline-flex items-center gap-1 px-2 py-1 rounded-full text-[10px] font-semibold uppercase text-blue-800 bg-gradient-to-r from-[#dbeafe] to-[#bfdbfe] whitespace-nowrap">
                                    {{ $application->status }}
                                </span>
                            @endif
                        </div>

                        {{-- Schedule Info --}}
                        <div class="bg-gradient-to-r from-[#f8fafc] to-[#f1f5f9] rounded-lg p-3 mb-3 space-y-2 text-sm">
                            <div class="flex items-center gap-2">
                                <i class="fa fa-calendar text-[#006633] w-4"></i>
                                <span class="text-gray-700 font-medium">{{ $application->schedule->interview_date }}</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <i class="fa fa-clock text-[#006633] w-4"></i>
                                <span class="text-gray-700 font-medium">{{ $application->schedule->interview_time }}</span>
                            </div>
                            <div class="flex items-start gap-2">
                                <i class="fa fa-map-marker text-[#006633] w-4 mt-0.5"></i>
                                <span class="text-gray-700 font-medium flex-1">{{ $application->schedule->interview_location }}</span>
                            </div>
                        </div>

                        {{-- Actions --}}
                        <div class="flex flex-col sm:flex-row gap-2">
                            <a href="{{ route('schedule.reschedule', $application->schedule->id) }}" 
                               class="flex-1 inline-flex items-center justify-center gap-1.5 px-4 py-2.5 rounded-lg text-xs font-semibold transition-all duration-200 hover:shadow-lg no-underline bg-gradient-to-r from-[#D4AF37] to-[#fbbf24] text-[#004d26]">
                                <i class="fa fa-refresh"></i> Reschedule
                            </a>
                            @if($application->status == 'Ready for Interview' || $application->status == 'Accepted by Assessor')
                                <button type="button" 
                                        class="flex-1 inline-flex items-center justify-center gap-1.5 px-4 py-2.5 rounded-lg text-xs font-semibold text-white transition-all duration-200 hover:shadow-lg border-0 cursor-pointer bg-gradient-to-r from-[#008844] to-[#006633]"
                                        onclick="showApproveModal({{ $application->id }})">
                                    <i class="fa fa-check"></i> Approve
                                </button>
                                <button type="button" 
                                        class="flex-1 inline-flex items-center justify-center gap-1.5 px-4 py-2.5 rounded-lg text-xs font-semibold text-white transition-all duration-200 hover:shadow-lg border-0 cursor-pointer bg-gradient-to-r from-[#f87171] to-[#ef4444]"
                                        onclick="showRejectModal({{ $application->id }}, '{{ $application->first_name }} {{ $application->middle_name }} {{ $application->last_name }}')">
                                    <i class="fa fa-times"></i> Reject
                                </button>
                            @elseif($application->status == 'Final Admission List')
                                <div class="flex-1 inline-flex items-center justify-center gap-1.5 px-4 py-2.5 rounded-lg text-xs font-semibold text-green-800 bg-gradient-to-r from-[#dcfce7] to-[#bbf7d0]">
                                    <i class="fa fa-check-circle"></i> Already Approved
                                </div>
                            @endif
                        </div>
                    </div>
                @endif
            @endforeach
            
            @if(!$hasScheduledMobile)
                <div class="py-16 text-center">
                    <i class="fa fa-calendar text-5xl text-[#006633]/30 mb-4 block"></i>
                    <p class="text-gray-400 text-sm">No scheduled applicants yet</p>
                </div>
            @endif
        </div>
    </div>

</div>

{{-- ==================== MODALS ==================== --}}

{{-- Approve Modal --}}
<div class="modal fade" id="approveModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <form method="POST" id="approveForm">
            @csrf
            @method('PUT')
            <input type="hidden" name="application_id" id="approveApplicationId">
            <div class="modal-content border-0 rounded-2xl overflow-hidden shadow-2xl">
                <div class="relative border-0 px-4 sm:px-6 py-4 sm:py-5 text-white bg-gradient-to-r from-[#008844] to-[#006633]">
                    <h5 class="font-playfair font-semibold flex items-center gap-2 text-base sm:text-lg m-0">
                        <i class="fa fa-check-circle text-green-200"></i>
                        Approve Application
                    </h5>
                    <button type="button" class="absolute top-4 right-4 text-white/80 hover:text-white transition-colors text-xl" data-bs-dismiss="modal" aria-label="Close">
                        <i class="fa fa-times"></i>
                    </button>
                    <div class="absolute bottom-0 left-0 right-0 h-1 bg-gradient-to-r from-[#86efac] via-[#4ade80] to-[#86efac]"></div>
                </div>
                <div class="p-4 sm:p-6">
                    <p class="text-gray-800 text-sm sm:text-base">
                        Are you sure you want to approve this application and add it to the final admission list?
                    </p>
                </div>
                <div class="px-4 sm:px-6 py-3 sm:py-4 border-t border-[#006633]/10 bg-gray-50 flex flex-col sm:flex-row gap-2 justify-end">
                    <button type="button" class="w-full sm:w-auto px-6 py-2.5 rounded-lg font-semibold text-sm bg-gray-200 text-gray-700 hover:bg-gray-300 transition-colors" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" 
                            class="w-full sm:w-auto px-6 py-2.5 rounded-lg font-semibold text-sm text-white transition-all duration-200 hover:shadow-lg bg-gradient-to-r from-[#008844] to-[#006633]">
                        <i class="fa fa-check"></i> Confirm Approve
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

{{-- Reject Modal --}}
<div class="modal fade" id="rejectModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <form id="rejectForm" method="POST" action="">
            @csrf
            @method('PUT')
            <input type="hidden" name="application_id" id="rejectApplicationId">
            <div class="modal-content border-0 rounded-2xl overflow-hidden shadow-2xl">
                <div class="relative border-0 px-4 sm:px-6 py-4 sm:py-5 text-white bg-gradient-to-r from-[#ef4444] to-[#dc2626]">
                    <h5 class="font-playfair font-semibold flex items-center gap-2 text-base sm:text-lg m-0">
                        <i class="fa fa-times-circle text-red-200"></i>
                        Reject Application
                    </h5>
                    <button type="button" class="absolute top-4 right-4 text-white/80 hover:text-white transition-colors text-xl" data-bs-dismiss="modal" aria-label="Close">
                        <i class="fa fa-times"></i>
                    </button>
                    <div class="absolute bottom-0 left-0 right-0 h-1 bg-gradient-to-r from-[#fca5a5] via-[#f87171] to-[#fca5a5]"></div>
                </div>
                <div class="p-4 sm:p-6">
                    <p class="mb-4 text-gray-800 text-sm sm:text-base">
                        You are about to reject the application of <strong id="rejectApplicantName"></strong>.
                    </p>
                    <label class="block font-semibold text-gray-800 mb-2 text-sm sm:text-base">Please enter remarks for rejection:</label>
                    <textarea class="w-full px-4 py-3 border-2 border-[#006633]/10 rounded-xl text-sm transition-all duration-300 focus:outline-none focus:border-[#006633] focus:ring-4 focus:ring-[#006633]/10" 
                              name="remarks" id="rejectRemarks" rows="4" required 
                              placeholder="Enter your reason for rejection..."></textarea>
                </div>
                <div class="px-4 sm:px-6 py-3 sm:py-4 border-t border-[#006633]/10 bg-gray-50 flex flex-col sm:flex-row gap-2 justify-end">
                    <button type="button" class="w-full sm:w-auto px-6 py-2.5 rounded-lg font-semibold text-sm bg-gray-200 text-gray-700 hover:bg-gray-300 transition-colors" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" 
                            class="w-full sm:w-auto px-6 py-2.5 rounded-lg font-semibold text-sm text-white transition-all duration-200 hover:shadow-lg bg-gradient-to-r from-[#f87171] to-[#ef4444]">
                        <i class="fa fa-times"></i> Confirm Reject
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    const ITEMS_PER_PAGE = 10;
    let currentPages = {
        'orientation': 1,
        'not-scheduled': 1,
        'scheduled': 1
    };

    // Select All checkbox for Orientation section (Step 1)
    document.getElementById('selectAllOrientation')?.addEventListener('change', function() {
        const checkboxes = document.querySelectorAll('.orientation-checkbox');
        checkboxes.forEach(checkbox => {
            checkbox.checked = this.checked;
        });
    });

    // Orientation form validation (Step 1)
    document.getElementById('orientationForm')?.addEventListener('submit', function(event) {
        let checkboxes = document.querySelectorAll('#orientationForm input[name="applicant_ids[]"]:checked');
        if (checkboxes.length === 0) {
            event.preventDefault();
            alert("Please select at least one applicant before scheduling virtual orientation.");
        }
    });

    // Select All checkbox for Interview section (Step 2)
    document.getElementById('selectAllNotScheduled')?.addEventListener('change', function() {
        const checkboxes = document.querySelectorAll('.not-scheduled-checkbox');
        checkboxes.forEach(checkbox => {
            checkbox.checked = this.checked;
        });
    });

    // Interview Schedule form validation (Step 2)
    document.getElementById('scheduleForm')?.addEventListener('submit', function(event) {
        let checkboxes = document.querySelectorAll('#scheduleForm input[name="applicant_ids[]"]:checked');
        if (checkboxes.length === 0) {
            event.preventDefault();
            alert("Please select at least one applicant before scheduling an interview.");
        }
    });

    // Search functionality with pagination reset
    document.getElementById('searchInput').addEventListener('keyup', function() {
        let filter = this.value.toLowerCase();
        
        // Search in desktop tables
        document.querySelectorAll('.not-scheduled-row, .scheduled-row, .orientation-pending-row').forEach(row => {
            let name = row.querySelector('.applicant-name');
            let degree = row.querySelector('.degree-program');
            if (name && degree) {
                let nameText = name.textContent.toLowerCase();
                let degreeText = degree.textContent.toLowerCase();
                let match = nameText.includes(filter) || degreeText.includes(filter);
                
                // For search, we need to show/hide but also mark for pagination
                if (!match) {
                    row.classList.add('search-hidden');
                } else {
                    row.classList.remove('search-hidden');
                }
            }
        });
        
        // Reset pagination to page 1 when searching
        currentPages['orientation'] = 1;
        currentPages['not-scheduled'] = 1;
        currentPages['scheduled'] = 1;
        updatePagination('orientation');
        updatePagination('not-scheduled');
        updatePagination('scheduled');
    });

    // Pagination functions
    function updatePagination(section) {
        const rows = document.querySelectorAll(`.${section}-row`);
        const visibleRows = Array.from(rows).filter(row => !row.classList.contains('search-hidden'));
        const totalItems = visibleRows.length;
        const totalPages = Math.ceil(totalItems / ITEMS_PER_PAGE);
        const currentPage = currentPages[section];
        
        // Hide all rows first
        visibleRows.forEach(row => row.style.display = 'none');
        
        // Show only rows for current page
        const startIndex = (currentPage - 1) * ITEMS_PER_PAGE;
        const endIndex = Math.min(startIndex + ITEMS_PER_PAGE, totalItems);
        
        for (let i = startIndex; i < endIndex; i++) {
            if (visibleRows[i]) {
                visibleRows[i].style.display = '';
            }
        }
        
        // Update pagination info
        const startEl = document.getElementById(`${section}-start`);
        const endEl = document.getElementById(`${section}-end`);
        const totalEl = document.getElementById(`${section}-total`);
        
        if (startEl) startEl.textContent = totalItems > 0 ? startIndex + 1 : 0;
        if (endEl) endEl.textContent = endIndex;
        if (totalEl) totalEl.textContent = totalItems;
        
        // Update page buttons
        const pagesContainer = document.getElementById(`${section}-pages`);
        if (pagesContainer) {
            pagesContainer.innerHTML = '';
            
            // Show max 5 page buttons
            let startPage = Math.max(1, currentPage - 2);
            let endPage = Math.min(totalPages, startPage + 4);
            
            if (endPage - startPage < 4) {
                startPage = Math.max(1, endPage - 4);
            }
            
            for (let i = startPage; i <= endPage; i++) {
                const pageBtn = document.createElement('button');
                pageBtn.type = 'button';
                pageBtn.textContent = i;
                pageBtn.className = `px-3 py-2 rounded-lg text-sm font-semibold transition-colors ${
                    i === currentPage 
                        ? 'bg-[#006633] text-white' 
                        : 'border border-gray-300 text-gray-700 hover:bg-gray-50'
                }`;
                pageBtn.onclick = () => goToPage(section, i);
                pagesContainer.appendChild(pageBtn);
            }
        }
        
        // Update prev/next buttons
        const prevBtn = document.getElementById(`${section}-prev`);
        const nextBtn = document.getElementById(`${section}-next`);
        
        if (prevBtn) {
            prevBtn.disabled = currentPage <= 1;
        }
        if (nextBtn) {
            nextBtn.disabled = currentPage >= totalPages;
        }
    }
    
    function changePage(section, direction) {
        const rows = document.querySelectorAll(`.${section}-row`);
        const visibleRows = Array.from(rows).filter(row => !row.classList.contains('search-hidden'));
        const totalPages = Math.ceil(visibleRows.length / ITEMS_PER_PAGE);
        
        currentPages[section] = Math.max(1, Math.min(totalPages, currentPages[section] + direction));
        updatePagination(section);
    }
    
    function goToPage(section, pageNumber) {
        currentPages[section] = pageNumber;
        updatePagination(section);
    }

    // Approve modal
    function showApproveModal(applicationId) {
        document.getElementById('approveApplicationId').value = applicationId;
        // Set the form action dynamically using assessor routes
        document.getElementById('approveForm').action = '/assessor/application/' + applicationId + '/approve';
        var approveModal = new bootstrap.Modal(document.getElementById('approveModal'));
        approveModal.show();
    }

    // Reject modal
    function showRejectModal(applicationId, applicantName) {
        document.getElementById('rejectApplicationId').value = applicationId;
        document.getElementById('rejectApplicantName').textContent = applicantName;
        document.getElementById('rejectRemarks').value = '';
        // Set the form action dynamically using assessor routes
        document.getElementById('rejectForm').action = '/assessor/application/' + applicationId + '/reject';
        
        var rejectModal = new bootstrap.Modal(document.getElementById('rejectModal'));
        rejectModal.show();
    }
    
    // Initialize pagination on page load
    document.addEventListener('DOMContentLoaded', function() {
        updatePagination('not-scheduled');
        updatePagination('scheduled');
    });
</script>
@endsection

@section('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
@endsection