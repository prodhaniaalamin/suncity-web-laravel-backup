<!-- Slider Hero Section 1-->

<section class="home-slider owl-carousel">
    @foreach(homePageSliders() as $slider)
    <div class="slider-item" style="background-image: url({{ image($slider->image) }});">
        <div class="overlay"></div>
        <div class="container">
            <div class="row slider-text align-items-center" data-scrollax-parent="true">
                <div class="col-md-6 col-sm-12 ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
                    <h1 class="mb-4" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">{{ translate($slider->title) }}</h1>
                    <p class="mb-4" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">{{ translate($slider->description) }}</p>
                    <p data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">
                        <a href="#" class="btn btn-primary px-4 py-3" data-toggle="modal"
                            data-target="#modalRequestDocSch">{{ translate('Doctors Schedule') }}</a>
                        <a href="#" class="btn btn-outline-light px-4 py-3" data-toggle="modal"
                            data-target="#modalRequest">{{ translate('Make an Appointment') }}</a>
                    </p>

                </div>
            </div>
        </div>
    </div>
    @endforeach
</section>
<!-- end Slider Hero Section 1-->
