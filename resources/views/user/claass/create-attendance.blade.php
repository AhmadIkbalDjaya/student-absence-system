@extends('layouts.main')

@section('body')
  @include('partials.navbar')
  @include('partials.header')

  <div id="section">
    <div class="container-fluid card shadow-lg">
      <div class="row mt-3">
        <div class="col-2">
          <a href="/class/course/{{ $course->id }}"
            ><button type="button" class="btn btn-success"><i class="bi bi-arrow-left-circle"></i></button
          ></a>
        </div>
        <div class="col-md-12 text-center">
          <h3>Tambah Absensi</h3>
          <p>Tambahkan absensi di bawah</p>
        </div>
      </div>
    </div>
  </div>

  <div id="section">
    <div class="container-fluid">
      <div class="row m-4 justify-content-center">
        <div class="col-md-6 mb-3">
          <div class="card">
            <div class="login-box my-4">
              <form action="/class/course/{{ $course->id }}/attendance" method="POST">
                @csrf
                <h4 class="mb-4 text-center">Buat Absensi</h4>
                <div class="user-box mt-4">
                  <input type="text" name="attendance_title" required="" />
                  <label class="text-black">Judul Absensi</label>
                </div>
                <div class="user-box mt-4">
                  <input type="date" name="attendance_date" />
                  <label class="text-black">Tanggal Absensi</label>
                </div>
                <div class="row text-center mt-4">
                  <div class="col-md-12">
                    <div class="login-box">
                      <button class="card">
                        Simpan
                        <span></span>
                      </button>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
