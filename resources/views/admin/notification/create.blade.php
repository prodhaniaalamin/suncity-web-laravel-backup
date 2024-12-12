@extends('layouts.app', ['title' => 'Notification Send'])

@section('content')
    <style>
        #editor {
            background-color: #f5fafd87;
            border: 1px solid #80808021;
            box-shadow: 0 0 1px #80808021;
        }
    </style>
    <div class="content d-flex flex-column flex-column-fluid">
        <!--begin::Toolbar-->
        <div class="toolbar">
            <div class="container-fluid d-flex flex-stack">
                <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
                    class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                    <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Notification Send</h1>
                    <span class="h-20px border-gray-200 border-start mx-4"></span>
                    <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
                        <li class="breadcrumb-item text-muted">
                            <a href="{{ url('/') }}" class="text-muted text-hover- primary" target="blunk">Home</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!--end::Toolbar-->
        <!--begin::Post-->
        <div class="post d-flex flex-column-fluid">
            <!--begin::Container-->
            <div class="container-xxl">
                <!--begin::Basic info-->
                <div class="card mb-5 mb-xl-10">
                    <!--begin::Form-->
                    <form id="smsForm" action="{{ route('notifications.store') }}" class="form" method="post"
                        enctype="multipart/form-data" novalidate>
                        @csrf
                        <!--begin::Card header-->
                        <div class="card-header border-0 cursor-pointer">
                            <!--begin::Card title-->
                            <div class="card-title m-0">
                            </div>
                        </div>
                        <!--begin::Card body-->
                        <div class="card-body border-top p-9">
                            <div class="row mb-6 mt-2">
                                <div class="col-lg-8 col-md-10 fv-row">
                                    <div class="fv-row mb-7">
                                        <select class="form-select form-select-solid select2-hidden-accessible"
                                            data-control="select2" data-hide-search="true"
                                            data-placeholder="Select send type" name="send_type"
                                            data-select2-id="select2-data-16-hh9r" tabindex="-1" aria-hidden="true">
                                            <option selected>Send to all user</option>
                                            {!! optionsProcess(roles()) !!}
                                        </select>
                                    </div>

                                    <div class="col">
                                        <div class="fv-row mb-7">
                                            <label class="required fw-bold fs-6 mb-2 text-left col-12">Title</label>
                                            <input type="text" name="title"
                                                class="form-control form-control-solid mb-3 mb-lg-0"
                                                placeholder="Notification title" required />
                                        </div>
                                    </div>
                                    <div class="fv-row mb-7">
                                        <label class="required fw-bold fs-6 mb-2 text-left col-12">Write Notification
                                            content</label>
                                        <textarea name="content" class="form-control form-control-solid" id="editor"
                                            placeholder="write notification content ..." rows="5" maxlength="1000" required></textarea>
                                    </div>
                                    <div class="fv-row mb-7">
                                        <label for="attached"
                                            class="btn btn-hover-primary text-gray-800 text-hover-primary fw-bolder">Attach
                                            file
                                            <input type="file" hidden id="attached" name="attached"
                                                accept="image/jpeg,image/png,image/gif,image/webp,pdf">
                                            <span class="svg-icon svg-icon-2">
                                                <i class="fas fa-file-upload" style="font-size: 25px !important;"></i>
                                            </span>
                                        </label>
                                    </div>
                                    <div class="col">
                                        <input type="hidden" name="total_send">
                                        <button type="submit" class="btn btn-primary my-5 mx-5"><i
                                                class="fs-16 icon-xl fas fa-sms"></i> Send Notification</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form><!--end::Form-->
                </div>
                <!--end::Basic info-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Post-->
    </div>
@endsection

@push('scripts')
    <script src="https://cdn.ckeditor.com/ckeditor5/30.0.0/classic/ckeditor.js"></script>

    <script>
        let sendAction = $('button[type="submit"]'),
            totalUser = $('#totalUser');
        let availableSms = parseInt($('#max_available').text()),
            sms_count = $('#sms_count');
        let totalSend = $('[name="total_send"]'),
            totalUserCount = 0;

        $(document).on('change', 'select[name="usertype"]', userCount);

        function userCount() {
            let selectedText = this.options[this.selectedIndex].textContent;
            selectedText = this.value === 'all' ? 'All user' : 'Total ' + selectedText.slice(4, 10) + 's';
            axios.post('{{ route('user.count') }}', {
                role_id: this.value
            }).then(response => {
                totalUserCount = response.data;
                totalSend.val(totalUserCount);
                totalUser.html(`${selectedText} = <b>${totalUserCount}</b>`);
            });
        }


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

        ClassicEditor.create(document.querySelector('#editor'), {
            extraPlugins: [MyCustomUploadAdapterPlugin]
        }).catch(error => {
            console.error(error);
        });
    </script>
@endpush
