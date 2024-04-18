<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\AdminAuthController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\JobTypeController;
use App\Http\Controllers\Admin\JobListingController;
use App\Http\Controllers\Admin\InstructorController;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\JobApplicationController;
use App\Http\Controllers\Admin\ScheduleLectureController;
use Illuminate\Support\Facades\Route;
use App\Models\Course;

Route::get('/', function () {
    return view('auth.login');
});


Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/dashboard', [CandidateController::class, 'candidateDashboard'])->name('dashboard');

    Route::get('/availables-job-list', [CandidateController::class, 'availableJobs'])->name('instructor.view-schedule');

    Route::get('/apply-now/{jobListing}', [JobApplicationController::class, 'applyNow'])->name('apply-now');
    Route::post('/submit-job-application', [JobApplicationController::class, 'store'])->name('submit-job-application');

    //Applied jobs list
    Route::get('/applied-jobs', [JobApplicationController::class, 'appliedJobs'])->name('applied-jobs');
    Route::get('/applicant-rejected-applications', [JobApplicationController::class, 'rejectedApplications'])->name('applicant-rejected-applications');

});

Route::middleware('auth:admin')->group(function () {
    Route::prefix('admin')->namespace('Admin')->group(function () {
        Route::get('/dashboard', [AdminAuthController::class, 'dashboard'])->name('dashboard1');

        //Categories
        Route::get('/add-category', [CategoryController::class, 'addCategory'])->name('add-category');
        Route::post('/submit-category', [CategoryController::class, 'storeCategory'])->name('submit-category');
        Route::get('/view-Categories',  [CategoryController::class, 'viewCategory'])->name('view-category');

        //Job type
        Route::get('/add-jobtype', [JobTypeController::class, 'addJobType'])->name('add-jobtype');
        Route::post('/submit-jobtype', [JobTypeController::class, 'storeJobType'])->name('submit-jobtype');
        Route::get('/view-jobtypes',  [JobTypeController::class, 'viewJobType'])->name('view-jobtypes');

        //Job List
        Route::get('/add-joblist', [JobListingController::class, 'addJoblist'])->name('add-joblist');
        Route::get('/get-job-types/{categoryId}', [JobListingController::class, 'getJobTypes']);
        Route::post('/submit-job', [JobListingController::class, 'storeJob'])->name('submit-job');
        Route::get('/view-job',  [JobListingController::class, 'viewJobList'])->name('view-job');


        //Applied jobs list
        Route::get('/applications', [JobListingController::class, 'appliedJobs'])->name('applications');
        Route::get('/job-application/{id}', [JobApplicationController::class, 'applicantDetail'])->name('job-application.view');
        Route::get('/job-application/{id}/edit', [JobApplicationController::class, 'editApplicantDetail'])->name('job-application.edit');
        Route::post('/job-application/{id}/edit', [JobApplicationController::class, 'updateApplicantDetail'])->name('job-application.update');



        //Instuctors & lecture Schedule
        Route::get('/instructor-list', [InstructorController::class, 'ViewInstructor'])->name('view-candidates');

        Route::get('/schedule-list', [ScheduleLectureController::class, 'ViewSchedule'])->name('view-schedule');
        Route::get('/add-schedule', [ScheduleLectureController::class, 'addTimetable'])->name('add-schedule');
        Route::post('/submit-schedule', [ScheduleLectureController::class, 'storeTimetable'])->name('submit-schedule');

    });
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});




require __DIR__.'/auth.php';
