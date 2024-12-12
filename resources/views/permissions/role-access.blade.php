@extends('layouts.app', ['title' => 'Access Role Manage'])
@section('css')
    <style>
        .permission td>span.badge {
            margin-right: 3px;
        }
    </style>
@endsection
@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="toolbar" id="kt_toolbar">
            <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
                <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
                    data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
                    class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                    <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Access Role List</h1>
                    <span class="h-20px border-gray-200 border-start mx-4"></span>
                    <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
                        <li class="breadcrumb-item text-muted">
                            <a href="{{ url('') }}" class="text-muted text-hover- primary" target="blunk">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-200 w-5px h-2px"></span>
                        </li>

                        <li class="breadcrumb-item text-dark">Access Role List</li>
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
                            <div class="d-flex justify-content-end">
                                <button type="button" class="btn btn-primary add-new"
                                    data-add-click-modal-target="#classModal">
                                    Add Access Role
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="card-body pt-0">
                        <table class="table align-middle table-row-dashed fs-6 gy-5 classic-data-table">
                            <thead>
                                <tr class="text-start text-muted fw-bolder fs-7 gs-0">
                                    <th></th>
                                    <th class="min-w-125px">Access Role Name</th>
                                    <th class="min-w-125px">url Prefix</th>
                                    <th class="min-w-125px">Access Permissions</th>
                                    <th class="min-w-125px">Status</th>
                                    <th class="min-w-125px">Date</th>
                                    <th class="text-end min-w-100px">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-600 fw-bold permission">
                                @php
                                    function permissionShow($permissions)
                                    {
                                        $output = '';
                                        $permissionData = \App\Services\Helpers::$permissions;
                                        foreach ($permissions as $permission) {
                                            if ($permission = $permissionData[$permission] ?? null) {
                                                $output .= "<span class=\"badge badge-light-{$permission['alert']}\">{$permission['name']}</span>";
                                            }
                                        }
                                        return $output;
                                    }
                                @endphp
                                @foreach ($roleList as $row)
                                    @if (!in_array($row->prefix, ['guardian', 'staff']))
                                        <tr>
                                            <td>{{ $row->id }}</td>
                                            <td>{{ $row->name }}</td>
                                            <td>{{ $row->prefix }}</td>
                                            <td>{!! permissionShow($row->permissions) !!}</td>
                                            <td>
                                                {!! getStatus($row->status, route('roles.edit', $row->id)) !!}
                                            </td>

                                            <td>{{ $row->updated_at ? $row->updated_at->format('j F, Y') : '' }}</td>
                                            <td class="text-end">
                                                <a href="#" class="btn btn-light btn-active-light-primary btn-sm"
                                                    data-kt-menu-trigger="click"
                                                    data-kt-menu-placement="bottom-end">Actions</a>
                                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4"
                                                    data-kt-menu="true">
                                                    <div class="menu-item px-3">
                                                        <a type="button" id="edit_{{ $row->id }}"
                                                            class="edit-show menu-link px-3" data-modal-show="#classModal"
                                                            aria-label="Edit">Edit</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="classModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog mw-650px">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="fw-bolder modal-title">Add new Access Role</h2>
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
                <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                    <form id="accessForm" class="form" method="post">
                        @csrf @method('put')
                        <div class="d-flex flex-column scroll-y me-n7 pe-7">
                            <div class="fv-row mb-7">
                                <label class="required fw-bold fs-6 mb-2">Access Role Name</label>
                                <input type="text" name="name" class="form-control form-control-solid mb-3 mb-lg-0"
                                    placeholder="Access Role Name" required />
                            </div>
                            <div class="fv-row mb-7">
                                <label class="required fw-bold fs-6 mb-2">Prefix</label>
                                <input type="text" name="prefix" class="form-control form-control-solid mb-3 mb-lg-0"
                                    placeholder="prefix" required />
                            </div>
                            <div class="fv-row mb-7">
                                <label class="required fw-bold fs-6 mb-2">Permissions</label>
                                <select name="permissions[]" aria-label="Permission Select" data-control="select2"
                                    data-hide-search="true" data-placeholder="Permission Select" required multiple
                                    class="form-control form-control-solid mb-3 mb-lg-0">
                                    <option disabled hidden value="">Permission Select</option>
                                    {!! optionsProcess(toObject(getPermissions())) !!}
                                </select>
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
            modalTitle = 'Add Access Role';
            tableData = @json($roleList);
            actionurl = '{{ route('roles.index') }}';
        });
    </script>
@endpush
