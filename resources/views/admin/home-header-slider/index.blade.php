@extends('layouts.app', ['title' => 'Home Page First Section Manage'])

@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="toolbar" id="kt_toolbar">
            <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
                <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
                    data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
                    class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                    <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Home Page First Section</h1>
                    <span class="h-20px border-gray-200 border-start mx-4"></span>
                    <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
                        <li class="breadcrumb-item text-muted">
                            <a href="{{ url('') }}" class="text-muted text-hover- primary" target="blunk">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-200 w-5px h-2px"></span>
                        </li>

                        <li class="breadcrumb-item text-dark">Home Page First Section</li>
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
                                data-add-click-modal-target="#sliderModal">
                                <i class="ki-duotone ki-plus fs-2"></i> Add New
                            </button>
                            <div class="modal fade" id="sliderModal" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog mw-650px">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h2 class="fw-bolder modal-title">Add New Slider</h2>
                                            <div class="btn btn-icon btn-sm btn-active-icon-primary" data-modal-coc="close">
                                                <span class="svg-icon svg-icon-1">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none">
                                                        <rect opacity="0.5" x="6" y="17.3137" width="16" height="2"
                                                            rx="1" transform="rotate(-45 6 17.3137)"
                                                            fill="black" />
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
                                                <div class="d-flex flex-column scroll-y me-n7 pe-7"
                                                    data-kt-scroll-offset="300px">
                                                    <div class="fv-row mb-7">
                                                        <label class="required fw-bold fs-6 mb-2">Title</label>
                                                        <input type="text" name="title"
                                                            class="form-control form-control-solid mb-3 mb-lg-0"
                                                            placeholder="Enter Top Title" required />
                                                    </div>
                                                    <div class="fv-row mb-7">
                                                        <label class="required fw-bold fs-6 mb-2">Description</label>
                                                        <textarea class="form-control form-control-solid mb-8" name="description" rows="8" placeholder="Write description"
                                                            required></textarea>
                                                    </div>
                                                    <div class="fv-row mb-7">
                                                        <label class="d-block fw-bold fs-6 mb-5">Slider Image</label>
                                                        <div class="image-input image-input-outline ml-2"
                                                            data-kt-image-input="true">
                                                            <div class="image-input-wrapper w-250px h-150px"></div>
                                                            <label
                                                                class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                                data-kt-image-input-action="change"
                                                                data-bs-toggle="tooltip" title="Change avatar">
                                                                <i class="bi bi-pencil-fill fs-7"></i>
                                                                <input type="file" name="image"
                                                                    accept=".png, .jpg, .jpeg" />
                                                            </label>
                                                            <span
                                                                class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                                data-kt-image-input-action="cancel"
                                                                data-bs-toggle="tooltip" title="Cancel Image">
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
                                                <div class="text-center pt-15">
                                                    <button type="reset" class="btn btn-light me-3"
                                                        data-modal-coc="close">Discard</button>
                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-body pt-0">
                        <table class="table align-middle table-row-dashed fs-6 gy-5 classic-data-table">
                            <thead>
                                <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                                    <th>#</th>
                                    <th class="min-w-350px">Slider</th>
                                    <th class="min-w-200px">description</th>
                                    <th class="w-50px">Status</th>
                                    <th class="w-125px">Date</th>
                                    <th class="text-end min-w-100px">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-600 fw-bold">

                                @foreach ($homeHeaderSlides as $row)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <div class="d-flex align-items-center me-3">
                                                <!--begin::Logo-->
                                                <img src="{{ image($row->image) }}" class="me-4 w-80px" alt="">
                                                <!--end::Logo-->

                                                <!--begin::Section-->
                                                <div class="flex-grow-1">
                                                    <!--begin::Text-->
                                                    <span
                                                        class="text-gray-800 text-hover-primary fs-5 fw-bold lh-0">{{ $row->title }}</span>
                                                    <!--end::Text-->
                                                </div>
                                                <!--end::Section-->
                                            </div>
                                        </td>
                                        <td>{{ $row->description }}</td>
                                        <td>
                                            {!! getStatus($row->status, route('home-page-sliders.edit', $row->id)) !!}
                                        </td>

                                        <td>{{ ($row->updated_at ?: $row->created_at)->format('j F, Y') }}</td>
                                        <td class="text-end">
                                            <a data-modal-show="#sliderModal" type="button"
                                                id="edit_{{ $row->id }}" class="edit-show btn btn-sm btn-warning"
                                                aria-label="Edit">Edit</a>
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
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            modalTitle = 'Add Home Page First Section';
            tableData = @json($homeHeaderSlides);
            actionurl = '{{ route('home-page-sliders.store') }}';
        });
    </script>
@endpush
