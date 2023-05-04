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
          <a href="{{ route('teacher.attendance.create', ['course' => $course->id]) }}" class="btn btn-success">
            Buat Absensi
          </a>
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
                  <p class="fs-5"><i class="bi bi-people"></i>
                    <a href="{{ route('teacher.student.attendance', ['course' => $course->id, 'attendance' => $attendance->id]) }}">
                      Kehadiran
                    </a>
                  </p>
                </div>
                <div class="col-2 col-md-1">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" style="border-width: 2px" {{ $attendance->is_filled == 1 ? "checked" : "" }}/>
                    {{-- <form action="{{ route('teacher.student.attendance.destroy', ['course' => $course->id, 'attendance' => $attendance->id]) }}" method="post">
                      @method('delete')
                      @csrf
                      <button type="submit" class="border-0 bg-transparent">
                        <i class="bi bi-trash"></i>
                      </button>
                    </form> --}}
                    <!-- Button trigger modal delete -->
                    <a href="" class="" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $course->id }}">
                      <i class="bi bi-trash"></i>
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
                            <form action="{{ route('teacher.student.attendance.destroy', ['course' => $course->id, 'attendance' => $attendance->id]) }}" method="post" class="d-inline">
                              @method("delete")
                              @csrf
                              Yakin Ingin Menghapus {{ $attendance->attendance_title }}
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                              {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
                              <button class="btn btn-danger text-bg-danger border-0">Delete</button>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
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
