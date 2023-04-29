<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardMemberController;
use App\Http\Controllers\DashboardOfficialController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;
use App\Models\Member;
use App\Models\Post;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index']);

Route::get('/posts', [PostController::class, 'index']);
Route::get('/posts/{post:slug}', [PostController::class, 'show']);

Route::get('/videos', function () {
    return view('videos', [
        'title' => 'All Videos'
    ]);
});

Route::get('/manage', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/manage', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);


Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard.index', [
            'title' => 'Dashboard',
            'members' => Member::count(),
            'posts' => Post::count(),
            // 'videos' => Video::count()
        ]);
    })->middleware('auth');

    Route::get('/dashboard', DashboardController::class)->middleware('auth');

    Route::resource('/dashboard/officials', DashboardOfficialController::class)->only(['index', 'update'])->middleware('auth');

    Route::resource('/dashboard/members', DashboardMemberController::class)->middleware('auth');
});


Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');
