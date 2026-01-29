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
                        <i class="fa fa-pencil text-[#FFD700]"></i>
                        <span>Edit Slider</span>
                    </h5>
                    <p class="text-white/85 text-sm md:text-base m-0 relative z-10">Update slider image and details</p>
                </div>

                <div class="p-5 md:p-8">
                    
                    @if(session('error'))
                    <div class="rounded-xl p-4 mb-6 flex items-center gap-3 bg-gradient-to-r from-[#fee2e2] to-[#fecaca] text-[#991b1b] font-medium">
                        <i class="fa fa-exclamation-circle text-lg"></i>
                        <span>{{ session('error') }}</span>
                    </div>
                    @endif

                    <form action="{{ route('admin.slider.update', $slider->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        {{-- Title --}}
                        <div class="mb-6 md:mb-7">
                            <label class="block font-semibold text-[#1a2e1a] mb-2 md:mb-2.5 text-sm md:text-base">
                                <i class="fa fa-heading text-[#006633] mr-2"></i>
                                <span>Slider Title</span>
                            </label>
                            <input type="text" 
                                   name="title" 
                                   class="w-full px-4 md:px-5 py-3 md:py-3.5 border-2 border-[rgba(0,102,51,0.12)] rounded-xl text-sm md:text-base bg-white text-[#1a2e1a] placeholder-gray-400 transition-all duration-300 focus:outline-none focus:border-[#006633] focus:ring-4 focus:ring-[rgba(0,102,51,0.1)]"
                                   value="{{ old('title', $slider->title) }}" 
                                   placeholder="Enter slider title..."
                                   required>
                        </div>

                        {{-- Current Image --}}
                        <div class="bg-gradient-to-br from-[#f8fafc] to-[#f1f5f9] rounded-2xl p-4 md:p-5 border border-[rgba(0,102,51,0.12)] mb-6 md:mb-7">
                            <div class="font-semibold text-[#1a2e1a] mb-3 md:mb-4 flex items-center gap-2 text-sm md:text-base">
                                <i class="fa fa-image text-[#006633]"></i>
                                <span>Current Image</span>
                            </div>
                            <div class="inline-block relative rounded-xl overflow-hidden shadow-lg">
                                @if ($slider->image_path && file_exists(public_path($slider->image_path)))
                                    <img src="{{ asset($slider->image_path) }}" alt="{{ $slider->title }}" class="block max-w-full h-auto max-h-[250px] object-cover">
                                    <span class="absolute bottom-2 md:bottom-3 left-2 md:left-3 bg-[rgba(0,102,51,0.9)] text-white px-2 md:px-3 py-1 md:py-1.5 rounded-md text-[10px] md:text-xs font-semibold uppercase tracking-wider">Current</span>
                                @else
                                    <div class="p-8 md:p-12 text-center text-gray-400">
                                        <i class="fa fa-image text-3xl md:text-4xl mb-2 block"></i>
                                        <span class="text-sm">No image uploaded</span>
                                    </div>
                                @endif
                            </div>
                        </div>

                        {{-- New Image Upload --}}
                        <div class="mb-6 md:mb-7">
                            <label class="block font-semibold text-[#1a2e1a] mb-2 md:mb-2.5 text-sm md:text-base">
                                <i class="fa fa-upload text-[#006633] mr-2"></i>
                                <span>Upload New Image</span>
                                <span class="font-normal text-gray-400 ml-1">(optional)</span>
                            </label>
                            <div class="relative">
                                <input type="file" 
                                       name="image" 
                                       class="absolute w-full h-full top-0 left-0 opacity-0 cursor-pointer z-20" 
                                       id="imageInput"
                                       accept="image/*">
                                <div class="border-2 border-dashed border-[rgba(0,102,51,0.12)] rounded-2xl p-6 md:p-8 text-center bg-white transition-all duration-300 hover:border-[#006633] hover:bg-[rgba(0,102,51,0.02)]">
                                    <div class="w-14 h-14 md:w-[60px] md:h-[60px] bg-gradient-to-br from-[#dcfce7] to-[#bbf7d0] rounded-full flex items-center justify-center mx-auto mb-3 md:mb-4">
                                        <i class="fa fa-cloud-upload text-xl md:text-2xl text-[#006633]"></i>
                                    </div>
                                    <div class="text-[#1a2e1a] font-semibold mb-1 text-sm md:text-base">Click to upload or drag and drop</div>
                                    <div class="text-gray-400 text-xs md:text-sm">PNG, JPG, GIF up to 5MB</div>
                                </div>
                                <div class="hidden mt-3 md:mt-4 px-3 md:px-4 py-2 md:py-3 bg-gradient-to-br from-[#dcfce7] to-[#bbf7d0] rounded-lg text-[#006633] font-semibold text-xs md:text-sm" id="fileName">
                                    <i class="fa fa-check-circle mr-1 md:mr-2"></i>
                                    <span id="fileNameText"></span>
                                </div>
                            </div>
                        </div>

                        {{-- Form Actions --}}
                        <div class="flex flex-col sm:flex-row gap-3 md:gap-4 pt-4 border-t border-[rgba(0,102,51,0.12)] mt-2">
                            <a href="{{ route('admin.slider.index') }}" class="px-6 md:px-7 py-3 md:py-3.5 rounded-full font-semibold text-sm md:text-base bg-gray-200 text-gray-700 transition-all duration-300 hover:-translate-y-0.5 hover:bg-gray-300 hover:shadow-md inline-flex items-center justify-center gap-2 order-2 sm:order-1">
                                <i class="fa fa-arrow-left"></i>
                                <span>Back</span>
                            </a>
                            <button type="submit" class="flex-1 px-6 md:px-7 py-3 md:py-3.5 rounded-full font-semibold text-sm md:text-base bg-gradient-to-br from-[#006633] to-[#004d26] text-white transition-all duration-300 hover:-translate-y-0.5 hover:shadow-[0_6px_25px_rgba(0,102,51,0.4)] inline-flex items-center justify-center gap-2 shadow-[0_4px_15px_rgba(0,102,51,0.3)] order-1 sm:order-2">
                                <i class="fa fa-save"></i>
                                <span>Update Slider</span>
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

<script>
    document.getElementById('imageInput').addEventListener('change', function(e) {
        const fileName = e.target.files[0]?.name;
        const fileNameElement = document.getElementById('fileName');
        const fileNameText = document.getElementById('fileNameText');
        
        if (fileName) {
            fileNameText.textContent = fileName;
            fileNameElement.classList.remove('hidden');
        } else {
            fileNameElement.classList.add('hidden');
        }
    });
</script>
@endsection