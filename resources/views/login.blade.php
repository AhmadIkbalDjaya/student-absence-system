@extends('layouts.main')
@push('style')
  <link rel="stylesheet" href="/css/login.css">
@endpush

@section('body')
<section id="login">
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-6 col-md-2 mt-5">
        <img src="/images/logo.png" alt="image" class="img-fluid" />
      </div>
    </div>
    <div class="row justify-content-center">
      <div class="col-md-9 text-center text-white">
        <h1>SISTEM ABSENSI SMAN 17 GOWA</h1>
      </div>
    </div>
    <div class="row justify-content-center">
      <div class="col-11 col-md-5">
        <div class="login-box">
          <p>Login</p>
          <form>
            <div class="user-box">
              <input required="" name="" type="text" />
              <label>Email</label>
            </div>
            <div class="user-box">
              <input required="" name="" type="password" />
              <label>Password</label>
            </div>
            <a href="#">
              <span></span>
              <span></span>
              <span></span>
              <span></span>
              Submit
            </a>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection