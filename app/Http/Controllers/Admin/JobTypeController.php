<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JobType;
use App\Models\JobCategory;

class JobTypeController extends Controller
{
    public function addJobType(Request $request){
        $categories = JobCategory::all();
        return view('admin.JobType.add-jobtype', compact('categories'));
    }

    public function storeJobType(Request $request){

        $request->validate([
            'job_category' => 'required|exists:job_categories,id',
            'job_type_name' => 'required|string|max:255',
        ]);

        // Create a new batch instance
        $jobType = new JobType();
        $jobType->job_category_id = $request->job_category;
        $jobType->job_type_name = $request->job_type_name;

        // You can set other properties of the batch here if needed

        // Save the batch to the database
        $jobType->save();

        // Redirect back or to a success page
        return redirect()->back()->with('success', 'Job Type added successfully!');
    }

    public function viewJobType(){
        $jobtypes = JobType::all();
        return view('admin.JobType.view-jobtype', compact('jobtypes'));

    }


}
