@extends('layouts.main')

@section('body')
  @include('partials.navbar')
  @include('partials.header')

  <div id="section">
    <div class="container-fluid card shadow">
      <div class="row p-3">
        <div class="col-md-12">
          <h3>Siswa</h3>
          <p>Tambah, Edit atau hapus Siswa</p>
        </div>
        <div class="col-md-4">
          <a href="/admin/student/create"><button type="button" class="btn btn-success">Tambah Siswa</button></a>
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
                  <th class="col-md-0">No.</th>
                  <th class="col-md-4">NISN</th>
                  <th class="col-md-4">Nama</th>
                  <th class="col-md-4">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($students as $student)
                  <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $student->nis }}</td>
                    <td>{{ $student->name }}</td>
                    <td>
                      <a href="/admin/student/{{ $student->id }}"><span class="badge text-bg-info">Informasi</span></a>
                      <a href="/admin/student/{{ $student->id }}/edit"><span class="badge text-bg-warning">Edit User</span></a>
                      <form action="/admin/student/{{ $student->id }}" method="post" class="d-inline">
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