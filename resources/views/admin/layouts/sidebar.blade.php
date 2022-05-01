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
    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
    <script>
    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;
    var pusher = new Pusher('475bd1f120d5afba7da4', {
        cluster: 'ap1'
    });
    var channel = pusher.subscribe('my-channel');
    channel.bind('my-event', function(data) {
        alert(JSON.stringify(data));
    });
    </script>
    {{-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.11.0/mdb.min.js"></script> --}}

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet"/>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css"/>
    {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet"> --}}
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet"> --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet"/>

</head>
<body style="background-color: #d4dae0">
    @include('sweetalert::alert')
    <div id="app">
        <nav class="navbar navbar-light container-fluid bg-dark shadow  sticky-top">
            <div class="container-fluid">
                <a class="navbar-brand" data-bs-toggle="offcanvas" data-bs-target="#offcanvas" role="button">
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
                <!-- Left Side Of Navbar -->
                <p class="navbar-brand mb-0 navbar-text d-none d-sm-block text-truncate text-white">{{ __('Administrator\'s Dashboard') }}</p>
                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 d-none d-sm-block">
                    <li class="nav-item text-white">
                        <img src="{{ asset('/storage/images/avatar.png') }}" alt="" width="30" height="30" class="rounded-circle">
                        {{ Auth::user()->name }}
                    </li>
                </ul>
            </div>
        </nav>
        <div class="offcanvas offcanvas-start w-auto bg-dark text-white container" tabindex="-1" id="offcanvas" data-bs-keyboard="true" data-bs-backdrop="true">
            {{-- <button type="button" class="btn-close text-reset text-end" data-bs-dismiss="offcanvas" aria-label="Close"></button> --}}
            <div class="offcanvas-header">
                <h6 class="offcanvas-title" id="offcanvas">
                    {{-- <button type="button" class="btn-close align-items-end btn-close-white text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button> --}}
                    <a href="{{ url('/') }}" class="d-flex justify-content-center align-items-center mb-auto mb-md-0 text-center me-md-auto text-white text-decoration-none">
                        <img class="d-inline-block align-top rounded-circle border border-primary border-3 img-fluid" src="{{asset('/storage/images/avatar.png')}}" height="60" width="60">
                    </a>
                    <span class="container fs-4 d-flex justify-content-center">{{ Auth::user()->name }}</span>
                    <a class="nav-link"><span class="text-primary d-flex justify-content-center text-uppercase small">{{ __('Administrator\'s Name') }}</span>
                    </a>
                </h6>
                {{-- <button type="button" class="btn-close btn-close-white text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button> --}}
            </div>
            <hr>
            <div class="offcanvas-body px-0 ">
                <ul class="nav nav-pills flex-column mb-sm-auto mb-auto mb-0 align-items-start" id="menu">
                    {{-- <li class="nav-item">
                        <a class="nav-link"><span class="text-white text-muted text-uppercase small">{{ __('Navigation') }}</span>
                        </a>
                    </li> --}}
                    <li class="nav-item">
                        <a href="{{ url('/') }}" class="nav-link d-block">
                            <i class="fs-5 fa-solid fa-house-chimney text-white"></i><span class="ms-2 text-white" aria-current="page">Home</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.home') }}" class="nav-link text-truncate">
                            <i class="fs-5 fa-solid fa-chart-line text-white"></i><span class="ms-2  text-white">Dashboard</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"><span class="text-white text-muted text-uppercase small">{{ __('Tables') }}</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.home') }}"class="nav-link collapsed" data-bs-toggle="collapse" data-bs-target="#table-collapse" aria-expanded="true">
                        <i class="fs-5 fa-solid fa-table text-white"></i><span class="ms-2  text-white">{{ __('Data Tables') }}</span></a>
                        <div class="collapse container" id="table-collapse">
                            <ul class="btn-toggle-nav nav nav-pills flex-column mb-sm-auto mb-auto mb-0 align-items-start list-unstyled fw-normal pb-2">
                                <li class="nav-item"><a href="{{ route('admin.student.tables') }}" class="ms-2 nav-link  text-white text-decoration-none rounded"><i class="fs-5 fa-solid fa-angles-right"></i><span class="ms-2  text-white">{{ __('Student Table '.'('.App\Models\User::all()->count().')') }}</span></a></li>
                                <li class="nav-item"><a href="{{ route('admin.teacher.tables') }}" class="ms-2 nav-link  text-white text-decoration-none rounded"><i class="fs-5 fa-solid fa-angles-right"></i><span class="ms-2  text-white">{{ __('Teacher\'s Table '.'('.App\Models\Teacher::all()->count().')') }}</span></a></li>
                                <li class="nav-item"><a href="#" class="ms-2 nav-link  text-white text-decoration-none rounded"><i class="fs-5 fa-solid fa-angles-right"></i><span class="ms-2  text-white">{{ __('Teacher\'s Subject Table') }}</span></a></li>
                                <li class="nav-item"><a href="#" class="ms-2 nav-link  text-white text-decoration-none rounded"><i class="fs-5 fa-solid fa-angles-right"></i><span class="ms-2  text-white">{{ __('Student\'s Grade Table') }}</span></a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"><span class="text-white text-muted text-uppercase small">{{ __('Add new') }}</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.home') }}" class="nav-link collapsed" data-bs-toggle="collapse" data-bs-target="#create-collapse" aria-expanded="true">
                        <i class="fs-5 fa-solid fa-user-plus text-white"></i><span class="ms-2  text-white">{{ __('Create New User\'s') }}</span></a>
                        <div class="collapse container" id="create-collapse">
                            <ul class="btn-toggle-nav nav nav-pills flex-column mb-sm-auto mb-auto mb-0 align-items-start list-unstyled fw-normal pb-2">
                                <li class="nav-item"><a href="{{ route('admin.register') }}" class="ms-2 nav-link  text-white text-decoration-none rounded"><i class="fs-5 fa-solid fa-angles-right"></i><span class="ms-2  text-white">{{ __('New Student') }}</span></a></li>
                                <li class="nav-item"><a href="{{ route('admin.teacher.register') }}" class="ms-2 nav-link  text-white text-decoration-none rounded"><i class="fs-5 fa-solid fa-angles-right"></i><span class="ms-2  text-white">{{ __('New Teacher') }}</span></a></li>
                            </ul>
                        </div>
                    </li>
                    {{-- <li class="nav-item">
                        <a class="nav-link"><span class="text-white text-muted text-uppercase small">{{ __('Archive') }}</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.home') }}" class="nav-link text-truncate">
                            <i class="fs-5 fa-solid fa-trash text-white"></i><span class="ms-2  text-white">{{ __('Trash') }}</span></a>
                    </li> --}}
                </ul>
                    <hr>
                    <div class="dropdown">
                        <a href="{{ route('admin.logout') }}" class="d-flex align-items-center nav-link text-truncate"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            <i class="fas fa-sign-out-alt fs-5 text-white"></i><span class="ms-2 text-white">{{ __('Sign out') }}</span> </a>
                    </div>
                    <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row">
                <div class="col p-2">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-6 col-6">
                                <div class="card text-white mb-3 shadow" aria-hidden="true" style="background: linear-gradient(to right, rgb(72, 160, 243), rgb(101, 84, 255));">
                                    <div class="card-body h-100">
                                        <div class="row">
                                            <div class="col-lg-7 col-sm-6 col-md-auto">
                                                <h2 class="users-count" id="users-count">{{ App\Models\User::all()->count() }}</h2>
                                                <h5>{{ __('Student') }}</h5>
                                            </div>
                                            <div class="col-lg-5 col-sm-6 col-md-auto d-none d-sm-block">
                                                <lord-icon
                                                    src="https://cdn.lordicon.com/dxjqoygy.json"
                                                    trigger="hover"
                                                    colors="primary:#ffffff,secondary:#ffffff"
                                                    stroke="60"
                                                    style="width:100px;height:100px">
                                                </lord-icon>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-6 col-6">
                                <div class="card text-white mb-3 shadow" style="background: linear-gradient(to right, rgb(36, 185, 98), rgb(17, 92, 54));">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-7 col-sm-6 col-md-auto">
                                                <h2>{{ App\Models\Teacher::all()->count() }}</h2>
                                                <h5>{{ __('Teacher') }}</h5>
                                            </div>
                                            <div class="col-lg-5 col-sm-6 col-md-auto d-none d-sm-block">
                                                <lord-icon
                                                    src="https://cdn.lordicon.com/zpxybbhl.json"
                                                    trigger="hover"
                                                    colors="primary:#ffffff,secondary:#ffffff"
                                                    stroke="60"
                                                    style="width:100px;height:100px">
                                                </lord-icon>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-3 col-sm-6 col-6">
                                <div class="card text-dark mb-3 shadow" style="background: linear-gradient(to right, rgb(214, 240, 67), rgb(187, 190, 5));">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-7 col-sm-6 col-md-auto">
                                                <h2>{{ App\Models\Subject::all()->count() }}</h2>
                                                <h5>{{ __('Subject\'s') }}</h5>
                                            </div>
                                            <div class="col-lg-5 col-sm-6 col-md-auto d-none d-sm-block">
                                                <lord-icon
                                                    src="https://cdn.lordicon.com/bbnkwdur.json"
                                                    trigger="hover"
                                                    colors="primary:#ffffff,secondary:#ffffff"
                                                    stroke="60"
                                                    style="width:100px;height:100px">
                                                </lord-icon>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-3 col-sm-6 col-6">
                                <div class="card text-white mb-3 shadow" style="background: linear-gradient(to right, rgb(247, 87, 87), rgb(207, 9, 9));">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-7 col-sm-6 col-md-auto">
                                                <h2>{{ App\Models\User::with('studentSched')->count() }}</h2>
                                                <h5>{{ __('Grade\'s') }}</h5>
                                            </div>
                                            <div class="col-lg-5 col-sm-6 col-md-auto d-none d-sm-block">
                                                <lord-icon
                                                    src="https://cdn.lordicon.com/bbnkwdur.json"
                                                    trigger="hover"
                                                    colors="primary:#ffffff,secondary:#ffffff"
                                                    stroke="60"
                                                    style="width:100px;height:100px">
                                                </lord-icon>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
    <script src="https://unpkg.com/echarts/dist/echarts.min.js"></script>
        <!-- Chartisan -->
    <script src="https://unpkg.com/@chartisan/echarts/dist/chartisan_echarts.js"></script>
    @stack('js')
    @stack('chart')
</body>
</html>
