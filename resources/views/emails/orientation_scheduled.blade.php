@extends('emails.layout')

@section('content')
<div class="email-content">
    <h2 style="color: #006633; margin-bottom: 20px;">Virtual Orientation Invitation</h2>
    
    <p>Dear {{ $applicant->first_name }} {{ $applicant->middle_name }} {{ $applicant->last_name }},</p>
    
    <p>Greetings from the Expanded Tertiary Education Equivalency and Accreditation Program (ETEEAP) Office of Central Luzon State University!</p>
    
    <p>We are pleased to invite you to attend a <strong>Virtual Orientation Session</strong> as part of your ETEEAP journey. This orientation will provide you with essential information about the program, requirements, and next steps.</p>
    
    <div class="email-info-box">
        <p style="margin: 0; font-weight: 600; color: #166534; margin-bottom: 15px;">
            <i class="fas fa-video" style="margin-right: 8px;"></i>Virtual Orientation Details
        </p>
        <div style="background: #ffffff; padding: 15px; border-radius: 8px; margin-top: 10px;">
            <p style="margin: 8px 0; color: #1a2e1a;">
                <strong style="color: #006633;">📅 Date:</strong> {{ $scheduleDetails['date'] ?? 'To be announced' }}
            </p>
            <p style="margin: 8px 0; color: #1a2e1a;">
                <strong style="color: #006633;">🕐 Time:</strong> {{ $scheduleDetails['time'] ?? 'To be announced' }}
            </p>
            <p style="margin: 8px 0; color: #1a2e1a;">
                <strong style="color: #006633;">💻 Platform:</strong> {{ $scheduleDetails['platform'] ?? 'Online Meeting' }}
            </p>
        </div>
    </div>
    
    <div style="background: linear-gradient(135deg, #eff6ff 0%, #dbeafe 100%); border-left: 4px solid #2563eb; padding: 20px; margin: 20px 0; border-radius: 0 8px 8px 0;">
        <p style="margin: 0; font-weight: 600; color: #1e40af; margin-bottom: 10px;">
            <i class="fas fa-link" style="margin-right: 8px;"></i>Meeting Access Information
        </p>
        <div style="background: #ffffff; padding: 15px; border-radius: 8px; margin-top: 10px;">
            @if(!empty($scheduleDetails['meeting_link']))
            <p style="margin: 8px 0; color: #1a2e1a;">
                <strong style="color: #2563eb;">🔗 Meeting Link:</strong><br>
                <a href="{{ $scheduleDetails['meeting_link'] }}" style="color: #2563eb; word-break: break-all;">{{ $scheduleDetails['meeting_link'] }}</a>
            </p>
            @endif
            @if(!empty($scheduleDetails['meeting_id']))
            <p style="margin: 8px 0; color: #1a2e1a;">
                <strong style="color: #2563eb;">🆔 Meeting ID:</strong> {{ $scheduleDetails['meeting_id'] }}
            </p>
            @endif
            @if(!empty($scheduleDetails['meeting_password']))
            <p style="margin: 8px 0; color: #1a2e1a;">
                <strong style="color: #2563eb;">🔑 Password:</strong> {{ $scheduleDetails['meeting_password'] }}
            </p>
            @endif
        </div>
    </div>
    
    @if(!empty($scheduleDetails['notes']))
    <div style="background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%); border-left: 4px solid #6b7280; padding: 20px; margin: 20px 0; border-radius: 0 8px 8px 0;">
        <p style="margin: 0; font-weight: 600; color: #374151; margin-bottom: 10px;">
            <i class="fas fa-sticky-note" style="margin-right: 8px;"></i>Additional Notes
        </p>
        <p style="margin: 0; color: #4b5563; line-height: 1.8;">{{ $scheduleDetails['notes'] }}</p>
    </div>
    @endif
    
    <div style="background: linear-gradient(135deg, #fef3c7 0%, #fde68a 100%); border-left: 4px solid #f59e0b; padding: 20px; margin: 20px 0; border-radius: 0 8px 8px 0;">
        <p style="margin: 0; font-weight: 600; color: #92400e; margin-bottom: 10px;">
            <i class="fas fa-info-circle" style="margin-right: 8px;"></i>Important Reminders
        </p>
        <ul style="margin: 10px 0 0 20px; color: #78350f; line-height: 1.8;">
            <li>Please join the meeting 10 minutes before the scheduled time</li>
            <li>Ensure you have a stable internet connection</li>
            <li>Use a computer or laptop with working camera and microphone</li>
            <li>Find a quiet place with minimal distractions</li>
            <li>Have a pen and paper ready for taking notes</li>
        </ul>
    </div>
    
    <p>Your attendance is important for a smooth transition into the ETEEAP program. Should you have any questions or concerns regarding the orientation, please do not hesitate to contact our office.</p>
    
    <div style="text-align: center; margin: 30px 0;">
        @if(!empty($scheduleDetails['meeting_link']))
        <a href="{{ $scheduleDetails['meeting_link'] }}" class="email-button">Join Virtual Orientation</a>
        @else
        <a href="{{ url('/') }}" class="email-button">View Application Portal</a>
        @endif
    </div>
    
    <div class="email-divider"></div>
    
    <p style="font-size: 14px; color: #6b7280;">
        If you have any questions or need to reschedule, please contact us as soon as possible.
    </p>
    
    <p style="margin-top: 20px;">
        We look forward to seeing you at the orientation!<br><br>
        Respectfully yours,<br>
        <strong>ETEEAP Office</strong><br>
        Central Luzon State University
    </p>
</div>
@endsection
