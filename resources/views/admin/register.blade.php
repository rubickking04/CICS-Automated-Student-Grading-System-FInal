@extends('admin.layouts.sidebars')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card" style="border-radius: 20px">
                <div class="row py-3 text-center">
                    <div class="col-md-12">
                        <img src="{{asset('/storage/images/logo.png')}}" alt="avatar" class="rounded-circle img-thumbnail" style="width: 100px;">
                        <h5 class="fw-bolder">{{ __('College of Information and Computing Science') }}</h5>
                        <h6 class="fw-bolder">{{ __('Student Registration Form') }}</h6>
                    </div>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label for="name" class="col-form-label">{{ __('Name') }}</label>
                                <input id="name" type="text" placeholder="Your name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" >
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <label for="email" class="col-form-label">{{ __('Email Address') }}</label>
                                <div class="input-group">
                                    <div class="input-group-text"><i class="bi bi-envelope-fill"></i></div>
                                    <input id="email" type="email" placeholder="yourname@gmail.com" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <label for="student_type" class="col-form-label">{{ __('Student Type') }}</label>
                                <select name="student_type" id="student_type" class="form-control form-select my-select @error('student_type') is-invalid @enderror" name="student_type" value="{{ old('student_type') }}">
                                    <option disabled selected>Choose...</option>
                                    <option value="Regular Student">{{ __('Regular') }}</option>
                                    <option value="Irregular Student">{{ __('Irregular Student') }}</option>
                                </select>
                                    @error('student_type')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>


                            <div class="col-md-7">
                                <label for="address" class="col-form-label">{{ __('Address') }}</label>
                                <div class="input-group">
                                    <div class="input-group-text"><i class="fa fa-location-arrow"></i></div>
                                <input id="address" type="text" placeholder="R.T. Lim Boulevard, Baliwasan, Zamboanga City" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}">
                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                            </div>

                            <div class="col-md-5">
                                <label for="student_status" class="col-form-label">{{ __('Status of Registration') }}</label>
                                <select name="student_status" id="student_type" class="form-control form-select my-select @error('student_status') is-invalid @enderror" name="student_status" value="{{ old('student_status') }}">
                                    <option disabled selected>Choose...</option>
                                    <option value="New Student">{{ __('New Student') }}</option>
                                    <option value="Old Student">{{ __('Old Student') }}</option>
                                    <option value="Shifting Student">{{ __('Shifting Student') }}</option>
                                    <option value="Transferee">{{ __('Transferee') }}</option>
                                </select>
                                    @error('student_status')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>

                            <div class="col-md-4">
                                <label for="phone" class="col-form-label">{{ __('Phone Number') }}</label>
                                <input id="phone" type="text" placeholder="09557815639" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}">
                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <label for="gender" class="col-form-label">{{ __('Gender') }}</label>
                                <select id="gender" type="text" class="form-control form-select @error('gender') is-invalid @enderror" name="gender" value="{{ old('gender') }}" autocomplete="gender" autofocus>
                                    <option disabled class="text-muted">{{ ('Choose your gender...') }}</option>
                                    <option value="Male">{{ __('Male') }}</option>
                                    <option value="Female">{{ __('Female') }}</option>
                                </select>
                                @error('gender')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <label for="birth_date" class="col-form-label">{{ __('Birthday') }}</label>
                                <input id="birth_date" type="date" class="form-control @error('birth_date') is-invalid @enderror" name="birth_date" value="{{ old('birth_date') }}">
                                @error('birth_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="password" class="col-form-label">{{ __('Password') }}</label>
                                <div class="input-group">
                                    <span class="input-group-text" onclick="password_show_hide();">
                                        <i class="fas fa-eye" id="show_eye"></i>
                                        <i class="fas fa-eye-slash d-none" id="hide_eye"></i>
                                    </span>
                                <input id="password" type="password" placeholder="Must be 8-20 characters long." class="form-control @error('password') is-invalid @enderror" name="password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label for="password-confirm" class="col-form-label">{{ __('Confirm Password') }}</label>
                                <div class="input-group">
                                    <span class="input-group-text" onclick="password_show_hides();">
                                        <i class="fas fa-eye" id="show_eyes"></i>
                                        <i class="fas fa-eye-slash d-none" id="hide_eyes"></i>
                                    </span>
                                <input id="password-confirm" placeholder="Must same with your password." type="password" class="form-control" name="password_confirmation">
                                </div>
                            </div>
                        </div>
                        <div class="row mb-0">
                            <div class="">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
