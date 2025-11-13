<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complete Your NUVIACARE Request</title>
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
            background: #FF9800;
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
        .urgency-note {
            background: #FFEBEE;
            border-left: 4px solid #F44336;
            padding: 15px;
            margin: 20px 0;
            border-radius: 4px;
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
    <div class="container">
        <div class="header">
            <h1>⏰ Complete Your Request</h1>
            <p style="margin: 10px 0 0 0;">Your caregiver is waiting!</p>
        </div>

        <div class="content">
            <p>Hello,</p>
            
            <p>We noticed you started a caregiver request for <strong>{{ $careRecipient }}</strong> but didn't complete the process. We're here to help you find the perfect caregiver match!</p>

            <div class="tracking-box">
                <p style="margin: 0 0 10px 0;"><strong>Your Tracking Number:</strong></p>
                <div class="tracking-number">{{ $trackingNumber }}</div>
            </div>

            <div class="urgency-note">
                <strong>⚠️ Don't Miss Out!</strong><br>
                The sooner you complete your request, the faster we can match you with qualified caregivers in your area.
            </div>

            <p><strong>Complete your request now to:</strong></p>
            <ul>
                <li>Get matched with vetted, professional caregivers</li>
                <li>Review detailed caregiver profiles and reviews</li>
                <li>Schedule care on your terms</li>
                <li>Access 24/7 support from our care team</li>
            </ul>

            <center>
                <a href="{{ $resumeUrl }}" class="button">Complete My Request →</a>
            </center>

            <p style="margin-top: 30px; font-size: 14px; color: #666;">
                This link will allow you to pick up right where you left off. If you have any questions or need assistance, please contact us at support@NUVIACARE.com.
            </p>

            <p style="margin-top: 20px; font-size: 13px; color: #999;">
                If you no longer need caregiver services, you can ignore this email or reply to let us know.
            </p>
        </div>

        <div class="footer">
            <p style="margin: 0;">© {{ date('Y') }} NUVIACARE CARE HOME. All rights reserved.</p>
            <p style="margin: 10px 0 0 0;">
                <a href="{{ url('/') }}" style="color: #00796B; text-decoration: none;">Visit Website</a> |
                <a href="{{ url('/privacy') }}" style="color: #00796B; text-decoration: none;">Privacy Policy</a>
            </p>
        </div>
    </div>
</body>
</html>