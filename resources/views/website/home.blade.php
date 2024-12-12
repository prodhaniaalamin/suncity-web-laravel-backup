@extends('layouts.website', ['title' => 'Home'])

@section('content')
    <!--Home Slider Section-->
    @include('includes.frontend.home-slider')
    <!--End Home Slider Section-->

    @php
        $contactInfo = dynamicData('contactInfo')->options ?? [];
    @endphp
    <!--  Hero Section info-->
    <section class="ftco-intro">
        <div class="container">
            <div class="row no-gutters">
                <div class="col-lg-2 col-md-3"></div>
                <div class="col-lg-4 col-md-3 color-1 p-4">
                    <h3 class="mb-4">{{ translate('Emergency Cases') }}</h3>
                    <p>{{ translate('Call Anytime. We look forward to your call.') }}</p>
                    <span class="phone-number">{{ translate($contactInfo['emergencyPNumber1'] ?? '') }}</span>
                    <p><span class="phone-number">{{ translate($contactInfo['emergencyPNumber2'] ?? '') }}</span></p>
                </div>
                <div class="col-lg-4 col-md-3 color-2 p-4">
                    <h3 class="mb-4">{{ translate('Opening Hours') }}</h3>
                    <p class="openinghours d-flex">
                        <span>{{ translate('Opening Hours') }}</span>
                        <span>{{ translate($contactInfo['openingHoursEveryDay'] ?? '') }}</span>
                    </p>
                </div>
            </div>
        </div>
    </section><!-- end Hero Section info-->


    <!-- Include Service feature from service_page Section-->
    <section class="ftco-section ftco-services">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-5">
                <div class="col-md-7 text-center heading-section ftco-animate">
                    <h2 class="mb-2">{{ translate('Health Services for you') }}</h2>
                    <p>{{ translate('We are always here to listening and understanding') }}</p>
                </div>
            </div>
            <div class="row">
                @foreach(services()->take(4) as $service)
                <div class="col-md-3 d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services d-block text-center">
                        <div class="icon d-flex justify-content-center align-items-center">
                            <span class="{{ $service->icon }}"></span>
                        </div>
                        <div class="media-body p-2 mt-3">
                            <h3 class="heading">{{ translate($service->title) }}</h3>
                            <p>{{ translate($service->description) }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="text-center mb-3"><a href="{{ route('services') }}" class="btn btn-primary">{{ translate('See More Services') }}</a></div>

        </div>
        <div class="p-3"></div>


        @include('website.dantal-care-consult-doctors', ['key' => 'sunCityDentalCare', 'image'=> 'about-2.jpg'])

    </section>
    <!-- end service Section -->


    <!-- Include Doctors feature form doctors page Section -->
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-5">
                <div class="col-md-7 text-center heading-section ftco-animate">
                    <h2 class="mb-3">{{ translate('Meet Our Experience Doctors') }}</h2>
                    <p>{{ translate('Get to know our experienced doctors – where every care has a touch of experience and a commitment to
                        your health.') }}</p>
                </div>
            </div>
            <div class="row">
                @foreach(doctors()->take(4) as $doctor)
                    <div class="col-lg-3 col-md-6 d-flex mb-sm-4 ftco-animate">
                        <div class="staff">
                            <div class="img mb-4" style="background-image: url({{ image($doctor->photo) }});"></div>
                            <div class="info text-center">
                                <h3><a href="{{ route('doctor.details', $doctor->id) }}">{{ translate($doctor->name) }}</a></h3>
                                <span class="position">{{ translate($doctor->specialty) }}</span>
                                <div class="text">
                                    <p>{{ translate($doctor->description) }}</p>
                                    @if($doctor->options && $doctor->options->social_media)
                                    <ul class="ftco-social">
                                        @foreach($doctor->options->social_media as $key => $value)
                                            <li class="ftco-animate"><a href="{{ $value }}"><span class="icon-{{ $key }}"></span></a></li>
                                        @endforeach
                                    </ul>
                                    @endif
                                    <a href="#" class="btn btn-primary btn-sm" data-toggle="modal"
                                        data-target="#modalRequest" data-selected-doctor="{{ $doctor->id }}">{{ translate('Book an Appointment') }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="p-3"></div>
            <div class="text-center mb-3"><a href="{{ route('doctors') }}" class="btn btn-primary">{{ translate('See More Doctors') }}</a></div>

    </section>


    <!-- end Doctors Section -->

    <!-- Achievements Paralax Section -->

    <!-- include business info and paralax same to index page Section -->
    @include('includes.frontend.achievements-info')
    <!-- end Achievements Paralax Section -->

    <!-- Include Packages feature from package page Section -->
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-5">
                <div class="col-md-7 text-center heading-section ftco-animate">
                    <h2 class="mb-3">{{ translate('Our Best Health Packages') }}</h2>
                    <p>{{ translate('Suncity Polyclinic\'s Best Health Packages: Choose the Right One for Your Wellness!') }}</p>
                </div>
            </div>
            <div class="row">
                @foreach(healthPackages()->take(4) as $package)
                <div class="col-md-3 ftco-animate">
                    <div class="pricing-entry pb-5 text-center">
                        <div>
                            <h3 class="mb-4">{{ translate($package->title) }}</h3>
                            <p><span class="price">{{ $package->price }}</span> <span class="per">/ SR</span></p>
                        </div>
                        <ul>
                            <li>{{ translate($package->description) }}</li>
                        </ul>
                        <p class="button text-center"><a href="{{ route('contact') }}" class="btn btn-primary btn-outline-primary px-4 py-3">{{ translate('Contact Us') }}</a></p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="text-center mb-3"><a href="{{ route('healthPackages') }}" class="btn btn-primary">{{ translate('See More Packages') }}</a></div>
    </section>
    <!-- end Packages Section -->


    <!-- Subscribe Section optional-->
    <section class="ftco-section-parallax">
        <div class="parallax-img d-flex align-items-center">
            <div class="container">
                <div class="row d-flex justify-content-center">
                    <div class="col-md-7 text-center heading-section heading-section-white ftco-animate">
                        <h2>{{ translate('Call to Our Appointment') }}</h2>
                        <p>{{ translate('Feel free any time any query') }}</p>
                        <div class="row d-flex justify-content-center mt-5">
                            <div class="col-md-8">
                                <a href="tel:{{ dynamicData('contactInfo', 'contactPhone') }}" class="subscribe-form">
                                    <div class="form-group d-flex">
                                        <input readonly type="text" class="form-control" placeholder="{{ dynamicData('contactInfo', 'contactPhone') }}">
                                        <input type="submit" value="{{ translate('Call Now') }}" class="submit px-3">
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end Subcribe Section -->


    <!-- Health Insurance feature from insurance page Section -->
    <section class="py-3 py-md-5 py-xl-8">
        <div class="container">
            @php
                $healthInsurance = dynamicData('healthInsurance');
            @endphp
            <div class="row justify-content-md-center">
                <div class="col-12 col-md-10 col-lg-8 col-xl-7 col-xxl-6 heading-section">
                    <h2 class="fs-6 text-secondary mb-2 text-uppercase text-center">{{ translate('Health Insurance') }}</h2>
                    <h2 class="mb-4 display-5 text-center">{{ translate('We accept over 25+ health insurance plans') }}</h2>
                    <p class="fs-5 text-secondary mb-5 text-center">{{ $healthInsurance->value }}</p>
                    <hr class="w-50 mx-auto mb-5 mb-xl-9 border-dark-subtle">
                </div>
            </div>
        </div>

        <div class="container overflow-hidden">
            <div class="row gy-4">
                @foreach(collect($healthInsurance?->options ?: [])->take(12) as $image)
                <div class="col-6 col-md-4 col-xl-3 text-center">
                    <div class="text-secondary bg-light px-4 py-3 px-md-6 py-md-4 px-lg-8 py-lg-5">
                        <img src="{{ image($image) }}" alt="" height="60">
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="p-5">
            <div class="text-center mb-3"><a href="{{ route('healthInsurances') }}" class="btn btn-primary">{{ translate('See More Insurance') }}</a>
            </div>
        </div>
    </section>

    <!-- end health insurance Section -->


    <!-- Review/testimony Section -->
    <section class="ftco-section testimony-section bg-light">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-3">
                <div class="col-md-7 text-center heading-section ftco-animate">
                    <h2 class="mb-2">{{ translate('Feedback') }}</h2>
                    <span class="subheading">{{ translate('What Our Patients Say') }}</span>
                </div>
            </div>
            <div class="row justify-content-center ftco-animate">
                <div class="col-md-8">
                    <div class="carousel-testimony owl-carousel ftco-owl">
                        @foreach(testimonials() as $customer)
                        <div class="item">
                            <div class="testimony-wrap p-4 pb-5">
                                <div class="user-img mb-5" style="background-image: url({{ image($customer->photo) }})">
                                    <span class="quote d-flex align-items-center justify-content-center">
                                        <i class="icon-quote-left"></i>
                                    </span>
                                </div>
                                <div class="text text-center">
                                    <p class="mb-5">{{ translate($customer->testimonial) }}</p>
                                    <p class="name">{{ translate($customer->name) }}</p>

                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end Review Section -->


    <!-- map section-->
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
    <!-- end map Section -->
@endsection
