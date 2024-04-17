<div class="title-link-wrapper title-deals appear-animate mb-4">
    <h2 class="title title-link">Categories</h2>
    <div class="product-countdown-container font-size-sm text-white  align-items-center mr-auto">

    </div>
    <a href="#" class="ml-0">More Categories<i class="w-icon-long-arrow-right"></i></a>
</div>
<div class="swiper-container swiper-theme shadow-swiper icon-category-wrapper appear-animate mb-10 pb-2"
    data-swiper-options="{
    'spaceBetween': 20,
    'slidesPerView': 2,
    'breakpoints': {
        '480': {
            'slidesPerView': 3
        },
        '768': {
            'slidesPerView': 5
        },
        '992': {
            'slidesPerView': 6
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
                'slidesPerView': 3
            },
            '768': {
                'slidesPerView': 5
            },
            '992': {
                'slidesPerView': 6
            }
        }
    }">
            <div class="swiper-wrapper " id="swiper-wrapper-a7e603fb2e00d5310" aria-live="polite"
                style="transform: translate3d(0px, 0px, 0px); transition-duration: 0ms;">
                @foreach ($categories as $category)
                    <div class="swiper-slide category category-classic category-absolute overlay-zoom br-xs swiper-slide-active"
                        role="group" aria-label="1 / 6" style="width: 190px; margin-right: 20px;">
                        <a href="shop-banner-sidebar.html" class="category-media">
                            <img src="{{ Voyager::image($category->logo) }}" alt="Category" width="130"
                                height="130">
                        </a>
                        <div class="category-content">
                            <h4 class="category-name">{{ $category->name }}</h4>
                            <a href="shop-banner-sidebar.html" class="btn btn-primary btn-link btn-underline">Shop
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
