@extends('admin.admin_dashboard')

@section('admin')
<div class="container-fluid">
    
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>Caregiver Request Details</h4>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.caregiver.requests') }}">Caregiver Requests</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0);">Request Details</a></li>
            </ol>
        </div>
    </div>
    
    <div class="row">
        <!-- Status Update Card -->
        <div class="col-xl-12 mb-3">
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <h4 class="mb-2">Request #{{ $request->tracking_number }}</h4>
                            <div class="d-flex align-items-center">
                                <div class="progress" style="height: 25px; width: 300px;">
                                    @php
                                        $progress = $request->getProgressPercentage();
                                        $progressClass = 'bg-danger';
                                        if($progress >= 80) {
                                            $progressClass = 'bg-success';
                                        } elseif($progress >= 50) {
                                            $progressClass = 'bg-warning';
                                        } elseif($progress >= 30) {
                                            $progressClass = 'bg-info';
                                        }
                                    @endphp
                                    <div class="progress-bar {{ $progressClass }}" 
                                         role="progressbar" 
                                         style="width: {{ $progress }}%">
                                        <strong>{{ round($progress) }}%</strong>
                                    </div>
                                </div>
                                <span class="ml-3 text-muted">Step {{ $request->current_step }}/6</span>
                            </div>
                        </div>
                        <div class="col-md-4 text-right">
                            <form action="{{ route('admin.caregiver.request.status', $request->id) }}" method="POST" style="display: inline;">
                                @csrf
                                <label class="mr-2"><strong>Update Status:</strong></label>
                                <select name="status" onchange="this.form.submit()" class="form-control form-control-lg" style="width: auto; display: inline-block;">
                                    <option value="incomplete" {{ $request->status == 'incomplete' ? 'selected' : '' }}>Incomplete</option>
                                    <option value="pending" {{ $request->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="matched" {{ $request->status == 'matched' ? 'selected' : '' }}>Matched</option>
                                    <option value="completed" {{ $request->status == 'completed' ? 'selected' : '' }}>Completed</option>
                                    <option value="cancelled" {{ $request->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                                </select>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Basic Information -->
        <div class="col-xl-6 col-lg-6">
            <div class="card">
                <div class="card-header bg-primary">
                    <h5 class="card-title text-white mb-0">
                        <i class="fa fa-info-circle"></i> Basic Information
                    </h5>
                </div>
                <div class="card-body">
                    <table class="table table-borderless mb-0">
                        <tbody>
                            <tr>
                                <th width="45%" class="pl-0">
                                    <i class="fa fa-hashtag text-primary"></i> Tracking Number:
                                </th>
                                <td>
                                    <span class="badge badge-primary badge-lg">{{ $request->tracking_number }}</span>
                                </td>
                            </tr>
                            <tr>
                                <th class="pl-0">
                                    <i class="fa fa-user text-primary"></i> Care Recipient:
                                </th>
                                <td><strong>{{ $request->care_recipient }}</strong></td>
                            </tr>
                            <tr>
                                <th class="pl-0">
                                    <i class="fa fa-circle text-primary"></i> Status:
                                </th>
                                <td>
                                    @if($request->status == 'incomplete')
                                        <span class="badge badge-rounded badge-warning badge-lg">
                                            <i class="fa fa-clock-o"></i> Incomplete
                                        </span>
                                    @elseif($request->status == 'pending')
                                        <span class="badge badge-rounded badge-info badge-lg">
                                            <i class="fa fa-hourglass-half"></i> Pending
                                        </span>
                                    @elseif($request->status == 'matched')
                                        <span class="badge badge-rounded badge-primary badge-lg">
                                            <i class="fa fa-users"></i> Matched
                                        </span>
                                    @elseif($request->status == 'completed')
                                        <span class="badge badge-rounded badge-success badge-lg">
                                            <i class="fa fa-check-circle"></i> Completed
                                        </span>
                                    @else
                                        <span class="badge badge-rounded badge-danger badge-lg">
                                            <i class="fa fa-times-circle"></i> Cancelled
                                        </span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th class="pl-0">
                                    <i class="fa fa-calendar text-primary"></i> Created:
                                </th>
                                <td>
                                    {{ $request->created_at->format('d M Y, h:i A') }}<br>
                                    <small class="text-muted">({{ $request->created_at->diffForHumans() }})</small>
                                </td>
                            </tr>
                            @if($request->completed_at)
                            <tr>
                                <th class="pl-0">
                                    <i class="fa fa-check text-success"></i> Completed:
                                </th>
                                <td>
                                    {{ $request->completed_at->format('d M Y, h:i A') }}<br>
                                    <small class="text-muted">({{ $request->completed_at->diffForHumans() }})</small>
                                </td>
                            </tr>
                            @endif
                            <tr>
                                <th class="pl-0">
                                    <i class="fa fa-clock-o text-primary"></i> Last Updated:
                                </th>
                                <td>
                                    {{ $request->updated_at->format('d M Y, h:i A') }}<br>
                                    <small class="text-muted">({{ $request->updated_at->diffForHumans() }})</small>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Contact Information -->
        <div class="col-xl-6 col-lg-6">
            <div class="card">
                <div class="card-header bg-info">
                    <h5 class="card-title text-white mb-0">
                        <i class="fa fa-address-card"></i> Contact Information
                    </h5>
                </div>
                <div class="card-body">
                    <table class="table table-borderless mb-0">
                        <tbody>
                            <tr>
                                <th width="45%" class="pl-0">
                                    <i class="fa fa-user-circle text-info"></i> Name:
                                </th>
                                <td>{{ $request->name ?? 'N/A' }}</td>
                            </tr>
                            <tr>
                                <th class="pl-0">
                                    <i class="fa fa-envelope text-info"></i> Email:
                                </th>
                                <td>
                                    @if($request->email)
                                        <a href="mailto:{{ $request->email }}">{{ $request->email }}</a>
                                    @else
                                        N/A
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th class="pl-0">
                                    <i class="fa fa-phone text-info"></i> Phone:
                                </th>
                                <td>
                                    @if($request->phone)
                                        <a href="tel:{{ $request->phone }}">{{ $request->phone }}</a>
                                    @else
                                        N/A
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th class="pl-0">
                                    <i class="fa fa-map-marker text-info"></i> Postcode:
                                </th>
                                <td><strong>{{ $request->postcode }}</strong></td>
                            </tr>
                            <tr>
                                <th class="pl-0">
                                    <i class="fa fa-building text-info"></i> City:
                                </th>
                                <td>{{ $request->city ?? 'N/A' }}</td>
                            </tr>
                            @if($request->address)
                            <tr>
                                <th class="pl-0">
                                    <i class="fa fa-home text-info"></i> Address:
                                </th>
                                <td>{{ $request->address }}</td>
                            </tr>
                            @endif
                            @if($request->latitude && $request->longitude)
                            <tr>
                                <th class="pl-0">
                                    <i class="fa fa-map text-info"></i> Coordinates:
                                </th>
                                <td>
                                    <small>{{ $request->latitude }}, {{ $request->longitude }}</small>
                                    <a href="https://www.google.com/maps?q={{ $request->latitude }},{{ $request->longitude }}" target="_blank" class="btn btn-xs btn-info ml-2">
                                        <i class="fa fa-external-link"></i> View Map
                                    </a>
                                </td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Care Requirements -->
        <div class="col-xl-6 col-lg-6">
            <div class="card">
                <div class="card-header bg-warning">
                    <h5 class="card-title text-white mb-0">
                        <i class="fa fa-heartbeat"></i> Care Requirements
                    </h5>
                </div>
                <div class="card-body">
                    <table class="table table-borderless mb-0">
                        <tbody>
                            <tr>
                                <th width="45%" class="pl-0">
                                    <i class="fa fa-exclamation-triangle text-warning"></i> Urgency:
                                </th>
                                <td>
                                    @if($request->urgency)
                                        @if($request->urgency == 'immediately')
                                            <span class="badge badge-danger badge-lg">
                                                <i class="fa fa-bolt"></i> Immediately
                                            </span>
                                        @elseif($request->urgency == 'within_2_weeks')
                                            <span class="badge badge-warning badge-lg">
                                                <i class="fa fa-clock-o"></i> Within 2 Weeks
                                            </span>
                                        @else
                                            <span class="badge badge-info badge-lg">
                                                <i class="fa fa-calendar"></i> Within 1 Month
                                            </span>
                                        @endif
                                    @else
                                        N/A
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th class="pl-0">
                                    <i class="fa fa-clock-o text-warning"></i> Hours Per Week:
                                </th>
                                <td>
                                    @if($request->hours_per_week)
                                        <span class="badge badge-primary badge-lg">{{ $request->hours_per_week }}</span>
                                    @else
                                        N/A
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th class="pl-0">
                                    <i class="fa fa-hourglass-half text-warning"></i> Duration:
                                </th>
                                <td>
                                    @if($request->duration)
                                        {{ ucfirst(str_replace('_', ' ', $request->duration)) }}
                                    @else
                                        N/A
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th class="pl-0">
                                    <i class="fa fa-calendar-check-o text-warning"></i> Schedule Type:
                                </th>
                                <td>
                                    @if($request->schedule_type)
                                        @if($request->schedule_type == 'flexible')
                                            <span class="badge badge-success badge-lg">
                                                <i class="fa fa-random"></i> Flexible Schedule
                                            </span>
                                        @else
                                            <span class="badge badge-info badge-lg">
                                                <i class="fa fa-clock-o"></i> Fixed Schedule
                                            </span>
                                        @endif
                                    @else
                                        N/A
                                    @endif
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Service Preferences -->
        <div class="col-xl-6 col-lg-6">
            <div class="card">
                <div class="card-header bg-success">
                    <h5 class="card-title text-white mb-0">
                        <i class="fa fa-cog"></i> Service Preferences
                    </h5>
                </div>
                <div class="card-body">
                    <table class="table table-borderless mb-0">
                        <tbody>
                            <tr>
                                <th width="45%" class="pl-0">
                                    <i class="fa fa-list text-success"></i> Service Types:
                                </th>
                                <td>
                                    @if($request->service_types && count($request->service_types) > 0)
                                        @foreach($request->service_types as $service)
                                            <span class="badge badge-primary badge-lg mr-1 mb-1">
                                                {{ ucfirst(str_replace('_', ' ', $service)) }}
                                            </span>
                                        @endforeach
                                    @else
                                        N/A
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th class="pl-0">
                                    <i class="fa fa-venus-mars text-success"></i> Gender Preference:
                                </th>
                                <td>
                                    @if($request->gender_preference)
                                        @if($request->gender_preference == 'any')
                                            <span class="badge badge-secondary badge-lg">Any Gender</span>
                                        @elseif($request->gender_preference == 'female')
                                            <span class="badge badge-pink badge-lg">Female</span>
                                        @else
                                            <span class="badge badge-primary badge-lg">Male</span>
                                        @endif
                                    @else
                                        N/A
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th class="pl-0">
                                    <i class="fa fa-language text-success"></i> Language:
                                </th>
                                <td>
                                    @if($request->language_preference)
                                        <span class="badge badge-info badge-lg">
                                            {{ ucfirst($request->language_preference) }}
                                        </span>
                                    @else
                                        N/A
                                    @endif
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Health Conditions -->
        @if($request->health_conditions && count($request->health_conditions) > 0)
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header bg-danger">
                    <h5 class="card-title text-white mb-0">
                        <i class="fa fa-stethoscope"></i> Health Conditions & Special Care Needs
                    </h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        @foreach($request->health_conditions as $condition)
                            <div class="col-md-3 col-sm-6 mb-2">
                                <span class="badge badge-warning badge-lg" style="font-size: 13px; padding: 8px 15px;">
                                    <i class="fa fa-check-circle"></i> {{ ucfirst(str_replace('_', ' ', $condition)) }}
                                </span>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        @endif

        <!-- Notes Section -->
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">
                        <i class="fa fa-sticky-note"></i> Admin Notes
                    </h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.caregiver.request.note', $request->id) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <textarea name="notes" class="form-control" rows="4" placeholder="Add internal notes about this request...">{{ $request->admin_notes ?? '' }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-save"></i> Save Notes
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body text-center">
                    <a href="{{ route('admin.caregiver.requests') }}" class="btn btn-secondary btn-lg mr-2">
                        <i class="fa fa-arrow-left"></i> Back to List
                    </a>
                    
                    @if($request->status == 'incomplete' && $request->email)
                    <button class="btn btn-warning btn-lg mr-2" onclick="sendReminder()">
                        <i class="fa fa-envelope"></i> Send Reminder Email
                    </button>
                    @endif
                    
                    @if($request->email)
                    <a href="mailto:{{ $request->email }}" class="btn btn-info btn-lg mr-2">
                        <i class="fa fa-send"></i> Email Client
                    </a>
                    @endif
                    
                    @if($request->phone)
                    <a href="tel:{{ $request->phone }}" class="btn btn-success btn-lg mr-2">
                        <i class="fa fa-phone"></i> Call Client
                    </a>
                    @endif

                    <button class="btn btn-primary btn-lg mr-2" onclick="printRequest()">
                        <i class="fa fa-print"></i> Print Details
                    </button>

                    <button class="btn btn-dark btn-lg" onclick="exportRequest()">
                        <i class="fa fa-download"></i> Export PDF
                    </button>
                </div>
            </div>
        </div>
    </div>
    
</div>

<script>
    function sendReminder() {
        if (confirm('Send reminder email to {{ $request->email }}?')) {
            // Show loading overlay
            const loadingOverlay = document.createElement('div');
            loadingOverlay.style.cssText = 'position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.5); display: flex; align-items: center; justify-content: center; z-index: 9999;';
            loadingOverlay.innerHTML = '<div style="background: white; padding: 30px; border-radius: 10px; text-align: center;"><i class="fa fa-spinner fa-spin fa-3x text-primary"></i><p class="mt-3">Sending email...</p></div>';
            document.body.appendChild(loadingOverlay);

            fetch('{{ route("caregiver.request.reminder") }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    tracking_number: '{{ $request->tracking_number }}',
                    email: '{{ $request->email }}'
                })
            })
            .then(response => response.json())
            .then(data => {
                loadingOverlay.remove();
                
                if (data.success) {
                    // Show success message
                    const successDiv = document.createElement('div');
                    successDiv.className = 'alert alert-success alert-dismissible fade show';
                    successDiv.style.cssText = 'position: fixed; top: 20px; right: 20px; z-index: 9999; min-width: 300px;';
                    successDiv.innerHTML = `
                        <strong><i class="fa fa-check-circle"></i> Success!</strong><br>
                        Reminder email sent successfully to {{ $request->email }}
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                    `;
                    document.body.appendChild(successDiv);
                    
                    setTimeout(() => {
                        successDiv.remove();
                    }, 5000);
                } else {
                    alert('Failed to send reminder email. Please try again.');
                }
            })
            .catch(error => {
                loadingOverlay.remove();
                console.error('Error:', error);
                alert('An error occurred while sending the reminder.');
            });
        }
    }

    function printRequest() {
        window.print();
    }

    function exportRequest() {
        alert('PDF export feature coming soon!');
        // Implement PDF export functionality here
    }
</script>

<style>
    .badge-lg {
        padding: 8px 15px;
        font-size: 13px;
    }
    
    .table th {
        font-weight: 600;
        color: #666;
    }
    
    .card-header h5 {
        font-weight: 600;
    }
    
    @media print {
        .card-header,
        .btn,
        .breadcrumb,
        .page-titles,
        form {
            display: none !important;
        }
        
        .card {
            border: 1px solid #ddd !important;
            page-break-inside: avoid;
        }
    }
</style>

@endsection