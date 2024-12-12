@extends('layouts.app', ['title' => 'Contact Email List'])

@push('style')
    <style>
        table tr td > .axc {
            cursor: pointer;
            margin-right: 5px;
            padding: 5px 12px 5px 12px !important;
        }
        .date-style {
            position: absolute;
            right: 40px;
            bottom: -5px;
            font-size: 15px;
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
                    <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Contact Email List</h1>
                    <span class="h-20px border-gray-200 border-start mx-4"></span>
                    <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
                        <li class="breadcrumb-item text-muted">
                            <a href="{{ url('') }}" class="text-muted text-hover- primary" target="blunk">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-200 w-5px h-2px"></span>
                        </li>

                        <li class="breadcrumb-item text-dark">Contact Email List</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="post d-flex flex-column-fluid" id="kt_post">
            <div id="kt_content_container" class="container-xxl" style="min-width: max-content !important">

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
                        <table class="table align-middle table-row-dashed fs-6 gy-5 classic-data-table" style="width: 100%">
                            <thead>
                            <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                                <th></th>
                                <th width="18%" class="w-150px">Name</th>
                                <th width="20%" class="w-200px">Email</th>
                                <th width="23%" class="w-200px">Subject</th>
                                <th width="25%" class="w-200px">Message</th>
                                <th width="8%" class="w-100px">Date</th>
                                <th width="7%" class="text-end px-1 w-50px">Actions</th>
                            </tr>
                            </thead>
                            <tbody class="text-gray-600 fw-bold">

                            @foreach ($contactList as $row)

                                @php
                                    $subject = Str::words($row->subject, 5, ' ...');
                                    $message = Str::words($row->message, 5, ' ...');
                                @endphp

                                <tr>
                                    <td>{{ $loop->index }}</td>
                                    <td>{{ $row->name }}</td>
                                    <td>{{ $row->email }}</td>
                                    <td>{{ $subject }}</td>
                                    <td>{{ $message }}</td>

                                    <td class="p-0" style="min-width: 80px !important">
                                        {{ $row->created_at?->format('j M, Y') }}
                                    </td>
                                    <td class="d-flex justify-content-end">
                                        <i class="axc btn btn-sm btn-light-success fs-4 fas fa-eye" data-view="{{ $row->id }}"></i>
                                        <span class="axc me-0 btn btn-sm btn-light-danger delete-row " data-delete-url="{{ route('contacts.destroy', $row->id) }}">
                                                <i class="fs-4 fas fa-trash"></i>
                                            </span>
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


    <div class="modal fade" id="contactModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog mw-650px">
            <div class="modal-content">
                <div class="modal-header" id="modal_header">
                    <h2 class="fw-bolder modal-title">Contact Details</h2>
                    <div class="btn btn-icon btn-sm btn-active-icon-primary" data-modal-coc="close">
                    <span class="svg-icon svg-icon-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                             fill="none">
                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2"
                                  rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
                            <rect x="7.41422" y="6" width="16" height="2" rx="1"
                                  transform="rotate(45 7.41422 6)" fill="black" />
                        </svg>
                    </span>
                    </div>
                </div>

                <div class="modal-body py-10 px-lg-17">
                    <!--begin::Scroll-->
                    <div class="d-flex flex-column me-n7 pe-7">
                        <div class="contact-details">
                            <h2>Name : <span id="name" class="text-primary mb-3"></span></h2>
                            <p class="mb-2"><strong>Email : </strong> <span id="email"></span></p>
                            <p class="mb-2"><strong>Phone : </strong> <span id="phone"></span></p>
                            <p class="mb-2"><strong>Subject : </strong> <span id="subject"></span></p>
                            <p class="mb-5"><strong>Message : </strong> <span id="message"></span></p>
                            <p class="mb-3 date-style"><strong>Date : </strong> <span id="created_at"></span></p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer flex-center">
                    <button type="button" class="btn text-hover-black" data-modal-coc="close">Close</button>
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
            tableData = @json($contactList);
        });
        $(document).on('click', '[data-view]', function() {
            let id = this.dataset.view, contact = tableData.find(c => c.id == id);

            const date = new Date(contact.created_at);
            const formatLocalDate = date.toLocaleString("hi-IN");
            console.log(formatLocalDate.toLocaleString());

            // const date = new Date();
            // const formatLocalDate = date.toLocaleString();
            // const formatSpecified = date.toLocaleString("hi-IN");
            // console.log(formatLocalDate);
            // console.log(formatSpecified);

            $('#name').text(contact.name);
            $('#email').text(contact.email);
            $('#phone').text(contact.phone);
            $('#subject').text(contact.subject);
            $('#message').text(contact.message);
            $('#created_at').text(formatLocalDate.toLocaleString());
            $('#contactModal').modal('show');
        })
    </script>
@endpush
