@extends('layouts.app')

@section('title', 'Admission Requirements')

@section('content')

<section id="admission-requirements" class="relative min-h-screen overflow-hidden">
    
    <!-- Background with CLSU Green Gradient Overlay -->
    <div class="absolute inset-0 bg-cover bg-center bg-fixed" 
         style="background-image: url('{{ asset('inspinia/img/landing/r.jpg') }}');">
        <div class="absolute inset-0 bg-gradient-to-br from-[#087A29]/95 via-[#065a1f]/90 to-[#043d15]/95"></div>
        <!-- Decorative Pattern Overlay -->
        <div class="absolute inset-0 opacity-5" 
             style="background-image: url('data:image/svg+xml,%3Csvg width=60 height=60 viewBox=%220 0 60 60%22 xmlns=%22http://www.w3.org/2000/svg%22%3E%3Cg fill=%22none%22 fill-rule=%22evenodd%22%3E%3Cg fill=%22%23ffffff%22 fill-opacity=%221%22%3E%3Cpath d=%22M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z%22/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>
    </div>

    <!-- Floating Decorative Elements -->
    <div class="absolute top-20 left-10 w-72 h-72 bg-[#F9B233]/10 rounded-full blur-3xl animate-pulse"></div>
    <div class="absolute bottom-20 right-10 w-96 h-96 bg-[#F9B233]/10 rounded-full blur-3xl animate-pulse" style="animation-delay: 1s;"></div>

    <!-- Main Content -->
    <div class="relative z-10 container mx-auto px-4 py-16 lg:py-24">
        
        <!-- Header Section -->
        <div class="text-center mb-12 lg:mb-16 animate-fadeIn">
            <!-- Icon Badge -->
            <div class="inline-flex items-center justify-center w-20 h-20 bg-[#F9B233]/20 rounded-2xl border border-[#F9B233]/30 mb-6 backdrop-blur-sm">
                <svg class="w-10 h-10 text-[#F9B233]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                          d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                </svg>
            </div>
            
            <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold text-white uppercase tracking-wide mb-4">
                Admission Requirements
            </h1>
            
            <!-- CLSU Gold Accent Line -->
            <div class="flex items-center justify-center gap-2 mb-6">
                <div class="w-12 h-1 bg-[#F9B233]/50 rounded-full"></div>
                <div class="w-24 h-1.5 bg-[#F9B233] rounded-full"></div>
                <div class="w-12 h-1 bg-[#F9B233]/50 rounded-full"></div>
            </div>
            
            <p class="text-white/80 text-lg md:text-xl max-w-2xl mx-auto">
                To complete the admission process, applicants must submit the following documents
            </p>
        </div>

        <!-- Requirements Cards Grid -->
        <div class="max-w-5xl mx-auto">
            
            <!-- School Credentials Card - Featured -->
            <div class="mb-6 animate-slideUp" style="animation-delay: 0.1s;">
                <div class="glass-card rounded-2xl overflow-hidden border-l-4 border-[#F9B233]">
                    <div class="p-6 md:p-8">
                        <div class="flex items-start gap-4">
                            <div class="flex-shrink-0 w-12 h-12 bg-[#F9B233] rounded-xl flex items-center justify-center text-[#087A29] font-bold text-xl shadow-lg">
                                1
                            </div>
                            <div class="flex-1">
                                <h3 class="text-xl md:text-2xl font-bold text-white mb-4">
                                    Original School Credentials
                                    <span class="block text-sm font-normal text-white/60 mt-1">Whichever is applicable</span>
                                </h3>
                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                                    <div class="flex items-center gap-3 bg-white/5 rounded-lg p-3 hover:bg-white/10 transition-colors">
                                        <div class="w-8 h-8 bg-green-500/20 rounded-lg flex items-center justify-center">
                                            <svg class="w-5 h-5 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                            </svg>
                                        </div>
                                        <span class="text-white/90">High School Report Card</span>
                                    </div>
                                    <div class="flex items-center gap-3 bg-white/5 rounded-lg p-3 hover:bg-white/10 transition-colors">
                                        <div class="w-8 h-8 bg-green-500/20 rounded-lg flex items-center justify-center">
                                            <svg class="w-5 h-5 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                            </svg>
                                        </div>
                                        <span class="text-white/90">Form 137-A</span>
                                    </div>
                                    <div class="flex items-center gap-3 bg-white/5 rounded-lg p-3 hover:bg-white/10 transition-colors">
                                        <div class="w-8 h-8 bg-green-500/20 rounded-lg flex items-center justify-center">
                                            <svg class="w-5 h-5 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                            </svg>
                                        </div>
                                        <span class="text-white/90">PEPT Certificate</span>
                                    </div>
                                    <div class="flex items-center gap-3 bg-white/5 rounded-lg p-3 hover:bg-white/10 transition-colors">
                                        <div class="w-8 h-8 bg-green-500/20 rounded-lg flex items-center justify-center">
                                            <svg class="w-5 h-5 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                            </svg>
                                        </div>
                                        <span class="text-white/90">Transcript of Records</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Standard Requirements Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                
                <!-- Requirement 2 -->
                <div class="animate-slideUp" style="animation-delay: 0.2s;">
                    <div class="glass-card rounded-xl p-5 h-full hover:bg-white/10 transition-all duration-300 group">
                        <div class="flex items-start gap-4">
                            <div class="flex-shrink-0 w-10 h-10 bg-[#F9B233]/20 rounded-lg flex items-center justify-center text-[#F9B233] font-bold group-hover:bg-[#F9B233] group-hover:text-[#087A29] transition-colors">
                                2
                            </div>
                            <div>
                                <h4 class="text-white font-semibold mb-1">Certificate of Employment</h4>
                                <p class="text-white/60 text-sm">With job description from present and past employers</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Requirement 3 -->
                <div class="animate-slideUp" style="animation-delay: 0.25s;">
                    <div class="glass-card rounded-xl p-5 h-full hover:bg-white/10 transition-all duration-300 group">
                        <div class="flex items-start gap-4">
                            <div class="flex-shrink-0 w-10 h-10 bg-[#F9B233]/20 rounded-lg flex items-center justify-center text-[#F9B233] font-bold group-hover:bg-[#F9B233] group-hover:text-[#087A29] transition-colors">
                                3
                            </div>
                            <div>
                                <h4 class="text-white font-semibold mb-1">NBI/Barangay Clearance</h4>
                                <p class="text-white/60 text-sm">Valid clearance certificate</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Requirement 4 -->
                <div class="animate-slideUp" style="animation-delay: 0.3s;">
                    <div class="glass-card rounded-xl p-5 h-full hover:bg-white/10 transition-all duration-300 group">
                        <div class="flex items-start gap-4">
                            <div class="flex-shrink-0 w-10 h-10 bg-[#F9B233]/20 rounded-lg flex items-center justify-center text-[#F9B233] font-bold group-hover:bg-[#F9B233] group-hover:text-[#087A29] transition-colors">
                                4
                            </div>
                            <div>
                                <h4 class="text-white font-semibold mb-1">Recommendation Letter</h4>
                                <p class="text-white/60 text-sm">From immediate supervisor</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Requirement 5 -->
                <div class="animate-slideUp" style="animation-delay: 0.35s;">
                    <div class="glass-card rounded-xl p-5 h-full hover:bg-white/10 transition-all duration-300 group">
                        <div class="flex items-start gap-4">
                            <div class="flex-shrink-0 w-10 h-10 bg-[#F9B233]/20 rounded-lg flex items-center justify-center text-[#F9B233] font-bold group-hover:bg-[#F9B233] group-hover:text-[#087A29] transition-colors">
                                5
                            </div>
                            <div>
                                <h4 class="text-white font-semibold mb-1">Interview Results</h4>
                                <p class="text-white/60 text-sm">Completed interview assessment</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Requirement 6 -->
                <div class="animate-slideUp" style="animation-delay: 0.4s;">
                    <div class="glass-card rounded-xl p-5 h-full hover:bg-white/10 transition-all duration-300 group">
                        <div class="flex items-start gap-4">
                            <div class="flex-shrink-0 w-10 h-10 bg-[#F9B233]/20 rounded-lg flex items-center justify-center text-[#F9B233] font-bold group-hover:bg-[#F9B233] group-hover:text-[#087A29] transition-colors">
                                6
                            </div>
                            <div>
                                <h4 class="text-white font-semibold mb-1">Personality & Work Aptitude Test</h4>
                                <p class="text-white/60 text-sm">Test results documentation</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Requirement 7 -->
                <div class="animate-slideUp" style="animation-delay: 0.45s;">
                    <div class="glass-card rounded-xl p-5 h-full hover:bg-white/10 transition-all duration-300 group">
                        <div class="flex items-start gap-4">
                            <div class="flex-shrink-0 w-10 h-10 bg-[#F9B233]/20 rounded-lg flex items-center justify-center text-[#F9B233] font-bold group-hover:bg-[#F9B233] group-hover:text-[#087A29] transition-colors">
                                7
                            </div>
                            <div>
                                <h4 class="text-white font-semibold mb-1">Certificate of Evaluation Results</h4>
                                <p class="text-white/60 text-sm">Given by the panel of assessors</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Proficiency Certificate Card - Featured -->
            <div class="animate-slideUp" style="animation-delay: 0.5s;">
                <div class="glass-card rounded-2xl overflow-hidden border-l-4 border-[#F9B233]">
                    <div class="p-6 md:p-8">
                        <div class="flex items-start gap-4">
                            <div class="flex-shrink-0 w-12 h-12 bg-[#F9B233] rounded-xl flex items-center justify-center text-[#087A29] font-bold text-xl shadow-lg">
                                8
                            </div>
                            <div class="flex-1">
                                <h3 class="text-xl md:text-2xl font-bold text-white mb-4">
                                    Proficiency Certificate
                                    <span class="block text-sm font-normal text-white/60 mt-1">From any of the following</span>
                                </h3>
                                <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">
                                    <div class="flex items-center gap-3 bg-white/5 rounded-lg p-4 hover:bg-white/10 transition-colors text-center sm:text-left">
                                        <div class="hidden sm:flex w-10 h-10 bg-[#F9B233]/20 rounded-lg items-center justify-center">
                                            <svg class="w-5 h-5 text-[#F9B233]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                                            </svg>
                                        </div>
                                        <span class="text-white/90 text-sm">Government Regulatory Board</span>
                                    </div>
                                    <div class="flex items-center gap-3 bg-white/5 rounded-lg p-4 hover:bg-white/10 transition-colors text-center sm:text-left">
                                        <div class="hidden sm:flex w-10 h-10 bg-[#F9B233]/20 rounded-lg items-center justify-center">
                                            <svg class="w-5 h-5 text-[#F9B233]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                            </svg>
                                        </div>
                                        <span class="text-white/90 text-sm">Licensed Practitioner in the Field</span>
                                    </div>
                                    <div class="flex items-center gap-3 bg-white/5 rounded-lg p-4 hover:bg-white/10 transition-colors text-center sm:text-left">
                                        <div class="hidden sm:flex w-10 h-10 bg-[#F9B233]/20 rounded-lg items-center justify-center">
                                            <svg class="w-5 h-5 text-[#F9B233]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                            </svg>
                                        </div>
                                        <span class="text-white/90 text-sm">Business Registration</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Call to Action -->
            <div class="mt-12 text-center animate-slideUp" style="animation-delay: 0.6s;">
                <div class="inline-flex flex-col sm:flex-row items-center gap-4">
                    <a href="{{ route('register') }}" 
                       class="inline-flex items-center gap-2 bg-[#F9B233] hover:bg-[#e5a42e] text-[#087A29] font-bold px-8 py-4 rounded-xl transition-all duration-300 shadow-lg hover:shadow-xl hover:-translate-y-1">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                        </svg>
                        Apply Now
                    </a>
                    <a href="" 
                       class="inline-flex items-center gap-2 bg-white/10 hover:bg-white/20 text-white font-semibold px-8 py-4 rounded-xl transition-all duration-300 border border-white/20">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        Have Questions?
                    </a>
                </div>
            </div>

        </div>
    </div>

</section>

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

    /* Custom scrollbar for the section */
    #admission-requirements::-webkit-scrollbar {
        width: 8px;
    }

    #admission-requirements::-webkit-scrollbar-track {
        background: rgba(255, 255, 255, 0.1);
    }

    #admission-requirements::-webkit-scrollbar-thumb {
        background: #F9B233;
        border-radius: 4px;
    }
</style>

@include('partials.footer')

@endsection