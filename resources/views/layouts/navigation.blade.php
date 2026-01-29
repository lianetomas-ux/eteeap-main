<nav x-data="{ open: false }" class="clsu-nav-container">
    {{-- Tailwind CSS CDN --}}
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'clsu-green': '#087a29',
                        'clsu-green-dark': '#065a1f',
                        'clsu-green-light': '#0a9432',
                        'clsu-yellow': '#F9B233',
                        'clsu-gold': '#D4AF37',
                    }
                }
            }
        }
    </script>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Libre+Franklin:wght@300;400;500;600;700;800&family=Playfair+Display:wght@500;600;700&display=swap');
        .font-franklin { font-family: 'Libre Franklin', sans-serif; }
        .font-playfair { font-family: 'Playfair Display', serif; }
    </style>

    {{-- ==================== TOP NAVBAR ==================== --}}
    <div class="bg-gradient-to-r from-clsu-green to-clsu-green-dark shadow-lg relative z-50 font-franklin">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                
                {{-- Left: Hamburger + Logo --}}
                <div class="flex items-center gap-3">
                    {{-- Hamburger Button --}}
                    <button @click="open = !open" 
                            class="inline-flex items-center justify-center p-2 rounded-lg text-white hover:bg-white/10 focus:outline-none focus:bg-white/10 transition duration-200">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path :class="{'hidden': open, 'inline-flex': !open}" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            <path :class="{'hidden': !open, 'inline-flex': open}" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>

                    {{-- Logo + Brand --}}
                    <a href="{{ route('home') }}" class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-white rounded-full p-1 border-2 border-clsu-yellow shadow-md">
                            <x-application-logo class="w-full h-full object-contain" />
                        </div>
                        <div class="hidden sm:block">
                            <span class="text-clsu-yellow font-bold text-lg font-playfair">CLSU ETEEAP</span>
                            <span class="text-green-100 text-xs block">Application System</span>
                        </div>
                    </a>
                </div>

                {{-- Right: User Dropdown --}}
                <div class="flex items-center">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="flex items-center gap-2 px-3 py-2 rounded-xl text-white hover:bg-white/10 focus:outline-none transition duration-200">
                                <div class="w-8 h-8 rounded-full bg-clsu-yellow flex items-center justify-center text-clsu-green-dark font-bold text-sm">
                                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                                </div>
                                <span class="hidden sm:block text-sm font-medium">{{ Str::limit(Auth::user()->name, 15) }}</span>
                                <svg class="h-4 w-4 text-green-200" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <div class="px-4 py-3 border-b border-gray-100 bg-gradient-to-r from-green-50 to-yellow-50">
                                <p class="text-xs text-gray-500">Signed in as</p>
                                <p class="text-sm font-semibold text-clsu-green-dark truncate">{{ Auth::user()->email }}</p>
                            </div>
                            
                            <x-dropdown-link :href="route('profile.edit')" class="flex items-center gap-2">
                                <svg class="w-4 h-4 text-clsu-green" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                                {{ __('Profile') }}
                            </x-dropdown-link>

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="flex items-center gap-2 w-full px-4 py-2 text-left text-sm text-red-600 hover:bg-red-50 transition-colors">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                    </svg>
                                    {{ __('Log Out') }}
                                </button>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>
            </div>
        </div>
        
        {{-- Gold accent line --}}
        <div class="h-1 bg-gradient-to-r from-clsu-yellow via-clsu-gold to-clsu-yellow"></div>
    </div>

    {{-- ==================== SIDEBAR OVERLAY (Mobile) ==================== --}}
    <div x-show="open" 
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         @click="open = false"
         class="fixed inset-0 bg-black/50 z-40 lg:hidden"
         style="display: none;">
    </div>

    {{-- ==================== SIDEBAR ==================== --}}
    <div x-show="open"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="-translate-x-full"
         x-transition:enter-end="translate-x-0"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="translate-x-0"
         x-transition:leave-end="-translate-x-full"
         class="fixed top-0 left-0 h-full w-72 bg-white shadow-2xl z-50 transform font-franklin"
         style="display: none;"
         @click.away="open = false">
        
        {{-- Sidebar Header --}}
        <div class="bg-gradient-to-r from-clsu-green to-clsu-green-dark p-5 relative">
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <div class="w-12 h-12 bg-white rounded-full p-1.5 border-2 border-clsu-yellow shadow-lg">
                        <x-application-logo class="w-full h-full object-contain" />
                    </div>
                    <div>
                        <span class="text-clsu-yellow font-bold text-lg font-playfair block">CLSU ETEEAP</span>
                        <span class="text-green-100 text-xs">Application System</span>
                    </div>
                </div>
                <button @click="open = false" class="text-white/70 hover:text-white p-1">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div class="absolute bottom-0 left-0 right-0 h-1 bg-gradient-to-r from-clsu-yellow via-clsu-gold to-clsu-yellow"></div>
        </div>

        {{-- User Info --}}
        <div class="p-4 bg-gradient-to-r from-green-50 to-yellow-50 border-b border-gray-200">
            <div class="flex items-center gap-3">
                <div class="w-12 h-12 rounded-full bg-gradient-to-br from-clsu-green to-clsu-green-dark flex items-center justify-center text-white font-bold text-lg shadow-md">
                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                </div>
                <div class="flex-1 min-w-0">
                    <p class="font-semibold text-gray-800 truncate">{{ Auth::user()->name }}</p>
                    <p class="text-xs text-gray-500 truncate">{{ Auth::user()->email }}</p>
                </div>
            </div>
        </div>

        {{-- Navigation Links --}}
        <div class="p-4 flex-1 overflow-y-auto">
            <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider mb-3">Navigation</p>
            
            <nav class="space-y-1">
                {{-- Dashboard --}}
                <a href="{{ route('home') }}" 
                   class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-200 {{ request()->routeIs('home') ? 'bg-clsu-green text-white shadow-md' : 'text-gray-700 hover:bg-green-50 hover:text-clsu-green' }}">
                    <svg class="w-5 h-5 {{ request()->routeIs('home') ? 'text-clsu-yellow' : '' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                    <span class="font-medium">Dashboard</span>
                    @if(request()->routeIs('home'))
                    <span class="ml-auto w-2 h-2 rounded-full bg-clsu-yellow"></span>
                    @endif
                </a>

                {{-- My Application --}}
                <a href="{{ route('user.index', Auth::user()->id) }}" 
                   class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-200 {{ request()->routeIs('user.index') ? 'bg-clsu-green text-white shadow-md' : 'text-gray-700 hover:bg-green-50 hover:text-clsu-green' }}">
                    <svg class="w-5 h-5 {{ request()->routeIs('user.index') ? 'text-clsu-yellow' : '' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    <span class="font-medium">My Application</span>
                </a>

                {{-- Profile --}}
                <a href="{{ route('profile.edit') }}" 
                   class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-200 {{ request()->routeIs('profile.edit') ? 'bg-clsu-green text-white shadow-md' : 'text-gray-700 hover:bg-green-50 hover:text-clsu-green' }}">
                    <svg class="w-5 h-5 {{ request()->routeIs('profile.edit') ? 'text-clsu-yellow' : '' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                    <span class="font-medium">Profile</span>
                </a>
            </nav>

            {{-- Divider --}}
            <div class="my-6 border-t border-gray-200"></div>

            {{-- Quick Links --}}
            <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider mb-3">Quick Links</p>
            
            <nav class="space-y-1">
                <a href="{{ route('mission.vision') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-xl text-gray-600 hover:bg-yellow-50 hover:text-clsu-gold transition-all duration-200">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span class="font-medium text-sm">Mission & Vision</span>
                </a>
                
                <a href="{{ route('admission.requirements') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-xl text-gray-600 hover:bg-yellow-50 hover:text-clsu-gold transition-all duration-200">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                    </svg>
                    <span class="font-medium text-sm">Admission Requirements</span>
                </a>
                
                <a href="{{ route('procedures') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-xl text-gray-600 hover:bg-yellow-50 hover:text-clsu-gold transition-all duration-200">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16" />
                    </svg>
                    <span class="font-medium text-sm">Procedures</span>
                </a>
                
                <a href="{{ route('courses.offered') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-xl text-gray-600 hover:bg-yellow-50 hover:text-clsu-gold transition-all duration-200">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                    </svg>
                    <span class="font-medium text-sm">Courses Offered</span>
                </a>
            </nav>
        </div>

        {{-- Sidebar Footer --}}
        <div class="p-4 border-t border-gray-200 bg-gray-50">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="flex items-center justify-center gap-2 w-full px-4 py-3 rounded-xl bg-red-50 text-red-600 hover:bg-red-100 transition-all duration-200 font-semibold">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                    </svg>
                    Log Out
                </button>
            </form>
            
            <p class="text-center text-xs text-gray-400 mt-4">
                © {{ date('Y') }} CLSU ETEEAP
            </p>
        </div>
    </div>
</nav>