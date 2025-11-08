<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\JobApplication;
use Illuminate\Http\Request;
use Carbon\Carbon;

class AdminApplicationController extends Controller
{
    // Display all applications
    public function AllApplications(Request $request)
    {
        $query = JobApplication::with(['user', 'job']);

        // Filter by job
        if ($request->filled('job_id')) {
            $query->where('job_id', $request->job_id);
        }

        // Filter by status
        if ($request->filled('status')) {
            $query->where('application_status', $request->status);
        }

        // Order by applied date (newest first)
        $query->orderBy('applied_at', 'desc');

        $applications = $query->get();
        
        // Get all jobs for filter dropdown
        $jobs = Job::where('status', 'active')->get();

        return view('backend.applicant.all_applicant', compact('applications', 'jobs'));
    }

    // View application details
    public function ViewApplication($id)
    {
        $application = JobApplication::with(['user', 'job'])->findOrFail($id);
        return view('backend.applicant.view_applicant', compact('application'));
    }

    // Show edit form
    public function EditApplication($id)
    {
        $application = JobApplication::with(['user', 'job'])->findOrFail($id);
        return view('backend.applicant.edit_applicant', compact('application'));
    }

    // Update application
    public function UpdateApplication(Request $request, $id)
    {
        $application = JobApplication::findOrFail($id);

        $validated = $request->validate([
            'application_status' => 'required|in:pending,under_review,shortlisted,interview_scheduled,rejected,accepted',
            'reviewed_at' => 'nullable|date',
            'interview_date' => 'nullable|date',
            'interview_location' => 'nullable|string|max:255',
            'interview_notes' => 'nullable|string',
            'admin_notes' => 'nullable|string',
        ]);

        // Update application
        $application->update([
            'application_status' => $validated['application_status'],
            'reviewed_at' => $validated['reviewed_at'] ?? $application->reviewed_at,
            'interview_date' => $validated['interview_date'] ?? null,
            'interview_location' => $validated['interview_location'] ?? null,
            'interview_notes' => $validated['interview_notes'] ?? null,
            'admin_notes' => $validated['admin_notes'] ?? null,
        ]);

        // If status is changed to under_review and reviewed_at is empty, set it to now
        if ($validated['application_status'] == 'under_review' && !$application->reviewed_at) {
            $application->update(['reviewed_at' => now()]);
        }

        $notification = array(
            'message' => 'Application Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.applications')->with($notification);
    }

    // Delete application
    public function DeleteApplication($id)
    {
        $application = JobApplication::findOrFail($id);
        
        // Delete CV file if exists
        if ($application->cv_document_url) {
            $filePath = storage_path('app/public/' . $application->cv_document_url);
            if (file_exists($filePath)) {
                unlink($filePath);
            }
        }

        $application->delete();

        $notification = array(
            'message' => 'Application Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    // Bulk update status
    public function BulkUpdateStatus(Request $request)
    {
        $validated = $request->validate([
            'application_ids' => 'required|array',
            'application_ids.*' => 'exists:job_applications,id',
            'status' => 'required|in:pending,under_review,shortlisted,interview_scheduled,rejected,accepted',
        ]);

        JobApplication::whereIn('id', $validated['application_ids'])
            ->update([
                'application_status' => $validated['status'],
                'reviewed_at' => now()
            ]);

        $notification = array(
            'message' => 'Applications Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    // Export applications
    public function ExportApplications(Request $request)
    {
        $query = JobApplication::with(['user', 'job']);

        if ($request->filled('job_id')) {
            $query->where('job_id', $request->job_id);
        }

        if ($request->filled('status')) {
            $query->where('application_status', $request->status);
        }

        $applications = $query->get();

        // Generate CSV
        $filename = 'applications_' . date('Y-m-d_His') . '.csv';
        $handle = fopen('php://output', 'w');
        
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename="' . $filename . '"');
        
        // CSV headers
        fputcsv($handle, [
            'ID',
            'Applicant Name',
            'Email',
            'Phone',
            'Position',
            'Company',
            'Status',
            'Applied Date',
            'Reviewed Date'
        ]);

        // CSV data
        foreach ($applications as $app) {
            fputcsv($handle, [
                $app->id,
                $app->user->first_name . ' ' . $app->user->last_name,
                $app->user->email,
                $app->user->phone_primary ?? 'N/A',
                $app->job->position,
                $app->job->company_name,
                ucfirst(str_replace('_', ' ', $app->application_status)),
                $app->applied_at,
                $app->reviewed_at ?? 'N/A'
            ]);
        }

        fclose($handle);
        exit;
    }
}