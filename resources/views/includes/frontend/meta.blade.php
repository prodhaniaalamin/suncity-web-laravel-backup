<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
@php
    $title = ($title ?? 'Home') . ' | Suncity Polyclinic Riyadh, Saudi Arabia';
@endphp
<title>{{ $title }}</title>
<meta name="description" content="@yield('description', 'Discover premium healthcare at Suncity Polyclinic in Batha, Riyadh. Offering expert medical care in ophthalmology, obstetrics, gynecology, and more. Modern facilities, ample parking, and free Wi-Fi ensure your comfort and convenience.')">
{{-- <meta name="keywords" content="@yield('keywords', 'Suncity Hospital, apparels, best quality of cloth, merchandiser, cloth in bangladesh, apparels in Saudi Arabia')"> --}}
<meta name="robots" content="index,follow"/>
<meta name="coverage" content="Worldwide">
<meta name="distribution" content="Global">
<meta name="author" content="alamin-prodhania">
<meta name="og:image" content="{{ $_SERVER['HTTP_HOST'] . '/'}}@yield('image', "public/assets/frontend/images/logo.png")"/>
<meta name="rating" content="General">
<meta property="og:title" content="{{ $title }}"/>
<meta property="og:description" content="@yield('description', 'Discover premium healthcare at Suncity Polyclinic in Batha, Riyadh. Offering expert medical care in ophthalmology, obstetrics, gynecology, and more. Modern facilities, ample parking, and free Wi-Fi ensure your comfort and convenience.')"/>
<meta property="og:type" content="@yield('type', 'website')"/>
<meta property="og:locale" content="en_US" />
<meta property="og:url" content="{{ request()->fullUrl() }}"/>
<meta property="og:site_name" content="{{ $_SERVER['HTTP_HOST']}}">
<meta name="twitter:card" content="summary"/>
<meta name="twitter:title" content="{{ $title }}"/>
{{-- <meta name="twitter:description" content="@yield('description', 'Discover premium healthcare at Suncity Polyclinic in Batha, Riyadh. Offering expert medical care in ophthalmology, obstetrics, gynecology, and more. Modern facilities, ample parking, and free Wi-Fi ensure your comfort and convenience.') | {{ config('app.name') }}"/> --}}
<meta name="prefix" content="{{ \App\Services\Helpers::$prefix }}">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="base_url" content="{{ URL::to('/') }}/">
<meta name="asset" content="{{ assets() }}">
