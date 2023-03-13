@extends('admin.layout.app')
@section('title', 'Data Laporan')

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
                  <a href="{{ route('dashboard') }}">Dashboard</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                  Data Laporan
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

        {{-- Card pencarian laporan pertanggal --}}
        <div class="col-lg-4 col-12">
          <div class="card-style-2 mb-30">
            <div class="card-header">
              <div class="text-center">
                <h5>Laporan Pertanggal</h5>
              </div>
            </div><br>
            <div class="card-body">
              <form action="{{ route('laporan.getlaporan') }}" method="post">
                @csrf
                <div class="form-group">
                  <input type="text" name="from" class="form-control" placeholder="Tanggal Awal"
                     onfocusin="(this.type='date')" onfocusout="(this.type='text')">
                </div><br>
                <div class="form-group">
                  <input type="text" name="to" class="form-control" placeholder="Tanggal Akhir"
                     onfocusin="(this.type='date')" onfocusout="(this.type='text')">
                </div><br>

                <button type="submit" class="main-btn primary-btn btn-hover btn-sm">Cari Laporan</button>
              </form>
            </div>
          </div>
        </div>

        {{-- Output Pencarian --}}
        <div class="col-lg-8 col-12">
          <div class="card-style-2 mb-30">
            <div class="card-header">
              <h5>Data Berdasarkan Tanggal</h5>
              <div class="d-grid gap-2 d-md-flex justify-content-md-end">

                @if ($pengaduan ?? '')
                  <a href="{{ route('laporan.generate', ['from' => $from, 'to' => $to]) }}" class="main-btn success-btn btn-hover btn-sm"> 
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-download" viewBox="0 0 16 16">
                      <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
                      <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"/>
                    </svg>
                    EXPORT PDF
                  </a>
                @endif

              </div>
            </div><br>
            <div class="card-body">
              @if ($pengaduan ?? '')
                  <table class="table">
                    <thead>
                      <tr>
                        <th><h6>No</h6></th>
                        <th><h6>NIK</h6></th>
                        <th><h6>Tanggal</h6></th>
                        <th><h6>Isi Laporan</h6></th>
                        <th><h6>Status</h6></th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($pengaduan as $data => $d)
                        <tr>
                          <td>{{ $data += 1 }}</td>
                          <td>{{ $d->nik }}</td>
                          <td>{{ $d->tgl_pengaduan }}</td>
                          <td>{{ $d->isi_laporan }}</td>
                          <td>
                            @if ($d->status == '0')
                                <span class="status-btn info-btn">Pending</span>
                            @elseif($d->status == 'proses')
                                <span class="status-btn active-btn">Proses</span>
                            @else
                                <span class="status-btn success-btn">Done</span>
                            @endif
                          </td>
                        </tr>  
                      @endforeach
                    </tbody>
                  </table>
              @else
                <div class="text-center">
                  Data tidak ditemukan
                </div>
              @endif
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection