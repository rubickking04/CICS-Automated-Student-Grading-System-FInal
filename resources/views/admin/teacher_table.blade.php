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
                                    <div class="text-start py-3 fs-4 fw-bold card-title">{{ __('Teacher') }}</div>
                                </div>
                                <div class="col-lg-4 col-md-5 col-sm-6 col-12">
                                    {{-- <div class="text-end fs-6 py-3 fw-bold card-title">{{ $teach->count() }} {{ Str::plural(' teacher',$teach->count()) }}</div> --}}
                                    <div class="text-end fs-6 py-3 fw-bold card-title">
                                        <form action="{{ route('admin.search')}}" method="GET" role="search" class="d-flex">
                                            @csrf
                                            <input class="form-control me-2" type="search" name="search" placeholder="Search Name or Email" aria-label="Search">
                                            <button class="btn btn-outline-success" type="submit">Search</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive py-3">
                                <table class="table">
                                    <tbody>
                                        @if (session('msg'))
                                        <div class="col-lg-12 py-1">
                                            <h1 class="text-center justify-content-center">
                                                <i class="fa-solid display-1 text-info fa-circle-exclamation"></i>
                                            </h1>
                                            <div class="card-body">
                                                <p class="h2 fw-bold text-danger text-center">{{ session('msg') }}</p>
                                                <h5 class="card-title fw-bold text-center">{{ __('Search Result Not Found') }}</h5>
                                            </div>
                                        </div>
                                        @else
                                        @foreach ( $teach as  $teachers)
                                        <tr>
                                            <td  class="text-end col-lg-1 col-md-1 col-sm-1 col-1"  scope="row">
                                                @if($teachers->image)
                                                    <img src="{{ asset('/storage/images/'.$teachers->image)}}"  width="40" height="40" class="rounded-circle">
                                                @else
                                                    <img src="{{ asset('/storage/images/avatar.png')}}" alt="" width="40" height="40" class="rounded-circle">
                                                @endif
                                            </td>
                                            <td  class="text-start fw-bold h6 py-3" scope="row">{{ $teachers->name }}</td>
                                            <td  class="text-end" scope="row">
                                                <div class="dropdown">
                                                    <a class="btn btn-outline-primary border-0 fs-5 rounded-circle" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-three-dots-vertical"></i></a>
                                                    <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                                                        <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#exampleModalCenter{{ $teachers->id }}"><i class="fa-solid fa-eye fs-5 px-2"></i>{{ __('View') }}</a></li>
                                                        <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#exampleModalCenter{{ $teachers->id }}"><i class="fa-solid fa-pen-clip fs-5 px-2"></i>{{ __('Update') }}</a></li>
                                                        <li><a class="dropdown-item" href="{{ url('/admin/teacher/destroy',$teachers->id) }}" onclick="return confirm('Are you sure to remove this teacher?')"><i class="fa-solid fs-5 fa-trash-can px-2"></i>{{ __('Remove') }}</a></li>
                                                    </ul>
                                                </div>
                                                <div class="modal fade modal-alert" id="exampleModalCenter{{ $teachers->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content shadow" style="border-radius:20px;">
                                                            <div class="modal-header flex-nowrap border-bottom-0">
                                                                <button type="button" class="btn-close btn-close-white"data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body p-4 text-center">
                                                                <div class="thumb-lg member-thumb mx-auto">
                                                                    <img src="{{ asset('/storage/images/avatar.png')}}" class="border border-info border-5 rounded-circle img-thumbnail" alt="" height="150px" width="150px">
                                                                </div>
                                                                <h2 class="fw-bold mb-0">{{ $teachers->name }}</h2>
                                                                <h5 class="my-2 mb-0 ">{{ __('ID Number: ') }}{{ $teachers->id }}</h5>
                                                                <p class="">{{ __('@Email ') }}<span>| </span><span><a href="#" class=" text-decoration-none">{{ $teachers->email }}</a></span></p>
                                                                <button type="button" class="btn btn-danger col-3" data-bs-dismiss="modal" style="border-radius:20px;">{{ __('Close') }}</button>
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
                                {{ $teach->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    @endsection
