@extends('layouts.website', ['title' => 'Doctor List'])

@section('content')
    @include('includes.frontend.common-slider')

    <!-- Suncity Doctors Section -->
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
                @foreach (doctors() as $doctor)
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

    </section>
    <!-- end doctors Section -->

    <!-- include Achievements info and paralax same to index page Section -->
    @include('includes.frontend.achievements-info')
@endsection
