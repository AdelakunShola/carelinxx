@extends('admin.admin_dashboard')

@section('admin')
<div class="container-fluid">
            
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>All Job Applications</h4>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Job Applications</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0);">All Applications</a></li>
            </ol>
        </div>
    </div>
    
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Filter Applications</h4>
                </div>
                <div class="card-body">
                    <form method="GET" action="{{ route('all.applications') }}">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Job Position</label>
                                    <select name="job_id" class="form-control">
                                        <option value="">All Jobs</option>
                                        @foreach($jobs as $job)
                                        <option value="{{ $job->id }}" {{ request('job_id') == $job->id ? 'selected' : '' }}>
                                            {{ $job->position }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Status</label>
                                    <select name="status" class="form-control">
                                        <option value="">All Status</option>
                                        <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                                        <option value="under_review" {{ request('status') == 'under_review' ? 'selected' : '' }}>Under Review</option>
                                        <option value="shortlisted" {{ request('status') == 'shortlisted' ? 'selected' : '' }}>Shortlisted</option>
                                        <option value="interview_scheduled" {{ request('status') == 'interview_scheduled' ? 'selected' : '' }}>Interview Scheduled</option>
                                        <option value="rejected" {{ request('status') == 'rejected' ? 'selected' : '' }}>Rejected</option>
                                        <option value="accepted" {{ request('status') == 'accepted' ? 'selected' : '' }}>Accepted</option>
                                        <option value="withdrawn" {{ request('status') == 'withdrawn' ? 'selected' : '' }}>Withdrawn</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>&nbsp;</label>
                                    <button type="submit" class="btn btn-primary form-control">Filter</button>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>&nbsp;</label>
                                    <a href="{{ route('all.applications') }}" class="btn btn-secondary form-control">Clear</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Job Applications List</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example3" class="display text-nowrap" style="min-width: 845px">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Applicant</th>
                                    <th>Job Position</th>
                                    <th>Company</th>
                                    <th>Applied Date</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($applications as $key => $application)
                                <tr>
                                    <td><strong>{{ $key + 1 }}</strong></td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <span class="w-space-no">{{ $application->user->first_name }} {{ $application->user->last_name }}</span>
                                        </div>
                                        <small class="text-muted">{{ $application->user->email }}</small>
                                    </td>
                                    <td>{{ $application->job->position }}</td>
                                    <td>{{ $application->job->company_name }}</td>
                                    <td>{{ \Carbon\Carbon::parse($application->applied_at)->format('M d, Y') }}</td>
                                    <td>
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
                                    </td>
                                    <td>
                                        <a href="{{ route('view.application', $application->id) }}" class="btn btn-xs sharp btn-info" title="View"><i class="fa fa-eye"></i></a>
                                        <a href="{{ route('edit.application', $application->id) }}" class="btn btn-xs sharp btn-primary" title="Edit Status"><i class="fa fa-pencil"></i></a>
                                        <a href="{{ route('delete.application', $application->id) }}" class="btn btn-xs sharp btn-danger" id="delete" title="Delete"><i class="fa fa-trash"></i></a>
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

@endsection