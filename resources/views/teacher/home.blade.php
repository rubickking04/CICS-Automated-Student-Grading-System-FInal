@extends('teacher.layouts.sidebar')

@section('content')
<div class="container-fluid">
    <div class="row ">
        @if(count($subject)>0)
        @foreach ($subject as $subjects)
        <div class="col-lg-3 col-md-6 col-sm-6 mb-3">
            <div class="card shadow h-100" style="border-radius:20px;">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-9 col-md-9 col-sm-9 col-9">
                            <a href="{{ route('teacher.class',$subjects->uuid) }}" class="text-start d-block text-truncate h4 fw-bolder text-dark card-title" {{ Popper::delay(500,0)->arrow('round')->pop( $subjects->subject.' - '.$subjects->description); }}>{{ $subjects->subject.' - '.$subjects->description }}</a>
                            <h5 class="text-start fw-bold card-text text-decoration-underline" >{{ 'Section - '.$subjects->section }}</h5>
                            <div class="row">
                                <div class="col-lg-12">
                                    <h5 class="text-start card-text py-2">{{ $subjects->teacher->name }}</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 col-3">
                            <img src="{{ asset('/storage/images/avatar.png')}}" class="border border-info border-3 rounded-circle" alt="" height="50px" width="50px">
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="d-flex justify-content-end px-3">
                        <div class="hstack gap-3">
                            <a href="{{ route('teacher.class.destroy',$subjects->id) }}" onclick="return confirm('Are you sure to unenroll to this subject?')" class="text-danger text-end" ><i class="fa-solid fa-trash-can fs-3" {{ Popper::delay(500,0)->arrow('round')->pop('Unenroll'); }}></i></a>
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
