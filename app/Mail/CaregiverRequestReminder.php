<?php

namespace App\Mail;

use App\Models\CaregiverRequest;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Queue\SerializesModels;

class CaregiverRequestReminder extends Mailable
{
    use Queueable, SerializesModels;

    public $caregiverRequest;

    /**
     * Create a new message instance.
     */
    public function __construct(CaregiverRequest $caregiverRequest)
    {
        $this->caregiverRequest = $caregiverRequest;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address('noreply@NUVIACARE.com', 'NUVIACARE CARE HOME'),
            replyTo: [
                new Address('support@NUVIACARE.com', 'NUVIACARE Support Team'),
            ],
            subject: 'Complete Your NUVIACARE Request - Tracking #' . $this->caregiverRequest->tracking_number,
            tags: ['caregiver-request', 'reminder', 'incomplete'],
            metadata: [
                'tracking_number' => $this->caregiverRequest->tracking_number,
                'request_id' => $this->caregiverRequest->id,
                'current_step' => $this->caregiverRequest->current_step,
            ],
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.caregiver_request_reminder',
            with: [
                'trackingNumber' => $this->caregiverRequest->tracking_number,
                'careRecipient' => $this->caregiverRequest->care_recipient,
                'resumeUrl' => $this->getResumeUrl(),
                'currentStep' => $this->caregiverRequest->current_step ?? 1,
                'progressPercentage' => $this->caregiverRequest->getProgressPercentage(),
                'daysAgo' => $this->caregiverRequest->created_at->diffInDays(now()),
            ],
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

    /**
     * Generate resume URL for incomplete request
     */
    private function getResumeUrl(): string
    {
        // You can create a special route to resume the request
        return route('caregiver.request.resume', [
            'tracking' => $this->caregiverRequest->tracking_number
        ]);
    }
}