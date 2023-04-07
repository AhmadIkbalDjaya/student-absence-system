@extends('layouts.main')

@section('body')
  @include('partials.navbar')
  @include('partials.header')

  <section id="absensi">
    <div class="container">
      <div class="row my-5">
        <div class="col-md-12 text-center">
          <h3>Absensi</h3>
        </div>
      </div>
      <div class="row info-absen">
        <div class="col-8 col-md-4">
          <table class="table table-borderless">
            <tbody>
              <tr>
                <td>Mata Pelajaran</td>
                <td>:</td>
                <td>{{ $course->course_name }}</td>
              </tr>
              <tr>
                <td>Kelas</td>
                <td>:</td>
                <td>{{ $course->claass->class_name }}</td>
              </tr>
              <tr>
                <td>Semester</td>
                <td>:</td>
                <td>
                  @if ($course->semester->odd_even == 1)
                    (Ganjil)
                  @else
                    (Genap)
                  @endif
                  {{ $course->semester->start_year }} / 
                  {{ $course->semester->end_year }}
                </td>
              </tr>
            </tbody>
          </table>
          <a href="/class/course/{{ $course->id }}/attendance/create" class="btn btn-success">Buat Absensi</a>
        </div>
      </div>
    </div>
  </section>

  <section id="kehadiran">
    <div class="container">
      <div class="row justify-content-center">
        @foreach ($attendances as $attendance)
        <div class="col-md-12 my-3">
          <div class="card">
            <div class="card-body">
              <h5 class="card-header text-center bg-transparent">{{ $attendance->attendance_title }}</h5>
              <div class="card-body row align-items-center">
                <div class="col-10 col-md-11">
                  <p class="fs-5"><i class="bi bi-people"></i><a href="/class/course/{{ $course->id }}/attendance/{{ $attendance->id }}"> Kehadiran</a></p>
                </div>
                <div class="col-2 col-md-1">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" style="border-width: 2px" />
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </section>
@endsection
