<nav class="p-3">
  <div class="brand text-center">
    <img class="py-2 py-md-3" src="{{ asset('img/himatik-type.png') }}" alt="Himatik PNL">
  </div>
  <div class="position-sticky mt-3">
    <ul class="nav flex-column">
      <li class="nav-item my-1">
        <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" href="/dashboard">
          <i class="fa-duotone fa-grid-2 px-md-1 px-lg-3 py-2"></i>
          Dashboard
        </a>
      </li>
      <li class="nav-item my-1">
        <a class="nav-link {{ Request::is('dashboard/officials*') ? 'active' : '' }}" href="/dashboard/officials">
          <i class="fa-duotone fa-user-tie fa-lg px-md-1 px-lg-3 py-2"></i>
          Jabatan
        </a>
      </li>
      <li class="nav-item my-1">
        <a class="nav-link {{ Request::is('dashboard/members*') ? 'active' : '' }}" href="/dashboard/members">
          <i class="fa-duotone fa-user-group fa-sm px-md-1 px-lg-3 py-2"></i>
          Anggota
        </a>
      </li>
      <li class="nav-item my-1">
        <a class="nav-link {{ Request::is('dashboard/posts*') ? 'active' : '' }}" href="/dashboard/posts">
          <i class="fa-duotone fa-file-lines fa-lg px-md-1 px-lg-3 py-2"></i>
          Postingan
        </a>
      </li>
      <li class="nav-item my-1">
        <a class="nav-link {{ Request::is('dashboard/videos*') ? 'active' : '' }}" href="/dashboard/videos">
          <i class="fa-duotone fa-circle-play px-md-1 px-lg-3 py-2"></i>
          Video
        </a>
      </li>
      <li class="nav-item my-1">
        <a class="nav-link {{ Request::is('dashboard/committee*') ? 'active' : '' }}" href="/dashboard/committee">
          <i class="fa-duotone fa-calendar-lines-pen px-md-1 px-lg-3 py-2"></i>
          Kepanitiaan
        </a>
      </li>
    </ul>

    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-md-1 px-lg-3 mt-4 mb-1 text-muted">
      <span>Other</span>
    </h6>
    <ul class="nav flex-column">
      <li class="nav-item">
        <a class="nav-link {{ Request::is('dashboard/settings*') ? 'active' : '' }}" href="/dashboard/settings">
          <i class="fa-duotone fa-gear px-md-1 px-lg-3 py-2"></i>
          Pengaturan
        </a>
      </li>
    </ul>
  </div>
</nav>
