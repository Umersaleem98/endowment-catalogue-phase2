<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\OpenfundStudent;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('Auth.login.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            $request->session()->regenerate();
            return redirect()->route('dashboard')->with('success', 'Logged in successfully!');
        }

        return back()->withErrors(['email' => 'Invalid credentials']);
    }

    // Logout user
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'Logged out successfully!');
    }

    public function dashboard()
    {
        // Fetch all students
        $totalStudents = Student::count();
        $ugStudents = Student::where('degree', 'UG')->count();
        $pgStudents = Student::where('degree', 'PG')->count();
        $Adopedstudents = Student::where('make_pledge', 0)
            ->where('payment_approved', 0)
            ->count();
    
        // Group UG and PG students by year_of_admission
        $ugStudentsByYear = Student::selectRaw('year_of_admission, COUNT(*) as count')
            ->where('degree', 'UG')
            ->groupBy('year_of_admission')
            ->orderBy('year_of_admission', 'asc')
            ->pluck('count', 'year_of_admission');
    
        $pgStudentsByYear = Student::selectRaw('year_of_admission, COUNT(*) as count')
            ->where('degree', 'PG')
            ->groupBy('year_of_admission')
            ->orderBy('year_of_admission', 'asc')
            ->pluck('count', 'year_of_admission');
    
        // Combine all keys for consistent labels
        $allYears = array_unique(array_merge($ugStudentsByYear->keys()->toArray(), $pgStudentsByYear->keys()->toArray()));
        sort($allYears); // Ensure chronological order
    
        // Fetch all scholarship names and count students for each scholarship
        $scholarshipCounts = Student::select('scholarship_name', \DB::raw('COUNT(*) as count'))
            ->groupBy('scholarship_name')
            ->orderBy('count', 'desc')
            ->get();
    
        return view('dashboard', compact('totalStudents', 'ugStudents', 'pgStudents', 'Adopedstudents', 'ugStudentsByYear', 'pgStudentsByYear', 'allYears', 'scholarshipCounts'));
    }
    
    
    
    
}
