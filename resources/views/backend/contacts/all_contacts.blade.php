@extends('admin.admin_dashboard')

@section('admin')

<div class="container-fluid">
    
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>All Contact Messages</h4>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0);">Contact Messages</a></li>
            </ol>
        </div>
    </div>
    
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Contact Messages List</h4>
                    <div>
                        <span class="badge badge-primary">Total: {{ $contacts->count() }}</span>
                        <span class="badge badge-warning">Pending: {{ $contacts->where('status', 'pending')->count() }}</span>
                        <span class="badge badge-info">Read: {{ $contacts->where('status', 'read')->count() }}</span>
                        <span class="badge badge-success">Replied: {{ $contacts->where('status', 'replied')->count() }}</span>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-responsive-md">
                            <thead>
                                <tr>
                                    <th style="width:50px;">
                                        <strong>#</strong>
                                    </th>
                                    <th><strong>NAME</strong></th>
                                    <th><strong>EMAIL</strong></th>
                                    <th><strong>PHONE</strong></th>
                                    <th><strong>SUBJECT</strong></th>
                                    <th><strong>STATUS</strong></th>
                                    <th><strong>DATE</strong></th>
                                    <th><strong>ACTION</strong></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($contacts as $key => $contact)
                                <tr>
                                    <td><strong>{{ $key + 1 }}</strong></td>
                                    <td>{{ $contact->name }}</td>
                                    <td>{{ $contact->email }}</td>
                                    <td>{{ $contact->phone ?? 'N/A' }}</td>
                                    <td>{{ Str::limit($contact->subject, 30) }}</td>
                                    <td>
                                        @if($contact->status === 'pending')
                                            <span class="badge badge-warning">Pending</span>
                                        @elseif($contact->status === 'read')
                                            <span class="badge badge-info">Read</span>
                                        @else
                                            <span class="badge badge-success">Replied</span>
                                        @endif
                                    </td>
                                    <td>{{ $contact->created_at->format('M d, Y') }}</td>
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn btn-primary light sharp" data-toggle="dropdown">
                                                <svg width="20px" height="20px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24"/>
                                                        <circle fill="#000000" cx="5" cy="12" r="2"/>
                                                        <circle fill="#000000" cx="12" cy="12" r="2"/>
                                                        <circle fill="#000000" cx="19" cy="12" r="2"/>
                                                    </g>
                                                </svg>
                                            </button>
                                            <div class="">
                                                <a class="dropdown-item" href="{{ route('admin.view.contact', $contact->id) }}">View Details</a>
                                                <a class="dropdown-item" href="{{ route('admin.delete.contact', $contact->id) }}" onclick="return confirm('Are you sure you want to delete this contact?')">Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="8" class="text-center">No contact messages found</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>

@endsection


