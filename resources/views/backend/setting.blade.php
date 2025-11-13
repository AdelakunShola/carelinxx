@extends('admin.admin_dashboard')

@section('admin')

<div class="container-fluid">
    
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>Company Settings</h4>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                
                <li class="breadcrumb-item active"><a href="javascript:void(0);">Settings</a></li>
            </ol>
        </div>
    </div>
    
    <div class="row">
        <div class="col-xl-12 col-xxl-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Company Information</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <!-- Basic Information -->
                        <div class="row">
                            <div class="col-sm-12 mb-3">
                                <h6 class="text-primary">Basic Information</h6>
                                <hr>
                            </div>
                            
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-label" for="company_name">Company Name *</label>
                                    <input id="company_name" name="company_name" placeholder="Company Name" type="text" class="form-control @error('company_name') is-invalid @enderror" value="{{ old('company_name', $settings->company_name) }}" required>
                                    @error('company_name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-label" for="company_email">Company Email *</label>
                                    <input id="company_email" name="company_email" placeholder="info@company.com" type="email" class="form-control @error('company_email') is-invalid @enderror" value="{{ old('company_email', $settings->company_email) }}" required>
                                    @error('company_email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-label" for="company_phone">Company Phone *</label>
                                    <input id="company_phone" name="company_phone" placeholder="+234 123 456 7890" type="text" class="form-control @error('company_phone') is-invalid @enderror" value="{{ old('company_phone', $settings->company_phone) }}" required>
                                    @error('company_phone')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-label" for="company_phone_2">Alternative Phone</label>
                                    <input id="company_phone_2" name="company_phone_2" placeholder="+234 987 654 3210" type="text" class="form-control @error('company_phone_2') is-invalid @enderror" value="{{ old('company_phone_2', $settings->company_phone_2) }}">
                                    @error('company_phone_2')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                          <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-label" for="support_email">Support Email</label>
                                    <input id="support_email" name="support_email" placeholder="support@company.com" type="email" class="form-control @error('support_email') is-invalid @enderror" value="{{ old('support_email', $settings->support_email) }}">
                                    @error('support_email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="form-label" for="company_address">Company Address *</label>
                                    <textarea id="company_address" name="company_address" placeholder="Enter full address" class="form-control @error('company_address') is-invalid @enderror" rows="3" required>{{ old('company_address', $settings->company_address) }}</textarea>
                                    @error('company_address')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Social Media Links -->
                        <div class="row mt-4">
                            <div class="col-sm-12 mb-3">
                                <h6 class="text-primary">Social Media Links</h6>
                                <hr>
                            </div>
                            
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-label" for="facebook_url">Facebook URL</label>
                                    <input id="facebook_url" name="facebook_url" placeholder="https://facebook.com/yourpage" type="url" class="form-control @error('facebook_url') is-invalid @enderror" value="{{ old('facebook_url', $settings->facebook_url) }}">
                                    @error('facebook_url')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-label" for="twitter_url">Twitter URL</label>
                                    <input id="twitter_url" name="twitter_url" placeholder="https://twitter.com/yourpage" type="url" class="form-control @error('twitter_url') is-invalid @enderror" value="{{ old('twitter_url', $settings->twitter_url) }}">
                                    @error('twitter_url')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-label" for="linkedin_url">LinkedIn URL</label>
                                    <input id="linkedin_url" name="linkedin_url" placeholder="https://linkedin.com/company/yourpage" type="url" class="form-control @error('linkedin_url') is-invalid @enderror" value="{{ old('linkedin_url', $settings->linkedin_url) }}">
                                    @error('linkedin_url')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-label" for="instagram_url">Instagram URL</label>
                                    <input id="instagram_url" name="instagram_url" placeholder="https://instagram.com/yourpage" type="url" class="form-control @error('instagram_url') is-invalid @enderror" value="{{ old('instagram_url', $settings->instagram_url) }}">
                                    @error('instagram_url')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Branding -->
                        <div class="row mt-4">
                            <div class="col-sm-12 mb-3">
                                <h6 class="text-primary">Branding</h6>
                                <hr>
                            </div>
                            
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-label">Company Logo</label>
                                    @if($settings->company_logo)
                                        <div class="mb-3">
                                            <img src="{{ asset($settings->company_logo) }}" alt="Company Logo" style="max-width: 200px; height: auto; border: 1px solid #ddd; padding: 10px; border-radius: 8px;">
                                            <br>
                                            <a href="{{ route('admin.settings.remove.logo') }}" class="btn btn-danger btn-sm mt-2" onclick="return confirm('Are you sure you want to remove the logo?')">Remove Logo</a>
                                        </div>
                                    @endif
                                    <input id="company_logo" name="company_logo" type="file" class="form-control @error('company_logo') is-invalid @enderror" accept="image/*">
                                    <small class="form-text text-muted">Recommended size: 200x80px, Max: 2MB</small>
                                    @error('company_logo')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-label">Company Favicon</label>
                                    @if($settings->company_favicon)
                                        <div class="mb-3">
                                            <img src="{{ asset($settings->company_favicon) }}" alt="Favicon" style="max-width: 50px; height: auto; border: 1px solid #ddd; padding: 5px; border-radius: 4px;">
                                            <br>
                                            <a href="{{ route('admin.settings.remove.favicon') }}" class="btn btn-danger btn-sm mt-2" onclick="return confirm('Are you sure you want to remove the favicon?')">Remove Favicon</a>
                                        </div>
                                    @endif
                                    <input id="company_favicon" name="company_favicon" type="file" class="form-control @error('company_favicon') is-invalid @enderror" accept="image/*,.ico">
                                    <small class="form-text text-muted">Recommended size: 32x32px or 16x16px, Max: 1MB</small>
                                    @error('company_favicon')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Additional Information -->
                        <div class="row mt-4">
                            <div class="col-sm-12 mb-3">
                                <h6 class="text-primary">Additional Information</h6>
                                <hr>
                            </div>
                            
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-label" for="business_hours">Business Hours</label>
                                    <textarea id="business_hours" name="business_hours" placeholder="Monday - Friday: 9:00 AM - 6:00 PM" class="form-control @error('business_hours') is-invalid @enderror" rows="4">{{ old('business_hours', $settings->business_hours) }}</textarea>
                                    @error('business_hours')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-label" for="footer_text">Footer Text</label>
                                    <textarea id="footer_text" name="footer_text" placeholder="© 2025 Company Name. All rights reserved." class="form-control @error('footer_text') is-invalid @enderror" rows="4">{{ old('footer_text', $settings->footer_text) }}</textarea>
                                    @error('footer_text')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="row mt-4">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <button type="submit" class="btn btn-primary">Update Settings</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
</div>

@endsection