<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Official;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('home', [
            'title' => 'Home',
            'officials' => Official::all()
        ]);
    }
}
