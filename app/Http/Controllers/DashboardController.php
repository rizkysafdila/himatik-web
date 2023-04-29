<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Post;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        return view('dashboard.index', [
            'title' => 'Dashboard',
            'members' => Member::count(),
            'posts' => Post::count(),
            // 'videos' => Video::count()
        ]);
    }
}
