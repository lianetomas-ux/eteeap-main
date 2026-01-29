@extends('layouts.app')

@section('title', 'ETEEAP Qualifications')

@section('content')

<section id="qualification" class="relative min-h-screen overflow-hidden">
    
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
    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[600px] h-[600px] bg-[#087A29]/20 rounded-full blur-3xl"></div>

    <!-- Main Content -->
    <div class="relative z-10 container mx-auto px-4 py-16 lg:py-24">
        
        <!-- Header Section -->
        <div class="text-center mb-12 lg:mb-16 animate-fadeIn">
            <!-- Icon Badge -->
            <div class="inline-flex items-center justify-center w-20 h-20 bg-[#F9B233]/20 rounded-2xl border border-[#F9B233]/30 mb-6 backdrop-blur-sm">
                <svg class="w-10 h-10 text-[#F9B233]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                          d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/>
                </svg>
            </div>
            
            <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold text-white uppercase tracking-wide mb-4">
                Qualifications of an Applicant
            </h1>
            
            <!-- CLSU Gold Accent Line -->
            <div class="flex items-center justify-center gap-2 mb-6">
                <div class="w-12 h-1 bg-[#F9B233]/50 rounded-full"></div>
                <div class="w-24 h-1.5 bg-[#F9B233] rounded-full"></div>
                <div class="w-12 h-1 bg-[#F9B233]/50 rounded-full"></div>
            </div>
            
            <p class="text-white/80 text-lg md:text-xl max-w-3xl mx-auto">
                An ETEEAP applicant must be a Filipino citizen and must meet the following qualifications:
            </p>
        </div>

        <!-- Qualifications Cards -->
        <div class="max-w-5xl mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 lg:gap-8">
                
                @php
                    $qualifications = [
                        [
                            'title' => 'Educational Background',
                            'description' => 'Must be at least a high school graduate or must have passed the Philippine Education Placement Test (PEPT).',
                            'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222"/>',
                            'highlight' => 'High School Graduate or PEPT Passer'
                        ],
                        [
                            'title' => 'Work Experience',
                            'description' => 'Must have at least five (5) years of work experience related to the course being applied for.',
                            'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>',
                            'highlight' => 'Minimum 5 Years Experience'
                        ],
                        [
                            'title' => 'Age Requirement',
                            'description' => 'Must be at least 23 years old as supported by an NSO-authenticated birth certificate.',
                            'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>',
                            'highlight' => 'At Least 23 Years Old'
                        ]
                    ];
                @endphp

                @foreach($qualifications as $index => $qualification)
                <div class="animate-slideUp" style="animation-delay: {{ 0.1 + ($index * 0.15) }}s;">
                    <div class="glass-card rounded-2xl p-6 md:p-8 h-full hover:bg-white/10 transition-all duration-300 group hover:-translate-y-2 relative overflow-hidden">
                        
                        <!-- Large Step Number Background -->
                        <div class="absolute -top-4 -right-4 text-[120px] font-black text-white/5 leading-none select-none pointer-events-none">
                            {{ $index + 1 }}
                        </div>
                        
                        <div class="relative z-10">
                            <!-- Step Badge -->
                            <div class="flex items-center gap-3 mb-6">
                                <div class="w-12 h-12 bg-[#F9B233] rounded-xl flex items-center justify-center text-[#087A29] font-bold text-xl shadow-lg group-hover:scale-110 transition-transform">
                                    {{ $index + 1 }}
                                </div>
                                <div class="flex-1 h-1 bg-gradient-to-r from-[#F9B233] to-transparent rounded-full"></div>
                            </div>
                            
                            <!-- Icon -->
                            <div class="w-14 h-14 bg-[#F9B233]/20 rounded-xl flex items-center justify-center mb-4 group-hover:bg-[#F9B233]/30 transition-colors">
                                <svg class="w-7 h-7 text-[#F9B233]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    {!! $qualification['icon'] !!}
                                </svg>
                            </div>
                            
                            <!-- Title -->
                            <h3 class="text-xl md:text-2xl font-bold text-white mb-3">
                                {{ $qualification['title'] }}
                            </h3>
                            
                            <!-- Highlight Badge -->
                            <div class="inline-flex items-center gap-2 bg-[#F9B233]/20 text-[#F9B233] px-3 py-1.5 rounded-full text-sm font-semibold mb-4">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                </svg>
                                {{ $qualification['highlight'] }}
                            </div>
                            
                            <!-- Description -->
                            <p class="text-white/70 text-base leading-relaxed">
                                {{ $qualification['description'] }}
                            </p>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>

            <!-- Additional Info Box -->
            <div class="mt-12 animate-slideUp" style="animation-delay: 0.6s;">
                <div class="glass-card rounded-2xl p-6 md:p-8 border border-[#F9B233]/30">
                    <div class="flex flex-col lg:flex-row items-center gap-6">
                        <!-- Info Icon -->
                        <div class="flex-shrink-0 w-16 h-16 bg-[#F9B233]/20 rounded-2xl flex items-center justify-center">
                            <svg class="w-8 h-8 text-[#F9B233]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        
                        <div class="flex-1 text-center lg:text-left">
                            <h4 class="text-white font-bold text-lg mb-2">Important Note</h4>
                            <p class="text-white/70">
                                All applicants must be Filipino citizens and must submit authentic documents to support their qualifications. 
                                False information may result in disqualification from the program.
                            </p>
                        </div>
                        
                        <!-- Action Buttons -->
                        <div class="flex flex-col sm:flex-row items-center gap-3">
                            <a href="{{ route('register') }}" 
                               class="inline-flex items-center gap-2 bg-[#F9B233] hover:bg-[#e5a42e] text-[#087A29] font-bold px-6 py-3 rounded-xl transition-all duration-300 shadow-lg hover:shadow-xl hover:-translate-y-1">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                </svg>
                                Apply Now
                            </a>
                            <a href="{{ route('admission.requirements') }}" 
                               class="inline-flex items-center gap-2 bg-white/10 hover:bg-white/20 text-white font-semibold px-6 py-3 rounded-xl transition-all duration-300 border border-white/20">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                </svg>
                                View Requirements
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quick Checklist -->
            <div class="mt-8 animate-slideUp" style="animation-delay: 0.7s;">
                <div class="flex flex-wrap justify-center gap-4">
                    <div class="flex items-center gap-2 bg-white/5 backdrop-blur-sm rounded-full px-4 py-2 border border-white/10">
                        <svg class="w-5 h-5 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        <span class="text-white/80 text-sm">Filipino Citizen</span>
                    </div>
                    <div class="flex items-center gap-2 bg-white/5 backdrop-blur-sm rounded-full px-4 py-2 border border-white/10">
                        <svg class="w-5 h-5 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        <span class="text-white/80 text-sm">HS Graduate / PEPT</span>
                    </div>
                    <div class="flex items-center gap-2 bg-white/5 backdrop-blur-sm rounded-full px-4 py-2 border border-white/10">
                        <svg class="w-5 h-5 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        <span class="text-white/80 text-sm">5+ Years Experience</span>
                    </div>
                    <div class="flex items-center gap-2 bg-white/5 backdrop-blur-sm rounded-full px-4 py-2 border border-white/10">
                        <svg class="w-5 h-5 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        <span class="text-white/80 text-sm">23+ Years Old</span>
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