@extends('dashboard.layouts.app')

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

            <form method="POST" action="{{ route('editSocialSetting') }}" accept-charset="UTF-8" enctype="multipart/form-data">
                @csrf
                {{-- <input name="_method"
                    type="hidden" value="PUT"><input name="_token" type="hidden"
                    value="ANKtrf7E3WIVdWVXWMnhOmxSkkGBjwd8vZsUHqWe"> --}}
                <div class="card card-custom mb-5">
                    <div class="card-header flex-wrap border-0 pt-6 pb-0">
                        <div class="card-title">
                            <h3 class="card-label">
                                @lang('Social media settings')
                            </h3>
                        </div>

                        <div class="card-tools">

                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body ">
                        <div class="form-group">
                            <label for="facebook">Facebook</label>
                            <input class="form-control" pattern="https://.*" data-parsley-type="url"
                                data-parsley-minlength="3" placeholder="https://facebook.com" name="Facebook" type="text"
                                value="{{ $setting['Facebook'] }}" id="facebook">

                            <small class="form-text text-muted">@lang('please, write user name after') (https://www.facebook.com/)
                                @lang('and do not delete url, then click save')</small>
                        </div>


                        <div class="form-group">
                            <label for="instagram">Instagram</label>
                            <input class="form-control" pattern="https://.*" placeholder="https://instagram.com"
                                data-parsley-type="url" data-parsley-minlength="3" name="Instagram" type="text"
                                value="{{ $setting['Instagram'] }}" id="instagram">

                            <small class="form-text text-muted">@lang('please, write user name after') (https://www.instagram.com/)
                                @lang('and do not delete url, then click save')</small>
                        </div>

                        <div class="form-group">
                            <label for="youtube">Youtube</label>
                            <input class="form-control" pattern="https://.*" placeholder="https://youtube.com"
                                data-parsley-type="url" data-parsley-minlength="3" name="Youtube" type="text"
                                value="{{ $setting['Youtube'] }}" id="youtube">

                            <small class="form-text text-muted">@lang('please, write user name after') (https://www.youtube.com/) 
                                @lang('and do not delete url, then click save')</small>
                        </div>


                        <div class="form-group">
                            <label for="snapchat">Snap Chat</label>
                            <input class="form-control" pattern="https://.*" placeholder="https://snapchat.com"
                                data-parsley-type="url" data-parsley-minlength="3" name="Snap Chat" type="text"
                                value="{{ $setting['Snap Chat'] }}" id="snapchat">

                            <small class="form-text text-muted">@lang('please, write user name after') (https://snapchat.com/)
                                @lang('and do not delete url, then click save')</small>

                        </div>


                        <div class="col-12">
                            <button class="btn btn-primary" type="submit">@lang('Save')</button>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

            </form>

        </div>
    </div>
    <!-- End Row -->
@endsection('content')

@section('scripts')
@endsection
