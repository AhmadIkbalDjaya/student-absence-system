@extends('layouts.main')

@section('body')
  @include('partials.navbar')
  @include('partials.header')

  <div id="section">
    <div class="container-fluid card shadow">
      <div class="row p-3">
        <div class="col-md-12">
          <h3>Siswa</h3>
          <p>Tambah, Edit atau hapus Siswa</p>
        </div>
        <div class="col-md-4">
          <a href="{{ route('admin.student.create') }}">
            <button type="button" class="btn btn-success">Tambah Siswa</button>
          </a>
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
                  <th class="col-md-0">No.</th>
                  <th class="col-md-4">NISN</th>
                  <th class="col-md-4" style="white-space: nowrap">Nama</th>
                  <th class="col-md-4">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($students as $student)
                  <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $student->nis }}</td>
                    <td style="white-space: nowrap">{{ $student->name }}</td>
                    <td class="d-flex justify-content-center">
                      <a href="{{ route('admin.student.show', ['student' => $student->id]) }}">
                        <span class="badge text-bg-info me-1">Informasi</span>
                      </a>
                      <a href="{{ route('admin.student.edit', ['student' => $student->id]) }}">
                        <span class="badge text-bg-warning me-1">Edit User</span>
                      </a>

                      <!-- Button trigger modal delete -->
                      <a href="" class="" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $student->id }}">
                        <span class="badge text-bg-danger me-1">Hapus</span>
                      </a>

                      <!-- Modal delete -->
                      <div class="modal fade" id="deleteModal{{ $student->id }}" tabindex="-1" aria-labelledby="deleteModal{{ $student->id }}Label" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h1 class="modal-title fs-5" id="deleteModal{{ $student->id }}Label">Konfirmasi Hapus</h1>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              <form action="{{ route('admin.student.destroy', ['student' => $student->id]) }}" method="post" class="d-inline">
                                @method("delete")
                                @csrf
                                Yakin Ingin Menghapus {{ $student->name }}
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
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