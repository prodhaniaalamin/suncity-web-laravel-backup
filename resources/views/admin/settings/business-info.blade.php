@extends('layouts.app', ['title' => 'Business Countdown Info'])

@section('content')
    <div class="content d-flex flex-column flex-column-fluid">
        <!--begin::Toolbar-->
        <div class="toolbar">
            <div class="container-fluid d-flex flex-stack">
                <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
                    class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                    <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Business Countdown Info</h1>
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
                            <h3 class="fw-bolder m-0">Business Countdown Info</h3>
                        </div>
                    </div>
                    <!--begin::Card header-->
                    <!--begin::Content-->

                    <div>
                        <!--begin::Form-->
                        <form action="{{ route('settingSync') }}" class="form" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="key" value="businessInfo">
                            <!--begin::Card body-->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="fv-row mb-7">
                                            <label class="required fw-bold fs-6 mb-2">Short Description</label>
                                                <textarea name="value" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Enter short description about achievements" >{{ $setting->value }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="fv-row mb-7">
                                            <label class="required fw-bold fs-6 mb-2">Years of Experience</label>
                                            <input type="number" name="options[yearsOrExperience]"
                                                class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Enter Years of Experience" value="{{ $setting->getSetting('yearsOrExperience') }}" />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="fv-row mb-7">
                                            <label class=" fw-bold fs-6 mb-2">Qualified Doctors</label>
                                            <input type="number" name="options[qualifiedDortors]"
                                                class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Enter Qualified Doctors amount" value="{{ $setting->getSetting('qualifiedDortors') }}" />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="fv-row mb-7">
                                            <label class=" fw-bold fs-6 mb-2">Daily Happy Patients</label>
                                            <input type="number" name="options[happyPatients]"
                                                class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Enter Happy Patients amount" value="{{ $setting->getSetting('happyPatients') }}" />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="fv-row mb-7">
                                            <label class=" fw-bold fs-6 mb-2">Car Parking Area</label>
                                            <input type="number" name="options[carParkingArea]"
                                                class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Enter Car Parking Area amount" value="{{ $setting->getSetting('carParkingArea') }}" />
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
