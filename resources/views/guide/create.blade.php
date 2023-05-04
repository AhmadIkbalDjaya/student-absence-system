@extends('layouts.main')

@section('body')
  @include('partials.navbar')
  @include('partials.header')
  
  <section id="tentangkami">
    <div class="container-fluid card shadow">
      <div class="row p-3">
        <div class="col-2">
          <a href="{{ route('guide.index') }}"
            ><button type="button" class="btn btn-success"><i class="bi bi-arrow-left-circle"></i></button
          ></a>
        </div>
        <div class="col-md-12 text-center">
          <h3>Tambah</h3>
        </div>
      </div>
    </div>
  </section>

  <section id="addtentangKami">
    <div class="container-fluid">
      <div class="row m-4 justify-content-center">
        <div class="col-md-6 mb-3">
          <div class="card">
            <div class="login-box">
              <form action="{{ route('guide.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="my-5">
                  <label for="formFile" class="form-label">Masukkan File</label>
                  <input name="file" type="file" class="form-control @error('file') is-invalid @enderror" id="formFile" />
                  @error('file')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                  @enderror
                </div>
                <div class="row text-center my-4">
                  <div class="col-md-12">
                    <div class="login-box">
                      <button type="submit" class="card">
                        Tambah
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
  </section>
@endsection