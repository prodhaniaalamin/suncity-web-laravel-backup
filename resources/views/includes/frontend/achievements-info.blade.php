<section class="ftco-section ftco-counter img" id="section-counter"
    style="background-image: url({{ image('assets/frontend/images/bg_sun.jpg') }});" data-stellar-background-ratio="0.5">
    <div class="container">
        @php
            $businessInfo = dynamicData('businessInfo');
        @endphp
        <div class="row d-flex align-items-center">
            <div class="col-md-3 aside-stretch py-5">
                <div class="heading-section heading-section-white ftco-animate pr-md-4">
                    <h2 class="mb-3">{{ translate('Achievements') }}</h2>
                    <p>"{{ translate($businessInfo->value) }}"</p>
                </div>
            </div>
            <div class="col-md-9 py-5 pl-md-5">
                <div class="row">
                    <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                        <div class="block-18">
                            <div class="text">
                                <strong class="number"
                                    data-number="{{ $businessInfo->getSetting('yearsOrExperience') }}">0</strong>
                                <span>{{ translate('Years of Experience') }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                        <div class="block-18">
                            <div class="text">
                                <strong class="number"
                                    data-number="{{ $businessInfo->getSetting('qualifiedDortors') }}">0</strong>
                                <span>+ {{ translate('Qualified Doctors') }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                        <div class="block-18">
                            <div class="text">
                                <strong class="number"
                                    data-number="{{ $businessInfo->getSetting('happyPatients') }}">0</strong>
                                <span>+ {{ translate('Daily Happy Patients') }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                        <div class="block-18">
                            <div class="text">
                                <strong class="number"
                                    data-number="{{ $businessInfo->getSetting('carParkingArea') }}">0</strong>
                                <span>+ {{ translate('Car Parking Area') }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
