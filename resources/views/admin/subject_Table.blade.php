@extends('admin.layouts.sidebar')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card shadow" style="border-radius: 20px">
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col-lg-11 col-11">
                            <div class="row border-bottom border-2 border-warning">
                                <div class="col-lg-8 col-md-7 col-sm-6 col-6 d-none d-sm-block">
                                    <div class="text-start py-3 fs-4 fw-bold card-title">{{ __('Subjects') }}</div>
                                </div>
                                <div class="col-lg-4 col-md-5 col-sm-6 col-12 py-3">
                                    <form action="{{ route('admin.search.subjects')}}" method="GET" role="search" class="d-flex">
                                        @csrf
                                        <input class="form-control me-2 border border-warning" type="search" name="search" placeholder="Search by Name, Subject and Section" aria-label="Search">
                                        <button class="btn btn-warning" type="submit"><i class="fa-solid fa-magnifying-glass text-white"></i></button>
                                    </form>
                                </div>
                            </div>
                            @if(count($subject)>0)
                                <div class="table-responsive py-3">
                                    <table class="table">
                                        <tbody>
                                            @if (session('msg'))
                                            <div class="col-lg-12 py-1">
                                                <h1 class="text-center justify-content-center">
                                                    <i class="fa-solid display-1 text-info fa-circle-exclamation"></i>
                                                </h1>
                                                <div class="card-body">
                                                    <p class="h2 fw-bold text-danger text-center">{{ __('ERROR 404 | Not Found!') }}</p>
                                                    <h5 class="card-title fw-bold text-center">{{ session('msg') }}</h5>
                                                    <p class="card-text fw-bold text-center text-muted">{{ __('Sorry, but the name you were looking for was either not found or does not exist.') }}</p>
                                                    <div class="row justify-content-center">
                                                        <div class="col-xl-6 col-lg-10 col-md-10 col-sm-10 col-12">
                                                            <div class="row">
                                                                <form action="{{ route('admin.search.subjects')}}" method="GET" role="search" class="d-flex">
                                                                    @csrf
                                                                    <div class="input-group">
                                                                        <input class="form-control me-2 border border-warning" type="search" name="search" placeholder="Please try again to search by Teachers Name, Subject Code or Section" aria-label="Search">
                                                                        <div class="input-group-text bg-warning">
                                                                            <button class="btn " type="submit"><i class="fa-solid fa-magnifying-glass text-white"></i></button>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @else
                                            @foreach ($subject as $subjects)
                                            <tr>
                                                <td  class="text-end col-lg-1 col-md-1 col-sm-1 col-1"  scope="row">
                                                    @if($subjects->teacher->image)
                                                        <img src="{{ asset('/storage/images/'.$subjects->teacher->image)}}"  width="40" height="40" class="rounded-circle">
                                                    @else
                                                        <img src="{{ asset('/storage/images/avatar.png')}}" alt="" width="40" height="40" class="rounded-circle">
                                                    @endif
                                                </td>
                                                <td class="text-start fw-bold text-truncate h6 py-3" scope="row">
                                                    <a href="#" class="text-decoration-none text-dark">{{ $subjects->section .' — '. $subjects->subject.'  '.$subjects->description.' — '. $subjects->teacher->name }}</a>
                                                </td>
                                                <td  class="text-end" scope="row">
                                                    <div class="dropdown">
                                                        <a class="btn btn-outline-warning border-0 fs-5 rounded-circle" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-three-dots-vertical"></i></a>
                                                        <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                                                            <li><a class="dropdown-item" href="{{ route('admin.subject.destroy',$subjects->id) }}" onclick="return confirm('Are you sure to remove this subject?')"><i class="fa-solid fs-5 fa-trash-can px-2"></i>{{ __('Remove') }}</a></li>
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                    {{ $subject->links() }}
                                </div>
                            @else
                            <div class="col-lg-12 mb-3 ">
                                <div class="mb-3 py-4">
                                    <div class="text-center display-1">
                                        <i class="bi bi-folder-x display-1"></i>
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title fs-3 text-center">{{ __('No Subjects Created yet.') }}</h5>
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
