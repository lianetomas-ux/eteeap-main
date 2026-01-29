<head>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.js" defer></script>
    <link href="https://cdn.jsdelivr.net/npm/animate.css@4.1.1/animate.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:wght@500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<style>
:root {
    --clsu-green: #087A29;
    --clsu-green-dark: #065a1f;
    --clsu-green-light: #0a9e35;
    --clsu-gold: #F9B233;
    --clsu-gold-light: #ffc107;
}

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
}

html, body {
    height: 100%;
}

.login-container {
    display: flex;
    min-height: 100vh;
    width: 100%;
}

/* Left Side - Image/Branding */
.login-branding {
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

.login-branding::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.03'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
    pointer-events: none;
}

/* Decorative Elements */
.decor-circle {
    position: absolute;
    border-radius: 50%;
    pointer-events: none;
}

.decor-circle-1 {
    width: 400px;
    height: 400px;
    top: -150px;
    left: -150px;
    background: radial-gradient(circle, rgba(249, 178, 51, 0.15) 0%, transparent 70%);
}

.decor-circle-2 {
    width: 300px;
    height: 300px;
    bottom: -100px;
    right: -100px;
    background: radial-gradient(circle, rgba(255, 255, 255, 0.1) 0%, transparent 70%);
}

.decor-circle-3 {
    width: 200px;
    height: 200px;
    top: 50%;
    right: -50px;
    background: radial-gradient(circle, rgba(249, 178, 51, 0.1) 0%, transparent 70%);
}

/* Branding Content */
.branding-content {
    position: relative;
    z-index: 1;
    text-align: center;
    max-width: 480px;
}

.logo-container {
    width: 150px;
    height: 150px;
    background: #fff;
    border-radius: 50%;
    padding: 10px;
    margin: 0 auto 2.5rem;
    box-shadow: 0 25px 50px rgba(0, 0, 0, 0.3), 0 0 0 8px rgba(249, 178, 51, 0.3);
    animation: float 4s ease-in-out infinite;
}

@keyframes float {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-15px); }
}

.logo-container img {
    width: 100%;
    height: 100%;
    object-fit: contain;
    border-radius: 50%;
}

.branding-title {
    font-family: 'Playfair Display', Georgia, serif;
    font-size: 2.25rem;
    font-weight: 700;
    color: #fff;
    margin-bottom: 1rem;
    text-shadow: 0 2px 15px rgba(0, 0, 0, 0.2);
    line-height: 1.3;
}

.branding-subtitle {
    font-size: 1.1rem;
    color: rgba(255, 255, 255, 0.9);
    margin-bottom: 2rem;
    line-height: 1.6;
}

.university-badge {
    display: inline-flex;
    align-items: center;
    gap: 1rem;
    background: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(10px);
    padding: 1rem 1.5rem;
    border-radius: 60px;
    border: 1px solid rgba(255, 255, 255, 0.2);
}

.university-badge img {
    width: 45px;
    height: 45px;
    object-fit: contain;
}

.university-badge-text {
    text-align: left;
}

.university-badge-text span {
    display: block;
    color: var(--clsu-gold);
    font-weight: 700;
    font-size: 0.85rem;
    letter-spacing: 0.05em;
}

.university-badge-text small {
    color: rgba(255, 255, 255, 0.8);
    font-size: 0.75rem;
}

/* Features */
.features-list {
    margin-top: 3rem;
    text-align: left;
}

.feature-item {
    display: flex;
    align-items: center;
    gap: 1rem;
    margin-bottom: 1.25rem;
    color: rgba(255, 255, 255, 0.95);
    font-size: 0.95rem;
}

.feature-icon {
    width: 44px;
    height: 44px;
    background: rgba(255, 255, 255, 0.1);
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--clsu-gold);
    font-size: 1.1rem;
    flex-shrink: 0;
}

/* Right Side - Login Form */
.login-form-side {
    flex: 1;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    padding: 3rem;
    background: linear-gradient(180deg, #ffffff 0%, #f8faf8 100%);
    position: relative;
}

.login-form-container {
    width: 100%;
    max-width: 440px;
}

/* Mobile Logo */
.mobile-header {
    display: none;
    text-align: center;
    margin-bottom: 2rem;
}

.mobile-header img {
    width: 80px;
    height: 80px;
    border-radius: 50%;
    box-shadow: 0 8px 25px rgba(8, 122, 41, 0.2);
    margin-bottom: 1rem;
}

.mobile-header h1 {
    font-size: 1.25rem;
    color: var(--clsu-green);
    font-weight: 700;
}

/* Form Header */
.form-header {
    margin-bottom: 2rem;
}

.form-title {
    font-family: 'Playfair Display', Georgia, serif;
    font-size: 2.25rem;
    font-weight: 700;
    color: var(--clsu-green);
    margin-bottom: 0.5rem;
}

.form-subtitle {
    color: #6b7280;
    font-size: 1rem;
}

/* Session Status */
.session-status {
    background: linear-gradient(135deg, #dcfce7 0%, #bbf7d0 100%);
    color: #166534;
    padding: 1rem 1.25rem;
    border-radius: 12px;
    margin-bottom: 1.5rem;
    font-size: 0.9rem;
    display: flex;
    align-items: center;
    gap: 0.75rem;
    border-left: 4px solid var(--clsu-green);
}

/* Form Groups */
.form-group {
    margin-bottom: 1.5rem;
}

.form-label {
    display: block;
    font-weight: 600;
    color: #1f2937;
    margin-bottom: 0.6rem;
    font-size: 0.9rem;
}

.input-wrapper {
    position: relative;
}

.input-icon {
    position: absolute;
    left: 1rem;
    top: 50%;
    transform: translateY(-50%);
    color: #9ca3af;
    font-size: 1rem;
    transition: color 0.3s ease;
    z-index: 1;
}

.form-input {
    width: 100%;
    padding: 1rem 1rem 1rem 3rem;
    border: 2px solid #e5e7eb;
    border-radius: 14px;
    font-size: 1rem;
    background: #fff;
    transition: all 0.3s ease;
    color: #1f2937;
}

.form-input:focus {
    outline: none;
    border-color: var(--clsu-green);
    box-shadow: 0 0 0 4px rgba(8, 122, 41, 0.1);
}

.form-input:focus ~ .input-icon,
.input-wrapper:focus-within .input-icon {
    color: var(--clsu-green);
}

.form-input::placeholder {
    color: #9ca3af;
}

.input-error {
    color: #dc2626;
    font-size: 0.8rem;
    margin-top: 0.5rem;
    display: flex;
    align-items: center;
    gap: 0.35rem;
}

/* Password Toggle */
.password-toggle {
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
    z-index: 2;
}

.password-toggle:hover {
    color: var(--clsu-green);
}

/* Form Options */
.form-options {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 2rem;
}

.checkbox-label {
    display: flex;
    align-items: center;
    gap: 0.6rem;
    cursor: pointer;
}

.checkbox {
    width: 20px;
    height: 20px;
    accent-color: var(--clsu-green);
    cursor: pointer;
    border-radius: 4px;
}

.checkbox-text {
    font-size: 0.9rem;
    color: #4b5563;
}

.forgot-link {
    font-size: 0.9rem;
    color: var(--clsu-green);
    text-decoration: none;
    font-weight: 600;
    transition: all 0.2s ease;
}

.forgot-link:hover {
    color: var(--clsu-green-dark);
    text-decoration: underline;
}

/* Buttons */
.btn-login {
    width: 100%;
    padding: 1rem 1.5rem;
    background: linear-gradient(135deg, var(--clsu-green) 0%, var(--clsu-green-dark) 100%);
    color: #fff;
    border: none;
    border-radius: 14px;
    font-weight: 600;
    font-size: 1rem;
    cursor: pointer;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 0.6rem;
    box-shadow: 0 4px 15px rgba(8, 122, 41, 0.3);
    margin-bottom: 1.25rem;
}

.btn-login:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(8, 122, 41, 0.4);
}

.btn-login:active {
    transform: translateY(0);
}

/* Divider */
.divider {
    display: flex;
    align-items: center;
    margin: 1.5rem 0;
}

.divider-line {
    flex: 1;
    height: 1px;
    background: #e5e7eb;
}

.divider-text {
    padding: 0 1rem;
    color: #9ca3af;
    font-size: 0.85rem;
}

/* Secondary Buttons */
.btn-group {
    display: flex;
    gap: 1rem;
}

.btn-secondary {
    flex: 1;
    padding: 0.85rem 1rem;
    border-radius: 14px;
    font-weight: 600;
    font-size: 0.9rem;
    cursor: pointer;
    transition: all 0.25s ease;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 0.5rem;
    text-decoration: none;
}

.btn-home {
    background: #f3f4f6;
    color: #4b5563;
    border: 2px solid #e5e7eb;
}

.btn-home:hover {
    background: #e5e7eb;
    border-color: #d1d5db;
    color: #374151;
}

.btn-register {
    background: linear-gradient(135deg, var(--clsu-gold) 0%, var(--clsu-gold-light) 100%);
    color: var(--clsu-green-dark);
    border: none;
}

.btn-register:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(249, 178, 51, 0.4);
    color: var(--clsu-green-dark);
}

/* Footer */
.form-footer {
    margin-top: 2rem;
    text-align: center;
    padding-top: 1.5rem;
    border-top: 1px solid #e5e7eb;
}

.footer-text {
    font-size: 0.9rem;
    color: #6b7280;
}

.footer-text a {
    color: var(--clsu-green);
    font-weight: 600;
    text-decoration: none;
}

.footer-text a:hover {
    text-decoration: underline;
}

/* Responsive */
@media (max-width: 1024px) {
    .login-branding {
        display: none;
    }
    
    .login-form-side {
        flex: 1;
    }
    
    .mobile-header {
        display: block;
    }
}

@media (max-width: 480px) {
    .login-form-side {
        padding: 1.5rem;
    }
    
    .form-options {
        flex-direction: column;
        align-items: flex-start;
        gap: 1rem;
    }
    
    .btn-group {
        flex-direction: column;
    }
    
    .form-title {
        font-size: 1.75rem;
    }
}
</style>


<div class="login-container">
    {{-- Left Side - Branding --}}
    <div class="login-branding">
        <div class="decor-circle decor-circle-1"></div>
        <div class="decor-circle decor-circle-2"></div>
        <div class="decor-circle decor-circle-3"></div>
        
        <div class="branding-content">
            <div class="logo-container">
                <img src="{{ asset('images/cl.png') }}" alt="CLSU Logo">
            </div>
            
            <h1 class="branding-title">ETEEAP Application Portal</h1>
            <p class="branding-subtitle">
                Expanded Tertiary Education Equivalency and Accreditation Program
            </p>
            
            <div class="university-badge">
                <img src="{{ asset('images/eteeap.png') }}" alt="ETEEAP">
                <div class="university-badge-text">
                    <span>CENTRAL LUZON STATE UNIVERSITY</span>
                    <small>Science City of Muñoz, Nueva Ecija</small>
                </div>
            </div>
            
            <div class="features-list">
                <div class="feature-item">
                    <div class="feature-icon">
                        <i class="fas fa-graduation-cap"></i>
                    </div>
                    <span>Earn your degree through work experience</span>
                </div>
                <div class="feature-item">
                    <div class="feature-icon">
                        <i class="fas fa-clock"></i>
                    </div>
                    <span>Flexible learning for working professionals</span>
                </div>
                <div class="feature-item">
                    <div class="feature-icon">
                        <i class="fas fa-award"></i>
                    </div>
                    <span>CHED-recognized accreditation program</span>
                </div>
            </div>
        </div>
    </div>

    {{-- Right Side - Login Form --}}
    <div class="login-form-side">
        <div class="login-form-container">
            
            {{-- Mobile Header --}}
            <div class="mobile-header">
                <img src="{{ asset('images/cl.png') }}" alt="CLSU Logo">
                <h1>CLSU ETEEAP Portal</h1>
            </div>
            
            {{-- Form Header --}}
            <div class="form-header">
                <h2 class="form-title">Welcome Back</h2>
                <p class="form-subtitle">Sign in to continue to your account</p>
            </div>

            {{-- Session Status --}}
            @if (session('status'))
            <div class="session-status">
                <i class="fas fa-check-circle"></i>
                {{ session('status') }}
            </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                {{-- Email --}}
                <div class="form-group">
                    <label for="email" class="form-label">Email Address</label>
                    <div class="input-wrapper">
                        <input id="email" 
                               type="email" 
                               name="email" 
                               class="form-input" 
                               value="{{ old('email') }}" 
                               placeholder="Enter your email"
                               required 
                               autofocus 
                               autocomplete="username">
                        <i class="fas fa-envelope input-icon"></i>
                    </div>
                    @error('email')
                        <p class="input-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                {{-- Password --}}
                <div class="form-group">
                    <label for="password" class="form-label">Password</label>
                    <div class="input-wrapper">
                        <input id="password" 
                               type="password" 
                               name="password" 
                               class="form-input" 
                               placeholder="Enter your password"
                               required 
                               autocomplete="current-password"
                               style="padding-right: 3.5rem;">
                        <i class="fas fa-lock input-icon"></i>
                        <button type="button" 
                                onclick="togglePasswordVisibility('password', this)"
                                class="password-toggle"
                                title="Show/Hide Password">
                            <i class="fas fa-eye" id="passwordToggleIcon"></i>
                        </button>
                    </div>
                    @error('password')
                        <p class="input-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                {{-- Remember & Forgot --}}
                <div class="form-options">
                    <label class="checkbox-label">
                        <input id="remember_me" type="checkbox" name="remember" class="checkbox">
                        <span class="checkbox-text">Remember me</span>
                    </label>

                    @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="forgot-link">
                        Forgot password?
                    </a>
                    @endif
                </div>

                {{-- Login Button --}}
                <button type="submit" class="btn-login">
                    <i class="fas fa-sign-in-alt"></i>
                    Sign In
                </button>

                {{-- Divider --}}
                <div class="divider">
                    <div class="divider-line"></div>
                    <span class="divider-text">or</span>
                    <div class="divider-line"></div>
                </div>

                {{-- Secondary Buttons --}}
                <div class="btn-group">
                    <a href="{{ url('/') }}" class="btn-secondary btn-home">
                        <i class="fas fa-home"></i>
                        Back to Home
                    </a>
                    <a href="{{ route('register') }}" class="btn-secondary btn-register">
                        <i class="fas fa-user-plus"></i>
                        Register
                    </a>
                </div>
            </form>

            {{-- Footer --}}
            <div class="form-footer">
                <p class="footer-text">
                    Don't have an account? <a href="{{ route('register') }}">Create one now</a>
                </p>
            </div>
        </div>
    </div>
</div>

<script>
function togglePasswordVisibility(fieldId, button) {
    const field = document.getElementById(fieldId);
    const icon = button.querySelector('i');
    
    if (field.type === 'password') {
        field.type = 'text';
        icon.classList.remove('fa-eye');
        icon.classList.add('fa-eye-slash');
        button.style.color = '#087A29';
    } else {
        field.type = 'password';
        icon.classList.remove('fa-eye-slash');
        icon.classList.add('fa-eye');
        button.style.color = '#9ca3af';
    }
}
</script>