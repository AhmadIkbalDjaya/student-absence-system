@extends('layouts.main')

@section('body')
  @include('partials.navbar')
  @include('partials.header')

  <div id="section">
    <div class="container-fluid card shadow-lg">
      <div class="row mt-3">
        <div class="col-md-12 text-center">
          <h3>Tambahkan Guru</h3>
          <p>Tambahkan Guru pada colom dibawah</p>
        </div>
      </div>
    </div>
  </div>

  <div id="section">
    <div class="container-fluid">
      <div class="row m-4 justify-content-center">
        <div class="col-md-6 mb-3">
          <div class="card">
            <div class="login-box">
              <form action="{{ route('admin.teacher.store') }}" method="post">
                @csrf
                <h4 class="mb-4 text-center">Guru</h4>
                <div class="user-box mt-3">
                  <input type="text" name="username" value="{{ old('username') }}" class="@error('username') is-invalid mb-0 @enderror" required/>
                  <label class="text-black">NIP</label>
                  @error('username')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                  @enderror
                </div>
                <div class="user-box mt-3">
                  <input type="password" name="password" class="@error('password') is-invalid mb-0 @enderror" required/>
                  <label class="text-black">Password</label>
                  @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                  @enderror
                </div>
                <div class="user-box mt-3">
                  <input type="text" name="name" value="{{ old('name') }}" class="@error('name') is-invalid mb-0 @enderror" required/>
                  <label class="text-black">Name</label>
                  @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                  @enderror
                </div>
                <div class="user-box mt-3">
                  <input type="email" name="email" value="{{ old('email') }}" class="@error('email') is-invalid mb-0 @enderror" required/>
                  <label class="text-black">Email</label>
                  @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                  @enderror
                </div>
                <div class="user-box mt-3">
                  <input type="phone" name="phone" value="{{ old('phone') }}" class="@error('phone') is-invalid mb-0 @enderror" required/>
                  <label class="text-black">Phone Number</label>
                  @error('phone')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                  @enderror
                </div>
                <div class="user-box mt-3">
                  <select name="gender" class="form-select @error('gender') is-invalid mb-0 @enderror" required>
                    <option hidden>Jenis Kelamin</option>
                    <option value="Laki-laki" {{ old("gender") == "Laki-laki" ? "selected" : "" }}>Laki-Laki</option>
                    <option value="Perempuan" {{ old("gender") == "Perempuan" ? "selected" : "" }}>Perempuan</option>
                  </select>
                  @error('gender')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                  @enderror
                </div>
                <button type="submit" class="card mt-5">
                  Add User
                  <span></span>
                </button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection