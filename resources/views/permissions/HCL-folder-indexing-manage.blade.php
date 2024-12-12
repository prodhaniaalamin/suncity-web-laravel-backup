@extends('layouts.app', ['title' => 'HCL Folder Indexing'])

@section('css')
    <style>
        .HCL {
            margin-bottom: 10px;
            padding: 10px;
            max-height: 450px;
            overflow: scroll;
            border-radius: 8px;
        }

        .custom {
            min-height: 100%;
        }

        .HCL table tr.change {
            cursor: pointer;
        }

        .HCL .table.gy-4 th,
        .table.gy-4 td {
            padding: 0.4rem !important;
        }

        .HCL td span.menu-icon {
            margin-right: 0.5rem;
        }

        .default tr.change td {
            color: #2ac872 !important;
        }

        tr.not-change td {
            color: #dbab02 !important;
        }
    </style>
@endsection

@section('content')
    <div class="content d-flex flex-column flex-column-fluid">
        <div class="toolbar">
            <div class="container-fluid d-flex flex-stack">
                <div class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                    <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">HCL Folder Indexing</h1>
                    <span class="h-20px border-gray-200 border-start mx-4"></span>
                    <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
                        <li class="breadcrumb-item text-muted">
                            <a href="{{ url('/') }}" class="text-muted text-hover- primary" target="blunk">Home</a>
                        </li>

                        <li class="breadcrumb-item text-dark">HCL Folder Indexing Manage</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="post d-flex flex-column-fluid">
            <div class="container-xxl">
                @include('includes.backend.flash-message')
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('folder.indexing.update') }}">
                            @method('post')
                            @csrf
                            <!--begin::pay fields-->
                            <div class="d-flex flex-column mb-15 fv-row">
                                <!--begin::Label-->
                                <div class="col-lg-8 col-12 HCL">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="p-5 shadow-sm bg-body rounded table-responsive default">
                                                <h3>Default Indexing</h3>
                                                <table class="table table-row-dashed align-middle gs-0 gy-4 my-0">
                                                    <thead>
                                                        <tr class="fs-7 fw-bolder text-gray-500 border-bottom-0">
                                                            <th></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody></tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="p-5 shadow-sm bg-body rounded table-responsive custom">
                                                <h3>Custom Indexing</h3>
                                                <table class="table table-row-dashed align-middle gs-0 gy-4 my-0">
                                                    <thead>
                                                        <tr class="fs-7 fw-bolder text-gray-500 border-bottom-0">
                                                            <th></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody></tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-8 col-12 mb-10">
                                    <input type="submit" class="btn btn-primary float-end m-5" value="Save Change">
                                </div>
                            </div>
                            <!--end::pay fields-->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        let icons = @json(icons());
        let folders = @json($folders);
        let customFolders = [],
            output = '',
            defaultBody = $('.default tbody'),
            customBody = $('.custom tbody');
        $(document).on('click', '.default table tr.change', function() {
            this.remove();
            let id = parseInt(this.dataset.id);
            let folder = folders.find(item => item.id === id);
            !customFolders.includes(id) && customFolders.push(id)
            customBody.append(
                `<tr class="change" data-id="${ folder.id }"><td>${getIcon(folder)} ${folder.name}</td><input type="hidden" name="indexing[]" value="${folder.id}"></tr>`
            );
        });

        $(document).on('click', '.custom table tr.change', function(e) {
            output = '', unsetId = parseInt(this.dataset.id);
            customFolders = customFolders.filter(id => id !== unsetId)
            folders.map(folder => {
                output += customFolders.includes(folder.id) ? '' :
                    `<tr class="change" data-id="${ folder.id }"><td>${getIcon(folder)} ${folder.name}</td></tr>`;
            });
            defaultBody.html(output);
            return this.remove();
        });

        function getIcon(icon) {
            icon = icons.find((item, i) => i === icon.icon);
            return ` <span class="menu-icon">
                <span class="svg-icon svg-icon-2">
                    ${icon}
                </span>
            </span>`;
        }

        output = '';
        let copyCustomFolders = [];
        folders.map(folder => {
            let change = 'change';
            if (folder.folder_indexing !== 99) {
                change = 'not-change';
                customFolders.push(folder.id)
                copyCustomFolders.push(folder);
            }
            output +=
                `<tr class="${change}" data-id="${ folder.id }"><td>${getIcon(folder)} ${folder.name}</td></tr>`;
        });
        defaultBody.html(output);

        output = '';
        copyCustomFolders.sort((a, b) => a.folder_indexing - b.folder_indexing);
        copyCustomFolders.map(folder => {
            output +=
                `<tr class="change" data-id="${ folder.id }"><td>${getIcon(folder)} ${folder.name}</td><input type="hidden" name="indexing[]" value="${folder.id}"></tr>`;
        });
        customBody.html(output);
        $(document).on('click', 'tr.not-change', function() {
            alert('Already selected for custom indexing of folder')
        })
    </script>
@endpush
