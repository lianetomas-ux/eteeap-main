<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AdminComposeEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $emailSubject;
    public $emailBody;
    public $recipientName;

    /**
     * Create a new message instance.
     */
    public function __construct($subject, $body, $recipientName = null)
    {
        $this->emailSubject = $subject;
        $this->emailBody = $body;
        $this->recipientName = $recipientName;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        return $this->subject($this->emailSubject)
                    ->view('emails.admin_compose')
                    ->with([
                        'emailBody' => $this->emailBody,
                        'recipientName' => $this->recipientName,
                    ]);
    }
}
