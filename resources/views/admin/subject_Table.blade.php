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
                                    <div class="text-start py-3 fs-4 fw-bold card-title">{{ __('Subjects') }}</div>
                                </div>
                                <div class="col-lg-4 col-md-5 col-sm-6 col-12 py-3">
                                    <form action="{{ route('admin.search.subjects')}}" method="GET" role="search" class="d-flex">
                                        @csrf
                                        <input class="form-control me-2" type="search" name="search" placeholder="Search by Name, Subject and Section" aria-label="Search">
                                        <button class="btn btn-outline-success" type="submit">Search</button>
                                    </form>
                                </div>
                            </div>
                            @if(count($subject)>0)
                                <div class="table-responsive py-3">
                                    <table class="table">
                                        {{-- <thead>
                                            <tr>
                                                <th class="text-center" scope="col">{{ __('Subjects') }}</th>
                                                <th class="text-center" scope="col">{{ __('Instructors') }}</th>
                                            </tr>
                                        </thead> --}}
                                        <tbody>
                                            @foreach ($subject as $subjects)
                                            <tr>
                                                <td  class="text-end col-lg-1 col-md-1 col-sm-1 col-1"  scope="row">
                                                    @if($subjects->teacher->image)
                                                        <img src="{{ asset('/storage/images/'.$subjects->teacher->image)}}"  width="40" height="40" class="rounded-circle">
                                                    @else
                                                        <img src="{{ asset('/storage/images/avatar.png')}}" alt="" width="40" height="40" class="rounded-circle">
                                                    @endif
                                                </td>
                                                <td class="text-start fw-bold text-truncate h6 py-3" scope="row">{{ $subjects->teacher->name.' — '.$subjects->subject.'  '.$subjects->description.' — '.$subjects->section }}</td>
                                            </tr>
                                            @endforeach
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
