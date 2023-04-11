@extends('layouts.main')

@section('body')
  @include('partials.navbar')
  @include('partials.header')

  <section id="rekap">
    <div class="container">
      <div class="row text-center my-5">
        <div class="col-md-12">
          <h3>Rekapan Siswa</h3>
        </div>
      </div>
      <div class="row">
        <div class="col-8 col-md-4">
          <table class="table table-borderless">
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
        </div>
      </div>
    </div>
  </section>

  <section id="rekapUser">
    <div class="container">
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
                  <th scope="col">H</th>
                  <th scope="col">S</th>
                  <th scope="col">I</th>
                  <th scope="col">A</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($students as $student)
                <tr>
                  <th scope="row" class="text-center">{{ $loop->iteration }}</th>
                  <td>{{ $student->name }}</td>
                  <td class="text-center">{{ $student->nis }}</td>
                  <td class="text-center">
                    @if ($student->gender == 'Laki-laki')
                      L
                    @else
                      P
                    @endif
                  </td>
                  @php
                    $hadir = 0;
                    $sakit = 0;
                    $izin = 0;
                    $alpa = 0;
                  @endphp
                  @foreach ($student_attendances as $s_a)
                    @if ($s_a->student_id == $student->id)
                      @php
                        if ($s_a->status == 1) $hadir+=1;
                        elseif($s_a->status == 2) $sakit+=1;
                        elseif($s_a->status == 3) $izin+=1;
                        elseif($s_a->status == 4) $alpa+=1;
                      @endphp
                    @endif
                  @endforeach
                  <td class="text-center">{{ $hadir }}</td>
                  <td class="text-center">{{ $sakit }}</td>
                  <td class="text-center">{{ $izin }}</td>
                  <td class="text-center">{{ $alpa }}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
        <div class="button mb-3">
          <button type="button" class="btn btn-primary btn-sm"><a href="printRekapan.html">Cetak</a></button>
        </div>
      </div>
    </div>
  </section>
@endsection
