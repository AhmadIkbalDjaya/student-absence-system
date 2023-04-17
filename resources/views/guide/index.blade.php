@extends('layouts.main')

@section('body')
  @include('partials.navbar')
  @include('partials.header')
  
  <section id="tentangkami">
    <div class="container-fluid card shadow">
      <div class="row p-3">
        <div class="col-md-12 text-center">
          <h3>Panduan Pengguna</h3>
        </div>
      </div>
    </div>
  </section>

  <section class="aksi">
    <div class="container-fluid card shadow mt-3 pb-3">
      <div class="row py-5 justify-content-center">
        @if (count($guides) == 0)
          <div class="col-md-6 text-center">
            <h4>Panduan Pengguna Belum Ditambahkan</h4>
          </div>
        @endif
        @foreach ($guides as $guide)
        <div class="col-md-6 text-center">
          <object data="{{ asset('storage/'.$guide->file) }}" type="application/pdf" width="80%" height="250px">
            <p class="text-black">File PDF tidak dapat ditampilkan. 
              <a href="{{ asset('storage/'.$guide->file) }}" download>Klik disini untuk mengunduh file</a>.
            </p>
          </object>
          <br>
          <a href="{{ asset('storage/'.$guide->file) }}" download class="btn btn-primary">Unduh</a>
          @if (auth()->user()->level == 1)
          <form action="{{ route('guide.destroy', ['guide' => $guide->id]) }}" method="post" class="d-inline">
            @method('delete')
            @csrf
            <button type="submit" class="btn btn-danger">Hapus</button>
          </form>
          @endif
        </div>
        @endforeach
      </div>
      @if (auth()->user()->level == 1)
      <div class="row justify-content-center text-center">
        <div class="col-md-12">
          <a href="{{ route('guide.create') }}">
            <button type="button" class="btn btn-success">Tambah</button>
          </a>
        </div>
      </div>
      @endif
    </div>
  </section>
@endsection