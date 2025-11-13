<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NUVIACARE Request Confirmation</title>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; }
        .header { background: #00796B; color: white; padding: 20px; text-align: center; }
        .content { background: #f9f9f9; padding: 30px; border: 1px solid #ddd; }
        .info-box { background: white; padding: 15px; margin: 15px 0; border-left: 4px solid #00796B; }
        .tracking { font-size: 24px; font-weight: bold; color: #00796B; text-align: center; margin: 20px 0; }
        .footer { text-align: center; padding: 20px; color: #666; font-size: 12px; }
        .button { display: inline-block; padding: 12px 30px; background: #00796B; color: white; text-decoration: none; border-radius: 5px; margin: 20px 0; }
    </style>
</head>
<body>
         @php
    $settings = App\Models\setting::first();
@endphp
    <div class="container">
        <div class="header">
            <h1>NUVIACARE</h1>
            <p>Your Caregiver Request Has Been Received</p>
        </div>
        
        <div class="content">
            <p>Thank you for submitting your caregiver request. We're working to find the perfect match for your needs.</p>
            
            <div class="tracking">
                Tracking Number: {{ $caregiverRequest->tracking_number }}
            </div>
            
            <div class="info-box">
                <h3>Request Details:</h3>
                <p><strong>Who needs care:</strong> {{ ucfirst(str_replace('_', ' ', $caregiverRequest->who_needs_care)) }}</p>
                <p><strong>Location:</strong> {{ $caregiverRequest->location_city ?? $caregiverRequest->location_postcode }}</p>
                <p><strong>Urgency:</strong> {{ ucfirst(str_replace('_', ' ', $caregiverRequest->urgency)) }}</p>
                <p><strong>Hours per week:</strong> {{ $caregiverRequest->hours_per_week }}</p>
                <p><strong>Duration:</strong> {{ str_replace('_', ' ', $caregiverRequest->duration) }}</p>
                @if($caregiverRequest->schedule_type)
                <p><strong>Schedule type:</strong> {{ ucfirst($caregiverRequest->schedule_type) }}</p>
                @endif
            </div>
            
            <div class="info-box">
                <h3>What Happens Next?</h3>
                <ul>
                    <li>Our team will review your request within 24 hours</li>
                    <li>We'll match you with qualified caregivers in your area</li>
                    <li>You'll receive notifications about potential matches</li>
                    <li>You can review caregiver profiles and make your selection</li>
                </ul>
            </div>
            
            <p style="text-align: center;">
                <a href="{{ url('/caregiver-request/' . $caregiverRequest->tracking_number) }}" class="button">View Your Request</a>
            </p>
            
            <p><strong>Need to make changes?</strong><br>
            Contact us at <a href="mailto:{{ $settings->company_email }}">{{ $settings->company_email ?? 'info@nuviacare.com' }}</a> with your tracking number.</p>
        </div>
        
        <div class="footer">
            <p>&copy; {{ date('Y') }} NUVIACARE CARE HOME. All rights reserved.</p>
            <p>This email was sent to {{ $caregiverRequest->email }}</p>
        </div>
    </div>
</body>
</html>