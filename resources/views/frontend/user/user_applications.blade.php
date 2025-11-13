@extends('user1.user_dashboard')
@section('user1')
    <style>
        .applications-container { background: #f5f5f5; min-height: 100vh; padding: 30px 0; }
        .page-header { background: white; border-radius: 15px; padding: 30px; box-shadow: 0 2px 10px rgba(0,0,0,0.06); margin-bottom: 25px; }
        .page-title { font-size: 28px; color: #2d5f5d; margin: 0 0 10px 0; }
        .page-subtitle { font-size: 15px; color: #666; margin: 0; }
        .filter-section { background: white; border-radius: 15px; padding: 20px; box-shadow: 0 2px 10px rgba(0,0,0,0.06); margin-bottom: 25px; }
        .filter-form { display: flex; gap: 15px; align-items: end; flex-wrap: wrap; }
        .filter-field { display: flex; flex-direction: column; flex: 1; min-width: 200px; }
        .filter-label { font-size: 13px; color: #666; margin-bottom: 5px; font-family: Arial, sans-serif; }
        .filter-select { font-size: 14px; padding: 10px 14px; border: 1px solid #ddd; border-radius: 8px; font-family: Arial, sans-serif; }
        .btn-filter { background: #00a896; color: white; border: none; padding: 10px 25px; border-radius: 20px; font-size: 14px; cursor: pointer; }
        .btn-clear { background: white; color: #666; border: 1px solid #ddd; padding: 10px 25px; border-radius: 20px; font-size: 14px; cursor: pointer; text-decoration: none; display: inline-block; }
        .applications-grid { display: grid; gap: 20px; }
        .application-card { background: white; border-radius: 15px; padding: 25px; box-shadow: 0 2px 10px rgba(0,0,0,0.06); transition: transform 0.2s; }
        .application-card:hover { transform: translateY(-2px); box-shadow: 0 4px 15px rgba(0,0,0,0.1); }
        .application-header { display: flex; justify-content: space-between; align-items: start; margin-bottom: 15px; }
        .job-position { font-size: 20px; color: #2d5f5d; margin: 0 0 5px 0; font-weight: 400; }
        .company-name { font-size: 15px; color: #666; margin: 0; }
        .status-badge { padding: 6px 16px; border-radius: 15px; font-size: 13px; font-weight: 500; }
        .status-pending { background: #fff3cd; color: #856404; }
        .status-under_review { background: #d1ecf1; color: #0c5460; }
        .status-shortlisted { background: #d4edda; color: #155724; }
        .status-interview_scheduled { background: #cfe2ff; color: #084298; }
        .status-rejected { background: #f8d7da; color: #721c24; }
        .status-accepted { background: #d4edda; color: #155724; }
        .status-withdrawn { background: #e2e3e5; color: #383d41; }
        .application-meta { display: flex; flex-wrap: wrap; gap: 15px; margin: 15px 0; font-size: 14px; color: #666; }
        .meta-item { display: flex; align-items: center; gap: 5px; }
        .application-actions { display: flex; gap: 10px; margin-top: 15px; padding-top: 15px; border-top: 1px solid #eee; }
        .btn-view { background: #00a896; color: white; border: none; padding: 8px 20px; border-radius: 15px; font-size: 14px; cursor: pointer; text-decoration: none; display: inline-block; }
        .btn-view:hover { background: #008c7a; }
        .empty-state { text-align: center; padding: 60px 20px; background: white; border-radius: 15px; box-shadow: 0 2px 10px rgba(0,0,0,0.06); }
        .empty-icon { font-size: 64px; margin-bottom: 20px; }
        .empty-title { font-size: 22px; color: #2d5f5d; margin: 0 0 10px 0; }
        .empty-text { font-size: 15px; color: #666; margin: 0 0 25px 0; }
        .btn-browse { background: #00a896; color: white; border: none; padding: 12px 30px; border-radius: 20px; font-size: 15px; cursor: pointer; text-decoration: none; display: inline-block; }
        .stats-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(150px, 1fr)); gap: 15px; margin-bottom: 25px; }
        .stat-card { background: white; padding: 20px; border-radius: 12px; box-shadow: 0 2px 10px rgba(0,0,0,0.06); text-align: center; }
        .stat-number { font-size: 28px; color: #00a896; font-weight: 600; margin: 0; }
        .stat-label { font-size: 13px; color: #666; margin: 5px 0 0 0; }
        @media (max-width: 768px) { 
            .application-header { flex-direction: column; gap: 10px; }
            .filter-form { flex-direction: column; }
            .filter-field { width: 100%; }
        }
    </style>

    <div class="applications-container">
        <div class="container">
            <!-- Page Header -->
            <div class="page-header">
                <h1 class="page-title">My Applications</h1>
                <p class="page-subtitle">Track and manage all your job applications in one place</p>
            </div>

            @if(session('success'))
                <div style="background: #d4edda; color: #155724; padding: 15px 20px; border-radius: 10px; margin-bottom: 20px;">
                    ✓ {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div style="background: #f8d7da; color: #721c24; padding: 15px 20px; border-radius: 10px; margin-bottom: 20px;">
                    {{ session('error') }}
                </div>
            @endif

            @if($applications->count() > 0)
                <!-- Statistics -->
                <div class="stats-grid">
                    <div class="stat-card">
                        <p class="stat-number">{{ $applications->count() }}</p>
                        <p class="stat-label">Total Applications</p>
                    </div>
                    <div class="stat-card">
                        <p class="stat-number">{{ $applications->where('application_status', 'pending')->count() }}</p>
                        <p class="stat-label">Pending</p>
                    </div>
                    <div class="stat-card">
                        <p class="stat-number">{{ $applications->where('application_status', 'under_review')->count() }}</p>
                        <p class="stat-label">Under Review</p>
                    </div>
                    <div class="stat-card">
                        <p class="stat-number">{{ $applications->where('application_status', 'interview_scheduled')->count() }}</p>
                        <p class="stat-label">Interviews</p>
                    </div>
                </div>

                <!-- Filter Section -->
                <div class="filter-section">
                    <form method="GET" action="{{ route('user.applications') }}" class="filter-form">
                        <div class="filter-field">
                            <label class="filter-label">Filter by Status</label>
                            <select name="status" class="filter-select">
                                <option value="">All Statuses</option>
                                <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="under_review" {{ request('status') == 'under_review' ? 'selected' : '' }}>Under Review</option>
                                <option value="shortlisted" {{ request('status') == 'shortlisted' ? 'selected' : '' }}>Shortlisted</option>
                                <option value="interview_scheduled" {{ request('status') == 'interview_scheduled' ? 'selected' : '' }}>Interview Scheduled</option>
                                <option value="rejected" {{ request('status') == 'rejected' ? 'selected' : '' }}>Rejected</option>
                                <option value="accepted" {{ request('status') == 'accepted' ? 'selected' : '' }}>Accepted</option>
                                <option value="withdrawn" {{ request('status') == 'withdrawn' ? 'selected' : '' }}>Withdrawn</option>
                            </select>
                        </div>
                        <button type="submit" class="btn-filter">Apply Filter</button>
                        <a href="{{ route('user.applications') }}" class="btn-clear">Clear</a>
                    </form>
                </div>

                <!-- Applications List -->
                <div class="applications-grid">
                    @foreach($applications as $application)
                    <div class="application-card">
                        <div class="application-header">
                            <div>
                                <h2 class="job-position">{{ $application->job->position }}</h2>
                                <p class="company-name">{{ $application->job->company_name }}</p>
                            </div>
                            <span class="status-badge status-{{ $application->application_status }}">
                                {{ ucfirst(str_replace('_', ' ', $application->application_status)) }}
                            </span>
                        </div>

                        <div class="application-meta">
                            <div class="meta-item">
                                <span>📅</span>
                                <span>Applied {{ \Carbon\Carbon::parse($application->applied_at)->diffForHumans() }}</span>
                            </div>
                            <div class="meta-item">
                                <span>📍</span>
                                <span>{{ $application->job->city }}, {{ $application->job->state }}</span>
                            </div>
                            <div class="meta-item">
                                <span>💼</span>
                                <span>{{ $application->job->job_type }}</span>
                            </div>
                        </div>

                        @if($application->interview_date)
                        <div style="background: #e8f4f2; padding: 12px 15px; border-radius: 8px; margin: 15px 0; font-size: 14px;">
                            <strong style="color: #00a896;">🗓️ Interview Scheduled:</strong> 
                            <span style="color: #2d5f5d;">{{ \Carbon\Carbon::parse($application->interview_date)->format('F d, Y g:i A') }}</span>
                        </div>
                        @endif

                        @if($application->admin_notes && $application->application_status != 'pending')
                        <div style="background: #f8f9fa; padding: 12px 15px; border-radius: 8px; margin: 15px 0; font-size: 13px; color: #555;">
                            <strong>💬 Employer Message:</strong> {{ Str::limit($application->admin_notes, 100) }}
                        </div>
                        @endif

                        <div class="application-actions">
                            <a href="{{ route('user.application.details', $application->id) }}" class="btn-view">
                                View Details
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
            @else
                <!-- Empty State -->
                <div class="empty-state">
                    <div class="empty-icon">📋</div>
                    <h2 class="empty-title">No Applications Yet</h2>
                    <p class="empty-text">You haven't applied for any jobs yet. Start browsing available positions and submit your first application!</p>
                    <a href="{{ route('user.jobs') }}" class="btn-browse">Browse Job Opportunities</a>
                </div>
            @endif
        </div>
    </div>

  @endsection