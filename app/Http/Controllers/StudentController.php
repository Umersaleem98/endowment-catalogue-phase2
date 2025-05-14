<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\StudentsImport;

use App\Exports\StudentsExport;

use Maatwebsite\Excel\Facades\Excel;

class StudentController extends Controller
{
    public function import(Request $request)
    {
        $file = $request->file('file');
    
        // Optional: check if file is present
        if (!$file) {
            return back()->with('error', 'No file uploaded');
        }
    
        // Dump file details
        // dd($file);
    
        Excel::import(new StudentsImport, $file);
    
        return redirect()->back()->with('success', 'Students imported successfully.');
    }
    
    public function export()
    {
        return Excel::download(new StudentsExport, 'students.xlsx');
    }

    
}
