@extends('dashboard.layouts.main')

@section('container')
    <div class="row">
        <div class="col-sm-6 col-md-12 mt-3">
            <div class="card p-1 shadow rounded-3 border-0">
                <div class="card-body">
                    <a href="{{ route('posts.index') }}"
                       class="btn btn-warning text-white">
                        <i class="fa-regular fa-arrow-left"></i>
                    </a>
                    <img src="{{ asset('storage/' . $post->image) }}"
                         alt=""
                         width="100%"
                         height="500px">
                    <h5 class="card-title fw-bold mt-4">{{ $post->title }}</h5>
                    <p class="mt-3 card-text">{{ $post->excerpt }}</p>
                    <p>{!! $post->body !!}</p>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/datatables.js') }}"></script>
@endsection
