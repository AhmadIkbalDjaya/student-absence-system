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
          <h3>Informasi</h3>
        </div>
      </div>
    </div>
  </div>

  <div id="section">
    <div class="container">
      <div class="row card shadow p-4 mt-3">
        <div class="col-md-12">
          <h4 class="card-header">Detail User</h4>
          <div class="card-body">
            <div class="col-2 col-md-6">
              <table class="table table-borderless table-responsive">
                <tbody>
                  <tr>
                    <td>Nama</td>
                    <td>:</td>
                    <td>{{ $teacher->user->name }}</td>
                  </tr>
                  <tr>
                    <td>NIP</td>
                    <td>:</td>
                    <td>{{ $teacher->user->username }}</td>
                  </tr>
                  <tr>
                    <td>Email</td>
                    <td>:</td>
                    <td>{{ $teacher->user->email }}</td>
                  </tr>
                  <tr>
                    <td>NoTelepon</td>
                    <td>:</td>
                    <td>{{ $teacher->phone }}</td>
                  </tr>
                  <tr>
                    <td>Jenis Kelamin</td>
                    <td>:</td>
                    <td>{{ $teacher->gender }}</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          <div>
            <button type="button" class="btn btn-success" style="--bs-btn-padding-y: 0.25rem; --bs-btn-padding-x: 0.5rem; --bs-btn-font-size: 0.75rem">
              <a href="{{ route('admin.teacher.index') }}">Back</a>
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection