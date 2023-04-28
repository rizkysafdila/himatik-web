@extends('layouts.main')

@section('container')
    <div class="row mt-4 mb-4">
        <div class="col-md-7 mt-auto mb-3 mb-md-0">
            <p class="text-green fw-medium mb-1 fs-5">{{ $title }}</p>
            <h1 class="fw-bold">Informasi dan Kegiatan</h1>
        </div>
        <div class="col-md-5 mt-auto">
            <form action="/posts"
                  method="get">
                @if (request('category'))
                    <input type="hidden"
                           name="category"
                           value="{{ request('category') }}">
                @endif
                <div class="input-group mb-2">
                    <input type="text"
                           class="form-control search"
                           placeholder="Search.."
                           name="search"
                           value="{{ request('search') }}">
                    <button class="btn btn-primary btn-cta px-4 py-2"
                            type="submit">
                        <i class="fa-regular fa-magnifying-glass fa-md"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <div class="container">
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-2 g-md-4">
            @forelse ($posts as $post)
                <div class="col">
                    <div class="card rounded-10 p-3">
                        <div class="position-absolute badge bg-light mx-3 my-3">
                            <a class="text-decoration-none text-dark"
                               href="/posts?category={{ $post->category->slug }}">{{ $post->category->name }}</a>
                        </div>
                        <img src="https://source.unsplash.com/300x200/?{{ $post->category->name }}"
                             class="card-img-top rounded-10"
                             alt="{{ $post->category->name }}">
                        <div class="card-body p-0 mt-3">
                            <h5 class="card-title m-0">
                                <a class="text-decoration-none link-dark"
                                   href="/posts/{{ $post->slug }}">
                                    {{ $post->title }}
                                </a>
                            </h5>
                            <p class="card-text mt-1"><small
                                       class="text-muted">{{ $post->created_at->diffForHumans() }}</small></p>
                            <p class="card-text">{{ $post->excerpt }}</p>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-lg text-danger">Informasi dan Kegiatan yang anda cari tidak ada!</p>
            @endforelse
        </div>
    </div>

    <div class="d-flex justify-content-end mt-4">
        {{ $posts->onEachSide(0)->links() }}
    </div>
@endsection
