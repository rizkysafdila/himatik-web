<?php

namespace App\Http\Controllers;

use App\Models\Official;
use App\Models\Setting;

class HomeController extends Controller
{
    public function index()
    {
        return view('home', [
            'title' => 'Home',
            'officials' => Official::all(),
            'setting' => Setting::first()
        ]);
    }
}
