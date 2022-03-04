<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        $data = [
            'title' => 'Home',
            'active' => 'home'
        ];
        return view('home.index', $data);
    }

    public function about()
    {
        $data = [
            'title' => 'About',
            'active' => 'about'
        ];
        return view('about.index', $data);
    }

    public function dashboard()
    {
        $data = [
            'title' => 'Dashboard',
            'active' => 'blog',
        ];
        return view('dashboard.index', $data);
    }
}
