@extends('user.user_dashboard')
@section('user') 


@php
    $settings = App\Models\setting::first();
@endphp

<style>
/* Contact Hero Section */
.contact-hero {
    background: linear-gradient(135deg, #0d6e6e 0%, #0a5252 100%);
    color: white;
    padding: 80px 0 60px;
    text-align: center;
}
.contact-hero h1 {
    font-size: 3rem;
    margin-bottom: 20px;
    font-weight: 600;
}
.contact-hero p {
    font-size: 1.2rem;
    max-width: 700px;
    margin: 0 auto;
    opacity: 0.95;
}

/* Contact Content Section */
.contact-content {
    padding: 80px 0;
    background: #f8f9fa;
}
.contact-wrapper {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 60px;
    max-width: 1200px;
    margin: 0 auto;
}

/* Contact Form */
.contact-form-section {
    background: white;
    padding: 40px;
    border-radius: 12px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
}
.contact-form-section h2 {
    color: #0d6e6e;
    font-size: 2rem;
    margin-bottom: 30px;
}
.form-group {
    margin-bottom: 25px;
}
.form-group label {
    display: block;
    color: #333;
    font-weight: 500;
    margin-bottom: 8px;
    font-size: 0.95rem;
}
.form-group input,
.form-group textarea,
.form-group select {
    width: 100%;
    padding: 12px 16px;
    border: 1px solid #ddd;
    border-radius: 8px;
    font-size: 1rem;
    font-family: inherit;
    transition: border-color 0.3s;
}
.form-group input:focus,
.form-group textarea:focus,
.form-group select:focus {
    outline: none;
    border-color: #0d6e6e;
}
.form-group textarea {
    resize: vertical;
    min-height: 120px;
}
.form-group input.is-invalid,
.form-group textarea.is-invalid,
.form-group select.is-invalid {
    border-color: #dc3545;
}
.invalid-feedback {
    color: #dc3545;
    font-size: 0.875rem;
    margin-top: 5px;
}
.submit-btn {
    background: #0d6e6e;
    color: white;
    padding: 14px 40px;
    border: none;
    border-radius: 8px;
    font-size: 1.1rem;
    font-weight: 600;
    cursor: pointer;
    transition: background 0.3s;
    width: 100%;
}
.submit-btn:hover {
    background: #0a5252;
}

/* Contact Info Section */
.contact-info-section h2 {
    color: #0d6e6e;
    font-size: 2rem;
    margin-bottom: 30px;
}
.contact-cards {
    display: flex;
    flex-direction: column;
    gap: 25px;
}
.contact-card {
    background: white;
    padding: 30px;
    border-radius: 12px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
    transition: transform 0.3s;
}
.contact-card:hover {
    transform: translateY(-5px);
}
.contact-card-icon {
    width: 50px;
    height: 50px;
    background: #e8f4f4;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 20px;
    color: #0d6e6e;
    font-size: 1.5rem;
}
.contact-card h3 {
    color: #0d6e6e;
    font-size: 1.3rem;
    margin-bottom: 10px;
}
.contact-card p {
    color: #555;
    line-height: 1.6;
    margin-bottom: 8px;
}
.contact-card a {
    color: #0d6e6e;
    text-decoration: none;
    font-weight: 500;
}
.contact-card a:hover {
    text-decoration: underline;
}

/* Map Section */
.map-section {
    padding: 0;
    height: 400px;
    background: #e0e0e0;
}
.map-placeholder {
    width: 100%;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #666;
    font-size: 1.2rem;
}

/* Responsive Design */
@media (max-width: 968px) {
    .contact-wrapper {
        grid-template-columns: 1fr;
        gap: 40px;
    }
    .contact-hero h1 {
        font-size: 2.2rem;
    }
    .contact-form-section,
    .contact-info-section {
        padding: 30px;
    }
}

@media (max-width: 576px) {
    .contact-hero {
        padding: 60px 20px 40px;
    }
    .contact-hero h1 {
        font-size: 1.8rem;
    }
    .contact-hero p {
        font-size: 1rem;
    }
    .contact-form-section,
    .contact-info-section {
        padding: 25px;
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



<!-- Contact Hero Section -->
<section class="contact-hero">
    <div class="container">
        <h1>Get in Touch</h1>
        <p>Have questions or need assistance? We're here to help. Reach out to our team and we'll get back to you as soon as possible.</p>
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


<!-- Contact Content Section -->
<section class="contact-content">
    <div class="container">
        <div class="contact-wrapper">
            <!-- Contact Form -->
            <div class="contact-form-section">
                <h2>Send Us a Message</h2>
                <form action="{{ route('contact.store') }}" method="POST">
                    @csrf
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
                        <label for="subject">Subject *</label>
                        <select id="subject" name="subject" class="@error('subject') is-invalid @enderror" required>
                            <option value="">I would like to*</option>
                            <option value="general" {{ old('subject') == 'general' ? 'selected' : '' }}>General Inquiry</option>
                            <option value="support" {{ old('subject') == 'support' ? 'selected' : '' }}>Customer Support</option>
                            <option value="partnership" {{ old('subject') == 'partnership' ? 'selected' : '' }}>Partnership Opportunities</option>
                            <option value="careers" {{ old('subject') == 'careers' ? 'selected' : '' }}>Careers</option>
                            <option value="feedback" {{ old('subject') == 'feedback' ? 'selected' : '' }}>Feedback</option>
                            <option value="other" {{ old('subject') == 'other' ? 'selected' : '' }}>Other</option>
                        </select>
                        @error('subject')
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
                    
                    <button type="submit" class="submit-btn">Send Message</button>
                </form>
            </div>

            <!-- Contact Information -->
            <div class="contact-info-section">
                <h2>Contact Information</h2>
                <div class="contact-cards">
                    <div class="contact-card">
    <div class="contact-card-icon">
        📍
    </div>
    <h3>Our Office</h3>
    <p>{{ $settings->company_address ?? '123 Healthcare Avenue, Lagos, Nigeria' }}</p>
</div>

<div class="contact-card">
    <div class="contact-card-icon">
        📞
    </div>
    <h3>Phone</h3>
    <p><a href="tel:{{ $settings->company_phone }}">{{ $settings->company_phone ?? '+234 123 456 7890' }}</a></p>
    @if($settings->company_phone_2)
        <p><a href="tel:{{ $settings->company_phone_2 }}">{{ $settings->company_phone_2 }}</a></p>
    @endif
    
</div>

<div class="contact-card">
    <div class="contact-card-icon">
        ✉️
    </div>
    <h3>Email</h3>
    <p><a href="mailto:{{ $settings->company_email }}">{{ $settings->company_email ?? 'info@nuviacare.com' }}</a></p>
    @if($settings->support_email)
        <p><a href="mailto:{{ $settings->support_email }}">{{ $settings->support_email }}</a></p>
    @endif
</div>


                </div>
            </div>
        </div>
    </div>
</section>



<script>
// Show success modal if form was submitted successfully
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