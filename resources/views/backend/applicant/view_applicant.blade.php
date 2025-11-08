@extends('admin.admin_dashboard')

@section('admin')

<div class="container-fluid">
        
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>Application Details</h4>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('all.applications') }}">All Applications</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0);">Application Details</a></li>
            </ol>
        </div>
    </div>
    
    <div class="row">
        <div class="col-xl-12 col-xxl-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Applicant Information</h5>
                    @if($application->application_status == 'pending')
                        <span class="badge badge-rounded badge-warning">Pending</span>
                    @elseif($application->application_status == 'under_review')
                        <span class="badge badge-rounded badge-info">Under Review</span>
                    @elseif($application->application_status == 'shortlisted')
                        <span class="badge badge-rounded badge-primary">Shortlisted</span>
                    @elseif($application->application_status == 'interview_scheduled')
                        <span class="badge badge-rounded badge-success">Interview Scheduled</span>
                    @elseif($application->application_status == 'rejected')
                        <span class="badge badge-rounded badge-danger">Rejected</span>
                    @elseif($application->application_status == 'accepted')
                        <span class="badge badge-rounded badge-success">Accepted</span>
                    @elseif($application->application_status == 'withdrawn')
                        <span class="badge badge-rounded badge-secondary">Withdrawn</span>
                    @endif
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h6 class="mb-3">Personal Details</h6>
                            <table class="table table-borderless">
                                <tr>
                                    <td><strong>Full Name:</strong></td>
                                    <td>{{ $application->user->first_name }} {{ $application->user->last_name }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Email:</strong></td>
                                    <td>{{ $application->user->email }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Phone:</strong></td>
                                    <td>{{ $application->user->phone_primary ?? 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Date of Birth:</strong></td>
                                    <td>{{ $application->user->date_of_birth ? \Carbon\Carbon::parse($application->user->date_of_birth)->format('M d, Y') : 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Gender:</strong></td>
                                    <td>{{ $application->user->gender ?? 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Address:</strong></td>
                                    <td>{{ $application->user->address_line1 }}<br>
                                        {{ $application->user->city }}, {{ $application->user->state_province }}<br>
                                        {{ $application->user->country }}
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <h6 class="mb-3">Job Details</h6>
                            <table class="table table-borderless">
                                <tr>
                                    <td><strong>Position:</strong></td>
                                    <td>{{ $application->job->position }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Company:</strong></td>
                                    <td>{{ $application->job->company_name }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Job Type:</strong></td>
                                    <td>{{ $application->job->job_type }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Experience Required:</strong></td>
                                    <td>{{ $application->job->experience }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Applied Date:</strong></td>
                                    <td>{{ \Carbon\Carbon::parse($application->applied_at)->format('M d, Y g:i A') }}</td>
                                </tr>
                                @if($application->reviewed_at)
                                <tr>
                                    <td><strong>Reviewed Date:</strong></td>
                                    <td>{{ \Carbon\Carbon::parse($application->reviewed_at)->format('M d, Y g:i A') }}</td>
                                </tr>
                                @endif
                            </table>
                        </div>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-md-12">
                            <h6 class="mb-3">Cover Letter</h6>
                            <div class="alert alert-light">
                                {{ $application->cover_letter }}
                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-md-12">
                            <h6 class="mb-3">CV/Resume</h6>
                            @if($application->cv_document_url)
                                <a href="{{ Storage::url($application->cv_document_url) }}" target="_blank" class="btn btn-primary">
                                    <i class="fa fa-download"></i> Download CV/Resume
                                </a>
                            @else
                                <p class="text-muted">No CV uploaded</p>
                            @endif
                        </div>
                    </div>

                    @if($application->interview_date)
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <h6 class="mb-3">Interview Information</h6>
                            <div class="alert alert-info">
                                <strong>Interview Date:</strong> {{ \Carbon\Carbon::parse($application->interview_date)->format('M d, Y g:i A') }}<br>
                                @if($application->interview_location)
                                <strong>Location:</strong> {{ $application->interview_location }}<br>
                                @endif
                                @if($application->interview_notes)
                                <strong>Notes:</strong> {{ $application->interview_notes }}
                                @endif
                            </div>
                        </div>
                    </div>
                    @endif

                    @if($application->admin_notes)
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <h6 class="mb-3">Admin Notes</h6>
                            <div class="alert alert-secondary">
                                {{ $application->admin_notes }}
                            </div>
                        </div>
                    </div>
                    @endif

                    <hr>

                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <a href="{{ route('all.applications') }}" class="btn btn-light">Back to List</a>
                            <a href="{{ route('edit.application', $application->id) }}" class="btn btn-primary">Edit Status</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>

@endsection