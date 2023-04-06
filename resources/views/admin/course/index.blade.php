@extends('layouts.main')

@push('style')
    <link rel="stylesheet" href="/css/course/index.css">
@endpush

@section('body')
  @include('partials.navbar')
  @include('partials.header')

  <div id="section">
    <div class="container-fluid card shadow">
      <div class="row p-3">
        <div class="col-md-12">
          <h3>Mata Pelajaran</h3>
          <p>Tambah, Edit atau hapus Mata Pelajaran</p>
        </div>
        <div class="col-md-4">
          <a href="/admin/course/create">
            <button type="button" class="btn btn-success">Tambah Mapel</button>
          </a>
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
                  <th class="col-md-3">Mata Pelajaran</th>
                  <th class="col-md-3">Guru</th>
                  <th class="col-md-1">Kelas</th>
                  <th class="col-md-4">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($courses as $course)
                  <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $course->course_name }}</td>
                    <td>{{ $course->teacher->user->name }}</td>
                    <td>{{ $course->claass->class_name }}</td>
                    <td>
                      {{-- <a href="/admin/course/{{ $course->id }}"><span class="badge text-bg-info">Informasi</span></a> --}}
                      <a href="/admin/course/{{ $course->id }}/edit"><span class="badge text-bg-warning">Edit Mapel</span></a>
                      <form action="/admin/course/{{ $course->id }}" method="post" class="d-inline">
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