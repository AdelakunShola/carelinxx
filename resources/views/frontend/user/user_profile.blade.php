<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile - CareLinx</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <style>
        .profile-container { background: #f5f5f5; min-height: 100vh; padding: 30px 0; }
        .profile-section { background: white; border-radius: 15px; padding: 35px; margin-bottom: 25px; box-shadow: 0 2px 10px rgba(0,0,0,0.06); }
        .section-title { font-size: 22px; color: #2d5f5d; font-weight: 400; margin-bottom: 25px; }
        .form-grid { display: grid; grid-template-columns: repeat(2, 1fr); gap: 20px; }
        .form-field { display: flex; flex-direction: column; }
        .field-label { font-size: 14px; color: #2d5f5d; margin-bottom: 8px; font-family: Arial, sans-serif; font-weight: 500; }
        .field-input, .field-textarea, .field-select { font-size: 15px; padding: 12px 16px; border: 1px solid #ddd; border-radius: 8px; font-family: Arial, sans-serif; }
        .field-textarea { min-height: 100px; resize: vertical; }
        .field-input:focus, .field-textarea:focus, .field-select:focus { outline: none; border-color: #00a896; }
        .btn-save { background: #00a896; color: white; border: none; padding: 12px 30px; border-radius: 20px; font-size: 15px; cursor: pointer; font-family: Arial, sans-serif; }
        .btn-save:hover { background: #008c7a; }
        .btn-add { background: #00a896; color: white; border: none; padding: 8px 20px; border-radius: 15px; font-size: 14px; cursor: pointer; margin-top: 10px; }
        .btn-remove { background: #dc3545; color: white; border: none; padding: 8px 20px; border-radius: 15px; font-size: 14px; cursor: pointer; margin-top: 10px; }
        .repeater-item { border: 1px solid #ddd; padding: 20px; border-radius: 10px; margin-bottom: 15px; position: relative; }
        .checkbox-group { display: flex; flex-wrap: wrap; gap: 15px; }
        .checkbox-item { display: flex; align-items: center; gap: 5px; }
        @media (max-width: 968px) { .form-grid { grid-template-columns: 1fr; } }
    </style>
</head>
<body>
    <header>
        <div class="container">
            <div class="header-content">
                <a href="{{ route('home') }}" class="logo">
                    CareLinx
                    <span class="logo-sub">by Sharecare</span>
                </a>
                <nav>
                    <a href="{{ route('user.dashboard') }}">Dashboard</a>
                    <a href="{{ route('user.profile') }}">Profile</a>
                </nav>
                <div class="header-right">
                    <div class="user-avatar">{{ substr($user->first_name ?? $user->email, 0, 2) }}</div>
                    <form method="POST" action="{{ route('user.logout') }}" style="display: inline;">
                        @csrf
                        <button type="submit" style="background: none; border: none; color: #666; cursor: pointer; margin-left: 15px;">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </header>

    <div class="profile-container">
        <div class="container">
            @if(session('success'))
                <div style="background: #d4edda; color: #155724; padding: 15px 20px; border-radius: 10px; margin-bottom: 20px;">
                    ✓ {{ session('success') }}
                </div>
            @endif

            @if($errors->any())
                <div style="background: #f8d7da; color: #721c24; padding: 15px 20px; border-radius: 10px; margin-bottom: 20px;">
                    @foreach($errors->all() as $error)
                        <p style="margin: 5px 0;">{{ $error }}</p>
                    @endforeach
                </div>
            @endif

            <form method="POST" action="{{ route('user.profile.update') }}" enctype="multipart/form-data">
                @csrf

                <!-- Personal Information -->
                <div class="profile-section">
                    <h2 class="section-title">Personal Information</h2>
                    <div class="form-grid">
                        <div class="form-field">
                            <label class="field-label">Title</label>
                            <select name="title" class="field-input">
                                <option value="">Select Title</option>
                                <option value="Mr" {{ old('title', $user->title) == 'Mr' ? 'selected' : '' }}>Mr</option>
                                <option value="Mrs" {{ old('title', $user->title) == 'Mrs' ? 'selected' : '' }}>Mrs</option>
                                <option value="Ms" {{ old('title', $user->title) == 'Ms' ? 'selected' : '' }}>Ms</option>
                                <option value="Dr" {{ old('title', $user->title) == 'Dr' ? 'selected' : '' }}>Dr</option>
                            </select>
                        </div>
                        <div class="form-field">
                            <label class="field-label">First Name</label>
                            <input type="text" name="first_name" class="field-input" value="{{ old('first_name', $user->first_name) }}">
                        </div>
                        <div class="form-field">
                            <label class="field-label">Middle Name</label>
                            <input type="text" name="middle_name" class="field-input" value="{{ old('middle_name', $user->middle_name) }}">
                        </div>
                        <div class="form-field">
                            <label class="field-label">Last Name</label>
                            <input type="text" name="last_name" class="field-input" value="{{ old('last_name', $user->last_name) }}">
                        </div>
                        <div class="form-field">
                            <label class="field-label">Preferred Name</label>
                            <input type="text" name="preferred_name" class="field-input" value="{{ old('preferred_name', $user->preferred_name) }}">
                        </div>
                        <div class="form-field">
                            <label class="field-label">Date of Birth</label>
                            <input type="date" name="date_of_birth" class="field-input" value="{{ old('date_of_birth', $user->date_of_birth) }}">
                        </div>
                        <div class="form-field">
                            <label class="field-label">Gender</label>
                            <select name="gender" class="field-input">
                                <option value="">Select Gender</option>
                                <option value="Male" {{ old('gender', $user->gender) == 'Male' ? 'selected' : '' }}>Male</option>
                                <option value="Female" {{ old('gender', $user->gender) == 'Female' ? 'selected' : '' }}>Female</option>
                                <option value="Non-binary" {{ old('gender', $user->gender) == 'Non-binary' ? 'selected' : '' }}>Non-binary</option>
                                <option value="Prefer not to say" {{ old('gender', $user->gender) == 'Prefer not to say' ? 'selected' : '' }}>Prefer not to say</option>
                            </select>
                        </div>
                        <div class="form-field">
                            <label class="field-label">Preferred Language</label>
                            <input type="text" name="preferred_language" class="field-input" value="{{ old('preferred_language', $user->preferred_language) }}">
                        </div>
                    </div>
                </div>

                <!-- Contact Information -->
                <div class="profile-section">
                    <h2 class="section-title">Contact Information</h2>
                    <div class="form-grid">
                        <div class="form-field">
                            <label class="field-label">Primary Phone</label>
                            <input type="tel" name="phone_primary" class="field-input" value="{{ old('phone_primary', $user->phone_primary) }}">
                        </div>
                        <div class="form-field">
                            <label class="field-label">Secondary Phone</label>
                            <input type="tel" name="phone_secondary" class="field-input" value="{{ old('phone_secondary', $user->phone_secondary) }}">
                        </div>
                    </div>
                </div>

                <!-- Address -->
                <div class="profile-section">
                    <h2 class="section-title">Address</h2>
                    <div class="form-grid">
                        <div class="form-field" style="grid-column: 1 / -1;">
                            <label class="field-label">Address Line 1</label>
                            <input type="text" name="address_line1" class="field-input" value="{{ old('address_line1', $user->address_line1) }}">
                        </div>
                        <div class="form-field" style="grid-column: 1 / -1;">
                            <label class="field-label">Address Line 2</label>
                            <input type="text" name="address_line2" class="field-input" value="{{ old('address_line2', $user->address_line2) }}">
                        </div>
                        <div class="form-field">
                            <label class="field-label">City</label>
                            <input type="text" name="city" class="field-input" value="{{ old('city', $user->city) }}">
                        </div>
                        <div class="form-field">
                            <label class="field-label">State/Province</label>
                            <input type="text" name="state_province" class="field-input" value="{{ old('state_province', $user->state_province) }}">
                        </div>
                        <div class="form-field">
                            <label class="field-label">Postal Code</label>
                            <input type="text" name="postal_code" class="field-input" value="{{ old('postal_code', $user->postal_code) }}">
                        </div>
                        <div class="form-field">
                            <label class="field-label">Country</label>
                            <input type="text" name="country" class="field-input" value="{{ old('country', $user->country) }}">
                        </div>
                    </div>
                </div>

                <!-- Emergency Contact -->
                <div class="profile-section">
                    <h2 class="section-title">Emergency Contact</h2>
                    <div class="form-grid">
                        <div class="form-field">
                            <label class="field-label">Contact Name</label>
                            <input type="text" name="emergency_contact_name" class="field-input" value="{{ old('emergency_contact_name', $user->emergency_contact_name) }}">
                        </div>
                        <div class="form-field">
                            <label class="field-label">Relationship</label>
                            <input type="text" name="emergency_contact_relationship" class="field-input" value="{{ old('emergency_contact_relationship', $user->emergency_contact_relationship) }}">
                        </div>
                        <div class="form-field">
                            <label class="field-label">Phone Number</label>
                            <input type="tel" name="emergency_contact_phone" class="field-input" value="{{ old('emergency_contact_phone', $user->emergency_contact_phone) }}">
                        </div>
                        <div class="form-field">
                            <label class="field-label">Email Address</label>
                            <input type="email" name="emergency_contact_email" class="field-input" value="{{ old('emergency_contact_email', $user->emergency_contact_email) }}">
                        </div>
                    </div>
                </div>

                <!-- Government ID -->
                <div class="profile-section">
                    <h2 class="section-title">Government ID & Legal Information</h2>
                    <div class="form-grid">
                        <div class="form-field">
                            <label class="field-label">ID Type</label>
                            <select name="id_type" class="field-input">
                                <option value="">Select ID Type</option>
                                <option value="Passport" {{ old('id_type', $user->id_type) == 'Passport' ? 'selected' : '' }}>Passport</option>
                                <option value="National ID" {{ old('id_type', $user->id_type) == 'National ID' ? 'selected' : '' }}>National ID</option>
                                <option value="Driver's License" {{ old('id_type', $user->id_type) == "Driver's License" ? 'selected' : '' }}>Driver's License</option>
                            </select>
                        </div>
                        <div class="form-field">
                            <label class="field-label">ID Number</label>
                            <input type="text" name="id_number" class="field-input" value="{{ old('id_number', $user->id_number) }}">
                        </div>
                        <div class="form-field">
                            <label class="field-label">Issuing Country</label>
                            <input type="text" name="id_issuing_country" class="field-input" value="{{ old('id_issuing_country', $user->id_issuing_country) }}">
                        </div>
                        <div class="form-field">
                            <label class="field-label">Issue Date</label>
                            <input type="date" name="id_issue_date" class="field-input" value="{{ old('id_issue_date', $user->id_issue_date) }}">
                        </div>
                        <div class="form-field">
                            <label class="field-label">Expiry Date</label>
                            <input type="date" name="id_expiry_date" class="field-input" value="{{ old('id_expiry_date', $user->id_expiry_date) }}">
                        </div>
                        <div class="form-field">
                            <label class="field-label">ID Document</label>
                            <input type="file" name="id_document" accept=".pdf,.jpg,.jpeg,.png" class="field-input">
                            @if($user->id_document_url)
                                <a href="{{ Storage::url($user->id_document_url) }}" target="_blank" style="font-size: 13px; color: #00a896; margin-top: 5px;">View Current Document</a>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Work Authorization -->
                <div class="profile-section">
                    <h2 class="section-title">Work Authorization</h2>
                    <div class="form-grid">
                        <div class="form-field">
                            <label class="field-label">Work Authorization Status</label>
                            <select name="work_authorization_status" class="field-input">
                                <option value="">Select Status</option>
                                <option value="Citizen" {{ old('work_authorization_status', $user->work_authorization_status) == 'Citizen' ? 'selected' : '' }}>Citizen</option>
                                <option value="Permanent Resident" {{ old('work_authorization_status', $user->work_authorization_status) == 'Permanent Resident' ? 'selected' : '' }}>Permanent Resident</option>
                                <option value="Work Visa" {{ old('work_authorization_status', $user->work_authorization_status) == 'Work Visa' ? 'selected' : '' }}>Work Visa</option>
                            </select>
                        </div>
                        <div class="form-field">
                            <label class="field-label">Work Permit Number</label>
                            <input type="text" name="work_permit_number" class="field-input" value="{{ old('work_permit_number', $user->work_permit_number) }}">
                        </div>
                        <div class="form-field">
                            <label class="field-label">Work Permit Expiry</label>
                            <input type="date" name="work_permit_expiry" class="field-input" value="{{ old('work_permit_expiry', $user->work_permit_expiry) }}">
                        </div>
                        <div class="form-field">
                            <label class="field-label">Work Permit Document</label>
                            <input type="file" name="work_permit_document" accept=".pdf,.jpg,.jpeg,.png" class="field-input">
                            @if($user->work_permit_document_url)
                                <a href="{{ Storage::url($user->work_permit_document_url) }}" target="_blank" style="font-size: 13px; color: #00a896; margin-top: 5px;">View Current Document</a>
                            @endif
                        </div>
                        <div class="form-field">
                            <label class="field-label">Tax ID Number</label>
                            <input type="text" name="tax_id_number" class="field-input" value="{{ old('tax_id_number', $user->tax_id_number) }}">
                        </div>
                    </div>
                </div>

                <!-- Background Checks -->
                <div class="profile-section">
                    <h2 class="section-title">Background Checks & Clearances</h2>
                    <div class="form-grid">
                        <div class="form-field">
                            <label class="field-label">DBS Check Type</label>
                            <select name="dbs_check_type" class="field-input">
                                <option value="">Select Type</option>
                                <option value="Basic" {{ old('dbs_check_type', $user->dbs_check_type) == 'Basic' ? 'selected' : '' }}>Basic</option>
                                <option value="Standard" {{ old('dbs_check_type', $user->dbs_check_type) == 'Standard' ? 'selected' : '' }}>Standard</option>
                                <option value="Enhanced" {{ old('dbs_check_type', $user->dbs_check_type) == 'Enhanced' ? 'selected' : '' }}>Enhanced</option>
                            </select>
                        </div>
                        <div class="form-field">
                            <label class="field-label">DBS Certificate Number</label>
                            <input type="text" name="dbs_certificate_number" class="field-input" value="{{ old('dbs_certificate_number', $user->dbs_certificate_number) }}">
                        </div>
                        <div class="form-field">
                            <label class="field-label">DBS Issue Date</label>
                            <input type="date" name="dbs_issue_date" class="field-input" value="{{ old('dbs_issue_date', $user->dbs_issue_date) }}">
                        </div>
                        <div class="form-field">
                            <label class="field-label">DBS Document</label>
                            <input type="file" name="dbs_document" accept=".pdf,.jpg,.jpeg,.png" class="field-input">
                        </div>
                        <div class="form-field">
                            <label class="field-label">Health Screening Date</label>
                            <input type="date" name="health_screening_date" class="field-input" value="{{ old('health_screening_date', $user->health_screening_date) }}">
                        </div>
                        <div class="form-field">
                            <label class="field-label">Tuberculosis Test Date</label>
                            <input type="date" name="tuberculosis_test_date" class="field-input" value="{{ old('tuberculosis_test_date', $user->tuberculosis_test_date) }}">
                        </div>
                        <div class="form-field">
                            <label class="field-label">Professional Registration Number</label>
                            <input type="text" name="professional_registration_number" class="field-input" value="{{ old('professional_registration_number', $user->professional_registration_number) }}">
                        </div>
                        <div class="form-field">
                            <label class="field-label">Registration Body</label>
                            <input type="text" name="registration_body" class="field-input" value="{{ old('registration_body', $user->registration_body) }}" placeholder="NMC, HCPC, etc.">
                        </div>
                        <div class="form-field">
                            <label class="field-label">Registration Expiry</label>
                            <input type="date" name="registration_expiry" class="field-input" value="{{ old('registration_expiry', $user->registration_expiry) }}">
                        </div>
                    </div>
                </div>

                <!-- Job Preferences -->
                <div class="profile-section">
                    <h2 class="section-title">Job Preferences & Availability</h2>
                    <div class="form-grid">
                        <div class="form-field">
                            <label class="field-label">Earliest Start Date</label>
                            <input type="date" name="earliest_start_date" class="field-input" value="{{ old('earliest_start_date', $user->earliest_start_date) }}">
                        </div>
                        <div class="form-field">
                            <label class="field-label">Notice Period (Days)</label>
                            <input type="number" name="notice_period_days" class="field-input" value="{{ old('notice_period_days', $user->notice_period_days) }}">
                        </div>
                        <div class="form-field">
                            <label class="field-label">Willing to Relocate</label>
                            <select name="willing_to_relocate" class="field-input">
                                <option value="0" {{ old('willing_to_relocate', $user->willing_to_relocate) == '0' ? 'selected' : '' }}>No</option>
                                <option value="1" {{ old('willing_to_relocate', $user->willing_to_relocate) == '1' ? 'selected' : '' }}>Yes</option>
                            </select>
                        </div>
                        <div class="form-field">
                            <label class="field-label">Max Commute Distance (km)</label>
                            <input type="number" name="max_commute_distance" class="field-input" value="{{ old('max_commute_distance', $user->max_commute_distance) }}">
                        </div>
                        <div class="form-field">
                            <label class="field-label">Available for Overnight</label>
                            <select name="available_for_overnight" class="field-input">
                                <option value="0" {{ old('available_for_overnight', $user->available_for_overnight) == '0' ? 'selected' : '' }}>No</option>
                                <option value="1" {{ old('available_for_overnight', $user->available_for_overnight) == '1' ? 'selected' : '' }}>Yes</option>
                            </select>
                        </div>
                        <div class="form-field">
                            <label class="field-label">Available for Live-in</label>
                            <select name="available_for_live_in" class="field-input">
                                <option value="0" {{ old('available_for_live_in', $user->available_for_live_in) == '0' ? 'selected' : '' }}>No</option>
                                <option value="1" {{ old('available_for_live_in', $user->available_for_live_in) == '1' ? 'selected' : '' }}>Yes</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Compensation -->
                <div class="profile-section">
                    <h2 class="section-title">Expected Compensation</h2>
                    <div class="form-grid">
                        <div class="form-field">
                            <label class="field-label">Currency</label>
                            <select name="expected_salary_currency" class="field-input">
                                <option value="">Select Currency</option>
                                <option value="USD" {{ old('expected_salary_currency', $user->expected_salary_currency) == 'USD' ? 'selected' : '' }}>USD</option>
                                <option value="GBP" {{ old('expected_salary_currency', $user->expected_salary_currency) == 'GBP' ? 'selected' : '' }}>GBP</option>
                                <option value="EUR" {{ old('expected_salary_currency', $user->expected_salary_currency) == 'EUR' ? 'selected' : '' }}>EUR</option>
                            </select>
                        </div>
                        <div class="form-field">
                            <label class="field-label">Minimum Salary</label>
                            <input type="number" step="0.01" name="expected_salary_min" class="field-input" value="{{ old('expected_salary_min', $user->expected_salary_min) }}">
                        </div>
                        <div class="form-field">
                            <label class="field-label">Maximum Salary</label>
                            <input type="number" step="0.01" name="expected_salary_max" class="field-input" value="{{ old('expected_salary_max', $user->expected_salary_max) }}">
                        </div>
                        <div class="form-field">
                            <label class="field-label">Salary Period</label>
                            <select name="salary_period" class="field-input">
                                <option value="">Select Period</option>
                                <option value="hourly" {{ old('salary_period', $user->salary_period) == 'hourly' ? 'selected' : '' }}>Hourly</option>
                                <option value="weekly" {{ old('salary_period', $user->salary_period) == 'weekly' ? 'selected' : '' }}>Weekly</option>
                                <option value="monthly" {{ old('salary_period', $user->salary_period) == 'monthly' ? 'selected' : '' }}>Monthly</option>
                                <option value="annually" {{ old('salary_period', $user->salary_period) == 'annually' ? 'selected' : '' }}>Annually</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Profile Photo -->
                <div class="profile-section">
                    <h2 class="section-title">Profile Photo</h2>
                    <div class="form-field">
                        <label class="field-label">Upload Photo</label>
                        <input type="file" name="profile_photo" accept="image/*" class="field-input">
                        <p style="font-size: 13px; color: #666; margin-top: 8px; font-family: Arial, sans-serif;">Max size: 2MB. Supported formats: JPG, PNG</p>
                        @if($user->profile_photo_url)
                            <img src="{{ Storage::url($user->profile_photo_url) }}" alt="Profile Photo" style="width: 100px; height: 100px; border-radius: 50%; margin-top: 15px; object-fit: cover;">
                        @endif
                    </div>
                </div>

                <!-- Save Button -->
                <div style="text-align: right;">
                    <a href="{{ route('user.dashboard') }}" style="display: inline-block; padding: 12px 30px; border-radius: 20px; font-size: 15px; color: #666; text-decoration: none; margin-right: 15px; border: 1px solid #ddd;">
                        Cancel
                    </a>
                    <button type="submit" class="btn-save">Save Changes</button>
                </div>
            </form>
        </div>
    </div>

    <footer style="margin-top: 50px;">
        <div class="container">
            <div class="footer-content">
                <div>
                    <div class="footer-logo">CareLinx <span class="logo-sub">by Sharecare</span></div>
                    <p class="footer-text">©2024 Sharecare, Inc.</p>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>