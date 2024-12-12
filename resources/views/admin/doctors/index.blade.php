@extends('layouts.app', ['title' => 'Doctor Manage'])

@push('styles')
<style>
    .social-links {
        display: inline-flex;
        flex-wrap: wrap;
    }
    .social-links > div {
        width: 50% !important;
        margin-bottom: 10px;
    }
    .doctor-img {
        border-radius: 5px;
        max-height: 70px;
    }
</style>
@endpush

@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="toolbar" id="kt_toolbar">
            <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
                <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
                    data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
                    class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                    <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Doctor List</h1>
                    <span class="h-20px border-gray-200 border-start mx-4"></span>
                    <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
                        <li class="breadcrumb-item text-muted">
                            <a href="{{ url('') }}" class="text-muted text-hover- primary" target="blunk">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-200 w-5px h-2px"></span>
                        </li>

                        <li class="breadcrumb-item text-dark">Doctor List</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="post d-flex flex-column-fluid" id="kt_post">
            <div id="kt_content_container" class="container-xxl">

                @include('includes.backend.flash-message')

                <div class="card">
                    <div class="card-header border-0 pt-6">
                        <div class="card-title">
                            <div class="d-flex align-items-center position-relative my-1">
                                <span class="svg-icon svg-icon-1 position-absolute ms-6">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none">
                                        <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2"
                                            rx="1" transform="rotate(45 17.0365 15.1223)" fill="black" />
                                        <path
                                            d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                                            fill="black" />
                                    </svg>
                                </span>
                                <input type="text" data-table="search"
                                    class="form-control form-control-solid w-250px ps-14" placeholder="Search ..." />
                            </div>
                        </div>

                        <div class="card-toolbar">
                            <button type="button" class="btn btn-primary add-new"
                                data-add-click-modal-target="#doctorModal">
                                <i class="ki-duotone ki-plus fs-2"></i> Add New
                            </button>
                        </div>
                    </div>

                    <div class="card-body pt-0">
                        <table class="table align-middle table-row-dashed fs-6 gy-5 classic-data-table">
                            <thead>
                                <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                                    <th></th>
                                    <th width="24%" class="min-w-250px">Doctor</th>
                                    <th width="15%" class="w-150px">Department</th>
                                    <th width="15%" class="w-150px">Specialty</th>
                                    <th width="10%" class="min-w-125px">Phone</th>
                                    <th width="20%" class="w-200px">Description</th>
                                    <th width="10%" class="w-50px">Status</th>
                                    <th width="12%" class="min-w-125px">Date</th>
                                    <th width="10%" class="text-end min-w-100px">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-600 fw-bold">

                                @foreach ($doctors as $row)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <div class="d-flex align-items-center me-3">
                                                <!--begin::Logo-->
                                                <img src="{{ image($row->photo) }}" class="me-4 min-w-50px w-75px doctor-img" alt="Doctor photo" />
                                                <!--end::Logo-->

                                                <!--begin::Section-->
                                                <div class="flex-grow-1">
                                                    <!--begin::Text-->
                                                    <span class="text-gray-800 fs-5 fw-bold lh-0">{{ $row->name }}</span></br>
                                                    <span class="text-muted text-hover-primary fs-6">{{ $row->email }}</span>
                                                    <!--end::Text-->
                                                </div>
                                            </div>
                                        </td>
                                        <td>{{ $row->department->name }}</td>
                                        <td>{{ $row->specialty }}</td>
                                        <td>{{ $row->phone }}</td>
                                        <td>{{ $row->description }}</td>
                                        <td>
                                            {!! getStatus($row->status, route('doctors.edit', $row->id)) !!}
                                        </td>

                                        <td>{{ ($row->updated_at ?: $row->created_at)->format('d M, Y') }}</td>
                                        <td class="text-end">
                                            <a href="#" class="btn btn-light btn-active-light-primary btn-sm"
                                                data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions</a>
                                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7  w-125px py-4"
                                                data-kt-menu="true">
                                                <div class="menu-item px-3">
                                                    <a type="button" id="{{ $row->id }}" class="menu-link px-3 edit-show"
                                                        data-modal-show="#doctorModal" aria-label="Edit">Edit</a>
                                                </div>
                                                <div class="menu-item px-3">
                                                    <a type="button"
                                                        data-delete-url="{{ route('doctors.destroy', $row->id) }}"
                                                        data-kt-users-table-filter="delete_row"
                                                        class="menu-link px-3 delete-row">Delete</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="doctorModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog mw-650px">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="fw-bolder modal-title">Add New Doctor</h2>
                    <div class="btn btn-icon btn-sm btn-active-icon-primary" data-modal-coc="close">
                        <span class="svg-icon svg-icon-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none">
                                <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1"
                                    transform="rotate(-45 6 17.3137)" fill="black" />
                                <rect x="7.41422" y="6" width="16" height="2" rx="1"
                                    transform="rotate(45 7.41422 6)" fill="black" />
                            </svg>
                        </span>
                    </div>
                </div>
                <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                    <form method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="d-flex flex-column scroll-y me-n7 pe-7" data-kt-scroll-offset="300px">

                            <div class="fv-row mb-7">
                                <label class="d-block fw-bold fs-6 mb-5">Doctor Photo</label>
                                <div class="image-input image-input-outline ml-2" data-kt-image-input="true">
                                    <div class="image-input-wrapper w-170px h-175px"></div>
                                    <label
                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                        data-kt-image-input-action="change" data-bs-toggle="tooltip"
                                        title="Change avatar">
                                        <i class="bi bi-pencil-fill fs-7"></i>
                                        <input type="file" name="photo" accept=".png, .jpg, .jpeg" />
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
                            <div class="fv-row mb-7">
                                <label class="required fw-bold fs-6 mb-2">Name</label>
                                <input type="text" name="name" class="form-control form-control-solid mb-3 mb-lg-0"
                                    placeholder="Enter Full Name" required />
                            </div>
                            <div class="fv-row mb-7">
                                <label class="required fw-bold fs-6 mb-2">Department</label>

                                <select name="department_id" class="form-select form-select-solid"
                                        data-control="select2" data-placeholder="--- Select Department ---" data-hide-search="true" required>
                                    <option value="">Select Category</option>
                                    {!! optionsProcess(departments()) !!}
                                </select>
                            </div>
                            <div class="fv-row mb-7">
                                <label class="fw-bold fs-6 mb-2">Specialty</label>
                                <input required type="text" name="specialty"
                                       class="form-control form-control-solid mb-3 mb-lg-0"
                                       placeholder="Enter Specialty" />
                            </div>
                            <div class="fv-row mb-7">
                                <label class="fw-bold fs-6 mb-2">Email</label>
                                <input type="email" name="email" class="form-control form-control-solid mb-3 mb-lg-0"
                                    placeholder="Enter Email" />
                            </div>
                            <div class="fv-row mb-7">
                                <label class="required fw-bold fs-6 mb-2">Phone</label>
                                <input type="tel" required name="phone" class="form-control form-control-solid mb-3 mb-lg-0"
                                    placeholder="Enter Phone Number" />
                            </div>
                            <div class="fv-row mb-7">
                                <label class="required fw-bold fs-6 mb-2">Qualification</label>
                                <input type="text" name="qualification" required
                                    class="form-control form-control-solid mb-3 mb-lg-0"
                                    placeholder="Enter Qualification" />
                            </div>
                            <div class="fv-row mb-7">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="fw-bold fs-6 mb-2">Religion</label>
                                        <input type="text" name="religion"
                                            class="form-control form-control-solid mb-3 mb-lg-0"
                                            placeholder="Enter Religion" />
                                    </div>
                                    <div class="col-md-6">
                                        <label class="required fw-bold fs-6 mb-2">Gender</label>
                                        <select name="gender" class="form-select form-select-solid"
                                            data-control="select2" data-placeholder="--- Select gender ---" data-hide-search="true"
                                            required>
                                            <option value="">Select Gender</option>
                                            {!! genderHandler() !!}
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="fv-row mb-7">
                                <label class="required fw-bold fs-6 mb-2">Address</label>
                                <input type="text" name="address" class="form-control form-control-solid mb-3 mb-lg-0"
                                    placeholder="Enter Address" />
                            </div>
                            <div class="fv-row mb-7">
                                <label class="required fw-bold fs-6 mb-2">Description</label>
                                <textarea class="form-control form-control-solid mb-8" name="description" rows="8"
                                    placeholder="Write description" required></textarea>
                            </div>

                            <div class="fv-row mb-7">
                                <label class="fw-bold fs-6 mb-2">Social Media Link</label>
                                <div class="social-links">
                                    <div class="d-flex align-items-center">
                                        <i class="fab fa-twitter fs-3 me-2"></i>
                                        <input type="url" name="twitter" class="form-control form-control-solid me-3 mb-lg-0"
                                        placeholder="Enter Twitter Link" />
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <i class="fab fa-facebook-f fs-3 me-2"></i>
                                        <input type="url" name="facebook" class="form-control form-control-solid me-3 mb-lg-0"
                                        placeholder="Enter Facebook Link" />
                                    </div>

                                    <div class="d-flex align-items-center">
                                        <i class="fab fa-instagram fs-3 me-2"></i>
                                        <input type="url" name="instagram" class="form-control form-control-solid me-3 mb-lg-0"
                                        placeholder="Enter Instagram Link" />
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="text-center pt-15">
                            <button type="reset" class="btn btn-light me-3" data-modal-coc="close">Discard</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        dataTableOptions.columnDefs = [{
            "targets": [0],
            "visible": false,
            "searchable": false
        }];
        $(document).ready(function() {
            modalTitle = 'Add Doctor Details';
            tableData = @json($doctors);
            actionurl = '{{ route('doctors.store') }}';
        });

        runFnFromEdit = (editInfo) => {
            let socialMedia = editInfo.options && editInfo.options.social_media ? JSON.parse(editInfo.options.social_media) : {};
            for(const [key, value] of Object.entries(socialMedia)) {
                $(`input[name="${key}"]`).val(value);
            }
        }
    </script>
@endpush
