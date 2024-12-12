@php
    $user = isset($user) ? $user : user();
@endphp
@extends('layouts.app', ['title' => $user->role->name . ' Profile'])

@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Toolbar-->
        <div class="toolbar" id="kt_toolbar">
            <!--begin::Container-->
            <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">

                <!--begin::Page title-->
                <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
                    data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
                    class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                    <!--begin::Title-->
                    <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">View {{ $user->role->name }} Details
                    </h1>
                    <!--end::Title-->
                    <!--begin::Separator-->
                    <span class="h-20px border-gray-200 border-start mx-4"></span>
                    <!--end::Separator-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">
                            <a href="{{ route('home') }}" class="text-muted text-hover- primary" target="blunk">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-200 w-5px h-2px"></span>
                        </li>
                        <li class="breadcrumb-item text-muted">Profile Details</li>
                    </ul>
                    <!--end::Breadcrumb-->
                </div>
                <!--end::Actions-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Toolbar-->
        <!--begin::Post-->
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <!--begin::Container-->
            <div id="kt_content_container" class="container-xxl">
                @include('includes.backend.flash-message')
                <!--begin::Layout-->
                <div class="d-flex flex-column flex-xl-row">
                    <!--begin::Sidebar-->
                    <div class="flex-column flex-lg-row-auto w-100 w-xl-350px mb-10">
                        <!--begin::Card-->
                        <div class="card mb-5 mb-xl-8">
                            <!--begin::Card body-->
                            <div class="card-body">
                                <!--begin::Summary-->
                                <!--begin::User Info-->
                                <div class="d-flex flex-center flex-column py-5">
                                    <!--begin::Avatar-->
                                    <div class="symbol symbol-100px symbol-circle mb-7">
                                        <img src="{{ image($user->photo, 'user') }}" alt="image" />
                                    </div>
                                    <!--end::Avatar-->
                                    <!--begin::Name-->
                                    <a type="button"
                                        class="fs-3 text-gray-800 text-hover-primary fw-bolder mb-3">{{ $user->name }}</a>
                                    <!--end::Name-->
                                    <!--begin::Position-->
                                    <div class="mb-9">
                                        <!--begin::Badge-->
                                        <div class="badge badge-lg badge-light-primary d-inline">{{ $user->role->name }}
                                        </div>
                                        <!--begin::Badge-->
                                    </div>
                                    <!--end::Position-->
                                </div>
                                <!--end::User Info-->
                                <!--end::Summary-->
                                <!--begin::Details toggle-->
                                <div class="d-flex flex-stack fs-4 py-3">
                                    <div class="fw-bolder rotate collapsible" data-bs-toggle="collapse"
                                        href="#kt_user_view_details" role="button" aria-expanded="false"
                                        aria-controls="kt_user_view_details">Details
                                        <span class="ms-2 rotate-180">
                                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                                            <span class="svg-icon svg-icon-3">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none">
                                                    <path
                                                        d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z"
                                                        fill="black" />
                                                </svg>
                                            </span>
                                        </span>
                                    </div>
                                    <span data-bs-toggle="tooltip" data-bs-trigger="hover" title="Edit customer details">
                                        <a href="#" class="btn btn-sm btn-light-primary" data-bs-toggle="modal"
                                            data-bs-target="#update_details_modal">Edit</a>
                                    </span>
                                </div>
                                <!--end::Details toggle-->
                                <div class="separator"></div>
                                <!--begin::Details content-->
                                <div id="kt_user_view_details" class="collapse show">
                                    <div class="pb-5 fs-6">
                                        <!--begin::Details item-->
                                        <div class="fw-bolder mt-5">Account ID</div>
                                        <div class="text-gray-600">{{ $user->username }}</div>
                                        <!--begin::Details item-->
                                        <!--begin::Details item-->
                                        <div class="fw-bolder mt-5">Contact Number</div>
                                        <div class="text-gray-600">
                                            <a type="button"
                                                class="text-gray-600 text-hover-primary">{{ $user->phone }}</a>
                                        </div>
                                        <!--begin::Details item-->
                                        <!--begin::Details item-->
                                        <div class="fw-bolder mt-5">Email</div>
                                        <div class="text-gray-600">
                                            <a href="#"
                                                class="text-gray-600 text-hover-primary">{{ $user->email }}</a>
                                        </div>
                                        @if (isset($last_active))
                                            <!--begin::Details item-->
                                            <!--begin::Details item-->
                                            <div class="fw-bolder mt-5">Last Login</div>
                                            <div class="text-gray-600">{{ $last_active }}</div>
                                            <!--begin::Details item-->
                                        @endif
                                    </div>
                                </div>
                                <!--end::Details content-->
                            </div>
                            <!--end::Card body-->
                        </div>
                    </div>
                    <!--end::Sidebar-->
                    <!--begin::Content-->
                    <div class="flex-lg-row-fluid ms-lg-15">
                        <!--begin:::Tabs-->
                        <ul class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-bold mb-8">
                            <li class="nav-item">
                                <a class="nav-link text-active-primary pb-4 active" data-bs-toggle="tab"
                                    href="#profile">Overview</a>
                            </li>
                        </ul>
                        <!--end:::Tabs-->
                        <!--begin:::Tab content-->
                        <div class="tab-content" id="myTabContent">
                            <!--begin:::Tab pane-->
                            <div class="tab-pane fade show active" id="profile" role="tabpanel">
                                <!--begin::Card-->
                                <div class="card pt-4 mb-6 mb-xl-9">
                                    <!--begin::Card header-->
                                    <div class="card-header border-0">
                                        <!--begin::Card title-->
                                        <div class="card-title">
                                            <h2>Profile</h2>
                                        </div>
                                        <!--end::Card title-->
                                    </div>
                                    <!--end::Card header-->
                                    <!--begin::Card body-->
                                    <div class="card-body pt-0 pb-5">
                                        <!--begin::Table wrapper-->
                                        <div class="col-12 text-end">
                                            <button type="button"
                                                class="btn btn-icon btn-active-light-primary w-30px c ms-auto"
                                                data-bs-toggle="modal" data-bs-target="#update_info_modal">
                                                <!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
                                                <span class="svg-icon svg-icon-3">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none">
                                                        <path opacity="0.3"
                                                            d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z"
                                                            fill="black" />
                                                        <path
                                                            d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z"
                                                            fill="black" />
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                            </button>
                                        </div>
                                        <div class="table-responsive">
                                            <!--begin::Table-->
                                            <table class="table align-middle table-row-dashed gy-5"
                                                id="kt_table_users_login_session">
                                                <!--begin::Table body-->
                                                <tbody class="fs-6 fw-bold text-gray-600">
                                                    <tr>
                                                        <td>Email</td>
                                                        <td>{{ $user->email }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Password</td>
                                                        <td>******</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Role</td>
                                                        <td>{{ $user->role->name }}</td>
                                                        <td class="text-end"></td>
                                                    </tr>
                                                </tbody>
                                                <!--end::Table body-->
                                            </table>
                                            <!--end::Table-->
                                        </div>
                                        <!--end::Table wrapper-->
                                    </div>
                                    <!--end::Card body-->
                                </div>
                            </div>
                        </div>
                        <!--end:::Tab content-->
                    </div>
                    <!--end::Content-->
                </div>
                <!--end::Layout-->
                <!--begin::Modals-->
                <!--begin::Modal - Update user details-->
                <div class="modal fade" id="update_details_modal">
                    <!--begin::Modal dialog-->
                    <div class="modal-dialog mw-650px">
                        <!--begin::Modal content-->
                        <div class="modal-content">
                            <!--begin::Form-->
                            <form class="form" method="post" id="modal_form"
                                action="{{ route('users.update', $user->id) }}" enctype="multipart/form-data">
                                <!--begin::Modal header-->
                                <div class="modal-header" id="modal_header">@csrf
                                    <!--begin::Modal title-->@method('put')
                                    <h2 class="fw-bolder">Update {{ $user->role->name }} Details</h2>
                                    <!--end::Modal title-->
                                    <!--begin::Close-->
                                    <div class="btn btn-icon btn-sm btn-active-icon-primary" data-modal-coc="close">
                                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                                        <span class="svg-icon svg-icon-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none">
                                                <rect opacity="0.5" x="6" y="17.3137" width="16"
                                                    height="2" rx="1" transform="rotate(-45 6 17.3137)"
                                                    fill="black" />
                                                <rect x="7.41422" y="6" width="16" height="2"
                                                    rx="1" transform="rotate(45 7.41422 6)" fill="black" />
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                    </div>
                                    <!--end::Close-->
                                </div>
                                <!--end::Modal header-->
                                <!--begin::Modal body-->
                                <div class="modal-body py-10 px-lg-17">
                                    <!--begin::Scroll-->
                                    <div class="d-flex flex-column scroll-y me-n7 pe-7">
                                        <!--begin::User toggle-->
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="fv-row mb-7">
                                                    <div class="m-5">
                                                        <!--begin::Image input-->
                                                        <div class="image-input image-input-outline"
                                                            data-kt-image-input="true"
                                                            style="background-image: url({{ assets('assets/backend/img/default-user.png') }})">
                                                            <div class="image-input-wrapper w-125px h-125px"
                                                                style="background-image: url({{ image($user->photo, 'user') }})">
                                                            </div>
                                                            <label
                                                                class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                                data-kt-image-input-action="change"
                                                                data-bs-toggle="tooltip" title=""
                                                                data-bs-original-title="Change Photo">
                                                                <i class="bi bi-pencil-fill fs-7"></i>
                                                                <input type="file" name="photo"
                                                                    accept=".png, .jpg, .jpeg">
                                                            </label>
                                                            <span
                                                                class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                                data-kt-image-input-action="cancel"
                                                                data-bs-toggle="tooltip" title=""
                                                                data-bs-original-title="Cancel Photo">
                                                                <i class="bi bi-x fs-2"></i>
                                                            </span>
                                                            <span
                                                                class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                                data-kt-image-input-action="remove"
                                                                data-bs-toggle="tooltip" title=""
                                                                data-bs-original-title="Remove Photo">
                                                                <i class="bi bi-x fs-2"></i>
                                                            </span>
                                                        </div>
                                                        <div class="form-text">Allowed file types: png, jpg, jpeg.</div>
                                                    </div>
                                                </div>
                                            </div>

                                            @if ($user->id === 1)
                                                <div class="col-6">
                                                    <div class="fv-row mb-7">
                                                        <label class="d-block fw-bold fs-6"
                                                            style="margin: -5px 0 0 0">Super Admin Signature</label>
                                                        <div class="image-input image-input-outline ml-2"
                                                            data-kt-image-input="true">
                                                            <div class="image-input-wrapper w-125px h-125px"
                                                                style="background-image: url({{ image($user->getSettings('signature')) }})"
                                                                id="signature"></div>
                                                            <label
                                                                class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                                data-kt-image-input-action="change"
                                                                data-bs-toggle="tooltip" title="Change signature">
                                                                <i class="bi bi-pencil-fill fs-7"></i>
                                                                <input type="file" name="signature"
                                                                    accept=".png, .jpg, .jpeg" />
                                                            </label>
                                                            <span
                                                                class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                                data-kt-image-input-action="cancel"
                                                                data-bs-toggle="tooltip" title="Cancel signature">
                                                                <i class="bi bi-x fs-2"></i>
                                                            </span>
                                                            <span
                                                                class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                                data-kt-image-input-action="remove"
                                                                data-bs-toggle="tooltip" title="Remove avatar"><i
                                                                    class="bi bi-x fs-2"></i>
                                                            </span>
                                                        </div>
                                                        <div class="form-text">Allowed file types: png, jpg, jpeg.</div>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>



                                        <div class="fv-row mb-7">
                                            <label class="fs-6 fw-bold mb-2">Name</label>
                                            <input type="text" class="form-control form-control-solid" name="name"
                                                value="{{ $user->name }}" required />
                                        </div>
                                        <div class="fv-row mb-7">
                                            <label class="fs-6 fw-bold mb-2">Email</label>
                                            <input type="email" class="form-control form-control-solid" name="email"
                                                value="{{ $user->email }}" required />
                                        </div>
                                        <div class="fv-row mb-7">
                                            <label class="fs-6 fw-bold mb-2">Contact Number</label>
                                            <input type="text" class="form-control form-control-solid" name="phone"
                                                value="{{ $user->phone }}" required />
                                        </div>
                                    </div>
                                    <!--end::Scroll-->
                                </div>
                                <!--end::Modal body-->
                                <!--begin::Modal footer-->
                                <div class="modal-footer flex-center">
                                    <!--begin::Button-->
                                    <input type="hidden" name="redirect" value="{{ route('profile') }}">
                                    <input type="hidden" name="role_id" value="{{ $user->role->id }}">
                                    <button type="reset" class="btn btn-light me-3"
                                        data-modal-coc="close">Discard</button>
                                    <!--end::Button-->
                                    <!--begin::Button-->
                                    <button type="submit" class="btn btn-primary">
                                        <span class="indicator-label">Update</span>
                                    </button>
                                    <!--end::Button-->
                                </div>
                                <!--end::Modal footer-->
                            </form>
                            <!--end::Form-->
                        </div>
                    </div>
                </div>

                <!--begin::Modal - Update cradential-->
                @include('profile.credential-update')
                <!--end::Modal - Update cradential-->
            </div>
        </div>
    @endsection
