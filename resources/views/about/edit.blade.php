@extends('layouts.main')

@section('body')
  @include('partials.navbar')
  @include('partials.header')
  
  <section id="tentangkami">
    <div class="container-fluid card shadow">
      <div class="row p-3">
        <div class="col-2">
          <a href="{{ route('about.index') }}">
            <button type="button" class="btn btn-success"><i class="bi bi-arrow-left-circle"></i></button>
          </a>
        </div>
        <div class="col-md-12 text-center">
          <h3>Edit</h3>
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
              <form action="{{ route('about.update', ['about' => $about->id]) }}" method="POST" enctype="multipart/form-data">
                @method('patch')
                @csrf
                <input type="hidden" name="old_image" value="{{ $about->image }}">
                <div class="my-5">
                  <label for="formFile" class="form-label">Masukkan foto</label>
                  <input class="form-control @error('image') is-invalid @enderror" name="image" type="file" id="formFile" value="{{ old('image') }}" required/>
                  @error('image')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                  @enderror
                </div>
                <div class="user-box">
                  <input type="text" name="description" class="@error('description') is-invalid @enderror" value="{{ old('description', $about->description) }}" required="" />
                  <label class="text-black">Deskripsi</label>
                  @error('description')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                  @enderror
                </div>
                <div class="row text-center my-4">
                  <div class="col-md-12">
                    <div class="login-box">
                      <button class="card" type="submit">
                        Edit
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