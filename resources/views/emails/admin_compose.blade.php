@extends('emails.layout')

@section('content')
<div class="email-content">
    @if($recipientName)
    <p style="margin-bottom: 20px;">Dear <strong>{{ $recipientName }}</strong>,</p>
    @endif
    
    <div style="margin-bottom: 30px; line-height: 1.8;">
{!! nl2br(e($emailBody)) !!}
    </div>
    
    <div class="email-divider"></div>
    
    <p style="color: #6b7280; font-size: 14px; margin-bottom: 10px;">
        This email was sent by the CLSU ETEEAP Administration.
    </p>
    
    <p style="color: #6b7280; font-size: 14px;">
        If you have any questions, please do not hesitate to contact us.
    </p>
</div>
@endsection
