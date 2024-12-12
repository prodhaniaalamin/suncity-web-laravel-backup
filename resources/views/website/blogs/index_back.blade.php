@extends('layouts.website', ['title' => 'Blog List'])

@section('content')
    @include('includes.frontend.common-slider', [
        'title' => 'Blog List',
        'subTitle' => 'Read Our Blog',
    ])
    <!-- Suncity Service Section -->

    <!-- suncity blog Section -->
    <section class="ftco-section">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="row">

                        @foreach($blogList as $blog)
                        <div class="col-md-12 ftco-animate">
                            <div class="blog-entry" data-aos-delay="100">
                                <a class="block-20" style="background-image: url({{ image($blog->image) }});"></a>
                                <div class="text d-flex py-4">
                                    <div class="desc pl-sm-3 pl-md-5">
                                        <h3 class="heading"><a>{{ $blog->title }}</a></h3>
                                        <p>{!! translate(Str::length($blog->description) > 300 ? substr($blog->description, 0, 300) . '...' : $blog->description) !!}</p>
                                        <p><a href="{{ route('blog.details', $blog->id) }}" class="btn btn-primary btn-outline-primary">{{ translate('Read more') }}</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>

                    <div class="row mt-5">
                        <div class="col">
                            <div class="block-27">
                                <ul>
                                    <li><a href="#">&lt;</a></li>
                                    <li class="active"><span>1</span></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>

                                    <li><a href="#">&gt;</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div> <!-- END: col-md-9 -->


                <div class="col-md-3 sidebar ftco-animate">

                    <div class="sidebar-box ftco-animate">
                        <div class="categories">
                            <h3>Categories</h3>
                            <li><a href="department-details.php">Ophthalmology</a></li>
                            <li><a href="#">Gynecology</a></li>
                            <li><a href="#">Diabetology</a></li>
                            <li><a href="#">Internal Medicine</a></li>
                            <li><a href="#">Family Medicine</a></li>
                            <li><a href="#">Orthopedic</a></li>
                            <li><a href="#">Pediatric </a></li>
                            <li><a href="#">Dermatology </a></li>
                            <li><a href="#">Dental</a></li>
                            <li><a href="#">Bio chemistry</a></li>
                            <li><a href="#">Radiology</a></li>
                            <li><a href="#">Medicine</a></li>
                        </div>
                    </div>



                    <div class="sidebar-box ftco-animate">
                        <h3>Recent Blog</h3>

                        <div class="block-21 mb-4 d-flex">
                            <a class="blog-img mr-4" style="background-image: url(images/gallery-4.jpg);"></a>
                            <div class="text">
                                <h3 class="heading"><a href="#">Combatting Plaque Buildup: A Guide to Preventing Tooth Decay</a></h3>
                                <div class="meta">
                                    <div><a href="#"><span class="icon-calendar"></span> November 04, 2024</a></div>
                                    <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                                    <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                                </div>
                            </div>
                        </div>
                        <div class="block-21 mb-4 d-flex">
                            <a class="blog-img mr-4" style="background-image: url(images/image_1.jpg);"></a>
                            <div class="text">
                                <h3 class="heading"><a href="#">Effects of Tobacco Use on Oral Health</a></h3>
                                <div class="meta">
                                    <div><a href="#"><span class="icon-calendar"></span> November 04, 2024</a></div>
                                    <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                                    <div><a href="#"><span class="icon-chat"></span> 13</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </section>
    <!-- suncity blog Section -->

    <!-- include Achievements info and paralax same to index page Section -->
    @include('includes.frontend.achievements-info')
@endsection
