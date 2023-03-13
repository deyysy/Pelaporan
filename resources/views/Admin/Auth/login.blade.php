@extends('admin.auth.layout.app')
@section('main_auth')
<section class="signin-section">
  <div class="container-fluid">
    <div class="row g-0 auth-row">
      <div class="col-lg-6">
        <div class="auth-cover-wrapper bg-primary-100">
          <div class="auth-cover">
            <div class="title text-center">
              <h1 class="text-primary mb-10">DUMAS</h1>
              <p class="text-medium">
                Pelaporan Pengaduan Masyarakat
              </p>
            </div>
            <div class="cover-image">
              <img src="{{ asset('assets2/images/auth/signin-image.svg') }}" alt="" />
            </div>
            <div class="shape-image">
              <img src="{{ asset('assets2/images/auth/shape.svg') }}" alt="" />
            </div>
          </div>
        </div>
      </div>
      <!-- end col -->
      <div class="col-lg-6">
        <div class="signin-wrapper">
          <div class="form-wrapper">
            <form action="{{ route('auth.loginAdmin') }}" method="POST">
              {{ csrf_field() }}
              <div class="row">
                <div class="col-12">
                  <div class="input-style-1">
                    <label>Username</label>
                    <input type="Username" name="username" placeholder="Username" />
                  </div>
                </div>
                <!-- end col -->
                <div class="col-12">
                  <div class="input-style-1">
                    <label>Password</label>
                    <input type="password" name="password" placeholder="Password" />
                  </div>
                </div>
                <!-- end col -->
                <div class="col-12">
                  <div class=" button-group d-flex justify-content-center flex-wrap">
                  <button class="main-btn primary-btn btn-hover w-100 text-center">
                      Sign In
                    </button>
                  </div>
                </div>
              </div>
              <!-- end row -->
            </form>
          </div>

          {{-- Alert --}}
          @if (Session::has('pesan'))
            <div class="alert alert-info" role="alert">
                {{ Session::get('pesan') }}
            </div>
          @endif

        </div>
      </div>
      <!-- end col -->
    </div>
    <!-- end row -->
  </div>
</section>
@endsection