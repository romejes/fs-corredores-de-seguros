@extends('intranet.layouts.main')

@section('body-content')

<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    <!-- Navbar-->
    @include('intranet.layouts._navbar')

    <!-- Sidebar -->
    @include('intranet.layouts._sidebar')

    <!-- Main Content-->
    <div class="content-wrapper">
      @yield('content')
    </div>
  </div>
</body>
@endsection