@extends('layouts.admin')

@section('content')

<div class="min-h-screen bg-gradient-to-br from-[#004422] to-[#006633] py-6 md:py-8 px-4">
    <div class="container mx-auto max-w-7xl">
        <!-- Back Link -->
        <a href="{{ route('admin.users.index') }}" class="inline-flex items-center gap-2 text-white mb-4 md:mb-5 font-medium transition-all duration-300 hover:text-[#FFD700] hover:-translate-x-1 opacity-90 hover:opacity-100 no-underline">
            <i class="fas fa-arrow-left"></i>
            <span>Back to User Management</span>
        </a>

        <!-- Page Title -->
        <h1 class="text-white text-2xl md:text-3xl lg:text-4xl font-bold text-center mb-6 md:mb-8 drop-shadow-lg">
            <span class="text-[#FFD700]">CLSU</span> Edit User
        </h1>

        @php
            $roles = [
                1 => ['name' => 'Applicant', 'avatar' => 'from-[#9b59b6] to-[#8e44ad]', 'icon' => 'fa-user-graduate'],
                2 => ['name' => 'Admin', 'avatar' => 'from-[#e74c3c] to-[#c0392b]', 'icon' => 'fa-user-shield'],
                3 => ['name' => 'Assessor', 'avatar' => 'from-[#00994d] to-[#006633]', 'icon' => 'fa-clipboard-check'],
                // Dept. and College Coordinator removed
            ];
        @endphp

        <!-- Edit Card -->
        <div class="bg-white rounded-[20px] overflow-hidden shadow-[0_15px_50px_rgba(0,0,0,0.2)] max-w-[600px] mx-auto">
            <!-- Header -->
            <div class="bg-gradient-to-r from-[#006633] to-[#00994d] p-5 md:p-8 text-center">
                <h4 class="text-white text-xl md:text-2xl font-semibold m-0 mb-1">
                    <i class="fas fa-user-edit mr-2"></i>Edit User Profile
                </h4>
                <p class="text-white/80 text-sm md:text-base m-0">Update user information and role assignment</p>
            </div>

            <!-- User Avatar -->
            <div class="px-6 md:px-10 pb-8 md:pb-10 bg-[#f8f9e8]">
                <div class="w-20 h-20 md:w-[100px] md:h-[100px] rounded-full flex items-center justify-center text-3xl md:text-[2.5rem] font-bold text-white -mt-10 md:-mt-12 mx-auto border-4 md:border-[5px] border-white shadow-[0_5px_20px_rgba(0,0,0,0.2)] relative z-10 bg-gradient-to-br {{ $roles[$user->role]['avatar'] ?? 'from-[#9b59b6] to-[#8e44ad]' }}" id="userAvatar">
                    {{ strtoupper(substr($user->name, 0, 1)) }}
                </div>

                <!-- Current Role Indicator -->
                <div class="text-center mb-6 md:mb-8 mt-4">
                    <span class="inline-flex items-center gap-2 px-4 py-2 rounded-full text-xs md:text-sm font-semibold 
                        {{ $user->role == 1 ? 'bg-[#f3e5f5] text-[#8e44ad]' : '' }}
                        {{ $user->role == 2 ? 'bg-[#fde8e8] text-[#c0392b]' : '' }}
                        {{ $user->role == 3 ? 'bg-[#e8f5e9] text-[#006633]' : '' }}" id="roleIndicator">
                        <i class="fas {{ $roles[$user->role]['icon'] ?? 'fa-user' }}"></i>
                        <span id="roleText">{{ $roles[$user->role]['name'] ?? 'Unknown' }}</span>
                    </span>
                </div>

                <!-- Success Message -->
                @if (session('success'))
                    <div class="bg-[#d1fae5] border-l-4 border-[#10b981] rounded-xl p-4 md:p-5 mb-6 md:mb-8">
                        <div class="text-[#065f46] flex items-center gap-2">
                            <i class="fas fa-check-circle"></i>
                            <span class="font-semibold">{{ session('success') }}</span>
                        </div>
                    </div>
                @endif

                <!-- Validation Errors -->
                @if ($errors->any())
                    <div class="bg-[#fef2f2] border-l-4 border-[#e74c3c] rounded-xl p-4 md:p-5 mb-6 md:mb-8">
                        <strong class="text-[#c0392b] flex items-center gap-2 mb-2">
                            <i class="fas fa-exclamation-circle"></i>
                            <span>Please fix the following errors:</span>
                        </strong>
                        <ul class="m-0 pl-5 space-y-1">
                            @foreach ($errors->all() as $error)
                                <li class="text-[#c0392b] text-sm">{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Form -->
                <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <!-- Personal Information Section -->
                    <div class="bg-white rounded-2xl p-5 md:p-6 mb-5 shadow-sm">
                        <div class="text-[#006633] text-xs md:text-sm uppercase tracking-wider font-semibold mb-4 md:mb-5 pb-2 md:pb-2.5 border-b-2 border-[#FFD700]">
                            <i class="fas fa-id-card mr-2"></i>Personal Information
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4 md:mb-5">
                            <div>
                                <label class="font-semibold text-[#333] mb-2 flex items-center gap-2 text-sm md:text-base">
                                    <i class="fas fa-user text-[#006633]"></i>
                                    <span>First Name</span>
                                </label>
                                <input
                                    type="text"
                                    name="first_name"
                                    id="firstName"
                                    class="w-full px-4 py-3 md:py-3.5 border-2 border-gray-200 rounded-xl text-sm md:text-base bg-gray-50 transition-all duration-300 focus:outline-none focus:border-[#006633] focus:bg-white focus:ring-4 focus:ring-[rgba(0,102,51,0.1)] hover:border-gray-300"
                                    value="{{ old('first_name', $user->first_name) }}"
                                    placeholder="First name"
                                    required
                                >
                            </div>

                            <div>
                                <label class="font-semibold text-[#333] mb-2 flex items-center gap-2 text-sm md:text-base">
                                    <i class="fas fa-user text-[#006633]"></i>
                                    <span>Middle Name</span>
                                </label>
                                <input
                                    type="text"
                                    name="middle_name"
                                    id="middleName"
                                    class="w-full px-4 py-3 md:py-3.5 border-2 border-gray-200 rounded-xl text-sm md:text-base bg-gray-50 transition-all duration-300 focus:outline-none focus:border-[#006633] focus:bg-white focus:ring-4 focus:ring-[rgba(0,102,51,0.1)] hover:border-gray-300"
                                    value="{{ old('middle_name', $user->middle_name) }}"
                                    placeholder="Middle name (optional)"
                                >
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4 md:mb-5">
                            <div>
                                <label class="font-semibold text-[#333] mb-2 flex items-center gap-2 text-sm md:text-base">
                                    <i class="fas fa-user text-[#006633]"></i>
                                    <span>Last Name</span>
                                </label>
                                <input
                                    type="text"
                                    name="surname"
                                    id="lastName"
                                    class="w-full px-4 py-3 md:py-3.5 border-2 border-gray-200 rounded-xl text-sm md:text-base bg-gray-50 transition-all duration-300 focus:outline-none focus:border-[#006633] focus:bg-white focus:ring-4 focus:ring-[rgba(0,102,51,0.1)] hover:border-gray-300"
                                    value="{{ old('surname', $user->surname) }}"
                                    placeholder="Last name"
                                    required
                                >
                            </div>

                            <div>
                                <label class="font-semibold text-[#333] mb-2 flex items-center gap-2 text-sm md:text-base">
                                    <i class="fas fa-user text-[#006633]"></i>
                                    <span>Extension</span>
                                </label>
                                <input
                                    type="text"
                                    name="extension"
                                    id="nameExtension"
                                    class="w-full px-4 py-3 md:py-3.5 border-2 border-gray-200 rounded-xl text-sm md:text-base bg-gray-50 transition-all duration-300 focus:outline-none focus:border-[#006633] focus:bg-white focus:ring-4 focus:ring-[rgba(0,102,51,0.1)] hover:border-gray-300"
                                    value="{{ old('extension', $user->extension) }}"
                                    placeholder="Jr., Sr., III (optional)"
                                >
                            </div>
                        </div>

                        <div class="mb-0">
                            <label class="font-semibold text-[#333] mb-2 flex items-center gap-2 text-sm md:text-base">
                                <i class="fas fa-envelope text-[#006633]"></i>
                                <span>Email Address</span>
                            </label>
                            <input 
                                type="email" 
                                name="email" 
                                class="w-full px-4 py-3 md:py-3.5 border-2 border-gray-200 rounded-xl text-sm md:text-base bg-gray-50 transition-all duration-300 focus:outline-none focus:border-[#006633] focus:bg-white focus:ring-4 focus:ring-[rgba(0,102,51,0.1)] hover:border-gray-300" 
                                value="{{ old('email', $user->email) }}" 
                                placeholder="Enter email address"
                                required
                            >
                        </div>
                    </div>

                    <!-- Password Section -->
                    <div class="bg-white rounded-2xl p-5 md:p-6 mb-5 shadow-sm">
                        <div class="text-[#006633] text-xs md:text-sm uppercase tracking-wider font-semibold mb-4 md:mb-5 pb-2 md:pb-2.5 border-b-2 border-[#FFD700]">
                            <i class="fas fa-lock mr-2"></i>Password Management
                        </div>

                        <div class="mb-4 md:mb-5">
                            <label class="font-semibold text-[#333] mb-2 flex items-center gap-2 text-sm md:text-base">
                                <i class="fas fa-key text-[#006633]"></i>
                                <span>New Password</span>
                                <span class="text-xs text-gray-500 font-normal">(Leave blank to keep current password)</span>
                            </label>
                            <div class="relative">
                                <input 
                                    type="password" 
                                    name="password" 
                                    id="password"
                                    class="w-full px-4 py-3 md:py-3.5 pr-12 border-2 border-gray-200 rounded-xl text-sm md:text-base bg-gray-50 transition-all duration-300 focus:outline-none focus:border-[#006633] focus:bg-white focus:ring-4 focus:ring-[rgba(0,102,51,0.1)] hover:border-gray-300" 
                                    placeholder="Enter new password (min. 8 characters)"
                                    autocomplete="new-password"
                                >
                                <button 
                                    type="button" 
                                    onclick="togglePasswordVisibility('password', this)"
                                    style="position: absolute; right: 0.75rem; top: 50%; transform: translateY(-50%); background: none; border: none; color: #9ca3af; cursor: pointer; padding: 0.5rem; z-index: 10; transition: color 0.3s ease;"
                                    title="Show/Hide Password"
                                >
                                    <i class="fas fa-eye" style="font-size: 1.2rem;" id="passwordToggleIcon"></i>
                                </button>
                            </div>
                            <p class="text-xs text-gray-500 mt-1.5">Password must be at least 8 characters long.</p>
                            <p id="passwordStrength" class="text-xs mt-1 hidden"></p>
                        </div>

                        <div class="mb-0">
                            <label class="font-semibold text-[#333] mb-2 flex items-center gap-2 text-sm md:text-base">
                                <i class="fas fa-key text-[#006633]"></i>
                                <span>Confirm Password</span>
                            </label>
                            <div class="relative">
                                <input 
                                    type="password" 
                                    name="password_confirmation" 
                                    id="password_confirmation"
                                    class="w-full px-4 py-3 md:py-3.5 pr-12 border-2 border-gray-200 rounded-xl text-sm md:text-base bg-gray-50 transition-all duration-300 focus:outline-none focus:border-[#006633] focus:bg-white focus:ring-4 focus:ring-[rgba(0,102,51,0.1)] hover:border-gray-300" 
                                    placeholder="Confirm new password"
                                    autocomplete="new-password"
                                >
                                <button 
                                    type="button" 
                                    onclick="togglePasswordVisibility('password_confirmation', this)"
                                    style="position: absolute; right: 0.75rem; top: 50%; transform: translateY(-50%); background: none; border: none; color: #9ca3af; cursor: pointer; padding: 0.5rem; z-index: 10; transition: color 0.3s ease;"
                                    title="Show/Hide Password"
                                >
                                    <i class="fas fa-eye" style="font-size: 1.2rem;" id="passwordConfirmationToggleIcon"></i>
                                </button>
                            </div>
                            <p id="passwordMatch" class="text-xs mt-1.5 hidden"></p>
                        </div>
                    </div>

                    <!-- Role Assignment Section -->
                    <div class="bg-white rounded-2xl p-5 md:p-6 mb-5 shadow-sm">
                        <div class="text-[#006633] text-xs md:text-sm uppercase tracking-wider font-semibold mb-4 md:mb-5 pb-2 md:pb-2.5 border-b-2 border-[#FFD700]">
                            <i class="fas fa-user-tag mr-2"></i>Role Assignment
                        </div>

                        <div class="mb-0">
                            <label class="font-semibold text-[#333] mb-2 flex items-center gap-2 text-sm md:text-base">
                                <i class="fas fa-shield-alt text-[#006633]"></i>
                                <span>User Role</span>
                            </label>
                            <select name="role" id="roleSelect" class="w-full px-4 py-3 md:py-3.5 border-2 border-gray-200 rounded-xl text-sm md:text-base bg-gray-50 appearance-none cursor-pointer transition-all duration-300 focus:outline-none focus:border-[#006633] focus:bg-white focus:ring-4 focus:ring-[rgba(0,102,51,0.1)] bg-[url('data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20width=%2212%22%20height=%2212%22%20fill=%22%23006633%22%20viewBox=%220%200%2016%2016%22%3E%3Cpath%20d=%22M7.247%2011.14%202.451%205.658C1.885%205.013%202.345%204%203.204%204h9.592a1%201%200%200%201%20.753%201.659l-4.796%205.48a1%201%200%200%201-1.506%200z%22/%3E%3C/svg%3E')] bg-no-repeat bg-[right_15px_center]" required>
                                <option value="1" {{ old('role', $user->role) == 1 ? 'selected' : '' }}>
                                    🎓 Applicant
                                </option>
                                <option value="2" {{ old('role', $user->role) == 2 ? 'selected' : '' }}>
                                    🛡️ Admin
                                </option>
                                <option value="3" {{ old('role', $user->role) == 3 ? 'selected' : '' }}>
                                    📋 Assessor
                                </option>
                                <!-- Dept. and College Coordinator roles removed -->
                            </select>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex flex-col sm:flex-row gap-3 md:gap-4 mt-3">
                        <button type="submit" class="flex-1 bg-gradient-to-r from-[#006633] to-[#00994d] text-white px-6 py-3 md:py-3.5 rounded-xl font-semibold text-sm md:text-base transition-all duration-300 hover:-translate-y-0.5 hover:shadow-[0_5px_20px_rgba(0,102,51,0.3)] flex items-center justify-center gap-2 md:gap-2.5 order-1">
                            <i class="fas fa-save"></i>
                            <span>Save Changes</span>
                        </button>
                        <a href="{{ route('admin.users.index') }}" class="flex-1 bg-white text-gray-600 border-2 border-gray-300 px-6 py-3 md:py-3.5 rounded-xl font-semibold text-sm md:text-base transition-all duration-300 hover:bg-gray-50 hover:border-gray-400 hover:text-gray-800 flex items-center justify-center gap-2 md:gap-2.5 no-underline order-2">
                            <i class="fas fa-times"></i>
                            <span>Cancel</span>
                        </a>
                    </div>
                </form>
            </div>

            <!-- Footer -->
            <div class="bg-[#006633] text-white px-5 md:px-6 py-3 md:py-4 flex items-center justify-center gap-2 md:gap-2.5 text-sm md:text-base">
                <i class="fas fa-university"></i>
                <span>Central Luzon State University</span>
            </div>
        </div>
    </div>
</div>

<script>
    // Password visibility toggle function
    function togglePasswordVisibility(inputId, button) {
        const input = document.getElementById(inputId);
        const icon = button.querySelector('i');
        
        if (input.type === 'password') {
            input.type = 'text';
            icon.classList.remove('fa-eye');
            icon.classList.add('fa-eye-slash');
            button.style.color = '#006633';
        } else {
            input.type = 'password';
            icon.classList.remove('fa-eye-slash');
            icon.classList.add('fa-eye');
            button.style.color = '#9ca3af';
        }
    }

    // Role data for dynamic updates
    const roleData = {
        1: { name: 'Applicant', avatar: 'from-[#9b59b6] to-[#8e44ad]', icon: 'fa-user-graduate', indicator: 'bg-[#f3e5f5] text-[#8e44ad]' },
        2: { name: 'Admin', avatar: 'from-[#e74c3c] to-[#c0392b]', icon: 'fa-user-shield', indicator: 'bg-[#fde8e8] text-[#c0392b]' },
        3: { name: 'Assessor', avatar: 'from-[#00994d] to-[#006633]', icon: 'fa-clipboard-check', indicator: 'bg-[#e8f5e9] text-[#006633]' },
    };

    // Update avatar when name parts change
    function updateAvatarFromName() {
        const avatar = document.getElementById('userAvatar');
        const first = document.getElementById('firstName')?.value.trim() || '';
        const last = document.getElementById('lastName')?.value.trim() || '';
        const combined = first || last || document.getElementById('middleName')?.value.trim() || '';
        const firstLetter = (combined.charAt(0) || '?').toUpperCase();
        avatar.textContent = firstLetter;
    }

    ['firstName','middleName','lastName','nameExtension'].forEach(id => {
        const el = document.getElementById(id);
        if (el) el.addEventListener('input', updateAvatarFromName);
    });

    // Update role indicator when role changes
    document.getElementById('roleSelect').addEventListener('change', function() {
        const role = this.value;
        const data = roleData[role];
        const avatar = document.getElementById('userAvatar');
        const indicator = document.getElementById('roleIndicator');
        const roleText = document.getElementById('roleText');

        // Update avatar class - remove old gradient classes and add new ones
        avatar.className = avatar.className.replace(/from-\[.*?\] to-\[.*?\]/g, '');
        avatar.classList.add(...data.avatar.split(' '));

        // Update role indicator - remove old color classes and add new ones
        indicator.className = 'inline-flex items-center gap-2 px-4 py-2 rounded-full text-xs md:text-sm font-semibold ' + data.indicator;
        indicator.querySelector('i').className = 'fas ' + data.icon;
        roleText.textContent = data.name;
    });


    // Password strength and match validation
    const passwordField = document.getElementById('password');
    const passwordConfirmationField = document.getElementById('password_confirmation');
    const passwordStrength = document.getElementById('passwordStrength');
    const passwordMatch = document.getElementById('passwordMatch');

    if (passwordField) {
        passwordField.addEventListener('input', function() {
            const password = this.value;
            
            if (password.length === 0) {
                passwordStrength.classList.add('hidden');
                return;
            }
            
            passwordStrength.classList.remove('hidden');
            
            let strength = 0;
            let strengthText = '';
            let strengthColor = '';
            
            if (password.length >= 8) strength++;
            if (password.length >= 12) strength++;
            if (/[a-z]/.test(password) && /[A-Z]/.test(password)) strength++;
            if (/\d/.test(password)) strength++;
            if (/[^a-zA-Z\d]/.test(password)) strength++;
            
            if (strength <= 2) {
                strengthText = 'Weak password';
                strengthColor = 'text-red-600';
            } else if (strength <= 3) {
                strengthText = 'Medium password';
                strengthColor = 'text-yellow-600';
            } else {
                strengthText = 'Strong password';
                strengthColor = 'text-green-600';
            }
            
            passwordStrength.textContent = strengthText;
            passwordStrength.className = 'text-xs mt-1 ' + strengthColor;
            
            // Check match if confirmation field has value
            if (passwordConfirmationField.value.length > 0) {
                checkPasswordMatch();
            }
        });
    }

    if (passwordConfirmationField) {
        passwordConfirmationField.addEventListener('input', checkPasswordMatch);
    }

    function checkPasswordMatch() {
        const password = passwordField.value;
        const confirmation = passwordConfirmationField.value;
        
        if (confirmation.length === 0) {
            passwordMatch.classList.add('hidden');
            return;
        }
        
        passwordMatch.classList.remove('hidden');
        
        if (password === confirmation) {
            passwordMatch.textContent = '✓ Passwords match';
            passwordMatch.className = 'text-xs mt-1.5 text-green-600';
            passwordConfirmationField.classList.remove('border-red-300');
            passwordConfirmationField.classList.add('border-green-300');
        } else {
            passwordMatch.textContent = '✗ Passwords do not match';
            passwordMatch.className = 'text-xs mt-1.5 text-red-600';
            passwordConfirmationField.classList.remove('border-green-300');
            passwordConfirmationField.classList.add('border-red-300');
        }
    }
</script>
@endsection