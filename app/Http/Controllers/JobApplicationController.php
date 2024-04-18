<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JobApplication;
use App\Models\RejectionMessage;
use Illuminate\Support\Facades\Auth;

class JobApplicationController extends Controller
{
    public function applyNow($jobListing){
        return view('application-form', compact('jobListing'));
    }

    public function store(Request $request)
    {
        // Validate the form data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'why_hire' => 'required|string',
            'resume' => 'required|file|mimes:pdf,docx,doc', // Adjust max file size as needed
            'user_id' => 'required|exists:users,id', // Ensure user_id exists in the users table
            'job_id' =>'required|exists:job_listings,id',
        ]);



         // Store the uploaded resume file in the public directory
         $resumePath = $request->file('resume')->storeAs('public/resumes', $request->file('resume')->getClientOriginalName());
        // Store the job application data in the database
        $jobApplication = new JobApplication();

        // Assign values to its properties
        $jobApplication->name = $request->name;
        $jobApplication->email = $request->email;
        $jobApplication->why_hire = $request->why_hire;
        $jobApplication->resume = str_replace('public/', '', $resumePath); // Remove 'public/' from the file path
        $jobApplication->candidate_id = $request->user_id;
        $jobApplication->job_id = $request->job_id;


        // Save the JobApplication to the database
        $jobApplication->save();

        // Redirect back with success message
        return back()->with('success', 'Your job application has been submitted successfully!');
    }

    public function appliedJobs(){
        // Get the authenticated user ID
        $userId = Auth::id();

        // Fetch job applications where candidate_id matches the authenticated user ID
        $appliedJobs = JobApplication::where('candidate_id', $userId)->get();

        // Pass the fetched job applications to the view
        return view('applied-jobs', ['appliedJobs' => $appliedJobs]);
    }

    public function applicantDetail($id){
        $applicantDetail = JobApplication::findOrFail($id);
        return view('admin.applications.view-details', compact('applicantDetail'));
    }

    public function editApplicantDetail($id){
        $applicantDetail = JobApplication::findOrFail($id);
        return view('admin.applications.edit-application', compact('applicantDetail'));

    }

    public function updateApplicantDetail(Request $request, $id)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'why_hire' => 'required|string',
            'status' => 'required|boolean',
            'resume' => 'nullable|file|mimes:pdf,docx,doc|max:2048', // Adjust max file size as needed
            'reason' => 'nullable|string',
        ]);

        // Find the job application by ID
        $jobApplication = JobApplication::findOrFail($id);

        // Update job application details

        $jobApplication->name = $request->name;
        $jobApplication->email = $request->email;
        $jobApplication->why_hire = $request->why_hire;
        $jobApplication->status = $request->status;

        // If rejected, store rejection reason
        if ($request->status == 0) {
            $request->validate([
                'reason' => 'required|string',
            ], [
                'reason.required' => 'Specify the reason for rejection.',
            ]);

            $rejectionMsg = new RejectionMessage();
            $rejectionMsg->candidate_id = $request->candidate_id;
            $rejectionMsg->application_id = $request->application_id;
            $rejectionMsg->message = $request->reason;

            $rejectionMsg-> save();
        } else {
            $jobApplication->rejection_reason = null; // Clear rejection reason if status is accepted
        }

        // Update resume if provided
        if ($request->hasFile('resume')) {
            // Delete old resume file
            Storage::delete($jobApplication->resume);

            // Store new resume file
            $resumePath = $request->file('resume')->store('resumes');

            // Update resume path in the database
            $jobApplication->resume = $resumePath;
        }
        else {
            // Keep the same resume path
            $resumePath = $jobApplication->resume;
        }
        // Save the changes
        $jobApplication->save();

        // Redirect back or to a success page
        return redirect()->back()->with('success', 'Job application updated successfully.');
    }


    public function rejectedApplications(){
        $userId = Auth::id();

          // Retrieve rejection messages for the candidate
        $rejections = RejectionMessage::whereHas('jobApplication', function ($query) use ($userId) {
            $query->where('candidate_id', $userId);
        })->with('jobApplication')->get();

        return view('rejected-applications', compact('rejections'));


    }
}
