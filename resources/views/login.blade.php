<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" />

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/login.css') }}" />
  </head>
  <body>
    <section id="login">
      <div class="container-fluid">
        <div class="row justify-content-center">
          <div class="col-6 col-md-2 mt-5">
            <img src="{{ asset('images/logo.png') }}" alt="image" class="img-fluid" />
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
              <p class="m-0">Login</p>
              @if (session()->has('loginError'))
                <p class="text-danger text-center">{{ session('loginError') }}</p>
              @endif
              <form action="{{ route('login.store') }}" method="post">
                @csrf
                <div class="user-box">
                  <input required="" name="username" type="text" class="@error('username') is-invalid @enderror" value="{{ old("username") }}"/>
                  <label>NIP / Username</label>
                  @error('username')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                  @enderror
                </div>
                <div class="user-box">
                  <input required="" name="password" type="password" class="@error('password') is-invalid @enderror"/>
                  <label>Password</label>
                  @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                  @enderror
                </div>
                <button type="submit">
                  <span></span>
                  <span></span>
                  <span></span>
                  <span></span>
                  Submit
                </button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>
