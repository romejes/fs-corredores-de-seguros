<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>FS Corredores de Seguros | @yield('title')</title>

  <meta name="description" content="">
  
  <!-- Fonts -->
  <link rel="stylesheet" href="{{ asset('css/vendor.css')}}">
  <link rel="stylesheet" href="{{ asset('css/web.css')}}">

  <link rel="shortcut icon" href="{{ asset('favicon/favicon.ico')}}" type="image/x-icon">
</head>

<body class="m-0">
  <!-- Header -->
  @include('web.plantillas.principal.header')
  <!-- Fin Header -->

  @include('web.plantillas.principal.menu_celular')

  <!-- Contenido principal -->
  <main>
    @yield('contenidoPlantillaPrincipal')

     <!-- Slogan -->
    @include('web.plantillas.principal.slogan')
    <!-- Fin Slogan -->
  </main>
  <!-- Fin Contenido principal -->

  <!-- Footer -->
  @include('web.plantillas.principal.footer')
  <!-- Fin Footer -->

  <div id="cover-main"></div>
  
  <!--Scripts -->
  <script src="{{ asset('js/web/vendor.js')}}"></script>
  <script src="{{ asset('js/web/manifest.js')}}"></script>
  <script src="{{ asset('js/web/app.js')}}"></script>

  @stack('scripts')
</body>
</html>