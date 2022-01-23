<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Intranet - FS Corredores de Seguros</title>

  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <link rel="stylesheet" href="{{ asset("css/intranet.css") }}">

  <link rel="shortcut icon" href="{{ asset('favicon/favicon.ico')}}" type="image/x-icon">
</head>
@yield('body-content')

<script src="{{ asset("js/intranet/manifest.js") }}"></script>
<script src="{{ asset("js/intranet/vendor.js") }}"></script>
<script src="{{ asset("js/intranet/app.js") }}"></script>

</html>