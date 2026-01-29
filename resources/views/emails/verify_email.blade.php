@extends('emails.layout')

@section('content')
<div class="email-content">
    <h2 style="color: #006633; margin-bottom: 20px;">Email Verification Required</h2>
    
    <p>Dear {{ $user->name ?? 'Applicant' }},</p>
    
    <p>Greetings from the Expanded Tertiary Education Equivalency and Accreditation Program (ETEEAP) Office of Central Luzon State University!</p>
    
    <p>Thank you for registering with the CLSU ETEEAP Portal. We are pleased to welcome you to our community.</p>
    
    <p>To complete your registration and gain access to all portal features, please verify your email address by clicking the button below:</p>
    
    <div style="text-align: center; margin: 30px 0;">
        <a href="{{ $verificationUrl }}" class="email-button">Verify Email Address</a>
    </div>
    
    <div class="email-info-box">
        <p style="margin: 0; font-weight: 600; color: #166534; margin-bottom: 8px;">
            <i class="fas fa-info-circle" style="margin-right: 8px;"></i>What's Next?
        </p>
        <p style="margin: 0; font-size: 14px; color: #1a2e1a;">
            Once you verify your email, you'll be able to access all features of the ETEEAP portal, including submitting applications, tracking your status, and receiving important updates.
        </p>
    </div>
    
    <p style="margin-top: 25px; font-size: 14px; color: #6b7280;">
        If the button above doesn't work, copy and paste the following link into your browser:
    </p>
    <p style="font-size: 13px; color: #006633; word-break: break-all; background: #f3f4f6; padding: 10px; border-radius: 6px;">
        {{ $verificationUrl }}
    </p>
    
    <div class="email-divider"></div>
    
    <p style="font-size: 14px; color: #6b7280;">
        If you did not create an account with CLSU ETEEAP, please disregard this email.
    </p>
    
    <p style="margin-top: 20px;">
        Welcome to CLSU ETEEAP!<br><br>
        Respectfully yours,<br>
        <strong>ETEEAP Office</strong><br>
        Central Luzon State University<br>
        Science City of Muñoz, Nueva Ecija
    </p>
</div>
@endsection
