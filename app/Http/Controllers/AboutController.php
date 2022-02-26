<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'About',
            'active' => 'about'
        ];
        return view('about.index', $data);
    }
}
