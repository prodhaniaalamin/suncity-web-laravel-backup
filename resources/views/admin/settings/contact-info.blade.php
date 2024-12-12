@extends('layouts.app', ['title' => 'Contact Info set'])

@section('css')
	<link rel="stylesheet" href="{{ assets('assets/backend/css/multiple-image-select.css') }}" type="text/css" >
@endsection

@section('content')
	<div class="content d-flex flex-column flex-column-fluid">
		<!--begin::Toolbar-->
		<div class="toolbar">
			<div class="container-fluid d-flex flex-stack">
				<div data-kt-swapper="true" data-kt-swapper-mode="prepend"
				     class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
					<h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Contact Info set</h1>
					<span class="h-20px border-gray-200 border-start mx-4"></span>
					<ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
						<li class="breadcrumb-item text-muted">
							<a href="{{ url('/') }}" class="text-muted text-hover- primary" target="blunk">Home</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<!--end::Toolbar-->
		<!--begin::Post-->
		<div class="post d-flex flex-column-fluid">
			<!--begin::Container-->
			<div class="container-xxl">
				@include('includes.backend.flash-message')
				<!--begin::Basic info-->
				<div class="card mb-5 mb-xl-10">
					<!--begin::Card header-->
					<div class="card-header">
						<!--begin::Card title-->
						<div class="card-title m-0">
							<h3 class="fw-bolder m-0">Contact Info set</h3>
						</div>
					</div>
					<!--begin::Card header-->
					<!--begin::Content-->

					<div>
						<!--begin::Form-->
						<form action="{{ route('settingSync') }}" class="form" method="POST" enctype="multipart/form-data">
							@csrf
							<input type="hidden" name="key" value="contactInfo">
							<!--begin::Card body-->
							<div class="card-body">
								<div class="row">
									<div class="col-md-6">
										<div class="fv-row mb-7">
											<label class="required fw-bold fs-6 mb-2">Contact Email</label>
											<input type="email" name="options[contactEmail]" value="{{ $setting->getSetting('contactEmail') }}"
											       class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Enter website email">
										</div>

										<div class="fv-row mb-7">
                                            <label class="required fw-bold fs-6 mb-2">Contact Phone</label>
                                            <input type="tel" name="options[contactPhone]" value="{{ $setting->getSetting('contactPhone') }}"
                                                class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Enter website phone">
										</div>
										<div class="fv-row mb-7">
                                            <label class="required fw-bold fs-6 mb-2">Contact Address</label>
                                            <textarea rows="3" name="options[address]" class="form-control form-control-solid mb-3 mb-lg-0"
                                                placeholder="Write Address">{{ $setting->getSetting('address') }}</textarea>
										</div>

										<div class="fv-row mb-7">
                                            <label class="fw-bold fs-6 mb-2">Social Media Link</label>
                                            <div class="social-links">
                                                <div class="d-flex align-items-center mb-3">
                                                    <i class="fab fa-twitter fs-3 me-2"></i>
                                                    <input type="url" name="options[twitter]" value="{{ $setting->getSetting('twitter') }}" class="form-control form-control-solid"
                                                    placeholder="Enter Twitter Link" />
                                                </div>
                                                <div class="d-flex align-items-center mb-3">
                                                    <i class="fab fa-facebook-f fs-3 me-3"></i>
                                                    <input type="url" name="options[facebook]" value="{{ $setting->getSetting('facebook') }}" class="form-control form-control-solid"
                                                    placeholder="Enter Facebook Link" />
                                                </div>

                                                <div class="d-flex align-items-center mb-3">
                                                    <i class="fab fa-instagram fs-3 me-2"></i>
                                                    <input type="url" name="options[instagram]" value="{{ $setting->getSetting('instagram') }}" class="form-control form-control-solid"
                                                    placeholder="Enter Instagram Link" />
                                                </div>
                                                <div class="d-flex align-items-center mb-3">
                                                    <i class="fab fa-tiktok fs-3 me-2"></i>
                                                    <input type="url" name="options[tiktok]" value="{{ $setting->getSetting('tiktok') }}" class="form-control form-control-solid"
                                                    placeholder="Enter Tiktok Link" />
                                                </div>
                                                <div class="d-flex align-items-center">
                                                    <i class="fab fa-google fs-3 me-2"></i>
                                                    <input type="url" name="options[google]" value="{{ $setting->getSetting('google') }}" class="form-control form-control-solid"
                                                    placeholder="Enter Tiktok Link" />
                                                </div>
                                            </div>
                                        </div>

										@if(is_numeric($setting->status))
											<div class="row">
												<div class="col-12">
													<div class="settings-status d-flex justify-content-end">
														<p class="me-3">
															<strong class="me-2">Status: </strong> {!! getStatus($setting->status, route('settings.edit', $setting->id)) !!}
														</p>
													</div>
												</div>
											</div>
											<!--begin::Actions-->
										@endif

										<div class="card-footer d-flex justify-content-center py-6 px-9">
											<button type="submit" class="btn btn-primary">Save Changes</button>
										</div>
									</div>
                                    <div class="col-md-6">

										<div class="fv-row mb-7">
                                            <h3 style="color: darkorange;margin: -70px 0 47px 0">Emergency Cases Contact</h3>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label class="required fw-bold fs-6 mb-2">Contact Phone 1</label>
                                                    <input type="tel" name="options[emergencyPNumber1]" value="{{ $setting->getSetting('emergencyPNumber1') }}"
                                                        class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Enter website phone">
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="required fw-bold fs-6 mb-2">Contact Phone 2</label>
                                                    <input type="tel" name="options[emergencyPNumber2]" value="{{ $setting->getSetting('emergencyPNumber2') }}"
                                                        class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Enter website phone">
                                                </div>
                                            </div>
										</div>
										<div class="fv-row mb-10">
                                            <label class="required fw-bold fs-6 mb-2">Opening Hours</label>
                                            <input type="tel" name="options[openingHoursEveryDay]" value="{{ $setting->getSetting('openingHoursEveryDay') }}"
                                                class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Enter Opening Hours">
										</div>

                                        <h3 class="mt-3">Footer Desctiption</h3>
                                        <textarea rows="5" name="options[footerDescription]"
											          class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Write Footer Desctiption">{{ $setting->getSetting('footerDescription') }}</textarea>
                                    </div>
								</div>

							</div>
							<!--end::Card body-->
						</form>
						<!--end::Form-->
					</div>
					<!--end::Content-->
				</div>
				<!--end::Basic info-->
			</div>
			<!--end::Container-->
		</div>
		<!--end::Post-->
	</div>
@endsection

@push('scripts')
	<script src="{{ assets('assets/backend/js/ckeditor/ckeditor-classic.bundle.js') }}"></script>
	<script src="{{ assets('assets/backend/js/ckeditor-custom.js') }}"></script>
	<script src="{{ assets('assets/backend/js/multiple-image-select.js') }}"></script>
@endpush
