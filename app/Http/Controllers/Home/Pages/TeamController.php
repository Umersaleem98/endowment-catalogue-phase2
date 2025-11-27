<?php

namespace App\Http\Controllers\Home\Pages;

use App\Models\Team;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TeamController extends Controller
{
    public function index()
    {
        $teams = Team::all();
        return view('pages.Home.pages.teams.teams', compact('teams'));
    }
}
