<?php

namespace App\Http\Controllers\Admin\Team;

use App\Models\Team;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TeamController extends Controller
{
    public function index(Request $request)
    {

        $perPage = $request->input('perPage', 10);
        $search = $request->input('search');

        $query = Team::query();

        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('designation', 'like', "%{$search}%")
                  ->orWhere('phone', 'like', "%{$search}%")
                  ->orWhere('designation', 'like', "%{$search}%");
            });
        }

        $teams = $query->paginate($perPage)->withQueryString();

        return view('pages.admin.Teams.list', compact('teams'));
    }

    public function Create()
    {
        return view('pages.admin.Teams.create');
    }
public function store(Request $request)
{
    $request->validate([
        'name' => 'required',
        'email' => 'required|email',
        'designation' => 'required',
        'gender' => 'required',
        'image' => 'nullable|image|mimes:jpg,jpeg,png,webp',
    ]);

    $data = $request->all();

    if ($request->hasFile('image')) {
        $image = time() . '.' . $request->image->extension();
        $request->image->move(public_path('uploads/team'), $image);
        $data['image'] = $image;
    }

    Team::create($data);

    return redirect()->route('team.index')->with('success', 'Team member added successfully!');
}



    public function edit($id)
    {
        $teams = Team::find($id);
    return view('pages.admin.Teams.edit', compact('teams'));

    }


    public function update(Request $request, $id)
{
    $team = Team::findOrFail($id);

    // Validate inputs
    $request->validate([
        'name'          => 'required|string|max:255',
        'email'         => 'required|email',
        'designation'   => 'nullable|string|max:255',
        'gender'        => 'required|string',
        'phone'         => 'nullable|string|max:20',
        'status'        => 'required|in:0,1',
        'social_media'  => 'nullable|string|max:255',
        'introduction'  => 'nullable|string',
        'image'         => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
    ]);

    // Update fields
    $team->name          = $request->name;
    $team->email         = $request->email;
    $team->designation   = $request->designation;
    $team->gender        = $request->gender;
    $team->phone         = $request->phone;
    $team->status        = $request->status;
    $team->social_media  = $request->social_media;
    $team->introduction  = $request->introduction;

    // Handle image upload
    if ($request->hasFile('image')) {
        // Delete old image
        if (!empty($team->image) && file_exists(public_path('uploads/team/' . $team->image))) {
            unlink(public_path('uploads/team/' . $team->image));
        }

        // Upload new image
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('uploads/team'), $imageName);

        $team->image = $imageName;
    }

    // Save updated data
    $team->save();

    return redirect()->route('team.index')->with('success', 'Team member updated successfully!');
}


public function delete($id)
{
    $team = Team::findOrFail($id);

    // Delete image if exists
    if (!empty($team->image) && file_exists(public_path('uploads/team/' . $team->image))) {
        unlink(public_path('uploads/team/' . $team->image));
    }

    // Delete record from database
    $team->delete();

    return redirect()->route('team.index')->with('success', 'Team member deleted successfully!');
}

}
