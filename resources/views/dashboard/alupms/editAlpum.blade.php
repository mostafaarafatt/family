@extends('dashboard.layouts.app')

@section('styles')
    <!-- INTERNAL File Uploads css -->
    <link href="http://azea.test/assets/plugins/fancyuploder/fancy_fileupload.css" rel="stylesheet" />
    <!-- INTERNAL File Uploads css-->
    <link href="http://azea.test/assets/plugins/fileupload/css/fileupload.css" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    <!--Page header-->
    <div class="page-header">
        <div class="page-leftheader">
            <h4 class="page-title mb-0 text-primary">@lang('edit alpum')</h4>
        </div>

    </div>
    <!--End Page header-->


    <div class="col-lg-12 col-md-12">
        <div class="card">
            {{-- <div class="card-header">
                <h3 class="card-title">Tooltips</h3>
            </div> --}}
            <div class="card-body">
                <form class="row g-3 needs-validation" method="POST" action="{{ route('alpums.update', $alpum->id) }}"
                    enctype="multipart/form-data">
                    @csrf
                    {{ method_field('PUT') }}

                    <div class="col-md-4 position-relative" style="margin-bottom: 2%">
                        <label for="title" class="form-label">@lang('alpums tiltle')</label>
                        <input type="text" name="title" class="form-control" value="{{ $alpum->title }}"
                            placeholder="{{ __('no data found') }}" id="title">
                    </div>


                    <div class="flex flex-col items-center justify-center">
                        <h3 class="card-title">@lang('Pictures belongs to this alpum')</h3>
                        <div class="row">

                            @if ($alpum->getFirstMediaUrl('alpum_cover_image') != "")
                                <div class="card col-2" id="">
                                    <div class="card-body text-center">

                                        <img src="{{ $alpum->getFirstMediaUrl('alpum_cover_image') }}"
                                            class="mr-2 img-thumbnail" style="width: 170px; height: 120px;">

                                        <button type="button" class="btn btn-sm btn-danger delMedia" data-bs-toggle="modal"
                                            data-bs-target="#normalmodal"
                                            data-image_id="{{ $alpum->getMedia('alpum_cover_image')[0]->id }}"> <i
                                                class="fa fa-trash" aria-hidden="true"></i>
                                        </button>

                                    </div>
                                </div>
                            @endif


                            @foreach ($alpum->getMedia('alpum_image') as $image)
                                <div class="card col-2" id="">
                                    <div class="card-body text-center"> 

                                        <img src="{{ $image->getUrl() }}" class="mr-2 img-thumbnail" style="width: 170px; height: 120px;">

                                        <button type="button" class="btn btn-sm btn-danger delMedia" data-bs-toggle="modal"
                                            data-bs-target="#normalmodal" data-image_id="{{ $image->id }}"> <i
                                                class="fa fa-trash" aria-hidden="true"></i>
                                        </button>

                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>

                    {{-- uploader for cover alpum image --}}
                    <div class="form-group row">
                        <label for="inputName" class="col-md-2 form-label">@lang('Add New Alpum Cover Image')</label>
                        <div class="col-lg-4 col-sm-12">
                            <input type="file" name="coverImage" accept="image/png, image/gif, image/jpeg"
                                class="dropify" data-default-file="http://azea.test/assets/images/photos/media1.jpg"
                                data-height="140" />
                        </div>
                    </div>

                    {{-- uploader for alpum images --}}
                    <div class="form-group row">
                        <label for="inputName" class="col-md-2 form-label">@lang('Add New Alpum Images')</label>
                        <div class="col-lg-4 col-sm-12">
                            <input type="file" name="images[]" class="dropify" accept="image/png, image/gif, image/jpeg"
                                data-default-file="http://azea.test/assets/images/photos/media1.jpg" data-height="140"
                                multiple />
                        </div>
                    </div>


                    <div class="form-group mb-0 mt-2 row justify-content-end">
                        <div class="col-md-9">
                            <button type="submit" class="btn btn-primary">@lang('Save')</button>
                            <a class="btn btn-secondary" href="{{ route('alpums.index') }}"
                                role="button">@lang('Back')</a>
                        </div>
                    </div>
                </form>

            </div>

        </div>

    </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="normalmodal" tabindex="-1" role="dialog" aria-labelledby="normalmodal" aria-hidden="true">
        <div class="modal-dialog" role="alpum">
            <div class="modal-content">
                <form action="{{ route('alpums.deleteImage') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <p class="text-center">
                        <h6> هل انت متاكد من عملية الحذف ؟</h6>
                        </p>
                        <input type="hidden" name="image_id" id="image_id" value="">
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
    <!--Sidemenu js-->
    <script src="http://azea.test/assets/plugins/sidemenu/sidemenu.js"></script>

    <!-- P-scroll js-->
    <script src="http://azea.test/assets/plugins/p-scrollbar/p-scrollbar.js"></script>
    <script src="http://azea.test/assets/plugins/p-scrollbar/p-scroll1.js"></script>
    <script src="http://azea.test/assets/plugins/p-scrollbar/p-scroll.js"></script>

    <!-- INTERNAL File uploads js -->
    <script src="http://azea.test/assets/plugins/fileupload/js/dropify.js"></script>
    <script src="http://azea.test/assets/js/filupload.js"></script>

    <!-- INTERNAL Clipboard js -->
    <script src="http://azea.test/assets/plugins/clipboard/clipboard.min.js"></script>
    <script src="http://azea.test/assets/plugins/clipboard/clipboard.js"></script>

    <script>
        $(".delMedia").click(function(e) {
            e.preventDefault();
            let id = $(this).data('id');
            let url = $(this).data('href');
            $.ajax({
                type: "DELETE",
                url: url,
                success: function(response) {
                    $("#" + id).slideUp();
                }
            });
        });
    </script>

    <script>
        $('#normalmodal').on('shown.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var image_id = button.data('image_id');
            var modal = $(this);

            modal.find('.modal-body #image_id').val(image_id);
        })
    </script>
@endsection
