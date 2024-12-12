@extends('layouts.website', ['title' => 'Services'])

@section('content')
    @include('includes.frontend.common-slider')
    <!-- Suncity Service Section -->
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-5">
                <div class="col-md-7 text-center heading-section ftco-animate">
                    <h2 class="mb-2">{{ translate('Health Services for you') }}</h2>
                    <p>{{ translate('We are always here to listening and understanding') }}</p>
                </div>
            </div>
            <div class="row">
                @foreach(services() as $service)
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
        </div>
    </section>

    <!-- include Achievements info and paralax same to index page Section -->
    @include('includes.frontend.achievements-info')
@endsection
