@extends('layouts.app')

@section('title', 'Mission & Vision')

@section('content')

<div class="relative min-h-screen overflow-hidden">

    <!-- Background Image with CLSU Green Overlay -->
    <div class="absolute inset-0 bg-cover bg-center bg-no-repeat" 
         style="background-image: url('{{ asset('inspinia/img/landing/r.jpg') }}');">
        <div class="absolute inset-0 bg-gradient-to-br from-clsu-green/90 via-clsu-green/85 to-clsu-green-dark/90"></div>
    </div>

    <!-- Content Container -->
    <div class="relative z-10 container mx-auto px-4 py-16 lg:py-24" id="mission-vision">
        
        <!-- Header Section -->
        <div class="text-center mb-12 lg:mb-16">
            <!-- CLSU Logo -->
            <div class="flex justify-center mb-6">
                <img src="{{ asset('inspinia/img/landing/clsu-logo.png') }}" 
                     alt="CLSU Logo" 
                     class="h-20 w-20 lg:h-24 lg:w-24 drop-shadow-lg"
                     onerror="this.style.display='none'">
            </div>
            
            <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold text-white uppercase tracking-wide mb-4">
                Mission & Vision
            </h1>
            
            <!-- CLSU Gold Accent Line -->
            <div class="w-24 h-1 bg-clsu-gold mx-auto rounded-full mb-4"></div>
            
            <p class="text-white/80 text-lg md:text-xl max-w-2xl mx-auto">
                The ETEEAP Program's foundation is guided by the following principles
            </p>
        </div>

        <!-- Mission & Vision Cards -->
        <div class="max-w-4xl mx-auto space-y-8">
            
            <!-- Mission Card -->
            <div class="group">
                <div class="glass-card p-6 md:p-8 lg:p-10 rounded-2xl transition-all duration-300 hover:-translate-y-1 hover:shadow-2xl">
                    <!-- Card Header with Icon -->
                    <div class="flex items-center gap-4 mb-6">
                        <div class="flex-shrink-0 w-14 h-14 bg-clsu-gold/20 rounded-xl flex items-center justify-center border border-clsu-gold/30">
                            <svg class="w-7 h-7 text-clsu-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                      d="M13 10V3L4 14h7v7l9-11h-7z"/>
                            </svg>
                        </div>
                        <div>
                            <span class="text-clsu-gold/60 text-sm font-medium uppercase tracking-wider">Our Purpose</span>
                            <h2 class="text-2xl md:text-3xl font-bold text-clsu-gold">MISSION</h2>
                        </div>
                    </div>
                    
                    <!-- Card Content -->
                    <p class="text-white/90 text-base md:text-lg leading-relaxed text-justify">
                        The Expanded Tertiary Education Equivalency and Accreditation Program (ETEEAP), 
                        as an alternative education delivery mode, shall promote access to continuing 
                        quality higher education of Filipinos through an effective system of academic 
                        equivalency and accreditation of prior learning from relevant work experiences 
                        and formal and non-formal training for the individuals' graduation from an academic
                         degree such that they become empowered, self-reliant, economically self- sufficient
                          and globally competitive.
                    </p>
                </div>
            </div>

            <!-- Vision Card -->
            <div class="group">
                <div class="glass-card p-6 md:p-8 lg:p-10 rounded-2xl transition-all duration-300 hover:-translate-y-1 hover:shadow-2xl">
                    <!-- Card Header with Icon -->
                    <div class="flex items-center gap-4 mb-6">
                        <div class="flex-shrink-0 w-14 h-14 bg-clsu-gold/20 rounded-xl flex items-center justify-center border border-clsu-gold/30">
                            <svg class="w-7 h-7 text-clsu-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                      d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                      d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                            </svg>
                        </div>
                        <div>
                            <span class="text-clsu-gold/60 text-sm font-medium uppercase tracking-wider">Our Aspiration</span>
                            <h2 class="text-2xl md:text-3xl font-bold text-clsu-gold">VISION</h2>
                        </div>
                    </div>
                    
                    <!-- Card Content -->
                    <p class="text-white/90 text-base md:text-lg leading-relaxed text-justify">
                        The Expanded Tertiary Education Equivalency and 
                        Accreditation Program (ETEEAP) would have provided 
                        access and opportunities into the formal higher education
                         system to deserving Filipinos who have had prior experiential learning.
                    </p>
                </div>
            </div>

        </div>

        <!-- CLSU Motto/Tagline (Optional) -->
        <div class="text-center mt-12 lg:mt-16">
            <p class="text-white/60 text-sm md:text-base italic">
                "Science and Education for People and Nature"
            </p>
        </div>

    </div>

</div>

<style>
    /* CLSU Brand Colors */
    :root {
        --clsu-green: #087A29;
        --clsu-green-dark: #065a1f;
        --clsu-gold: #F9B233;
        --clsu-gold-dark: #d4962b;
    }

    /* Tailwind Custom Colors (if not in config) */
    .bg-clsu-green { background-color: var(--clsu-green); }
    .bg-clsu-green-dark { background-color: var(--clsu-green-dark); }
    .bg-clsu-gold { background-color: var(--clsu-gold); }
    .text-clsu-gold { color: var(--clsu-gold); }
    .border-clsu-gold { border-color: var(--clsu-gold); }
    
    /* Gradient Overlays */
    .from-clsu-green\/90 { --tw-gradient-from: rgba(8, 122, 41, 0.9); }
    .via-clsu-green\/85 { --tw-gradient-stops: var(--tw-gradient-from), rgba(8, 122, 41, 0.85), var(--tw-gradient-to); }
    .to-clsu-green-dark\/90 { --tw-gradient-to: rgba(6, 90, 31, 0.9); }
    
    /* Opacity variants */
    .bg-clsu-gold\/20 { background-color: rgba(249, 178, 51, 0.2); }
    .border-clsu-gold\/30 { border-color: rgba(249, 178, 51, 0.3); }
    .text-clsu-gold\/60 { color: rgba(249, 178, 51, 0.6); }

    /* Glassmorphism Card */
    .glass-card {
        background: rgba(255, 255, 255, 0.08);
        backdrop-filter: blur(16px);
        -webkit-backdrop-filter: blur(16px);
        border: 1px solid rgba(255, 255, 255, 0.15);
        box-shadow: 
            0 8px 32px rgba(0, 0, 0, 0.12),
            inset 0 1px 0 rgba(255, 255, 255, 0.1);
    }

    .glass-card:hover {
        background: rgba(255, 255, 255, 0.12);
        border-color: rgba(249, 178, 51, 0.3);
    }

    /* Smooth scroll behavior */
    html {
        scroll-behavior: smooth;
    }

    /* Animation for page load */
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    #mission-vision > * {
        animation: fadeInUp 0.6s ease-out forwards;
    }

    #mission-vision > *:nth-child(1) { animation-delay: 0.1s; }
    #mission-vision > *:nth-child(2) { animation-delay: 0.2s; }
    #mission-vision > *:nth-child(3) { animation-delay: 0.4s; }
</style>

@include('partials.footer')

@endsection