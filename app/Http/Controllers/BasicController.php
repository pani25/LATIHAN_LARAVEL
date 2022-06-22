<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BasicController extends Controller
{
    public function index()
    {
        return view('feature');
    }

    public function about()
    {
        return view('about', [
            'nama' => 'Muhamad Pani Rayadi',
            'job' => 'Fullstack Developer',
            'city' => 'Bandung',
            'image' => 'profile.jpg',
        ]);
    }

    public function service()
    {
        return view('service');
    }
}
