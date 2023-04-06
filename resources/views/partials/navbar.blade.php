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
                    <a class="nav-link active" aria-current="page" href="/"><i class="bi bi-house-door"></i> Beranda</a>
                  </li>
                </div>
              </div>
              <div class="card mt-2">
                <div class="container">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/admin/semester"><i class="bi bi-people"></i> Semester</a>
                  </li>
                </div>
              </div>
              <div class="card mt-2">
                <div class="container">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/admin/teacher"><i class="bi bi-people"></i> Guru</a>
                  </li>
                </div>
              </div>
              <div class="card mt-2">
                <div class="container">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/admin/student"><i class="bi bi-person"></i> Siswa</a>
                  </li>
                </div>
              </div>
              <div class="card mt-2">
                <div class="container">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/admin/claass"><i class="bi bi-hospital"></i> Kelas</a>
                  </li>
                </div>
              </div>
              <div class="card mt-2">
                <div class="container">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="rekapan.html"><i class="bi bi-book-half"></i> Mata Pelajaran</a>
                  </li>
                </div>
              </div>
            </ul>
          </div>
        </div>
        <div class="btn-group">
          <button type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
            <img src="/images/user.png" alt="img" class="img-fluid rounded-circle" width="35" />
          </button>
          <ul class="dropdown-menu dropdown-menu-end">
            <li>
              <button class="dropdown-item logout" type="button"><a href="/index.html">Logout</a></button>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </div>
</section>