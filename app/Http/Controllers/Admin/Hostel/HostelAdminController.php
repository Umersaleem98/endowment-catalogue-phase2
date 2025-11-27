<?php

namespace App\Http\Controllers\Admin\Hostel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SupportHostelProject;

class HostelAdminController extends Controller
{
   
   public function index(Request $request)
    {

        $perPage = $request->input('perPage', 10);
        $search = $request->input('search');

        $query = SupportHostelProject::query();

        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('donor_name', 'like', "%{$search}%")
                  ->orWhere('donor_email', 'like', "%{$search}%")
                  ->orWhere('phone', 'like', "%{$search}%");
            });
        }

        $hostels = $query->paginate($perPage)->withQueryString();

        return view('pages.admin.supportHostelPro.list', compact('hostels'));
    }

}
