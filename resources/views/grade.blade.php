@extends('layouts.sidebar')
@section('content')
<div class="container py-3">
    <div class="row justify-content-center">
        <div class="col-lg-10 col-12">
            <div class="card shadow" style="border-radius: 20px">
                <div class="card-body">

                    <div class="card-title fw-bold h3">{{ __('My Grades') }}</div>
                    <p class="h5 py-3">{{ __('Name: ') }}<strong> {{ Auth::user()->name }}</strong></p>
                    <p class="h5">{{ __('Age: ') }}<strong> {{ __('20') }}</strong></p>
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
                                    <td class="text-center" scope="row">{{ $result }}</td>
                                    @if($result <= 2)
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
                    <div class="text-end">
                        <a href="{{ route('viewPdf') }}" class="btn btn-primary"><i class="fa-solid fa-file-pdf fs-5 px-2"></i></a>
                        <a href="{{ route('export') }}" class="btn btn-success"><i class="fa-solid fs-5 fa-download px-2"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
