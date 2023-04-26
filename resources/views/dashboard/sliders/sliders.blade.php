@extends('dashboard.layouts.app')

@section('styles')
@endsection

@section('content')
    <!--Page header-->
    <div class="page-header">
        <div class="page-leftheader">
            <div class="btn-list">
                @if (auth()->user()->hasPermission('sliders-create'))
                    <a href="{{ route('addslider') }}" class="btn btn-outline-primary"><i class="fe fe-plus"></i>
                        @lang('Add picture')</a>
                @endif
            </div>
        </div>
    </div>
    <!--End Page header-->

    <!-- Row -->
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">@lang('taple of pictures')</h3>
                </div>
                <div class="table-responsive">
                    <table class="table card-table table-vcenter text-nowrap">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>@lang('picture name')</th>
                                <th>@lang('picture')</th>
                                <th>@lang('controls')</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($sliders as $slider)
                                <tr>
                                    <?php $count = 1; ?>
                                    <th>{{ $count++ }}</th>
                                    <td>{{ $slider->title }}</td>
                                    <td><img src="{{ $slider->getFirstMediaUrl('image', 'thumb') }}" / width="120px"></td>
                                    </td>
                                    <td>
                                        {{-- <div class="btn-group mt-2 mb-2">
                                            <button type="button" class="btn btn-primary btn-pill dropdown-toggle"
                                                data-bs-toggle="dropdown">
                                                @lang('actions') <span class="caret"></span>
                                            </button>
                                            <ul class="dropdown-menu" role="menu">
                                                @if (auth()->user()->hasPermission('sliders-update'))
                                                    <li><a
                                                            href="{{ route('updateslider', ['id' => $slider->id]) }}">@lang('edit picture')</a>
                                                    </li>
                                                @endif
                                                @if (auth()->user()->hasPermission('sliders-delete'))
                                                    <li><a data-bs-toggle="modal" data-bs-target="#normalmodal"
                                                            data-id_slider="{{ $slider->id }}">@lang('delete picture')</a>
                                                    </li>
                                                @endif
                                            </ul>
                                        </div> --}}

                                        @if (auth()->user()->hasPermission('sliders-update'))
                                            <a href="{{ route('updateslider', ['id' => $slider->id]) }}"
                                                class="btn btn-outline-primary waves-effect waves-light ">
                                                <i class="fas fa-edit fa fa-fw"></i>
                                            </a>
                                        @endif


                                        @if (auth()->user()->hasPermission('sliders-delete'))
                                            <a href="" class="btn btn-outline-danger waves-effect waves-light "
                                                data-bs-toggle="modal" data-bs-target="#normalmodal"
                                                data-id_slider="{{ $slider->id }}">
                                                <i class="fas fa-trash fa fa-fw"></i>
                                            </a>
                                        @endif

                                    </td>
                                </tr>
                            @endforeach


                        </tbody>
                    </table>
                </div>
                <!-- table-responsive -->
            </div>
        </div>
    </div>
    <!-- End Row -->
    <!-- Modal -->
    <div class="modal fade" id="normalmodal" tabindex="-1" role="dialog" aria-labelledby="normalmodal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                {{-- <div class="modal-header">
                    <h5 class="modal-title" id="normalmodal1">@lang('Delete')</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div> --}}
                <form action="{{ route('deleteslider') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <p class="text-center">
                        <h6 > هل انت متاكد من عملية الحذف ؟</h6>
                        </p>
                        <input type="hidden" name="id_slider" id="id_slider" value="">
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
    <script>
        $('#normalmodal').on('shown.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var id_slider = button.data('id_slider');
            var modal = $(this);

            modal.find('.modal-body #id_slider').val(id_slider);
        })
    </script>
@endsection
