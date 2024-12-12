
        <div class="container-wrap mt-5">
            <div class="row d-flex no-gutters">
                <div class="col-md-6 img" style="background-image: url({{ image('assets/frontend/images/'.$image) }});"></div>
                @php
                    $dentalCare = dynamicData($key);
                    $options = $dentalCare->options ?? [];
                @endphp
                <div class="col-md-6 d-flex">
                    <div class="about-wrap">
                        <div class="heading-section heading-section-white mb-5 ftco-animate">
                            <h2 class="mb-2">{{ translate($dentalCare->value) }}</h2>
                            <p>{{ translate($options['description'] ?? '') }}</p>
                        </div>
                        <div class="list-services d-flex ftco-animate">
                            <div class="icon d-flex justify-content-center align-items-center">
                                <span class="icon-check2"></span>
                            </div>
                            <div class="text">
                                <h3>{{ translate($options['qt1'] ?? '') }}</h3>
                                <p>{{ translate($options['qd1'] ?? '') }}</p>
                            </div>
                        </div>
                        <div class="list-services d-flex ftco-animate">
                            <div class="icon d-flex justify-content-center align-items-center">
                                <span class="icon-check2"></span>
                            </div>
                            <div class="text">
                                <h3>{{ translate($options['qt2'] ?? '') }}</h3>
                                <p>{{ translate($options['qd2'] ?? '') }}</p>
                            </div>
                        </div>
                        <div class="list-services d-flex ftco-animate">
                            <div class="icon d-flex justify-content-center align-items-center">
                                <span class="icon-check2"></span>
                            </div>
                            <div class="text">
                                <h3>{{ translate($options['qt3'] ?? '') }}</h3>
                                <p>{{ translate($options['qd3'] ?? '') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
