<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  
  {{-- Logo --}}
  <link rel="shortcut icon" href="{{ asset('assets2/images/logo/Artboard2.png') }}" type="image/x-icon">

  {{-- Icon --}}
  <link rel="stylesheet" href="{{ asset('dist/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('bootstrap-icons-1.10.3') }}">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">

  <!-- ========== All CSS files linkup ========= -->
  <link rel="stylesheet" href="{{ asset('assets2/css/bootstrap.min.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets2/css/lineicons.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets2/css/materialdesignicons.min.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets2/css/fullcalendar.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets2/css/main.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets2/css/morris.css') }}">
  <link rel="stylesheet" href="{{ asset('assets2/scss/_sidebar.scss') }}">
  <link rel="stylesheet" href="{{ asset('assets2/scss/main.scss') }}">

  <title>Pelaporan Pengaduan Masyarakat | @yield('title')</title>
</head>
<body>
  {{-- Sidebar-nav --}}
  @include('admin.partials.sidebar')
  
  <main class="main-wrapper">
    {{-- Header --}}
    @include('admin.partials.header')

    {{-- content --}}
    @yield('main_content')

    {{-- Footer --}}
    @include('admin.partials.footer')

    {{-- Sweet Alert --}}
    @include('sweetalert::alert')
  </main>

  @include('admin.partials.script')
</body>
</html>