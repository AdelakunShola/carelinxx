@extends('user.user_dashboard')
@section('user') 

<section class="hero">
        <div class="container">
            <div class="hero-content">
                <div class="hero-text">
                    <h1>NUVIACARE</h1>
                    <p>Giving care to you and your loved ones.</p>
                </div>
                <div class="hero-image">
                    <img src="https://images.unsplash.com/photo-1488521787991-ed7bbaae773c?w=600&h=380&fit=crop" alt="Senior woman outdoors">
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

    <!-- Trusted Solutions Section -->
    <section class="services-section">
        <div class="container">
            <div class="services-content">
                <div class="services-image">
                    <img src="https://images.unsplash.com/photo-1516733725897-1aa73b87c8e8?w=600&h=350&fit=crop" alt="Caregiver with senior woman">
                </div>
                <div class="services-text">
                    <h2 style="font-size: 36px; color: #2d5f5d; margin-bottom: 20px; font-weight: 400;">Trusted in-home care solutions</h2>
                    <p>When you need or a loved one needs in-home care, you can rely on us. As caregivers, we help families connect with quality care professionals for both non-medical and clinical support. Needs and slice work with health plans, healthcare providers and community organizations to provide high-quality in-home care.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Care for Everyday Needs Section -->
    <section class="care-needs-section">
        <div class="container">
            <div class="section-header">
                <h2>Care for everyday needs</h2>
                <p>NUVIACARE has a unique solution set tailored to help reach your goals and deliver positive outcomes.</p>
            </div>
            <div class="care-cards">
                <div class="care-card">
                    <div class="care-card-header">
                        <div class="card-icon">
                            <svg viewBox="0 0 24 24" fill="none">
                                <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"/>
                                <circle cx="9" cy="7" r="4" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M23 21v-2a4 4 0 0 0-3-3.87" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M16 3.13a4 4 0 0 1 0 7.75" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"/>
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
                <div class="care-card">
                    <div class="care-card-header">
                        <div class="card-icon">
                            <svg viewBox="0 0 24 24" fill="none">
                                <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"/>
                                <polyline points="14 2 14 8 20 8" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"/>
                                <line x1="12" y1="18" x2="12" y2="12" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"/>
                                <line x1="9" y1="15" x2="15" y2="15" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div>
                        <h3>Clinical support</h3>
                    </div>
                    <ul>
                        <li>Diagnostic datum</li>
                        <li>Telehealth</li>
                        <li>Health coaching</li>
                        <li>Care gap closure</li>
                        <li>CCM (Cholesterol)</li>
                    </ul>
                </div>
            </div>
            <div class="connector-circle"></div>
        </div>
    </section>

    <!-- Solution Mix Section -->
    <section class="services-section" style="background: white; padding: 70px 0;">
        <div class="container">
            <div class="section-header" style="text-align: center; margin-bottom: 40px;">
                <h2>The right solution mix for your needs</h2>
                <p>NUVIACARE has a unique solution set tailored to help reach your goals and deliver positive outcomes.</p>
            </div>
            <div class="solution-tabs">
                <button class="tab-btn active">Health plans</button>
                <button class="tab-btn">Health systems</button>
                <button class="tab-btn">Professional staffing</button>
            </div>
            <div class="solution-cards">
                <div class="solution-card">
                    <img src="https://images.unsplash.com/photo-1576765608535-5f04d1e3f289?w=400&h=250&fit=crop" alt="Safety and security">
                    <div class="solution-card-content">
                        <h3>Safety, security, and peace of mind</h3>
                        <p>Safety and trust drive customer satisfaction and unprecedented access with real-time updates and reliability can never be compromised. Our background checks, secure virtual spaces and dedicated training programs provide.</p>
                    </div>
                </div>
                <div class="solution-card">
                    <img src="https://images.unsplash.com/photo-1581594693702-fbdc51b2763b?w=400&h=250&fit=crop" alt="Veterans">
                    <div class="solution-card-content">
                        <h3>Veterans</h3>
                        <p>We partner with top Veterans Initiatives and military families. NUVIACARE offers programs to veterans in partnership with Veteran Affairs healthcare centers, government assistance opportunities and support.</p>
                    </div>
                </div>
                <div class="solution-card">
                    <img src="https://images.unsplash.com/photo-1516733968668-dbdce39c4651?w=400&h=250&fit=crop" alt="NUVIACARE Verified">
                    <div class="solution-card-content">
                        <h3>NUVIACARE Verified</h3>
                        <p>Trust is at the core of everything we do. Our care providers have gone through thorough background checks, multiline behavioral interviews, and customized training programs.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="testimonials-section">
        <div class="container">
            <h2>Testimonials</h2>
            <div class="testimonial-card">
                <div class="quote">"</div>
                <p class="testimonial-text">What I like most about NUVIACARE is the fact they take time to give personal attention to the needs of their families and caregivers to help ensure the patients get the quality care they deserve.</p>
                <p class="testimonial-author">— Robert</p>
            </div>
            <div class="testimonial-dots">
                <span class="dot active"></span>
                <span class="dot"></span>
                <span class="dot"></span>
            </div>
        </div>
    </section>

    <!-- Reviews Section -->
    <section class="reviews-section">
        <div class="container">
            <h2>See what people are saying about us</h2>
            <div class="trustpilot-widget">
                <div class="trustpilot-score">
                    <div class="trust-stars">★★★★☆</div>
                    <p class="trust-text">Great<br>Based on 4,227 reviews</p>
                    <img src="https://via.placeholder.com/100x30?text=Trustpilot" alt="Trustpilot" style="margin-top: 10px; opacity: 0.7;">
                </div>
            </div>
            <div class="review-cards">
                <div class="review-card">
                    <div class="review-header">
                        <div class="review-stars">★★★★★</div>
                        <span style="font-size: 12px; color: #999;">⋮</span>
                    </div>
                    <h4 class="review-title">Partners in Care</h4>
                    <p class="review-text">Before this crisis, thanks to the help and dedication of NUVIACARE care coordinators, I was able to have my father cared for. Blessings, Julie, posted 17 days ago with access to</p>
                </div>
                <div class="review-card">
                    <div class="review-header">
                        <div class="review-stars">★★★★★</div>
                        <span style="font-size: 12px; color: #999;">⋮</span>
                    </div>
                    <h4 class="review-title">Our caregiver Mary Hodges...</h4>
                    <p class="review-text">Our caregiver Mary Hodges has been a Godsend. She's a wonderful, thoughtful, kind person taking care of my mother-in-law Southern, posted 1 month ago</p>
                </div>
            </div>
            <div class="media-logos">
                <p>And as seen in</p>
                <div class="logos-grid">
                    <img src="https://via.placeholder.com/100x30?text=Forbes" alt="Forbes" class="logo-img">
                    <img src="https://via.placeholder.com/100x30?text=TIME" alt="TIME" class="logo-img">
                    <img src="https://via.placeholder.com/100x30?text=Forbes" alt="Forbes" class="logo-img">
                    <img src="https://via.placeholder.com/60x60?text=NPR" alt="NPR" class="logo-img">
                    <img src="https://via.placeholder.com/100x30?text=Forbes" alt="Forbes" class="logo-img">
                </div>
            </div>
        </div>
    </section>

    @endsection