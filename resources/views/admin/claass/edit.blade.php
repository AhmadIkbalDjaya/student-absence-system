@extends('layouts.main')

@section('body')
  @include('partials.navbar')
  @include('partials.header')

  <div id="section">
    <div class="container-fluid card shadow-lg">
      <div class="row mt-3">
        <div class="col-2">
          <a href="/admin/claass">
            <button type="button" class="btn btn-success"><i class="bi bi-arrow-left-circle"></i></button>
          </a>
        </div>
        <div class="col-md-12 text-center">
          <h3>Edit Kelas</h3>
          <p>{{ $claass->class_name }}</p>
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
              <form action="/admin/claass/{{ $claass->id }}" method="post">
                @method("patch")
                @csrf
                <h4 class="mb-4 text-center">Kelas</h4>
                <div>
                  <p>Kelas :</p>
                  <select name="major" class="form-select @error('major') is-invalid @enderror">
                    <option value="" hidden>Jurusan</option>
                    <option value="IPA" {{ old("major", $claass->major) == "IPA" ? "selected" : "" }}>IPA</option>
                    <option value="IPS" {{ old("major", $claass->major) == "IPS" ? "selected" : "" }}>IPS</option>
                  </select>
                  @error('major')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                  @enderror
                </div>
                <div>
                  <select name="class_level" class="form-select mt-3 @error('class_level') is-invalid @enderror">
                    <option value="" hidden>Kelas</option>
                    <option value="10" {{ old("class_level", $claass->class_level) == "10" ? "selected" : "" }}>10</option>
                    <option value="11" {{ old("class_level", $claass->class_level) == "11" ? "selected" : "" }}>11</option>
                    <option value="12" {{ old("class_level", $claass->class_level) == "12" ? "selected" : "" }}>12</option>
                  </select>
                  @error('class_level')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                  @enderror
                </div>
                <div class="user-box mt-4">
                  <input type="text" name="class_name" class="@error('class_name') is-invalid @enderror" value="{{ old("class_name", $claass->class_name) }}" required="" />
                  <label class="text-black">Nama Kelas</label>
                  @error('class_name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                  @enderror
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