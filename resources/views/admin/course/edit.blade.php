@extends('layouts.main')

@section('body')
  @include('partials.navbar')
  @include('partials.header')

  <div id="section">
    <div class="container-fluid card shadow-lg">
      <div class="row mt-3">
        <div class="col-2">
          <a href="{{ route('admin.course.index') }}"
            ><button type="button" class="btn btn-success"><i class="bi bi-arrow-left-circle"></i></button>
          </a>
        </div>
        <div class="col-md-12 text-center">
          <h3>Edit Mata Pelajaran</h3>
          <p>{{ $course->course_name }} {{ $course->claass->class_name }}</p>
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
              <form action="{{ route('admin.course.update', ['course' => $course->id]) }}" method="post">
                @method("patch")
                @csrf
                <input type="hidden" name="claass_id_old" value="{{ $course->claass_id }}">
                <h4 class="mb-4 text-center">Mapel</h4>
                <div class="user-box">
                  <input type="text" name="course_name" class="@error('course_name') is-invalid @enderror" value="{{ old("course_name", $course->course_name) }}" required="" />
                  <label class="text-black">Mata Pelajaran</label>
                  @error('course_name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                  @enderror
                </div>
                <div>
                  <p class="mt-3">Guru Pengajar :</p>
                  <select name="teacher_id" class="form-select @error('teacher_id') is-invalid @enderror">
                    <option value="" hidden>Guru Pengajar</option>
                    @foreach ($teachers as $teacher)
                      <option value="{{ $teacher->id }}" {{ old("teacher_id", $course->teacher_id) == "$teacher->id" ? "selected" : "" }}>{{ $teacher->user->name }}</option>
                    @endforeach
                  </select>
                  @error('teacher_id')
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
                      <option value="{{ $claass->id }}" {{ old("claass_id", $course->claass_id) == "$claass->id" ? "selected" : "" }}>{{ $claass->class_name }}</option>
                    @endforeach
                  </select>
                  @error('claass_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                  @enderror
                </div>
                <div>
                  <p class="mt-3">Semester :</p>
                  <select name="semester_id" class="form-select @error('semester_id') is-invalid @enderror">
                    <option value="" hidden>Semester</option>
                    @foreach ($semesters as $semester)
                      <option value="{{ $semester->id }}" {{ old("semester_id", $course->semester_id) == "$semester->id" ? "selected" : "" }}>
                        {{ $semester->start_year }} / {{ $semester->end_year }} 
                        @if ($semester->odd_even == 1)
                          (Ganjil)
                        @else
                          (Genap)
                        @endif
                      </option>
                    @endforeach
                  </select>
                  @error('semester_id')
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