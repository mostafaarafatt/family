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
            <h4 class="page-title mb-0 text-primary">@lang('Add new document')</h4>
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
                    <form class="form-horizontal" method="POST" action="{{ route('documents.store') }}"
                        enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="inputName" class="col-md-2 form-label">@lang('Doument title')</label>
                            <div class="col-md-9">
                                <input type="text" name="title" class="form-control" id="inputName" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputName" class="col-md-2 form-label">@lang('Document cover image')</label>

                            <div class="col-lg-4 col-sm-12">
                                {{-- <img id="preview-image-before-upload" src=""
                                    width="120px" alt="preview image" style="max-height: 150px;"> --}}
                                <input type="file" name="image" accept="image/png, image/gif, image/jpeg" class="dropify"
                                    data-default-file="http://azea.test/assets/images/photos/media1.jpg"
                                    data-height="180" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputName" class="col-md-2 form-label">@lang('Document file')</label>
                            <div class="col-lg-4 col-sm-12">
                                <input type="file" name="file" accept=".xlsx,.xls,.doc, .docx,.ppt, .pptx,.txt,.pdf" class="dropify" data-height="180" />
                            </div>
                        </div>




                        <div class="form-group mb-0 mt-2 row justify-content-end">
                            <div class="col-md-9">
                                <button type="submit" class="btn btn-primary">@lang('Save')</button>
                                <a class="btn btn-danger" href="{{ route('members.index') }}"
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
    <!-- INTERNAL File uploads js -->
    <script src="http://azea.test/assets/plugins/fileupload/js/dropify.js"></script>
    <script src="http://azea.test/assets/js/filupload.js"></script>
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
@endsection
