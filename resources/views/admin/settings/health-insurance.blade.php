@extends('layouts.app', ['title' => 'Health Insurance'])

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
                    <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Health Insurance</h1>
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
                            <h3 class="fw-bolder m-0">Health Insurance</h3>
                        </div>
                    </div>
                    <!--begin::Card header-->
                    <!--begin::Content-->

                    <div>
                        <!--begin::Form-->
                        <form action="{{ route('settingSync') }}" class="form" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="key" value="healthInsurance">
                            <!--begin::Card body-->
                            <div class="card-body">
                                        <div class="fv-row mb-7">
                                            <label class=" fw-bold fs-6 mb-2">Insurance Images</label>
                                            <div class="image-gallery">
                                                <div class="file-select-container container-wrap d-flex">
                                                    @if($setting->options)
                                                        @foreach ($setting->options as $key => $image)
                                                            <div class="image edit-image" style="background-image: url('{{ image($image) }}')">
                                                                <input type="file" name="insurances_{{ $key }}" accept=".png, .jpg, .jpeg" data-base-name="insurances" data-edit="true"/>
                                                                <i class="fas fa-times-circle btn-remove"></i>
                                                                <input type="hidden" name="oldInsurances[]" value="{{ $image }}">
                                                            </div>
                                                        @endforeach
                                                        <input type="hidden" name="insurances" value="{{ count($setting->options) }}">
                                                    @endif
                                                    <div class="image">
                                                        <input type="file" name="insurances_{{ $setting->options ? count($setting->options) + 1:1 }}" accept=".png, .jpg, .jpeg" data-base-name="insurances"/>
                                                        <span class="indicator-label">Select Image</span>
                                                        <i class="fas fa-times-circle btn-remove"></i>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row mt-3">
                                                <div class="col-md-6">
                                                    <label class="required fw-bold fs-6 mb-2">Short Description</label>
                                                    <textarea rows="8" type="text" name="value"
                                                        class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Enter who we are" >{{ $setting->value }}</textarea>
                                                </div>
                                                <div class="col-md-6">
                                                @if(is_numeric($setting->status))
                                                    <div class="settings-status d-flex mt-5">
                                                        <p class="me-3">
                                                            <strong class="me-2">Status: </strong> {!! getStatus($setting->status, route('settings.edit', $setting->id)) !!}
                                                        </p>
                                                    </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

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
    <script src="{{ assets('assets/backend/js/ckeditor/ckeditor-classic.bundle.js') }}"></script>
    <script src="{{ assets('assets/backend/js/ckeditor-custom.js') }}"></script>
    <script src="{{ assets('assets/backend/js/multiple-image-select.js') }}"></script>
@endpush
