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

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Acme&family=BIZ+UDPMincho&family=Bebas+Neue&family=Comfortaa:wght@700&family=Montserrat:wght@600&family=Overlock:wght@900&family=Poppins:wght@900&family=Righteous&family=Roboto:wght@100&family=Secular+One&display=swap" rel="stylesheet">    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet"/>
    {{-- <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet"> --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet">

</head>

<body style="background-color: #eeeeee">
    @include('sweetalert::alert')
    <div id="app">
        <nav class="navbar d-none d-md-block text-muted" style=" background: #263238">
            <div class="container-fluid">
                {{-- <a class="navbar-brand" href="#">Navbar</a> --}}
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
                    <div class="container mx-4">
                        <div class="hstack gap-3">
                            <a href="https://www.facebook.com/alfhaigar.usman.1/"><span class="fs-4 bi text-white text-opacity-75 bi-facebook"></span></a>
                            <a href="https://github.com/rubickking04"><span class="fs-4 bi bi-github text-white text-opacity-75"></span></a>
                            {{-- <div class="vr"></div> --}}
                        </div>
                    </div>
                </ul>
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 ">
                    <div class="container">
                        <div class="hstack gap-3">
                            <p class="mb-2 text-white text-opacity-75" style="font-family: 'Montserrat', sans-serif;" ><span class="bi bi-geo-alt-fill px-2 text-danger"></span>{{ __("R.T. Lim Boulevard Baliwasan, Zamboanga City") }}</p>
                            <div class="vr"></div>
                            <p class="mb-2 text-white text-opacity-75" style="font-family: 'Montserrat', sans-serif;" ><span class="fa-solid fa-envelope px-2 text-warning"></span>{{ __("wannabeit2022@gmail.com") }}</p>
                        </div>
                    </div>
                </ul>
            </div>
        </nav>
        <nav class="navbar navbar-expand-md navbar-dark bg-dark  text-white shadow-sm  sticky-top" aria-current="page">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img class="d-inline-block align-top" src="{{asset('/storage/images/logo.png')}}" height="40" width="40">
                </a>
                <button class="navbar-toggler" onclick="myFunction(this)" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <div class="bar1"></div>
                    <div class="bar2"></div>
                    <div class="bar3"></div>
                    {{-- <span class="navbar-toggler-icon"></span> --}}
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mx-auto d-flex justify-content-center list">
                        <li class="nav-item mx-auto px-3">
                            <a class="nav-link text-white list-link" href="#home" aria-selected="true">{{ __(' Home') }}</a>
                        </li>
                        <li class="nav-item mx-auto px-3">
                            <a class="nav-link px-3 text-white list-link" href="#about" aria-selected="false">{{ __('About') }}</a>
                        </li>
                        <li class="nav-item mx-auto px-3">
                            <a class="nav-link px-3 text-white list-link" href="#login" aria-selected="false">{{ __('Portal') }}</a>
                        </li>
                        <li class="nav-item mx-auto px-3">
                            <a class="nav-link text-white list-link" href="#team" aria-selected="false">{{ __('Team') }}</a>
                        </li>
                        <li class="nav-item mx-auto px-3">
                            <a class="nav-link text-white list-link" href="#contact" aria-selected="false">{{ __('Contact Us') }}</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

            <section id="home">
                <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
                    {{-- <div class="carousel-indicators">
                        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1"  class="active" aria-current="true" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div> --}}
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <svg class="bd-placeholder-img" width="100%" height="auto" =xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false">
                                <rect width="100%" height="100%" fill="#777"/>
                                <image href="{{ asset('storage/images/cics.jpg') }}" height="150%"/>
                            </svg>
                            <div class="container">
                                <div class="carousel-caption py-2">
                                    <h1 class="fw-bolder display-4 text-uppercase" style="font-family: 'Poppins', sans-serif; -webkit-text-stroke: 2px black;" >{{ __('College of Information and Computing Science') }}</h1>
                                    <p><a class="btn btn-lg btn-primary" href="#about" style="border-radius:20px;"><i class="fa-solid fa-right-to-bracket px-2"></i>{{ __('Get Started') }}</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section id="about" class="about">
                <div class="py-5">
                </div>
                <div class="container text-center">
                    <div class="card shadow" style="border-radius: 30px" data-aos="fade-up" data-aos-anchor-placement="top-center" data-aos-easing="linear" data-aos-duration="900">
                        <div class="card-body">
                            <h1 class="display-5 fw-bold" style="font-family: 'Montserrat', sans-serif;" >{{ __('About') }}</h1>
                    <p class="text-muted text-uppercase small fw-bolder"><span class="px-2">{{ __('•') }}</span>{{ __('What we offer') }}<span class="px-2">{{ __('•') }}</span></p>
                    <p class="text-primary text-uppercase h2 fw-bolder" style="font-family: 'Montserrat', sans-serif;">{{ __('College of Information and Computing Science') }}</p>
                    <p class="text-muted text-uppercas h3 fw-bolder" style="font-family: 'Montserrat', sans-serif;">{{ __('— Automated Student Grading System') }}</p>
                    <div class="row justify-content-center">
                        <div class="col-lg-8 ">
                            <p class=" fw-bolder text-gray-900 h4 container py-3 mb-4" style="font-family: 'Montserrat', sans-serif;">{{ __('A Web-Based Online Grading System for the students
                                of College of Information and Computing Science — making it
                                easy,  fast, reliable and User Friendly Web-Based System. Designed for Mobile Devices.') }}
                            </p>
                            <a href="#login" class="btn btn-outline-primary fs-3 mb-3" style="border-radius:30px; font-family: 'Montserrat', sans-serif;"><span class="fa-solid fa-arrow-right-to-bracket px-2"></span>{{ __('Get Started') }}</a>
                        </div>
                    </div>
                        </div>
                    </div>
                </div>
                <div class="py-5"></div>
            </section>

            <section id="login">
                <div class="py-5"></div>
                <div class="container ">
                    <p class="text-muted text-center text-uppercase small fw-bolder" style="font-family: 'Montserrat', sans-serif;"><span class="px-2">{{ __('•') }}</span>{{ __('Portals for') }}<span class="px-2">{{ __('•') }}</span></p>
                    <h1 class="text-center display- fw-bold" style="font-family: 'Montserrat', sans-serif; color: #1976d2">{{ __('College of Information and Computing Science') }}</h1>
                    <p class="text-muted mb-4 text-center text-uppercas h3 fw-bolder" style="font-family: 'Montserrat', sans-serif;">{{ __('Automated Student Grading System') }}</p>
                    {{-- <p class="mb-4 h3 text-center d-none d-sm-block" style="font-family: sans-serif;">{{ __('Wanna Be I.T. Team Provides these feaatures 😉') }}</p> --}}
                    <p class="mb-4 h5 text-center d-none d-sm-block fw-bolder" style="font-family: 'Montserrat', sans-serif;">{{ __('Manage your dashboard anywhere, We’ve got you covered. 😉') }}</p>
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <div class="card mb-3 shadow-lg h-auto" style="border-radius:20px; background-color: #b3e5fc" data-aos="fade-up" data-aos-anchor-placement="bottom-bottom" data-aos-easing="linear" data-aos-duration="500">
                                <div class="card-body">
                                    <div class="h-100 p-3 text-center">
                                        <h2 class="fw-bold" style="font-family: 'Montserrat', sans-serif;">{{ __('Admin') }}</h2>
                                        <div class="table-responsive mb-3">
                                            <table class="w3-table">
                                                <tbody>
                                                    <tr>
                                                        <td class="text-center fw-bold py-2 col-lg-1 small" scope="row" style="font-family: 'Montserrat', sans-serif;"><i class="text-success p-1 fs-6 fa-solid fa-circle-check "></i>{{ __('Manages faculty') }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-center fw-bold py-2 col-lg-1 small" scope="row" style="font-family: 'Montserrat', sans-serif;"><i class="text-success p-1 fs-6 fa-solid fa-circle-check "></i>{{ __('Registers Student and Teachers account') }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-center h5 py-2 col-lg-1 fw-bold small" scope="row" style="font-family: 'Montserrat', sans-serif;"><i class="text-success p-1 fs-6 fa-solid fa-circle-check "></i>{{ __('Send notifications to faculty via Email and more...') }}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <a href="{{ route('admin.home') }}" class="btn btn-outline-dark fw-bolder" style="border-radius:20px; font-family: 'Montserrat', sans-serif; font-size: 16px;"><i class="fa-solid fa-right-to-bracket px-2"></i>{{ __('Manage now!') }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12 ">
                            <div class="card mb-3 shadow-lg h-auto" style="border-radius:20px; background-color: #b3e5fc" data-aos="fade-up" data-aos-anchor-placement="bottom-bottom" data-aos-easing="linear" data-aos-duration="500">
                                <div class="card-body">
                                    <div class=" p-3 text-center">
                                        <h2 class="fw-bolder" style="font-family: 'Montserrat', sans-serif;">{{ __('Teacher\'s Portal') }}</h2>
                                        <div class="table-responsive mb-3">
                                            <table class="w3-table">
                                                <tbody>
                                                    <tr>
                                                        <td class="text-center h5 py-2 col-lg-1 fw-bold small" scope="row" style="font-family: 'Montserrat', sans-serif;"><i class="text-success p-1 fs-6 fa-solid fa-circle-check "></i>{{ __('Create your subject') }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-center h5 py-2 col-lg-1 fw-bold small" scope="row" style="font-family: 'Montserrat', sans-serif;"><i class="text-success p-1 fs-6 fa-solid fa-circle-check "></i>{{ __('Share your class code to your corresponding students') }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-center h5 py-2 col-lg-1 fw-bold small" scope="row" style="font-family: 'Montserrat', sans-serif;"><i class="text-success p-1 fs-6 fa-solid fa-circle-check "></i>{{ __('Submit the grades  anywhere!') }}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <a href="{{ route('teacher.home') }}" class="btn btn-outline-dark fw-bolder" style="border-radius:20px; font-family: 'Montserrat', sans-serif; font-size: 16px;"><i class="fa-solid fa-right-to-bracket px-2"></i>{{ __('Start now!') }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <div class="card mb-3 shadow h-auto" style="border-radius:20px; background-color: #b3e5fc" data-aos="fade-up" data-aos-anchor-placement="bottom-bottom" data-aos-easing="linear" data-aos-duration="500">
                                <div class="card-body">
                                    <div class=" p-3 text-center ">
                                        <h2 class="fw-bolder" style="font-family: 'Montserrat', sans-serif;">{{ __('Student\'s Portal') }}</h2>
                                        <div class="table-responsive mb-3">
                                            <table class="w3-table">
                                                <tbody>
                                                    <tr>
                                                        <td class="text-center h5 py-2 col-lg-1 fw-bolder small" scope="row" style="font-family: 'Montserrat', sans-serif;"><i class="text-success p-1 fs-6 fa-solid fa-circle-check "></i>{{ __('Join your subject using class code') }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-center h5 py-2 col-lg-1 fw-bolder small" scope="row" style="font-family: 'Montserrat', sans-serif;"><i class="text-success p-1 fs-6 fa-solid fa-circle-check "></i>{{ __('Download your grades and view your records') }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-center h5 py-2 col-lg-1 fw-bolder small" scope="row" style="font-family: 'Montserrat', sans-serif;"><i class="text-success p-1 fs-6 fa-solid fa-circle-check "></i>{{ __('Get Notification Emails') }}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <a href="{{ route('home') }}" class="btn btn-outline-dark fw-bolder" style="border-radius:20px; font-family: 'Montserrat', sans-serif; font-size: 16px;"><i class="fa-solid fa-right-to-bracket px-2"></i>{{ __('Login now!') }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </section>

            <section id="team" class="team">
                <div class="py-4"></div>
                <div class="container text-center py-5">
                    <p class="text-muted text-uppercase small fw-bold"  style="font-family: 'Montserrat', sans-serif;"><span class="px-2">{{ __('•') }}</span>{{ __('Meet The prestigious Developers') }}<span class="px-2">{{ __('•') }}</span></p>
                    <h1 class="display-3 fw-bold" style="font-family: 'Montserrat', sans-serif;" data-aos="fade-down" data-aos-easing="linear" data-aos-duration="900">{{ __('Wanna Be I.T.\'s Team') }}</h1>
                    <p class="text-muted text-uppercase h3 fw-bolder" style="font-family: 'Montserrat', sans-serif;">{{ __('College of Information and Computing Science') }}</p>
                    <p class="text-muted text-uppercase h3 mb-5 fw-bolder" style="font-family: 'Montserrat', sans-serif;">{{ __('Bachelor of Science in Information Technology — 2D') }}</p>
                    <div class="row">
                        <div class="col-lg-3 col-sm-6 mb-3" data-aos="fade-up" data-aos-anchor-placement="bottom-bottom" data-aos-easing="linear" data-aos-duration="500">
                            <svg class="bd-placeholder-img shadow-lg rounded-circle img-thumbnail border border-info border-5" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#777"/><text x="50%" y="50%" fill="#777" dy=".3em">140x140</text>
                                <image href="{{ asset('storage/images/darkis.jpg') }}" height="150" width="150"/>
                            </svg>
                            <h2 class="fw-bold text-decoration-underline">{{ __('Alhandree Darkis') }}</h2>
                            <p class="text-muted text-uppercase small fw-bolder" style="font-family: 'Montserrat', sans-serif;">{{ __('Project Manager') }}</p>
                            <a href="https://www.facebook.com/alhandree.darkis"><span class="fs-1 px-1 bi bi-facebook"></span></a>
                            <a href="https://github.com/krabyyyyyy"><span class="fs-1 px-1 bi bi-github text-dark"></span></a>
                            <a href="https://www.instagram.com/darkissdarkish/"><span class="fs-1 rounded-circle bi bi-instagram text-danger"></span></a>
                        </div>
                        <div class="col-lg-3 col-sm-6 mb-3"  data-aos="fade-down" data-aos-anchor-placement="bottom-bottom" data-aos-easing="linear" data-aos-duration="500">
                            <svg class="bd-placeholder-img rounded-circle img-thumbnail border border-info border-5" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#777"/><text x="50%" y="50%" fill="#777" dy=".3em">140x140</text>
                                <image href="{{ asset('storage/images/archie.jpg') }}" height="150" width="150"/>
                            </svg>
                            <h2 class="fw-bold text-decoration-underline">{{ __('Archie Manlin') }}</h2>
                            <p class="text-muted text-uppercase small fw-bolder " style="font-family: 'Montserrat', sans-serif;">{{ __('System Analyst') }}</p>
                            <a href="https://www.facebook.com/archie.manlin.37"><span class="fs-1 px-1 bi bi-facebook"></span></a>
                            <a href="https://github.com/SilentPh25"><span class="fs-1 px-2 bi bi-github text-dark"></span></a>
                            <a href="https://www.instagram.com/its_aiichiee"><span class="fs-1 bi bi-instagram text-danger"></span></a>
                        </div>
                        <div class="col-lg-3 col-sm-6 mb-3"  data-aos="fade-up" data-aos-anchor-placement="bottom-bottom" data-aos-easing="linear" data-aos-duration="500">
                            <svg class="bd-placeholder-img rounded-circle text-center img-thumbnail border border-info border-5" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#777"/><text x="50%" y="50%" fill="#777" dy=".3em">140x140</text>
                                <image href="{{ asset('storage/images/gian.jpg') }}" height="150" width="150" class="text-center"/>
                            </svg>
                            <h2 class="fw-bold text-decoration-underline">{{ __('Gian Carlo Pilla') }}</h2>
                            <p class="text-muted text-uppercase small fw-bolder" style="font-family: 'Montserrat', sans-serif;">{{ __('Business Analyst') }}</p>
                            <a href="https://www.facebook.com/giancarlo.pilla.5"><span class="fs-1 px-1 bi bi-facebook"></span></a>
                            <a href="https://github.com/rubickking04"><span class="fs-1 px-2 bi bi-github text-dark"></span></a>
                            <a href=""><span class="fs-1 bi bi-instagram text-danger"></span></a>
                        </div>
                        <div class="col-lg-3 col-sm-6 mb-3"  data-aos="fade-down" data-aos-anchor-placement="bottom-bottom" data-aos-easing="linear" data-aos-duration="500">
                            <svg class="bd-placeholder-img rounded-circle img-thumbnail border border-info border-5" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false">
                                <image href="{{ asset('storage/images/usman.jpg') }}" height="150" width="150"/>
                            </svg>
                            <h2 class="fw-bold text-decoration-underline">{{ __('Al-Fhaigar Usman') }}</h2>
                            <p class="text-muted text-uppercase small fw-bolder" style="font-family: 'Montserrat', sans-serif;">{{ __('Programmer') }}</p>
                            <a href="https://www.facebook.com/alfhaigar.usman.1/"><span class="fs-1 px-1 bi bi-facebook"></span></a>
                            <a href="https://github.com/rubickking04"><span class="fs-1 px-2 bi bi-github text-dark"></span></a>
                            <a href="https://www.instagram.com/kingrubick_04/"><span class="fs-1 bi bi-instagram text-danger"></span></a>
                        </div>
                    </div>
                </div>
            </section>


        <footer class="footer text-center text-white py-5" style=" background: rgb(38, 44, 54)" id="contact">
            <div class="container">
                <p class="text-muted text-uppercase small py-1 fw-bolder" style="font-family: 'Montserrat', sans-serif;"><span class="px-2">{{ __('•') }}</span>{{ __('Contact our developer team') }}<span class="px-2">{{ __('•') }}</span></p>
                <h1 class="display-6 text-info fw-bold mb-4" style="font-family: 'Montserrat', sans-serif;">{{ __('Get in touch with us now!') }}</h1>
                <br>
                <div class="row">
                    <!-- Footer Location-->
                    <div class="col-lg-4 mb-5 mb-lg-0">
                        <h1 class="fw-bold mb-3 display-6" style="font-family: 'Montserrat', sans-serif;">{{ __('Wanna Be Team') }}</h1>
                        <p class="text-capitalize">{{ __('Give up on your dreams and die.') }}</p>
                        <a href="https://www.facebook.com/alfhaigar.usman.1/"><span class="fs-1 px-1 bi bi-facebook text-primary"></span></a>
                        <a href="https://github.com/rubickking04"><span class="fs-1 px-1 bi bi-github text-white"></span></a>
                        <a href="https://www.instagram.com/kingrubick_04/"><span class="fs-1 bi px-1 bi-instagram text-danger"></span></a>
                        {{-- <a href="https://www.instagram.com/kingrubick_04/"><span class="fs-1 fa-solid fa-code-commit text-white"></span></a> --}}
                    </div>
                    <!-- Footer Social Icons-->
                    <div class="col-lg-4 mb-5 mb-lg-0">
                        <div class="text-center container">
                            <h4 class="text-uppercase mb-4" style="font-family: 'Montserrat', sans-serif;">{{ __('Contact Us') }}</h4>
                            <p class="text-lg-start text-sm-center text-center text-truncate" style="font-family: 'Montserrat', sans-serif;"><span class="fs-5 bi bi-geo-alt-fill px-2 text-danger"></span>{{ __('Address : R.T. Lim Boulevard, Zamboanga City') }}</p>
                            <p class="text-lg-start text-sm-center text-center" style="font-family: 'Montserrat', sans-serif;"><span class="fs-5 fa-solid fa-envelope px-2 text-warning" ></span>{{ __('Email : wannabeit2022@gmail.com') }}</p>
                            <p class="text-lg-start text-sm-center text-center" style="font-family: 'Montserrat', sans-serif;"><span class="fs-5 fa-solid fa-phone px-2 text-primary"></span>{{ __('Phone : 09557815639') }}</p>
                        </div>
                    </div>
                    <!-- Footer About Text-->
                    <div class="col-lg-4">
                        <h4 class="text-uppercase mb-4" style="font-family: 'Montserrat', sans-serif;"i class="fs-3 text-primary fa-solid fa-message px-1"></i>{{ __('Message Us Now!') }}</h4>
                        <p class="lead align-items-start d-flex mb-0" style="font-family: 'Montserrat', sans-serif;">{{ __('We are happy to hear your concerns and feedbacks about our system. Help us to improve our system. Thanks folks! 🙂') }}
                        </p>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Copyright Section-->
        <div class="copyright py-3 text-center text-white font-monospace fs-6 bg-dark">
            <div class="container fs-6">© 2022 Made with a <lord-icon
                src="https://cdn.lordicon.com/rjzlnunf.json"
                trigger="loop"
                colors="primary:#ffffff,secondary:#ffffff"
                stroke="90"
                style="width:30px;height:30px">
            </lord-icon> by
            <a href="{{ url('/') }}" class="text-decoration-none">{{ __('Wanna Be\'s') }} </a>. All rights reserved.</div>
        </div>
    </div>
<script src="https://cdn.lordicon.com/libs/mssddfmo/lord-icon-2.1.0.js"></script>
<script src="https://js.pusher.com/7.0/pusher.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init();
</script>
<script>
    function myFunction(x) {
      x.classList.toggle("change");
    }
    </script>

</body>
</html>
