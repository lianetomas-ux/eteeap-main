<head>
    <link href="https://fonts.googleapis.com/css2?family=Libre+Franklin:wght@300;400;500;600;700&family=Playfair+Display:wght@500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<style>
:root {
    --clsu-green: #006633;
    --clsu-green-dark: #004d26;
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

.clsu-confirm-container {
    display: flex;
    min-height: 100vh;
    width: 100%;
    align-items: center;
    justify-content: center;
    background: linear-gradient(180deg, #fff 0%, #f8faf8 100%);
    padding: 2rem;
}

.clsu-confirm-card {
    width: 100%;
    max-width: 450px;
    background: #fff;
    border-radius: 20px;
    box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
    padding: 2.5rem;
    text-align: center;
}

.clsu-security-icon {
    width: 80px;
    height: 80px;
    background: linear-gradient(135deg, #dcfce7 0%, #bbf7d0 100%);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 1.5rem;
    border: 4px solid rgba(0, 102, 51, 0.1);
}

.clsu-security-icon i {
    font-size: 2rem;
    color: var(--clsu-green);
}

.clsu-confirm-title {
    font-family: 'Playfair Display', Georgia, serif;
    font-size: 1.75rem;
    font-weight: 700;
    color: var(--clsu-green);
    margin-bottom: 0.5rem;
}

.clsu-confirm-subtitle {
    color: #6b7280;
    font-size: 0.95rem;
    margin-bottom: 2rem;
    line-height: 1.6;
}

.clsu-form-group {
    margin-bottom: 1.5rem;
    text-align: left;
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

.clsu-btn-confirm {
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

.clsu-btn-confirm:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(0, 102, 51, 0.4);
}
</style>

<div class="clsu-confirm-container">
    <div class="clsu-confirm-card">
        <div class="clsu-security-icon">
            <i class="fas fa-shield-alt"></i>
        </div>
        
        <h2 class="clsu-confirm-title">Confirm Password</h2>
        <p class="clsu-confirm-subtitle">
            This is a secure area of the application. Please confirm your password before continuing.
        </p>

        <form method="POST" action="{{ route('password.confirm') }}">
            @csrf

            <div class="clsu-form-group">
                <label for="password" class="clsu-form-label">Password</label>
                <div class="clsu-input-wrapper">
                    <input id="password" 
                           type="password" 
                           name="password" 
                           class="clsu-form-input" 
                           placeholder="Enter your password"
                           required 
                           autocomplete="current-password"
                           style="padding-right: 3.5rem;">
                    <i class="fas fa-lock clsu-input-icon"></i>
                    <button 
                        type="button" 
                        onclick="togglePasswordVisibility('password', this)"
                        style="position: absolute; right: 1rem; top: 50%; transform: translateY(-50%); background: none; border: none; color: #9ca3af; cursor: pointer; padding: 0.5rem; z-index: 10; transition: color 0.3s ease;"
                        title="Show/Hide Password"
                    >
                        <i class="fas fa-eye" style="font-size: 1.2rem;" id="passwordToggleIcon"></i>
                    </button>
                </div>
                @error('password')
                    <p class="clsu-input-error">
                        <i class="fas fa-exclamation-circle"></i>
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <button type="submit" class="clsu-btn-confirm">
                <i class="fas fa-check"></i>
                Confirm
            </button>
        </form>
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
            button.style.color = '#006633';
        } else {
            field.type = 'password';
            icon.classList.remove('fa-eye-slash');
            icon.classList.add('fa-eye');
            button.style.color = '#9ca3af';
        }
    }
</script>