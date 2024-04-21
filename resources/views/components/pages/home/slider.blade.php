<div class="intro-wrapper">
    <div class="row">
        <div class="col-md-12">
            <div class="swiper-container swiper-theme animation-slider pg-inner"
                data-swiper-options="{
                'slidesPerView': 1,
                'autoplay': {
                    'delay': 8000,
                    'disableOnInteraction': false
                }
            }">
                <div class="swiper-wrapper row gutter-no cols-1">
                    @foreach ($sliders as $slider)
                        <a href="{{ $slider->url }}" target="_blank"
                            class="swiper-slide intro-slide intro-slide2 banner banner-fixed br-sm"
                            style="background-image: url({{ Voyager::image($slider->image) }}); background-color: #EBEDEC;">

                        </a>
                    @endforeach
                </div>

                <div class="swiper-pagination"></div>
            </div>
        </div>

    </div>
</div>
