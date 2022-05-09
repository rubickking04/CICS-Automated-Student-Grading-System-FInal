@extends('layouts.sidebar')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 mb-1">
            <div class="card  shadow" style="border-radius: 20px">
                <div class="">
                    <div class="card-body">
                        <div class="card-title">
                            <p class=" text-primary fw-bold h3">{{ $subject.' - '.$description }}</p>
                            <p class="fw-bold h5">{{ 'Section - '.$year.''.$section }}</p>
                            <div class="row">
                                <div class="col-lg-6 col-12">
                                    <div class="input-group mb-2">
                                        <span class="input-group-text bg-info d-none d-sm-block" id="basic-addon1">{{ __('Class code: ') }}</span>
                                        <input type="text" class="form-control  fw-bold font-monospace" id="myInput" value="{{ $uuid }}" aria-label="Username" aria-describedby="basic-addon1" disabled readonly>
                                    </div>
                                </div>
                                <div class="col-lg-3 mb-2">
                                    <button class="btn btn-success col-lg-3 col-sm-2 col-md-2 col-2" onclick="myFunction()" {{ Popper::delay(500,0)->arrow('round')->pop('Copy to clipboard'); }}><i class="fs-5 text-center fa-solid fa-copy px-1"></i></button>
                                    <button class="btn btn-primary col-lg-3 col-sm-2 col-md-2 col-2" {{ Popper::delay(500,0)->arrow('round')->pop('Display'); }} data-bs-toggle="modal" data-bs-target="#exampleModalCenter"><i class="fs-5 text-center fa-solid fa-expand px-1"></i></button>
                                    <a href="{{ route('destroy',$id) }}" onclick="return confirm('Are you sure to unenroll to this subject?')" class="btn btn-danger col-lg-3 col-sm-2 col-md-2 col-2" {{ Popper::delay(500,0)->arrow('round')->pop('Unenroll'); }}><i class="fs-5 text-center fa-solid fa-trash-can px-1"></i></a>
                                </div>
                            </div>
                            <div class="modal fade modal-alert" id="exampleModalCenter" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content shadow" style="border-radius:20px;">
                                        <div class="modal-body">
                                            <p class="fs-4">{{ __('Invite your classmates') }}</p>
                                            <div class="mb-3">
                                                <label class="form-label" id="basic-addon1">{{ __('Class code ') }}</label>
                                                <div class="row">
                                                    <div class="col-lg-10 mb-3">
                                                        <input type="text" class="form-control fw-bold font-monospace" id="myInput" value="{{ $uuid }}" aria-label="Username" aria-describedby="basic-addon1" readonly>
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <button class="btn btn-secondary" onclick="myFunction()" {{ Popper::delay(500,0)->arrow('round')->pop('Copy to clipboard'); }}><i class="fs-5 fa-solid fa-copy px-1"></i></button>
                                                        @push('js')
                                                        <script>
                                                            function myFunction() {
                                                                const copyText = document.querySelector("#myInput");
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
                                        <table class="w3-table ">
                                            <tbody>
                                                <tr>
                                                    <td  class="text-end py-2 col-lg-1" scope="row">
                                                        @if($teach)
                                                            <img src="{{ asset('/storage/images/'.$teach)}}" class="rounded-circle" alt="" width="30" height="30">
                                                        @else
                                                            <img src="{{ asset('/storage/images/avatar.png')}}" alt="..." width="30" height="30" class="rounded-circle">
                                                        @endif
                                                    </td>
                                                    <td  class="text-wrap fw-bold h6 py-3 px-2" scope="row"><a href="#" class="text-dark text-decoration-none">{{ $less }} </a></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="row border-bottom border-2 border-primary">
                                        <div class="col-lg-6 col-6">
                                            <div class="text-start fs-4 fw-bold card-title">{{ __('Classmates') }}</div>
                                        </div>
                                        <div class="col-lg-6 col-6">
                                            <div class="text-end fs-6 py-2 fw-bold card-title">{{ $les->count() }}{{ Str::plural(' classmate',$les->count()) }}</div>
                                        </div>
                                    </div>
                                    <div class="table-responsive py-2">
                                        <table class="w3-table ">
                                            <tbody>
                                                @foreach ( $les as $lessons )
                                                    <tr>
                                                        <td  class="text-end py-2 col-lg-1" scope="row">
                                                            @if($lessons->student->image)
                                                                <img src="{{ asset('/storage/images/'.$lessons->student->image)}}" class="rounded-circle image" alt="" width="30" height="30">
                                                            @else
                                                                <img src="{{ asset('/storage/images/avatar.png')}}" alt="..." width="30" height="30" class="rounded-circle image">
                                                            @endif
                                                        </td>
                                                        @if(empty($lessons->user_id === Auth::user()->id))
                                                            <td  class="text-dark text-start text-wrap fw-bold px-2 py-3" scope="row"><a href="#" class="text-dark text-decoration-none">{{ $lessons->student->name }} </a>
                                                            </td>
                                                        @else
                                                            <td  class="text-dark text-wrap fw-bold px-2 py-3" scope="row"><a href="#" class=" text-decoration-none">{{ $lessons->student->name }} </a>
                                                                <span class="text-muted small">
                                                                    {{ __('(You)') }}
                                                                </span>
                                                            </td>
                                                        @endif
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
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
