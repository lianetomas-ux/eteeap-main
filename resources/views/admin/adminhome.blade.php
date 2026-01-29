@extends('layouts.admin')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-[#f8fdf8] via-[#f0f7f0] to-[#e8f5e8] p-4 sm:p-6 lg:p-8 relative overflow-hidden">
    
    {{-- Animated Background Elements --}}
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute top-20 left-10 w-72 h-72 bg-[#006633]/5 rounded-full blur-3xl float-animation"></div>
        <div class="absolute top-40 right-20 w-96 h-96 bg-[#D4AF37]/5 rounded-full blur-3xl float-animation" style="animation-delay: -2s;"></div>
        <div class="absolute bottom-20 left-1/3 w-80 h-80 bg-emerald-400/5 rounded-full blur-3xl float-animation" style="animation-delay: -4s;"></div>
    </div>

    {{-- Welcome Header --}}
    <div class="mb-8 relative z-10">
        <div class="animated-gradient rounded-3xl p-6 sm:p-8 lg:p-10 shadow-2xl shadow-[#006633]/20 relative overflow-hidden">
            {{-- Decorative Elements --}}
            <div class="absolute top-0 right-0 w-96 h-96 bg-white/10 rounded-full blur-3xl -translate-y-1/2 translate-x-1/2"></div>
            <div class="absolute bottom-0 left-0 w-64 h-64 bg-[#FFD700]/10 rounded-full blur-2xl translate-y-1/2 -translate-x-1/2"></div>
            <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-full h-full bg-gradient-to-r from-transparent via-white/5 to-transparent"></div>
            
            {{-- Floating Particles --}}
            <div class="absolute top-10 right-10 w-3 h-3 bg-[#FFD700]/40 rounded-full float-animation"></div>
            <div class="absolute top-20 right-32 w-2 h-2 bg-white/30 rounded-full float-animation" style="animation-delay: -1s;"></div>
            <div class="absolute bottom-10 right-20 w-4 h-4 bg-[#FFD700]/30 rounded-full float-animation" style="animation-delay: -3s;"></div>
            
            <div class="relative z-10 flex flex-col lg:flex-row items-start lg:items-center justify-between gap-6">
                <div class="flex-1">
                    <div class="flex items-center gap-4 mb-4">
                        <div class="w-16 h-16 bg-[#FFD700]/20 backdrop-blur-xl rounded-2xl flex items-center justify-center border border-[#FFD700]/30 shadow-lg shadow-[#FFD700]/20 stat-icon">
                            <svg class="w-8 h-8 text-[#FFD700]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z"/>
                            </svg>
                        </div>
                        <div>
                            <p class="text-[#FFD700] text-sm font-semibold uppercase tracking-widest mb-1 flex items-center gap-2">
                                <span class="w-8 h-[2px] bg-[#FFD700]/50"></span>
                                Welcome back
                            </p>
                            <h1 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-white drop-shadow-lg" style="font-family: 'Playfair Display', serif;">
                                Admin Dashboard
                            </h1>
                        </div>
                    </div>
                    <p class="text-white/80 text-base sm:text-lg max-w-2xl leading-relaxed">
                        Manage ETEEAP applications, track progress, and oversee the accreditation process from your centralized control panel.
                    </p>
                </div>
                
                <div class="flex flex-col sm:flex-row items-stretch gap-4">
                    <div class="glass rounded-2xl px-6 py-5 border border-white/20 text-center min-w-[140px]">
                        <div class="w-10 h-10 bg-white/10 rounded-xl flex items-center justify-center mx-auto mb-2">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                        </div>
                        <p class="text-white/60 text-xs uppercase tracking-wider mb-1">Today</p>
                        <p class="text-white font-bold text-xl">{{ now()->format('M d') }}</p>
                        <p class="text-white/60 text-xs">{{ now()->format('Y') }}</p>
                    </div>
                    <div class="glass rounded-2xl px-6 py-5 border border-white/20 text-center min-w-[140px]">
                        <div class="w-10 h-10 bg-white/10 rounded-xl flex items-center justify-center mx-auto mb-2">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <p class="text-white/60 text-xs uppercase tracking-wider mb-1">Time</p>
                        <p class="text-white font-bold text-xl" id="currentTime">{{ now()->format('h:i') }}</p>
                        <p class="text-white/60 text-xs">{{ now()->format('A') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Quick Stats Grid --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6 mb-8 relative z-10">
        {{-- Pending Applications --}}
        <div class="stat-card group bg-white/80 backdrop-blur-xl rounded-2xl p-6 shadow-lg shadow-orange-500/5 border border-orange-100/50 hover:shadow-xl hover:shadow-orange-500/15 transition-all duration-500">
            <div class="flex items-start justify-between mb-4">
                <div class="stat-icon w-14 h-14 bg-gradient-to-br from-orange-400 to-orange-500 rounded-2xl flex items-center justify-center shadow-lg shadow-orange-500/30">
                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <span class="badge-modern inline-flex items-center px-3 py-1.5 rounded-full text-xs font-bold bg-gradient-to-r from-orange-100 to-amber-100 text-orange-700 uppercase tracking-wide">
                    Pending
                </span>
            </div>
            <h3 class="text-4xl font-extrabold text-gray-900 mb-1 tracking-tight">{{ App\Models\ApplicationForm::where('status', 'pending')->count() }}</h3>
            <p class="text-gray-500 text-sm font-medium">Pending Applications</p>
            <div class="mt-4 pt-4 border-t border-orange-100">
                <a href="{{ route('admin.applications') }}" class="text-orange-600 hover:text-orange-700 text-sm font-semibold inline-flex items-center gap-2 group-hover:gap-3 transition-all">
                    View Details
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                </a>
            </div>
        </div>

        {{-- Accepted Applications --}}
        <div class="stat-card group bg-white/80 backdrop-blur-xl rounded-2xl p-6 shadow-lg shadow-emerald-500/5 border border-emerald-100/50 hover:shadow-xl hover:shadow-emerald-500/15 transition-all duration-500">
            <div class="flex items-start justify-between mb-4">
                <div class="stat-icon w-14 h-14 bg-gradient-to-br from-emerald-400 to-emerald-500 rounded-2xl flex items-center justify-center shadow-lg shadow-emerald-500/30">
                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <span class="badge-modern inline-flex items-center px-3 py-1.5 rounded-full text-xs font-bold bg-gradient-to-r from-emerald-100 to-green-100 text-emerald-700 uppercase tracking-wide">
                    Accepted
                </span>
            </div>
            <h3 class="text-4xl font-extrabold text-gray-900 mb-1 tracking-tight">{{ App\Models\ApplicationForm::where('status', 'accepted')->count() }}</h3>
            <p class="text-gray-500 text-sm font-medium">Accepted Applications</p>
            <div class="mt-4 pt-4 border-t border-emerald-100">
                <a href="{{ route('admin.acceptedApplicants') }}" class="text-emerald-600 hover:text-emerald-700 text-sm font-semibold inline-flex items-center gap-2 group-hover:gap-3 transition-all">
                    View Details
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                </a>
            </div>
        </div>

        {{-- Rejected Applications --}}
        <div class="stat-card group bg-white/80 backdrop-blur-xl rounded-2xl p-6 shadow-lg shadow-red-500/5 border border-red-100/50 hover:shadow-xl hover:shadow-red-500/15 transition-all duration-500">
            <div class="flex items-start justify-between mb-4">
                <div class="stat-icon w-14 h-14 bg-gradient-to-br from-red-400 to-red-500 rounded-2xl flex items-center justify-center shadow-lg shadow-red-500/30">
                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <span class="badge-modern inline-flex items-center px-3 py-1.5 rounded-full text-xs font-bold bg-gradient-to-r from-red-100 to-rose-100 text-red-700 uppercase tracking-wide">
                    Rejected
                </span>
            </div>
            <h3 class="text-4xl font-extrabold text-gray-900 mb-1 tracking-tight">{{ App\Models\ApplicationForm::where('status', 'rejected')->count() }}</h3>
            <p class="text-gray-500 text-sm font-medium">Rejected Applications</p>
            <div class="mt-4 pt-4 border-t border-red-100">
                <a href="{{ route('admin.applications') }}" class="text-red-600 hover:text-red-700 text-sm font-semibold inline-flex items-center gap-2 group-hover:gap-3 transition-all">
                    View Details
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                </a>
            </div>
        </div>

        {{-- Total Users --}}
        <div class="stat-card group bg-white/80 backdrop-blur-xl rounded-2xl p-6 shadow-lg shadow-blue-500/5 border border-blue-100/50 hover:shadow-xl hover:shadow-blue-500/15 transition-all duration-500">
            <div class="flex items-start justify-between mb-4">
                <div class="stat-icon w-14 h-14 bg-gradient-to-br from-blue-400 to-blue-500 rounded-2xl flex items-center justify-center shadow-lg shadow-blue-500/30">
                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                </div>
                <span class="badge-modern inline-flex items-center px-3 py-1.5 rounded-full text-xs font-bold bg-gradient-to-r from-blue-100 to-indigo-100 text-blue-700 uppercase tracking-wide">
                    Users
                </span>
            </div>
            <h3 class="text-4xl font-extrabold text-gray-900 mb-1 tracking-tight">{{ App\Models\User::count() }}</h3>
            <p class="text-gray-500 text-sm font-medium">Registered Users</p>
            <div class="mt-4 pt-4 border-t border-blue-100">
                <a href="{{ route('admin.users.index') }}" class="text-blue-600 hover:text-blue-700 text-sm font-semibold inline-flex items-center gap-2 group-hover:gap-3 transition-all">
                    View Details
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                </a>
            </div>
        </div>
    </div>
                </div>
                <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold bg-blue-100 text-blue-700">
                    Users
                </span>
            </div>
            <h3 class="text-3xl font-bold text-gray-900 mb-1">{{ App\Models\User::count() }}</h3>
            <p class="text-gray-500 text-sm">Registered Users</p>
        </div>
    </div>

    {{-- Quick Actions & Recent Activity --}}
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 relative z-10">
        {{-- Quick Actions --}}
        <div class="lg:col-span-1">
            <div class="modern-card rounded-2xl overflow-hidden">
                <div class="animated-gradient p-6 relative overflow-hidden">
                    <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/5 to-transparent"></div>
                    <h2 class="text-lg font-bold text-white flex items-center gap-3 relative z-10">
                        <div class="w-11 h-11 bg-[#FFD700]/20 backdrop-blur-xl rounded-xl flex items-center justify-center border border-[#FFD700]/30">
                            <svg class="w-5 h-5 text-[#FFD700]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                            </svg>
                        </div>
                        Quick Actions
                    </h2>
                </div>
                <div class="p-5 space-y-3">
                    <a href="{{ route('admin.applications') }}" class="flex items-center gap-4 p-4 rounded-xl bg-gradient-to-r from-gray-50 to-gray-50/50 hover:from-[#006633]/5 hover:to-[#D4AF37]/5 border border-transparent hover:border-[#006633]/20 transition-all duration-300 group">
                        <div class="w-12 h-12 bg-gradient-to-br from-[#006633]/10 to-[#006633]/5 rounded-xl flex items-center justify-center group-hover:from-[#006633]/20 group-hover:to-[#006633]/10 transition-all duration-300 group-hover:scale-110">
                            <svg class="w-6 h-6 text-[#006633]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="font-semibold text-gray-900 group-hover:text-[#006633] transition-colors truncate">View Applications</p>
                            <p class="text-sm text-gray-500 truncate">Manage all applications</p>
                        </div>
                        <svg class="w-5 h-5 text-gray-400 group-hover:text-[#006633] group-hover:translate-x-1 transition-all flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </a>
                    
                    {{-- Compose Email Button --}}
                    <button type="button" data-bs-toggle="modal" data-bs-target="#composeEmailModal" class="flex items-center gap-4 p-4 rounded-xl bg-gradient-to-r from-gray-50 to-gray-50/50 hover:from-[#006633]/5 hover:to-[#D4AF37]/5 border border-transparent hover:border-[#006633]/20 transition-all duration-300 group w-full text-left">
                        <div class="w-12 h-12 bg-gradient-to-br from-[#D4AF37]/20 to-[#D4AF37]/10 rounded-xl flex items-center justify-center group-hover:from-[#D4AF37]/30 group-hover:to-[#D4AF37]/20 transition-all duration-300 group-hover:scale-110">
                            <svg class="w-6 h-6 text-[#D4AF37]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="font-semibold text-gray-900 group-hover:text-[#006633] transition-colors truncate">Compose Email</p>
                            <p class="text-sm text-gray-500 truncate">Send email to users</p>
                        </div>
                        <svg class="w-5 h-5 text-gray-400 group-hover:text-[#006633] group-hover:translate-x-1 transition-all flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </button>
                    
                    <a href="{{ route('admin.users.index') }}" class="flex items-center gap-4 p-4 rounded-xl bg-gradient-to-r from-gray-50 to-gray-50/50 hover:from-[#006633]/5 hover:to-[#D4AF37]/5 border border-transparent hover:border-[#006633]/20 transition-all duration-300 group">
                        <div class="w-12 h-12 bg-gradient-to-br from-[#006633]/10 to-[#006633]/5 rounded-xl flex items-center justify-center group-hover:from-[#006633]/20 group-hover:to-[#006633]/10 transition-all duration-300 group-hover:scale-110">
                            <svg class="w-6 h-6 text-[#006633]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="font-semibold text-gray-900 group-hover:text-[#006633] transition-colors truncate">Manage Users</p>
                            <p class="text-sm text-gray-500 truncate">User administration</p>
                        </div>
                        <svg class="w-5 h-5 text-gray-400 group-hover:text-[#006633] group-hover:translate-x-1 transition-all flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </a>
                    
                    <a href="{{ route('admin.courses.index') }}" class="flex items-center gap-4 p-4 rounded-xl bg-gradient-to-r from-gray-50 to-gray-50/50 hover:from-[#006633]/5 hover:to-[#D4AF37]/5 border border-transparent hover:border-[#006633]/20 transition-all duration-300 group">
                        <div class="w-12 h-12 bg-gradient-to-br from-[#006633]/10 to-[#006633]/5 rounded-xl flex items-center justify-center group-hover:from-[#006633]/20 group-hover:to-[#006633]/10 transition-all duration-300 group-hover:scale-110">
                            <svg class="w-6 h-6 text-[#006633]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                            </svg>
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="font-semibold text-gray-900 group-hover:text-[#006633] transition-colors truncate">Courses</p>
                            <p class="text-sm text-gray-500 truncate">Manage offered courses</p>
                        </div>
                        <svg class="w-5 h-5 text-gray-400 group-hover:text-[#006633] group-hover:translate-x-1 transition-all flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </a>
                    
                    <a href="{{ route('admin.settings.index') }}" class="flex items-center gap-4 p-4 rounded-xl bg-gradient-to-r from-gray-50 to-gray-50/50 hover:from-[#006633]/5 hover:to-[#D4AF37]/5 border border-transparent hover:border-[#006633]/20 transition-all duration-300 group">
                        <div class="w-12 h-12 bg-gradient-to-br from-[#006633]/10 to-[#006633]/5 rounded-xl flex items-center justify-center group-hover:from-[#006633]/20 group-hover:to-[#006633]/10 transition-all duration-300 group-hover:scale-110">
                            <svg class="w-6 h-6 text-[#006633]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="font-semibold text-gray-900 group-hover:text-[#006633] transition-colors truncate">Settings</p>
                            <p class="text-sm text-gray-500 truncate">System configuration</p>
                        </div>
                        <svg class="w-5 h-5 text-gray-400 group-hover:text-[#006633] group-hover:translate-x-1 transition-all flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>

        {{-- Recent Applications --}}
        <div class="lg:col-span-2">
            <div class="modern-card rounded-2xl overflow-hidden">
                <div class="animated-gradient p-6 flex items-center justify-between relative overflow-hidden">
                    <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/5 to-transparent"></div>
                    <h2 class="text-lg font-bold text-white flex items-center gap-3 relative z-10">
                        <div class="w-11 h-11 bg-[#FFD700]/20 backdrop-blur-xl rounded-xl flex items-center justify-center border border-[#FFD700]/30">
                            <svg class="w-5 h-5 text-[#FFD700]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                        </div>
                        Recent Applications
                    </h2>
                    <a href="{{ route('admin.applications') }}" class="relative z-10 bg-white/10 hover:bg-white/20 backdrop-blur-xl text-white px-4 py-2 rounded-xl text-sm font-semibold flex items-center gap-2 transition-all duration-300 hover:scale-105 border border-white/20">
                        View All
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </a>
                </div>
                <div class="p-5">
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead>
                                <tr class="border-b border-gray-100">
                                    <th class="text-left py-4 px-4 text-xs font-bold text-gray-500 uppercase tracking-wider">Applicant</th>
                                    <th class="text-left py-4 px-4 text-xs font-bold text-gray-500 uppercase tracking-wider">Program</th>
                                    <th class="text-left py-4 px-4 text-xs font-bold text-gray-500 uppercase tracking-wider">Status</th>
                                    <th class="text-left py-4 px-4 text-xs font-bold text-gray-500 uppercase tracking-wider">Date</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-50">
                                @forelse(App\Models\ApplicationForm::orderBy('created_at', 'desc')->take(5)->get() as $app)
                                <tr class="table-row-modern hover:bg-gradient-to-r hover:from-[#006633]/[0.02] hover:to-[#D4AF37]/[0.02]">
                                    <td class="py-4 px-4">
                                        <div class="flex items-center gap-3">
                                            <div class="w-11 h-11 bg-gradient-to-br from-[#006633] to-[#004d26] rounded-full flex items-center justify-center text-white font-bold text-sm shadow-lg shadow-[#006633]/20">
                                                {{ strtoupper(substr($app->first_name ?? 'N', 0, 1)) }}
                                            </div>
                                            <div>
                                                <p class="font-semibold text-gray-900">{{ $app->first_name ?? '' }} {{ $app->last_name ?? '' }}</p>
                                                <p class="text-xs text-gray-500">{{ $app->contact_number ?? 'No contact' }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="py-4 px-4">
                                        <p class="text-sm text-gray-700 truncate max-w-[200px] font-medium">{{ $app->degree_program_field ?? 'N/A' }}</p>
                                    </td>
                                    <td class="py-4 px-4">
                                        @php
                                            $statusColors = [
                                                'pending' => 'from-orange-100 to-amber-100 text-orange-700',
                                                'accepted' => 'from-emerald-100 to-green-100 text-emerald-700',
                                                'rejected' => 'from-red-100 to-rose-100 text-red-700',
                                            ];
                                            $statusColor = $statusColors[$app->status] ?? 'from-gray-100 to-gray-100 text-gray-700';
                                        @endphp
                                        <span class="badge-modern inline-flex items-center px-3 py-1.5 rounded-full text-xs font-bold bg-gradient-to-r {{ $statusColor }} uppercase tracking-wide">
                                            {{ ucfirst($app->status ?? 'Unknown') }}
                                        </span>
                                    </td>
                                    <td class="py-4 px-4">
                                        <p class="text-sm text-gray-500 font-medium">{{ $app->created_at ? $app->created_at->format('M d, Y') : 'N/A' }}</p>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4" class="py-12 text-center text-gray-500">
                                        <div class="flex flex-col items-center">
                                            <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mb-4">
                                                <svg class="w-8 h-8 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                                </svg>
                                            </div>
                                            <p class="font-medium text-gray-600">No applications yet</p>
                                            <p class="text-sm text-gray-400 mt-1">Applications will appear here</p>
                                        </div>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@section('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // Update time every second
    function updateTime() {
        const now = new Date();
        const hours = now.getHours() % 12 || 12;
        const minutes = now.getMinutes().toString().padStart(2, '0');
        document.getElementById('currentTime').textContent = `${hours}:${minutes}`;
    }
    setInterval(updateTime, 1000);
</script>
@endsection

{{-- Include Email Compose Modal --}}
@include('admin.partials.compose-email-modal')

@endsection
