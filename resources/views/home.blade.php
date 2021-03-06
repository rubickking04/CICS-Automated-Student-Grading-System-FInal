@extends('layouts.sidebars')

@section('content')
    <div class="container-fluid">
        <div class="row no-gutters">
            @if(count($lesson)>0)
            @foreach ($lesson as $lessons)
            <div class="col-lg-3 col-md-6 col-sm-6 mb-3">
                <div class="card shadow h-100" style="border-radius:20px;">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-9 col-md-9 col-sm-9 col-9">
                                <a href="{{ route('my-class',$lessons->uuid) }}" class="text-start d-block text-truncate h4 fw-bolder text-dark card-title" {{ Popper::delay(500,0)->arrow('round')->pop( $lessons->subject.' - '.$lessons->description); }}>{{ $lessons->subject.' - '.$lessons->description }}</a>
                                <h5 class="text-start fw-bold card-text " >{{ 'Section - '.$lessons->section }}</h5>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <h5 class="text-start card-text py-2">{{ $lessons->teachers->name }}</h5>
                                    </div>
                                </div>
                                @if (empty($lessons->grades))
                                    <span class="text-muted">{{ __(' ') }}</span>
                                @else
                                    <span class="text-muted text-end fw-bold">{{ __('Graded '.$lessons->created_at->diffForHumans()) }}</span>
                                @endif
                                {{-- <p>{{ $subjects->uuid }}</p> --}}
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3 col-3">
                                <img src="{{ asset('/storage/images/avatar.png')}}" class="border border-info border-3 rounded-circle" alt="" height="50px" width="50px">
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="d-flex justify-content-end px-3">
                            <div class="hstack gap-3">
                                @if (empty($lessons->grades))
                                    <a href="{{ route('destroy.subject',$lessons->id) }}" onclick="return confirm('Are you sure to unenroll to this subject?')" class="text-danger text-end " ><i class="fa-solid fa-trash-can fs-3" {{ Popper::delay(500,0)->arrow('round')->pop('Unenroll'); }}></i></a>
                                @else
                                    <a href="#" class="text-info text-end" data-bs-toggle="modal" data-bs-target="#exampleModalCenter{{ $lessons->id }}" ><i class="fa-solid fa-eye fs-3" {{ Popper::delay(500,0)->arrow('round')->pop('View'); }}></i></a>
                                    <div class="modal fade modal-alert" id="exampleModalCenter{{ $lessons->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content shadow" style="border-radius:20px;">
                                                <div class="modal-body p-4 text-center">
                                                    <div class="row">
                                                        <div class="thumb-lg member-thumb ms-auto">
                                                            <img src="{{ asset('/storage/images/avatar.png')}}" class="border border-info border-5 rounded-circle img-thumbnail" alt="" height="100px" width="100px">
                                                        </div>
                                                        <h2 class="fw-bold mb-0">{{ Auth::user()->name }}</h2>
                                                        <h5 class="">{{ __('Email: ') }}{{ Auth::user()->email }}</h5>
                                                        <div class="container">
                                                            <div class="text-start">
                                                                <div class="col-lg-12">
                                                                    <label for="body" class="form-label">{{ __('Message:') }}</label>
                                                                    <textarea type="text"  class="form-control text-wrap @error('body') is-invalid @enderror" name="body" id="body" rows="3" readonly>{{ $lessons->grades->body }}</textarea>
                                                                @error('body')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-lg-6">
                                                                        <label for="body" class="col-form-label">{{ __('Midterm:') }}</label>
                                                                        <input name="midterm" type="text" placeholder="No Grade" class="form-control mb-3 @error('midterm') is-invalid @enderror" readonly value="{{ $lessons->grades->midterm }}">
                                                                        @error('midterm')
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                        @enderror
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <label for="body" class="col-form-label">{{ __('Final Term:') }}</label>
                                                                        <input name="finalterm" type="text" placeholder="No Grade" class="form-control mb-3  @error('finalterm') is-invalid @enderror" readonly value="{{ $lessons->grades->finalterm }}">
                                                                        @error('finalterm')
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            {{-- <div class="row">
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
                                                                        @if(empty($lessons->grades))
                                                                            <span class="small px-1">{{ __(' ') }}</span>
                                                                        @else
                                                                            <span class="small px-1 text-muted fw-bold"><i class="fa-solid fa-earth-americas px-2"></i>{{ $lessons->grades->created_at->diffForHumans() }}</span>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div> --}}
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
