@extends('layouts.main')

@push('style')
    <link rel="stylesheet" href="{{ asset('css/course-index.css') }}" />
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
          <a href="{{ route('admin.course.create') }}">
            <button type="button" class="btn btn-success">Tambah Mapel</button>
          </a>
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
            @if (count($courses) == 0)
              <div class="col-md-12 text-center">
                <h4>Belum Ada Mata Pelajaran</h4>
              </div>
            @else
              <table class="table table-bordered text-center">
                <thead>
                  <tr>
                    <th class="col-md-0">No</th>
                    <th class="col-md-3" style="white-space: nowrap">Mata Pelajaran</th>
                    <th class="col-md-3">Guru</th>
                    <th class="col-md-1">Kelas</th>
                    <th class="col-md-4">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($courses as $course)
                    <tr>
                      <th scope="row">{{ $loop->iteration }}</th>
                      <td style="white-space: nowrap">{{ $course->course_name }}</td>
                      <td>{{ $course->teacher->user->name }}</td>
                      <td>{{ $course->claass->class_name }}</td>
                      <td class="d-flex justify-content-center">
                        <a href="{{ route('admin.course.edit', ['course' => $course->id]) }}">
                          <span class="badge text-bg-warning me-1">Edit Mapel</span>
                        </a>
                        <!-- Button trigger modal delete -->
                        <a href="" class="" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $course->id }}">
                          <span class="badge text-bg-danger">Hapus</span>
                        </a>

                        <!-- Modal delete -->
                        <div class="modal fade" id="deleteModal{{ $course->id }}" tabindex="-1" aria-labelledby="deleteModal{{ $course->id }}Label" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h1 class="modal-title fs-5" id="deleteModal{{ $course->id }}Label">Konfirmasi Hapus</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                <form action="{{ route('admin.course.destroy', ['course' => $course->id]) }}" method="post" class="d-inline">
                                  @method("delete")
                                  @csrf
                                  Yakin Ingin Menghapus {{ $course->course_name }}
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                  <button class="btn btn-danger text-bg-danger border-0">Delete</button>
                                </form>
                              </div>
                            </div>
                          </div>
                        </div>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection