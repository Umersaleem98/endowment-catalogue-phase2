<?php

namespace App\Http\Controllers\Pages;

use App\Models\Team;

use App\Models\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Carbon;

class TeamController extends Controller
{
    public function index()
    {
        $teams = Team::all();

        // Paginate with a custom format for date, etc.
        $events = Event::orderBy('date', 'asc')
            ->paginate(2) // Adjust to whatever number of items per page you want
            ->through(function ($event) {
                $event->formatted_day = Carbon::parse($event->date)->format('d');
                $event->formatted_month = Carbon::parse($event->date)->format('M');
                $event->formatted_year = Carbon::parse($event->date)->format('Y');
                return $event;
            });

        return view('template.teams.teams', compact('teams', 'events'));
    }


    public function About_team($id)
    {
        $teams = Team::find($id);
        $events = Event::all();
        return view('template.teams.meet_our_team', compact('teams', 'events'));
    }
}
