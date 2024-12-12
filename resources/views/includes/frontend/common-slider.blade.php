<section class="home-slider owl-carousel">
    <div class="slider-item bread-item" style="background-image: url({{ image('assets/frontend/images/bg_1.jpg') }});"
        data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container" data-scrollax-parent="true">
            <div class="row slider-text align-items-end">
                <div class="col-md-8 col-sm-12 ftco-animate mb-5">
                    <p class="breadcrumbs" data-scrollax=" properties: { translateY: '70%', opacity: 1.6}">
                        <span class="mr-2"><a href="/home">{{ translate('Home') }}</a></span> <span>{{ translate($title ?? '') }}</span></p>
                    <h1 class="mb-3" data-scrollax=" properties: { translateY: '70%', opacity: .9}">{{ translate($subTitle ?? '') }}</h1>
                </div>
            </div>
        </div>
    </div>
</section>
