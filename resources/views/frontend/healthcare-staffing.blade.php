@extends('user.user_dashboard')

@section('user')

<style>
    .hero-alt-content {
    display: flex;
    align-items: center;
    gap: 2rem;
    flex-wrap: wrap;
}

.hero-alt-image {
    flex: 0 0 60%;
    min-width: 300px;
}

.hero-alt-image img {
    width: 100%;
    height: auto;
    max-height: 320px;
    object-fit: cover;
    border-radius: 8px;
}

.hero-alt-text {
    flex: 0 0 35%;
    min-width: 300px;
}

@media (max-width: 768px) {
    .hero-alt-image,
    .hero-alt-text {
        flex: 0 0 100%;
    }
}
/* Desktop view */
@media (min-width: 768px) {
    .two-column-section {
        flex-direction: row-reverse !important;
        gap: 50px !important;
    }
    
    .image-column,
    .text-column {
        width: 50% !important;
    }
    
    .text-column h2 {
        font-size: 32px !important;
    }
    
    .image-wrapper {
        max-width: 500px !important;
    }
}

/* Mobile specific adjustments */
@media (max-width: 767px) {
    .content-section {
        padding: 40px 20px !important;
    }
    
    .image-wrapper {
        border-radius: 15px 50px 30px 5px !important;
    }
    
    .text-column h2 {
        font-size: 24px !important;
    }
    
    .text-column p {
        font-size: 15px !important;
    }
}
</style>

<style>

/* Success Modal */
.success-modal {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5);
    z-index: 9999;
    justify-content: center;
    align-items: center;
}
.success-modal.show {
    display: flex;
}
.success-modal-content {
    background: white;
    padding: 40px;
    border-radius: 16px;
    text-align: center;
    max-width: 450px;
    margin: 20px;
    box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
    animation: slideDown 0.4s ease-out;
}
@keyframes slideDown {
    from {
        opacity: 0;
        transform: translateY(-50px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}
.success-icon {
    width: 80px;
    height: 80px;
    background: #0d6e6e;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 20px;
    animation: scaleIn 0.5s ease-out 0.2s backwards;
}
@keyframes scaleIn {
    from {
        transform: scale(0);
    }
    to {
        transform: scale(1);
    }
}
.success-icon svg {
    width: 50px;
    height: 50px;
    stroke: white;
    stroke-width: 3;
    stroke-linecap: round;
    stroke-linejoin: round;
    fill: none;
    animation: drawCheck 0.5s ease-out 0.4s backwards;
}
@keyframes drawCheck {
    from {
        stroke-dasharray: 100;
        stroke-dashoffset: 100;
    }
    to {
        stroke-dasharray: 100;
        stroke-dashoffset: 0;
    }
}
.success-modal h3 {
    color: #0d6e6e;
    font-size: 1.8rem;
    margin-bottom: 15px;
    font-weight: 600;
}
.success-modal p {
    color: #666;
    font-size: 1rem;
    margin-bottom: 25px;
    line-height: 1.6;
}
.success-modal-btn {
    background: #0d6e6e;
    color: white;
    padding: 12px 40px;
    border: none;
    border-radius: 8px;
    font-size: 1rem;
    font-weight: 600;
    cursor: pointer;
    transition: background 0.3s;
}
.success-modal-btn:hover {
    background: #0a5252;
}


</style>


<style>
.contact-section {
    padding: 80px 20px;
    background: #f8f9fa;
}

.contact-grid {
    display: grid;
    grid-template-columns: 1fr 1.5fr;
    gap: 60px;
    align-items: start;
}

.contact-text h2 {
    font-size: 42px;
    color: #1a5f4f;
    font-weight: 400;
    line-height: 1.3;
    font-family: Georgia, serif;
}

.contact-form {
    background: white;
    padding: 40px;
    border-radius: 16px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
}

.contact-form form {
    display: flex;
    flex-direction: column;
    gap: 20px;
}

.contact-form select {
    width: 100%;
    padding: 14px;
    font-size: 16px;
    border: 1px solid #ccc;
    border-radius: 8px;
    background: white;
    color: #333;
    cursor: pointer;
    transition: border-color 0.3s;
}

.contact-form select:focus {
    outline: none;
    border-color: #0d6e6e;
}

.form-group {
    display: flex;
    flex-direction: column;
    gap: 8px;
}

.form-group label {
    font-size: 15px;
    color: #333;
    font-weight: 500;
}

.form-group input,
.form-group textarea {
    width: 100%;
    padding: 14px;
    font-size: 16px;
    border: 1px solid #ccc;
    border-radius: 8px;
    transition: border-color 0.3s;
    font-family: inherit;
}

.form-group input:focus,
.form-group textarea:focus {
    outline: none;
    border-color: #0d6e6e;
}

.form-group textarea {
    height: 180px;
    resize: vertical;
    min-height: 120px;
    max-height: 300px;
}

.form-group .is-invalid {
    border-color: #dc3545;
}

.invalid-feedback {
    color: #dc3545;
    font-size: 14px;
    margin-top: 5px;
}

.btn-primary {
    background: #0d6e6e;
    color: white;
    padding: 14px 32px;
    border: none;
    border-radius: 8px;
    font-size: 16px;
    font-weight: 600;
    cursor: pointer;
    transition: background 0.3s;
    align-self: flex-start;
}

.btn-primary:hover {
    background: #0a5252;
}

.btn-large {
    padding: 16px 40px;
    font-size: 17px;
}

/* Tablet Styles */
@media (max-width: 968px) {
    .contact-grid {
        grid-template-columns: 1fr;
        gap: 40px;
    }

    .contact-text {
        text-align: center;
    }

    .contact-text h2 {
        font-size: 36px;
    }

    .contact-form {
        padding: 30px;
    }
}

/* Mobile Styles */
@media (max-width: 640px) {
    .contact-section {
        padding: 60px 15px;
    }

    .contact-text h2 {
        font-size: 28px;
    }

    .contact-form {
        padding: 25px 20px;
    }

    .form-group input,
    .form-group textarea,
    .contact-form select {
        padding: 12px;
        font-size: 15px;
    }

    .form-group textarea {
        height: 150px;
    }

    .btn-primary {
        width: 100%;
        padding: 14px 24px;
        align-self: stretch;
    }

    .btn-large {
        padding: 16px 24px;
        font-size: 16px;
    }
}

</style>
    <!-- Hero Section -->
    <section class="hero-alt">
        <div class="container">
            <div class="hero-alt-content">
                <div class="hero-alt-image">
                    <img src="{{ asset('105.jpg') }}" alt="Healthcare professionals">
                </div>
                <div class="hero-alt-text">
                    <h1>Healthcare Professional Staffing</h1>
                    <p style="font-size: 19px">Discover a better way to staff healthcare professionals with NUVIACARE CARE HOME's innovative staffing solutions.</p>
                </div>
            </div>
        </div>
    </section>


    <!-- Success Modal -->
<div class="success-modal" id="successModal">
    <div class="success-modal-content">
        <div class="success-icon">
            <svg viewBox="0 0 52 52">
                <polyline points="14 27 22 35 38 19"/>
            </svg>
        </div>
        <h3>Message Sent Successfully!</h3>
        <p>Thank you for contacting us. We have received your message and will get back to you as soon as possible.</p>
        <button class="success-modal-btn" onclick="closeModal()">OK</button>
    </div>
</div>

    <!-- Flexible Talent Section -->
    <section class="content-section">
        <div class="container">
            <div class="two-column-section">
                 <div class="image-column">
                    <img src="{{ asset('102.jpg') }}" alt="Senior care">
                </div>
                <div class="text-column">
                    <h2>Flexible talent acquisition solutions</h2>
                    <p>We deliver accessible, efficient, and reliable solutions to meet the ever-growing demand for skilled healthcare professionals. Our services encompass cutting-edge talent acquisition strategies, innovative registry recruiting, and an extensive network for temporary staff support. We ensure that hospitals, practices, and healthcare facilities have access to top-tier professionals, exactly when they need them. With NUVIACARE, you can trust that your staffing needs are in expert hands, allowing you to focus on delivering exceptional patient care.</p>
                </div>
               
            </div>
        </div>
    </section>

    
    
    <!-- Nationwide Network Section -->
<section class="network-section" style="background-color: #eaf3ef; padding: 60px 0; font-family: 'Tiemposheadline', 'Times New Roman', serif;">
    <div class="container" style="max-width: 1100px; margin: 0 auto; text-align: center;">
        
        <!-- Header -->
        <div class="section-header" style="margin-bottom: 40px;">
            <h2 style="color: #1a4f3c; font-size: 2rem; font-weight: 400; margin-bottom: 15px;">
                Nationwide network of healthcare professionals
            </h2>
            <p style="color: #3a544a; font-size: 1rem; max-width: 800px; margin: 0 auto;">
                NUVIACARE offers access to a diverse pool of healthcare professionals, including home care professionals, nurses, aides, and more, available for short-term assignments, long-term placements, and per diem shifts.
            </p>
        </div>

        <!-- Network Grid -->
        <div class="network-grid" 
             style="display: flex; flex-wrap: wrap; justify-content: center; gap: 40px;">

            <!-- Item -->
            <div class="network-item" style="width: 200px; text-align: center;">
                <div class="network-icon" 
                     style="width: 100px; height: 100px; margin: 0 auto 15px; border-radius: 50%; background-color: #ffffff; border: 2px dashed #9fb8ac; display: flex; align-items: center; justify-content: center;">
                    <img src="{{ asset('110.jpg') }}" alt="Caregivers" style="width: 50px; height: 50px; object-fit: contain;">
                </div>
                <h4 style="font-size: 1rem; color: #1a4f3c; font-weight: 400;">Caregivers</h4>
            </div>

            <div class="network-item" style="width: 200px; text-align: center;">
                <div class="network-icon" 
                     style="width: 100px; height: 100px; margin: 0 auto 15px; border-radius: 50%; background-color: #ffffff; border: 2px dashed #9fb8ac; display: flex; align-items: center; justify-content: center;">
                    <img src="{{ asset('111.jpg') }}" alt="Home Health Aides" style="width: 50px; height: 50px; object-fit: contain;">
                </div>
                <h4 style="font-size: 1rem; color: #1a4f3c; font-weight: 400;">Home Health Aides (HHAs)</h4>
            </div>

            <div class="network-item" style="width: 200px; text-align: center;">
                <div class="network-icon" 
                     style="width: 100px; height: 100px; margin: 0 auto 15px; border-radius: 50%; background-color: #ffffff; border: 2px dashed #9fb8ac; display: flex; align-items: center; justify-content: center;">
                    <img src="{{ asset('112.jpg') }}" alt="Certified Nursing Assistants" style="width: 50px; height: 50px; object-fit: contain;">
                </div>
                <h4 style="font-size: 1rem; color: #1a4f3c; font-weight: 400;">Certified Nursing Assistants (CNAs)</h4>
            </div>

            <div class="network-item" style="width: 200px; text-align: center;">
                <div class="network-icon" 
                     style="width: 100px; height: 100px; margin: 0 auto 15px; border-radius: 50%; background-color: #ffffff; border: 2px dashed #9fb8ac; display: flex; align-items: center; justify-content: center;">
                    <img src="{{ asset('113.jpg') }}" alt="Licensed Practical/Vocational Nurses" style="width: 50px; height: 50px; object-fit: contain;">
                </div>
                <h4 style="font-size: 1rem; color: #1a4f3c; font-weight: 400;">Licensed Practical/Vocational Nurses (LPN/LVN)</h4>
            </div>

            <div class="network-item" style="width: 200px; text-align: center;">
                <div class="network-icon" 
                     style="width: 100px; height: 114px; margin: 0 auto 15px; border-radius: 50%; background-color: #ffffff; border: 2px dashed #9fb8ac; display: flex; align-items: center; justify-content: center;">
                    <img src="{{ asset('114.jpg') }}" alt="Registered Nurses" style="width: 50px; height: 50px; object-fit: contain;">
                </div>
                <h4 style="font-size: 1rem; color: #1a4f3c; font-weight: 400;">Registered Nurses (RNs)</h4>
            </div>

            <div class="network-item" style="width: 200px; text-align: center;">
                <div class="network-icon" 
                     style="width: 100px; height: 100px; margin: 0 auto 15px; border-radius: 50%; background-color: #ffffff; border: 2px dashed #9fb8ac; display: flex; align-items: center; justify-content: center;">
                    <img src="{{ asset('115.jpg') }}" alt="Nurse Practitioners" style="width: 50px; height: 50px; object-fit: contain;">
                </div>
                <h4 style="font-size: 1rem; color: #1a4f3c; font-weight: 400;">Nurse Practitioners (NPs)</h4>
            </div>

            <div class="network-item" style="width: 200px; text-align: center;">
                <div class="network-icon" 
                     style="width: 100px; height: 100px; margin: 0 auto 15px; border-radius: 50%; background-color: #ffffff; border: 2px dashed #9fb8ac; display: flex; align-items: center; justify-content: center;">
                    <img src="{{ asset('116.jpg') }}" alt="Medical Assistants" style="width: 50px; height: 50px; object-fit: contain;">
                </div>
                <h4 style="font-size: 1rem; color: #1a4f3c; font-weight: 400;">Medical Assistants (MAs)</h4>
            </div>
        </div>
    </div>
</section>


    <!-- Technology Section -->
  <section class="content-section" style="background: white; padding: 60px 20px;">
    <div class="container" style="max-width: 1200px; margin: 0 auto;">
        <div class="two-column-section" style="display: flex; flex-direction: column; gap: 30px; align-items: center;">
             <div class="text-column" style="width: 100%; max-width: 600px;">
                <h2 style="font-size: 28px; color: #2c5f4f; margin-bottom: 20px; line-height: 1.3; font-weight: 400;">Technology-enabled quality and matching</h2>
                <p style="font-size: 16px; line-height: 1.6; color: #333; margin: 0;">NUVIACARE's innovative approach, combined with best-in-class screening tools, rigorous credentialing, and credentialing processes ensures that every healthcare professional meets industry standards and regulatory requirements. Our data-driven algorithms match healthcare facilities with the most qualified professionals whose skills and expertise align with their specific needs.</p>
            </div>
            <div class="image-column" style="display: flex; justify-content: center;">
                <div class="image-wrapper" style="border-radius: 15px 50px 30px 5px; box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);">
                    <img src="{{ asset('100.jpg') }}" alt="Technology" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
            </div>
           
        </div>
    </div>
</section>


    <!-- Why Choose Section -->
    <section class="why-choose-section">
        <div class="container">
            <h2 style="text-align: center; font-size: 38px; color: #2d5f5d; margin-bottom: 50px; font-weight: 400;">Why choose NUVIACARE for healthcare professional staffing</h2>
            
            <div class="feature-cards-grid">
                <div class="feature-card">
                    <div class="feature-card-image">
                        <img src="{{ asset('101.jpg') }}" alt="Advanced technology">
                    </div>
                    <div class="feature-card-content">
                        <h3>Advanced technology</h3>
                        <p>Leveraging cutting-edge software and AI-driven platforms to streamline the entire staffing process</p>
                    </div>
                </div>

                <div class="feature-card">
                    <div class="feature-card-image">
                        <img src="{{ asset('103.jpg') }}" alt="Proven Success">
                    </div>
                    <div class="feature-card-content">
                        <h3>Proven Success</h3>
                        <p>Thousands of professionals and millions of hours of care speak to our track record, partnering and connecting healthcare facilities with top-tier professionals to deliver exceptional patient care.</p>
                    </div>
                </div>

                <div class="feature-card">
                    <div class="feature-card-image">
                        <img src="{{ asset('104.jpg') }}" alt="Efficiency">
                    </div>
                    <div class="feature-card-content">
                        <h3>Efficiency</h3>
                        <p>Streamline your staffing process with NUVIACARE to save time and reduce costs. Utilize advanced analytics to stay ahead of market trends, allowing us to provide proactive staffing solutions that meet the evolving needs of staffing solutions.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

  
<section class="contact-section">
    <div class="container">
        <div class="contact-grid">
            <div class="contact-text">
                <h2>Contact NUVIACARE to learn more.</h2>
            </div>
            <div class="contact-form">
                <form action="{{ route('contact.store') }}" method="POST">
                    @csrf
                    <select id="subject" name="subject" class="@error('subject') is-invalid @enderror" required>
                        <option value="">I would like to*</option>
                        <option value="general" {{ old('subject') == 'general' ? 'selected' : '' }}>General Inquiry</option>
                        <option value="support" {{ old('subject') == 'support' ? 'selected' : '' }}>Customer Support</option>
                        <option value="partnership" {{ old('subject') == 'partnership' ? 'selected' : '' }}>Partnership Opportunities</option>
                        <option value="careers" {{ old('subject') == 'careers' ? 'selected' : '' }}>Careers</option>
                        <option value="feedback" {{ old('subject') == 'feedback' ? 'selected' : '' }}>Feedback</option>
                        <option value="other" {{ old('subject') == 'other' ? 'selected' : '' }}>Other</option>
                    </select>
                   
                    <div class="form-group">
                        <label for="name">Full Name *</label>
                        <input type="text" id="name" name="name" class="@error('name') is-invalid @enderror" value="{{ old('name') }}" required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="email">Email Address *</label>
                        <input type="email" id="email" name="email" class="@error('email') is-invalid @enderror" value="{{ old('email') }}" required>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="phone">Phone Number</label>
                        <input type="tel" id="phone" name="phone" class="@error('phone') is-invalid @enderror" value="{{ old('phone') }}">
                        @error('phone')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="message">Message *</label>
                        <textarea id="message" name="message" class="@error('message') is-invalid @enderror" required>{{ old('message') }}</textarea>
                        @error('message')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <button type="submit" class="btn-primary btn-large">Contact NUVIACARE</button>
                </form>
            </div>
        </div>
    </div>
</section>



        <script>
@if(session('success') || session('message'))
    document.addEventListener('DOMContentLoaded', function() {
        showSuccessModal();
    });
@endif

function showSuccessModal() {
    document.getElementById('successModal').classList.add('show');
}

function closeModal() {
    document.getElementById('successModal').classList.remove('show');
}

// Close modal when clicking outside
document.addEventListener('click', function(event) {
    const modal = document.getElementById('successModal');
    if (event.target === modal) {
        closeModal();
    }
});

// Close modal with Escape key
document.addEventListener('keydown', function(event) {
    if (event.key === 'Escape') {
        closeModal();
    }
});
</script>
  @endsection