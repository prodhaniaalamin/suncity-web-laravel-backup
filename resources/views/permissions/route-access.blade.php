@extends('layouts.app', ['title' => 'Access Route Manage'])

@section('css')
    <style>
        .icons .menu-sub-dropdown {
            width: 495px !important;
        }

        .icons .svg-icon-2.me-0 {
            float: right;
            margin-top: 4px;
        }

        .icons .selected-icon {
            display: inline;
        }

        .icons .selected-icon span i,
        tbody td.folder-link,
        tbody td.folder-link i {
            color: #009EF7;
        }

        .icons .menu {
            max-height: 300px;
            overflow-y: scroll;
        }

        tbody td i.check {
            font-size: 25px;
            line-height: 0;
            cursor: pointer;
        }

        tbody td.edit {
            padding: 0 !important
        }

        tbody td i.fa-edit {
            font-size: 18px;
            padding: 1px 6px 3px 9px !important;
            line-height: 28px;
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
                    <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Access Route List</h1>
                    <span class="h-20px border-gray-200 border-start mx-4"></span>
                    <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
                        <li class="breadcrumb-item text-muted">
                            <a href="{{ url('') }}" class="text-muted text-hover- primary" target="blunk">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-200 w-5px h-2px"></span>
                        </li>

                        <li class="breadcrumb-item text-dark">Access Route List</li>
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
                                <input type="text" name="search-route"
                                    class="form-control form-control-solid w-250px ps-14" placeholder="Search..." />
                            </div>
                            <div style="margin-left: 50%">
                                <select name="role" class="form-select form-select-solid w-200px" data-control="select2"
                                    data-placeholder="Role select" data-hide-search="true">
                                    <option disabled selected value="">Select a Role</option>
                                    {!! optionsProcess(roles()) !!}
                                </select>
                            </div>
                        </div>

                        @if ($user->role_id === 1)
                            <div class="card-toolbar">
                                <div class="d-flex justify-content-end">
                                    <button type="button" class="btn btn-primary add-new"
                                        data-add-click-modal-target="#routeModal">Add</button>
                                </div>
                            </div>
                        @endif
                    </div>

                    <div class="card-body pt-0">
                        <table class="table align-middle table-row-dashed fs-6 gy-5 classic-data-table">
                            <thead>
                                <tr class="text-start text-muted fw-bolder fs-7 gs-0">
                                    <th></th>
                                    <th class="min-w-125px">Link Name</th>
                                    <th class="min-w-150px">Route Nav</th>
                                    <th class="min-w-125px">Permission</th>
                                    @if ($user->role_id === 1)
                                        <th class="min-w-125px">Route</th>
                                        <th class="min-w-125px">Status</th>
                                        <th class="min-w-125px">Date</th>
                                        <th class="text-end min-w-100px">Actions</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody class="text-gray-600 fw-bold tbody"></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="routeModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog mw-650px">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="fw-bolder modal-title">Add new Access Route</h2>
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
                    <form id="routeForm" class="form" method="post">
                        @csrf @method('put')
                        <div class="d-flex flex-column scroll-y me-n7 pe-7">
                            <div class="fv-row mb-7">
                                <label class="required fw-bold fs-6 mb-2">Name/Label</label>
                                <input type="text" name="name" class="form-control form-control-solid mb-3 mb-lg-0"
                                    placeholder="Route Name" required />
                            </div>
                            <div class="fv-row mb-7">
                                <label class="required fw-bold fs-6 mb-2">Route/Link type</label>
                                <select name="type" aria-label="Link type Select" data-control="select2"
                                    data-hide-search="true" data-placeholder="Link type Select" required
                                    class="form-control form-control-solid mb-3 mb-lg-0">
                                    <option value="">Link type Select</option>
                                    {!! optionHandler(['folder' => 'Folder', 'subfolder' => 'Subfolder', 'link' => 'Link'], false, 1) !!}
                                </select>
                            </div>

                            <div class="fv-row mb-7 icons hide">
                                <label class="required fw-bold fs-6 mb-2">Folder Icon</label>
                                <a href="#" class="form-control form-control-solid" data-kt-menu-trigger="click"
                                    data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
                                    <p class="p-0 m-0 selected-icon">Select Folder Icon</p>
                                    <span class="svg-icon svg-icon-2 me-0">
                                        <i class="icon-xl fas fa-chevron-down"></i>
                                    </span>
                                </a>
                                <div class="menu menu-sub menu-sub-dropdown menu-rounded menu-gray-800 menu-state-bg-light-primary fw-bold py-4 fs-6"
                                    data-kt-menu="true">
                                    @foreach (icons() as $key => $value)
                                        <div class="menu-item px-5">
                                            <a type="button" data-icon="{{ $key }}" class="menu-link px-5">
                                                <span class="menu-icon">
                                                    <span class="svg-icon svg-icon-2">
                                                        {!! $value !!}
                                                    </span>
                                                </span>
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <div class="fv-row mb-7 folder hide">
                                <label class="required fw-bold fs-6 mb-2">Folder Select</label>
                                <select name="folder_id" aria-label="Folder Select" data-control="select2"
                                    data-hide-search="true" data-placeholder="Folder Select"
                                    class="form-control form-control-solid mb-3 mb-lg-0">
                                    <option value="">Select Folder</option>
                                    {!! optionsProcess(getNaves()->where('parent_id', 0)) !!}
                                </select>
                            </div>

                            <div class="fv-row mb-7 subfolder hide">
                                <label class="required fw-bold fs-6 mb-2">Subfolder Select</label>
                                <select name="subfolder_id" aria-label="Subfolder Select" data-control="select2"
                                    data-hide-search="true" data-placeholder="Subfolder Select"
                                    class="form-control form-control-solid mb-3 mb-lg-0">
                                    <option value="">Select Subfolder</option>
                                </select>
                            </div>

                            <div class="fv-row mb-7 link hide">
                                <label class="required fw-bold fs-6 mb-2">Route/Link</label>
                                <input type="text" name="route" class="form-control form-control-solid mb-3 mb-lg-0"
                                    placeholder="route.." />
                            </div>
                        </div>
                        <div class="text-center pt-15">
                            <input type="hidden" name="icon">
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
        modalTitle = 'Add Route';
        actionurl = '{{ route('app-links.index') }}';
        tableData = @json($routeList);
        let roles = @json(roles());
        let icons = @json(icons());

        let routeAccessControl = '{{ route('app.routeAccessControl') }}';
        let sh, modal, tbody, selectedIcon, icon, iconContainer, iconButtons, linkType, folder, folderContainer, subfolder,
            subfolderContainer;
        let statusData = ['Inactivated', 'Activated'],
            currentRole = {},
            routeFieldContainer, routeField;
        let logUserType = @json($user->role_id),
            dataTable;

        addClicked = () => {
            icon.val('');
            $('#routeForm .hide').css('display', 'none');
            selectedIcon.html('Select Folder Icon');
            iconButtons.removeClass('active');
        }

        $(document).ready(function() {
            routeFieldContainer = $('.link');
            routeField = $('input[name="route"]');
            selectedIcon = $('p.selected-icon');
            icon = $('input[name="icon"]');
            subfolder = $('select[name="subfolder_id"]');
            subfolderContainer = $('.subfolder.hide');
            folder = $('select[name="folder_id"]');
            linkType = $('select[name="type"]');
            folderContainer = $('.folder.hide');
            iconContainer = $('.icons.hide');
            iconButtons = $('a[data-icon]');
            tbody = $('tbody.tbody');
            modal = $('#routeModal');
            routeListManage();

            iconButtons.click(function() {
                let clicked = $(this);

                icon.val(this.dataset.icon);
                selectedIcon.html(clicked.html());
                iconButtons.removeClass('active');
                clicked.addClass('active');
            });

            linkType.change(function() {
                subfolder.html('');
                subfolderContainer.hide();
                iconContainer.css('display', this.value === 'folder' ? 'block' : 'none');
                folderContainer.css('display', this.value !== 'folder' ? 'block' : 'none');
                routeFieldContainer.css('display', this.value !== 'subfolder' ? 'block' : 'none');
                this.value === 'subfolder' && routeField.val('');
            });

            select2Recheck(folder.html(
                `<option value="">Select Folder</option>${getOptions(tableData.filter(f => f.parent_id === 0))}`
            ));
            folder.change(function() {
                let id = parseInt(this.value);
                if ($('select[name="type"]').val() === 'subfolder') return false;

                let sub_folders = tableData.filter(item => item.type === 'subfolder' && item.parent_id ===
                    id);
                subfolder.html(`<option value="">Select Subfolder</option>${getOptions(sub_folders)}`);
                subfolderContainer.css('display', sub_folders.length ? 'block' : 'none');
            });

            $('[name="role"]').change(tableReload);


            $(document).on('click', 'i[data-permission]', function(e) {

                let appLink = parseInt(this.dataset.permission);
                if (this.classList.contains('fa-square')) {
                    this.className = 'fa-check-square';
                    currentRole.roleRoutes.push(appLink);
                } else {
                    this.className = 'fa-square';
                    currentRole.roleRoutes = currentRole.roleRoutes.filter(route => route !== appLink);
                }

                this.className += ` icon-xl far check`;
                currentRole.roleRoutes.sort((a, b) => a - b);
                axios.put(routeAccessControl, {
                    role: currentRole.id,
                    routes: currentRole.roleRoutes.toString()
                });
            });

            $(document).on('click', '[data-edit]', function(e) {
                modal.modal('show');

                let edit = parseInt(this.dataset.edit);
                $('#routeForm input[name="_method"]').val('PUT');
                $('#routeForm button[type="submit"]').text("Update");
                $('#routeForm').attr('action', `${actionurl}/${edit}`);

                edit = tableData.find(item => item.id === edit);

                $('.hide').hide();
                let nestedParents = nestedParentByChildId(edit.id, tableData);

                if (edit.parent_id === 0) {
                    icon.val(edit.icon);
                    iconContainer.show();
                    iconButtons.removeClass('active');
                    selectedIcon.html(getIcon(edit, true));
                    $(iconButtons[edit.icon]).addClass('active');
                }

                if (nestedParents.length > 1)
                    nestedParents.map(item => {
                        if (item.type !== 'link') {
                            let data = tableData.filter(row => row.type === item.type && row
                                .parent_id === item.parent_id);
                            $(`select[name="${item.type}_id"]`).html(
                                `<option value="">Select ${upFirst(item.type)}</option>${getOptions(data, item.id)}`
                            );
                            select2Recheck($(`select[name="${item.type}_id"]`))
                            $(`.${item.type}.hide`).show();
                        }
                    })

                linkType.val(edit.type);
                select2Recheck(linkType);
                $('[name="name"]').val(edit.name);
                $('[name="route"]').val(edit.route);
                modal.find('.modal-title').html('Edit Access Route');
                if (edit.type === 'subfolder') {
                    subfolderContainer.hide();
                    subfolder.html('');
                    routeFieldContainer.css('display', 'none');
                    routeField.val('');
                } else {
                    routeFieldContainer.css('display', 'block');
                }
            });

        });

        tableReload = (action_id, actionType) => {
            if (actionType === 'delete') {
                tableData = tableData.map(item => {
                    if (item.id === action_id) {
                        item.status = item.status > 0 ? 0 : 1;
                    }
                    return item;
                })
            }
            currentRole = parseInt($('[name="role"]').val());
            currentRole = roles.find(role => role.id === currentRole);
            return routeListManage(currentRole);
        }

        function nestedParent(route) {
            let parents = nestedParentByChildId(route.id, tableData);
            parents.sort((a, b) => a.parent_id - b.parent_id);
            return parents.length > 1 ? parents.map(item => item.name).join(
                '<b style="color:#009ef7;margin:0 1px;">/</b>') : route.parent_id ? getIcon(route) : route.name;
        }

        let table = $('.classic-data-table');

        function routeListManage(role) {
            let output = '';

            table.DataTable().destroy();
            for (let route of tableData) {
                let permission = role && role.roleRoutes.includes(route.id) ? 'fa-check-square' : 'fa-square';
                let link = route.link ? `<a class="menu-link" href="${route.link}">${route.name}</a>` : route.name;
                let nested = route.route ? `<a class="menu-link" href="${route.link}">${nestedParent(route)}</a>` : getIcon(
                    route);

                output += `<tr><td>${route.id}</td>
                    <td>${link}</td>
                    <td>${nested}</td>
                    <td>${role ? `<i data-permission="${route.id}" class="icon-xl far check ${permission}"></i>`:'Default'}</td>
                    ${logUserType === 1 ? `<td>${route.link ? route.route:'Link Parent'}</td>
                                    <td>${getStatus(route.status, route.id)}</td>
                                    <td>${formatDate(route.updated_at ? route.updated_at:route.created_at)}</td>
                                    <td class="text-center edit">
                                        <i data-edit="${route.id}" class="icon-xl far fa-edit btn btn-sm btn-warning"></i>
                                        <i data-delete-url="${actionurl}/${route.id}" class="icon-xl far fa-trash-alt btn btn-sm btn-danger delete-row"></i>
                                    </td>`:''}
                    </tr>`;
            }
            tbody.html(output);
            dataTable = table.DataTable({
                "info": false,
                'columnDefs': [{
                    "targets": [0],
                    "visible": false,
                    "searchable": false
                }]
            });
        }

        $(document).on('keyup', '[name="search-route"]', function(e) {
            dataTable.search(this.value).draw();
        });

        function getIcon(icon, iconIsset) {
            if ((icon.parent_id < 1) || (iconIsset && icon.icon)) {
                icon = icons.find((item, i) => i === icon.icon)
                return ` <span class="menu-icon">
                    <span class="svg-icon svg-icon-2">
                        ${icon}
                    </span>
                </span>`;
            }
            return icon.type === 'subfolder' ? 'Subfolder' : '';
        }

        function formatDate(date) {
            let d = new Date(date),
                day = d.getDate(),
                month = d.getMonth() + 1,
                year = d.getFullYear();
            return `${day} ${fullMonths[month]}, ${year}`;
        }

        function getStatus(status, id) {
            let statusClass = ['danger', 'success'];
            let statusString = statusData[status];
            let statusReversText = statusData[status > 0 ? 0 : 1];
            return `<span data-status-text=\"${statusReversText}\" data-switch-ai=\"${actionurl}/${id}/edit\" style=\"cursor: pointer\" class=\"switch-button badge badge-light-${statusClass[status]}\">${statusString}</span>`;
        }
    </script>
@endpush
