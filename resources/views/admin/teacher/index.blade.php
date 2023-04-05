@extends('layouts.main')
@push('style')
    <link rel="stylesheet" href="/css/teacher/index.css">
@endpush

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
        <a href="/admin/teacher/create" class="btn btn-primary">Tambah Guru</a>
      </div>
    </div>
  </div>
</div>

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
                  <form action="/admin/teacher/{{ $teacher->id }}" method="post" class="d-inline">
                    @method("delete")
                    @csrf
                    <button class="badge text-bg-danger border-0">Delete</button>
                  </form>
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