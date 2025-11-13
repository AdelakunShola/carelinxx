@extends('user1.user_dashboard')
@section('user1')
    <style>
        .apply-container { background: #f5f5f5; min-height: 100vh; padding: 30px 0; }
        .back-link { color: #00a896; text-decoration: none; font-size: 14px; display: inline-block; margin-bottom: 20px; }
        .apply-card { background: white; border-radius: 15px; padding: 40px; box-shadow: 0 2px 10px rgba(0,0,0,0.06); margin-bottom: 20px; }
        .job-summary { background: #e8f4f2; padding: 25px; border-radius: 15px; margin-bottom: 30px; }
        .job-summary h2 { font-size: 24px; color: #2d5f5d; margin: 0 0 10px 0; }
        .job-summary p { font-size: 15px; color: #666; margin: 5px 0; }
        .section-title { font-size: 20px; color: #2d5f5d; font-weight: 400; margin: 30px 0 15px 0; }
        .form-field { display: flex; flex-direction: column; margin-bottom: 20px; }
        .field-label { font-size: 14px; color: #2d5f5d; margin-bottom: 8px; font-family: Arial, sans-serif; font-weight: 500; }
        .field-label.required:after { content: " *"; color: #dc3545; }
        .field-input, .field-textarea { font-size: 15px; padding: 12px 16px; border: 1px solid #ddd; border-radius: 8px; font-family: Arial, sans-serif; }
        .field-textarea { min-height: 150px; resize: vertical; }
        .field-input:focus, .field-textarea:focus { outline: none; border-color: #00a896; }
        .field-hint { font-size: 13px; color: #666; margin-top: 5px; font-family: Arial, sans-serif; }
        .btn-submit { background: #00a896; color: white; border: none; padding: 15px 40px; border-radius: 25px; font-size: 16px; cursor: pointer; }
        .btn-submit:hover { background: #008c7a; }
        .btn-cancel { background: white; color: #666; border: 1px solid #ddd; padding: 15px 40px; border-radius: 25px; font-size: 16px; cursor: pointer; text-decoration: none; display: inline-block; }
        .alert-info { background: #d1ecf1; color: #0c5460; padding: 15px 20px; border-radius: 10px; margin: 20px 0; border-left: 4px solid #17a2b8; }
        .alert-error { background: #f8d7da; color: #721c24; padding: 15px 20px; border-radius: 10px; margin: 15px 0; border-left: 4px solid #dc3545; }
        .profile-check { background: #fff3cd; padding: 20px; border-radius: 10px; margin: 20px 0; border-left: 4px solid #ffc107; }
        .profile-check h3 { color: #856404; font-size: 18px; margin: 0 0 15px 0; }
        .profile-check ul { margin: 10px 0; padding-left: 20px; color: #856404; }
        .profile-check a { color: #00a896; text-decoration: underline; }
    </style>


    <div class="apply-container">
        <div class="container" style="max-width: 900px;">
            <a href="{{ route('user.job.details', $job->id) }}" class="back-link">← Back to Job Details</a>

            @if($errors->any())
                <div class="alert-error">
                    <strong>Please fix the following errors:</strong>
                    <ul style="margin: 10px 0 0 0; padding-left: 20px;">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @php
                $user = Auth::user();
                $missingFields = [];
                if (!$user->first_name) $missingFields[] = 'First Name';
                if (!$user->last_name) $missingFields[] = 'Last Name';
                if (!$user->phone_primary) $missingFields[] = 'Primary Phone';
                if (!$user->date_of_birth) $missingFields[] = 'Date of Birth';
                if (!$user->address_line1) $missingFields[] = 'Address';
                if (!$user->city) $missingFields[] = 'City';
                if (!$user->state_province) $missingFields[] = 'State';
                if (!$user->country) $missingFields[] = 'Country';
            @endphp

            @if(!empty($missingFields))
                <div class="profile-check">
                    <h3>⚠️ Complete Your Profile</h3>
                    <p>Before applying for this job, please complete the following required profile information:</p>
                    <ul>
                        @foreach($missingFields as $field)
                            <li>{{ $field }}</li>
                        @endforeach
                    </ul>
                    <p style="margin-top: 15px;">
                        <a href="{{ route('user.profile') }}">Go to Profile Settings →</a>
                    </p>
                </div>
            @endif

            <div class="apply-card">
                <!-- Job Summary -->
                <div class="job-summary">
                    <h2>{{ $job->position }}</h2>
                    <p><strong>{{ $job->company_name }}</strong></p>
                    <p>📍 {{ $job->city }}, {{ $job->state }} | 💼 {{ $job->job_type }}</p>
                    @if($job->salary_from)
                    <p>💰 ${{ number_format($job->salary_from, 0) }} - ${{ number_format($job->salary_to, 0) }}</p>
                    @endif
                </div>

                <div class="alert-info">
                    <strong>📋 Application Guidelines:</strong>
                    <ul style="margin: 10px 0 0 0; padding-left: 20px;">
                        <li>Ensure your profile information is complete and up-to-date</li>
                        <li>Write a personalized cover letter explaining why you're a good fit</li>
                        <li>Upload your most recent CV/Resume in PDF, DOC, or DOCX format</li>
                        <li>Review all information before submitting</li>
                    </ul>
                </div>

                <form method="POST" action="{{ route('user.job.apply.submit', $job->id) }}" enctype="multipart/form-data">
                    @csrf

                    <h3 class="section-title">Application Form</h3>

                    <!-- Cover Letter -->
                    <div class="form-field">
                        <label class="field-label required">Cover Letter</label>
                        <textarea name="cover_letter" class="field-textarea" required>{{ old('cover_letter') }}</textarea>
                        <span class="field-hint">Explain why you're interested in this position and what makes you a great fit (minimum 50 characters)</span>
                    </div>

                    <!-- CV Upload -->
                    <div class="form-field">
                        <label class="field-label required">CV/Resume</label>
                        <input type="file" name="cv_document" class="field-input" accept=".pdf,.doc,.docx" required>
                        <span class="field-hint">Upload your CV in PDF, DOC, or DOCX format (max 5MB)</span>
                    </div>

                    <!-- Profile Summary -->
                    <h3 class="section-title">Your Profile Information</h3>
                    <div class="alert-info">
                        <p style="margin: 0;">The following information will be included in your application from your profile:</p>
                        <ul style="margin: 10px 0 0 0; padding-left: 20px;">
                            <li><strong>Name:</strong> {{ $user->first_name }} {{ $user->last_name }}</li>
                            <li><strong>Email:</strong> {{ $user->email }}</li>
                            <li><strong>Phone:</strong> {{ $user->phone_primary ?? 'Not provided' }}</li>
                            <li><strong>Location:</strong> {{ $user->city ?? 'Not provided' }}, {{ $user->state_province ?? 'Not provided' }}</li>
                        </ul>
                        <p style="margin: 15px 0 0 0; font-size: 13px;">
                            Need to update? <a href="{{ route('user.profile') }}" target="_blank">Edit Profile</a>
                        </p>
                    </div>

                    <!-- Confirmation -->
                    <div class="form-field">
                        <label style="display: flex; align-items: center; gap: 10px; font-size: 14px; color: #555;">
                            <input type="checkbox" required style="width: auto;">
                            I confirm that all information provided is accurate and complete
                        </label>
                    </div>

                    <!-- Submit Buttons -->
                    <div style="border-top: 1px solid #eee; padding-top: 25px; margin-top: 30px; display: flex; gap: 15px; justify-content: flex-end;">
                        <a href="{{ route('user.job.details', $job->id) }}" class="btn-cancel">Cancel</a>
                        <button type="submit" class="btn-submit" @if(!empty($missingFields)) disabled style="background: #ccc; cursor: not-allowed;" @endif>
                            Submit Application
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

   @endsection