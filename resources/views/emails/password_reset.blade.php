@extends('emails.layout')

@section('content')
<div class="email-content">
    <h2 style="color: #006633; margin-bottom: 20px;">Password Reset Request</h2>
    
    <p>Dear User,</p>
    
    <p>Greetings from the Expanded Tertiary Education Equivalency and Accreditation Program (ETEEAP) Office of Central Luzon State University!</p>
    
    <p>We have received a request to reset the password associated with your CLSU ETEEAP account. If you initiated this request, please click the button below to proceed with resetting your password:</p>
    
    <div style="text-align: center; margin: 30px 0;">
        <a href="{{ $resetUrl }}" class="email-button">Reset Password</a>
    </div>
    
    <div class="email-info-box">
        <p style="margin: 0; font-weight: 600; color: #166534; margin-bottom: 8px;">
            <i class="fas fa-shield-alt" style="margin-right: 8px;"></i>Security Notice
        </p>
        <p style="margin: 0; font-size: 14px; color: #1a2e1a;">
            This password reset link will expire in 60 minutes. If you did not request a password reset, please ignore this email and your password will remain unchanged.
        </p>
    </div>
    
    <p style="margin-top: 25px; font-size: 14px; color: #6b7280;">
        If the button above doesn't work, copy and paste the following link into your browser:
    </p>
    <p style="font-size: 13px; color: #006633; word-break: break-all; background: #f3f4f6; padding: 10px; border-radius: 6px;">
        {{ $resetUrl }}
    </p>
    
    <div class="email-divider"></div>
    
    <p style="font-size: 14px; color: #6b7280;">
        For your security, please never share this link with anyone. Please be advised that CLSU ETEEAP staff will never ask for your password.
    </p>
    
    <p style="margin-top: 20px;">
        Respectfully yours,<br>
        <strong>ETEEAP Office</strong><br>
        Central Luzon State University<br>
        Science City of Muñoz, Nueva Ecija
    </p>
</div>
@endsection
