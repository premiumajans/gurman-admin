<meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>@yield('title')</title>
@yield('meta')
@if(array_key_exists(str_replace('frontend.', '', \Illuminate\Support\Facades\Route::currentRouteName()), $metas->toArray()))
    @foreach($metas[str_replace('frontend.','',\Illuminate\Support\Facades\Route::currentRouteName())] as $meta)
        {!! $meta->translate(app()->getLocale())->tag ?? '' !!}
    @endforeach
@endif
@if(array_key_exists('all', $metas->toArray()))
    @foreach($metas['all'] as $meta)
        {!! $meta->translate(app()->getLocale())->tag ?? '' !!}
    @endforeach
@endif
