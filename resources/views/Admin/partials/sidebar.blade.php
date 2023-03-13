<aside class="sidebar-nav-wrapper">
  <div class="navbar-logo">
    <a href="{{ route('dashboard') }}">
      <h4><img src="{{ asset('assets2/images/logo/Artboard2.png') }}" class="icon">  DUMAS</h4>
    </a>
  </div>
  
  <nav class="sidebar-nav">
    <ul>
    <li class="nav-item {{ $page_title == 'Dashboard' ? 'active' : '' }}">
        <a href="{{ route('dashboard') }}">
          <span class="icon">
            <svg width="22" height="22" viewBox="0 0 22 22">
              <path
                d="M17.4167 4.58333V6.41667H13.75V4.58333H17.4167ZM8.25 4.58333V10.0833H4.58333V4.58333H8.25ZM17.4167 11.9167V17.4167H13.75V11.9167H17.4167ZM8.25 15.5833V17.4167H4.58333V15.5833H8.25ZM19.25 2.75H11.9167V8.25H19.25V2.75ZM10.0833 2.75H2.75V11.9167H10.0833V2.75ZM19.25 10.0833H11.9167V19.25H19.25V10.0833ZM10.0833 13.75H2.75V19.25H10.0833V13.75Z"
              />
            </svg>
          </span>
          <span class="text"> Dashboard </span>
        </a>
      </li>
      @if (Auth::guard('admin')->user()->level == 'petugas')
      <li class="nav-item {{ $page_title == 'pengaduan' ? 'active' : '' }}">
        <a href="{{ route('pengaduan.index') }}">
          <span class="icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-exclamation" viewBox="0 0 16 16">
              <path d="M2 2a2 2 0 0 0-2 2v8.01A2 2 0 0 0 2 14h5.5a.5.5 0 0 0 0-1H2a1 1 0 0 1-.966-.741l5.64-3.471L8 9.583l7-4.2V8.5a.5.5 0 0 0 1 0V4a2 2 0 0 0-2-2H2Zm3.708 6.208L1 11.105V5.383l4.708 2.825ZM1 4.217V4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v.217l-7 4.2-7-4.2Z"/>
              <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm.5-5v1.5a.5.5 0 0 1-1 0V11a.5.5 0 0 1 1 0Zm0 3a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0Z"/>
            </svg>
          </span>
          <span class="text"> Pengaduan </span>
        </a>
      </li>
      @else
      <li class="nav-item {{ $page_title == 'masyarakat' ? 'active' : '' }}">
        <a href="{{ route('masyarakat.index') }}">
          <span class="icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
              <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7Zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm-5.784 6A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216ZM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z"/>
            </svg>
          </span>
          <span class="text"> Masyarakat </span>
        </a>
      </li>
      <span class="divider"><hr /></span>
      <li class="nav-item {{ $page_title == 'petugas' ? 'active' : '' }}">
        <a href="{{ route('petugas.index') }}">
          <span class="icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-badge" viewBox="0 0 16 16">
              <path d="M6.5 2a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1h-3zM11 8a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
              <path d="M4.5 0A2.5 2.5 0 0 0 2 2.5V14a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2.5A2.5 2.5 0 0 0 11.5 0h-7zM3 2.5A1.5 1.5 0 0 1 4.5 1h7A1.5 1.5 0 0 1 13 2.5v10.795a4.2 4.2 0 0 0-.776-.492C11.392 12.387 10.063 12 8 12s-3.392.387-4.224.803a4.2 4.2 0 0 0-.776.492V2.5z"/>
            </svg>
          </span>
          <span class="text"> Petugas </span>
        </a>
      </li>
      <li class="nav-item {{ $page_title == 'laporan' ? 'active' : '' }}">
        <a href="{{ route('laporan.index') }}">
          <span class="icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-printer-fill" viewBox="0 0 16 16">
              <path d="M5 1a2 2 0 0 0-2 2v1h10V3a2 2 0 0 0-2-2H5zm6 8H5a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1z"/>
              <path d="M0 7a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2h-1v-2a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v2H2a2 2 0 0 1-2-2V7zm2.5 1a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"/>
            </svg>
          </span>
          <span class="text"> Laporan </span>
        </a>
      </li>
      @endif
    </ul>
  </nav>
</aside>
<div class="overlay"></div>