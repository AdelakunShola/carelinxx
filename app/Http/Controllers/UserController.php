<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function Index(){
            return view('frontend.index');
        }// End Method 


     public function FindCareGiver()
    {
        return view('frontend.find-a-caregiver');
    }//end method

        public function healthsystem()
    {
        return view('frontend.healthcare-systems');
    }//end method

        public function healthplan()
    {
        return view('frontend.health-plans');
    }//end method

        public function healthcareStaff()
    {
        return view('frontend.healthcare-staffing');
    }//end method

        public function becomecaregiver()
    {
        return view('frontend.become-a-caregiver');
    }//

       
    




    public function UserLogin()
    {
        return view('frontend.user.user_login');
    }

    // Handle Login Submit
    public function UserLoginSubmit(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        $credentials = $request->only('email', 'password');
        $remember = $request->has('remember');

        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();
            
            // Update last login
            Auth::user()->update(['last_login' => now()]);

            return redirect()->intended(route('user.dashboard'))
                ->with('success', 'Welcome back, ' . Auth::user()->first_name . '!');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    // Show Register Page
    public function UserRegister()
    {
        return view('frontend.user.user_register');
    }

    // Handle Register Submit
    public function UserRegisterSubmit(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
        ]);

        $user = User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'application_status' => 'pending',
            'account_status' => 'active',
        ]);

        // Auto login after registration
        Auth::login($user);

        return redirect()->route('user.dashboard')
            ->with('success', 'Registration successful! Please complete your profile.');
    }

    // Show Dashboard
    public function UserDashboard()
    {
        $user = Auth::user();
        return view('frontend.user.user_dashboard', compact('user'));
    }

    // Logout
    public function UserLogout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('user.login')
            ->with('success', 'You have been logged out successfully.');
    }








   public function UserProfile()
{
    $user = Auth::user();
    return view('frontend.user.user_profile', compact('user'));
}

// Update Profile - Complete with all fields
public function UserProfileUpdate(Request $request)
{
    $user = Auth::user();

    $validated = $request->validate([
        // Personal Information
        'title' => 'nullable|string|max:10',
        'first_name' => 'nullable|string|max:100',
        'middle_name' => 'nullable|string|max:100',
        'last_name' => 'nullable|string|max:100',
        'preferred_name' => 'nullable|string|max:100',
        'date_of_birth' => 'nullable|date',
        'gender' => 'nullable|string|max:50',
        
        // Contact Information
        'phone_primary' => 'nullable|string|max:20',
        'phone_secondary' => 'nullable|string|max:20',
        
        // Address
        'address_line1' => 'nullable|string|max:255',
        'address_line2' => 'nullable|string|max:255',
        'city' => 'nullable|string|max:100',
        'state_province' => 'nullable|string|max:100',
        'postal_code' => 'nullable|string|max:20',
        'country' => 'nullable|string|max:100',
        
        // Emergency Contact
        'emergency_contact_name' => 'nullable|string|max:200',
        'emergency_contact_relationship' => 'nullable|string|max:100',
        'emergency_contact_phone' => 'nullable|string|max:20',
        'emergency_contact_email' => 'nullable|email|max:255',
        
        // Legal & Identification
        'id_type' => 'nullable|string|max:50',
        'id_number' => 'nullable|string|max:100',
        'id_issuing_country' => 'nullable|string|max:100',
        'id_issue_date' => 'nullable|date',
        'id_expiry_date' => 'nullable|date',
        'id_document' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:5120',
        
        // Work Authorization
        'work_authorization_status' => 'nullable|string|max:100',
        'work_permit_number' => 'nullable|string|max:100',
        'work_permit_expiry' => 'nullable|date',
        'work_permit_document' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:5120',
        'tax_id_number' => 'nullable|string|max:100',
        
        // Background Checks
        'dbs_check_type' => 'nullable|string|max:50',
        'dbs_certificate_number' => 'nullable|string|max:100',
        'dbs_issue_date' => 'nullable|date',
        'dbs_document' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:5120',
        'health_screening_date' => 'nullable|date',
        'tuberculosis_test_date' => 'nullable|date',
        'professional_registration_number' => 'nullable|string|max:100',
        'registration_body' => 'nullable|string|max:100',
        'registration_expiry' => 'nullable|date',
        
        // Preferences & Availability
        'earliest_start_date' => 'nullable|date',
        'notice_period_days' => 'nullable|integer',
        'willing_to_relocate' => 'nullable|boolean',
        'max_commute_distance' => 'nullable|integer',
        'available_for_overnight' => 'nullable|boolean',
        'available_for_live_in' => 'nullable|boolean',
        
        // Compensation
        'expected_salary_currency' => 'nullable|string|max:10',
        'expected_salary_min' => 'nullable|numeric',
        'expected_salary_max' => 'nullable|numeric',
        'salary_period' => 'nullable|string|max:20',
        
        // Profile
        'preferred_language' => 'nullable|string|max:50',
        'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
    ]);

    // Handle profile photo upload
    if ($request->hasFile('profile_photo')) {
        if ($user->profile_photo_url) {
            Storage::delete($user->profile_photo_url);
        }
        $path = $request->file('profile_photo')->store('profile_photos', 'public');
        $validated['profile_photo_url'] = $path;
    }

    // Handle ID document upload
    if ($request->hasFile('id_document')) {
        if ($user->id_document_url) {
            Storage::delete($user->id_document_url);
        }
        $path = $request->file('id_document')->store('id_documents', 'public');
        $validated['id_document_url'] = $path;
    }

    // Handle work permit document upload
    if ($request->hasFile('work_permit_document')) {
        if ($user->work_permit_document_url) {
            Storage::delete($user->work_permit_document_url);
        }
        $path = $request->file('work_permit_document')->store('work_permits', 'public');
        $validated['work_permit_document_url'] = $path;
    }

    // Handle DBS document upload
    if ($request->hasFile('dbs_document')) {
        if ($user->dbs_document_url) {
            Storage::delete($user->dbs_document_url);
        }
        $path = $request->file('dbs_document')->store('dbs_documents', 'public');
        $validated['dbs_document_url'] = $path;
    }

    // Update user data
    $user->update($validated);

    return redirect()->route('user.profile')
        ->with('success', 'Profile updated successfully!');
}



    
}
