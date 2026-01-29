@extends('layouts.app')

@section('title', 'ETEEAP - Home')

@section('content')

{{-- Google Fonts --}}
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700;800&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

{{-- ===== HERO SECTION ===== --}}
<section class="relative min-h-screen overflow-hidden">
    @php
        $sliders = $sliders ?? collect();
    @endphp

    @if($sliders->count() > 0)
        <div id="heroCarousel" class="relative h-screen">
            {{-- Carousel Indicators --}}
            <div class="absolute bottom-24 left-1/2 -translate-x-1/2 z-20 flex gap-3">
                @foreach ($sliders as $index => $slider)
                    <button onclick="goToSlide({{ $index }})" 
                            class="carousel-dot w-3 h-3 rounded-full transition-all duration-300 {{ $index === 0 ? 'bg-clsu-gold scale-125' : 'bg-white/40' }}"
                            data-index="{{ $index }}"></button>
                @endforeach
            </div>

            {{-- Carousel Slides --}}
            <div class="carousel-inner h-full">
                @foreach($sliders as $index => $slider)
                    <div class="carousel-slide absolute inset-0 transition-opacity duration-1000 {{ $index === 0 ? 'opacity-100 z-10' : 'opacity-0 z-0' }}" 
                         data-index="{{ $index }}">
                        {{-- Background Image --}}
                        <div class="absolute inset-0 bg-cover bg-center" 
                             style="background-image: url('{{ asset($slider->image_path) }}');"></div>
                        
                        {{-- Gradient Overlay --}}
                        <div class="absolute inset-0 bg-gradient-to-br from-clsu-green/90 via-clsu-green-dark/80 to-black/60"></div>
                        
                        {{-- Content --}}
                        <div class="relative z-10 h-full flex flex-col justify-center items-center text-center px-4 sm:px-6 lg:px-8 pt-20 pb-16">
                            {{-- Badge --}}
                            <div class="inline-flex items-center gap-2 bg-white/10 backdrop-blur-md border border-white/20 px-6 py-2.5 rounded-full mb-6 animate-fade-in-down">
                                <span class="w-2 h-2 bg-clsu-gold rounded-full animate-pulse"></span>
                                <span class="text-clsu-gold text-xs sm:text-sm font-semibold uppercase tracking-widest">Now Accepting Applications</span>
                            </div>
                            
                            {{-- Title --}}
                            <h1 class="text-4xl sm:text-5xl md:text-6xl lg:text-7xl xl:text-8xl font-bold text-white mb-4 animate-fade-in-up" style="font-family: 'Playfair Display', serif;">
                                {{ $slider->title ?? 'CLSU ETEEAP' }}<br>
                                <span class="bg-gradient-to-r from-clsu-gold to-yellow-300 bg-clip-text text-transparent">Experience</span>
                            </h1>
                            
                            {{-- Subtitle --}}
                            <p class="text-white/90 text-base sm:text-lg md:text-xl max-w-2xl mx-auto mb-8 leading-relaxed animate-fade-in-up animation-delay-200">
                                Turn your years of professional experience into a recognized college degree through the Expanded Tertiary Education Equivalency and Accreditation Program at CLSU.
                            </p>
                            
                            {{-- CTA Buttons --}}
                            <div class="flex flex-col sm:flex-row gap-4 w-full sm:w-auto animate-fade-in-up animation-delay-400">
                                @guest
                                    <a href="{{ route('login') }}" 
                                       class="group inline-flex items-center justify-center gap-3 px-8 py-4 bg-gradient-to-r from-clsu-gold to-yellow-400 text-clsu-green-dark font-bold uppercase tracking-wide rounded-full shadow-lg shadow-clsu-gold/40 hover:shadow-xl hover:shadow-clsu-gold/50 hover:-translate-y-1 transition-all duration-300">
                                        <i class="fa fa-rocket"></i>
                                        Start Your Journey
                                        <i class="fa fa-arrow-right group-hover:translate-x-1 transition-transform"></i>
                                    </a>
                                    <a href="#features" 
                                       class="inline-flex items-center justify-center gap-3 px-8 py-4 bg-white/10 backdrop-blur-sm text-white font-semibold border border-white/20 rounded-full hover:bg-white/20 hover:border-clsu-gold hover:text-clsu-gold transition-all duration-300">
                                        <i class="fa fa-info-circle"></i>
                                        Learn More
                                    </a>
                                @else
                                    <a href="{{ route('information') }}" 
                                       class="group inline-flex items-center justify-center gap-3 px-8 py-4 bg-gradient-to-r from-clsu-gold to-yellow-400 text-clsu-green-dark font-bold uppercase tracking-wide rounded-full shadow-lg shadow-clsu-gold/40 hover:shadow-xl hover:shadow-clsu-gold/50 hover:-translate-y-1 transition-all duration-300">
                                        <i class="fa fa-check-circle"></i>
                                        Continue Application
                                        <i class="fa fa-arrow-right group-hover:translate-x-1 transition-transform"></i>
                                    </a>
                                @endguest
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- Carousel Controls --}}
            <button onclick="prevSlide()" 
                    class="absolute left-4 lg:left-8 top-1/2 -translate-y-1/2 z-20 w-12 h-12 lg:w-14 lg:h-14 bg-white/10 backdrop-blur-md border border-white/20 rounded-full flex items-center justify-center text-white hover:bg-clsu-gold hover:text-clsu-green-dark transition-all duration-300 hidden md:flex">
                <i class="fa fa-chevron-left"></i>
            </button>
            <button onclick="nextSlide()" 
                    class="absolute right-4 lg:right-8 top-1/2 -translate-y-1/2 z-20 w-12 h-12 lg:w-14 lg:h-14 bg-white/10 backdrop-blur-md border border-white/20 rounded-full flex items-center justify-center text-white hover:bg-clsu-gold hover:text-clsu-green-dark transition-all duration-300 hidden md:flex">
                <i class="fa fa-chevron-right"></i>
            </button>
        </div>
    @else
        {{-- Fallback Hero --}}
        <div class="relative h-screen bg-gradient-to-br from-clsu-green via-clsu-green-dark to-green-900">
            <div class="absolute inset-0 opacity-10" style="background-image: url('data:image/svg+xml,%3Csvg width=60 height=60 viewBox=%220 0 60 60%22 xmlns=%22http://www.w3.org/2000/svg%22%3E%3Cg fill=%22none%22 fill-rule=%22evenodd%22%3E%3Cg fill=%22%23ffffff%22%3E%3Cpath d=%22M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z%22/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>
            
            <div class="relative z-10 h-full flex flex-col justify-center items-center text-center px-4 pt-20 pb-16">
                <div class="inline-flex items-center gap-2 bg-white/10 backdrop-blur-md border border-white/20 px-6 py-2.5 rounded-full mb-6">
                    <span class="w-2 h-2 bg-clsu-gold rounded-full animate-pulse"></span>
                    <span class="text-clsu-gold text-sm font-semibold uppercase tracking-widest">Now Accepting Applications</span>
                </div>
                
                <h1 class="text-4xl sm:text-5xl md:text-6xl lg:text-7xl font-bold text-white mb-4" style="font-family: 'Playfair Display', serif;">
                    Transform Your<br>
                    <span class="bg-gradient-to-r from-clsu-gold to-yellow-300 bg-clip-text text-transparent">Experience</span>
                </h1>
                
                <p class="text-white/90 text-lg md:text-xl max-w-2xl mx-auto mb-8 leading-relaxed">
                    Turn your years of professional experience into a recognized college degree through the Expanded Tertiary Education Equivalency and Accreditation Program at CLSU.
                </p>
                
                <div class="flex flex-col sm:flex-row gap-4">
                    @guest
                        <a href="{{ route('login') }}" 
                           class="group inline-flex items-center justify-center gap-3 px-8 py-4 bg-gradient-to-r from-clsu-gold to-yellow-400 text-clsu-green-dark font-bold uppercase tracking-wide rounded-full shadow-lg shadow-clsu-gold/40 hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                            <i class="fa fa-rocket"></i>
                            Start Your Journey
                            <i class="fa fa-arrow-right group-hover:translate-x-1 transition-transform"></i>
                        </a>
                    @else
                        <a href="{{ route('information') }}" 
                           class="group inline-flex items-center justify-center gap-3 px-8 py-4 bg-gradient-to-r from-clsu-gold to-yellow-400 text-clsu-green-dark font-bold uppercase tracking-wide rounded-full shadow-lg shadow-clsu-gold/40 hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                            <i class="fa fa-check-circle"></i>
                            Continue Application
                            <i class="fa fa-arrow-right group-hover:translate-x-1 transition-transform"></i>
                        </a>
                    @endguest
                </div>
            </div>
        </div>
    @endif

    {{-- Scroll Indicator --}}
    <div class="absolute bottom-8 left-1/2 -translate-x-1/2 z-20 animate-bounce hidden md:flex flex-col items-center">
        <a href="#stats" class="text-white/70 hover:text-white transition-colors flex flex-col items-center gap-2">
            <div class="w-6 h-10 border-2 border-white/50 rounded-full relative">
                <div class="absolute top-2 left-1/2 -translate-x-1/2 w-1 h-2 bg-clsu-gold rounded-full animate-scroll-wheel"></div>
            </div>
            <span class="text-xs uppercase tracking-widest">Scroll</span>
        </a>
    </div>
</section>

{{-- ===== STATS SECTION ===== --}}
<section class="relative z-20 -mt-16 sm:-mt-20 px-4 sm:px-6 lg:px-8 pb-16" id="stats">
    <div class="max-w-6xl mx-auto">
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6">
            {{-- Stat Card 1 --}}
            <div class="group bg-white rounded-2xl p-6 sm:p-8 shadow-xl hover:shadow-2xl hover:-translate-y-2 transition-all duration-300 relative overflow-hidden">
                <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-clsu-green to-clsu-green-dark"></div>
                <div class="w-14 h-14 sm:w-16 sm:h-16 bg-gradient-to-br from-clsu-green/10 to-clsu-gold/10 rounded-xl flex items-center justify-center mx-auto mb-4">
                    <i class="fa fa-graduation-cap text-2xl sm:text-3xl text-clsu-green"></i>
                </div>
                <div class="text-3xl sm:text-4xl lg:text-5xl font-bold text-clsu-green text-center mb-2" style="font-family: 'Playfair Display', serif;">500+</div>
                <div class="text-xs sm:text-sm text-gray-500 uppercase tracking-wider text-center">Graduates</div>
            </div>
            
            {{-- Stat Card 2 --}}
            <div class="group bg-white rounded-2xl p-6 sm:p-8 shadow-xl hover:shadow-2xl hover:-translate-y-2 transition-all duration-300 relative overflow-hidden">
                <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-clsu-green to-clsu-green-dark"></div>
                <div class="w-14 h-14 sm:w-16 sm:h-16 bg-gradient-to-br from-clsu-green/10 to-clsu-gold/10 rounded-xl flex items-center justify-center mx-auto mb-4">
                    <i class="fa fa-briefcase text-2xl sm:text-3xl text-clsu-green"></i>
                </div>
                <div class="text-3xl sm:text-4xl lg:text-5xl font-bold text-clsu-green text-center mb-2" style="font-family: 'Playfair Display', serif;">15+</div>
                <div class="text-xs sm:text-sm text-gray-500 uppercase tracking-wider text-center">Programs</div>
            </div>
            
            {{-- Stat Card 3 --}}
            <div class="group bg-white rounded-2xl p-6 sm:p-8 shadow-xl hover:shadow-2xl hover:-translate-y-2 transition-all duration-300 relative overflow-hidden">
                <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-clsu-green to-clsu-green-dark"></div>
                <div class="w-14 h-14 sm:w-16 sm:h-16 bg-gradient-to-br from-clsu-green/10 to-clsu-gold/10 rounded-xl flex items-center justify-center mx-auto mb-4">
                    <i class="fa fa-users text-2xl sm:text-3xl text-clsu-green"></i>
                </div>
                <div class="text-3xl sm:text-4xl lg:text-5xl font-bold text-clsu-green text-center mb-2" style="font-family: 'Playfair Display', serif;">50+</div>
                <div class="text-xs sm:text-sm text-gray-500 uppercase tracking-wider text-center">Partners</div>
            </div>
            
            {{-- Stat Card 4 --}}
            <div class="group bg-white rounded-2xl p-6 sm:p-8 shadow-xl hover:shadow-2xl hover:-translate-y-2 transition-all duration-300 relative overflow-hidden">
                <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-clsu-green to-clsu-green-dark"></div>
                <div class="w-14 h-14 sm:w-16 sm:h-16 bg-gradient-to-br from-clsu-green/10 to-clsu-gold/10 rounded-xl flex items-center justify-center mx-auto mb-4">
                    <i class="fa fa-trophy text-2xl sm:text-3xl text-clsu-green"></i>
                </div>
                <div class="text-3xl sm:text-4xl lg:text-5xl font-bold text-clsu-green text-center mb-2" style="font-family: 'Playfair Display', serif;">98%</div>
                <div class="text-xs sm:text-sm text-gray-500 uppercase tracking-wider text-center">Success Rate</div>
            </div>
        </div>
    </div>
</section>

{{-- ===== WHY ETEEAP SECTION ===== --}}
<section class="py-20 lg:py-28 bg-gradient-to-b from-gray-50 to-white" id="features">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        {{-- Section Header --}}
        <div class="text-center mb-16">
            <div class="inline-flex items-center gap-2 text-clsu-gold text-sm font-semibold uppercase tracking-widest mb-4">
                <i class="fa fa-star"></i>
                Why Choose ETEEAP
            </div>
            <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-gray-900 mb-4" style="font-family: 'Playfair Display', serif;">
                Your Path to a Degree
            </h2>
            <p class="text-gray-600 text-lg max-w-2xl mx-auto">
                Flexible, accessible, and designed for working professionals
            </p>
        </div>

        {{-- Features Grid --}}
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            {{-- Feature 1 --}}
            <div class="group bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl hover:-translate-y-2 transition-all duration-300 relative overflow-hidden">
                <div class="absolute bottom-0 left-0 right-0 h-1 bg-gradient-to-r from-clsu-gold to-yellow-400 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left"></div>
                <div class="w-16 h-16 bg-gradient-to-br from-clsu-green to-clsu-green-dark rounded-2xl flex items-center justify-center mb-6 shadow-lg shadow-clsu-green/30">
                    <i class="fa fa-clock text-2xl text-white"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3" style="font-family: 'Playfair Display', serif;">Flexible Schedule</h3>
                <p class="text-gray-600 leading-relaxed">
                    Continue working while earning your degree. Our program is designed to fit around your professional commitments and personal life.
                </p>
            </div>
            
            {{-- Feature 2 --}}
            <div class="group bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl hover:-translate-y-2 transition-all duration-300 relative overflow-hidden">
                <div class="absolute bottom-0 left-0 right-0 h-1 bg-gradient-to-r from-clsu-gold to-yellow-400 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left"></div>
                <div class="w-16 h-16 bg-gradient-to-br from-clsu-green to-clsu-green-dark rounded-2xl flex items-center justify-center mb-6 shadow-lg shadow-clsu-green/30">
                    <i class="fa fa-award text-2xl text-white"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3" style="font-family: 'Playfair Display', serif;">Credit Your Experience</h3>
                <p class="text-gray-600 leading-relaxed">
                    Your years of work experience count! We assess and accredit your prior learning and professional achievements toward your degree.
                </p>
            </div>
            
            {{-- Feature 3 --}}
            <div class="group bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl hover:-translate-y-2 transition-all duration-300 relative overflow-hidden md:col-span-2 lg:col-span-1">
                <div class="absolute bottom-0 left-0 right-0 h-1 bg-gradient-to-r from-clsu-gold to-yellow-400 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left"></div>
                <div class="w-16 h-16 bg-gradient-to-br from-clsu-green to-clsu-green-dark rounded-2xl flex items-center justify-center mb-6 shadow-lg shadow-clsu-green/30">
                    <i class="fa fa-money-bill-wave text-2xl text-white"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3" style="font-family: 'Playfair Display', serif;">Affordable Education</h3>
                <p class="text-gray-600 leading-relaxed">
                    Quality education at state university rates. Various payment options and scholarship opportunities are available for qualified applicants.
                </p>
            </div>
        </div>
    </div>
</section>

{{-- ===== CTA SECTION ===== --}}
<section class="py-20 lg:py-28 bg-white relative overflow-hidden">
    {{-- Decorative Elements --}}
    <div class="absolute -top-40 -right-40 w-80 h-80 bg-clsu-green/5 rounded-full blur-3xl"></div>
    <div class="absolute -bottom-40 -left-40 w-96 h-96 bg-clsu-gold/10 rounded-full blur-3xl"></div>
    
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center mb-12">
            {{-- Eyebrow --}}
            <div class="inline-flex items-center gap-3 mb-6">
                <div class="w-10 h-0.5 bg-gradient-to-r from-clsu-gold to-yellow-400"></div>
                <span class="text-clsu-green text-sm font-semibold uppercase tracking-widest">Start Today</span>
                <div class="w-10 h-0.5 bg-gradient-to-l from-clsu-gold to-yellow-400"></div>
            </div>
            
            <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-gray-900 mb-6" style="font-family: 'Playfair Display', serif;">
                Ready to <span class="text-clsu-green">Transform</span> Your Career?
            </h2>
            
            <p class="text-gray-600 text-lg max-w-2xl mx-auto">
                Take the first step toward earning your college degree. Join hundreds of successful professionals who have upgraded their credentials through CLSU's ETEEAP program.
            </p>
        </div>
        
        {{-- CTA Box --}}
        <div class="bg-gradient-to-br from-clsu-green via-clsu-green to-clsu-green-dark rounded-3xl p-8 sm:p-12 relative overflow-hidden shadow-2xl">
            {{-- Decorative --}}
            <div class="absolute -top-20 -right-20 w-60 h-60 bg-clsu-gold/20 rounded-full blur-2xl"></div>
            <div class="absolute -bottom-10 -left-10 w-40 h-40 bg-white/10 rounded-full blur-xl"></div>
            
            <div class="relative z-10 text-center">
                <h3 class="text-2xl sm:text-3xl font-bold text-white mb-4" style="font-family: 'Playfair Display', serif;">
                    Begin Your Application Now
                </h3>
                <p class="text-white/90 text-lg mb-8 max-w-lg mx-auto">
                    Our online application process is simple and straightforward. Complete your application in just a few steps.
                </p>
                
                @guest
                    <a href="{{ route('login') }}" 
                       class="inline-flex items-center gap-3 px-10 py-4 bg-white text-clsu-green font-bold uppercase tracking-wide rounded-full shadow-lg hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                        <i class="fa fa-paper-plane"></i>
                        Apply Now
                    </a>
                @else
                    <a href="{{ route('information') }}" 
                       class="inline-flex items-center gap-3 px-10 py-4 bg-white text-clsu-green font-bold uppercase tracking-wide rounded-full shadow-lg hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                        <i class="fa fa-arrow-right"></i>
                        Continue Application
                    </a>
                @endguest
            </div>
        </div>
    </div>
</section>

{{-- ===== ANNOUNCEMENTS SECTION ===== --}}
<section class="py-20 lg:py-28 bg-gray-50" id="announcements">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        {{-- Section Header --}}
        <div class="text-center mb-16">
            <div class="inline-flex items-center gap-2 text-clsu-gold text-sm font-semibold uppercase tracking-widest mb-4">
                <i class="fa fa-bullhorn"></i>
                Stay Updated
            </div>
            <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-gray-900 mb-4" style="font-family: 'Playfair Display', serif;">
                Latest Announcements
            </h2>
            <p class="text-gray-600 text-lg">
                Important news and updates from CLSU ETEEAP
            </p>
        </div>

        {{-- Announcements Slider --}}
        <div class="relative">
            @if($posts->count())
                @foreach($posts as $index => $post)
                    <div class="announcement-card bg-white rounded-3xl p-8 sm:p-10 shadow-xl border border-clsu-green/10 relative overflow-hidden {{ $index === 0 ? 'block' : 'hidden' }}" 
                         data-index="{{ $index }}">
                        {{-- Left Border Accent --}}
                        <div class="absolute top-0 left-0 w-1.5 h-full bg-gradient-to-b from-clsu-green to-clsu-green-dark rounded-l-3xl"></div>
                        
                        {{-- Meta --}}
                        <div class="flex flex-wrap items-center gap-3 mb-6">
                            <span class="inline-flex items-center gap-2 bg-gradient-to-r from-clsu-green/10 to-clsu-gold/10 text-clsu-green text-xs font-semibold uppercase tracking-wider px-4 py-2 rounded-full">
                                <i class="fa fa-megaphone"></i>
                                Announcement
                            </span>
                            <span class="text-gray-400 text-sm flex items-center gap-2">
                                <i class="fa fa-calendar-alt"></i>
                                {{ $post->created_at ? $post->created_at->format('M d, Y') : 'Recent' }}
                            </span>
                        </div>
                        
                        {{-- Title --}}
                        <h3 class="text-xl sm:text-2xl font-bold text-gray-900 mb-4" style="font-family: 'Playfair Display', serif;">
                            {{ $post->title }}
                        </h3>
                        
                        {{-- Content --}}
                        <div class="text-gray-600 leading-relaxed prose prose-sm max-w-none">
                            {!! $post->description !!}
                        </div>
                    </div>
                @endforeach

                {{-- Slider Controls --}}
                <div class="flex justify-center items-center gap-6 mt-10">
                    <button onclick="prevAnnouncement()" 
                            class="w-14 h-14 rounded-full border-2 border-clsu-green text-clsu-green hover:bg-clsu-green hover:text-white transition-all duration-300 flex items-center justify-center">
                        <i class="fa fa-chevron-left"></i>
                    </button>
                    
                    <div class="flex gap-2">
                        @foreach($posts as $index => $post)
                            <button onclick="goToAnnouncement({{ $index }})" 
                                    class="announcement-dot w-3 h-3 rounded-full transition-all duration-300 {{ $index === 0 ? 'bg-clsu-green scale-125' : 'bg-gray-300' }}"
                                    data-index="{{ $index }}"></button>
                        @endforeach
                    </div>
                    
                    <button onclick="nextAnnouncement()" 
                            class="w-14 h-14 rounded-full border-2 border-clsu-green text-clsu-green hover:bg-clsu-green hover:text-white transition-all duration-300 flex items-center justify-center">
                        <i class="fa fa-chevron-right"></i>
                    </button>
                </div>
            @else
                {{-- No Announcements --}}
                <div class="text-center py-16 bg-white rounded-3xl shadow-lg">
                    <i class="fa fa-inbox text-5xl text-gray-300 mb-4"></i>
                    <p class="text-gray-500 text-lg">No announcements at this time. Check back soon!</p>
                </div>
            @endif
        </div>
    </div>
</section>

{{-- ===== CUSTOM STYLES ===== --}}
<style>
    /* Animations */
    @keyframes fade-in-down {
        from { opacity: 0; transform: translateY(-20px); }
        to { opacity: 1; transform: translateY(0); }
    }
    
    @keyframes fade-in-up {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }
    
    @keyframes scroll-wheel {
        0% { opacity: 1; top: 0.5rem; }
        100% { opacity: 0; top: 1.25rem; }
    }
    
    .animate-fade-in-down { animation: fade-in-down 0.8s ease-out forwards; }
    .animate-fade-in-up { animation: fade-in-up 0.8s ease-out forwards; }
    .animate-scroll-wheel { animation: scroll-wheel 2s infinite; }
    
    .animation-delay-200 { animation-delay: 0.2s; opacity: 0; }
    .animation-delay-400 { animation-delay: 0.4s; opacity: 0; }
    
    /* Prose styling for announcement content */
    .prose img {
        max-width: 100%;
        height: auto;
        border-radius: 12px;
        margin: 1rem 0;
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.1);
    }
</style>

{{-- ===== SCRIPTS ===== --}}
<script>
    // Hero Carousel
    let currentSlide = 0;
    const slides = document.querySelectorAll('.carousel-slide');
    const dots = document.querySelectorAll('.carousel-dot');
    const totalSlides = slides.length;
    let slideInterval;

    function showSlide(index) {
        if (totalSlides === 0) return;
        
        currentSlide = (index + totalSlides) % totalSlides;
        
        slides.forEach((slide, i) => {
            slide.classList.toggle('opacity-100', i === currentSlide);
            slide.classList.toggle('z-10', i === currentSlide);
            slide.classList.toggle('opacity-0', i !== currentSlide);
            slide.classList.toggle('z-0', i !== currentSlide);
        });
        
        dots.forEach((dot, i) => {
            dot.classList.toggle('bg-clsu-gold', i === currentSlide);
            dot.classList.toggle('scale-125', i === currentSlide);
            dot.classList.toggle('bg-white/40', i !== currentSlide);
        });
    }

    function nextSlide() {
        showSlide(currentSlide + 1);
        resetInterval();
    }

    function prevSlide() {
        showSlide(currentSlide - 1);
        resetInterval();
    }

    function goToSlide(index) {
        showSlide(index);
        resetInterval();
    }

    function resetInterval() {
        clearInterval(slideInterval);
        slideInterval = setInterval(nextSlide, 6000);
    }

    if (totalSlides > 1) {
        slideInterval = setInterval(nextSlide, 6000);
    }

    // Announcements Slider
    let currentAnnouncement = 0;
    const announcements = document.querySelectorAll('.announcement-card');
    const announcementDots = document.querySelectorAll('.announcement-dot');
    const totalAnnouncements = announcements.length;
    let announcementInterval;

    function showAnnouncement(index) {
        if (totalAnnouncements === 0) return;
        
        currentAnnouncement = (index + totalAnnouncements) % totalAnnouncements;
        
        announcements.forEach((card, i) => {
            card.classList.toggle('block', i === currentAnnouncement);
            card.classList.toggle('hidden', i !== currentAnnouncement);
        });
        
        announcementDots.forEach((dot, i) => {
            dot.classList.toggle('bg-clsu-green', i === currentAnnouncement);
            dot.classList.toggle('scale-125', i === currentAnnouncement);
            dot.classList.toggle('bg-gray-300', i !== currentAnnouncement);
        });
    }

    function nextAnnouncement() {
        showAnnouncement(currentAnnouncement + 1);
        resetAnnouncementInterval();
    }

    function prevAnnouncement() {
        showAnnouncement(currentAnnouncement - 1);
        resetAnnouncementInterval();
    }

    function goToAnnouncement(index) {
        showAnnouncement(index);
        resetAnnouncementInterval();
    }

    function resetAnnouncementInterval() {
        clearInterval(announcementInterval);
        announcementInterval = setInterval(nextAnnouncement, 8000);
    }

    if (totalAnnouncements > 1) {
        announcementInterval = setInterval(nextAnnouncement, 8000);
    }

    // Smooth scroll
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }
        });
    });

    // Intersection Observer for scroll animations
    const observerOptions = { threshold: 0.1, rootMargin: '0px 0px -50px 0px' };
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, observerOptions);

    document.querySelectorAll('.group').forEach(el => {
        el.style.opacity = '0';
        el.style.transform = 'translateY(30px)';
        el.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
        observer.observe(el);
    });
</script>

{{-- Success Message --}}
@if(session('success'))
    <div data-success-message="{{ session('success') }}" style="display: none;"></div>
@endif

@endsection