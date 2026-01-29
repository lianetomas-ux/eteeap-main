@extends('layouts.app')
@section('title', 'ETEEAP - My Applications')
@section('content')

<section class="relative min-h-screen overflow-hidden">
    
    <!-- Background with CLSU Green Gradient Overlay -->
    <div class="fixed inset-0 bg-cover bg-center bg-no-repeat" 
         style="background-image: url('{{ asset('inspinia/img/landing/r.jpg') }}');">
        <div class="absolute inset-0 bg-gradient-to-br from-[#087A29]/95 via-[#065a1f]/90 to-[#043d15]/95"></div>
        <!-- Decorative Pattern Overlay -->
        <div class="absolute inset-0 opacity-5" 
             style="background-image: url('data:image/svg+xml,%3Csvg width=60 height=60 viewBox=%220 0 60 60%22 xmlns=%22http://www.w3.org/2000/svg%22%3E%3Cg fill=%22none%22 fill-rule=%22evenodd%22%3E%3Cg fill=%22%23ffffff%22 fill-opacity=%221%22%3E%3Cpath d=%22M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z%22/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>
    </div>

    <!-- Floating Decorative Elements -->
    <div class="fixed top-20 left-10 w-72 h-72 bg-[#F9B233]/10 rounded-full blur-3xl animate-pulse pointer-events-none"></div>
    <div class="fixed bottom-20 right-10 w-96 h-96 bg-[#F9B233]/10 rounded-full blur-3xl animate-pulse pointer-events-none" style="animation-delay: 1s;"></div>

    <!-- Main Content -->
    <div class="relative z-10 container mx-auto px-4 py-8 lg:py-12">
        <!-- Page Title -->
        <div class="mb-8 animate-slideUp">
            <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
                <div>
                    <h2 class="text-2xl md:text-3xl lg:text-4xl font-bold text-white flex items-center gap-3">
                        <div class="w-12 h-12 bg-[#F9B233]/20 rounded-xl flex items-center justify-center">
                            <svg class="w-6 h-6 text-[#F9B233]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                        </div>
                        My Applications
                    </h2>
                    <p class="text-white/70 mt-2 ml-15">Track and manage your ETEEAP applications</p>
                </div>
                
                @if (request()->is('user/index*'))
                    <a href="{{ url('/') }}" class="inline-flex items-center gap-2 bg-white/10 hover:bg-white/20 text-white font-semibold px-5 py-2.5 rounded-xl transition-all border border-white/20">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                        </svg>
                        Back to Home
                    </a>
                @endif
            </div>
        </div>

        <!-- Success Message -->
        @if(session('success'))
            <div class="mb-6 animate-slideUp" style="animation-delay: 0.1s;">
                <div class="glass-card rounded-xl p-4 border-l-4 border-green-400 flex items-center gap-3">
                    <div class="w-10 h-10 bg-green-500/20 rounded-full flex items-center justify-center flex-shrink-0">
                        <svg class="w-6 h-6 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <span class="text-white font-medium">{{ session('success') }}</span>
                </div>
            </div>
        @endif

        <!-- Main Card -->
        <div class="animate-slideUp" style="animation-delay: 0.2s;">
            <div class="glass-card rounded-2xl overflow-hidden">
                
                <!-- Card Header -->
                <div class="p-6 border-b border-white/10">
                    <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
                        <div class="flex items-center gap-3">
                            <div class="w-12 h-12 bg-[#F9B233]/20 rounded-xl flex items-center justify-center">
                                <svg class="w-6 h-6 text-[#F9B233]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                </svg>
                            </div>
                            <div>
                                <p class="text-white/60 text-sm">Welcome back,</p>
                                <h3 class="text-white font-bold text-lg">{{ Auth::user()->name }}</h3>
                            </div>
                        </div>
                        
                        <a href="{{ route('application.create') }}" class="inline-flex items-center gap-2 bg-[#F9B233] hover:bg-[#e5a42e] text-[#087A29] font-bold px-5 py-2.5 rounded-xl transition-all shadow-lg hover:shadow-xl hover:-translate-y-0.5">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                            </svg>
                            New Application
                        </a>
                    </div>
                </div>

                <!-- Card Body -->
                <div class="p-6">
                    @if($applications->count() > 0)
                        
                        <!-- Desktop Table View -->
                        <div class="hidden md:block overflow-x-auto">
                            <table class="w-full">
                                <thead>
                                    <tr class="border-b border-white/20">
                                        <th class="px-4 py-3 text-left text-xs font-bold text-white/90 uppercase tracking-wider">
                                            ID
                                        </th>
                                        <th class="px-4 py-3 text-left text-xs font-bold text-white/90 uppercase tracking-wider">
                                            Full Name
                                        </th>
                                        <th class="px-4 py-3 text-left text-xs font-bold text-white/90 uppercase tracking-wider">
                                            Contact
                                        </th>
                                        <th class="px-4 py-3 text-left text-xs font-bold text-white/90 uppercase tracking-wider">
                                            Date
                                        </th>
                                        <th class="px-4 py-3 text-center text-xs font-bold text-white/90 uppercase tracking-wider">
                                            Status
                                        </th>
                                        <th class="px-4 py-3 text-center text-xs font-bold text-white/90 uppercase tracking-wider">
                                            Actions
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-white/10">
                                    @foreach($applications as $application)
                                        <tr class="hover:bg-white/10 transition-colors">
                                            <td class="px-4 py-3">
                                                <span class="inline-flex items-center px-2.5 py-1 rounded-md bg-[#F9B233]/30 text-[#F9B233] font-bold text-sm">
                                                    #{{ $application->id }}
                                                </span>
                                            </td>
                                            <td class="px-4 py-3">
                                                <span class="text-white font-semibold text-base">
                                                    {{ $application->first_name }} {{ $application->middle_name ?? '' }} {{ $application->last_name }}
                                                </span>
                                            </td>
                                            <td class="px-4 py-3">
                                                <span class="text-white text-sm">{{ $application->contact_number }}</span>
                                            </td>
                                            <td class="px-4 py-3">
                                                <span class="text-white text-sm">{{ $application->created_at->format('M d, Y') }}</span>
                                            </td>
                                            <td class="px-4 py-3 text-center">
                                                @php
                                                    $status = $application->status ?? 'Pending';
                                                    $statusConfig = match($status) {
                                                        'Pending' => ['bg' => 'bg-yellow-500/30', 'text' => 'text-yellow-300', 'icon' => 'M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z'],
                                                        'Accepted by Admin' => ['bg' => 'bg-blue-500/30', 'text' => 'text-blue-300', 'icon' => 'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z'],
                                                        'Rejected by Admin' => ['bg' => 'bg-red-500/30', 'text' => 'text-red-300', 'icon' => 'M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z'],
                                                        'Accepted by Assessor' => ['bg' => 'bg-emerald-500/30', 'text' => 'text-emerald-300', 'icon' => 'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z'],
                                                        'Ready for Interview' => ['bg' => 'bg-purple-500/30', 'text' => 'text-purple-300', 'icon' => 'M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z'],
                                                        'Rejected by Assessor' => ['bg' => 'bg-red-500/30', 'text' => 'text-red-300', 'icon' => 'M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z'],
                                                        'Final Admission List' => ['bg' => 'bg-green-500/30', 'text' => 'text-green-300', 'icon' => 'M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z'],
                                                        default => ['bg' => 'bg-gray-500/30', 'text' => 'text-gray-300', 'icon' => 'M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z'],
                                                    };
                                                @endphp
                                                <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full {{ $statusConfig['bg'] }} {{ $statusConfig['text'] }} text-xs font-semibold">
                                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $statusConfig['icon'] }}"/>
                                                    </svg>
                                                    {{ $status }}
                                                </span>
                                            </td>
                                            <td class="px-4 py-3">
                                                <div class="flex items-center justify-center gap-2">
                                                    <a href="{{ route('application.view', $application->id) }}" 
                                                       class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-blue-500/30 text-blue-300 rounded-md hover:bg-blue-500/40 transition-colors text-sm font-semibold">
                                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                                        </svg>
                                                        View
                                                    </a>
                                                    <a href="{{ route('applications.edit', $application->id) }}" 
                                                       class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-[#F9B233]/30 text-[#F9B233] rounded-md hover:bg-[#F9B233]/40 transition-colors text-sm font-semibold">
                                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                                        </svg>
                                                        Edit
                                                    </a>
                                                    <button type="button" 
                                                            onclick="showDeleteModal({{ $application->id }})"
                                                            class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-red-500/30 text-red-300 rounded-md hover:bg-red-500/40 transition-colors text-sm font-semibold">
                                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                                        </svg>
                                                        Delete
                                                    </button>
                                                    <form id="delete-form-{{ $application->id }}" action="{{ route('applications.destroy', $application->id) }}" method="POST" class="hidden">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <!-- Mobile Card View -->
                        <div class="md:hidden space-y-3">
                            @foreach($applications as $application)
                                <div class="bg-white/10 rounded-xl p-4 border border-white/20">
                                    <div class="flex items-start justify-between mb-3">
                                        <span class="inline-flex items-center px-2.5 py-1 rounded-md bg-[#F9B233]/30 text-[#F9B233] font-bold text-sm">
                                            #{{ $application->id }}
                                        </span>
                                        <span class="text-white text-sm">{{ $application->created_at->format('M d, Y') }}</span>
                                    </div>
                                    
                                    <h4 class="text-white font-bold text-base mb-1">
                                        {{ $application->first_name }} {{ $application->middle_name ?? '' }} {{ $application->last_name }}
                                    </h4>
                                    <p class="text-white/90 text-sm mb-2">{{ $application->contact_number }}</p>
                                    
                                    {{-- Status Badge for Mobile --}}
                                    @php
                                        $mobileStatus = $application->status ?? 'Pending';
                                        $mobileStatusConfig = match($mobileStatus) {
                                            'Pending' => ['bg' => 'bg-yellow-500/30', 'text' => 'text-yellow-300', 'icon' => 'M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z'],
                                            'Accepted by Admin' => ['bg' => 'bg-blue-500/30', 'text' => 'text-blue-300', 'icon' => 'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z'],
                                            'Rejected by Admin' => ['bg' => 'bg-red-500/30', 'text' => 'text-red-300', 'icon' => 'M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z'],
                                            'Accepted by Assessor' => ['bg' => 'bg-emerald-500/30', 'text' => 'text-emerald-300', 'icon' => 'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z'],
                                            'Ready for Interview' => ['bg' => 'bg-purple-500/30', 'text' => 'text-purple-300', 'icon' => 'M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z'],
                                            'Rejected by Assessor' => ['bg' => 'bg-red-500/30', 'text' => 'text-red-300', 'icon' => 'M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z'],
                                            'Final Admission List' => ['bg' => 'bg-green-500/30', 'text' => 'text-green-300', 'icon' => 'M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z'],
                                            default => ['bg' => 'bg-gray-500/30', 'text' => 'text-gray-300', 'icon' => 'M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z'],
                                        };
                                    @endphp
                                    <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full {{ $mobileStatusConfig['bg'] }} {{ $mobileStatusConfig['text'] }} text-xs font-semibold mb-4">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $mobileStatusConfig['icon'] }}"/>
                                        </svg>
                                        {{ $mobileStatus }}
                                    </span>
                                    
                                    <div class="flex items-center gap-2 pt-3 border-t border-white/20">
                                        <a href="{{ route('application.view', $application->id) }}" 
                                           class="flex-1 inline-flex items-center justify-center gap-1.5 px-3 py-2 bg-blue-500/30 text-blue-300 rounded-lg hover:bg-blue-500/40 transition-colors text-sm font-semibold">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                            </svg>
                                            View
                                        </a>
                                        <a href="{{ route('applications.edit', $application->id) }}" 
                                           class="flex-1 inline-flex items-center justify-center gap-1.5 px-3 py-2 bg-[#F9B233]/30 text-[#F9B233] rounded-lg hover:bg-[#F9B233]/40 transition-colors text-sm font-semibold">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                            </svg>
                                            Edit
                                        </a>
                                        <button type="button" 
                                                onclick="showDeleteModal({{ $application->id }})"
                                                class="flex-1 inline-flex items-center justify-center gap-1.5 px-3 py-2 bg-red-500/30 text-red-300 rounded-lg hover:bg-red-500/40 transition-colors text-sm font-semibold">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                            </svg>
                                            Delete
                                        </button>
                                        <form id="delete-form-{{ $application->id }}" action="{{ route('applications.destroy', $application->id) }}" method="POST" class="hidden">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <!-- Results Count -->
                        <div class="mt-6 text-center">
                            <p class="text-white/60 text-sm">
                                Showing <span class="text-white font-medium">{{ $applications->count() }}</span> 
                                {{ Str::plural('application', $applications->count()) }}
                            </p>
                        </div>

                    @else
                        <!-- Empty State -->
                        <div class="text-center py-12">
                            <div class="w-20 h-20 bg-white/10 rounded-full flex items-center justify-center mx-auto mb-6">
                                <svg class="w-10 h-10 text-white/40" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                </svg>
                            </div>
                            <h4 class="text-white font-semibold text-lg mb-2">No Applications Yet</h4>
                            <p class="text-white/60 mb-6">You haven't submitted any applications. Start your ETEEAP journey today!</p>
                            <a href="{{ route('application.create') }}" 
                               class="inline-flex items-center gap-2 bg-[#F9B233] hover:bg-[#e5a42e] text-[#087A29] font-bold px-6 py-3 rounded-xl transition-all shadow-lg hover:shadow-xl hover:-translate-y-0.5">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                                </svg>
                                Submit Your First Application
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>

    </div>
</section>

<!-- Delete Confirmation Modal -->
<div id="deleteModal" class="fixed inset-0 z-50 hidden">
    <!-- Backdrop -->
    <div class="absolute inset-0 bg-black/60 backdrop-blur-sm" onclick="hideDeleteModal()"></div>
    
    <!-- Modal Content -->
    <div class="flex items-center justify-center min-h-screen p-4">
        <div class="relative bg-white rounded-2xl shadow-2xl max-w-md w-full p-6 transform transition-all">
            <!-- Close Button -->
            <button type="button" onclick="hideDeleteModal()" class="absolute top-4 right-4 text-gray-400 hover:text-gray-600 transition-colors">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
            
            <!-- Icon -->
            <div class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-4">
                <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                </svg>
            </div>
            
            <!-- Title -->
            <h3 class="text-xl font-bold text-gray-900 text-center mb-2">Confirm Deletion</h3>
            
            <!-- Message -->
            <p class="text-gray-600 text-center mb-6">
                Are you sure you want to delete this application?<br>
                <span class="text-red-600 font-medium">This action cannot be undone.</span>
            </p>
            
            <!-- Buttons -->
            <div class="flex gap-3">
                <button type="button" 
                        onclick="hideDeleteModal()"
                        class="flex-1 px-4 py-3 bg-gray-100 text-gray-700 font-semibold rounded-xl hover:bg-gray-200 transition-colors">
                    Cancel
                </button>
                <button type="button" 
                        id="confirmDeleteBtn"
                        class="flex-1 px-4 py-3 bg-red-600 text-white font-semibold rounded-xl hover:bg-red-700 transition-colors">
                    Delete
                </button>
            </div>
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

    /* Animations */
    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }

    @keyframes slideUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .animate-fadeIn {
        animation: fadeIn 0.8s ease-out forwards;
    }

    .animate-slideUp {
        opacity: 0;
        animation: slideUp 0.6s ease-out forwards;
    }

    /* Smooth scroll */
    html {
        scroll-behavior: smooth;
    }
</style>

<script>
    let deleteId = null;
    
    function showDeleteModal(id) {
        deleteId = id;
        document.getElementById('deleteModal').classList.remove('hidden');
        document.body.style.overflow = 'hidden';
    }
    
    function hideDeleteModal() {
        document.getElementById('deleteModal').classList.add('hidden');
        document.body.style.overflow = 'auto';
        deleteId = null;
    }
    
    document.getElementById('confirmDeleteBtn').addEventListener('click', function() {
        if (deleteId) {
            document.getElementById('delete-form-' + deleteId).submit();
        }
    });
    
    // Close modal on Escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            hideDeleteModal();
        }
    });
</script>

@include('partials.footer')
@endsection