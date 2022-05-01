@extends('teacher.layouts.sidebar')

@section('content')
<div class="container-fluid">
    <div class="row ">
        @if(count($subject)>0)
        @foreach ($subject as $subjects)
        <div class="col-lg-3 col-md-6 col-sm-6 mb-3">
            <div class="card shadow h-100 py-3" style="border-radius:10px;">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-8 col-md-8 col-sm-8 col-8">
                            <a href="{{ route('teacher.class',$subjects->uuid) }}" class="text-start d-block text-truncate h4 fw-bolder text-dark card-title" {{ Popper::delay(500,0)->arrow('round')->pop( $subjects->subject.' - '.$subjects->description); }}>{{ $subjects->subject.' - '.$subjects->description }}</a>
                            <h5 class="text-start fw-bold card-text text-decoration-underline" >{{ 'Section - '.$subjects->section }}</h5>
                            <h5 class="text-start card-text py-3">{{ $subjects->teacher->name }}</h5>
                            {{-- <p>{{ $subjects->uuid }}</p> --}}
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-4">
                            <img src="{{ asset('/storage/images/avatar.png')}}" class="border border-info border-3 rounded-circle img-thumbnail" alt="" height="100px" width="100px">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        @else
        <div class="col-lg-12 py-5">
            <div class="py-5">
                <h1 class="text-center" style="font-size: 100px">
                    <i class="bi bi-folder-x"></i>
                </h1>
                <div class="card-body">
                    <h5 class="card-title fs-2 text-center">{{ __('Create your subjects now.') }}</h5>
                    <div class="text-center">
                        <a href="{{ route('teacher.subject') }}" class="fs-4 text-decoration-none btn btn-primary"><i class="bi bi-folder-plus px-2"></i>{{ __('Get Started') }}</a>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection
