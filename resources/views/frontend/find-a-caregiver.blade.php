<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CareLinx - Personalized In-Home Care</title>
    <link rel="stylesheet" href="{{ asset('style.css') }}">
</head>
<body>
    <!-- Header -->
    <header>
        <div class="container">
            <div class="header-content">
                <a href="index.html" class="logo">
                    CareLinx
                    <span class="logo-sub">by Sharecare</span>
                </a>
                <nav>
                    <a href="login.html">Log in</a>
                    <a href="#">Find a caregiver</a>
                    <a href="#">Become a care provider</a>
                    <div class="dropdown">
                        <span class="dropdown-toggle">Solutions</span>
                        <div class="dropdown-menu">
                            <a href="#">Health Plans</a>
                            <a href="#">Health Systems</a>
                            <a href="#">Professional Staffing</a>
                        </div>
                    </div>
                </nav>
                <div class="header-right">
                    <a href="login.html" class="login-link">Log in</a>
                </div>
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <div class="hero-content">
                <div class="hero-image">
                    <img src="https://images.unsplash.com/photo-1576765608535-5f04d1e3f289?w=600&h=380&fit=crop" alt="Caregiver with senior">
                </div>
                <div class="hero-text">
                    <h1>Personalized in-home care with professional caregivers</h1>
                    <p>High-quality, affordable in-home care to age in place and support independence. Get peace of mind by finding the right caregiver.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Find Caregiver Section -->
    <section class="find-caregiver-section">
        <div class="container">
            <div class="find-caregiver">
                <h2>Find a caregiver</h2>
                <p>Create a free account to browse caregivers you can count on</p>
                <form class="form-row">
                    <div class="form-group">
                        <label class="form-label">
                            <span class="step-number">1</span>
                            Who needs care?
                        </label>
                        <select>
                            <option>Select</option>
                            <option>Myself</option>
                            <option>Parent</option>
                            <option>Spouse</option>
                            <option>Other</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">
                            <span class="step-number">2</span>
                            Where do you need care?
                        </label>
                        <input type="text" placeholder="ZIP code">
                    </div>
                    <button type="submit" class="btn-primary">Get Started</button>
                </form>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section class="services-section">
        <div class="container">
            <div class="section-header">
                <h2>Our services</h2>
            </div>
            <div class="services-content">
                <div class="services-text">
                    <p>CareLinx can help with daily living activities for seniors to age in place, manage ongoing health challenges, and provide respite for anyone who needs a little help – our caregivers offer a wide range of services and skills to meet your needs.</p>
                    <p>Offering unprecedented choice in quality caregivers, modern technology solutions, and inexpensive customer service make our home care highly possible. Find a caregiver you can trust, get started here.</p>
                    <a href="#" class="btn-secondary">Find a Caregiver</a>
                </div>
                <div class="services-image">
                    <img src="https://images.unsplash.com/photo-1521791136064-7986c2920216?w=600&h=350&fit=crop" alt="Caregiver helping senior">
                </div>
            </div>
        </div>
    </section>

    <!-- Care for Everyday Needs Section -->
    <section class="care-needs-section">
        <div class="container">
            <div class="section-header">
                <h2>Care for everyday needs</h2>
                <p>CareLinx has a unique solution set tailored to help reach your goals and deliver positive outcomes.</p>
            </div>
            <div class="care-cards">
                <div class="care-card">
                    <div class="care-card-header">
                        <div class="card-icon">
                            <svg viewBox="0 0 24 24" fill="none">
                                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"/>
                                <circle cx="12" cy="7" r="4" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div>
                        <h3>Companion and home helper</h3>
                    </div>
                    <ul>
                        <li>Companionship</li>
                        <li>Meal prep</li>
                        <li>Shopping</li>
                        <li>Transportation</li>
                        <li>Laundry</li>
                        <li>Light housekeeping</li>
                    </ul>
                </div>
                <div class="care-card">
                    <div class="care-card-header">
                        <div class="card-icon">
                            <svg viewBox="0 0 24 24" fill="none">
                                <path d="M22 12h-4l-3 9L9 3l-3 9H2" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div>
                        <h3>Personal care and professional caregiver</h3>
                    </div>
                    <ul>
                        <li>Bathing</li>
                        <li>Dressing and grooming</li>
                        <li>Medication reminders</li>
                        <li>Toileting</li>
                        <li>Mobility</li>
                        <li>Respite</li>
                    </ul>
                </div>
            </div>
            <div class="connector-circle"></div>
        </div>
    </section>

    <!-- Afford Section -->
    <section class="afford-section">
        <div class="container">
            <div class="afford-content">
                <div class="afford-image">
                    <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?w=600&h=380&fit=crop" alt="Family using tablet">
                </div>
                <div class="afford-text">
                    <h2>Care you can afford</h2>
                    <p>By using our online technology and hiring your senior caregiver directly, you avoid the caregiver agency mark-ups and save up to 50% on the cost of home care. When you pay less and caregivers are paid more, everyone is happier.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Download Section -->
    <section class="download-section">
        <div class="container">
            <div class="download-content">
                <div class="download-text">
                    <h2>Download CareLinx</h2>
                    <p>Connect with your caregiver anywhere, anytime.</p>
                </div>
                <div class="ratings">
                    <div class="rating-card">
                        <div class="rating-score">4.7 <span class="rating-out">out of 5</span></div>
                        <div class="stars">★★★★★</div>
                        <div class="rating-count">1.5K Ratings</div>
                        <div class="app-badge">
                            <img src="https://developer.apple.com/app-store/marketing/guidelines/images/badge-example-preferred.png" alt="App Store">
                        </div>
                    </div>
                    <div class="rating-card">
                        <div class="rating-score">4.7 <span class="rating-out">out of 5</span></div>
                        <div class="stars">★★★★★</div>
                        <div class="rating-count">563 Ratings</div>
                        <div class="app-badge">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/7/78/Google_Play_Store_badge_EN.svg" alt="Google Play">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="footer-content">
                <div>
                    <div class="footer-logo">
                        CareLinx
                        <span class="logo-sub">by Sharecare</span>
                    </div>
                    <p class="footer-text">©2024 Sharecare, Inc.</p>
                    <p class="footer-text">CAREER | WHY PROFESSIONALS | PRIVACY | TERMS</p>
                </div>
                <div class="footer-links">
                    <h4>About</h4>
                    <ul>
                        <li><a href="#">ABOUT</a></li>
                        <li><a href="#">BLOG</a></li>
                        <li><a href="#">NEWSROOM</a></li>
                        <li><a href="#">HELP</a></li>
                        <li><a href="#">PRESS</a></li>
                    </ul>
                </div>
                <div>
                    <div class="social-icons">
                        <a href="#" class="social-icon">in</a>
                        <a href="#" class="social-icon">X</a>
                        <a href="#" class="social-icon">f</a>
                        <a href="#" class="social-icon">i</a>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <p class="footer-bottom-text">
                    CareLinx does not employ or recommend any care provider or care seeker nor is it responsible for the conduct of any care provider or care seeker. The CareLinx website is a venue that provides tools to help care seekers and care providers connect online. Each individual is solely responsible for selecting a care provider or care seeker for themselves or their families and for complying with all laws in connection with any employment relationship they establish.
                </p>
                <div class="certifications">
                    <img src="https://via.placeholder.com/60x40?text=HITRUST" alt="HITRUST" class="cert-badge">
                    <img src="https://via.placeholder.com/60x40?text=SOC2" alt="SOC 2" class="cert-badge">
                    <img src="https://via.placeholder.com/60x40?text=HIPAA" alt="HIPAA" class="cert-badge">
                </div>
            </div>
        </div>
    </footer>

    <!-- Accessibility Button -->
    <button class="accessibility-btn" aria-label="Accessibility options">♿</button>
</body>
</html>