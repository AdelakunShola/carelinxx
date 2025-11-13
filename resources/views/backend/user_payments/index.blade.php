@extends('admin.admin_dashboard')

@section('admin')

<div class="container-fluid">
    
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>User Payments Management</h4>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">User Payments</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0);">All Payments</a></li>
            </ol>
        </div>
    </div>
    
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">All User Payments</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example3" class="display text-nowrap" style="min-width: 845px">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>User</th>
                                    <th>Transaction ID</th>
                                    <th>Payment Method</th>
                                    <th>Amount</th>
                                    <th>Status</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($payments as $key => $payment)
                                <tr>
                                    <td><strong>{{ $key + 1 }}</strong></td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <span class="w-space-no">{{ $payment->user->name ?? 'N/A' }}</span>
                                        </div>
                                        <small class="text-muted">{{ $payment->user->email ?? 'N/A' }}</small>
                                    </td>
                                    <td>
                                        <span style="font-family: 'Courier New', monospace; font-size: 12px;">
                                            {{ $payment->transaction_id }}
                                        </span>
                                    </td>
                                    <td>
                                        @if($payment->payment_method == 'bank')
                                            <span class="badge badge-rounded badge-info">Bank</span>
                                        @elseif($payment->payment_method == 'btc')
                                            <span class="badge badge-rounded badge-warning">BTC</span>
                                        @else
                                            <span class="badge badge-rounded badge-secondary">N/A</span>
                                        @endif
                                        @if($payment->crypto_type)
                                            <br><small class="badge badge-primary mt-1">{{ strtoupper($payment->crypto_type) }}</small>
                                        @endif
                                    </td>
                                    <td>
                                        <strong style="color: #28a745; font-size: 15px;">
                                            ${{ number_format($payment->amount, 2) }}
                                        </strong>
                                    </td>
                                    <td>
                                        @if($payment->status == 'pending')
                                            <span class="badge badge-rounded badge-warning">⏳ Pending</span>
                                        @elseif($payment->status == 'confirmed')
                                            <span class="badge badge-rounded badge-success">✅ Confirmed</span>
                                        @else
                                            <span class="badge badge-rounded badge-danger">❌ Rejected</span>
                                        @endif
                                    </td>
                                    <td>{{ $payment->created_at->format('M d, Y') }}<br>
                                        <small class="text-muted">{{ $payment->created_at->format('h:i A') }}</small>
                                    </td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="{{ route('admin.user.payment.show', $payment->id) }}" 
                                               class="btn btn-primary shadow btn-xs sharp me-1" 
                                               title="View Details">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            
                                            <a href="{{ route('admin.user.payment.edit', $payment->id) }}" 
                                               class="btn btn-info shadow btn-xs sharp me-1" 
                                               title="Edit Payment">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                                            
                                            @if($payment->status == 'pending')
                                            <button type="button" 
                                                    class="btn btn-success shadow btn-xs sharp me-1" 
                                                    title="Confirm Payment"
                                                    onclick="confirmPayment({{ $payment->id }})">
                                                <i class="fas fa-check"></i>
                                            </button>
                                            
                                            <button type="button" 
                                                    class="btn btn-danger shadow btn-xs sharp" 
                                                    title="Reject Payment"
                                                    onclick="rejectPayment({{ $payment->id }})">
                                                <i class="fas fa-times"></i>
                                            </button>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
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
                    <p>Are you sure you want to confirm this payment?</p>
                    <div class="form-group">
                        <label>Admin Note (Optional)</label>
                        <textarea name="admin_note" class="form-control" rows="3" placeholder="Add any notes..."></textarea>
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
                    <p>Please provide a reason for rejecting this payment:</p>
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