@extends('user.user_dashboard')

@section('user')
<style>
    .crypto-payment-container {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        min-height: 100vh;
        padding: 40px 0;
    }
    
    .payment-card {
        background: rgba(255, 255, 255, 0.95);
        border-radius: 20px;
        padding: 30px;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
        margin-bottom: 30px;
        transition: transform 0.3s ease;
    }
    
    .payment-card:hover {
        transform: translateY(-5px);
    }
    
    .payment-method-badge {
        display: inline-block;
        padding: 8px 20px;
        border-radius: 25px;
        font-size: 14px;
        font-weight: 600;
        margin-bottom: 15px;
    }
    
    .badge-bank {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
    }
    
    .badge-crypto {
        background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
        color: white;
    }
    
    .qr-code-wrapper {
        background: white;
        padding: 20px;
        border-radius: 15px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        text-align: center;
        margin: 20px 0;
    }
    
    .qr-code-wrapper img {
        max-width: 250px;
        height: auto;
        border: 3px solid #667eea;
        border-radius: 10px;
    }
    
    .crypto-address {
        background: #f8f9fa;
        padding: 15px;
        border-radius: 10px;
        border-left: 4px solid #667eea;
        margin: 15px 0;
        font-family: 'Courier New', monospace;
        word-break: break-all;
        position: relative;
        padding-right: 80px;
    }
    
    .copy-btn {
        position: absolute;
        right: 10px;
        top: 50%;
        transform: translateY(-50%);
        background: #667eea;
        color: white;
        border: none;
        padding: 8px 15px;
        border-radius: 5px;
        cursor: pointer;
        font-size: 12px;
    }
    
    .copy-btn:hover {
        background: #764ba2;
    }
    
    .network-badge {
        display: inline-block;
        padding: 5px 15px;
        background: #ffd700;
        color: #000;
        border-radius: 5px;
        font-size: 12px;
        font-weight: 600;
        margin-left: 10px;
    }
    
    .page-header {
        text-align: center;
        color: white;
        margin-bottom: 40px;
    }
    
    .page-header h1 {
        font-size: 42px;
        font-weight: 700;
        margin-bottom: 10px;
    }
    
    .page-header p {
        font-size: 18px;
        opacity: 0.9;
    }
    
    .payment-info-item {
        display: flex;
        justify-content: space-between;
        padding: 12px 0;
        border-bottom: 1px solid #eee;
    }
    
    .payment-info-item:last-child {
        border-bottom: none;
    }
    
    .payment-info-label {
        font-weight: 600;
        color: #666;
    }
    
    .payment-info-value {
        color: #333;
        font-weight: 500;
    }
</style>

<div class="crypto-payment-container">
    <div class="container">
        <div class="page-header">
            <h1>💳 Payment Methods</h1>
            <p>Choose your preferred payment method and complete your transaction</p>
        </div>

        <div class="row">
            @forelse($payments as $payment)
            <div class="col-md-6 col-lg-4">
                <div class="payment-card">
                    <span class="payment-method-badge {{ $payment->payment_method == 'btc' ? 'badge-crypto' : 'badge-bank' }}">
                        {{ $payment->payment_method == 'btc' ? '₿ CRYPTO' : '🏦 BANK' }}
                    </span>
                    
                    <h3 style="color: #333; font-weight: 700; margin: 15px 0;">{{ $payment->payment_name }}</h3>
                    
                    <div class="payment-info-item">
                        <span class="payment-info-label">Type:</span>
                        <span class="payment-info-value">{{ $payment->payment_type }}</span>
                    </div>
                    
                    @if($payment->crypto_type)
                    <div class="payment-info-item">
                        <span class="payment-info-label">Network:</span>
                        <span class="payment-info-value">
                            {{ strtoupper($payment->crypto_type) }}
                            <span class="network-badge">{{ strtoupper($payment->crypto_type) }}</span>
                        </span>
                    </div>
                    @endif
                    
                    @if($payment->qr_code)
                    <div class="qr-code-wrapper">
                        <img src="{{ asset('upload/qr_codes/' . $payment->qr_code) }}" alt="QR Code">
                        <p style="margin-top: 10px; font-size: 12px; color: #666;">Scan to pay</p>
                    </div>
                    @endif
                    
                    @if($payment->btc_address)
                    <div class="crypto-address">
                        <small style="color: #666; display: block; margin-bottom: 5px;">Wallet Address:</small>
                        <strong id="address_{{ $payment->id }}">{{ $payment->btc_address }}</strong>
                        <button class="copy-btn" onclick="copyAddress('{{ $payment->id }}', '{{ $payment->btc_address }}')">
                            📋 Copy
                        </button>
                    </div>
                    @endif
                    
                    <button class="btn btn-primary btn-block mt-3" onclick="openPaymentModal({{ $payment->id }}, '{{ $payment->payment_name }}', '{{ $payment->crypto_type }}')" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); border: none; padding: 12px; border-radius: 10px; font-weight: 600; width: 100%;">
                        Submit Payment Proof
                    </button>
                </div>
            </div>
            @empty
            <div class="col-12">
                <div class="payment-card text-center">
                    <h4>No payment methods available at the moment</h4>
                    <p>Please contact support for assistance</p>
                </div>
            </div>
            @endforelse
        </div>
    </div>
</div>

<!-- Payment Modal -->
<div class="modal fade" id="paymentModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" style="border-radius: 20px; border: none;">
            <div class="modal-header" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; border-radius: 20px 20px 0 0;">
                <h5 class="modal-title" id="modalPaymentName">Submit Payment Proof</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="filter: brightness(0) invert(1);"></button>
            </div>
            <div class="modal-body" style="padding: 30px;">
                <form action="{{ route('payment.submit') }}" method="POST" enctype="multipart/form-data" id="paymentForm">
                    @csrf
                    <input type="hidden" name="fees_payment_id" id="fees_payment_id">
                    
                    <div class="alert alert-info" style="background: #e3f2fd; border: none; border-radius: 10px;">
                        <strong>⚠️ Important:</strong> Please ensure you've sent the payment before submitting proof.
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label" style="font-weight: 600;">Amount (USD) <span style="color: red;">*</span></label>
                        <input type="number" step="0.01" name="amount" class="form-control" required style="border-radius: 10px; padding: 12px;">
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label" style="font-weight: 600;">Your Wallet Address <span style="color: red;">*</span></label>
                        <input type="text" name="sender_address" class="form-control" required placeholder="Enter your wallet address" style="border-radius: 10px; padding: 12px; font-family: 'Courier New', monospace;">
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label" style="font-weight: 600;">Upload Payment Proof <span style="color: red;">*</span></label>
                        <input type="file" name="transaction_proof" class="form-control" accept="image/*" required style="border-radius: 10px; padding: 12px;">
                        <small class="text-muted">Upload a screenshot of your transaction (Max: 2MB)</small>
                    </div>
                    
                    <div class="mb-3">
                        <div class="alert alert-warning" style="background: #fff3cd; border: none; border-radius: 10px; font-size: 14px;">
                            <strong>📝 Note:</strong> Your payment will be reviewed by our team. You'll receive a notification once it's confirmed.
                        </div>
                    </div>
                    
                    <div class="d-flex gap-2">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="flex: 1; padding: 12px; border-radius: 10px;">Cancel</button>
                        <button type="submit" class="btn btn-primary" style="flex: 1; padding: 12px; border-radius: 10px; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); border: none;">Submit Payment</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
function openPaymentModal(paymentId, paymentName, cryptoType) {
    document.getElementById('fees_payment_id').value = paymentId;
    document.getElementById('modalPaymentName').textContent = 'Submit Payment - ' + paymentName;
    
    var myModal = new bootstrap.Modal(document.getElementById('paymentModal'));
    myModal.show();
}

function copyAddress(id, address) {
    // Create a temporary input element
    var tempInput = document.createElement('input');
    tempInput.value = address;
    document.body.appendChild(tempInput);
    tempInput.select();
    document.execCommand('copy');
    document.body.removeChild(tempInput);
    
    // Change button text temporarily
    var btn = event.target;
    var originalText = btn.innerHTML;
    btn.innerHTML = '✓ Copied!';
    btn.style.background = '#28a745';
    
    setTimeout(function() {
        btn.innerHTML = originalText;
        btn.style.background = '#667eea';
    }, 2000);
}

// Form validation
document.getElementById('paymentForm').addEventListener('submit', function(e) {
    var amount = document.querySelector('input[name="amount"]').value;
    var senderAddress = document.querySelector('input[name="sender_address"]').value;
    var transactionProof = document.querySelector('input[name="transaction_proof"]').files.length;
    
    if (!amount || !senderAddress || transactionProof === 0) {
        e.preventDefault();
        alert('Please fill all required fields!');
        return false;
    }
    
    if (parseFloat(amount) <= 0) {
        e.preventDefault();
        alert('Amount must be greater than 0!');
        return false;
    }
    
    return true;
});
</script>
@endsection