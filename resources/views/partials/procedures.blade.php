@extends('layouts.app')

@section('title', 'ETEEAP Application Procedures')

@section('content')

<section id="procedures" class="relative min-h-screen overflow-hidden">
    
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
                          d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"/>
                </svg>
            </div>
            
            <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold text-white uppercase tracking-wide mb-4">
                Procedures in Applying for ETEEAP
            </h1>
            
            <!-- CLSU Gold Accent Line -->
            <div class="flex items-center justify-center gap-2 mb-6">
                <div class="w-12 h-1 bg-[#F9B233]/50 rounded-full"></div>
                <div class="w-24 h-1.5 bg-[#F9B233] rounded-full"></div>
                <div class="w-12 h-1 bg-[#F9B233]/50 rounded-full"></div>
            </div>
            
            <p class="text-white/80 text-lg md:text-xl max-w-2xl mx-auto">
                Follow these steps to complete your ETEEAP application process
            </p>
        </div>

        <!-- Procedures Grid -->
        <div class="max-w-6xl mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                
                @php
                    $procedures = [
                        [
                            'title' => 'Application Form',
                            'description' => 'Secure ETEEAP application forms from the CLSU ETEEAP office or download from <a href="https://ched.gov.ph" target="_blank" class="text-[#F9B233] hover:text-[#ffcc66] underline transition-colors">ched.gov.ph</a>.',
                            'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>'
                        ],
                        [
                            'title' => 'Submit Requirements',
                            'description' => 'Submit completed forms and documents for preliminary evaluation by the ETEEAP Director.',
                            'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/>'
                        ],
                        [
                            'title' => 'Portfolio Submission',
                            'description' => 'Submit a portfolio of prior learning and work experience to the deputized HEI.',
                            'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>'
                        ],
                        [
                            'title' => 'Interview & Exams',
                            'description' => 'Attend an interview and take aptitude and psychological exams at CLSU Testing Center.',
                            'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>'
                        ],
                        [
                            'title' => 'Orientation Seminar',
                            'description' => 'Attend the seminar and submit documents for evaluation by the assessment panel.',
                            'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>'
                        ],
                        [
                            'title' => 'Skills Demonstration',
                            'description' => 'Demonstrate required skills at the worksite based on program requirements.',
                            'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/>'
                        ]
                    ];
                @endphp

                @foreach($procedures as $index => $procedure)
                <div class="animate-slideUp" style="animation-delay: {{ 0.1 + ($index * 0.1) }}s;">
                    <div class="glass-card rounded-2xl p-6 h-full border-l-4 border-[#F9B233] hover:bg-white/10 transition-all duration-300 group hover:-translate-y-2">
                        <div class="flex items-start gap-4">
                            <!-- Step Number -->
                            <div class="flex-shrink-0 w-12 h-12 bg-[#F9B233] rounded-xl flex items-center justify-center text-[#087A29] font-bold text-xl shadow-lg group-hover:scale-110 transition-transform">
                                {{ $index + 1 }}
                            </div>
                            
                            <div class="flex-1">
                                <!-- Icon -->
                                <div class="w-10 h-10 bg-[#F9B233]/20 rounded-lg flex items-center justify-center mb-3">
                                    <svg class="w-5 h-5 text-[#F9B233]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        {!! $procedure['icon'] !!}
                                    </svg>
                                </div>
                                
                                <h3 class="text-lg md:text-xl font-bold text-white mb-2">
                                    {{ $procedure['title'] }}
                                </h3>
                                <p class="text-white/70 text-sm md:text-base leading-relaxed">
                                    {!! $procedure['description'] !!}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>

            <!-- Progress Indicator -->
            <div class="mt-12 animate-slideUp" style="animation-delay: 0.7s;">
                <div class="glass-card rounded-2xl p-6 md:p-8">
                    <div class="flex flex-col md:flex-row items-center justify-between gap-6">
                        <div class="text-center md:text-left">
                            <h4 class="text-white font-bold text-lg mb-2">Ready to Start Your Journey?</h4>
                            <p class="text-white/60 text-sm">Complete all steps to earn your degree through ETEEAP</p>
                        </div>
                        <div class="flex items-center gap-4">
                            <a href="{{ route('register') }}" 
                               class="inline-flex items-center gap-2 bg-[#F9B233] hover:bg-[#e5a42e] text-[#087A29] font-bold px-6 py-3 rounded-xl transition-all duration-300 shadow-lg hover:shadow-xl hover:-translate-y-1">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                </svg>
                                Apply Now
                            </a>
                            <a href="{{ route('admission.requirements') }}" 
                               class="inline-flex items-center gap-2 bg-white/10 hover:bg-white/20 text-white font-semibold px-6 py-3 rounded-xl transition-all duration-300 border border-white/20">
                                View Requirements
                            </a>
                        </div>
                    </div>
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
</style>

@include('partials.footer')

@endsection