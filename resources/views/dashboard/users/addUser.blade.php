@extends('dashboard.layouts.app')

@section('styles')
    <!--INTERNAL Select2 css -->
    <link href="{{ asset('assets/plugins/select2/select2.min.css') }}" rel="stylesheet" />
    <!-- INTERNAL Time picker css -->
    <link href="{{ asset('assets/plugins/time-picker/jquery.timepicker.css') }}" rel="stylesheet" />

    <!-- INTERNAL Date Picker css -->
    <link href="{{ asset('assets/plugins/date-picker/date-picker.css') }}" rel="stylesheet" />

    <!--Date Picker-->
    <link href="{{ asset('assets/plugins/bootstrap-datepicker/bootstrap-datepicker.css') }}" rel="stylesheet" />

    <!-- INTERNAL File Uploads css -->
    <link href="http://azea.test/assets/plugins/fancyuploder/fancy_fileupload.css" rel="stylesheet" />
    <!-- INTERNAL File Uploads css-->
    <link href="http://azea.test/assets/plugins/fileupload/css/fileupload.css" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    <!--Page header-->
    <div class="page-header">
        <div class="page-leftheader">
            <h4 class="page-title mb-0 text-primary">@lang('Add new user')</h4>
        </div>

    </div>
    <!--End Page header-->

    <div class="row">
        <div class="col-lg-12 col-md-5">
            <div class="card">

                <div class="card-header">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
                <div class="card-body">
                    <form class="form-horizontal" method="POST" action="{{ route('users.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="inputName" class="col-md-2 form-label">@lang('User name')</label>
                            <div class="col-md-9">
                                <input type="text" name="name" class="form-control" id="inputName"
                                    value="{{ old('name') }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-2 form-label">@lang('phone number')</label>
                            <div class="col-md-9">
                                <input class="form-control" name="phone" type="tel" value="{{ old('phone') }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputEmail3" class="col-md-2 form-label">@lang('email')</label>
                            <div class="col-md-9">
                                <input type="email" name="email" class="form-control" id="inputEmail3"
                                    value="{{ old('email') }}">
                            </div>
                        </div>

                        <div class="form-group row" style="margin-bottom: 3%">
                            <label for="inputGroupSelect03" class="col-md-2 form-label">@lang('User type')</label>
                            <div class="col-md-9">

                                <select name="user_type" class="custom-select" id="inputGroupSelect03"
                                    onchange="influentDetail(this)" style="margin-bottom: 2%">

                                    <option selected disabled> @lang('choose')</option>
                                    <option value="normal">@lang('normal')</option>
                                    <option value="influent">@lang('influent')</option>

                                </select>

                                {{-- show this when influent selected --}}
                                <div id="influent_details">
                                    <label for="influentName" class="col-md-2 form-label">@lang('User name')</label>
                                    <input type="text" name="influent_name" class="form-control" id="influentName"
                                        value="{{ old('influent_name') }}">

                                    <label for="influentPhone" class="col-md-2 form-label">@lang('phone number')</label>
                                    <input type="text" name="influent_phone" class="form-control" id="influentPhone"
                                        value="{{ old('influent_phone') }}">

                                    <label for="influentEmail" class="col-md-2 form-label">@lang('email')</label>
                                    <input type="email" name="influent_email" class="form-control" id="influentEmail"
                                        value="{{ old('influent_email') }}">
                                </div>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputName" class="col-md-2 form-label">@lang('Add user photo')</label>

                            <div class="col-lg-4 col-sm-12">
                                <input type="file" name="image" class="dropify"
                                    data-default-file="http://azea.test/assets/images/photos/media1.jpg"
                                    data-height="180" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-2 form-label">@lang('Password')</label>
                            <div class="col-md-9">
                                <input type="password" name="password" class="form-control" id="password">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password_confirmation" class="col-md-2 form-label">@lang('Confirm Password')</label>
                            <div class="col-md-9">
                                <input type="password" name="password_confirmation" class="form-control"
                                    id="password_confirmation">
                            </div>
                        </div>


                        <div class="form-group mb-0 mt-2 row justify-content-end">
                            <div class="col-md-9">
                                <button type="submit" class="btn btn-primary">@lang('Add')</button>
                                <a class="btn btn-secondary" href="{{ route('users.index') }}"
                                    role="button">@lang('Back')</a>
                            </div>
                        </div>

                        {{-- <select class="form-control" id="mail_type" name="email_to" onChange="getMailtype(this.value)"
                            required>
                            <option value="support@mail.com" selected>Support</option>
                            <option value="bill@mail.com">Billing</option>
                            <option value="sales@mail.com">Sales</option>
                        </select>

                        <span id="mail_info">
                            <input type="text" name="email" class="form-control" value="support@mail.com" readonly>
                        </span> --}}


                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection('content')

@section('scripts')
    {{-- <script>
        function getMailtype(value) {
            document.querySelector("#mail_info input").value = value;
        }
    </script> --}}

    <script>
        const details_style = document.getElementById("influent_details");
        details_style.style.display = "none";

        function influentDetail(userTypeValue) {
            // details_style.style.display = userTypeValue.value === "influent" ? "block" : "none";
            if (userTypeValue.value === "influent") {
                details_style.style.display = "block"
                document.getElementById("influentName").required = true;
                document.getElementById("influentPhone").required = true;
                document.getElementById("influentEmail").required = true;
            } else {
                details_style.style.display = "none"
                document.getElementById("influentName").required = false;
                document.getElementById("influentPhone").required = false;
                document.getElementById("influentEmail").required = false;
            }
        }
    </script>

    <!--INTERNAL Select2 js -->
    <script src="{{ asset('assets/plugins/select2/select2.full.min.js') }}"></script>
    <script src="{{ asset('assets/js/select2.js') }}"></script>

    <!-- INTERNAL Datepicker js -->
    <script src="{{ asset('assets/plugins/date-picker/date-picker.js') }}"></script>
    <script src="{{ asset('assets/plugins/date-picker/jquery-ui.js') }}"></script>
    <script src="{{ asset('assets/plugins/input-mask/jquery.maskedinput.js') }}"></script>

    <!-- INTERNAL File uploads js -->
    <script src="http://azea.test/assets/plugins/fileupload/js/dropify.js"></script>
    <script src="http://azea.test/assets/js/filupload.js"></script>
@endsection
