<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in to NUVIACARE</title>
    <link rel="stylesheet" href="{{ asset('style.css') }}">
</head>
<body>

         @php
    $settings = App\Models\setting::first();
@endphp

    <!-- Header -->
    <header>
        <div class="container">
            <div class="header-content">
                <a href="{{ route('home') }}" class="logo">
                    NUVIACARE
                    <span class="logo-sub">CARE HOME</span>
                </a>
                <nav>
                    <a href="{{ route('find.a.caregiver') }}">Find a caregiver</a>
                    <a href="{{ route('become.a.caregiver') }}">Become a caregiver</a>
                </nav>
                <div class="header-right">
                   <a href="tel:{{ $settings->company_phone }}">{{ $settings->company_phone ?? '+234 123 456 7890' }}</a>
                    <a href="{{ route('user.register') }}" class="login-link">Sign Up</a>
                </div>
            </div>
        </div>
    </header>

    <!-- Login Container -->
    <div class="login-container">
        <div class="login-box">
            <h1>Log in to NUVIACARE</h1>

            <!-- Success Message -->
            @if(session('success'))
                <div style="background: #d4edda; color: #155724; padding: 12px 16px; border-radius: 8px; margin-bottom: 20px; font-size: 14px; font-family: Arial, sans-serif;">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Error Messages -->
            @if($errors->any())
                <div style="background: #f8d7da; color: #721c24; padding: 12px 16px; border-radius: 8px; margin-bottom: 20px; font-size: 14px; font-family: Arial, sans-serif;">
                    @foreach($errors->all() as $error)
                        <p style="margin: 0;">{{ $error }}</p>
                    @endforeach
                </div>
            @endif

            <form class="login-form" method="POST" action="{{ route('user.login.submit') }}">
                @csrf
                
                <input 
                    type="email" 
                    name="email" 
                    placeholder="Enter your email" 
                    value="{{ old('email') }}"
                    required
                    autofocus
                >

                <div style="position: relative; margin-top: 15px;">
                    <input 
                        type="password" 
                        id="password" 
                        name="password"
                        placeholder="Password" 
                        required
                    >
                    <span 
                        onclick="togglePassword()" 
                        style="position: absolute; right: 15px; top: 50%; transform: translateY(-50%); cursor: pointer; color: #999; font-size: 18px;"
                    >
                        👁
                    </span>
                </div>

                <!-- Remember Me -->
                <div style="display: flex; align-items: center; margin-top: 15px;">
                    <input 
                        type="checkbox" 
                        id="remember" 
                        name="remember" 
                        style="width: auto; margin-right: 8px;"
                    >
                    <label for="remember" style="font-size: 14px; color: #666; font-family: Arial, sans-serif; margin: 0;">
                        Remember me
                    </label>
                </div>

                <button type="submit">Continue →</button>
            </form>

            <p class="signup-link">
                Don't have an account? 
                <a href="{{ route('user.register') }}">Sign up</a>
            </p>
        </div>
    </div>

    <!-- Login Footer -->
    <footer class="login-footer">
        <div class="container">
            <div class="login-footer-content">
                <div class="contact-info">
                    <h3>Contact</h3>
                    <p>Toll-free: <a href="tel:{{ $settings->company_phone }}">{{ $settings->company_phone ?? '+234 123 456 7890' }}</a></p>
                    <p>Monday - Friday: 8am to 11pm EST</p>
                    <p>Saturday & Sunday: 8am to 8pm EST</p>
                    <p>E-mail: <a href="mailto:{{ $settings->company_email }}">{{ $settings->company_email ?? 'info@nuviacare.com' }}</a></p>
                </div>
                <div class="follow-section">
                    <h3>Follow us</h3>
                    <div class="social-icons">
                        <a href="#" class="social-icon">in</a>
                        <a href="#" class="social-icon">f</a>
                        <a href="#" class="social-icon">in</a>
                        <a href="#" class="social-icon">x</a>
                    </div>
                </div>
                <div class="download-section-footer">
                    <h3>Download our app</h3>
                    <div style="display: flex; gap: 10px; margin-top: 10px;">
                        <img src="{{ asset('122.webp') }}" alt="App Store" style="height: 40px;">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/7/78/Google_Play_Store_badge_EN.svg" alt="Google Play" style="height: 40px;">
                    </div>
                </div>
            </div>

            <div class="login-footer-links">
                <a href="#">About</a>
                <a href="#">Blog</a>
                <a href="#">Newsroom</a>
                <a href="#">Help</a>
                <a href="#">Terms</a>
                <a href="#">Privacy</a>
            </div>

            <div style="text-align: center; margin-top: 30px;">
                <div class="certifications" style="justify-content: center;">
                        <img src="{{ asset('01.jpg') }}" alt="HITRUST" class="cert-badge">
                </div>
            </div>

            <div class="footer-bottom" style="margin-top: 30px;">
                <p class="footer-bottom-text" style="text-align: center; max-width: 100%;">
                    © 2025 NUVIACARE Inc.<br><br>
                    NUVIACARE does not employ or recommend any care provider or care seeker nor is it responsible for the conduct of any care provider or care seeker.
                </p>
            </div>
        </div>
    </footer>

    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
            } else {
                passwordInput.type = 'password';
            }
        }
    </script>
</body>
</html>