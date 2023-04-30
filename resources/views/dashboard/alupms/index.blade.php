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
    <!--Page header-->
    <div class="page-header">
        <div class="page-leftheader">
            <div class="btn-list">
                <a href="{{ route('alpums.create') }}" class="btn btn-outline-primary"><i class="fe fe-plus"></i>
                    @lang('Add new alpum')</a>
            </div>
        </div>
    </div>
    <!--End Page header-->

    <!-- Row -->
    <div class="row">
        <div class="col-12">
            <!--div-->
            <div class="card">
                <div class="card-header">
                    <div class="card-title">@lang('All Alpums')</div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="{{ app()->getLocale() == 'ar' ? 'mytable' : 'example-1' }}"
                            class="table table-striped table-bordered text-nowrap text-center">
                            <thead>
                                <tr>
                                    <th class="border-bottom-0">#</th>
                                    <th class="border-bottom-0">@lang('alpums tiltle')</th>
                                    <th class="border-bottom-0">@lang('published date')</th>
                                    <th class="border-bottom-0">@lang('Number of album photos')</th>
                                    <th class="border-bottom-0">@lang('alpums status')</th>
                                    <th class="border-bottom-0">@lang('controls')</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($alpums as $index => $alpum)
                                    <tr>
                                        <td>{{ $index = +1 }}</td>
                                        <td>{{ $alpum->title ?? __('no data found') }}</td>
                                        <td>{{ $alpum->created_at->format('d / m / Y') ?? __('no data found') }}</td>
                                        <td>{{ $alpum->getMedia('alpum_image')->count() + $alpum->getMedia('alpum_cover_image')->count() ?? __('no data found') }}
                                        </td>
                                        <td>
                                            <span
                                                class="{{ $alpum->is_active == '1' ? 'bg-success-transparent text-success px-2 py-1 br-7 border-success' : 'bg-danger-transparent text-danger px-2 py-1 br-7 border-danger' }}">{{ $alpum->is_active == '1' ? __('active') : __('not active') }}</span>
                                        </td>
                                        <td>

                                            <a href="{{ route('alpums.show', $alpum->id) }}"
                                                class="btn btn-outline-warning waves-effect waves-light ">
                                                <i class="fas fa fa-fw fa-eye"></i>
                                            </a>

                                            <a href="{{ route('alpums.edit', $alpum->id) }}"
                                                class="btn btn-outline-primary waves-effect waves-light">
                                                <i class="fas fa-edit fa fa-fw"></i>
                                            </a>

                                            <a href="{{ route('alpum.active', $alpum->id) }}"
                                                class="btn btn-outline-success waves-effect waves-light">
                                                <i class="fas fa-check fa fa-fw"></i>
                                            </a>

                                            <a href="" class="btn btn-outline-danger waves-effect waves-light "
                                                data-bs-toggle="modal" data-bs-target="#normalmodal"
                                                data-alpum_id="{{ $alpum->id }}">
                                                <i class="fas fa-trash fa fa-fw"></i>
                                            </a>

                                        </td>
                                    </tr>
                                @endforeach


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!--div-->

        </div>
    </div>
    <!-- /Row -->
    <!-- Modal -->
    <div class="modal fade" id="normalmodal" tabindex="-1" role="dialog" aria-labelledby="normalmodal" aria-hidden="true">
        <div class="modal-dialog" role="alpum">
            <div class="modal-content">
                {{-- <div class="modal-header">
                    <h5 class="modal-title" id="normalmodal1">@lang('Delete')</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div> --}}
                <form action="{{ route('alpums.delete') }}" method="post">
                    @csrf

                    <div class="modal-body">
                        <p class="text-center">
                        <h6> هل انت متاكد من عملية الحذف ؟</h6>
                        </p>
                        <input type="hidden" name="alpum_id" id="alpum_id" value="">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">إلغاء</button>
                        <button type="submit" class="btn btn-primary">تأكيد</button>
                    </div>
                </form>

            </div>
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
    <script src="{{ asset('assets/datatablestranslation/datatablestranslation.js') }}"></script>

    <script>
        $('#normalmodal').on('shown.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var alpum_id = button.data('alpum_id');
            var modal = $(this);

            modal.find('.modal-body #alpum_id').val(alpum_id);
        })
    </script>
@endsection
