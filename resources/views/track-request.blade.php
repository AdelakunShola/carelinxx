<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Track Your Request - NUVIACARE</title>
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <style>
        body {
            background: #f8f9fa;
        }

        .track-container {
            max-width: 1200px;
            margin: 80px auto;
            padding: 0 20px;
        }

        .track-header {
            text-align: center;
            margin-bottom: 50px;
        }

        .track-header h1 {
            font-size: 42px;
            color: #333;
            margin-bottom: 10px;
        }

        .track-header p {
            font-size: 18px;
            color: #666;
        }

        .track-card {
            background: white;
            padding: 50px 40px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            margin-bottom: 30px;
        }

        .tracking-input-group {
            max-width: 600px;
            margin: 0 auto;
        }

        .tracking-input-group input {
            width: 100%;
            padding: 18px 24px;
            border: 2px solid #ddd;
            border-radius: 8px;
            font-size: 18px;
            transition: border-color 0.3s;
            margin-bottom: 15px;
        }

        .tracking-input-group input:focus {
            outline: none;
            border-color: #00796B;
        }

        .tracking-input-group button {
            width: 100%;
            padding: 18px;
            background: #00796B;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 18px;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.3s;
        }

        .tracking-input-group button:hover {
            background: #00695C;
        }

        .error-message {
            color: #f44336;
            margin-top: 10px;
            font-size: 14px;
            display: none;
        }

        .result-card {
            display: none;
            background: white;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }

        .status-badge {
            display: inline-block;
            padding: 8px 16px;
            border-radius: 20px;
            font-weight: 600;
            font-size: 14px;
        }

        .status-incomplete { background: #FFF3E0; color: #F57C00; }
        .status-pending { background: #E3F2FD; color: #1976D2; }
        .status-matched { background: #E8F5E9; color: #388E3C; }
        .status-completed { background: #E8F5E9; color: #2E7D32; }
        .status-cancelled { background: #FFEBEE; color: #D32F2F; }

        .detail-row {
            display: flex;
            padding: 15px 0;
            border-bottom: 1px solid #f0f0f0;
        }

        .detail-row:last-child {
            border-bottom: none;
        }

        .detail-label {
            font-weight: 600;
            color: #666;
            width: 35%;
        }

        .detail-value {
            color: #333;
            width: 65%;
        }

        .progress-timeline {
            margin: 30px 0;
        }

        .timeline-step {
            display: flex;
            align-items: flex-start;
            margin-bottom: 20px;
            position: relative;
        }

        .timeline-step:before {
            content: '';
            position: absolute;
            left: 20px;
            top: 40px;
            bottom: -20px;
            width: 2px;
            background: #e0e0e0;
        }

        .timeline-step:last-child:before {
            display: none;
        }

        .timeline-icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            margin-right: 20px;
            flex-shrink: 0;
        }

        .timeline-icon.completed {
            background: #4CAF50;
            color: white;
        }

        .timeline-icon.current {
            background: #2196F3;
            color: white;
        }

        .timeline-icon.pending {
            background: #e0e0e0;
            color: #999;
        }

        .timeline-content h4 {
            margin: 0 0 5px 0;
            color: #333;
        }

        .timeline-content p {
            margin: 0;
            color: #666;
            font-size: 14px;
        }

        .action-box {
            padding: 20px;
            border-radius: 8px;
            margin-top: 30px;
        }

        .action-box h4 {
            margin-top: 0;
        }

        .action-box p {
            margin-bottom: 15px;
        }

        .back-link {
            display: inline-block;
            margin-top: 20px;
            color: #00796B;
            text-decoration: none;
            font-weight: 600;
        }

        .back-link:hover {
            text-decoration: underline;
        }

        @media (max-width: 768px) {
            .track-card {
                padding: 30px 20px;
            }

            .detail-row {
                flex-direction: column;
            }

            .detail-label, .detail-value {
                width: 100%;
            }

            .detail-label {
                margin-bottom: 5px;
            }
        }
    </style>
</head>
<body>
    <!-- Header (same as your main page) -->
    <header>
        <div class="container">
            <div class="header-content">
                <a href="/" class="logo">
                    NUVIACARE
                    <span class="logo-sub">CARE HOME</span>
                </a>
                <nav>
                    <a href="/">Home</a>
                    <a href="/track-request">Track Request</a>
                    <a href="/login">Log in</a>
                </nav>
            </div>
        </div>
    </header>

    <div class="track-container">
        <div class="track-header">
            <h1>Track Your Request</h1>
            <p>Enter your tracking number to check your caregiver request status</p>
        </div>

        <div class="track-card">
            <form id="trackingForm">
                <div class="tracking-input-group">
                    <input 
                        type="text" 
                        id="trackingNumberInput" 
                        placeholder="Enter tracking number (e.g., CR-A1B2C3D4)" 
                        required
                        autofocus
                    >
                    <div id="trackingError" class="error-message"></div>
                    <button type="submit">
                        🔍 Track My Request
                    </button>
                </div>
            </form>
        </div>

        <div id="resultCard" class="result-card">
            <div id="trackingResult">
                <!-- Result will be dynamically inserted here -->
            </div>
        </div>
    </div>

    <!-- Footer (same as your main page) -->
    <footer>
        <div class="container">
            <div class="footer-content">
                <div>
                    <div class="footer-logo">
                        NUVIACARE
                        <span class="logo-sub">CARE HOME</span>
                    </div>
                    <p class="footer-text">2025 NUVIACARE, Inc.</p>
                </div>
            </div>
        </div>
    </footer>

    <script>
        document.getElementById('trackingForm').addEventListener('submit', async function(e) {
            e.preventDefault();
            
            const trackingNumber = document.getElementById('trackingNumberInput').value.trim();
            const errorDiv = document.getElementById('trackingError');
            const resultCard = document.getElementById('resultCard');
            
            errorDiv.style.display = 'none';
            resultCard.style.display = 'none';
            
            if (!trackingNumber) {
                errorDiv.textContent = 'Please enter a tracking number';
                errorDiv.style.display = 'block';
                return;
            }
            
            try {
                const response = await fetch(`/track-request/${trackingNumber}`);
                const data = await response.json();
                
                if (data.success) {
                    displayTrackingResult(data.request);
                    resultCard.style.display = 'block';
                    resultCard.scrollIntoView({ behavior: 'smooth' });
                } else {
                    errorDiv.textContent = data.message || 'Request not found';
                    errorDiv.style.display = 'block';
                }
            } catch (error) {
                console.error('Error:', error);
                errorDiv.textContent = 'An error occurred. Please try again.';
                errorDiv.style.display = 'block';
            }
        });

        function displayTrackingResult(request) {
            const statusColors = {
                'incomplete': 'status-incomplete',
                'pending': 'status-pending',
                'matched': 'status-matched',
                'completed': 'status-completed',
                'cancelled': 'status-cancelled'
            };
            
            const statusLabels = {
                'incomplete': 'Incomplete',
                'pending': 'Pending Review',
                'matched': 'Matched',
                'completed': 'Completed',
                'cancelled': 'Cancelled'
            };
            
            const resultHTML = `
                <div style="text-align: center; margin-bottom: 30px;">
                    <h2 style="font-size: 28px; color: #333; margin-bottom: 10px;">Request Details</h2>
                    <div style="font-size: 24px; font-family: 'Courier New', monospace; color: #E65100; font-weight: bold; letter-spacing: 2px; margin: 15px 0;">
                        ${request.tracking_number}
                    </div>
                    <span class="status-badge ${statusColors[request.status]}">
                        ${statusLabels[request.status]}
                    </span>
                </div>
                
                <div style="background: #f8f9fa; padding: 25px; border-radius: 8px; margin-bottom: 30px;">
                    <h3 style="margin-top: 0; color: #00796B;">Basic Information</h3>
                    <div class="detail-row">
                        <div class="detail-label">Care Recipient:</div>
                        <div class="detail-value">${formatRelationship(request.who_needs_care)}</div>
                    </div>
                    <div class="detail-row">
                        <div class="detail-label">Location:</div>
                        <div class="detail-value">${request.location_city || request.location_postcode}</div>
                    </div>
                    <div class="detail-row">
                        <div class="detail-label">Urgency:</div>
                        <div class="detail-value">${formatUrgency(request.urgency)}</div>
                    </div>
                    ${request.hours_per_week ? `
                    <div class="detail-row">
                        <div class="detail-label">Hours per Week:</div>
                        <div class="detail-value">${request.hours_per_week}</div>
                    </div>
                    ` : ''}
                    <div class="detail-row">
                        <div class="detail-label">Created:</div>
                        <div class="detail-value">${formatDate(request.created_at)}</div>
                    </div>
                    ${request.completed_at ? `
                    <div class="detail-row">
                        <div class="detail-label">Completed:</div>
                        <div class="detail-value">${formatDate(request.completed_at)}</div>
                    </div>
                    ` : ''}
                </div>
                
                <div class="progress-timeline">
                    <h3 style="color: #00796B; margin-bottom: 20px;">Request Progress</h3>
                    ${generateTimeline(request.current_step, request.status)}
                </div>
                
                ${request.status === 'incomplete' ? `
                <div class="action-box" style="background: #FFF3E0; border-left: 4px solid #FFB74D;">
                    <h4 style="color: #F57C00;">⚠️ Action Required</h4>
                    <p>Your request is incomplete. Please complete it to proceed with caregiver matching.</p>
                    <a href="/caregiver-request/resume/${request.tracking_number}" class="btn-primary" style="display: inline-block; text-decoration: none; padding: 12px 24px; background: #00796B; color: white; border-radius: 8px;">
                        Complete Request
                    </a>
                </div>
                ` : ''}
                
                ${request.status === 'pending' ? `
                <div class="action-box" style="background: #E3F2FD; border-left: 4px solid #2196F3;">
                    <h4 style="color: #1976D2;">🔍 Under Review</h4>
                    <p>Our team is reviewing your request and matching you with qualified caregivers. You'll be notified via email once we have matches for you.</p>
                </div>
                ` : ''}
                
                ${request.status === 'matched' ? `
                <div class="action-box" style="background: #E8F5E9; border-left: 4px solid #4CAF50;">
                    <h4 style="color: #388E3C;">✓ Caregiver Matched!</h4>
                    <p>Great news! We've found caregivers that match your requirements. Check your email for detailed profiles and next steps.</p>
                </div>
                ` : ''}
                
                <a href="/" class="back-link">← Back to Home</a>
            `;
            
            document.getElementById('trackingResult').innerHTML = resultHTML;
        }

        function generateTimeline(currentStep, status) {
            const steps = [
                { number: 1, title: 'Request Started', desc: 'Basic information collected' },
                { number: 2, title: 'Care Needs', desc: 'Urgency and hours specified' },
                { number: 3, title: 'Experience', desc: 'Service types selected' },
                { number: 4, title: 'Preferences', desc: 'Gender and language preferences' },
                { number: 5, title: 'Schedule', desc: 'Care schedule determined' },
                { number: 6, title: 'Completed', desc: 'Request submitted successfully' }
            ];
            
            return steps.map(step => {
                let iconClass = 'pending';
                let icon = step.number;
                
                if (step.number < currentStep) {
                    iconClass = 'completed';
                    icon = '✓';
                } else if (step.number === currentStep) {
                    iconClass = 'current';
                }
                
                return `
                    <div class="timeline-step">
                        <div class="timeline-icon ${iconClass}">${icon}</div>
                        <div class="timeline-content">
                            <h4>${step.title}</h4>
                            <p>${step.desc}</p>
                        </div>
                    </div>
                `;
            }).join('');
        }

        function formatRelationship(value) {
            return value.replace(/_/g, ' ').split(' ').map(word => 
                word.charAt(0).toUpperCase() + word.slice(1)
            ).join(' ');
        }

        function formatUrgency(value) {
            const urgencyMap = {
                'immediately': 'Immediately',
                'within_2_weeks': 'Within 2 Weeks',
                'within_1_month': 'Within 1 Month'
            };
            return urgencyMap[value] || value;
        }

        function formatDate(dateString) {
            const date = new Date(dateString);
            return date.toLocaleDateString('en-US', { 
                year: 'numeric', 
                month: 'long', 
                day: 'numeric',
                hour: '2-digit',
                minute: '2-digit'
            });
        }

        // Auto-populate from URL parameter
        window.addEventListener('DOMContentLoaded', function() {
            const urlParams = new URLSearchParams(window.location.search);
            const tracking = urlParams.get('tracking');
            
            if (tracking) {
                document.getElementById('trackingNumberInput').value = tracking;
                document.getElementById('trackingForm').dispatchEvent(new Event('submit'));
            }
        });
    </script>
</body>
</html>