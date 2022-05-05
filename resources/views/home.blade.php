@extends('layouts.sidebar')

@section('content')
    <div class="container-fluid">
        <div class="row ">
            @if(count($lesson)>0)
            @foreach ($lesson as $lessons)
            <div class="col-lg-3 col-md-6 col-sm-6 mb-3">
                <div class="card shadow h-100" style="border-radius:20px;">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-8 col-md-8 col-sm-8 col-8">
                                <a href="{{ route('my-class',$lessons->uuid) }}" class="text-start d-block text-truncate h4 fw-bolder text-dark card-title" {{ Popper::delay(500,0)->arrow('round')->pop( $lessons->subject.' - '.$lessons->description); }}>{{ $lessons->subject.' - '.$lessons->description }}</a>
                                <h5 class="text-start fw-bold card-text " >{{ 'Section - '.$lessons->section }}</h5>
                                <h5 class="text-start card-text py-3">{{ $lessons->teachers->name }}</h5>
                                @if (empty($lessons->grades))
                                    <span class="text-muted">{{ __(' ') }}</span>
                                @else
                                    <span class="text-muted text-end fw-bold">{{ __('Graded '.$lessons->created_at->diffForHumans()) }}</span>
                                @endif
                                {{-- <p>{{ $subjects->uuid }}</p> --}}
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-4">
                                <img src="{{ asset('/storage/images/avatar.png')}}" class="border border-info border-3 rounded-circle img-thumbnail" alt="" height="100px" width="100px">
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="d-flex justify-content-end px-3">
                            <div class="hstack gap-3">
                                @if (empty($lessons->grades))
                                    <a href="{{ route('destroy',$lessons->id) }}" onclick="return confirm('Are you sure to unenroll to this subject?')" class="text-danger text-end " ><i class="fa-solid fa-trash-can fs-3" {{ Popper::delay(500,0)->arrow('round')->pop('Unenroll'); }}></i></a>
                                @else
                                    {{-- <a href="{{ url('/download') }}" class="text-success text-end"><i class="fa-solid fa-download px-1 fs-3" {{ Popper::delay(500,0)->arrow('round')->pop('View'); }}></i></a> --}}
                                    <a href="#" class="text-info text-end" data-bs-toggle="modal" data-bs-target="#exampleModalCenter{{ $lessons->id }}" ><i class="fa-solid fa-eye fs-3" {{ Popper::delay(500,0)->arrow('round')->pop('View'); }}></i></a>
                                    <div class="modal fade modal-alert" id="exampleModalCenter{{ $lessons->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content shadow" style="border-radius:20px;">
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-lg-2 col-md-1 col-sm-1 ms-2 text-end d-none d-sm-block">
                                                            <img class="rounded-circle text-end border border-info border-3" src="{{asset('/storage/images/avatar.png')}}" height="75" width="75">
                                                        </div>
                                                        <div class="col-lg-9 col-md-8 col-sm-8 col-12 ms-lg-3 ms-3 mb-3 py-2">
                                                            <p class="text-start fw-bold h4">{{ Auth::user()->name }}</p>
                                                            <p class="text-start fw-bold fs-5">{{ $lessons->subject.' - '.$lessons->description }}</p>
                                                            <p class="text-start fw-bold fs-5">{{ $lessons->teachers->name }}</p>
                                                        </div>
                                                        <div class="container">
                                                            <div class="row">
                                                                <div class="text-start">
                                                                    <div class="table-responsive">
                                                                        <table class="table">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th class="text-center" scope="col">Midterm</th>
                                                                                    <th class="text-center" scope="col">Finalterm</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td class="text-center" scope="row">
                                                                                        <input type="text" class="form-control" value="{{ $lessons->grades->midterm }}" readonly>
                                                                                    </td>
                                                                                    <td class="text-center" scope="row">
                                                                                        <input type="text" class="form-control" value="{{ $lessons->grades->finalterm }}" readonly>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="text-center">
                                                        <a href="{{ route('grade') }}" class="btn btn-primary col-3" style="border-radius:20px;">{{ __('View') }}</a>
                                                        <button type="button" class="btn btn-danger col-3" data-bs-dismiss="modal" style="border-radius:20px;">{{ __('Close') }}</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="{{ route('destroy',$lessons->id) }}" onclick="return confirm('All the records here will be permantly deleted. Are you sure to unenroll to this subject? ')" class="text-danger text-end " ><i class="fa-solid fa-trash-can fs-3" {{ Popper::delay(500,0)->arrow('round')->pop('Unenroll'); }}></i></a>
                                @endif
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
                        <h5 class="card-title fs-2 text-center">{{ __('Add a class to get started.') }}</h5>
                        <div class="text-center">
                            <a href="{{ route('subject') }}" class="fs-4 text-decoration-none btn btn-primary"><i class="bi bi-folder-plus px-2"></i>{{ __('Get Started') }}</a>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
@endsection
