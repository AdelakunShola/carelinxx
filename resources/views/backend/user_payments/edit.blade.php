@extends('admin.admin_dashboard')

@section('admin')

<div class="container-fluid">
    
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>Edit User Payment</h4>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.user.payments') }}">User Payments</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0);">Edit Payment</a></li>
            </ol>
        </div>
    </div>
    
    <div class="row">
        <div class="col-xl-12 col-xxl-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Payment Information</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.user.payment.update', $payment->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <!-- User Information (Read Only) -->
                            <div class="col-sm-12">
                                <div class="alert alert-info">
                                    <strong>User:</strong> {{ $payment->user->name ?? 'N/A' }} ({{ $payment->user->email ?? 'N/A' }})
                                </div>
                            </div>

                            <!-- Transaction ID (Read Only) -->
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-label">Transaction ID</label>
                                    <input type="text" class="form-control" value="{{ $payment->transaction_id }}" readonly style="background: #f8f9fa; font-family: 'Courier New', monospace;">
                                </div>
                            </div>

                            <!-- Payment Method Selection -->
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-label" for="fees_payment_id">Payment Method <span class="text-danger">*</span></label>
                                    <select id="fees_payment_id" name="fees_payment_id" class="form-control" required>
                                        <option value="">Choose...</option>
                                        @foreach($feesPayments as $fp)
                                            <option value="{{ $fp->id }}" 
                                                {{ $payment->fees_payment_id == $fp->id ? 'selected' : '' }}
                                                data-method="{{ $fp->payment_method }}"
                                                data-type="{{ $fp->payment_type }}"
                                                data-name="{{ $fp->payment_name }}"
                                                data-crypto="{{ $fp->crypto_type }}">
                                                {{ $fp->payment_name }} - {{ strtoupper($fp->payment_method) }}
                                                @if($fp->crypto_type)
                                                    ({{ strtoupper($fp->crypto_type) }})
                                                @endif
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <!-- Amount -->
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-label" for="amount">Amount (USD) <span class="text-danger">*</span></label>
                                    <input id="amount" name="amount" type="number" step="0.01" class="form-control" value="{{ old('amount', $payment->amount) }}" required>
                                </div>
                            </div>

                            <!-- Sender Address -->
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-label" for="sender_address">Sender Wallet Address <span class="text-danger">*</span></label>
                                    <input id="sender_address" name="sender_address" type="text" class="form-control" value="{{ old('sender_address', $payment->sender_address) }}" required style="font-family: 'Courier New', monospace;">
                                </div>
                            </div>

                            <!-- Status -->
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-label">Status <span class="text-danger">*</span></label>
                                    <select name="status" class="form-control" required>
                                        <option value="pending" {{ $payment->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                        <option value="confirmed" {{ $payment->status == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                                        <option value="rejected" {{ $payment->status == 'rejected' ? 'selected' : '' }}>Rejected</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Current Proof Display -->
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-label">Current Payment Proof</label>
                                    @if($payment->transaction_proof)
                                        <div>
                                            <img src="{{ asset('upload/payment_proofs/' . $payment->transaction_proof) }}" 
                                                 alt="Current Proof" 
                                                 style="max-width: 150px; border-radius: 10px; border: 2px solid #667eea; cursor: pointer;"
                                                 onclick="window.open(this.src, '_blank')">
                                            <p class="text-muted mt-2"><small>Click to view full size</small></p>
                                        </div>
                                    @else
                                        <p class="text-muted">No proof uploaded</p>
                                    @endif
                                </div>
                            </div>

                            <!-- Upload New Proof -->
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="form-label" for="transaction_proof">Upload New Payment Proof (Optional)</label>
                                    <input id="transaction_proof" name="transaction_proof" type="file" class="form-control" accept="image/*">
                                    <small class="text-muted">Leave empty to keep current proof. Max size: 2MB</small>
                                </div>
                            </div>

                            <!-- Admin Note -->
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="form-label" for="admin_note">Admin Note</label>
                                    <textarea id="admin_note" name="admin_note" class="form-control" rows="4" placeholder="Add any notes about this payment...">{{ old('admin_note', $payment->admin_note) }}</textarea>
                                </div>
                            </div>

                            <!-- Timestamps Display -->
                            <div class="col-sm-12">
                                <div class="alert alert-secondary">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <strong>Created:</strong> {{ $payment->created_at->format('M d, Y - h:i A') }}
                                        </div>
                                        <div class="col-md-6">
                                            <strong>Last Updated:</strong> {{ $payment->updated_at->format('M d, Y - h:i A') }}
                                        </div>
                                        @if($payment->confirmed_at)
                                        <div class="col-md-12 mt-2">
                                            <strong style="color: #28a745;">Confirmed At:</strong> {{ $payment->confirmed_at->format('M d, Y - h:i A') }}
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <!-- Action Buttons -->
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <a href="{{ route('admin.user.payments') }}" class="btn btn-secondary">
                                    <i class="fas fa-times"></i> Cancel
                                </a>
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i> Update Payment
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
</div>

<script>
// Show payment method details when changed
document.getElementById('fees_payment_id').addEventListener('change', function() {
    const selectedOption = this.options[this.selectedIndex];
    const method = selectedOption.getAttribute('data-method');
    const type = selectedOption.getAttribute('data-type');
    const name = selectedOption.getAttribute('data-name');
    const crypto = selectedOption.getAttribute('data-crypto');
    
    console.log('Selected Payment Method:', {
        method: method,
        type: type,
        name: name,
        crypto: crypto
    });
});
</script>

@endsection