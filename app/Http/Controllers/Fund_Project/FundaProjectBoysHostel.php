<?php

namespace App\Http\Controllers\Fund_Project;

use Illuminate\Http\Request;
use App\Models\ProjectCategory;
use App\Http\Controllers\Controller;
use App\Models\BoysHostelCostEstimate;

class FundaProjectBoysHostel extends Controller
{
    public function index($id)
    {
        $projectcategory = ProjectCategory::find($id);
        return view('template.fund_project.boysHostel.index', compact('projectcategory'));
    }

    public function store(Request $request)
    {
        $BoysHostelCostEstimate = new BoysHostelCostEstimate;
        $BoysHostelCostEstimate->description = $request->description;
        $BoysHostelCostEstimate->area_sft = $request->area_sft;
        $BoysHostelCostEstimate->quantity = $request->quantity;
        $BoysHostelCostEstimate->total_area_sft = $request->total_area_sft;
        $BoysHostelCostEstimate->construction_cost = $request->construction_cost;
        $BoysHostelCostEstimate->total_project_cost = $request->total_project_cost;
        $BoysHostelCostEstimate->total_in_million = $request->total_in_million;
        $BoysHostelCostEstimate->project_name = $request->project_name;
        $BoysHostelCostEstimate->donor_name = $request->donor_name;
        $BoysHostelCostEstimate->donor_email = $request->donor_email;
        $BoysHostelCostEstimate->donor_phone = $request->donor_phone;
       
        // if ($request->hasFile('prove')) {
        //     $file = $request->file('prove');
        //     $filename = time() . '_' . $file->getClientOriginalName();
        //     $file->move(public_path('uploads/fundaprojects_payments_boys-proof'), $filename);
        //     $BoysHostelCostEstimate->prove = 'uploads/fundaprojects_payments_boys-proof/' . $filename;
        // }
       
        if ($request->hasFile('prove')) {
            $file = $request->file('prove');
            $filename = time() . '_' . $file->getClientOriginalName(); // Add timestamp for uniqueness
            $file->move(public_path('uploads/fundaprojects_payments_boys-proof'), $filename); // Save file in the directory
            $BoysHostelCostEstimate->prove = $filename; // Save the file name in the database
        }


        $BoysHostelCostEstimate->save();

        return redirect()->back()->with('success', 'Hostel boys data stored successfully!');

    }
}
