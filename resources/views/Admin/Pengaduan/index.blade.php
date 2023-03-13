@extends('admin.layout.app')
@section('title', 'Pengaduan')

@section('main_content')
<section class="table-components">
  <div class="container-fluid">
     <!-- ========== title-wrapper start ========== -->
     <div class="title-wrapper pt-30">
      <div class="row align-items-center">
        <div class="col-md-6">
          <div class="title mb-30">
            <h2>Pengaduan</h2>
          </div>
        </div>
        <!-- end col -->
        <div class="col-md-6">
          <div class="breadcrumb-wrapper mb-30">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <a href="{{ route('dashboard') }}">Dashboard</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                  Pengaduan
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
    <div class="title-wrapper">
      <div class="row">
        <div class="col-lg-12">
          <div class="card-style mb-30">
            <div class="table-wrapper table-responsive">
              <table id="pengaduan-table" class="table">
                <thead>
                  <tr>
                    <th><h6>No</h6></th>
                    <th><h6>Tanggal</h6></th>
                    <th><h6>Isi Laporan</h6></th>
                    <th><h6>Status</h6></th>
                    <th><h6>Detail</h6></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($pengaduan as $data => $d)
                      <tr>
                        <td class="min-width">
                          <p>{{ $data += 1 }}</p>
                        </td>
                        <td>
                          <p>{{ $d->tgl_pengaduan }}</p>
                        </td>
                        <td>
                          <p>{{ $d->isi_laporan }}</p>
                        </td>
                        <td>
                          @if ($d->status == '0')
                              <span class="status-btn info-btn">Pending</span>
                          @elseif($d->status == 'proses')
                              <span class="status-btn active-btn">Proses</span>
                          @else
                              <span class="status-btn success-btn">Done</span>
                          @endif
                        </td>
                        <td>
                          <a href="{{ route('pengaduan.show', $d->id_pengaduan) }}"><i class="lni lni-eye"></i></a>
                        </td>
                      </tr>
                  @endforeach
                </tbody>
              </table>

              {{-- Paginate --}}
              <div class="pagination">
                <li class="page-item"></li>
                {{ $pengaduan->links() }}
            </div>
            
            </div>
          </div>
          <!-- end card -->
        </div>
        <!-- end col -->
      </div>
      <!-- end row -->
    </div>
  </div>
</section>
@endsection