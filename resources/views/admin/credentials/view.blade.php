@extends('layouts.admin')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-[#FFFEF7] via-[#f0f7f0] to-[#FEFDFB] p-3 sm:p-4 md:p-6 lg:p-8 relative">
    
    {{-- Background decoration --}}
    <div class="absolute top-0 left-0 right-0 h-[200px] md:h-[300px] pointer-events-none opacity-30">
        <div class="absolute top-[40%] left-[20%] w-[80%] h-[50%] bg-[#006633] rounded-full blur-[100px] opacity-10"></div>
        <div class="absolute top-[30%] right-[20%] w-[60%] h-[40%] bg-[#D4AF37] rounded-full blur-[100px] opacity-15"></div>
    </div>

    <div class="flex justify-center relative z-10">
        <div class="w-full max-w-6xl">

            <div class="bg-[#FEFDFB] rounded-2xl sm:rounded-[20px] shadow-[0_4px_6px_rgba(0,102,51,0.04),0_20px_40px_rgba(0,102,51,0.08)] border border-[rgba(0,102,51,0.12)] overflow-hidden">
                
                {{-- Card Header --}}
                <div class="bg-gradient-to-br from-[#006633] to-[#004d26] p-4 sm:p-5 md:p-6 lg:p-8 relative overflow-hidden">
                    {{-- Decorative elements --}}
                    <div class="absolute -top-1/2 -right-[10%] w-[150px] md:w-[200px] h-[150px] md:h-[200px] bg-[#FFD700] rounded-full blur-2xl opacity-15 pointer-events-none"></div>
                    <div class="absolute bottom-0 left-0 right-0 h-[2px] md:h-1 bg-gradient-to-r from-[#FFD700] via-[#D4AF37] to-[#FFD700]"></div>
                    
                    <h5 class="text-white text-lg sm:text-xl md:text-2xl font-semibold flex items-center gap-2 md:gap-3 m-0 relative z-10" style="font-family: 'Playfair Display', Georgia, serif;">
                        <i class="fa fa-file-alt text-[#FFD700] text-base sm:text-lg md:text-xl"></i>
                        <span>Uploaded Credentials of {{ $user->first_name }} {{ $user->last_name }}</span>
                    </h5>
                </div>

                <div class="p-4 sm:p-5 md:p-6 lg:p-8">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-5 md:gap-6">
                        @foreach ($credentials as $key => $file)
                            <div class="bg-white rounded-xl sm:rounded-2xl overflow-hidden border border-[rgba(0,102,51,0.12)] transition-all duration-300 hover:-translate-y-1 hover:shadow-[0_12px_30px_rgba(0,102,51,0.12)]">
                                <div class="p-4 sm:p-5 md:p-6 text-center">
                                    <h6 class="font-semibold text-sm sm:text-base md:text-lg text-[#1a2e1a] mb-3 sm:mb-4">{{ ucwords(str_replace('_', ' ', $key)) }}</h6>

                                    @if ($file)
                                        <div class="bg-gray-50 rounded-lg p-3 sm:p-4 mb-3">
                                            <img src="{{ asset('storage/' . $file) }}" class="max-h-[150px] sm:max-h-[180px] md:max-h-[200px] w-auto mx-auto rounded-lg object-contain" alt="{{ ucwords(str_replace('_', ' ', $key)) }}">
                                        </div>
                                        <p class="text-xs sm:text-sm text-gray-500 mb-3 truncate px-2">{{ basename($file) }}</p>
                                        <a href="{{ asset('storage/' . $file) }}" target="_blank" 
                                            class="inline-flex items-center justify-center gap-2 px-4 sm:px-5 py-2 sm:py-2.5 rounded-full text-xs sm:text-sm font-semibold border-2 border-[#006633] text-[#006633] hover:bg-[#006633] hover:text-white transition-all duration-200 no-underline">
                                            <i class="fa fa-external-link-alt"></i>
                                            View Full
                                        </a>
                                    @else
                                        <div class="py-8 sm:py-10 md:py-12">
                                            <div class="w-12 h-12 sm:w-14 sm:h-14 md:w-16 md:h-16 bg-red-50 rounded-full flex items-center justify-center mx-auto mb-3">
                                                <i class="fa fa-times-circle text-red-400 text-xl sm:text-2xl md:text-3xl"></i>
                                            </div>
                                            <p class="text-red-500 font-medium text-sm sm:text-base">Not Uploaded</p>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
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
@endsection
