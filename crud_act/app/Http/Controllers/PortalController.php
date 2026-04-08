<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class PortalController extends Controller
{
   
    private function logSystemEvent($userId, $action, $description) {
        DB::table('system_logs')->insert([
            'user_id' => $userId,
            'action' => $action,
            'description' => $description,
            'created_at' => now()
        ]);
    }

    public function showRegister() {
        return view('auth.register');
    }

    public function register(Request $request) {
        $request->validate([
            'student_id' => 'required|unique:users',
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
            'program' => 'required|string',
            'year_level' => 'required|integer|min:1|max:5',
            'date_of_birth' => 'required|date',
            'gender' => 'required|string',
            'contact_number' => 'required|string',
            'address' => 'required|string'
        ]);

        $userId = DB::table('users')->insertGetId([
            'student_id' => $request->student_id,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'program' => $request->program,
            'year_level' => $request->year_level,
            'date_of_birth' => $request->date_of_birth,
            'gender' => $request->gender,
            'contact_number' => $request->contact_number,
            'address' => $request->address,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        $this->logSystemEvent($userId, 'Register', "New student registered: {$request->student_id}");

        return redirect()->route('login')->with('success', 'Registration successful! You may now log in.');
    }

    public function showLogin() {
        return view('auth.login');
    }

    public function login(Request $request) {
        $user = DB::table('users')->where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
          
            Session::put('user_id', $user->id);
            Session::put('user_name', $user->first_name . ' ' . $user->last_name);
            Session::put('student_id', $user->student_id);

            $this->logSystemEvent($user->id, 'Login', 'Student logged into the portal.');

            return redirect()->route('dashboard');
        }

        $this->logSystemEvent(null, 'Failed Login', "Failed login attempt for: {$request->email}");
        return back()->withErrors(['email' => 'Invalid email or password.']);
    }

    public function logout() {
        $userId = Session::get('user_id');
        $this->logSystemEvent($userId, 'Logout', 'Student logged out safely.');
        
        Session::flush();
        return redirect()->route('login');
    }

    // --- DASHBOARD & SETTINGS ---
    public function dashboard() {
        $user = DB::table('users')->where('id', Session::get('user_id'))->first();
        $logs = DB::table('system_logs')->where('user_id', $user->id)->orderBy('created_at', 'desc')->take(6)->get();
        
        return view('portal.dashboard', compact('user', 'logs'));
    }

    public function settings() {
        $user = DB::table('users')->where('id', Session::get('user_id'))->first();
        return view('portal.settings', compact('user'));
    }

   public function updateSettings(Request $request) {
        $userId = Session::get('user_id');

        
        $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|email|unique:users,email,' . $userId,
            'program' => 'required|string',
            'year_level' => 'required|integer|min:1|max:5',
            'date_of_birth' => 'required|date',
            'gender' => 'required|string',
            'contact_number' => 'required|string',
            'address' => 'required|string',
            'password' => 'nullable|min:6|confirmed' 
        ]);

      
        $updateData = [
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'program' => $request->program,
            'year_level' => $request->year_level,
            'date_of_birth' => $request->date_of_birth,
            'gender' => $request->gender,
            'contact_number' => $request->contact_number,
            'address' => $request->address,
            'updated_at' => now()
        ];

      
        if ($request->filled('password')) {
            $updateData['password'] = Hash::make($request->password);
        }

    
        DB::table('users')->where('id', $userId)->update($updateData);

        Session::put('user_name', $request->first_name . ' ' . $request->last_name);
        

        $logMessage = $request->filled('password') 
            ? 'Student updated their profile details and changed their password.' 
            : 'Student updated their profile details.';
        $this->logSystemEvent($userId, 'Profile Update', $logMessage);

        return back()->with('success', 'Profile updated successfully!');
    }
}