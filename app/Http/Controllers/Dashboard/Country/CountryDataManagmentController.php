<?php

namespace App\Http\Controllers\Dashboard\Country;

use App\Models\Country;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CountryDataManagmentController extends Controller
{
    public function index()
    {
        $countries = Country::all();
        return view('admin.Countrymanagement.list', compact('countries'));
    }
   
    public function create()
    {
        $countries = Country::all();
        return view('admin.Countrymanagement.create', compact('countries'));
    }
 
    public function store(Request $request)
    {
        // Create and save the country
        $country = new Country;
        $country->countryname = $request->countryname;
        $country->save();
    
        // Redirect to the country list page with success message
        return back()->with('success', 'Country added successfully!');
    }
    
    public function delete($id)
    {
        $countries = Country::find($id);

        $countries->delete();
        return back()->with('success', 'Country added successfully!');
    }
}
