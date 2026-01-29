<head>
    <link href="https://fonts.googleapis.com/css2?family=Libre+Franklin:wght@300;400;500;600;700&family=Playfair+Display:wght@500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<style>
:root {
    --clsu-green: #006633;
    --clsu-green-dark: #004d26;
    --clsu-green-light: #008844;
    --clsu-yellow: #FFD700;
    --clsu-gold: #D4AF37;
    --clsu-gold-light: #F5E6A3;
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

.clsu-verify-container {
    display: flex;
    min-height: 100vh;
    width: 100%;
}

/* Left Side - Branding */
.clsu-verify-branding {
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

.clsu-verify-branding::before {
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
    max-width: 400px;
}

.clsu-logo-large {
    width: 120px;
    height: 120px;
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
    font-size: 2rem;
    font-weight: 700;
    color: #fff;
    margin-bottom: 0.75rem;
}

.clsu-branding-subtitle {
    font-size: 1rem;
    color: rgba(255, 255, 255, 0.9);
    line-height: 1.6;
}

/* Right Side - Verification Content */
.clsu-verify-content-side {
    flex: 1;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    padding: 3rem;
    background: linear-gradient(180deg, #fff 0%, #f8faf8 100%);
    position: relative;
}

.clsu-verify-content-container {
    width: 100%;
    max-width: 480px;
    text-align: center;
}

/* Mobile Logo */
.clsu-mobile-logo {
    display: none;
    margin-bottom: 2rem;
}

.clsu-mobile-logo img {
    width: 80px;
    height: 80px;
    border-radius: 50%;
    box-shadow: 0 4px 15px rgba(0, 102, 51, 0.2);
}

/* Email Icon */
.clsu-email-icon {
    width: 100px;
    height: 100px;
    background: linear-gradient(135deg, #dcfce7 0%, #bbf7d0 100%);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 2rem;
    position: relative;
}

.clsu-email-icon i {
    font-size: 2.5rem;
    color: var(--clsu-green);
}

.clsu-email-icon::after {
    content: '';
    position: absolute;
    width: 120px;
    height: 120px;
    border: 2px dashed rgba(0, 102, 51, 0.2);
    border-radius: 50%;
    animation: spin 20s linear infinite;
}

@keyframes spin {
    from { transform: rotate(0deg); }
    to { transform: rotate(360deg); }
}

/* Notification Badge */
.clsu-notification-badge {
    position: absolute;
    top: 5px;
    right: 5px;
    width: 28px;
    height: 28px;
    background: linear-gradient(135deg, var(--clsu-gold) 0%, var(--clsu-yellow) 100%);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 2px 8px rgba(212, 175, 55, 0.4);
}

.clsu-notification-badge i {
    font-size: 0.8rem;
    color: var(--clsu-green-dark);
}

/* Content Header */
.clsu-content-header {
    margin-bottom: 1.5rem;
}

.clsu-content-title {
    font-family: 'Playfair Display', Georgia, serif;
    font-size: 1.75rem;
    font-weight: 700;
    color: var(--clsu-green);
    margin-bottom: 0.5rem;
}

.clsu-content-subtitle {
    color: #6b7280;
    font-size: 0.95rem;
}

/* Message Box */
.clsu-message-box {
    background: linear-gradient(135deg, #f0fdf4 0%, #ecfdf5 100%);
    border-left: 4px solid var(--clsu-green);
    padding: 1.25rem 1.5rem;
    border-radius: 0 12px 12px 0;
    text-align: left;
    margin-bottom: 1.5rem;
}

.clsu-message-box p {
    color: #1a2e1a;
    font-size: 0.95rem;
    line-height: 1.6;
    margin: 0;
}

/* Success Alert */
.clsu-success-alert {
    background: linear-gradient(135deg, #dcfce7 0%, #bbf7d0 100%);
    color: #166534;
    padding: 1rem 1.25rem;
    border-radius: 12px;
    margin-bottom: 1.5rem;
    display: flex;
    align-items: center;
    gap: 0.75rem;
    text-align: left;
}

.clsu-success-alert i {
    font-size: 1.25rem;
    flex-shrink: 0;
}

.clsu-success-alert p {
    margin: 0;
    font-size: 0.9rem;
    font-weight: 500;
}

/* Steps */
.clsu-steps {
    display: flex;
    justify-content: center;
    gap: 1rem;
    margin-bottom: 2rem;
}

.clsu-step {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 0.5rem;
}

.clsu-step-icon {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.1rem;
}

.clsu-step-icon.completed {
    background: linear-gradient(135deg, var(--clsu-green) 0%, var(--clsu-green-dark) 100%);
    color: #fff;
}

.clsu-step-icon.active {
    background: linear-gradient(135deg, var(--clsu-gold) 0%, var(--clsu-yellow) 100%);
    color: var(--clsu-green-dark);
    animation: pulse 2s ease-in-out infinite;
}

@keyframes pulse {
    0%, 100% { box-shadow: 0 0 0 0 rgba(212, 175, 55, 0.4); }
    50% { box-shadow: 0 0 0 10px rgba(212, 175, 55, 0); }
}

.clsu-step-icon.pending {
    background: #e5e7eb;
    color: #9ca3af;
}

.clsu-step-text {
    font-size: 0.75rem;
    color: #6b7280;
    font-weight: 500;
}

.clsu-step-connector {
    width: 40px;
    height: 2px;
    background: #e5e7eb;
    margin-top: 25px;
}

.clsu-step-connector.completed {
    background: var(--clsu-green);
}

/* Action Buttons */
.clsu-actions {
    display: flex;
    flex-direction: column;
    gap: 1rem;
}

.clsu-btn-primary {
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
}

.clsu-btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(0, 102, 51, 0.4);
}

.clsu-btn-secondary {
    width: 100%;
    padding: 0.85rem 1.5rem;
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
}

.clsu-btn-secondary:hover {
    background: #f3f4f6;
    border-color: #d1d5db;
    color: #374151;
}

/* Help Section */
.clsu-help {
    margin-top: 2.5rem;
    padding-top: 1.5rem;
    border-top: 1px solid #e5e7eb;
}

.clsu-help-title {
    font-size: 0.85rem;
    color: #6b7280;
    margin-bottom: 1rem;
}

.clsu-help-links {
    display: flex;
    justify-content: center;
    gap: 2rem;
}

.clsu-help-link {
    display: flex;
    align-items: center;
    gap: 0.4rem;
    font-size: 0.85rem;
    color: var(--clsu-green);
    text-decoration: none;
    font-weight: 500;
    transition: color 0.2s ease;
}

.clsu-help-link:hover {
    color: var(--clsu-green-dark);
    text-decoration: underline;
}

/* Footer */
.clsu-verify-footer {
    margin-top: 2rem;
    text-align: center;
}

.clsu-footer-text {
    font-size: 0.8rem;
    color: #9ca3af;
}

/* Responsive */
@media (max-width: 1024px) {
    .clsu-verify-branding {
        display: none;
    }
    
    .clsu-verify-content-side {
        flex: 1;
    }
    
    .clsu-mobile-logo {
        display: block;
    }
}

@media (max-width: 480px) {
    .clsu-verify-content-side {
        padding: 1.5rem;
    }
    
    .clsu-steps {
        flex-wrap: wrap;
    }
    
    .clsu-step-connector {
        display: none;
    }
    
    .clsu-help-links {
        flex-direction: column;
        gap: 1rem;
    }
}
</style>

<div class="clsu-verify-container">
    {{-- Left Side - Branding --}}
    <div class="clsu-verify-branding">
        <div class="clsu-decor-circle clsu-decor-circle-1"></div>
        <div class="clsu-decor-circle clsu-decor-circle-2"></div>
        <div class="clsu-pattern"></div>
        
        <div class="clsu-branding-content">
            <div class="clsu-logo-large">
                <img src="{{ asset('images/logo12.png') }}" alt="CLSU Logo">
            </div>
            
            <h1 class="clsu-branding-title">Almost There!</h1>
            <p class="clsu-branding-subtitle">
                Just one more step to complete your registration and access all the features of CLSU Portal.
            </p>
        </div>
    </div>

    {{-- Right Side - Verification Content --}}
    <div class="clsu-verify-content-side">
        <div class="clsu-verify-content-container">
            
            {{-- Mobile Logo --}}
            <div class="clsu-mobile-logo">
                <img src="{{ asset('images/cl.png') }}" alt="CLSU Logo">
            </div>

            {{-- Email Icon --}}
            <div class="clsu-email-icon">
                <i class="fa fa-envelope"></i>
                <div class="clsu-notification-badge">
                    <i class="fa fa-bell"></i>
                </div>
            </div>

            {{-- Content Header --}}
            <div class="clsu-content-header">
                <h2 class="clsu-content-title">Verify Your Email</h2>
                <p class="clsu-content-subtitle">We've sent a verification link to your email</p>
            </div>

            {{-- Progress Steps --}}
            <div class="clsu-steps">
                <div class="clsu-step">
                    <div class="clsu-step-icon completed">
                        <i class="fa fa-check"></i>
                    </div>
                    <span class="clsu-step-text">Register</span>
                </div>
                <div class="clsu-step-connector completed"></div>
                <div class="clsu-step">
                    <div class="clsu-step-icon active">
                        <i class="fa fa-envelope"></i>
                    </div>
                    <span class="clsu-step-text">Verify Email</span>
                </div>
                <div class="clsu-step-connector"></div>
                <div class="clsu-step">
                    <div class="clsu-step-icon pending">
                        <i class="fa fa-user"></i>
                    </div>
                    <span class="clsu-step-text">Complete</span>
                </div>
            </div>

            {{-- Message Box --}}
            <div class="clsu-message-box">
                <p>
                    Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn't receive the email, we will gladly send you another.
                </p>
            </div>

            {{-- Success Alert --}}
            @if (session('status') == 'verification-link-sent')
            <div class="clsu-success-alert">
                <i class="fa fa-check-circle"></i>
                <p>A new verification link has been sent to the email address you provided during registration.</p>
            </div>
            @endif

            {{-- Action Buttons --}}
            <div class="clsu-actions">
                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf
                    <button type="submit" class="clsu-btn-primary">
                        <i class="fa fa-paper-plane"></i>
                        Resend Verification Email
                    </button>
                </form>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="clsu-btn-secondary">
                        <i class="fa fa-sign-out"></i>
                        Log Out
                    </button>
                </form>
            </div>

            {{-- Help Section --}}
            <div class="clsu-help">
                <p class="clsu-help-title">Need help?</p>
                <div class="clsu-help-links">
                    <a href="#" class="clsu-help-link">
                        <i class="fa fa-question-circle"></i>
                        Check spam folder
                    </a>
                    <a href="#" class="clsu-help-link">
                        <i class="fa fa-envelope-o"></i>
                        Change email
                    </a>
                    <a href="#" class="clsu-help-link">
                        <i class="fa fa-headphones"></i>
                        Contact support
                    </a>
                </div>
            </div>

            {{-- Footer --}}
            <div class="clsu-verify-footer">
                <p class="clsu-footer-text">
                    CLSU — Sieving for Excellence
                </p>
            </div>
        </div>
    </div>
</div>