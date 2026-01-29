@extends('emails.layout')

@section('content')
<div class="email-content">
    <h2 style="color: #374151; margin-bottom: 20px;">Application Status Update</h2>
    
    <p>Dear {{ $applicant->first_name }} {{ $applicant->middle_name }} {{ $applicant->last_name }},</p>
    
    <p>Greetings from the Expanded Tertiary Education Equivalency and Accreditation Program (ETEEAP) Office of Central Luzon State University!</p>
    
    <p>Thank you for your interest in the ETEEAP and for taking the time to submit your application. We sincerely appreciate your effort and dedication throughout the application process.</p>
    
    <div style="background: linear-gradient(135deg, #f3f4f6 0%, #e5e7eb 100%); border-left: 4px solid #6b7280; padding: 20px; margin: 20px 0; border-radius: 0 8px 8px 0;">
        <p style="margin: 0; font-weight: 600; color: #374151; margin-bottom: 8px;">
            <i class="fas fa-info-circle" style="margin-right: 8px;"></i>Application Status: Not Approved
        </p>
        <p style="margin: 0; font-size: 14px; color: #4b5563;">
            After careful review and deliberation by our assessment committee, we regret to inform you that your application was not approved at this time.
        </p>
    </div>
    
    @if (!empty($applicant->remarks))
    <div style="background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%); border-left: 4px solid #64748b; padding: 20px; margin: 20px 0; border-radius: 0 8px 8px 0;">
        <p style="margin: 0; font-weight: 600; color: #475569; margin-bottom: 10px;">Remarks from the Committee:</p>
        <p style="margin: 0; color: #64748b; line-height: 1.8;">{{ $applicant->remarks }}</p>
    </div>
    @endif
    
    <p>We understand that this may not be the outcome you were hoping for. Please know that this decision does not diminish the value of your professional experience and accomplishments.</p>
    
    <p>Should you have any questions regarding this decision or wish to seek clarification on how to strengthen your application for future consideration, please do not hesitate to contact our office. We remain committed to assisting you in your educational pursuits.</p>
    
    <div style="text-align: center; margin: 30px 0;">
        <a href="{{ url('/') }}" class="email-button" style="background: linear-gradient(135deg, #6b7280 0%, #4b5563 100%);">Visit Our Website</a>
    </div>
    
    <div class="email-divider"></div>
    
    <p style="font-size: 14px; color: #6b7280;">
        We appreciate your interest in CLSU ETEEAP and encourage you to consider reapplying in the future should your circumstances change.
    </p>
    
    <p style="margin-top: 20px;">
        Respectfully yours,<br><br>
        <strong>ETEEAP Assessment Committee</strong><br>
        Central Luzon State University<br>
        Science City of Muñoz, Nueva Ecija
    </p>
</div>
@endsection
