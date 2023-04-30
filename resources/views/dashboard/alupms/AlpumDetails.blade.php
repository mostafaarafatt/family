@extends('dashboard.layouts.app')



@section('content')
    <!--Page header-->
    <div class="page-header">
        <div class="page-leftheader">
            <h4 class="page-title mb-0 text-primary">@lang('alpum details')</h4>
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
                            <label for="inputName" class="col-md-2 form-label">@lang('Reports Tiltle')</label>
                            <div class="col-md-9">
                                <input type="text" name="fname" class="form-control" id="inputName">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputName" class="col-md-2 form-label">@lang('Report Description')</label>
                            <div class="col-md-9">
                                <input type="text" name="lname" class="form-control" id="inputName">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputName" class="col-md-2 form-label">@lang('Posting date')</label>
                            <div class="col-md-9">
                                <input type="text" name="address" class="form-control" id="inputName">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-2 form-label">@lang('published date')</label>
                            <div class="col-md-9">
                                <input class="form-control" name="phone" type="tel">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputEmail3" class="col-md-2 form-label">@lang("The publisher's name")</label>
                            <div class="col-md-9">
                                <input type="email" name="email" class="form-control" id="inputEmail3">
                            </div>
                        </div>



                        <div class="col-md-6 col-lg-6">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">@lang('Pictures belongs to this report')</h3>
                                </div>
                                <div class="card-body">
                                    <div id="carousel-captions2" class="carousel slide" data-bs-ride="carousel">
                                        <div class="carousel-inner">
                                            <div class="carousel-item active">
                                                <img class="d-block w-100" alt=""
                                                    src="http://azea.test/assets/images/photos/gradient1.jpg"
                                                    data-holder-rendered="true">
                                                <div class="carousel-caption">
                                                    <h3>Slide label</h3>
                                                    <p>The wise man therefore always holds in these matters to this
                                                        principle of selection he rejects pleasures.</p>
                                                </div>
                                            </div>
                                            <div class="carousel-item">
                                                <img class="d-block w-100" alt=""
                                                    src="http://azea.test/assets/images/photos/gradient2.jpg"
                                                    data-holder-rendered="true">
                                                <div class="carousel-item-background d-none d-md-block"></div>
                                                <div class="carousel-caption d-none d-md-block">
                                                    <h3>Slide label</h3>
                                                    <p>The wise man therefore always holds in these matters to this
                                                        principle of selection he rejects pleasures.</p>
                                                </div>
                                            </div>
                                            <div class="carousel-item">
                                                <img class="d-block w-100" alt=""
                                                    src="http://azea.test/assets/images/photos/gradient3.jpg"
                                                    data-holder-rendered="true">
                                                <div class="carousel-item-background d-none d-md-block"></div>
                                                <div class="carousel-caption d-none d-md-block">
                                                    <h3>Slide label</h3>
                                                    <p>The wise man therefore always holds in these matters to this
                                                        principle of selection he rejects pleasures.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <a class="carousel-control-prev" href="#carousel-captions2" role="button"
                                            data-bs-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Previous</span>
                                        </a>
                                        <a class="carousel-control-next" href="#carousel-captions2" role="button"
                                            data-bs-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Next</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 position-relative">
                            <label for="validationTooltip01" class="form-label">@lang('Reports status')</label>
                            <input style="background-color: {{ $alpum->is_active == '1' ? 'green' : 'red' }} ;color:white "
                                type="text" class="form-control" readonly placeholder="{{ __('no data found') }}"
                                value="{{ $alpum->is_active == '1' ? __('active') : __('not active') }}">
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
                        <label for="validationTooltip01" class="form-label">@lang('alpums tiltle')</label>
                        <input type="text" class="form-control" value="{{ $alpum->title }}" readonly
                            placeholder="{{ __('no data found') }}">

                    </div>

                    <div class="col-md-4 position-relative">
                        <label for="validationTooltip02" class="form-label">@lang('published date')</label>
                        <input type="text" class="form-control" value="{{ $alpum->created_at->format('d / m / Y') }}"
                            readonly placeholder="{{ __('no data found') }}">
                    </div>



                    <div class="col-md-4 position-relative">
                        <label for="validationTooltip01" class="form-label">@lang("The publisher's name")</label>
                        <input type="text" class="form-control" value="{{ $alpum->admin->name }}" readonly
                            placeholder="{{ __('no data found') }}">

                    </div>

                    <div class="col-md-4 position-relative">
                        <label for="validationTooltip01" class="form-label">@lang('alpums status')</label>
                        <input style="background-color: {{ $alpum->is_active == '1' ? 'green' : 'red' }} ;color:white "
                            type="text" class="form-control" readonly placeholder="{{ __('no data found') }}"
                            value="{{ $alpum->is_active == '1' ? __('active') : __('not active') }}">
                    </div>

                    <div class="col-md-4 position-relative">
                        <label for="validationTooltip02" class="form-label">@lang('Number of album photos')</label>
                        <input type="text" class="form-control" readonly
                            value="{{ $alpum->getMedia('alpum_image')->count() + $alpum->getMedia('alpum_cover_image')->count() ?? __('no data found') }}">
                    </div>

                    {{-- <div class="col-md-6 col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">@lang('Pictures belongs to this report')</h3>
                            </div>
                            <div class="card-body">
                                <div id="carousel-captions2" class="carousel slide" data-bs-ride="carousel">
                                    <div class="carousel-inner">

                                        @foreach ($alpum->images as $image)
                                            <div class="carousel-item active">
                                                <img class="d-block w-100" alt="" src="{{ $image['url'] }}"
                                                    data-holder-rendered="true">

                                            </div>
                                        @endforeach

                                    </div>
                                    <a class="carousel-control-prev" href="#carousel-captions2" role="button"
                                        data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#carousel-captions2" role="button"
                                        data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Next</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div> --}}



                    <div class="flex flex-col items-center justify-center">
                        <h3 class="card-title">@lang('Pictures belongs to this alpum')</h3>
                        <div class="flex gap-4">

                            @if ($alpum->getFirstMediaUrl('alpum_cover_image') != '')
                                <img src="{{ $alpum->getFirstMediaUrl('alpum_cover_image') }}"
                                    class="rounded shadow w-28 h-28" style="width: 20%; height:20%; margin:1%">
                            @endif

                            @foreach ($alpum->getMedia('alpum_image') as $image)
                                <img src="{{ $image->getUrl() }}" alt="{{ $image->getUrl() }}"
                                    class="rounded shadow w-28 h-28" style="width: 20%; height:20%; margin:1%">
                            @endforeach
                        </div>
                    </div>



                </form>

            </div>

        </div>
        <div class="form-group mb-0 mt-2 row justify-content-end">
            <div class="">
                <a class="btn btn-secondary" href="{{ route('alpums.index') }}" role="button">@lang('Back')</a>
            </div>
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


    <!-- INTERNAL Clipboard js -->
    <script src="http://azea.test/assets/plugins/clipboard/clipboard.min.js"></script>
    <script src="http://azea.test/assets/plugins/clipboard/clipboard.js"></script>
@endsection
