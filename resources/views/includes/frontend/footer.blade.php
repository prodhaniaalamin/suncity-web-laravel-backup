<!-- Footer Section -->
<footer class="ftco-footer ftco-bg-dark ftco-section">
    <div class="container">
        <div class="row mb-5">
            <div class="col-md-3">
                <div class="ftco-footer-widget mb-4">
                @php
                    $contactInfo = dynamicData('contactInfo')->options ?? [];
                @endphp
                    <h2 class="ftco-heading-2"><a href="{{ url('') }}"><img src="{{ image(dynamicData('logoFavicon')->getSetting('logo')) }}" alt=""
                                height="50"></a></h2>
                    <p>{{ translate($contactInfo['footerDescription'] ?? '') }}</p>
                    <p><a href="tel:{{ $contactInfo['contactPhone'] }}"><span class="icon icon-phone"></span><span class="text">
                        {{ $contactInfo['contactPhone'] }}
                    </span></a></p>

                    <p><a href="mailto:{{ $contactInfo['contactEmail'] ?? '' }}">
                        <span class="fa-solid fa-envelope"></span><span class="text">
                        {{ $contactInfo['contactEmail'] ?? '' }}</span></a></p>

                    <p><a href="https://www.google.com/maps/place/SUN+City's+Polyclinic/@24.6405064,46.7189783,15z/data=!4m6!3m5!1s0x3e2f05b1fd899837:0xe10b02668b7e7e4b!8m2!3d24.6405064!4d46.7189783!16s%2Fg%2F11bbtnxy_1?entry=ttu">
                            <span class="fa-solid fa-location-dot"></span><span class="text"> {{ $contactInfo['address'] ?? '' }}</span></a></p>
                </div>
                <ul class="ftco-footer-social list-unstyled float-md-left float-lft ">
                    <li class="ftco-animate"><a href="{{ $contactInfo['facebook'] ?? '' }}"><span
                                class="icon-facebook"></span></a></li>
                    <li class="ftco-animate"><a href="{{ $contactInfo['instagram'] ?? '' }}"><span
                                class="icon-instagram"></span></a></li>
                    <li class="ftco-animate"><a href="{{ $contactInfo['tiktok'] ?? '' }}"><span
                                class="fa-brands fa-tiktok"></span></a></li>

                </ul>
            </div>


            <div class="col-md-2">
                <div class="ftco-footer-widget mb-4 ml-md-5">
                    <h2 class="ftco-heading-2">{{ translate('Quick Links') }}</h2>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('about') }}" class="py-2 d-block">{{ translate('About') }}</a></li>
                        <li><a href="{{ route('services') }}" class="py-2 d-block">{{ translate('Service') }}</a></li>
                        <li><a href="{{ route('healthInsurances') }}" class="py-2 d-block">{{ translate('Insurance') }}</a></li>
                        <li><a href="#" class="py-2 d-block">{{ translate('Career') }}</a></li>
                        <li><a href="{{ route('blogList') }}" class="py-2 d-block">{{ translate('Blog') }}</a></li>
                        <li><a href="{{ route('contact') }}" class="py-2 d-block">{{ translate('Contact') }}</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-md-3">
                <div class="ftco-footer-widget mb-4 ml-md-5">
                    <h2 class="ftco-heading-2">{{ translate('DMC Group') }}</h2>
                    <ul class="list-unstyled">
                        <li><a href="{{ url('') }}" class="py-2 d-block">{{ translate('Suncity Polyclinic, Riyadh') }}</a></li>
                        <li><a href="#" class="py-2 d-block">{{ translate('Al-Raqi Polyclinic, Jeddah') }}</a></li>
                        <li><a href="#" class="py-2 d-block">{{ translate('DMC Hyper Market') }}</a></li>
                        <li><a href="#" class="py-2 d-block">{{ translate('DMC Apartment') }}</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-md-3">
                <div class="ftco-footer-widget mb-4 ml-md-5">
                    <h2 class="ftco-heading-2">{{ translate('Policies') }}</h2>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('termsCondition') }}" class="py-2 d-block">{{ translate('Terms & Condition') }}</a></li>
                        <li><a href="{{ route('privacyPolicy') }}" class="py-2 d-block">{{ translate('Privacy Policy') }}</a></li>
                        <li><a href="{{ route('cookiePolicy') }}" class="py-2 d-block">{{ translate('Cookie Policy') }}</a></li>
                    </ul>
                </div>
            </div>

        </div>


        <div class="row">
            <div class="col-md-12 text-center">

                <p>
                    Copyright &copy; {{ date('Y') }} DMC Group. All rights reserved
                    <!--<i class="icon-heart" aria-hidden="true"></i> by <a href="http://suncitypolyclinicsa.com/" target="_blank">Suncity Polyclinic</a>-->
                </p>
            </div>
        </div>
    </div>
    <!-- go to top btn-->
    <button type="button" class="btn btn-primary btn-floating btn-lg" id="btn-back-to-top">
        <i class="fas fa-arrow-up"></i>
    </button>
</footer>
<!-- end Footer Section -->



<!-- loader -->
<div id="ftco-loader" class="show fullscreen">
    <svg class="circular" width="48px" height="48px">
        <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
        <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4"
            stroke-miterlimit="10" stroke="#F96D00" />
    </svg>
</div>



<!-- Modal Doctors Schedule hero section -->
<div class="modal fade" id="modalRequestDocSch" tabindex="-1" role="dialog" aria-labelledby="modalRequestLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalRequestLabel">{{ translate('Duty Roster of Doctors') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="font-size:10px;">
                <img src="{{ image('assets/frontend/images/schedule-november24.jpg') }}" class="img-fluid"
                    alt="Responsive image">
            </div>

        </div>
    </div>
</div>
<!-- end Modal doctors schedule  hero section-->


<!-- Modal Appointment Separate doctor card -->
<div class="modal fade" id="modalRequest" tabindex="-1" role="dialog" aria-labelledby="modalRequestLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalRequestLabel">{{ translate('Book an Appointment') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('appointment.store') }}" method="POST" class="appointment-form">
                    @csrf
                    <div class="icon"><span class=""></span></div>
                    <select name="doctor_id" id="doctor_id" class="form-control" required>
                        <option disabled hidden selected>{{ translate('Select Doctor') }}</option>
                        {!! optionsProcess(doctors()) !!}
                    </select>

                    <div class="form-group">
                        <!-- <label for="appointment_name" class="text-black">Full Name</label> -->
                        <input type="text" name="name" value="{{ user()?->name }}" class="form-control"
                            id="appointment_name" placeholder="{{ translate('Name') }}" required>
                    </div>
                    <div class="form-group">
                        <!-- <label for="appointment_email" class="text-black">Email</label> -->
                        <input type="hidden" name="patient_id" value="{{ user()?->id }}" />
                        <input type="number" name="phone" value="{{ user()?->phone }}" class="form-control"
                            id="appointment_number" placeholder="{{ translate('Mobile') }}" required>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <!-- <label for="appointment_date" class="text-black">Date</label> -->
                                <input type="text" name="day" class="form-control appointment_date"
                                    placeholder="{{ translate('Date') }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <!-- <label for="appointment_time" class="text-black">Time</label> -->
                                <input type="text" name="time" class="form-control appointment_time"
                                    placeholder="{{ translate('Time') }}" required>
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <!-- <label for="appointment_message" class="text-black">Message</label> -->
                        <textarea name="description" id="appointment_message" class="form-control" cols="30" rows="10"
                            placeholder="Message" required></textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="{{ translate('Make an Appointment') }}" class="btn btn-primary">
                    </div>
                </form>
            </div>

        </div>
    </div>
</div><!-- end Modal Appointment Separate doctor card-->


<!-- whatsapp button-->
<div class="wabtn" id="wabutton">
    <style>
        [wa-tooltip] {
            position: relative;
            cursor: default;

            &:hover {
                &::before {
                    content: attr(wa-tooltip);
                    font-size: 16px;
                    text-align: center;
                    position: absolute;
                    display: block;
                    right: calc(0% - 100px);
                    left: null;
                    min-width: 200px;
                    max-width: 200px;
                    bottom: calc(100% + 10px);
                    transform: translate(-50%);
                    animation: fade-in 500ms ease;
                    background: #00E785;
                    border-radius: 4px;
                    padding: 10px;
                    color: #ffffff;
                    z-index: 1;
                }
            }
        }

        @keyframes pulse {
            0% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.1);
            }

            100% {
                transform: scale(1);
            }
        }

        [wa-tooltip] {}

        @keyframes fade-in {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }
    </style>
    <a wa-tooltip="We are available! Click here to chat" target="_blank"
        href="https://wa.me/966534534808?text=Suncity%20Polyclinic%20%0AChat%20Anytime.%20%0AWe%20look%20forward%20to%20your%20Chat."
        style=" cursor: pointer;height: 48px;width: auto;padding: 7px 7px 7px 7px;position: fixed !important;color: #fff;bottom: 20px;right: 20px;;display: flex;font-size: 18px;font-weight: 600;align-items: center;z-index: 999999999 !important;background-color: #00E785;box-shadow: 4px 5px 10px rgba(0, 0, 0, 0.4);border-radius: 100px;animation: pulse 2.5s ease infinite;">
        <svg width="34" height="34" style="padding: 5px;" viewBox="0 0 28 28" fill="none"
            xmlns="http://www.w3.org/2000/svg">
            <g clip-path="url(#clip0_1024_354)">
                <path
                    d="M23.8759 4.06939C21.4959 1.68839 18.3316 0.253548 14.9723 0.0320463C11.613 -0.189455 8.28774 0.817483 5.61565 2.86535C2.94357 4.91323 1.10682 7.86244 0.447451 11.1638C-0.21192 14.4652 0.351026 17.8937 2.03146 20.8109L0.0625 28.0004L7.42006 26.0712C9.45505 27.1794 11.7353 27.7601 14.0524 27.7602H14.0583C16.8029 27.7599 19.4859 26.946 21.768 25.4212C24.0502 23.8965 25.829 21.7294 26.8798 19.1939C27.9305 16.6583 28.206 13.8682 27.6713 11.1761C27.1367 8.48406 25.8159 6.01095 23.8759 4.06939ZM14.0583 25.4169H14.0538C11.988 25.417 9.96008 24.8617 8.1825 23.8091L7.7611 23.5593L3.3945 24.704L4.56014 20.448L4.28546 20.0117C2.92594 17.8454 2.32491 15.2886 2.57684 12.7434C2.82877 10.1982 3.91938 7.80894 5.67722 5.95113C7.43506 4.09332 9.76045 2.87235 12.2878 2.48017C14.8152 2.08799 17.4013 2.54684 19.6395 3.78457C21.8776 5.02231 23.641 6.96875 24.6524 9.3179C25.6638 11.6671 25.8659 14.2857 25.2268 16.7622C24.5877 19.2387 23.1438 21.4326 21.122 22.999C19.1001 24.5655 16.6151 25.4156 14.0575 25.4157L14.0583 25.4169Z"
                    fill="#E0E0E0"></path>
                <path fill-rule="evenodd" clip-rule="evenodd"
                    d="M10.6291 7.98363C10.3723 7.41271 10.1019 7.40123 9.85771 7.39143C9.65779 7.38275 9.42903 7.38331 9.20083 7.38331C9.0271 7.3879 8.8562 7.42837 8.69887 7.5022C8.54154 7.57602 8.40119 7.68159 8.28663 7.81227C7.899 8.17929 7.59209 8.62305 7.38547 9.11526C7.17884 9.60747 7.07704 10.1373 7.08655 10.6711C7.08655 12.3578 8.31519 13.9877 8.48655 14.2164C8.65791 14.4452 10.8581 18.0169 14.3425 19.3908C17.2382 20.5327 17.8276 20.3056 18.4562 20.2485C19.0848 20.1913 20.4843 19.4194 20.7701 18.6189C21.056 17.8183 21.0557 17.1323 20.9701 16.989C20.8844 16.8456 20.6559 16.7605 20.3129 16.5889C19.9699 16.4172 18.2849 15.5879 17.9704 15.4736C17.656 15.3594 17.4275 15.3023 17.199 15.6455C16.9705 15.9888 16.3139 16.7602 16.1137 16.9895C15.9135 17.2189 15.7136 17.2471 15.3709 17.0758C14.3603 16.6729 13.4275 16.0972 12.6143 15.3745C11.8648 14.6818 11.2221 13.8819 10.7072 13.0007C10.5073 12.6579 10.6857 12.472 10.8579 12.3007C11.0119 12.1472 11.2006 11.9005 11.3722 11.7003C11.5129 11.5271 11.6282 11.3346 11.7147 11.1289C11.7603 11.0343 11.7817 10.9299 11.7768 10.825C11.7719 10.7201 11.7409 10.6182 11.6867 10.5283C11.6001 10.3566 10.9337 8.66151 10.6291 7.98363Z"
                    fill="white"></path>
                <path
                    d="M23.7628 4.02445C21.4107 1.66917 18.2825 0.249336 14.9611 0.0294866C11.6397 -0.190363 8.35161 0.804769 5.70953 2.82947C3.06745 4.85417 1.25154 7.77034 0.600156 11.0346C-0.051233 14.299 0.506321 17.6888 2.16894 20.5724L0.222656 27.6808L7.49566 25.7737C9.50727 26.8692 11.7613 27.4432 14.0519 27.4434H14.0577C16.7711 27.4436 19.4235 26.6392 21.6798 25.1321C23.936 23.6249 25.6947 21.4825 26.7335 18.9759C27.7722 16.4693 28.0444 13.711 27.5157 11.0497C26.9869 8.38835 25.6809 5.94358 23.7628 4.02445ZM14.0577 25.1269H14.0547C12.0125 25.1271 10.0078 24.5782 8.25054 23.5377L7.8339 23.2907L3.51686 24.4222L4.66906 20.2143L4.39774 19.7831C3.05387 17.6415 2.4598 15.1141 2.70892 12.598C2.95804 10.082 4.03622 7.72013 5.77398 5.88366C7.51173 4.04719 9.81051 2.84028 12.3089 2.45266C14.8074 2.06505 17.3638 2.5187 19.5763 3.74232C21.7888 4.96593 23.5319 6.89011 24.5317 9.21238C25.5314 11.5346 25.7311 14.1233 25.0993 16.5714C24.4675 19.0195 23.0401 21.1883 21.0414 22.7367C19.0427 24.2851 16.5861 25.1254 14.0577 25.1255V25.1269Z"
                    fill="white"></path>
            </g>
            <defs>
                <clipPath id="clip0_1024_354">
                    <rect width="27.8748" height="28" fill="white" transform="translate(0.0625)"></rect>
                </clipPath>
            </defs>
        </svg>
        <span class="button-text"></span>
    </a>
</div>

<script>
    let modalTitleDom = $('#modalRequest #modalRequestLabel'),
        doctorSelectOption = $('#modalRequest #doctor_id'),
        appoinmenForm = $('#modalRequest form');
    $(document).on('click', '[data-target="#modalRequest"]', function(e) {
        e.preventDefault();
        appoinmenForm[0].reset();
        let modalTitle = '{{ translate('Make an Appointment') }}';
        if (this.dataset.selectedDoctor) {
            modalTitle = '{{ translate('Book an Appointment') }}';
            doctorSelectOption.val(this.dataset.selectedDoctor);
        }
        modalTitleDom.html(modalTitle);
    });
</script>
