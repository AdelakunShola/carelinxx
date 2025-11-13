<?php

namespace App\Http\Controllers;

use App\Models\CaregiverRequest;
use App\Mail\CaregiverRequestCompleted;
use App\Mail\CaregiverRequestReminder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class CaregiverRequestController extends Controller
{
    // Start a new request (Step 0)
    public function start(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'who_needs_care' => 'required|string',
            'location' => 'required|string',
            'location_city' => 'nullable|string',
            'location_address' => 'nullable|string',
            'location_latitude' => 'nullable|numeric',
            'location_longitude' => 'nullable|numeric',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        $trackingNumber = CaregiverRequest::generateTrackingNumber();

        $caregiverRequest = CaregiverRequest::create([
            'tracking_number' => $trackingNumber,
            'who_needs_care' => $request->who_needs_care,
            'location_postcode' => $request->location,
            'location_city' => $request->location_city,
            'location_address' => $request->location_address,
            'location_latitude' => $request->location_latitude,
            'location_longitude' => $request->location_longitude,
            'status' => 'incomplete',
            'current_step' => 1,
            'email' => '', // Will be filled later
        ]);

        return response()->json([
            'success' => true,
            'tracking_number' => $trackingNumber,
            'message' => 'Request started successfully'
        ]);
    }

    // Resume an incomplete request
    public function resume($tracking)
    {
        $request = CaregiverRequest::where('tracking_number', $tracking)->firstOrFail();
        
        if ($request->status !== 'incomplete') {
            return redirect()->route('home')->with('message', 'This request has already been completed.');
        }

        // Return view with request data to resume where they left off
        return view('caregiver-request.resume', compact('request'));
    }

    // Update care needs (Step 1)
    public function updateCareNeeds(Request $request, $trackingNumber)
    {
        $validator = Validator::make($request->all(), [
            'urgency' => 'required|in:immediately,within_2_weeks,within_1_month',
            'hours_per_week' => 'required|in:1-10,10-20,20+',
            'duration' => 'required|in:1-4_weeks,1-6_months,6+_months',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        $caregiverRequest = CaregiverRequest::where('tracking_number', $trackingNumber)->firstOrFail();

        $caregiverRequest->update([
            'urgency' => $request->urgency,
            'hours_per_week' => $request->hours_per_week,
            'duration' => $request->duration,
            'current_step' => 2,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Care needs updated successfully'
        ]);
    }

    // Update experience preferences (Step 2)
    public function updateExperience(Request $request, $trackingNumber)
    {
        $validator = Validator::make($request->all(), [
            'service_types' => 'required|array',
            'health_conditions' => 'nullable|array',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        $caregiverRequest = CaregiverRequest::where('tracking_number', $trackingNumber)->firstOrFail();

        $caregiverRequest->update([
            'service_types' => $request->service_types,
            'health_conditions' => $request->health_conditions ?? [],
            'current_step' => 3,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Experience preferences updated successfully'
        ]);
    }

    // Update caregiver preferences (Step 3)
    public function updatePreferences(Request $request, $trackingNumber)
    {
        $validator = Validator::make($request->all(), [
            'gender_preference' => 'required|in:any,female,male',
            'language_preference' => 'required|string',
            'additional_languages' => 'nullable|array',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        $caregiverRequest = CaregiverRequest::where('tracking_number', $trackingNumber)->firstOrFail();

        $caregiverRequest->update([
            'gender_preference' => $request->gender_preference,
            'language_preference' => $request->language_preference,
            'additional_languages' => $request->additional_languages ?? [],
            'current_step' => 4,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Preferences updated successfully'
        ]);
    }

    // Update schedule (Step 4)
    public function updateSchedule(Request $request, $trackingNumber)
    {
        $validator = Validator::make($request->all(), [
            'schedule_type' => 'required|in:flexible,fixed',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        $caregiverRequest = CaregiverRequest::where('tracking_number', $trackingNumber)->firstOrFail();

        $caregiverRequest->update([
            'schedule_type' => $request->schedule_type,
            'current_step' => 5,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Schedule updated successfully'
        ]);
    }

    // Complete request (Step 5)
    public function complete(Request $request, $trackingNumber)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'phone' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        $caregiverRequest = CaregiverRequest::where('tracking_number', $trackingNumber)->firstOrFail();

        $caregiverRequest->update([
            'email' => $request->email,
            'phone' => $request->phone,
            'status' => 'pending',
            'completed_at' => now(),
            'current_step' => 6,
        ]);

        // Send confirmation email
        try {
            Mail::to($request->email)->send(new CaregiverRequestCompleted($caregiverRequest));
        } catch (\Exception $e) {
            Log::error('Failed to send confirmation email: ' . $e->getMessage());
        }

        return response()->json([
            'success' => true,
            'message' => 'Request completed successfully',
            'tracking_number' => $trackingNumber
        ]);
    }

    // Send reminder email
    public function sendReminder(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tracking_number' => 'required|string|exists:caregiver_requests,tracking_number',
            'email' => 'required|email',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        $caregiverRequest = CaregiverRequest::where('tracking_number', $request->tracking_number)->firstOrFail();

        try {
            Mail::to($request->email)->send(new CaregiverRequestReminder($caregiverRequest));
            
            return response()->json([
                'success' => true,
                'message' => 'Reminder email sent successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to send reminder email'
            ], 500);
        }
    }

    // Track request by tracking number (Public API)
    public function trackRequest($trackingNumber)
    {
        try {
            $request = CaregiverRequest::where('tracking_number', $trackingNumber)->first();
            
            if (!$request) {
                return response()->json([
                    'success' => false,
                    'message' => 'Tracking number not found. Please check and try again.'
                ], 404);
            }
            
            return response()->json([
                'success' => true,
                'request' => [
                    'id' => $request->id,
                    'tracking_number' => $request->tracking_number,
                    'who_needs_care' => $request->who_needs_care,
                    'location_postcode' => $request->location_postcode,
                    'location_city' => $request->location_city,
                    'urgency' => $request->urgency,
                    'hours_per_week' => $request->hours_per_week,
                    'duration' => $request->duration,
                    'status' => $request->status,
                    'current_step' => $request->current_step ?? 1,
                    'created_at' => $request->created_at,
                    'completed_at' => $request->completed_at,
                    'updated_at' => $request->updated_at,
                ]
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'An error occurred while tracking your request.'
            ], 500);
        }
    }
































    public function index()
    {
        $requests = CaregiverRequest::orderBy('created_at', 'desc')->paginate(20);
        return view('backend.caregiver_requests.index', compact('requests'));
    }

    // Show single request
    public function show($id)
    {
        $request = CaregiverRequest::findOrFail($id);
        return view('backend.caregiver_requests.show', compact('request'));
    }

    // Update status
    public function updateStatus(Request $request, $id)
    {
        $caregiverRequest = CaregiverRequest::findOrFail($id);
        
        $caregiverRequest->update([
            'status' => $request->status
        ]);

        return redirect()->back()->with('success', 'Status updated successfully');
    }

    // Save admin notes
    public function saveNote(Request $request, $id)
    {
        $caregiverRequest = CaregiverRequest::findOrFail($id);
        
        $caregiverRequest->update([
            'admin_notes' => $request->notes
        ]);

        return redirect()->back()->with('success', 'Notes saved successfully');
    }
}

