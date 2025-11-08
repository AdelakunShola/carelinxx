@extends('admin.admin_dashboard')

@section('admin')

<div class="container-fluid">
        
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Edit Payments Type</h4>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('all.fees.payments') }}">Edit Payments Type</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0);">Edit Payments Type</a></li>
                </ol>
            </div>
        </div>
        
        <div class="row">
            <div class="col-xl-12 col-xxl-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Edit Payment Information</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('update.fees.payment', $payment->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="form-label" for="payment_method">Payment Method</label>
                                        <select id="payment_method" name="payment_method" class="form-control">
                                            <option value="">Choose...</option>
                                            <option value="bank" {{ old('payment_method', $payment->payment_method) == 'bank' ? 'selected' : '' }}>Bank</option>
                                            <option value="btc" {{ old('payment_method', $payment->payment_method) == 'btc' ? 'selected' : '' }}>BTC</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="form-label" for="payment_type">Payment Type</label>
                                        <input id="payment_type" name="payment_type" placeholder="Payment Type" type="text" class="form-control" value="{{ old('payment_type', $payment->payment_type) }}">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="form-label" for="payment_name">Payment Name</label>
                                        <input id="payment_name" name="payment_name" placeholder="Payment Name" type="text" class="form-control" value="{{ old('payment_name', $payment->payment_name) }}">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="form-label" for="crypto_type">Crypto Type</label>
                                        <select id="crypto_type" name="crypto_type" class="form-control">
                                            <option value="">Choose...</option>
                                            <option value="usdt" {{ old('crypto_type', $payment->crypto_type) == 'usdt' ? 'selected' : '' }}>USDT</option>
                                            <option value="ethereum" {{ old('crypto_type', $payment->crypto_type) == 'ethereum' ? 'selected' : '' }}>Ethereum</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label" for="btc_address">BTC Address</label>
                                        <input id="btc_address" name="btc_address" placeholder="BTC Address" type="text" class="form-control" value="{{ old('btc_address', $payment->btc_address) }}">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label" for="qr_code">Upload QR Code</label>
                                        <input id="qr_code" name="qr_code" type="file" class="form-control" accept="image/*">
                                        @if($payment->qr_code)
                                            <div class="mt-2">
                                                <img src="{{ asset('upload/qr_codes/' . $payment->qr_code) }}" alt="Current QR Code" style="width: 100px; height: 100px; object-fit: cover; border: 1px solid #ddd; padding: 5px;">
                                                <p class="text-muted mt-1">Current QR Code</p>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Status:</label>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="status" id="status_active" value="active" {{ old('status', $payment->status) == 'active' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="status_active">Active</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="status" id="status_inactive" value="inactive" {{ old('status', $payment->status) == 'inactive' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="status_inactive">In-Active</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <a href="{{ route('all.fees.payments') }}" class="btn btn-light">Close</a>
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
    </div>

@endsection