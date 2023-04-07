@extends('layouts.main')

@section('body')
  @include('partials.navbar')
  @include('partials.header')

  <section id="siswa">
    <div class="container-fluid">
        <div class="row text-center my-5">
            <div class="col-md-12">
                <h3>Kelas IPA / IPS</h3>
            </div>
        </div>
    </div>
  </section>

  <section id="kelas">
    <div class="container-fluid mt-3">
      <div class="row justify-content-center">
        <div class="col-md-6 card">
          <h4 class="text-center card-header">IPA</h4>
          <div class="card-body">
            <strong>Kelas :</strong>
            <div class="row my-3">
              <div class="col-md-12 text-center">
                @foreach ($IPAclaasses as $claass)
                <button class="btn btn-success collapse-button" type="button" data-bs-toggle="collapse" data-bs-target="#class{{ $claass->id }}" aria-expanded="false" aria-controls="class{{ $claass->id }}">
                  {{ $claass->class_name }}
                </button>
                @endforeach
              </div>
              <div class="col-md-12 mt-3">
                @foreach ($IPAclaasses as $claass)
                <div class="collapse" id="class{{ $claass->id }}">
                  <div class="card card-body">
                    <p class="p-0"> {{ $claass->class_name }} </p>
                    <div>
                      @foreach ($claass->course as $userCourse)
                          @if ($userCourse->teacher_id == 1)
                            <a href="/class/course/{{ $userCourse->id }}" class="btn btn-success d-block mb-3">
                              {{ $userCourse->course_name }}
                            </a>
                          @endif
                      @endforeach
                    </div>
                  </div>
                </div>
                @endforeach
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row justify-content-center my-3">
        <div class="col-md-6 card">
          <h4 class="text-center card-header">IPS</h4>
          <div class="card-body">
            <strong>Kelas :</strong>
            <div class="row my-3">
              <div class="col-md-12 text-center">
                @foreach ($IPSclaasses as $claass)
                <button class="btn btn-success collapse-button" type="button" data-bs-toggle="collapse" data-bs-target="#class{{ $claass->id }}" aria-expanded="false" aria-controls="class{{ $claass->id }}">
                  {{ $claass->class_name }}
                </button>
                @endforeach
              </div>
              <div class="col-md-12 mt-3">
                @foreach ($IPSclaasses as $claass)
                <div class="collapse" id="class{{ $claass->id }}">
                  <div class="card card-body">
                    <p class="p-0"> {{ $claass->class_name }} </p>
                    <div>
                      @foreach ($claass->course as $userCourse)
                          @if ($userCourse->teacher_id == 1)
                            <a href="/class/course/{{ $userCourse->id }}" class="btn btn-success d-block mb-3">
                              {{ $userCourse->course_name }}
                            </a>
                          @endif
                      @endforeach
                    </div>
                  </div>
                </div>
                @endforeach
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection

@push('script')
  <script src="/js/user-course.js"></script>
@endpush