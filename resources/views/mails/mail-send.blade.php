@extends('layouts.app', ['title' => 'Mail Send'])

@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="toolbar" id="kt_toolbar">
            <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
                <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
                    data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
                    class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                    <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Email Send Test</h1>
                    <span class="h-20px border-gray-200 border-start mx-4"></span>
                    <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
                        <li class="breadcrumb-item text-muted">
                            <a href="{{ url('') }}" class="text-muted text-hover- primary" target="blunk">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-200 w-5px h-2px"></span>
                        </li>

                        <li class="breadcrumb-item text-dark">Email Send Test</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="post d-flex flex-column-fluid" id="kt_post">
            <div id="kt_content_container" class="container-xxl">

                @include('includes.backend.flash-message')

                <div class="card pt-3">
                    <div class="card-body pt-0">
                        <div class="row pb-5 mb-3">
                            <div class="col">
                                <h2 class="text-color-secondary font-weight-semi-bold text-6 line-height-1 mb-4">Send a
                                    Message</h2>
                                <form class="contact-form custom-form-style-1" action="{{ route('contact.us.email.send') }}"
                                    method="POST">
                                    @if (Session::get('success'))
                                        <div class="contact-form-success alert alert-success mt-4">
                                            <p><strong>Success!</strong> {!! Session::get('success') !!}</p>
                                        </div>
                                    @endif
                                    @csrf

                                    <div
                                        class="contact-form-error alert alert-danger {{ Session::get('error') ? '' : 'd-none' }} mt-4">
                                        <strong>Error!</strong> There was an error sending your message.
                                        <span class="mail-error-message text-1 d-block"></span>
                                    </div>

                                    <div class="row row-gutter-sm">
                                        <div class="form-group col-lg-6 mb-4">
                                            <input type="text" value="{{ old('name') }}"
                                                data-msg-required="Please enter your name." maxlength="100"
                                                class="form-control" name="name" id="name" required
                                                placeholder="Your Name">
                                        </div>
                                        <div class="form-group col-lg-6 mb-4">
                                            <input type="tel" value="{{ old('phone') }}"
                                                data-msg-required="Please enter your phone number." maxlength="100"
                                                class="form-control" name="phone" id="phone"
                                                placeholder="Phone Number">
                                        </div>
                                    </div>
                                    <div class="row row-gutter-sm">
                                        <div class="form-group col-lg-6 mb-4">
                                            <input type="email" value="{{ old('email') }}"
                                                data-msg-required="Please enter your email address."
                                                data-msg-email="Please enter a valid email address." maxlength="100"
                                                class="form-control" name="email" id="email" required
                                                placeholder="E-mail">
                                        </div>
                                        <div class="form-group col-lg-6 mb-4">
                                            <input type="text" value="{{ old('subject') }}"
                                                data-msg-required="Please enter the subject." maxlength="100"
                                                class="form-control" name="subject" id="subject" required
                                                placeholder="Subject">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col mb-4 required">
                                            <textarea maxlength="5000" data-msg-required="Please enter your message." rows="10" class="form-control"
                                                name="message_content" id="message" required placeholder="Your Message" required>{{ old('message_content') }}</textarea>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col mb-0">
                                            <button type="submit"
                                                class="btn btn-secondary font-weight-bold btn-px-5 btn-py-3 mt-4 mb-2"
                                                data-loading-text="Loading...">SEND MESSAGE</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
