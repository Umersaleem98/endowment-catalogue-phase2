<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    public function index()
    {
        // $teams = Team::all();
        // $events = Event::all();
        return view('template.pages.contact_us');
    }
}
