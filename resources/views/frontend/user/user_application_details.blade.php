<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application Details - CareLinx</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <style>
        .detail-container { background: #f5f5f5; min-height: 100vh; padding: 30px 0; }
        .back-link { color: #00a896; text-decoration: none; font-size: 14px; display: inline-block; margin-bottom: 20px; }
        .detail-card { background: white; border-radius: 15px; padding: 40px; box-shadow: 0 2px 10px rgba(0,0,0,0.06); margin-bottom: 20px; }
        .status-header { display: flex; justify-content: space-between; align-items: center; padding: 25px; background: #e8f4f2; border-radius: 15px; margin-bottom: 30px; }
        .status-badge-large { padding: 10px 25px; border-radius: 20px; font-size: 15px; font-weight: 500; }
        .status-pending { background: #fff3cd; color: #856404; }
        .status-under_review { background: #d1ecf1; color: #0c5460; }
        .status-shortlisted { background: #d4edda; color: #155724; }
        .status-interview_scheduled { background: #cfe2ff; color: #084298; }
        .status-rejected { background: #f8d7da; color: #721c24; }
        .status-accepted { background: #d4edda; color: #155724; }
        .status-withdrawn { background: #e2e3e5; color: #383d41; }
        .section-title { font-size: 20px; color: #2d5f5d; font-weight: 400; margin: 30px 0 15px 0; }
        .info-grid { display: grid; grid-template-columns: repeat(2, 1fr); gap: 20px; margin-bottom: 20px; }
        .info-item { padding: 15px; background: #f8f9fa; border-radius: 8px; }
        .info-label { font-size: 12px; color: #999; text-transform: uppercase; letter-spacing: 0.5px; margin-bottom: 5px; }
        .info-value { font-size: 16px; color: #333; font-weight: 500; }
        .cover-letter-box { background: #f8f9fa; padding: 20px; border-radius: 10px; margin: 15px 0; }
        .cover-letter-text { font-size: 15px; color: #555; line-height: 1.8; white-space: pre-line; }
        .document-link { display: inline-block; padding: 12px 25px; background: #00a896; color: white; border-radius: 20px; text-decoration: none; margin: 10px 0; }
        .document-link:hover { background: #008c7a; }
        .timeline { position: relative; padding-left: 30px; margin: 20px 0; }
        .timeline-item { position: relative; padding-bottom: 20px; }
        .timeline-item:before { content: ""; position: absolute; left: -24px; top: 0; width: 12px; height: 12px; border-radius: 50%; background: #00a896; }
        .timeline-item:after { content: ""; position: absolute; left: -19px; top: 12px; width: 2px; height: calc(100% - 12px); background: #ddd; }
        .timeline-item:last-child:after { display: none; }
        .timeline-date { font-size: 12px; color: #999; }
        .timeline-content { font-size: 14px; color: #555; margin-top: 5px; }
        .alert-box { padding: 15px 20px; border-radius: 10px; margin: 20px 0; }
        .alert-info { background: #d1ecf1; color: #0c5460; border-left: 4px solid #17a2b8; }
        .alert-success { background: #d4edda; color: #155724; border-left: 4px solid #28a745; }
        .btn-withdraw { background: #dc3545; color: white; border: none; padding: 12px 30px; border-radius: 20px; cursor: pointer; }
    </style>
</head>
<body>
    <header>
        <div class="container">
            <div class="header-content">
                <a href="{{ route('home') }}" class="logo">
                    CareLinx
                    <span class="logo-sub">by Sharecare</span>
                </a>
                <nav>
                    <a href="{{ route('user.dashboard') }}">Dashboard</a>
                    <a href="{{ route('user.jobs') }}">Find Jobs</a>
                    <a href="{{ route('user.applications') }}" style="color: #00a896;">My Applications</a>
                    <a href="{{ route('user.profile') }}">Profile</a>
                </nav>
                <div class="header-right">
                    <div class="user-avatar">{{ substr(Auth::user()->first_name ?? Auth::user()->email, 0, 2) }}</div>
                    <form method="POST" action="{{ route('user.logout') }}" style="display: inline;">
                        @csrf
                        <button type="submit" style="background: none; border: none; color: #666; cursor: pointer; margin-left: 15px;">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </header>

    <div class="detail-container">
        <div class="container">
            <a href="{{ route('user.applications') }}" class="back-link">← Back to My Applications</a>

            @if(session('success'))
                <div style="background: #d4edda; color: #155724; padding: 15px 20px; border-radius: 10px; margin-bottom: 20px;">
                    ✓ {{ session('success') }}
                </div>
            @endif

            <div class="detail-card">
                <!-- Status Header -->
                <div class="status-header">
                    <div>
                        <h1 style="font-size: 26px; color: #2d5f5d; margin: 0 0 5px 0;">{{ $application->job->position }}</h1>
                        <p style="font-size: 16px; color: #666; margin: 0;">{{ $application->job->company_name }}</p>
                    </div>
                    <span class="status-badge-large status-{{ $application->application_status }}">
                        {{ ucfirst(str_replace('_', ' ', $application->application_status)) }}
                    </span>
                </div>

                <!-- Application Information -->
                <h2 class="section-title">Application Information</h2>
                <div class="info-grid">
                    <div class="info-item">
                        <div class="info-label">Applied On</div>
                        <div class="info-value">{{ \Carbon\Carbon::parse($application->applied_at)->format('F d, Y g:i A') }}</div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">Application Status</div>
                        <div class="info-value">{{ ucfirst(str_replace('_', ' ', $application->application_status)) }}</div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">Job Type</div>
                        <div class="info-value">{{ $application->job->job_type }}</div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">Location</div>
                        <div class="info-value">{{ $application->job->city }}, {{ $application->job->state }}</div>
                    </div>
                </div>

                <!-- Interview Information -->
                @if($application->interview_date)
                <div class="alert-box alert-success">
                    <h3 style="margin: 0 0 10px 0; font-size: 16px;">🎉 Interview Scheduled!</h3>
                    <p style="margin: 0; font-size: 14px;">
                        <strong>Date & Time:</strong> {{ \Carbon\Carbon::parse($application->interview_date)->format('F d, Y g:i A') }}<br>
                        @if($application->interview_location)
                        <strong>Location:</strong> {{ $application->interview_location }}
                        @endif
                    </p>
                    @if($application->interview_notes)
                    <p style="margin: 10px 0 0 0; font-size: 13px;">
                        <strong>Notes:</strong> {{ $application->interview_notes }}
                    </p>
                    @endif
                </div>
                @endif

                <!-- Employer Notes -->
                @if($application->admin_notes)
                <div class="alert-box alert-info">
                    <h3 style="margin: 0 0 10px 0; font-size: 16px;">💬 Message from Employer</h3>
                    <p style="margin: 0; font-size: 14px;">{{ $application->admin_notes }}</p>
                </div>
                @endif

                <!-- Cover Letter -->
                <h2 class="section-title">Cover Letter</h2>
                <div class="cover-letter-box">
                    <p class="cover-letter-text">{{ $application->cover_letter }}</p>
                </div>

                <!-- CV Document -->
                <h2 class="section-title">Uploaded Documents</h2>
                @if($application->cv_document_url)
                    <a href="{{ Storage::url($application->cv_document_url) }}" target="_blank" class="document-link">
                        📄 Download CV/Resume
                    </a>
                @endif

                <!-- Job Details -->
                <h2 class="section-title">Job Details</h2>
                <div class="info-grid">
                    <div class="info-item">
                        <div class="info-label">Company</div>
                        <div class="info-value">{{ $application->job->company_name }}</div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">Experience Required</div>
                        <div class="info-value">{{ $application->job->experience }}</div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">Education Level</div>
                        <div class="info-value">{{ $application->job->education_level }}</div>
                    </div>
                    @if($application->job->salary_from)
                    <div class="info-item">
                        <div class="info-label">Salary Range</div>
                        <div class="info-value">${{ number_format($application->job->salary_from, 0) }} - ${{ number_format($application->job->salary_to, 0) }}</div>
                    </div>
                    @endif
                </div>

                <!-- Application Timeline -->
                <h2 class="section-title">Application Timeline</h2>
                <div class="timeline">
                    <div class="timeline-item">
                        <div class="timeline-date">{{ \Carbon\Carbon::parse($application->applied_at)->format('M d, Y g:i A') }}</div>
                        <div class="timeline-content"><strong>Application Submitted</strong></div>
                    </div>
                    @if($application->reviewed_at)
                    <div class="timeline-item">
                        <div class="timeline-date">{{ \Carbon\Carbon::parse($application->reviewed_at)->format('M d, Y g:i A') }}</div>
                        <div class="timeline-content"><strong>Application Reviewed</strong></div>
                    </div>
                    @endif
                    @if($application->interview_date)
                    <div class="timeline-item">
                        <div class="timeline-date">{{ \Carbon\Carbon::parse($application->interview_date)->format('M d, Y g:i A') }}</div>
                        <div class="timeline-content"><strong>Interview Scheduled</strong></div>
                    </div>
                    @endif
                    @if($application->withdrawn_at)
                    <div class="timeline-item">
                        <div class="timeline-date">{{ \Carbon\Carbon::parse($application->withdrawn_at)->format('M d, Y g:i A') }}</div>
                        <div class="timeline-content"><strong>Application Withdrawn</strong></div>
                    </div>
                    @endif
                </div>

                <!-- Actions -->
                @if(!in_array($application->application_status, ['withdrawn', 'rejected', 'accepted']))
                <div style="border-top: 1px solid #eee; padding-top: 25px; margin-top: 30px; text-align: right;">
                    <form method="POST" action="{{ route('user.application.withdraw', $application->id) }}" style="display: inline;">
                        @csrf
                        <button type="submit" class="btn-withdraw" onclick="return confirm('Are you sure you want to withdraw this application? This action cannot be undone.')">
                            Withdraw Application
                        </button>
                    </form>
                </div>
                @endif
            </div>
        </div>
    </div>

    <footer style="margin-top: 50px;">
        <div class="container">
            <div class="footer-content">
                <div>
                    <div class="footer-logo">CareLinx <span class="logo-sub">by Sharecare</span></div>
                    <p class="footer-text">©2024 Sharecare, Inc.</p>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>