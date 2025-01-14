<?php

namespace App\Http\Controllers\Fund_Project;

use App\Models\Mosque;
use Illuminate\Http\Request;
use App\Models\ProjectCategory;
use App\Http\Controllers\Controller;

class FundaProjectMosque extends Controller
{
    public function index($id)
    {
        $projectcategory = ProjectCategory::find($id);
        return view('template.fund_project.mosque.index', compact('projectcategory'));
    }


    public function store(Request $request)
    {
        $mosque = new Mosque;
    
        // Description, Area, Quantity, Total Area, etc.
        $mosque->description = $request->input('description');
        $mosque->area_sft = $request->input('area_sft');
        $mosque->quantity = $request->input('quantity');
        $mosque->total_area_sft = $request->input('total_area_sft');
        $mosque->construction_cost = $request->input('construction_cost');
        $mosque->total_project_cost = $request->input('total_project_cost');
        $mosque->total_in_million = $request->input('total_in_million');
    
        // Donor information
        $mosque->project_name = $request->input('project_name');
        $mosque->donor_name = $request->input('donor_name');
        $mosque->donor_email = $request->input('donor_email');
        $mosque->donor_phone = $request->input('donor_phone');
    
        // File upload for payment proof
        if ($request->hasFile('prove')) {
            $file = $request->file('prove');
            $filename = time() . '_' . $file->getClientOriginalName(); // Add timestamp for uniqueness
            $file->move(public_path('uploads/fundaprojects_payments_mosque-proof'), $filename); // Save file in the directory
            $mosque->prove = $filename; // Save the file name in the database
        }
    
        // Save the mosque data to the database
        $mosque->save();
    
        // Redirect back with a success message
        return redirect()->back()->with('success', 'Hostel boys data stored successfully!');
    }
    
}