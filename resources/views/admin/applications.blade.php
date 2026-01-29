@extends('layouts.admin')

@section('content')

<style>
@import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Playfair+Display:wght@500;600;700&display=swap');

/* Custom scrollbar for table */
.table-scroll::-webkit-scrollbar {
    height: 8px;
}
.table-scroll::-webkit-scrollbar-track {
    background: #f1f1f1;
    border-radius: 10px;
}
.table-scroll::-webkit-scrollbar-thumb {
    background: linear-gradient(135deg, #006633, #004d26);
    border-radius: 10px;
}
.table-scroll::-webkit-scrollbar-thumb:hover {
    background: #004d26;
}

/* Tab styling */
.clsu-tab-btn {
    background: transparent;
    color: #4b5563;
}
.clsu-tab-btn.active {
    background: linear-gradient(135deg, #006633, #004d26);
    color: white;
    box-shadow: 0 4px 15px rgba(0, 102, 51, 0.3);
}
.clsu-tab-pending.active { background: linear-gradient(135deg, #3b82f6, #2563eb); box-shadow: 0 4px 15px rgba(59, 130, 246, 0.3); }
.clsu-tab-accepted.active { background: linear-gradient(135deg, #10b981, #059669); box-shadow: 0 4px 15px rgba(16, 185, 129, 0.3); }
.clsu-tab-rejected.active { background: linear-gradient(135deg, #ef4444, #dc2626); box-shadow: 0 4px 15px rgba(239, 68, 68, 0.3); }
</style>

<!-- Main Wrapper -->
<div class="min-h-screen bg-gradient-to-br from-[#f8fdf8] via-[#f0f7f0] to-[#e8f5e8] py-4 sm:py-6 lg:py-8 px-3 sm:px-4 lg:px-6 relative overflow-hidden">
    
    {{-- Animated Background Elements --}}
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute top-20 left-10 w-72 h-72 bg-[#006633]/5 rounded-full blur-3xl float-animation"></div>
        <div class="absolute top-40 right-20 w-96 h-96 bg-[#D4AF37]/5 rounded-full blur-3xl float-animation" style="animation-delay: -2s;"></div>
        <div class="absolute bottom-20 left-1/3 w-80 h-80 bg-emerald-400/5 rounded-full blur-3xl float-animation" style="animation-delay: -4s;"></div>
    </div>

    <!-- Main Card Container -->
    <div class="max-w-7xl mx-auto relative z-10">
        <div class="modern-card rounded-3xl overflow-hidden">
            
            {{-- Card Header --}}
            <div class="relative animated-gradient px-4 sm:px-6 lg:px-8 py-6 sm:py-7 lg:py-8 overflow-hidden">
                <!-- Decorative Elements -->
                <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/5 to-transparent"></div>
                <div class="absolute -top-1/2 -right-[10%] w-[200px] h-[200px] bg-[#FFD700]/10 rounded-full blur-3xl pointer-events-none"></div>
                <div class="absolute bottom-0 left-0 right-0 h-1 bg-gradient-to-r from-[#FFD700] via-[#D4AF37] to-[#FFD700]"></div>
                
                <!-- Header Content -->
                <div class="relative z-10 flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                    <div class="flex items-center gap-4">
                        <div class="w-14 h-14 bg-[#FFD700]/20 backdrop-blur-xl rounded-2xl flex items-center justify-center border border-[#FFD700]/30 shadow-lg shadow-[#FFD700]/20">
                            <i class="fa fa-file-text text-[#FFD700] text-2xl"></i>
                        </div>
                        <div>
                            <h5 class="text-white font-bold text-xl sm:text-2xl lg:text-3xl" style="font-family: 'Playfair Display', serif;">
                                Application Management
                            </h5>
                            <p class="text-white/70 text-xs sm:text-sm mt-1">Review and manage all ETEEAP applications</p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Card Body --}}
            <div class="p-4 sm:p-6 lg:p-8">
                
                {{-- Alerts --}}
                @if(session('success'))
                <div class="mb-6 flex items-start gap-4 bg-gradient-to-r from-emerald-50 to-green-50 border-l-4 border-[#006633] rounded-2xl p-5 shadow-lg shadow-emerald-100/50">
                    <div class="w-10 h-10 bg-gradient-to-br from-[#006633] to-[#004d26] rounded-xl flex items-center justify-center flex-shrink-0 shadow-lg shadow-[#006633]/30">
                        <i class="fa fa-check-circle text-white text-lg"></i>
                    </div>
                    <span class="font-semibold text-[#006633] text-sm sm:text-base pt-2">{{ session('success') }}</span>
                </div>
                @endif

                @if(session('error'))
                <div class="mb-6 flex items-start gap-4 bg-gradient-to-r from-red-50 to-rose-50 border-l-4 border-red-500 rounded-2xl p-5 shadow-lg shadow-red-100/50">
                    <div class="w-10 h-10 bg-gradient-to-br from-red-500 to-rose-500 rounded-xl flex items-center justify-center flex-shrink-0 shadow-lg shadow-red-500/30">
                        <i class="fa fa-exclamation-circle text-white text-lg"></i>
                    </div>
                    <span class="font-semibold text-red-700 text-sm sm:text-base pt-2">{{ session('error') }}</span>
                </div>
                @endif

                {{-- Search Bar --}}
                <div class="relative mb-6">
                    <div class="absolute left-5 top-1/2 -translate-y-1/2 w-10 h-10 bg-gradient-to-br from-[#006633]/10 to-[#006633]/5 rounded-xl flex items-center justify-center">
                        <i class="fa fa-search text-[#006633]"></i>
                    </div>
                    <input 
                        type="text" 
                        id="searchBar" 
                        placeholder="Search by name or ID..." 
                        class="input-modern w-full pl-20 pr-6 py-4 border-2 border-gray-200 rounded-2xl text-sm sm:text-base bg-white text-gray-800 transition-all duration-300 focus:outline-none focus:border-[#006633] focus:ring-4 focus:ring-[#006633]/10 shadow-sm">
                </div>

                {{-- Controls: Tabs + Export --}}
                <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-8 pb-6 border-b-2 border-dashed border-gray-200">
                    
                    {{-- Tab Buttons --}}
                    <div class="flex flex-wrap gap-2 bg-gray-100/80 p-2 rounded-2xl w-full sm:w-auto backdrop-blur-sm">
                        <button 
                            class="clsu-tab-btn clsu-tab-pending active flex items-center gap-2 px-5 sm:px-6 py-3 sm:py-3.5 rounded-xl font-bold text-xs sm:text-sm transition-all duration-300" 
                            data-tab="pending" 
                            onclick="showTab('pending')">
                            <i class="fa fa-clock"></i>
                            <span class="hidden xs:inline">Pending</span>
                            <span class="bg-white/25 px-2.5 py-0.5 rounded-full text-[0.7rem] font-bold">{{ $pendingApplications->count() }}</span>
                        </button>
                        
                        <button 
                            class="clsu-tab-btn clsu-tab-accepted flex items-center gap-2 px-5 sm:px-6 py-3 sm:py-3.5 rounded-xl font-bold text-xs sm:text-sm transition-all duration-300" 
                            data-tab="accepted" 
                            onclick="showTab('accepted')">
                            <i class="fa fa-check"></i>
                            <span class="hidden xs:inline">Accepted</span>
                            <span class="bg-white/25 px-2.5 py-0.5 rounded-full text-[0.7rem] font-bold">{{ $acceptedApplications->count() }}</span>
                        </button>
                        
                        <button 
                            class="clsu-tab-btn clsu-tab-rejected flex items-center gap-2 px-5 sm:px-6 py-3 sm:py-3.5 rounded-xl font-bold text-xs sm:text-sm transition-all duration-300" 
                            data-tab="rejected" 
                            onclick="showTab('rejected')">
                            <i class="fa fa-times"></i>
                            <span class="hidden xs:inline">Rejected</span>
                            <span class="bg-white/25 px-2.5 py-0.5 rounded-full text-[0.7rem] font-bold">{{ $rejectedApplications->count() }}</span>
                        </button>
                    </div>

                    {{-- Export Button Dropdown --}}
                    <div class="dropdown">
                        <button 
                            class="btn-modern flex items-center gap-2 bg-gradient-to-r from-[#D4AF37] to-[#FFD700] text-[#004d26] px-5 sm:px-6 py-3 sm:py-3.5 rounded-xl font-bold text-xs sm:text-sm hover:shadow-xl hover:shadow-[#D4AF37]/30 hover:-translate-y-0.5 transition-all duration-300 w-full sm:w-auto justify-center" 
                            type="button" 
                            data-bs-toggle="dropdown" 
                            aria-expanded="false">
                            <i class="fa fa-download"></i>
                            <span>Export Data</span>
                            <i class="fa fa-chevron-down text-[0.7rem] ml-1"></i>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end border-0 shadow-2xl rounded-2xl p-3 mt-2 bg-white/95 backdrop-blur-xl">
                            <li>
                                <a class="dropdown-item px-4 py-3 rounded-xl hover:bg-gradient-to-r hover:from-[#006633] hover:to-[#004d26] hover:text-white transition-all duration-200 flex items-center gap-3 text-sm font-semibold" href="{{ route('admin.application.export') }}">
                                    <div class="w-8 h-8 bg-green-100 rounded-lg flex items-center justify-center">
                                        <i class="fa fa-file-excel text-green-600"></i>
                                    </div>
                                    Export All Applications
                                </a>
                            </li>
                            <li><hr class="dropdown-divider my-2 opacity-20"></li>
                            <li>
                                <a class="dropdown-item px-4 py-3 rounded-xl hover:bg-gradient-to-r hover:from-blue-500 hover:to-blue-600 hover:text-white transition-all duration-200 flex items-center gap-3 text-sm font-semibold" href="{{ route('admin.application.export.pending') }}">
                                    <div class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center">
                                        <i class="fa fa-clock text-blue-600"></i>
                                    </div>
                                    Export Pending
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item px-4 py-3 rounded-xl hover:bg-gradient-to-r hover:from-emerald-500 hover:to-green-600 hover:text-white transition-all duration-200 flex items-center gap-3 text-sm font-semibold" href="{{ route('admin.application.export.accepted') }}">
                                    <div class="w-8 h-8 bg-green-100 rounded-lg flex items-center justify-center">
                                        <i class="fa fa-check text-green-600"></i>
                                    </div>
                                    Export Accepted
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item px-4 py-3 rounded-xl hover:bg-gradient-to-r hover:from-red-500 hover:to-rose-600 hover:text-white transition-all duration-200 flex items-center gap-3 text-sm font-semibold" href="{{ route('admin.application.export.rejected') }}">
                                    <div class="w-8 h-8 bg-red-100 rounded-lg flex items-center justify-center">
                                        <i class="fa fa-times text-red-600"></i>
                                    </div>
                                    Export Rejected
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                {{-- ========== PENDING TAB ========== --}}
                <div id="pending" class="tab-content">
                    @if($pendingApplications->count() > 0)
                    <div class="overflow-x-auto table-scroll rounded-2xl border border-gray-200 shadow-sm">
                        <table class="min-w-full bg-white">
                            <thead class="animated-gradient">
                                <tr>
                                    <th class="px-5 py-4 text-left text-xs sm:text-sm font-bold text-white uppercase tracking-wider whitespace-nowrap">
                                        <div class="flex items-center gap-2">
                                            <div class="w-7 h-7 bg-white/20 rounded-lg flex items-center justify-center">
                                                <i class="fa fa-hashtag text-xs"></i>
                                            </div>
                                            ID
                                        </div>
                                    </th>
                                    <th class="px-5 py-4 text-left text-xs sm:text-sm font-bold text-white uppercase tracking-wider whitespace-nowrap">
                                        <div class="flex items-center gap-2">
                                            <div class="w-7 h-7 bg-white/20 rounded-lg flex items-center justify-center">
                                                <i class="fa fa-user text-xs"></i>
                                            </div>
                                            Applicant Name
                                        </div>
                                    </th>
                                    <th class="px-5 py-4 text-left text-xs sm:text-sm font-bold text-white uppercase tracking-wider whitespace-nowrap">
                                        <div class="flex items-center gap-2">
                                            <div class="w-7 h-7 bg-white/20 rounded-lg flex items-center justify-center">
                                                <i class="fa fa-info-circle text-xs"></i>
                                            </div>
                                            Status
                                        </div>
                                    </th>
                                    <th class="px-5 py-4 text-center text-xs sm:text-sm font-bold text-white uppercase tracking-wider whitespace-nowrap">
                                        <div class="flex items-center gap-2 justify-center">
                                            <div class="w-7 h-7 bg-white/20 rounded-lg flex items-center justify-center">
                                                <i class="fa fa-cog text-xs"></i>
                                            </div>
                                            Actions
                                        </div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100">
                                @foreach($pendingApplications as $application)
                                <tr class="searchable-row table-row-modern hover:bg-gradient-to-r hover:from-gray-50 hover:to-transparent transition-all duration-200">
                                    <td class="px-5 py-4">
                                        <span class="applicant-id inline-flex items-center gap-2 bg-gradient-to-r from-[#006633]/10 to-[#006633]/5 text-[#006633] font-bold text-sm px-3 py-1.5 rounded-lg">
                                            <i class="fa fa-id-badge text-xs"></i>
                                            {{ $application->user->unique_id ?? $application->user_id }}
                                        </span>
                                    </td>
                                    <td class="px-5 py-4">
                                        <span class="applicant-name text-gray-800 font-semibold text-sm">{{ $application->first_name }} {{ $application->middle_name }} {{ $application->last_name }}</span>
                                    </td>
                                    <td class="px-5 py-4">
                                        <div class="flex flex-col gap-1">
                                            <span class="badge-modern inline-flex items-center gap-2 bg-gradient-to-r from-blue-100 to-blue-50 text-blue-700 px-4 py-2 rounded-xl text-xs font-bold border border-blue-200">
                                                <i class="fa fa-clock"></i>
                                                {{ $application->status }}
                                            </span>
                                            @if($application->needs_review)
                                            <span class="inline-flex items-center gap-1 bg-gradient-to-r from-orange-100 to-orange-50 text-orange-700 px-3 py-1 rounded-lg text-[10px] font-bold border border-orange-200 animate-pulse">
                                                <i class="fa fa-exclamation-triangle"></i>
                                                Updated - Review Needed
                                            </span>
                                            @endif
                                        </div>
                                    </td>
                                    <td class="px-5 py-4">
                                        <div class="flex flex-wrap gap-2 justify-center">
                                            <a 
                                                href="{{ route('admin.application.view', $application->id) }}"
                                                class="btn-modern inline-flex items-center gap-2 bg-gradient-to-r from-indigo-500 to-indigo-600 text-white px-4 py-2.5 rounded-xl text-xs font-bold hover:shadow-lg hover:shadow-indigo-500/30 hover:-translate-y-0.5 transition-all duration-200 {{ $application->needs_review ? 'ring-2 ring-orange-400 ring-offset-1' : '' }}">
                                                <i class="fa fa-eye"></i>
                                                <span class="hidden sm:inline">View</span>
                                                @if($application->needs_review)
                                                <span class="w-2 h-2 bg-orange-400 rounded-full animate-pulse"></span>
                                                @endif
                                            </a>
                                            
                                            <button 
                                                type="button" 
                                                class="btn-modern inline-flex items-center gap-2 bg-gradient-to-r from-[#D4AF37] to-[#B8860B] text-white px-4 py-2.5 rounded-xl text-xs font-bold hover:shadow-lg hover:shadow-[#D4AF37]/30 hover:-translate-y-0.5 transition-all duration-200"
                                                data-bs-toggle="modal" 
                                                data-bs-target="#composeEmailModal"
                                                data-email="{{ $application->user->email ?? '' }}"
                                                data-name="{{ $application->first_name }} {{ $application->last_name }}">
                                                <i class="fa fa-envelope"></i>
                                                <span class="hidden sm:inline">Email</span>
                                            </button>
                                            
                                            <button 
                                                type="button" 
                                                class="btn-modern inline-flex items-center gap-2 bg-gradient-to-r from-[#008844] to-[#006633] text-white px-4 py-2.5 rounded-xl text-xs font-bold hover:shadow-lg hover:shadow-[#006633]/30 hover:-translate-y-0.5 transition-all duration-200"
                                                data-bs-toggle="modal" 
                                                data-bs-target="#acceptModal-{{ $application->id }}">
                                                <i class="fa fa-check"></i>
                                                <span class="hidden sm:inline">Accept</span>
                                            </button>
                                            
                                            <button 
                                                type="button" 
                                                class="btn-modern inline-flex items-center gap-2 bg-gradient-to-r from-[#ef4444] to-[#dc2626] text-white px-4 py-2.5 rounded-xl text-xs font-bold hover:shadow-lg hover:shadow-red-500/30 hover:-translate-y-0.5 transition-all duration-200"
                                                data-bs-toggle="modal" 
                                                data-bs-target="#rejectModal-{{ $application->id }}">
                                                <i class="fa fa-times"></i>
                                                <span class="hidden sm:inline">Reject</span>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    
                    {{-- Pagination for Pending --}}
                    <div class="flex flex-col sm:flex-row items-center justify-between gap-4 mt-6 p-4 bg-gradient-to-r from-gray-50 to-transparent rounded-2xl">
                        <div class="text-xs md:text-sm text-gray-600 order-1">
                            Showing <span id="pending-start" class="font-bold text-[#006633]">1</span> to <span id="pending-end" class="font-bold text-[#006633]">10</span> of <span id="pending-total" class="font-bold text-[#006633]">{{ $pendingApplications->count() }}</span> applications
                        </div>
                        <div class="flex items-center gap-2 order-2">
                            <button type="button" onclick="changePage('pending', -1)" class="btn-modern px-3 py-2 rounded-xl border-2 border-gray-200 text-gray-700 hover:bg-[#006633] hover:text-white hover:border-[#006633] disabled:opacity-50 disabled:cursor-not-allowed transition-all text-sm font-bold" id="pending-prev">
                                <i class="fa fa-chevron-left"></i>
                            </button>
                            <div id="pending-pages" class="flex items-center gap-1"></div>
                            <button type="button" onclick="changePage('pending', 1)" class="btn-modern px-3 py-2 rounded-xl border-2 border-gray-200 text-gray-700 hover:bg-[#006633] hover:text-white hover:border-[#006633] disabled:opacity-50 disabled:cursor-not-allowed transition-all text-sm font-bold" id="pending-next">
                                <i class="fa fa-chevron-right"></i>
                            </button>
                        </div>
                    </div>
                    @else
                    <div class="flex flex-col items-center justify-center py-16">
                        <div class="w-24 h-24 bg-gradient-to-br from-blue-100 to-blue-50 rounded-3xl flex items-center justify-center mb-6 shadow-lg shadow-blue-100/50">
                            <i class="fa fa-inbox text-4xl text-blue-400"></i>
                        </div>
                        <p class="text-lg font-bold text-gray-700 mb-2">No pending applications</p>
                        <p class="text-sm text-gray-500">All caught up! Check back later for new submissions.</p>
                    </div>
                    @endif
                </div>

                {{-- ========== ACCEPTED TAB ========== --}}
                <div id="accepted" class="tab-content" style="display: none;">
                    @if($acceptedApplications->count() > 0)
                    <div class="overflow-x-auto table-scroll rounded-2xl border border-gray-200 shadow-sm">
                        <table class="min-w-full bg-white">
                            <thead class="bg-gradient-to-r from-emerald-600 to-green-700">
                                <tr>
                                    <th class="px-5 py-4 text-left text-xs sm:text-sm font-bold text-white uppercase tracking-wider whitespace-nowrap">
                                        <div class="flex items-center gap-2">
                                            <div class="w-7 h-7 bg-white/20 rounded-lg flex items-center justify-center">
                                                <i class="fa fa-hashtag text-xs"></i>
                                            </div>
                                            ID
                                        </div>
                                    </th>
                                    <th class="px-5 py-4 text-left text-xs sm:text-sm font-bold text-white uppercase tracking-wider whitespace-nowrap">
                                        <div class="flex items-center gap-2">
                                            <div class="w-7 h-7 bg-white/20 rounded-lg flex items-center justify-center">
                                                <i class="fa fa-user text-xs"></i>
                                            </div>
                                            Applicant Name
                                        </div>
                                    </th>
                                    <th class="px-5 py-4 text-left text-xs sm:text-sm font-bold text-white uppercase tracking-wider whitespace-nowrap">
                                        <div class="flex items-center gap-2">
                                            <div class="w-7 h-7 bg-white/20 rounded-lg flex items-center justify-center">
                                                <i class="fa fa-info-circle text-xs"></i>
                                            </div>
                                            Status
                                        </div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100">
                                @foreach($acceptedApplications as $application)
                                <tr class="searchable-row table-row-modern hover:bg-gradient-to-r hover:from-emerald-50 hover:to-transparent transition-all duration-200">
                                    <td class="px-5 py-4">
                                        <span class="applicant-id inline-flex items-center gap-2 bg-gradient-to-r from-emerald-100 to-emerald-50 text-emerald-700 font-bold text-sm px-3 py-1.5 rounded-lg">
                                            <i class="fa fa-id-badge text-xs"></i>
                                            {{ $application->user->unique_id ?? $application->user_id }}
                                        </span>
                                    </td>
                                    <td class="px-5 py-4">
                                        <span class="applicant-name text-gray-800 font-semibold text-sm">{{ $application->first_name }} {{ $application->middle_name }} {{ $application->last_name }}</span>
                                    </td>
                                    <td class="px-5 py-4">
                                        <span class="badge-modern inline-flex items-center gap-2 bg-gradient-to-r from-emerald-100 to-green-50 text-emerald-700 px-4 py-2 rounded-xl text-xs font-bold border border-emerald-200">
                                            <i class="fa fa-check-circle"></i>
                                            {{ $application->status }}
                                        </span>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    
                    {{-- Pagination for Accepted --}}
                    <div class="flex flex-col sm:flex-row items-center justify-between gap-4 mt-6 p-4 bg-gradient-to-r from-emerald-50 to-transparent rounded-2xl">
                        <div class="text-xs md:text-sm text-gray-600 order-1">
                            Showing <span id="accepted-start" class="font-bold text-emerald-700">1</span> to <span id="accepted-end" class="font-bold text-emerald-700">10</span> of <span id="accepted-total" class="font-bold text-emerald-700">{{ $acceptedApplications->count() }}</span> applications
                        </div>
                        <div class="flex items-center gap-2 order-2">
                            <button type="button" onclick="changePage('accepted', -1)" class="btn-modern px-3 py-2 rounded-xl border-2 border-gray-200 text-gray-700 hover:bg-emerald-600 hover:text-white hover:border-emerald-600 disabled:opacity-50 disabled:cursor-not-allowed transition-all text-sm font-bold" id="accepted-prev">
                                <i class="fa fa-chevron-left"></i>
                            </button>
                            <div id="accepted-pages" class="flex items-center gap-1"></div>
                            <button type="button" onclick="changePage('accepted', 1)" class="btn-modern px-3 py-2 rounded-xl border-2 border-gray-200 text-gray-700 hover:bg-emerald-600 hover:text-white hover:border-emerald-600 disabled:opacity-50 disabled:cursor-not-allowed transition-all text-sm font-bold" id="accepted-next">
                                <i class="fa fa-chevron-right"></i>
                            </button>
                        </div>
                    </div>
                    @else
                    <div class="flex flex-col items-center justify-center py-16">
                        <div class="w-24 h-24 bg-gradient-to-br from-emerald-100 to-green-50 rounded-3xl flex items-center justify-center mb-6 shadow-lg shadow-emerald-100/50">
                            <i class="fa fa-check-circle text-4xl text-emerald-400"></i>
                        </div>
                        <p class="text-lg font-bold text-gray-700 mb-2">No accepted applications</p>
                        <p class="text-sm text-gray-500">Applications will appear here once approved.</p>
                    </div>
                    @endif
                </div>

                {{-- ========== REJECTED TAB ========== --}}
                <div id="rejected" class="tab-content" style="display: none;">
                    @if($rejectedApplications->count() > 0)
                    <div class="overflow-x-auto table-scroll rounded-2xl border border-gray-200 shadow-sm">
                        <table class="min-w-full bg-white">
                            <thead class="bg-gradient-to-r from-red-500 to-rose-600">
                                <tr>
                                    <th class="px-5 py-4 text-left text-xs sm:text-sm font-bold text-white uppercase tracking-wider whitespace-nowrap">
                                        <div class="flex items-center gap-2">
                                            <div class="w-7 h-7 bg-white/20 rounded-lg flex items-center justify-center">
                                                <i class="fa fa-hashtag text-xs"></i>
                                            </div>
                                            ID
                                        </div>
                                    </th>
                                    <th class="px-5 py-4 text-left text-xs sm:text-sm font-bold text-white uppercase tracking-wider whitespace-nowrap">
                                        <div class="flex items-center gap-2">
                                            <div class="w-7 h-7 bg-white/20 rounded-lg flex items-center justify-center">
                                                <i class="fa fa-user text-xs"></i>
                                            </div>
                                            Applicant Name
                                        </div>
                                    </th>
                                    <th class="px-5 py-4 text-left text-xs sm:text-sm font-bold text-white uppercase tracking-wider whitespace-nowrap">
                                        <div class="flex items-center gap-2">
                                            <div class="w-7 h-7 bg-white/20 rounded-lg flex items-center justify-center">
                                                <i class="fa fa-info-circle text-xs"></i>
                                            </div>
                                            Status
                                        </div>
                                    </th>
                                    <th class="px-5 py-4 text-left text-xs sm:text-sm font-bold text-white uppercase tracking-wider whitespace-nowrap">
                                        <div class="flex items-center gap-2">
                                            <div class="w-7 h-7 bg-white/20 rounded-lg flex items-center justify-center">
                                                <i class="fa fa-comment text-xs"></i>
                                            </div>
                                            Remarks
                                        </div>
                                    </th>
                                    <th class="px-5 py-4 text-center text-xs sm:text-sm font-bold text-white uppercase tracking-wider whitespace-nowrap">
                                        <div class="flex items-center gap-2 justify-center">
                                            <div class="w-7 h-7 bg-white/20 rounded-lg flex items-center justify-center">
                                                <i class="fa fa-cog text-xs"></i>
                                            </div>
                                            Actions
                                        </div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100">
                                @foreach($rejectedApplications as $application)
                                <tr class="searchable-row table-row-modern hover:bg-gradient-to-r hover:from-red-50 hover:to-transparent transition-all duration-200">
                                    <td class="px-5 py-4">
                                        <span class="applicant-id inline-flex items-center gap-2 bg-gradient-to-r from-red-100 to-red-50 text-red-700 font-bold text-sm px-3 py-1.5 rounded-lg">
                                            <i class="fa fa-id-badge text-xs"></i>
                                            {{ $application->user->unique_id ?? $application->user_id }}
                                        </span>
                                    </td>
                                    <td class="px-5 py-4">
                                        <span class="applicant-name text-gray-800 font-semibold text-sm">{{ $application->first_name }} {{ $application->middle_name }} {{ $application->last_name }}</span>
                                    </td>
                                    <td class="px-5 py-4">
                                        <span class="badge-modern inline-flex items-center gap-2 bg-gradient-to-r from-red-100 to-rose-50 text-red-700 px-4 py-2 rounded-xl text-xs font-bold border border-red-200">
                                            <i class="fa fa-times-circle"></i>
                                            {{ $application->status }}
                                        </span>
                                    </td>
                                    <td class="px-5 py-4">
                                        <div class="text-sm text-gray-700 max-w-xs truncate bg-gray-50 px-3 py-2 rounded-lg" title="{{ $application->remarks }}">{{ $application->remarks }}</div>
                                    </td>
                                    <td class="px-5 py-4">
                                        <div class="flex justify-center">
                                            <button 
                                                type="button" 
                                                class="btn-modern inline-flex items-center gap-2 bg-gradient-to-r from-[#f59e0b] to-[#d97706] text-white px-4 py-2.5 rounded-xl text-xs font-bold hover:shadow-lg hover:shadow-amber-500/30 hover:-translate-y-0.5 transition-all duration-200"
                                                data-bs-toggle="modal" 
                                                data-bs-target="#unrejectModal-{{ $application->id }}">
                                                <i class="fa fa-undo"></i>
                                                <span class="hidden sm:inline">Unreject</span>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    
                    {{-- Pagination for Rejected --}}
                    <div class="flex flex-col sm:flex-row items-center justify-between gap-4 mt-6 p-4 bg-gradient-to-r from-red-50 to-transparent rounded-2xl">
                        <div class="text-xs md:text-sm text-gray-600 order-1">
                            Showing <span id="rejected-start" class="font-bold text-red-700">1</span> to <span id="rejected-end" class="font-bold text-red-700">10</span> of <span id="rejected-total" class="font-bold text-red-700">{{ $rejectedApplications->count() }}</span> applications
                        </div>
                        <div class="flex items-center gap-2 order-2">
                            <button type="button" onclick="changePage('rejected', -1)" class="btn-modern px-3 py-2 rounded-xl border-2 border-gray-200 text-gray-700 hover:bg-red-500 hover:text-white hover:border-red-500 disabled:opacity-50 disabled:cursor-not-allowed transition-all text-sm font-bold" id="rejected-prev">
                                <i class="fa fa-chevron-left"></i>
                            </button>
                            <div id="rejected-pages" class="flex items-center gap-1"></div>
                            <button type="button" onclick="changePage('rejected', 1)" class="btn-modern px-3 py-2 rounded-xl border-2 border-gray-200 text-gray-700 hover:bg-red-500 hover:text-white hover:border-red-500 disabled:opacity-50 disabled:cursor-not-allowed transition-all text-sm font-bold" id="rejected-next">
                                <i class="fa fa-chevron-right"></i>
                            </button>
                        </div>
                    </div>
                    @else
                    <div class="flex flex-col items-center justify-center py-16">
                        <div class="w-24 h-24 bg-gradient-to-br from-red-100 to-rose-50 rounded-3xl flex items-center justify-center mb-6 shadow-lg shadow-red-100/50">
                            <i class="fa fa-times-circle text-4xl text-red-400"></i>
                        </div>
                        <p class="text-lg font-bold text-gray-700 mb-2">No rejected applications</p>
                        <p class="text-sm text-gray-500">Rejected applications will appear here.</p>
                    </div>
                    @endif
                </div>

            </div>

            {{-- Card Footer --}}
            <div class="animated-gradient px-4 sm:px-6 lg:px-8 py-4 flex flex-col sm:flex-row justify-between items-center gap-3 relative overflow-hidden">
                <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/5 to-transparent"></div>
                <span class="text-white/80 text-xs sm:text-sm italic text-center sm:text-left relative z-10">Sieving for Excellence — Nurturing a Culture of Excellence</span>
                <span class="flex items-center gap-2 text-[#FFD700] font-bold text-sm relative z-10">
                    <i class="fa fa-university"></i>
                    CLSU ETEEAP
                </span>
            </div>
        </div>
    </div>
</div>

{{-- ==================== MODALS ==================== --}}

{{-- Accept Modals --}}
@foreach($pendingApplications as $application)
<div class="modal fade" id="acceptModal-{{ $application->id }}" tabindex="-1" aria-labelledby="acceptModalLabel-{{ $application->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <form action="{{ route('admin.application.accept', $application->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="modal-content border-0 shadow-2xl rounded-2xl overflow-hidden">
                <div class="bg-gradient-to-r from-[#008844] to-[#006633] px-6 py-4 flex items-center justify-between">
                    <h5 class="text-white font-bold text-lg flex items-center gap-2 m-0">
                        <i class="fa fa-check-circle"></i>
                        Accept Application
                    </h5>
                    <button type="button" class="text-white/80 hover:text-white transition-colors" data-bs-dismiss="modal" aria-label="Close">
                        <i class="fa fa-times text-xl"></i>
                    </button>
                </div>
                <div class="p-6 bg-white">
                    <p class="text-gray-700 mb-4">Are you sure you want to accept this application?</p>
                    <p class="text-gray-900"><strong>Applicant:</strong> {{ $application->first_name }} {{ $application->middle_name }} {{ $application->last_name }}</p>
                </div>
                <div class="bg-gray-50 px-6 py-4 flex gap-3 justify-end">
                    <button type="button" class="px-5 py-2.5 bg-gray-200 hover:bg-gray-300 text-gray-700 rounded-lg font-semibold text-sm transition-colors" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="px-5 py-2.5 bg-gradient-to-r from-[#008844] to-[#006633] hover:shadow-lg text-white rounded-lg font-semibold text-sm transition-all flex items-center gap-2">
                        <i class="fa fa-check"></i>
                        Confirm
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

{{-- Reject Modals --}}
<div class="modal fade" id="rejectModal-{{ $application->id }}" tabindex="-1" aria-labelledby="rejectModalLabel-{{ $application->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        @php
            $routePrefix = match ((int) auth()->user()->role) {
                2 => 'admin',
                3 => 'assessor',
                4 => 'department',
                5 => 'college',
                default => 'admin',
            };
        @endphp
        <form action="{{ route($routePrefix . '.application.reject', $application->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="modal-content border-0 shadow-2xl rounded-2xl overflow-hidden">
                <div class="bg-gradient-to-r from-[#ef4444] to-[#dc2626] px-6 py-4 flex items-center justify-between">
                    <h5 class="text-white font-bold text-lg flex items-center gap-2 m-0">
                        <i class="fa fa-times-circle"></i>
                        Reject Application
                    </h5>
                    <button type="button" class="text-white/80 hover:text-white transition-colors" data-bs-dismiss="modal" aria-label="Close">
                        <i class="fa fa-times text-xl"></i>
                    </button>
                </div>
                <div class="p-6 bg-white">
                    <p class="text-gray-900 mb-4"><strong>Applicant:</strong> {{ $application->first_name }} {{ $application->middle_name }} {{ $application->last_name }}</p>
                    <label for="remarks-{{ $application->id }}" class="block text-gray-700 font-semibold mb-2">
                        Please enter remarks for rejection:
                    </label>
                    <textarea 
                        class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:outline-none focus:border-[#006633] focus:ring-4 focus:ring-[#006633]/10 transition-all" 
                        id="remarks-{{ $application->id }}" 
                        name="remarks" 
                        rows="4" 
                        required 
                        placeholder="Enter reason for rejection..."></textarea>
                </div>
                <div class="bg-gray-50 px-6 py-4 flex gap-3 justify-end">
                    <button type="button" class="px-5 py-2.5 bg-gray-200 hover:bg-gray-300 text-gray-700 rounded-lg font-semibold text-sm transition-colors" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="px-5 py-2.5 bg-gradient-to-r from-[#ef4444] to-[#dc2626] hover:shadow-lg text-white rounded-lg font-semibold text-sm transition-all flex items-center gap-2">
                        <i class="fa fa-times"></i>
                        Confirm Reject
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endforeach

{{-- Unreject Modals --}}
@foreach($rejectedApplications as $application)
<div class="modal fade" id="unrejectModal-{{ $application->id }}" tabindex="-1" aria-labelledby="unrejectModalLabel-{{ $application->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <form action="{{ route('admin.application.unreject', $application->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="modal-content border-0 shadow-2xl rounded-2xl overflow-hidden">
                <div class="bg-gradient-to-r from-[#f59e0b] to-[#d97706] px-6 py-4 flex items-center justify-between">
                    <h5 class="text-white font-bold text-lg flex items-center gap-2 m-0">
                        <i class="fa fa-undo"></i>
                        Confirm Unreject
                    </h5>
                    <button type="button" class="text-white/80 hover:text-white transition-colors" data-bs-dismiss="modal" aria-label="Close">
                        <i class="fa fa-times text-xl"></i>
                    </button>
                </div>
                <div class="p-6 bg-white">
                    <p class="text-gray-700 mb-4">Are you sure you want to unreject this application?</p>
                    <p class="text-gray-900 mb-4"><strong>Applicant:</strong> {{ $application->first_name }} {{ $application->middle_name }} {{ $application->last_name }}</p>
                    <p class="text-gray-900 font-semibold">This action will move the application back to pending status.</p>
                </div>
                <div class="bg-gray-50 px-6 py-4 flex gap-3 justify-end">
                    <button type="button" class="px-5 py-2.5 bg-gray-200 hover:bg-gray-300 text-gray-700 rounded-lg font-semibold text-sm transition-colors" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="px-5 py-2.5 bg-gradient-to-r from-[#f59e0b] to-[#d97706] hover:shadow-lg text-white rounded-lg font-semibold text-sm transition-all flex items-center gap-2">
                        <i class="fa fa-undo"></i>
                        Yes, Unreject
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endforeach

{{-- Scripts --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    // Track current active tab
    let currentTab = 'pending';
    const ITEMS_PER_PAGE = 10;
    let currentPages = {
        'pending': 1,
        'accepted': 1,
        'rejected': 1
    };
    
    // Tab switching function
    function showTab(tabName) {
        currentTab = tabName;
        
        // Hide all tabs
        document.querySelectorAll('.tab-content').forEach(tab => tab.style.display = 'none');
        
        // Show selected tab
        document.getElementById(tabName).style.display = 'block';
        
        // Update active button
        document.querySelectorAll('.clsu-tab-btn').forEach(btn => btn.classList.remove('active'));
        document.querySelector(`.clsu-tab-btn[data-tab="${tabName}"]`).classList.add('active');
        
        // Update pagination for the new tab
        updatePagination(tabName);
    }
    
    // Search function with pagination reset
    function applySearch() {
        const searchValue = document.getElementById('searchBar').value.toLowerCase().trim();
        const activeTab = document.getElementById(currentTab);
        
        if (!activeTab) return;
        
        const rows = activeTab.querySelectorAll('.searchable-row');
        
        rows.forEach(row => {
            const name = row.querySelector('.applicant-name');
            const id = row.querySelector('.applicant-id');
            
            let nameText = name ? name.textContent.toLowerCase() : '';
            let idText = id ? id.textContent.toLowerCase() : '';
            
            if (searchValue === '' || nameText.includes(searchValue) || idText.includes(searchValue)) {
                row.classList.remove('search-hidden');
            } else {
                row.classList.add('search-hidden');
            }
        });
        
        // Reset to page 1 when searching
        currentPages[currentTab] = 1;
        updatePagination(currentTab);
    }
    
    // Pagination functions
    function updatePagination(tabName) {
        const tab = document.getElementById(tabName);
        if (!tab) return;
        
        const rows = tab.querySelectorAll('.searchable-row');
        const visibleRows = Array.from(rows).filter(row => !row.classList.contains('search-hidden'));
        const totalItems = visibleRows.length;
        const totalPages = Math.ceil(totalItems / ITEMS_PER_PAGE);
        const currentPage = currentPages[tabName];
        
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
        const startEl = document.getElementById(`${tabName}-start`);
        const endEl = document.getElementById(`${tabName}-end`);
        const totalEl = document.getElementById(`${tabName}-total`);
        
        if (startEl) startEl.textContent = totalItems > 0 ? startIndex + 1 : 0;
        if (endEl) endEl.textContent = endIndex;
        if (totalEl) totalEl.textContent = totalItems;
        
        // Update page buttons
        const pagesContainer = document.getElementById(`${tabName}-pages`);
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
                pageBtn.className = `px-2 md:px-3 py-1.5 md:py-2 rounded-lg text-xs md:text-sm font-semibold transition-colors ${
                    i === currentPage 
                        ? 'bg-[#006633] text-white' 
                        : 'border border-gray-300 text-gray-700 hover:bg-gray-50'
                }`;
                pageBtn.onclick = () => goToPage(tabName, i);
                pagesContainer.appendChild(pageBtn);
            }
        }
        
        // Update prev/next buttons
        const prevBtn = document.getElementById(`${tabName}-prev`);
        const nextBtn = document.getElementById(`${tabName}-next`);
        
        if (prevBtn) prevBtn.disabled = currentPage <= 1;
        if (nextBtn) nextBtn.disabled = currentPage >= totalPages;
    }
    
    function changePage(tabName, direction) {
        const tab = document.getElementById(tabName);
        if (!tab) return;
        
        const rows = tab.querySelectorAll('.searchable-row');
        const visibleRows = Array.from(rows).filter(row => !row.classList.contains('search-hidden'));
        const totalPages = Math.ceil(visibleRows.length / ITEMS_PER_PAGE);
        
        currentPages[tabName] = Math.max(1, Math.min(totalPages, currentPages[tabName] + direction));
        updatePagination(tabName);
    }
    
    function goToPage(tabName, pageNumber) {
        currentPages[tabName] = pageNumber;
        updatePagination(tabName);
    }
    
    // Attach search event listener
    document.getElementById('searchBar').addEventListener('keyup', applySearch);
    document.getElementById('searchBar').addEventListener('input', applySearch);
    
    // Initialize pagination on page load
    document.addEventListener('DOMContentLoaded', function() {
        updatePagination('pending');
    });
</script>

<style>
/* Tab button styles */
.clsu-tab-btn {
    background: transparent;
    color: #6b7280;
    border: none;
    cursor: pointer;
}

.clsu-tab-btn:hover {
    transform: translateY(-1px);
}

.clsu-tab-pending.active,
.clsu-tab-pending:hover {
    background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
    color: white;
    box-shadow: 0 4px 12px rgba(59, 130, 246, 0.3);
}

.clsu-tab-accepted.active,
.clsu-tab-accepted:hover {
    background: linear-gradient(135deg, #008844 0%, #006633 100%);
    color: white;
    box-shadow: 0 4px 12px rgba(0, 102, 51, 0.3);
}

.clsu-tab-rejected.active,
.clsu-tab-rejected:hover {
    background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
    color: white;
    box-shadow: 0 4px 12px rgba(239, 68, 68, 0.3);
}

/* Responsive text visibility */
@media (min-width: 400px) {
    .xs\:inline {
        display: inline;
    }
}
</style>

{{-- Include Email Compose Modal --}}
@include('admin.partials.compose-email-modal')

@endsection

@section('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
@endsection