@foreach($carouselCategories as $cC)
    <div
        class="blog-grid-carousel-section section bg-gray pt-40 pt-lg-30 pt-md-20 pt-sm-10 pt-xs-0  pb-5">
        <div class="container">
            <div class="blog-carousel-active row">
                @foreach($cC->content as $cContent)
                    <div class="col-lg-4 col-md-6">
                        <div class="single-blog">
                            <div class="blog-image">
                                <a href="{{ route('frontend.selectedContent',$cContent->slug) }} "><img
                                        src="{{ asset($cContent->photo) }}"
                                        alt="{{ $cContent->translate(app()->getLocale())->alt ?? '' }}">
                                </a>
                            </div>
                            <div class="blog-content">
                                <h2>
                                    <a href="{{ route('frontend.selectedContent',$cContent->slug) }} ">
                                        {{ $cContent->translate(app()->getLocale())->name ?? '' }}
                                    </a>
                                </h2>
                                <ul class="meta">
                                    <li>
                                        <i class="fa fa-clock-o"></i>{{ $cContent->created_at->format('d.m.Y')  }}
                                    </li>
                                    <li>
                                        <i class="fa fa-folder-open"></i>
                                        <a href="#">{{ $cContent->category()->first()->translate(app()->getLocale())->name ?? '' }}</a>
                                    </li>
                                </ul>
                                <p style="word-break: break-all;">{!! $cContent->translate(app()->getLocale())->short_description ?? '' !!}</p>
                                <a class="read-more-btn" href="{{ route('frontend.selectedContent',$cContent->slug) }}">
                                    @lang('backend.read-more')
                                    <i class="fa fa-chevron-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endforeach

