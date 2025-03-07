<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Support\Carbon;

class HomeController extends Controller
{


    public function index()
    {
        // Paginate with 2 items per page
        $events = Event::orderBy('date', 'asc')->paginate(2);

        // Format the date for each event
        $events->getCollection()->transform(function ($event) {
            // Format the date using Carbon for day, month, and year
            $event->formatted_day = Carbon::parse($event->date)->format('d');
            $event->formatted_month = Carbon::parse($event->date)->format('M');
            $event->formatted_year = Carbon::parse($event->date)->format('Y');
            return $event;
        });

        // Return view with formatted events
        return view('index', compact('events'));
    }
}
