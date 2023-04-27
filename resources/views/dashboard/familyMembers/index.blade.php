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


                <a href="{{ route('members.create') }}" class="btn btn-outline-primary"><i class="fe fe-plus"></i>
                    @lang('Add new member')</a>


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
                    <div class="card-title">@lang('All Family Members')</div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="{{ app()->getLocale() == 'ar' ? 'mytable' : 'example-1' }}"
                            class="table table-striped table-bordered text-nowrap text-center">
                            <thead>
                                <tr>
                                    <th class="border-bottom-0">#</th>
                                    <th class="border-bottom-0">@lang('name')</th>
                                    <th class="border-bottom-0">@lang('member image')</th>
                                    <th class="border-bottom-0">@lang('state')</th>
                                    <th class="border-bottom-0">@lang('controls')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($members as $item => $member)
                                    <tr>
                                        <td>{{ $item += 1 }}</td>
                                        <td>{{ $member->name }}</td>
                                        <td>
                                            <img id="preview-image-before-upload"
                                                src="{{ $member->getFirstMediaUrl('member_image') }}" width="100px"
                                                alt="preview image" style="max-height: 100px;">
                                        </td>
                                        <td>
                                            {{-- <p
                                                class="{{ $member->is_active == '1' ? 'bg-success text-white rounded' : 'bg-danger text-white rounded' }}">
                                                {{ $member->is_active == '1' ? __('active') : __('not active') }}
                                            </p> --}}
                                            <span
                                                class="{{ $member->is_active == '1' ? 'bg-success-transparent text-success px-2 py-1 br-7 border-success' : 'bg-danger-transparent text-danger px-2 py-1 br-7 border-danger' }}">{{ $member->is_active == '1' ? __('active') : __('not active') }}</span>
                                        </td>
                                        <td>
                                            <a href="{{ route('members.show', $member->id) }}"
                                                class="btn btn-outline-warning waves-effect waves-light ">
                                                <i class="fas fa fa-fw fa-eye"></i>
                                            </a>

                                            <a href="{{ route('members.edit', $id = $member->id) }}"
                                                class="btn btn-outline-primary waves-effect waves-light ">
                                                <i class="fas fa-edit fa fa-fw"></i>
                                            </a>

                                            <a href="{{ route('member.active', $member->id) }}"
                                                class="btn btn-outline-success waves-effect waves-light">
                                                <i class="fas fa-check fa fa-fw"></i>
                                            </a>

                                            <a href="" class="btn btn-outline-danger waves-effect waves-light "
                                                data-bs-toggle="modal" data-bs-target="#normalmodal"
                                                data-member_id="{{ $member->id }}">
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
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="{{ route('members.delete') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <p class="text-center">
                        <h6> هل انت متاكد من عملية الحذف ؟</h6>
                        </p>
                        <input type="hidden" name="member_id" id="member_id" value="">
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

    <script>
        $('#normalmodal').on('shown.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var member_id = button.data('member_id');
            var modal = $(this);

            modal.find('.modal-body #member_id').val(member_id);
        })
    </script>

    <script src="{{ asset('assets/datatablestranslation/datatablestranslation.js') }}"></script>

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
