@extends('dashboard.layouts.main')

@section('container')

  @if (session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      {{ session('success') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  @endif

  <h2 class="h3 mt-4 mb-0">Pejabat Harian</h2>
  <div class="row -mb-4">
    @foreach ($officials->only([1, 2, 3, 4]) as $official)
      <div class="col-sm-6 mt-3">
        <div class="card official-card p-1 shadow-sm rounded-3">
          <div class="card-body">
            <div class="mb-3">
              <label for="nama" class="form-label">Nama</label>
              <input type="text" class="form-control" name="nama" id="nama" value="{{ $official->nama }}" disabled>
            </div>
            <div class="mb-3">
              <label for="jabatan" class="form-label">Jabatan</label>
              <input type="text" class="form-control" name="jabatan" id="jabatan" value="{{ $official->jabatan }}" disabled>
            </div>
            <div class="text-end">
              <button type="button" class="btn btn-warning rounded-3" data-bs-toggle="modal" data-bs-target="#modalEdit{{ $loop->iteration }}">
                <i class="fa-regular fa-pen-to-square me-1"></i>
                Edit
              </button>
            </div>
          </div>
        </div>
      </div>

      {{-- Modal Edit --}}
      <div class="modal fade" id="modalEdit{{ $loop->iteration }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Edit Struktur Kepengurusan</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/dashboard/officials/{{ $official->id }}" method="post">
              <div class="modal-body">
                @method('put')
                @csrf
                <div class="mb-3">
                  <label for="nama" class="form-label">Nama</label>
                  <input type="text" class="form-control" name="nama" id="nama" value="{{ $official->nama }}">
                </div>
                <div class="mb-3">
                  <label for="jabatan" class="form-label">Jabatan</label>
                  <input type="text" class="form-control" name="jabatan" id="jabatan" value="{{ $official->jabatan }}" disabled>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary rounded-3" data-bs-dismiss="modal">Batal</button>
                <button type="submmit" class="btn btn-primary border-0 rounded-3 bg-violet-800">Simpan</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    @endforeach
  </div>


  <h2 class="h3 mt-5 mb-0">Ketua Departemen</h2>
  <div class="row mb-4">
    @foreach ($officials->except([1, 2, 3, 4]) as $official)
      <div class="col-sm-6 mt-3">
        <div class="card official-card p-1 shadow-sm rounded-3">
          <div class="card-body">
            <div class="mb-3">
              <label for="nama" class="form-label">Nama</label>
              <input type="email" class="form-control" name="nama" id="nama" value="{{ $official->nama }}" disabled>
            </div>
            <div class="mb-3">
              <label for="jabatan" class="form-label">Jabatan</label>
              <input type="email" class="form-control" name="jabatan" id="jabatan" value="{{ $official->jabatan }}" disabled>
            </div>
            <div class="text-end">
              <button type="button" class="btn btn-warning rounded-3" data-bs-toggle="modal" data-bs-target="#modalEdit{{ $loop->iteration }}">
                <i class="fa-regular fa-pen-to-square me-1"></i>
                Edit
              </button>
            </div>
          </div>
        </div>
      </div>

      {{-- Modal Edit --}}
      <div class="modal fade" id="modalEdit{{ $loop->iteration }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Edit Struktur Kepengurusan</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/dashboard/officials/{{ $official->id }}" method="post">
              <div class="modal-body">
                @method('put')
                @csrf
                <div class="mb-3">
                  <label for="nama" class="form-label">Nama</label>
                  <input type="email" class="form-control" name="nama" id="nama" value="{{ $official->nama }}">
                </div>
                <div class="mb-3">
                  <label for="jabatan" class="form-label">Jabatan</label>
                  <input type="email" class="form-control" name="jabatan" id="jabatan" value="{{ $official->jabatan }}" disabled>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary rounded-3" data-bs-dismiss="modal">Batal</button>
                <button type="submmit" class="btn btn-primary border-0 rounded-3 bg-violet-800">Simpan</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    @endforeach
  </div>

@endsection
