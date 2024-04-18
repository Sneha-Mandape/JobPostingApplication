<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JobType;
use App\Models\JobCategory;
use App\Models\JobApplication;
use App\Models\JobListing;

class JobListingController extends Controller
{
    public function addJoblist(){
        $jobCategories = JobCategory::all();
        $jobType = JobType::all();
        return view('admin.JobListing.add-joblist', compact('jobCategories', 'jobType'));
    }
    public function getJobTypes($categoryId)
    {
        $jobTypes = JobType::where('job_category_id', $categoryId)->get();
        return response()->json($jobTypes);
    }


    public function storeJob(Request $request)
    {

        $credentials = $request->validate([
            'job_category' => 'required|exists:job_categories,id',
            'job_type' => 'required|exists:job_type,id',
            'title' => 'required|string|max:255',
            'company_details' => 'required|string',
            'description' => 'required|string',
            // Add validation rules for other fields
            'custom_key.*' => 'nullable|string|max:255',
            'custom_value.*' => 'nullable|string',

        ]);




        $jobListing = new JobListing();
        $jobListing->job_category_id = $request->job_category;
        $jobListing->job_type_id = $request->job_type;
        $jobListing->title = $request->title;
        $jobListing->company_details = $request->company_details;
        $jobListing->description = $request->description;
        $jobListing->tags = $request->tags;
        $jobListing->skills = $request->skills;
        $jobListing->experience_required = $request->experience_required;
        $jobListing->salary = $request->salary;

        // Store custom fields as JSON
        $customFields = [];
        if ($request->filled('custom_key')) {
            foreach ($request->custom_key as $index => $key) {
                if (!empty($key) && isset($request->custom_value[$index])) {
                    $customFields[$key] = $request->custom_value[$index];
                }
            }
        }
        $jobListing->custom_fields = $customFields;

        $jobListing->save();

        return redirect()->back()->with('success', 'Job listing created successfully.');
    }


    public function viewJobList(){
        $jobListings = JobListing::all();
        return view('admin.JobListing.view-joblist', compact('jobListings'));

    }


    public function appliedJobs(){

        $appliedJobs = JobApplication::all();

        // Pass the fetched job applications to the view
        return view('admin.applications.applications', ['appliedJobs' => $appliedJobs]);
    }

}
