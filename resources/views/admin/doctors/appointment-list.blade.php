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
                    <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Appointment List</h1>
                    <span class="h-20px border-gray-200 border-start mx-4"></span>
                    <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
                        <li class="breadcrumb-item text-muted">
                            <a href="{{ url('') }}" class="text-muted text-hover- primary" target="blunk">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-200 w-5px h-2px"></span>
                        </li>

                        <li class="breadcrumb-item text-dark">Appointment List</li>
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
                    </div>

                    <div class="card-body pt-0">
                        <table class="table align-middle table-row-dashed fs-6 gy-5 classic-data-table">
                            <thead>
                                <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                                    <th></th>
                                    <th width="24%" class="min-w-250px">Doctor</th>
                                    <th width="10%" class="min-w-125px">Patient</th>
                                    <th width="15%" class="w-150px">Date</th>
                                    <th width="20%" class="w-200px">Time</th>
                                    <th width="12%" class="min-w-125px">Created At</th>
                                    <th width="10%" class="text-end min-w-100px">Message</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-600 fw-bold">

                                @foreach ($appointments as $row)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <div class="d-flex align-items-center me-3">
                                                <!--begin::Logo-->
                                                <img src="{{ image($row->doctor?->photo) }}" class="me-4 min-w-50px w-75px doctor-img" alt="Doctor photo" />
                                                <!--end::Logo-->

                                                <!--begin::Section-->
                                                <div class="flex-grow-1">
                                                    <!--begin::Text-->
                                                    <span class="text-gray-800 fs-5 fw-bold lh-0">{{ $row->doctor?->name }}</span>
                                                    <!--end::Text-->
                                                </div>
                                            </div>
                                        </td>
                                        <td>{{ $row->patient?->name }}<br/>{{ $row->patient?->phone }}</td>
                                        <td>{{ ($row->day ?: $row->day)->format('d M, Y') }}</td>
                                        <td>{{ date('H:i A', strtotime($row->time)) }}</td>
                                        <td>{{ ($row->updated_at ?: $row->created_at)->format('d M, Y') }}</td>
                                        <td class="text-start">{{ $row->description }}</td>
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