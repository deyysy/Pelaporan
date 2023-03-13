@extends('admin.layout.app')
@section('title', 'Petugas')

@section('main_content')
<section class="table-components">
  <div class="container-fluid">
    <!-- ========== title-wrapper start ========== -->
    <div class="title-wrapper pt-30">
      <div class="row align-items-center">
        <div class="col-md-6">
          <div class="title mb-30">
            <h2>Petugas</h2>
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
                  Petugas
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

    <a href="{{ route('petugas.create') }}" class="main-btn primary-btn btn-hover btn-sm">
      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
      <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z"/>
      </svg> Tambahkan Petugas
    </a><hr>
    
    <!-- ========== tables-wrapper start ========== -->
    <div class="tables-wrapper">
      <div class="row">
        <div class="col-lg-12">
          <div class="card-style mb-30">
            <div class="table-wrapper table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th><h6>No</h6></th>
                    <th><h6>Nama Petugas</h6></th>
                    <th><h6>Username</h6></th>
                    <th><h6>Telp</h6></th>
                    <th><h6>Level</h6></th>
                    <th><h6>Opsi</h6></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($petugas as $data => $d)
                  <tr>
                    <td>
                      <p>{{ $data += 1 }}</p>
                    </td>
                    <td>
                      <p>{{ $d->nama_petugas }}</p>
                    </td>                      
                    <td>
                      <p>{{ $d->username }}</p>
                    </td>                      
                    <td>
                      <p>{{ $d->telp }}</p>
                    </td> 
                    <td>
                      <p>{{ $d->level }}</p>
                    </td>     
                    <td>
                      <a href="{{ route('petugas.edit', $d->id_petugas) }}">
                        <div class="action">
                          <button class="text-primary">
                            <i class="lni lni-pencil"></i>
                          </button>
                        </div>
                      </a>
                    </td>                
                    <td>
                      {{-- Fitur Hapus --}}
                      <form action="{{ route('petugas.destroy', $d->id_petugas) }}" method="post">
                          @csrf
                          @method('DELETE')
                          <div class="action">
                          <button class="text-danger">
                            <i class="lni lni-trash-can"></i>
                          </button>
                        </div>
                      </form>
                    </td>                
                  @endforeach
                  
                  </tr>
                </tbody>
              </table>
              <!-- end table -->
            </div>
            {{-- Alert --}}
          @if (Session::has('pesan'))
          <div class="alert alert-info mt-2" role="alert">
              {{ Session::get('pesan') }}
          </div>
        @endif
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
<!-- ========== table components end ========== -->
@endsection