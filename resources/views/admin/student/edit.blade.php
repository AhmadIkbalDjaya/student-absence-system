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
          <h3>{{ $student->name }}</h3>
          <p>{{ $student->nis }}</p>
        </div>
      </div>
    </div>
  </div>

  <div id="section">
    <div class="container">
      <div class="row card shadow my-3 p-4">
        <div class="col-2 mb-3">
          <a href="{{ route('admin.student.index') }}"
            ><button type="button" class="btn btn-success"><i class="bi bi-arrow-left-circle"></i></button
          ></a>
        </div>
        <div class="col-md-12 card-header">
          <h4>Edit Siswa</h4>
        </div>
        <form action="{{ route('admin.student.update', ['student' => $student->id]) }}" method="post" class="p-0 m-0">
          @method("patch")
          @csrf
          <div class="col-md-12">
            <label for="nis" class="col-sm-2 col-form-label">NISN</label>
            <div class="col-sm-6">
              <input type="text" name="nis" class="form-control @error('nis') is-invalid @enderror" value="{{ old("nis", $student->nis) }}" id="nis" />
              @error('nis')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
          </div>
          <div class="col-md-12">
            <label for="name" class="col-sm-2 col-form-label">Nama</label>
            <div class="col-sm-6">
              <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old("name", $student->name) }}" id="name" />
              @error('name')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
          </div>
          <div class="col-md-12">
            <label for="parent_phone" class="col-sm-2 col-form-label">No.Telepon Orang Tua</label>
            <div class="col-sm-6">
              <input type="text" name="parent_phone" class="form-control @error('parent_phone') is-invalid @enderror" value="{{ old("parent_phone", $student->parent_phone) }}" id="parent_phone" />
              @error('parent_phone')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
          </div>
          <div class="col-7 col-md-3 my-4">
            <label for="claass" class="mb-2">Kelas</label>
            <select name="claass_id" class="form-select @error('claass_id') is-invalid @enderror" id="claass">
              <option hidden>Kelas</option>
              @foreach ($claasses as $claass)
                <option value="{{ $claass->id }}" {{ old("claass_id", $student->claass_id) == "$claass->id" ? "selected" : "" }}>{{ $claass->class_name }}</option>
              @endforeach
            </select>
            @error('claass_id')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
          </div>
          <div class="col-7 col-md-3 my-4">
            <label for="gender" class="mb-2">Jenis Kelamin</label>
            <select name="gender" class="form-select @error('gender') is-invalid @enderror" id="gender">
              <option hidden>Jenis Kelamin</option>
              <option value="Laki-laki" {{ old('gender', $student->gender) == 'Laki-laki' ? 'selected' : '' }}>Laki-Laki</option>
              <option value="Perempuan" {{ old('gender', $student->gender) == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
            </select>
          </div>
          <div class="col-md-12 my-3">
            <button type="submit" class="btn btn-success">Edit Siswa</button>
          </div>

        </form>
      </div>
    </div>
  </div>
@endsection