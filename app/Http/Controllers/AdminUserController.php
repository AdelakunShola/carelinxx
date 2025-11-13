<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class AdminUserController extends Controller
{
    /**
     * Display a listing of all users
     */
    public function index(Request $request)
    {
        $query = User::query();

        // Search functionality
        if ($request->has('search') && $request->search) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('first_name', 'like', "%{$search}%")
                  ->orWhere('last_name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('phone_primary', 'like', "%{$search}%");
            });
        }

        // Filter by role
        if ($request->has('role') && $request->role !== 'all') {
            $query->where('role', $request->role);
        }

        // Filter by account status
        if ($request->has('account_status') && $request->account_status !== 'all') {
            $query->where('account_status', $request->account_status);
        }

        // Filter by application status
        if ($request->has('application_status') && $request->application_status !== 'all') {
            $query->where('application_status', $request->application_status);
        }

        // Sort
        $sortBy = $request->get('sort_by', 'created_at');
        $sortOrder = $request->get('sort_order', 'desc');
        $query->orderBy($sortBy, $sortOrder);

        $users = $query->paginate(20)->appends($request->all());

        return view('backend.user.index', compact('users'));
    }

    /**
     * Display the specified user details
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('backend.user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified user
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('backend.user.edit', compact('user'));
    }

    /**
     * Update the specified user in storage
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $validated = $request->validate([
            // Basic Identity
            'title' => 'nullable|string|max:10',
            'first_name' => 'nullable|string|max:100',
            'middle_name' => 'nullable|string|max:100',
            'last_name' => 'nullable|string|max:100',
            'preferred_name' => 'nullable|string|max:100',
            'date_of_birth' => 'nullable|date',
            'gender' => 'nullable|string|max:50',
            'role' => ['required', Rule::in(['admin', 'user'])],
            
            // Contact Information
            'email' => ['required', 'email', Rule::unique('users')->ignore($user->id)],
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
            'right_to_work_verified' => 'nullable|boolean',
            
            // Background Checks
            'dbs_check_type' => 'nullable|string|max:50',
            'dbs_certificate_number' => 'nullable|string|max:100',
            'dbs_issue_date' => 'nullable|date',
            'dbs_document' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:5120',
            'background_check_type' => 'nullable|string|max:100',
            'background_check_country' => 'nullable|string|max:100',
            'background_check_date' => 'nullable|date',
            'background_check_status' => 'nullable|in:clear,pending,issues_found',
            'health_screening_date' => 'nullable|date',
            'health_screening_status' => 'nullable|in:clear,pending,follow_up_required',
            'tuberculosis_test_date' => 'nullable|date',
            'tuberculosis_test_result' => 'nullable|string|max:100',
            'immunizations_up_to_date' => 'nullable|boolean',
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
            
            // System Fields
            'application_status' => 'nullable|in:pending,approved,rejected,under_review',
            'account_status' => 'nullable|in:active,inactive',
            
            // Password (optional)
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        // Handle file uploads
        if ($request->hasFile('profile_photo')) {
            if ($user->profile_photo_url) {
                Storage::disk('public')->delete($user->profile_photo_url);
            }
            $validated['profile_photo_url'] = $request->file('profile_photo')->store('profile_photos', 'public');
        }

        if ($request->hasFile('id_document')) {
            if ($user->id_document_url) {
                Storage::disk('public')->delete($user->id_document_url);
            }
            $validated['id_document_url'] = $request->file('id_document')->store('id_documents', 'public');
        }

        if ($request->hasFile('work_permit_document')) {
            if ($user->work_permit_document_url) {
                Storage::disk('public')->delete($user->work_permit_document_url);
            }
            $validated['work_permit_document_url'] = $request->file('work_permit_document')->store('work_permits', 'public');
        }

        if ($request->hasFile('dbs_document')) {
            if ($user->dbs_document_url) {
                Storage::disk('public')->delete($user->dbs_document_url);
            }
            $validated['dbs_document_url'] = $request->file('dbs_document')->store('dbs_documents', 'public');
        }

        // Hash password if provided
        if (!empty($validated['password'])) {
            $validated['password'] = Hash::make($validated['password']);
        } else {
            unset($validated['password']);
        }

        // Update user
        $user->update($validated);

        return redirect()->route('admin.users.show', $user->id)
            ->with('success', 'User updated successfully!');
    }

    /**
     * Update user's application status
     */
    public function updateApplicationStatus(Request $request, $id)
    {
        $user = User::findOrFail($id);
        
        $validated = $request->validate([
            'application_status' => 'required|in:pending,approved,rejected,under_review',
            'admin_notes' => 'nullable|string'
        ]);

        $user->update([
            'application_status' => $validated['application_status']
        ]);

        return redirect()->back()->with('success', 'Application status updated successfully!');
    }

    /**
     * Update user's account status (active/inactive)
     */
    public function updateAccountStatus(Request $request, $id)
    {
        $user = User::findOrFail($id);
        
        $validated = $request->validate([
            'account_status' => 'required|in:active,inactive'
        ]);

        $user->update($validated);

        return redirect()->back()->with('success', 'Account status updated successfully!');
    }

    /**
     * Update JSON fields (qualifications, certifications, etc.)
     */
    public function updateJsonField(Request $request, $id)
    {
        $user = User::findOrFail($id);
        
        $field = $request->input('field'); // e.g., 'qualifications', 'certifications'
        $data = $request->input('data'); // JSON data
        
        $allowedFields = [
            'qualifications', 'certifications', 'work_experiences', 
            'references', 'care_skills', 'preferred_care_types',
            'preferred_work_settings', 'preferred_employment_types',
            'available_days', 'available_shifts', 'preferred_locations',
            'additional_languages', 'documents', 'user_consents'
        ];

        if (!in_array($field, $allowedFields)) {
            return response()->json(['error' => 'Invalid field'], 400);
        }

        $user->update([
            $field => $data
        ]);

        return response()->json([
            'success' => true,
            'message' => ucfirst($field) . ' updated successfully'
        ]);
    }

    /**
     * Delete a user
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        
        // Don't allow deleting your own account
        if ($user->id === auth()->id()) {
            return redirect()->back()->with('error', 'You cannot delete your own account!');
        }

        // Delete associated files
        $filesToDelete = [
            $user->profile_photo_url,
            $user->id_document_url,
            $user->work_permit_document_url,
            $user->dbs_document_url,
            $user->background_check_document_url,
            $user->immunization_records_url
        ];

        foreach ($filesToDelete as $file) {
            if ($file) {
                Storage::disk('public')->delete($file);
            }
        }

        $user->delete();

        return redirect()->route('admin.users.index')
            ->with('success', 'User deleted successfully!');
    }

    /**
     * Export users to CSV
     */
    public function export(Request $request)
    {
        $users = User::all();
        
        $filename = 'users_export_' . date('Y-m-d_H-i-s') . '.csv';
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => "attachment; filename=\"$filename\"",
        ];

        $callback = function() use ($users) {
            $file = fopen('php://output', 'w');
            
            // Headers
            fputcsv($file, [
                'ID', 'Name', 'Email', 'Phone', 'Role', 
                'Application Status', 'Account Status', 'Created At'
            ]);

            // Data
            foreach ($users as $user) {
                fputcsv($file, [
                    $user->id,
                    $user->first_name . ' ' . $user->last_name,
                    $user->email,
                    $user->phone_primary,
                    $user->role,
                    $user->application_status,
                    $user->account_status,
                    $user->created_at
                ]);
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
        }