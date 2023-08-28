<div style='padding:0 15px' class="order-lg-2 order-1">
    <div class="faq-detail mb-sm-60 mb-xs-50">
        <div class="content">
            <div class="row">
                <div class="col-12">
                    <div class="what-is-included mt-3">
                        <div class="faq-accordion yellow-color">
                            <div id="accordion">
                                @foreach($faqs as $faqKey => $faq)
                                    <div class="card @if($loop->first) actives @endif">
                                        <div class="card-header" id="heading{{ $faqKey }}">
                                            <h5 class="mb-0">
                                                <a class="" data-toggle="collapse" data-target="#collapse{{ $faqKey }}"
                                                   aria-expanded="true" aria-controls="collapse{{ $faqKey }}">
                                                    {{ $faq->translate(app()->getLocale())->name ?? __('backend.translation-not-found') }}
                                                </a>
                                            </h5>
                                        </div>
                                        <div id="collapse{{ $faqKey }}" class="collapse @if($loop->first) show @endif"
                                             aria-labelledby="heading{{ $faqKey }}" data-parent="#accordion">
                                            <div class="card-body">
                                                {!! $faq->translate(app()->getLocale())->description ?? __('backend.translation-not-found') !!}
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
