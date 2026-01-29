<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class OrientationScheduled extends Mailable
{
    use Queueable, SerializesModels;

    public $applicant;
    public $scheduleDetails;

    /**
     * Create a new message instance.
     */
    public function __construct($applicant, $scheduleDetails)
    {
        $this->applicant = $applicant;
        $this->scheduleDetails = $scheduleDetails;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        return $this->subject('Virtual Orientation Invitation - CLSU ETEEAP')
                    ->view('emails.orientation_scheduled')
                    ->with([
                        'applicant' => $this->applicant,
                        'scheduleDetails' => $this->scheduleDetails,
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
            subject: 'Virtual Orientation Invitation - CLSU ETEEAP',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.orientation_scheduled',
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
