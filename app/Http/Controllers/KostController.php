<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KostController extends Controller
{
    // Menu Admin
    public function home()
    {
        return view('home');
    }

    public function kamar()
    {
        return view('kamar');
    }
}
