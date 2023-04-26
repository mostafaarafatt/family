@extends('dashboard.layouts.app')



@section('content')
    <!--Page header-->
    <div class="page-header">
        <div class="page-leftheader">
            <h4 class="page-title mb-0 text-primary">@lang('Hotel Reservation Details')</h4>
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
                                <input type="text" name="fname" class="form-control" id="inputName">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputName" class="col-md-2 form-label">@lang('last name')</label>
                            <div class="col-md-9">
                                <input type="text" name="lname" class="form-control" id="inputName">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputName" class="col-md-2 form-label">@lang('address')</label>
                            <div class="col-md-9">
                                <input type="text" name="address" class="form-control" id="inputName">
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
                                <input class="form-control" name="phone" type="tel">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputEmail3" class="col-md-2 form-label">@lang('emqil')</label>
                            <div class="col-md-9">
                                <input type="email" name="email" class="form-control" id="inputEmail3">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputName" class="col-md-2 form-label">@lang('Password')</label>
                            <div class="col-md-9">
                                <input type="password" name="password" class="form-control" id="inputName">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputName" class="col-md-2 form-label">@lang('Confirm Password')</label>
                            <div class="col-md-9">
                                <input type="password" name="password_confirmation" class="form-control" id="inputName">
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
                        <label for="validationTooltip01" class="form-label">@lang('Hotel Name')</label>
                        <input type="text" class="form-control" readonly placeholder="{{ __('no data found') }}"
                            value="{{ $hotelReservation->hotel_name }}">

                    </div>
                    <div class="col-md-4 position-relative">
                        <label for="validationTooltip02" class="form-label">@lang('User Email')</label>
                        <input type="text" class="form-control" readonly placeholder="{{ __('no data found') }}"
                            value="{{ $user->email }}">

                    </div>
                    <div class="col-md-4 position-relative">
                        <label for="validationTooltip02" class="form-label">@lang('City')</label>
                        <input type="text" class="form-control" readonly placeholder="{{ __('no data found') }}"
                            value="{{ $hotelReservation->city }}">

                    </div>

                    <div class="col-md-4 position-relative">
                        <label for="validationTooltip01" class="form-label">@lang('Country')</label>
                        <input type="text" class="form-control" readonly placeholder="{{ __('no data found') }}"
                            value="{{ $hotelReservation->country }}">

                    </div>
                    <div class="col-md-4 position-relative">
                        <label for="validationTooltip02" class="form-label">@lang('Stay Duration')</label>
                        <input type="text" class="form-control" readonly placeholder="{{ __('no data found') }}"
                            value="{{ $hotelReservation->stay_duration }} @lang('day')">

                    </div>
                    <div class="col-md-4 position-relative">
                        <label for="validationTooltip02" class="form-label">@lang('Price')</label>
                        <input type="text" class="form-control" readonly placeholder="{{ __('no data found') }}"
                            value="{{ $hotelReservation->price }} {{ $hotelReservation->currency == 'USD' ? __('USD') : __('INR') }}">

                    </div>

                    <div class="col-md-4 position-relative">
                        <label for="validationTooltip01" class="form-label">@lang('Hotel Rate')</label>
                        <input type="text" class="form-control" readonly placeholder="{{ __('no data found') }}"
                            value="{{ $hotelReservation->hotel_rate }}">

                    </div>
                    <div class="col-md-4 position-relative">
                        <label for="validationTooltip02" class="form-label">@lang('Adults Number')</label>
                        <input type="text" class="form-control" readonly placeholder="{{ __('no data found') }}"
                            value="{{ $hotelReservation->adult_number }}">

                    </div>
                    <div class="col-md-4 position-relative">
                        <label for="validationTooltip02" class="form-label">@lang('Childrens Number')</label>
                        <input type="text" class="form-control" readonly placeholder="{{ __('no data found') }}"
                            value="{{ $hotelReservation->child_number }}">

                    </div>

                    <div class="col-md-4 position-relative">
                        <label for="validationTooltip01" class="form-label">@lang('Check_in Date')</label>
                        <input type="text" class="form-control" readonly placeholder="{{ __('no data found') }}"
                            value="{{ $hotelReservation->check_in_data }}">

                    </div>
                    <div class="col-md-4 position-relative">
                        <label for="validationTooltip02" class="form-label">@lang('Check_out Date')</label>
                        <input type="text" class="form-control" readonly placeholder="{{ __('no data found') }}"
                            value="{{ $hotelReservation->check_out_data }}">

                    </div>
                    <div class="col-md-4 position-relative">
                        <label for="validationTooltip02" class="form-label">@lang('Payment Method')</label>
                        <input type="text" class="form-control" readonly placeholder="{{ __('no data found') }}"
                            value="{{ $hotelReservation->payment_method }}">

                    </div>

                </form>

            </div>

        </div>
        <div class="form-group mb-0 mt-2 row justify-content-end">
            <div class="">
                <a class="btn btn-secondary" href="{{ route('hotelsReservations.index') }}"
                    role="button">@lang('Back')</a>
            </div>
        </div>
    </div>
    </div>
@endsection('content')
