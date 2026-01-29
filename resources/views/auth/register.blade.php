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

.clsu-register-container {
    display: flex;
    min-height: 100vh;
    width: 100%;
}

/* Left Side - Branding */
.clsu-register-branding {
    flex: 0.85;
    background: linear-gradient(135deg, var(--clsu-green) 0%, var(--clsu-green-dark) 100%);
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    padding: 3rem;
    position: relative;
    overflow: hidden;
}

.clsu-register-branding::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.03'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
    pointer-events: none;
}

.clsu-decor-circle {
    position: absolute;
    border-radius: 50%;
    pointer-events: none;
}

.clsu-decor-circle-1 { 
    width: 350px; 
    height: 350px; 
    top: -120px; 
    left: -120px; 
    background: radial-gradient(circle, rgba(249, 178, 51, 0.15) 0%, transparent 70%);
}
.clsu-decor-circle-2 { 
    width: 280px; 
    height: 280px; 
    bottom: -80px; 
    right: -80px; 
    background: radial-gradient(circle, rgba(255, 255, 255, 0.1) 0%, transparent 70%);
}
.clsu-decor-circle-3 { 
    width: 180px; 
    height: 180px; 
    top: 45%; 
    right: -50px; 
    background: radial-gradient(circle, rgba(249, 178, 51, 0.1) 0%, transparent 70%);
}

.clsu-branding-content {
    position: relative;
    z-index: 1;
    text-align: center;
    max-width: 420px;
}

.clsu-logo-large {
    width: 130px;
    height: 130px;
    background: #fff;
    border-radius: 50%;
    padding: 10px;
    margin: 0 auto 2rem;
    box-shadow: 0 25px 50px rgba(0, 0, 0, 0.3), 0 0 0 8px rgba(249, 178, 51, 0.3);
    animation: float 4s ease-in-out infinite;
}

@keyframes float {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-12px); }
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
    text-shadow: 0 2px 15px rgba(0, 0, 0, 0.2);
}

.clsu-branding-subtitle {
    font-size: 1rem;
    color: rgba(255, 255, 255, 0.9);
    margin-bottom: 2rem;
    line-height: 1.6;
}

.clsu-tagline {
    display: inline-flex;
    align-items: center;
    gap: 0.75rem;
    background: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(10px);
    padding: 0.85rem 1.5rem;
    border-radius: 50px;
    border: 1px solid rgba(255, 255, 255, 0.2);
}

.clsu-tagline-icon {
    width: 38px;
    height: 38px;
    background: linear-gradient(135deg, var(--clsu-gold) 0%, var(--clsu-gold-light) 100%);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--clsu-green-dark);
    font-size: 1rem;
}

.clsu-tagline-text {
    color: #fff;
    font-weight: 600;
    font-size: 0.95rem;
}

.clsu-benefits {
    margin-top: 2.5rem;
    text-align: left;
}

.clsu-benefit-item {
    display: flex;
    align-items: flex-start;
    gap: 1rem;
    margin-bottom: 1.25rem;
    color: rgba(255, 255, 255, 0.95);
    font-size: 0.9rem;
}

.clsu-benefit-icon {
    width: 40px;
    height: 40px;
    background: rgba(255, 255, 255, 0.1);
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--clsu-gold);
    font-size: 1rem;
    flex-shrink: 0;
}

.clsu-benefit-text strong {
    display: block;
    color: #fff;
    margin-bottom: 0.15rem;
    font-weight: 600;
}

.clsu-benefit-text span {
    font-size: 0.85rem;
    opacity: 0.85;
}

/* Right Side - Register Form */
.clsu-register-form-side {
    flex: 1.15;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    padding: 2rem 3rem;
    background: linear-gradient(180deg, #ffffff 0%, #f8faf8 100%);
    overflow-y: auto;
}

.clsu-register-form-container {
    width: 100%;
    max-width: 520px;
}

.clsu-mobile-logo {
    display: none;
    width: 90px;
    height: 90px;
    margin: 0 auto 1.5rem;
    background: #fff;
    border-radius: 50%;
    padding: 8px;
    box-shadow: 0 8px 25px rgba(8, 122, 41, 0.2);
}

.clsu-mobile-logo img {
    width: 100%;
    height: 100%;
    object-fit: contain;
    border-radius: 50%;
}

.clsu-form-header {
    text-align: center;
    margin-bottom: 1.5rem;
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
    font-size: 0.95rem;
}

.clsu-progress-steps {
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 2rem;
    gap: 0.5rem;
}

.clsu-step {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    color: #9ca3af;
    font-size: 0.85rem;
    font-weight: 500;
}

.clsu-step.active {
    color: var(--clsu-green);
}

.clsu-step-number {
    width: 28px;
    height: 28px;
    border-radius: 50%;
    background: #e5e7eb;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 600;
    font-size: 0.8rem;
    transition: all 0.3s ease;
}

.clsu-step.active .clsu-step-number {
    background: linear-gradient(135deg, var(--clsu-green) 0%, var(--clsu-green-dark) 100%);
    color: #fff;
    box-shadow: 0 4px 12px rgba(8, 122, 41, 0.3);
}

.clsu-step-connector {
    width: 40px;
    height: 3px;
    background: #e5e7eb;
    border-radius: 2px;
}

.clsu-form-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 1.25rem;
}

.clsu-form-group {
    margin-bottom: 0;
}

.clsu-form-group.full {
    grid-column: span 2;
}

.clsu-form-label {
    display: block;
    font-size: 0.9rem;
    font-weight: 600;
    color: #1f2937;
    margin-bottom: 0.5rem;
}

.clsu-form-label .required {
    color: #ef4444;
}

.clsu-input-wrapper {
    position: relative;
}

.clsu-form-input {
    width: 100%;
    padding: 0.9rem 1rem 0.9rem 2.85rem;
    border: 2px solid #e5e7eb;
    border-radius: 12px;
    font-size: 0.95rem;
    transition: all 0.3s ease;
    background: #fff;
    color: #1f2937;
}

.clsu-form-input:focus {
    outline: none;
    border-color: var(--clsu-green);
    box-shadow: 0 0 0 4px rgba(8, 122, 41, 0.1);
}

.clsu-form-input::placeholder {
    color: #9ca3af;
}

.clsu-input-icon {
    position: absolute;
    left: 1rem;
    top: 50%;
    transform: translateY(-50%);
    color: #9ca3af;
    font-size: 0.95rem;
    transition: color 0.3s ease;
    z-index: 1;
}

.clsu-form-input:focus ~ .clsu-input-icon,
.clsu-input-wrapper:focus-within .clsu-input-icon {
    color: var(--clsu-green);
}

.clsu-input-error {
    color: #ef4444;
    font-size: 0.8rem;
    margin-top: 0.4rem;
    display: flex;
    align-items: center;
    gap: 0.3rem;
}

.clsu-password-strength {
    margin-top: 0.6rem;
}

.clsu-strength-bar {
    height: 5px;
    background: #e5e7eb;
    border-radius: 3px;
    overflow: hidden;
}

.clsu-strength-fill {
    height: 100%;
    width: 0%;
    transition: all 0.3s ease;
    border-radius: 3px;
}

.clsu-strength-text {
    font-size: 0.75rem;
    color: #6b7280;
    margin-top: 0.35rem;
}

/* Terms Section */
.clsu-terms {
    grid-column: span 2;
    margin-top: 0.75rem;
}

.clsu-checkbox-label {
    display: flex;
    align-items: flex-start;
    gap: 0.75rem;
    cursor: pointer;
}

.clsu-checkbox-label.disabled {
    cursor: not-allowed;
    opacity: 0.7;
}

.clsu-checkbox {
    width: 20px;
    height: 20px;
    accent-color: var(--clsu-green);
    margin-top: 2px;
    border-radius: 4px;
}

.clsu-checkbox:disabled {
    cursor: not-allowed;
}

.clsu-checkbox-text {
    font-size: 0.85rem;
    color: #4b5563;
    line-height: 1.5;
}

.clsu-checkbox-text a {
    color: var(--clsu-green);
    text-decoration: none;
    font-weight: 600;
    cursor: pointer;
}

.clsu-checkbox-text a:hover {
    text-decoration: underline;
}

.terms-hint {
    font-size: 0.75rem;
    color: #f59e0b;
    margin-top: 0.35rem;
    display: flex;
    align-items: center;
    gap: 0.35rem;
}

.terms-hint.read {
    color: var(--clsu-green);
}

/* Register Button */
.clsu-btn-register {
    width: 100%;
    padding: 1rem;
    background: linear-gradient(135deg, var(--clsu-green) 0%, var(--clsu-green-dark) 100%);
    color: #fff;
    border: none;
    border-radius: 14px;
    font-size: 1rem;
    font-weight: 600;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 0.6rem;
    margin-top: 1.75rem;
    transition: all 0.3s ease;
    box-shadow: 0 4px 15px rgba(8, 122, 41, 0.3);
}

.clsu-btn-register:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(8, 122, 41, 0.4);
}

.clsu-btn-register:active {
    transform: translateY(0);
}

.clsu-login-link {
    text-align: center;
    margin-top: 1.5rem;
    padding-top: 1.5rem;
    border-top: 1px solid #e5e7eb;
}

.clsu-login-link p {
    color: #6b7280;
    font-size: 0.95rem;
}

.clsu-login-link a {
    color: var(--clsu-green);
    text-decoration: none;
    font-weight: 600;
}

.clsu-login-link a:hover {
    text-decoration: underline;
}

.clsu-form-footer {
    text-align: center;
    margin-top: 1.5rem;
}

.clsu-footer-text {
    font-size: 0.8rem;
    color: #9ca3af;
}

/* Error Box */
.clsu-all-errors {
    background: linear-gradient(135deg, #fef2f2 0%, #fee2e2 100%);
    border: 1px solid #fecaca;
    border-radius: 12px;
    padding: 1rem 1.25rem;
    margin-bottom: 1.5rem;
    border-left: 4px solid #ef4444;
}

.clsu-all-errors-title {
    color: #dc2626;
    font-weight: 600;
    font-size: 0.9rem;
    margin-bottom: 0.5rem;
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.clsu-all-errors ul {
    margin: 0;
    padding-left: 1.25rem;
}

.clsu-all-errors li {
    color: #dc2626;
    font-size: 0.8rem;
    margin-bottom: 0.25rem;
}

.clsu-success-message {
    background: #f0fdf4;
    border: 1px solid #bbf7d0;
    border-radius: 10px;
    padding: 1rem;
    margin-bottom: 1.5rem;
    color: #166534;
    font-size: 0.9rem;
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

/* ===================================== */
/* BEAUTIFUL TERMS MODAL STYLES          */
/* ===================================== */
.terms-modal-overlay {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 51, 25, 0.85);
    backdrop-filter: blur(8px);
    z-index: 9999;
    justify-content: center;
    align-items: center;
    padding: 1rem;
}

.terms-modal-overlay.active {
    display: flex;
}

.terms-modal {
    background: #fff;
    border-radius: 20px;
    max-width: 800px;
    width: 100%;
    max-height: 90vh;
    display: flex;
    flex-direction: column;
    box-shadow: 0 25px 80px rgba(0, 0, 0, 0.4);
    animation: modalSlideIn 0.4s ease;
    overflow: hidden;
}

@keyframes modalSlideIn {
    from {
        opacity: 0;
        transform: translateY(-30px) scale(0.95);
    }
    to {
        opacity: 1;
        transform: translateY(0) scale(1);
    }
}

/* Modal Header */
.terms-modal-header {
    background: linear-gradient(135deg, var(--clsu-green) 0%, var(--clsu-green-dark) 100%);
    padding: 1.75rem 2rem;
    display: flex;
    align-items: center;
    justify-content: space-between;
    position: relative;
    overflow: hidden;
}

.terms-modal-header::before {
    content: '';
    position: absolute;
    top: -50%;
    right: -20%;
    width: 300px;
    height: 300px;
    background: radial-gradient(circle, rgba(255, 215, 0, 0.15) 0%, transparent 70%);
    pointer-events: none;
}

.terms-header-content {
    display: flex;
    align-items: center;
    gap: 1rem;
    position: relative;
    z-index: 1;
}

.terms-header-icon {
    width: 50px;
    height: 50px;
    background: rgba(255, 255, 255, 0.15);
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--clsu-yellow);
    font-size: 1.5rem;
}

.terms-header-text h2 {
    font-family: 'Playfair Display', Georgia, serif;
    font-size: 1.5rem;
    color: #fff;
    margin-bottom: 0.25rem;
}

.terms-header-text p {
    font-size: 0.85rem;
    color: rgba(255, 255, 255, 0.8);
}

.terms-modal-close {
    background: rgba(255, 255, 255, 0.1);
    border: none;
    font-size: 1.25rem;
    color: #fff;
    cursor: pointer;
    padding: 0.75rem;
    border-radius: 10px;
    transition: all 0.2s;
    position: relative;
    z-index: 1;
}

.terms-modal-close:hover {
    background: rgba(255, 255, 255, 0.2);
    transform: rotate(90deg);
}

/* Tab Navigation */
.terms-tabs {
    display: flex;
    background: #f8faf8;
    border-bottom: 1px solid #e5e7eb;
}

.terms-tab {
    flex: 1;
    padding: 1rem 1.5rem;
    background: none;
    border: none;
    font-size: 0.9rem;
    font-weight: 600;
    color: #6b7280;
    cursor: pointer;
    transition: all 0.3s;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 0.5rem;
    position: relative;
}

.terms-tab::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    height: 3px;
    background: var(--clsu-green);
    transform: scaleX(0);
    transition: transform 0.3s;
}

.terms-tab:hover {
    color: var(--clsu-green);
    background: rgba(0, 102, 51, 0.05);
}

.terms-tab.active {
    color: var(--clsu-green);
}

.terms-tab.active::after {
    transform: scaleX(1);
}

.terms-tab i {
    font-size: 1.1rem;
}

/* Modal Body */
.terms-modal-body {
    padding: 0;
    overflow-y: auto;
    flex: 1;
}

.terms-content-panel {
    display: none;
    padding: 2rem;
}

.terms-content-panel.active {
    display: block;
}

/* Section Cards */
.terms-section {
    background: #fff;
    border: 1px solid #e5e7eb;
    border-radius: 12px;
    margin-bottom: 1.25rem;
    overflow: hidden;
    transition: all 0.3s;
}

.terms-section:hover {
    border-color: var(--clsu-green);
    box-shadow: 0 4px 15px rgba(0, 102, 51, 0.1);
}

.terms-section-header {
    background: linear-gradient(135deg, #f8faf8 0%, #f0f4f0 100%);
    padding: 1rem 1.25rem;
    display: flex;
    align-items: center;
    gap: 0.75rem;
    border-bottom: 1px solid #e5e7eb;
}

.terms-section-icon {
    width: 40px;
    height: 40px;
    background: linear-gradient(135deg, var(--clsu-green) 0%, var(--clsu-green-dark) 100%);
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #fff;
    font-size: 1rem;
}

.terms-section-title {
    font-size: 1rem;
    font-weight: 600;
    color: var(--clsu-green-dark);
}

.terms-section-body {
    padding: 1.25rem;
    font-size: 0.9rem;
    line-height: 1.7;
    color: #4b5563;
}

.terms-section-body p {
    margin-bottom: 0.75rem;
}

.terms-section-body p:last-child {
    margin-bottom: 0;
}

/* Styled Lists */
.terms-list {
    list-style: none;
    margin: 0.75rem 0;
    padding: 0;
}

.terms-list li {
    position: relative;
    padding: 0.5rem 0 0.5rem 2rem;
    border-bottom: 1px dashed #e5e7eb;
}

.terms-list li:last-child {
    border-bottom: none;
}

.terms-list li::before {
    content: '\f00c';
    font-family: 'FontAwesome';
    position: absolute;
    left: 0;
    top: 0.6rem;
    width: 20px;
    height: 20px;
    background: linear-gradient(135deg, var(--clsu-green-light) 0%, var(--clsu-green) 100%);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #fff;
    font-size: 0.6rem;
}

/* Privacy Specific Styles */
.privacy-highlight {
    background: linear-gradient(135deg, #fef3c7 0%, #fde68a 100%);
    border-left: 4px solid var(--clsu-gold);
    padding: 1rem 1.25rem;
    border-radius: 0 8px 8px 0;
    margin: 1rem 0;
}

.privacy-highlight p {
    margin: 0;
    color: #92400e;
    font-weight: 500;
}

.data-badge {
    display: inline-flex;
    align-items: center;
    gap: 0.35rem;
    background: rgba(0, 102, 51, 0.1);
    color: var(--clsu-green);
    padding: 0.25rem 0.75rem;
    border-radius: 20px;
    font-size: 0.8rem;
    font-weight: 500;
    margin: 0.25rem;
}

.data-badge i {
    font-size: 0.7rem;
}

/* Contact Card */
.contact-card {
    background: linear-gradient(135deg, var(--clsu-green) 0%, var(--clsu-green-dark) 100%);
    border-radius: 12px;
    padding: 1.5rem;
    color: #fff;
    margin-top: 1rem;
}

.contact-card-header {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    margin-bottom: 1rem;
}

.contact-card-icon {
    width: 45px;
    height: 45px;
    background: rgba(255, 255, 255, 0.15);
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.25rem;
    color: var(--clsu-yellow);
}

.contact-card-title {
    font-size: 1.1rem;
    font-weight: 600;
}

.contact-card-subtitle {
    font-size: 0.8rem;
    opacity: 0.8;
}

.contact-info {
    display: grid;
    gap: 0.75rem;
}

.contact-item {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    font-size: 0.9rem;
}

.contact-item i {
    width: 30px;
    height: 30px;
    background: rgba(255, 255, 255, 0.1);
    border-radius: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 0.85rem;
    color: var(--clsu-yellow);
}

/* Scroll Indicator */
.terms-scroll-indicator {
    background: linear-gradient(to top, #fff 50%, transparent);
    padding: 1rem 2rem;
    text-align: center;
    font-size: 0.85rem;
    color: #f59e0b;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 0.5rem;
    position: sticky;
    bottom: 0;
}

.terms-scroll-indicator.hidden {
    display: none;
}

.terms-scroll-indicator i {
    animation: bounce 1s infinite;
}

@keyframes bounce {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(5px); }
}

/* Modal Footer */
.terms-modal-footer {
    padding: 1.25rem 2rem;
    border-top: 1px solid #e5e7eb;
    display: flex;
    justify-content: space-between;
    align-items: center;
    background: #f8faf8;
}

.terms-progress {
    display: flex;
    align-items: center;
    gap: 0.75rem;
}

.terms-progress-bar {
    width: 120px;
    height: 6px;
    background: #e5e7eb;
    border-radius: 3px;
    overflow: hidden;
}

.terms-progress-fill {
    height: 100%;
    background: linear-gradient(90deg, var(--clsu-green) 0%, var(--clsu-green-light) 100%);
    border-radius: 3px;
    transition: width 0.3s;
    width: 0%;
}

.terms-progress-text {
    font-size: 0.8rem;
    color: #6b7280;
}

.terms-footer-buttons {
    display: flex;
    gap: 1rem;
}

.terms-btn {
    padding: 0.75rem 1.5rem;
    border-radius: 10px;
    font-size: 0.9rem;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.2s;
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.terms-btn-cancel {
    background: #fff;
    border: 2px solid #d1d5db;
    color: #374151;
}

.terms-btn-cancel:hover {
    background: #f3f4f6;
    border-color: #9ca3af;
}

.terms-btn-agree {
    background: linear-gradient(135deg, var(--clsu-green) 0%, var(--clsu-green-dark) 100%);
    border: none;
    color: #fff;
    box-shadow: 0 4px 15px rgba(0, 102, 51, 0.3);
}

.terms-btn-agree:hover:not(:disabled) {
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(0, 102, 51, 0.4);
}

.terms-btn-agree:disabled {
    background: #d1d5db;
    cursor: not-allowed;
    box-shadow: none;
    transform: none;
}

/* Responsive */
@media (max-width: 900px) {
    .clsu-register-container { flex-direction: column; }
    .clsu-register-branding { display: none; }
    .clsu-mobile-logo { display: block; }
    .clsu-register-form-side { padding: 2rem 1.5rem; }
    .clsu-form-grid { grid-template-columns: 1fr; }
    .clsu-form-group.full { grid-column: span 1; }
    .clsu-terms { grid-column: span 1; }
    .terms-modal { max-height: 95vh; border-radius: 16px; }
    .terms-modal-header { padding: 1.25rem 1.5rem; }
    .terms-header-text h2 { font-size: 1.25rem; }
    .terms-tabs { flex-wrap: wrap; }
    .terms-tab { padding: 0.75rem 1rem; font-size: 0.85rem; }
    .terms-content-panel { padding: 1.25rem; }
    .terms-modal-footer { flex-direction: column; gap: 1rem; padding: 1rem 1.5rem; }
    .terms-progress { width: 100%; justify-content: center; }
    .terms-footer-buttons { width: 100%; }
    .terms-btn { flex: 1; justify-content: center; }
    .clsu-form-title { font-size: 1.75rem; }
}
</style>

<div class="clsu-register-container">
    {{-- Left Side - Branding --}}
    <div class="clsu-register-branding">
        <div class="clsu-decor-circle clsu-decor-circle-1"></div>
        <div class="clsu-decor-circle clsu-decor-circle-2"></div>
        <div class="clsu-decor-circle clsu-decor-circle-3"></div>
        
        <div class="clsu-branding-content">
            <div class="clsu-logo-large">
                <img src="{{ asset('images/cl.png') }}" alt="CLSU Logo">
            </div>
            
            <h1 class="clsu-branding-title">CLSU ETEEAP</h1>
            <p class="clsu-branding-subtitle">
                Expanded Tertiary Education Equivalency and Accreditation Program
            </p>
            
            <div class="clsu-tagline">
                <div class="clsu-tagline-icon">
                    <i class="fas fa-graduation-cap"></i>
                </div>
                <span class="clsu-tagline-text">Your Path to a Degree</span>
            </div>
            
            <div class="clsu-benefits">
                <div class="clsu-benefit-item">
                    <div class="clsu-benefit-icon"><i class="fas fa-check-circle"></i></div>
                    <div class="clsu-benefit-text">
                        <strong>Easy Application</strong>
                        <span>Simple online application process</span>
                    </div>
                </div>
                <div class="clsu-benefit-item">
                    <div class="clsu-benefit-icon"><i class="fas fa-clock"></i></div>
                    <div class="clsu-benefit-text">
                        <strong>Track Progress</strong>
                        <span>Monitor your application status</span>
                    </div>
                </div>
                <div class="clsu-benefit-item">
                    <div class="clsu-benefit-icon"><i class="fas fa-shield-halved"></i></div>
                    <div class="clsu-benefit-text">
                        <strong>Secure & Private</strong>
                        <span>Your data is protected and confidential</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Right Side - Register Form --}}
    <div class="clsu-register-form-side">
        <div class="clsu-register-form-container">
            
            <div class="clsu-mobile-logo">
                <img src="{{ asset('images/cl.png') }}" alt="CLSU Logo">
            </div>
            
            <div class="clsu-form-header">
                <h2 class="clsu-form-title">Create Account</h2>
                <p class="clsu-form-subtitle">Fill in your details to get started</p>
            </div>

            <div class="clsu-progress-steps">
                <div class="clsu-step active">
                    <span class="clsu-step-number">1</span>
                    <span>Account</span>
                </div>
                <div class="clsu-step-connector"></div>
                <div class="clsu-step">
                    <span class="clsu-step-number">2</span>
                    <span>Profile</span>
                </div>
                <div class="clsu-step-connector"></div>
                <div class="clsu-step">
                    <span class="clsu-step-number">3</span>
                    <span>Complete</span>
                </div>
            </div>

            @if (session('status'))
                <div class="clsu-success-message">
                    <i class="fas fa-check-circle"></i>
                    {{ session('status') }}
                </div>
            @endif

            @if (session('error'))
                <div class="clsu-all-errors">
                    <div class="clsu-all-errors-title">
                        <i class="fas fa-exclamation-circle"></i>
                        Error
                    </div>
                    <p style="color: #dc2626; font-size: 0.85rem; margin: 0;">{{ session('error') }}</p>
                </div>
            @endif

            @if ($errors->any())
                <div class="clsu-all-errors">
                    <div class="clsu-all-errors-title">
                        <i class="fas fa-triangle-exclamation"></i>
                        Please fix the following errors:
                    </div>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="clsu-form-grid">
                    <div class="clsu-form-group">
                        <label for="first_name" class="clsu-form-label">
                            First Name <span class="required">*</span>
                        </label>
                        <div class="clsu-input-wrapper">
                            <input id="first_name" type="text" name="first_name" class="clsu-form-input"
                                   value="{{ old('first_name') }}" placeholder="Given name" required autofocus autocomplete="given-name">
                            <i class="fas fa-user clsu-input-icon"></i>
                        </div>
                        @error('first_name')
                            <p class="clsu-input-error"><i class="fas fa-exclamation-circle"></i> {{ $message }}</p>
                        @enderror
                    </div>

                    <div class="clsu-form-group">
                        <label for="middle_name" class="clsu-form-label">Middle Name</label>
                        <div class="clsu-input-wrapper">
                            <input id="middle_name" type="text" name="middle_name" class="clsu-form-input"
                                   value="{{ old('middle_name') }}" placeholder="Middle name (optional)" autocomplete="additional-name">
                            <i class="fas fa-user clsu-input-icon"></i>
                        </div>
                        @error('middle_name')
                            <p class="clsu-input-error"><i class="fas fa-exclamation-circle"></i> {{ $message }}</p>
                        @enderror
                    </div>

                    <div class="clsu-form-group">
                        <label for="surname" class="clsu-form-label">Last Name <span class="required">*</span></label>
                        <div class="clsu-input-wrapper">
                            <input id="surname" type="text" name="surname" class="clsu-form-input"
                                   value="{{ old('surname') }}" placeholder="Family / last name" required autocomplete="family-name">
                            <i class="fas fa-user clsu-input-icon"></i>
                        </div>
                        @error('surname')
                            <p class="clsu-input-error"><i class="fas fa-exclamation-circle"></i> {{ $message }}</p>
                        @enderror
                    </div>

                    <div class="clsu-form-group">
                        <label for="extension" class="clsu-form-label">Name Extension</label>
                        <div class="clsu-input-wrapper">
                            <input id="extension" type="text" name="extension" class="clsu-form-input"
                                   value="{{ old('extension') }}" placeholder="Jr., Sr., III (optional)" autocomplete="honorific-suffix">
                            <i class="fas fa-user clsu-input-icon"></i>
                        </div>
                        @error('extension')
                            <p class="clsu-input-error"><i class="fas fa-exclamation-circle"></i> {{ $message }}</p>
                        @enderror
                    </div>

                    <div class="clsu-form-group full">
                        <label for="email" class="clsu-form-label">Email Address <span class="required">*</span></label>
                        <div class="clsu-input-wrapper">
                            <input id="email" type="email" name="email" class="clsu-form-input"
                                   value="{{ old('email') }}" placeholder="Enter your email address" required autocomplete="username">
                            <i class="fas fa-envelope clsu-input-icon"></i>
                        </div>
                        @error('email')
                            <p class="clsu-input-error"><i class="fas fa-exclamation-circle"></i> {{ $message }}</p>
                        @enderror
                    </div>

                    <div class="clsu-form-group full">
                        <label for="password" class="clsu-form-label">Password <span class="required">*</span></label>
                        <div class="clsu-input-wrapper">
                            <input id="password" type="password" name="password" class="clsu-form-input"
                                   placeholder="Create a strong password" required autocomplete="new-password" style="padding-right: 3.5rem;">
                            <i class="fas fa-lock clsu-input-icon"></i>
                            <button type="button" onclick="togglePasswordVisibility('password', this)"
                                    style="position: absolute; right: 1rem; top: 50%; transform: translateY(-50%); background: none; border: none; color: #9ca3af; cursor: pointer; padding: 0.5rem; z-index: 10; transition: color 0.3s ease;">
                                <i class="fas fa-eye" style="font-size: 1.1rem;"></i>
                            </button>
                        </div>
                        @error('password')
                            <p class="clsu-input-error"><i class="fas fa-exclamation-circle"></i> {{ $message }}</p>
                        @enderror
                        <div class="clsu-password-strength">
                            <div class="clsu-strength-bar">
                                <div class="clsu-strength-fill" id="strengthFill"></div>
                            </div>
                            <p class="clsu-strength-text" id="strengthText">Use 8+ characters with letters & numbers</p>
                        </div>
                    </div>

                    <div class="clsu-form-group full">
                        <label for="password_confirmation" class="clsu-form-label">Confirm Password <span class="required">*</span></label>
                        <div class="clsu-input-wrapper">
                            <input id="password_confirmation" type="password" name="password_confirmation" class="clsu-form-input"
                                   placeholder="Confirm your password" required autocomplete="new-password" style="padding-right: 3.5rem;">
                            <i class="fas fa-lock clsu-input-icon"></i>
                            <button type="button" onclick="togglePasswordVisibility('password_confirmation', this)"
                                    style="position: absolute; right: 1rem; top: 50%; transform: translateY(-50%); background: none; border: none; color: #9ca3af; cursor: pointer; padding: 0.5rem; z-index: 10; transition: color 0.3s ease;">
                                <i class="fas fa-eye" style="font-size: 1.1rem;"></i>
                            </button>
                        </div>
                        @error('password_confirmation')
                            <p class="clsu-input-error"><i class="fas fa-exclamation-circle"></i> {{ $message }}</p>
                        @enderror
                    </div>

                    <div class="clsu-terms">
                        <label class="clsu-checkbox-label" id="termsLabel">
                            <input type="checkbox" name="terms" value="1" class="clsu-checkbox" id="termsCheckbox"
                                   {{ old('terms') ? 'checked' : '' }} disabled required>
                            <span class="clsu-checkbox-text">
                                I agree to the <a href="javascript:void(0)" onclick="openTermsModal()">Terms of Service</a> and <a href="javascript:void(0)" onclick="openTermsModal()">Privacy Policy</a>
                            </span>
                        </label>
                        <p class="terms-hint" id="termsHint">
                            <i class="fas fa-info-circle"></i>
                            <span>Please read the Terms of Service to enable this checkbox</span>
                        </p>
                        @error('terms')
                            <p class="clsu-input-error" style="margin-top: 0.5rem;"><i class="fas fa-exclamation-circle"></i> {{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <button type="submit" class="clsu-btn-register">
                    <i class="fas fa-user-plus"></i>
                    Create Account
                </button>
            </form>

            <div class="clsu-login-link">
                <p>Already have an account? <a href="{{ route('login') }}">Sign in here</a></p>
            </div>

            <div class="clsu-form-footer">
                <p class="clsu-footer-text">CLSU — Sieving for Excellence Since 1907</p>
            </div>
        </div>
    </div>
</div>

{{-- ===================================== --}}
{{-- BEAUTIFUL TERMS & PRIVACY MODAL       --}}
{{-- ===================================== --}}
<div class="terms-modal-overlay" id="termsModal">
    <div class="terms-modal">
        {{-- Modal Header --}}
        <div class="terms-modal-header">
            <div class="terms-header-content">
                <div class="terms-header-icon">
                    <i class="fas fa-file-lines"></i>
                </div>
                <div class="terms-header-text">
                    <h2>Terms & Privacy Policy</h2>
                    <p>Central Luzon State University - ETEEAP</p>
                </div>
            </div>
            <button class="terms-modal-close" onclick="closeTermsModal()">
                <i class="fa fa-times"></i>
            </button>
        </div>

        {{-- Tab Navigation --}}
        <div class="terms-tabs">
            <button class="terms-tab active" onclick="switchTab('terms')" id="tabTerms">
                <i class="fa fa-gavel"></i>
                Terms of Service
            </button>
            <button class="terms-tab" onclick="switchTab('privacy')" id="tabPrivacy">
                <i class="fa fa-shield"></i>
                Privacy Policy
            </button>
            <button class="terms-tab" onclick="switchTab('rights')" id="tabRights">
                <i class="fa fa-user-circle"></i>
                Your Rights
            </button>
        </div>

        {{-- Modal Body --}}
        <div class="terms-modal-body" id="termsContent">
            
            {{-- Terms of Service Panel --}}
            <div class="terms-content-panel active" id="panelTerms">
                
                <div class="terms-section">
                    <div class="terms-section-header">
                        <div class="terms-section-icon"><i class="fa fa-handshake-o"></i></div>
                        <span class="terms-section-title">1. Acceptance of Terms</span>
                    </div>
                    <div class="terms-section-body">
                        <p>By accessing and using the CLSU ETEEAP (Expanded Tertiary Education Equivalency and Accreditation Program) Online Application System, you agree to be bound by these Terms of Service and all applicable laws and regulations.</p>
                        <p>If you do not agree with any of these terms, you are prohibited from using or accessing this system.</p>
                    </div>
                </div>

                <div class="terms-section">
                    <div class="terms-section-header">
                        <div class="terms-section-icon"><i class="fa fa-user-plus"></i></div>
                        <span class="terms-section-title">2. User Registration</span>
                    </div>
                    <div class="terms-section-body">
                        <p>To use this system, you must:</p>
                        <ul class="terms-list">
                            <li>Provide accurate, current, and complete information during the registration process</li>
                            <li>Maintain and promptly update your registration information to keep it accurate</li>
                            <li>Be responsible for safeguarding your password and account credentials</li>
                            <li>Notify us immediately of any unauthorized use of your account</li>
                        </ul>
                    </div>
                </div>

                <div class="terms-section">
                    <div class="terms-section-header">
                        <div class="terms-section-icon"><i class="fa fa-file-text"></i></div>
                        <span class="terms-section-title">3. Application Requirements</span>
                    </div>
                    <div class="terms-section-body">
                        <p>By submitting an application through this system, you certify that:</p>
                        <ul class="terms-list">
                            <li>All information provided is true, accurate, and complete to the best of your knowledge</li>
                            <li>All documents submitted are authentic and have not been falsified</li>
                            <li>You understand that providing false information may result in disqualification</li>
                        </ul>
                        <div class="privacy-highlight">
                            <p><i class="fa fa-exclamation-triangle"></i> Providing false information may result in permanent disqualification from the ETEEAP program.</p>
                        </div>
                    </div>
                </div>

                <div class="terms-section">
                    <div class="terms-section-header">
                        <div class="terms-section-icon"><i class="fa fa-ban"></i></div>
                        <span class="terms-section-title">4. Prohibited Activities</span>
                    </div>
                    <div class="terms-section-body">
                        <p>You agree not to:</p>
                        <ul class="terms-list">
                            <li>Use the system for any unlawful purpose or in violation of any regulations</li>
                            <li>Attempt to gain unauthorized access to any part of the system</li>
                            <li>Interfere with or disrupt the system's operation</li>
                            <li>Upload malicious software or harmful content</li>
                            <li>Impersonate another person or entity</li>
                        </ul>
                    </div>
                </div>

                <div class="terms-section">
                    <div class="terms-section-header">
                        <div class="terms-section-icon"><i class="fa fa-balance-scale"></i></div>
                        <span class="terms-section-title">5. Governing Law</span>
                    </div>
                    <div class="terms-section-body">
                        <p>These terms shall be governed by and construed in accordance with the laws of the Republic of the Philippines. Any disputes arising from these terms shall be subject to the exclusive jurisdiction of the courts in Nueva Ecija, Philippines.</p>
                    </div>
                </div>

            </div>

            {{-- Privacy Policy Panel --}}
            <div class="terms-content-panel" id="panelPrivacy">
                
                <div class="terms-section">
                    <div class="terms-section-header">
                        <div class="terms-section-icon"><i class="fa fa-lock"></i></div>
                        <span class="terms-section-title">1. Data Protection Commitment</span>
                    </div>
                    <div class="terms-section-body">
                        <p>We are committed to protecting your privacy in compliance with the <strong>Data Privacy Act of 2012 (Republic Act No. 10173)</strong>.</p>
                        <div class="privacy-highlight">
                            <p><i class="fa fa-shield"></i> Your personal information is encrypted and stored securely on protected servers.</p>
                        </div>
                    </div>
                </div>

                <div class="terms-section">
                    <div class="terms-section-header">
                        <div class="terms-section-icon"><i class="fa fa-database"></i></div>
                        <span class="terms-section-title">2. Information We Collect</span>
                    </div>
                    <div class="terms-section-body">
                        <p>We collect and process the following types of information:</p>
                        <div style="margin: 1rem 0;">
                            <span class="data-badge"><i class="fa fa-user"></i> Personal Information</span>
                            <span class="data-badge"><i class="fa fa-graduation-cap"></i> Educational Background</span>
                            <span class="data-badge"><i class="fa fa-briefcase"></i> Work Experience</span>
                            <span class="data-badge"><i class="fa fa-file"></i> Documents & Certificates</span>
                            <span class="data-badge"><i class="fa fa-map-marker"></i> Contact Details</span>
                            <span class="data-badge"><i class="fa fa-desktop"></i> System Usage Data</span>
                        </div>
                    </div>
                </div>

                <div class="terms-section">
                    <div class="terms-section-header">
                        <div class="terms-section-icon"><i class="fa fa-cogs"></i></div>
                        <span class="terms-section-title">3. How We Use Your Data</span>
                    </div>
                    <div class="terms-section-body">
                        <p>Your personal information will be:</p>
                        <ul class="terms-list">
                            <li>Used solely for processing your ETEEAP application</li>
                            <li>Stored securely in compliance with the Data Privacy Act of 2012</li>
                            <li>Shared only with authorized CLSU personnel involved in evaluation</li>
                            <li>Retained for the period required by university policies and applicable laws</li>
                        </ul>
                    </div>
                </div>

                <div class="terms-section">
                    <div class="terms-section-header">
                        <div class="terms-section-icon"><i class="fa fa-share-alt"></i></div>
                        <span class="terms-section-title">4. Data Sharing</span>
                    </div>
                    <div class="terms-section-body">
                        <p>We do <strong>NOT</strong> sell, trade, or rent your personal information to third parties. Your data may only be shared with:</p>
                        <ul class="terms-list">
                            <li>CLSU ETEEAP Office administrators and evaluators</li>
                            <li>Authorized university personnel for academic verification</li>
                            <li>Government agencies when required by law</li>
                        </ul>
                    </div>
                </div>

                <div class="terms-section">
                    <div class="terms-section-header">
                        <div class="terms-section-icon"><i class="fa fa-clock-o"></i></div>
                        <span class="terms-section-title">5. Data Retention</span>
                    </div>
                    <div class="terms-section-body">
                        <p>Your personal data will be retained for:</p>
                        <ul class="terms-list">
                            <li>Active applications: Until application process is complete</li>
                            <li>Successful applicants: Throughout enrollment and as required by academic records policy</li>
                            <li>Unsuccessful applications: Up to 2 years for potential reapplication</li>
                        </ul>
                    </div>
                </div>

            </div>

            {{-- Your Rights Panel --}}
            <div class="terms-content-panel" id="panelRights">
                
                <div class="terms-section">
                    <div class="terms-section-header">
                        <div class="terms-section-icon"><i class="fa fa-eye"></i></div>
                        <span class="terms-section-title">1. Right to Be Informed</span>
                    </div>
                    <div class="terms-section-body">
                        <p>You have the right to be informed about how your personal data is being collected, processed, and used. This privacy policy serves as your notification of our data practices.</p>
                    </div>
                </div>

                <div class="terms-section">
                    <div class="terms-section-header">
                        <div class="terms-section-icon"><i class="fa fa-download"></i></div>
                        <span class="terms-section-title">2. Right to Access</span>
                    </div>
                    <div class="terms-section-body">
                        <p>You have the right to request access to your personal data held by the university. You may request a copy of your data by contacting our Data Protection Officer.</p>
                    </div>
                </div>

                <div class="terms-section">
                    <div class="terms-section-header">
                        <div class="terms-section-icon"><i class="fa fa-pencil"></i></div>
                        <span class="terms-section-title">3. Right to Correction</span>
                    </div>
                    <div class="terms-section-body">
                        <p>You have the right to request correction of inaccurate or incomplete personal data. You can update most information directly through your account or contact us for assistance.</p>
                    </div>
                </div>

                <div class="terms-section">
                    <div class="terms-section-header">
                        <div class="terms-section-icon"><i class="fa fa-trash"></i></div>
                        <span class="terms-section-title">4. Right to Erasure</span>
                    </div>
                    <div class="terms-section-body">
                        <p>You may request deletion of your personal data, subject to legal retention requirements and legitimate university interests. Some data may need to be retained for compliance purposes.</p>
                    </div>
                </div>

                <div class="terms-section">
                    <div class="terms-section-header">
                        <div class="terms-section-icon"><i class="fa fa-hand-paper-o"></i></div>
                        <span class="terms-section-title">5. Right to Object</span>
                    </div>
                    <div class="terms-section-body">
                        <p>You have the right to object to the processing of your personal data under certain circumstances. However, objection may affect your application status.</p>
                    </div>
                </div>

                {{-- Contact Card --}}
                <div class="contact-card">
                    <div class="contact-card-header">
                        <div class="contact-card-icon"><i class="fa fa-envelope"></i></div>
                        <div>
                            <div class="contact-card-title">Contact Us</div>
                            <div class="contact-card-subtitle">For questions or concerns about your data</div>
                        </div>
                    </div>
                    <div class="contact-info">
                        <div class="contact-item">
                            <i class="fa fa-building"></i>
                            <span>ETEEAP Office, Central Luzon State University</span>
                        </div>
                        <div class="contact-item">
                            <i class="fa fa-map-marker"></i>
                            <span>Science City of Muñoz, Nueva Ecija, Philippines</span>
                        </div>
                        <div class="contact-item">
                            <i class="fa fa-envelope-o"></i>
                            <span>eteeap@clsu.edu.ph</span>
                        </div>
                        <div class="contact-item">
                            <i class="fa fa-phone"></i>
                            <span>(044) 456-5238</span>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        {{-- Scroll Indicator --}}
        <div class="terms-scroll-indicator" id="scrollIndicator">
            <i class="fa fa-arrow-down"></i>
            <span>Scroll down to read all content</span>
        </div>

        {{-- Modal Footer --}}
        <div class="terms-modal-footer">
            <div class="terms-progress">
                <div class="terms-progress-bar">
                    <div class="terms-progress-fill" id="progressFill"></div>
                </div>
                <span class="terms-progress-text" id="progressText">0% read</span>
            </div>
            <div class="terms-footer-buttons">
                <button class="terms-btn terms-btn-cancel" onclick="closeTermsModal()">
                    <i class="fa fa-times"></i> Cancel
                </button>
                <button class="terms-btn terms-btn-agree" id="agreeBtn" onclick="agreeToTerms()" disabled>
                    <i class="fa fa-check"></i> I Agree
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    // Password strength indicator
    const passwordInput = document.getElementById('password');
    const strengthFill = document.getElementById('strengthFill');
    const strengthText = document.getElementById('strengthText');

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
    });

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

    // ===================================
    // Terms Modal Functions
    // ===================================
    let scrollProgress = { terms: 0, privacy: 0, rights: 0 };
    let currentTab = 'terms';

    function openTermsModal() {
        document.getElementById('termsModal').classList.add('active');
        document.body.style.overflow = 'hidden';
        updateProgress();
        checkScrollPosition();
    }

    function closeTermsModal() {
        document.getElementById('termsModal').classList.remove('active');
        document.body.style.overflow = '';
    }

    function switchTab(tab) {
        currentTab = tab;
        
        // Update tab buttons
        document.querySelectorAll('.terms-tab').forEach(t => t.classList.remove('active'));
        document.getElementById('tab' + tab.charAt(0).toUpperCase() + tab.slice(1)).classList.add('active');
        
        // Update panels
        document.querySelectorAll('.terms-content-panel').forEach(p => p.classList.remove('active'));
        document.getElementById('panel' + tab.charAt(0).toUpperCase() + tab.slice(1)).classList.add('active');
        
        // Reset scroll
        document.getElementById('termsContent').scrollTop = 0;
        checkScrollPosition();
    }

    function agreeToTerms() {
        const checkbox = document.getElementById('termsCheckbox');
        const hint = document.getElementById('termsHint');
        const label = document.getElementById('termsLabel');
        
        checkbox.disabled = false;
        checkbox.checked = true;
        label.classList.remove('disabled');
        
        hint.innerHTML = '<i class="fa fa-check-circle"></i> <span>You have agreed to the Terms of Service and Privacy Policy</span>';
        hint.classList.add('read');
        
        closeTermsModal();
    }

    function checkScrollPosition() {
        const content = document.getElementById('termsContent');
        const scrollIndicator = document.getElementById('scrollIndicator');
        const progressFill = document.getElementById('progressFill');
        const progressText = document.getElementById('progressText');
        const agreeBtn = document.getElementById('agreeBtn');
        
        // Calculate scroll percentage
        const scrollPercent = Math.min(100, Math.round((content.scrollTop / (content.scrollHeight - content.clientHeight)) * 100)) || 0;
        scrollProgress[currentTab] = scrollPercent;
        
        // Calculate total progress (average of all tabs)
        const totalProgress = Math.round((scrollProgress.terms + scrollProgress.privacy + scrollProgress.rights) / 3);
        
        // Update progress bar
        progressFill.style.width = totalProgress + '%';
        progressText.textContent = totalProgress + '% read';
        
        // Check if scrolled to bottom of current panel
        const isAtBottom = content.scrollHeight - content.scrollTop <= content.clientHeight + 50;
        
        if (isAtBottom) {
            scrollIndicator.classList.add('hidden');
        } else {
            scrollIndicator.classList.remove('hidden');
        }
        
        // Enable agree button if all sections are mostly read (80%+)
        if (scrollProgress.terms >= 80 && scrollProgress.privacy >= 80 && scrollProgress.rights >= 80) {
            agreeBtn.disabled = false;
        }
    }

    function updateProgress() {
        const totalProgress = Math.round((scrollProgress.terms + scrollProgress.privacy + scrollProgress.rights) / 3);
        document.getElementById('progressFill').style.width = totalProgress + '%';
        document.getElementById('progressText').textContent = totalProgress + '% read';
    }

    // Event Listeners
    document.addEventListener('DOMContentLoaded', function() {
        const content = document.getElementById('termsContent');
        content.addEventListener('scroll', checkScrollPosition);
    });

    document.getElementById('termsModal').addEventListener('click', function(e) {
        if (e.target === this) closeTermsModal();
    });

    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') closeTermsModal();
    });
</script>