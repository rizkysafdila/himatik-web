<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $title = '';
        if (request('category')) {
            $category = Category::firstWhere('slug', request('category'));
            $title = ' in ' . $category->name;
        }
        
        return view('posts', [
            "title" => "All Posts $title",
            // "posts" => Post::all()
            "posts" => Post::latest()->filter(request(['search', 'category']))->paginate(6)->withQueryString()
        ]);
    }

    public function show(Post $post)
    {
        return view('post', [
            'title' => $post->title,
            'post' => $post
        ]);
    }
}
