<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Login',
            'active' => 'blog',
        ];
        return view('login.index', $data);
    }

    public function authenticate(Request $request)
    {
        // validation
        // validate the request's input data
        $credentials = $request->validate([ // if validation fails, it automaticaly redirect to previous url and flashing error message and input
            'username'  => ['required', 'min:5', 'max:255'],
            'password' => ['required', 'min:5', 'max:255']
        ]);

        if (Auth::attempt($credentials)) { // if attempt success, it will return true and user authenticated session is started
            // regenerate user's session to prevent session fixation attacks
            $request->session()->regenerate();

            // redirect, intended() will automatically redirect the user to the url the attempt to access before being intercepted
            return redirect()->intended('/dashboard'); // parameter may be given, in case the intended url doesn't exists
        }

        return back()->with('login_failed', 'Login failed! Your data doesn\'t match our record.');
    }

    public function logout(Request $request)
    {
        // logging out the user
        Auth::logout();

        // invalidate user's session
        $request->session()->invalidate();

        // regenerate csrf token
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
