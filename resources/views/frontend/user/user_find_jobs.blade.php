<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Find Jobs - CareLinx</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <style>
        .jobs-container { background: #f5f5f5; min-height: 100vh; padding: 30px 0; }
        .page-header { background: white; border-radius: 15px; padding: 30px; box-shadow: 0 2px 10px rgba(0,0,0,0.06); margin-bottom: 25px; }
        .page-title { font-size: 28px; color: #2d5f5d; margin: 0 0 10px 0; }
        .page-subtitle { font-size: 15px; color: #666; margin: 0; }
        .filter-section { background: white; border-radius: 15px; padding: 25px; box-shadow: 0 2px 10px rgba(0,0,0,0.06); margin-bottom: 25px; }
        .filter-title { font-size: 18px; color: #2d5f5d; margin: 0 0 20px 0; font-weight: 400; }
        .filter-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 15px; margin-bottom: 15px; }
        .filter-field { display: flex; flex-direction: column; }
        .filter-label { font-size: 13px; color: #666; margin-bottom: 5px; font-family: Arial, sans-serif; }
        .filter-input, .filter-select { font-size: 14px; padding: 10px 14px; border: 1px solid #ddd; border-radius: 8px; font-family: Arial, sans-serif; }
        .filter-input:focus, .filter-select:focus { outline: none; border-color: #00a896; }
        .filter-actions { display: flex; gap: 10px; justify-content: flex-end; margin-top: 20px; }
        .btn-search { background: #00a896; color: white; border: none; padding: 10px 30px; border-radius: 20px; font-size: 14px; cursor: pointer; }
        .btn-search:hover { background: #008c7a; }
        .btn-reset { background: white; color: #666; border: 1px solid #ddd; padding: 10px 30px; border-radius: 20px; font-size: 14px; cursor: pointer; text-decoration: none; display: inline-block; }
        .results-header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px; }
        .results-count { font-size: 15px; color: #666; }
        .jobs-grid { display: grid; gap: 20px; }
        .job-card { background: white; border-radius: 15px; padding: 25px; box-shadow: 0 2px 10px rgba(0,0,0,0.06); transition: transform 0.2s; cursor: pointer; }
        .job-card:hover { transform: translateY(-2px); box-shadow: 0 4px 15px rgba(0,0,0,0.1); }
        .job-header { display: flex; justify-content: space-between; align-items: start; margin-bottom: 15px; }
        .job-title { font-size: 20px; color: #2d5f5d; margin: 0 0 5px 0; font-weight: 400; }
        .company-name { font-size: 15px; color: #666; margin: 0; }
        .salary-badge { padding: 6px 16px; border-radius: 15px; font-size: 13px; font-weight: 500; background: #e8f4f2; color: #00a896; }
        .job-meta { display: flex; flex-wrap: wrap; gap: 15px; margin: 15px 0; font-size: 14px; color: #666; }
        .meta-item { display: flex; align-items: center; gap: 5px; }
        .job-description { font-size: 14px; color: #555; line-height: 1.6; margin: 15px 0; }
        .job-tags { display: flex; flex-wrap: wrap; gap: 8px; margin: 15px 0; }
        .tag { padding: 5px 12px; background: #f8f9fa; color: #666; border-radius: 12px; font-size: 12px; }
        .job-actions { display: flex; gap: 10px; margin-top: 15px; padding-top: 15px; border-top: 1px solid #eee; }
        .btn-view-job { background: #00a896; color: white; border: none; padding: 8px 20px; border-radius: 15px; font-size: 14px; cursor: pointer; text-decoration: none; display: inline-block; }
        .btn-view-job:hover { background: #008c7a; }
        .btn-apply { background: white; color: #00a896; border: 1px solid #00a896; padding: 8px 20px; border-radius: 15px; font-size: 14px; cursor: pointer; text-decoration: none; display: inline-block; }
        .btn-apply:hover { background: #e8f4f2; }
        .already-applied { padding: 8px 20px; background: #e8f4f2; color: #00a896; border-radius: 15px; font-size: 13px; font-weight: 500; }
        .pagination { display: flex; justify-content: center; gap: 5px; margin-top: 30px; }
        .pagination a, .pagination span { padding: 8px 15px; background: white; border: 1px solid #ddd; border-radius: 8px; color: #666; text-decoration: none; font-size: 14px; }
        .pagination .active { background: #00a896; color: white; border-color: #00a896; }
        .pagination a:hover { background: #e8f4f2; border-color: #00a896; }
        .empty-state { text-align: center; padding: 60px 20px; background: white; border-radius: 15px; box-shadow: 0 2px 10px rgba(0,0,0,0.06); }
        .empty-icon { font-size: 64px; margin-bottom: 20px; }
        .empty-title { font-size: 22px; color: #2d5f5d; margin: 0 0 10px 0; }
        .empty-text { font-size: 15px; color: #666; margin: 0; }
        @media (max-width: 968px) { 
            .filter-grid { grid-template-columns: 1fr; }
            .job-header { flex-direction: column; gap: 10px; }
        }
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
                    <a href="{{ route('user.jobs') }}" style="color: #00a896;">Find Jobs</a>
                    <a href="{{ route('user.applications') }}">My Applications</a>
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

    <div class="jobs-container">
        <div class="container">
            <!-- Page Header -->
            <div class="page-header">
                <h1 class="page-title">Find Your Next Opportunity</h1>
                <p class="page-subtitle">Browse through available positions and apply for jobs that match your skills and interests</p>
            </div>

            <!-- Filter Section -->
            <div class="filter-section">
                <h2 class="filter-title">🔍 Search & Filter Jobs</h2>
                <form method="GET" action="{{ route('user.jobs') }}">
                    <div class="filter-grid">
                        <!-- Keywords -->
                        <div class="filter-field">
                            <label class="filter-label">Keywords</label>
                            <input type="text" name="keywords" class="filter-input" placeholder="Job title, company, description..." value="{{ request('keywords') }}">
                        </div>

                        <!-- Job Category -->
                        <div class="filter-field">
                            <label class="filter-label">Job Category</label>
                            <select name="job_category" class="filter-select">
                                <option value="">All Categories</option>
                                <option value="Healthcare" {{ request('job_category') == 'Healthcare' ? 'selected' : '' }}>Healthcare</option>
                                <option value="Nursing" {{ request('job_category') == 'Nursing' ? 'selected' : '' }}>Nursing</option>
                                <option value="Medical" {{ request('job_category') == 'Medical' ? 'selected' : '' }}>Medical</option>
                                <option value="Care" {{ request('job_category') == 'Care' ? 'selected' : '' }}>Care</option>
                                <option value="Support" {{ request('job_category') == 'Support' ? 'selected' : '' }}>Support</option>
                            </select>
                        </div>

                        <!-- Job Type -->
                        <div class="filter-field">
                            <label class="filter-label">Job Type</label>
                            <select name="job_type" class="filter-select">
                                <option value="">All Types</option>
                                <option value="Full-time" {{ request('job_type') == 'Full-time' ? 'selected' : '' }}>Full-time</option>
                                <option value="Part-time" {{ request('job_type') == 'Part-time' ? 'selected' : '' }}>Part-time</option>
                                <option value="Contract" {{ request('job_type') == 'Contract' ? 'selected' : '' }}>Contract</option>
                                <option value="Temporary" {{ request('job_type') == 'Temporary' ? 'selected' : '' }}>Temporary</option>
                            </select>
                        </div>

                        <!-- Experience -->
                        <div class="filter-field">
                            <label class="filter-label">Experience Level</label>
                            <select name="experience" class="filter-select">
                                <option value="">All Levels</option>
                                <option value="Entry Level" {{ request('experience') == 'Entry Level' ? 'selected' : '' }}>Entry Level</option>
                                <option value="Mid Level" {{ request('experience') == 'Mid Level' ? 'selected' : '' }}>Mid Level</option>
                                <option value="Senior Level" {{ request('experience') == 'Senior Level' ? 'selected' : '' }}>Senior Level</option>
                                <option value="Expert" {{ request('experience') == 'Expert' ? 'selected' : '' }}>Expert</option>
                            </select>
                        </div>

                        <!-- City -->
                        <div class="filter-field">
                            <label class="filter-label">City</label>
                            <input type="text" name="city" class="filter-input" placeholder="City name..." value="{{ request('city') }}">
                        </div>

                        <!-- State -->
                        <div class="filter-field">
                            <label class="filter-label">State</label>
                            <input type="text" name="state" class="filter-input" placeholder="State name..." value="{{ request('state') }}">
                        </div>

                        <!-- Gender -->
                        <div class="filter-field">
                            <label class="filter-label">Gender Preference</label>
                            <select name="gender" class="filter-select">
                                <option value="">Any</option>
                                <option value="Male" {{ request('gender') == 'Male' ? 'selected' : '' }}>Male</option>
                                <option value="Female" {{ request('gender') == 'Female' ? 'selected' : '' }}>Female</option>
                                <option value="Any" {{ request('gender') == 'Any' ? 'selected' : '' }}>Any</option>
                            </select>
                        </div>

                        <!-- Salary Range -->
                        <div class="filter-field">
                            <label class="filter-label">Salary Range</label>
                            <select name="salary_range" class="filter-select">
                                <option value="">All Ranges</option>
                                <option value="0-30000" {{ request('salary_range') == '0-30000' ? 'selected' : '' }}>$0 - $30,000</option>
                                <option value="30000-50000" {{ request('salary_range') == '30000-50000' ? 'selected' : '' }}>$30,000 - $50,000</option>
                                <option value="50000-70000" {{ request('salary_range') == '50000-70000' ? 'selected' : '' }}>$50,000 - $70,000</option>
                                <option value="70000+" {{ request('salary_range') == '70000+' ? 'selected' : '' }}>$70,000+</option>
                            </select>
                        </div>
                    </div>

                    <div class="filter-actions">
                        <a href="{{ route('user.jobs') }}" class="btn-reset">Clear Filters</a>
                        <button type="submit" class="btn-search">Search Jobs</button>
                    </div>
                </form>
            </div>

            <!-- Results Header -->
            @if($jobs->count() > 0)
            <div class="results-header">
                <p class="results-count">Showing {{ $jobs->firstItem() }} - {{ $jobs->lastItem() }} of {{ $jobs->total() }} jobs</p>
            </div>

            <!-- Jobs Grid -->
            <div class="jobs-grid">
                @foreach($jobs as $job)
                @php
                    $hasApplied = $job->applications->where('user_id', Auth::id())->first();
                @endphp
                <div class="job-card" onclick="window.location='{{ route('user.job.details', $job->id) }}'">
                    <div class="job-header">
                        <div>
                            <h2 class="job-title">{{ $job->position }}</h2>
                            <p class="company-name">{{ $job->company_name }}</p>
                        </div>
                        @if($job->salary_from)
                        <span class="salary-badge">${{ number_format($job->salary_from, 0) }} - ${{ number_format($job->salary_to, 0) }}</span>
                        @endif
                    </div>

                    <div class="job-meta">
                        <div class="meta-item">
                            <span>📍</span>
                            <span>{{ $job->city }}, {{ $job->state }}</span>
                        </div>
                        <div class="meta-item">
                            <span>💼</span>
                            <span>{{ $job->job_type }}</span>
                        </div>
                        <div class="meta-item">
                            <span>📊</span>
                            <span>{{ $job->experience }}</span>
                        </div>
                        <div class="meta-item">
                            <span>📅</span>
                            <span>Posted {{ \Carbon\Carbon::parse($job->posted_date)->diffForHumans() }}</span>
                        </div>
                    </div>

                    <div class="job-description">
                        {{ Str::limit($job->description, 150) }}
                    </div>

                    <div class="job-tags">
                        <span class="tag">{{ $job->job_category }}</span>
                        <span class="tag">{{ $job->education_level }}</span>
                        @if($job->no_of_vacancy > 1)
                        <span class="tag">{{ $job->no_of_vacancy }} Positions</span>
                        @endif
                    </div>

                    <div class="job-actions" onclick="event.stopPropagation()">
                        <a href="{{ route('user.job.details', $job->id) }}" class="btn-view-job">View Details</a>
                        @if($hasApplied)
                            <span class="already-applied">✓ Applied</span>
                        @else
                            <a href="{{ route('user.job.apply', $job->id) }}" class="btn-apply">Apply Now</a>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="pagination">
                {{ $jobs->links() }}
            </div>

            @else
            <!-- Empty State -->
            <div class="empty-state">
                <div class="empty-icon">🔍</div>
                <h2 class="empty-title">No Jobs Found</h2>
                <p class="empty-text">We couldn't find any jobs matching your criteria. Try adjusting your filters or search terms.</p>
            </div>
            @endif
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