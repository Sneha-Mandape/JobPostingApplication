<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JobListing;

class CandidateController extends Controller
{
    public function candidateDashboard(){
        return Redirect()->route('instructor.view-schedule');
    }

    public function availableJobs(){
        $jobListings = JobListing::all();
        return view('view-available-jobs', compact('jobListings'));
    }


}
