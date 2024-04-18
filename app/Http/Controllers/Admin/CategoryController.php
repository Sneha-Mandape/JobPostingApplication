<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JobCategory;

class CategoryController extends Controller
{
    public function addCategory(){
        return view ('admin.JobCategory.add-category');
    }


    public function storeCategory(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        // Create a new Course instance
        $course = new JobCategory();
        $course->name = $validatedData['name'];


        // Save the course to the database
        $course->save();

        // Redirect back with success message
        return redirect()->back()->with('success', 'Category created successfully!');
    }


    public function viewCategory(){
        $categories= JobCategory::all();
        return view('admin.JobCategory.view-categories', compact('categories'));

    }

}
