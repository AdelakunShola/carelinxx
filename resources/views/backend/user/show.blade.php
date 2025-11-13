@extends('admin.admin_dashboard')

@section('admin')
<div class="container-fluid">
    
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>User Details</h4>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.users.index') }}">Users</a></li>
                <li class="breadcrumb-item active">User Details</li>
            </ol>
        </div>
    </div>
    
    <div class="row">
        <!-- Profile Header -->
        <div class="col-xl-12 mb-3">
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-md-2 text-center">
                            @if($user->profile_photo_url)
                                <img src="{{ asset('storage/' . $user->profile_photo_url) }}" 
                                     alt="{{ $user->first_name }}" 
                                     style="width: 120px; height: 120px; border-radius: 50%; object-fit: cover;">
                            @else
                                <div style="width: 120px; height: 120px; border-radius: 50%; background: #00796B; color: white; display: flex; align-items: center; justify-content: center; font-size: 48px; font-weight: bold; margin: 0 auto;">
                                    {{ substr($user->first_name ?? 'U', 0, 1) }}
                                </div>
                            @endif
                        </div>
                        <div class="col-md-6">
                            <h3 class="mb-2">{{ $user->first_name }} {{ $user->last_name }}</h3>
                            <p class="mb-1"><strong>Email:</strong> {{ $user->email }}</p>
                            <p class="mb-1"><strong>Phone:</strong> {{ $user->phone_primary ?? 'N/A' }}</p>
                            <p class="mb-0"><strong>Role:</strong> 
                                @if($user->role == 'admin')
                                    <span class="badge badge-danger">Admin</span>
                                @else
                                    <span class="badge badge-primary">User</span>
                                @endif
                            </p>
                        </div>
                        <div class="col-md-4 text-right">
                            <!-- Status Update Forms -->
                            <form action="{{ route('admin.users.account-status', $user->id) }}" method="POST" class="mb-2">
                                @csrf
                                <label><strong>Account Status:</strong></label>
                                <select name="account_status" onchange="this.form.submit()" class="form-control">
                                    <option value="active" {{ $user->account_status == 'active' ? 'selected' : '' }}>Active</option>
                                    <option value="inactive" {{ $user->account_status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                                </select>
                            </form>

                            <form action="{{ route('admin.users.application-status', $user->id) }}" method="POST">
                                @csrf
                                <label><strong>Application Status:</strong></label>
                                <select name="application_status" onchange="this.form.submit()" class="form-control">
                                    <option value="pending" {{ $user->application_status == 'pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="under_review" {{ $user->application_status == 'under_review' ? 'selected' : '' }}>Under Review</option>
                                    <option value="approved" {{ $user->application_status == 'approved' ? 'selected' : '' }}>Approved</option>
                                    <option value="rejected" {{ $user->application_status == 'rejected' ? 'selected' : '' }}>Rejected</option>
                                </select>
                            </form>

                            <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-primary mt-3">
                                <i class="fa fa-edit"></i> Edit User
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Personal Information -->
        <div class="col-xl-6 col-lg-6">
            <div class="card">
                <div class="card-header bg-primary">
                    <h5 class="card-title text-white mb-0">
                        <i class="fa fa-user"></i> Personal Information
                    </h5>
                </div>
                <div class="card-body">
                    <table class="table table-borderless mb-0">
                        <tbody>
                            <tr>
                                <th width="45%">Title:</th>
                                <td>{{ $user->title ?? 'N/A' }}</td>
                            </tr>
                            <tr>
                                <th>Full Name:</th>
                                <td>{{ $user->first_name }} {{ $user->middle_name }} {{ $user->last_name }}</td>
                            </tr>
                            <tr>
                                <th>Preferred Name:</th>
                                <td>{{ $user->preferred_name ?? 'N/A' }}</td>
                            </tr>
                            <tr>
                                <th>Date of Birth:</th>
                                <td>{{ $user->date_of_birth ? \Carbon\Carbon::parse($user->date_of_birth)->format('d M Y') : 'N/A' }}</td>
                            </tr>
                            <tr>
                                <th>Gender:</th>
                                <td>{{ $user->gender ?? 'N/A' }}</td>
                            </tr>
                            <tr>
                                <th>Preferred Language:</th>
                                <td>{{ $user->preferred_language ?? 'N/A' }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Contact & Address -->
        <div class="col-xl-6 col-lg-6">
            <div class="card">
                <div class="card-header bg-info">
                    <h5 class="card-title text-white mb-0">
                        <i class="fa fa-map-marker"></i> Contact & Address
                    </h5>
                </div>
                <div class="card-body">
                    <table class="table table-borderless mb-0">
                        <tbody>
                            <tr>
                                <th width="45%">Primary Phone:</th>
                                <td>{{ $user->phone_primary ?? 'N/A' }}</td>
                            </tr>
                            <tr>
                                <th>Secondary Phone:</th>
                                <td>{{ $user->phone_secondary ?? 'N/A' }}</td>
                            </tr>
                            <tr>
                                <th>Address:</th>
                                <td>
                                    {{ $user->address_line1 }}<br>
                                    {{ $user->address_line2 }}<br>
                                    {{ $user->city }}, {{ $user->state_province }} {{ $user->postal_code }}<br>
                                    {{ $user->country }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Continue with more sections as needed... -->
        
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body text-center">
                    <a href="{{ route('admin.users.index') }}" class="btn btn-secondary btn-lg mr-2">
                        <i class="fa fa-arrow-left"></i> Back to List
                    </a>
                    <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-primary btn-lg">
                        <i class="fa fa-edit"></i> Edit User
                    </a>
                </div>
            </div>
        </div>
    </div>
    
</div>
@endsection