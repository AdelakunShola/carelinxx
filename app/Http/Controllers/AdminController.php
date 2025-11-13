<?php

namespace App\Http\Controllers;

use App\Models\contact;
use App\Models\setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class AdminController extends Controller
{
     public function AdminDashboard()
    {
        return view('admin.index');
    }//end method




     public function AdminLogin()
    {
        return view('admin.admin_login');
    }

    // Handle Login Submit
    public function AdminLoginSubmit(Request $request)
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

            return redirect()->intended(route('admin.dashboard'))
                ->with('success', 'Welcome back, ' . Auth::user()->first_name . '!');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }


     public function AdminLogout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login')
            ->with('success', 'You have been logged out successfully.');
    }




    public function allContacts()
    {
        $contacts = Contact::latest()->get();
        return view('backend.contacts.all_contacts', compact('contacts'));
    }

    public function viewContact($id)
    {
        $contact = Contact::findOrFail($id);
        
        // Mark as read if it's pending
        if ($contact->status === 'pending') {
            $contact->update(['status' => 'read']);
        }

        return view('backend.contacts.view_contact', compact('contact'));
    }

    public function replyContact(Request $request, $id)
    {
        $validated = $request->validate([
            'admin_reply' => 'required|string|max:2000',
        ]);

        $contact = Contact::findOrFail($id);
        
        $contact->update([
            'admin_reply' => $validated['admin_reply'],
            'status' => 'replied',
            'replied_at' => now()
        ]);

      

        $notification = array(
            'message' => 'Reply sent successfully!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function updateContactStatus(Request $request, $id)
    {
        $contact = Contact::findOrFail($id);
        
        $contact->update([
            'status' => $request->status
        ]);

        $notification = array(
            'message' => 'Status updated successfully!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function deleteContact($id)
    {
        $contact = contact::findOrFail($id);
        $contact->delete();

        $notification = array(
            'message' => 'Contact deleted successfully!',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.all.contacts')->with($notification);
    }
























    public function index()
    {
        $settings = Setting::getSettings();
        return view('backend.setting', compact('settings'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'company_name' => 'nullable|string|max:255',
            'company_email' => 'nullable|email|max:255',
            'company_phone' => 'nullable|string|max:20',
            'company_address' => 'nullable|string',
            'company_phone_2' => 'nullable|string|max:20',
            'support_email' => 'nullable|email|max:255',
            'facebook_url' => 'nullable|url|max:255',
            'twitter_url' => 'nullable|url|max:255',
            'linkedin_url' => 'nullable|url|max:255',
            'instagram_url' => 'nullable|url|max:255',
            'business_hours' => 'nullable|string',
            'footer_text' => 'nullable|string',
            'company_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'company_favicon' => 'nullable|image|mimes:jpeg,png,jpg,gif,ico|max:1024',
        ]);

        $settings = Setting::first();
        
        if (!$settings) {
            $settings = new Setting();
        }

        // Handle logo upload
        if ($request->hasFile('company_logo')) {
            // Delete old logo
            if ($settings->company_logo && File::exists(public_path($settings->company_logo))) {
                File::delete(public_path($settings->company_logo));
            }
            
            $logo = $request->file('company_logo');
            $logoName = 'logo_' . time() . '.' . $logo->getClientOriginalExtension();
            $logo->move(public_path('uploads/settings'), $logoName);
            $validated['company_logo'] = 'uploads/settings/' . $logoName;
        }

        // Handle favicon upload
        if ($request->hasFile('company_favicon')) {
            // Delete old favicon
            if ($settings->company_favicon && File::exists(public_path($settings->company_favicon))) {
                File::delete(public_path($settings->company_favicon));
            }
            
            $favicon = $request->file('company_favicon');
            $faviconName = 'favicon_' . time() . '.' . $favicon->getClientOriginalExtension();
            $favicon->move(public_path('uploads/settings'), $faviconName);
            $validated['company_favicon'] = 'uploads/settings/' . $faviconName;
        }

        $settings->fill($validated);
        $settings->save();

        $notification = array(
            'message' => 'Settings updated successfully!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function removeLogo()
    {
        $settings = Setting::first();
        
        if ($settings && $settings->company_logo) {
            if (File::exists(public_path($settings->company_logo))) {
                File::delete(public_path($settings->company_logo));
            }
            $settings->company_logo = null;
            $settings->save();
        }

        $notification = array(
            'message' => 'Logo removed successfully!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function removeFavicon()
    {
        $settings = setting::first();
        
        if ($settings && $settings->company_favicon) {
            if (File::exists(public_path($settings->company_favicon))) {
                File::delete(public_path($settings->company_favicon));
            }
            $settings->company_favicon = null;
            $settings->save();
        }

        $notification = array(
            'message' => 'Favicon removed successfully!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}
