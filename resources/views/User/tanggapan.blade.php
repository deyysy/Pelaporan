@extends('user.layout.app')
@section('content-user')
<section id="hero" class="hero d-flex align-items-center">
</section>

<section id="get-a-quote" class="get-a-quote">
  <div class="container" data-aos="fade-up">
        
    <div class="content shadow">
        <div class="card">
          <div class="card-header fw-bold">
            Pengaduan Anda
          </div>

          <div class="card-body">
            <img src="{{ Storage::url($pengaduan->foto) }}" alt="Gambar" class="gambar-lampiran" width="200">
            <h5 class="card-title mt-2">NIK : {{ $pengaduan->nik }}</h5>
            @if ($pengaduan->status == '0')
            <p class="text-danger">Pending</p>
            @elseif($pengaduan->status == 'proses')
            <p class="text-warning">{{ ucwords($pengaduan->status) }}</p>
            @else
            <p class="text-success">{{ ucwords($pengaduan->status) }}</p>
            @endif
            <p class="light">Tanggal Melapor : {{ $pengaduan->tgl_pengaduan }}</p>
            <p class="light">Isi Laporan Anda : {{ $pengaduan->isi_laporan }}</p>
          </div>
        </div>
    </div>

    <div class="content shadow mt-4">
      <div class="card">
        <div class="card-header fw-bold">
          Tanggapan Petugas
        </div>

        <div class="card-body">
        @if ($tanggapan == null) 
          belum ada tanggapan
        @else
          <p class="mt-3 mb-1">Tanggapan dari : <span>{{ $tanggapan = $pengaduan->nama_petugas }}</span></p>
          <p class="black">{{ $tanggapan->tanggapan }}</p>
        @endif 
        </div>
      </div>
    </div><br> 
    <a href="{{ route('user.laporan') }}" class="btn btn-secondary">Kembali</a>
  </div>
</section>

</div>
@endsection