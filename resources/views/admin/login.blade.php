<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://cdn.lordicon.com/lusqsztk.js"></script>
    {{-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.11.0/mdb.min.js"></script> --}}
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet"/>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet"/>

</head>
<body style="background-color: #d1d5d6">
    <main id="app">
        <div class="container py-4">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="card shadow" style="border-radius: 20px">
                        {{-- <div class="card-body"> --}}
                            <div class="row">
                                <div class="col-md-6 col-sm-3 col py-5 bg-primary d-none d-sm-block" style="border-radius: 20px 0 0 20px " >
                                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.svg" class="img-fluid py-5" alt="Phone image">
                                </div>
                                <div class="col-md-6 col-sm-9 col-auto">
                                    <div class="container ">
                                        {{-- Teacher Login Form --}}
                                        <div class="text-center py-4">
                                            <a href="{{ url('/') }}" class="text-decoration-none text-dark">
                                            <img src="{{asset('/storage/images/logo.png')}}" alt="avatar" class="rounded-circle img-fluid border border-4 border-info" height="90px" width="90px">
                                            <h4 class="fw-bolder">{{ __('College of Information and Computing Science') }}</h4></a>
                                            <h5>{{ __('Admin\'s Login Form') }}</h5>
                                            <form  method="POST" action="{{ route('admin.login') }}">
                                                @csrf
                                                <!-- Email input -->
                                                <div class="form-outline mb-1 text-start">
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
                                                <!-- 2 column grid layout -->
                                                <div class="row mb-2">
                                                    <div class="col-md-10 d-flex">
                                                        <!-- Checkbox -->
                                                        <div class="form-check mb-3 mb-md-0">
                                                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}/>
                                                            <label class="form-check-label" for="remember"> Remember me </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <button type="submit" class="btn btn-primary mb-4">Sign in</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        {{-- </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </main>
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
