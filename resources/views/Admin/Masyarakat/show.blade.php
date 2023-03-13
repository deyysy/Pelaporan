@extends('admin.layout.app')
@section('title', 'Masyarakat')

@section('main_content')

<section class="card-components">
  <div class="container-fluid">
    <!-- ========== title-wrapper start ========== -->
    <div class="title-wrapper pt-30">
      <div class="row align-items-center">
        <div class="col-md-6">
          <div class="title mb-30">
            <h2>Detail Masyarakat</h2>
          </div>
        </div>
        <div class="col-6">
          <div class="breadcrumb-wrapper mb-30">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <a href="{{ route('masyarakat.index') }}">Masyarakat</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                  Dumas
                </li>
              </ol>
            </nav>
          </div>
        </div>
        <!-- end col -->
      </div>
      <!-- end row -->
    </div>
    <!-- ========== title-wrapper end ========== -->

    <!-- ========== cards-styles start ========== -->
    <div class="cards-styles">
      <div class="row">
        
        {{-- Card Pengaduan --}}
        <div class="col-lg-6 col-12">
          <div class="card-style-2 mb-30">
            <div class="card-image">
              <table class="table">
                  <tbody>
                    <tr>
                      <th>NIK</th>
                      <td>:</td>
                      <td>{{ $masyarakat->nik }}</td>
                    </tr>
                    <tr>
                      <th>Nama</th>
                      <td>:</td>
                      <td>{{ $masyarakat->nama }}</td>
                    </tr>
                    <tr>
                      <th>Username</th>
                      <td>:</td>
                      <td>{{ $masyarakat->username }}</td>
                    </tr>
                    <tr>
                      <th>Telp</th>
                      <td>:</td>
                      <td>{{ $masyarakat->telp }}</td>
                    </tr>
                  </tbody>
              </table>
            </div>
          </div>
        </div>
        <!-- end col -->

        <div class="col-lg-6 col-12">
          <div class="card-style-2 mb-30">
            <div class="card-image">
              {{-- Verikasi status --}}
              <div class="row text-center">
                <div class="col-4">
                    <p class="italic mb-0">Terverifikasi</p>
                    <div class="text-center">
                        {{ $hitung[0] }}
                    </div>
                </div>
                <div class="col-4">
                    <p class="italic mb-0">Proses</p>
                    <div class="text-center">
                        {{ $hitung[1] }}
                    </div>
                </div>
                <div class="col-4">
                    <p class="italic mb-0">Selesai</p>
                    <div class="text-center">
                        {{ $hitung[2] }}
                    </div>
                </div>
            </div>
            </div>
          </div>
        </div>
    </div>
  </div>
</section>
@endsection