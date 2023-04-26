@extends('dashboard.layouts.app')

@section('styles')
    <!-- Data table css -->
    <link href="{{ asset('assets/plugins/datatables/DataTables/css/dataTables.bootstrap5.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/datatables/Buttons/css/buttons.bootstrap5.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/plugins/datatables/Responsive/css/responsive.bootstrap5.min.css') }}" rel="stylesheet" />

    <!-- Slect2 css -->
    <link href="{{ asset('assets/plugins/select2/select2.min.css') }}" rel="stylesheet" />
@endsection

@section('content')
    <div class="page-wrapper">


        <div class="container-fluid">
            <form class="form-horizontal" method="POST" action="{{ route('roles.update', $role->id) }}">
                @csrf
                {{ method_field('PUT') }}
                <div class="row">
                    <!-- column -->
                    <div class="col-lg-12">
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
                            <div class="card-body box bg-cyan ">
                                <h4 class="card-title text-white">@lang('edit role')</h4>

                            </div>
                            <div class="comment-widgets">

                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="name" class="col-sm-3 text-rightcontrol-label col-form-label">
                                            @lang('role name')</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control   " id="name"
                                                placeholder="@lang('role name')" name="name" value="{{ $role->name }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    @php
                        // $models = ['users', 'pages', 'sliders', 'contacts'];
                        // $maps = ['create', 'read', 'update', 'delete'];
                        
                        $models_config = collect(config('laratrust_seeder.roles_structure.super_admin'));
                        $models_name = array_keys($models_config->toArray());
                        $mapPermission = collect(config('laratrust_seeder.permissions_map'));
                        
                    @endphp

                    @if (session('nameStatus'))
                        <div class="alert alert-danger">
                            {{ session('nameStatus') }}
                        </div>
                    @endif

                    @if (session('permissionStatus'))
                        <div class="alert alert-danger">
                            {{ session('permissionStatus') }}
                        </div>
                    @endif

                    {{-- @dd(strtolower(explode(' ', trim($permissions->display_name))[1]))
                    @dd(strtolower(explode(' ', trim($permissions->display_name))[0])) --}}
                    @foreach ($models_name as $index => $model)
                        <div class="col-xl-3 col-lg-4 col-md-6">
                            <div class="card">
                                <div class="card-body box bg-info ">
                                    <h4 class="card-title text-white">
                                        <i class="mdi mdi-check-all check-all"></i>
                                        {{ __($model) }}
                                    </h4>
                                </div>
                                @foreach ($mapPermission as $map)
                                    <div class="comment-widgets">
                                        <div class="card-body">
                                            <div class="custom-control custom-checkbox my-1 mr-sm-2">

                                                <input id="{{ $model }} {{ $map }}" name="permissions[]"
                                                    @foreach ($permissions as $per)
                                                        {{ strtolower(explode(' ', trim($per->display_name))[1]) . ' ' . strtolower(explode(' ', trim($per->display_name))[0]) == $model . ' ' . $map ? 'checked' : '' }}
                                                        type="checkbox" class="custom-control-input" 
                                                        value="{{ $model }} {{ $map }}" @endforeach>

                                                <label class="custom-control-label"
                                                    for="{{ $model }} {{ $map }}">
                                                    {{ __($map) }} {{ __($model) }}
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach

                    {{-- @foreach ($models as $index => $model)
                        <div class="col-xl-3 col-lg-4 col-md-6">
                            <fieldset>
                                <legend>{{ $model }}</legend>

                                @foreach ($mapPermission as $map)
                                    <div>
                                        <input name="permissions[]" type="checkbox"
                                            @foreach ($permissions as $per)
                                                {{ strtolower(explode(' ', trim($per->display_name))[1]) . ' ' . strtolower(explode(' ', trim($per->display_name))[0]) == $model . ' ' . $map ? 'checked' : '' }} @endforeach>
                                        <label>{{ $map }} {{ $model }}</label>
                                    </div>
                                @endforeach

                            </fieldset>

                        </div>
                    @endforeach --}}



                    <div class="col-lg-12">
                        <div class="card">
                            <div class="comment-widgets">
                                <div class="border-top">
                                    <div class="card-body text-left">
                                        <button type="submit" class="btn btn-primary">@lang('Save')</button>
                                        <a class="btn btn-secondary" href="{{ route('roles.index') }}"
                                            role="button">@lang('Back')</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </form>
        </div>
    </div>
@endsection('content')

@section('scripts')
    <!-- INTERNAL Data tables -->
    <script src="{{ asset('assets/plugins/datatables/DataTables/js/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/DataTables/js/dataTables.bootstrap5.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/Buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/Buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/JSZip/jszip.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/Buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/Buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/Buttons/js/buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/Responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/Responsive/js/responsive.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatables.js') }}"></script>

    <!-- INTERNAL Select2 js -->
    <script src="{{ asset('assets/plugins/select2/select2.full.min.js') }}"></script>
    <script src="{{ asset('assets/js/select2.js') }}"></script>
    <script>
        $('.check-all').on('click', function() {
            $(this).parents('.card').children().find('input[type=checkbox]').prop("checked", true);
        });
    </script>
@endsection
