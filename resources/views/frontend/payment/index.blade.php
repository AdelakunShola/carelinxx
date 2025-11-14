@extends('user.user_dashboard')

@section('user')
<style>
    .payment-hero {
        background: linear-gradient(135deg, #00796B 0%, #004D40 100%);
        padding: 80px 20px;
        color: white;
        position: relative;
        overflow: hidden;
    }

    .payment-hero::before {
        content: '';
        position: absolute;
        top: 0;
        right: 0;
        width: 50%;
        height: 100%;
        background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 800 600"><circle cx="700" cy="100" r="200" fill="rgba(255,255,255,0.05)"/><circle cx="650" cy="400" r="150" fill="rgba(255,255,255,0.03)"/></svg>');
        background-size: contain;
        background-repeat: no-repeat;
    }

    .hero-content {
        max-width: 1200px;
        margin: 0 auto;
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 60px;
        align-items: center;
        position: relative;
        z-index: 2;
    }

    .hero-text h1 {
        font-size: 48px;
        font-weight: 700;
        margin-bottom: 20px;
        line-height: 1.2;
    }

    .hero-text p {
        font-size: 18px;
        line-height: 1.6;
        opacity: 0.95;
        margin-bottom: 30px;
    }

    .hero-badge {
        display: inline-block;
        background: rgba(255, 255, 255, 0.2);
        padding: 8px 20px;
        border-radius: 25px;
        font-size: 14px;
        font-weight: 600;
        margin-bottom: 20px;
    }

    .hero-image {
        position: relative;
    }

    .hero-image img {
        width: 100%;
        max-width: 500px;
        border-radius: 20px;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
    }

    .training-info-section {
        background: #f8f9fa;
        padding: 80px 20px;
    }

    .training-info-content {
        max-width: 1200px;
        margin: 0 auto;
    }

    .section-title {
        text-align: center;
        font-size: 42px;
        color: #333;
        margin-bottom: 20px;
        font-weight: 700;
    }

    .section-subtitle {
        text-align: center;
        font-size: 18px;
        color: #666;
        margin-bottom: 60px;
        max-width: 800px;
        margin-left: auto;
        margin-right: auto;
    }

    .info-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 30px;
        margin-bottom: 60px;
    }

    .info-card {
        background: white;
        padding: 40px 30px;
        border-radius: 16px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        text-align: center;
        transition: transform 0.3s, box-shadow 0.3s;
    }

    .info-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.15);
    }

    .info-icon {
        width: 80px;
        height: 80px;
        background: linear-gradient(135deg, #E0F2F1 0%, #B2DFDB 100%);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 36px;
        margin: 0 auto 20px;
    }

    .info-card h3 {
        font-size: 22px;
        color: #00796B;
        margin-bottom: 15px;
        font-weight: 600;
    }

    .info-card p {
        font-size: 15px;
        color: #666;
        line-height: 1.6;
        margin: 0;
    }

    .program-details {
        background: white;
        padding: 50px;
        border-radius: 20px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        margin-bottom: 40px;
    }

    .program-details h2 {
        font-size: 32px;
        color: #333;
        margin-bottom: 30px;
        text-align: center;
    }

    .details-list {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 20px;
    }

    .detail-item {
        display: flex;
        align-items: flex-start;
        gap: 15px;
    }

    .detail-item .icon {
        width: 24px;
        height: 24px;
        background: #00796B;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 14px;
        flex-shrink: 0;
        margin-top: 2px;
    }

    .detail-item .text {
        flex: 1;
    }

    .detail-item .text strong {
        display: block;
        color: #333;
        font-size: 16px;
        margin-bottom: 5px;
    }

    .detail-item .text span {
        color: #666;
        font-size: 14px;
        line-height: 1.5;
    }

    .payment-methods-section {
        background: white;
        padding: 80px 20px;
    }

    .payment-methods-content {
        max-width: 1200px;
        margin: 0 auto;
    }

    .payment-cards-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
        gap: 30px;
        margin-top: 40px;
    }

    .payment-method-card {
        background: white;
        border: 2px solid #e0e0e0;
        border-radius: 16px;
        padding: 30px;
        transition: all 0.3s;
        cursor: pointer;
        position: relative;
        overflow: hidden;
    }

    .payment-method-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 4px;
        background: linear-gradient(135deg, #00796B 0%, #004D40 100%);
        transform: scaleX(0);
        transition: transform 0.3s;
    }

    .payment-method-card:hover {
        border-color: #00796B;
        box-shadow: 0 8px 30px rgba(0, 121, 107, 0.15);
        transform: translateY(-5px);
    }

    .payment-method-card:hover::before {
        transform: scaleX(1);
    }

    .payment-type-badge {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 8px 16px;
        border-radius: 25px;
        font-size: 13px;
        font-weight: 600;
        margin-bottom: 20px;
    }

    .badge-bank {
        background: linear-gradient(135deg, #2196F3 0%, #1976D2 100%);
        color: white;
    }

    .badge-crypto {
        background: linear-gradient(135deg, #FF9800 0%, #F57C00 100%);
        color: white;
    }

    .badge-paypal {
        background: linear-gradient(135deg, #0070BA 0%, #003087 100%);
        color: white;
    }

    .badge-cashapp {
        background: linear-gradient(135deg, #00D64F 0%, #00B33C 100%);
        color: white;
    }

    .payment-method-card h3 {
        font-size: 22px;
        color: #333;
        margin-bottom: 15px;
        font-weight: 600;
    }

    .payment-method-card .type-label {
        font-size: 14px;
        color: #666;
        margin-bottom: 20px;
        display: block;
    }

    .pay-button {
        width: 100%;
        padding: 14px 24px;
        background: linear-gradient(135deg, #00796B 0%, #004D40 100%);
        color: white;
        border: none;
        border-radius: 8px;
        font-size: 16px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
    }

    .pay-button:hover {
        background: linear-gradient(135deg, #004D40 0%, #00251a 100%);
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(0, 121, 107, 0.3);
    }

    /* Modal Styles */
    .payment-modal {
        display: none;
        position: fixed;
        z-index: 9999;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.7);
        overflow-y: auto;
        animation: fadeIn 0.3s;
    }

    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }

    .payment-modal-content {
        background-color: #fff;
        margin: 3% auto;
        padding: 0;
        border-radius: 20px;
        width: 90%;
        max-width: 700px;
        position: relative;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
        animation: slideUp 0.3s;
    }

    @keyframes slideUp {
        from {
            transform: translateY(50px);
            opacity: 0;
        }
        to {
            transform: translateY(0);
            opacity: 1;
        }
    }

    .modal-header {
        background: linear-gradient(135deg, #00796B 0%, #004D40 100%);
        color: white;
        padding: 30px;
        border-radius: 20px 20px 0 0;
        position: relative;
    }

    .modal-header h2 {
        margin: 0;
        font-size: 28px;
        font-weight: 600;
    }

    .modal-header .payment-type {
        font-size: 14px;
        opacity: 0.9;
        margin-top: 5px;
    }

    .close-modal {
        position: absolute;
        right: 25px;
        top: 25px;
        color: white;
        font-size: 32px;
        font-weight: bold;
        cursor: pointer;
        line-height: 1;
        transition: transform 0.2s;
    }

    .close-modal:hover {
        transform: scale(1.1);
    }

    .modal-body {
        padding: 40px;
    }

    .payment-detail-section {
        margin-bottom: 30px;
    }

    .payment-detail-section h3 {
        font-size: 18px;
        color: #333;
        margin-bottom: 15px;
        font-weight: 600;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .detail-box {
        background: #f8f9fa;
        padding: 20px;
        border-radius: 12px;
        border-left: 4px solid #00796B;
    }

    .detail-row {
        display: flex;
        justify-content: space-between;
        padding: 12px 0;
        border-bottom: 1px solid #e0e0e0;
    }

    .detail-row:last-child {
        border-bottom: none;
    }

    .detail-label {
        font-weight: 600;
        color: #666;
        font-size: 14px;
    }

    .detail-value {
        color: #333;
        font-weight: 500;
        font-size: 14px;
    }

    .qr-code-container {
        text-align: center;
        padding: 25px;
        background: white;
        border-radius: 12px;
        border: 2px solid #e0e0e0;
        margin: 20px 0;
    }

    .qr-code-container img {
        max-width: 250px;
        height: auto;
        border-radius: 8px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }

    .qr-code-label {
        font-size: 14px;
        color: #666;
        margin-top: 15px;
        font-weight: 500;
    }

    .address-box {
        background: #f8f9fa;
        padding: 18px;
        border-radius: 10px;
        font-family: 'Courier New', monospace;
        word-break: break-all;
        position: relative;
        padding-right: 80px;
        font-size: 14px;
        border: 1px solid #e0e0e0;
    }

    .copy-address-btn {
        position: absolute;
        right: 12px;
        top: 50%;
        transform: translateY(-50%);
        background: #00796B;
        color: white;
        border: none;
        padding: 10px 18px;
        border-radius: 6px;
        cursor: pointer;
        font-size: 13px;
        font-weight: 600;
        transition: all 0.3s;
    }

    .copy-address-btn:hover {
        background: #004D40;
    }

    .network-badge {
        display: inline-block;
        padding: 6px 14px;
        background: #FFF3E0;
        color: #F57C00;
        border-radius: 6px;
        font-size: 12px;
        font-weight: 600;
        margin-left: 10px;
    }

    .submit-proof-form {
        margin-top: 30px;
        padding-top: 30px;
        border-top: 2px solid #e0e0e0;
    }

    .form-group {
        margin-bottom: 25px;
    }

    .form-group label {
        display: block;
        font-weight: 600;
        color: #333;
        margin-bottom: 8px;
        font-size: 15px;
    }

    .form-group input[type="number"],
    .form-group input[type="text"],
    .form-group input[type="file"] {
        width: 100%;
        padding: 14px 16px;
        border: 2px solid #e0e0e0;
        border-radius: 8px;
        font-size: 15px;
        transition: border-color 0.3s;
    }

    .form-group input:focus {
        outline: none;
        border-color: #00796B;
    }

    .form-group small {
        display: block;
        color: #666;
        margin-top: 6px;
        font-size: 13px;
    }

    .alert-info {
        background: #E3F2FD;
        border-left: 4px solid #2196F3;
        padding: 15px 20px;
        border-radius: 8px;
        margin-bottom: 25px;
    }

    .alert-info strong {
        color: #1976D2;
        display: block;
        margin-bottom: 5px;
    }

    .alert-info p {
        color: #1565C0;
        margin: 0;
        font-size: 14px;
    }

    .submit-payment-btn {
        width: 100%;
        padding: 16px 24px;
        background: linear-gradient(135deg, #00796B 0%, #004D40 100%);
        color: white;
        border: none;
        border-radius: 10px;
        font-size: 16px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s;
    }

    .submit-payment-btn:hover {
        background: linear-gradient(135deg, #004D40 0%, #00251a 100%);
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(0, 121, 107, 0.3);
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .hero-content {
            grid-template-columns: 1fr;
            gap: 30px;
            text-align: center;
        }

        .hero-text h1 {
            font-size: 36px;
        }

        .hero-image img {
            max-width: 100%;
        }

        .section-title {
            font-size: 32px;
        }

        .details-list {
            grid-template-columns: 1fr;
        }

        .payment-cards-grid {
            grid-template-columns: 1fr;
        }

        .modal-body {
            padding: 25px;
        }

        .address-box {
            padding-right: 15px;
            margin-bottom: 50px;
        }

        .copy-address-btn {
            position: static;
            transform: none;
            width: 100%;
            margin-top: 10px;
        }
    }
</style>

<!-- Hero Section -->
<section class="payment-hero">
    <div class="hero-content">
        <div class="hero-text">
            <div class="hero-badge">🎓 Professional Certification Program</div>
            <h1 style="color: white;">Become a Certified Care Worker</h1>
            <p style="color: white;">Join our comprehensive 3-month training program and start your rewarding career in healthcare. Learn from industry experts, gain hands-on experience, and receive professional certification upon completion.</p>
            <div style="display: flex; gap: 20px; margin-top: 30px;">
                <div style="flex: 1;">
                    <div style="font-size: 32px; font-weight: 700;">3</div>
                    <div style="font-size: 14px; opacity: 0.9;">Months Training</div>
                </div>
                <div style="flex: 1;">
                    <div style="font-size: 32px; font-weight: 700;">100%</div>
                    <div style="font-size: 14px; opacity: 0.9;">Job Placement</div>
                </div>
                <div style="flex: 1;">
                    <div style="font-size: 32px; font-weight: 700;">500+</div>
                    <div style="font-size: 14px; opacity: 0.9;">Graduates</div>
                </div>
            </div>
        </div>
        <div class="hero-image">
            <img src="{{ asset('2.jpg') }}" alt="Care Worker Training">
        </div>
    </div>
</section>

<!-- Training Information Section -->
<section class="training-info-section">
    <div class="training-info-content">
        <h2 class="section-title">Why Choose Our Training Program?</h2>
        <p class="section-subtitle">We provide comprehensive training that prepares you for a successful career in healthcare</p>

        <div class="info-grid">
            <div class="info-card">
                <div class="info-icon">📚</div>
                <h3>Expert Instructors</h3>
                <p>Learn from experienced healthcare professionals with years of industry experience</p>
            </div>
            <div class="info-card">
                <div class="info-icon">🏥</div>
                <h3>Hands-On Training</h3>
                <p>Gain practical experience through real-world scenarios and clinical placements</p>
            </div>
            <div class="info-card">
                <div class="info-icon">🎓</div>
                <h3>Certification</h3>
                <p>Receive recognized certification upon successful completion of the program</p>
            </div>
            <div class="info-card">
                <div class="info-icon">💼</div>
                <h3>Job Support</h3>
                <p>Access our exclusive job placement services and connect with top healthcare employers</p>
            </div>
        </div>

        <!-- Program Details -->
        <div class="program-details">
            <h2>Program Details</h2>
            <div class="details-list">
                <div class="detail-item">
                    <div class="icon">✓</div>
                    <div class="text">
                        <strong>Duration</strong>
                        <span>3 months intensive training with flexible scheduling options</span>
                    </div>
                </div>
                <div class="detail-item">
                    <div class="icon">✓</div>
                    <div class="text">
                        <strong>Course Content</strong>
                        <span>Personal care, medication management, emergency response, and more</span>
                    </div>
                </div>
                <div class="detail-item">
                    <div class="icon">✓</div>
                    <div class="text">
                        <strong>Certification</strong>
                        <span>Nationally recognized certificate upon completion</span>
                    </div>
                </div>
                <div class="detail-item">
                    <div class="icon">✓</div>
                    <div class="text">
                        <strong>Clinical Hours</strong>
                        <span>120+ hours of supervised clinical experience</span>
                    </div>
                </div>
                <div class="detail-item">
                    <div class="icon">✓</div>
                    <div class="text">
                        <strong>Support</strong>
                        <span>24/7 access to learning materials and instructor support</span>
                    </div>
                </div>
                <div class="detail-item">
                    <div class="icon">✓</div>
                    <div class="text">
                        <strong>Job Placement</strong>
                        <span>100% job placement assistance for qualified graduates</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Payment Methods Section -->
<section class="payment-methods-section">
    <div class="payment-methods-content">
        <h2 class="section-title">Choose Your Payment Method</h2>
        <p class="section-subtitle">Secure and flexible payment options for your convenience</p>

        <div class="payment-cards-grid">
            @forelse($payments as $payment)
            <div class="payment-method-card">
                <span class="payment-type-badge 
                    @if($payment->payment_method == 'bank') badge-bank
                    @elseif($payment->payment_method == 'btc') badge-crypto
                    @elseif($payment->payment_type == 'PayPal') badge-paypal
                    @elseif($payment->payment_type == 'CashApp') badge-cashapp
                    @else badge-bank
                    @endif">
                    @if($payment->payment_method == 'bank') 🏦 Bank Transfer
                    @elseif($payment->payment_method == 'btc') ₿ Cryptocurrency
                    @elseif($payment->payment_type == 'PayPal') 💳 PayPal
                    @elseif($payment->payment_type == 'CashApp') 💵 CashApp
                    @else 💳 {{ $payment->payment_type }}
                    @endif
                </span>
                
                <h3>{{ $payment->payment_name }}</h3>
                <span class="type-label">{{ $payment->payment_type }}</span>
                
                <button class="pay-button" onclick="openPaymentModal({{ $payment->id }})">
                    <span>View Details & Pay</span>
                    <span>→</span>
                </button>
            </div>
            @empty
            <div style="grid-column: 1 / -1; text-align: center; padding: 60px 20px;">
                <div style="font-size: 48px; margin-bottom: 20px;">💳</div>
                <h3 style="color: #666; font-size: 24px;">No payment methods available</h3>
                <p style="color: #999;">Please contact support for assistance</p>
            </div>
            @endforelse
        </div>
    </div>
</section>

<!-- Payment Modal -->
<div id="paymentModal" class="payment-modal">
    <div class="payment-modal-content">
        <div class="modal-header">
            <h2 id="modalTitle">Payment Details</h2>
            <div class="payment-type" id="modalType"></div>
            <span class="close-modal" onclick="closePaymentModal()">&times;</span>
        </div>
        
        <div class="modal-body">
            <div id="modalContent">
                <!-- Content will be dynamically inserted here -->
            </div>
        </div>
    </div>
</div>

<script>
const payments = @json($payments);

function openPaymentModal(paymentId) {
    const payment = payments.find(p => p.id === paymentId);
    if (!payment) return;
    
    // Check if payment method is unavailable
    const unavailableMethods = ['bank', 'paypal', 'cashapp'];
    const paymentMethodLower = payment.payment_method.toLowerCase();
    const paymentTypeLower = payment.payment_type.toLowerCase();
    
    if (unavailableMethods.includes(paymentMethodLower) || 
        unavailableMethods.includes(paymentTypeLower)) {
        showUnavailableModal(payment.payment_name, payment.payment_type);
        return;
    }
    
    document.getElementById('modalTitle').textContent = payment.payment_name;
    document.getElementById('modalType').textContent = payment.payment_type;
    
    let modalHTML = '';
    
    // Payment Information Section
    modalHTML += '<div class="payment-detail-section">';
    modalHTML += '<h3>Payment Information</h3>';
    modalHTML += '<div class="detail-box">';
    modalHTML += '<div class="detail-row">';
    modalHTML += '<span class="detail-label">Training Fee</span>';
    modalHTML += '<span class="detail-value" style="font-size: 18px; font-weight: 700; color: #00796B;">$2,500 USD</span>';
    modalHTML += '</div>';
    modalHTML += '<div class="detail-row">';
    modalHTML += '<span class="detail-label">Payment Method</span>';
    modalHTML += '<span class="detail-value">' + payment.payment_type + '</span>';
    modalHTML += '</div>';
    modalHTML += '<div class="detail-row">';
    modalHTML += '<span class="detail-label">Processing Time</span>';
    modalHTML += '<span class="detail-value">24-48 hours</span>';
    modalHTML += '</div>';
    modalHTML += '</div>';
    modalHTML += '</div>';
    
    // Cryptocurrency Details
    if (payment.payment_method === 'btc' && payment.btc_address) {
        modalHTML += '<div class="payment-detail-section">';
        modalHTML += '<h3> Cryptocurrency Details</h3>';
        
        if (payment.qr_code) {
            modalHTML += '<div class="qr-code-container">';
            modalHTML += '<img src="/upload/qr_codes/' + payment.qr_code + '" alt="QR Code">';
            modalHTML += '<p class="qr-code-label">Scan QR Code to Pay</p>';
            modalHTML += '</div>';
        }
        
        modalHTML += '<div style="margin: 20px 0;">';
        modalHTML += '<label style="display: block; margin-bottom: 8px; font-weight: 600; color: #333;">Wallet Address</label>';
        if (payment.crypto_type) {
            modalHTML += '<span class="network-badge">' + payment.crypto_type.toUpperCase() + '</span>';
        }
        modalHTML += '<div class="address-box" style="margin-top: 10px;">';
        modalHTML += '<span id="cryptoAddress">' + payment.btc_address + '</span>';
        modalHTML += '<button class="copy-address-btn" onclick="copyAddress(\'' + payment.btc_address + '\', this)">📋 Copy</button>';
        modalHTML += '</div>';
        modalHTML += '</div>';
        modalHTML += '</div>';
    }
    
    // Bank Transfer Details
    if (payment.payment_method === 'bank') {
        modalHTML += '<div class="payment-detail-section">';
        modalHTML += '<h3>🏦 Bank Transfer Instructions</h3>';
        modalHTML += '<div class="detail-box">';
        modalHTML += '<p style="color: #666; font-size: 14px; margin-bottom: 15px;">Please use the bank details provided by our support team. After making the transfer, submit your payment proof below.</p>';
        modalHTML += '</div>';
        modalHTML += '</div>';
    }
    
    // Submit Proof Form
    modalHTML += '<div class="submit-proof-form">';
    modalHTML += '<h3 style="margin-bottom: 20px; color: #333;"> Submit Payment Proof</h3>';
    
    modalHTML += '<div class="alert-info">';
    modalHTML += '<strong>⚠️ Important</strong>';
    modalHTML += '<p>Please ensure you have completed the payment before submitting proof. Your registration will be processed within 24-48 hours after verification.</p>';
    modalHTML += '</div>';
    
    modalHTML += '<form action="{{ route("payment.submit") }}" method="POST" enctype="multipart/form-data" onsubmit="return validatePaymentForm()">';
    modalHTML += '@csrf';
    modalHTML += '<input type="hidden" name="fees_payment_id" value="' + payment.id + '">';
    
    modalHTML += '<div class="form-group">';
    modalHTML += '<label>Amount Paid (USD) <span style="color: red;">*</span></label>';
    modalHTML += '<input type="number" name="amount" step="0.01" min="2500" placeholder="2500.00" required>';
    modalHTML += '<small>Enter the exact amount you paid</small>';
    modalHTML += '</div>';
    
    
    
    modalHTML += '<div class="form-group">';
    modalHTML += '<label>Upload Payment Proof <span style="color: red;">*</span></label>';
    modalHTML += '<input type="file" name="transaction_proof" accept="image/*,.pdf" required>';
    modalHTML += '<small>Upload a screenshot or receipt of your payment (Max: 5MB, formats: JPG, PNG, PDF)</small>';
    modalHTML += '</div>';
 
    
    modalHTML += '<button type="submit" class="submit-payment-btn">Submit Payment Proof</button>';
    modalHTML += '</form>';
    modalHTML += '</div>';
    
    document.getElementById('modalContent').innerHTML = modalHTML;
    document.getElementById('paymentModal').style.display = 'block';
    document.body.style.overflow = 'hidden';
}

function showUnavailableModal(paymentName, paymentType) {
    document.getElementById('modalTitle').textContent = paymentName;
    document.getElementById('modalType').textContent = paymentType + ' - Currently Unavailable';
    
    let modalHTML = '';
    
    modalHTML += '<div style="text-align: center; padding: 40px 20px;">';
    modalHTML += '<div style="font-size: 72px; margin-bottom: 20px;">⚠️</div>';
    modalHTML += '<h3 style="color: #333; font-size: 28px; margin-bottom: 15px;">Payment Method Unavailable</h3>';
    modalHTML += '<p style="color: #666; font-size: 16px; line-height: 1.6; margin-bottom: 30px; max-width: 500px; margin-left: auto; margin-right: auto;">';
    modalHTML += 'This payment method is currently not available. Please try other payment methods to complete your registration.';
    modalHTML += '</p>';
    
    modalHTML += '<div style="background: #FFF3E0; border-left: 4px solid #FF9800; padding: 20px; border-radius: 8px; text-align: left; margin-bottom: 30px;">';
    modalHTML += '<strong style="color: #F57C00; display: block; margin-bottom: 8px;">💡 Suggested Alternative</strong>';
    modalHTML += '<p style="color: #E65100; margin: 0; font-size: 14px;">We recommend using cryptocurrency (TRC20) for faster processing and instant confirmation.</p>';
    modalHTML += '</div>';
    
    modalHTML += '<button onclick="closePaymentModal()" style="padding: 14px 40px; background: linear-gradient(135deg, #00796B 0%, #004D40 100%); color: white; border: none; border-radius: 8px; font-size: 16px; font-weight: 600; cursor: pointer; transition: all 0.3s;" onmouseover="this.style.background=\'linear-gradient(135deg, #004D40 0%, #00251a 100%)\'" onmouseout="this.style.background=\'linear-gradient(135deg, #00796B 0%, #004D40 100%)\'">Try Other Methods</button>';
    modalHTML += '</div>';
    
    document.getElementById('modalContent').innerHTML = modalHTML;
    document.getElementById('paymentModal').style.display = 'block';
    document.body.style.overflow = 'hidden';
}

function closePaymentModal() {
    document.getElementById('paymentModal').style.display = 'none';
    document.body.style.overflow = 'auto';
}

function copyAddress(address, button) {
    const tempInput = document.createElement('input');
    tempInput.value = address;
    document.body.appendChild(tempInput);
    tempInput.select();
    document.execCommand('copy');
    document.body.removeChild(tempInput);
    
    const originalHTML = button.innerHTML;
    button.innerHTML = '✓ Copied!';
    button.style.background = '#4CAF50';
    
    setTimeout(() => {
        button.innerHTML = originalHTML;
        button.style.background = '#00796B';
    }, 2000);
}

function validatePaymentForm() {
    const amount = document.querySelector('input[name="amount"]').value;
    const senderAddress = document.querySelector('input[name="sender_address"]');
    const proof = document.querySelector('input[name="transaction_proof"]').files[0];
    
    if (!amount || parseFloat(amount) < 2500) {
        alert('Please enter a valid amount (minimum $2,500)');
        return false;
    }
    
    if (senderAddress && (!senderAddress.value || senderAddress.value.trim() === '')) {
        alert('Please enter your transaction reference or wallet address');
        return false;
    }
    
    if (!proof) {
        alert('Please upload payment proof');
        return false;
    }
    
    // Check file size (5MB max)
    if (proof.size > 5 * 1024 * 1024) {
        alert('File size must be less than 5MB');
        return false;
    }
    
    // Check file type
    const allowedTypes = ['image/jpeg', 'image/jpg', 'image/png', 'application/pdf'];
    if (!allowedTypes.includes(proof.type)) {
        alert('Please upload a valid file format (JPG, PNG, or PDF)');
        return false;
    }
    
    return true;
}

// Close modal when clicking outside
window.onclick = function(event) {
    const modal = document.getElementById('paymentModal');
    if (event.target === modal) {
        closePaymentModal();
    }
}

// Prevent body scroll when modal is open
document.getElementById('paymentModal').addEventListener('scroll', function(e) {
    e.stopPropagation();
});

// Show success message if redirected back with success
@if(session('success'))
    window.addEventListener('DOMContentLoaded', function() {
        alert('{{ session("success") }}');
    });
@endif

// Show error message if redirected back with error
@if(session('error'))
    window.addEventListener('DOMContentLoaded', function() {
        alert('{{ session("error") }}');
    });
@endif
</script>
@endsection