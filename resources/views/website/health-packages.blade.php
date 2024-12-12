@extends('layouts.website', ['title' => 'Health Packages'])

@section('content')
    @include('includes.frontend.common-slider', [
        'title' => 'Health Packages',
        'subTitle' => 'Health Packages',
    ])


    <!-- Include Packages feature from package page Section -->
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-5">
                <div class="col-md-7 text-center heading-section ftco-animate">
                    <h2 class="mb-3">{{ translate('Our Best Health Packages') }}</h2>
                    <p>{{ translate('Suncity Polyclinic\'s Best Health Packages: Choose the Right One for Your Wellness!') }}</p>
                </div>
            </div>
            @foreach(healthPackages()->chunk(4) as $packages)
            <div class="row">
                @foreach($packages as $package)
                <div class="col-md-3 ftco-animate">
                    <div class="pricing-entry pb-5 text-center">
                        <div>
                            <h3 class="mb-4">{{ $package->name }}</h3>
                            <p><span class="price">{{ $package->price }}</span> <span class="per">/ SR</span></p>
                        </div>
                        <ul>
                            <li>{{ $package->description }}</li>
                        </ul>
                        <p class="button text-center"><a href="{{ route('contact') }}" class="btn btn-primary btn-outline-primary px-4 py-3">{{ translate('Contact Us') }}</a></p>
                    </div>
                </div>
                @endforeach
            </div>
            @endforeach
        </div>
    </section>
    <!-- end Packages Section -->

    <!-- include Achievements info and paralax same to index page Section -->
    @include('includes.frontend.achievements-info')
@endsection
