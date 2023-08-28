<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('frontend.includes.meta')
    @include('frontend.includes.styles')
</head>
<body data-plugin-page-transition>
<noscript>
    <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KTS968RL"
            height="0" width="0" style="display:none;visibility:hidden"></iframe>
</noscript>
<div class="body">
    @include('frontend.includes.header')
    @yield('front')
    @include('frontend.includes.footer')
    @include('sweetalert::alert')
    @include('frontend.includes.scripts')
</div>
@yield('scripts')
</body>
</html>
