
@extends('layouts.admin')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-[#FFFEF7] via-[#f0f7f0] to-[#FEFDFB] p-3 sm:p-4 md:p-6 lg:p-8 relative">
    
    {{-- Background decoration --}}
    <div class="absolute top-0 left-0 right-0 h-[200px] md:h-[300px] pointer-events-none opacity-30">
        <div class="absolute top-[40%] left-[20%] w-[80%] h-[50%] bg-[#006633] rounded-full blur-[100px] opacity-10"></div>
        <div class="absolute top-[30%] right-[20%] w-[60%] h-[40%] bg-[#D4AF37] rounded-full blur-[100px] opacity-15"></div>
    </div>

    <div class="flex justify-center relative z-10">
        <div class="w-full max-w-3xl">

            <div class="bg-[#FEFDFB] rounded-2xl sm:rounded-[20px] shadow-[0_4px_6px_rgba(0,102,51,0.04),0_20px_40px_rgba(0,102,51,0.08)] border border-[rgba(0,102,51,0.12)] overflow-hidden">
                
                {{-- Card Header --}}
                <div class="bg-gradient-to-br from-[#006633] to-[#004d26] p-4 sm:p-5 md:p-6 lg:p-8 relative overflow-hidden">
                    {{-- Decorative elements --}}
                    <div class="absolute -top-1/2 -right-[10%] w-[150px] md:w-[200px] h-[150px] md:h-[200px] bg-[#FFD700] rounded-full blur-2xl opacity-15 pointer-events-none"></div>
                    <div class="absolute bottom-0 left-0 right-0 h-[2px] md:h-1 bg-gradient-to-r from-[#FFD700] via-[#D4AF37] to-[#FFD700]"></div>
                    
                    <h5 class="text-white text-lg sm:text-xl md:text-2xl font-semibold flex items-center gap-2 md:gap-3 m-0 relative z-10" style="font-family: 'Playfair Display', Georgia, serif;">
                        <i class="fa fa-user-edit text-[#FFD700] text-base sm:text-lg md:text-xl"></i>
                        <span>Edit User</span>
                    </h5>
                </div>

                <div class="p-4 sm:p-5 md:p-6 lg:p-8">
                    
                    @if(session('success'))
                        <div class="mb-4 p-3 sm:p-4 rounded-lg bg-green-50 border border-green-200 text-green-700 text-sm sm:text-base flex items-center gap-2">
                            <i class="fa fa-check-circle text-green-500"></i>
                            {{ session('success') }}
                        </div>
                    @endif
                    @if(session('error'))
                        <div class="mb-4 p-3 sm:p-4 rounded-lg bg-red-50 border border-red-200 text-red-700 text-sm sm:text-base flex items-center gap-2">
                            <i class="fa fa-exclamation-circle text-red-500"></i>
                            {{ session('error') }}
                        </div>
                    @endif
                    
                    <form action="{{ route('admin.users.update', $user->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4 sm:space-y-5 md:space-y-6">
                        @csrf
                        @method('PUT')
                        
                        <div>
                            <label for="name" class="block text-sm sm:text-base font-medium text-[#1a2e1a] mb-1.5 sm:mb-2">Full Name</label>
                            <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" required
                                class="w-full px-3 sm:px-4 py-2 sm:py-2.5 md:py-3 text-sm sm:text-base border border-[rgba(0,102,51,0.2)] rounded-lg focus:outline-none focus:ring-2 focus:ring-[#006633] focus:border-[#006633] transition-all duration-200">
                        </div>

                        <div>
                            <label for="email" class="block text-sm sm:text-base font-medium text-[#1a2e1a] mb-1.5 sm:mb-2">Email</label>
                            <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" required
                                class="w-full px-3 sm:px-4 py-2 sm:py-2.5 md:py-3 text-sm sm:text-base border border-[rgba(0,102,51,0.2)] rounded-lg focus:outline-none focus:ring-2 focus:ring-[#006633] focus:border-[#006633] transition-all duration-200">
                        </div>

                        <div>
                            <label for="role" class="block text-sm sm:text-base font-medium text-[#1a2e1a] mb-1.5 sm:mb-2">Role</label>
                            <select name="role" id="role" required
                                class="w-full px-3 sm:px-4 py-2 sm:py-2.5 md:py-3 text-sm sm:text-base border border-[rgba(0,102,51,0.2)] rounded-lg focus:outline-none focus:ring-2 focus:ring-[#006633] focus:border-[#006633] transition-all duration-200 bg-white">
                                <option value="2" {{ $user->role == 2 ? 'selected' : '' }}>Admin</option>
                                <option value="3" {{ $user->role == 3 ? 'selected' : '' }}>Assessor</option>
                                <option value="4" {{ $user->role == 4 ? 'selected' : '' }}>Department Coordinator</option>
                                <option value="5" {{ $user->role == 5 ? 'selected' : '' }}>College Coordinator</option>
                            </select>
                        </div>

                        <div>
                            <label for="profile_image" class="block text-sm sm:text-base font-medium text-[#1a2e1a] mb-1.5 sm:mb-2">Profile Image</label>
                            <input type="file" name="profile_image" id="profile_image"
                                class="w-full px-3 sm:px-4 py-2 sm:py-2.5 md:py-3 text-sm sm:text-base border border-[rgba(0,102,51,0.2)] rounded-lg focus:outline-none focus:ring-2 focus:ring-[#006633] focus:border-[#006633] transition-all duration-200 file:mr-3 file:py-1 file:px-3 file:rounded-full file:border-0 file:text-sm file:font-medium file:bg-[#006633] file:text-white hover:file:bg-[#004d26] file:cursor-pointer">
                            @if($user->profile_image)
                                <div class="mt-3">
                                    <img src="{{ asset('storage/'.$user->profile_image) }}" alt="Profile Image" class="w-20 h-20 sm:w-24 sm:h-24 object-cover rounded-lg border border-[rgba(0,102,51,0.2)]">
                                </div>
                            @endif
                        </div>

                        <div class="flex flex-col sm:flex-row gap-3 pt-2">
                            <button type="submit" class="w-full sm:w-auto bg-gradient-to-br from-[#006633] to-[#004d26] text-white px-5 sm:px-6 md:px-8 py-2.5 sm:py-3 rounded-full font-semibold text-sm sm:text-base inline-flex items-center justify-center gap-2 shadow-[0_4px_15px_rgba(0,102,51,0.3)] transition-all duration-250 hover:-translate-y-0.5 hover:shadow-[0_6px_20px_rgba(0,102,51,0.4)]">
                                <i class="fa fa-save"></i>
                                <span>Save Changes</span>
                            </button>
                            <a href="{{ route('admin.users.index') }}" class="w-full sm:w-auto bg-white border border-gray-300 text-gray-700 px-5 sm:px-6 md:px-8 py-2.5 sm:py-3 rounded-full font-semibold text-sm sm:text-base inline-flex items-center justify-center gap-2 transition-all duration-250 hover:bg-gray-50 hover:border-gray-400 no-underline">
                                <i class="fa fa-times"></i>
                                <span>Cancel</span>
                            </a>
                        </div>
                    </form>
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
