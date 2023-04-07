@extends('layouts.main')

@section('body')
  @include('partials.navbar')
  @include('partials.header')

  <section id="daftarHadir">
    <div class="container-fluid">
      <div class="row my-4">
        <div class="col-md-12 text-center my-4">
          <h4>Daftar Hadir 10 IPA I</h4>
        </div>
        <div class="col-8 col-md-2">
          <strong>Keterangan :</strong>
          <table class="table table-borderless">
            <tbody>
              <tr>
                <td>H</td>
                <td>:</td>
                <td>Hadir</td>
              </tr>
              <tr>
                <td>S</td>
                <td>:</td>
                <td>Sakit</td>
              </tr>
              <br />
              <tr>
                <td>A</td>
                <td>:</td>
                <td>Alfa</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <form action="#">
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
                    <th scope="col" class="border-0 border-end">A</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($students as $student)
                  <tr>
                    <th scope="row" class="text-center">{{ $loop->iteration }}</th>
                    <td style="white-space: nowrap">{{ $student->name }}</td>
                    <td class="text-center">{{ $student->nis }}</td>
                    <td class="text-center">
                      @if ($student->gender == "Laki-laki")
                        L
                      @else
                        P
                      @endif
                    </td>
                    <td class="border-0">
                      <div class="form-check d-flex justify-content-center">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" />
                      </div>
                    </td>
                    <td class="border-0">
                      <div class="form-check d-flex justify-content-center">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" />
                      </div>
                    </td>
                    <td class="border-0 border-end">
                      <div class="form-check d-flex justify-content-center">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" />
                      </div>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
          <div class="button mb-3">
            <button type="button" class="btn btn-success btn-sm"><a href="absensi.html" class="text-white">Simpan Kehadiran</a></button>
          </div>
        </div>
      </form>
    </div>
  </section>
@endsection
