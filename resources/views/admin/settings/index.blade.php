@extends('layouts.admin') 

@section('content')

<style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Playfair+Display:wght@500;600;700&display=swap');
</style>

<div class="min-h-screen bg-gradient-to-br from-[#f8fdf8] via-[#f0f7f0] to-[#e8f5e8] p-4 md:p-6 lg:p-8 relative overflow-hidden">
    
    {{-- Animated Background Elements --}}
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute top-20 left-10 w-72 h-72 bg-[#006633]/5 rounded-full blur-3xl float-animation"></div>
        <div class="absolute top-40 right-20 w-96 h-96 bg-[#D4AF37]/5 rounded-full blur-3xl float-animation" style="animation-delay: -2s;"></div>
        <div class="absolute bottom-20 left-1/3 w-80 h-80 bg-emerald-400/5 rounded-full blur-3xl float-animation" style="animation-delay: -4s;"></div>
    </div>
    
    <div class="max-w-3xl mx-auto relative z-10">
        
        {{-- Settings Card --}}
        <div class="modern-card rounded-3xl overflow-hidden">
            {{-- Green Header --}}
            <div class="animated-gradient p-8 relative overflow-hidden">
                {{-- Decorative circles --}}
                <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/5 to-transparent"></div>
                <div class="absolute top-0 right-0 w-40 h-40 bg-[#FFD700]/10 rounded-full -translate-y-1/2 translate-x-1/2 blur-2xl"></div>
                <div class="absolute bottom-0 left-1/4 w-24 h-24 bg-white/5 rounded-full translate-y-1/2 blur-xl"></div>
                
                <div class="relative z-10 flex items-center gap-5">
                    <div class="w-16 h-16 bg-[#FFD700]/20 backdrop-blur-xl rounded-2xl flex items-center justify-center border border-[#FFD700]/30 shadow-lg shadow-[#FFD700]/20">
                        <i class="fa fa-cogs text-[#FFD700] text-2xl"></i>
                    </div>
                    <div>
                        <h1 class="text-2xl md:text-3xl font-bold text-white" style="font-family: 'Playfair Display', serif;">System Settings</h1>
                        <p class="text-white/70 text-sm mt-1">Configure your application settings</p>
                    </div>
                </div>
            </div>
            
            {{-- Form Section --}}
            <div class="p-6 md:p-10">
                
                {{-- Success Alert --}}
                @if(session('success'))
                <div class="mb-8 p-5 bg-gradient-to-r from-emerald-50 to-green-50 border-l-4 border-[#006633] rounded-2xl flex items-center gap-4 shadow-lg shadow-emerald-100/50">
                    <div class="w-12 h-12 bg-gradient-to-br from-[#006633] to-[#004d26] rounded-xl flex items-center justify-center flex-shrink-0 shadow-lg shadow-[#006633]/30">
                        <i class="fa fa-check text-white text-lg"></i>
                    </div>
                    <div>
                        <p class="font-bold text-[#006633]">Success!</p>
                        <p class="text-sm text-emerald-700">{{ session('success') }}</p>
                    </div>
                </div>
                @endif

                {{-- Error Alert --}}
                @if(session('error'))
                <div class="mb-8 p-5 bg-gradient-to-r from-red-50 to-rose-50 border-l-4 border-red-500 rounded-2xl flex items-center gap-4 shadow-lg shadow-red-100/50">
                    <div class="w-12 h-12 bg-gradient-to-br from-red-500 to-rose-500 rounded-xl flex items-center justify-center flex-shrink-0 shadow-lg shadow-red-500/30">
                        <i class="fa fa-times text-white text-lg"></i>
                    </div>
                    <div>
                        <p class="font-bold text-red-700">Error!</p>
                        <p class="text-sm text-red-600">{{ session('error') }}</p>
                    </div>
                </div>
                @endif

                <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
                    @csrf
                    
                    {{-- System Domain --}}
                    <div class="group">
                        <label for="system_domain" class="flex items-center gap-3 text-sm font-bold text-gray-700 mb-3">
                            <span class="w-10 h-10 rounded-xl bg-gradient-to-br from-[#006633]/10 to-[#006633]/5 flex items-center justify-center group-hover:from-[#006633]/20 group-hover:to-[#006633]/10 transition-all">
                                <i class="fa fa-globe text-[#006633]"></i>
                            </span>
                            System Domain
                        </label>
                        <input 
                            type="text" 
                            name="system_domain" 
                            id="system_domain" 
                            class="input-modern w-full px-5 py-4 rounded-2xl border-2 border-gray-200 focus:border-[#006633] focus:ring-4 focus:ring-[#006633]/10 transition-all outline-none bg-white"
                            value="{{ old('system_domain', $settings['system_domain'] ?? '') }}" 
                            placeholder="e.g. http://eteeap.clsu.edu.ph">
                        <p class="mt-2 text-xs text-gray-500 ml-13 pl-0.5">The base URL of your application</p>
                    </div>
                    
                    {{-- System Title --}}
                    <div class="group">
                        <label for="system_title" class="flex items-center gap-3 text-sm font-bold text-gray-700 mb-3">
                            <span class="w-10 h-10 rounded-xl bg-gradient-to-br from-[#D4AF37]/20 to-[#D4AF37]/10 flex items-center justify-center group-hover:from-[#D4AF37]/30 group-hover:to-[#D4AF37]/20 transition-all">
                                <i class="fa fa-font text-[#D4AF37]"></i>
                            </span>
                            System Title
                        </label>
                        <input 
                            type="text" 
                            name="system_title" 
                            id="system_title"
                            class="input-modern w-full px-5 py-4 rounded-2xl border-2 border-gray-200 focus:border-[#006633] focus:ring-4 focus:ring-[#006633]/10 transition-all outline-none bg-white"
                            value="{{ old('system_title', $settings['system_title'] ?? '') }}"
                            placeholder="e.g. CLSU ETEEAP Application System">
                        <p class="mt-2 text-xs text-gray-500 ml-13 pl-0.5">This will be displayed in the browser tab and header</p>
                    </div>

                    {{-- System Logo --}}
                    <div class="group">
                        <label class="flex items-center gap-3 text-sm font-bold text-gray-700 mb-3">
                            <span class="w-10 h-10 rounded-xl bg-gradient-to-br from-indigo-100 to-indigo-50 flex items-center justify-center group-hover:from-indigo-200 group-hover:to-indigo-100 transition-all">
                                <i class="fa fa-image text-indigo-600"></i>
                            </span>
                            System Logo
                        </label>
                        
                        <div class="ml-13">
                            {{-- Current Logo Preview --}}
                            @if(!empty($settings['system_logo']))
                            <div class="mb-5 p-5 bg-gradient-to-br from-gray-50 to-gray-100/50 rounded-2xl border-2 border-dashed border-gray-200">
                                <p class="text-xs text-gray-500 mb-3 font-semibold uppercase tracking-wider">Current Logo:</p>
                                <div class="flex items-center gap-5">
                                    <div class="w-24 h-24 bg-white rounded-2xl shadow-lg flex items-center justify-center p-3 border border-gray-100">
                                        <img src="{{ asset($settings['system_logo']) }}" alt="Current Logo" class="max-h-full max-w-full object-contain">
                                    </div>
                                    <div class="text-sm text-gray-600">
                                        <p class="font-semibold">{{ basename($settings['system_logo']) }}</p>
                                        <p class="text-xs text-gray-400 mt-1">Upload a new file to replace</p>
                                    </div>
                                </div>
                            </div>
                            @endif
                            
                            {{-- File Upload --}}
                            <div class="relative">
                                <input 
                                    type="file" 
                                    name="system_logo" 
                                    id="system_logo"
                                    accept="image/*"
                                    class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10"
                                    onchange="previewLogo(this)">
                                <div class="flex items-center justify-center w-full h-36 border-2 border-dashed border-gray-300 rounded-2xl hover:border-[#006633] hover:bg-green-50/50 transition-all cursor-pointer group" id="upload-area">
                                    <div class="text-center">
                                        <div class="w-14 h-14 mx-auto mb-3 rounded-2xl bg-gradient-to-br from-gray-100 to-gray-50 flex items-center justify-center group-hover:from-[#006633]/10 group-hover:to-[#006633]/5 transition-all">
                                            <i class="fa fa-cloud-upload text-gray-400 text-2xl group-hover:text-[#006633] transition-colors"></i>
                                        </div>
                                        <p class="text-sm font-semibold text-gray-600 group-hover:text-[#006633] transition-colors">Click to upload logo</p>
                                        <p class="text-xs text-gray-400 mt-1">PNG, JPG, GIF up to 2MB</p>
                                    </div>
                                </div>
                            </div>
                            
                            {{-- New Logo Preview --}}
                            <div id="logo-preview" class="hidden mt-5 p-5 bg-gradient-to-br from-green-50 to-emerald-50 rounded-2xl border border-[#006633]/30 shadow-lg shadow-green-100/50">
                                <p class="text-xs text-[#006633] font-bold mb-3 uppercase tracking-wider">New Logo Preview:</p>
                                <div class="flex items-center gap-5">
                                    <div class="w-24 h-24 bg-white rounded-2xl shadow-lg flex items-center justify-center p-3 border border-[#006633]/30">
                                        <img id="preview-image" src="" alt="Preview" class="max-h-full max-w-full object-contain">
                                    </div>
                                    <div>
                                        <p id="preview-name" class="text-sm font-semibold text-gray-700"></p>
                                        <button type="button" onclick="clearPreview()" class="inline-flex items-center gap-1 text-xs text-red-500 hover:text-red-700 mt-2 px-3 py-1.5 bg-red-50 hover:bg-red-100 rounded-lg transition-all">
                                            <i class="fa fa-times"></i> Remove
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Divider --}}
                    <div class="border-t-2 border-dashed border-gray-200 pt-8"></div>

                    {{-- Submit Button --}}
                    <div class="flex flex-col sm:flex-row items-center justify-between gap-4">
                        <p class="text-sm text-gray-500 flex items-center gap-2">
                            <span class="w-8 h-8 rounded-lg bg-amber-100 flex items-center justify-center">
                                <i class="fa fa-info-circle text-amber-600"></i>
                            </span>
                            Changes will take effect immediately
                        </p>
                        <button 
                            type="submit" 
                            class="btn-modern inline-flex items-center gap-3 px-8 py-4 rounded-2xl font-bold text-white bg-gradient-to-r from-[#006633] to-[#004d26] hover:from-[#004d26] hover:to-[#003d1e] transition-all shadow-xl shadow-[#006633]/30 hover:shadow-2xl hover:shadow-[#006633]/40 transform hover:-translate-y-1 hover:scale-[1.02]">
                            <i class="fa fa-save text-lg"></i>
                            Save Settings
                        </button>
                    </div>
                </form>
            </div>
            
            {{-- Footer --}}
            <div class="animated-gradient px-8 py-5 flex flex-col sm:flex-row items-center justify-between gap-3 relative overflow-hidden">
                <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/5 to-transparent"></div>
                <p class="text-white/80 text-sm italic relative z-10">Sieving for Excellence — Central Luzon State University</p>
                <p class="text-[#FFD700] font-bold text-sm flex items-center gap-2 relative z-10">
                    <i class="fa fa-university"></i>
                    CLSU ETEEAP
                </p>
            </div>
        </div>
        
    </div>
</div>

{{-- JavaScript for Logo Preview --}}
<script>
function previewLogo(input) {
    const preview = document.getElementById('logo-preview');
    const previewImage = document.getElementById('preview-image');
    const previewName = document.getElementById('preview-name');
    const uploadArea = document.getElementById('upload-area');
    
    if (input.files && input.files[0]) {
        const file = input.files[0];
        const reader = new FileReader();
        
        reader.onload = function(e) {
            previewImage.src = e.target.result;
            previewName.textContent = file.name;
            preview.classList.remove('hidden');
            uploadArea.classList.add('border-[#006633]', 'bg-green-50/50');
        }
        
        reader.readAsDataURL(file);
    }
}

function clearPreview() {
    const input = document.getElementById('system_logo');
    const preview = document.getElementById('logo-preview');
    const uploadArea = document.getElementById('upload-area');
    
    input.value = '';
    preview.classList.add('hidden');
    uploadArea.classList.remove('border-[#006633]', 'bg-green-50/50');
}
</script>
@endsection