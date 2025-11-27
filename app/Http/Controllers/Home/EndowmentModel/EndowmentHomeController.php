<?php

namespace App\Http\Controllers\Home\EndowmentModel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EndowmentHomeController extends Controller
{
    public function index()
    {
        return view('pages.Home.EndowmentModels.EndowmentIndex');
    }
}
