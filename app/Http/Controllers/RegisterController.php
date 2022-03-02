<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Register',
            'active' => 'blog',
        ];
        return view('register.index', $data);
    }

    public function store(Request $request)
    {
        $validated_data_input = $request->validate([
            'name' => ['required', 'min:1', 'max:255'],
            'username' => ['required', 'unique:users,username', 'min:5', 'max:50'],
            'email' => ['required', 'unique:users,email', 'email:rfc,dns', 'max:255'],
            'password' => ['required', 'confirmed', 'max:255'],
        ]);

        // hashing password
        $validated_data_input['password'] = Hash::make($validated_data_input['password']);

        User::create($validated_data_input);

        return redirect()->route('login')->with('registration_success', 'Registration Successfull! You can login now.');
    }
}
