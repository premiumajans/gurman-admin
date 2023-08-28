<div class="element-slider-section section bg-gray pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50 pb-100 pb-lg-80 pb-md-70 pb-sm-60 pb-xs-50">
    <div class="container">
        <div class="row">
            <div class="brand-slider section">
                @foreach($partners as $partner)
                    <a target="_blank" href="{{ $partner->link }}">
                        <div class="brand col"><img src="{{ asset($partner->photo) }}" alt="{{ $partner->alt }}"></div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</div>
