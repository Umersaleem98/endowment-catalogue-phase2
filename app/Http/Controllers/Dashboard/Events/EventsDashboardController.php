<?php

namespace App\Http\Controllers\Dashboard\Events;

use App\Models\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EventsDashboardController extends Controller
{
    
    public function show()
    {
        $events = Event::all();
        return view('template.events', compact('events'));
    }

    public function index()
    {
        $events = Event::all();
        return view('admin.events.list', compact('events'));
    }
    public function create()
    {

        return view('admin.events.index');
    }

    public function store(Request $request)
    {
        // Validate the request
        $validated = $request->validate([
            'event_title' => 'required|string|max:255',
            'subtitle' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Create a new event
        $event = new Event;
        $event->event_title = $validated['event_title'];
        $event->subtitle = $validated['subtitle'];
        $event->description = $validated['description'];
        $event->date = $validated['date'];

        // Handle file uploads
        if ($request->hasFile('images')) {
            $images = $request->file('images');
            $imagesName = time() . '.' . $images->getClientOriginalExtension();
            $images->move(public_path('events'), $imagesName);
            $event->images = $imagesName;
        }


        // Save the event
        $event->save();

        // Redirect or return response
        return redirect()->back()->with('success', 'Event created successfully!');
    }

    public function edit($id)
    {
        $event = Event::find($id);
        return view('admin.events.edit', compact('event'));
    }

    public function update(Request $request, $id)
    {
        // Validate the request
        $validated = $request->validate([
            'event_title' => 'required|string|max:255',
            'subtitle' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        // Find the existing event by ID
        $event = Event::find($id);
        if (!$event) {
            return redirect()->back()->with('error', 'Event not found!');
        }
    
        // Update event details
        $event->event_title = $validated['event_title'];
        $event->subtitle = $validated['subtitle'];
        $event->description = $validated['description'];
        $event->date = $validated['date'];
    
        // Handle image uploads (if new images are uploaded)
        if ($request->hasFile('images')) {
            // Check if the old image exists and delete it
            if (file_exists(public_path('events/' . $event->images))) {
                unlink(public_path('events/' . $event->images));
            }
    
            // Handle new image upload
            $images = $request->file('images');
            $imagesName = time() . '.' . $images->getClientOriginalExtension();
            $images->move(public_path('events'), $imagesName);
            $event->images = $imagesName;
        }
    
        // Save the updated event
        $event->save();
    
        // Redirect with success message
        return redirect()->back()->with('success', 'Event updated successfully!');
    }
    
    public function delete($id)
    {
        $event= Event::find($id);
        $event->delete();
        return redirect()->back()->with('success', 'event delete successfully');

    }
}
