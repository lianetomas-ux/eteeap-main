<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class RescheduleOrientationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $applicant;
    public $schedule;

    /**
     * Create a new message instance.
     */
    public function __construct($applicant, $schedule)
    {
        $this->applicant = $applicant;
        $this->schedule = $schedule;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        return $this->subject('Virtual Orientation Schedule Update - CLSU ETEEAP')
                    ->view('emails.reschedule_orientation')
                    ->with([
                        'applicant' => $this->applicant,
                        'schedule' => $this->schedule,
                    ])
                    ->attach(public_path('images/cl.png'), [
                        'as' => 'logo.png',
                        'mime' => 'image/png',
                    ]);
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Virtual Orientation Schedule Update - CLSU ETEEAP',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.reschedule_orientation',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
