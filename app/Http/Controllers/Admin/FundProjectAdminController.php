<?php

namespace App\Http\Controllers\Admin;

use App\Models\Mosque;
use Illuminate\Http\Request;
use App\Models\BusinessCenter;
use App\Http\Controllers\Controller;
use App\Models\BoysHostelCostEstimate;
use App\Models\GirlsHostelCostEstimate;

class FundProjectAdminController extends Controller
{
    
     public function BoysHostel(Request $request)
    {
        $perPage = $request->input('perPage', 10);
        $search = $request->input('search');

        $query = BoysHostelCostEstimate::query();

        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('donor_name', 'like', "%{$search}%")
                  ->orWhere('donor_email', 'like', "%{$search}%")
                  ->orWhere('donor_phone', 'like', "%{$search}%");
            });
        }

        $boys_hostel = $query->paginate($perPage)->withQueryString();

        return view('pages.admin.FundProjects.BoysHostel.list', compact('boys_hostel'));
    }
     
    public function GirlsHostel(Request $request)
    {
        $perPage = $request->input('perPage', 10);
        $search = $request->input('search');

        $query = GirlsHostelCostEstimate::query();

        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('donor_name', 'like', "%{$search}%")
                  ->orWhere('donor_email', 'like', "%{$search}%")
                  ->orWhere('donor_phone', 'like', "%{$search}%");
            });
        }

        $girls_hostel = $query->paginate($perPage)->withQueryString();

        return view('pages.admin.FundProjects.GirlsHostel.list', compact('girls_hostel'));
    }


     public function Mosque(Request $request)
    {
        $perPage = $request->input('perPage', 10);
        $search = $request->input('search');

        $query = Mosque::query();

        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('donor_name', 'like', "%{$search}%")
                  ->orWhere('donor_email', 'like', "%{$search}%")
                  ->orWhere('donor_phone', 'like', "%{$search}%");
            });
        }

        $mosques = $query->paginate($perPage)->withQueryString();

        return view('pages.admin.FundProjects.Mosque.list', compact('mosques'));
    }


        public function businessCenter(Request $request)
    {
        $perPage = $request->input('perPage', 10);
        $search = $request->input('search');

        $query = BusinessCenter::query();

        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('donor_name', 'like', "%{$search}%")
                  ->orWhere('donor_email', 'like', "%{$search}%")
                  ->orWhere('donor_phone', 'like', "%{$search}%");
            });
        }

        $business = $query->paginate($perPage)->withQueryString();

        return view('pages.admin.FundProjects.Business.list', compact('business'));
    }
}
