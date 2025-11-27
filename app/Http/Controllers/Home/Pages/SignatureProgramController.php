<?php

namespace App\Http\Controllers\Home\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SignatureProgramController extends Controller
{
    public function index()
    {
        return view('pages.Home.pages.signrature_program');
    }
}
