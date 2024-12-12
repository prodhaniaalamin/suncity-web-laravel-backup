@extends('layouts.app', ['title' => 'Consult Our Doctors'])
@push('styles')
    <style>
        .box-container {
            padding: 15px 0;
            box-shadow: 0px 0px 20px 0px rgb(76 125 114 / 2%);
            width: 100%;
            border: 1px solid silver;
            border-radius: 8px;
        }
    </style>
@endpush
@section('content')
	<div class="content d-flex flex-column flex-column-fluid">
		<!--begin::Toolbar-->
		<div class="toolbar">
			<div class="container-fluid d-flex flex-stack">
				<div data-kt-swapper="true" data-kt-swapper-mode="prepend"
				     class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
					<h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Consult Our Doctors</h1>
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
							<h3 class="fw-bolder m-0">Consult Our Doctors</h3>
						</div>
					</div>
					<!--begin::Card header-->
					<!--begin::Content-->

					<div>
						<!--begin::Form-->
						<form action="{{ route('settingSync') }}" class="form" method="POST" enctype="multipart/form-data">
							@csrf
							<input type="hidden" name="key" value="consultDoctors">
							<!--begin::Card body-->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="fv-row mb-7">
                                            <label class="required fw-bold fs-6 mb-2">Title</label>
                                            <input type="text" name="value" value="{{ $setting?->value }}"
                                                class="form-control form-control-solid mb-3 mb-lg-0"
                                                placeholder="Enter Title">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="fv-row mb-7">
                                            <label class="required fw-bold fs-6 mb-2">Short Description</label>
                                            <textarea type="text" name="options[description]" rows="4"
                                                class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Enter who we are">{{ $setting->getSetting('description') }}</textarea>
                                        </div>
                                    </div>

                                </div>

                                <div class="row mt-5">
                                    <div class="col-md-6">
                                        <div class="fv-row mb-7">
                                            <div class="row box-container">
                                                <label class="required fw-bold fs-6 mb-2">Qualification One</label>
                                                <div class="col-md-6">
                                                    <input type="text" name="options[qt1]" value="{{ $setting->getSetting('qt1') }}"
                                                    class="form-control form-control-solid mb-3 mb-lg-0"
                                                    placeholder="Enter Title 1">
                                                </div>

                                                <div class="col-md-6">
                                                    <textarea type="text" name="options[qd1]" rows="5"
                                                    class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Enter qualification 1">{{ $setting->getSetting('qd1') }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="fv-row mb-7">
                                            <div class="row box-container">
                                                <label class="required fw-bold fs-6 mb-2">Qualification Two</label>
                                                <div class="col-md-6">
                                                    <input type="text" name="options[qt2]" value="{{ $setting->getSetting('qt2') }}"
                                                    class="form-control form-control-solid mb-3 mb-lg-0"
                                                    placeholder="Enter Title 2">
                                                </div>

                                                <div class="col-md-6">
                                                    <textarea type="text" name="options[qd2]" rows="5"
                                                    class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Enter qualification 2">{{ $setting->getSetting('qd2') }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="fv-row mb-7">
                                            <div class="row box-container">
                                                <label class="required fw-bold fs-6 mb-2">Qualification Three</label>
                                                <div class="col-md-6">
                                                    <input type="text" name="options[qt3]" value="{{ $setting->getSetting('qt3') }}"
                                                    class="form-control form-control-solid mb-3 mb-lg-0"
                                                    placeholder="Enter Title 3">
                                                </div>

                                                <div class="col-md-6">
                                                    <textarea type="text" name="options[qd3]" rows="5"
                                                    class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Enter qualification 3">{{ $setting->getSetting('qd3') }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                @if (is_numeric($setting->status))
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
	<script src="{{ assets('assets/backend/js/multiple-image-select.js') }}"></script>
@endpush
