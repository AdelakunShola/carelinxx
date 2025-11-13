@extends('admin.admin_dashboard')

@section('admin')

<div class="container-fluid">
    
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>Payment Details</h4>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.user.payments') }}">User Payments</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0);">Payment Details</a></li>
            </ol>
        </div>
    </div>
    
    <div class="row">
        <div class="col-xl-8 col-xxl-8 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Transaction Information</h5>
                    @if($payment->status == 'pending')
                        <span class="badge badge-warning">⏳ Pending Review</span>
                    @elseif($payment->status == 'confirmed')
                        <span class="badge badge-success">✅ Confirmed</span>
                    @else
                        <span class="badge badge-danger">❌ Rejected</span>
                    @endif
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label"><strong>Transaction ID</strong></label>
                            <p style="font-family: 'Courier New', monospace; background: #f8f9fa; padding: 10px; border-radius: 5px;">
                                {{ $payment->transaction_id }}
                            </p>
                        </div>
                        
                        <div class="col-md-6 mb-3">
                            <label class="form-label"><strong>Amount</strong></label>
                            <p style="font-size: 24px; color: #28a745; font-weight: 700;">
                                ${{ number_format($payment->amount, 2) }}
                            </p>
                        </div>
                        
                        <div class="col-md-6 mb-3">
                            <label class="form-label"><strong>Payment Method</strong></label>
                            <p>
                                @if($payment->payment_method == 'bank')
                                    <span class="badge badge-info">Bank Transfer</span>
                                @else
                                    <span class="badge badge-warning">Cryptocurrency</span>
                                @endif
                            </p>
                        </div>
                        
                        <div class="col-md-6 mb-3">
                            <label class="form-label"><strong>Payment Type</strong></label>
                            <p>{{ $payment->payment_type ?? 'N/A' }}</p>
                        </div>
                        
                        <div class="col-md-6 mb-3">
                            <label class="form-label"><strong>Payment Name</strong></label>
                            <p>{{ $payment->payment_name ?? 'N/A' }}</p>
                        </div>
                        
                        @if($payment->crypto_type)
                        <div class="col-md-6 mb-3">
                            <label class="form-label"><strong>Crypto Network</strong></label>
                            <p>
                                <span class="badge badge-primary" style="font-size: 14px;">
                                    {{ strtoupper($payment->crypto_type) }}
                                </span>
                            </p>
                        </div>
                        @endif
                        
                        <div class="col-md-12 mb-3">
                            <label class="form-label"><strong>Sender Wallet Address</strong></label>
                            <p style="font-family: 'Courier New', monospace; background: #f8f9fa; padding: 10px; border-radius: 5px; word-break: break-all; font-size: 13px;">
                                {{ $payment->sender_address }}
                            </p>
                        </div>
                        
                        <div class="col-md-6 mb-3">
                            <label class="form-label"><strong>Submitted Date</strong></label>
                            <p>{{ $payment->created_at->format('M d, Y - h:i A') }}</p>
                        </div>
                        
                        @if($payment->confirmed_at)
                        <div class="col-md-6 mb-3">
                            <label class="form-label"><strong>Confirmed Date</strong></label>
                            <p style="color: #28a745;">
                                ✓ {{ $payment->confirmed_at->format('M d, Y - h:i A') }}
                            </p>
                        </div>
                        @endif
                        
                        @if($payment->admin_note)
                        <div class="col-md-12 mb-3">
                            <label class="form-label"><strong>Admin Note</strong></label>
                            <div class="alert alert-{{ $payment->status == 'confirmed' ? 'success' : 'danger' }}">
                                {{ $payment->admin_note }}
                            </div>
                        </div>
                        @endif
                    </div>
                    
                    <div class="row mt-4">
                        <div class="col-12">
                            <div class="d-flex gap-2">
                                <a href="{{ route('admin.user.payment.edit', $payment->id) }}" class="btn btn-info">
                                    <i class="fas fa-edit"></i> Edit Payment
                                </a>
                                
                                @if($payment->status == 'pending')
                                <button type="button" 
                                        class="btn btn-success" 
                                        onclick="confirmPayment({{ $payment->id }})">
                                    <i class="fas fa-check"></i> Confirm Payment
                                </button>
                                <button type="button" 
                                        class="btn btn-danger" 
                                        onclick="rejectPayment({{ $payment->id }})">
                                    <i class="fas fa-times"></i> Reject Payment
                                </button>
                                @endif
                                
                                <a href="{{ route('admin.user.payments') }}" class="btn btn-secondary">
                                    <i class="fas fa-arrow-left"></i> Back to List
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-xl-4 col-xxl-4 col-sm-12">
            <!-- User Information -->
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">User Information</h5>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label"><strong>Name</strong></label>
                        <p>{{ $payment->user->name ?? 'N/A' }}</p>
                    </div>
                    <div class="mb-3">
                        <label class="form-label"><strong>Email</strong></label>
                        <p>{{ $payment->user->email ?? 'N/A' }}</p>
                    </div>
                    <div class="mb-3">
                        <label class="form-label"><strong>User ID</strong></label>
                        <p>#{{ $payment->user_id }}</p>
                    </div>
                </div>
            </div>
            
            <!-- Payment Proof -->
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Payment Proof</h5>
                </div>
                <div class="card-body text-center">
                    @if($payment->transaction_proof)
                        <img src="{{ asset('upload/payment_proofs/' . $payment->transaction_proof) }}" 
                             alt="Payment Proof" 
                             style="max-width: 100%; border-radius: 10px; cursor: pointer; border: 3px solid #667eea;"
                             onclick="window.open(this.src, '_blank')">
                        <p class="mt-2"><small class="text-muted">Click to view full size</small></p>
                    @else
                        <p class="text-muted">No proof uploaded</p>
                    @endif
                </div>
            </div>
            
            <!-- Payment Gateway Info -->
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Payment Gateway Details</h5>
                </div>
                <div class="card-body">
                    @if($payment->feesPayment->qr_code)
                    <div class="text-center mb-3">
                        <label class="form-label"><strong>QR Code Used</strong></label>
                        <img src="{{ asset('upload/qr_codes/' . $payment->feesPayment->qr_code) }}" 
                             alt="QR Code" 
                             style="max-width: 150px; border-radius: 10px;">
                    </div>
                    @endif
                    
                    @if($payment->feesPayment->btc_address)
                    <div class="mb-3">
                        <label class="form-label"><strong>Receiving Address</strong></label>
                        <p style="font-family: 'Courier New', monospace; background: #f8f9fa; padding: 10px; border-radius: 5px; word-break: break-all; font-size: 11px;">
                            {{ $payment->feesPayment->btc_address }}
                        </p>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    
</div>

<!-- Confirm Modal -->
<div class="modal fade" id="confirmModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Confirm Payment</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form id="confirmForm" method="POST">
                @csrf
                <div class="modal-body">
                    <p>Are you sure you want to confirm this payment of <strong style="color: #28a745;">${{ number_format($payment->amount, 2) }}</strong>?</p>
                    <div class="form-group">
                        <label>Admin Note (Optional)</label>
                        <textarea name="admin_note" class="form-control" rows="3" placeholder="Add confirmation notes..."></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success">Confirm Payment</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Reject Modal -->
<div class="modal fade" id="rejectModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Reject Payment</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form id="rejectForm" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="alert alert-warning">
                        <strong>Warning:</strong> You are about to reject this payment. Please provide a clear reason.
                    </div>
                    <div class="form-group">
                        <label>Rejection Reason <span class="text-danger">*</span></label>
                        <textarea name="admin_note" class="form-control" rows="3" required placeholder="Explain why this payment is being rejected..."></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger">Reject Payment</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
function confirmPayment(paymentId) {
    const form = document.getElementById('confirmForm');
    form.action = '/admin/user-payments/' + paymentId + '/confirm';
    
    var myModal = new bootstrap.Modal(document.getElementById('confirmModal'));
    myModal.show();
}

function rejectPayment(paymentId) {
    const form = document.getElementById('rejectForm');
    form.action = '/admin/user-payments/' + paymentId + '/reject';
    
    var myModal = new bootstrap.Modal(document.getElementById('rejectModal'));
    myModal.show();
}
</script>

@endsection