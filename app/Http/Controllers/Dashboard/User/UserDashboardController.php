<?php

namespace App\Http\Controllers\Dashboard\User;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserDashboardController extends Controller
{
    public function index()
    {
        return view('admin.users.create');
    }
    
    public function store(Request $request)
    {
        // Validate the input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|string|max:15',
            'password' => 'required|string|min:8',
            'usertype' => 'required|string|in:admin,user',
        ]);
    
        // Create a new User instance
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = bcrypt($request->password); // Encrypt password
        $user->usertype = $request->usertype;
    
        // Save the user to the database
        $user->save();
    
        // Redirect or return a response
        return redirect()->back()->with('success', 'User created successfully!');
    }

    public function userlist()
    {
        $users = User::all();
        return view('admin.users.list', compact('users'));
    }
    
    public function edit($id)
    {
        $users = User::find($id);
        return view('admin.users.edit', compact('users'));
    }
    

  public function update(Request $request, $id)
{
    $user = User::find($id);

    // Update basic info
    $user->name = $request->name;
    $user->email = $request->email;
    $user->phone = $request->phone;
    $user->usertype = $request->usertype;

    // Only update password if provided
    if (!empty($request->password)) {
        $user->password = bcrypt($request->password);
    }

    // Save the updated user
    $user->save();

    return redirect()->back()->with('success', 'User updated successfully');
}

    public function delete($id)
    {
        $users = User::find($id);
        $users->delete();
        
        return redirect()->back()->with('success', 'User delete successfully');
    
    }
}
