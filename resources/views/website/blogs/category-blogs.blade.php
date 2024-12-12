@extends('layouts.website', ['title' => 'Category Blog List'])

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
                                        <p>{!! translate(Str::length($blog->description) > 300 ? strip_tags(substr($blog->description, 0, 300)) . '...' : strip_tags($blog->description)) !!}</p>
                                        <p><a href="{{ route('blog.details', $blog->id) }}" class="btn btn-primary btn-outline-primary">{{ translate('Read more') }}</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div> <!-- END: col-md-9 -->


                <div class="col-md-3 sidebar ftco-animate">

                    <div class="sidebar-box ftco-animate">
                        <div class="categories">
                            <h3>{{ translate('Categories') }}</h3>
                            @foreach(departments() as $v)
                                <li><a href="{{ route('blogs.category', $v->id) }}">{{ translate($v->name) }}</a></li>
                            @endforeach
                        </div>
                    </div>

                    <div class="sidebar-box ftco-animate">
                        @if($recent->count() > 0)
                            <h3>{{ translate('Recent Blog') }}</h3>
                            @foreach($recent as $blog)
                            <div class="block-21 mb-4 d-flex">
                                <a class="blog-img mr-4" style="background-image: url({{ image($blog->image) }});"></a>
                                <div class="text">
                                    <h3 class="heading"><a href="{{ route('blog.details', $blog->id) }}">{{ translate($blog->title) }}</a></h3>
                                    <div class="meta">
                                        <div><a href="#"><span class="icon-calendar"></span> {{ $blog->created_at->format('M d, Y') }}</a></div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        @endif
                    </div>

                </div><!-- end col-md-3 Section -->
            </div>
        </div>
    </section>
    <!-- suncity blog Section -->

    <!-- include Achievements info and paralax same to index page Section -->
    @include('includes.frontend.achievements-info')
@endsection
