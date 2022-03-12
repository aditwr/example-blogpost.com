<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AddAdminController extends Controller
{
    public function index(Request $request)
    {
        $data = [
            'title' => 'Add Admin',
            'admins' => User::where('is_admin', true)->latest()->paginate(10)->withQueryString(),
        ];

        // if key is exist and not empty, search for user and send data
        if ($request->filled('key')) {
            $users = User::local_searchUser($request->input('key'))->latest()->paginate(10)->withQueryString();
            $data['users'] = $users;
        }

        return view('dashboard.addadmin.index', $data);
    }

    public function add(Request $request)
    {
        User::where('id', $request->input('user_id'))
            ->update([
                'is_admin' => true,
            ]);

        $data = [
            'title' => 'Add Admin',
            'admins' => User::where('is_admin', true)->latest()->paginate(10)->withQueryString(),
        ];

        return view('dashboard.addadmin.index', $data);
    }

    public function remove(Request $request)
    {
        User::where('id', $request->input('user_id'))
            ->update([
                'is_admin' => false,
            ]);

        $data = [
            'title' => 'Add Admin',
            'admins' => User::where('is_admin', true)->latest()->paginate(10)->withQueryString(),
        ];

        return view('dashboard.addadmin.index', $data);
    }
}
