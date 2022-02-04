@extends('dashboard.layouts.main')

@section('container')

  <div class="row">
    <div class="col-sm-6 col-md-12 mt-3">
      <div class="card p-1 shadow rounded-3 border-0">
        <div class="card-body">

          <table id="myTable" class="table responsive nowrap table-bordered table-striped align-middle" style="width:100%">
            <thead>
              <tr>
                <th scope="col">#</th>
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
                  <td>{{ $member->nim }}</td>
                  <td>{{ $member->name }}</td>
                  <td>{{ $member->department->department }}</td>
                  <td>{{ $member->class }}</td>
                  <td>
                    <a class="btn btn-warning" href="#">
                      <i class="fa-regular fa-pen-to-square"></i>
                    </a>
                    <a class="btn btn-danger" href="#deleteModal{{ $loop->iteration }}" data-bs-toggle="modal">
                      <i class="fa-regular fa-trash-can"></i>
                    </a>
                  </td>
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
