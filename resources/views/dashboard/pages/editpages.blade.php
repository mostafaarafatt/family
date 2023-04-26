@extends('dashboard.layouts.app')



@section('styles')
    <!-- INTERNAL Prism Css -->
    <link href="{{ asset('assets/plugins/prism/prism.css') }}" rel="stylesheet">
    <!-- INTERNAL  Tabs css-->
    <link href="{{ asset('assets/plugins/tabs/style.css') }}" rel="stylesheet" />
@endsection

@section('content')
    <!--Page header-->
    <div class="page-header">
        <div class="page-leftheader">
            <h4 class="page-title mb-0 text-primary">الصفحات الثابتة / تعديل الصفحة</h4>
        </div>

    </div>
    <!--End Page header-->

    <!-- Row -->
    <div class="row">

        <div class="">
            <form class="form-horizontal" method="POST" action="{{ route('editpagedone',['id'=>$page->id]) }}" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">تفاصيل</h3>
                    </div>
                    <div class="card-body p-6">
                        <div class="panel panel-primary">
                            <div class="tab-menu-heading p-0">
                                <div class="tabs-menu ">
                                    <!-- Tabs -->
                                    <ul class="nav panel-tabs">
                                        <li class=""><a href="#tab1" class="active" data-bs-toggle="tab">عربى</a>
                                        </li>
                                        <li><a href="#tab2" data-bs-toggle="tab">English</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="panel-body tabs-menu-body">
                                <div class="tab-content">
                                    <div class="tab-pane active " id="tab1">
                                        <div class="card-body">
                                            <div class="form-group row">
                                                <label for="title-ar"
                                                    class="col-sm-3 text-right control-label col-form-label">
                                                    العنوان عربي </label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control " id="title-ar"
                                                        placeholder="العنوان  عربي" name="ar[title]" value="{{ $arPage->title }}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="slug-ar"
                                                    class="col-sm-3 text-right control-label col-form-label"> مقتطف
                                                    عربي</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control " id="slug-ar"
                                                        placeholder="مقتطف عربي" name="ar[slug]" value="{{ $arPage->slug }}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="content-ar"
                                                    class="col-sm-3 text-right control-label col-form-label"> المحتوى
                                                    عربي</label>
                                                <div class="col-sm-9">
                                                    <textarea class="form-control " id="content-ar" placeholder="المحتوى عربي" name="ar[content]">{{ $arPage->content }}</textarea>
                                                </div>
                                            </div>
                                            {{-- <div class="form-group row">
                                                <label for="images-ar"
                                                    class="col-sm-3 text-right control-label col-form-label">
                                                    صورة عربي</label>
                                                <div class="col-sm-9">
                                                    <img src="https://via.placeholder.com/150.jpg" alt="staticpage image"
                                                        class="hai-img">
                                                    <div class="form-group row">

                                                        <input type="hidden" name="ar[old_images]"
                                                            value="https://via.placeholder.com/150.jpg">
                                                        <div class="col-sm-12">
                                                            <input type="file" class="form-control " id="images-ar"
                                                                placeholder="صورة" name="ar[images][]" value=""
                                                                multiple>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> --}}
                                            <br>
                                        </div>
                                    </div>
                                    <div class="tab-pane  " id="tab2">
                                        <div class="card-body">
                                            <div class="form-group row">
                                                <label for="title-en"
                                                    class="col-sm-3 text-right control-label col-form-label">
                                                    العنوان English
                                                </label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control " id="title-en"
                                                        placeholder="العنوان  English" name="en[title]" value="{{ $enPage->title }}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="slug-en"
                                                    class="col-sm-3 text-right control-label col-form-label"> مقتطف
                                                    English</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control " id="slug-en"
                                                        placeholder="مقتطف English" name="en[slug]"
                                                        value="{{ $enPage->slug }}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="content-en"
                                                    class="col-sm-3 text-right control-label col-form-label"> المحتوى
                                                    English</label>
                                                <div class="col-sm-9">
                                                    <textarea class="form-control " id="content-en" placeholder="المحتوى English" name="en[content]">{{ $enPage->content }}</textarea>
                                                </div>
                                            </div>
                                            {{-- <div class="form-group row">
                                                <label for="images-en"
                                                    class="col-sm-3 text-right control-label col-form-label"> صورة
                                                    English</label>
                                                <div class="col-sm-9">
                                                    <img src="https://via.placeholder.com/150.jpg" alt="staticpage image"
                                                        class="hai-img">
                                                    <div class="form-group row">

                                                        <input type="hidden" name="en[old_images]"
                                                            value="https://via.placeholder.com/150.jpg">
                                                        <div class="col-sm-12">
                                                            <input type="file" class="form-control " id="images-en"
                                                                placeholder="صورة" name="en[images][]" value=""
                                                                multiple>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> --}}
                                            <br>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="card-body text-left">
                            <button type="submit" class="btn btn-primary">حفظ</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>



    </div>
    <!-- End Row -->
@endsection('content')

@section('scripts')
    <!-- INTERNAL Clipboard js -->
    <script src="{{ asset('assets/plugins/clipboard/clipboard.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/clipboard/clipboard.js') }}"></script>

    <!-- INTERNAL Prism js -->
    <script src="{{ asset('assets/plugins/prism/prism.js') }}"></script>

    <!--- INTERNAL Tabs js-->
    <script src="{{ asset('assets/plugins/tabs/jquery.multipurpose_tabcontent.js') }}"></script>
    <script src="{{ asset('assets/js/tabs.js') }}"></script>
@endsection
