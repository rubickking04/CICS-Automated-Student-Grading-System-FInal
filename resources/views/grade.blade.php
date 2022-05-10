@extends('layouts.sidebars')
@section('content')
<div class="container py-3">
    <div class="row justify-content-center">
        <div class="col-lg-10 col-12">
            <div class="card shadow" style="border-radius: 20px">
                <div class="card-body">
                    <div class="container-fluid">
                        <div class="row py-4">
                            <div class="col-lg-2 col-md-2 text-end py-4 d-none d-md-block">
                                <img src="{{asset('/storage/images/zppsu.png')}}" alt="avatar" height="100px" width="100px">
                            </div>
                            <div class="col-lg-8 col-md-8 d-none d-md-block">
                                <p class="text-center fw-bold h3">{{ __('Republic of the Philippines') }}</p>
                                <p class="text-center fw-bold h4">{{ __('Zamboanga Peninsula Polytechnic State University') }}</p>
                                <p class="text-center fw-bold h4">{{ __('College of Information and Computing Science') }}</p>
                                <p class="text-center fw-bold h5">{{ __('R.T. Lim Boulevard Baliwasan, Zamboanga City') }}</p>
                            </div>
                            <div class="col-lg-2 col-md-2 text-start py-4 mb-3 d-none d-md-block">
                                <img src="{{asset('/storage/images/logo.png')}}" alt="avatar" height="100px" width="100px">
                            </div>
                        <hr class="d-none d-md-block">
                        </div>
                        <div class="">
                            <div class="row">
                                <div class="col-lg-8">
                                    <p class="h5 ">{{ __('Name: ') }}<strong> {{ Auth::user()->name }}</strong></p>
                                    <p class="h5">{{ __('Gender: ') }}<strong> {{ Auth::user()->gender }}</strong></p>
                                </div>
                                <div class="col-lg-4">
                                    <p class="h5 ">{{ __('Section: ') }}<strong> {{ __('D') }}</strong></p>
                                </div>
                            </div>
                            <div class="table-responsive py-2">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr class="table-primary">
                                            <th class="text-center" scope="col">{{ __('Subject') }}</th>
                                            <th class="text-center" scope="col">{{ __('Midterm') }}</th>
                                            <th class="text-center" scope="col">{{ __('Finalterm') }}</th>
                                            <th class="text-center" scope="col">{{ __('Total') }}</th>
                                            <th class="text-center" scope="col">{{ __('Remarks') }}</th>
                                            <th class="text-center" scope="col">{{ __('Instructor') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($lesson as $lessons )
                                        @if (empty($lessons->grades))
                                        <tr>
                                            <td class="text-start" scope="row">{{ $lessons->subject.' - '.$lessons->description }}</td>
                                            <td class="text-start" scope="row">{{ __(' ') }}</td>
                                            <td class="text-start" scope="row">{{ __(' ') }}</td>
                                            <td class="text-start" scope="row">{{ __(' ') }}</td>
                                            <td class="text-start" scope="row">{{ __(' ') }}</td>
                                            <td class="text-center" scope="row">{{ $lessons->teachers->name }}</td>
                                        </tr>
                                        @else
                                        <tr>
                                            <td class="text-start" scope="row">{{ $lessons->subject.' - '.$lessons->description }}</td>
                                            <td class="text-center" scope="row">{{ $lessons->grades->midterm }}</td>
                                            <td class="text-center" scope="row">{{ $lessons->grades->finalterm }}</td>
                                            <td class="text-center" scope="row">{{ round(($lessons->grades->midterm + $lessons->grades->finalterm)/2, 2) }}</td>
                                            @if(round(($lessons->grades->midterm + $lessons->grades->finalterm)/2, 2) == 0)
                                                <td class="text-center  text-danger fw-bold" scope="row">{{ __('FAILED') }}</td>
                                            @elseif(round(($lessons->grades->midterm + $lessons->grades->finalterm)/2, 2) <= 3)
                                                <td class="text-center text-primary fw-bold" scope="row">{{ __('PASSED') }}</td>
                                            @else
                                                <td class="text-center  text-danger fw-bold" scope="row">{{ __('FAILED') }}</td>
                                            @endif
                                            <td class="text-center" scope="row">{{ $lessons->teachers->name }}</td>
                                        </tr>
                                        @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    <div class="text-end">
                        <a href="{{ route('viewPdf',Auth::user()->id) }}" class="btn btn-primary"><i class="fa-solid fa-file-pdf fs-5 px-2"></i></a>
                        <a href="{{ route('export',Auth::user()->id) }}" class="btn btn-success"><i class="fa-solid fs-5 fa-download px-2"></i></a>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
