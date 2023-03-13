<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link
    rel="shortcut icon"
    href="{{ asset('assets2/images/logo/Artboard2.png') }}"
    type="image/x-icon"
  />
  <title>DUMAS | @yield('title-auth')</title>

  <!-- ========== All CSS files linkup ========= -->
  <link rel="stylesheet" href="{{ asset('assets2/css/bootstrap.min.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets2/css/lineicons.css"') }} />
  <link rel="stylesheet" href="{{ asset('assets2/css/materialdesignicons.min.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets2/css/fullcalendar.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets2/css/main.css') }}" />
</head>
<body>
  {{-- Content --}}
  @yield('form-register')

  {{-- Sweet Alert --}}
  @include('sweetalert::alert')
  {{-- Script JS --}}
  @include('user.partials.script')
</body>
</html>