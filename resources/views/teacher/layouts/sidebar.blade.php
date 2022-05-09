<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel = "icon" href ="{{ asset('storage/images/logo.png') }}" type = "image/x-icon">


    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://cdn.lordicon.com/lusqsztk.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    {{-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.11.0/mdb.min.js"></script> --}}

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet"/>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css"/>
    {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet"> --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet"/>

</head>
<body style="background-color: #d1d5d6">
    @include('popper::assets')
    @include('sweetalert::alert')
    <div id="app">
        <nav class="navbar navbar-light container-fluid bg-dark shadow  sticky-top">
            <div class="container-fluid">
                <a class=" navbar-nav navbar-brand" data-bs-toggle="offcanvas" data-bs-target="#offcanvas" role="button">
                    <lord-icon
                    src="https://cdn.lordicon.com/wgwcqouc.json"
                    trigger="morph"
                    colors="primary:#ffffff,secondary:#ffffff"
                    stroke="60"
                    style="width:30px;height:30px"
                    data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvas">
                    </lord-icon>
                </a>
                <p class="navbar-brand h5 mb-0 navbar-text text-truncate text-white">{{ __('Teacher\'s Portal') }}</p>
                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 d-none d-sm-block">
                    <li class="nav-item text-white">
                        <img src="{{ asset('/storage/images/avatar.png') }}" alt="" width="30" height="30" class="rounded-circle">
                        {{ Auth::user()->name }}
                    </li>
                </ul>
            </div>
        </nav>
        <div class="offcanvas offcanvas-start w-auto text-white container bg-dark" tabindex="-1" id="offcanvas" data-bs-keyboard="true" data-bs-backdrop="true">
            {{-- <button type="button" class="btn-close text-reset text-end" data-bs-dismiss="offcanvas" aria-label="Close"></button> --}}
            <div class="offcanvas-header">
                <h6 class="offcanvas-title" id="offcanvas">
                    {{-- <button type="button" class="btn-close align-items-end btn-close-white text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button> --}}
                    <a href="{{ url('/') }}" class="d-flex justify-content-center align-items-center mb-auto mb-md-0 text-center me-md-auto text-white text-decoration-none">
                        <img class="d-inline-block align-top rounded-circle border border-info border-3" src="{{asset('/storage/images/avatar.png')}}" height="50" width="50">
                    </a>
                    <span class="container fs-4">{{ Auth::user()->name }}</span>
                    <a class="nav-link"><span class="text-info d-flex justify-content-center  text-uppercase small">{{ __('Teacher\'s Name') }}</span>
                    </a>
                </h6>
            </div>
            <hr>
            <div class="offcanvas-body px-0 ">
                <ul class="nav nav-pills flex-column mb-sm-auto mb-auto mb-0 align-items-start" id="menu">
                    {{-- <li class="nav-item">
                        <a class="nav-link"><span class="text-white text-muted text-uppercase small">{{ __('Main page') }}</span>
                        </a>
                    </li> --}}
                    <li class="nav-item">
                        <a href="{{ url('/') }}" class="nav-link text-truncate">
                            <i class="fs-5 fa-solid fa-house text-white"></i><span class="ms-2 text-white" aria-current="page">{{ __('Main Page') }}</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"><span class="text-white text-muted text-uppercase small">{{ __('Navigation') }}</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('teacher.home') }}" class="nav-link text-truncate">
                            <i class="fs-5 fa-solid fa-house-chimney  text-white"></i><span class="ms-2 text-white" aria-current="page">{{ __('Classes') }}</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"><span class="text-white text-muted text-uppercase small">{{ __('Teaching') }}</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.home') }}" class="nav-link collapsed" data-bs-toggle="collapse" data-bs-target="#create-collapse" aria-expanded="true">
                        <i class="fs-4 bi bi-folder2 text-white"></i><span class="ms-2  text-white">{{ __('My Subjects') }}</span></a>
                        <div class="collapse container" id="create-collapse">
                            <ul class="btn-toggle-nav nav nav-pills flex-column mb-sm-auto mb-auto mb-0 align-items-start list-unstyled fw-normal pb-2">
                            @foreach ( $subject as $subjects)
                                <li class="nav-item"><a href="{{ route('teacher.class',$subjects->uuid) }}" class="ms-2 nav-link  text-white text-decoration-none rounded"><i class="fs-5 fa-solid fa-angles-right"></i><span class="ms-2  text-white">{{ $subjects->subject.' - '.$subjects->yearLevel.''.$subjects->section }}</span></a></li>
                            @endforeach
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('teacher.subject') }}" class="nav-link text-truncate">
                            <i class="fs-4 text-white bi bi-folder-plus"></i><span class="ms-2 text-white" aria-current="page">{{ __('Create Subject') }}</span>
                        </a>
                    </li>
                </ul>
                    <hr>
                    <ul class="nav nav-pills flex-column mb-sm-auto mb-auto mb-0 align-items-start">
                    <li class="nav-item">
                        <a class="nav-link"><span class="text-white text-muted text-uppercase small">{{ __('Exit') }}</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('teacher.logout') }}" class="d-flex align-items-center nav-link text-truncate"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            <i class="fas fa-sign-out-alt fs-5 text-white"></i><span class="ms-2 text-white">{{ __('Sign out') }}</span> </a>
                    </li>
                    <form id="logout-form" action="{{ route('teacher.logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </ul>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col p-2">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
    @stack('js')
</body>
</html>
