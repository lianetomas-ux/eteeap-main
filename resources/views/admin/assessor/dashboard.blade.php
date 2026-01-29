@extends('layouts.admin')

@section('content')
<script src="https://cdn.tailwindcss.com"></script>
<script>
    tailwind.config = {
        theme: {
            extend: {
                colors: {
                    'clsu-green': '#087a29',
                    'clsu-green-dark': '#065a1f',
                    'clsu-green-light': '#0a9432',
                    'clsu-yellow': '#F9B233',
                    'clsu-gold': '#D4AF37',
                }
            }
        }
    }
</script>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Libre+Franklin:wght@300;400;500;600;700;800&family=Playfair+Display:wght@500;600;700&display=swap');
    .font-franklin { font-family: 'Libre Franklin', sans-serif; }
    .font-playfair { font-family: 'Playfair Display', serif; }
</style>

<div class="min-h-screen bg-gradient-to-br from-green-50 via-white to-yellow-50 p-4 md:p-6 font-franklin">
    <div class="max-w-7xl mx-auto">
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-green-100">
            
            {{-- Header --}}
            <div class="bg-gradient-to-r from-clsu-green to-clsu-green-dark p-6 relative overflow-hidden">
                <div class="absolute top-0 right-0 w-40 h-40 bg-clsu-yellow/10 rounded-full -translate-y-1/2 translate-x-1/2"></div>
                <div class="absolute bottom-0 left-1/4 w-20 h-20 bg-white/5 rounded-full translate-y-1/2"></div>
                
                <div class="relative z-10 flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                    <div class="flex items-center gap-4">
                        <!-- <div class="w-14 h-14 bg-white/20 rounded-xl flex items-center justify-center">
                            <i class="fa fa-user-check text-clsu-yellow text-2xl"></i>
                        </div> -->
                        <div>
                            <h1 class="text-2xl md:text-3xl font-playfair font-bold text-white">Assessor - Application Forms</h1>
                            <p class="text-green-100 text-sm mt-1">Review and assess ETEEAP student applications</p>
                        </div>
                    </div>
                    
                    <!-- <div class="flex gap-3 flex-wrap">
                        <div class="bg-white/10 backdrop-blur rounded-xl px-4 py-3 text-center border border-white/20">
                            <p class="text-2xl font-bold text-white">{{ count($pendingApplications) + count($fromAdminApplications) + count($acceptedApplications) + count($rejectedApplications) }}</p>
                            <p class="text-xs text-green-100">Total</p>
                        </div>
                        <div class="bg-orange-500/20 backdrop-blur rounded-xl px-4 py-3 text-center border border-orange-300/30">
                            <p class="text-2xl font-bold text-orange-200">{{ count($pendingApplications) }}</p>
                            <p class="text-xs text-green-100">Pending</p>
                        </div>
                        <div class="bg-blue-500/20 backdrop-blur rounded-xl px-4 py-3 text-center border border-blue-300/30">
                            <p class="text-2xl font-bold text-blue-200">{{ count($fromAdminApplications) }}</p>
                            <p class="text-xs text-green-100">From Admin</p>
                        </div>
                        <div class="bg-green-500/20 backdrop-blur rounded-xl px-4 py-3 text-center border border-green-300/30">
                            <p class="text-2xl font-bold text-green-200">{{ count($acceptedApplications) }}</p>
                            <p class="text-xs text-green-100">Accepted</p>
                        </div>
                        <div class="bg-red-500/20 backdrop-blur rounded-xl px-4 py-3 text-center border border-red-300/30">
                            <p class="text-2xl font-bold text-red-200">{{ count($rejectedApplications) }}</p>
                            <p class="text-xs text-green-100">Rejected</p>
                        </div>
                    </div> -->
                </div>
                <div class="absolute bottom-0 left-0 right-0 h-1 bg-gradient-to-r from-clsu-yellow via-clsu-gold to-clsu-yellow"></div>
            </div>
            
            <div class="p-6">
                @if(session('success'))
                <div class="mb-6 p-4 bg-green-50 border-l-4 border-clsu-green rounded-r-xl flex items-center gap-3">
                    <div class="w-10 h-10 bg-clsu-green rounded-full flex items-center justify-center flex-shrink-0">
                        <i class="fa fa-check text-white"></i>
                    </div>
                    <p class="text-clsu-green-dark font-medium">{{ session('success') }}</p>
                </div>
                @endif
                
                @if(session('error'))
                <div class="mb-6 p-4 bg-red-50 border-l-4 border-red-500 rounded-r-xl flex items-center gap-3">
                    <div class="w-10 h-10 bg-red-500 rounded-full flex items-center justify-center flex-shrink-0">
                        <i class="fa fa-times text-white"></i>
                    </div>
                    <p class="text-red-700 font-medium">{{ session('error') }}</p>
                </div>
                @endif

                <div class="relative mb-6">
                    <i class="fa fa-search absolute left-4 top-1/2 -translate-y-1/2 text-clsu-green/60"></i>
                    <input type="text" id="searchBar" class="w-full pl-12 pr-4 py-3 rounded-full border-2 border-gray-200 focus:border-clsu-green focus:ring-4 focus:ring-clsu-green/10 transition-all outline-none text-gray-700" placeholder="Search applicants by name or ID...">
                </div>

                <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-6 pb-6 border-b border-gray-200">
                    {{-- Tab Buttons --}}
                    <div class="flex gap-2 bg-gray-100 p-1.5 rounded-full flex-wrap">
                        <button class="tab-btn px-4 py-2.5 rounded-full font-semibold text-sm flex items-center gap-2 transition-all bg-blue-400 text-white shadow-md" data-tab="pending" onclick="showTab('pending')">
                            <i class="fa fa-clock-o"></i> 
                            <span class="hidden sm:inline">Pending</span>
                            <span class="bg-white/30 px-2 py-0.5 rounded-full text-xs">{{ count($pendingApplications) }}</span>
                        </button>
                        <button class="tab-btn px-4 py-2.5 rounded-full font-semibold text-sm flex items-center gap-2 transition-all text-gray-500 hover:bg-gray-200" data-tab="from-admin" onclick="showTab('from-admin')">
                            <i class="fa fa-share"></i> 
                            <span class="hidden sm:inline">From Admin</span>
                            <span class="bg-gray-200 px-2 py-0.5 rounded-full text-xs">{{ count($fromAdminApplications) }}</span>
                        </button>
                        <button class="tab-btn px-4 py-2.5 rounded-full font-semibold text-sm flex items-center gap-2 transition-all text-gray-500 hover:bg-gray-200" data-tab="accepted" onclick="showTab('accepted')">
                            <i class="fa fa-check"></i> 
                            <span class="hidden sm:inline">Accepted</span>
                            <span class="bg-gray-200 px-2 py-0.5 rounded-full text-xs">{{ count($acceptedApplications) }}</span>
                        </button>
                        <button class="tab-btn px-4 py-2.5 rounded-full font-semibold text-sm flex items-center gap-2 transition-all text-gray-500 hover:bg-gray-200" data-tab="rejected" onclick="showTab('rejected')">
                            <i class="fa fa-times"></i> 
                            <span class="hidden sm:inline">Rejected</span>
                            <span class="bg-gray-200 px-2 py-0.5 rounded-full text-xs">{{ count($rejectedApplications) }}</span>
                        </button>
                    </div>

                    {{-- Export Dropdown --}}
                    <div class="dropdown">
                        <button 
                            class="flex items-center gap-2 px-5 py-2.5 bg-gradient-to-r from-clsu-yellow to-clsu-gold text-clsu-green-dark font-semibold rounded-xl shadow-md hover:shadow-lg transition-all hover:-translate-y-0.5"
                            type="button" 
                            data-bs-toggle="dropdown" 
                            aria-expanded="false">
                            <i class="fa fa-download"></i> 
                            Export
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end shadow-xl rounded-xl border-0 p-2 mt-2">
                            <li>
                                <a class="dropdown-item flex items-center gap-2 px-4 py-2.5 rounded-lg hover:bg-clsu-green hover:text-white transition-colors" href="{{ route('assessor.application.export') }}">
                                    <i class="fa fa-file-excel-o text-green-600"></i> Export All
                                </a>
                            </li>
                            <li><hr class="my-2 border-gray-200"></li>
                            <li>
                                <a class="dropdown-item flex items-center gap-2 px-4 py-2.5 rounded-lg hover:bg-clsu-green hover:text-white transition-colors" href="{{ route('assessor.application.export.pending') }}">
                                    <i class="fa fa-clock-o text-blue-500"></i> Export Pending
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item flex items-center gap-2 px-4 py-2.5 rounded-lg hover:bg-clsu-green hover:text-white transition-colors" href="{{ route('assessor.application.export.accepted') }}">
                                    <i class="fa fa-check text-green-500"></i> Export Accepted
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item flex items-center gap-2 px-4 py-2.5 rounded-lg hover:bg-clsu-green hover:text-white transition-colors" href="{{ route('assessor.application.export.rejected') }}">
                                    <i class="fa fa-times text-red-500"></i> Export Rejected
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                {{-- PENDING TAB --}}
                <div id="pending" class="tab-content">
                    <div class="flex items-center gap-3 mb-4 pb-3 border-b-2 border-blue-100">
                        <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-blue-100 to-blue-200 flex items-center justify-center">
                            <i class="fa fa-hourglass-half text-blue-600"></i>
                        </div>
                        <div>
                            <h2 class="text-xl font-playfair font-semibold text-blue-700">Pending Applications</h2>
                            <p class="text-xs text-gray-500">New applications submitted by applicants</p>
                        </div>
                    </div>
                    
                    @if(count($pendingApplications) > 0)
                    <div class="overflow-x-auto rounded-xl border border-gray-200">
                        <table class="w-full">
                            <thead class="bg-gradient-to-r from-gray-50 to-gray-100">
                                <tr>
                                    <th class="px-3 sm:px-5 py-4 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">Applicant</th>
                                    <th class="hidden md:table-cell px-3 sm:px-5 py-4 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">Status</th>
                                    <th class="px-3 sm:px-5 py-4 text-center text-xs font-bold text-gray-600 uppercase tracking-wider">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100">
                                @foreach($pendingApplications as $application)
                                <tr class="searchable-row hover:bg-blue-50/50 transition-colors">
                                    <td class="px-3 sm:px-5 py-4">
                                        <div class="flex items-center gap-2 sm:gap-3">
                                            <div class="w-10 h-10 rounded-full bg-gradient-to-br from-clsu-green to-clsu-green-dark flex items-center justify-center text-white font-bold text-xs sm:text-sm flex-shrink-0">
                                                {{ strtoupper(substr($application->first_name, 0, 1)) }}{{ strtoupper(substr($application->last_name, 0, 1)) }}
                                            </div>
                                            <div class="min-w-0">
                                                <p class="font-semibold text-gray-800 text-xs sm:text-sm applicant-name truncate">{{ $application->first_name }} {{ $application->middle_name }} {{ $application->last_name }}</p>
                                                <p class="text-xs text-gray-500">
                                                    <span class="applicant-id">#{{ $application->user->unique_id ?? $application->user_id }}</span>
                                                </p>
                                                <p class="text-xs text-gray-500 md:hidden">
                                                    <span class="inline-flex items-center gap-1 text-blue-600">
                                                        <span class="w-1.5 h-1.5 rounded-full bg-blue-500"></span>
                                                        Pending
                                                    </span>
                                                </p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="hidden md:table-cell px-3 sm:px-5 py-4">
                                        <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full text-xs font-semibold bg-blue-100 text-blue-700">
                                            <span class="w-2 h-2 rounded-full bg-blue-500 animate-pulse"></span>
                                            {{ $application->status }}
                                        </span>
                                    </td>
                                    <td class="px-3 sm:px-5 py-4">
                                        <div class="flex items-center justify-center gap-1 sm:gap-2 flex-wrap">
                                            <a href="{{ route('assessor.application.view', $application->id) }}" class="inline-flex items-center gap-1 px-2 sm:px-3 py-1.5 sm:py-2 rounded-lg text-xs font-semibold bg-indigo-50 text-indigo-600 hover:bg-indigo-100 transition-colors">
                                                <i class="fa fa-eye"></i> <span class="hidden sm:inline">View</span>
                                            </a>
                                            <button type="button" data-bs-toggle="modal" data-bs-target="#acceptModal-{{ $application->id }}" class="inline-flex items-center gap-1 px-2 sm:px-3 py-1.5 sm:py-2 rounded-lg text-xs font-semibold bg-clsu-green text-white hover:bg-clsu-green-dark transition-colors shadow-sm">
                                                <i class="fa fa-check"></i> <span class="hidden sm:inline">Accept</span>
                                            </a>
                                            <button type="button" data-bs-toggle="modal" data-bs-target="#rejectModal-{{ $application->id }}" class="inline-flex items-center gap-1 px-2 sm:px-3 py-1.5 sm:py-2 rounded-lg text-xs font-semibold bg-red-500 text-white hover:bg-red-600 transition-colors shadow-sm">
                                                <i class="fa fa-times"></i> <span class="hidden sm:inline">Reject</span>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    
                    {{-- Pagination for Pending --}}
                    <div class="mt-6 flex flex-col sm:flex-row items-center justify-between gap-4">
                        <div class="text-sm text-gray-600">
                            Showing <span id="pending-start" class="font-semibold">1</span> to <span id="pending-end" class="font-semibold">10</span> of <span id="pending-total" class="font-semibold">{{ count($pendingApplications) }}</span> applications
                        </div>
                        <div class="flex items-center gap-2">
                            <button onclick="changePage('pending', -1)" class="px-3 py-2 rounded-lg border border-gray-300 text-gray-700 hover:bg-gray-50 disabled:opacity-50 disabled:cursor-not-allowed transition-colors" id="pending-prev">
                                <i class="fa fa-chevron-left"></i>
                            </button>
                            <div id="pending-pages" class="flex items-center gap-1"></div>
                            <button onclick="changePage('pending', 1)" class="px-3 py-2 rounded-lg border border-gray-300 text-gray-700 hover:bg-gray-50 disabled:opacity-50 disabled:cursor-not-allowed transition-colors" id="pending-next">
                                <i class="fa fa-chevron-right"></i>
                            </button>
                        </div>
                    </div>
                    @else
                    <div class="text-center py-16">
                        <div class="w-20 h-20 mx-auto mb-4 rounded-full bg-gray-100 flex items-center justify-center">
                            <i class="fa fa-inbox text-3xl text-gray-400"></i>
                        </div>
                        <p class="text-gray-500 font-medium">No pending applications at the moment</p>
                    </div>
                    @endif
                </div>

                {{-- FROM ADMIN TAB --}}
                <div id="from-admin" class="tab-content hidden">
                    <div class="flex items-center gap-3 mb-4 pb-3 border-b-2 border-blue-100">
                        <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-blue-100 to-blue-200 flex items-center justify-center">
                            <i class="fa fa-share text-blue-600"></i>
                        </div>
                        <div>
                            <h2 class="text-xl font-playfair font-semibold text-blue-700">From Admin</h2>
                            <p class="text-xs text-gray-500">Applications forwarded by Admin for your review</p>
                        </div>
                    </div>
                    
                    @if(count($fromAdminApplications) > 0)
                    <div class="overflow-x-auto rounded-xl border border-gray-200">
                        <table class="w-full">
                            <thead class="bg-gradient-to-r from-gray-50 to-gray-100">
                                <tr>
                                    <th class="px-3 sm:px-5 py-4 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">Applicant Name</th>
                                    <th class="hidden md:table-cell px-3 sm:px-5 py-4 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">Status</th>
                                    <th class="px-3 sm:px-5 py-4 text-center text-xs font-bold text-gray-600 uppercase tracking-wider">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100">
                                @foreach($fromAdminApplications as $application)
                                <tr class="searchable-row hover:bg-blue-50/50 transition-colors">
                                    <td class="px-3 sm:px-5 py-4">
                                        <div class="flex items-center gap-2 sm:gap-3">
                                            <div class="w-10 h-10 rounded-full bg-gradient-to-br from-blue-500 to-blue-600 flex items-center justify-center text-white font-bold text-xs sm:text-sm flex-shrink-0">
                                                {{ strtoupper(substr($application->first_name, 0, 1)) }}{{ strtoupper(substr($application->last_name, 0, 1)) }}
                                            </div>
                                            <div class="min-w-0">
                                                <p class="font-semibold text-gray-800 text-xs sm:text-sm applicant-name truncate">{{ $application->first_name }} {{ $application->middle_name }} {{ $application->last_name }}</p>
                                                <p class="text-xs text-gray-500">
                                                    <span class="applicant-id">#{{ $application->user->unique_id ?? $application->user_id }}</span> • Forwarded by Admin
                                                </p>
                                                <p class="text-xs text-gray-500 md:hidden">
                                                    <span class="inline-flex items-center gap-1 text-blue-600">
                                                        <span class="w-1.5 h-1.5 rounded-full bg-blue-500"></span>
                                                        {{ $application->status }}
                                                    </span>
                                                </p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="hidden md:table-cell px-3 sm:px-5 py-4">
                                        <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full text-xs font-semibold bg-blue-100 text-blue-700">
                                            <span class="w-2 h-2 rounded-full bg-blue-500 animate-pulse"></span>
                                            {{ $application->status }}
                                        </span>
                                    </td>
                                    <td class="px-3 sm:px-5 py-4">
                                        <div class="flex items-center justify-center gap-1 sm:gap-2 flex-wrap">
                                            <a href="{{ route('assessor.application.view', $application->id) }}" class="inline-flex items-center gap-1 px-2 sm:px-3 py-1.5 sm:py-2 rounded-lg text-xs font-semibold bg-indigo-50 text-indigo-600 hover:bg-indigo-100 transition-colors">
                                                <i class="fa fa-eye"></i> <span class="hidden sm:inline">View</span>
                                            </a>
                                            <button type="button" data-bs-toggle="modal" data-bs-target="#acceptModalAdmin-{{ $application->id }}" class="inline-flex items-center gap-1 px-2 sm:px-3 py-1.5 sm:py-2 rounded-lg text-xs font-semibold bg-clsu-green text-white hover:bg-clsu-green-dark transition-colors shadow-sm">
                                                <i class="fa fa-check"></i> <span class="hidden sm:inline">Accept</span>
                                            </button>
                                            <button type="button" data-bs-toggle="modal" data-bs-target="#rejectModalAdmin-{{ $application->id }}" class="inline-flex items-center gap-1 px-2 sm:px-3 py-1.5 sm:py-2 rounded-lg text-xs font-semibold bg-red-500 text-white hover:bg-red-600 transition-colors shadow-sm">
                                                <i class="fa fa-times"></i> <span class="hidden sm:inline">Reject</span>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    
                    {{-- Pagination for From Admin --}}
                    <div class="mt-6 flex flex-col sm:flex-row items-center justify-between gap-4">
                        <div class="text-sm text-gray-600">
                            Showing <span id="from-admin-start" class="font-semibold">1</span> to <span id="from-admin-end" class="font-semibold">10</span> of <span id="from-admin-total" class="font-semibold">{{ count($fromAdminApplications) }}</span> applications
                        </div>
                        <div class="flex items-center gap-2">
                            <button onclick="changePage('from-admin', -1)" class="px-3 py-2 rounded-lg border border-gray-300 text-gray-700 hover:bg-gray-50 disabled:opacity-50 disabled:cursor-not-allowed transition-colors" id="from-admin-prev">
                                <i class="fa fa-chevron-left"></i>
                            </button>
                            <div id="from-admin-pages" class="flex items-center gap-1"></div>
                            <button onclick="changePage('from-admin', 1)" class="px-3 py-2 rounded-lg border border-gray-300 text-gray-700 hover:bg-gray-50 disabled:opacity-50 disabled:cursor-not-allowed transition-colors" id="from-admin-next">
                                <i class="fa fa-chevron-right"></i>
                            </button>
                        </div>
                    </div>
                    @else
                    <div class="text-center py-16">
                        <div class="w-20 h-20 mx-auto mb-4 rounded-full bg-gray-100 flex items-center justify-center">
                            <i class="fa fa-inbox text-3xl text-gray-400"></i>
                        </div>
                        <p class="text-gray-500 font-medium">No applications forwarded from Admin</p>
                    </div>
                    @endif
                </div>

                {{-- ACCEPTED TAB --}}
                <div id="accepted" class="tab-content hidden">
                    <div class="flex items-center gap-3 mb-4 pb-3 border-b-2 border-green-100">
                        <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-green-100 to-green-200 flex items-center justify-center">
                            <i class="fa fa-check-circle text-clsu-green"></i>
                        </div>
                        <div>
                            <h2 class="text-xl font-playfair font-semibold text-clsu-green">Accepted Applications</h2>
                            <p class="text-xs text-gray-500">Applications you have accepted</p>
                        </div>
                    </div>
                    
                    @if(count($acceptedApplications) > 0)
                    <div class="overflow-x-auto rounded-xl border border-gray-200">
                        <table class="w-full">
                            <thead class="bg-gradient-to-r from-gray-50 to-gray-100">
                                <tr>
                                    <th class="px-3 sm:px-5 py-4 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">Applicant Name</th>
                                    <th class="hidden md:table-cell px-3 sm:px-5 py-4 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">Status</th>
                                    <th class="px-3 sm:px-5 py-4 text-center text-xs font-bold text-gray-600 uppercase tracking-wider">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100">
                                @foreach($acceptedApplications as $application)
                                <tr class="searchable-row hover:bg-green-50/50 transition-colors">
                                    <td class="px-3 sm:px-5 py-4">
                                        <div class="flex items-center gap-2 sm:gap-3">
                                            <div class="w-10 h-10 rounded-full bg-gradient-to-br from-clsu-green to-clsu-green-dark flex items-center justify-center text-white font-bold text-xs sm:text-sm flex-shrink-0">
                                                {{ strtoupper(substr($application->first_name, 0, 1)) }}{{ strtoupper(substr($application->last_name, 0, 1)) }}
                                            </div>
                                            <div class="min-w-0">
                                                <p class="font-semibold text-gray-800 text-xs sm:text-sm applicant-name truncate">{{ $application->first_name }} {{ $application->middle_name }} {{ $application->last_name }}</p>
                                                <p class="text-xs text-gray-500">
                                                    <span class="applicant-id">#{{ $application->user->unique_id ?? $application->user_id }}</span> • Accepted Applicant
                                                </p>
                                                <div class="md:hidden mt-1">
                                                    <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full text-xs font-semibold bg-green-100 text-green-700">
                                                        <i class="fa fa-check-circle text-xs"></i>
                                                        {{ $application->status }}
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="hidden md:table-cell px-3 sm:px-5 py-4">
                                        <div class="flex flex-col gap-1">
                                            <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full text-xs font-semibold bg-green-100 text-green-700 w-fit">
                                                <i class="fa fa-check-circle"></i>
                                                {{ $application->status }}
                                            </span>
                                            @if(Str::contains($application->status, 'Accepted by Assessor'))
                                            <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full text-xs font-semibold bg-clsu-yellow/20 text-yellow-700 w-fit">
                                                <i class="fa fa-calendar"></i>
                                                Ready for Interview
                                            </span>
                                            @endif
                                        </div>
                                    </td>
                                    <td class="px-3 sm:px-5 py-4">
                                        <a href="{{ route('assessor.application.view', $application->id) }}" class="inline-flex items-center gap-1 px-2 sm:px-3 py-1.5 sm:py-2 rounded-lg text-xs font-semibold bg-indigo-50 text-indigo-600 hover:bg-indigo-100 transition-colors">
                                            <i class="fa fa-eye"></i> <span class="hidden sm:inline">View</span>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    
                    {{-- Pagination for Accepted --}}
                    <div class="mt-6 flex flex-col sm:flex-row items-center justify-between gap-4">
                        <div class="text-sm text-gray-600">
                            Showing <span id="accepted-start" class="font-semibold">1</span> to <span id="accepted-end" class="font-semibold">10</span> of <span id="accepted-total" class="font-semibold">{{ count($acceptedApplications) }}</span> applications
                        </div>
                        <div class="flex items-center gap-2">
                            <button onclick="changePage('accepted', -1)" class="px-3 py-2 rounded-lg border border-gray-300 text-gray-700 hover:bg-gray-50 disabled:opacity-50 disabled:cursor-not-allowed transition-colors" id="accepted-prev">
                                <i class="fa fa-chevron-left"></i>
                            </button>
                            <div id="accepted-pages" class="flex items-center gap-1"></div>
                            <button onclick="changePage('accepted', 1)" class="px-3 py-2 rounded-lg border border-gray-300 text-gray-700 hover:bg-gray-50 disabled:opacity-50 disabled:cursor-not-allowed transition-colors" id="accepted-next">
                                <i class="fa fa-chevron-right"></i>
                            </button>
                        </div>
                    </div>
                    @else
                    <div class="text-center py-16">
                        <div class="w-20 h-20 mx-auto mb-4 rounded-full bg-gray-100 flex items-center justify-center">
                            <i class="fa fa-folder-open text-3xl text-gray-400"></i>
                        </div>
                        <p class="text-gray-500 font-medium">No accepted applications yet</p>
                    </div>
                    @endif
                </div>

                {{-- REJECTED TAB --}}
                <div id="rejected" class="tab-content hidden">
                    <div class="flex items-center gap-3 mb-4 pb-3 border-b-2 border-red-100">
                        <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-red-100 to-red-200 flex items-center justify-center">
                            <i class="fa fa-ban text-red-600"></i>
                        </div>
                        <div>
                            <h2 class="text-xl font-playfair font-semibold text-red-600">Rejected Applications</h2>
                            <p class="text-xs text-gray-500">All rejected applications</p>
                        </div>
                    </div>
                    
                    @if(count($rejectedApplications) > 0)
                    <div class="overflow-x-auto rounded-xl border border-gray-200">
                        <table class="w-full">
                            <thead class="bg-gradient-to-r from-gray-50 to-gray-100">
                                <tr>
                                    <th class="px-3 sm:px-5 py-4 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">Applicant Name</th>
                                    <th class="hidden md:table-cell px-3 sm:px-5 py-4 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">Status</th>
                                    <th class="hidden lg:table-cell px-3 sm:px-5 py-4 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">Remarks</th>
                                    <th class="px-3 sm:px-5 py-4 text-center text-xs font-bold text-gray-600 uppercase tracking-wider">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100">
                                @foreach($rejectedApplications as $application)
                                <tr class="searchable-row hover:bg-red-50/50 transition-colors">
                                    <td class="px-3 sm:px-5 py-4">
                                        <div class="flex items-center gap-2 sm:gap-3">
                                            <div class="w-10 h-10 rounded-full bg-gradient-to-br from-red-400 to-red-500 flex items-center justify-center text-white font-bold text-xs sm:text-sm flex-shrink-0">
                                                {{ strtoupper(substr($application->first_name, 0, 1)) }}{{ strtoupper(substr($application->last_name, 0, 1)) }}
                                            </div>
                                            <div class="min-w-0">
                                                <p class="font-semibold text-gray-800 text-xs sm:text-sm applicant-name truncate">{{ $application->first_name }} {{ $application->middle_name }} {{ $application->last_name }}</p>
                                                <p class="text-xs text-gray-500">
                                                    <span class="applicant-id">#{{ $application->user->unique_id ?? $application->user_id }}</span> • Rejected Applicant
                                                </p>
                                                <div class="md:hidden mt-1">
                                                    <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full text-xs font-semibold bg-red-100 text-red-700">
                                                        <i class="fa fa-times-circle text-xs"></i>
                                                        {{ $application->status }}
                                                    </span>
                                                </div>
                                                <div class="lg:hidden mt-1">
                                                    <p class="text-xs text-gray-600 italic truncate" title="{{ $application->remarks }}">{{ $application->remarks ?: 'No remarks' }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="hidden md:table-cell px-3 sm:px-5 py-4">
                                        <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full text-xs font-semibold bg-red-100 text-red-700">
                                            <i class="fa fa-times-circle"></i>
                                            {{ $application->status }}
                                        </span>
                                    </td>
                                    <td class="hidden lg:table-cell px-3 sm:px-5 py-4">
                                        <p class="max-w-xs truncate text-sm text-gray-600" title="{{ $application->remarks }}">{{ $application->remarks ?: 'No remarks' }}</p>
                                    </td>
                                    <td class="px-3 sm:px-5 py-4">
                                        <div class="flex items-center justify-center gap-1 sm:gap-2 flex-wrap">
                                            <a href="{{ route('assessor.application.view', $application->id) }}" class="inline-flex items-center gap-1 px-2 sm:px-3 py-1.5 sm:py-2 rounded-lg text-xs font-semibold bg-indigo-50 text-indigo-600 hover:bg-indigo-100 transition-colors">
                                                <i class="fa fa-eye"></i> <span class="hidden sm:inline">View</span>
                                            </a>
                                            <button type="button" data-bs-toggle="modal" data-bs-target="#unrejectModal-{{ $application->id }}" class="inline-flex items-center gap-1 px-2 sm:px-3 py-1.5 sm:py-2 rounded-lg text-xs font-semibold bg-gradient-to-r from-clsu-yellow to-clsu-gold text-clsu-green-dark hover:shadow-md transition-all">
                                                <i class="fa fa-undo"></i> <span class="hidden sm:inline">Unreject</span>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    
                    {{-- Pagination for Rejected --}}
                    <div class="mt-6 flex flex-col sm:flex-row items-center justify-between gap-4">
                        <div class="text-sm text-gray-600">
                            Showing <span id="rejected-start" class="font-semibold">1</span> to <span id="rejected-end" class="font-semibold">10</span> of <span id="rejected-total" class="font-semibold">{{ count($rejectedApplications) }}</span> applications
                        </div>
                        <div class="flex items-center gap-2">
                            <button onclick="changePage('rejected', -1)" class="px-3 py-2 rounded-lg border border-gray-300 text-gray-700 hover:bg-gray-50 disabled:opacity-50 disabled:cursor-not-allowed transition-colors" id="rejected-prev">
                                <i class="fa fa-chevron-left"></i>
                            </button>
                            <div id="rejected-pages" class="flex items-center gap-1"></div>
                            <button onclick="changePage('rejected', 1)" class="px-3 py-2 rounded-lg border border-gray-300 text-gray-700 hover:bg-gray-50 disabled:opacity-50 disabled:cursor-not-allowed transition-colors" id="rejected-next">
                                <i class="fa fa-chevron-right"></i>
                            </button>
                        </div>
                    </div>
                    @else
                    <div class="text-center py-16">
                        <div class="w-20 h-20 mx-auto mb-4 rounded-full bg-gray-100 flex items-center justify-center">
                            <i class="fa fa-check-circle text-3xl text-gray-400"></i>
                        </div>
                        <p class="text-gray-500 font-medium">No rejected applications</p>
                    </div>
                    @endif
                </div>
            </div>
            
            <div class="bg-gradient-to-r from-clsu-green to-clsu-green-dark px-6 py-4 flex flex-col sm:flex-row items-center justify-between gap-2">
                <p class="text-green-100 text-sm italic">Sieving for Excellence — Central Luzon State University</p>
                <p class="text-clsu-yellow font-semibold text-sm flex items-center gap-2">
                    <i class="fa fa-university"></i>
                    CLSU ETEEAP
                </p>
            </div>
        </div>
    </div>
</div>

{{-- MODALS FOR PENDING APPLICATIONS --}}
@foreach($pendingApplications as $application)
<div class="modal fade" id="acceptModal-{{ $application->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <form action="{{ route('assessor.application.accept', $application->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="modal-content border-0 rounded-2xl overflow-hidden shadow-2xl">
                <div class="bg-gradient-to-r from-clsu-green to-clsu-green-dark p-5 relative">
                    <div class="absolute bottom-0 left-0 right-0 h-1 bg-gradient-to-r from-clsu-yellow via-clsu-gold to-clsu-yellow"></div>
                    <div class="flex items-center gap-3">
                        <div class="w-12 h-12 rounded-xl bg-white/20 flex items-center justify-center">
                            <i class="fa fa-check-circle text-clsu-yellow text-xl"></i>
                        </div>
                        <div>
                            <h5 class="text-xl font-playfair font-bold text-white">Accept Application</h5>
                            <p class="text-green-100 text-sm">Confirm your decision</p>
                        </div>
                    </div>
                    <button type="button" class="absolute top-4 right-4 text-white/70 hover:text-white" data-bs-dismiss="modal"><i class="fa fa-times text-xl"></i></button>
                </div>
                <div class="p-6">
                    <p class="text-gray-600 mb-4">Are you sure you want to <strong class="text-clsu-green">accept</strong> this application?</p>
                    <div class="bg-green-50 rounded-xl p-4 border-l-4 border-clsu-green mb-4">
                        <p class="text-xs text-gray-500 mb-1">Applicant</p>
                        <p class="font-semibold text-gray-800">{{ $application->first_name }} {{ $application->middle_name }} {{ $application->last_name }}</p>
                    </div>
                    <div class="flex items-start gap-2 p-3 bg-blue-50 rounded-lg">
                        <i class="fa fa-info-circle text-blue-500 mt-0.5"></i>
                        <p class="text-xs text-blue-700">This application will be <strong>accepted by Assessor</strong> and forwarded directly to the <strong>Department Coordinator</strong>.</p>
                    </div>
                </div>
                <div class="px-6 py-4 bg-gray-50 flex justify-end gap-3">
                    <button type="button" class="px-5 py-2.5 rounded-xl font-semibold text-gray-600 bg-gray-200 hover:bg-gray-300 transition-colors" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="px-5 py-2.5 rounded-xl font-semibold text-white bg-gradient-to-r from-clsu-green to-clsu-green-dark hover:shadow-lg transition-all"><i class="fa fa-check mr-1"></i> Confirm Accept</button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="modal fade" id="rejectModal-{{ $application->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <form action="{{ route('assessor.application.reject', $application->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="modal-content border-0 rounded-2xl overflow-hidden shadow-2xl">
                <div class="bg-gradient-to-r from-red-500 to-red-600 p-5 relative">
                    <div class="absolute bottom-0 left-0 right-0 h-1 bg-gradient-to-r from-red-300 via-red-200 to-red-300"></div>
                    <div class="flex items-center gap-3">
                        <div class="w-12 h-12 rounded-xl bg-white/20 flex items-center justify-center">
                            <i class="fa fa-times-circle text-red-200 text-xl"></i>
                        </div>
                        <div>
                            <h5 class="text-xl font-playfair font-bold text-white">Reject Application</h5>
                            <p class="text-red-100 text-sm">Please provide a reason</p>
                        </div>
                    </div>
                    <button type="button" class="absolute top-4 right-4 text-white/70 hover:text-white" data-bs-dismiss="modal"><i class="fa fa-times text-xl"></i></button>
                </div>
                <div class="p-6">
                    <div class="bg-red-50 rounded-xl p-4 border-l-4 border-red-500 mb-4">
                        <p class="text-xs text-gray-500 mb-1">Applicant</p>
                        <p class="font-semibold text-gray-800">{{ $application->first_name }} {{ $application->middle_name }} {{ $application->last_name }}</p>
                    </div>
                    <div class="mb-2">
                        <label class="block text-sm font-semibold text-gray-700 mb-2"><i class="fa fa-comment text-red-500 mr-1"></i>Rejection Remarks <span class="text-red-500">*</span></label>
                        <textarea class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 focus:border-red-400 focus:ring focus:ring-red-100 transition-all resize-none" name="remarks" rows="4" placeholder="Please explain the reason for rejection..." required></textarea>
                    </div>
                </div>
                <div class="px-6 py-4 bg-gray-50 flex justify-end gap-3">
                    <button type="button" class="px-5 py-2.5 rounded-xl font-semibold text-gray-600 bg-gray-200 hover:bg-gray-300 transition-colors" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="px-5 py-2.5 rounded-xl font-semibold text-white bg-gradient-to-r from-red-500 to-red-600 hover:shadow-lg transition-all"><i class="fa fa-times mr-1"></i> Confirm Reject</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endforeach

{{-- MODALS FOR FROM ADMIN APPLICATIONS --}}
@foreach($fromAdminApplications as $application)
<div class="modal fade" id="acceptModalAdmin-{{ $application->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <form action="{{ route('assessor.application.accept', $application->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="modal-content border-0 rounded-2xl overflow-hidden shadow-2xl">
                <div class="bg-gradient-to-r from-clsu-green to-clsu-green-dark p-5 relative">
                    <div class="absolute bottom-0 left-0 right-0 h-1 bg-gradient-to-r from-clsu-yellow via-clsu-gold to-clsu-yellow"></div>
                    <div class="flex items-center gap-3">
                        <div class="w-12 h-12 rounded-xl bg-white/20 flex items-center justify-center">
                            <i class="fa fa-check-circle text-clsu-yellow text-xl"></i>
                        </div>
                        <div>
                            <h5 class="text-xl font-playfair font-bold text-white">Accept Application</h5>
                            <p class="text-green-100 text-sm">Confirm your decision</p>
                        </div>
                    </div>
                    <button type="button" class="absolute top-4 right-4 text-white/70 hover:text-white" data-bs-dismiss="modal"><i class="fa fa-times text-xl"></i></button>
                </div>
                <div class="p-6">
                    <p class="text-gray-600 mb-4">Are you sure you want to <strong class="text-clsu-green">accept</strong> this application?</p>
                    <div class="bg-green-50 rounded-xl p-4 border-l-4 border-clsu-green mb-4">
                        <p class="text-xs text-gray-500 mb-1">Applicant</p>
                        <p class="font-semibold text-gray-800">{{ $application->first_name }} {{ $application->middle_name }} {{ $application->last_name }}</p>
                    </div>
                    <div class="flex items-start gap-2 p-3 bg-blue-50 rounded-lg">
                        <i class="fa fa-info-circle text-blue-500 mt-0.5"></i>
                        <p class="text-xs text-blue-700">This application (forwarded by Admin) will be <strong>accepted by Assessor</strong> and forwarded to the <strong>Department Coordinator</strong>.</p>
                    </div>
                </div>
                <div class="px-6 py-4 bg-gray-50 flex justify-end gap-3">
                    <button type="button" class="px-5 py-2.5 rounded-xl font-semibold text-gray-600 bg-gray-200 hover:bg-gray-300 transition-colors" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="px-5 py-2.5 rounded-xl font-semibold text-white bg-gradient-to-r from-clsu-green to-clsu-green-dark hover:shadow-lg transition-all"><i class="fa fa-check mr-1"></i> Confirm Accept</button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="modal fade" id="rejectModalAdmin-{{ $application->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <form action="{{ route('assessor.application.reject', $application->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="modal-content border-0 rounded-2xl overflow-hidden shadow-2xl">
                <div class="bg-gradient-to-r from-red-500 to-red-600 p-5 relative">
                    <div class="absolute bottom-0 left-0 right-0 h-1 bg-gradient-to-r from-red-300 via-red-200 to-red-300"></div>
                    <div class="flex items-center gap-3">
                        <div class="w-12 h-12 rounded-xl bg-white/20 flex items-center justify-center">
                            <i class="fa fa-times-circle text-red-200 text-xl"></i>
                        </div>
                        <div>
                            <h5 class="text-xl font-playfair font-bold text-white">Reject Application</h5>
                            <p class="text-red-100 text-sm">Please provide a reason</p>
                        </div>
                    </div>
                    <button type="button" class="absolute top-4 right-4 text-white/70 hover:text-white" data-bs-dismiss="modal"><i class="fa fa-times text-xl"></i></button>
                </div>
                <div class="p-6">
                    <div class="bg-red-50 rounded-xl p-4 border-l-4 border-red-500 mb-4">
                        <p class="text-xs text-gray-500 mb-1">Applicant</p>
                        <p class="font-semibold text-gray-800">{{ $application->first_name }} {{ $application->middle_name }} {{ $application->last_name }}</p>
                    </div>
                    <div class="mb-2">
                        <label class="block text-sm font-semibold text-gray-700 mb-2"><i class="fa fa-comment text-red-500 mr-1"></i>Rejection Remarks <span class="text-red-500">*</span></label>
                        <textarea class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 focus:border-red-400 focus:ring focus:ring-red-100 transition-all resize-none" name="remarks" rows="4" placeholder="Please explain the reason for rejection..." required></textarea>
                    </div>
                </div>
                <div class="px-6 py-4 bg-gray-50 flex justify-end gap-3">
                    <button type="button" class="px-5 py-2.5 rounded-xl font-semibold text-gray-600 bg-gray-200 hover:bg-gray-300 transition-colors" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="px-5 py-2.5 rounded-xl font-semibold text-white bg-gradient-to-r from-red-500 to-red-600 hover:shadow-lg transition-all"><i class="fa fa-times mr-1"></i> Confirm Reject</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endforeach

{{-- UNREJECT MODALS --}}
@foreach($rejectedApplications as $application)
<div class="modal fade" id="unrejectModal-{{ $application->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <form action="{{ route('assessor.application.unreject', $application->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="modal-content border-0 rounded-2xl overflow-hidden shadow-2xl">
                <div class="bg-gradient-to-r from-clsu-yellow to-clsu-gold p-5 relative">
                    <div class="absolute bottom-0 left-0 right-0 h-1 bg-gradient-to-r from-clsu-green via-clsu-green-dark to-clsu-green"></div>
                    <div class="flex items-center gap-3">
                        <div class="w-12 h-12 rounded-xl bg-white/30 flex items-center justify-center">
                            <i class="fa fa-undo text-clsu-green-dark text-xl"></i>
                        </div>
                        <div>
                            <h5 class="text-xl font-playfair font-bold text-clsu-green-dark">Unreject Application</h5>
                            <p class="text-clsu-green-dark/70 text-sm">Return to pending status</p>
                        </div>
                    </div>
                    <button type="button" class="absolute top-4 right-4 text-clsu-green-dark/70 hover:text-clsu-green-dark" data-bs-dismiss="modal"><i class="fa fa-times text-xl"></i></button>
                </div>
                <div class="p-6">
                    <p class="text-gray-600 mb-4">Are you sure you want to <strong class="text-clsu-yellow">unreject</strong> this application?</p>
                    <div class="bg-yellow-50 rounded-xl p-4 border-l-4 border-clsu-yellow mb-4">
                        <p class="text-xs text-gray-500 mb-1">Applicant</p>
                        <p class="font-semibold text-gray-800">{{ $application->first_name }} {{ $application->middle_name }} {{ $application->last_name }}</p>
                    </div>
                    <div class="flex items-start gap-2 p-3 bg-blue-50 rounded-lg">
                        <i class="fa fa-info-circle text-blue-500 mt-0.5"></i>
                        <p class="text-xs text-blue-700">This action will move the application back to <strong>Pending</strong> status.</p>
                    </div>
                </div>
                <div class="px-6 py-4 bg-gray-50 flex justify-end gap-3">
                    <button type="button" class="px-5 py-2.5 rounded-xl font-semibold text-gray-600 bg-gray-200 hover:bg-gray-300 transition-colors" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="px-5 py-2.5 rounded-xl font-semibold text-clsu-green-dark bg-gradient-to-r from-clsu-yellow to-clsu-gold hover:shadow-lg transition-all"><i class="fa fa-undo mr-1"></i> Yes, Unreject</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endforeach

<script>
    let currentTab = 'pending';
    const ITEMS_PER_PAGE = 10;
    let currentPages = {
        'pending': 1,
        'from-admin': 1,
        'accepted': 1,
        'rejected': 1
    };
    
    function showTab(tabName) {
        currentTab = tabName;
        document.querySelectorAll('.tab-content').forEach(tab => tab.classList.add('hidden'));
        document.getElementById(tabName).classList.remove('hidden');
        
        document.querySelectorAll('.tab-btn').forEach(btn => {
            btn.classList.remove('bg-blue-400', 'bg-blue-500', 'bg-clsu-green', 'bg-red-500', 'text-white', 'shadow-md');
            btn.classList.add('text-gray-500', 'hover:bg-gray-200');
            const badge = btn.querySelector('span:last-child');
            if (badge) { badge.classList.remove('bg-white/30'); badge.classList.add('bg-gray-200'); }
        });
        
        const activeBtn = document.querySelector(`.tab-btn[data-tab="${tabName}"]`);
        activeBtn.classList.remove('text-gray-500', 'hover:bg-gray-200');
        
        if (tabName === 'pending') activeBtn.classList.add('bg-blue-400', 'text-white', 'shadow-md');
        else if (tabName === 'from-admin') activeBtn.classList.add('bg-blue-500', 'text-white', 'shadow-md');
        else if (tabName === 'accepted') activeBtn.classList.add('bg-clsu-green', 'text-white', 'shadow-md');
        else if (tabName === 'rejected') activeBtn.classList.add('bg-red-500', 'text-white', 'shadow-md');
        
        const activeBadge = activeBtn.querySelector('span:last-child');
        if (activeBadge) { activeBadge.classList.remove('bg-gray-200'); activeBadge.classList.add('bg-white/30'); }
        
        updatePagination(tabName);
        applySearch();
    }
    
    function applySearch() {
        const searchValue = document.getElementById('searchBar').value.toLowerCase().trim();
        const activeTab = document.getElementById(currentTab);
        if (!activeTab) return;
        
        activeTab.querySelectorAll('.searchable-row').forEach(row => {
            const name = row.querySelector('.applicant-name');
            const id = row.querySelector('.applicant-id');
            let nameText = name ? name.textContent.toLowerCase() : '';
            let idText = id ? id.textContent.toLowerCase() : '';
            
            if (searchValue === '' || nameText.includes(searchValue) || idText.includes(searchValue)) {
                row.classList.remove('hidden');
            } else {
                row.classList.add('hidden');
            }
        });
        
        // Reset to page 1 when searching
        currentPages[currentTab] = 1;
        updatePagination(currentTab);
    }
    
    function updatePagination(tabName) {
        const activeTab = document.getElementById(tabName);
        if (!activeTab) return;
        
        const allRows = activeTab.querySelectorAll('.searchable-row');
        const visibleRows = Array.from(allRows).filter(row => !row.classList.contains('hidden'));
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
                pageBtn.textContent = i;
                pageBtn.className = `px-3 py-2 rounded-lg text-sm font-semibold transition-colors ${
                    i === currentPage 
                        ? 'bg-clsu-green text-white' 
                        : 'border border-gray-300 text-gray-700 hover:bg-gray-50'
                }`;
                pageBtn.onclick = () => goToPage(tabName, i);
                pagesContainer.appendChild(pageBtn);
            }
        }
        
        // Update prev/next buttons
        const prevBtn = document.getElementById(`${tabName}-prev`);
        const nextBtn = document.getElementById(`${tabName}-next`);
        
        if (prevBtn) {
            prevBtn.disabled = currentPage <= 1;
        }
        if (nextBtn) {
            nextBtn.disabled = currentPage >= totalPages;
        }
    }
    
    function changePage(tabName, direction) {
        const activeTab = document.getElementById(tabName);
        if (!activeTab) return;
        
        const visibleRows = Array.from(activeTab.querySelectorAll('.searchable-row'))
            .filter(row => !row.classList.contains('hidden'));
        const totalPages = Math.ceil(visibleRows.length / ITEMS_PER_PAGE);
        
        currentPages[tabName] = Math.max(1, Math.min(totalPages, currentPages[tabName] + direction));
        updatePagination(tabName);
    }
    
    function goToPage(tabName, pageNumber) {
        currentPages[tabName] = pageNumber;
        updatePagination(tabName);
    }
    
    document.getElementById('searchBar').addEventListener('input', applySearch);
    
    // Initialize pagination on page load
    document.addEventListener('DOMContentLoaded', function() {
        updatePagination('pending');
    });
</script>
@endsection

@section('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
@endsection