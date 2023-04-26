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

            <form action="{{ route('editPublicSetting') }}" method="get" enctype="multipart/form-data">
                @csrf

                <button class="btn btn-outline-primary" type="submit" style="margin-bottom: 2%">@lang('Update general settings')</button>
                {{-- logo --}}
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">@lang('Logo Picture')</h3>
                    </div>
                    <div class="table-responsive">
                        <table class="table card-table table-vcenter text-nowrap">
                            <thead>
                                
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        @if ($setting->getFirstMediaUrl('Logo'))
                                            <img src="{{ $setting->getFirstMediaUrl('Logo') }}" width="20%"
                                                height="20%">
                                        @else
                                            <img src="{{ asset('appLogo/family.png') }}" width="20%" height="20%">
                                        @endif
                                    </td>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- table-responsive -->
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
                                                        value="{{ $setting->phone_number }}" >
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
                                                <div class="row-md-9">
                                                    <input type="text" name="app_rate" class="form-control"
                                                        value="{{ $setting->app_rate }}"  >
                                                </div>
                                            </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>
    <!-- End Row -->
   
@endsection('content')

@section('scripts')
    <script>
        $('#normalmodal').on('shown.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var id_slider = button.data('id_slider');
            var modal = $(this);

            modal.find('.modal-body #id_slider').val(id_slider);
        })
    </script>
@endsection
