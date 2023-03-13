<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  {{-- Icon --}}
  <link rel="shortcut icon" href="{{ asset('assets2/images/logo/Artboard2.png') }}" type="image/x-icon">
  <link rel="stylesheet" href="{{ asset('dist/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('bootstrap-icons-1.10.3') }}">
  {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> --}}

  <!-- ========== All CSS files linkup ========= -->
  <link rel="stylesheet" href="{{ asset('assets2/css/bootstrap.min.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets2/css/lineicons.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets2/css/materialdesignicons.min.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets2/css/fullcalendar.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets2/css/main.css') }}" />
  <title>Pelaporan Pengaduan Masyarakat | @yield('title')</title>
</head>
<body>
    {{-- content --}}
    @yield('main_auth')

  <script src="{{ asset('assets2/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets2/js/Chart.min.js') }}"></script>
  <script src="{{ asset('assets2/js/dynamic-pie-chart.js') }}"></script>
  <script src="{{ asset('assets2/js/moment.min.js') }}"></script>
  <script src="{{ asset('assets2/js/fullcalendar.js') }}"></script>
  <script src="{{ asset('assets2/js/jvectormap.min.js') }}"></script>
  <script src="{{ asset('assets2/js/world-merc.js') }}"></script>
  <script src="{{ asset('assets2/js/polyfill.js') }}"></script>
  <script src="{{ asset('assets2/js/main.js') }}"></script>
  <script src="{{ asset('assets2/dist/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('assets2/dist/js/bootstrap.bundle.min.js') }}"></script>
  @include('admin.partials.script')
</body>
</html>