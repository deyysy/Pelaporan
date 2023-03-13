<header class="header">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-5 col-md-5 col-6">
        <div class="header-left d-flex align-items-center">
          <div class="menu-toggle-btn mr-20">
            <button id="menu-toggle" class="main-btn primary-btn btn-hover">
              <i class="lni lni-chevron-left me-2"></i> Menu
            </button>
          </div>
        </div>
      </div>
      <div class="col-lg-7 col-md-7 col-6">
        <div class="header-right">
          <div class="profile-box ml-15">
            <button class="dropdown-toggle bg-transparent border-0" type="button"
                 id="profile" data-bs-toggle="dropdown" aria-expanded="false" >
              <div class="profile-info">
                <div class="info">
                  {{ Auth()->guard('admin')->user()->nama_petugas }}
                  <div class="image">
                    <img src="{{ asset('assets2/images/profile/profile-1.png') }}" alt="" />
                  </div>
                </div>
              </div>
              <i class="lni lni-chevron-down"></i>
            </button>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profile">
              <li>
                @auth
                <a href="">{{ Auth()->guard('admin')->user()->nama_petugas }}</a>
                @else
                <a href="{{ route('auth.logout') }}"> <i class="lni lni-exit"></i> Log Out </a>
                @endauth
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</header>