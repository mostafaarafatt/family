@extends('dashboard.layouts.custom-app')

@section('styles')
@endsection

@section('class')
    <div class="register-2">
    @endsection

    @section('content')
        <div class="page">
            <div class="page-content">
                <div class="container">
                    <div class="row">
                        <div class="col mx-auto">
                            <div class="row justify-content-center">
                                <div class="col-md-4">
                                    <div class="text-center mb-5">
                                        @if ($appLogo)
                                            <img src="{{ $appLogo }}" class="header-brand-img desktop-lgo"
                                                alt="Azea logo">
                                        @else
                                            <img src="{{ asset('appLogo/family.png') }}"
                                                class="header-brand-img desktop-lgo" alt="Azea logo">
                                        @endif

                                    </div>
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="text-center mb-3">
                                                <h1 class="mb-2">تسجيل دخول الأدمن</h1>
                                            </div>
                                            @if (Session::has('status'))
                                                <div class="alert alert-danger">
                                                        <h6>{{ Session::get('status') }}</h6>
                                                </div>
                                            @endif
                                            <form method="POST" action="{{ route('save.admin.login') }}"
                                                class="bg-white p-5 login-form form-body">
                                                @csrf

                                                @if ($errors->has('email'))
                                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                                @endif
                                                <div class="input-group mb-4">
                                                    <div class="input-group-text">
                                                        <i class="fe fe-user"></i>
                                                    </div>
                                                    <input type="email" name="email" class="form-control" id="Username"
                                                        placeholder="ادخل البريد الإلكترونى">
                                                </div>


                                                @if ($errors->has('password'))
                                                    <span class="text-danger">{{ $errors->first('password') }}</span>
                                                @endif
                                                <div class="input-group mb-4">
                                                    <div class="input-group" id="Password-toggle1">
                                                        <a href="" class="input-group-text">
                                                            <i class="fe fe-eye" aria-hidden="true"></i>
                                                        </a>
                                                        <input type="password" name="password"
                                                            class="form-control password id_password" id=""
                                                            placeholder="ادخل كلمة المرور">
                                                    </div>
                                                </div>

                                                {{-- <div class="form-group">
                                                    <label class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" />
                                                        <span class="custom-control-label">Remember me</span>
                                                    </label>
                                                </div> --}}
                                                <div class="form-group text-center mb-3">
                                                    <button type="submit" class="btn btn-primary py-2"> تسجيل الدخول
                                                    </button>
                                                </div>

                                            </form>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection('content')

    @section('scripts')
    @endsection
