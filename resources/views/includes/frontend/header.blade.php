<!-- top contact -->
<div class="container">
    @php
        $contactInfo = dynamicData('contactInfo')->options ?? [];
    @endphp
    <div class="row">
        <div class="col-md-6 text-center">
            <!-- Facebook -->
            <a href="tel:{{ $contactInfo['contactPhone'] ?? '' }}">
                <span class="icon icon-phone"></span><span class="text"> {{ $contactInfo['contactPhone'] ?? '' }} </span>
            </a>
            <a href="mailto:{{ $contactInfo['contactEmail'] ?? '' }}"><span class="fa-solid fa-envelope"></span><span class="text">
                {{ $contactInfo['contactEmail'] ?? '' }}</span></a>
        </div>

        <div class="col-md-3 text-center">
            <!-- Facebook -->
            <a style="color: #3b5998;" target="_blank" href="{{ $contactInfo['facebook'] ?? '' }}"
                role="button"><i class="fa-brands fa-facebook"></i></a>

            <!-- Instagram -->
            <a style="color: #ac2bac;" target="_blank" href="{{ $contactInfo['instagram'] ?? '' }}"
                role="button"><i class="fa-brands fa-instagram"></i></a>
            <!-- tiktok -->
            <a style="color: #ac2bac;" target="_blank" href="{{ $contactInfo['tiktok'] ?? '' }}"
                role="button"><i class="fa-brands fa-tiktok"></i></a>

            <!-- Google -->
            <a style="color: #dd4b39;" target="_blank" href="{{ $contactInfo['google'] ?? '' }}" role="button"><i
                    class="fa-brands fa-google"></i></a>


        </div>
        <div class="col-md-3 text-center">
            @if(Auth::check())
                <a href="{{ route('dashboard') }}"><span class="fa-solid fa-user"></span><span class="text "> {{ translate('Dashboard') }} </span></a>
                <a href="{{ route('logout') }}" style="margin-left: 5px"><i class="fas fa-sign-out-alt"></i> <span class="text "> {{ translate('log out') }} </span></a>
            @else
                <a href="{{ route('login') }}"><span class="fa-solid fa-user"></span><span class="text "> {{ translate('Login') }} </span></a>
                <a href="{{ route('register') }}" style="margin-left: 5px"><span class="fa-solid fa-user-plus"></span><span class="text "> {{ translate('Signup') }} </span></a>
            @endif

        </div>
    </div>
</div>

<!-- nav -->
@include('includes.frontend.navbar')
<!-- END nav -->
