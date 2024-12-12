@extends('layouts.app', ['title' => 'Contact Email List'])

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
                        <table class="table align-middle table-row-dashed fs-6 gy-5 classic-data-table">
                            <thead>
                                <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                                    <th></th>
                                    <th class="min-w-150px">Name</th>
                                    <th class="min-w-50px">Email</th>
                                    <th class="min-w-100px">Subject</th>
                                    <th class="min-w-200px">Message</th>
                                    <th class="w-25px">Date</th>
                                    <th class="text-end px-1 w-50px">Actions</th>
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

                                        <td class="p-0" style="width: 85px !important">
                                            {{ $row->created_at?->format('j M, Y') }}</td>
                                        <td class="text-end px-1" style="width: 85px !important">
                                            <a type="button" data-delete-url="{{ route('contacts.destroy', $row->id) }}"
                                                class="menu-link px-3 delete-row"
                                                data-kt-users-table-filter="delete_row">Delete</a>
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
        dataTableOptions.columnDefs = [{
            "targets": [0],
            "visible": false,
            "searchable": false
        }];
        $(document).ready(function() {
            tableData = @json($contactList);
        });
    </script>
@endpush
