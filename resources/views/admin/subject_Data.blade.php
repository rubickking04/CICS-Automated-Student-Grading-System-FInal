@extends('admin.layouts.sidebars')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 mb-1">
            <div class="card shadow" style="border-radius: 20px">
                <div class="">
                    <div class="card-body">
                        <div class="card-title">
                            <p class=" text-primary fw-bold h3">{{ $subjects->subject.' - '.$subjects->description }}</p>
                            <p class="fw-bold h5">{{ 'Section - '.$subjects->section }}</p>
                            <div class="row">
                                <div class="col-lg-6 col-12">
                                    <div class="input-group mb-2">
                                        <span class="input-group-text bg-info d-none d-sm-block" id="basic-addon1">{{ __('Class code: ') }}</span>
                                        <input type="text" class="form-control  fw-bold font-monospace" id="myInput" value="{{ $subjects->uuid }}" aria-label="Username" aria-describedby="basic-addon1" disabled readonly>
                                    </div>
                                </div>
                                <div class="col-lg-3 mb-2">
                                    <button class="btn btn-secondary col-lg-12 col-sm-6 col-md-6 col-12" onclick="myFunction()" {{ Popper::delay(500,0)->arrow('round')->pop('Copy to clipboard'); }}><i class="fs-5 text-center fa-solid fa-copy px-1"></i>{{ __('Copy to clipboard') }}</button>
                                    @push('my')
                                    <script>
                                        function myFunction() {
                                            var copyText = document.querySelector("#myInput");
                                                copyText.select();
                                                copyText.setSelectionRange(0, 99999); /* For mobile devices */
                                                navigator.clipboard.writeText(copyText.value);
                                                Toastify({
                                                    text: copyText.value,
                                                    className: "info",
                                                    position: "center",
                                                    gravity: "bottom",
                                                    duration: 3000,
                                                    style: {
                                                        background: "#3d3939",
                                                    }
                                                }).showToast();
                                        }
                                    </script>
                                    @endpush
                                </div>
                                <div class="col-lg-3">
                                    <a href="{{ route('admin.subject.destroy',$subjects->id) }}" class="btn col-lg-12 col-sm-6 col-md-6 col-12 btn-danger" onclick="return confirm('Are you sure to delete this class?')"><i class="fs-5 fa-solid fa-trash text-white px-2"></i>{{ __('Remove Class') }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="card shadow" style="border-radius: 20px">
                <div class="">
                    <div class="row justify-content-center">
                        <div class="col-lg-11 col-11">
                            <div class="card-body">
                                <div class="card-title">
                                    <div class="row border-bottom border-2 border-primary">
                                        <div class="col-lg-6 col-6">
                                            <div class="text-start fs-4 fw-bold card-title">{{ __('Teacher') }}</div>
                                        </div>
                                    </div>
                                    <div class="table-responsive py-2 mb-1">
                                        <table class="">
                                            <tbody>
                                                <tr>
                                                    <td  class="text-end py-2 col-lg-1 col-1" scope="row">
                                                        @if($teach)
                                                            <img src="{{ asset('/storage/images/'.$teach)}}" class="rounded-circle" alt="" width="35" height="35">
                                                        @else
                                                            <img src="{{ asset('/storage/images/avatar.png')}}" alt="..." width="35" height="35" class="rounded-circle">
                                                        @endif
                                                    </td>
                                                    <td  class="text-start fw-bold h5 py-3 px-3 text-truncate" scope="row"><a href="#" class="text-dark text-decoration-none">{{ $teacher }} </a></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="row border-bottom border-2 border-primary">
                                        <div class="col-lg-6 col-6">
                                            <div class="text-start fs-4 fw-bold card-title text-truncate">{{ __('Students') }}</div>
                                        </div>
                                        <div class="col-lg-6 col-6">
                                            <div class="text-end fs-6 py-2 fw-bold card-title">{{ $lesson->count() }} {{ Str::plural(' student',$lesson->count()) }}</div>
                                        </div>
                                    </div>
                                    <div class="table-responsive-sm py-4">
                                        <table class="table">
                                            <tbody>
                                                @if($lesson->count() > 0)
                                                    @foreach ( $lesson as $lessons )
                                                    <tr class="my-class">
                                                        <td  class="text-end py-2 col-lg-1" scope="row">
                                                            @if($lessons->student->image)
                                                                <img src="{{ asset('/storage/images/'.$lessons->student->image)}}" class="rounded-circle" alt="" width="30" height="30">
                                                            @else
                                                                <img src="{{ asset('/storage/images/avatar.png')}}" alt="..." width="35" height="35" class="rounded-circle">
                                                            @endif
                                                        </td>
                                                        <td  class="text-start fw-bold h6 py-3 text-truncate" scope="row">
                                                            @if($lessons->deleted_at)
                                                                <a href="#" class="text-danger text-decoration-none" data-bs-toggle="modal" data-bs-target="#exampleModalCenter{{ $lessons->id }}">{{ $lessons->student->name }}</a>
                                                            @else
                                                                <a href="#" class="text-dark text-decoration-none" data-bs-toggle="modal" data-bs-target="#exampleModalCenter{{ $lessons->id }}">{{ $lessons->student->name }}</a>
                                                            @endif
                                                            @if (empty($lessons->grades))
                                                                <span class="text-muted px-1">{{ __(' ') }}</span>
                                                            @else
                                                                <span class="text-muted small px-1"><i class="fa-solid fa-check fs-5"></i></span>
                                                            @endif
                                                        </td>
                                                        <td  class="text-end" scope="row">
                                                            <div class="dropdown">
                                                                <a href="{{ url('admin/delete/'.$lessons->id) }}" class="btn btn-outline-primary border-0 fs-5 rounded-circle" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-three-dots-vertical"></i></a>
                                                                <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                                                                    <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#exampleModalCenter{{ $lessons->id }}"><i class="fa-solid fa-eye px-1"></i>{{ __('View Grade') }}</a></li>
                                                                </ul>
                                                                <div class="modal fade modal-alert" id="exampleModalCenter{{ $lessons->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                    <div class="modal-dialog">
                                                                    <div class="modal-content shadow" style="border-radius:20px;">
                                                                        <div class="modal-body p-4 text-center">
                                                                            <div class="thumb-lg member-thumb ms-auto">
                                                                                <img src="{{ asset('/storage/images/avatar.png')}}" class="border border-info border-5 rounded-circle img-thumbnail" alt="" height="100px" width="100px">
                                                                            </div>
                                                                            <h2 class="fw-bold mb-0">{{ $lessons->student->name }}</h2>
                                                                            <h5 class="">{{ __('ID Number: ') }}{{ $lessons->student->id }}</h5>
                                                                            <div class="row">
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
                                                                                                        @if(empty($lessons->grades))
                                                                                                        <tr>
                                                                                                            <td class="text-center" scope="row"><input type="text" class="form-control" value="{{ __("Not graded yet") }}" readonly></td>
                                                                                                            <td class="text-center" scope="row"><input type="text" class="form-control" value="{{ __("Not graded yet") }}" readonly></td>
                                                                                                        </tr>
                                                                                                        @else
                                                                                                        <tr>
                                                                                                            <form action="{{ route('admin.grade.update',$lessons->grades->id) }}" method="POST">
                                                                                                            @csrf
                                                                                                            <td class="text-center" scope="row">
                                                                                                                <select name="midterm" type="text" placeholder="Unit" class="form-select my-select @error('midterm') is-invalid @enderror">
                                                                                                                    <option disabled selected>{{ $lessons->grades->midterm }}</option>
                                                                                                                    <option value="1.00">{{ __('1.00 = 100% - 98%') }}</option>
                                                                                                                    <option value="1.25">{{ __('1.25 = 97% - 95%') }}</option>
                                                                                                                    <option value="1.50">{{ __('1.50 = 94% - 92%') }}</option>
                                                                                                                    <option value="1.75">{{ __('1.75 = 91% - 89%') }}</option>
                                                                                                                    <option value="2.00">{{ __('2.00 = 88% - 86%') }}</option>
                                                                                                                    <option value="2.25">{{ __('2.25 = 85% - 83%') }}</option>
                                                                                                                    <option value="2.50">{{ __('2.50 = 82% - 80%') }}</option>
                                                                                                                    <option value="2.75">{{ __('2.75 = 79% - 75%') }}</option>
                                                                                                                    <option value="3.00">{{ __('3.00 = 74% & Below') }}</option>
                                                                                                                </select>
                                                                                                                @error('midterm')
                                                                                                                    <span class="invalid-feedback" role="alert">
                                                                                                                        <strong>{{ $message }}</strong>
                                                                                                                    </span>
                                                                                                                @enderror
                                                                                                            </td>
                                                                                                            <td class="text-center" scope="row">
                                                                                                                <select name="finalterm" type="text" placeholder="Unit" class="form-select my-select @error('finalterm') is-invalid @enderror">
                                                                                                                    <option disabled selected>{{ $lessons->grades->finalterm }}</option>
                                                                                                                    <option value="1.00">{{ __('1.00 = 100% - 98%') }}</option>
                                                                                                                    <option value="1.25">{{ __('1.25 = 97% - 95%') }}</option>
                                                                                                                    <option value="1.50">{{ __('1.50 = 94% - 92%') }}</option>
                                                                                                                    <option value="1.75">{{ __('1.75 = 91% - 89%') }}</option>
                                                                                                                    <option value="2.00">{{ __('2.00 = 88% - 86%') }}</option>
                                                                                                                    <option value="2.25">{{ __('2.25 = 85% - 83%') }}</option>
                                                                                                                    <option value="2.50">{{ __('2.50 = 82% - 80%') }}</option>
                                                                                                                    <option value="2.75">{{ __('2.75 = 79% - 75%') }}</option>
                                                                                                                    <option value="3.00">{{ __('3.00 = 74% & Below') }}</option>
                                                                                                                </select>
                                                                                                                @error('finalterm')
                                                                                                                    <span class="invalid-feedback" role="alert">
                                                                                                                        <strong>{{ $message }}</strong>
                                                                                                                    </span>
                                                                                                                @enderror
                                                                                                            </td>
                                                                                                        </tr>
                                                                                                        @endif
                                                                                                    </tbody>
                                                                                                </table>
                                                                                                @if(empty($lessons->grades))
                                                                                                    <span class="small px-1">{{ __(' ') }}</span>
                                                                                                @else
                                                                                                    <span class="small px-1 text-muted fw-bold"><i class="fa-solid fa-earth-americas px-2"></i>{{ $lessons->grades->created_at->diffForHumans() }}</span>
                                                                                                @endif
                                                                                                <div class="text-center">
                                                                                                    @if (empty($lessons->grades))
                                                                                                    <button type="button" class="btn btn-danger col-3" data-bs-dismiss="modal">{{ __('Close') }}</button>
                                                                                                    @else
                                                                                                        <button type="submit" class="btn btn-primary col-3">{{ __('Edit') }}</button>
                                                                                                        <button type="button" class="btn btn-danger col-3" data-bs-dismiss="modal">{{ __('Close') }}</button>
                                                                                                    @endif
                                                                                                    </form>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @else
                                                <div class="col-lg-12 mb-3">
                                                    <div class="mb-3">
                                                        <div class="text-center display-1">
                                                            <i class="fa-solid fa-users-slash display-1"></i>
                                                        </div>
                                                        <div class="card-body">
                                                            <h5 class="card-title fs-3 text-center">{{ __('No Students to this class.') }}</h5>
                                                            <div class="text-center">
                                                                <button type="button" class="fs-5 text-decoration-none btn text-primary" data-bs-toggle="modal" data-bs-target="#exampleModalCenter"><i class="fa-solid fa-user-plus px-2"></i>{{ __('Invite Students') }}</button>
                                                            </div>
                                                            <div class="modal fade modal-alert" id="exampleModalCenter" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content shadow" style="border-radius:20px;">
                                                                        <div class="modal-body">
                                                                            <p class="fs-4">{{ __('Invite your students') }}</p>
                                                                            <div class="mb-3">
                                                                                <label class="form-label" id="basic-addon1">{{ __('Class code ') }}</label>
                                                                                <div class="row">
                                                                                    <div class="col-lg-10">
                                                                                        <input type="text" class="form-control fw-bold font-monospace" id="myInput" value="{{ $subjects->uuid }}" aria-label="Username" aria-describedby="basic-addon1" readonly>
                                                                                    </div>
                                                                                    <div class="col-lg-2">
                                                                                        <button class="btn btn-secondary" onclick="myFunction()" {{ Popper::delay(500,0)->arrow('round')->pop('Copy to clipboard'); }}><i class="fs-5 fa-solid fa-copy px-1"></i></button>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="text-end">
                                                                                <button type="button" class="btn btn-danger col-3" data-bs-dismiss="modal" style="border-radius:20px;">{{ __('Close') }}</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="text-start">
                                        <a href="{{ route('admin.subject.tables') }}" class="btn btn-primary text-end" {{ Popper::delay(500,0)->arrow('round')->pop('Back'); }}><i class="fa-solid fa-arrow-left fs-6 px-1"></i>{{ __('Back') }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
