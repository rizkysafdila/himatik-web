<nav class="navbar navbar-expand-lg navbar-light py-3">
  <div class="container py-2">
    <a class="navbar-brand" href="/">
      <img src="{{ asset('img/himatik-type.png') }}" alt="Himatik PNL" height="30">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav navigations ms-auto">
        <li class="nav-item ms-3">
          <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="/">Home</a>
        </li>
        <li class="nav-item ms-3">
          <a class="nav-link {{ Request::is('posts*') ? 'active' : '' }}" href="/posts">Blog</a>
        </li>
        <li class="nav-item ms-3">
          <a class="nav-link {{ Request::is('videos*') ? 'active' : '' }}" href="/videos">Videos</a>
        </li>
      </ul>
    </div>
  </div>
</nav>