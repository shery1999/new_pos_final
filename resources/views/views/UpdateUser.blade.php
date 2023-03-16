@extends('layout.master')


@push('plugin-styles')
    <link href="{{ asset('assets/plugins/select2/select2.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/jquery-tags-input/jquery.tagsinput.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/dropzone/dropzone.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/dropify/css/dropify.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/bootstrap-colorpicker/bootstrap-colorpicker.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/tempusdominus-bootstrap-4/tempusdominus-bootstrap-4.min.css') }}"
        rel="stylesheet" />
@endpush


@section('content')
    <div class="row inbox-wrapper">
        @if (session()->has('msg'))
            @if (session()->has('msg'))
                <div class="col-lg-12">
                    <div class="alert alert-success" role="alert">
                        {{ Session::get('msg') }}
                    </div>
                </div>
            @endif
        @endif
        @if (session()->has('msgf'))
            @if (session()->has('msgf'))
                <div class="col-lg-12">
                    <div class="alert alert-danger" role="alert">
                        {{ Session::get('msgf') }}
                    </div>
                </div>
            @endif
        @endif

        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12 border-end-lg">

                            <h4 id="default">Update Users</h4>
                            <div class="example">
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="home-tab" data-bs-toggle="tab"
                                            data-bs-target="#home" role="tab" aria-controls="home"
                                            aria-selected="true">Update Users</a>
                                    </li>
                                </ul>
                                <div class="tab-content border border-top-0 p-3" id="myTabContent">
                                    <div class="tab-pane fade show active" id="home" role="tabpanel"
                                        aria-labelledby="home-tab">
                                        <h6 class="mb-1">Update User</h6>
                                        <div class="card-body">

                                            <form class="" action="/update_user/{{ $Data[0]['id'] }}" method="post" {{-- onsubmit="this.submit();  --}}
                                            {{-- // this.reset(); return false;" --}}>
                                            @csrf
                                            <div class="card-body">
                                                <div class="row mb-3">
                                                    <div class="col-lg-3">
                                                        <label for="defaultconfig" class="col-form-label">User
                                                            Name</label>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <input required class="form-control" maxlength="50"
                                                            name="name" id="defaultconfig" value="{{$Data[0]['name']}}" type="text"
                                                            placeholder="Enter Item Name">
                                                        @if ($errors->has('name'))
                                                            <div class="error">
                                                                {{ $errors->first('name') }}</div>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <div class="col-lg-3">
                                                        <label for="defaultconfig-2" class="col-form-label">Email
                                                        </label>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <input required class="form-control mb-4 mb-md-0" value="{{$Data[0]['email']}}" name="email"
                                                            type="email" />
                                                        @if ($errors->has('email'))
                                                            <div class="error">
                                                                {{ $errors->first('email') }}</div>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <div class="col-lg-3">
                                                        <label for="defaultconfig-2" class="col-form-label">Password
                                                        </label>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <input  class="form-control mb-4 mb-md-0"
                                                            name="user_Password" type="password" />
                                                        @if ($errors->has('user_Password'))
                                                            <div class="error">
                                                                {{ $errors->first('user_Password') }}</div>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <div class="col-lg-3">
                                                        <label for="defaultconfig-2" class="col-form-label">Confirm
                                                            Password
                                                        </label>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <input  class="form-control mb-4 mb-md-0"
                                                            name="confirm_Password" type="password" />
                                                        @if ($errors->has('confirm_Password'))
                                                            <div class="error">
                                                                {{ $errors->first('confirm_Password') }}</div>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="row mb-3">
                                                    <div class="col-lg-3">
                                                        <label for="defaultconfig-2" class="col-form-label">Phone Number
                                                        </label>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <input required class="form-control mb-4 mb-md-0" value="{{$Data[0]['phoneNo']}}"
                                                            name="phoneNo" data-inputmask-alias="(+99)999-9999999" />
                                                        @if ($errors->has('phoneNo'))
                                                            <div class="error">
                                                                {{ $errors->first('phoneNo') }}
                                                                {{-- {{ dd($errors) }} --}}
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>


                                                <button type="submit" class="btn btn-success">Update Users</button>
                                            </div>
                                        </form>


                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
@endsection



@push('plugin-scripts')
    <script src="{{ asset('assets/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/inputmask/jquery.inputmask.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/select2/select2.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/typeahead-js/typeahead.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/jquery-tags-input/jquery.tagsinput.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/dropzone/dropzone.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/dropify/js/dropify.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap-colorpicker/bootstrap-colorpicker.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/tempusdominus-bootstrap-4/tempusdominus-bootstrap-4.js') }}"></script>
@endpush

@push('custom-scripts')
    <script src="{{ asset('assets/js/form-validation.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap-maxlength.js') }}"></script>
    <script src="{{ asset('assets/js/inputmask.js') }}"></script>
    <script src="{{ asset('assets/js/select2.js') }}"></script>
    <script src="{{ asset('assets/js/typeahead.js') }}"></script>
    <script src="{{ asset('assets/js/tags-input.js') }}"></script>
    <script src="{{ asset('assets/js/dropzone.js') }}"></script>
    <script src="{{ asset('assets/js/dropify.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap-colorpicker.js') }}"></script>
    <script src="{{ asset('assets/js/datepicker.js') }}"></script>
    <script src="{{ asset('assets/js/timepicker.js') }}"></script>
@endpush
