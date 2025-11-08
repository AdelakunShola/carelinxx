@extends('admin.admin_dashboard')

@section('admin')

<div class="container-fluid">
        
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>Edit Application Status</h4>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('all.applications') }}">All Applications</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0);">Edit Application</a></li>
            </ol>
        </div>
    </div>
    
    <div class="row">
        <div class="col-xl-12 col-xxl-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Application Information</h5>
                </div>
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <p><strong>Applicant:</strong> {{ $application->user->first_name }} {{ $application->user->last_name }}</p>
                            <p><strong>Email:</strong> {{ $application->user->email }}</p>
                        </div>
                        <div class="col-md-6">
                            <p><strong>Position:</strong> {{ $application->job->position }}</p>
                            <p><strong>Company:</strong> {{ $application->job->company_name }}</p>
                            <p><strong>Applied Date:</strong> {{ \Carbon\Carbon::parse($application->applied_at)->format('M d, Y g:i A') }}</p>
                        </div>
                    </div>

                    <hr>

                    <form action="{{ route('update.application', $application->id) }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-label" for="application_status">Application Status</label>
                                    <select id="application_status" name="application_status" class="form-control" required>
                                        <option value="">Choose...</option>
                                        <option value="pending" {{ $application->application_status == 'pending' ? 'selected' : '' }}>Pending</option>
                                        <option value="under_review" {{ $application->application_status == 'under_review' ? 'selected' : '' }}>Under Review</option>
                                        <option value="shortlisted" {{ $application->application_status == 'shortlisted' ? 'selected' : '' }}>Shortlisted</option>
                                        <option value="interview_scheduled" {{ $application->application_status == 'interview_scheduled' ? 'selected' : '' }}>Interview Scheduled</option>
                                        <option value="rejected" {{ $application->application_status == 'rejected' ? 'selected' : '' }}>Rejected</option>
                                        <option value="accepted" {{ $application->application_status == 'accepted' ? 'selected' : '' }}>Accepted</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-label" for="reviewed_at">Reviewed Date</label>
                                    <input id="reviewed_at" name="reviewed_at" type="datetime-local" class="form-control" value="{{ $application->reviewed_at ? \Carbon\Carbon::parse($application->reviewed_at)->format('Y-m-d\TH:i') : '' }}">
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <hr>
                                <h6 class="mb-3">Interview Details (Optional)</h6>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-label" for="interview_date">Interview Date & Time</label>
                                    <input id="interview_date" name="interview_date" type="datetime-local" class="form-control" value="{{ $application->interview_date ? \Carbon\Carbon::parse($application->interview_date)->format('Y-m-d\TH:i') : '' }}">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-label" for="interview_location">Interview Location</label>
                                    <input id="interview_location" name="interview_location" placeholder="Office address or online meeting link" type="text" class="form-control" value="{{ old('interview_location', $application->interview_location) }}">
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="form-label" for="interview_notes">Interview Notes</label>
                                    <textarea id="interview_notes" name="interview_notes" placeholder="Additional information for the candidate..." class="form-control" rows="3">{{ old('interview_notes', $application->interview_notes) }}</textarea>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <hr>
                                <h6 class="mb-3">Admin Notes</h6>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="form-label" for="admin_notes">Internal Notes (visible to candidate)</label>
                                    <textarea id="admin_notes" name="admin_notes" placeholder="Feedback or messages for the applicant..." class="form-control" rows="4">{{ old('admin_notes', $application->admin_notes) }}</textarea>
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <a href="{{ route('all.applications') }}" class="btn btn-light">Cancel</a>
                                <a href="{{ route('view.application', $application->id) }}" class="btn btn-secondary">View Details</a>
                                <button type="submit" class="btn btn-primary">Update Application</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
</div>

@endsection