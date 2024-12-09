<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Models\OpenfundStudent;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class StudentDashboardController extends Controller
{
    public function index()
    {
        $students = OpenfundStudent::all();
        return view('admin.students.list', compact('students'));
    }

    public function edit($id)
    {
        $students = OpenfundStudent::find($id);
        return view('admin.students.edits', compact('students'));
    }

    public function update(Request $request, $id)
    {
        // Find the student by ID
        $student = OpenfundStudent::find($id);
    
        // Update the student's information
        $student->qalam_id = $request->input('qalam_id');
        $student->student_name = $request->input('student_name');
        $student->father_name = $request->input('father_name');
        $student->institutions = $request->input('institutions');
        $student->discipline = $request->input('discipline');
        $student->contact_no = $request->input('contact_no');
        $student->home_address = $request->input('home_address');
        $student->scholarship_name = $request->input('scholarship_name');
        $student->monthly_income = $request->input('monthly_income');
        $student->remarks = $request->input('remarks');
    
        // Handle file upload if a new image is provided
        if ($request->hasFile('images')) {
            // Delete the old image from storage if it exists
            if ($student->images && Storage::exists('students_images/' . $student->images)) {
                Storage::delete('students_images/' . $student->images);
            }
    
            // Upload the new image and store the filename
            $image = $request->file('images');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('students_images', $imageName);
            $student->images = $imageName;
        }
    
        // Save the updated student data
        $student->save();
    
        // Redirect back with a success message
        return redirect()->back()->with('success', 'Student information updated successfully!');
    }
    
}
