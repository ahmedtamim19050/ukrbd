<div class="title-link-wrapper title-deals appear-animate mb-5 mt-3 d-none  d-md-block">



    <a href="{{ route('shops') }}" class="ml-0">More Categories<i class="w-icon-long-arrow-right"></i></a>
</div>
<div class="swiper mb-4">
    <div class="swiper-container swiper-theme pg-show swiper-container-initialized swiper-container-horizontal swiper-container-pointer-events"
        data-swiper-options="{
    'spaceBetween': 20,
    'slidesPerView': 2,
    'allowSlideNext':true,
    'allowSlidePrev':true,
   
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
                <div class="swiper-slide category category-classic  overlay-zoom br-xs swiper-slide-active"
                    style="" role="group"
                    onclick='updateSearchParams("{{ $param }}","{{ $category->slug }}","{{ $route }}",null,null,"_taget")'>
                    <a href="javascript:void(0)"
                        onclick='updateSearchParams("{{ $param }}","{{ $category->slug }}","{{ $route }}",null,null,"_taget")'
                        class="category-media">
                        <img src="{{ Voyager::image($category->logo) }}" alt="Category"
                            style="height: 40px !important;width:40px !important;">
                    </a>
                    <div class="category-content mt-4">
                        <h4 class="category-name text-dark">{{ $category->name }}</h4>
                        <a href="javascript:void(0)"
                            onclick='updateSearchParams("{{ $param }}","{{ $category->slug }}","{{ $route }}",null,null,"_taget")'
                            class="btn btn-warning btn-link btn-underline">Shop
                            Now</a>
                    </div>
                </div>
            @endforeach

        </div>
        <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
    </div>
    <div class="swiper-prev"><i class="fa fa-2x fa-chevron-left"></i></div>
    <div class="swiper-next"><i class="fa fa-2x fa-chevron-right"></i> </div>
</div>

<!-- End of Icon Category Wrapper -->
