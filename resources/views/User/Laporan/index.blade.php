@extends('user.layout.app')
@section('title', 'Pengaduan Saya')

@section('content-user')
<style type="text/css">
    .pagination li{
        float: left;
        list-style-type: none;
        margin:5px;
    }
</style>
<section id="hero" class="hero d-flex align-items-center">
</section>

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
                                Silahkan tulis laporan Anda disini !
                            </div>
                            <div class="card-body">
                                <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group mt-2">
                                        <textarea name="isi_laporan" placeholder="Masukkan Isi Laporan" class="form-control"
                                            rows="4">{{ old('isi_laporan') }}</textarea>
                                    </div>
                                    <div class="form-group mt-2">
                                        <input type="file" name="foto" class="form-control">
                                    </div>
                                    
                                   <button type="submit" class="btn btn-primary mt-4">KIRIM</button>
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
            
    
        {{-- Tab  Review --}}
        <div class="row mt-5">
          <div class="col-lg-12 ">
              <a class="d-inline tab  {{ $pengguna != 'saya' ? 'tab-activce' : ''}} mr-4 text-primary" href="{{ route('user.laporan') }}">
                  Semua
              </a> |
              <a class="d-inline tab {{ $pengguna == 'saya' ? 'tab-active' : ''}} text-primary" href="{{ route('user.laporan', 'saya') }}">
                  Laporan Saya
              </a>
              <hr>
          </div>
        </div>

        @foreach ($pengaduan as $data => $d)
          <div class="col-lg-12">
              <div class="laporan-top">
                  <div class="d-flex justify-content-between">
                      <div>
                          <p>{{ $d->nik }}</p>
                          @if ($d->status == '0')
                            <p class="text-danger">Pending</p>
                          @elseif($d->status == 'proses')
                            <p class="text-warning">{{ ucwords($d->status) }}</p>
                          @else
                            <p class="text-success">{{ ucwords($d->status) }}</p>
                          @endif
                      </div>
                      <div>
                          <p>{{ $d->tgl_pengaduan }}</p>
                          {{-- Fitur Hapus --}}
                          <div class="row ">
                            <div class="col-3">
                                <a href="{{ route('user.tanggapan', $d->id_pengaduan) }}" class="btn btn-outline-info" data-toggle="tooltip" data-placement="top" title="Lihat Detail">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                        <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                                        <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                                    </svg>
                                </a>
                            </div>
                            {{-- <div class="col-3">
                                <a href="{{ route('laporan.edit', $d->id_pengaduan) }}" class="btn btn-outline-primary mb-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                        <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                                    </svg>
                                </a>
                            </div>
                            <div class="col-3">
                                <form method="POST" action="{{ route('laporan.delete', $d->id_pengaduan) }}" id="delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-outline-danger" id="delete-button">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                            <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                                        </svg>
                                    
                                    </button>
                                </form>
                            </div> --}}
                          </div>
                      </div>
                  </div>
              </div>
              
              <div class="laporan-mid">
                <div class="judul-laporan">
                  {{ $d->judul_laporan }}
                </div>
                <p class="fw-bold">{{ $d->isi_laporan }}</p> 
              </div>

              <div class="laporan-bottom">
                  <div class="card mb-3" style="width: 18rem;">
                    @if ($d->foto != null)
                    <img src="{{ Storage::url($d->foto) }}" alt="{{ 'Gambar '.$d->judul_laporan }}" class="gambar-lampiran">
                    @endif
             
                     @if ($d->tanggapan != null) 
                     belum ada tanggapan
                     @else
                    <p class="mt-3 mb-1">Tanggapan dari : <span></span>{{ $d->nama_petugas }}</p>
                    <p class="black">{{ $d->tanggapan }}</p>
                    @endif 
                  </div>    
              </div>

              </div>
              <hr>
          </div>
        @endforeach
    </div>
  </div>
</section>
<div class="text-center">
    {{$asdf->links()}}
</div>

{{-- Sweet Alert --}}
<script type="text/javascript">
document.querySelector('#delete-button').addEventListener('click', function() {
    Swal.fire({
        title: 'Konfirmasi Hapus Laporan',
        text: 'Apakah Anda yakin ingin menghapus laporan ini?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Ya, hapus laporan',
        cancelButtonText: 'Batalkan'
        }).then((result) => {
        if (result.isConfirmed) {
        // Tindakan yang akan diambil jika konfirmasi diterima
        // Submit form penghapusan data di sini
        document.querySelector('#delete-form').submit();
        }
    })
});
</script>
@endsection
