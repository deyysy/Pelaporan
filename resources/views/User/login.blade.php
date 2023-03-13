@extends('user.layout.app-reg')
@section('title-auth', 'Login')

@section('form-register')
<section class="signin-section">
  <div class="container-fluid">
    <div class="row g-0 auth-row">
      <div class="col-lg-6">
        <div class="auth-cover-wrapper bg-primary-100">
          <div class="auth-cover">
            <div class="title text-center">
              <h1 class="text-primary mb-10">Login</h1>
              <p class="text-medium">
                Pelaporan Pengaduan Masyarakat
              </p>
            </div>
            <div class="cover-image">
              <img src="{{ asset('assets2/images/auth/signin-image.svg') }}" alt="" />
            </div>
            <div class="shape-image">
              <img src="{{ asset('assets/images/auth/shape.svg') }}" alt="" />
            </div>
          </div>
        </div>
      </div>

      {{-- Form Register --}}
      <div class="col-lg-6">
        <div class="signup-wrapper">
          <div class="form-wrapper">
            <form action="{{ route('user.Login') }}" method="post">
              {{ csrf_field() }}
              <div class="row">
                <div class="col-12">
                  <div class="input-style-1">
                    <label>Username</label>
                    <input type="username" name="username" placeholder="Username" />
                  </div>
                </div>
                <div class="col-12">
                  <div class="input-style-1">
                    <label>Password</label>
                    <input type="password" name="password" placeholder="********" />
                  </div>
                </div>
                <div class="col-6">
                  <div class="button-group d-flex justify-content-center flex-wrap">
                    <a href="{{ route('user.landing') }}" class=" main-btn primary-btn btn-hover w-100 text-center">
                      Kembali
                    </a>
                  </div>
                </div>
                <div class="col-6">
                  <div class="button-group d-flex justify-content-center flex-wrap">
                    <button class=" main-btn primary-btn btn-hover w-100 text-center">
                      Kirim
                    </button>
                  </div>
                </div>
              </div>
              <!-- end row -->
            </form>
          </div>

          {{-- Alert --}}
          @if (Session::has('pesan'))
            <div class="alert alert-info mt-2" role="alert">
                {{ Session::get('pesan') }}
            </div>
          @endif
          
        </div>
      </div>
    </div>
    <!-- end row -->
  </div>
</section>
@endsection