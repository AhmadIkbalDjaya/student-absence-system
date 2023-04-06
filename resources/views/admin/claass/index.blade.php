@extends('layouts.main')

@section('body')
  @include('partials.navbar')
  @include('partials.header')

  <div id="section">
    <div class="container-fluid card shadow">
      <div class="row p-3">
        <div class="col-md-12">
          <h3>Kelas</h3>
          <p>Tambah, Edit atau hapus Kelas</p>
        </div>
        <div class="col-md-4">
          <a href="/admin/claass/create"><button type="button" class="btn btn-success">Tambah Kelas</button></a>
        </div>
      </div>
    </div>
  </div>
  <div id="liveAlertPlaceholder"></div>
  <div class="section">
    <div class="container-fluid card shadow my-3">
      <div class="row">
        <div class="col-md-12 p-4">
          <div class="table-responsive">
            <table class="table table-bordered text-center">
              <thead>
                <tr>
                  <th class="col-md-0">No</th>
                  <th class="col-md-3">Nama Kelas</th>
                  <th class="col-md-3">Kelas</th>
                  <th class="col-md-1">Jurusan</th>
                  <th class="col-md-4">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($claasses as $claass)
                  <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $claass->class_name }}</td>
                    <td>{{ $claass->class_level }}</td>
                    <td>{{ $claass->major }}</td>
                    <td>
                      <a href="editKelas.html"><span class="badge text-bg-warning">Edit Kelas</span></a>
                      <form action="/admin/claass/{{ $claass->id }}" method="post" class="d-inline">
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