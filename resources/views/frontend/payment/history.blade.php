@extends('user.user_dashboard')

@section('user')
<style>
    .history-container {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        min-height: 100vh;
        padding: 40px 0;
    }
    
    .history-card {
        background: white;
        border-radius: 20px;
        padding: 30px;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
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
    
    .status-badge {
        padding: 8px 20px;
        border-radius: 25px;
        font-size: 13px;
        font-weight: 600;
    }
    
    .status-pending {
        background: #fff3cd;
        color: #856404;
    }
    
    .status-confirmed {
        background: #d4edda;
        color: #155724;
    }
    
    .status-rejected {
        background: #f8d7da;
        color: #721c24;
    }
    
    .transaction-card {
        border: 1px solid #e0e0e0;
        border-radius: 15px;
        padding: 20px;
        margin-bottom: 20px;
        transition: all 0.3s ease;
    }
    
    .transaction-card:hover {
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        transform: translateY(-2px);
    }
    
    .transaction-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 15px;
        padding-bottom: 15px;
        border-bottom: 2px solid #f0f0f0;
    }
    
    .transaction-id {
        font-family: 'Courier New', monospace;
        font-weight: 600;
        color: #667eea;
        font-size: 16px;
    }
    
    .transaction-details {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 15px;
        margin: 15px 0;
    }
    
    .detail-item {
        display: flex;
        flex-direction: column;
    }
    
    .detail-label {
        font-size: 12px;
        color: #666;
        font-weight: 600;
        margin-bottom: 5px;
    }
    
    .detail-value {
        font-size: 14px;
        color: #333;
        font-weight: 500;
    }
    
    .proof-image {
        width: 100px;
        height: 100px;
        object-fit: cover;
        border-radius: 10px;
        cursor: pointer;
        border: 2px solid #667eea;
    }
    
    .empty-state {
        text-align: center;
        padding: 60px 20px;
    }
    
    .empty-state img {
        width: 200px;
        opacity: 0.5;
        margin-bottom: 20px;
    }
</style>

<div class="history-container">
    <div class="container">
        <div class="page-header">
            <h1>📊 Payment History</h1>
            <p>Track all your payment transactions</p>
        </div>

        <div class="history-card">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4 style="margin: 0; color: #333;">Your Transactions</h4>
                <a href="{{ route('payment.methods') }}" class="btn btn-primary" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); border: none; padding: 10px 25px; border-radius: 10px;">
                    + New Payment
                </a>
            </div>

            @forelse($payments as $payment)
            <div class="transaction-card">
                <div class="transaction-header">
                    <div>
                        <div class="transaction-id">{{ $payment->transaction_id }}</div>
                        <small style="color: #999;">{{ $payment->created_at->format('M d, Y - h:i A') }}</small>
                    </div>
                    <span class="status-badge status-{{ $payment->status }}">
                        @if($payment->status == 'pending')
                            ⏳ Pending
                        @elseif($payment->status == 'confirmed')
                            ✅ Confirmed
                        @else
                            ❌ Rejected
                        @endif
                    </span>
                </div>

                <div class="transaction-details">
                    <div class="detail-item">
                        <span class="detail-label">Payment Method</span>
                        <span class="detail-value">
                            @if($payment->payment_method == 'btc')
                                <span style="color: #f5576c;">₿ Crypto</span>
                            @else
                                <span style="color: #667eea;">🏦 Bank</span>
                            @endif
                        </span>
                    </div>

                    <div class="detail-item">
                        <span class="detail-label">Payment Name</span>
                        <span class="detail-value">{{ $payment->payment_name }}</span>
                    </div>

                    <div class="detail-item">
                        <span class="detail-label">Amount</span>
                        <span class="detail-value" style="color: #28a745; font-weight: 700; font-size: 16px;">
                            ${{ number_format($payment->amount, 2) }}
                        </span>
                    </div>

                    @if($payment->crypto_type)
                    <div class="detail-item">
                        <span class="detail-label">Network</span>
                        <span class="detail-value">
                            <span style="background: #ffd700; padding: 3px 10px; border-radius: 5px; font-size: 12px; font-weight: 600;">
                                {{ strtoupper($payment->crypto_type) }}
                            </span>
                        </span>
                    </div>
                    @endif

                    <div class="detail-item">
                        <span class="detail-label">Sender Address</span>
                        <span class="detail-value" style="font-family: 'Courier New', monospace; font-size: 12px; word-break: break-all;">
                            {{ Str::limit($payment->sender_address, 30) }}
                        </span>
                    </div>

                    @if($payment->transaction_proof)
                    <div class="detail-item">
                        <span class="detail-label">Payment Proof</span>
                        <img src="{{ asset('upload/payment_proofs/' . $payment->transaction_proof) }}" 
                             alt="Proof" 
                             class="proof-image"
                             onclick="window.open(this.src, '_blank')">
                    </div>
                    @endif
                </div>

                @if($payment->admin_note)
                <div style="background: #f8f9fa; padding: 15px; border-radius: 10px; margin-top: 15px; border-left: 4px solid {{ $payment->status == 'confirmed' ? '#28a745' : '#dc3545' }};">
                    <strong style="font-size: 12px; color: #666;">Admin Note:</strong>
                    <p style="margin: 5px 0 0 0; color: #333;">{{ $payment->admin_note }}</p>
                </div>
                @endif

                @if($payment->confirmed_at)
                <div style="text-align: right; margin-top: 10px;">
                    <small style="color: #28a745; font-weight: 600;">
                        ✓ Confirmed on {{ $payment->confirmed_at->format('M d, Y - h:i A') }}
                    </small>
                </div>
                @endif
            </div>
            @empty
            <div class="empty-state">
                <div style="font-size: 80px; margin-bottom: 20px;">📭</div>
                <h4 style="color: #666;">No Payment History</h4>
                <p style="color: #999; margin-bottom: 30px;">You haven't made any payments yet</p>
                <a href="{{ route('payment.methods') }}" class="btn btn-primary" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); border: none; padding: 12px 30px; border-radius: 10px;">
                    Make Your First Payment
                </a>
            </div>
            @endforelse
        </div>
    </div>
</div>

@endsection 