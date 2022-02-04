@extends('dashboard.layouts.main')

@section('container')

  <div class="row">
    <div class="col-sm-6 col-md-4 col-lg-3 mt-3">
      <div class="card p-1 shadow-sm rounded-3 border-0 bg-emerald-400">
        <div class="card-body">
          <i class="fa-duotone fa-user-group fa-2x p-2"></i>
          <h4 class="card-title mt-3">{{ $members }}</h4>
          <p class="card-text lh-1">Total Anggota</p>
        </div>
      </div>
    </div>
    <div class="col-sm-6 col-md-4 col-lg-3 mt-3">
      <div class="card p-1 shadow-sm rounded-3 border-0 bg-sky-400">
        <div class="card-body">
          <i class="fa-duotone fa-file-lines fa-2x p-2"></i>
          <h4 class="card-title mt-3">{{ $posts }}</h4>
          <p class="card-text lh-1">Total Postingan</p>
        </div>
      </div>
    </div>
    <div class="col-sm-6 col-md-4 col-lg-3 mt-3">
      <div class="card p-1 shadow-sm rounded-3 border-0 bg-rose-400">
        <div class="card-body">
          <i class="fa-duotone fa-circle-play fa-2x p-2"></i>
          <h4 class="card-title mt-3">10</h4>
          <p class="card-text lh-1">Total Video</p>
        </div>
      </div>
    </div>
  </div>

@endsection
