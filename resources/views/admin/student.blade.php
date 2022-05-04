@extends('admin.layouts.sidebar')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card shadow" style="border-radius: 20px">
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col-lg-11 col-11">
                            <div class="row border-bottom border-2 border-primary">
                                <div class="col-lg-8 col-md-7 col-sm-6 col-6 d-none d-sm-block">
                                    <div class="text-start py-3 fs-4 fw-bold card-title">{{ __('Students') }}</div>
                                </div>
                                <div class="col-lg-4 col-md-5 col-sm-6 col-12 py-3">
                                    <form action="{{ route('admin.searchStudent')}}" method="GET" role="search" class="d-flex">
                                        @csrf
                                        <input class="form-control me-2" type="search" name="search" placeholder="Search Name or Email" aria-label="Search">
                                        <button class="btn btn-outline-success" type="submit">Search</button>
                                    </form>
                                </div>
                            </div>
                            <div class="table-responsive py-3">
                                <table class="table">
                                    <tbody>
                                        @if (session('msg'))
                                        <div class="col-lg-12 py-3">
                                            <h1 class="text-center justify-content-center">
                                                <i class="fa-solid display-1 text-info fa-circle-exclamation"></i>
                                            </h1>
                                            <div class="card-body">
                                                <p class="h2 fw-bold text-danger text-center">{{ session('msg') }}</p>
                                                <h5 class="card-title fw-bold text-center">{{ __('Search Result Not Found') }}</h5>
                                            </div>
                                        </div>
                                        @else
                                        @foreach ( $user as  $users)
                                        <tr>
                                            {{-- <th  class="text-center fs-5 py-3 d-none d-sm-block">{{ $users->id }}</th> --}}
                                            <td  class="text-end col-lg-1 col-md-1 col-sm-1 col-1" scope="row">
                                                @if($users->image)
                                                    <img src="{{ asset('/storage/images/'.$user->image)}}" class="img-fluid" alt="">
                                                @else
                                                    <img src="{{ asset('/storage/images/avatar.png')}}" alt="hugenerd" width="40" height="40" class="rounded-circle">
                                                @endif
                                            </td>
                                            <td  class="text-start fw-bold h6 py-3" scope="row">{{ $users->name }}</td>
                                            <td  class="text-start" scope="row">{{ __(' ') }}</td>
                                            <td  class="text-end" scope="row">
                                                <div class="dropdown">
                                                    <a class="btn btn-outline-primary border-0 fs-5 rounded-circle" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-three-dots-vertical"></i></a>
                                                    <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                                                        <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#exampleModalCenter{{ $users->id }}"><i class="fa-solid fa-eye fs-5 px-2"></i>{{ __('View') }}</a></li>
                                                        <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#exampleModalCenters{{ $users->id }}"><i class="fa-solid fa-pen-clip fs-5 px-2"></i>{{ __('Update') }}</a></li>
                                                        <li><a class="dropdown-item" href="{{ route('admin.student.destroy',$users->id) }}" onclick="return confirm('Are you sure to remove this student?')"><i class="fa-solid fs-5 fa-trash-can px-2"></i>{{ __('Remove') }}</a></li>
                                                    </ul>
                                                </div>
                                                {{-- View Profile Modal --}}
                                                <div class="modal fade modal-alert" id="exampleModalCenter{{ $users->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog ">
                                                    <div class="modal-content shadow" style="border-radius:20px; ">
                                                        <div class="modal-header flex-nowrap border-bottom-0">
                                                            <button type="button" class="btn-close"data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body p-4 text-center">
                                                            <div class="thumb-lg member-thumb ms-auto">
                                                                <img src="{{ asset('/storage/images/avatar.png')}}" class="border border-info border-5 rounded-circle img-thumbnail" alt="" height="150px" width="150px">
                                                            </div>
                                                            <h2 class="fw-bold mb-0">{{ $users->name }}</h2>
                                                            <h5 class="my-2 mb-0 ">{{ __('ID Number: ') }}{{ $users->id }}</h5>
                                                            <p class="">{{ __('@Email ') }}<span>| </span><span><a href="#" class=" text-decoration-none">{{ $users->email }}</a></span></p>
                                                            {{-- <a href="{{ route('admin.student.profile',$users->email) }}" class="btn btn-primary col-3 fw-bolder" style="border-radius:20px;">{{ __('View more') }}</a> --}}
                                                            <button type="button" class="btn btn-danger col-3" data-bs-dismiss="modal" style="border-radius:20px;">{{ __('Close') }}</button>
                                                        </div>
                                                        {{-- <div class="modal-footer flex-nowrap p-0">
                                                            <a href="#" class="btn btn-lg btn-link fs-6 text-decoration-none col-6 m-0 rounded-0 fw-bolder border-right">{{ __('View more') }}</a>
                                                            <button type="button" class="btn btn-lg btn-link fs-6 text-danger fw-bold text-decoration-none col-6 m-0 rounded-0" data-bs-dismiss="modal">{{ __('Close') }}</button>
                                                        </div> --}}
                                                    </div>
                                                    </div>
                                                </div>
                                                {{-- Update Profile Modal --}}
                                                <div class="modal fade modal-alert" id="exampleModalCenters{{ $users->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content shadow" style="border-radius:20px; ">
                                                            <div class="modal-header flex-nowrap border-bottom-0">
                                                                <button type="button" class="btn-close"data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body text-center">
                                                                <div class="thumb-lg member-thumb ms-auto">
                                                                    <img src="{{ asset('/storage/images/avatar.png')}}" class="border border-info border-5 rounded-circle img-thumbnail" alt="" height="100px" width="100px">
                                                                </div>
                                                                <h2 class="fw-bold mb-0">{{ $users->name }}</h2>
                                                                <form action="{{ url('/admin/student/updates/'.$users->id) }}" method="POST">
                                                                    @csrf
                                                                    <div class="row mb-3">
                                                                        <div class="col-md-6 text-start">
                                                                            <label for="name" class="col-form-label">{{ __('Name') }}</label>
                                                                            <input id="name" type="text" placeholder="Your name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $users->name }}" >
                                                                            @error('name')
                                                                                <span class="invalid-feedback" role="alert">
                                                                                    <strong>{{ $message }}</strong>
                                                                                </span>
                                                                            @enderror
                                                                        </div>

                                                                        <div class="col-md-6 text-start">
                                                                            <label for="email" class="col-form-label">{{ __('Email Address') }}</label>
                                                                            <div class="input-group">
                                                                                <div class="input-group-text"><i class="bi bi-envelope-fill"></i></div>
                                                                                <input id="email" type="email" placeholder="yourname@gmail.com" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $users->email }}">
                                                                                @error('email')
                                                                                    <span class="invalid-feedback" role="alert">
                                                                                        <strong>{{ $message }}</strong>
                                                                                    </span>
                                                                                @enderror
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-md-6 text-start">
                                                                            <label for="phone" class="col-form-label">{{ __('Phone Number') }}</label>
                                                                            <input id="phone" type="text" placeholder="09557815639" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ $users->phone }}">
                                                                            @error('phone')
                                                                                <span class="invalid-feedback" role="alert">
                                                                                    <strong>{{ $message }}</strong>
                                                                                </span>
                                                                            @enderror
                                                                        </div>

                                                                        <div class="col-md-6 text-start">
                                                                            <label for="address" class="col-form-label">{{ __('Address') }}</label>
                                                                            <div class="input-group">
                                                                                <div class="input-group-text"><i class="fa fa-location-arrow"></i></div>
                                                                            <input id="address" type="text" placeholder="R.T. Lim Boulevard, Baliwasan, Zamboanga City" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ $users->address }}">
                                                                            @error('address')
                                                                                <span class="invalid-feedback" role="alert">
                                                                                    <strong>{{ $message }}</strong>
                                                                                </span>
                                                                            @enderror
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-md-6 col-6 text-start">
                                                                            <label for="gender" class="col-form-label">{{ __('Gender') }}</label>
                                                                            <select id="gender" type="text" class="form-control form-select @error('gender') is-invalid @enderror" name="gender" value="">
                                                                                <option disabled class="text-muted">{{ $users->gender }}</option>
                                                                                <option value="Male">{{ __('Male') }}</option>
                                                                                <option value="Female">{{ __('Female') }}</option>
                                                                            </select>
                                                                            @error('gender')
                                                                                <span class="invalid-feedback" role="alert">
                                                                                    <strong>{{ $message }}</strong>
                                                                                </span>
                                                                            @enderror
                                                                        </div>

                                                                        <div class="col-md-6 col-6 text-start">
                                                                            <label for="birth_date" class="col-form-label">{{ __('Birthday') }}</label>
                                                                            <input id="birth_date" type="date" class="form-control @error('birth_date') is-invalid @enderror" name="birth_date" value="{{ $users->birth_date }}">
                                                                            @error('birth_date')
                                                                                <span class="invalid-feedback" role="alert">
                                                                                    <strong>{{ $message }}</strong>
                                                                                </span>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                <button type="submit" class="btn btn-primary col-lg-2 col-5 fw-bolder" style="border-radius:20px;">{{ __('Update') }}</button>
                                                                <button type="button" class="btn btn-danger col-lg-2 col-5" data-bs-dismiss="modal" style="border-radius:20px;">{{ __('Close') }}</button>
                                                            </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                        @endif
                                    </tbody>
                                </table>
                                {{ $user->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
