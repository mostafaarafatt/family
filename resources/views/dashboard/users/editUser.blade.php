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
            <h4 class="page-title mb-0 text-primary">@lang('edit user')</h4>
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
                    <form class="form-horizontal" method="POST" action="{{ route('users.update', $user->id) }}" enctype="multipart/form-data">
                        @csrf
                        {{ method_field('PUT') }}

                        <div class="form-group row">
                            <label for="inputName" class="col-md-2 form-label">@lang('User name')</label>
                            <div class="col-md-9">
                                <input type="text" name="name" class="form-control" id="inputName"
                                    value="{{ $user->name }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-2 form-label">@lang('phone number')</label>
                            <div class="col-md-9">
                                <input class="form-control" name="phone" value="{{ $user->phone }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputEmail3" class="col-md-2 form-label">@lang('email')</label>
                            <div class="col-md-9">
                                <input type="email" name="email" class="form-control" id="inputEmail3"
                                    @if ($user->email != null) value="{{ $user->email }}"
                                @else
                                placeholder="@lang('there are no data currently')" @endif>
                            </div>
                        </div>

                        <div class="form-group row" style="margin-bottom: 3%">
                            <label for="inputGroupSelect03" class="col-md-2 form-label">@lang('User type')</label>
                            <div class="col-md-9">

                                <select name="user_type" class="custom-select" id="inputGroupSelect03"
                                onclick="influentDetail(this)" style="margin-bottom: 2%">

                                    <option selected disabled> @lang('choose')</option>
                                    <option value="normal" @selected($user->user_type == 'normal')>@lang('normal')</option>
                                    <option value="influent" @selected($user->user_type == 'influent')>@lang('influent')</option>

                                </select>

                                {{-- show this when influent selected --}}
                                <div id="influent_details">
                                    <label for="influentName" class="col-md-2 form-label">@lang('User name')</label>
                                    <input type="text" name="influent_name" class="form-control" id="influentName"
                                        value="{{ $user->influent_name }}">

                                    <label for="influentPhone" class="col-md-2 form-label">@lang('phone number')</label>
                                    <input type="text" name="influent_phone" class="form-control" id="influentPhone"
                                        value="{{ $user->influent_phone }}">

                                    <label for="influentEmail" class="col-md-2 form-label">@lang('email')</label>
                                    <input type="email" name="influent_email" class="form-control" id="influentEmail"
                                        value="{{ $user->influent_email }}">
                                </div>

                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="inputName" class="col-md-2 form-label">@lang('member photo')</label>
                            
                            <div class="col-lg-4 col-sm-12">
                                <img id="preview-image-before-upload" src="{{ $user->getFirstMediaUrl('user_image') }}"
                                    width="120px" alt="preview image" style="max-height: 150px;">
                                    <br>
                                    <br>
                                    <br>
                                    <h5>@lang('upload new photo')</h5>
                                <input type="file" name="image" class="dropify"
                                    data-default-file="http://azea.test/assets/images/photos/media1.jpg"
                                    data-height="140" />
                            </div>
                        </div>

                        <div class="form-group mb-0 mt-2 row justify-content-end">
                            <div class="col-md-9">
                                <button type="submit" class="btn btn-primary">@lang('Save')</button>
                                <a class="btn btn-secondary" href="{{ route('users.index') }}"
                                    role="button">@lang('Back')</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection('content')

@section('scripts')
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

    <script type="text/javascript">
        $(document).ready(function(e) {
            $('#image').change(function() {

                let reader = new FileReader();
                reader.onload = (e) => {
                    $('#preview-image-before-upload').attr('src', e.target.result);
                }
                reader.readAsDataURL(this.files[0]);

            });

        });
    </script>
    <!-- INTERNAL File uploads js -->
    <script src="http://azea.test/assets/plugins/fileupload/js/dropify.js"></script>
    <script src="http://azea.test/assets/js/filupload.js"></script>
@endsection
