@extends('admin.layout.app')
@section('title', 'Form Petugas')

@section('main_content')
<section class="tab-components">
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
                  <a href="{{ route('petugas.index') }}">Petugas</a>
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

    <!-- ========== form-elements-wrapper start ========== -->
    <div class="form-elements-wrapper">
      <div class="row">
        <div class="col-lg-8">
          <!-- input style start -->
          <div class="card-style mb-30">
            <h6 class="mb-25">Form Tambah Petugas</h6>
            <form action="{{ route('petugas.store') }}" method="post">
              @csrf
              <div class="input-style-1">
                <label for="nama_petugas">Nama Petugas</label>
                <input type="text" name="nama_petugas" id="nama_petugas" class="form-control" placeholder="Nama Lengkap" />
              </div>
              <div class="input-style-1">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" class="form-control" placeholder="Username" />
              </div>
              <div class="input-style-1">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="*******" />
              </div>
              <div class="input-style-1">
                <label for="telp">No telp</label>
                <input type="number" name="telp" id="telp" class="form-control" placeholder="08******" />
              </div>
              <div class="select-style-1">
                <label for="level">Level</label>
                <div class="input-group select-position">
                  <select name="level" id="level" class="custom-select">
                    <option value="petugas" selected>Pilih Level (Default Petugas)</option>
                    <option value="admin">Admin</option>
                    <option value="petugas">Petugas</option>
                  </select>
                </div>
              </div>
              <button type="submit" class="main-btn success-btn btn-hover btn-sm">SIMPAN</button>
              <a href="{{ route('petugas.index') }}" class="main-btn deactive-btn btn-hover btn-sm">KEMBALI</a>
            </form>
        <!-- end col -->
      </div>

      <div class="col-lg-6 col-12">
        @if (Session::has('username'))
        <div class="alert alert-primary d-flex align-items-center" role="alert">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
          </svg>
          <div>
            {{ Session::get('username') }}
          </div>
        </div>
        @endif
          @if ($errors->any())
              @foreach ($errors->all() as $error)
                  {{ $error }}
              @endforeach
          @endif
      </div>
      

      <!-- end row -->
    </div>
    <!-- ========== form-elements-wrapper end ========== -->
  </div>
  <!-- end container -->
</section>
@endsection