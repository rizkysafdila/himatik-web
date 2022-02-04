@extends('layouts.main')

@section('container')

  <div class="row justify-content-center mt-4">
    <div class="col-md-10">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a class="text-decoration-none" href="/">Home</a></li>
          <li class="breadcrumb-item"><a class="text-decoration-none" href="/posts">Blog</a></li>
          <li class="breadcrumb-item active">{{ $post->title }}</li>
        </ol>
      </nav>
      <h1 class="mb-3 fw-bold">{{ $post->title }}</h1>
      <div class="d-flex align-items-center mb-3">
        <p class="text-muted m-0">Published {{ $post->created_at->diffForHumans() }}</p>
        <div class="ms-2 badge bg-dark">
          <a class="text-decoration-none text-light" href="/posts?category={{ $post->category->slug }}">{{ $post->category->name }}</a>
        </div>
      </div>

      <img class="img-fluid rounded-3" src="https://source.unsplash.com/1200x600/?{{ $post->category->name }}" alt="{{ $post->category->name }}">

      <article class="mt-4">
        {!! $post->body !!}
      </article>
    </div>
  </div>

@endsection
