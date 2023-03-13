@extends('user.layout.app')
@section('title', 'Pengaduan Saya')

@section('content-user')
<section id="hero" class="hero d-flex align-items-center">
</section><br>

<section id="get-a-quote" class="get-a-quote">
  <div class="container" data-aos="fade-up">
    <div class="cards-styles">
        <div class="row">
            <div class="col-lg-8 col-md-12 col-sm-12 col-10">
                <div class="content shadow">
                    <div class="card-body" >

                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                <div class="alert alert-danger">{{ $error }}</div>
                            @endforeach
                        @endif
            
                        @if (Session::has('pengaduan'))
                            <div class="alert alert-{{ Session::get('type') }}">{{ Session::get('pengaduan') }}</div>
                        @endif
            
                        {{-- Form Pelaporan --}}
                        <div class="card">
                            <div class="card-header text-primary fw-bold">
                                Silahkan ubah laporan Anda disini!
                            </div>
                            <div class="card-body">
                                <form action="{{ route('laporan.update', $pengaduan->id_pengaduan) }}" method="POST">
                                    @csrf
                                    <div class="form-group mt-2">
                                        <textarea name="isi_laporan" placeholder="Masukkan Isi Laporan" class="form-control" rows="4" >{{ $pengaduan->isi_laporan }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="foto">Foto</label>
                                        <input type="file" name="foto" id="foto" class="form-control-file">
                                        <br>
                                        {{-- @if ($pengaduan->foto)
                                            <img src="{{ Storage::url($pengaduan->foto) }}" alt="{{ $pengaduan->judul }}" style="max-width: 200px;">
                                        @endif --}}
                                    </div>
                                    
                                   <button type="submit" class="btn btn-primary mt-4">Update</button>
                                   <a href="{{ route('user.laporan') }}" class="btn btn-secondary mt-4">Kembali</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-12 mt-1 col-sm-12 col-10">
                <div class="content content-bottom shadow">
                    {{-- Profile dengan Username --}}
                    <div class="card bg-primary text-white">
                        <div class="card-body md-5">
                            <h4 class="card-title">
                                <a style="color: #ffffff" >{{ Auth::guard('masyarakat')->user()->nama }}</a>
                            </h4>
                            <p class="card-text">{{ Auth::guard('masyarakat')->user()->username }}</p>
                        </div>
                    </div>

                    {{-- Status Verikasi  --}}
                    <div class="card-body mt-2 ">
                        <div class="row text-center">
                            <div class="col-4">
                                <p class="italic mb-0">Terverifikasi</p>
                                <div class="text-center">
                                    {{-- {{ $hitung[0] }} --}}
                                </div>
                            </div>
                            <div class="col-4">
                                <p class="italic mb-0">Proses</p>
                                <div class="text-center">
                                    {{-- {{ $hitung[1] }} --}}
                                </div>
                            </div>
                            <div class="col-4">
                                <p class="italic mb-0">Selesai</p>
                                <div class="text-center">
                                    {{-- {{ $hitung[2] }} --}}
                                </div>
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