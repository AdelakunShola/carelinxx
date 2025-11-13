     @php
    $settings = App\Models\setting::first();
@endphp

     
     <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f5f5f5;
        }

        footer {
            background: white;
            padding: 40px 20px 20px;
            font-size: 14px;
            color: #333;
        }

        .footer-container {
            max-width: 1200px;
            margin: 0 auto;
        }

        /* Logo and Brand Section */
        .footer-brand {
            text-align: center;
            margin-bottom: 25px;
        }

        .footer-logo img {
            height: 80px;
            width: auto;
            margin-bottom: 10px;
        }

        .footer-brand p {
            font-size: 12px;
            color: #666;
            margin: 5px 0;
        }

        .footer-links-row {
            font-size: 11px;
            color: #007580;
            margin-top: 10px;
        }

        .footer-links-row a {
            color: #007580;
            text-decoration: none;
            margin: 0 2px;
        }

        /* App Store Buttons */
        .app-stores {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin: 25px 0;
        }

        .app-stores img {
            height: 40px;
            width: auto;
        }

        /* About Section */
        .about-section {
            margin: 30px 0;
        }

        .about-section h4 {
            color: #007580;
            font-size: 14px;
            font-weight: 600;
            margin-bottom: 15px;
            text-transform: uppercase;
        }

        .about-section ul {
            list-style: none;
        }

        .about-section ul li {
            margin: 8px 0;
        }

        .about-section ul li a {
            color: #007580;
            text-decoration: none;
            font-size: 12px;
            text-transform: uppercase;
        }

        /* Social Icons */
        .social-icons {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin: 30px 0;
        }

        .social-icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: #007580;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            font-weight: bold;
            font-size: 18px;
        }

        /* Footer Disclaimer */
        .footer-disclaimer {
            font-size: 11px;
            line-height: 1.6;
            color: #666;
            text-align: left;
            margin: 25px 0;
        }

        /* Certifications */
        .certifications {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 20px;
            margin: 20px 0;
            padding-bottom: 20px;
        }

        .cert-badge {
            height: 50px;
            width: auto;
        }

        /* Tablet and Desktop */
        @media (min-width: 768px) {
            footer {
                padding: 50px 40px 30px;
            }

            .footer-container {
                display: grid;
                grid-template-columns: 1fr 1fr 1fr;
                grid-template-rows: auto auto auto;
                gap: 20px;
            }

            /* Brand section - left column, spans 2 rows */
            .footer-brand {
                text-align: left;
                margin-bottom: 0;
                grid-column: 1;
                grid-row: 1 / 3;
            }

            .footer-logo img {
                height: 90px;
            }

            /* About section - middle column, first row */
            .about-section {
                margin: 0;
                grid-column: 2;
                grid-row: 1;
                padding-left: 40px;
            }

            /* Social icons - right column, first row */
            .social-icons {
                justify-content: flex-end;
                margin: 0;
                grid-column: 3;
                grid-row: 1;
                align-self: start;
            }

            /* App stores - left column, below brand */
            .app-stores {
                justify-content: flex-start;
                margin: 20px 0 0 0;
                grid-column: 1;
                grid-row: 3;
            }

            /* Disclaimer - spans all 3 columns, bottom */
            .footer-disclaimer {
                grid-column: 1 / 4;
                grid-row: 4;
                text-align: left;
                padding-right: 200px;
            }

            /* Certifications - right side of disclaimer row */
            .certifications {
                grid-column: 3;
                grid-row: 4;
                justify-content: flex-end;
                margin: 0;
                padding: 0;
                align-self: end;
            }
        }
    </style>


    <footer>
        <div class="footer-container">
            <!-- Brand Section -->
            <div class="footer-brand">
                <div class="footer-logo">
                     <img src="{{ asset('logo.jpg') }}" alt="NUVIACARE - CARE HOME" style="height: 90px; width: auto;">
                </div>
                <p>©2025 NUVIACARE, Inc.</p>
                <div class="footer-links-row">
                    <a href="{{ route('privacy') }}">PRIVACY</a> | 
                    <a href="{{ route('terms') }}">TERMS</a>
                    <p><a href="tel:{{ $settings->company_phone }}">{{ $settings->company_phone ?? '+234 123 456 7890' }}</a></p>
    @if($settings->company_phone_2)
        <p><a href="tel:{{ $settings->company_phone_2 }}">{{ $settings->company_phone_2 }}</a></p>
    @endif

    <p><a href="mailto:{{ $settings->company_email }}">{{ $settings->company_email ?? 'info@nuviacare.com' }}</a></p>
    @if($settings->support_email)
        <p><a href="mailto:{{ $settings->support_email }}">{{ $settings->support_email }}</a></p>
    @endif


    <p>{{ $settings->company_address ?? '123 Healthcare Avenue, Lagos, Nigeria' }}</p>
                </div>
            </div>

            <!-- App Store Buttons -->
            <div class="app-stores">
                <img src="{{ asset('122.webp') }}" alt="Download on App Store">
                <img src="https://upload.wikimedia.org/wikipedia/commons/7/78/Google_Play_Store_badge_EN.svg" alt="Get it on Google Play">
            </div>

            <!-- About Section -->
            <div class="about-section">
                <h4>About</h4>
                <ul>
                    <li><a href="{{ route('about') }}">ABOUT</a></li>
                    <li><a href="{{ route('contact') }}">HELP/CONTACT/US</a></li>
                    <li><a href="{{ route('privacy') }}">PRIVACY POLICY</a></li>
                    <li><a href="{{ route('terms') }}">TERMS</a></li>
                </ul>
            </div>

            <!-- Social Icons -->
            <div class="social-icons">
                <a href="#" class="social-icon">in</a>
                
                        <a href="#" class="social-icon">X</a>
                        <a href="#" class="social-icon">f</a>
                        <a href="#" class="social-icon">i</a>
            </div>

            <!-- Disclaimer -->
            <div class="footer-disclaimer">
               {{ $settings->footer_text }}
            </div>

            <!-- Certifications -->
            <div class="certifications">
               <img src="{{ asset('01.jpg') }}" alt="HITRUST" class="cert-badge">
            </div>
        </div>
    </footer>
