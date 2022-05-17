@extends('teacher.layouts.sidebar')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow mb-3" style="border-radius: 20px;">
                <div class="card-body">
                    <div class="card-title fs-3">{{ __('Create Class Subject') }}</div>
                    <div class="d-flex justify-content-start">
                        <p class=" fw-bold font-monospace">{{ __('• Create your subject here to generate a unique class code, then share it to your students.') }}</p>
                    </div>
                    <form action="{{ route('teacher.store') }}" method="POST">
                        @csrf
                        <div class="row g-2">
                            <div class="col-lg-6 form-floating mb-2">
                                <input name="subject" type="text" class="form-control @error('subject') is-invalid @enderror" id="floatingInput" placeholder="name@example.com">
                                <label for="floatingInput">{{ __('Subject Code') }}</label>
                                @error('subject')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-lg-6 form-floating mb-2">
                                <input name="description" type="text" class="form-control @error('description') is-invalid @enderror" id="floatingInput" placeholder="name@example.com">
                                <label for="floatingInput">{{ __('Subject Description') }}</label>
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-lg-6 col-6 form-floating mb-2">
                                <select name="yearLevel" class="form-select @error('yearLevel') is-invalid @enderror" id="floatingSelectGrid" aria-label="Floating label select example">
                                    <option disabled selected>{{ __('Select year level') }}</option>
                                    <option value="1">{{ __('1st year') }}</option>
                                    <option value="2">{{ __('2nd year') }}</option>
                                    <option value="3">{{ __('3rd year') }}</option>
                                    <option value="4">{{ __('4th year') }}</option>
                                </select>
                                <label for="floatingSelectGrid">{{ __('Year') }}</label>
                                @error('yearLevel')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-lg-6 col-6 form-floating mb-2">
                                <select name="section" class="form-select @error('section') is-invalid @enderror" id="floatingSelectGrid" aria-label="Floating label select example">
                                    <option disabled selected>{{ __('Select section') }}</option>
                                    <option value="A">{{ __('A') }}</option>
                                    <option value="B">{{ __('B') }}</option>
                                    <option value="C">{{ __('C') }}</option>
                                    <option value="D">{{ __('D') }}</option>
                                </select>
                                <label for="floatingSelectGrid">{{ __('Section') }}</label>
                                @error('section')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-lg form-floating mb-2">
                                <select name="semester" type="text" class="form-select  @error('semester') is-invalid @enderror" id="floatingInput" placeholder="name@example.com">
                                    <option disabled selected>{{ __('Select semester') }}</option>
                                    <option value="1">{{ __('1st Semester') }}</option>
                                    <option value="2">{{ __('2nd Semester') }}</option>
                                </select>
                                <label for="floatingInput">{{ __('Semester') }}</label>
                                @error('semester')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">{{ __('Create') }}</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="container">
                <p class="h5 fw-bold font-monospace">{{ __('To create a subject: ') }}</p>
                <p class="fs-6 px-3 font-monospace">{{ __('•  Use an authorized account.') }}</p>
                <p class="fs-6 px-3 font-monospace">{{ __('•  Share the code to your students.') }}</p>
            </div>
        </div>
    </div>
</div>
@endsection
