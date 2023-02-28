<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function users()
    {
        $users = User::all();
        return view('admin.users', ['users' => $users]);
    }

    public function loginAsUser($id)
    {
        // Get the user object for the specified ID
        $user = User::find($id);

        // Get the session ID for the admin user's current session
        $adminSessionId = session()->getId();

        // Store the admin session ID in a temporary variable
        session(['admin_session_id' => $adminSessionId]);

        // Log the admin user out of their current session
        Auth::logout();

        // Log the admin user in as the specified user
        Auth::login($user);

        // Redirect the admin user to the specified user's dashboard
        return redirect()->route('user.dashboard');
    }

        /**
     * Show the admin login form.
     *
     * @return \Illuminate\View\View
     */
    public function showLoginForm()
    {
        return view('admin.login');
    }

    /**
     * Process the admin login request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->route('admin.dashboard');
        }

        return redirect()->route('admin.login')->with('loginError', 'Invalid email or password.');
    }
}



