@extends('admin.layout.app')
@section('title', 'Pengaduan')

@section('main_content')
<section class="card-components">
  <div class="container-fluid">
    <!-- ========== title-wrapper start ========== -->
    <div class="title-wrapper pt-30">
      <div class="row align-items-center"><div class="row align-items-center">
        <div class="col-md-6">
          <div class="title mb-30">
            <h2>Pengaduan Masyarakat</h2>
          </div>
        </div>
        <div class="col-6">
          <div class="breadcrumb-wrapper mb-30">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <a href="{{ route('pengaduan.index') }}">Pengaduan</a>
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
                      <td>{{ $pengaduan->nik }}</td>
                    </tr>
                    <tr>
                        <th>Tanggal Pengaduan</th>
                        <td>:</td>
                        <td>{{ $pengaduan->tgl_pengaduan }}</td>
                    </tr>
                    <tr>
                        <th>Foto</th>
                        <td>:</td>
                        <td><img src="{{ Storage::url($pengaduan->foto) }}" alt="Foto Pengaduan" class="embed-responsive" style="image-width: 0px"></td>
                    </tr>
                    <tr>
                      <th>Isi Laporan</th>
                      <td>:</td>
                      <td>{{ $pengaduan->isi_laporan }}</td>
                    </tr>
                    <tr>
                      <th>Status</th>
                      <td>:</td>
                      <td>
                          @if ($pengaduan->status == '0')
                              <span class="status-btn info-btn">Pending</span>
                          @elseif($pengaduan->status == 'proses')
                              <span class="status-btn active-btn">Proses</span>
                          @else
                              <span class="status-btn success-btn">Done</span>
                          @endif
                      </td>
                    </tr>
                  </tbody>
              </table>
              <a href="#0">
                <img
                  src="assets/images/cards/card-style-2/card-1.jpg"
                  alt=""
                />
              </a>
            </div>
          </div>
        </div>
        <!-- end col -->

        {{-- Card Tanggapan Petugas --}}
        <div class="col-lg-6 col-12">
          <div class="card-style-2 mb-30">
            <div class="card-header">
              <div class="text-center">
                <h5>Tanggapan Petugas</h5>
              </div>
            </div><br>
            {{-- Form Tanggapan --}}
            <div class="card-body">
              <form action="{{ route('tanggapan.createORupdate') }}" method="post">
                @csrf
                <input type="hidden" name="id_pengaduan" value="{{ $pengaduan->id_pengaduan }}">
                <div class="form-group">
                  <label for="status">Status</label>
                  <div class="input-group mb-3">
                    <div class="select-position">
                      <select name="status" id="status">
                        @if ($pengaduan->status == '0')
                            <option selected value="0">Pending</option>
                            <option value="proses">Proses</option>
                            <option value="selesai">Selesai</option>
                        @elseif($pengaduan->status == 'proses')
                            <option value="0">Pending</option>
                            <option selected value="proses">Proses</option>
                            <option value="selesai">Selesai</option> 
                        @else
                            <option value="0">Pending</option>
                            <option value="proses">Proses</option>
                            <option selected value="selesai">Selesai</option> 
                        @endif
                      </select>
                    </div>
                  </div>
                </div>
                <div class="from-group">
                  <label for="tanggapan">Tanggapan</label>
                  <textarea name="tanggapan" id="tanggapan" rows="4" class="form-control" placeholder="Belum ada tanggapan">{{ $tanggapan->tanggapan ?? ''}}</textarea>
                </div><br>
                <button type="submit" class="main-btn primary-btn btn-hover btn-sm">KIRIM</button>
                <a href="{{ route('pengaduan.index') }}" class="main-btn deactive-btn btn-hover btn-sm" id="">KEMBALI</a>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection