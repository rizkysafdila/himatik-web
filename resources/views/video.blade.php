@extends('layouts.main')

@section('container')
    <div class="row justify-content-center mt-4">
        <div class="col-md-10">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="text-decoration-none"
                           href="/">Home</a></li>
                    <li class="breadcrumb-item"><a class="text-decoration-none"
                           href="/videos">Videos</a></li>
                    <li class="breadcrumb-item active">{{ $video->items[0]->snippet->title }}</li>
                </ol>
            </nav>
            <h1 class="mb-3 fw-bold">{{ $video->items[0]->snippet->title }}</h1>
            <div class="d-flex align-items-center mb-3">
                <p class="text-muted m-0">Published at
                    {{ date('d M Y', strtotime($video->items[0]->snippet->publishedAt)) }}</p>
            </div>

            <div class="width:100%">
                <iframe width="100%"
                        height="500"
                        src="https://www.youtube.com/embed/{{ $video->items[0]->id }}"
                        title="YouTube video player"
                        frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        allowfullscreen></iframe>
            </div>

            <article class="mt-4">
                {{ $video->items[0]->snippet->description }}
            </article>
        </div>
    </div>
@endsection
