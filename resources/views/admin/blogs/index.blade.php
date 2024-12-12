@extends('layouts.app', ['title' => 'Blog Manage'])

@section('content')
    <style>
        #editor {
            background-color: #f5fafd87;
            border: 1px solid #80808021;
            box-shadow: 0 0 1px #80808021;
        }
    </style>
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="toolbar" id="kt_toolbar">
            <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
                <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
                    data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
                    class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                    <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Blog List</h1>
                    <span class="h-20px border-gray-200 border-start mx-4"></span>
                    <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
                        <li class="breadcrumb-item text-muted">
                            <a href="{{ url('') }}" class="text-muted text-hover- primary" target="blunk">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-200 w-5px h-2px"></span>
                        </li>

                        <li class="breadcrumb-item text-dark">Blog List</li>
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
                                <button type="button" class="btn btn-primary add-new" data-add-click-modal-target="#blog">
                                    Add Blog
                                </button>
                            </div>

                            <div class="modal fade" id="blog" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog mw-650px">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h2 class="fw-bolder modal-title">Add Blog</h2>
                                            <div class="btn btn-icon btn-sm btn-active-icon-primary" data-modal-coc="close">
                                                <span class="svg-icon svg-icon-1">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none">
                                                        <rect opacity="0.5" x="6" y="17.3137" width="16"
                                                            height="2" rx="1" transform="rotate(-45 6 17.3137)"
                                                            fill="black" />
                                                        <rect x="7.41422" y="6" width="16" height="2"
                                                            rx="1" transform="rotate(45 7.41422 6)"
                                                            fill="black" />
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
                                                        <label class="required fw-bold fs-6 mb-2">Blog Title</label>
                                                        <input type="text" name="title"
                                                            class="form-control form-control-solid mb-3 mb-lg-0"
                                                            placeholder="Enter Blog Title..." required />
                                                    </div>
                                                    <div class="fv-row mb-7">
                                                        <label class="required fw-bold fs-6 mb-2">Category</label>

                                                        <select name="category_id" class="form-select form-select-solid"
                                                                data-control="select2" data-placeholder="--- Select Department ---" data-hide-search="true" required>
                                                            <option value="">Select Category</option>
                                                            {!! optionsProcess(departments()) !!}
                                                        </select>
                                                    </div>
                                                    <div class="fv-row mb-7">
                                                        <label class="fw-bold fs-6 mb-2">Description</label>
                                                        <div id="editorContainer">
                                                            <textarea name="description" class="form-control form-control-solid" id="editor"
                                                                placeholder="Type your description here ..." rows="5" maxlength="1000" required></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="fv-row mb-7">
                                                        <label class="fw-bold fs-6 mb-2">Blog Image</label>

                                                        <div class="col-lg-8">
                                                            <!--begin::Image input-->
                                                            <div class="image-input image-input-outline"
                                                                data-kt-image-input="true"
                                                                style="background-image: url(assets/media/avatars/blank.png)">
                                                                <!--begin::Preview existing photo-->
                                                                <div class="image-input-wrapper w-250px h-150px"
                                                                    style="background-image: url(assets/media/avatars/blank.png) }}')">
                                                                </div>
                                                                <!--end::Preview existing photo-->
                                                                <!--begin::Label-->
                                                                <label
                                                                    class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                                    data-kt-image-input-action="change"
                                                                    data-bs-toggle="tooltip" title="Change image">
                                                                    <i class="bi bi-pencil-fill fs-7"></i>
                                                                    <!--begin::Inputs-->
                                                                    <input type="file" name="image"
                                                                        accept=".png, .jpg, .jpeg" />
                                                                    <!--end::Inputs-->
                                                                </label>
                                                                <!--end::Label-->
                                                                <!--begin::Cancel-->
                                                                <span
                                                                    class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                                    data-kt-image-input-action="cancel"
                                                                    data-bs-toggle="tooltip" title="Cancel Image">
                                                                    <i class="bi bi-x fs-2"></i>
                                                                </span>
                                                                <!--end::Cancel-->
                                                                <!--begin::Remove-->
                                                                <span
                                                                    class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                                    data-kt-image-input-action="remove"
                                                                    data-bs-toggle="tooltip" title="Remove Image">
                                                                    <i class="bi bi-x fs-2"></i>
                                                                </span>
                                                                <!--end::Remove-->
                                                            </div>
                                                            <!--end::Image input-->
                                                            <!--begin::Hint-->
                                                            <div class="form-text">Allowed file types: png, jpg, jpeg.
                                                            </div>
                                                            <!--end::Hint-->
                                                        </div>
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
                                    <th class="min-w-100px">Image</th>
                                    <th class="min-w-125px">Title</th>
                                    <th class="min-w-250px">Description</th>
                                    <th class="min-w-50px">Status</th>
                                    <th class="min-w-100px">Date</th>
                                    <th class="text-end min-w-100px">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-600 fw-bold">

                                @foreach ($blogList as $row)
                                    @php
                                        $description = Str::words(strip_tags($row->description), 5, ' ...');
                                    @endphp
                                    <tr>
                                        <td>
                                            <a class="d-block overlay" data-fslightbox="lightbox-hot-sales" href="{{ route('blogs.show', $row->id) }}">
                                                <!--begin::Image-->
                                                <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded min-h-100px"
                                                    style="background-image:url('{{ image($row->image) }}')"></div>
                                                <!--end::Image-->
                                                <!--begin::Action-->
                                                <div class="overlay-layer card-rounded bg-dark bg-opacity-25">
                                                    <i class="bi bi-eye-fill fs-2x text-white"></i>
                                                </div>
                                                <!--end::Action-->
                                            </a>
                                        </td>
                                        <td>{{ $row->title }}</td>
                                        <td>{{ $description }}</td>
                                        <td>
                                            {!! getStatus($row->status, route('blogs.edit', $row->id)) !!}
                                        </td>

                                        <td>{{ date('j F, Y', strtotime($row->created_at)) }}</td>
                                        <td class="text-end">
                                            <a href="#" class="btn btn-light btn-active-light-primary btn-sm"
                                                data-kt-menu-trigger="click"
                                                data-kt-menu-placement="bottom-end">Actions</a>
                                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4"
                                                data-kt-menu="true">
                                                <div class="menu-item px-3">
                                                    <a data-modal-show="#blog" type="button"
                                                        id="edit_{{ $row->id }}" class="edit-show menu-link px-3"
                                                        aria-label="Edit">Edit</a>
                                                </div>
                                                <div class="menu-item px-3">
                                                    <a type="button"
                                                        data-delete-url="{{ route('blogs.destroy', $row->id) }}"
                                                        class="menu-link px-3 delete-row"
                                                        data-kt-users-table-filter="delete_row">Delete</a>
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
@endsection

@push('scripts')
    <script src="https://cdn.ckeditor.com/ckeditor5/30.0.0/classic/ckeditor.js"></script>
    <script>
        class MyUploadAdapter {
            constructor(loader) {
                // The file loader instance to use during the upload.
                this.loader = loader;
            }

            // Starts the upload process.
            upload() {
                return this.loader.file
                    .then(file => new Promise((resolve, reject) => {
                        this._initRequest();
                        this._initListeners(resolve, reject, file);
                        this._sendRequest(file);
                    }));
            }

            // Aborts the upload process.
            abort() {
                if (this.xhr) {
                    this.xhr.abort();
                }
            }

            // Initializes the XMLHttpRequest object using the URL passed to the constructor.
            _initRequest() {
                const xhr = this.xhr = new XMLHttpRequest();

                // Note that your request may look different. It is up to you and your editor
                // integration to choose the right communication channel. This example uses
                // a POST request with JSON as a data structure but your configuration
                // could be different.
                xhr.open('POST', '{{ route('notification.image.upload') }}', true);
                xhr.setRequestHeader('x-csrf-token', '{{ csrf_token() }}');
                xhr.responseType = 'json';
            }

            // Initializes XMLHttpRequest listeners.
            _initListeners(resolve, reject, file) {
                const xhr = this.xhr;
                const loader = this.loader;
                const genericErrorText = `Couldn't upload file: ${ file.name }.`;

                // xhr.addEventListener( 'error', () => reject( genericErrorText ) );
                // xhr.addEventListener( 'abort', () => reject() );
                xhr.addEventListener('load', () => {
                    const response = xhr.response;

                    // This example assumes the XHR server's "response" object will come with
                    // an "error" which has its own "message" that can be passed to reject()
                    // in the upload promise.
                    //
                    // Your integration may handle upload errors in a different way so make sure
                    // it is done properly. The reject() function must be called when the upload fails.
                    if (!response || response.error) {
                        return reject(response && response.error ? response.error.message : genericErrorText);
                    }
                    // If the upload is successful, resolve the upload promise with an object containing
                    // at least the "default" URL, pointing to the image on the server.
                    // This URL will be used to display the image in the content. Learn more in the
                    // UploadAdapter#upload documentation.
                    resolve({
                        default: response.url
                    });
                });

                // Upload progress when it is supported. The file loader has the #uploadTotal and #uploaded
                // properties which are used e.g. to display the upload progress bar in the editor
                // user interface.
                if (xhr.upload) {
                    xhr.upload.addEventListener('progress', evt => {
                        if (evt.lengthComputable) {
                            loader.uploadTotal = evt.total;
                            loader.uploaded = evt.loaded;
                        }
                    });
                }
            }

            // Prepares the data and sends the request.
            _sendRequest(file) {
                // Prepare the form data.
                const data = new FormData();

                data.append('upload', file);

                // Important note: This is the right place to implement security mechanisms
                // like authentication and CSRF protection. For instance, you can use
                // XMLHttpRequest.setRequestHeader() to set the request headers containing
                // the CSRF token generated earlier by your application.

                // Send the request.
                this.xhr.send(data);
            }
        }

        function MyCustomUploadAdapterPlugin(editor) {
            editor.plugins.get('FileRepository').createUploadAdapter = (loader) => {
                // Configure the URL to the upload script in your back-end here!
                return new MyUploadAdapter(loader);
            };
        }

        var editorContainer = document.getElementById('editorContainer');

        function editorReload(value = '') {
            editorContainer.innerHTML =
                `<textarea name="description" class="form-control form-control-solid" id="editor" placeholder="Type your description here ..." rows="5" maxlength="1000" required>${value}</textarea>`;
            ClassicEditor.create(document.querySelector('#editor'), {
                extraPlugins: [MyCustomUploadAdapterPlugin]
            }).catch(error => {
                console.error(error);
            });
        }
        editorReload('');

        runFnFromEdit = (editInfo) => {
            editorReload(editInfo.description);
        }

        $(document).ready(function() {
            modalTitle = 'Add Blog';
            tableData = @json($blogList);
            actionurl = "{{ route('blogs.store') }}";
        });
    </script>
@endpush
