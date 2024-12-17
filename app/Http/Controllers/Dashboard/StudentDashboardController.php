<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Models\OpenfundStudent;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class StudentDashboardController extends Controller
{
    public function index()
    {
        $students = Student::all();
        return view('admin.students.list', compact('students'));
    }

    public function edit($id)
    {
        $students = Student::find($id);
        return view('admin.students.edits', compact('students'));
    }

    public function update(Request $request, $id)
    {
        // Find the student by ID
        $student = Student::find($id);
    
        if (!$student) {
            return redirect()->back()->with('error', 'Student not found.');
        }
    
        // Update student data
        $student->qalam_id = $request->qalam_id;
        $student->student_name = $request->student_name;
        $student->father_name = $request->father_name;
        $student->institutions = $request->institutions;
        $student->discipline = $request->discipline;
        $student->contact_no = $request->contact_no;
        $student->home_address = $request->home_address;
        $student->scholarship_name = $request->scholarship_name;
        $student->monthly_income = $request->monthly_income;
        $student->remarks = $request->remarks;
    
        // Handle image upload and replacement
        if ($request->hasFile('images')) {
            // Check if there is an existing image
            if ($student->images) {
                // Define the image path
                $existingImagePath = public_path('templates/students_images') . '/' . $student->images;

                // Delete the existing image if it exists
                if (file_exists($existingImagePath)) {
                    unlink($existingImagePath);
                }
            }

            // Process and move the new uploaded image
            $file = $request->file('images');
            $fileName = time() . '_' . $file->getClientOriginalName();
            if ($file->move(public_path('templates/students_images'), $fileName)) {
                // Update the images attribute on the student model
                $student->images = $fileName;
            } else {
                // Handle file upload error
                return redirect()->back()->with('error', 'Failed to upload image');
            }
        }
    
        // Update other fields
        $student->make_pledge = $request->make_pledge;
        $student->payment_approved = $request->payment_approved;
    
        // Save the updated student data
        $student->save();
    
        // Redirect back with a success message
        return redirect()->back()->with('success', 'Student information updated successfully!');
    }
    
    public function delete($id)
    {
        $students = Student::find($id);
        $students->delete();
        return redirect()->back()->with('success', 'Student information delete successfully!');

    }
   
}
