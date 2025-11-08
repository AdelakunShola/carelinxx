@extends('admin.admin_dashboard')

@section('admin')
<div class="container-fluid">
            
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>All Payments Type</h4>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0);">All Payments Type</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0);">All Payments Type</a></li>
                </ol>
            </div>
        </div>
        
        <div class="row">
            <div class="col-lg-12">
                <ul class="nav nav-pills mb-3">
                    <li class="nav-item"><a href="#list-view" data-bs-toggle="tab" class="nav-link me-1 show active">List View</a></li>
                </ul>
            </div>
            <div class="col-lg-12">
                <div class="row tab-content">
                    <div id="list-view" class="tab-pane fade active show col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">All Payments Type List</h4>
                                <a href="{{ route('add.fees.payment') }}" class="btn btn-primary">+ Add new</a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example3" class="display text-nowrap" style="min-width: 845px">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Payment Method</th>
                                                <th>Payment Name</th>
                                                <th>Payment Type</th>
                                                <th>Crypto Type</th>
                                                <th>QR Code</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($payments as $key => $payment)
                                            <tr>
                                                <td><strong>{{ $key + 1 }}</strong></td>
                                                <td>
                                                    @if($payment->payment_method == 'bank')
                                                        <span class="badge badge-rounded badge-info">Bank</span>
                                                    @elseif($payment->payment_method == 'btc')
                                                        <span class="badge badge-rounded badge-warning">BTC</span>
                                                    @else
                                                        <span class="badge badge-rounded badge-secondary">N/A</span>
                                                    @endif
                                                </td>
                                                <td>{{ $payment->payment_name ?? 'N/A' }}</td>
                                                <td>{{ $payment->payment_type ?? 'N/A' }}</td>
                                                <td>
                                                    @if($payment->crypto_type)
                                                        <span class="badge badge-primary">{{ strtoupper($payment->crypto_type) }}</span>
                                                    @else
                                                        N/A
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($payment->qr_code)
                                                        <img src="{{ asset('upload/qr_codes/' . $payment->qr_code) }}" alt="QR Code" style="width: 50px; height: 50px; object-fit: cover;">
                                                    @else
                                                        <span class="text-muted">No Image</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($payment->status == 'active')
                                                        <span class="badge badge-rounded badge-success">Active</span>
                                                    @else
                                                        <span class="badge badge-rounded badge-danger">Inactive</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ route('edit.fees.payment', $payment->id) }}" class="btn btn-xs sharp btn-primary" title="Edit"><i class="fa fa-pencil"></i></a>
                                                    <a href="{{ route('delete.fees.payment', $payment->id) }}" class="btn btn-xs sharp btn-danger" id="delete" title="Delete"><i class="fa fa-trash"></i></a>
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
        </div>
        
    </div>

@endsection