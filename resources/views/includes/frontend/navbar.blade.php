<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand logo" href="{{ url('') }}">
            <img src="{{ image(dynamicData('logoFavicon')->getSetting('logo')) }}" alt="" height="50"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
            aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> {{ translate('Menu') }}
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item {{ request()->is('/') ? 'active' : '' }}"><a href="{{ url('') }}" class="nav-link">{{ translate('Home') }}</a></li>
                <li class="nav-item {{ request()->is('about') ? 'active' : '' }}"><a href="{{ route('about') }}" class="nav-link">{{ translate('About') }}</a></li>
                <!--dropdown hover over-->
                <li class="nav-item dropdown {{ request()->is('department*') ? 'active' : '' }}">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">{{ translate('Department') }}
                    </a>
                    <ul class="dropdown-menu p-0" aria-labelledby="navbarDropdown">
                        @foreach (departments() as $department)
                            <li>
                                <a class="dropdown-item" href="{{ route('department.details', $department->id) }}">{{ translate($department->name) }}</a>
                            </li>
                        @endforeach
                    </ul>
                </li><!--end dropdown hover over-->

                <li class="nav-item {{ request()->is('doctors*') ? 'active' : '' }}"><a href="{{ route('doctors') }}" class="nav-link">{{ translate('Doctors') }}</a></li>
                <li class="nav-item {{ request()->is('services*') ? 'active' : '' }}"><a href="{{ route('services') }}" class="nav-link">{{ translate('Services') }}</a></li>

                <!--dropdown suncity-->
                <li class="nav-item dropdown {{ request()->is('blogList*') ? 'active' : '' }}">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">{{ translate('Suncity') }}
                    </a>
                    <ul class="dropdown-menu p-0" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="{{ route('healthInsurances') }}">{{ translate('Insurance') }}</a></li>
                        <li><a class="dropdown-item" href="{{ route('healthPackages') }}">{{ translate('Packages') }}</a></li>
                        <li><a class="dropdown-item" href="{{ route('photo.gallery') }}">{{ translate('Photo Gellary') }}</a></li>
                        <li><a class="dropdown-item" href="{{ route('videoGallery') }}">{{ translate('Video Gallery') }}</a></li>
                        <li><a class="dropdown-item" href="{{ route('blogList') }}">{{ translate('Blogs') }}</a></li>
                    </ul>
                </li><!--end dropdown suncity-->
                <li class="nav-item {{ request()->is('contact') ? 'active' : '' }}"><a href="{{ route('contact') }}" class="nav-link">{{ translate('Contact') }}</a></li>
            </ul>
            <!-- language -->
            <select class="languagepicker" data-width="fit" id="language_change">
                {!! optionHandler(array_map(fn($lc) => $lc['name'], config('languages')), App::getLocale(), true) !!}
            </select><!-- end language -->

        </div>
    </div>
</nav>
