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
                            data-bs-target="#exampleModal"><i class="fa user-add"></i> Videos</button>

                    <table id="myTable"
                           class="table responsive nowrap table-bordered table-striped align-middle"
                           style="width:100%">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Foto</th>
                                <th scope="col">Title</th>
                                <th scope="col">Description</th>
                                <th scope="col">Publish Time</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($videos->items as $key => $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td align="center">
                                        <img src="{{ $item->snippet->thumbnails->medium->url }}"
                                             alt=""
                                             width="50"
                                             class="rounded">
                                    </td>
                                    <td>{{ $item->snippet->title }} </td>
                                    <td>{{ \Illuminate\Support\Str::limit($item->snippet->title, $limit = 50, $end = ' ...') }}
                                    </td>
                                    <td>{{ date('d M Y', strtotime($item->snippet->publishTime)) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/datatables.js') }}"></script>
@endsection
