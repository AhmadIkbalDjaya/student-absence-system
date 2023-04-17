@extends('layouts.main')

@section('body')
  @include('partials.navbar')
  @include('partials.header')

  <div id="section">
    <div class="container-fluid card shadow">
      <div class="row p-3">
        <div class="col-md-12">
          <h3>Kelas</h3>
          <p>Tambah, Edit atau hapus Kelas</p>
        </div>
        <div class="col-md-4">
          <a href="{{ route('admin.claass.create') }}">
            <button type="button" class="btn btn-success">Tambah Kelas</button>
          </a>
        </div>
      </div>
    </div>
  </div>
  <div id="liveAlertPlaceholder"></div>

  @include('partials.alerts')

  <div class="section">
    <div class="container-fluid card shadow my-3">
      <div class="row">
        <div class="col-md-12 p-4">
          <div class="table-responsive">
            @if (count($claasses) == 0)
              <div class="col-md-12 text-center">
                <h4>Belum Ada Mata Pelajaran</h4>
              </div>
            @else
              <table class="table table-bordered text-center">
                <thead>
                  <tr>
                    <th class="col-md-0">No</th>
                    <th class="col-md-3" style="white-space: nowrap">Nama Kelas</th>
                    <th class="col-md-3">Kelas</th>
                    <th class="col-md-1">Jurusan</th>
                    <th class="col-md-4">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($claasses as $claass)
                    <tr>
                      <th scope="row">{{ $loop->iteration }}</th>
                      <td style="white-space: nowrap">{{ $claass->class_name }}</td>
                      <td>{{ $claass->class_level }}</td>
                      <td>{{ $claass->major }}</td>
                      <td class="d-flex justify-content-center">
                        <a href="{{ route('admin.claass.edit', ['claass' => $claass->id]) }}" class="me-1">
                          <span class="badge text-bg-warning">Edit Kelas</span>
                        </a>
                        <!-- Button trigger modal delete -->
                        <a href="" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $claass->id }}">
                          <span class="badge text-bg-danger">Hapus</span>
                        </a>

                        <!-- Modal delete -->
                        <div class="modal fade" id="deleteModal{{ $claass->id }}" tabindex="-1" aria-labelledby="deleteModal{{ $claass->id }}Label" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h1 class="modal-title fs-5" id="deleteModal{{ $claass->id }}Label">Konfirmasi Hapus</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                <form action="{{ route('admin.claass.destroy', ['claass' => $claass->id]) }}" method="post" class="d-inline">
                                  @method("delete")
                                  @csrf
                                  Yakin Ingin Menghapus Kelas {{ $claass->class_name }}
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
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection