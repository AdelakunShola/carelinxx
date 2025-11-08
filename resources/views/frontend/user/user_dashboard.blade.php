<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Dashboard - CareLinx</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <style>
        /* Include all the dashboard styles from your original file */
        .dashboard-container { background: #f5f5f5; min-height: 100vh; padding-bottom: 50px; }
        .welcome-banner { background: linear-gradient(135deg, #00a896 0%, #008c7a 100%); color: white; padding: 40px 0; margin-bottom: 30px; }
        .welcome-content { display: flex; justify-content: space-between; align-items: center; }
        .welcome-text h1 { font-size: 36px; margin-bottom: 10px; font-weight: 400; }
        .profile-completion { background: white; padding: 20px 30px; border-radius: 10px; min-width: 280px; }
        .progress-bar { background: #e0e0e0; height: 8px; border-radius: 10px; overflow: hidden; margin-bottom: 10px; }
        .progress-fill { background: #00a896; height: 100%; border-radius: 10px; }
        /* Add other styles as needed */
    </style>
</head>
<body>
    <!-- Header -->
    <header>
        <div class="container">
            <div class="header-content">
                <a href="{{ route('home') }}" class="logo">
                    CareLinx
                    <span class="logo-sub">by Sharecare</span>
                </a>
                <nav>
                    <nav>
    <a href="{{ route('user.dashboard') }}">Dashboard</a>
    <a href="{{ route('user.jobs') }}">Find Jobs</a>
    <a href="{{ route('user.applications') }}">My Applications</a>
    <a href="{{ route('user.profile') }}">Profile</a>
</nav>
                </nav>
                <div class="header-right">
                    <a href="#" style="margin-right: 15px;">🔔</a>
                    <div class="user-menu">
                        <div class="user-avatar">{{ $user->initials }}</div>
                    </div>
                    <form method="POST" action="{{ route('user.logout') }}" style="display: inline;">
                        @csrf
                        <button type="submit" style="background: none; border: none; color: #666; cursor: pointer; margin-left: 15px; font-family: Arial, sans-serif;">
                            Logout
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </header>

    <div class="dashboard-container">
        <!-- Welcome Banner -->
        <section class="welcome-banner">
            <div class="container">
                <div class="welcome-content">
                    <div class="welcome-text">
                        <h1>Welcome back, {{ $user->first_name ?? $user->email }}! 👋</h1>
                        <p>Ready to make a difference today? Check out new job opportunities below.</p>
                    </div>
                    <div class="profile-completion">
                        <h3>Complete Your Profile</h3>
                        <div class="progress-bar">
                            <div class="progress-fill" style="width: {{ $user->profile_completion }}%;"></div>
                        </div>
                        <p class="progress-text">{{ $user->profile_completion }}% complete - 
                            @if($user->profile_completion < 50)
                                Add basic information
                            @elseif($user->profile_completion < 75)
                                Add certifications to boost visibility
                            @else
                                Almost there! Complete all sections
                            @endif
                        </p>
                        <a href="{{ route('user.profile') }}" style="display: inline-block; margin-top: 15px; background: #00a896; color: white; padding: 10px 20px; border-radius: 20px; text-decoration: none; font-size: 14px; font-family: Arial, sans-serif;">
                            Complete Profile
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <div class="container">
            @if(session('success'))
                <div style="background: #d4edda; color: #155724; padding: 15px 20px; border-radius: 10px; margin-bottom: 20px; font-size: 15px; font-family: Arial, sans-serif;">
                    ✓ {{ session('success') }}
                </div>
            @endif

            <!-- Rest of your dashboard content here -->
            <div style="background: white; border-radius: 15px; padding: 40px; margin-bottom: 30px;">
                <h2 style="color: #2d5f5d; margin-bottom: 20px;">Quick Stats</h2>
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 20px;">
                    <div style="background: #f8f8f8; padding: 30px; border-radius: 10px; text-align: center;">
                        <div style="font-size: 36px; color: #00a896; font-weight: 600; margin-bottom: 5px;">{{ $user->profile_completion }}%</div>
                        <div style="font-size: 13px; color: #666; font-family: Arial, sans-serif;">Profile Complete</div>
                    </div>
                    <div style="background: #f8f8f8; padding: 30px; border-radius: 10px; text-align: center;">
                        <div style="font-size: 36px; color: #00a896; font-weight: 600; margin-bottom: 5px;">0</div>
                        <div style="font-size: 13px; color: #666; font-family: Arial, sans-serif;">Applications</div>
                    </div>
                    <div style="background: #f8f8f8; padding: 30px; border-radius: 10px; text-align: center;">
                        <div style="font-size: 36px; color: #00a896; font-weight: 600; margin-bottom: 5px;">0</div>
                        <div style="font-size: 13px; color: #666; font-family: Arial, sans-serif;">Saved Jobs</div>
                    </div>
                </div>
            </div>

            <div style="background: white; border-radius: 15px; padding: 40px;">
                <h2 style="color: #2d5f5d; margin-bottom: 20px;">Your Profile</h2>
                <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 20px; font-family: Arial, sans-serif; font-size: 14px;">
                    <div>
                        <strong style="color: #666;">Email:</strong>
                        <p style="margin: 5px 0;">{{ $user->email }}</p>
                    </div>
                    <div>
                        <strong style="color: #666;">Full Name:</strong>
                        <p style="margin: 5px 0;">{{ $user->full_name ?: 'Not provided' }}</p>
                    </div>
                    <div>
                        <strong style="color: #666;">Phone:</strong>
                        <p style="margin: 5px 0;">{{ $user->phone_primary ?: 'Not provided' }}</p>
                    </div>
                    <div>
                        <strong style="color: #666;">Location:</strong>
                        <p style="margin: 5px 0;">{{ $user->city }}, {{ $user->country ?: 'Not provided' }}</p>
                    </div>
                </div>
                <a href="{{ route('user.profile') }}" style="display: inline-block; margin-top: 25px; background: #00a896; color: white; padding: 12px 30px; border-radius: 20px; text-decoration: none; font-size: 15px; font-family: Arial, sans-serif;">
                    Edit Profile
                </a>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer style="margin-top: 50px;">
        <div class="container">
            <div class="footer-content">
                <div>
                    <div class="footer-logo">
                        CareLinx
                        <span class="logo-sub">by Sharecare</span>
                    </div>
                    <p class="footer-text">©2024 Sharecare, Inc.</p>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>