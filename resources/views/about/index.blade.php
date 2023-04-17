@extends('layouts.main')

@section('body')
  @include('partials.navbar')
  @include('partials.header')
  
  <section id="tentangkami">
    <div class="container-fluid card shadow">
      <div class="row p-3">
        <div class="col-md-12 text-center">
          <h3>Tentang Kami</h3>
        </div>
      </div>
    </div>
  </section>

  <section class="section">
    <div class="container-fluid card shadow my-3">
      <div class="row justify-content-center py-5">
        @if (count($abouts) == 0)
          <div class="col-md-4 text-center">
            <h4>Tentang Kami Belum Diisi</h4>
          </div>
        @endif
        @foreach ($abouts as $about)
        <div class="col-md-4">
          <div class="card" style="">
            <img src="{{ asset('storage/'.$about->image) }}" class="card-img-top" alt="about">
            <div class="card-body">
              <h5 class="card-title">{{ $about->description }}</h5>
              @if (auth()->user()->level == 1)
              <a href="{{ route('about.edit', ['about' => $about->id]) }}" class="">
                <span type="button" class="badge text-bg-warning">Edit Profil</span>
              </a>
              <!-- Button trigger modal delete -->
              <a href="" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $about->id }}">
                <span class="badge text-bg-danger">Hapus</span>
              </a>

              <!-- Modal delete -->
              <div class="modal fade" id="deleteModal{{ $about->id }}" tabindex="-1" aria-labelledby="deleteModal{{ $about->id }}Label" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="deleteModal{{ $about->id }}Label">Konfirmasi Hapus</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <form action="{{ route('about.destroy', ['about' => $about->id]) }}" method="post" class="d-inline">
                        @method("delete")
                        @csrf
                        Yakin Ingin Menghapus {{ $about->description }}
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button class="btn btn-danger text-bg-danger border-0">Delete</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
              @endif
            </div>
          </div>
        </div>
        @endforeach
      </div>
      @if (auth()->user()->level == 1)
      <div class="row my-3">
        <div class="col-md-6">
          <a href="{{ route('about.create') }}">
            <button type="button" class="btn btn-success">Tambah</button>
          </a>
        </div>
      </div>
      @endif
    </div>
  </section>
@endsection