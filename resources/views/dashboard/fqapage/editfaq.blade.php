@extends('dashboard.layouts.app')

@section('styles')
    <!--INTERNAL Select2 css -->
    <link href="{{ asset('assets/plugins/select2/select2.min.css') }}" rel="stylesheet" />
@endsection

@section('content')
    <!--Page header-->
    <div class="page-header">
        <div class="page-leftheader">
            <h4 class="page-title mb-0 text-primary">@lang('edit') / @lang('show') @lang('question')</h4>
        </div>

    </div>
    <!--End Page header-->

    <div class="row">
        <div class="col-lg-12 col-md-5">
            <div class="card">
                {{-- <div class="card-header">
                    <h4 class="card-title"> تعديل/عرض البيانات</h4>
                </div> --}}
                <div class="card-body">
                    <form class="form-horizontal" method="post" action="{{ route('fqapage.update',$fqa->id) }}">
                        {{ csrf_field() }}
                        @method('PUT')
                        <div class="form-group row">
                            <label for="inputName" class="col-md-2 form-label">@lang('question title')</label>
                            <div class="col-md-9">
                                <input type="text" name="question" class="form-control" id="inputName"
                                    value="{{ $fqa->question }}" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-2 form-label">@lang('question answer')</label>
                            <div class="col-md-9">
                                <textarea class="form-control" name="answer" rows="1" required>{{ $fqa->answer }}</textarea>
                            </div>
                        </div>

                        <div class="form-group mb-0 mt-2 row justify-content-end">
                            <div class="col-md-9">
                                <button type="submit" class="btn btn-primary">@lang('Save')</button>
                                <a class="btn btn-danger" href="{{ route('contact.index') }}" role="button">@lang('Back')</a>
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
@endsection
