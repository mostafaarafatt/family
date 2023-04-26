@extends('dashboard.layouts.app')

@section('styles')
@endsection

@section('content')
    <!--Page header-->
    <div class="page-header">
        <div class="page-leftheader">
            {{-- <div class="btn-list">
                <a href="{{ route('addpage') }}" class="btn btn-outline-primary"><i class="fe fe-plus"></i>
                    إضافة صفحة</a>
            </div> --}}
        </div>
    </div>
    <!--End Page header-->

    <!-- Row -->
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">جدول الصفحات</h3>
                </div>
                <div class="table-responsive">
                    <table class="table card-table table-vcenter text-nowrap">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>عنوان الصفحة</th>
                                {{-- <th>صورة الصفحة</th> --}}
                                <th>العمليات</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $count = 1; ?>
                            @foreach ($pages as $page)
                                <tr>
                                    <th>{{ $count++ }}</th>
                                    <td>{{ $page->title }}</td>
                                    {{-- <td><img src="{{ $page->image == null ? "لا توجد صورة" : $page->image }}" class="" width="70px"
                                            height="50px" alt="..."></td> --}}
                                    <td>
                                        {{-- <div class="btn-group mt-2 mb-2">
                                            <button type="button" class="btn btn-primary btn-pill dropdown-toggle"
                                                data-bs-toggle="dropdown">
                                                العمليات <span class="caret"></span>
                                            </button>
                                            <ul class="dropdown-menu" role="menu">
                                                <li class="dropdown-plus-title">
                                                    اختار العملية
                                                    <b class="fa fa-angle-up" aria-hidden="true"></b>
                                                </li>
                                                <li><a href="{{ route('editpage',['id'=>$page->id]) }}">تعديل
                                                        الصفحة</a></li>
                                            </li>
                                            </ul>
                                        </div> --}}

                                        <a href="{{ route('editpage', ['id' => $page->id]) }}"
                                            class="btn btn-outline-primary waves-effect waves-light">
                                            <i class="fas fa-edit fa fa-fw"></i>
                                        </a>

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
                <div class="modal-header">
                    <h5 class="modal-title" id="normalmodal1">حذف الفئة الفرعية</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="" method="post">
                    @csrf
                    <div class="modal-body">
                        <p class="text-center">
                        <h6 style="color:red"> هل انت متاكد من عملية الحذف ؟</h6>
                        </p>
                        <input type="hidden" name="id_category" id="id_category" value="">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>
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
            var id_category = button.data('id_category');
            var modal = $(this);

            modal.find('.modal-body #id_category').val(id_category);
        })
    </script>
@endsection
