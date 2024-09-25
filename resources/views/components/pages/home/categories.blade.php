<div class="title-link-wrapper title-deals appear-animate mb-5 mt-3 d-none  d-md-block">



    <a href="{{ route('shops') }}" class="ml-0">More Categories<i class="w-icon-long-arrow-right"></i></a>
</div>
<div class="swiper-container swiper-theme shadow-swiper icon-category-wrapper appear-animate mb-10 pb-2 d-none  d-md-block"
    data-swiper-options="{
    'spaceBetween': 10,
    'slidesPerView': 2,
    'breakpoints': {
        '480': {
            'slidesPerView': 4
        },
        '768': {
            'slidesPerView': 6
        },
        '992': {
            'slidesPerView': 8
        },
        '1200': {
            'slidesPerView': 8
        }
    }
}">
    <div class="swiper">
        <div class="swiper-container swiper-theme pg-show swiper-container-initialized swiper-container-horizontal swiper-container-pointer-events"
            data-swiper-options="{
        'spaceBetween': 20,
        'slidesPerView': 2,
        'breakpoints': {
            '576': {
                'slidesPerView': 5
            },
            '768': {
                'slidesPerView': 8
            },
            '992': {
                'slidesPerView': 8
            }
        }
    }">
            <div class="swiper-wrapper " id="swiper-wrapper-a7e603fb2e00d5310" aria-live="polite"
                style="transform: translate3d(0px, 0px, 0px); transition-duration: 0ms;">
                @foreach ($categories as $category)
                    <div class="swiper-slide category category-classic category-absolute overlay-zoom br-xs swiper-slide-active"
                        role="group" aria-label="1 / 6" style="width: 190px; margin-right: 20px; height: 140px;">
                        <a href="javascript:void(0)"
                            onclick='updateSearchParams("{{ $param }}","{{ $category->slug }}","{{ $route }}")'
                            class="category-media">
                            <img src="{{ Voyager::image($category->logo) }}" alt="Category" width="130"
                                height="130">
                        </a>
                        <div class="category-content">
                            <h4 class="category-name text-dark">{{ $category->name }}</h4>
                            <a href="javascript:void(0)"
                                onclick='updateSearchParams("category","{{ $category->slug }}","{{ $route }}")'
                                class="btn btn-warning btn-link btn-underline">Shop
                                Now</a>
                        </div>
                    </div>
                @endforeach

            </div>
            <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
        </div>
    </div>
    <div class="swiper-pagination"></div>
</div>
<!-- End of Icon Category Wrapper -->
