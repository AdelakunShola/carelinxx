@extends('admin.admin_dashboard')

@section('admin')

<div class="container-fluid">
    
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>Contact Message Details</h4>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.all.contacts') }}">Contact Messages</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0);">View Details</a></li>
            </ol>
        </div>
    </div>
    
    <div class="row">
        <div class="col-xl-8 col-xxl-8 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Message Information</h5>
                    <div>
                        @if($contact->status === 'pending')
                            <span class="badge badge-warning">Pending</span>
                        @elseif($contact->status === 'read')
                            <span class="badge badge-info">Read</span>
                        @else
                            <span class="badge badge-success">Replied</span>
                        @endif
                    </div>
                </div>
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="form-label"><strong>Full Name:</strong></label>
                                <p>{{ $contact->name }}</p>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="form-label"><strong>Email Address:</strong></label>
                                <p><a href="mailto:{{ $contact->email }}">{{ $contact->email }}</a></p>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="form-label"><strong>Phone Number:</strong></label>
                                <p>{{ $contact->phone ?? 'N/A' }}</p>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="form-label"><strong>Subject:</strong></label>
                                <p>{{ $contact->subject }}</p>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="form-label"><strong>Submitted:</strong></label>
                                <p>{{ $contact->created_at->format('M d, Y h:i A') }}</p>
                            </div>
                        </div>
                        @if($contact->replied_at)
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="form-label"><strong>Replied:</strong></label>
                                <p>{{ $contact->replied_at->format('M d, Y h:i A') }}</p>
                            </div>
                        </div>
                        @endif
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="form-label"><strong>Message:</strong></label>
                                <div class="alert alert-light">
                                    {{ $contact->message }}
                                </div>
                            </div>
                        </div>

                        @if($contact->admin_reply)
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="form-label"><strong>Your Reply:</strong></label>
                                <div class="alert alert-success">
                                    {{ $contact->admin_reply }}
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>

                   
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-xxl-4 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Quick Actions</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.update.contact.status', $contact->id) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label class="form-label">Update Status</label>
                            <select name="status" class="form-control" onchange="this.form.submit()">
                                <option value="pending" {{ $contact->status === 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="read" {{ $contact->status === 'read' ? 'selected' : '' }}>Read</option>
                                <option value="replied" {{ $contact->status === 'replied' ? 'selected' : '' }}>Replied</option>
                            </select>
                        </div>
                    </form>

                    <hr>

                    <div class="form-group">
                        <a href="{{ route('admin.delete.contact', $contact->id) }}" class="btn btn-danger btn-block" onclick="return confirm('Are you sure you want to delete this contact message?')">
                            Delete Message
                        </a>
                    </div>

                    <hr>

                    <div class="form-group">
                        <label class="form-label"><strong>Contact Info</strong></label>
                        <p class="mb-1"><small><strong>Email:</strong></small><br>
                        <a href="mailto:{{ $contact->email }}">{{ $contact->email }}</a></p>
                        
                        @if($contact->phone)
                        <p class="mb-1"><small><strong>Phone:</strong></small><br>
                        <a href="tel:{{ $contact->phone }}">{{ $contact->phone }}</a></p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>

@endsection

