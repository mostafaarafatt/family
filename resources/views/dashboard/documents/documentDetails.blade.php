@extends('dashboard.layouts.app')

@section('content')
    <!--Page header-->
    <div class="page-header">
        <div class="page-leftheader">
            <h4 class="page-title mb-0 text-primary">@lang('Air flight Reservation Details')</h4>
        </div>

    </div>
    <!--End Page header-->

    {{-- <div class="row">
        <div class="col-lg-12 col-md-5">
            <div class="card">

                <div class="card-header">

                </div>
                <div class="card-body">
                    <form class="form-horizontal" method="POST" action="#">
                        @csrf

                        <div class="form-group row">
                            <label for="inputName" class="col-md-2 form-label">@lang('first name')</label>
                            <div class="col-md-9">
                                <input type="text" name="fname" class="form-control" readonly id="inputName">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputName" class="col-md-2 form-label">@lang('last name')</label>
                            <div class="col-md-9">
                                <input type="text" name="lname" class="form-control" readonly id="inputName">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputName" class="col-md-2 form-label">@lang('address')</label>
                            <div class="col-md-9">
                                <input type="text" name="address" class="form-control" readonly id="inputName">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputName" class="col-md-2 form-label">@lang('gender')</label>
                            <div class="col-md-9">
                                <select name="gender" class="custom-select" id="inputGroupSelect03">
                                    <option selected disabled>
                                        @lang('choose')
                                    </option>
                                    <option value="male">@lang('male')</option>
                                    <option value="female">@lang('female')</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-2 form-label">@lang('phone number')</label>
                            <div class="col-md-9">
                                <input class="form-control" readonly name="phone" type="tel">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputEmail3" class="col-md-2 form-label">@lang('emqil')</label>
                            <div class="col-md-9">
                                <input type="email" name="email" class="form-control" readonly id="inputEmail3">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputName" class="col-md-2 form-label">@lang('Password')</label>
                            <div class="col-md-9">
                                <input type="password" name="password" class="form-control" readonly id="inputName">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputName" class="col-md-2 form-label">@lang('Confirm Password')</label>
                            <div class="col-md-9">
                                <input type="password" name="password_confirmation" class="form-control" readonly id="inputName">
                            </div>
                        </div>


                        <div class="form-group mb-0 mt-2 row justify-content-end">
                            <div class="col-md-9">
                                <button type="submit" class="btn btn-primary">@lang('Add')</button>
                                <a class="btn btn-secondary" href="{{ route('users.index') }}"
                                    role="button">@lang('Back')</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> --}}

    <div class="col-lg-12 col-md-12">
        <div class="card">
            {{-- <div class="card-header">
                <h3 class="card-title">Tooltips</h3>
            </div> --}}
            <div class="card-body">
                <form class="row g-3 needs-validation" novalidate>

                    <div class="col-md-4 position-relative">
                        <label for="validationTooltip01" class="form-label">@lang('Doument title')</label>
                        <input type="text" class="form-control" readonly placeholder="{{ __('no data found') }}"
                            value="{{ $document->title }}">

                    </div>

                    <div class="col-md-4 position-relative">
                        <label for="validationTooltip02" class="form-label">@lang('published date')</label>
                        <input type="text" class="form-control" readonly placeholder="{{ __('no data found') }}"
                            value="{{ $document->created_at->format('d / m / Y') }}">


                    </div>
                    <div class="col-md-4 position-relative">
                        <label for="validationTooltip02" class="form-label">@lang('publisher of the document')</label>
                        <input type="text" class="form-control" readonly placeholder="{{ __('no data found') }}"
                            value="{{ $document->admin->name }}">

                    </div>

                    <div class="col-md-4 position-relative">
                        <label for="validationTooltip01" class="form-label">@lang('document status')</label>
                        <input style="background-color: {{ $document->is_active == '1' ? 'green' : 'red' }} ;color:white "  type="text"
                            class="form-control" readonly placeholder="{{ __('no data found') }}"
                            value="{{ $document->is_active == '1' ? __('active') : __('not active') }}">
                    </div>

                    <div class="col-md-4 position-relative">
                        <label for="validationTooltip02" class="form-label">@lang('document file')</label>
                        <input type="text" class="form-control" readonly placeholder="{{ __('no data found') }}"
                            value="{{ $document->getFirstMediaUrl('document_file') }}">
                        

                </form>

            </div>

        </div>
        <div class="form-group mb-0 mt-2 row justify-content-end">
            <div class="">
                <a class="btn btn-secondary" href="{{ route('documents.index') }}" role="button">@lang('Back')</a>
            </div>
        </div>
    </div>
    </div>
@endsection('content')
