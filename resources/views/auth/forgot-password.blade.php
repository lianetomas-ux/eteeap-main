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

.clsu-forgot-container {
    display: flex;
    min-height: 100vh;
    width: 100%;
}

/* Left Side - Branding */
.clsu-forgot-branding {
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

.clsu-forgot-branding::before {
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

/* Right Side - Forgot Form */
.clsu-forgot-form-side {
    flex: 1;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    padding: 3rem;
    background: linear-gradient(180deg, #fff 0%, #f8faf8 100%);
    position: relative;
}

.clsu-forgot-form-container {
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
    padding: 1rem 1rem 1rem 3rem;
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

.clsu-input-error {
    color: #dc2626;
    font-size: 0.8rem;
    margin-top: 0.5rem;
    display: flex;
    align-items: center;
    gap: 0.35rem;
}

.clsu-session-status {
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

.clsu-btn-send {
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
    margin-bottom: 1.25rem;
}

.clsu-btn-send:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(0, 102, 51, 0.4);
}

.clsu-btn-back {
    width: 100%;
    padding: 0.85rem 1rem;
    background: transparent;
    color: #6b7280;
    border: 2px solid #e5e7eb;
    border-radius: 12px;
    font-weight: 600;
    font-size: 0.9rem;
    cursor: pointer;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 0.5rem;
    text-decoration: none;
}

.clsu-btn-back:hover {
    background: #f3f4f6;
    border-color: #d1d5db;
    color: #374151;
}

.clsu-form-footer {
    margin-top: 2.5rem;
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
    .clsu-forgot-branding {
        display: none;
    }
    
    .clsu-forgot-form-side {
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
    .clsu-forgot-form-side {
        padding: 1.5rem;
    }
}
</style>

<div class="clsu-forgot-container">
    {{-- Left Side - Branding --}}
    <div class="clsu-forgot-branding">
        <div class="clsu-decor-circle clsu-decor-circle-1"></div>
        <div class="clsu-decor-circle clsu-decor-circle-2"></div>
        <div class="clsu-pattern"></div>
        
        <div class="clsu-branding-content">
            <div class="clsu-logo-large">
                <img src="{{ asset('images/cl.png') }}" alt="CLSU Logo">
            </div>
            
            <h1 class="clsu-branding-title">Reset Password</h1>
            <p class="clsu-branding-subtitle">
                Don't worry! We'll help you regain access to your account securely.
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
                        <i class="fas fa-envelope"></i>
                    </div>
                    <span>Reset link sent to your email</span>
                </div>
                <div class="clsu-feature-item">
                    <div class="clsu-feature-icon">
                        <i class="fas fa-clock"></i>
                    </div>
                    <span>Link expires in 60 minutes</span>
                </div>
            </div>
        </div>
    </div>

    {{-- Right Side - Forgot Form --}}
    <div class="clsu-forgot-form-side">
        <div class="clsu-forgot-form-container">
            
            {{-- Mobile Logo --}}
            <div class="clsu-mobile-logo">
                <img src="{{ asset('images/cl.png') }}" alt="CLSU Logo">
            </div>
            
            {{-- Form Header --}}
            <div class="clsu-form-header">
                <h2 class="clsu-form-title">Forgot Password?</h2>
                <p class="clsu-form-subtitle">Enter your email address and we'll send you a reset link</p>
            </div>

            {{-- Session Status --}}
            @if (session('status'))
            <div class="clsu-session-status">
                <i class="fas fa-check-circle"></i>
                {{ session('status') }}
            </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                {{-- Email --}}
                <div class="clsu-form-group">
                    <label for="email" class="clsu-form-label">Email Address</label>
                    <div class="clsu-input-wrapper">
                        <input id="email" 
                               type="email" 
                               name="email" 
                               class="clsu-form-input" 
                               value="{{ old('email') }}" 
                               placeholder="Enter your email address"
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

                {{-- Send Button --}}
                <button type="submit" class="clsu-btn-send">
                    <i class="fas fa-paper-plane"></i>
                    Send Password Reset Link
                </button>

                {{-- Back to Login --}}
                <a href="{{ route('login') }}" class="clsu-btn-back">
                    <i class="fas fa-arrow-left"></i>
                    Back to Login
                </a>
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
