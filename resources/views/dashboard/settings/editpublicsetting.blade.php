@extends('dashboard.layouts.app')

@section('styles')
@endsection

@section('content')
    <!--Page header-->
    <div class="page-header">
        <div class="page-leftheader">
            <div class="btn-list">



            </div>
        </div>
    </div>
    <!--End Page header-->

    <!-- Row -->
    <div class="row">
        <div class="col-md-12 col-lg-12">

            <form action="{{ route('editPublicSettingDone') }}" method="post" enctype="multipart/form-data">
                @csrf
                {{-- logo --}}
                <div class="card">
                    <div class="card-header">
                        <div class="mb-3">
                            <div class="d-flex justify-content-left align-items-center con-image mb-2">
                                
                                @if ($setting->getFirstMediaUrl('Logo'))
                                    <img id="preview-image-before-upload" src="{{ $setting->getFirstMediaUrl('Logo') }}"
                                        width="120px" alt="preview image" style="max-height: 150px;">
                                @else
                                    <img id="preview-image-before-upload" src="{{ asset('appLogo/leetrips.png') }}"
                                        width="120px" alt="preview image" style="max-height: 150px;">
                                @endif

                            </div>
                            <label class="form-label " for="inputImage">@lang('change logo picture')</label>
                            <input type="file" name="image" id="image" class="form-control col-md-4">
                            {{-- @if ($errors->has('image'))
                                <span class="text-danger">{{ $errors->first('image') }}</span>
                            @endif --}}
                        </div>
                    </div>

                </div>

                {{-- phone number --}}
                <div class="row">
                    <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">@lang('phone number')</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6 col-md-12">
                                        <div class="form-group row">
                                            <div class="col-md-9">
                                                <input type="text" name="phone_number" class="form-control"
                                                    value="{{ $request->phone_number }}">
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- app rate --}}
                <div class="row">
                    <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">@lang('app rate')  %</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6 col-md-12">

                                        <div class="form-group row">
                                            <div class="col-md-9">
                                                <input type="text" name="app_rate" class="form-control"
                                                    value="{{ $request->app_rate }}">
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <button class="btn btn-primary" type="submit">@lang('Save')</button>
                </div>
            </form>

        </div>
    </div>
    <!-- End Row -->
@endsection('content')

@section('scripts')
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
