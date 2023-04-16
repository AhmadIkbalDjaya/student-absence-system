<section id="dashboard">
  <div class="container-fluid mb-5">
    <nav class="navbar bg-success fixed-top">
      <div class="container-fluid">
        <button class="navbar-toggler navbar-dark" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel" data-bs-display="push">
          <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Dashboard</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
          </div>
          <div class="offcanvas-body">
            <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
              <div class="card">
                <div class="container">
                  <li class="nav-item">
                    <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" aria-current="page" href="{{ route('home') }}">
                      <i class="bi bi-house-door"></i> Beranda
                    </a>
                  </li>
                </div>
              </div>
              @if (auth()->user()->level == 1)
              <div class="card mt-2">
                <div class="container">
                  <li class="nav-item">
                    <a class="nav-link {{ Request::is('admin/teacher*') ? 'active' : '' }}" aria-current="page" href="{{ route('admin.teacher.index') }}">
                      <i class="bi bi-people"></i> Guru
                    </a>
                  </li>
                </div>
              </div>
              <div class="card mt-2">
                <div class="container">
                  <li class="nav-item">
                    <a class="nav-link {{ Request::is('admin/student*') ? 'active' : '' }}" aria-current="page" href="{{ route('admin.student.index') }}">
                      <i class="bi bi-person"></i> Siswa
                    </a>
                  </li>
                </div>
              </div>
              <div class="card mt-2">
                <div class="container">
                  <li class="nav-item">
                    <a class="nav-link {{ Request::is('admin/claass*') ? 'active' : '' }}" aria-current="page" href="{{ route('admin.claass.index') }}">
                      <i class="bi bi-hospital"></i> Kelas
                    </a>
                  </li>
                </div>
              </div>
              <div class="card mt-2">
                <div class="container">
                  <li class="nav-item">
                    <a class="nav-link {{ Request::is('admin/semester*') ? 'active' : '' }}" aria-current="page" href="{{ route('admin.semester.index') }}">
                      <i class="bi bi-calendar3"></i> Semester
                    </a>
                  </li>
                </div>
              </div>
              <div class="card mt-2">
                <div class="container">
                  <li class="nav-item">
                    <a class="nav-link {{ Request::is('admin/course*') ? 'active' : '' }}" aria-current="page" href="{{ route('admin.course.index') }}">
                      <i class="bi bi-book-half"></i> Mata Pelajaran
                    </a>
                  </li>
                </div>
              </div>
              <div class="card mt-2">
                <div class="container">
                  <li class="nav-item">
                    <a class="nav-link {{ Request::is('admin/recap*') ? 'active' : '' }}" aria-current="page" href="{{ route('admin.recap.index') }}">
                      <i class="bi bi-file-earmark-text"></i> Rekap Absensi
                    </a>
                  </li>
                </div>
              </div>
              @endif
              @if (auth()->user()->level == 0)
              <div class="card mt-2">
                <div class="container">
                  <li class="nav-item">
                    <a class="nav-link {{ Request::is('class*') ? 'active' : '' }}" aria-current="page" href="{{ route('teacher.claass') }}">
                      <i class="bi bi-book-half"></i>Kelas
                    </a>
                  </li>
                </div>
              </div>
              <div class="card mt-2">
                <div class="container">
                  <li class="nav-item">
                    <a class="nav-link {{ Request::is('recap*') ? 'active' : '' }}" aria-current="page" href="{{ route('teacher.recap') }}">
                      <i class="bi bi-file-earmark-text"></i>Rekap
                    </a>
                  </li>
                </div>
              </div>
              @endif
            </ul>
          </div>
        </div>
        <div class="btn-group">
          <button type="button" class="btn dropdown-toggle d-flex align-items-center" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
            <div class="bg-primary rounded-circle me-2 d-flex align-items-center justify-content-center icn-akun">
              {{ ucfirst(substr(auth()->user()->name, 0, 1)) }}
            </div>
          </button>
          <ul class="dropdown-menu dropdown-menu-end">
            <li>
              <button class="dropdown-item">{{ auth()->user()->name }}</button>
              <form action="{{ route('logout') }}" method="post">
                @csrf
                <button type="submit" class="dropdown-item">Logout</button>
              </form>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </div>
</section>