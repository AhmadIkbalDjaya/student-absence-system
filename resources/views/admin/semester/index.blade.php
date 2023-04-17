@extends('layouts.main')

@section('body')
@include('partials.navbar')
@include('partials.header')

<div id="section">
  <div class="container-fluid card shadow">
    <div class="row p-3 justify-content-between">
      <div class="col-md-12">
        <h3>Semester</h3>
        <p>Tambah, Edit atau hapus Semester</p>
      </div>
      <div class="col-md-4">
        <a href="{{ route('admin.semester.create') }}">
          <button type="button" class="btn btn-success">Tambah Semester</button>
        </a>
      </div>
      <div class="col-md-6 my-2">
        <form action="{{ route('admin.semester.change') }}" method="post">
          @csrf
          <label for="active-semester">Semester Aktif: </label>
          <select name="active_id" id="active-semester">
            @foreach ($semesters as $semester)
              <option value="{{ $semester->id }}" {{ $semester->is_active == "1" ? "selected" : "" }}>
                {{ $semester->start_year }} / {{ $semester->end_year }} 
                @if ($semester->odd_even == 1)
                  (Ganjil)
                @else
                  (Genap)
                @endif
              </option>
            @endforeach
          </select>
          <button type="submit" class="btn btn-success">Ubah Semester</button>
        </form>
      </div>
    </div>
  </div>
</div>

@include('partials.alerts')

<div class="section">
  <div class="container-fluid card shadow my-3">
    <div class="row">
      <div class="col-md-12 p-4">
        <div class="table-responsive">
          <table class="table table-bordered text-center">
            <thead>
              <tr>
                <th class="col-md-0">No</th>
                <th class="col-md-4" style="white-space: nowrap">Tahun Ajaran</th>
                <th class="col-md-2">Semester</th>
                <th class="col-md-2" style="white-space: nowrap">Status</th>
                <th class="col-md-4">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($semesters as $semester)
                <tr>
                  <th scope="row">{{ $loop->iteration }}</th>
                  <td style="white-space: nowrap">{{ $semester->start_year }}/{{ $semester->end_year }}</td>
                  <td>
                    @if ($semester->odd_even == 1)
                      Ganjil  
                    @else
                      Genap
                    @endif
                  </td>
                  <td style="white-space: nowrap">
                    @if ($semester->is_active == 1)
                      <i class="fa fa-check text-success"></i> Aktif
                    @else
                      <i class="fa fa-times text-danger"></i> Nonaktif
                    @endif
                  </td>
                  <td>
                    <!-- Button trigger modal delete -->
                    <a href="" class="" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $semester->id }}">
                      <span class="badge text-bg-danger">
                        Hapus
                      </span>
                    </a>

                    <!-- Modal delete -->
                    <div class="modal fade" id="deleteModal{{ $semester->id }}" tabindex="-1" aria-labelledby="deleteModal{{ $semester->id }}Label" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h1 class="modal-title fs-5" id="deleteModal{{ $semester->id }}Label">Konfirmasi Hapus</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <form action="{{ route('admin.semester.destroy', ['semester' => $semester->id]) }}" method="post" class="d-inline">
                              @method("delete")
                              @csrf
                              Yakin Ingin Menghapus Semester
                              @if ($semester->odd_even == 1)
                                (Ganjil)  
                              @else
                                (Genap)
                              @endif
                              {{ $semester->start_year }}/{{ $semester->end_year }}
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                              <button class="btn btn-danger text-bg-danger border-0">Delete</button>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection