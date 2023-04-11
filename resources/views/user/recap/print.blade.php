@extends('layouts.main')

@section('body')
<section id="rekap">
  <div class="container pt-3">
    <div class="row text-center mt-5 mb-2 align-items-center justify-content-center">
      <div class="col-4 d-flex flex-nowrap justify-content-center">
        <h3>Rekapan Absensi</h3>
      </div>
      <div class="col-12">
        <h3>SMA NEGRI 17 GOWA</h3>
      </div>
      <div class="col-12 border border-top-0 border-end-0 border-start-0 border-3 border-black">
        <p class="small">Alamat : CiniAyo Kel.Sapaya Kec.Bungaya Kab.Gowa Prov.Sulawesi Selatan</p>
      </div>
    </div>
  </div>
</section>

<section id="rekap">
  <div class="container">
    <div class="row">
      <div class="col-6 col-md-6">
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
          </tbody>
        </table>
      </div>
      <div class="col-6 col-md-6">
        <table class="table table-borderless">
          <tbody>
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
            <tr>
              <td>Jumlah Pertemuan</td>
              <td>:</td>
              <td>{{ $attendances_count }} Pertemuan</td>
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
                <th scope="col">NIS</th>
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
    </div>
  </div>
</section>

@push('script')
  <script>
    window.print();
  </script>
@endpush
@endsection