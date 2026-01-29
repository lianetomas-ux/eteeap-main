@php
    $userInitial = strtoupper(substr(Auth::user()->name, 0, 1));
    $userRole = Auth::user()->role;
    
    $roleLabel = match($userRole) {
        2 => 'Administrator',
        3 => 'Assessor',
        default => 'User'
    };
    
    $roleBadgeColor = match($userRole) {
        2 => 'from-[#FFD700] to-[#D4AF37]',
        3 => 'from-[#D4AF37] to-[#FFD700]',
        default => 'from-[#006633] to-[#004d26]'
    };
@endphp

<style>
@import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Playfair+Display:wght@600;700&display=swap');

body {
    font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
}

/* Header animations */
@keyframes slideDown {
    from { transform: translateY(-100%); opacity: 0; }
    to { transform: translateY(0); opacity: 1; }
}

@keyframes pulse-glow {
    0%, 100% { box-shadow: 0 0 0 0 rgba(255, 215, 0, 0.4); }
    50% { box-shadow: 0 0 20px 5px rgba(255, 215, 0, 0.2); }
}

.header-animate {
    animation: slideDown 0.3s ease-out;
}

.notification-pulse {
    animation: pulse-glow 2s infinite;
}

/* Dropdown menu styles */
.dropdown-menu {
    transform: translateY(-10px);
    opacity: 0;
    visibility: hidden;
    transition: all 0.2s ease-out;
}

.dropdown-menu.show {
    transform: translateY(0);
    opacity: 1;
    visibility: visible;
}

/* Glass effect */
.glass-header {
    background: linear-gradient(135deg, rgba(0, 102, 51, 0.98) 0%, rgba(0, 77, 38, 0.98) 100%);
    backdrop-filter: blur(20px);
    -webkit-backdrop-filter: blur(20px);
}
</style>

<!-- Header Navigation -->
<nav class="sticky top-0 z-[55] glass-header shadow-xl shadow-[#006633]/20 header-animate no-print">
    <!-- Top gold accent line -->
    <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-[#D4AF37] via-[#FFD700] to-[#D4AF37]"></div>
    
    <!-- Decorative pattern overlay -->
    <div class="absolute inset-0 opacity-5 pointer-events-none" style="background-image: url('data:image/svg+xml,%3Csvg width=\"60\" height=\"60\" viewBox=\"0 0 60 60\" xmlns=\"http://www.w3.org/2000/svg\"%3E%3Cg fill=\"none\" fill-rule=\"evenodd\"%3E%3Cg fill=\"%23ffffff\" fill-opacity=\"0.4\"%3E%3Cpath d=\"M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z\"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>
    
    <div class="max-w-full mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16 md:h-18">
            
            <!-- Left: Burger Menu (Mobile) + Brand -->
            <div class="flex items-center gap-3 md:gap-5">
                <!-- Burger Menu Button (visible on mobile/tablet) -->
                <button 
                    type="button" 
                    id="mobile-menu-button"
                    class="lg:hidden inline-flex items-center justify-center w-10 h-10 rounded-xl text-white/90 hover:text-white bg-white/5 hover:bg-white/15 border border-white/10 hover:border-white/20 focus:outline-none focus:ring-2 focus:ring-[#FFD700]/50 transition-all duration-300 group"
                    aria-controls="mobile-sidebar"
                    aria-expanded="false">
                    <span class="sr-only">Open sidebar</span>
                    <!-- Hamburger Icon -->
                    <svg id="menu-open-icon" class="block h-5 w-5 group-hover:scale-110 transition-transform" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <!-- Close Icon (hidden by default) -->
                    <svg id="menu-close-icon" class="hidden h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>

                <!-- Brand / Logo -->
                <a href="{{ route('admin.home') }}" class="flex items-center gap-3 group transition-all duration-300 hover:translate-x-1">
                    <!-- Logo Icon -->
                    <div class="hidden sm:flex w-10 h-10 bg-gradient-to-br from-[#FFD700] to-[#D4AF37] rounded-xl items-center justify-center shadow-lg shadow-[#D4AF37]/30 group-hover:shadow-[#FFD700]/50 transition-shadow duration-300">
                        <svg class="w-5 h-5 text-[#004d26]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                        </svg>
                    </div>
                    
                    <div class="flex flex-col">
                        <span class="text-white font-bold text-base sm:text-lg leading-tight tracking-tight" style="font-family: 'Playfair Display', serif;">
                            Admin Panel
                        </span>
                    </div>
                </a>
            </div>

            <!-- Center: Search Bar (Hidden on mobile)
            <div class="hidden lg:flex flex-1 max-w-md mx-8">
                <div class="relative w-full group">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                        <svg class="w-4 h-4 text-white/40 group-focus-within:text-[#FFD700] transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                    </div>
                    <input 
                        type="text" 
                        placeholder="Search applications, users..." 
                        class="w-full pl-11 pr-4 py-2.5 bg-white/5 border border-white/10 rounded-xl text-white placeholder-white/40 text-sm focus:outline-none focus:bg-white/10 focus:border-[#FFD700]/50 focus:ring-2 focus:ring-[#FFD700]/20 transition-all duration-300"
                    >
                </div>
            </div> -->

            <!-- Right: Actions & User -->
            <div class="flex items-center gap-2 sm:gap-4">
                
                <!-- Quick Actions (Desktop only) -->
                <div class="hidden md:flex items-center gap-2">
                    <!-- Notifications -->
                    <!-- <button class="relative w-10 h-10 flex items-center justify-center rounded-xl text-white/70 hover:text-white bg-white/5 hover:bg-white/15 border border-white/10 hover:border-white/20 transition-all duration-300 group">
                        <svg class="w-5 h-5 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
                        </svg>
                        
                        <span class="absolute top-2 right-2 w-2 h-2 bg-red-500 rounded-full notification-pulse"></span>
                    </button> -->
                    
                    <!-- Settings Quick Link -->
                    <a href="{{ route('admin.settings.index') }}" class="w-10 h-10 flex items-center justify-center rounded-xl text-white/70 hover:text-white bg-white/5 hover:bg-white/15 border border-white/10 hover:border-white/20 transition-all duration-300 group">
                        <svg class="w-5 h-5 group-hover:rotate-90 transition-transform duration-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                    </a>
                </div>

                <!-- Divider -->
                <div class="hidden md:block w-px h-8 bg-white/20"></div>

                <!-- User Profile Dropdown -->
                <div class="relative" id="user-dropdown-container">
                    <button 
                        id="user-dropdown-button"
                        class="flex items-center gap-3 bg-white/5 hover:bg-white/15 backdrop-blur-sm px-2 sm:px-4 py-2 rounded-xl border border-white/10 hover:border-white/25 transition-all duration-300 group"
                    >
                        <!-- Avatar -->
                        <div class="relative flex-shrink-0">
                            <div class="w-9 h-9 bg-gradient-to-br {{ $roleBadgeColor }} rounded-xl flex items-center justify-center font-bold text-sm text-[#004d26] shadow-lg group-hover:shadow-[#FFD700]/30 transition-shadow">
                                {{ $userInitial }}
                            </div>
                            <!-- Online indicator -->
                            <span class="absolute -bottom-0.5 -right-0.5 w-3 h-3 bg-emerald-400 border-2 border-[#004d26] rounded-full"></span>
                        </div>
                        
                        <!-- User Info (hidden on mobile) -->
                        <div class="hidden sm:flex flex-col items-start">
                            <span class="text-white text-sm font-semibold leading-tight max-w-[120px] truncate">{{ Auth::user()->name }}</span>
                            <span class="text-[#FFD700]/70 text-[0.65rem] font-medium uppercase tracking-wide">{{ $roleLabel }}</span>
                        </div>
                        
                        <!-- Dropdown Arrow -->
                        <svg class="hidden sm:block w-4 h-4 text-white/50 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                    
                    <!-- Dropdown Menu -->
                    <div id="user-dropdown-menu" class="dropdown-menu absolute right-0 mt-2 w-56 bg-white rounded-xl shadow-2xl shadow-black/20 border border-gray-100 overflow-hidden">
                        <!-- User Info Header -->
                        <div class="px-4 py-3 bg-gradient-to-r from-[#006633]/5 to-[#004d26]/5 border-b border-gray-100">
                            <p class="text-sm font-semibold text-gray-800">{{ Auth::user()->name }}</p>
                            <p class="text-xs text-gray-500">{{ Auth::user()->email }}</p>
                        </div>
                        
                        <!-- Menu Items -->
                        <div class="py-2">
                            <a href="{{ route('admin.home') }}" class="flex items-center gap-3 px-4 py-2.5 text-sm text-gray-700 hover:bg-[#006633]/5 hover:text-[#006633] transition-colors">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                                </svg>
                                Dashboard
                            </a>
                            <a href="{{ route('admin.settings.index') }}" class="flex items-center gap-3 px-4 py-2.5 text-sm text-gray-700 hover:bg-[#006633]/5 hover:text-[#006633] transition-colors">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                                Settings
                            </a>
                        </div>
                        
                        <!-- Logout -->
                        <div class="border-t border-gray-100">
                            <a href="{{ route('logout') }}" 
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                               class="flex items-center gap-3 px-4 py-2.5 text-sm text-red-600 hover:bg-red-50 transition-colors">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                                </svg>
                                Sign out
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
    
    <!-- Bottom gold accent border -->
    <div class="absolute bottom-0 left-0 right-0 h-[2px] bg-gradient-to-r from-transparent via-[#D4AF37]/50 to-transparent"></div>
</nav>

<!-- Scripts -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Mobile menu toggle
    const menuButton = document.getElementById('mobile-menu-button');
    const sidebar = document.getElementById('mobile-sidebar');
    const overlay = document.getElementById('sidebar-overlay');
    const openIcon = document.getElementById('menu-open-icon');
    const closeIcon = document.getElementById('menu-close-icon');
    
    function toggleSidebar() {
        const isOpen = sidebar.classList.contains('translate-x-0');
        
        if (isOpen) {
            sidebar.classList.remove('translate-x-0');
            sidebar.classList.add('-translate-x-full');
            overlay.classList.add('opacity-0');
            setTimeout(() => {
                overlay.classList.add('hidden');
            }, 300);
            menuButton.setAttribute('aria-expanded', 'false');
            openIcon.classList.remove('hidden');
            closeIcon.classList.add('hidden');
            document.body.classList.remove('overflow-hidden');
        } else {
            overlay.classList.remove('hidden');
            setTimeout(() => {
                overlay.classList.remove('opacity-0');
            }, 10);
            sidebar.classList.remove('-translate-x-full');
            sidebar.classList.add('translate-x-0');
            menuButton.setAttribute('aria-expanded', 'true');
            openIcon.classList.add('hidden');
            closeIcon.classList.remove('hidden');
            document.body.classList.add('overflow-hidden', 'lg:overflow-auto');
        }
    }
    
    if (menuButton) {
        menuButton.addEventListener('click', toggleSidebar);
    }
    if (overlay) {
        overlay.addEventListener('click', toggleSidebar);
    }
    
    // Close sidebar when window is resized to desktop
    window.addEventListener('resize', function() {
        if (window.innerWidth >= 1024 && sidebar) {
            sidebar.classList.remove('-translate-x-full');
            sidebar.classList.add('translate-x-0');
            if (overlay) overlay.classList.add('hidden');
            document.body.classList.remove('overflow-hidden');
        }
    });
    
    // User dropdown toggle
    const dropdownButton = document.getElementById('user-dropdown-button');
    const dropdownMenu = document.getElementById('user-dropdown-menu');
    
    if (dropdownButton && dropdownMenu) {
        dropdownButton.addEventListener('click', function(e) {
            e.stopPropagation();
            dropdownMenu.classList.toggle('show');
        });
        
        // Close dropdown when clicking outside
        document.addEventListener('click', function(e) {
            if (!dropdownButton.contains(e.target) && !dropdownMenu.contains(e.target)) {
                dropdownMenu.classList.remove('show');
            }
        });
    }
});
</script>

{{-- ================= SWEETALERT2 TOAST ================= --}}
@if(session('success'))
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    Swal.fire({
        toast: true,
        position: 'top-end',
        icon: 'success',
        title: {!! json_encode(session('success')) !!},
        showConfirmButton: false,
        timer: 5000,
        timerProgressBar: true,
        background: 'linear-gradient(135deg, #f0fdf4 0%, #dcfce7 100%)',
        color: '#166534',
        iconColor: '#006633',
        customClass: {
            popup: 'clsu-toast-popup',
            title: 'clsu-toast-title',
            timerProgressBar: 'clsu-toast-progress'
        },
        didOpen: (toast) => {
            toast.style.borderLeft = '4px solid #006633';
            toast.style.borderRadius = '12px';
            toast.style.boxShadow = '0 10px 40px rgba(0, 102, 51, 0.2)';
            toast.style.padding = '1rem 1.25rem';
            toast.style.fontFamily = "'Inter', sans-serif";
        }
    });
</script>
<style>
    .clsu-toast-popup { font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif !important; }
    .clsu-toast-title { font-weight: 600 !important; font-size: 0.9rem !important; }
    .clsu-toast-progress { background: linear-gradient(90deg, #006633 0%, #008844 100%) !important; }
</style>
@endif

@if(session('error'))
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    Swal.fire({
        toast: true,
        position: 'top-end',
        icon: 'error',
        title: {!! json_encode(session('error')) !!},
        showConfirmButton: false,
        timer: 5000,
        timerProgressBar: true,
        background: 'linear-gradient(135deg, #fef2f2 0%, #fee2e2 100%)',
        color: '#991b1b',
        iconColor: '#dc2626',
        customClass: {
            popup: 'clsu-toast-popup',
            title: 'clsu-toast-title',
            timerProgressBar: 'clsu-toast-progress-error'
        },
        didOpen: (toast) => {
            toast.style.borderLeft = '4px solid #dc2626';
            toast.style.borderRadius = '12px';
            toast.style.boxShadow = '0 10px 40px rgba(220, 38, 38, 0.2)';
            toast.style.padding = '1rem 1.25rem';
            toast.style.fontFamily = "'Inter', sans-serif";
        }
    });
</script>
<style>
    .clsu-toast-progress-error { background: linear-gradient(90deg, #dc2626 0%, #ef4444 100%) !important; }
</style>
@endif
