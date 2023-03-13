@extends('user.layout.app')
@section('title', 'Pelaporan Pengaduan Masyarakat')

@section('content-user')
<section id="hero" class="hero d-flex align-items-center">
  <div class="container">
    <div class="row gy-4 d-flex justify-content-between">
      <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center">
        <h2 data-aos="fade-up">Pelaporan Pengaduan Masyarakat</h2>
        <p data-aos="fade-up" data-aos-delay="100">_________________________________________ <br>
          Situs website untuk menjaga ketertiban dan keamanan dalam masyarakat serta membantu pihak berwenang dalam 
          menangani masalah dan memberikan solusi untuk masyarakat. Dengan adanya pelaporan pengaduan masyarakat, masyarakat 
          dapat ikut serta dalam menjaga lingkungan yang aman dan nyaman untuk hidup dan beraktivitas.
        </p>
        <div class="row gy-4" data-aos="fade-up" data-aos-delay="400">
          <div class="col-lg-4 col-8 ">
            <div class="stats-item text-center w-100 h-100">
              <span class="purecounter">{{ $pengaduan }}</span>
              <p>Laporan Hari Ini</p>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-5 order-1 order-lg-2 hero-img" data-aos="zoom-out">
        <img src="{{ asset('assets/img/hero-img.svg') }}" class="img-fluid mb-3 mb-lg-0" alt="">
      </div>

    </div>
  </div>
</section>

<main id="main">
  {{-- Form Input Pengaduan --}}
  <section id="get-a-quote" class="get-a-quote">
    <div class="container" data-aos="fade-up">

      <div class="row g-0">

        <div class="col-lg-5 quote-bg" style="background-image: url(assets/img/quote-bg.jpg);"></div>

        <div class="col-lg-7">
          @if ($errors->any())
              @foreach ($errors->all() as $error)
                  <div class="alert alert-danger">{{ $error }}</div>
              @endforeach
          @endif

          @if (Session::has('pengaduan'))
              <div class="alert alert-{{ Session::get('type') }}">{{ Session::get('pengaduan') }}</div>
          @endif
          <div class="php-email-form">
            <form action="{{ route('user.store') }}" method="post">
              @csrf
              <h3>Silahkan Ketik Pengaduan Anda Dibawah ini!</h3>
              <div class="row gy-4">
                <div class="col-md-12">
                  <textarea class="form-control" name="isi_laporan" rows="6" placeholder="Belum ada laporan.." 
                    required>{{ old('isi_laporan') }}</textarea>
                </div>
                <div class="col-md-12">
                  <input type="file" class="form-control" name="foto"required>
                </div>
                <button type="submit">Kirim</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>

</main>
@endsection