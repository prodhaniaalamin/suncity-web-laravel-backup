@extends('layouts.website', ['title' => 'About'])

@section('content')
    <section class="home-slider owl-carousel">
        <div class="slider-item bread-item" style="background-image: url({{ image('assets/frontend/images/bg_1.jpg') }});"
            data-stellar-background-ratio="0.5">
            <div class="overlay"></div>
            <div class="container" data-scrollax-parent="true">
                <div class="row slider-text align-items-end">
                    <div class="col-md-7 col-sm-12 ftco-animate mb-5">
                        <p class="breadcrumbs" data-scrollax=" properties: { translateY: '70%', opacity: 1.6}"><span
                                class="mr-2"><a href="index.html">{{ translate('Home') }}</a></span> <span>{{ translate('About') }}</span></p>
                        <h1 class="mb-3" data-scrollax=" properties: { translateY: '70%', opacity: .9}">{{ translate('About Us') }}</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- About Suncity Section -->
    <section class="ftco-section">
        <div class="container">
            <div class="row d-md-flex">
                <div class="col-md-3 ftco-animate img about-image order-md-last"
                    style="background-image: url({{ image('assets/frontend/images/about.jpg') }});">
                </div>
                <div class="col-md-9 ftco-animate pr-md-5 order-md-first">
                    <div class="row">
                        <div class="col-md-12 nav-link-wrap mb-5">
                            <div class="nav ftco-animate nav-pills" id="v-pills-tab" role="tablist"
                                aria-orientation="vertical">
                                @foreach(aboutPageTabs()->take(6) as $tab)
                                    <a class="nav-link {{ $loop->first ? 'active':'' }}" id="tab-{{ $tab->id }}-tab" data-toggle="pill"
                                        href="#tab-{{ $tab->id }}" role="tab" aria-controls="tab-{{ $tab->id }}"
                                        aria-selected="true">{{ translate($tab->name) }}</a>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-md-12 d-flex align-items-center">
                            <div class="tab-content ftco-animate" id="v-pills-tabContent">
                                @foreach(aboutPageTabs()->take(6) as $tabPane)
                                    <div class="tab-pane fade {{ $loop->first ? 'show active':'' }}" id="tab-{{ $tabPane->id }}" role="tabpanel"
                                        aria-labelledby="tab-{{ $tabPane->id }}-tab">
                                        <div>
                                            <h2 class="mb-4">{{ translate($tabPane->title) }}</h2>
                                            <p>{!! translate($tabPane->description) !!}</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- end about suncity Section -->

    <!-- promo doctor Section -->
    @include('website.dantal-care-consult-doctors', ['key' => 'consultDoctors', 'image'=> 'doctors/all-doctors.png'])
    <!-- end promo doctor Section -->
@endsection
