<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function index()
    {
        $teams = Team::all();
        $events = Event::all();
        return view('template.teams.teams', compact('teams', 'events'));
    }

    public function About_team($id)
    {
        $teams = Team::find($id);
        $events = Event::all();
        return view('template.teams.meet_our_team', compact('teams', 'events'));
    }
}
