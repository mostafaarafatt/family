@extends('dashboard.layouts.app')

@section('styles')

		<!--INTERNAL Select2 css -->
		<link href="{{asset('assets/plugins/select2/select2.min.css')}}" rel="stylesheet" />

@endsection

@section('content')

						<!--Page header-->
						<div class="page-header">
							{{-- <div class="page-leftheader">
								<h4 class="page-title mb-0 text-primary">تواصل معنا / جهة الاتصال</h4>
							</div> --}}
							
						</div>
						<!--End Page header-->
						
						<div class="row">
							<div class="col-lg-12 col-md-5">
								<div  class="card">
									<div class="card-header">
										<h4 class="card-title">@lang('reply on message')</h4>
									</div>
									<div class="card-body">
										<form class="form-horizontal" method="POST" action="{{ route('contact.sendMail') }}">
                                            @csrf
											<div class="form-group row">
												<label for="inputName" class="col-md-2 form-label">@lang('name')</label>
												<div class="col-md-9">
													<input type="text" name="name" class="form-control" id="inputName" value="{{ $contact->name }}" readonly>
												</div>
											</div>
                                            <div class="form-group row">
                                                <label class="col-md-2 form-label">@lang('phone number')</label>
                                                <div class="col-md-9">
                                                    <input class="form-control"  name="phone" value="{{ $contact->phone }}" type="tel" readonly>
                                                </div>
                                            </div>
											<div class="form-group row">
												<label for="inputEmail3" class="col-md-2 form-label">@lang('email')</label>
												<div class="col-md-9">
													<input type="email"  name="email" class="form-control" id="inputEmail3" value="{{ $contact->email }}" readonly>
												</div>
											</div>
                                            <div class="form-group row">
												<label for="inputName" class="col-md-2 form-label">@lang('content of message')</label>
												<div class="col-md-9">
													<input type="text"  name="message" class="form-control" id="inputName" value="{{ $contact->message }}" readonly>
												</div>
											</div>
											<div class="form-group row">
                                                <label class="col-md-2 form-label">@lang('reply')</label>
                                                <div class="col-md-9">
                                                    <textarea class="form-control" name="reply_message" rows="1" placeholder="@lang('reply')......."></textarea>
                                                </div>
                                            </div>
                                            
											<div class="form-group mb-0 mt-2 row justify-content-end">
												<div class="col-md-9">
													<button type="submit" class="btn btn-primary">@lang('Save')</button>
													<a class="btn btn-secondary" href="{{ route('contact.index') }}" role="button">@lang('Back')</a>
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
						

@endsection('content')

@section('scripts')

		<!--INTERNAL Select2 js -->
		<script src="{{asset('assets/plugins/select2/select2.full.min.js')}}"></script>
		<script src="{{asset('assets/js/select2.js')}}"></script>

@endsection