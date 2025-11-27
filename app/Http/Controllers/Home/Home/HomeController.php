<?php

namespace App\Http\Controllers\Home\Home;

use App\Models\Student;
use App\Models\Event;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $today = Carbon::today();

        // Only fetch upcoming events, ordered by date, with pagination
        $events = Event::whereDate('date', '>=', $today)
            ->orderBy('date', 'asc')
            ->paginate(2); // You wanted 2 per page
    
        // Format the date for each event
        $events->getCollection()->transform(function ($event) {
            $event->formatted_day = Carbon::parse($event->date)->format('d');
            $event->formatted_month = Carbon::parse($event->date)->format('M');
            $event->formatted_year = Carbon::parse($event->date)->format('Y');
            return $event;
        });
    
        // Get all students
        $students = Student::all();
    
        // If it's an AJAX request (for pagination), return partial view
       
    
        // Otherwise, return the full view
        return view('index', compact('events', 'students'));
    }
}
