<?php

namespace App\Http\Controllers\Admin\Student\Excel;

use Illuminate\Http\Request;
use App\Imports\StudentsImport;
use App\Http\Controllers\Controller;
use App\Exports\StudentsExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Session;

class ExcelController extends Controller
{
    public function import(Request $request)
{
    $request->validate([
        'file' => 'required|mimes:xlsx,xls,csv',
    ]);

    Excel::import(new StudentsImport, $request->file('file'));

    return redirect()->route('students.index')->with('success', 'Students imported successfully.');
}


 public function importPreview(Request $request)
    {
        $request->validate([
            'excel_file' => 'required|file|mimes:xlsx,xls,csv',
        ]);

        // Read rows from Excel (first sheet only)
        $rows = Excel::toArray(new StudentsImport, $request->file('excel_file'));
        $data = $rows[0];

        // Collect all qalam_ids from import
        $uploadedQalamIds = array_filter(array_column($data, 'qalam_id'));

        // Find existing students with matching qalam_id
        $existingDuplicates = Student::whereIn('qalam_id', $uploadedQalamIds)->get();

        // Store full import data and duplicates in session
        Session::put('import_data', $data);
        Session::put('duplicates', $existingDuplicates);

        // Return view to show duplicates for user selection
        return view('admin.students.import-duplicates', ['duplicates' => $existingDuplicates]);
    }

    // Step 2: Final import skipping user deselected duplicates
    public function importFinal(Request $request)
    {
        $skipQalamIds = $request->input('skip_qalam_ids', []);

        $data = Session::get('import_data', []);

        if (empty($data)) {
            return redirect()->back()->with('error', 'No import data found, please try again.');
        }

        $filteredData = [];

        foreach ($data as $row) {
            $qalamId = $row['qalam_id'] ?? null;
            if ($qalamId && !in_array($qalamId, $skipQalamIds)) {
                $filteredData[] = $row;
            }
        }

        // Import filtered data using a custom import class that accepts array
        Excel::import(new StudentsArrayImport($filteredData), null, \Maatwebsite\Excel\Excel::CSV);

        Session::forget('import_data');
        Session::forget('duplicates');

        return redirect()->route('students.index')->with('success', 'Students imported successfully.');
    }

}
