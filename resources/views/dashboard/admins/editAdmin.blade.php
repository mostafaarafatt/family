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
                    <form class="form-horizontal" method="POST" action="{{ route('admins.update', $admin->id) }}" enctype="multipart/form-data">
                        @csrf
                        {{ method_field('PUT') }}

                        <div class="form-group row">
                            <label for="inputName" class="col-md-2 form-label">@lang('name')</label>
                            <div class="col-md-9">
                                <input type="text" name="name" class="form-control" id="inputName"
                                    value="{{ $admin->name }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputPhone" class="col-md-2 form-label">@lang('phone number')</label>
                            <div class="col-md-9">
                                <input type="text" name="phone" class="form-control" id="inputPhone"
                                    value="{{ $admin->phone }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputEmail3" class="col-md-2 form-label">@lang('email')</label>
                            <div class="col-md-9">
                                <input type="email" name="email" class="form-control" id="inputEmail3"
                                    @if ($admin->email != null) value="{{ $admin->email }}"
                                @else
                                placeholder="@lang('there are no data currently')" @endif>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputName" class="col-md-2 form-label">@lang('Permission type')</label>
                            <div class="col-md-9">
                                <select name="admin_type" class="custom-select" id="inputGroupSelect03">
                                    {{-- <option selected disabled>
                                        <option value="{{  }}">{{ $role_name }}</option>
                                    </option> --}}
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->id }}" @selected($role_id == $role->id)>
                                            {{ $role->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <br>


                        <h4>{{ __('If you watn to change password.') }}</h4>
                        <br>


                        <div class="form-group row">
                            <label class="col-md-2 form-label">{{ __('Current password') }}</label>
                            <div class="col-md-9">
                                <input type="password" name="current_password" class="form-control id_password  py-2"
                                    id="">
                            </div>


                            @if (session('check_password'))
                                <div class="alert alert-danger">
                                    {{ session('check_password') }}
                                </div>
                            @endif
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 form-label">{{ __('New password') }}
                            </label>
                            <div class="col-md-9">
                                <input type="password" name="password" class="form-control id_password py-2" id="">
                            </div>

                            @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                            @endif
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 form-label">{{ __('New password') }}
                            </label>
                            <div class="col-md-9">
                                <input type="password" name="password_confirmation" class="form-control id_password py-2"
                                    id="">
                            </div>


                            @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                            @endif
                        </div>

                        <div class="form-group row">
                            <label for="inputName" class="col-md-2 form-label">@lang('admin photo')</label>
                            
                            <div class="col-lg-4 col-sm-12">
                                <img id="preview-image-before-upload" src="{{ $admin->getFirstMediaUrl('admin_image') }}"
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
                                <a class="btn btn-secondary" href="{{ route('admins.index') }}"
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
