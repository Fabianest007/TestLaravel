<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <!-- Meta data -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta content="Muy Simple" name="muysimple.cl">
    <meta content="muy simple" name="muysimple.cl">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="keywords"
        content="abogados, documentos, firma documentos, clave única, facil, rápido, tecnología, ClaveÚnica" />
    @include('layouts.new-admin.head')
</head>

<body class="app sidebar-mini"
    style="background-image: url({{ asset('img/fondo.jpg') }}); background-position: center; background-size: cover; background-repeat: no-repeat; background-attachment: fixed;">
    <!---Global-loader-->
    <div id="global-loader">
        <img src="{{ URL::asset('layouts/images/svgs/loader.svg') }}" alt="loader">
    </div>
    <!--- End Global-loader-->
    <!-- Page -->
    <div class="page">
        <div class="page-main">
            @include('layouts.new-admin.aside-menu')
            <!-- App-Content -->
            <div class="app-content main-content">
                <div class="side-app">
                    @include('layouts.new-admin.header')
                    @yield('page-header')
                    @if (session()->has('flash') == 1)
                        <div class="container">
                            <div class="alert alert-info" role="alert"><button type="button" class="close"
                                    data-dismiss="alert" aria-hidden="true">×</button>
                                <i class="fa fa-check-circle-o mr-2" aria-hidden="true">
                                </i> {{ session('flash') }}
                            </div>
                        </div>
                    @endif

                    @if (session()->has('warning') == 1)
                        <div class="container">
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                {{ session('warning') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </div>
                    @endif
                    @yield('content')
                    @include('layouts.new-admin.footer')
                </div><!-- End Page -->
                @include('layouts.new-admin.footer-scripts')
</body>

</html>
