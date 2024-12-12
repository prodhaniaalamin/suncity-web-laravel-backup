@extends('layouts.website', ['title' => 'Photo Gallery'])

@section('content')
    @include('includes.frontend.common-slider', [
        'title' => 'Photo Gallery',
        'subTitle' => 'Photo Gallery',
    ])


     <!-- Gallery/Photo & video Section -->
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-5">
                <div class="col-md-7 text-center heading-section ftco-animate">
                    <h2 class="mb-3">{{ translate('Explore Our Moments at Suncity Polyclinic') }}</h2>
                </div>
            </div>
            <div class="row">
                <div class="row no-gutters">
                    @foreach(dynamicData('photoGallery')->options ?? [] as $image)
                    <div class="col-md-4">
                        <img src="{{ image($image) }}" class="img-fluid">
                    </div>
                    @endforeach
                </div>

            </div>
        </div>

    </section>


    <!-- include Achievements info and paralax same to index page Section -->
    @include('includes.frontend.achievements-info')
@endsection
