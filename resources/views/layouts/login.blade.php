<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->

<head>
    <title>{{ isset($title) ? $title : 'Login - Suncity Hospital' }}</title>
    <meta name="description" content="Suncity Hospital" />
    <meta name="keywords" content="Suncity Hospital" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta charset="utf-8" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="Learning Management System - LMS" />
    <meta property="og:url" content="Suncity Hospital" />
    <meta property="og:site_name" content="Suncity Hospital" />
    <link rel="canonical" href="http://bddevs.com" />
    <link rel="shortcut icon" href="{{ assets('favicon.ico') }}" />
    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <!--end::Fonts-->
    <!--begin::Global Stylesheets Bundle(used by all pages)-->
    <link href="{{ assets('assets/backend/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ assets('assets/backend/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    <!--end::Global Stylesheets Bundle-->
    @php
        $default_bg = image('assets/backend/img/bg4.jpg');
        $dark_bg = image('assets/backend/img/bg4-dark.jpg');
    @endphp
    <style>
        body {
            background-image: url('{{ $default_bg }}');
        }

        [data-bs-theme="dark"] body {
            background-image: url('{{ $dark_bg }}');
        }
    </style>
</head>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_body" class="bg-body">
    <!--begin::Main-->


    @yield('content')


    <!--end::Main-->
    <script>
        var hostUrl = "assets/";
    </script>
    <!--begin::Javascript-->
    <!--begin::Global Javascript Bundle(used by all pages)-->
    <script src="{{ assets('assets/backend/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ assets('assets/backend/js/scripts.bundle.js') }}"></script>
    <!--end::Global Javascript Bundle-->
    <!--begin::Page Custom Javascript(used by this page)-->
    {{-- <script src="{{ assets('assets/backend/js/custom/authentication/sign-in/general.js') }}"></script> --}}
    <!--end::Page Custom Javascript-->
    <!--end::Javascript-->
</body>
<!--end::Body-->

</html>
