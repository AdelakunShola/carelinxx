<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NUVIACARE Request Confirmation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 20px auto;
            background: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .header {
            background: #00796B;
            color: white;
            padding: 30px;
            text-align: center;
        }
        .header h1 {
            margin: 0;
            font-size: 28px;
        }
        .content {
            padding: 40px 30px;
        }
        .tracking-box {
            background: #FFF3E0;
            border: 2px solid #FFB74D;
            border-radius: 8px;
            padding: 20px;
            text-align: center;
            margin: 25px 0;
        }
        .tracking-number {
            font-size: 24px;
            font-weight: bold;
            color: #E65100;
            font-family: 'Courier New', monospace;
            letter-spacing: 2px;
        }
        .info-box {
            background: #f8f9fa;
            border-radius: 8px;
            padding: 20px;
            margin: 20px 0;
        }
        .info-row {
            display: flex;
            padding: 10px 0;
            border-bottom: 1px solid #e0e0e0;
        }
        .info-row:last-child {
            border-bottom: none;
        }
        .info-label {
            font-weight: bold;
            width: 40%;
            color: #666;
        }
        .info-value {
            width: 60%;
            color: #333;
        }
        .next-steps {
            margin: 25px 0;
        }
        .next-steps h3 {
            color: #00796B;
            margin-bottom: 15px;
        }
        .next-steps ul {
            list-style: none;
            padding: 0;
        }
        .next-steps li {
            padding: 10px 0;
            padding-left: 30px;
            position: relative;
        }
        .next-steps li:before {
            content: "✓";
            position: absolute;
            left: 0;
            color: #4CAF50;
            font-weight: bold;
            font-size: 18px;
        }
        .button {
            display: inline-block;
            background: #00796B;
            color: white;
            padding: 14px 30px;
            text-decoration: none;
            border-radius: 8px;
            font-weight: bold;
            margin: 20px 0;
        }
        .footer {
            background: #f8f9fa;
            padding: 20px 30px;
            text-align: center;
            color: #666;
            font-size: 14px;
        }
    </style>
</head>
<body>
       @php
    $settings = App\Models\setting::first();
@endphp
    <div class="container">
        <div class="header">
            <h1>✓ Request Received!</h1>
            <p style="margin: 10px 0 0 0;">Thank you for choosing NUVIACARE</p>
        </div>

        <div class="content">
            <p>Dear Valued Client,</p>
            
            <p>We've successfully received your caregiver request. Our team is now reviewing your requirements and will begin matching you with qualified caregivers in your area.</p>

            <div class="tracking-box">
                <p style="margin: 0 0 10px 0;"><strong>Your Tracking Number:</strong></p>
                <div class="tracking-number">{{ $trackingNumber }}</div>
                <p style="margin: 10px 0 0 0; font-size: 13px; color: #F57C00;">
                    Save this number to track your request status
                </p>
            </div>

            <div class="info-box">
                <h3 style="margin-top: 0; color: #00796B;">Request Details</h3>
                <div class="info-row">
                    <div class="info-label">Care Recipient:</div>
                    <div class="info-value">{{ $careRecipient }}</div>
                </div>
                <div class="info-row">
                    <div class="info-label">Location:</div>
                    <div class="info-value">{{ $location }}</div>
                </div>
                <div class="info-row">
                    <div class="info-label">Urgency:</div>
                    <div class="info-value">{{ $urgency }}</div>
                </div>
            </div>

            <div class="next-steps">
                <h3>What happens next?</h3>
                <ul>
                    <li>Our team will review your request within 24 hours</li>
                    <li>We'll match you with qualified caregivers in your area</li>
                    <li>You'll receive notifications about potential matches via email</li>
                    <li>You can review caregiver profiles and make your selection</li>
                    <li>We'll coordinate the introduction and care schedule</li>
                </ul>
            </div>

            <center>
                <a href="{{ url('/') }}" class="button">Visit NUVIACARE Dashboard</a>
            </center>

            <p style="margin-top: 30px; color: #666; font-size: 14px;">
                If you have any questions or need immediate assistance, please don't hesitate to contact our support team at <a href="mailto:{{ $settings->company_email }}">{{ $settings->company_email ?? 'info@nuviacare.com' }}</a> or call us at 1-800-NUVIACARE.
            </p>
        </div>

        <div class="footer">
            <p style="margin: 0;">© {{ date('Y') }} NUVIACARE CARE HOME. All rights reserved.</p>
            <p style="margin: 10px 0 0 0;">
                <a href="{{ url('/') }}" style="color: #00796B; text-decoration: none;">Visit Website</a> |
                <a href="{{ url('/privacy') }}" style="color: #00796B; text-decoration: none;">Privacy Policy</a> |
                <a href="{{ url('/terms') }}" style="color: #00796B; text-decoration: none;">Terms of Service</a>
            </p>
        </div>
    </div>
</body>
</html>