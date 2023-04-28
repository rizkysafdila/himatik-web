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
                            data-bs-target="#exampleModal"><i class="fa user-add"></i> Add Member</button>

                    <table id="myTable"
                           class="table responsive nowrap table-bordered table-striped align-middle"
                           style="width:100%">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Foto</th>
                                <th scope="col">NIM</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Departemen</th>
                                <th scope="col">Kelas</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($members as $member)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td align="center">
                                        <img src="{{ asset('storage/' . $member->image) }}"
                                             alt=""
                                             width="50"
                                             class="rounded">
                                    </td>
                                    <td>{{ $member->nim }}</td>
                                    <td>{{ $member->name }}</td>
                                    <td>{{ $member->department->department }}</td>
                                    <td>{{ $member->class }}</td>
                                    <td>

                                        <button type="button"
                                                class="btn btn-warning text-white"
                                                data-bs-toggle="modal"
                                                data-bs-target="#modalEdit{{ $member->id }}">
                                            <i class="fa-regular fa-pen-to-square me-1"></i>
                                        </button>
                                        <button type="button"
                                                class="btn btn-danger"
                                                data-bs-toggle="modal"
                                                data-bs-target="#modalDelete{{ $member->id }}">
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
    <div class="modal fade"
         id="exampleModal"
         tabindex="-1"
         aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5"
                        id="exampleModalLabel">Create new member</h1>
                    <button type="button"
                            class="btn-close"
                            data-bs-dismiss="modal"
                            aria-label="Close"></button>
                </div>
                <form action="{{ route('members.store') }}"
                      method="post"
                      enctype="multipart/form-data">
                    <div class="modal-body">
                        @csrf
                        <div class="mb-3">
                            <label for="nim"
                                   class="form-label">NIM</label>
                            <input type="number"
                                   class="form-control"
                                   name="nim"
                                   id="nim">
                        </div>
                        <div class="mb-3">
                            <label for="name"
                                   class="form-label">Nama</label>
                            <input type="text"
                                   class="form-control"
                                   name="name"
                                   id="name">
                        </div>
                        <div class="mb-3">
                            <label for="email"
                                   class="form-label">Email</label>
                            <input type="text"
                                   class="form-control"
                                   name="email"
                                   id="email">
                        </div>
                        <div class="mb-3">
                            <label for="department_id"
                                   class="form-label">Department</label>
                            <select name="department_id"
                                    id="department_id"
                                    class="form-select">
                                @foreach ($departments as $department)
                                    <option value="{{ $department->id }}">{{ $department->department }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="class"
                                   class="form-label">Kelas</label>
                            <input type="text"
                                   class="form-control"
                                   name="class"
                                   id="class">
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

    @foreach ($members as $member)
        <div class="modal fade"
             id="modalEdit{{ $member->id }}"
             tabindex="-1"
             aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"
                            id="exampleModalLabel">Edit Data Anggota</h5>
                        <button type="button"
                                class="btn-close"
                                data-bs-dismiss="modal"
                                aria-label="Close"></button>
                    </div>
                    <form action="{{ route('members.update', $member->id) }}"
                          method="post"
                          enctype="multipart/form-data">
                        <div class="modal-body">
                            @csrf
                            @method('put')
                            <div class="mb-3">
                                <label for="nim"
                                       class="form-label">NIM</label>
                                <input type="number"
                                       class="form-control"
                                       name="nim"
                                       id="nim"
                                       value="{{ $member->nim }}">
                            </div>
                            <div class="mb-3">
                                <label for="name"
                                       class="form-label">Nama</label>
                                <input type="text"
                                       class="form-control"
                                       name="name"
                                       id="name"
                                       value="{{ $member->name }}">
                            </div>
                            <div class="mb-3">
                                <label for="email"
                                       class="form-label">Email</label>
                                <input type="text"
                                       class="form-control"
                                       name="email"
                                       id="email"
                                       value="{{ $member->email }}">
                            </div>
                            <div class="mb-3">
                                <label for="department_id"
                                       class="form-label">Department</label>
                                <select name="department_id"
                                        id="department_id"
                                        class="form-select">
                                    @foreach ($departments as $department)
                                        @if ($department->id == $member->department_id)
                                            <option value="{{ $department->id }}"
                                                    selected>{{ $department->department }}</option>
                                        @endif
                                    @endforeach
                                    @foreach ($departments as $department)
                                        @if ($department->id != $member->department_id)
                                            <option value="{{ $department->id }}">{{ $department->department }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="class"
                                       class="form-label">Kelas</label>
                                <input type="text"
                                       class="form-control"
                                       name="class"
                                       id="class"
                                       value="{{ $member->class }}">
                            </div>
                            <div class="mb-3">
                                <label for="image"
                                       class="d-block">Gambar</label>
                                <img src="{{ asset('storage/' . $member->image) }}"
                                     id="previewImage"
                                     alt="{{ $member->image }}"
                                     class="mb-2 rounded"
                                     width="50">
                                <input type="file"
                                       onchange="document.getElementById('previewImage').src = window.URL.createObjectURL(this.files[0])"
                                       class="form-control"
                                       value="{{ old('image', $member->image) }}"
                                       name="image"
                                       onfocus="(this.value='{{ $member->image }}')">
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
    @foreach ($members as $member)
        <div class="modal fade "
             id="modalDelete{{ $member->id }}"
             tabindex="-1"
             aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"
                            id="exampleModalLabel">Hapus {{ $member->name }}</h5>
                        <button type="button"
                                class="btn-close"
                                data-bs-dismiss="modal"
                                aria-label="Close"></button>
                    </div>
                    <form action="{{ route('members.destroy', $member->id) }}"
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
@endsection
