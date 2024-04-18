<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Batch;

class CourseController extends Controller
{
    public function addCourse(){
        return view ('admin.add-category');
    }

    public function storeCourse(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        // Create a new Course instance
        $course = new Course();
        $course->name = $validatedData['name'];


        // Save the course to the database
        $course->save();

        // Redirect back with success message
        return redirect()->back()->with('success', 'Category created successfully!');
    }


    public function addbatch(Request $request){
        $courses = Category::all();
        return view('admin.add-batch', compact('courses'));
    }

    public function storeBatch(Request $request){
        $request->validate([
            'course' => 'required|exists:courses,id',
            'batch_name' => 'required|string|max:255',
        ]);

        // Create a new batch instance
        $batch = new Batch();
        $batch->course_id = $request->course;
        $batch->batch_name = $request->batch_name;

        // You can set other properties of the batch here if needed

        // Save the batch to the database
        $batch->save();

        // Redirect back or to a success page
        return redirect()->back()->with('success', 'Batch created successfully!');
    }

    public function viewCourse(){
        $courses = Course::all();
        return view('admin.view-courses', compact('courses'));

    }

    public function viewBatch(){
        $batches = Batch::all();
        return view('admin.view-batches', compact('batches'));

    }
}
