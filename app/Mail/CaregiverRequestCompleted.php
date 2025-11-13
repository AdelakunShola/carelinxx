<?php

namespace App\Mail;

use App\Models\CaregiverRequest;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Queue\SerializesModels;

class CaregiverRequestCompleted extends Mailable
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
            subject: 'Your NUVIACARE Request - Tracking #' . $this->caregiverRequest->tracking_number,
            tags: ['caregiver-request', 'completed'],
            metadata: [
                'tracking_number' => $this->caregiverRequest->tracking_number,
                'request_id' => $this->caregiverRequest->id,
            ],
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.caregiver_request_completed',
            with: [
                'trackingNumber' => $this->caregiverRequest->tracking_number,
                'careRecipient' => $this->caregiverRequest->care_recipient,
                'location' => $this->caregiverRequest->location_city ?? $this->caregiverRequest->location_postcode,
                'urgency' => ucfirst(str_replace('_', ' ', $this->caregiverRequest->urgency)),
                'hoursPerWeek' => $this->caregiverRequest->hours_per_week,
                'serviceTypes' => $this->formatServiceTypes($this->caregiverRequest->service_types),
                'genderPreference' => ucfirst($this->caregiverRequest->gender_preference),
                'scheduleType' => ucfirst($this->caregiverRequest->schedule_type),
                'createdAt' => $this->caregiverRequest->created_at->format('F d, Y'),
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
        
        // If you want to attach a PDF summary later, you can do:
        // return [
        //     Attachment::fromPath(storage_path('app/caregiver-requests/' . $this->caregiverRequest->tracking_number . '.pdf'))
        //         ->as('Request-Summary.pdf')
        //         ->withMime('application/pdf'),
        // ];
    }

    /**
     * Format service types for display
     */
    private function formatServiceTypes($serviceTypes): string
    {
        if (empty($serviceTypes)) {
            return 'Not specified';
        }

        $formatted = array_map(function($type) {
            return ucfirst(str_replace('_', ' ', $type));
        }, $serviceTypes);

        return implode(', ', $formatted);
    }
}