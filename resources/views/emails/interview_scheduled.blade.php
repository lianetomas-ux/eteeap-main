@extends('emails.layout')

@section('content')
<div class="email-content">
    <h2 style="color: #006633; margin-bottom: 20px;">Interview Schedule Notification</h2>
    
    <p>Dear {{ $applicant->first_name }} {{ $applicant->middle_name }} {{ $applicant->last_name }},</p>
    
    <p>Greetings from the Expanded Tertiary Education Equivalency and Accreditation Program (ETEEAP) Office of Central Luzon State University!</p>
    
    <p>We are pleased to inform you that your application has been reviewed and you are hereby invited to attend an interview as part of the ETEEAP assessment process.</p>
    
    <div class="email-info-box">
        <p style="margin: 0; font-weight: 600; color: #166534; margin-bottom: 15px;">
            <i class="fas fa-calendar-check" style="margin-right: 8px;"></i>Interview Details
        </p>
        <div style="background: #ffffff; padding: 15px; border-radius: 8px; margin-top: 10px;">
            <p style="margin: 8px 0; color: #1a2e1a;">
                <strong style="color: #006633;">📅 Date:</strong> {{ $scheduleDetails['date'] ?? 'To be announced' }}
            </p>
            <p style="margin: 8px 0; color: #1a2e1a;">
                <strong style="color: #006633;">🕐 Time:</strong> {{ $scheduleDetails['time'] ?? 'To be announced' }}
            </p>
            <p style="margin: 8px 0; color: #1a2e1a;">
                <strong style="color: #006633;">📍 Location:</strong> {{ $scheduleDetails['location'] ?? 'To be announced' }}
            </p>
        </div>
    </div>
    
    <div style="background: linear-gradient(135deg, #eff6ff 0%, #dbeafe 100%); border-left: 4px solid #2563eb; padding: 20px; margin: 20px 0; border-radius: 0 8px 8px 0;">
        <p style="margin: 0; font-weight: 600; color: #1e40af; margin-bottom: 10px;">
            <i class="fas fa-info-circle" style="margin-right: 8px;"></i>Important Reminders
        </p>
        <ul style="margin: 10px 0 0 20px; color: #1e3a8a; line-height: 1.8;">
            <li>Please arrive 15 minutes early</li>
            <li>Bring a valid ID and all required documents</li>
            <li>Dress appropriately for the interview</li>
            <li>Prepare to discuss your work experience and educational goals</li>
        </ul>
    </div>
    
    <p>We look forward to meeting you and learning more about your professional background and educational aspirations.</p>
    
    <div style="text-align: center; margin: 30px 0;">
        <a href="{{ url('/') }}" class="email-button">View Application Portal</a>
    </div>
    
    <div class="email-divider"></div>
    
    <p style="font-size: 14px; color: #6b7280;">
        Should you have any questions or require to reschedule due to unavoidable circumstances, please contact our office at your earliest convenience.
    </p>
    
    <p style="margin-top: 20px;">
        We wish you the best of success!<br><br>
        Respectfully yours,<br>
        <strong>ETEEAP Assessment Committee</strong><br>
        Central Luzon State University<br>
        Science City of Muñoz, Nueva Ecija
    </p>
</div>
@endsection
