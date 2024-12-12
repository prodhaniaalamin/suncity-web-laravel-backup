@extends('layouts.app', ['title' => 'Logo & Favicon'])

@section('css')
	<link rel="stylesheet" href="{{ assets('assets/backend/css/multiple-image-select.css') }}" type="text/css" />
@endsection

@section('content')
	<div class="content d-flex flex-column flex-column-fluid">
		<!--begin::Toolbar-->
		<div class="toolbar">
			<div class="container-fluid d-flex flex-stack">
				<div data-kt-swapper="true" data-kt-swapper-mode="prepend"
				     class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
					<h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Logo & Favicon</h1>
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
							<h3 class="fw-bolder m-0">Logo & Favicon</h3>
						</div>
					</div>
					<!--begin::Card header-->
					<!--begin::Content-->

					<div>
						<!--begin::Form-->
						<form action="{{ route('settingSync') }}" class="form" method="POST" enctype="multipart/form-data" id="logoFaviconForm">
							@csrf
							<input type="hidden" name="key" value="logoFavicon">
							<!--begin::Card body-->
							<div class="card-body">
								<div class="row">
									<div class="col-12">
										<div class="fv-row mb-7">
                                            @php
                                                $logo = $setting->getSetting('logo');
                                                $adminLogo = $setting->getSetting('adminLogo');
                                                $favicon = $setting->getSetting('favicon');
                                            @endphp
										</div>
                                        <div class="d-flex fv-row mb-7">
                                            <div class="me-5">
                                                <label class="d-block fw-bold fs-6 mb-5">Admin Panel Logo</label>
                                                <div class="image-input image-input-outline ml-2" data-kt-image-input="true">
                                                    <div class="image-input-wrapper w-170px h-175px"></div>
                                                    <label
                                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                        data-kt-image-input-action="change" data-bs-toggle="tooltip"
                                                        title="Change avatar">
                                                        <i class="bi bi-pencil-fill fs-7"></i>
                                                        <input type="file" name="adminLogo" accept=".png, .jpg, .jpeg" />
                                                    </label>
                                                    <span
                                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                        data-kt-image-input-action="cancel" data-bs-toggle="tooltip"
                                                        title="Cancel Image">
                                                        <i class="bi bi-x fs-2"></i>
                                                    </span>
                                                    <span
                                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                        data-kt-image-input-action="remove" data-bs-toggle="tooltip"
                                                        title="Remove avatar"><i class="bi bi-x fs-2"></i>
                                                    </span>
                                                </div>
                                                <div class="form-text">Allowed file types: png, jpg, jpeg.</div>
                                            </div>
                                            <div class="me-5">
                                                <label class="d-block fw-bold fs-6 mb-5">Website Logo</label>
                                                <div class="image-input image-input-outline ml-2" data-kt-image-input="true">
                                                    <div class="image-input-wrapper w-170px h-175px"></div>
                                                    <label
                                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                        data-kt-image-input-action="change" data-bs-toggle="tooltip"
                                                        title="Change avatar">
                                                        <i class="bi bi-pencil-fill fs-7"></i>
                                                        <input type="file" name="logo" accept=".png, .jpg, .jpeg" />
                                                    </label>
                                                    <span
                                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                        data-kt-image-input-action="cancel" data-bs-toggle="tooltip"
                                                        title="Cancel Image">
                                                        <i class="bi bi-x fs-2"></i>
                                                    </span>
                                                    <span
                                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                        data-kt-image-input-action="remove" data-bs-toggle="tooltip"
                                                        title="Remove avatar"><i class="bi bi-x fs-2"></i>
                                                    </span>
                                                </div>
                                                <div class="form-text">Allowed file types: png, jpg, jpeg.</div>
                                            </div>
                                            <div class="">
                                                <label class="d-block fw-bold fs-6 mb-5">Website Favicon</label>
                                                <div class="image-input image-input-outline ml-2" data-kt-image-input="true">
                                                    <div class="image-input-wrapper w-170px h-175px"></div>
                                                    <label
                                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                        data-kt-image-input-action="change" data-bs-toggle="tooltip"
                                                        title="Change avatar">
                                                        <i class="bi bi-pencil-fill fs-7"></i>
                                                        <input type="file" name="favicon" accept=".ico, .png" />
                                                    </label>
                                                    <span
                                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                        data-kt-image-input-action="cancel" data-bs-toggle="tooltip"
                                                        title="Cancel Image">
                                                        <i class="bi bi-x fs-2"></i>
                                                    </span>
                                                    <span
                                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                        data-kt-image-input-action="remove" data-bs-toggle="tooltip"
                                                        title="Remove avatar"><i class="bi bi-x fs-2"></i>
                                                    </span>
                                                </div>
                                                <div class="form-text">Allowed file types: ico, png.</div>
                                            </div>
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
								@endif
							</div>
							<!--end::Card body-->

							<!--begin::Actions-->
							<div class="card-footer d-flex justify-content-end py-6 px-9">
								<button type="submit" class="btn btn-primary">Save Changes</button>
							</div>
							<!--end::Actions-->
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
<script>
    editData = @json(compact('adminLogo', 'logo', 'favicon'));
    $(document).ready(function() {
        dynamicallySetValueOfElements('input[name="key"]', editData)
    });
</script>
@endpush
