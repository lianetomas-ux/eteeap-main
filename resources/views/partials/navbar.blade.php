<style>
    /* Official CLSU Header Styles */
    .clsu-header-top {
        background: linear-gradient(180deg, #ffffff 0%, #f8faf8 100%);
        border-bottom: 1px solid rgba(8, 122, 41, 0.1);
    }
    
    .clsu-nav-bar {
        background: linear-gradient(135deg, #087A29 0%, #065a1f 50%, #087A29 100%);
        position: relative;
    }
    
    .clsu-nav-bar::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, #065a1f 0%, #F9B233 25%, #ffc107 50%, #F9B233 75%, #065a1f 100%);
        background-size: 200% 100%;
        animation: shimmer 4s ease-in-out infinite;
    }
    
    @keyframes shimmer {
        0%, 100% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
    }
    
    .nav-link-official {
        color: white;
        font-weight: 600;
        font-size: 14px;
        letter-spacing: 0.02em;
        padding: 14px 18px;
        transition: all 0.3s ease;
        position: relative;
    }
    
    .nav-link-official::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
        width: 0;
        height: 3px;
        background: #F9B233;
        transition: width 0.3s ease;
    }
    
    .nav-link-official:hover::after,
    .nav-link-official.active::after {
        width: 80%;
    }
    
    .nav-link-official:hover {
        background: rgba(255, 255, 255, 0.1);
        color: #F9B233;
    }
    
    .nav-link-official.active {
        background: rgba(255, 255, 255, 0.15);
        color: #F9B233;
    }
    
    .nav-divider {
        width: 1px;
        height: 24px;
        background: linear-gradient(180deg, transparent, rgba(255,255,255,0.3), transparent);
    }
    
    .user-dropdown-btn {
        transition: all 0.3s ease;
    }
    
    .user-dropdown-btn:hover {
        background: rgba(255, 255, 255, 0.15);
        transform: translateY(-1px);
    }
    
    /* Mobile menu overlay */
    .mobile-menu-overlay {
        background: rgba(0, 0, 0, 0.6);
        backdrop-filter: blur(4px);
    }
    
    .mobile-menu-panel {
        box-shadow: -10px 0 40px rgba(0,0,0,0.3);
    }
</style>

<!-- Official CLSU Style Header -->
<header class="sticky top-0 z-50 shadow-lg" id="mainNavbar">
    <!-- Top Section: Logo and University Name -->
    <div class="clsu-header-top">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between py-3 lg:py-4">
                <!-- Mobile Menu Button (Left side on mobile) -->
                <button type="button" 
                        class="lg:hidden inline-flex items-center justify-center p-2.5 rounded-xl text-[#087A29] bg-[#087A29]/10 hover:bg-[#087A29] hover:text-white transition-all duration-300 border border-[#087A29]/20 order-first"
                        onclick="toggleMobileMenu()">
                    <svg class="h-6 w-6" id="menuIconOpen" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                    <svg class="h-6 w-6 hidden" id="menuIconClose" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
                
                <!-- Logo and University Info -->
                <a href="{{ route('home') }}" class="flex items-center gap-3 lg:gap-4 group flex-1 lg:flex-none justify-center lg:justify-start">
                    <div class="relative">
                        <img src="{{ asset('images/cl.png') }}" 
                             alt="CLSU Logo" 
                             class="h-14 w-14 lg:h-16 lg:w-16 object-contain transition-transform duration-300 group-hover:scale-105 drop-shadow-md">
                    </div>
                    <div class="hidden sm:block">
                        <h1 class="text-lg md:text-xl lg:text-2xl font-bold text-[#087A29] tracking-wide" style="font-family: 'Times New Roman', Georgia, serif;">
                            CENTRAL LUZON STATE UNIVERSITY
                        </h1>
                        <p class="text-[#065a1f] text-xs md:text-sm font-medium">Science City of Muñoz, Nueva Ecija, Philippines</p>
                    </div>
                </a>
                
                <!-- ETEEAP Logo & Badge (right side) -->
                <div class="hidden lg:flex items-center gap-4">
                    <div class="flex items-center gap-3 px-4 py-2 bg-gradient-to-r from-[#087A29]/10 to-[#065a1f]/5 rounded-xl border border-[#087A29]/20">
                        <img src="{{ asset('images/eteeap.png') }}" 
                             alt="ETEEAP Logo" 
                             class="h-10 w-auto object-contain">
                        <div class="border-l border-[#087A29]/20 pl-3">
                            <p class="text-[#087A29] font-bold text-sm">ETEEAP</p>
                            <p class="text-[#065a1f]/70 text-xs">Application Portal</p>
                        </div>
                    </div>
                </div>
                
                <!-- Spacer for mobile to balance the layout -->
                <div class="lg:hidden w-[46px]"></div>
            </div>
        </div>
    </div>
    
    <!-- Navigation Bar (Green) -->
    <nav class="clsu-nav-bar hidden lg:block">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-center">

                <a href="{{ url('/') }}" 
                   class="nav-link-official {{ request()->is('/') ? 'active' : '' }}">
                    <i class="fas fa-home mr-1.5 text-xs"></i>Home
                </a>
                <div class="nav-divider"></div>
                
                <a href="{{ route('mission.vision') }}" 
                   class="nav-link-official {{ request()->routeIs('mission.vision') ? 'active' : '' }}">
                    <i class="fas fa-bullseye mr-1.5 text-xs"></i>Mission & Vision
                </a>
                <div class="nav-divider"></div>
                
                <a href="{{ route('admission.requirements') }}" 
                   class="nav-link-official {{ request()->routeIs('admission.requirements') ? 'active' : '' }}">
                    <i class="fas fa-file-alt mr-1.5 text-xs"></i>Admission
                </a>
                <div class="nav-divider"></div>
                
                <a href="{{ route('qualification') }}" 
                   class="nav-link-official {{ request()->routeIs('qualification') ? 'active' : '' }}">
                    <i class="fas fa-check-circle mr-1.5 text-xs"></i>Qualification
                </a>
                <div class="nav-divider"></div>
                
                <a href="{{ route('procedures') }}" 
                   class="nav-link-official {{ request()->routeIs('procedures') ? 'active' : '' }}">
                    <i class="fas fa-list-ol mr-1.5 text-xs"></i>Procedures
                </a>
                <div class="nav-divider"></div>
                
                <a href="{{ route('courses.offered') }}" 
                   class="nav-link-official {{ request()->routeIs('courses.offered') ? 'active' : '' }}">
                    <i class="fas fa-graduation-cap mr-1.5 text-xs"></i>Courses
                </a>
                <div class="nav-divider"></div>
                
                @guest
                    <a href="{{ route('login') }}" class="nav-link-official">
                        <i class="fas fa-sign-in-alt mr-1.5 text-xs"></i>Login
                    </a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" 
                           class="ml-2 px-5 py-2 bg-gradient-to-r from-[#F9B233] to-[#ffc107] text-[#065a1f] font-bold rounded-lg shadow-lg hover:shadow-xl hover:from-[#ffc107] hover:to-[#F9B233] transform hover:-translate-y-0.5 transition-all duration-300">
                            <i class="fas fa-user-plus mr-1.5 text-xs"></i>Register
                        </a>
                    @endif
                @else
                    <!-- User Dropdown -->
                    <div class="relative ml-2" x-data="{ open: false }">
                        <button @click="open = !open" 
                                class="user-dropdown-btn flex items-center gap-2 px-3 py-2 rounded-lg border border-white/20">
                            <div class="w-8 h-8 bg-gradient-to-br from-[#F9B233] to-[#ffc107] rounded-full flex items-center justify-center text-[#065a1f] font-bold text-sm shadow-md">
                                {{ strtoupper(substr(Auth::user()->first_name ?? Auth::user()->name, 0, 1)) }}{{ strtoupper(substr(Auth::user()->surname ?? '', 0, 1)) }}
                            </div>
                            <span class="text-white font-medium text-sm hidden xl:inline max-w-[100px] truncate">{{ Auth::user()->first_name ?? Auth::user()->name }}</span>
                            <i class="fas fa-chevron-down text-white/70 text-xs transition-transform duration-300" :class="{ 'rotate-180': open }"></i>
                        </button>
                        
                        <!-- Dropdown Menu -->
                        <div x-show="open"
                             x-cloak
                             x-transition:enter="transition ease-out duration-200"
                             x-transition:enter-start="opacity-0 translate-y-2 scale-95"
                             x-transition:enter-end="opacity-100 translate-y-0 scale-100"
                             x-transition:leave="transition ease-in duration-150"
                             x-transition:leave-start="opacity-100 translate-y-0 scale-100"
                             x-transition:leave-end="opacity-0 translate-y-2 scale-95"
                             @click.away="open = false"
                             class="absolute right-0 mt-3 w-64 bg-white rounded-xl shadow-2xl border border-gray-100 overflow-hidden z-50">
                            
                            <!-- User Info Header -->
                            <div class="p-4 bg-gradient-to-br from-[#087A29] to-[#065a1f] relative overflow-hidden">
                                <div class="absolute top-0 right-0 w-16 h-16 bg-[#F9B233]/10 rounded-full -translate-y-1/2 translate-x-1/2"></div>
                                <div class="relative flex items-center gap-3">
                                    <div class="w-11 h-11 bg-gradient-to-br from-[#F9B233] to-[#ffc107] rounded-full flex items-center justify-center border-2 border-white/30 shadow-lg">
                                        <span class="text-[#065a1f] font-bold">
                                            {{ strtoupper(substr(Auth::user()->first_name ?? Auth::user()->name, 0, 1)) }}{{ strtoupper(substr(Auth::user()->surname ?? '', 0, 1)) }}
                                        </span>
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <p class="text-white font-bold text-sm truncate">{{ Auth::user()->first_name ?? Auth::user()->name }} {{ Auth::user()->surname ?? '' }}</p>
                                        <p class="text-white/70 text-xs truncate">{{ Auth::user()->email }}</p>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Menu Items -->
                            <div class="py-2">
                                <a href="{{ route('user.index', Auth::user()->id) }}" 
                                   class="group flex items-center px-4 py-3 text-gray-700 hover:bg-[#087A29]/5 transition-all duration-200">
                                    <div class="w-9 h-9 bg-[#087A29]/10 rounded-lg flex items-center justify-center group-hover:bg-[#087A29] transition-all duration-200">
                                        <i class="fas fa-file-alt text-[#087A29] group-hover:text-white text-sm"></i>
                                    </div>
                                    <div class="ml-3">
                                        <span class="font-semibold text-gray-800 text-sm">My Applications</span>
                                        <p class="text-xs text-gray-500">View & manage</p>
                                    </div>
                                </a>
                                <a href="{{ route('profile.edit') }}" 
                                   class="group flex items-center px-4 py-3 text-gray-700 hover:bg-[#F9B233]/5 transition-all duration-200">
                                    <div class="w-9 h-9 bg-[#F9B233]/10 rounded-lg flex items-center justify-center group-hover:bg-[#F9B233] transition-all duration-200">
                                        <i class="fas fa-user-edit text-[#F9B233] group-hover:text-white text-sm"></i>
                                    </div>
                                    <div class="ml-3">
                                        <span class="font-semibold text-gray-800 text-sm">Edit Profile</span>
                                        <p class="text-xs text-gray-500">Update info</p>
                                    </div>
                                </a>
                            </div>
                            
                            <!-- Logout -->
                            <div class="border-t border-gray-100 p-2">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" 
                                            class="group flex items-center w-full px-3 py-2.5 rounded-lg text-red-600 hover:bg-red-50 transition-all duration-200">
                                        <div class="w-8 h-8 bg-red-100 rounded-lg flex items-center justify-center group-hover:bg-red-500 transition-all duration-200">
                                            <i class="fas fa-sign-out-alt text-red-500 group-hover:text-white text-sm"></i>
                                        </div>
                                        <span class="ml-3 font-semibold text-sm">Logout</span>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endguest
            </div>
        </div>
    </nav>
    
    <!-- Mobile Navigation Bar (simplified green bar) -->
    <nav class="clsu-nav-bar lg:hidden">
        <div class="flex items-center justify-center py-2 px-4">
            <span class="text-white font-semibold text-sm">
                <i class="fas fa-graduation-cap mr-2 text-[#F9B233]"></i>
                ETEEAP Application Portal
            </span>
        </div>
    </nav>
</header>

<!-- Mobile Menu Slide-out Panel -->
<div class="lg:hidden fixed inset-0 z-[100] hidden" id="mobileMenuOverlay">
    <!-- Overlay -->
    <div class="mobile-menu-overlay absolute inset-0" onclick="toggleMobileMenu()"></div>
    
    <!-- Menu Panel (slides from left) -->
    <div class="mobile-menu-panel absolute top-0 left-0 h-full w-80 max-w-[85vw] bg-white transform -translate-x-full transition-transform duration-300" id="mobileMenuPanel">
        <!-- Header -->
        <div class="p-4 bg-gradient-to-r from-[#087A29] to-[#065a1f] flex items-center justify-between">
            <div class="flex items-center gap-3">
                <img src="{{ asset('images/cl.png') }}" alt="CLSU" class="h-10 w-10 object-contain">
                <div>
                    <p class="text-white font-bold text-sm">CLSU ETEEAP</p>
                    <p class="text-white/70 text-xs">Application Portal</p>
                </div>
            </div>
            <button onclick="toggleMobileMenu()" class="text-white/80 hover:text-white p-2 rounded-lg hover:bg-white/10 transition-colors">
                <i class="fas fa-times text-lg"></i>
            </button>
        </div>
        
        <!-- Navigation Links -->
        <div class="p-4 space-y-1 overflow-y-auto" style="max-height: calc(100vh - 220px);">
            <a href="{{ url('/') }}" 
               class="flex items-center px-4 py-3 rounded-xl {{ request()->is('/') ? 'bg-[#087A29] text-white' : 'text-gray-700 hover:bg-gray-100' }} transition-colors">
                <i class="fas fa-home w-5 {{ request()->is('/') ? 'text-[#F9B233]' : 'text-[#087A29]' }}"></i>
                <span class="ml-3 font-medium">Home</span>
            </a>
            
            <a href="{{ route('mission.vision') }}" 
               class="flex items-center px-4 py-3 rounded-xl {{ request()->routeIs('mission.vision') ? 'bg-[#087A29] text-white' : 'text-gray-700 hover:bg-gray-100' }} transition-colors">
                <i class="fas fa-bullseye w-5 {{ request()->routeIs('mission.vision') ? 'text-[#F9B233]' : 'text-[#087A29]' }}"></i>
                <span class="ml-3 font-medium">Mission & Vision</span>
            </a>
            
            <a href="{{ route('admission.requirements') }}" 
               class="flex items-center px-4 py-3 rounded-xl {{ request()->routeIs('admission.requirements') ? 'bg-[#087A29] text-white' : 'text-gray-700 hover:bg-gray-100' }} transition-colors">
                <i class="fas fa-file-alt w-5 {{ request()->routeIs('admission.requirements') ? 'text-[#F9B233]' : 'text-[#087A29]' }}"></i>
                <span class="ml-3 font-medium">Admission</span>
            </a>
            
            <a href="{{ route('qualification') }}" 
               class="flex items-center px-4 py-3 rounded-xl {{ request()->routeIs('qualification') ? 'bg-[#087A29] text-white' : 'text-gray-700 hover:bg-gray-100' }} transition-colors">
                <i class="fas fa-check-circle w-5 {{ request()->routeIs('qualification') ? 'text-[#F9B233]' : 'text-[#087A29]' }}"></i>
                <span class="ml-3 font-medium">Qualification</span>
            </a>
            
            <a href="{{ route('procedures') }}" 
               class="flex items-center px-4 py-3 rounded-xl {{ request()->routeIs('procedures') ? 'bg-[#087A29] text-white' : 'text-gray-700 hover:bg-gray-100' }} transition-colors">
                <i class="fas fa-list-ol w-5 {{ request()->routeIs('procedures') ? 'text-[#F9B233]' : 'text-[#087A29]' }}"></i>
                <span class="ml-3 font-medium">Procedures</span>
            </a>
            
            <a href="{{ route('courses.offered') }}" 
               class="flex items-center px-4 py-3 rounded-xl {{ request()->routeIs('courses.offered') ? 'bg-[#087A29] text-white' : 'text-gray-700 hover:bg-gray-100' }} transition-colors">
                <i class="fas fa-graduation-cap w-5 {{ request()->routeIs('courses.offered') ? 'text-[#F9B233]' : 'text-[#087A29]' }}"></i>
                <span class="ml-3 font-medium">Courses</span>
            </a>
        </div>
        
        <!-- Auth Section -->
        <div class="absolute bottom-0 left-0 right-0 p-4 border-t border-gray-100 bg-gray-50">
            @guest
                <div class="space-y-2">
                    <a href="{{ route('login') }}" 
                       class="flex items-center justify-center w-full px-4 py-3 border-2 border-[#087A29] text-[#087A29] rounded-xl font-semibold hover:bg-[#087A29] hover:text-white transition-colors">
                        <i class="fas fa-sign-in-alt mr-2"></i> Login
                    </a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" 
                           class="flex items-center justify-center w-full px-4 py-3 bg-gradient-to-r from-[#F9B233] to-[#ffc107] text-[#065a1f] rounded-xl font-bold shadow-lg hover:shadow-xl transition-all">
                            <i class="fas fa-user-plus mr-2"></i> Register
                        </a>
                    @endif
                </div>
            @else
                <div class="flex items-center gap-3 mb-3 p-3 bg-white rounded-xl shadow-sm">
                    <div class="w-10 h-10 bg-gradient-to-br from-[#F9B233] to-[#ffc107] rounded-full flex items-center justify-center text-[#065a1f] font-bold shadow-md">
                        {{ strtoupper(substr(Auth::user()->first_name ?? Auth::user()->name, 0, 1)) }}{{ strtoupper(substr(Auth::user()->surname ?? '', 0, 1)) }}
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="font-semibold text-gray-800 text-sm truncate">{{ Auth::user()->first_name ?? Auth::user()->name }}</p>
                        <p class="text-gray-500 text-xs truncate">{{ Auth::user()->email }}</p>
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-2">
                    <a href="{{ route('user.index', Auth::user()->id) }}" 
                       class="flex items-center justify-center px-3 py-2.5 bg-[#087A29] text-white rounded-lg text-sm font-medium shadow-md">
                        <i class="fas fa-file-alt mr-1.5"></i> Apps
                    </a>
                    <form method="POST" action="{{ route('logout') }}" class="contents">
                        @csrf
                        <button type="submit" 
                                class="flex items-center justify-center px-3 py-2.5 bg-red-500 text-white rounded-lg text-sm font-medium hover:bg-red-600 transition-colors shadow-md">
                            <i class="fas fa-sign-out-alt mr-1.5"></i> Logout
                        </button>
                    </form>
                </div>
            @endguest
        </div>
    </div>
</div>

<script>
    function toggleMobileMenu() {
        const overlay = document.getElementById('mobileMenuOverlay');
        const panel = document.getElementById('mobileMenuPanel');
        const openIcon = document.getElementById('menuIconOpen');
        const closeIcon = document.getElementById('menuIconClose');
        
        if (overlay.classList.contains('hidden')) {
            // Open menu (slide from left)
            overlay.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
            setTimeout(() => {
                panel.classList.remove('-translate-x-full');
                panel.classList.add('translate-x-0');
            }, 10);
            openIcon.classList.add('hidden');
            closeIcon.classList.remove('hidden');
        } else {
            // Close menu (slide to left)
            panel.classList.remove('translate-x-0');
            panel.classList.add('-translate-x-full');
            document.body.style.overflow = '';
            setTimeout(() => {
                overlay.classList.add('hidden');
            }, 300);
            openIcon.classList.remove('hidden');
            closeIcon.classList.add('hidden');
        }
    }
    
    // Navbar scroll effect
    window.addEventListener('scroll', function() {
        const navbar = document.getElementById('mainNavbar');
        if (window.pageYOffset > 50) {
            navbar.classList.add('shadow-xl');
        } else {
            navbar.classList.remove('shadow-xl');
        }
    });
</script>