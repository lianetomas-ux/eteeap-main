@extends('layouts.admin')

@section('content')

<style>
@import url('https://fonts.googleapis.com/css2?family=Libre+Franklin:wght@300;400;500;600;700&family=Playfair+Display:wght@500;600;700&display=swap');

* {
    font-family: 'Libre Franklin', -apple-system, BlinkMacSystemFont, sans-serif;
}

/* Slider item visibility for pagination */
.slider-item {
    display: none;
}

.slider-item.active {
    display: block;
    animation: fadeInUp 0.3s ease;
}

/* Custom Pagination Styling */
.pagination-container {
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 1rem;
    flex-wrap: wrap;
}

.pagination-wrapper {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 0.5rem;
    flex-wrap: wrap;
}

.pagination-btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    min-width: 2.25rem;
    height: 2.25rem;
    padding: 0;
    border-radius: 0.375rem;
    font-size: 0.875rem;
    font-weight: 500;
    transition: all 0.2s;
    border: 1px solid #d1d5db;
    background: white;
    color: #6b7280;
    text-decoration: none;
    cursor: pointer;
}

.pagination-btn:hover:not(.disabled):not(.active) {
    background: #f9fafb;
    border-color: #9ca3af;
    color: #374151;
}

.pagination-btn.active {
    background: #006633;
    color: white;
    border-color: #006633;
}

.pagination-btn.disabled {
    opacity: 0.5;
    cursor: not-allowed;
    pointer-events: none;
    background: #f9fafb;
}

.pagination-dots {
    color: #6b7280;
    font-weight: normal;
    padding: 0 0.25rem;
}

/* Animation */
@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(15px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@media (max-width: 640px) {
    .pagination-btn {
        min-width: 1.75rem;
        height: 1.75rem;
        padding: 0 0.5rem;
        font-size: 0.75rem;
    }
}
</style>

<div class="min-h-screen bg-gradient-to-br from-[#FFFEF7] via-[#f0f7f0] to-[#FEFDFB] p-3 sm:p-4 md:p-6 lg:p-8 relative">
    
    {{-- Background decoration --}}
    <div class="absolute top-0 left-0 right-0 h-[200px] md:h-[300px] pointer-events-none opacity-30">
        <div class="absolute top-[40%] left-[20%] w-[80%] h-[50%] bg-[#006633] rounded-full blur-[100px] opacity-10"></div>
        <div class="absolute top-[30%] right-[20%] w-[60%] h-[40%] bg-[#D4AF37] rounded-full blur-[100px] opacity-15"></div>
    </div>

    <div class="flex justify-center relative z-10">
        <div class="w-full max-w-7xl">

            <div class="bg-[#FEFDFB] rounded-2xl sm:rounded-[20px] shadow-[0_4px_6px_rgba(0,102,51,0.04),0_20px_40px_rgba(0,102,51,0.08)] border border-[rgba(0,102,51,0.12)] overflow-hidden">
                
                {{-- Card Header --}}
                <div class="bg-gradient-to-br from-[#006633] to-[#004d26] p-4 sm:p-5 md:p-6 lg:p-8 relative overflow-hidden flex flex-col sm:flex-row flex-wrap justify-between items-start sm:items-center gap-3 md:gap-4">
                    {{-- Decorative elements --}}
                    <div class="absolute -top-1/2 -right-[10%] w-[150px] md:w-[200px] h-[150px] md:h-[200px] bg-[#FFD700] rounded-full blur-2xl opacity-15 pointer-events-none"></div>
                    <div class="absolute bottom-0 left-0 right-0 h-[2px] md:h-1 bg-gradient-to-r from-[#FFD700] via-[#D4AF37] to-[#FFD700]"></div>
                    
                    <h5 class="text-white text-lg sm:text-xl md:text-2xl font-semibold flex items-center gap-2 md:gap-3 m-0 relative z-10" style="font-family: 'Playfair Display', Georgia, serif;">
                        <i class="fa fa-image text-[#FFD700] text-base sm:text-lg md:text-xl"></i>
                        <span>Slider Management</span>
                    </h5>
                    <a href="{{ route('admin.slider.create') }}" class="w-full sm:w-auto bg-gradient-to-br from-[#D4AF37] to-[#FFD700] text-[#004d26] px-4 sm:px-5 md:px-6 py-2 sm:py-2.5 md:py-3 rounded-full font-semibold text-xs sm:text-sm md:text-base inline-flex items-center justify-center gap-2 shadow-[0_4px_15px_rgba(212,175,55,0.4)] transition-all duration-250 hover:-translate-y-0.5 hover:shadow-[0_6px_20px_rgba(212,175,55,0.5)] relative z-10 no-underline">
                        <i class="fa fa-plus text-xs sm:text-sm"></i>
                        <span>Add New Slider</span>
                    </a>
                </div>

                <div class="p-4 sm:p-5 md:p-6 lg:p-8">
                    
                    {{-- Stats Bar --}}
                    <div class="flex flex-wrap gap-3 sm:gap-4 md:gap-6 mb-5 sm:mb-6 md:mb-8 pb-4 sm:pb-5 md:pb-6 border-b border-[rgba(0,102,51,0.12)]">
                        <div class="flex items-center gap-2 sm:gap-3">
                            <div class="w-10 h-10 sm:w-11 sm:h-11 md:w-[45px] md:h-[45px] rounded-xl bg-gradient-to-br from-[#dbeafe] to-[#bfdbfe] flex items-center justify-center text-[#2563eb] text-base sm:text-lg md:text-xl flex-shrink-0">
                                <i class="fa fa-images"></i>
                            </div>
                            <div>
                                <h4 class="text-lg sm:text-xl md:text-2xl font-bold text-[#1a2e1a] m-0 leading-none mb-0.5 sm:mb-1" id="totalSlidersCount">{{ count($sliders) }}</h4>
                                <span class="text-[10px] sm:text-xs md:text-sm text-[#3d5a3d]">Total Sliders</span>
                            </div>
                        </div>
                        <div class="flex items-center gap-2 sm:gap-3">
                            <div class="w-10 h-10 sm:w-11 sm:h-11 md:w-[45px] md:h-[45px] rounded-xl bg-gradient-to-br from-[#dcfce7] to-[#bbf7d0] flex items-center justify-center text-[#006633] text-base sm:text-lg md:text-xl flex-shrink-0">
                                <i class="fa fa-check-circle"></i>
                            </div>
                            <div>
                                <h4 class="text-lg sm:text-xl md:text-2xl font-bold text-[#1a2e1a] m-0 leading-none mb-0.5 sm:mb-1">{{ $sliders->where('active', true)->count() }}</h4>
                                <span class="text-[10px] sm:text-xs md:text-sm text-[#3d5a3d]">Active</span>
                            </div>
                        </div>
                        <div class="flex items-center gap-2 sm:gap-3">
                            <div class="w-10 h-10 sm:w-11 sm:h-11 md:w-[45px] md:h-[45px] rounded-xl bg-gradient-to-br from-[#f3f4f6] to-[#e5e7eb] flex items-center justify-center text-[#6b7280] text-base sm:text-lg md:text-xl flex-shrink-0">
                                <i class="fa fa-pause-circle"></i>
                            </div>
                            <div>
                                <h4 class="text-lg sm:text-xl md:text-2xl font-bold text-[#1a2e1a] m-0 leading-none mb-0.5 sm:mb-1">{{ $sliders->where('active', false)->count() }}</h4>
                                <span class="text-[10px] sm:text-xs md:text-sm text-[#3d5a3d]">Inactive</span>
                            </div>
                        </div>
                    </div>

                    @if(count($sliders) > 0)
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3 sm:gap-4 md:gap-5 lg:gap-6 mb-5 sm:mb-6" id="slidersGrid">
                        @foreach($sliders as $index => $slider)
                        <div class="slider-item bg-white rounded-xl sm:rounded-2xl overflow-hidden border border-[rgba(0,102,51,0.12)] transition-all duration-300 hover:-translate-y-1 hover:shadow-[0_12px_30px_rgba(0,102,51,0.12)]" data-index="{{ $index }}">
                            <div class="relative h-36 sm:h-40 md:h-[180px] bg-gradient-to-br from-gray-100 to-gray-200 overflow-hidden">
                                @if ($slider->image_path && file_exists(public_path($slider->image_path)))
                                    <img src="{{ asset($slider->image_path) }}" alt="{{ $slider->title }}" class="w-full h-full object-cover transition-transform duration-300 hover:scale-105">
                                @else
                                    <div class="flex flex-col items-center justify-center h-full text-gray-400 text-xs sm:text-sm md:text-base gap-1.5 sm:gap-2">
                                        <i class="fa fa-image text-2xl sm:text-3xl md:text-4xl opacity-50"></i>
                                        <span>No Image</span>
                                    </div>
                                @endif
                                
                                @if ($slider->active)
                                    <span class="absolute top-2 sm:top-3 md:top-4 right-2 sm:right-3 md:right-4 px-2 sm:px-2.5 md:px-3.5 py-0.5 sm:py-1 md:py-1.5 rounded-full text-[9px] sm:text-[10px] md:text-xs font-bold uppercase tracking-wider bg-gradient-to-br from-[#008844] to-[#006633] text-white shadow-[0_2px_8px_rgba(0,102,51,0.3)]">
                                        <i class="fa fa-check text-[8px] sm:text-[9px]"></i> Active
                                    </span>
                                @else
                                    <span class="absolute top-2 sm:top-3 md:top-4 right-2 sm:right-3 md:right-4 px-2 sm:px-2.5 md:px-3.5 py-0.5 sm:py-1 md:py-1.5 rounded-full text-[9px] sm:text-[10px] md:text-xs font-bold uppercase tracking-wider bg-[rgba(107,114,128,0.9)] text-white">
                                        Inactive
                                    </span>
                                @endif
                            </div>
                            
                            <div class="p-3 sm:p-4 md:p-5">
                                <h3 class="font-semibold text-sm sm:text-base md:text-lg text-[#1a2e1a] mb-2.5 sm:mb-3 md:mb-4 line-clamp-2 min-h-[2.5rem] sm:min-h-[3rem] md:min-h-[3.5rem]">{{ $slider->title ?: 'Untitled Slider' }}</h3>
                                
                                <div class="flex gap-2">
                                    <a href="{{ route('admin.slider.edit', $slider->id) }}" class="flex-1 px-2.5 sm:px-3 md:px-4 py-2 sm:py-2 md:py-2.5 rounded-lg text-[10px] sm:text-xs md:text-sm font-semibold bg-gradient-to-br from-[#3b82f6] to-[#2563eb] text-white inline-flex items-center justify-center gap-1 sm:gap-1.5 md:gap-2 transition-all duration-200 hover:-translate-y-0.5 hover:shadow-[0_4px_12px_rgba(37,99,235,0.35)] no-underline">
                                        <i class="fa fa-pencil text-[9px] sm:text-xs"></i>
                                        <span>Edit</span>
                                    </a>
                                    <form action="{{ route('admin.slider.destroy', $slider->id) }}" method="POST" class="flex-1" onsubmit="return confirmDelete(event)">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="w-full px-2.5 sm:px-3 md:px-4 py-2 sm:py-2 md:py-2.5 rounded-lg text-[10px] sm:text-xs md:text-sm font-semibold bg-gradient-to-br from-[#f87171] to-[#ef4444] text-white inline-flex items-center justify-center gap-1 sm:gap-1.5 md:gap-2 transition-all duration-200 hover:-translate-y-0.5 hover:shadow-[0_4px_12px_rgba(239,68,68,0.35)]">
                                            <i class="fa fa-trash text-[9px] sm:text-xs"></i>
                                            <span>Delete</span>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    {{-- Pagination Controls --}}
                    <div id="paginationControls" class="border-t border-[rgba(0,102,51,0.12)] pt-4 sm:pt-5">
                        <div class="pagination-container">
                            {{-- Page Info on the left --}}
                            <div class="text-[11px] sm:text-xs md:text-sm text-[#6b7280] w-full sm:w-auto text-center sm:text-left" id="pageInfo">
                                <!-- Page info will be inserted here by JavaScript -->
                            </div>

                            {{-- Pagination buttons on the right --}}
                            <div class="pagination-wrapper w-full sm:w-auto justify-center sm:justify-end" id="paginationWrapper">
                                <!-- Pagination buttons will be inserted here by JavaScript -->
                            </div>
                        </div>
                    </div>
                    @else
                    <div class="text-center py-10 sm:py-12 md:py-16 text-gray-400">
                        <div class="w-16 h-16 sm:w-20 sm:h-20 md:w-[100px] md:h-[100px] bg-gradient-to-br from-[#f0fdf4] to-[#dcfce7] rounded-full flex items-center justify-center mx-auto mb-4 sm:mb-5 md:mb-6">
                            <i class="fa fa-image text-2xl sm:text-3xl md:text-4xl text-[#006633] opacity-50"></i>
                        </div>
                        <h6 class="text-[#3d5a3d] font-semibold text-sm sm:text-base md:text-lg mb-1.5 sm:mb-2">No Sliders Found</h6>
                        <p class="text-xs sm:text-sm md:text-base mb-4 sm:mb-5 md:mb-6 px-4">Get started by adding your first slider image.</p>
                        <a href="{{ route('admin.slider.create') }}" class="bg-gradient-to-br from-[#D4AF37] to-[#FFD700] text-[#004d26] px-4 sm:px-5 md:px-6 py-2 sm:py-2.5 md:py-3 rounded-full font-semibold text-xs sm:text-sm md:text-base inline-flex items-center gap-2 shadow-[0_4px_15px_rgba(212,175,55,0.4)] transition-all duration-250 hover:-translate-y-0.5 hover:shadow-[0_6px_20px_rgba(212,175,55,0.5)] no-underline">
                            <i class="fa fa-plus"></i>
                            <span>Add New Slider</span>
                        </a>
                    </div>
                    @endif

                </div>

                <div class="bg-gradient-to-r from-[#006633] to-[#004d26] px-4 sm:px-5 md:px-8 py-2 sm:py-2.5 md:py-3 flex flex-col sm:flex-row justify-between items-center gap-1.5 sm:gap-2">
                    <span class="text-white/90 text-[9px] sm:text-[10px] md:text-xs italic text-center sm:text-left">Sieving for Excellence</span>
                    <span class="flex items-center gap-1.5 sm:gap-2 text-[#FFD700] font-semibold text-[9px] sm:text-[10px] md:text-xs">
                        <i class="fa fa-university"></i>
                        <span>CLSU</span>
                    </span>
                </div>
            </div>

        </div>
    </div>
</div>

{{-- Success Message --}}
@if (session('success'))
    <div data-success-message="{{ session('success') }}" style="display: none;"></div>
@endif

@if (session('error'))
    <div data-error-message="{{ session('error') }}" style="display: none;"></div>
@endif

<script>
    function confirmDelete(e) {
        e.preventDefault();

        Swal.fire({
            title: 'Are you sure?',
            text: "You can't undo this action!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#006633',
            cancelButtonColor: '#ef4444',
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                e.target.submit();
            }
        });

        return false;
    }
</script>

{{-- Client-Side Pagination Script --}}
<script>
document.addEventListener('DOMContentLoaded', function() {
    const itemsPerPage = 6;
    let currentPage = 1;
    const items = document.querySelectorAll('.slider-item');
    const totalItems = items.length;
    const totalPages = Math.ceil(totalItems / itemsPerPage);

    function showPage(page) {
        // Hide all items
        items.forEach(item => {
            item.classList.remove('active');
        });

        // Calculate start and end index
        const start = (page - 1) * itemsPerPage;
        const end = start + itemsPerPage;

        // Show items for current page
        for (let i = start; i < end && i < totalItems; i++) {
            items[i].classList.add('active');
        }

        // Update pagination controls
        updatePagination(page);
        
        // Update page info
        updatePageInfo(page, start, end);
    }

    function updatePagination(page) {
        const wrapper = document.getElementById('paginationWrapper');
        if (!wrapper) return;

        let html = '';

        // Previous button
        if (page === 1) {
            html += '<button class="pagination-btn disabled"><i class="fa fa-chevron-left"></i></button>';
        } else {
            html += `<button class="pagination-btn" onclick="goToPage(${page - 1})"><i class="fa fa-chevron-left"></i></button>`;
        }

        // Page numbers
        let start = Math.max(1, page - 1);
        let end = Math.min(totalPages, page + 1);

        if (start > 1) {
            html += `<button class="pagination-btn" onclick="goToPage(1)">1</button>`;
            if (start > 2) {
                html += '<span class="pagination-dots">•••</span>';
            }
        }

        for (let i = start; i <= end; i++) {
            if (i === page) {
                html += `<button class="pagination-btn active">${i}</button>`;
            } else {
                html += `<button class="pagination-btn" onclick="goToPage(${i})">${i}</button>`;
            }
        }

        if (end < totalPages) {
            if (end < totalPages - 1) {
                html += '<span class="pagination-dots">•••</span>';
            }
            html += `<button class="pagination-btn" onclick="goToPage(${totalPages})">${totalPages}</button>`;
        }

        // Next button
        if (page === totalPages) {
            html += '<button class="pagination-btn disabled"><i class="fa fa-chevron-right"></i></button>';
        } else {
            html += `<button class="pagination-btn" onclick="goToPage(${page + 1})"><i class="fa fa-chevron-right"></i></button>`;
        }

        wrapper.innerHTML = html;
    }

    function updatePageInfo(page, start, end) {
        const pageInfo = document.getElementById('pageInfo');
        if (!pageInfo) return;

        const actualEnd = Math.min(end, totalItems);
        pageInfo.textContent = `Showing ${start + 1} to ${actualEnd} of ${totalItems} sliders`;
    }

    // Make goToPage function global
    window.goToPage = function(page) {
        currentPage = page;
        showPage(page);
        
        // Scroll to top of grid
        const gridElement = document.getElementById('slidersGrid');
        if (gridElement) {
            gridElement.scrollIntoView({ behavior: 'smooth', block: 'start' });
        }
    };

    // Initialize pagination if there are items
    if (totalItems > 0) {
        showPage(1);
    }
});
</script>

@endsection