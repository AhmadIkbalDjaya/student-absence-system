@extends('layouts.main')

@section('body')
  @include('partials.navbar')
  @include('partials.header')

<div id="section">
  <div class="container">
    <div class="row shadow p-5 justify-content-center">
      <div class="col-4 col-md-1">
        <div><img src="/images/logo.png" alt="img" class="rounded-circle img-fluid" /></div>
      </div>
      <div class="col-md-11 text-center">
        <h3>{{ $teacher->user->name }}</h3>
        <p>{{ $teacher->user->username }}</p>
      </div>
    </div>
  </div>
</div>

<div id="section">
  <div class="container">
    <div class="row card shadow my-3 p-4">
      <div class="col-md-12 card-header">
        <h4>Edit Guru</h4>
      </div>
      <form action="{{ route('admin.teacher.update', ['teacher' => $teacher->id]) }}" method="post">
        @method('patch')
        @csrf
        <div class="col-md-12 card-body">
          <label for="username" class="col-sm-2 col-form-label">NIP</label>
          <div class="col-sm-6">
            <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" id="username" value="{{ old('username', $teacher->user->username) }}" />
            @error('username')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
        </div>
        <div class="col-md-12 card-body">
          <label for="name" class="col-sm-2 col-form-label">Nama</label>
          <div class="col-sm-6">
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror`" id="name" value="{{ old('name', $teacher->user->name) }}" required/>
          </div>
          @error('name')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
        <div class="col-md-12 card-body">
          <label for="password" class="col-sm-2 col-form-label">Password</label>
          <div class="col-sm-6">
            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror`" id="password" />
            <span id="passwordHelpInline" class="form-text">
              Kosongkan jika tidak ingin mengubah password
            </span>
          </div>
          @error('password')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
        <div class="col-md-12 card-body">
          <label for="email" class="col-sm-2 col-form-label">Email</label>
          <div class="col-sm-6">
            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror`" id="email" value="{{ old('email', $teacher->user->email) }}" required/>
          </div>
          @error('email')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
        <div class="col-md-12 card-body">
          <label for="phone" class="col-sm-2 col-form-label">Nomor Telepon</label>
          <div class="col-sm-6">
            <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror`" id="phone" value="{{ old('phone', $teacher->phone) }}" required/>
          </div>
          @error('phone')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
        <div class="col-5 col-md-3 my-4">
          <select class="form-select @error('gender') is-invalid @enderror`" name="gender" aria-label="Default select example">
            <option hidden>Jenis Kelamin</option>
            <option value="Laki-laki" {{ old('gender', $teacher->gender) == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
            <option value="Perempuan" {{ old('gender', $teacher->gender) == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
          </select>
          @error('gender')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
          @enderror
        </div>
        <div class="col-md-12 my-3">
          <button type="submit" class="btn btn-success">Komfirmasi</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection