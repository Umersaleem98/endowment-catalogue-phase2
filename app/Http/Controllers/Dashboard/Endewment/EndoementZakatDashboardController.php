<?php

namespace App\Http\Controllers\Dashboard\Endewment;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\EndoementZakatPayment;

class EndoementZakatDashboardController extends Controller
{
    public function index()
    {
        $zakatpayment =EndoementZakatPayment::all();
        return view('admin.zakatpayment.list', compact('zakatpayment'));
    }
}
