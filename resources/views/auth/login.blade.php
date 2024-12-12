@extends('layouts.login')

@section('content')
    <style>
        #lock {
            color: green !important;
            background: #e3fbe375;
            border-radius: 5px;
            padding: 2px;
            box-shadow: 0 0 2px #d6d6d6;
        }

        #lock span {
            font-size: 15px;
            font-weight: bolder;
        }

        #contain .alert {
            padding: 1px !important;
        }

        #contain .alert>div {
            padding: 0 !important;
            width: 100%;
        }
    </style>
    <div class="d-flex flex-column flex-root">
        <!--begin::Authentication - Sign-in -->
        <div class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed"
            style="background-image: url('assets/frontend/images/sketchy/14.png')">
            <!--begin::Content-->
            <div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">
                <!--begin::Logo-->
                <a href="{{ url('') }}" class="mb-12">
                    <img alt="Logo" src="{{ image(dynamicData('logoFavicon')->getSetting('adminLogo')) }}" class="h-40px" />
                </a>
                <!--end::Logo-->
                <!--begin::Wrapper-->
                <div class="w-lg-500px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto" id="contain">
                    @include('includes.backend.success-message')
                    <!--begin::Form-->
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <!--begin::Heading-->
                        <div class="text-center mb-10">
                            <h1 class="text-dark mb-3">Sign In to Suncity</h1>
                        </div>
                        <!--begin::Heading-->
                        <!--begin::Input group-->
                        <div class="fv-row mb-10">
                            <!--begin::Label-->
                            <label class="form-label fs-6 fw-bolder text-dark">Username</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input class="form-control form-control-lg form-control-solid" type="text"
                                value="{{ old('email') }}" name="email" autocomplete="off" required />
                            @if (!Session::get('error') && !Session::get('lock'))
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            @endif
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="fv-row mb-10">
                            <!--begin::Wrapper-->
                            <div class="d-flex flex-stack mb-2">
                                <!--begin::Label-->
                                <label class="form-label fw-bolder text-dark fs-6 mb-0">Password</label>
                                <!--end::Label-->
                            </div>
                            <!--end::Wrapper-->
                            <!--begin::Input-->
                            <input class="form-control form-control-lg form-control-solid" type="password" name="password"
                                autocomplete="off" required />
                            @error('password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Actions-->
                        <div class="text-center">
                            <!--begin::Submit button-->
                            <button type="submit" class="btn btn-lg btn-primary w-100 mb-5">
                                <span class="indicator-label">Login</span>
                            </button>
                            <!--end::Submit button-->
                        </div>
                        {{--                        <a href="{{ url('online/register') }}" class="text-hover-primary px-2">Register New</a> --}}
                        <!--end::Actions-->
                    </form>
                    <!--end::Form-->
                </div>
                <!--end::Wrapper-->
            </div>
            <!--end::Content-->
            <!--begin::Footer-->
            <div class="d-flex flex-center flex-column-auto p-10">
                <!--begin::Links-->
                <!--<div class="d-flex align-items-center fw-bold fs-6">
                    <a href="{{ url('about-us') }}" class="text-muted text-hover-primary px-2">About</a>
                    <a href="{{ url('about-us') }}" class="text-muted text-hover-primary px-2">Contact Us</a>
                </div>-->
                <!--end::Links-->
            </div>
            <!--end::Footer-->
        </div>
        <!--end::Authentication - Sign-in-->
    </div>
@endsection
