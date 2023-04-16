@extends('layouts.main')

@push('script')
  <script src="{{ asset('js/create-semester.js') }}"></script>
@endpush

@section('body')
  @include('partials.navbar')
  @include('partials.header')

  <section id="headerSemester">
    <div class="container-fluid card shadow-lg">
      <div class="row mt-3">
        <div class="col-2">
          <a href="{{ route('admin.semester.index') }}">
            <button type="button" class="btn btn-success"><i class="bi bi-arrow-left-circle"></i></button>
          </a>
        </div>
        <div class="col-md-12 text-center">
          <h3>Tambahkan Semester</h3>
          <p>Tambahkan Semester dan Tahun Ajaran</p>
        </div>
      </div>
    </div>
  </section>

  <section id="semester">
    <div class="container-fluid">
      <div class="row mt-4 justify-content-center">
        <div class="col-md-6 mb-3">
          <div class="card">
            <div class="login-box">
              <form action="{{ route('admin.semester.store') }}" method="POST">
                @csrf
                <h4 class="mb-4 text-center mt-3">Semester</h4>
                <div>
                  <p class="mx-3">Semester :</p>
                  <select name="odd_even" class="form-select m-3 @error('odd_even') is-invalid @enderror" required>
                    <option hidden>Ganjil / Genap</option>
                    <option value="1" {{ old("odd_even") == "1" ? "selected" : "" }}>Ganjil</option>
                    <option value="2" {{ old("odd_even") == "2" ? "selected" : "" }}>Genap</option>
                  </select>
                  @error('odd_even')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                  @enderror
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div>
                      <label for="tahun-ajaran" class="m-3">Tahun Ajaran:</label>
                      <div class="row align-items-center">
                        <div class="col-7 col-md-5">
                          <select id="tahun-ajaran" name="start_year" class="m-3 @error('start_year') is-invalid @enderror">
                            <option hidden value="">Tahun Ajaran</option>
                            @for ($i = 2020; $i <= 2025; $i++)
                            <option value="{{ $i }}" {{ old("start_year") == "$i" ? "selected" : "" }}>{{ $i }}</option>
                            @endfor
                          </select>
                          @error('start_year')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                          @enderror
                        </div>
                        <div class="col-1 col-md-1">
                          <p class="card-subtitle mb-2 text-muted mt-1">/</p>
                        </div>
                        <div class="col-2 col-md-2">
                          <table>
                            <tbody>
                              <tr>
                                <th>
                                  <p class="card-text" id="tahun-ajaran-berikutnya"></p>
                                </th>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </div>
                      <div class="card m-3">
                        <div class="card-body">
                          <strong class="card-title">Tahun Ajaran</strong>
                          <p class="card-text" id="tahun-ajaran-terpilih"></p>
                        </div>
                      </div>
                      <div class="row text-center mt-4">
                        <div class="col-md-12">
                          <div class="login-box">
                            <button type="submit" class="card">
                              Tambah Semester
                              <span></span>
                            </button>
                          </div>
                        </div>
                      </div>
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