@extends('admin.layout.app')
@section('title', 'Masyarakat')

@section('main_content')
<section class="table-components">
  <div class="container-fluid">
    <!-- ========== title-wrapper start ========== -->
    <div class="title-wrapper pt-30">
      <div class="row align-items-center">
        <div class="col-md-6">
          <div class="title mb-30">
            <h2>Masyarakat</h2>
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
                  Masyarakat
                </li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </div>
    <!-- ========== title-wrapper end ========== -->

    <!-- ========== tables-wrapper start ========== -->
    <div class="tables-wrapper">
      <div class="row">
        <div class="col-lg-12">
          <div class="card-style mb-30">

            {{-- Button Seacrh --}}
            <div class="row g-3 align-items-center">
              <div class="col-auto">
                <form action="{{ route('masyarakat.index') }}" method="get">
                  <div class="input-group mb-3">
                    <button class="btn btn-outline-light" type="submit" id="search">
                      <span class="input-group-text" id="query">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                          <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                        </svg>
                      </span>
                    </button>
                    
                    <input type="text" name="query" class="form-control" aria-describedby="query" placeholder="Masukan data">
                  </div>
                </form>
              </div>
            </div>  
          
            @if(count($masyarakat) > 0)
            <h5 class="text-success">Data berhasil ditemukan 
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-all" viewBox="0 0 16 16">
                <path d="M8.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L2.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093L8.95 4.992a.252.252 0 0 1 .02-.022zm-.92 5.14.92.92a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 1 0-1.091-1.028L9.477 9.417l-.485-.486-.943 1.179z"/>
              </svg>
            </h5>
            @else
              <h5 class="text-danger">Data tidak ditemukan!
              </h5>
            @endif

            {{-- Data Table Masyarakat --}}
            <div class="table-wrapper table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th><h6>No</h6></th>
                    <th><h6>NIK</h6></th>
                    <th><h6>Nama</h6></th>
                    <th><h6>Username</h6></th>
                    <th><h6>Telp</h6></th>
                    <th><h6>Aksi</h6></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($masyarakat as $data => $d)     
                  <tr>
                    <td>
                      <p>
                        {{ $data += 1 }}
                      </p>
                    </td>
                    <td>
                      <p>{{ $d->nik }}</p>
                    </td>
                    <td>
                      <p>{{ $d->nama }}</p>
                    </td>
                    <td>
                      <p>{{ $d->username }}</p>
                    </td>
                    <td>
                      <p>{{ $d->telp }}</p>
                    </td>
                    <td>
                      <a href="{{ route('masyarakat.show', $d->nik) }}">
                        <div class="action">
                          <button class="text-primary">
                            <i class="lni lni-eye"></i>
                          </button>
                        </div>
                      </a>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
          <!-- end card -->
        </div>
        <!-- end col -->
      </div>
      <!-- end row -->
    </div>
    <!-- ========== tables-wrapper end ========== -->
  </div>
  <!-- end container -->
</section>
@endsection