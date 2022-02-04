@extends('layouts.main')

@section('container')
  <div class="container my-4">
    <div class="row mb-4">
      <div class="col-md-7 mt-auto mb-3 mb-md-0">
        <p class="text-green fw-medium mb-1 fs-5">All Videos</p>
        <h1 class="fw-bold">Video Kegiatan</h1>
      </div>
      <div class="col-md-5 mt-auto">
        <div class="input-group mb-2">
          <input type="text" class="form-control search" placeholder="Search..">
          <button class="btn btn-primary btn-cta px-4 py-2" type="submit">
            <i class="fa-regular fa-magnifying-glass fa-md"></i>
          </button>
        </div>
      </div>
    </div>
  </div>
@endsection