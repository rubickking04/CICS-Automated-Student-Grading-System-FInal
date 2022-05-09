@extends('layouts.sidebars')

@section('content')
<div class="container">
    <div class=" row justify-content-center">
        <div class="col-lg-8 mb-2">
            <div class="card" style="border-radius: 20px;">
                <div class="card-body">
                    <div class="container-fluid">
                        <p class="text-muted font-monospace">{{ __('You\'re currently signed in as') }}</p>
                        <div class="row">
                            <div class="col-lg-1 col-md-1 col-sm-1 col-3">
                                <img class="rounded-circle border border-info border-3" src="{{asset('/storage/images/avatar.png')}}" height="60" width="60">
                            </div>
                            <div class="col-lg-7 col-md-8 col-sm-8 col-8 ms-lg-3 col-9 mb-3">
                                <p class="h4">{{ Auth::user()->name }}</p>
                                <p class="fs-6">{{ Auth::user()->email }}</p>
                            </div>
                            <div class="col-lg-3 col-md-12 col-sm-12 col-12">
                                    <a href="{{ route('logout') }}" class="btn btn-primary col-lg-12"
                                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();"
                                        style="border-radius:30px;">
                                        <span class=""><i class="fa-solid fa-right-from-bracket fs-6 px-1"></i>{{ __('Sign out') }}</span> </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-8 mb-3">
            <div class="card rounded-4" style="border-radius: 20px;">
                <div class="card-body">
                    <div class="">
                        <p class="h3 ">{{ __('Class code') }}</p>
                        <div class="d-flex justify-content-start">
                            <p class=" fw-bold font-monospace">{{ __('• Ask your teacher for the unique class code, then enter it here.') }}</p>
                        </div>
                        <form action="{{ route('class') }}" method="POST">
                        @csrf
                            <div class="row g-2">
                                <div class="col-lg-7 form-floating mb-2">
                                    <input name="uuid" type="text" class="form-control @error('uuid') is-invalid @enderror @if (session('msg')) is-invalid @endif" id="floatingInput" placeholder="name@example.com">
                                    <label for="floatingInput">{{ __('Enter Unique Class Code Here') }}</label>
                                    @error('uuid')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    @if (session('msg'))
                                        <span class="text-danger small" role="alert">
                                            <strong>{{ session('msg') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary col-lg-3 col-4" style="border-radius:30px;">{{ __('Join') }}</button>
                            <a href="{{ URL::previous() }}" class="btn btn-danger col-lg-3 col-4" style="border-radius:30px;">{{ __('Cancel') }}</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="container">
                <p class="h5 fw-bold font-monospace">{{ __('To Sign-in with a class code: ') }}</p>
                <p class="fs-6 px-3 font-monospace">{{ __('•  Use an authorized account') }}</p>
                <p class="fs-6 px-3 font-monospace">{{ __('•  Use a class code with 36 letters or numbers') }}</p>
            </div>
        </div>
    </div>
</div>
@endsection
