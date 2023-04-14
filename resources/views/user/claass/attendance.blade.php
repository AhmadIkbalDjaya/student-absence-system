@extends('layouts.main')

@section('body')
  @include('partials.navbar')
  @include('partials.header')

  <section id="daftarHadir">
    <div class="container-fluid">
      <div class="row my-4">
        <div class="col-md-12 text-center my-4">
          <h4>{{ $attendance->attendance_title }}</h4>
        </div>
        <div class="col-12 col-md-12">
          <table class="table table-borderless d-inline">
            <tbody>
              <tr>
                <td>Kelas</td>
                <td>:</td>
                <td>{{ $course->claass->class_name }}</td>
              </tr>
              <tr>
                <td>Mata Pelajaran</td>
                <td>:</td>
                <td>{{ $course->course_name }}</td>
              </tr>
              <tr>
                <td>Jumlah Siswa</td>
                <td>:</td>
                <td>{{ count($students) }}</td>
              </tr>
              <tr>
                <td>Tanggal</td>
                <td>:</td>
                <td>{{ $attendance->attendance_date }}</td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="col-12 col-md-12">
          <strong>Keterangan :</strong> <br>
          <table class="table table-borderless table-sm d-inline">
            <tbody>
              <tr>
                <th>H</th>
                <td>:</td>
                <td class="pe-3">Hadir</td>
                <th>S</th>
                <td>:</td>
                <td class="pe-3">Sakit</td>
                <th>I</th>
                <td>:</td>
                <td class="pe-3">Izin</td>
                <th>A</th>
                <td>:</td>
                <td class="pe-3">Alfa</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <form action="/class/course/{{ $course->id }}/attendance/{{ $attendance->id }}" method="post">
        @csrf
        <div class="row">
          <div class="col-md-12">
            <div class="table-responsive">
              <table class="table table-bordered">
                <thead>
                  <tr class="text-center">
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">NISN</th>
                    <th scope="col">L/P</th>
                    <th scope="col" class="border-0">H</th>
                    <th scope="col" class="border-0">S</th>
                    <th scope="col" class="border-0">I</th>
                    <th scope="col" class="border-0 border-end">A</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($student_attendaces as $student_attendace)
                  <tr>
                    <th scope="row" class="text-center">{{ $loop->iteration }}</th>
                    <td style="white-space: nowrap">{{ $student_attendace->student->name }}</td>
                    <input type="hidden" name="students_id[{{ $loop->iteration }}]" value="{{ $student_attendace->student->id }}">
                    <input type="hidden" name="id[{{ $loop->iteration }}]" value="{{ $student_attendace->id }}">
                    <td class="text-center">{{ $student_attendace->student->nis }}</td>
                    <td class="text-center">
                      @if ($student_attendace->student->gender == "Laki-laki")
                        L
                      @else
                        P
                      @endif
                    </td>
                    <td class="border-0">
                      <div class="form-check d-flex justify-content-center">
                        <input class="form-check-input" type="radio" value="1" name="statuses[{{ $loop->iteration }}]" {{ $student_attendace->status == "1" ? "checked" : "" }} required/>
                      </div>
                    </td>
                    <td class="border-0">
                      <div class="form-check d-flex justify-content-center">
                        <input class="form-check-input" type="radio" value="2" name="statuses[{{ $loop->iteration }}]" {{ $student_attendace->status == "2" ? "checked" : "" }} required/>
                      </div>
                    </td>
                    <td class="border-0">
                      <div class="form-check d-flex justify-content-center">
                        <input class="form-check-input" type="radio" value="3" name="statuses[{{ $loop->iteration }}]" {{ $student_attendace->status == "3" ? "checked" : "" }} required/>
                      </div>
                    </td>
                    <td class="border-0 border-end">
                      <div class="form-check d-flex justify-content-center">
                        <input class="form-check-input" type="radio" value="4" name="statuses[{{ $loop->iteration }}]" {{ $student_attendace->status == "4" ? "checked" : "" }} required/>
                      </div>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
          <div class="button mb-3">
            <button type="submit" class="btn btn-success btn-sm">Simpan Kehadiran</button>
          </div>
        </div>
      </form>
    </div>
  </section>
@endsection
