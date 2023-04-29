<nav class="navbar navbar-expand-lg navbar-light py-3">
    <div class="container py-2">
        <a class="navbar-brand"
           href="/">
            <img src="{{ asset('img/himatik-type.png') }}"
                 alt="Himatik PNL"
                 height="30">
        </a>
        <button class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarNav"
                aria-controls="navbarNav"
                aria-expanded="false"
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse"
             id="navbarNav">
            <ul class="navbar-nav navigations ms-auto">
                <li class="nav-item ms-3">
                    <a class="nav-link {{ Request::is('/') ? 'active' : '' }}"
                       href="/">Home</a>
                </li>
                <li class="nav-item ms-3">
                    <a class="nav-link {{ Request::is('posts*') ? 'active' : '' }}"
                       href="/posts">Blog</a>
                </li>
                <li class="nav-item ms-3">
                    <a class="nav-link {{ Request::is('videos*') ? 'active' : '' }}"
                       href="/videos">Videos</a>
                </li>
                @auth
                    <div class="dropdown dropstart ms-3">
                        <a class="link-dark text-decoration-none shadow"
                           href="#"
                           role="button"
                           id="dropdownMenuLink"
                           data-bs-toggle="dropdown"
                           aria-expanded="false">
                            <img class="rounded-3"
                                 src="{{ asset('img/avatar.png') }}"
                                 alt="{{ auth()->user()->name }}"
                                 width="36px"
                                 height="36px">
                        </a>

                        <ul class="dropdown-menu p-2 mt-5 ms-5"
                            aria-labelledby="dropdownMenuLink">
                            <li>
                                <a href="{{ route('dashboard') }}"
                                   class="dropdown-item">
                                    <i class="fa-duotone fa-home me-2 mb-2"></i>
                                    Dashboard
                                </a>
                                <form action="/logout"
                                      method="post">
                                    @csrf
                                    <button type="submit"
                                            class="dropdown-item">
                                        <i class="fa-duotone fa-arrow-right-from-bracket me-2"></i>
                                        Logout
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                @endauth
            </ul>
        </div>
    </div>
</nav>
