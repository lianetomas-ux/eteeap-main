@extends('emails.layout')

@section('content')
<div class="email-content">
    <h2 style="color: #006633; margin-bottom: 20px;">Interview Schedule Update</h2>
    
    <p>Dear {{ $applicant->first_name }} {{ $applicant->middle_name }} {{ $applicant->last_name }},</p>
    
    <p>Greetings from the Expanded Tertiary Education Equivalency and Accreditation Program (ETEEAP) Office of Central Luzon State University!</p>
    
    <p>We are writing to inform you that there has been a change to your previously scheduled interview. Please take note of the updated details below:</p>
    
    <div class="email-info-box info">
        <p style="margin: 0; font-weight: 600; color: #1e40af; margin-bottom: 15px;">
            <i class="fas fa-calendar-alt" style="margin-right: 8px;"></i>Updated Interview Details
        </p>
        <div style="background: #ffffff; padding: 15px; border-radius: 8px; margin-top: 10px;">
            <p style="margin: 8px 0; color: #1a2e1a;">
                <strong style="color: #006633;">📅 Date:</strong> {{ $schedule->interview_date ?? 'To be announced' }}
            </p>
            <p style="margin: 8px 0; color: #1a2e1a;">
                <strong style="color: #006633;">🕐 Time:</strong> {{ $schedule->interview_time ?? 'To be announced' }}
            </p>
            <p style="margin: 8px 0; color: #1a2e1a;">
                <strong style="color: #006633;">📍 Location:</strong> {{ $schedule->interview_location ?? 'To be announced' }}
            </p>
        </div>
    </div>
    
    <div style="background: linear-gradient(135deg, #fef3c7 0%, #fde68a 100%); border-left: 4px solid #f59e0b; padding: 20px; margin: 20px 0; border-radius: 0 8px 8px 0;">
        <p style="margin: 0; font-weight: 600; color: #92400e; margin-bottom: 10px;">
            <i class="fas fa-exclamation-circle" style="margin-right: 8px;"></i>Please Note
        </p>
        <p style="margin: 0; color: #78350f; line-height: 1.8;">
            Please update your calendar with the new interview date and time. If you have any conflicts with this new schedule, please contact us immediately.
        </p>
    </div>
    
    <p>We sincerely apologize for any inconvenience this change may cause and greatly appreciate your understanding and flexibility.</p>
    
    <div style="text-align: center; margin: 30px 0;">
        <a href="{{ url('/') }}" class="email-button">View Application Portal</a>
    </div>
    
    <div class="email-divider"></div>
    
    <p style="font-size: 14px; color: #6b7280;">
        Should you have any questions or concerns regarding this schedule change, please do not hesitate to contact our office.
    </p>
    
    <p style="margin-top: 20px;">
        Thank you for your continued cooperation.<br><br>
        Respectfully yours,<br>
        <strong>ETEEAP Assessment Committee</strong><br>
        Central Luzon State University<br>
        Science City of Muñoz, Nueva Ecija
    </p>
</div>
@endsection
