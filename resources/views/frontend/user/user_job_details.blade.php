@extends('user1.user_dashboard')
@section('user1')
    <style>
        .job-detail-container { background: #f5f5f5; min-height: 100vh; padding: 30px 0; }
        .back-link { color: #00a896; text-decoration: none; font-size: 14px; display: inline-block; margin-bottom: 20px; }
        .job-header-card { background: white; border-radius: 15px; padding: 40px; box-shadow: 0 2px 10px rgba(0,0,0,0.06); margin-bottom: 20px; }
        .job-title { font-size: 32px; color: #2d5f5d; margin: 0 0 10px 0; }
        .company-name { font-size: 20px; color: #666; margin: 0 0 20px 0; }
        .job-meta { display: flex; flex-wrap: wrap; gap: 20px; margin: 20px 0; }
        .meta-item { display: flex; align-items: center; gap: 8px; font-size: 15px; color: #555; }
        .meta-icon { font-size: 18px; }
        .salary-badge { display: inline-block; padding: 8px 20px; background: #e8f4f2; color: #00a896; border-radius: 20px; font-size: 15px; font-weight: 500; margin: 10px 0; }
        .apply-section { background: #e8f4f2; padding: 25px; border-radius: 15px; margin: 25px 0; }
        .btn-apply { background: #00a896; color: white; border: none; padding: 15px 40px; border-radius: 25px; font-size: 16px; cursor: pointer; text-decoration: none; display: inline-block; }
        .btn-apply:hover { background: #008c7a; }
        .btn-disabled { background: #ccc; cursor: not-allowed; }
        .job-content-card { background: white; border-radius: 15px; padding: 40px; box-shadow: 0 2px 10px rgba(0,0,0,0.06); margin-bottom: 20px; }
        .section-title { font-size: 22px; color: #2d5f5d; font-weight: 400; margin: 30px 0 15px 0; }
        .section-title:first-child { margin-top: 0; }
        .info-grid { display: grid; grid-template-columns: repeat(2, 1fr); gap: 20px; margin: 20px 0; }
        .info-item { padding: 15px; background: #f8f9fa; border-radius: 8px; }
        .info-label { font-size: 12px; color: #999; text-transform: uppercase; letter-spacing: 0.5px; margin-bottom: 5px; }
        .info-value { font-size: 16px; color: #333; font-weight: 500; }
        .description-text { font-size: 15px; color: #555; line-height: 1.8; white-space: pre-line; }
        .alert-warning { background: #fff3cd; color: #856404; padding: 15px 20px; border-radius: 10px; margin: 15px 0; border-left: 4px solid #ffc107; }
        .alert-error { background: #f8d7da; color: #721c24; padding: 15px 20px; border-radius: 10px; margin: 15px 0; border-left: 4px solid #dc3545; }
        .tag { display: inline-block; padding: 5px 15px; background: #e8f4f2; color: #00a896; border-radius: 15px; font-size: 13px; margin: 5px 5px 5px 0; }
        @media (max-width: 768px) { 
            .info-grid { grid-template-columns: 1fr; }
            .job-meta { flex-direction: column; gap: 10px; }
        }
    </style>


    <div class="job-detail-container">
        <div class="container">
            <a href="{{ route('user.jobs') }}" class="back-link">← Back to Job Listings</a>

            @if(session('error'))
                <div class="alert-error">{{ session('error') }}</div>
            @endif

            @if(session('success'))
                <div style="background: #d4edda; color: #155724; padding: 15px 20px; border-radius: 10px; margin-bottom: 20px;">
                    ✓ {{ session('success') }}
                </div>
            @endif

            <!-- Job Header -->
            <div class="job-header-card">
                <h1 class="job-title">{{ $job->position }}</h1>
                <p class="company-name">{{ $job->company_name }}</p>
                
                <div class="job-meta">
                    <div class="meta-item">
                        <span class="meta-icon">📍</span>
                        <span>{{ $job->city }}, {{ $job->state }}, {{ $job->country }}</span>
                    </div>
                    <div class="meta-item">
                        <span class="meta-icon">💼</span>
                        <span>{{ $job->job_type }}</span>
                    </div>
                    <div class="meta-item">
                        <span class="meta-icon">📊</span>
                        <span>{{ $job->experience }} Experience</span>
                    </div>
                    <div class="meta-item">
                        <span class="meta-icon">📅</span>
                        <span>Posted {{ \Carbon\Carbon::parse($job->posted_date)->diffForHumans() }}</span>
                    </div>
                </div>

                @if($job->salary_from)
                <div class="salary-badge">
                    💰 ${{ number_format($job->salary_from, 0) }} - ${{ number_format($job->salary_to, 0) }}
                </div>
                @endif

                <!-- Apply Section -->
                <div class="apply-section">
                    @php
                        $hasApplied = $job->applications->where('user_id', Auth::id())->first();
                        $isClosed = $job->close_date && \Carbon\Carbon::parse($job->close_date)->isPast();
                    @endphp

                    @if($hasApplied)
                        <p style="margin: 0 0 15px 0; font-size: 15px;">
                            ✓ You have already applied for this position
                        </p>
                        <a href="{{ route('user.application.details', $hasApplied->id) }}" class="btn-apply">
                            View Application Status
                        </a>
                    @elseif($isClosed)
                        <p style="margin: 0; font-size: 15px; color: #856404;">
                            ⚠️ This job posting has closed and is no longer accepting applications
                        </p>
                    @else
                        <p style="margin: 0 0 15px 0; font-size: 15px;">
                            Interested in this position? Submit your application now!
                        </p>
                        <a href="{{ route('user.job.apply', $job->id) }}" class="btn-apply">
                            Apply Now
                        </a>
                        @if($job->last_date)
                        <p style="margin: 15px 0 0 0; font-size: 13px; color: #666;">
                            Application deadline: {{ \Carbon\Carbon::parse($job->last_date)->format('F d, Y') }}
                        </p>
                        @endif
                    @endif
                </div>
            </div>

            <!-- Job Details -->
            <div class="job-content-card">
                <h2 class="section-title">Job Description</h2>
                <div class="description-text">{{ $job->description }}</div>

                <h2 class="section-title">Job Requirements</h2>
                <div class="info-grid">
                    <div class="info-item">
                        <div class="info-label">Job Category</div>
                        <div class="info-value">{{ $job->job_category }}</div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">Experience Level</div>
                        <div class="info-value">{{ $job->experience }}</div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">Education Level</div>
                        <div class="info-value">{{ $job->education_level }}</div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">Gender Requirement</div>
                        <div class="info-value">{{ $job->gender ?? 'Any' }}</div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">Number of Vacancies</div>
                        <div class="info-value">{{ $job->no_of_vacancy }}</div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">Job Status</div>
                        <div class="info-value">{{ ucfirst($job->status) }}</div>
                    </div>
                </div>

                <h2 class="section-title">Important Dates</h2>
                <div class="info-grid">
                    <div class="info-item">
                        <div class="info-label">Posted Date</div>
                        <div class="info-value">{{ \Carbon\Carbon::parse($job->posted_date)->format('F d, Y') }}</div>
                    </div>
                    @if($job->last_date)
                    <div class="info-item">
                        <div class="info-label">Application Deadline</div>
                        <div class="info-value">{{ \Carbon\Carbon::parse($job->last_date)->format('F d, Y') }}</div>
                    </div>
                    @endif
                    @if($job->close_date)
                    <div class="info-item">
                        <div class="info-label">Position Closes</div>
                        <div class="info-value">{{ \Carbon\Carbon::parse($job->close_date)->format('F d, Y') }}</div>
                    </div>
                    @endif
                </div>

                @if($job->applications->count() > 0 && Auth::user()->role === 'admin')
                <h2 class="section-title">Application Statistics</h2>
                <div class="info-item" style="max-width: 300px;">
                    <div class="info-label">Total Applications</div>
                    <div class="info-value">{{ $job->applications->count() }} applicants</div>
                </div>
                @endif
            </div>
        </div>
    </div>

  @endsection