@extends('layouts.website', ['title' => 'Department Details'])

@section('content')
    @include('includes.frontend.common-slider', ['title'=> 'Department Details', 'subTitle' => $department->name])




    <!--Department Details-->
    <section class="ftco-section">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="row">

                        <div class="col-md-12 ftco-animate">
                            <div class="blog-entry" data-aos-delay="100">

                                <a class="block-20" style="background-image: url({{ image($department->image) }});"></a>

                                <div class="text d-flex py-4">
                                    <div class="desc pl-sm-3 pl-md-5">

                                        <h3 class="heading"><a>{{ translate($department->title) }}</a></h3>
                                        <p>{{ translate($department->description) }}</p>

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
                            @foreach(departments() as $v)
                                <li><a href="{{ route('department.details', $v->id) }}">{{ translate($v->name) }}</a></li>
                            @endforeach
                        </div>
                    </div>

                    <div class="sidebar-box ftco-animate">
                        @if($department->doctors->count() > 0)
                        <h3>Related Doctors</h3>
                            @foreach($department->doctors as $doctor)
                            <div class="block-21 mb-4 d-flex">
                                <a class="blog-img mr-4" style="background-image: url({{ image($doctor->photo) }});"></a>
                                <div class="text">
                                    <h3 class="heading">
                                        <a href="#">{{ translate($doctor->name) }}</a>
                                    </h3>
                                    <a>{{ translate($doctor->specialty) }}</a></h3>

                                </div>
                            </div>
                            @endforeach
                        @endif
                    </div>

                </div><!-- end col-md-4 Section -->
            </div>
        </div>
    </section>


    <!-- include Achievements info and paralax same to index page Section -->
    @include('includes.frontend.achievements-info')
@endsection
