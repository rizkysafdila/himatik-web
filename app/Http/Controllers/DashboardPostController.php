<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.posts.index', [
            'title' => 'Daftar Posts',
            "posts" => Post::select('title', 'image', 'slug', 'id', 'excerpt', 'body', 'category_id')->latest()->get(),
            "categories" => Category::select('name', 'id')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            "title" => ['required', 'min:10'],
            "excerpt" => ['required', 'min:10'],
            "body" => ['required', 'min:20'],
            "category_id" => ['required'],
            "image" => ['image', 'file', 'required'],
        ]);

        $validateData['slug'] = Str::slug($request->title) . ('d');

        if ($request->file('image')) {
            $image = date('dmy') . $request->file('image')->getClientOriginalName();
            $validateData['image'] = $request->file('image')->storeAs('posts', $image);
        }

        Post::create($validateData);
        return back()->with('success', 'Post has been created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $title = 'Detail Post';

        return view('dashboard.posts.show', [
            "title" => $title,
            "post" => $post,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $validateData = $request->validate([
            "title" => ['required', 'min:10'],
            "excerpt" => ['required', 'min:10'],
            "body" => ['required', 'min:20'],
            "category_id" => ['required'],
        ]);


        $oldImage = Post::where('id', $post->id)->first();

        if ($request->file('image') != $oldImage->image) {
            $validateData["image"]  = $oldImage->image;
        } else {
            $validateData["image"]  = "file|image|required";
        }

        if ($request->file('image')) {
            if ($oldImage->image) {
                Storage::delete($oldImage->image);
            }
            $image = date('dmy') . $request->file('image')->getClientOriginalName();
            $validateData['image'] = $request->file('image')->storeAs('posts', $image);
        }

        $post->update($validateData);
        return back()->with('success', 'Post has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
