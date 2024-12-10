<?php

namespace App\Http\Controllers\Pages;

use App\Models\Team;

use App\Models\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
