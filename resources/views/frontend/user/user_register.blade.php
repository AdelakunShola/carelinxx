<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - NUVIACARE</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600&display=swap" rel="stylesheet">
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
                    <span class="logo-sub">by @NUVIACARE</span>
                </a>
                <div class="header-right">
                   <a href="tel:{{ $settings->company_phone }}">{{ $settings->company_phone ?? '+234 123 456 7890' }}</a>
                    <a href="{{ route('user.login') }}" class="login-link">Log In</a>
                </div>
            </div>
        </div>
    </header>

    <!-- Sign Up Container -->
    <div class="login-container">
        <div class="login-box">
            <a href="javascript:history.back()" style="color: #999; font-size: 24px; text-decoration: none; display: inline-block; margin-bottom: 20px;">←</a>
            
            <h1>Great!</h1>
            <p style="font-size: 24px; color: #2d5f5d; margin-bottom: 10px; font-weight: 400;">Let's get you set up!</p>
            <p style="font-size: 14px; color: #666; margin-bottom: 30px; font-family: Arial, sans-serif;">Enter your email and a secure password to start your experience.</p>

            @if($errors->any())
                <div style="background: #f8d7da; color: #721c24; padding: 15px 20px; border-radius: 10px; margin-bottom: 20px;">
                    @foreach($errors->all() as $error)
                        <p style="margin: 5px 0; font-size: 14px;">{{ $error }}</p>
                    @endforeach
                </div>
            @endif

            <form class="login-form" method="POST" action="{{ route('user.register.submit') }}">
                @csrf
                
                <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required>
                
                <div style="position: relative;">
                    <input type="password" id="password" name="password" placeholder="Password" required>
                    <span onclick="togglePassword()" style="position: absolute; right: 15px; top: 50%; transform: translateY(-50%); cursor: pointer; color: #999; font-size: 18px;">👁</span>
                </div>

                <div style="position: relative; margin-top: 15px;">
                    <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password" required>
                    <span onclick="togglePasswordConfirm()" style="position: absolute; right: 15px; top: 50%; transform: translateY(-50%); cursor: pointer; color: #999; font-size: 18px;">👁</span>
                </div>

                <div style="background: #e8f4f2; padding: 15px; border-radius: 8px; margin-top: 10px; display: flex; gap: 10px; align-items: flex-start;">
                    <span style="font-size: 20px;">💡</span>
                    <p style="font-size: 13px; color: #2d5f5d; line-height: 1.5; margin: 0; font-family: Arial, sans-serif;">
                        Use 8+ characters with a mix of upper/lowercase, numbers, and symbols. Avoid common words for extra safety!
                    </p>
                </div>

                <button type="submit">Continue</button>

                <p style="text-align: center; margin-top: 20px; font-size: 14px; color: #666;">
                    Already have an account? <a href="{{ route('user.login') }}" style="color: #00a896; text-decoration: none;">Log In</a>
                </p>
            </form>
        </div>
    </div>

    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
            } else {
                passwordInput.type = 'password';
            }
        }

        function togglePasswordConfirm() {
            const passwordInput = document.getElementById('password_confirmation');
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
            } else {
                passwordInput.type = 'password';
            }
        }
    </script>
</body>
</html>