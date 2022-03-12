<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;


class PageController extends Controller
{
    public function home()
    {
        $data = [
            'title' => 'Home',
        ];
        return view('home.index', $data);
    }
    public function homeBuilt()
    {
        $data = [
            'title' => 'Built',
        ];
        return view('home.built', $data);
    }

    public function about()
    {
        $data = [
            'title' => 'About',
        ];
        return view('about.index', $data);
    }

    public function dashboard()
    {
        $data = [
            'title' => 'Dashboard',
        ];
        return view('dashboard.index', $data);
    }
}
