@extends('layouts.main')

@section('body')
  @include('partials.navbar')
  @include('partials.header')

  <div id="section">
    <div class="container-fluid card shadow-lg">
      <div class="row mt-3">
        <div class="col-2">
          <a href="{{ route('admin.student.index') }}">
            <button type="button" class="btn btn-success"><i class="bi bi-arrow-left-circle"></i></button>
          </a>
        </div>
        <div class="col-md-12 text-center">
          <h3>Tambahkan Siswa</h3>
          <p>Tambahkan Siswa baru</p>
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
              {{-- <form action="/admin/student" method="post"> --}}
              <form action="{{ route('admin.student.store') }}" method="post">
                @csrf
                <h4 class="mb-4 text-center">USER</h4>
                <div class="user-box">
                  <input type="text" name="nis" class="@error('nis') is-invalid @enderror" value="{{ old("nis") }}" required="" />
                  <label class="text-black">NISN</label>
                  @error('nis')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                  @enderror
                </div>
                <div class="user-box">
                  <input type="text" name="name" class="@error('name') is-invalid @enderror" value="{{ old("name") }}" required="" />
                  <label class="text-black">Nama</label>
                  @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                  @enderror
                </div>
                <div class="user-box">
                  <input type="text" name="parent_phone" class="@error('parent_phone') is-invalid @enderror" value="{{ old("parent_phone") }}" required="" />
                  <label class="text-black">No. Telepon Orang Tua</label>
                  @error('parent_phone')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                  @enderror
                </div>
                <div>
                  <p>Jenis Kelamin :</p>
                  <select name="gender" class="form-select @error('gender') is-invalid @enderror">
                    <option value="" hidden>Jenis Kelamin</option>
                    <option value="Laki-laki" {{ old("gender") == "Laki-laki" ? "selected" : "" }}>Laki-Laki</option>
                    <option value="Perempuan" {{ old("gender") == "Perempuan" ? "selected" : "" }}>Perempuan</option>
                  </select>
                  @error('gender')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                  @enderror
                </div>
                <div>
                  <p class="mt-3">Kelas :</p>
                  <select name="claass_id" class="form-select @error('claass_id') is-invalid @enderror">
                    <option value="" hidden>Kelas</option>
                    @foreach ($claasses as $claass)
                      <option value="{{ $claass->id }}" {{ old("claass_id") == "$claass->id" ? "selected" : "" }}>{{ $claass->class_name }}</option>
                    @endforeach
                  </select>
                  @error('claass_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                  @enderror
                </div>
                <div class="row text-center mt-4">
                  <div class="col-md-12">
                    <div class="login-box">
                      <button type="submit" class="card">
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