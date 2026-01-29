<head>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.js" defer></script>
    <link href="https://cdn.jsdelivr.net/npm/animate.css@4.1.1/animate.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Libre+Franklin:wght@300;400;500;600;700&family=Playfair+Display:wght@500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<style>
:root {
    --clsu-green: #006633;
    --clsu-green-dark: #004d26;
    --clsu-green-light: #008844;
    --clsu-yellow: #FFD700;
    --clsu-gold: #D4AF37;
}

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Libre Franklin', -apple-system, BlinkMacSystemFont, sans-serif;
}

html, body {
    height: 100%;
}

.clsu-reset-container {
    display: flex;
    min-height: 100vh;
    width: 100%;
}

/* Left Side - Branding */
.clsu-reset-branding {
    flex: 1;
    background: linear-gradient(135deg, var(--clsu-green) 0%, var(--clsu-green-dark) 100%);
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    padding: 3rem;
    position: relative;
    overflow: hidden;
}

.clsu-reset-branding::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: 
        radial-gradient(circle at 20% 80%, rgba(255, 215, 0, 0.1) 0%, transparent 40%),
        radial-gradient(circle at 80% 20%, rgba(255, 255, 255, 0.05) 0%, transparent 40%);
    pointer-events: none;
}

.clsu-decor-circle {
    position: absolute;
    border: 2px solid rgba(255, 255, 255, 0.1);
    border-radius: 50%;
    pointer-events: none;
}

.clsu-decor-circle-1 {
    width: 300px;
    height: 300px;
    top: -100px;
    left: -100px;
}

.clsu-decor-circle-2 {
    width: 200px;
    height: 200px;
    bottom: 10%;
    right: -50px;
    border-color: rgba(255, 215, 0, 0.15);
}

.clsu-pattern {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    height: 200px;
    background: linear-gradient(to top, rgba(0, 77, 38, 0.3) 0%, transparent 100%);
    pointer-events: none;
}

.clsu-branding-content {
    position: relative;
    z-index: 1;
    text-align: center;
    max-width: 450px;
}

.clsu-logo-large {
    width: 140px;
    height: 140px;
    background: #fff;
    border-radius: 50%;
    padding: 8px;
    margin: 0 auto 2rem;
    box-shadow: 
        0 20px 50px rgba(0, 0, 0, 0.3),
        0 0 0 6px rgba(255, 215, 0, 0.3);
    animation: float 3s ease-in-out infinite;
}

@keyframes float {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-10px); }
}

.clsu-logo-large img {
    width: 100%;
    height: 100%;
    object-fit: contain;
    border-radius: 50%;
}

.clsu-branding-title {
    font-family: 'Playfair Display', Georgia, serif;
    font-size: 2.5rem;
    font-weight: 700;
    color: #fff;
    margin-bottom: 0.75rem;
    text-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
}

.clsu-branding-subtitle {
    font-size: 1.1rem;
    color: rgba(255, 255, 255, 0.9);
    margin-bottom: 2.5rem;
    line-height: 1.6;
}

.clsu-security-features {
    margin-top: 2rem;
    text-align: left;
}

.clsu-feature-item {
    display: flex;
    align-items: center;
    gap: 1rem;
    margin-bottom: 1.25rem;
    color: rgba(255, 255, 255, 0.9);
    font-size: 0.95rem;
}

.clsu-feature-icon {
    width: 40px;
    height: 40px;
    background: rgba(255, 255, 255, 0.1);
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--clsu-yellow);
    font-size: 1rem;
    flex-shrink: 0;
}

/* Right Side - Reset Form */
.clsu-reset-form-side {
    flex: 1;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    padding: 3rem;
    background: linear-gradient(180deg, #fff 0%, #f8faf8 100%);
    position: relative;
}

.clsu-reset-form-container {
    width: 100%;
    max-width: 420px;
}

.clsu-mobile-logo {
    display: none;
    text-align: center;
    margin-bottom: 2rem;
}

.clsu-mobile-logo img {
    width: 80px;
    height: 80px;
    border-radius: 50%;
    box-shadow: 0 4px 15px rgba(0, 102, 51, 0.2);
}

.clsu-form-header {
    margin-bottom: 2.5rem;
}

.clsu-form-title {
    font-family: 'Playfair Display', Georgia, serif;
    font-size: 2rem;
    font-weight: 700;
    color: var(--clsu-green);
    margin-bottom: 0.5rem;
}

.clsu-form-subtitle {
    color: #6b7280;
    font-size: 1rem;
}

.clsu-form-group {
    margin-bottom: 1.5rem;
}

.clsu-form-label {
    display: block;
    font-weight: 600;
    color: #1a2e1a;
    margin-bottom: 0.6rem;
    font-size: 0.9rem;
}

.clsu-input-wrapper {
    position: relative;
}

.clsu-input-icon {
    position: absolute;
    left: 1rem;
    top: 50%;
    transform: translateY(-50%);
    color: #9ca3af;
    font-size: 1rem;
    transition: color 0.3s ease;
}

.clsu-form-input {
    width: 100%;
    padding: 1rem 3rem 1rem 3rem;
    border: 2px solid #e5e7eb;
    border-radius: 12px;
    font-size: 1rem;
    background: #fff;
    transition: all 0.3s ease;
    color: #1a2e1a;
}

.clsu-form-input:focus {
    outline: none;
    border-color: var(--clsu-green);
    box-shadow: 0 0 0 4px rgba(0, 102, 51, 0.1);
}

.clsu-form-input:focus ~ .clsu-input-icon,
.clsu-input-wrapper:focus-within .clsu-input-icon {
    color: var(--clsu-green);
}

.clsu-password-toggle {
    position: absolute;
    right: 1rem;
    top: 50%;
    transform: translateY(-50%);
    background: none;
    border: none;
    color: #9ca3af;
    cursor: pointer;
    padding: 0.5rem;
    transition: color 0.3s ease;
    z-index: 10;
}

.clsu-password-toggle:hover {
    color: #6b7280;
}

.clsu-input-error {
    color: #dc2626;
    font-size: 0.8rem;
    margin-top: 0.5rem;
    display: flex;
    align-items: center;
    gap: 0.35rem;
}

.clsu-password-strength {
    margin-top: 0.5rem;
}

.clsu-strength-bar {
    height: 4px;
    background: #e5e7eb;
    border-radius: 4px;
    overflow: hidden;
    margin-bottom: 0.25rem;
}

.clsu-strength-fill {
    height: 100%;
    width: 0;
    transition: all 0.3s ease;
    border-radius: 4px;
}

.clsu-strength-text {
    font-size: 0.7rem;
    color: #6b7280;
}

.clsu-btn-reset {
    width: 100%;
    padding: 1rem 1.5rem;
    background: linear-gradient(135deg, var(--clsu-green) 0%, var(--clsu-green-dark) 100%);
    color: #fff;
    border: none;
    border-radius: 12px;
    font-weight: 600;
    font-size: 1rem;
    cursor: pointer;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 0.6rem;
    box-shadow: 0 4px 15px rgba(0, 102, 51, 0.3);
    margin-top: 1.5rem;
}

.clsu-btn-reset:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(0, 102, 51, 0.4);
}

.clsu-form-footer {
    margin-top: 2rem;
    text-align: center;
    padding-top: 1.5rem;
    border-top: 1px solid #e5e7eb;
}

.clsu-footer-text {
    font-size: 0.85rem;
    color: #6b7280;
}

.clsu-footer-text a {
    color: var(--clsu-green);
    font-weight: 600;
    text-decoration: none;
}

.clsu-footer-text a:hover {
    text-decoration: underline;
}

@media (max-width: 1024px) {
    .clsu-reset-branding {
        display: none;
    }
    
    .clsu-reset-form-side {
        flex: 1;
    }
    
    .clsu-mobile-logo {
        display: block;
    }
    
    .clsu-form-title {
        text-align: center;
    }
    
    .clsu-form-subtitle {
        text-align: center;
    }
}

@media (max-width: 480px) {
    .clsu-reset-form-side {
        padding: 1.5rem;
    }
}
</style>

<div class="clsu-reset-container">
    {{-- Left Side - Branding --}}
    <div class="clsu-reset-branding">
        <div class="clsu-decor-circle clsu-decor-circle-1"></div>
        <div class="clsu-decor-circle clsu-decor-circle-2"></div>
        <div class="clsu-pattern"></div>
        
        <div class="clsu-branding-content">
            <div class="clsu-logo-large">
                <img src="{{ asset('images/cl.png') }}" alt="CLSU Logo">
            </div>
            
            <h1 class="clsu-branding-title">Reset Your Password</h1>
            <p class="clsu-branding-subtitle">
                Create a new secure password to protect your account
            </p>
            
            <div class="clsu-security-features">
                <div class="clsu-feature-item">
                    <div class="clsu-feature-icon">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <span>Secure password reset process</span>
                </div>
                <div class="clsu-feature-item">
                    <div class="clsu-feature-icon">
                        <i class="fas fa-lock"></i>
                    </div>
                    <span>Your account security is our priority</span>
                </div>
                <div class="clsu-feature-item">
                    <div class="clsu-feature-icon">
                        <i class="fas fa-key"></i>
                    </div>
                    <span>Choose a strong, unique password</span>
                </div>
            </div>
        </div>
    </div>

    {{-- Right Side - Reset Form --}}
    <div class="clsu-reset-form-side">
        <div class="clsu-reset-form-container">
            
            {{-- Mobile Logo --}}
            <div class="clsu-mobile-logo">
                <img src="{{ asset('images/cl.png') }}" alt="CLSU Logo">
            </div>
            
            {{-- Form Header --}}
            <div class="clsu-form-header">
                <h2 class="clsu-form-title">New Password</h2>
                <p class="clsu-form-subtitle">Enter your new password below</p>
            </div>

            <form method="POST" action="{{ route('password.store') }}">
                @csrf

                <!-- Password Reset Token -->
                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                <!-- Email Address -->
                <div class="clsu-form-group">
                    <label for="email" class="clsu-form-label">Email Address</label>
                    <div class="clsu-input-wrapper">
                        <input id="email" 
                               type="email" 
                               name="email" 
                               class="clsu-form-input" 
                               value="{{ old('email', $request->email) }}" 
                               placeholder="Enter your email"
                               required 
                               autofocus 
                               autocomplete="username">
                        <i class="fas fa-envelope clsu-input-icon"></i>
                    </div>
                    @error('email')
                        <p class="clsu-input-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <!-- Password -->
                <div class="clsu-form-group">
                    <label for="password" class="clsu-form-label">New Password</label>
                    <div class="clsu-input-wrapper">
                        <input id="password" 
                               type="password" 
                               name="password" 
                               class="clsu-form-input" 
                               placeholder="Enter new password (min. 8 characters)"
                               required 
                               autocomplete="new-password">
                        <i class="fas fa-lock clsu-input-icon"></i>
                    </div>
                    @error('password')
                        <p class="clsu-input-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $message }}
                        </p>
                    @enderror
                    <div class="clsu-password-strength">
                        <div class="clsu-strength-bar">
                            <div class="clsu-strength-fill" id="strengthFill"></div>
                        </div>
                        <p class="clsu-strength-text" id="strengthText">Use 8+ characters with letters & numbers</p>
                    </div>
                </div>

                <!-- Confirm Password -->
                <div class="clsu-form-group">
                    <label for="password_confirmation" class="clsu-form-label">Confirm Password</label>
                    <div class="clsu-input-wrapper">
                        <input id="password_confirmation" 
                               type="password" 
                               name="password_confirmation" 
                               class="clsu-form-input" 
                               placeholder="Confirm your new password"
                               required 
                               autocomplete="new-password"
                               style="padding-right: 3.5rem;">
                        <i class="fas fa-lock clsu-input-icon"></i>
                        <button 
                            type="button" 
                            onclick="togglePasswordVisibility('password_confirmation', this)"
                            style="position: absolute; right: 1rem; top: 50%; transform: translateY(-50%); background: none; border: none; color: #9ca3af; cursor: pointer; padding: 0.5rem; z-index: 10; transition: color 0.3s ease;"
                            title="Show/Hide Password"
                        >
                            <i class="fas fa-eye" style="font-size: 1.2rem;" id="passwordConfirmationToggleIcon"></i>
                        </button>
                    </div>
                    @error('password_confirmation')
                        <p class="clsu-input-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $message }}
                        </p>
                    @enderror
                    <p id="passwordMatch" class="clsu-strength-text hidden"></p>
                </div>

                <!-- Reset Button -->
                <button type="submit" class="clsu-btn-reset">
                    <i class="fas fa-key"></i>
                    Reset Password
                </button>
            </form>

            {{-- Footer --}}
            <div class="clsu-form-footer">
                <p class="clsu-footer-text">
                    Remember your password? <a href="{{ route('login') }}">Sign in here</a>
                </p>
            </div>
        </div>
    </div>
</div>

<script>

    // Password strength indicator
    const passwordInput = document.getElementById('password');
    const passwordConfirmationInput = document.getElementById('password_confirmation');
    const strengthFill = document.getElementById('strengthFill');
    const strengthText = document.getElementById('strengthText');
    const passwordMatch = document.getElementById('passwordMatch');

    if (passwordInput) {
        passwordInput.addEventListener('input', function() {
            const password = this.value;
            let strength = 0;
            
            if (password.length >= 8) strength++;
            if (password.match(/[a-z]/)) strength++;
            if (password.match(/[A-Z]/)) strength++;
            if (password.match(/[0-9]/)) strength++;
            if (password.match(/[^a-zA-Z0-9]/)) strength++;

            const width = (strength / 5) * 100;
            strengthFill.style.width = width + '%';

            if (strength === 0) {
                strengthFill.style.background = '#e5e7eb';
                strengthText.textContent = 'Use 8+ characters with letters & numbers';
            } else if (strength <= 2) {
                strengthFill.style.background = '#ef4444';
                strengthText.textContent = 'Weak password';
            } else if (strength <= 3) {
                strengthFill.style.background = '#f59e0b';
                strengthText.textContent = 'Fair password';
            } else if (strength <= 4) {
                strengthFill.style.background = '#10b981';
                strengthText.textContent = 'Good password';
            } else {
                strengthFill.style.background = '#006633';
                strengthText.textContent = 'Strong password';
            }
            
            // Check match if confirmation has value
            if (passwordConfirmationInput.value.length > 0) {
                checkPasswordMatch();
            }
        });
    }

    if (passwordConfirmationInput) {
        passwordConfirmationInput.addEventListener('input', checkPasswordMatch);
    }

    function checkPasswordMatch() {
        const password = passwordInput.value;
        const confirmation = passwordConfirmationInput.value;
        
        if (confirmation.length === 0) {
            passwordMatch.classList.add('hidden');
            return;
        }
        
        passwordMatch.classList.remove('hidden');
        
        if (password === confirmation) {
            passwordMatch.textContent = '✓ Passwords match';
            passwordMatch.className = 'clsu-strength-text text-green-600';
            passwordConfirmationInput.classList.remove('border-red-300');
            passwordConfirmationInput.classList.add('border-green-300');
        } else {
            passwordMatch.textContent = '✗ Passwords do not match';
            passwordMatch.className = 'clsu-strength-text text-red-600';
            passwordConfirmationInput.classList.remove('border-green-300');
            passwordConfirmationInput.classList.add('border-red-300');
        }
    }

    // Password visibility toggle
    function togglePasswordVisibility(fieldId, button) {
        const field = document.getElementById(fieldId);
        const icon = button.querySelector('i');
        
        if (field.type === 'password') {
            field.type = 'text';
            icon.classList.remove('fa-eye');
            icon.classList.add('fa-eye-slash');
            button.style.color = '#006633';
        } else {
            field.type = 'password';
            icon.classList.remove('fa-eye-slash');
            icon.classList.add('fa-eye');
            button.style.color = '#9ca3af';
        }
    }
</script>
