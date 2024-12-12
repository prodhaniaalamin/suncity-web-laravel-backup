<title>{{ isset($title) ? $title : 'Home' }} - Suncity Hospital</title>
<meta name="description" content="Suncity Hospital" />
<meta name="keywords" content="Suncity Hospital" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<meta charset="utf-8" />

<meta name="prefix" content="{{ \App\Services\Helpers::$prefix }}">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="base_url" content="{{ URL::to('/') }}/">
<meta name="asset" content="{{ assets() }}">
<meta name="appModeIsDev" content="{{ config('app.env') === 'local' }}">

<meta property="og:locale" content="en_US" />
<meta property="og:type" content="Suncity Hospital" />
<meta property="og:title" content="Suncity Hospital" />
{{-- <meta property="og:url" content="http://bddevs.com" /> --}}
<meta property="og:site_name" content="Suncity Hospital" />
{{-- <link rel="canonical" href="http://bddevs.com" /> --}}
<link rel="shortcut icon" href="{{ image(dynamicData('logoFavicon')->getSetting('favicon')) }}" />
<!--begin::Fonts-->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
{{-- <!--end::Fonts--> --}}
<!--begin::Page Vendor Stylesheets(used by this page)-->
<link href="{{ assets('assets/backend/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet"
    type="text/css" />
<!--end::Page Vendor Stylesheets-->
<!--begin::Global Stylesheets Bundle(used by all pages)-->
<link href="{{ assets('assets/backend/css/datepicker.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ assets('assets/backend/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ assets('assets/backend/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ assets('assets/backend/css/style.css?r=' . random_int(10, 999)) }}" rel="stylesheet" type="text/css" />
@yield('css')
@stack('styles')
<!--end::Global Stylesheets Bundle-->
