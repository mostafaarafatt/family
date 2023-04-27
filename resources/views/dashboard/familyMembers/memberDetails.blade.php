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
            <h4 class="page-title mb-0 text-primary">@lang('show member data')</h4>
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
                    <form class="form-horizontal" method="POST" action="{{ route('members.update', $familyMember->id) }}"
                        enctype="multipart/form-data">
                        @csrf
                        {{ method_field('PUT') }}

                        <div class="form-group row">
                            <label for="inputName" class="col-md-2 form-label">@lang('member name')</label>
                            <div class="col-md-9">
                                <input type="text" name="name" class="form-control" id="inputName"
                                    value="{{ $familyMember->name }}" readonly>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-2 form-label">@lang('member information')</label>
                            <div class="col-md-9">
                                <textarea class="form-control" name="information" rows="2" placeholder="@lang('add additional information about member')" readonly>{{ $familyMember->information }}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputName" class="col-md-2 form-label">@lang('created at')</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" readonly placeholder="{{ __('no data found') }}"
                                    value="{{ $familyMember->created_at->format('d / m / Y') }}">
                            </div>

                        </div>

                        <div class="form-group row">
                            <label for="inputName" class="col-md-2 form-label">@lang('member photo')</label>

                            <div class="col-lg-4 col-sm-12">
                                <img id="preview-image-before-upload"
                                    src="{{ $familyMember->getFirstMediaUrl('member_image') }}" width="120px"
                                    alt="preview image" style="max-height: 150px;">

                            </div>
                        </div>

                        <div class="form-group mb-0 mt-2 row justify-content-end">
                            <div class="col-md-10">
                                <a class="btn btn-secondary" href="{{ route('members.index') }}"
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
