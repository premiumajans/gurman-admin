@extends('master.frontend')
@section('title',__('title.about'))
@section('front')
    @foreach($abouts as $about)
        <div class="video-section section ">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="video-left-img">
                            <img style='height:400px' class="w-100" src="{{asset($about->photo)}}"
                                 alt="{{$about->translate(app()->getLocale())->alt ?? __('backend.translation-not-found')}}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div
            class="mission-section section pt-95 pt-lg-75 pt-md-65 pt-sm-55 pt-xs-45 pb-70 pb-lg-40 pb-md-35 pb-sm-60 pb-xs-50">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="philosophy-area">
                            <div class="section-title text-left">
                                <h1>{{ $about->translate(app()->getLocale())->title ?? __('backend.translation-not-found') }}</h1>
                            </div>
                            {!! $about->translate(app()->getLocale())->description ?? __('backend.translation-not-found') !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
