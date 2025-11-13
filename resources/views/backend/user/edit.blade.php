@extends('admin.admin_dashboard')

@section('admin')
<div class="container-fluid">
    
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>Edit User</h4>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.users.index') }}">Users</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.users.show', $user->id) }}">User Details</a></li>
                <li class="breadcrumb-item active">Edit</li>
            </ol>
        </div>
    </div>
    
    <form action="{{ route('admin.users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="row">
            <!-- Basic Identity -->
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header bg-primary">
                        <h5 class="card-title text-white mb-0">
                            <i class="fa fa-user"></i> Basic Identity
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 mb-3 text-center">
                                <label><strong>Profile Photo</strong></label><br>
                                @if($user->profile_photo_url)
                                    <img src="{{ asset('storage/' . $user->profile_photo_url) }}" 
                                         alt="Profile" 
                                         style="width: 150px; height: 150px; border-radius: 50%; object-fit: cover; margin-bottom: 10px;">
                                @endif
                                <input type="file" name="profile_photo" class="form-control" accept="image/*">
                            </div>

                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Title</label>
                                    <select name="title" class="form-control">
                                        <option value="">Select</option>
                                        <option value="Mr" {{ $user->title == 'Mr' ? 'selected' : '' }}>Mr</option>
                                        <option value="Mrs" {{ $user->title == 'Mrs' ? 'selected' : '' }}>Mrs</option>
                                        <option value="Ms" {{ $user->title == 'Ms' ? 'selected' : '' }}>Ms</option>
                                        <option value="Dr" {{ $user->title == 'Dr' ? 'selected' : '' }}>Dr</option>
                                        <option value="Prof" {{ $user->title == 'Prof' ? 'selected' : '' }}>Prof</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>First Name</label>
                                    <input type="text" name="first_name" class="form-control" value="{{ $user->first_name }}">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Middle Name</label>
                                    <input type="text" name="middle_name" class="form-control" value="{{ $user->middle_name }}">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Last Name</label>
                                    <input type="text" name="last_name" class="form-control" value="{{ $user->last_name }}">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Preferred Name</label>
                                    <input type="text" name="preferred_name" class="form-control" value="{{ $user->preferred_name }}">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Date of Birth</label>
                                    <input type="date" name="date_of_birth" class="form-control" value="{{ $user->date_of_birth }}">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Gender</label>
                                    <select name="gender" class="form-control">
                                        <option value="">Select</option>
                                        <option value="Male" {{ $user->gender == 'Male' ? 'selected' : '' }}>Male</option>
                                        <option value="Female" {{ $user->gender == 'Female' ? 'selected' : '' }}>Female</option>
                                        <option value="Other" {{ $user->gender == 'Other' ? 'selected' : '' }}>Other</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Contact Information -->
            <div class="col-xl-6">
                <div class="card">
                    <div class="card-header bg-info">
                        <h5 class="card-title text-white mb-0">
                            <i class="fa fa-phone"></i> Contact Information
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Email *</label>
                            <input type="email" name="email" class="form-control" value="{{ $user->email }}" required>
                        </div>

                        <div class="form-group">
                            <label>Primary Phone</label>
                            <input type="text" name="phone_primary" class="form-control" value="{{ $user->phone_primary }}">
                        </div>

                        <div class="form-group">
                            <label>Secondary Phone</label>
                            <input type="text" name="phone_secondary" class="form-control" value="{{ $user->phone_secondary }}">
                        </div>

                        <div class="form-group">
                            <label>Preferred Language</label>
                            <input type="text" name="preferred_language" class="form-control" value="{{ $user->preferred_language }}">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Address -->
            <div class="col-xl-6">
                <div class="card">
                    <div class="card-header bg-success">
                        <h5 class="card-title text-white mb-0">
                            <i class="fa fa-map-marker"></i> Address
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Address Line 1</label>
                            <input type="text" name="address_line1" class="form-control" value="{{ $user->address_line1 }}">
                        </div>

                        <div class="form-group">
                            <label>Address Line 2</label>
                            <input type="text" name="address_line2" class="form-control" value="{{ $user->address_line2 }}">
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>City</label>
                                    <input type="text" name="city" class="form-control" value="{{ $user->city }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>State/Province</label>
                                    <input type="text" name="state_province" class="form-control" value="{{ $user->state_province }}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Postal Code</label>
                                    <input type="text" name="postal_code" class="form-control" value="{{ $user->postal_code }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Country</label>
                                    <input type="text" name="country" class="form-control" value="{{ $user->country }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- System Settings -->
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header bg-warning">
                        <h5 class="card-title text-white mb-0">
                            <i class="fa fa-cog"></i> System Settings
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Role *</label>
                                    <select name="role" class="form-control" required>
                                        <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>User</option>
                                        <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Account Status</label>
                                    <select name="account_status" class="form-control">
                                        <option value="active" {{ $user->account_status == 'active' ? 'selected' : '' }}>Active</option>
                                        <option value="inactive" {{ $user->account_status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Application Status</label>
                                    <select name="application_status" class="form-control">
                                        <option value="pending" {{ $user->application_status == 'pending' ? 'selected' : '' }}>Pending</option>
                                        <option value="under_review" {{ $user->application_status == 'under_review' ? 'selected' : '' }}>Under Review</option>
                                        <option value="approved" {{ $user->application_status == 'approved' ? 'selected' : '' }}>Approved</option>
                                        <option value="rejected" {{ $user->application_status == 'rejected' ? 'selected' : '' }}>Rejected</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Password Reset -->
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header bg-danger">
                        <h5 class="card-title text-white mb-0">
                            <i class="fa fa-lock"></i> Change Password (Optional)
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>New Password</label>
                                    <input type="password" name="password" class="form-control" placeholder="Leave blank to keep current password">
                                    <small class="text-muted">Minimum 8 characters</small>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Confirm Password</label>
                                    <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm new password">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Submit Buttons -->
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body text-center">
                        <a href="{{ route('admin.users.show', $user->id) }}" class="btn btn-secondary btn-lg mr-2">
                            <i class="fa fa-times"></i> Cancel
                        </a>
                        <button type="submit" class="btn btn-primary btn-lg">
                            <i class="fa fa-save"></i> Update User
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    
</div>

<script>
// Preview profile photo before upload
document.querySelector('input[name="profile_photo"]').addEventListener('change', function(e) {
    if (e.target.files && e.target.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
            const img = document.querySelector('img[alt="Profile"]');
            if (img) {
                img.src = e.target.result;
            }
        };
        reader.readAsDataURL(e.target.files[0]);
    }
});
</script>

@endsection