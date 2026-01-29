@extends('layouts.admin')

@section('content')

<script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>

<style>
@import url('https://fonts.googleapis.com/css2?family=Libre+Franklin:wght@300;400;500;600;700&family=Playfair+Display:wght@500;600;700&display=swap');

* {
    font-family: 'Libre Franklin', -apple-system, BlinkMacSystemFont, sans-serif;
}

/* CKEditor Styling */
.ck-editor__editable_inline {
    min-height: 250px !important;
    max-height: 400px !important;
    font-family: 'Libre Franklin', sans-serif !important;
}

@media (min-width: 768px) {
    .ck-editor__editable_inline {
        min-height: 350px !important;
        max-height: 450px !important;
    }
}

.ck.ck-editor__top .ck-sticky-panel .ck-toolbar {
    background: linear-gradient(180deg, #f8fafc 0%, #f1f5f9 100%) !important;
    border-bottom: 1px solid rgba(0, 102, 51, 0.12) !important;
}

.ck.ck-editor__main>.ck-editor__editable {
    background: #fff !important;
}

/* Custom Pagination Styling */
.pagination-wrapper {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 0.5rem;
    flex-wrap: wrap;
    padding: 1rem 0;
}

.pagination-btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    min-width: 2rem;
    height: 2rem;
    padding: 0 0.75rem;
    border-radius: 0.5rem;
    font-size: 0.875rem;
    font-weight: 500;
    transition: all 0.2s;
    border: 1px solid rgba(0, 102, 51, 0.2);
    background: white;
    color: #006633;
    text-decoration: none;
    cursor: pointer;
}

.pagination-btn:hover:not(.disabled):not(.active) {
    background: #f0fdf4;
    border-color: #006633;
    transform: translateY(-1px);
}

.pagination-btn.active {
    background: linear-gradient(135deg, #006633 0%, #004d26 100%);
    color: white;
    border-color: #006633;
    box-shadow: 0 2px 8px rgba(0, 102, 51, 0.3);
}

.pagination-btn.disabled {
    opacity: 0.4;
    cursor: not-allowed;
    pointer-events: none;
}

.pagination-dots {
    color: #006633;
    font-weight: bold;
    padding: 0 0.5rem;
}

@media (max-width: 640px) {
    .pagination-btn {
        min-width: 1.75rem;
        height: 1.75rem;
        padding: 0 0.5rem;
        font-size: 0.75rem;
    }
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

.fade-in-up {
    animation: fadeInUp 0.4s ease;
}

.fade-in-up-delay {
    animation: fadeInUp 0.4s ease 0.1s both;
}

.announcement-item {
    display: none;
}

.announcement-item.active {
    display: block;
    animation: fadeInUp 0.3s ease;
}

.announcement-item.active:last-of-type {
    margin-bottom: 0 !important;
}
</style>

<div class="min-h-screen bg-gradient-to-br from-[#FFFEF7] via-[#f0f7f0] to-[#FEFDFB] p-3 sm:p-4 md:p-6 lg:p-8 relative">
    
    {{-- Background decoration --}}
    <div class="absolute top-0 left-0 right-0 h-[200px] md:h-[300px] pointer-events-none opacity-30">
        <div class="absolute top-[40%] left-[20%] w-[80%] h-[50%] bg-[#006633] rounded-full blur-[100px] opacity-10"></div>
        <div class="absolute top-[30%] right-[20%] w-[60%] h-[40%] bg-[#D4AF37] rounded-full blur-[100px] opacity-15"></div>
    </div>
    
    {{-- Page Header --}}
    <div class="mb-4 sm:mb-6 md:mb-8 relative z-10">
        <h1 class="text-xl sm:text-2xl md:text-3xl lg:text-4xl font-bold text-[#006633] mb-1 sm:mb-2 flex items-center gap-2 flex-wrap" style="font-family: 'Playfair Display', Georgia, serif;">
            <i class="fa fa-bullhorn text-[#D4AF37] text-lg sm:text-xl md:text-2xl"></i>
            <span>Announcements Management</span>
        </h1>
        <p class="text-xs sm:text-sm md:text-base text-[#3d5a3d]">Create and manage announcements for students and faculty</p>
    </div>

    {{-- Alerts --}}
    @if(session('success'))
    <div class="rounded-xl p-3 sm:p-4 mb-4 sm:mb-6 flex items-start sm:items-center gap-2 sm:gap-3 bg-gradient-to-r from-[#dcfce7] to-[#bbf7d0] text-[#166534] shadow-sm font-medium text-xs sm:text-sm">
        <i class="fa fa-check-circle text-base sm:text-lg flex-shrink-0 mt-0.5 sm:mt-0"></i>
        <span>{{ session('success') }}</span>
    </div>
    @endif
    @if(session('error'))
    <div class="rounded-xl p-3 sm:p-4 mb-4 sm:mb-6 flex items-start sm:items-center gap-2 sm:gap-3 bg-gradient-to-r from-[#fee2e2] to-[#fecaca] text-[#991b1b] shadow-sm font-medium text-xs sm:text-sm">
        <i class="fa fa-exclamation-circle text-base sm:text-lg flex-shrink-0 mt-0.5 sm:mt-0"></i>
        <span>{{ session('error') }}</span>
    </div>
    @endif

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-4 sm:gap-5 lg:gap-6">
        {{-- ================= POST ANNOUNCEMENT ================= --}}
        <div class="lg:col-span-7 fade-in-up">
            <div class="bg-[#FEFDFB] rounded-2xl sm:rounded-[20px] shadow-[0_4px_6px_rgba(0,102,51,0.04),0_20px_40px_rgba(0,102,51,0.08)] border border-[rgba(0,102,51,0.12)] overflow-hidden h-full">
                {{-- Card Header --}}
                <div class="bg-gradient-to-br from-[#006633] to-[#004d26] p-4 sm:p-5 relative overflow-hidden">
                    {{-- Decorative elements --}}
                    <div class="absolute -top-1/2 -right-[10%] w-[120px] sm:w-[150px] h-[120px] sm:h-[150px] bg-[#FFD700] rounded-full blur-2xl opacity-15 pointer-events-none"></div>
                    <div class="absolute bottom-0 left-0 right-0 h-[2px] sm:h-[3px] bg-gradient-to-r from-[#FFD700] via-[#D4AF37] to-[#FFD700]"></div>
                    
                    <h5 class="text-white text-base sm:text-lg md:text-xl font-semibold flex items-center gap-2 sm:gap-3 relative z-10" style="font-family: 'Playfair Display', Georgia, serif;">
                        <i class="fa fa-edit text-[#FFD700] text-sm sm:text-base"></i>
                        <span>Create New Announcement</span>
                    </h5>
                </div>

                <div class="p-4 sm:p-5 md:p-6">
                    <form method="POST"
                          action="{{ route('admin.announcement.store') }}"
                          enctype="multipart/form-data">
                        @csrf

                        <div class="mb-5 sm:mb-6">
                            <label class="block font-semibold text-[#1a2e1a] mb-2 text-xs sm:text-sm md:text-base">
                                Announcement Title
                                <span class="text-red-600 ml-1">*</span>
                            </label>
                            <input type="text"
                                   name="title"
                                   class="w-full px-3 sm:px-4 py-2.5 sm:py-3 md:py-3.5 border-2 border-[rgba(0,102,51,0.12)] rounded-xl text-xs sm:text-sm md:text-base bg-white text-[#1a2e1a] placeholder-gray-400 transition-all duration-300 focus:outline-none focus:border-[#006633] focus:ring-4 focus:ring-[rgba(0,102,51,0.1)]"
                                   placeholder="Enter a clear, descriptive title..."
                                   required>
                        </div>

                        <div class="mb-5 sm:mb-6">
                            <label class="block font-semibold text-[#1a2e1a] mb-2 text-xs sm:text-sm md:text-base">
                                Announcement Content
                                <span class="text-red-600 ml-1">*</span>
                            </label>
                            <div class="border-2 border-[rgba(0,102,51,0.12)] rounded-xl overflow-hidden transition-all duration-300 focus-within:border-[#006633] focus-within:ring-4 focus-within:ring-[rgba(0,102,51,0.1)]">
                                <textarea name="description" id="editor"></textarea>
                            </div>
                        </div>

                        <button type="submit" class="w-full sm:w-auto bg-gradient-to-br from-[#006633] to-[#004d26] text-white px-5 sm:px-6 md:px-8 py-2.5 sm:py-3 md:py-3.5 rounded-full font-semibold text-xs sm:text-sm md:text-base inline-flex items-center justify-center gap-2 sm:gap-3 shadow-[0_4px_15px_rgba(0,102,51,0.3)] transition-all duration-300 hover:-translate-y-0.5 hover:shadow-[0_6px_25px_rgba(0,102,51,0.4)] hover:from-[#008844] hover:to-[#006633] active:translate-y-0">
                            <i class="fa fa-paper-plane text-xs sm:text-sm"></i>
                            <span>Publish Announcement</span>
                        </button>
                    </form>
                </div>

                <div class="bg-gradient-to-r from-[#006633] to-[#004d26] px-4 sm:px-5 md:px-6 py-2 sm:py-2.5 md:py-3 flex flex-col sm:flex-row justify-between items-center gap-1.5 sm:gap-2">
                    <span class="text-white/90 text-[9px] sm:text-[10px] md:text-xs italic tracking-wide text-center sm:text-left">Sieving for Excellence</span>
                    <span class="flex items-center gap-1.5 sm:gap-2 text-[#FFD700] font-semibold text-[9px] sm:text-[10px] md:text-xs">
                        <i class="fa fa-university"></i>
                        <span>CLSU</span>
                    </span>
                </div>
            </div>
        </div>

        {{-- ================= EXISTING ANNOUNCEMENTS ================= --}}
        <div class="lg:col-span-5 fade-in-up-delay">
            <div class="bg-[#FEFDFB] rounded-2xl sm:rounded-[20px] shadow-[0_4px_6px_rgba(0,102,51,0.04),0_20px_40px_rgba(0,102,51,0.08)] border border-[rgba(0,102,51,0.12)] overflow-hidden h-full flex flex-col">
                {{-- Card Header --}}
                <div class="bg-gradient-to-br from-[#006633] to-[#004d26] p-4 sm:p-5 relative overflow-hidden flex-shrink-0">
                    {{-- Decorative elements --}}
                    <div class="absolute -top-1/2 -right-[10%] w-[120px] sm:w-[150px] h-[120px] sm:h-[150px] bg-[#FFD700] rounded-full blur-2xl opacity-15 pointer-events-none"></div>
                    <div class="absolute bottom-0 left-0 right-0 h-[2px] sm:h-[3px] bg-gradient-to-r from-[#FFD700] via-[#D4AF37] to-[#FFD700]"></div>
                    
                    <h5 class="text-white text-base sm:text-lg md:text-xl font-semibold flex items-center gap-2 sm:gap-3 relative z-10 flex-wrap" style="font-family: 'Playfair Display', Georgia, serif;">
                        <i class="fa fa-list-alt text-[#FFD700] text-sm sm:text-base"></i>
                        <span>Published Announcements</span>
                        <span class="bg-gradient-to-br from-[#D4AF37] to-[#FFD700] text-[#004d26] px-2 sm:px-2.5 py-0.5 sm:py-1 rounded-full text-[9px] sm:text-[10px] md:text-xs font-bold" id="totalCount">{{ $posts->count() }}</span>
                    </h5>
                </div>

                <div class="p-4 sm:p-5 md:p-6 flex-1 flex flex-col">
                    @if($posts->count() > 0)
                        <div id="announcementsList" class="mb-4">
                            @foreach($posts as $index => $post)
                                <div class="announcement-item bg-gradient-to-br from-[#f0fdf4] to-[#ecfdf5] border-l-[3px] sm:border-l-4 border-[#006633] rounded-r-xl p-3 sm:p-4 md:p-5 mb-3 sm:mb-3.5 transition-all duration-250 hover:shadow-md hover:-translate-y-0.5 relative overflow-hidden group" data-index="{{ $index }}">
                                    {{-- Hover effect overlay --}}
                                    <div class="absolute inset-0 bg-gradient-to-r from-[#006633]/5 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-250 pointer-events-none"></div>
                                    
                                    <div class="relative z-10">
                                        <div class="flex justify-between items-start gap-2 sm:gap-3 mb-2">
                                            <span class="font-bold text-[#006633] text-xs sm:text-sm md:text-base leading-snug flex-1 break-words" style="font-family: 'Playfair Display', Georgia, serif;">
                                                {{ $post->title }}
                                            </span>
                                            
                                            <form action="{{ route('admin.announcement.destroy', $post->id) }}"
                                                  method="POST"
                                                  onsubmit="return confirm('Are you sure you want to delete this announcement?')"
                                                  class="flex-shrink-0">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="bg-gradient-to-br from-red-50 to-red-100 text-red-600 px-2 sm:px-2.5 md:px-3 py-1.5 sm:py-1.5 md:py-2 rounded-lg text-[10px] sm:text-xs md:text-sm font-medium flex items-center gap-1 sm:gap-1.5 md:gap-2 border border-red-200/50 transition-all duration-200 hover:from-red-500 hover:to-red-600 hover:text-white hover:shadow-md hover:-translate-y-0.5 active:translate-y-0">
                                                    <i class="fa fa-trash text-[9px] sm:text-xs"></i>
                                                    <span class="hidden xs:inline">Delete</span>
                                                </button>
                                            </form>
                                        </div>
                                        
                                        <p class="text-[#3d5a3d] text-[10px] sm:text-xs md:text-sm leading-relaxed mb-2 sm:mb-3 break-words">
                                            {!! Str::limit(strip_tags($post->description), 100) !!}
                                        </p>
                                        
                                        <div class="flex flex-wrap items-center gap-1.5 sm:gap-2 md:gap-3 text-[9px] sm:text-[10px] md:text-xs text-[#3d5a3d]/70">
                                            <span class="flex items-center gap-1">
                                                <i class="fa fa-calendar"></i>
                                                <span>{{ $post->created_at ? $post->created_at->setTimezone('Asia/Manila')->format('M d, Y') : 'Recently' }}</span>
                                            </span>
                                            <span class="text-[#3d5a3d]/30 hidden xs:inline">•</span>
                                            <span class="flex items-center gap-1">
                                                <i class="fa fa-clock"></i>
                                                <span>{{ $post->created_at ? $post->created_at->setTimezone('Asia/Manila')->format('h:i A') : '' }}</span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        {{-- Custom Pagination --}}
                        <div id="paginationControls" class="border-t border-[rgba(0,102,51,0.12)] pt-3 sm:pt-4 mt-auto flex-shrink-0">
                            <div class="pagination-wrapper" id="paginationWrapper">
                                <!-- Pagination buttons will be inserted here by JavaScript -->
                            </div>

                            {{-- Page Info --}}
                            <div class="text-center text-[9px] sm:text-[10px] md:text-xs text-[#3d5a3d]/70 mt-2 sm:mt-3" id="pageInfo">
                                <!-- Page info will be inserted here by JavaScript -->
                            </div>
                        </div>
                    @else
                        <div class="text-center py-8 sm:py-12 md:py-16 flex-1 flex flex-col items-center justify-center">
                            <div class="inline-flex items-center justify-center w-12 h-12 sm:w-16 sm:h-16 md:w-20 md:h-20 bg-gradient-to-br from-[#f0fdf4] to-[#ecfdf5] rounded-full mb-3 sm:mb-4 opacity-50">
                                <i class="fa fa-bullhorn text-xl sm:text-2xl md:text-3xl text-[#006633]"></i>
                            </div>
                            <h6 class="text-[#3d5a3d] font-semibold mb-1.5 sm:mb-2 text-xs sm:text-sm md:text-base">No Announcements Yet</h6>
                            <p class="text-[#3d5a3d]/70 text-[10px] sm:text-xs md:text-sm px-4">Create your first announcement using the form.</p>
                        </div>
                    @endif
                </div>

                <div class="bg-gradient-to-r from-[#006633] to-[#004d26] px-4 sm:px-5 md:px-6 py-2 sm:py-2.5 md:py-3 flex flex-col sm:flex-row justify-between items-center gap-1.5 sm:gap-2 flex-shrink-0">
                    <span class="text-white/90 text-[9px] sm:text-[10px] md:text-xs italic tracking-wide text-center sm:text-left">Nurturing a Culture of Excellence</span>
                    <span class="flex items-center gap-1.5 sm:gap-2 text-[#FFD700] font-semibold text-[9px] sm:text-[10px] md:text-xs">
                        <i class="fa fa-university"></i>
                        <span>CLSU</span>
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- ================= CKEDITOR ================= --}}
<script>
ClassicEditor
    .create(document.querySelector('#editor'), {
        ckfinder: {
            uploadUrl: "{{ route('ckeditor.upload') }}?_token={{ csrf_token() }}"
        },
        toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', '|', 'outdent', 'indent', '|', 'imageUpload', 'blockQuote', 'insertTable', 'undo', 'redo']
    })
    .then(editor => {
        // Style the editor after creation
        editor.ui.view.editable.element.style.fontFamily = "'Libre Franklin', sans-serif";
    })
    .catch(error => {
        console.error(error);
    });
</script>

{{-- ================= CLIENT-SIDE PAGINATION ================= --}}
<script>
document.addEventListener('DOMContentLoaded', function() {
    const itemsPerPage = 5;
    let currentPage = 1;
    const items = document.querySelectorAll('.announcement-item');
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
            html += '<span class="pagination-btn disabled"><i class="fa fa-chevron-left"></i></span>';
        } else {
            html += `<button class="pagination-btn" onclick="goToPage(${page - 1})"><i class="fa fa-chevron-left"></i></button>`;
        }

        // Page numbers
        const maxVisible = 3;
        let start = Math.max(1, page - 1);
        let end = Math.min(totalPages, page + 1);

        if (start > 1) {
            html += `<button class="pagination-btn" onclick="goToPage(1)">1</button>`;
            if (start > 2) {
                html += '<span class="pagination-dots">...</span>';
            }
        }

        for (let i = start; i <= end; i++) {
            if (i === page) {
                html += `<span class="pagination-btn active">${i}</span>`;
            } else {
                html += `<button class="pagination-btn" onclick="goToPage(${i})">${i}</button>`;
            }
        }

        if (end < totalPages) {
            if (end < totalPages - 1) {
                html += '<span class="pagination-dots">...</span>';
            }
            html += `<button class="pagination-btn" onclick="goToPage(${totalPages})">${totalPages}</button>`;
        }

        // Next button
        if (page === totalPages) {
            html += '<span class="pagination-btn disabled"><i class="fa fa-chevron-right"></i></span>';
        } else {
            html += `<button class="pagination-btn" onclick="goToPage(${page + 1})"><i class="fa fa-chevron-right"></i></button>`;
        }

        wrapper.innerHTML = html;
    }

    function updatePageInfo(page, start, end) {
        const pageInfo = document.getElementById('pageInfo');
        if (!pageInfo) return;

        const actualEnd = Math.min(end, totalItems);
        pageInfo.textContent = `Showing ${start + 1} to ${actualEnd} of ${totalItems} announcements`;
    }

    // Make goToPage function global
    window.goToPage = function(page) {
        currentPage = page;
        showPage(page);
        
        // Scroll to top of announcements list
        const listElement = document.getElementById('announcementsList');
        if (listElement) {
            listElement.scrollTop = 0;
        }
    };

    // Initialize pagination if there are items
    if (totalItems > 0) {
        showPage(1);
    }
});
</script>

@endsection