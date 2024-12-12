@extends('layouts.website', ['title' => 'Contact Us'])
@section('content')
    @include('includes.frontend.common-slider')

    @php
        $contactInfo = dynamicData('contactInfo')->options ?? [];
    @endphp
    <!-- Suncity Contact info Section -->
    <section class="ftco-section contact-section ftco-degree-bg">
        <div class="container">
            <div class="row d-flex mb-5 contact-info">
                <div class="col-md-12 mb-4">
                    <h2 class="h4">{{ translate('Contact Information') }}</h2>
                </div>
                <div class="w-100"></div>
                <div class="col-md-3">
                    <p><span>{{ translate('Address') }}:</span> {{ translate($contactInfo['address']) }}</p>
                </div>
                <div class="col-md-3">
                    <p><span>{{ translate('Phone') }}:</span> <a href="tel:{{ $contactInfo['contactPhone'] }}"> {{ translate($contactInfo['contactPhone']) }}</a></p>
                </div>
                <div class="col-md-3">
                    <p><span>{{ translate('Email') }}:</span> <a href="mailto:{{ $contactInfo['contactEmail'] }}">{{ translate($contactInfo['contactEmail']) }}</a>
                    </p>
                </div>
                <div class="col-md-3">
                    <p><span>{{ translate('Website') }}</span> <a href="www.suncitypolyclinicsa.com">{{ translate('www.suncitypolyclinicsa.com') }}</a></p>
                </div>
            </div>
            <div class="row block-9">
                <div class="col-md-6 pr-md-5">
                    <div id="form-messages"></div>
                    <form  id="contact_form" method="post" action="{{ route('contact.store') }}">
                        @csrf
                        <div class="form-group">
                            <input type="text" name="name" class="form-control" placeholder="{{ translate('Name') }}" required>
                        </div>
                        {{--<div class="form-group">--}}
                            {{--<input type="text" name="phone" class="form-control" placeholder="{{ translate('Mobile') }}">--}}
                        {{--</div>--}}
                        <div class="form-group">
                            <input type="email" name="email" class="form-control" placeholder="{{ translate('Email') }}">
                        </div>

                        <div class="form-group">
                            <textarea name="message" cols="30" rows="7" class="form-control" placeholder="{{ translate('Message') }}" required></textarea>
                        </div>
                        <input type="hidden" name="phone" value="0">
                        <input type="hidden" name="type" value="contact form">
                        <input type="hidden" name="subject" value="Contact Form">
                        <div class="form-group">
                            <input type="submit" value="{{ translate('Send Message') }}" class="btn btn-primary py-3 px-5">
                        </div>
                    </form>

                </div>


                <!-- map startmap-->
                <div class="col-md-6" id="#">
                    <!-- map startmap-->
                    <div class="mapouter">
                        <div class="gmap_canvas">
                            <iframe class="gmap_iframe" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"
                                src="https://maps.google.com/maps?width=600&amp;height=400&amp;hl=en&amp;q=7158 Omar Al Moukhtar, Thulaim, 2393, Riyadh 12645 7158, Riyadh, Saudi Arabia&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
                            <a href="https://sprunkin.com">Sprunki Mods</a>
                        </div>
                        <style>
                            .mapouter {
                                position: relative;
                                text-align: right;
                                width: 100%;
                                height: 400px;
                            }

                            .gmap_canvas {
                                overflow: hidden;
                                background: none !important;
                                width: 100%;
                                height: 400px;
                            }

                            .gmap_iframe {
                                width: 100% !important;
                                height: 400px !important;
                            }
                        </style>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end suncity contact Section -->
@endsection
