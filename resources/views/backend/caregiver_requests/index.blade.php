@extends('admin.admin_dashboard')

@section('admin')
<div class="container-fluid">
    
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>All Caregiver Requests</h4>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0);">Caregiver Requests</a></li>
            </ol>
        </div>
    </div>
    
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Caregiver Requests</h4>
                    <div>
                        <button class="btn btn-primary btn-sm" onclick="filterRequests('all')">All</button>
                        <button class="btn btn-warning btn-sm" onclick="filterRequests('incomplete')">Incomplete</button>
                        <button class="btn btn-info btn-sm" onclick="filterRequests('pending')">Pending</button>
                        <button class="btn btn-success btn-sm" onclick="filterRequests('matched')">Matched</button>
                        <button class="btn btn-danger btn-sm" onclick="filterRequests('cancelled')">Cancelled</button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="caregiverRequestsTable" class="display text-nowrap" style="min-width: 845px">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tracking #</th>
                                    <th>Who Needs Care</th>
                                    <th>Location</th>
                                    <th>Email</th>
                                    <th>Urgency</th>
                                    <th>Status</th>
                                    <th>Date Created</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($requests as $key => $request)
                                <tr data-status="{{ $request->status }}">
                                    <td><strong>{{ $key + 1 }}</strong></td>
                                    <td>
                                        <span class="badge badge-primary">{{ $request->tracking_number }}</span>
                                    </td>
                                    <td>{{ ucfirst(str_replace('_', ' ', $request->who_needs_care)) }}</td>
                                    <td>
                                        {{ $request->location_city ?? $request->location_postcode }}
                                    </td>
                                    <td>{{ $request->email ?? 'N/A' }}</td>
                                    <td>
                                        @if($request->urgency == 'immediately')
                                            <span class="badge badge-danger">Immediately</span>
                                        @elseif($request->urgency == 'within_2_weeks')
                                            <span class="badge badge-warning">Within 2 Weeks</span>
                                        @elseif($request->urgency == 'within_1_month')
                                            <span class="badge badge-info">Within 1 Month</span>
                                        @else
                                            <span class="text-muted">N/A</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($request->status == 'incomplete')
                                            <span class="badge badge-rounded badge-warning">Incomplete</span>
                                        @elseif($request->status == 'pending')
                                            <span class="badge badge-rounded badge-info">Pending</span>
                                        @elseif($request->status == 'matched')
                                            <span class="badge badge-rounded badge-success">Matched</span>
                                        @else
                                            <span class="badge badge-rounded badge-danger">Cancelled</span>
                                        @endif
                                    </td>
                                    <td>{{ $request->created_at->format('d M Y, h:i A') }}</td>
                                    <td>
                                        <a href="{{ route('admin.caregiver.request.show', $request->id) }}" class="btn btn-xs sharp btn-primary" title="View Details">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    
                    <div class="mt-3">
                        {{ $requests->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>

<script>
function filterRequests(status) {
    const rows = document.querySelectorAll('#caregiverRequestsTable tbody tr');
    rows.forEach(row => {
        if (status === 'all' || row.dataset.status === status) {
            row.style.display = '';
        } else {
            row.style.display = 'none';
        }
    });
}
</script>

@endsection