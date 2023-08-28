<!doctype html>
<html class="no-js" lang="az">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>404 - Zühur Group</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('backend/images/logo.png') }}" type="img/x-icon" rel="shortcut icon">
    <link rel="stylesheet" href="{{asset('frontend/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/iconfont.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/plugins.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/helper.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/style.css')}}">
    <script src="{{asset('frontend/js/vendor/modernizr-2.8.3.min.js')}}"></script>
</head>
<body>
<div id="main-wrapper">
    <div class="error-404-section section bg-dark pt-50 pb-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="error-404-content-area">
                        <img src="{{asset('frontend/images/error/404.png')}}" alt="">
                        <h2>Səhifə tapılmadı!</h2>
                        <p>Deyəsən bu məkanda heç nə tapılmayıb. Bəlkə aşağıdakı linklərdən birini sınayın?</p>
                        <div class="error-buttons">
                            <a class="btn yellow" href="{{ url()->previous() }}">Geri</a>
                            <a class="btn white" href="{{ route('frontend.index') }}">Ana səhifə</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{asset('frontend/js/vendor/jquery-1.12.4.min.js')}}"></script>
<script src="{{asset('frontend/js/popper.min.js')}}"></script>
<script src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
<script src="{{asset('frontend/js/plugins.js')}}"></script>
<script src="{{asset('frontend/js/main.js')}}"></script>
</body>
</html>
