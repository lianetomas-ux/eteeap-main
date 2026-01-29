@extends('layouts.app')

@section('title', 'Courses Offered')

@section('content')

<section id="courses-offered" class="relative min-h-screen overflow-hidden">
    
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
                          d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                </svg>
            </div>
            
            <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold text-white uppercase tracking-wide mb-4">
                Courses Offered under the ETEEAP Program
            </h1>
            
            <!-- CLSU Gold Accent Line -->
            <div class="flex items-center justify-center gap-2 mb-6">
                <div class="w-12 h-1 bg-[#F9B233]/50 rounded-full"></div>
                <div class="w-24 h-1.5 bg-[#F9B233] rounded-full"></div>
                <div class="w-12 h-1 bg-[#F9B233]/50 rounded-full"></div>
            </div>
            
            <p class="text-white/80 text-lg md:text-xl max-w-3xl mx-auto">
                Accredited degree programs designed for experienced professionals and lifelong learners.
            </p>
        </div>

        <!-- Courses Content -->
        <div class="max-w-6xl mx-auto">
            <div class="glass-card rounded-3xl p-6 md:p-8 lg:p-10 animate-slideUp" style="animation-delay: 0.2s;">
                
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-12">
                    
                    @foreach($departments as $index => $department)
                    <div class="animate-slideUp" style="animation-delay: {{ 0.3 + ($index * 0.1) }}s;">
                        <div class="department-card h-full">
                            <!-- Department Header -->
                            <div class="flex items-center gap-4 mb-5">
                                <div class="w-12 h-12 bg-[#F9B233]/20 rounded-xl flex items-center justify-center flex-shrink-0">
                                    <svg class="w-6 h-6 text-[#F9B233]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="text-xl md:text-2xl font-bold text-[#F9B233]">
                                        {{ $department->name }}
                                    </h3>
                                    <div class="w-16 h-1 bg-[#F9B233]/50 rounded-full mt-2"></div>
                                </div>
                            </div>
                            
                            <!-- Courses List -->
                            <ul class="space-y-3">
                                @foreach($department->courses as $course)
                                <li class="flex items-start gap-3 group">
                                    <div class="w-6 h-6 bg-green-500/20 rounded-full flex items-center justify-center flex-shrink-0 mt-0.5 group-hover:bg-green-500/30 transition-colors">
                                        <svg class="w-4 h-4 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                        </svg>
                                    </div>
                                    <span class="text-white/90 text-base md:text-lg group-hover:text-white transition-colors">
                                        {{ $course->course_name }} 
                                        <span class="text-white/50 text-sm">({{ $course->course_code }})</span>
                                    </span>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    @endforeach

                </div>

            </div>

            <!-- Call to Action -->
            <div class="mt-12 text-center animate-slideUp" style="animation-delay: 0.6s;">
                <div class="glass-card rounded-2xl p-6 md:p-8 inline-block">
                    <div class="flex flex-col sm:flex-row items-center gap-6">
                        <div class="text-center sm:text-left">
                            <h4 class="text-white font-bold text-lg mb-1">Ready to Pursue Your Degree?</h4>
                            <p class="text-white/60 text-sm">Check if you qualify and start your application today.</p>
                        </div>
                        <div class="flex items-center gap-3">
                            <a href="{{ route('register') }}" 
                               class="inline-flex items-center gap-2 bg-[#F9B233] hover:bg-[#e5a42e] text-[#087A29] font-bold px-6 py-3 rounded-xl transition-all duration-300 shadow-lg hover:shadow-xl hover:-translate-y-1">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                </svg>
                                Apply Now
                            </a>
                            <a href="{{ route('qualification') }}" 
                               class="inline-flex items-center gap-2 bg-white/10 hover:bg-white/20 text-white font-semibold px-6 py-3 rounded-xl transition-all duration-300 border border-white/20">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/>
                                </svg>
                                View Qualifications
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

    /* Department Card */
    .department-card {
        padding: 1.5rem;
        background: rgba(255, 255, 255, 0.05);
        border-radius: 1rem;
        border: 1px solid rgba(255, 255, 255, 0.08);
        transition: all 0.3s ease;
    }

    .department-card:hover {
        background: rgba(255, 255, 255, 0.08);
        transform: translateY(-2px);
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