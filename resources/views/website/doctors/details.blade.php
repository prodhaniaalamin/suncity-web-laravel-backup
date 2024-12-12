@extends('layouts.website', ['title' => 'Doctor Details'])

@push('css')
<style>
    .doctor-bg {
        text-align: center;
        background-repeat: repeat;
        background-size: contain;
        background-position: center;
    }
    .doctor-bg img {
        max-width: 100%;
        height: 350px;
    }
</style>
@endpush
@section('content')
    @include('includes.frontend.common-slider', [
        'title' => 'Doctor Details',
        'subTitle' => 'Doctor Details',
    ])

    <!-- Doctor details & category also other Doctor Section -->
    <section class="ftco-section">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="row">

                        <div class="col-md-12 ftco-animate">
                            <div class="blog-entry" data-aos-delay="100">
                                <a class="block-20 doctor-bg"
                                    style="background-image: url({{ image('assets/frontend/images/dr-bg.jpg') }});">
                                    <img class="img-fluid" src="{{ image($doctor->photo) }}" alt="Doctor Photo">
                                </a>
                                <div class="text d-flex py-4">

                                    <div class="desc pl-sm-3 pl-md-5">
                                        <h3 class="heading"><a>{{ translate($doctor->name) }}</a></h3>
                                        <p class="">{{ translate($doctor->specialty) }}</p>
                                        {{--<p>{{ translate($doctor->department->name) }}</p>--}}
                                        <p>{{ translate($doctor->description) }}</p>
                                        <p>
                                        @if($doctor->options && $doctor->options->social_media)
                                            @foreach(json_decode($doctor->options->social_media) as $key => $value)
                                                <a href="{{ $value }}"><span class="icon-{{ $key }}"></span></a>
                                            @endforeach
                                        @endif
                                        </p>
                                        <!-- button book an appoinment-->
                                        <a href="#" class="btn btn-primary btn-sm" data-toggle="modal"
                                        data-target="#modalRequest" data-selected-doctor="{{ $doctor->id }}">{{ translate('Book an Appointment') }}</a>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- END: col-md-9 -->



                <div class="col-md-3 sidebar ftco-animate">

                    <div class="sidebar-box ftco-animate">
                        <div class="categories">
                            <h3>Departments</h3>
                            @foreach(departments() as $department)
                            <li><a href="{{ route('department.details', $department->id) }}">{{ translate($department->name) }}</a></li>
                            @endforeach
                        </div>
                    </div>

                    <div class="sidebar-box ftco-animate">
                        @if($related_doctors->count() > 0)
                            <h3>Other Doctors</h3>

                            @foreach($related_doctors as $doctor)
                            <div class="block-21 mb-4 d-flex">
                                <a class="blog-img mr-4" style="background-image: url({{ image($doctor->photo) }});"></a>
                                <div class="text">
                                    <h3 class="heading">
                                        <a href="{{ route('doctor.details', $doctor->id) }}">{{ translate($doctor->name) }}</a>
                                    </h3>
                                    <a>{{ translate($doctor->specialty) }}</a></h3>

                                </div>
                            </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- include Achievements info and paralax same to index page Section -->
    @include('includes.frontend.achievements-info')
@endsection
