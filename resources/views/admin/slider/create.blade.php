@extends('layouts.admin') 

@section('content')

<style>
@import url('https://fonts.googleapis.com/css2?family=Libre+Franklin:wght@300;400;500;600;700&family=Playfair+Display:wght@500;600;700&display=swap');

* {
    font-family: 'Libre Franklin', -apple-system, BlinkMacSystemFont, sans-serif;
}
</style>

<div class="min-h-screen bg-gradient-to-br from-[#FFFEF7] via-[#f0f7f0] to-[#FEFDFB] p-4 md:p-8 relative">
    
    {{-- Background decoration --}}
    <div class="absolute top-0 left-0 right-0 h-[300px] pointer-events-none opacity-30">
        <div class="absolute top-[40%] left-[20%] w-[80%] h-[50%] bg-[#006633] rounded-full blur-[100px] opacity-10"></div>
        <div class="absolute top-[30%] right-[20%] w-[60%] h-[40%] bg-[#D4AF37] rounded-full blur-[100px] opacity-15"></div>
    </div>

    <div class="flex justify-center relative z-10">
        <div class="w-full max-w-[700px]">

            <div class="bg-[#FEFDFB] rounded-[20px] shadow-[0_4px_6px_rgba(0,102,51,0.04),0_20px_40px_rgba(0,102,51,0.08)] border border-[rgba(0,102,51,0.12)] overflow-hidden">
                
                {{-- Card Header --}}
                <div class="bg-gradient-to-br from-[#006633] to-[#004d26] p-5 md:p-8 relative overflow-hidden">
                    {{-- Decorative elements --}}
                    <div class="absolute -top-1/2 -right-[10%] w-[200px] h-[200px] bg-[#FFD700] rounded-full blur-2xl opacity-15 pointer-events-none"></div>
                    <div class="absolute bottom-0 left-0 right-0 h-1 bg-gradient-to-r from-[#FFD700] via-[#D4AF37] to-[#FFD700]"></div>
                    
                    <h5 class="text-white text-xl md:text-2xl font-semibold flex items-center gap-2 md:gap-3 mb-2 relative z-10" style="font-family: 'Playfair Display', Georgia, serif;">
                        <i class="fa fa-plus-circle text-[#FFD700]"></i>
                        <span>Add New Slider</span>
                    </h5>
                    <p class="text-white/85 text-sm md:text-base m-0 relative z-10">Upload a new image for the homepage slider</p>
                </div>

                <div class="p-5 md:p-8">
                    
                    {{-- Tips Section --}}
                    <div class="bg-gradient-to-br from-[#f0fdf4] to-[#ecfdf5] rounded-xl p-4 md:p-5 mb-6 md:mb-7 border-l-4 border-[#006633]">
                        <div class="font-semibold text-[#006633] text-sm md:text-base mb-2 flex items-center gap-2">
                            <i class="fa fa-lightbulb-o"></i>
                            <span>Tips for best results</span>
                        </div>
                        <ul class="m-0 pl-5 text-xs md:text-sm text-[#3d5a3d] space-y-1">
                            <li>Use high-quality images (1920x600 pixels recommended)</li>
                            <li>Keep file size under 5MB for faster loading</li>
                            <li>Use descriptive titles for better organization</li>
                        </ul>
                    </div>

                    <form action="{{ route('admin.slider.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        {{-- Title --}}
                        <div class="mb-6 md:mb-7">
                            <label class="block font-semibold text-[#1a2e1a] mb-2 md:mb-2.5 text-sm md:text-base">
                                <i class="fa fa-heading text-[#006633] mr-2"></i>
                                <span>Slider Title</span>
                                <span class="text-red-600 ml-1">*</span>
                            </label>
                            <input type="text" 
                                   name="title" 
                                   class="w-full px-4 md:px-5 py-3 md:py-3.5 border-2 border-[rgba(0,102,51,0.12)] rounded-xl text-sm md:text-base bg-white text-[#1a2e1a] placeholder-gray-400 transition-all duration-300 focus:outline-none focus:border-[#006633] focus:ring-4 focus:ring-[rgba(0,102,51,0.1)]"
                                   placeholder="Enter a descriptive title for this slider..."
                                   required>
                        </div>

                        {{-- Image Upload --}}
                        <div class="mb-6 md:mb-7">
                            <label class="block font-semibold text-[#1a2e1a] mb-2 md:mb-2.5 text-sm md:text-base">
                                <i class="fa fa-image text-[#006633] mr-2"></i>
                                <span>Upload Image</span>
                                <span class="text-red-600 ml-1">*</span>
                            </label>
                            <div class="relative" id="fileUploadArea">
                                <input type="file" 
                                       name="image" 
                                       class="absolute w-full h-full top-0 left-0 opacity-0 cursor-pointer z-20" 
                                       id="imageInput"
                                       accept="image/*"
                                       required>
                                <div class="border-2 border-dashed border-[rgba(0,102,51,0.12)] rounded-2xl p-8 md:p-10 text-center bg-white transition-all duration-300 hover:border-[#006633] hover:bg-[rgba(0,102,51,0.02)]" id="uploadArea">
                                    <div class="w-16 h-16 md:w-[70px] md:h-[70px] bg-gradient-to-br from-[#dcfce7] to-[#bbf7d0] rounded-full flex items-center justify-center mx-auto mb-4 md:mb-5">
                                        <i class="fa fa-cloud-upload text-2xl md:text-3xl text-[#006633]"></i>
                                    </div>
                                    <div class="text-[#1a2e1a] font-semibold mb-1 text-sm md:text-base">Click to upload or drag and drop</div>
                                    <div class="text-gray-400 text-xs md:text-sm">PNG, JPG, GIF up to 5MB</div>
                                </div>
                                <div class="hidden mt-4 px-4 py-3 bg-gradient-to-br from-[#dcfce7] to-[#bbf7d0] rounded-xl text-[#006633] font-semibold text-sm md:text-base items-center gap-2" id="fileName">
                                    <i class="fa fa-check-circle text-base md:text-lg"></i>
                                    <span id="fileNameText"></span>
                                </div>
                                <div class="hidden mt-4 rounded-xl overflow-hidden shadow-lg" id="imagePreview">
                                    <img id="previewImg" src="" alt="Preview" class="w-full max-h-[250px] object-cover block">
                                </div>
                            </div>
                        </div>

                        {{-- Form Actions --}}
                        <div class="flex flex-col sm:flex-row gap-3 md:gap-4 pt-4 md:pt-4 border-t border-[rgba(0,102,51,0.12)] mt-2">
                            <a href="{{ route('admin.slider.index') }}" class="px-6 md:px-7 py-3 md:py-3.5 rounded-full font-semibold text-sm md:text-base bg-gray-200 text-gray-700 transition-all duration-300 hover:-translate-y-0.5 hover:bg-gray-300 hover:shadow-md inline-flex items-center justify-center gap-2 order-2 sm:order-1">
                                <i class="fa fa-arrow-left"></i>
                                <span>Cancel</span>
                            </a>
                            <button type="submit" class="flex-1 px-6 md:px-7 py-3 md:py-3.5 rounded-full font-semibold text-sm md:text-base bg-gradient-to-br from-[#006633] to-[#004d26] text-white transition-all duration-300 hover:-translate-y-0.5 hover:shadow-[0_6px_25px_rgba(0,102,51,0.4)] inline-flex items-center justify-center gap-2 shadow-[0_4px_15px_rgba(0,102,51,0.3)] order-1 sm:order-2">
                                <i class="fa fa-upload"></i>
                                <span>Upload Slider</span>
                            </button>
                        </div>
                    </form>

                </div>

                <div class="bg-gradient-to-r from-[#006633] to-[#004d26] px-5 md:px-8 py-3 flex flex-col sm:flex-row justify-between items-center gap-2">
                    <span class="text-white/90 text-[10px] md:text-xs italic">Sieving for Excellence</span>
                    <span class="flex items-center gap-2 text-[#FFD700] font-semibold text-[10px] md:text-xs">
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
<script>
    Swal.fire({
        icon: 'error',
        title: 'Error',
        text: '{{ session('error') }}',
        confirmButtonColor: '#006633'
    });
</script>
@endif

<script>
    const imageInput = document.getElementById('imageInput');
    const uploadArea = document.getElementById('uploadArea');
    const fileName = document.getElementById('fileName');
    const fileNameText = document.getElementById('fileNameText');
    const imagePreview = document.getElementById('imagePreview');
    const previewImg = document.getElementById('previewImg');

    // File input change
    imageInput.addEventListener('change', function(e) {
        handleFile(e.target.files[0]);
    });

    // Drag and drop
    uploadArea.addEventListener('dragover', function(e) {
        e.preventDefault();
        uploadArea.classList.add('border-[#006633]', 'bg-[rgba(0,102,51,0.05)]', 'scale-[1.01]');
    });

    uploadArea.addEventListener('dragleave', function(e) {
        e.preventDefault();
        uploadArea.classList.remove('border-[#006633]', 'bg-[rgba(0,102,51,0.05)]', 'scale-[1.01]');
    });

    uploadArea.addEventListener('drop', function(e) {
        e.preventDefault();
        uploadArea.classList.remove('border-[#006633]', 'bg-[rgba(0,102,51,0.05)]', 'scale-[1.01]');
        const file = e.dataTransfer.files[0];
        if (file && file.type.startsWith('image/')) {
            imageInput.files = e.dataTransfer.files;
            handleFile(file);
        }
    });

    function handleFile(file) {
        if (file) {
            // Show file name
            fileNameText.textContent = file.name;
            fileName.classList.remove('hidden');
            fileName.classList.add('flex');

            // Show image preview
            const reader = new FileReader();
            reader.onload = function(e) {
                previewImg.src = e.target.result;
                imagePreview.classList.remove('hidden');
                imagePreview.classList.add('block');
            };
            reader.readAsDataURL(file);
        } else {
            fileName.classList.add('hidden');
            fileName.classList.remove('flex');
            imagePreview.classList.add('hidden');
            imagePreview.classList.remove('block');
        }
    }
</script>
@endsection