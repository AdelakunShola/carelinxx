<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\JobApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class JobController extends Controller
{
   public function AllJobs()
    {
        $jobs = Job::latest()->get();
        return view('backend.job.all_job', compact('jobs'));
    }
    // Show create form
    public function AddJob()
    {
        return view('backend.job.add_job');
    }

    // Store new job
    public function StoreJob(Request $request)
    {
        Job::create([
            'company_name' => $request->company_name,
            'position' => $request->position,
            'job_category' => $request->job_category,
            'job_type' => $request->job_type,
            'no_of_vacancy' => $request->no_of_vacancy,
            'experience' => $request->experience,
            'posted_date' => $request->posted_date,
            'last_date' => $request->last_date,
            'close_date' => $request->close_date,
            'gender' => $request->gender,
            'salary_from' => $request->salary_from,
            'salary_to' => $request->salary_to,
            'city' => $request->city,
            'state' => $request->state,
            'country' => $request->country,
            'education_level' => $request->education_level,
            'description' => $request->description,
            'status' => $request->status,
        ]);

        $notification = array(
            'message' => 'Job Created Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.jobs')->with($notification);
    }

    // Show edit form
    public function EditJob($id)
    {
        $job = Job::findOrFail($id);
        return view('backend.job.edit_job', compact('job'));
    }

    // Update job
    public function UpdateJob(Request $request, $id)
    {
        $job = Job::findOrFail($id);
        $job->update([
            'company_name' => $request->company_name,
            'position' => $request->position,
            'job_category' => $request->job_category,
            'job_type' => $request->job_type,
            'no_of_vacancy' => $request->no_of_vacancy,
            'experience' => $request->experience,
            'posted_date' => $request->posted_date,
            'last_date' => $request->last_date,
            'close_date' => $request->close_date,
            'gender' => $request->gender,
            'salary_from' => $request->salary_from,
            'salary_to' => $request->salary_to,
            'city' => $request->city,
            'state' => $request->state,
            'country' => $request->country,
            'education_level' => $request->education_level,
            'description' => $request->description,
            'status' => $request->status,
        ]);

        $notification = array(
            'message' => 'Job Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.jobs')->with($notification);
    }

    // Delete job
    public function DeleteJob($id)
    {
        Job::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Job Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }






















public function index(Request $request)
    {
        $query = Job::where('status', 'active')->with('applications');

        // Apply filters
        if ($request->filled('keywords')) {
            $keywords = $request->keywords;
            $query->where(function($q) use ($keywords) {
                $q->where('position', 'like', "%{$keywords}%")
                  ->orWhere('company_name', 'like', "%{$keywords}%")
                  ->orWhere('description', 'like', "%{$keywords}%");
            });
        }

        if ($request->filled('job_category')) {
            $query->where('job_category', $request->job_category);
        }

        if ($request->filled('job_type')) {
            $query->where('job_type', $request->job_type);
        }

        if ($request->filled('experience')) {
            $query->where('experience', $request->experience);
        }

        if ($request->filled('city')) {
            $query->where('city', 'like', "%{$request->city}%");
        }

        if ($request->filled('state')) {
            $query->where('state', 'like', "%{$request->state}%");
        }

        if ($request->filled('gender')) {
            $query->where('gender', $request->gender);
        }

        // Salary range filter
        if ($request->filled('salary_range')) {
            $range = $request->salary_range;
            if ($range == '0-30000') {
                $query->whereBetween('salary_from', [0, 30000]);
            } elseif ($range == '30000-50000') {
                $query->whereBetween('salary_from', [30000, 50000]);
            } elseif ($range == '50000-70000') {
                $query->whereBetween('salary_from', [50000, 70000]);
            } elseif ($range == '70000+') {
                $query->where('salary_from', '>=', 70000);
            }
        }

        // Order by posted date (newest first)
        $query->orderBy('posted_date', 'desc');

        // Paginate results
        $jobs = $query->paginate(10);

        return view('frontend.user.user_find_jobs', compact('jobs'));
    }
    
    // Show job details
    public function show($id)
    {
        $job = Job::with('applications')->findOrFail($id);
        return view('frontend.user.user_job_details', compact('job'));
    }

    // Show job application form
    public function apply($id)
    {
        $job = Job::findOrFail($id);
        $user = Auth::user();

        // Check if user already applied
        $existingApplication = JobApplication::where('user_id', $user->id)
            ->where('job_id', $job->id)
            ->first();

        if ($existingApplication) {
            return redirect()->route('user.job.details', $job->id)
                ->with('error', 'You have already applied for this position.');
        }

        // Check if job is still open
        if ($job->close_date && Carbon::parse($job->close_date)->isPast()) {
            return redirect()->route('user.job.details', $job->id)
                ->with('error', 'This job posting has closed.');
        }

        return view('frontend.user.user_job_apply', compact('job'));
    }

    // Submit job application
    public function applySubmit(Request $request, $id)
    {
        $job = Job::findOrFail($id);
        $user = Auth::user();

        // Check if user already applied
        $existingApplication = JobApplication::where('user_id', $user->id)
            ->where('job_id', $job->id)
            ->first();

        if ($existingApplication) {
            return redirect()->route('user.job.details', $job->id)
                ->with('error', 'You have already applied for this position.');
        }

        // Validate required profile fields
        $missingFields = [];
        if (!$user->first_name) $missingFields[] = 'First Name';
        if (!$user->last_name) $missingFields[] = 'Last Name';
        if (!$user->phone_primary) $missingFields[] = 'Primary Phone';
        if (!$user->date_of_birth) $missingFields[] = 'Date of Birth';
        if (!$user->address_line1) $missingFields[] = 'Address';
        if (!$user->city) $missingFields[] = 'City';
        if (!$user->state_province) $missingFields[] = 'State';
        if (!$user->country) $missingFields[] = 'Country';

        if (!empty($missingFields)) {
            return redirect()->route('user.profile')
                ->with('error', 'Please complete your profile before applying. Missing: ' . implode(', ', $missingFields));
        }

        // Validate application
        $validated = $request->validate([
            'cover_letter' => 'required|string|min:50',
            'cv_document' => 'required|file|mimes:pdf,doc,docx|max:5120',
        ]);

        // Handle CV upload
        $cvPath = null;
        if ($request->hasFile('cv_document')) {
            $cvPath = $request->file('cv_document')->store('cv_documents', 'public');
        }

        // Create application
        JobApplication::create([
            'user_id' => $user->id,
            'job_id' => $job->id,
            'cover_letter' => $validated['cover_letter'],
            'cv_document_url' => $cvPath,
            'application_status' => 'pending',
            'applied_at' => now(),
        ]);

        return redirect()->route('user.applications')
            ->with('success', 'Application submitted successfully! The employer will review your application.');
    }

    // Show user's applications
    public function myApplications(Request $request)
    {
        $query = JobApplication::where('user_id', Auth::id())
            ->with('job')
            ->orderBy('applied_at', 'desc');

        // Filter by status
        if ($request->filled('status')) {
            $query->where('application_status', $request->status);
        }

        $applications = $query->get();

        return view('frontend.user.user_applications', compact('applications'));
    }

    // Show application details
    public function applicationDetails($id)
    {
        $application = JobApplication::where('user_id', Auth::id())
            ->where('id', $id)
            ->with('job')
            ->firstOrFail();

        return view('frontend.user.user_application_details', compact('application'));
    }

    // Withdraw application
    public function withdrawApplication($id)
    {
        $application = JobApplication::where('user_id', Auth::id())
            ->where('id', $id)
            ->firstOrFail();

        // Check if application can be withdrawn
        if (in_array($application->application_status, ['withdrawn', 'rejected', 'accepted'])) {
            return redirect()->route('user.applications')
                ->with('error', 'This application cannot be withdrawn.');
        }

        $application->update([
            'application_status' => 'withdrawn',
            'withdrawn_at' => now(),
        ]);

        return redirect()->route('user.applications')
            ->with('success', 'Application withdrawn successfully.');
    }
}
