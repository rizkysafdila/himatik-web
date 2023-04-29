@extends('layouts.main')

@section('container')
    <div class="row mt-4 mb-4">
        <div class="col-md-7 mt-auto mb-3 mb-md-0">
            <p class="text-green fw-medium mb-1 fs-5">{{ $title }}</p>
            <h1 class="fw-bold">Video Kegiatan</h1>
        </div>
        <div class="col-md-5 mt-auto">
            <form action="/videos"
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
        <div class="row">
            @forelse ($videos->items as $key => $item)
                <div class="col-md-4">
                    <div class="card rounded-10 p-3">
                        <img src="{{ $item->snippet->thumbnails->medium->url }}"
                             class="card-img-top rounded-10"
                             alt="{{ $item->snippet->title }}">
                        <div class="card-body p-0 mt-3">
                            <h5 class="card-title m-0">
                                <a class="text-decoration-none link-dark"
                                   href="{{ route('videos', $item->id->videoId) }}">
                                    {{ \Illuminate\Support\Str::limit($item->snippet->title, $limit = 50, $end = ' ...') }}
                                </a>
                            </h5>
                            <p class="card-text mt-1"><small class="text-muted">
                                    Published at {{ date('d M Y', strtotime($item->snippet->publishTime)) }}</small></p>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-lg text-danger">Informasi dan Kegiatan yang anda cari tidak ada!</p>
            @endforelse
        </div>
    </div>
@endsection
