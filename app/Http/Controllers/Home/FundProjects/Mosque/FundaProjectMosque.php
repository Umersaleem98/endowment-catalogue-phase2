<?php

namespace App\Http\Controllers\Home\FundProjects\Mosque;

use App\Models\Mosque;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FundaProjectMosque extends Controller
{
     public function index()
    {
        return view('pages.Home.FundProjects.Mosque.index');
    }

  public function store(Request $request)
{
    // Validate inputs
    $request->validate([
        'description'        => 'required|string',
        'area_sft'           => 'required|numeric',
        'quantity'           => 'required|numeric',
        'total_area_sft'     => 'required|numeric',
        'construction_cost'  => 'required|numeric',
        'total_project_cost' => 'required|numeric',
        'total_in_million'   => 'required|numeric',
        'project_name'       => 'required|string',
        'donor_name'         => 'required|string',
        'donor_email'        => 'required|email',
        'donor_phone'        => 'required|string',
        'prove'              => 'nullable|mimes:png,jpg,jpeg,pdf|max:4096',
    ]);

    // Folder path
    $uploadPath = public_path('uploads/fund-Project/Mosque');

    if (!file_exists($uploadPath)) {
        mkdir($uploadPath, 0777, true);
    }

    $proveFile = null;

    if ($request->hasFile('prove')) {

        $file = $request->file('prove');

        // Simple clean filename
        $extension = $file->getClientOriginalExtension();
        $filename = '' . time() . '.' . $extension;

        // Move file
        $file->move($uploadPath, $filename);

        // Save only filename
        $proveFile = $filename;
    }

    // Save record
    Mosque::create([
        'description'        => $request->description,
        'area_sft'           => $request->area_sft,
        'quantity'           => $request->quantity,
        'total_area_sft'     => $request->total_area_sft,
        'construction_cost'  => $request->construction_cost,
        'total_project_cost' => $request->total_project_cost,
        'total_in_million'   => $request->total_in_million,
        'project_name'       => $request->project_name,
        'donor_name'         => $request->donor_name,
        'donor_email'        => $request->donor_email,
        'donor_phone'        => $request->donor_phone,
        'prove'              => $proveFile, // only filename stored
    ]);

    return redirect()->route('select.project')->with('success', 'Payment submitted successfully!');
}
}
