@extends('admin.admin_dashboard')

@section('admin')
<div class="container-fluid">
            
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>All Jobs</h4>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0);">Jobs</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0);">All Jobs</a></li>
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
                                <h4 class="card-title">All Jobs List</h4>
                                <a href="{{ route('add.job') }}" class="btn btn-primary">+ Add new</a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example3" class="display text-nowrap" style="min-width: 845px">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Company Name</th>
                                                <th>Position</th>
                                                <th>Type</th>
                                                <th>Posted Date</th>
                                                <th>Last Date To Apply</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($jobs as $key => $job)
                                            <tr>
                                                <td><strong>{{ $key + 1 }}</strong></td>
                                                <td>{{ $job->company_name }}</td>
                                                <td>{{ $job->position }}</td>
                                                <td>{{ $job->job_type }}</td>
                                                <td>{{ $job->posted_date->format('Y/m/d') }}</td>
                                                <td>{{ $job->last_date->format('Y/m/d') }}</td>
                                                <td>
                                                    @if($job->status == 'active')
                                                        <span class="badge badge-rounded badge-success">Active</span>
                                                    @else
                                                        <span class="badge badge-rounded badge-danger">Inactive</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ route('edit.job', $job->id) }}" class="btn btn-xs sharp btn-primary" title="Edit"><i class="fa fa-pencil"></i></a>
                                                    <a href="{{ route('delete.job', $job->id) }}" class="btn btn-xs sharp btn-danger" id="delete" title="Delete"><i class="fa fa-trash"></i></a>
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