@extends('layouts.website', ['title' => 'Video Gallery'])

@push('css')
<style>
    .embed-responsive {
        min-width: 480px !important;
        min-height: 360px !important;
    }
</style>
@endpush
@section('content')
    @include('includes.frontend.common-slider', [
        'title' => 'Video Gallery',
        'subTitle' => 'Video Gallery',
    ])

    <!-- Gallery/Photo & video Section -->
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-5">
                <div class="col-md-7 text-center heading-section ftco-animate">
                    <h2 class="mb-3">{{ translate('Discover Our Moments at Suncity Polyclinic') }}</h2>
                </div>
            </div>
            <div class="row">
                <div class="row no-gutters">
                    @foreach(videoGallery() as $video)
                        <div class="col-md-4">
                            <div class="embed-responsive">
                                <iframe class="embed-responsive-item" width="100%" height="480px" src="https:{{ $video->video_link }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>

    </section>


    <!-- include Achievements info and paralax same to index page Section -->
    @include('includes.frontend.achievements-info')
@endsection
