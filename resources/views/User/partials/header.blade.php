<header id="header" class="header d-flex align-items-center fixed-top">
  <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

    <a href="index.html" class="logo d-flex align-items-center">
      <h1>Dumas</h1>
    </a>

    <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
    <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
    <nav id="navbar" class="navbar">

      @if (Auth::guard('masyarakat')->check())
      <ul>
        <li>
          <a class="get-a-quote" href="{{ route('user.laporan') }}">Laporan</a>
        </li>
        <li class="dropdown">
          <a href=""><span>{{ Auth::guard('masyarakat')->user()->nama }}</span>
            <i class="bi bi-chevron-down"></i>
            <ul>
              <li><a href="{{ route('user.logout') }}">Logout</a></li>
            </ul>
         </a>
        </li>
      </ul>
      @else

      <ul>
        <li><a class="get-a-quote" href="/login/user">Masuk</a></li>
        <li><a class="get-a-quote" href="{{ route('user.Formregister') }}">Daftar</a></li>
      </ul>
      @endauth
    </nav>
  </div>
</header>

