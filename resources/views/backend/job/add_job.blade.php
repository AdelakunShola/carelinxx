@extends('admin.admin_dashboard')

@section('admin')

<div class="container-fluid">
        
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Add Jobs</h4>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('all.jobs') }}">Jobs</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0);">Add Jobs</a></li>
                </ol>
            </div>
        </div>
        
        <div class="row">
            <div class="col-xl-12 col-xxl-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Job Information</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('store.job') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="form-label" for="company_name">Company Name <span class="text-danger">*</span></label>
                                        <input id="company_name" name="company_name" placeholder="Name" type="text" class="form-control" value="{{ old('company_name') }}" >
                                        @error('company_name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="form-label" for="position">Position <span class="text-danger">*</span></label>
                                        <input id="position" name="position" placeholder="Name" type="text" class="form-control" value="{{ old('position') }}" >
                                        @error('position')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="form-label" for="job_category">Job Category <span class="text-danger">*</span></label>
                                        <select id="job_category" name="job_category" class="form-control" >
                                            <option value="">Choose...</option>
                                            <option value="IT" {{ old('job_category') == 'IT' ? 'selected' : '' }}>IT</option>
                                            <option value="Engineering" {{ old('job_category') == 'Engineering' ? 'selected' : '' }}>Engineering</option>
                                            <option value="Marketing" {{ old('job_category') == 'Marketing' ? 'selected' : '' }}>Marketing</option>
                                            <option value="Sales" {{ old('job_category') == 'Sales' ? 'selected' : '' }}>Sales</option>
                                            <option value="Finance" {{ old('job_category') == 'Finance' ? 'selected' : '' }}>Finance</option>
                                            <option value="Human Resources" {{ old('job_category') == 'Human Resources' ? 'selected' : '' }}>Human Resources</option>
                                            <option value="Customer Service" {{ old('job_category') == 'Customer Service' ? 'selected' : '' }}>Customer Service</option>
                                            <option value="Healthcare" {{ old('job_category') == 'Healthcare' ? 'selected' : '' }}>Healthcare</option>
                                            <option value="Education" {{ old('job_category') == 'Education' ? 'selected' : '' }}>Education</option>
                                            <option value="Other" {{ old('job_category') == 'Other' ? 'selected' : '' }}>Other</option>
                                        </select>
                                        @error('job_category')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="form-label" for="job_type">Job Type <span class="text-danger">*</span></label>
                                        <select id="job_type" name="job_type" class="form-control" >
                                            <option value="">Choose...</option>
                                            <option value="Full Time" {{ old('job_type') == 'Full Time' ? 'selected' : '' }}>Full Time</option>
                                            <option value="Part Time" {{ old('job_type') == 'Part Time' ? 'selected' : '' }}>Part Time</option>
                                            <option value="Contract" {{ old('job_type') == 'Contract' ? 'selected' : '' }}>Contract</option>
                                            <option value="Internship" {{ old('job_type') == 'Internship' ? 'selected' : '' }}>Internship</option>
                                            <option value="Freelance" {{ old('job_type') == 'Freelance' ? 'selected' : '' }}>Freelance</option>
                                        </select>
                                        @error('job_type')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="form-label" for="no_of_vacancy">No. of Vacancy <span class="text-danger">*</span></label>
                                        <input id="no_of_vacancy" name="no_of_vacancy" placeholder="Name" type="number" class="form-control" value="{{ old('no_of_vacancy') }}" >
                                        @error('no_of_vacancy')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="form-label" for="experience">Select Experience <span class="text-danger">*</span></label>
                                        <select id="experience" name="experience" class="form-control" >
                                            <option value="">Choose...</option>
                                            <option value="Fresh Graduate" {{ old('experience') == 'Fresh Graduate' ? 'selected' : '' }}>Fresh Graduate</option>
                                            <option value="1 yr" {{ old('experience') == '1 yr' ? 'selected' : '' }}>1 yr</option>
                                            <option value="2 yrs" {{ old('experience') == '2 yrs' ? 'selected' : '' }}>2 yrs</option>
                                            <option value="3 yrs" {{ old('experience') == '3 yrs' ? 'selected' : '' }}>3 yrs</option>
                                            <option value="4 yrs" {{ old('experience') == '4 yrs' ? 'selected' : '' }}>4 yrs</option>
                                            <option value="5 yrs" {{ old('experience') == '5 yrs' ? 'selected' : '' }}>5 yrs</option>
                                            <option value="5+ yrs" {{ old('experience') == '5+ yrs' ? 'selected' : '' }}>5+ yrs</option>
                                        </select>
                                        @error('experience')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="form-label" for="posted_date">Posted Date <span class="text-danger">*</span></label>
                                        <input id="posted_date" name="posted_date" placeholder="11/07/2025" type="date" class="form-control" value="{{ old('posted_date') }}" >
                                        @error('posted_date')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="form-label" for="last_date">Last Date To Apply <span class="text-danger">*</span></label>
                                        <input id="last_date" name="last_date" placeholder="11/07/2025" type="date" class="form-control" value="{{ old('last_date') }}" >
                                        @error('last_date')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="form-label" for="close_date">Close Date <span class="text-danger">*</span></label>
                                        <input id="close_date" name="close_date" placeholder="11/07/2025" type="date" class="form-control" value="{{ old('close_date') }}" >
                                        @error('close_date')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="form-label" for="gender">Select Gender: <span class="text-danger">*</span></label>
                                        <select id="gender" name="gender" class="form-control" >
                                            <option value="">Choose...</option>
                                            <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Male</option>
                                            <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Female</option>
                                            <option value="Any" {{ old('gender') == 'Any' ? 'selected' : '' }}>Any</option>
                                        </select>
                                        @error('gender')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="form-label" for="salary_from">Salary Form <span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">$</span>
                                            </div>
                                            <input id="salary_from" name="salary_from" type="number" step="0.01" class="form-control" value="{{ old('salary_from') }}" >
                                        </div>
                                        @error('salary_from')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="form-label" for="salary_to">Salary To <span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">$</span>
                                            </div>
                                            <input id="salary_to" name="salary_to" type="number" step="0.01" class="form-control" value="{{ old('salary_to') }}" >
                                        </div>
                                        @error('salary_to')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="form-label" for="city">Enter City: <span class="text-danger">*</span></label>
                                        <input id="city" name="city" placeholder="City" type="text" class="form-control" value="{{ old('city') }}" >
                                        @error('city')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="form-label" for="state">Enter State: <span class="text-danger">*</span></label>
                                        <input id="state" name="state" placeholder="State" type="text" class="form-control" value="{{ old('state') }}" >
                                        @error('state')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="form-label" for="country">Enter Country: <span class="text-danger">*</span></label>
                                        <input id="country" name="country" placeholder="Country" type="text" class="form-control" value="{{ old('country') }}" >
                                        @error('country')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="form-label" for="education_level">Enter Education Level: <span class="text-danger">*</span></label>
                                        <input id="education_level" name="education_level" placeholder="Education Level" type="text" class="form-control" value="{{ old('education_level') }}" >
                                        @error('education_level')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label" for="description">Description: <span class="text-danger">*</span></label>
                                        <textarea id="description" name="description" class="form-control" rows="5" >{{ old('description') }}</textarea>
                                        @error('description')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Status:</label>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="status" id="status_active" value="active" {{ old('status', 'active') == 'active' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="status_active">Active</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="status" id="status_inactive" value="inactive" {{ old('status') == 'inactive' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="status_inactive">In-Active</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <a href="{{ route('all.jobs') }}" class="btn btn-light">Close</a>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
    </div>

@endsection