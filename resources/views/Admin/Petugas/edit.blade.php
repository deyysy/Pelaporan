@extends('admin.layout.app')
@section('title', 'Update Petugas')

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
        <div class="col-lg-6">
          <!-- input style start -->
          <div class="card-style mb-30">

            {{-- Form Update Petugas --}}
            <h6 class="mb-25">Form Update Petugas</h6>
            <form action="{{ route('petugas.update', $petugas->id_petugas) }}" method="post">
              @csrf
              @method('PATCH')
              <div class="input-style-1">
                <label for="nama_petugas">Nama Petugas</label>
                <input type="text" value="{{ $petugas->nama_petugas }}" name="nama_petugas" id="nama_petugas" class="form-control" placeholder="Nama Lengkap" />
              </div>
              <div class="input-style-1">
                <label for="username">Username</label>
                <input type="text"  value="{{ $petugas->username }}" name="username" id="username" class="form-control" placeholder="Username" />
              </div>
              <div class="input-style-1">
                <label for="password">Password</label>
                <input type="password" value="{{ $petugas->password }}" value="" name="password" id="password" class="form-control" placeholder="*******" />
              </div>
              <div class="input-style-1">
                <label for="telp">No telp</label>
                <input type="number" value="{{ $petugas->telp }}" name="telp" id="telp" class="form-control" placeholder="08******" />
              </div>
              <div class="select-style-1">
                <label for="level">Level</label>
                <div class="input-group select-position">
                  <select name="level" id="level" class="custom-select">
                    @if ($petugas->level == 'admin')
                      <option selected value="admin">Admin</option>
                      <option value="petugas">Petugas</option>
                    @else
                      <option value="admin">Admin</option>
                      <option selected value="petugas">Petugas</option>
                    @endif
                  </select>
                </div>
              </div>
              <button type="submit" class="main-btn primary-btn btn-hover btn-sm">UPDATE</button>
              <a href="{{ route('petugas.index') }}" class="main-btn deactive-btn btn-hover btn-sm">KEMBALI</a>
            </form>
            
        <!-- end col -->
      </div>
      <!-- end row -->
    </div>
    <!-- ========== form-elements-wrapper end ========== -->
  </div>
  <!-- end container -->
</section>
@endsection