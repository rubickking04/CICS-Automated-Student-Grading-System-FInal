@extends('teacher.layouts.sidebar')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card rounded-4">
                <div class="card-body">
                    <div class="card-title fs-3">{{ __('Create Class Subject') }}</div>
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
                            <div class="form-floating mb-2">
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
                                <input name="room" type="text" class="form-control" id="floatingInput" placeholder="name@example.com">
                                <label for="floatingInput">{{ __('Room') }}</label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">{{ __('Create') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
