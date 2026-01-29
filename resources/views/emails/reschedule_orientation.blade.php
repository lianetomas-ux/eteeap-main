@extends('emails.layout')

@section('content')
<div class="email-content">
    <h2 style="color: #006633; margin-bottom: 20px;">Virtual Orientation Schedule Update</h2>
    
    <p>Dear {{ $applicant->first_name }} {{ $applicant->middle_name }} {{ $applicant->last_name }},</p>
    
    <p>Greetings from the Expanded Tertiary Education Equivalency and Accreditation Program (ETEEAP) Office of Central Luzon State University!</p>
    
    <p>We are writing to inform you that there has been a change to your previously scheduled virtual orientation session. Please take note of the updated details below:</p>
    
    <div class="email-info-box info">
        <p style="margin: 0; font-weight: 600; color: #1e40af; margin-bottom: 15px;">
            <i class="fas fa-video" style="margin-right: 8px;"></i>Updated Orientation Details
        </p>
        <div style="background: #ffffff; padding: 15px; border-radius: 8px; margin-top: 10px;">
            <p style="margin: 8px 0; color: #1a2e1a;">
                <strong style="color: #006633;">📅 Date:</strong> {{ $schedule->orientation_date ?? 'To be announced' }}
            </p>
            <p style="margin: 8px 0; color: #1a2e1a;">
                <strong style="color: #006633;">🕐 Time:</strong> {{ $schedule->orientation_time ?? 'To be announced' }}
            </p>
            <p style="margin: 8px 0; color: #1a2e1a;">
                <strong style="color: #006633;">💻 Platform:</strong> {{ $schedule->orientation_platform ?? 'Online Meeting' }}
            </p>
        </div>
    </div>
    
    <div style="background: linear-gradient(135deg, #eff6ff 0%, #dbeafe 100%); border-left: 4px solid #2563eb; padding: 20px; margin: 20px 0; border-radius: 0 8px 8px 0;">
        <p style="margin: 0; font-weight: 600; color: #1e40af; margin-bottom: 10px;">
            <i class="fas fa-link" style="margin-right: 8px;"></i>Meeting Access Information
        </p>
        <div style="background: #ffffff; padding: 15px; border-radius: 8px; margin-top: 10px;">
            @if(!empty($schedule->meeting_link))
            <p style="margin: 8px 0; color: #1a2e1a;">
                <strong style="color: #2563eb;">🔗 Meeting Link:</strong><br>
                <a href="{{ $schedule->meeting_link }}" style="color: #2563eb; word-break: break-all;">{{ $schedule->meeting_link }}</a>
            </p>
            @endif
            @if(!empty($schedule->meeting_id))
            <p style="margin: 8px 0; color: #1a2e1a;">
                <strong style="color: #2563eb;">🆔 Meeting ID:</strong> {{ $schedule->meeting_id }}
            </p>
            @endif
            @if(!empty($schedule->meeting_password))
            <p style="margin: 8px 0; color: #1a2e1a;">
                <strong style="color: #2563eb;">🔑 Password:</strong> {{ $schedule->meeting_password }}
            </p>
            @endif
        </div>
    </div>
    
    @if(!empty($schedule->notes))
    <div style="background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%); border-left: 4px solid #6b7280; padding: 20px; margin: 20px 0; border-radius: 0 8px 8px 0;">
        <p style="margin: 0; font-weight: 600; color: #374151; margin-bottom: 10px;">
            <i class="fas fa-sticky-note" style="margin-right: 8px;"></i>Additional Notes
        </p>
        <p style="margin: 0; color: #4b5563; line-height: 1.8;">{{ $schedule->notes }}</p>
    </div>
    @endif
    
    <div style="background: linear-gradient(135deg, #fef3c7 0%, #fde68a 100%); border-left: 4px solid #f59e0b; padding: 20px; margin: 20px 0; border-radius: 0 8px 8px 0;">
        <p style="margin: 0; font-weight: 600; color: #92400e; margin-bottom: 10px;">
            <i class="fas fa-exclamation-circle" style="margin-right: 8px;"></i>Please Note
        </p>
        <p style="margin: 0; color: #78350f; line-height: 1.8;">
            Please update your calendar with the new orientation date and time. If you have any conflicts with this new schedule, please contact us immediately.
        </p>
    </div>
    
    <p>We sincerely apologize for any inconvenience this change may cause and greatly appreciate your understanding and flexibility.</p>
    
    <div style="text-align: center; margin: 30px 0;">
        @if(!empty($schedule->meeting_link))
        <a href="{{ $schedule->meeting_link }}" class="email-button">Join Virtual Orientation</a>
        @else
        <a href="{{ url('/') }}" class="email-button">View Application Portal</a>
        @endif
    </div>
    
    <div class="email-divider"></div>
    
    <p style="font-size: 14px; color: #6b7280;">
        Should you have any questions or concerns regarding this schedule change, please do not hesitate to contact our office.
    </p>
    
    <p style="margin-top: 20px;">
        Thank you for your continued cooperation.<br><br>
        Respectfully yours,<br>
        <strong>ETEEAP Office</strong><br>
        Central Luzon State University<br>
        Science City of Muñoz, Nueva Ecija
    </p>
</div>
@endsection
