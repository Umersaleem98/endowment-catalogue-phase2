<?php

namespace App\Http\Controllers\Admin\EndowmentModel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\EndoementZakatPayment;

class ZakatFundsController extends Controller
{
    public function index(Request $request)
    {

        $search = $request->input('search');
    $perPage = $request->input('perPage', 10);

    $query = EndoementZakatPayment::query();

    if ($search) {
        $query->where(function($q) use ($search) {
            $q->where('donor_name', 'like', "%$search%")
                  ->orWhere('donor_email', 'like', "%$search%")
                  ->orWhere('phone', 'like', "%$search%")
                  ->orWhere('payment_type', 'like', "%$search%");
        });
    }

    $totalItems = $query->count();

    $zakat = $query->orderBy('id', 'desc')->paginate($perPage)->withQueryString();

    return view('pages.admin.EndowmentModels.Zakat.list', compact('zakat', 'search', 'totalItems', 'perPage'));

 }
}
