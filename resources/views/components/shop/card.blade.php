<div class="swiper-slide vendor-widget">
    <div class="vendor-widget-banner">
        <figure class="vendor-banner">
            <a href="/store_front/{{$shop->slug}}">
                <img src="{{Voyager::image($shop->banner)}}" alt="Vendor Banner" width="1200" height="390" style="background-color: #ECE7DF;" />
            </a>
        </figure>

        <div class="vendor-details">
            <figure class="vendor-logo" style="background-color:#dc1921">
                <a href="{{route('store_front', $shop->slug)}}">
                    <img src="{{Voyager::image($shop->logo)}}" alt="Vendor Logo" width="90" height="90" />
                </a>
            </figure>
            <div class="vendor-personal">
                <h4 class="vendor-name">
                    <a href="/store_front/{{$shop->slug}}">{{$shop->name}}</a>
                </h4>
                <span class="vendor-product-count">{{$shop->products->count()}} Products</span>
            </div>
        </div>
    </div>
    <!-- End of Vendor Widget Banner -->
</div>