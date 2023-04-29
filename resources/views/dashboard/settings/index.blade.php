@extends('dashboard.layouts.main')

@section('container')
    <div class="row">
        <div class="col-sm-6 col-md-12 mt-3">

            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show"
                     role="alert">
                    {{ session('success') }}
                    <button type="button"
                            class="btn-close"
                            data-bs-dismiss="alert"
                            aria-label="Close"></button>
                </div>
            @endif

            <div class="card p-1 shadow rounded-3 border-0 mb-5">
                <div class="card-body">
                    <div class="d-flex justify-content-end">
                        <button type="button"
                                class="btn btn-primary d-inline  mb-4 border-0 rounded-3 bg-violet-800 "
                                data-bs-toggle="modal"
                                data-bs-target="#modalEdit{{ $setting->id }}">
                            Edit</button>
                    </div>


                    <h1 class="mb-1 fw-bold">{{ $setting->title }}</h1>

                    <p class="mb-4"><i><strong>{{ $setting->email }}</strong></i></p>
                    <p><q>{{ $setting->motto }}</q></p>

                    <div class="row d-flex justify-content-between align-items-center">
                        <div class="col-md-6">
                            <img class="img-fluid rounded-3"
                                 src="{{ asset('storage/' . $setting->icon) }}"
                                 alt="{{ $setting->title }}">
                        </div>
                        <div class="col-md-4">
                            <img class="img-fluid rounded-3"
                                 src="{{ asset('storage/' . $setting->favicon) }}"
                                 alt="{{ $setting->title }}">
                        </div>
                    </div>


                    <p class="card-text mt-4">
                        {!! $setting->description !!}
                    </p>

                </div>
            </div>
        </div>
    </div>


    {{-- Modal Edit --}}
    <div class="modal fade"
         id="modalEdit{{ $setting->id }}"
         tabindex="-1"
         aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"
                        id="exampleModalLabel">Edit</h5>
                    <button type="button"
                            class="btn-close"
                            data-bs-dismiss="modal"
                            aria-label="Close"></button>
                </div>
                <form action="{{ route('settings.update', $setting->id) }}"
                      method="post"
                      enctype="multipart/form-data">
                    <div class="modal-body">
                        @csrf
                        @method('put')
                        <div class="mb-3">
                            <label for="title"
                                   class="form-label">Title</label>
                            <input type="text"
                                   class="form-control"
                                   name="title"
                                   id="title"
                                   value="{{ $setting->title }}">
                        </div>
                        <div class="mb-3">
                            <label for="email"
                                   class="form-label">Email</label>
                            <input type="text"
                                   class="form-control"
                                   name="email"
                                   id="email"
                                   value="{{ $setting->email }}">
                        </div>
                        <div class="mb-3">
                            <label for="motto"
                                   class="form-label">Motto</label>
                            <input type="text"
                                   class="form-control"
                                   name="motto"
                                   id="motto"
                                   value="{{ $setting->motto }}">
                        </div>
                        <div class="mb-3">
                            <label for="description"
                                   class="form-label">Description</label>
                            <textarea type="text"
                                      class="form-control"
                                      name="description"
                                      id="description"
                                      row="5"
                                      value="{{ $setting->description }}">{{ $setting->description }}</textarea>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="icon"
                                           class="d-block">Gambar</label>
                                    <img src="{{ asset('storage/' . $setting->icon) }}"
                                         id="previewImage"
                                         alt="{{ $setting->icon }}"
                                         class="mb-2 rounded"
                                         width="120">
                                    <input type="file"
                                           onchange="document.getElementById('previewImage').src = window.URL.createObjectURL(this.files[0])"
                                           class="form-control"
                                           value="{{ old('icon', $setting->icon) }}"
                                           name="icon"
                                           onfocus="(this.value='{{ $setting->icon }}')">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="favicon"
                                           class="d-block">Favicon</label>
                                    <img src="{{ asset('storage/' . $setting->favicon) }}"
                                         id="previewImage2"
                                         alt="{{ $setting->favicon }}"
                                         class="mb-2 rounded"
                                         width="50">
                                    <input type="file"
                                           onchange="document.getElementById('previewImage2').src = window.URL.createObjectURL(this.files[0])"
                                           class="form-control"
                                           value="{{ old('favicon', $setting->favicon) }}"
                                           name="favicon"
                                           onfocus="(this.value='{{ $setting->favicon }}')">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button"
                                class="btn btn-secondary rounded-3"
                                data-bs-dismiss="modal">Batal</button>
                        <button type="submmit"
                                class="btn btn-primary border-0 rounded-3 bg-violet-800">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <script src="{{ asset('js/datatables.js') }}"></script>
@endsection
