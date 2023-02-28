<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function dashboard()
    {
        return view('user.dashboard');
    }

    public function logoutAsUser(Request $request)
    {
        // Get the admin session ID from the temporary session variable
        $adminSessionId = session('admin_session_id');

        // Log the current user out
        Auth::logout();

        // Restore the admin session ID to the current session
        session()->setId($adminSessionId);
        session()->regenerate();

        // Redirect the user back to the admin dashboard
        return redirect()->route('admin.dashboard');
    }
}
