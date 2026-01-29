@extends('layouts.app')
@section('title', 'ETEEAP - Edit Profile')

@push('styles')
<style>
    /* Glass Card Effect */
    .glass-card {
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(20px);
        -webkit-backdrop-filter: blur(20px);
        border: 1px solid rgba(255, 255, 255, 0.15);
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
    
    @keyframes scaleIn {
        from { 
            opacity: 0;
            transform: scale(0.95);
        }
        to { 
            opacity: 1;
            transform: scale(1);
        }
    }
    
    @keyframes float {
        0%, 100% { transform: translateY(0px); }
        50% { transform: translateY(-10px); }
    }
    
    @keyframes pulse-ring {
        0% { transform: scale(0.95); opacity: 1; }
        100% { transform: scale(1.3); opacity: 0; }
    }
    
    .animate-fadeIn { animation: fadeIn 0.8s ease-out forwards; }
    .animate-slideUp { animation: slideUp 0.6s ease-out forwards; }
    .animate-scaleIn { animation: scaleIn 0.5s ease-out forwards; }
    
    /* Profile Header Banner */
    .profile-header-banner {
        background: linear-gradient(135deg, rgba(8, 122, 41, 0.95) 0%, rgba(6, 90, 31, 0.9) 50%, rgba(4, 61, 21, 0.95) 100%);
        position: relative;
        overflow: hidden;
    }
    
    .profile-header-banner::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url('data:image/svg+xml,%3Csvg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="none" fill-rule="evenodd"%3E%3Cg fill="%23ffffff" fill-opacity="0.05"%3E%3Cpath d="M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');
    }
    
    /* Large Profile Avatar */
    .profile-avatar-large {
        width: 140px;
        height: 140px;
        background: linear-gradient(135deg, #F9B233 0%, #ffc107 50%, #F9B233 100%);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 3.5rem;
        font-weight: 800;
        color: #065a1f;
        text-transform: uppercase;
        border: 5px solid rgba(255, 255, 255, 0.3);
        box-shadow: 0 15px 50px rgba(0, 0, 0, 0.4), 0 0 0 8px rgba(249, 178, 51, 0.2);
        position: relative;
        z-index: 10;
    }
    
    .profile-avatar-large::before {
        content: '';
        position: absolute;
        inset: -8px;
        border-radius: 50%;
        border: 3px solid rgba(249, 178, 51, 0.3);
        animation: pulse-ring 2s ease-out infinite;
    }
    
    /* Status Badge */
    .status-badge {
        position: absolute;
        bottom: 5px;
        right: 5px;
        width: 24px;
        height: 24px;
        background: #22c55e;
        border-radius: 50%;
        border: 4px solid #065a1f;
        z-index: 20;
    }
    
    /* Profile Stats */
    .profile-stat {
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.15);
        transition: all 0.3s ease;
    }
    
    .profile-stat:hover {
        background: rgba(255, 255, 255, 0.15);
        transform: translateY(-2px);
    }
    
    /* Custom Input Styling */
    .custom-input {
        background: rgba(255, 255, 255, 0.08);
        border: 1px solid rgba(255, 255, 255, 0.2);
        color: white;
        transition: all 0.3s ease;
    }
    
    .custom-input:focus {
        background: rgba(255, 255, 255, 0.12);
        border-color: #F9B233;
        box-shadow: 0 0 0 3px rgba(249, 178, 51, 0.15);
        outline: none;
    }
    
    .custom-input::placeholder {
        color: rgba(255, 255, 255, 0.5);
    }
    
    /* Hover effects for form groups */
    .form-group-hover {
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }
    
    .form-group-hover:hover {
        transform: translateY(-2px);
    }
    
    /* Password toggle button */
    .password-toggle {
        position: absolute;
        right: 12px;
        top: 50%;
        transform: translateY(-50%);
        background: none;
        border: none;
        color: rgba(255, 255, 255, 0.5);
        cursor: pointer;
        padding: 0.5rem;
        transition: color 0.3s ease;
    }
    
    .password-toggle:hover {
        color: #F9B233;
    }
    
    /* Decorative elements */
    .decoration-circle {
        position: absolute;
        border-radius: 50%;
        pointer-events: none;
    }
</style>
@endpush

@section('content')

<section class="relative min-h-screen overflow-hidden">
    
    <!-- Background with CLSU Green Gradient Overlay -->
    <div class="fixed inset-0 bg-cover bg-center bg-no-repeat" 
         style="background-image: url('{{ asset('inspinia/img/landing/r.jpg') }}');">
        <div class="absolute inset-0 bg-gradient-to-br from-[#087A29]/95 via-[#065a1f]/90 to-[#043d15]/95"></div>
        <div class="absolute inset-0 opacity-5" 
             style="background-image: url('data:image/svg+xml,%3Csvg width=60 height=60 viewBox=%220 0 60 60%22 xmlns=%22http://www.w3.org/2000/svg%22%3E%3Cg fill=%22none%22 fill-rule=%22evenodd%22%3E%3Cg fill=%22%23ffffff%22 fill-opacity=%221%22%3E%3Cpath d=%22M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z%22/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>
    </div>

    <!-- Floating Decorative Elements -->
    <div class="fixed top-20 left-10 w-72 h-72 bg-[#F9B233]/10 rounded-full blur-3xl animate-pulse pointer-events-none"></div>
    <div class="fixed bottom-20 right-10 w-96 h-96 bg-[#F9B233]/10 rounded-full blur-3xl animate-pulse pointer-events-none" style="animation-delay: 1s;"></div>
    <div class="fixed top-1/2 left-1/4 w-64 h-64 bg-white/5 rounded-full blur-3xl pointer-events-none"></div>

    <!-- Main Content -->
    <div class="relative z-10">
        
        <!-- ==================== PROFILE HEADER BANNER ==================== -->
        <div class="profile-header-banner py-8 lg:py-12 animate-fadeIn">
            <!-- Decorative circles -->
            <div class="decoration-circle w-64 h-64 bg-[#F9B233]/10 -top-20 -left-20 blur-3xl"></div>
            <div class="decoration-circle w-48 h-48 bg-white/5 -bottom-10 right-10 blur-2xl"></div>
            <div class="decoration-circle w-32 h-32 bg-[#F9B233]/5 top-1/2 right-1/4 blur-xl" style="animation: float 4s ease-in-out infinite;"></div>
            
            <div class="container mx-auto px-4 relative">
                <!-- Top Navigation Row -->
                <div class="flex flex-col lg:flex-row items-center justify-between gap-6 mb-8">
                    <!-- University Branding -->
                    
                    <!-- Back Button -->
                    <a href="{{ route('user.index') }}" 
                       class="inline-flex items-center gap-2 bg-white/10 hover:bg-white/20 text-white font-semibold px-6 py-3 rounded-xl transition-all border border-white/20 hover:border-[#F9B233]/50 group">
                        <svg class="w-5 h-5 group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                        </svg>
                        Back to Dashboard
                    </a>
                </div>
                
                <!-- Profile Info Section -->
                <div class="flex flex-col items-center gap-6">
                    <!-- Avatar -->
                    <div class="relative animate-scaleIn">
                        <div class="profile-avatar-large">
                            {{ strtoupper(substr($user->first_name ?? 'U', 0, 1)) }}{{ strtoupper(substr($user->surname ?? 'S', 0, 1)) }}
                        </div>
                        <div class="status-badge" title="Online"></div>
                    </div>
                    
                    <!-- User Info -->
                    <div class="text-center animate-slideUp">
                        <div class="flex flex-col items-center gap-3 mb-2">
                            <h2 class="text-3xl lg:text-4xl font-bold text-white">
                                {{ $user->first_name ?? '' }} {{ $user->middle_name ? substr($user->middle_name, 0, 1) . '.' : '' }} {{ $user->surname ?? '' }}
                                @if($user->extension)
                                    <span class="text-[#F9B233]">{{ $user->extension }}</span>
                                @endif
                            </h2>
                            <span class="inline-flex items-center gap-1.5 px-3 py-1 bg-[#F9B233]/20 text-[#F9B233] rounded-full text-sm font-semibold">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                                Verified Applicant
                            </span>
                        </div>
                        
                        <p class="text-white/70 text-lg mb-4 flex items-center justify-center gap-2">
                            <svg class="w-5 h-5 text-[#F9B233]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                            {{ $user->email }}
                        </p>
                        
                        <!-- Profile Stats/Info Cards -->
                        <div class="flex flex-wrap justify-center gap-4">
                            @if($user->unique_id)
                            <div class="profile-stat px-5 py-3 rounded-xl">
                                <p class="text-white/60 text-xs uppercase tracking-wider mb-1">Applicant ID</p>
                                <p class="text-[#F9B233] font-bold text-lg">{{ $user->unique_id }}</p>
                            </div>
                            @endif
                            
                            <div class="profile-stat px-5 py-3 rounded-xl">
                                <p class="text-white/60 text-xs uppercase tracking-wider mb-1">Member Since</p>
                                <p class="text-white font-semibold">{{ $user->created_at->format('M d, Y') }}</p>
                            </div>
                            
                            <div class="profile-stat px-5 py-3 rounded-xl">
                                <p class="text-white/60 text-xs uppercase tracking-wider mb-1">Email Status</p>
                                <p class="font-semibold flex items-center gap-2 {{ $user->email_verified_at ? 'text-green-400' : 'text-yellow-400' }}">
                                    @if($user->email_verified_at)
                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                        </svg>
                                        Verified
                                    @else
                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                        </svg>
                                        Pending
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ==================== END PROFILE HEADER BANNER ==================== -->

        <!-- Page Content Container -->
        <div class="container mx-auto px-4 py-8 lg:py-12">
            
            <!-- Success/Error Messages -->
            @if(session('success'))
                <div class="mb-6 animate-slideUp max-w-4xl mx-auto" style="animation-delay: 0.1s;">
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

            @if(session('error'))
                <div class="mb-6 animate-slideUp max-w-4xl mx-auto" style="animation-delay: 0.1s;">
                    <div class="glass-card rounded-xl p-4 border-l-4 border-red-400 flex items-center gap-3">
                        <div class="w-10 h-10 bg-red-500/20 rounded-full flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6 text-red-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <span class="text-white font-medium">{{ session('error') }}</span>
                    </div>
                </div>
            @endif

            <!-- Section Title -->
            <div class="mb-8 animate-slideUp max-w-4xl mx-auto">
                <h3 class="text-2xl font-bold text-white flex items-center gap-3">
                    <div class="w-10 h-10 bg-[#F9B233]/20 rounded-lg flex items-center justify-center">
                        <svg class="w-5 h-5 text-[#F9B233]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                        </svg>
                    </div>
                    Update Your Information
                </h3>
                <p class="text-white/60 mt-2 ml-13">Make changes to your profile details and security settings below</p>
            </div>

            <!-- Main Form Card -->
            <div class="animate-slideUp" style="animation-delay: 0.2s;">
                <div class="glass-card rounded-2xl overflow-hidden max-w-4xl mx-auto">

                    <!-- Form Content -->
                    <form action="{{ route('user.profile.update') }}" method="POST" class="p-8">
                        @csrf

                        <!-- Personal Information Section -->
                        <div class="mb-8">
                            <div class="flex items-center gap-3 mb-6">
                                <div class="w-10 h-10 bg-[#F9B233]/20 rounded-lg flex items-center justify-center">
                                    <svg class="w-5 h-5 text-[#F9B233]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                </div>
                                <h4 class="text-xl font-semibold text-white">Personal Information</h4>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                                <!-- First Name -->
                                <div class="form-group-hover">
                                    <label for="first_name" class="block text-white/80 text-sm font-medium mb-2">
                                        First Name <span class="text-red-400">*</span>
                                    </label>
                                    <input type="text" 
                                           id="first_name" 
                                           name="first_name" 
                                           value="{{ old('first_name', $user->first_name) }}"
                                           class="custom-input w-full px-4 py-3 rounded-xl text-white" 
                                           placeholder="Enter first name"
                                           required>
                                    @error('first_name')
                                        <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Middle Name -->
                                <div class="form-group-hover">
                                    <label for="middle_name" class="block text-white/80 text-sm font-medium mb-2">
                                        Middle Name
                                    </label>
                                    <input type="text" 
                                           id="middle_name" 
                                           name="middle_name" 
                                           value="{{ old('middle_name', $user->middle_name) }}"
                                           class="custom-input w-full px-4 py-3 rounded-xl text-white" 
                                           placeholder="Enter middle name">
                                    @error('middle_name')
                                        <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Surname -->
                                <div class="form-group-hover">
                                    <label for="surname" class="block text-white/80 text-sm font-medium mb-2">
                                        Surname <span class="text-red-400">*</span>
                                    </label>
                                    <input type="text" 
                                           id="surname" 
                                           name="surname" 
                                           value="{{ old('surname', $user->surname) }}"
                                           class="custom-input w-full px-4 py-3 rounded-xl text-white" 
                                           placeholder="Enter surname"
                                           required>
                                    @error('surname')
                                        <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Extension -->
                                <div class="form-group-hover">
                                    <label for="extension" class="block text-white/80 text-sm font-medium mb-2">
                                        Extension
                                    </label>
                                    <input type="text" 
                                           id="extension" 
                                           name="extension" 
                                           value="{{ old('extension', $user->extension) }}"
                                           class="custom-input w-full px-4 py-3 rounded-xl text-white" 
                                           placeholder="Jr, Sr, III">
                                    @error('extension')
                                        <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Email Section -->
                        <div class="mb-8">
                            <div class="flex items-center gap-3 mb-6">
                                <div class="w-10 h-10 bg-blue-500/20 rounded-lg flex items-center justify-center">
                                    <svg class="w-5 h-5 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                    </svg>
                                </div>
                                <h4 class="text-xl font-semibold text-white">Email Address</h4>
                            </div>

                            <div class="form-group-hover max-w-xl">
                                <label for="email" class="block text-white/80 text-sm font-medium mb-2">
                                    Email <span class="text-red-400">*</span>
                                </label>
                                <input type="email" 
                                       id="email" 
                                       name="email" 
                                       value="{{ old('email', $user->email) }}"
                                       class="custom-input w-full px-4 py-3 rounded-xl text-white" 
                                       placeholder="Enter email address"
                                       required>
                                @error('email')
                                    <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Security Section -->
                        <div class="mb-8">
                            <div class="flex items-center gap-3 mb-6">
                                <div class="w-10 h-10 bg-purple-500/20 rounded-lg flex items-center justify-center">
                                    <svg class="w-5 h-5 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="text-xl font-semibold text-white">Security</h4>
                                    <p class="text-white/50 text-sm">Leave blank to keep current password</p>
                                </div>
                            </div>

                            @if ($errors->has('password'))
                                <div class="mb-4 p-4 bg-red-500/20 border border-red-500/30 rounded-xl">
                                    <p class="text-red-400 text-sm">{{ $errors->first('password') }}</p>
                                </div>
                            @endif

                            @if ($errors->has('password_confirmation'))
                                <div class="mb-4 p-4 bg-red-500/20 border border-red-500/30 rounded-xl">
                                    <p class="text-red-400 text-sm">{{ $errors->first('password_confirmation') }}</p>
                                </div>
                            @endif

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 max-w-2xl">
                                <!-- New Password -->
                                <div class="form-group-hover">
                                    <label for="password" class="block text-white/80 text-sm font-medium mb-2">
                                        New Password
                                    </label>
                                    <div class="relative">
                                        <input type="password" 
                                               id="password" 
                                               name="password" 
                                               class="custom-input w-full px-4 py-3 pr-12 rounded-xl text-white" 
                                               placeholder="Enter new password">
                                        <button type="button" 
                                                onclick="togglePasswordVisibility('password', this)"
                                                class="password-toggle"
                                                title="Show/Hide Password">
                                            <i class="fas fa-eye text-lg"></i>
                                        </button>
                                    </div>
                                </div>

                                <!-- Confirm Password -->
                                <div class="form-group-hover">
                                    <label for="password_confirmation" class="block text-white/80 text-sm font-medium mb-2">
                                        Confirm Password
                                    </label>
                                    <div class="relative">
                                        <input type="password" 
                                               id="password_confirmation" 
                                               name="password_confirmation" 
                                               class="custom-input w-full px-4 py-3 pr-12 rounded-xl text-white" 
                                               placeholder="Confirm new password">
                                        <button type="button" 
                                                onclick="togglePasswordVisibility('password_confirmation', this)"
                                                class="password-toggle"
                                                title="Show/Hide Password">
                                            <i class="fas fa-eye text-lg"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!-- Password Requirements -->
                            <div class="mt-4 p-4 bg-white/5 rounded-xl max-w-2xl">
                                <p class="text-white/60 text-sm mb-2">Password requirements:</p>
                                <ul class="text-white/50 text-sm space-y-1">
                                    <li class="flex items-center gap-2">
                                        <svg class="w-4 h-4 text-[#F9B233]" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                        </svg>
                                        Minimum 8 characters
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="flex flex-col sm:flex-row gap-4 pt-6 border-t border-white/10">
                            <button type="submit" 
                                    class="flex-1 sm:flex-none inline-flex items-center justify-center gap-2 bg-gradient-to-r from-[#F9B233] to-[#d4962b] hover:from-[#d4962b] hover:to-[#F9B233] text-white font-bold px-8 py-3.5 rounded-xl transition-all shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                Save Changes
                            </button>
                            
                            <a href="{{ route('user.index') }}" 
                               class="flex-1 sm:flex-none inline-flex items-center justify-center gap-2 bg-white/10 hover:bg-white/20 text-white font-semibold px-8 py-3.5 rounded-xl transition-all border border-white/20">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                </svg>
                                Cancel
                            </a>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</section>

@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Success message
    @if(session('success'))
        Swal.fire({
            icon: 'success',
            title: 'Success!',
            text: '{{ session('success') }}',
            confirmButtonText: 'OK',
            confirmButtonColor: '#087A29'
        });
    @endif

    // Error message
    @if(session('error'))
        Swal.fire({
            icon: 'error',
            title: 'Error!',
            text: '{{ session('error') }}',
            confirmButtonText: 'OK',
            confirmButtonColor: '#087A29'
        });
    @endif

    // Validation errors
    @if(Session::has('validation_errors'))
        Swal.fire({
            icon: 'error',
            title: 'Validation Error!',
            html: '<ul style="text-align: left;">' +
                @foreach (Session::get('validation_errors') as $error)
                    '<li>{{ $error }}</li>' +
                @endforeach
                '</ul>',
            confirmButtonText: 'OK',
            confirmButtonColor: '#087A29'
        });
    @endif
});

function togglePasswordVisibility(fieldId, button) {
    const field = document.getElementById(fieldId);
    const icon = button.querySelector('i');
    
    if (field.type === 'password') {
        field.type = 'text';
        icon.classList.remove('fa-eye');
        icon.classList.add('fa-eye-slash');
        icon.style.color = '#F9B233';
    } else {
        field.type = 'password';
        icon.classList.remove('fa-eye-slash');
        icon.classList.add('fa-eye');
        icon.style.color = '';
    }
}
</script>
@endpush
