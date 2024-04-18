<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Models\JobListing;
use App\Models\JobApplication;
use App\Models\JobCategory;
use App\Models\JobType;

use Illuminate\Http\Request;

class AdminAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {

        $credentials = $request->validate([
            'username' => 'required|string',
            'password' => 'required',
        ], [
            'username.required' => 'Admin Username is Required',
            'password.required' => 'Password is Required',
        ]);



        $username = $credentials['username'];
        $password = $credentials['password'];



        // Attempt to authenticate admin
        if (Auth::guard('admin')->attempt(['username' => $username, 'password' => $password])) {

            // Admin login successful
            return redirect()->route('dashboard1'); // Replace with your admin dashboard route
        } else {
            // Admin login failed
            return redirect()->back()->withInput()->withErrors(['login_error' => 'Invalid username or password']);
        }
    }

    public function dashboard()
    {
        $jobListings = JobListing::count();
        $jobApplications = JobApplication::count();
        $categories= JobCategory::count();
        $jobtypes = JobType::count();
        // Pass the counts and courses data to the view
        return view('admin.dashboard', compact('jobListings', 'jobApplications', 'categories', 'jobtypes'));
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login-view'); // Replace with your admin dashboard route
    }

}
