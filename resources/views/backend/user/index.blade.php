{{-- ============================================ --}}
{{-- 1. resources/views/admin/users/index.blade.php --}}
{{-- ============================================ --}}

@extends('admin.admin_dashboard')

@section('admin')
<div class="container-fluid">
    
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>All Users</h4>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Users</li>
            </ol>
        </div>
    </div>
    
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">User Management</h4>
                    <div>
                        <a href="{{ route('admin.users.export') }}" class="btn btn-primary btn-sm">
                            <i class="fa fa-download"></i> Export CSV
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <!-- Filter Form -->
                    <form method="GET" action="{{ route('admin.users.index') }}" class="mb-4">
                        <div class="row">
                            <div class="col-md-3">
                                <input type="text" name="search" class="form-control" 
                                       placeholder="Search name, email, phone..." 
                                       value="{{ request('search') }}">
                            </div>
                            <div class="col-md-2">
                                <select name="role" class="form-control">
                                    <option value="all">All Roles</option>
                                    <option value="admin" {{ request('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                                    <option value="user" {{ request('role') == 'user' ? 'selected' : '' }}>User</option>
                                </select>
                            </div>
                            <div class="col-md-2">
                                <select name="account_status" class="form-control">
                                    <option value="all">All Status</option>
                                    <option value="active" {{ request('account_status') == 'active' ? 'selected' : '' }}>Active</option>
                                    <option value="inactive" {{ request('account_status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                                </select>
                            </div>
                            <div class="col-md-2">
                                <select name="application_status" class="form-control">
                                    <option value="all">All Applications</option>
                                    <option value="pending" {{ request('application_status') == 'pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="approved" {{ request('application_status') == 'approved' ? 'selected' : '' }}>Approved</option>
                                    <option value="rejected" {{ request('application_status') == 'rejected' ? 'selected' : '' }}>Rejected</option>
                                    <option value="under_review" {{ request('application_status') == 'under_review' ? 'selected' : '' }}>Under Review</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-search"></i> Filter
                                </button>
                                <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">
                                    <i class="fa fa-refresh"></i> Reset
                                </a>
                            </div>
                        </div>
                    </form>

                    <!-- Users Table -->
                    <div class="table-responsive">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Photo</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Role</th>
                                    <th>Account Status</th>
                                    <th>Application Status</th>
                                    <th>Registered</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($users as $user)
                                <tr>
                                    <td><strong>{{ $user->id }}</strong></td>
                                    <td>
                                        @if($user->profile_photo_url)
                                            <img src="{{ asset('storage/' . $user->profile_photo_url) }}" 
                                                 alt="{{ $user->first_name }}" 
                                                 style="width: 40px; height: 40px; border-radius: 50%; object-fit: cover;">
                                        @else
                                            <div style="width: 40px; height: 40px; border-radius: 50%; background: #00796B; color: white; display: flex; align-items: center; justify-content: center; font-weight: bold;">
                                                {{ substr($user->first_name ?? 'U', 0, 1) }}
                                            </div>
                                        @endif
                                    </td>
                                    <td>
                                        <strong>{{ $user->first_name }} {{ $user->last_name }}</strong>
                                        @if($user->preferred_name)
                                            <br><small class="text-muted">"{{ $user->preferred_name }}"</small>
                                        @endif
                                    </td>
                                    <td>{{ $user->email ?? 'N/A' }}</td>
                                    <td>{{ $user->phone_primary ?? 'N/A' }}</td>
                                    <td>
                                        @if($user->role == 'admin')
                                            <span class="badge badge-danger">Admin</span>
                                        @else
                                            <span class="badge badge-primary">User</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($user->account_status == 'active')
                                            <span class="badge badge-success">Active</span>
                                        @else
                                            <span class="badge badge-secondary">Inactive</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($user->application_status == 'approved')
                                            <span class="badge badge-success">Approved</span>
                                        @elseif($user->application_status == 'pending')
                                            <span class="badge badge-warning">Pending</span>
                                        @elseif($user->application_status == 'under_review')
                                            <span class="badge badge-info">Under Review</span>
                                        @else
                                            <span class="badge badge-danger">Rejected</span>
                                        @endif
                                    </td>
                                    <td>{{ $user->created_at->format('d M Y') }}</td>
                                    <td>
                                        <a href="{{ route('admin.users.show', $user->id) }}" 
                                           class="btn btn-xs btn-info" title="View Details">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        <a href="{{ route('admin.users.edit', $user->id) }}" 
                                           class="btn btn-xs btn-primary" title="Edit">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        @if($user->id !== auth()->id())
                                        <form action="{{ route('admin.users.destroy', $user->id) }}" 
                                              method="POST" style="display: inline;" 
                                              onsubmit="return confirm('Are you sure you want to delete this user?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-xs btn-danger" title="Delete">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                        @endif
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="10" class="text-center">No users found</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    
                    <!-- Pagination -->
                    <div class="mt-3">
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>
@endsection


