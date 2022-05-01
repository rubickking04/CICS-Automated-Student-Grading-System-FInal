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
    {{-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.11.0/mdb.min.js"></script> --}}
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

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css"/>
    {{-- <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/> --}}

</head>
<body style="background-color: #d1d5d6">
    @include('sweetalert::alert')
<div id="app">
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card shadow" style="border-radius: 20px">
                    <div class="row">
                        <div class="col-md-5 col-sm-3 col py-5 bg-primary d-none d-sm-block" style="border-radius: 20px 0 0 20px " >
                            <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.svg" class="img-fluid py-5" alt="Phone image">
                        </div>
                        <div class="col-md-7 col-sm-9 col-auto">
                            <!-- Pills navs -->
                            <!-- Pills content -->
                            <div class="tab-content container ">
                                {{-- Student Login Form --}}
                                <div class="tab-pane fade show active text-center py-4" id="pills-student" role="tabpanel" aria-labelledby="tab-student">
                                    <a href="{{ url('/') }}" class="text-decoration-none text-dark">
                                    <img src="{{asset('/storage/images/logo.png')}}" alt="avatar" class="rounded-circle img-fluid border border-4 border-info" height="90px" width="90px">
                                    <h4 class="fw-bolder">{{ __('College of Information and Computing Science') }}</h4></a>
                                    <h5>{{ __('Student\'s Login Form') }}</h5>
                                    <form  method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <!-- Email input -->
                                        <div class="form-outline mb-4 text-start">
                                            <label for="email" class="col-form-label " >{{ __('Email') }}</label>
                                            <div class="input-group">
                                                <div class="input-group-text"><i class="bi bi-envelope-fill"></i></div>
                                                <input type="email" id="email" placeholder="juandelacruz@hotmail.com" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}"/>
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <!-- Password input -->
                                        <div class="form-outline mb-1 text-start">
                                            <label class="form-label" for="password">Password</label>
                                            <div class="input-group">
                                                <span class="input-group-text" onclick="password_show_hide();">
                                                    <i class="fas fa-eye" id="show_eye"></i>
                                                    <i class="fas fa-eye-slash d-none" id="hide_eye"></i>
                                                </span>
                                                <input id="password" type="password" placeholder="Must be 8-20 characters long." class="form-control @error('password') is-invalid @enderror" name="password" />
                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                </div>
                                        <!-- 2 column grid layout -->
                                        <div class="row mb-2">
                                            <div class="col-md-6 d-flex">
                                                <!-- Checkbox -->
                                                <div class="form-check mb-3 mb-md-0">
                                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}/>
                                                    <label class="form-check-label" for="remember"> Remember me </label>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Submit button -->
                                        <div class="text-center">
                                            <button type="submit" class=" text-center btn btn-primary mb-4">Sign in</button>
                                        </div>
                                        <!-- Register buttons -->
                                        <div class="text-center">
                                            <p>Not a member? <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModalCenter">{{ __('Sign up') }}</a></p>
                                        </div>
                                        <div class="modal fade modal-alert" id="exampleModalCenter" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content shadow" style="border-radius:20px;">
                                                    <div class="modal-body text-center">
                                                        <i class="fa-solid display-1 text-info fa-circle-exclamation"></i>
                                                        <div class="container py-3">
                                                            <p class="h2 fw-bold">{{ __('ERROR 501! 😢') }}</p>
                                                            <p class="h6 fw-bold">{{ __('Please contact your College Administrator to create an account, Thanks!') }}</p>
                                                        </div>
                                                        <div class="text-center">
                                                            <button type="button" class="btn btn-danger col-3" data-bs-dismiss="modal" style="border-radius:20px;">{{ __('Ok') }}</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function password_show_hide() {
        var x = document.getElementById("password");
        var show_eye = document.getElementById("show_eye");
        var hide_eye = document.getElementById("hide_eye");
            hide_eye.classList.remove("d-none");
                if (x.type === "password") {
                    x.type = "text";
                    show_eye.style.display = "none";
                    hide_eye.style.display = "block";
                } else {
                    x.type = "password";
                    show_eye.style.display = "block";
                    hide_eye.style.display = "none";
                }
    }
</script>
</body>
</html>
