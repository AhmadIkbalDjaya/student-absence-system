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
          <h3>Rekap Absensi</h3>
          <p>Rekap Absensi Mata Pelajaran Semester ini</p>
        </div>
      </div>
    </div>
  </div>

  @include('partials.alerts')

  <div class="section">
    <div class="container-fluid card shadow my-3">
      <div class="row">
        <div class="col-md-12 p-4">
          @if (count($courses) == 0)
            <div class="col-md-12 text-center">
              <h4>Belum Ada Rekap</h4>
            </div>
          @else
            <div class="table-responsive">
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
                      <td>
                        <a href="{{ route('admin.recap.course', ['course' => $course->id]) }}">
                          <span class="badge text-bg-success">Rekap Mapel</span>
                        </a>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          @endif
        </div>
      </div>
    </div>
  </div>
@endsection