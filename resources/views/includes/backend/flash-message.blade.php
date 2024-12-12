@include('includes.backend.success-message')

@if ($message = Session::get('warning'))
    <div
        class="alert alert-dismissible bg-light-danger align-items-center d-flex flex-column flex-sm-row w-100 p-5 mb-10">
        <span class="svg-icon svg-icon-2hx svg-icon-danger me-4 mb-5 mb-sm-0">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                <path opacity="0.3"
                    d="M2 4V16C2 16.6 2.4 17 3 17H13L16.6 20.6C17.1 21.1 18 20.8 18 20V17H21C21.6 17 22 16.6 22 16V4C22 3.4 21.6 3 21 3H3C2.4 3 2 3.4 2 4Z"
                    fill="black"></path>
                <path
                    d="M18 9H6C5.4 9 5 8.6 5 8C5 7.4 5.4 7 6 7H18C18.6 7 19 7.4 19 8C19 8.6 18.6 9 18 9ZM16 12C16 11.4 15.6 11 15 11H6C5.4 11 5 11.4 5 12C5 12.6 5.4 13 6 13H15C15.6 13 16 12.6 16 12Z"
                    fill="black"></path>
            </svg>
        </span>
        <div class="d-flex flex-column pe-0 pe-sm-10">
            <span>{!! $message !!}</span>
        </div>
        <button type="button"
            class="position-absolute align-items-center position-sm-relative m-2 m-sm-0 top-0 end-0 btn btn-icon ms-sm-auto"
            data-bs-dismiss="alert">
            <span class="svg-icon svg-icon-1 svg-icon-danger">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                    fill="none">
                    <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1"
                        transform="rotate(-45 6 17.3137)" fill="black"></rect>
                    <rect x="7.41422" y="6" width="16" height="2" rx="1"
                        transform="rotate(45 7.41422 6)" fill="black">
                    </rect>
                </svg>
            </span>
        </button>
    </div>
@endif


@if ($message = Session::get('info'))
    <div
        class="alert alert-dismissible bg-light-info align-items-center d-flex flex-column flex-sm-row w-100 p-5 mb-10">
        <span class="svg-icon svg-icon-2hx svg-icon-info me-4 mb-5 mb-sm-0">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                <path opacity="0.3"
                    d="M12 22C13.6569 22 15 20.6569 15 19C15 17.3431 13.6569 16 12 16C10.3431 16 9 17.3431 9 19C9 20.6569 10.3431 22 12 22Z"
                    fill="black"></path>
                <path
                    d="M19 15V18C19 18.6 18.6 19 18 19H6C5.4 19 5 18.6 5 18V15C6.1 15 7 14.1 7 13V10C7 7.6 8.7 5.6 11 5.1V3C11 2.4 11.4 2 12 2C12.6 2 13 2.4 13 3V5.1C15.3 5.6 17 7.6 17 10V13C17 14.1 17.9 15 19 15ZM11 10C11 9.4 11.4 9 12 9C12.6 9 13 8.6 13 8C13 7.4 12.6 7 12 7C10.3 7 9 8.3 9 10C9 10.6 9.4 11 10 11C10.6 11 11 10.6 11 10Z"
                    fill="black"></path>
            </svg>
        </span>
        <div class="d-flex flex-column pe-0 pe-sm-10">
            <span>{!! $message !!}</span>
        </div>
        <button type="button"
            class="position-absolute position-sm-relative m-2 m-sm-0 top-0 end-0 btn btn-icon ms-sm-auto"
            data-bs-dismiss="alert">
            <span class="svg-icon svg-icon-1 svg-icon-info">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                    fill="none">
                    <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1"
                        transform="rotate(-45 6 17.3137)" fill="black"></rect>
                    <rect x="7.41422" y="6" width="16" height="2" rx="1"
                        transform="rotate(45 7.41422 6)" fill="black">
                    </rect>
                </svg>
            </span>
        </button>
    </div>
@endif

@if ($errors->any() || ($errors = Session::get('error')))
    <div
        class="alert alert-dismissible bg-light-danger align-items-center d-flex flex-column flex-sm-row w-100 p-5 mb-10">
        <span class="svg-icon svg-icon-2hx svg-icon-danger me-4 mb-5 mb-sm-0">
            <i class="fas fa-exclamation-triangle danger"></i>
        </span>
        <div class="d-flex flex-column pe-0 pe-sm-10">
            <ul class="d-flex flex-column pe-0 pe-sm-10">
                @if (is_string($errors))
                    <li class="text-danger">{!! $errors !!}</li>
                @else
                    @foreach ($errors->all() as $error)
                        <li class="text-danger">{!! $error !!}</li>
                    @endforeach
                @endif
            </ul>
        </div>
        <button type="button"
            class="position-absolute position-sm-relative m-2 m-sm-0 top-0 end-0 btn btn-icon ms-sm-auto"
            data-bs-dismiss="alert">
            <span class="svg-icon svg-icon-1 svg-icon-danger">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                    fill="none">
                    <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1"
                        transform="rotate(-45 6 17.3137)" fill="black"></rect>
                    <rect x="7.41422" y="6" width="16" height="2" rx="1"
                        transform="rotate(45 7.41422 6)" fill="black">
                    </rect>
                </svg>
            </span>
        </button>
    </div>
@endif
