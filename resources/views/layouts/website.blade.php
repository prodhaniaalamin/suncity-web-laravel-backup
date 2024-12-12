<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
    @include('includes.frontend.top', ['title' => $title ?? 'Home'])
    @stack('css')
</head>
<body>
    @include('includes.frontend.header')

    @yield('content')

    @include('includes.frontend.footer')

    @include('includes.frontend.bottom')

    @stack('scripts')
</body>
</html>
