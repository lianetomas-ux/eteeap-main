@extends('layouts.admin')

@section('content')

<style>
    .gradient-text {
        background: linear-gradient(135deg, #006633 0%, #004d26 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }
    
    .animated-gradient {
        background: linear-gradient(135deg, #006633 0%, #004d26 50%, #006633 100%);
        background-size: 200% 200%;
    }
    
    .modern-card {
        background: white;
        box-shadow: 0 25px 50px -12px rgba(0, 102, 51, 0.15);
    }
    
    .stat-card {
        transition: all 0.3s ease;
    }
    
    .stat-card:hover {
        transform: translateY(-5px);
    }
    
    .float-animation {
        animation: float 6s ease-in-out infinite;
    }
    
    @keyframes float {
        0%, 100% { transform: translateY(0px); }
        50% { transform: translateY(-20px); }
    }
    
    .btn-modern:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 20px rgba(212, 175, 55, 0.4);
    }
    
    .filter-tab.active {
        background: linear-gradient(to right, #006633, #004d26);
        color: white;
        box-shadow: 0 4px 15px rgba(0, 102, 51, 0.3);
    }
</style>

<div class="min-h-screen bg-gradient-to-br from-[#f8fdf8] via-[#f0f7f0] to-[#e8f5e8] py-6 md:py-8 px-4 relative overflow-hidden">
    
    {{-- Animated Background Elements --}}
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute top-20 left-10 w-72 h-72 bg-[#006633]/5 rounded-full blur-3xl float-animation"></div>
        <div class="absolute top-40 right-20 w-96 h-96 bg-[#D4AF37]/5 rounded-full blur-3xl float-animation" style="animation-delay: -2s;"></div>
        <div class="absolute bottom-20 left-1/3 w-80 h-80 bg-emerald-400/5 rounded-full blur-3xl float-animation" style="animation-delay: -4s;"></div>
    </div>
    
    <div class="container mx-auto max-w-7xl relative z-10">
        <!-- Page Title -->
        <div class="text-center mb-8">
            <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold mb-3" style="font-family: 'Playfair Display', serif;">
                <span class="gradient-text">ETEEAP</span> <span class="text-gray-800">User Management</span>
            </h1>
            <p class="text-gray-600 text-base md:text-lg">Manage all system users and their roles</p>
        </div>

        @php
            $roles = [
                1 => ['name' => 'Applicant', 'avatar' => 'from-[#006633] to-[#004d26]', 'role' => 'bg-emerald-100 text-emerald-700', 'icon' => 'fa-user-graduate'],
                2 => ['name' => 'Admin', 'avatar' => 'from-rose-500 to-red-600', 'role' => 'bg-rose-100 text-rose-700', 'icon' => 'fa-user-shield'],
                3 => ['name' => 'Assessor', 'avatar' => 'from-[#D4AF37] to-[#FFD700]', 'role' => 'bg-amber-100 text-amber-700', 'icon' => 'fa-clipboard-check'],
            ];
            
            // Exclude current admin from counts
            $filteredUsers = $users->where('id', '!=', auth()->id());
            $roleCounts = [
                'all' => $filteredUsers->count(),
                '1' => $filteredUsers->where('role', 1)->count(),
                '2' => $filteredUsers->where('role', 2)->count(),
                '3' => $filteredUsers->where('role', 3)->count(),
            ];
        @endphp

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-3 md:gap-4 mb-8">
            <!-- Total Users -->
            <div class="stat-card bg-white/80 backdrop-blur-xl rounded-2xl p-4 md:p-5 text-center border border-[#006633]/10 shadow-lg shadow-[#006633]/5">
                <div class="w-12 h-12 bg-gradient-to-br from-[#006633] to-[#004d26] rounded-xl flex items-center justify-center mx-auto mb-3 shadow-lg shadow-[#006633]/30">
                    <i class="fas fa-users text-white text-lg"></i>
                </div>
                <div class="text-3xl md:text-4xl font-extrabold text-gray-900 mb-1">{{ $roleCounts['all'] }}</div>
                <div class="text-gray-500 text-xs font-semibold uppercase tracking-wider">Total Users</div>
            </div>
            <!-- Applicants -->
            <div class="stat-card bg-white/80 backdrop-blur-xl rounded-2xl p-4 md:p-5 text-center border border-emerald-100 shadow-lg shadow-emerald-500/5">
                <div class="w-12 h-12 bg-gradient-to-br from-[#006633] to-[#004d26] rounded-xl flex items-center justify-center mx-auto mb-3 shadow-lg shadow-[#006633]/30">
                    <i class="fas fa-user-graduate text-white text-lg"></i>
                </div>
                <div class="text-3xl md:text-4xl font-extrabold text-gray-900 mb-1">{{ $roleCounts['1'] }}</div>
                <div class="text-gray-500 text-xs font-semibold uppercase tracking-wider">Applicants</div>
            </div>
            <!-- Assessors -->
            <div class="stat-card bg-white/80 backdrop-blur-xl rounded-2xl p-4 md:p-5 text-center border border-amber-100 shadow-lg shadow-[#D4AF37]/10">
                <div class="w-12 h-12 bg-gradient-to-br from-[#D4AF37] to-[#FFD700] rounded-xl flex items-center justify-center mx-auto mb-3 shadow-lg shadow-[#D4AF37]/30">
                    <i class="fas fa-clipboard-check text-white text-lg"></i>
                </div>
                <div class="text-3xl md:text-4xl font-extrabold text-gray-900 mb-1">{{ $roleCounts['3'] }}</div>
                <div class="text-gray-500 text-xs font-semibold uppercase tracking-wider">Assessors</div>
            </div>
        </div>

        <!-- Main Card -->
        <div class="modern-card rounded-3xl overflow-hidden">
            <!-- Header with Search -->
            <div class="animated-gradient p-6 md:p-8 flex flex-wrap justify-between items-center gap-4 relative overflow-hidden">
                <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/5 to-transparent"></div>
                <h4 class="text-white text-xl md:text-2xl font-bold m-0 flex items-center gap-3 relative z-10">
                    <div class="w-12 h-12 bg-[#FFD700]/20 backdrop-blur-xl rounded-xl flex items-center justify-center border border-[#FFD700]/30">
                        <i class="fas fa-users text-[#FFD700]"></i>
                    </div>
                    Registered Users
                </h4>
                <div class="relative w-full sm:w-auto sm:min-w-[300px] md:min-w-[350px] z-10">
                    <i class="fa fa-search absolute left-4 md:left-5 top-1/2 -translate-y-1/2 text-[#006633] text-sm"></i>
                    <input type="text" id="searchBar" placeholder="Search by name or email..." class="w-full pl-11 md:pl-14 pr-4 md:pr-5 py-3 md:py-4 rounded-2xl text-sm md:text-base bg-white/95 backdrop-blur-xl focus:outline-none focus:ring-4 focus:ring-[#FFD700]/30 transition-all duration-300 border-2 border-white/50 shadow-lg">
                </div>
            </div>

            <!-- Filter Tabs -->
            <div class="flex flex-wrap bg-gray-50 p-2 gap-1.5 overflow-x-auto">
                <button class="filter-tab active px-4 md:px-6 py-2.5 md:py-3 rounded-xl font-semibold text-xs md:text-sm transition-all duration-300 whitespace-nowrap" onclick="filterUsers('all', this)">
                    All <span class="inline-block bg-white/20 px-2 py-0.5 rounded-full text-xs ml-1">{{ $roleCounts['all'] }}</span>
                </button>
                <button class="filter-tab px-4 md:px-6 py-2.5 md:py-3 rounded-xl font-semibold text-xs md:text-sm text-gray-600 transition-all duration-300 hover:bg-white whitespace-nowrap" onclick="filterUsers('3', this)">
                    Assessor <span class="inline-block bg-gray-200 px-2 py-0.5 rounded-full text-xs ml-1">{{ $roleCounts['3'] }}</span>
                </button>
                <button class="filter-tab px-4 md:px-6 py-2.5 md:py-3 rounded-xl font-semibold text-xs md:text-sm text-gray-600 transition-all duration-300 hover:bg-white whitespace-nowrap" onclick="filterUsers('1', this)">
                    Applicant <span class="inline-block bg-gray-200 px-2 py-0.5 rounded-full text-xs ml-1">{{ $roleCounts['1'] }}</span>
                </button>
            </div>

            <!-- User Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 md:gap-5 p-5 md:p-8 bg-gradient-to-br from-gray-50/50 to-white" id="userGrid">
                @forelse($users->where('id', '!=', auth()->id()) as $user)
                    <div class="user-card group bg-white rounded-2xl p-5 transition-all duration-500 border-2 border-transparent hover:border-[#D4AF37]/50 hover:shadow-xl hover:shadow-[#006633]/10 hover:-translate-y-1 relative overflow-hidden" data-role="{{ $user->role }}">
                        {{-- Left accent bar --}}
                        <div class="absolute top-0 left-0 w-1.5 h-full bg-gradient-to-b {{ $roles[$user->role]['avatar'] ?? 'from-[#006633] to-[#004d26]' }}"></div>
                        
                        {{-- Hover background effect --}}
                        <div class="absolute inset-0 bg-gradient-to-r from-[#006633]/[0.02] to-transparent opacity-0 group-hover:opacity-100 transition-opacity pointer-events-none"></div>
                        
                        {{-- Card content --}}
                        <div class="pl-3 relative z-10">
                            {{-- Top row: Avatar + Action Buttons --}}
                            <div class="flex items-start justify-between gap-3 mb-3">
                                {{-- Avatar --}}
                                <div class="relative w-14 h-14 rounded-2xl flex items-center justify-center text-xl font-bold text-white flex-shrink-0 bg-gradient-to-br {{ $roles[$user->role]['avatar'] ?? 'from-[#006633] to-[#004d26]' }} shadow-lg group-hover:scale-110 transition-transform duration-300">
                                    {{ strtoupper(substr($user->name, 0, 1)) }}
                                </div>
                                
                                {{-- Action Buttons --}}
                                <div class="flex items-center gap-2 flex-shrink-0">
                                    {{-- Email Button - Opens compose email modal --}}
                                    <button type="button" 
                                        class="btn-modern inline-flex items-center bg-gradient-to-r from-[#006633] to-[#004d26] text-white px-3 py-2.5 rounded-xl font-bold text-xs transition-all duration-300 shadow-lg shadow-[#006633]/30 hover:shadow-xl email-btn"
                                        data-bs-toggle="modal" 
                                        data-bs-target="#composeEmailModal"
                                        data-email="{{ $user->email }}"
                                        data-name="{{ $user->name }}"
                                        title="Send email to {{ $user->name }}">
                                        <i class="fas fa-envelope"></i>
                                    </button>
                                    {{-- Edit Button --}}
                                    <a href="{{ route('admin.users.edit', $user->id) }}" class="btn-modern inline-flex items-center bg-gradient-to-r from-[#D4AF37] to-[#FFD700] text-[#004422] px-4 py-2.5 rounded-xl font-bold text-xs transition-all duration-300 text-center no-underline whitespace-nowrap shadow-lg shadow-[#D4AF37]/30 hover:shadow-xl">
                                        <i class="fas fa-pen mr-1.5"></i> Edit
                                    </a>
                                </div>
                            </div>
                            
                            {{-- User Info --}}
                            <div class="space-y-1">
                                {{-- Name --}}
                                <h3 class="font-bold text-gray-900 text-base group-hover:text-[#006633] transition-colors break-words leading-tight">
                                    {{ $user->name }}
                                </h3>
                                
                                {{-- Email --}}
                                <p class="text-gray-500 text-sm break-all leading-relaxed">
                                    {{ $user->email }}
                                </p>
                                
                                {{-- Role Badge --}}
                                <div class="pt-2">
                                    <span class="inline-flex items-center gap-1.5 text-xs px-3 py-1.5 rounded-full font-bold uppercase tracking-wide {{ $roles[$user->role]['role'] ?? 'bg-emerald-100 text-emerald-700' }}">
                                        <i class="fas {{ $roles[$user->role]['icon'] ?? 'fa-user' }} text-[10px]"></i>
                                        {{ $roles[$user->role]['name'] ?? 'User' }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center py-16 text-gray-400">
                        <div class="w-20 h-20 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-user-slash text-4xl text-gray-300"></i>
                        </div>
                        <h4 class="text-xl font-bold text-gray-600 mb-2">No Users Found</h4>
                        <p class="text-gray-400">There are no registered users in the system yet.</p>
                    </div>
                @endforelse
                
                <div class="hidden col-span-full text-center py-12 text-gray-400" id="noResults">
                    <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-3">
                        <i class="fas fa-search text-3xl text-gray-300"></i>
                    </div>
                    <h5 class="text-lg font-bold text-gray-600 mb-1">No matching users found</h5>
                    <p class="text-sm text-gray-400">Try adjusting your search or filter criteria</p>
                </div>
            </div>

            {{-- Pagination Controls --}}
            <div class="flex flex-col sm:flex-row items-center justify-between gap-4 px-5 md:px-8 py-5 bg-gradient-to-r from-gray-50 to-white border-t border-gray-100">
                <div class="text-sm text-gray-600 order-2 sm:order-1">
                    Showing <span id="page-start" class="font-bold text-[#006633]">1</span> to <span id="page-end" class="font-bold text-[#006633]">9</span> of <span id="page-total" class="font-bold text-[#006633]">{{ $users->count() }}</span> users
                </div>
                <div class="flex items-center gap-2 order-1 sm:order-2">
                    <button type="button" onclick="changePage(-1)" class="px-4 py-2.5 rounded-xl border-2 border-gray-200 text-gray-700 hover:bg-[#006633] hover:text-white hover:border-[#006633] transition-all duration-300 disabled:opacity-50 disabled:cursor-not-allowed" id="prev-btn">
                        <i class="fa fa-chevron-left"></i>
                    </button>
                    <div id="page-numbers" class="flex items-center gap-1"></div>
                    <button type="button" onclick="changePage(1)" class="px-4 py-2.5 rounded-xl border-2 border-gray-200 text-gray-700 hover:bg-[#006633] hover:text-white hover:border-[#006633] transition-all duration-300 disabled:opacity-50 disabled:cursor-not-allowed" id="next-btn">
                        <i class="fa fa-chevron-right"></i>
                    </button>
                </div>
            </div>

            <!-- Footer -->
            <div class="animated-gradient text-white px-5 md:px-8 py-4 flex flex-col sm:flex-row justify-between items-center gap-2 text-sm">
                <span class="flex items-center gap-2">
                    <i class="fas fa-users"></i>
                    User Count: <span id="visibleCount" class="font-bold">{{ $roleCounts['all'] }}</span>
                </span>
                <div class="flex items-center gap-3">
                    <i class="fas fa-university text-xs md:text-sm"></i>
                    <span class="text-center sm:text-left">Central Luzon State University</span>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    let currentFilter = 'all';
    let currentPage = 1;
    const ITEMS_PER_PAGE = 9;

    function filterUsers(role, btn) {
        currentFilter = role;
        
        // Update active tab - remove all active states first
        document.querySelectorAll('.filter-tab').forEach(tab => {
            tab.classList.remove('active', 'bg-gradient-to-r', 'from-[#006633]', 'to-[#004d26]', 'text-white', 'shadow-lg', 'shadow-[#006633]/30');
            tab.classList.add('text-gray-600');
            // Reset the badge styling
            const badge = tab.querySelector('span');
            if (badge) {
                badge.classList.remove('bg-white/20');
                badge.classList.add('bg-gray-200');
            }
        });
        
        // Add active state to clicked button
        btn.classList.add('active');
        btn.classList.remove('text-gray-600');
        const activeBadge = btn.querySelector('span');
        if (activeBadge) {
            activeBadge.classList.remove('bg-gray-200');
            activeBadge.classList.add('bg-white/20');
        }

        // Reset to page 1 when filter changes
        currentPage = 1;
        applyFiltersAndPagination();
    }

    function applyFiltersAndPagination() {
        const searchValue = document.getElementById('searchBar').value.toLowerCase();
        const cards = document.querySelectorAll('.user-card');
        let visibleCards = [];

        // First, filter cards based on role and search
        cards.forEach(card => {
            const matchesRole = currentFilter === 'all' || card.getAttribute('data-role') === currentFilter;
            const text = card.innerText.toLowerCase();
            const matchesSearch = text.includes(searchValue);

            if (matchesRole && matchesSearch) {
                visibleCards.push(card);
            }
        });

        // Hide all cards first
        cards.forEach(card => card.style.display = 'none');

        // Calculate pagination
        const totalItems = visibleCards.length;
        const totalPages = Math.ceil(totalItems / ITEMS_PER_PAGE);
        const startIndex = (currentPage - 1) * ITEMS_PER_PAGE;
        const endIndex = Math.min(startIndex + ITEMS_PER_PAGE, totalItems);

        // Show only cards for current page
        for (let i = startIndex; i < endIndex; i++) {
            if (visibleCards[i]) {
                visibleCards[i].style.display = '';
            }
        }

        // Update pagination info
        document.getElementById('page-start').textContent = totalItems > 0 ? startIndex + 1 : 0;
        document.getElementById('page-end').textContent = endIndex;
        document.getElementById('page-total').textContent = totalItems;

        // Update page buttons
        updatePageButtons(totalPages);

        // Update prev/next buttons
        const prevBtn = document.getElementById('prev-btn');
        const nextBtn = document.getElementById('next-btn');
        prevBtn.disabled = currentPage <= 1;
        nextBtn.disabled = currentPage >= totalPages || totalPages === 0;

        // Show/hide no results message
        const noResults = document.getElementById('noResults');
        if (totalItems === 0 && cards.length > 0) {
            noResults.classList.remove('hidden');
            noResults.classList.add('block');
        } else {
            noResults.classList.add('hidden');
            noResults.classList.remove('block');
        }

        // Update count
        document.getElementById('visibleCount').textContent = totalItems;
    }

    function updatePageButtons(totalPages) {
        const container = document.getElementById('page-numbers');
        container.innerHTML = '';

        if (totalPages <= 1) return;

        // Show max 5 page buttons on desktop, 3 on mobile
        const isMobile = window.innerWidth < 640;
        const maxButtons = isMobile ? 3 : 5;
        
        let startPage = Math.max(1, currentPage - Math.floor(maxButtons / 2));
        let endPage = Math.min(totalPages, startPage + maxButtons - 1);

        if (endPage - startPage < maxButtons - 1) {
            startPage = Math.max(1, endPage - maxButtons + 1);
        }

        for (let i = startPage; i <= endPage; i++) {
            const pageBtn = document.createElement('button');
            pageBtn.type = 'button';
            pageBtn.textContent = i;
            pageBtn.className = `px-3 md:px-4 py-2 rounded-lg text-sm font-semibold transition-all duration-300 ${
                i === currentPage 
                    ? 'bg-gradient-to-r from-[#006633] to-[#004d26] text-white shadow-lg' 
                    : 'border-2 border-gray-200 text-gray-700 hover:bg-gray-50'
            }`;
            pageBtn.onclick = () => goToPage(i);
            container.appendChild(pageBtn);
        }
    }

    function changePage(direction) {
        const cards = document.querySelectorAll('.user-card');
        const searchValue = document.getElementById('searchBar').value.toLowerCase();
        let visibleCount = 0;

        cards.forEach(card => {
            const matchesRole = currentFilter === 'all' || card.getAttribute('data-role') === currentFilter;
            const text = card.innerText.toLowerCase();
            const matchesSearch = text.includes(searchValue);
            if (matchesRole && matchesSearch) visibleCount++;
        });

        const totalPages = Math.ceil(visibleCount / ITEMS_PER_PAGE);
        currentPage = Math.max(1, Math.min(totalPages, currentPage + direction));
        applyFiltersAndPagination();
    }

    function goToPage(pageNumber) {
        currentPage = pageNumber;
        applyFiltersAndPagination();
    }

    // Search functionality
    document.getElementById('searchBar').addEventListener('keyup', function() {
        currentPage = 1; // Reset to page 1 when searching
        applyFiltersAndPagination();
    });

    // Update pagination on window resize
    window.addEventListener('resize', function() {
        applyFiltersAndPagination();
    });

    // Initialize pagination on page load
    document.addEventListener('DOMContentLoaded', function() {
        applyFiltersAndPagination();
    });
</script>

{{-- Include Email Compose Modal --}}
@include('admin.partials.compose-email-modal')

{{-- Bootstrap JS for Modal --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

@endsection