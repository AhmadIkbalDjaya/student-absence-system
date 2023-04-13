@extends('layouts.main')

@section('body')
@include('partials.navbar')

@include('partials.header')

<div id="section">
  <div class="container-fluid card shadow">
    <div class="row p-3">
      <div class="col-md-12">
        <h3>Guru</h3>
        <p>Tambah, Edit atau hapus Guru</p>
      </div>
      <div class="col-md-4">
        <a href="/admin/teacher/create" class="btn btn-success">Tambah Guru</a>
      </div>
    </div>
  </div>
</div>

@include('partials.alerts')

<div class="section">
  <div class="container-fluid card shadow my-3">
    <div class="row">
      <div class="col-md-12 p-4">
        <div class="table-responsive">
          <table class="table table-bordered text-center">
            <thead>
              <tr>
                <th class="col-md-0">No</th>
                <th class="col-md-4">NIP</th>
                <th class="col-md-4">Nama</th>
                <th class="col-md-4">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($teachers as $teacher)
              <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $teacher->user->username }}</td>
                <td>{{ $teacher->user->name }}</td>
                <td>
                  <a href="/admin/teacher/{{ $teacher->id }}"><span class="badge text-bg-info">Informasi</span></a>
                  <a href="/admin/teacher/{{ $teacher->id }}/edit"><span class="badge text-bg-warning">Edit User</span></a>
                  
                  <!-- Button trigger modal delete -->
                  <a href="" class="badge text-bg-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $teacher->id }}">
                    Hapus
                  </a>

                  <!-- Modal delete -->
                  <div class="modal fade" id="deleteModal{{ $teacher->id }}" tabindex="-1" aria-labelledby="deleteModal{{ $teacher->id }}Label" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="deleteModal{{ $teacher->id }}Label">Konfirmasi Hapus</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <form action="/admin/teacher/{{ $teacher->id }}" method="post" class="d-inline">
                            @method("delete")
                            @csrf
                            Yakin Ingin Menghapus {{ $teacher->user->name }}
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button class="btn btn-danger text-bg-danger border-0">Delete</button>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>

                  {{-- <form action="/admin/teacher/{{ $teacher->id }}" method="post" class="d-inline">
                    @method("delete")
                    @csrf
                    <button class="badge text-bg-danger border-0">Delete</button>
                  </form> --}}
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection