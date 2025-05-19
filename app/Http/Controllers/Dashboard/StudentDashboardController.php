<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Models\OpenfundStudent;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class StudentDashboardController extends Controller
{
    // public function index()
    // {
    //     $students = Student::all();
    //     return view('admin.students.list', compact('students'));
    // }


    public function index()
    {
        $students = Student::where('make_pledge', 0)
            ->where('payment_approved', 0)

            ->get();

        return view('admin.students.list', compact('students'));
    }


    public function Create()
    {
        return view('admin.students.add');
    }

    public function Store(Request $request)
    {
        $student = new Student;

        $student->qalam_id = $request->qalam_id;
        $student->student_name = $request->student_name;
        $student->father_name = $request->father_name;
        $student->institutions = $request->institutions;
        $student->discipline = $request->discipline;
        $student->contact_no = $request->contact_no;
        $student->home_address = $request->home_address;
        $student->scholarship_name = $request->scholarship_name;
        $student->nust_trust_fund_donor_name = $request->nust_trust_fund_donor_name;
        $student->province = $request->province;
        $student->domicile = $request->domicile;
        $student->gender = $request->gender;
        $student->program = $request->program;
        $student->degree = $request->degree;
        $student->year_of_admission = $request->year_of_admission;
        $student->father_status = $request->father_status;
        $student->father_profession = $request->father_profession;
        $student->monthly_income = $request->monthly_income;
        $student->statement_of_purpose = $request->statement_of_purpose;
        $student->remarks = $request->remarks;
        $student->make_pledge = $request->make_pledge;
        $student->payment_approved = $request->payment_approved;
        $student->hostel_status = $request->hostel_status;

        // Handle image upload and replacement
        if ($request->hasFile('images')) {
            // Delete the existing image if it exists
            if ($student->images) {
                $existingImagePath = public_path('templates/students_images') . '/' . $student->images;
                if (file_exists($existingImagePath)) {
                    unlink($existingImagePath);
                }
            }

            // Save the new image
            $file = $request->file('images');
            $fileName = time() . '_' . $file->getClientOriginalName();
            if ($file->move(public_path('templates/students_images'), $fileName)) {
                $student->images = $fileName;
            } else {
                return redirect()->back()->with('error', 'Failed to upload image');
            }
        }

        // Save updated student record
        $student->save();

        return redirect()->back()->with('success', 'Student information Enter successfully!');
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

        // Update student data from request
        $student->qalam_id = $request->qalam_id;
        $student->student_name = $request->student_name;
        $student->father_name = $request->father_name;
        $student->institutions = $request->institutions;
        $student->discipline = $request->discipline;
        $student->contact_no = $request->contact_no;
        $student->home_address = $request->home_address;
        $student->scholarship_name = $request->scholarship_name;
        $student->nust_trust_fund_donor_name = $request->nust_trust_fund_donor_name;
        $student->province = $request->province;
        $student->domicile = $request->domicile;
        $student->gender = $request->gender;
        $student->program = $request->program;
        $student->degree = $request->degree;
        $student->year_of_admission = $request->year_of_admission;
        $student->father_status = $request->father_status;
        $student->father_profession = $request->father_profession;
        $student->monthly_income = $request->monthly_income;
        $student->statement_of_purpose = $request->statement_of_purpose;
        $student->remarks = $request->remarks;
        $student->make_pledge = $request->make_pledge;
        $student->payment_approved = $request->payment_approved;
        $student->hostel_status = $request->hostel_status;

        // Handle image upload and replacement
        if ($request->hasFile('images')) {
            // Delete the existing image if it exists
            if ($student->images) {
                $existingImagePath = public_path('templates/students_images') . '/' . $student->images;
                if (file_exists($existingImagePath)) {
                    unlink($existingImagePath);
                }
            }

            // Save the new image
            $file = $request->file('images');
            $fileName = time() . '_' . $file->getClientOriginalName();
            if ($file->move(public_path('templates/students_images'), $fileName)) {
                $student->images = $fileName;
            } else {
                return redirect()->back()->with('error', 'Failed to upload image');
            }
        }

        // Save updated student record
        $student->save();

        return redirect()->back()->with('success', 'Student information updated successfully!');
    }


    public function delete($id)
    {
        $students = Student::find($id);
        $students->delete();
        return redirect()->back()->with('success', 'Student information delete successfully!');
    }


    public function bulkDelete(Request $request)
    {
        if ($request->has('ids')) {
            Student::whereIn('id', $request->ids)->delete();
            return redirect()->back()->with('success', 'Selected students deleted successfully.');
        } else {
            return redirect()->back()->with('error', 'No students selected.');
        }
    }

    public function Adopted($id)
    {
        $student = Student::find($id);

        if ($student) {
            $student->make_pledge = 1;
            $student->payment_approved = 1;
            $student->save();

            return back()->with('success', 'Student has been marked as adopted successfully.');
        } else {
            return back()->with('error', 'Student not found.');
        }
    }
}
