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

            <div class="card p-1 shadow rounded-3 border-0">
                <div class="card-body">

                    <button type="button"
                            class="btn btn-primary mb-4 border-0 rounded-3 bg-violet-800"
                            data-bs-toggle="modal"
                            data-bs-target="#exampleModal"><i class="fa user-add"></i> Add Post</button>

                    <table id="myTable"
                           class="table responsive nowrap table-bordered table-striped align-middle"
                           style="width:100%">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Gambar</th>
                                <th scope="col">Judul</th>
                                <th scope="col">Slug</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $post)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td align="center">
                                        <img src="{{ asset('storage/' . $post->image) }}"
                                             alt=""
                                             width="50"
                                             class="rounded">
                                    </td>
                                    <td>{{ Str::limit($post->title, 50, '...') }}</td>
                                    <td>{{ Str::limit($post->slug, 50, '...') }}</td>
                                    <td>

                                        <button type="button"
                                                class="btn btn-warning text-white"
                                                data-bs-toggle="modal"
                                                data-bs-target="#modalEdit{{ $post->id }}">
                                            <i class="fa-regular fa-pen-to-square me-1"></i>
                                        </button>
                                        <a href="{{ route('posts.show', $post->slug) }}"
                                           class="btn btn-success text-white">
                                            <i class="fa-regular fa-eye me-1"></i>
                                        </a>

                                        <button type="button"
                                                class="btn btn-danger"
                                                data-bs-toggle="modal"
                                                data-bs-target="#modalDelete{{ $post->id }}">
                                            <i class="fa-regular fa-trash-can me-1"></i>
                                        </button>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>

    <!-- Modal Add -->
    <div class="modal fade-modal"
         id="exampleModal"
         tabindex="-1"
         aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-fullscreen">
            <div class="modal-content overflow-scroll"
                 style="overflow-x: hidden !important; ">
                <div class="modal-header">
                    <h1 class="modal-title fs-5"
                        id="exampleModalLabel">Create new post</h1>
                    <button type="button"
                            class="btn-close"
                            data-bs-dismiss="modal"
                            aria-label="Close"></button>
                </div>
                <form action="{{ route('posts.store') }}"
                      method="post"
                      enctype="multipart/form-data">
                    <div class="modal-body">
                        @csrf
                        <div class="mb-3">
                            <label for="title"
                                   class="form-label">Title</label>
                            <input type="text"
                                   class="form-control"
                                   name="title"
                                   id="title">
                        </div>
                        <div class="mb-3">
                            <label for="excerpt"
                                   class="form-label">Excerpt</label>
                            <input type="text"
                                   class="form-control"
                                   name="excerpt"
                                   id="excerpt">
                        </div>
                        <div class="mb-3">
                            <label for="category_id"
                                   class="form-label">Category</label>
                            <select name="category_id"
                                    id="category_id"
                                    class="form-select">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="body"
                                   class="form-label">Body</label>
                            <textarea class="ckeditor form-control"
                                      name="body"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="image"
                                   class="d-block">Gambar</label>
                            <img id="previewImage"
                                 alt=""
                                 class="mb-2 rounded"
                                 width="50">
                            <input type="file"
                                   onchange="document.getElementById('previewImage').src = window.URL.createObjectURL(this.files[0])"
                                   class="form-control"
                                   value="{{ old('image') }}"
                                   name="image">
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

    @foreach ($posts as $post)
        <div class="modal fade"
             id="modalEdit{{ $post->id }}"
             tabindex="-1"
             aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-fullscreen">
                <div class="modal-content overflow-scroll"
                     style="overflow-x: hidden !important; ">
                    <div class="modal-header">
                        <h5 class="modal-title"
                            id="exampleModalLabel">Edit Data Anggota</h5>
                        <button type="button"
                                class="btn-close"
                                data-bs-dismiss="modal"
                                aria-label="Close"></button>
                    </div>
                    <form action="{{ route('posts.update', $post->slug) }}"
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
                                       value="{{ $post->title }}">
                            </div>
                            <div class="mb-3">
                                <label for="excerpt"
                                       class="form-label">Excerpt</label>
                                <input type="text"
                                       class="form-control"
                                       name="excerpt"
                                       id="excerpt"
                                       value="{{ $post->excerpt }}">
                            </div>
                            <div class="mb-3">
                                <label for="body"
                                       class="form-label">Body</label>
                                <textarea class="ckeditor form-control"
                                          name="body"
                                          value="{{ $post->body }}">{{ $post->body }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="category_id"
                                       class="form-label">Category</label>
                                <select name="category_id"
                                        id="category_id"
                                        class="form-select">
                                    @foreach ($categories as $category)
                                        @if ($category->id == $post->category_id)
                                            <option value="{{ $category->id }}"
                                                    selected>{{ $category->name }}</option>
                                        @endif
                                    @endforeach
                                    @foreach ($categories as $category)
                                        @if ($category->id != $post->category_id)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="image"
                                       class="d-block">Gambar</label>
                                <img src="{{ asset('storage/' . $post->image) }}"
                                     id="previewImage"
                                     alt="{{ $post->image }}"
                                     class="mb-2 rounded"
                                     width="50">
                                <input type="file"
                                       onchange="document.getElementById('previewImage').src = window.URL.createObjectURL(this.files[0])"
                                       class="form-control"
                                       value="{{ old('image', $post->image) }}"
                                       name="image"
                                       onfocus="(this.value='{{ $post->image }}')">
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
    @endforeach

    {{-- Modal Delete --}}
    @foreach ($posts as $post)
        <div class="modal fade "
             id="modalDelete{{ $post->id }}"
             tabindex="-1"
             aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"
                            id="exampleModalLabel">Hapus {{ $post->name }}</h5>
                        <button type="button"
                                class="btn-close"
                                data-bs-dismiss="modal"
                                aria-label="Close"></button>
                    </div>
                    <form action="{{ route('posts.destroy', $post->id) }}"
                          method="post">
                        <div class="modal-body">
                            @csrf
                            @method('delete')
                            <p>Are you sure?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button"
                                    class="btn btn-secondary rounded-3"
                                    data-bs-dismiss="modal">Batal</button>
                            <button type="submmit"
                                    class="btn btn-primary border-0 rounded-3 bg-violet-800">Yes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach


    <script src="{{ asset('js/datatables.js') }}"></script>
    <script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>

    <script type="text/javascript">
        $(dokumen).siap(fungsi() {

            $('.ckeditor').ckeditor();

        });
    </script>
@endsection
