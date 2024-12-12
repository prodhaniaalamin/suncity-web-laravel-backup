@extends('layouts.website', ['title' => 'Health Insurance'])

@section('content')
    @include('includes.frontend.common-slider', [
        'title' => 'Health Insurance',
        'subTitle' => 'Health Insurance',
    ])

    @php
        $healthInsurance = dynamicData('healthInsurance');
    @endphp

    <!-- Health Insurance Section -->
    <section class="py-3 py-md-5 py-xl-8">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-12 col-md-10 col-lg-8 col-xl-7 col-xxl-6 heading-section">
                    <h2 class="fs-6 text-secondary mb-2 text-uppercase text-center">{{ translate('Health Insurance') }}</h2>
                    <h2 class="mb-4 display-5 text-center">{{ translate('We accept over 25+ health insurance plans') }}</h2>
                    <p class="fs-5 text-secondary mb-5 text-center">{{ translate($healthInsurance->value) }}</p>
                    <hr class="w-50 mx-auto mb-5 mb-xl-9 border-dark-subtle">
                </div>
            </div>
        </div>

        <div class="container overflow-hidden">
            <div class="row gy-4">
                @foreach($healthInsurance?->options ?: [] as $image)
                <div class="col-6 col-md-4 col-xl-3 text-center">
                    <div class="text-secondary bg-light px-4 py-3 px-md-6 py-md-4 px-lg-8 py-lg-5">
                        <img src="{{ image($image) }}" alt="" height="60">
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <!-- insurance eligibity check-->
        <div class="container">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6 p-5">
                    <a href="https://eservices.chi.gov.sa/pages/clientsystem/checkinsurance.aspx?lang=en" target="_blank">
                        <button class="btn btn-primary text-center p-3 btn-block">{{ translate('Insurance Information Inquiry') }}</button></a>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
    </section>



    <!-- include Achievements info and paralax same to index page Section -->
    @include('includes.frontend.achievements-info')
@endsection
