<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="{{asset('frontend/css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/custom.css')}}" rel="stylesheet">
    <link href="{{asset('admin/style.css')}}" rel="stylesheet">



<!--  u link asset dodati samo admin css i java ako ima  public /admin /css -->

    <!-- Scripts -->
</head>
<body>
    <div class="wrapper">

        <div class="main-panel d-flex  pt-8">
            <div class="col-2">
                @include('layouts.inc.adminnav')

            </div>
            <div class="content col-10">
                <!-- kontent admin das -->
                @yield('content')
            </div>
        </div>
        <!-- @include('layouts.inc.adminfooter') -->
    </div>


    <script src="{{asset ('frontend/js/bootstrap.bundle.min.js')}}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    @if(session('status'))
    <script>
        swal("{{session('status')}}");
    </script>
    @endif
    @yield('script')
</body>
</html>
