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
@import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Playfair+Display:wght@600;700&display=swap');

.sidebar-ultra {
    background: linear-gradient(165deg, rgba(0, 77, 38, 1) 0%, rgba(0, 61, 30, 1) 35%, rgba(0, 51, 25, 1) 70%, rgba(0, 40, 20, 1) 100%);
    position: relative;
    overflow: hidden;
}

.sidebar-ultra::before {
    content: '';
    position: absolute;
    top: 0; left: 0; right: 0; bottom: 0;
    background: radial-gradient(ellipse at 0% 0%, rgba(255, 215, 0, 0.08) 0%, transparent 50%),
                radial-gradient(ellipse at 100% 100%, rgba(0, 200, 100, 0.05) 0%, transparent 50%);
    pointer-events: none;
}

.sidebar-mesh {
    position: absolute;
    inset: 0;
    background: linear-gradient(135deg, rgba(255,215,0,0.03) 0%, transparent 50%);
    pointer-events: none;
}

.sidebar-scroll::-webkit-scrollbar { width: 4px; }
.sidebar-scroll::-webkit-scrollbar-track { background: rgba(255, 255, 255, 0.03); border-radius: 10px; }
.sidebar-scroll::-webkit-scrollbar-thumb { background: linear-gradient(180deg, rgba(255, 215, 0, 0.4) 0%, rgba(212, 175, 55, 0.2) 100%); border-radius: 10px; }

@keyframes slideIn { from { transform: translateX(-100%); opacity: 0; } to { transform: translateX(0); opacity: 1; } }
@keyframes fadeInUp { from { opacity: 0; transform: translateY(10px); } to { opacity: 1; transform: translateY(0); } }
@keyframes shimmer { 0% { background-position: -200% 0; } 100% { background-position: 200% 0; } }
@keyframes pulse-glow { 0%, 100% { box-shadow: 0 0 5px rgba(255, 215, 0, 0.2); } 50% { box-shadow: 0 0 15px rgba(255, 215, 0, 0.4); } }
@keyframes border-flow { 0% { background-position: 0% 0%; } 100% { background-position: 100% 100%; } }

.sidebar-animate { animation: slideIn 0.4s cubic-bezier(0.16, 1, 0.3, 1); }
.menu-item-animate { animation: fadeInUp 0.3s ease-out; animation-fill-mode: both; }

.nav-link-modern {
    position: relative;
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 12px 16px;
    margin: 4px 12px;
    border-radius: 14px;
    color: rgba(255, 255, 255, 0.75);
    text-decoration: none;
    font-weight: 500;
    font-size: 14px;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    overflow: hidden;
    border: 1px solid transparent;
}

.nav-link-modern::before {
    content: '';
    position: absolute;
    inset: 0;
    background: linear-gradient(135deg, rgba(255, 255, 255, 0.05) 0%, transparent 100%);
    opacity: 0;
    transition: opacity 0.3s;
    border-radius: 14px;
}

.nav-link-modern:hover {
    color: white;
    background: rgba(255, 255, 255, 0.08);
    border-color: rgba(255, 215, 0, 0.2);
    transform: translateX(4px);
}

.nav-link-modern:hover::before { opacity: 1; }

.nav-link-modern:hover .nav-icon-box {
    transform: scale(1.1) rotate(-5deg);
    background: linear-gradient(135deg, rgba(255, 215, 0, 0.3) 0%, rgba(212, 175, 55, 0.2) 100%);
}

.nav-link-modern.active {
    color: white;
    background: linear-gradient(135deg, rgba(255, 215, 0, 0.15) 0%, rgba(255, 215, 0, 0.05) 100%);
    border-color: rgba(255, 215, 0, 0.3);
    box-shadow: 0 4px 15px -3px rgba(255, 215, 0, 0.2), inset 0 1px 0 rgba(255, 255, 255, 0.1);
}

.nav-link-modern.active .nav-icon-box {
    background: linear-gradient(135deg, #FFD700 0%, #D4AF37 100%);
    box-shadow: 0 4px 12px rgba(255, 215, 0, 0.3);
}

.nav-link-modern.active .nav-icon-box svg { color: #004d26; }

.nav-link-modern.active::after {
    content: '';
    position: absolute;
    left: 0;
    top: 50%;
    transform: translateY(-50%);
    width: 4px;
    height: 60%;
    background: linear-gradient(180deg, #FFD700 0%, #D4AF37 100%);
    border-radius: 0 4px 4px 0;
}

.nav-icon-box {
    width: 38px;
    height: 38px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 12px;
    background: rgba(255, 255, 255, 0.08);
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    flex-shrink: 0;
}

.nav-icon-box svg { width: 18px; height: 18px; color: #FFD700; transition: color 0.3s; }

.nav-section-label {
    display: flex;
    align-items: center;
    gap: 8px;
    padding: 0 20px;
    margin: 20px 0 8px;
    color: rgba(255, 215, 0, 0.5);
    font-size: 10px;
    font-weight: 700;
    letter-spacing: 0.15em;
    text-transform: uppercase;
}

.nav-section-label::after {
    content: '';
    flex: 1;
    height: 1px;
    background: linear-gradient(90deg, rgba(255, 215, 0, 0.2) 0%, transparent 100%);
}

.user-card-ultra {
    background: linear-gradient(135deg, rgba(255, 255, 255, 0.1) 0%, rgba(255, 255, 255, 0.03) 100%);
    border: 1px solid rgba(255, 255, 255, 0.1);
    border-radius: 16px;
    padding: 16px;
    backdrop-filter: blur(10px);
    position: relative;
    overflow: hidden;
}

.user-card-ultra::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 200%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.05), transparent);
    animation: shimmer 3s infinite;
}

.active-dot { width: 8px; height: 8px; background: #FFD700; border-radius: 50%; box-shadow: 0 0 10px rgba(255, 215, 0, 0.5); animation: pulse-glow 2s infinite; }

.logo-container {
    position: relative;
    width: 56px;
    height: 56px;
    border-radius: 16px;
    background: white;
    padding: 6px;
    box-shadow: 0 8px 24px rgba(0, 0, 0, 0.2), 0 0 0 1px rgba(255, 215, 0, 0.3);
}

.logo-container::after {
    content: '';
    position: absolute;
    inset: -2px;
    border-radius: 18px;
    background: linear-gradient(135deg, #FFD700 0%, #D4AF37 50%, #FFD700 100%);
    background-size: 200% 200%;
    animation: border-flow 3s linear infinite;
    z-index: -1;
    opacity: 0.5;
}

.logout-btn {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 12px 16px;
    margin: 4px 12px;
    border-radius: 14px;
    color: rgba(255, 100, 100, 0.8);
    font-weight: 500;
    font-size: 14px;
    transition: all 0.3s;
    border: 1px solid transparent;
}

.logout-btn:hover {
    color: #ff6b6b;
    background: rgba(255, 100, 100, 0.1);
    border-color: rgba(255, 100, 100, 0.2);
    transform: translateX(4px);
}

.logout-btn .nav-icon-box { background: rgba(255, 100, 100, 0.15); }
.logout-btn .nav-icon-box svg { color: #ff6b6b; }

.sidebar-footer {
    background: linear-gradient(180deg, transparent 0%, rgba(0, 0, 0, 0.2) 100%);
    border-top: 1px solid rgba(255, 255, 255, 0.08);
}
</style>

<div id="sidebar-overlay" class="hidden fixed inset-0 bg-black/70 backdrop-blur-md z-[60] lg:hidden transition-all duration-300 opacity-0"></div>

<aside id="mobile-sidebar" class="fixed lg:static inset-y-0 left-0 z-[70] w-[280px] sidebar-ultra transform -translate-x-full lg:translate-x-0 transition-all duration-500 ease-out shadow-2xl shadow-black/50 no-print sidebar-animate" role="navigation">
    <div class="sidebar-mesh"></div>
    <div class="absolute top-0 right-0 bottom-0 w-[3px] bg-gradient-to-b from-[#FFD700] via-[#B8860B] to-[#FFD700] opacity-80"></div>
    <div class="absolute top-0 left-0 w-32 h-32 bg-gradient-to-br from-[#FFD700]/10 to-transparent rounded-br-full pointer-events-none"></div>

    <div class="relative flex flex-col h-full sidebar-scroll overflow-y-auto overflow-x-hidden">
        <div class="relative px-6 py-8 border-b border-white/10">
            <button type="button" id="sidebar-close-button" class="lg:hidden absolute top-4 right-4 w-10 h-10 flex items-center justify-center rounded-xl bg-white/5 hover:bg-red-500/20 border border-white/10 hover:border-red-400/30 text-white/60 hover:text-red-400 transition-all duration-300 focus:outline-none group z-10" aria-label="Close sidebar">
                <svg class="w-5 h-5 group-hover:rotate-90 transition-transform duration-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
            
            <div class="flex items-center gap-4 mb-6">
                <div class="logo-container">
                    <img src="{{ asset('images/cl.png') }}" alt="CLSU Logo" class="w-full h-full object-contain">
                </div>
                <div class="flex-1 min-w-0">
                    <h2 class="text-white font-bold text-xl leading-tight" style="font-family: 'Playfair Display', serif;">CLSU</h2>
                    <p class="text-[#FFD700] text-sm font-semibold tracking-wide">ETEEAP</p>
                </div>
            </div>

            <div class="user-card-ultra">
                <div class="flex items-center gap-3">
                    <div class="relative flex-shrink-0">
                        <div class="w-12 h-12 bg-gradient-to-br {{ $roleBadgeColor }} rounded-xl flex items-center justify-center font-bold text-lg text-[#004d26] shadow-lg">{{ $userInitial }}</div>
                        <div class="absolute -bottom-1 -right-1 w-4 h-4 bg-gradient-to-br from-emerald-400 to-emerald-500 rounded-full border-2 border-[#003d1e] flex items-center justify-center">
                            <svg class="w-2 h-2 text-white" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                        </div>
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-white font-semibold text-sm truncate">{{ Auth::user()->name }}</p>
                        <div class="flex items-center gap-2 mt-1">
                            <span class="inline-flex items-center gap-1 bg-gradient-to-r {{ $roleBadgeColor }} text-[#004d26] text-[10px] font-bold px-2.5 py-1 rounded-full uppercase tracking-wide shadow-sm">
                                <span class="w-1.5 h-1.5 bg-[#004d26] rounded-full opacity-60"></span>{{ $roleLabel }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <nav class="flex-1 py-4">
            <div class="nav-section-label">
                <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"/></svg>
                Main Menu
            </div>
            
            @if($userRole == 2)
                <a href="{{ route('admin.home') }}" class="nav-link-modern menu-item-animate {{ request()->routeIs('admin.home') ? 'active' : '' }}" style="animation-delay: 0.05s">
                    <div class="nav-icon-box"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z"/></svg></div>
                    <span>Dashboard</span>
                    @if(request()->routeIs('admin.home'))<div class="active-dot ml-auto"></div>@endif
                </a>
            @elseif($userRole == 3)
                <a href="{{ route('assessor.dashboard') }}" class="nav-link-modern menu-item-animate {{ request()->routeIs('assessor.dashboard') ? 'active' : '' }}" style="animation-delay: 0.05s">
                    <div class="nav-icon-box"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg></div>
                    <span>Assessor Dashboard</span>
                </a>
                <a href="{{ route('admin.accepted.applicants') }}" class="nav-link-modern menu-item-animate {{ request()->routeIs('admin.accepted.applicants*') ? 'active' : '' }}" style="animation-delay: 0.1s">
                    <div class="nav-icon-box"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg></div>
                    <span>Accepted Applicants</span>
                </a>
            @endif

            @if($userRole == 2)
                <div class="nav-section-label">
                    <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M3 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"/></svg>
                    Management
                </div>
                
                <a href="{{ route('admin.applications') }}" class="nav-link-modern menu-item-animate {{ request()->routeIs('admin.applications*') ? 'active' : '' }}" style="animation-delay: 0.15s">
                    <div class="nav-icon-box"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg></div>
                    <span>Application Forms</span>
                </a>
                <a href="{{ route('admin.accepted.applicants') }}" class="nav-link-modern menu-item-animate {{ request()->routeIs('admin.accepted.applicants*') ? 'active' : '' }}" style="animation-delay: 0.2s">
                    <div class="nav-icon-box"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg></div>
                    <span>Accepted Applicants</span>
                </a>
                <a href="{{ route('admin.courses.index') }}" class="nav-link-modern menu-item-animate {{ request()->routeIs('admin.courses*') ? 'active' : '' }}" style="animation-delay: 0.25s">
                    <div class="nav-icon-box"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222"/></svg></div>
                    <span>Courses Offered</span>
                </a>
                <a href="{{ route('admin.announcement.create') }}" class="nav-link-modern menu-item-animate {{ request()->routeIs('admin.announcement*') ? 'active' : '' }}" style="animation-delay: 0.3s">
                    <div class="nav-icon-box"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"/></svg></div>
                    <span>Announcements</span>
                </a>

                <div class="nav-section-label">
                    <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd"/></svg>
                    Settings
                </div>
                
                <a href="{{ route('admin.slider.index') }}" class="nav-link-modern menu-item-animate {{ request()->routeIs('admin.slider*') ? 'active' : '' }}" style="animation-delay: 0.35s">
                    <div class="nav-icon-box"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg></div>
                    <span>Manage Sliders</span>
                </a>
                <a href="{{ route('admin.users.index') }}" class="nav-link-modern menu-item-animate {{ request()->routeIs('admin.users*') ? 'active' : '' }}" style="animation-delay: 0.4s">
                    <div class="nav-icon-box"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg></div>
                    <span>User Management</span>
                </a>
                <a href="{{ route('admin.settings.index') }}" class="nav-link-modern menu-item-animate {{ request()->routeIs('admin.settings*') ? 'active' : '' }}" style="animation-delay: 0.45s">
                    <div class="nav-icon-box"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg></div>
                    <span>System Settings</span>
                </a>
            @endif

            <div class="mt-auto pt-6 border-t border-white/10 mx-3">
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="logout-btn menu-item-animate" style="animation-delay: 0.5s">
                    <div class="nav-icon-box"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg></div>
                    <span>Logout</span>
                </a>
            </div>
        </nav>

        <div class="sidebar-footer relative px-6 py-4">
            <div class="flex items-center justify-center gap-3">
                <div class="w-6 h-6 rounded-lg bg-gradient-to-br from-[#FFD700] to-[#D4AF37] flex items-center justify-center shadow-lg">
                    <svg class="w-3 h-3 text-[#004d26]" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                </div>
                <div>
                    <p class="text-white/60 text-[10px] font-semibold tracking-widest uppercase">CLSU</p>
                    <p class="text-[#FFD700]/50 text-[9px] italic">Sieving for Excellence</p>
                </div>
            </div>
        </div>
    </div>
</aside>

<form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">@csrf</form>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const sidebarCloseButton = document.getElementById('sidebar-close-button');
    const sidebar = document.getElementById('mobile-sidebar');
    const overlay = document.getElementById('sidebar-overlay');
    const menuButton = document.getElementById('mobile-menu-button');
    const openIcon = document.getElementById('menu-open-icon');
    const closeIcon = document.getElementById('menu-close-icon');
    
    function closeSidebar() {
        sidebar.classList.remove('translate-x-0');
        sidebar.classList.add('-translate-x-full');
        overlay.classList.add('opacity-0');
        setTimeout(() => { overlay.classList.add('hidden'); }, 300);
        if (menuButton) { menuButton.setAttribute('aria-expanded', 'false'); }
        if (openIcon) openIcon.classList.remove('hidden');
        if (closeIcon) closeIcon.classList.add('hidden');
        document.body.classList.remove('overflow-hidden');
    }
    
    if (sidebarCloseButton) { sidebarCloseButton.addEventListener('click', closeSidebar); }
    if (overlay) { overlay.addEventListener('click', closeSidebar); }
});
</script>
