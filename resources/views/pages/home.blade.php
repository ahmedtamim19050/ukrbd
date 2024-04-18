<x-app>
    <x-slot name="css">
        <!-- Vendor CSS -->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/fontawesome-free/css/all.min.css') }}">
        <!-- Plugins CSS -->
        <link rel="stylesheet" href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/animate/animate.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/magnific-popup/magnific-popup.min.css') }}">

        <!-- Default CSS -->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/demo5.min.css') }}">
    </x-slot>


    <div class="container">
        <!-- Slider section -->
        <x-pages.home.slider />
        <!-- End of slider section -->

        <!-- Features section -->
        <x-pages.home.features />
        <!-- End of features section -->

        @if (false)
            <!-- Daily deals section -->
            <x-pages.home.dailydeals offerEndAt="+10d" />
            <!-- End of daily deals section -->
        @endif


        <x-pages.home.productrow title="Trending Product" :products="$latest_products" url="" />
        <!-- End of Prodcut Deals Wrapper -->
        <x-pages.home.categories :categories="$prodcats" />

        @if (false)
            <x-pages.home.categorybanners />
        @endif
        <!-- End of Category Banner Wrapper -->

        <div class="title-link-wrapper mb-4 appear-animate">
            <h2 class="title title-link title-vendor pt-2 pb-2">Top Weekly Vendors</h2>
        </div>
        <div class="swiper">
            <div class="swiper-container shadow-swiper swiper-theme vendor-wrapper appear-animate mb-10 pb-1"
                data-swiper-options="{
                'spaceBetween': 20,
                'slidesPerView': 1,
                'breakpoints': {
                    '576': {
                        'slidesPerView': 2
                    },
                    '768': {
                        'slidesPerView': 3
                    },
                    '992': {
                        'slidesPerView': 4
                    }
                }
            }">
                <div class="swiper-wrapper row cols-xl-4 cols-md-3 cols-sm-2 cols-1">
                    @foreach ($latest_shops as $shop)
                        <x-shop.card :shop="$shop" />
                    @endforeach

                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
        <!-- End of Swiper Container -->
    </div>
    <!-- End of Container -->

    {{-- <section class="grey-section appear-animate pt-10 pb-10">
        <div class="container mb-2">
            <div class="title-link-wrapper mb-4">
                <h2 class="title title-link">Featured Products</h2>
                <a href="#">More Products<i class="w-icon-long-arrow-right"></i></a>
            </div>
            <div class="row grid grid-type">
                <div class="grid-item grid-item-single">
                    <div class="product product-single">
                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <div class="product-gallery mb-0">
                                    <figure class="product-image">
                                        <img src="assets/images/demos/demo5/products/2-1.jpg"
                                            data-zoom-image="assets/images/demos/demo5/products/2-1.jpg"
                                            alt="Product Image" width="800" height="900">
                                    </figure>
                                </div>
                            </div>
                            <div class="col-md-6 pr-md-4 mt-4 mt-md-0">
                                <div class="product-details scrollable pl-0">
                                    <h2 class="product-title mb-1"><a href="product-default.html">Men's Season
                                            Blue Clothes</a></h2>

                                    <hr class="product-divider">

                                    <div class="product-price mb-2"><ins class="new-price ls-50">$150.00 -
                                            $180.00</ins></div>

                                    <div class="ratings-container mb-4">
                                        <div class="ratings-full">
                                            <span class="ratings" style="width: 80%;"></span>
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                        <a href="#" class="rating-reviews">(3 Reviews)</a>
                                    </div>

                                    <div class="product-form product-variation-form product-size-swatch mb-3">
                                        <label class="mb-1">Size:</label>
                                        <div class="flex-wrap d-flex align-items-center product-variations">
                                            <a href="#" class="size">Small</a>
                                            <a href="#" class="size">Medium</a>
                                            <a href="#" class="size">Large</a>
                                            <a href="#" class="size">Extra Large</a>
                                        </div>
                                        <a href="#" class="product-variation-clean">Clean All</a>
                                    </div>

                                    <div class="product-variation-price">
                                        <span></span>
                                    </div>

                                    <div class="product-form pt-4">
                                        <div class="product-qty-form mb-2 mr-2">
                                            <div class="input-group">
                                                <input class="quantity form-control" type="number" min="1"
                                                    max="10000000">
                                                <button class="quantity-plus w-icon-plus"></button>
                                                <button class="quantity-minus w-icon-minus"></button>
                                            </div>
                                        </div>
                                        <button class="btn btn-primary btn-cart">
                                            <i class="w-icon-cart"></i>
                                            <span>Add to Cart</span>
                                        </button>
                                    </div>

                                    <div class="social-links-wrapper mt-1">
                                        <div class="social-links">
                                            <div class="social-icons social-no-color border-thin">
                                                <a href="#" class="social-icon social-facebook w-icon-facebook"></a>
                                                <a href="#" class="social-icon social-twitter w-icon-twitter"></a>
                                                <a href="#"
                                                    class="social-icon social-pinterest fab fa-pinterest-p"></a>
                                                <a href="#" class="social-icon social-whatsapp fab fa-whatsapp"></a>
                                            </div>
                                        </div>
                                        <span class="divider d-xs-show"></span>
                                        <div class="product-link-wrapper d-flex">
                                            <a href="#"
                                                class="btn-product-icon btn-wishlist w-icon-heart"><span></span></a>
                                            <a href="#"
                                                class="btn-product-icon btn-compare btn-icon-left w-icon-compare"><span></span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End of Grid Item -->
                <div class="grid-item grid-item-widget">
                    <div class="product product-widget">
                        <figure class="product-media">
                            <a href="product-default.html">
                                <img src="assets/images/demos/demo5/products/2-2.jpg" alt="Product" width="300"
                                    height="338">
                            </a>
                        </figure>
                        <div class="product-details">
                            <h4 class="product-name">
                                <a href="product-default.html">Top Rating Helmet</a>
                            </h4>
                            <div class="ratings-container">
                                <div class="ratings-full">
                                    <span class="ratings" style="width: 80%;"></span>
                                    <span class="tooltiptext tooltip-top"></span>
                                </div>
                            </div>
                            <div class="product-price">
                                <ins class="new-price">$34.99</ins>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End of Grid Item -->
                <div class="grid-item grid-item-widget">
                    <div class="product product-widget">
                        <figure class="product-media">
                            <a href="product-default.html">
                                <img src="assets/images/demos/demo5/products/2-3.jpg" alt="Product" width="300"
                                    height="338">
                            </a>
                        </figure>
                        <div class="product-details">
                            <h4 class="product-name">
                                <a href="product-default.html">Smartphone Electronic Charger</a>
                            </h4>
                            <div class="ratings-container">
                                <div class="ratings-full">
                                    <span class="ratings" style="width: 80%;"></span>
                                    <span class="tooltiptext tooltip-top"></span>
                                </div>
                            </div>
                            <div class="product-price">
                                <ins class="new-price">$35.00</ins>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End of Grid Item -->
                <div class="grid-item grid-item-widget">
                    <div class="product product-widget">
                        <figure class="product-media">
                            <a href="product-default.html">
                                <img src="assets/images/demos/demo5/products/2-4.jpg" alt="Product" width="300"
                                    height="338">
                            </a>
                        </figure>
                        <div class="product-details">
                            <h4 class="product-name">
                                <a href="product-default.html">Skate Pan</a>
                            </h4>
                            <div class="ratings-container">
                                <div class="ratings-full">
                                    <span class="ratings" style="width: 80%;"></span>
                                    <span class="tooltiptext tooltip-top"></span>
                                </div>
                            </div>
                            <div class="product-price">
                                <ins class="new-price">$50.99</ins>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End of Grid Item -->
                <div class="grid-item grid-item-widget">
                    <div class="product product-widget">
                        <figure class="product-media">
                            <a href="product-default.html">
                                <img src="assets/images/demos/demo5/products/2-5.jpg" alt="Product" width="300"
                                    height="338">
                            </a>
                        </figure>
                        <div class="product-details">
                            <h4 class="product-name">
                                <a href="product-default.html">Blue Ski Boots</a>
                            </h4>
                            <div class="ratings-container">
                                <div class="ratings-full">
                                    <span class="ratings" style="width: 100%;"></span>
                                    <span class="tooltiptext tooltip-top"></span>
                                </div>
                            </div>
                            <div class="product-price">
                                <ins class="new-price">$88.00</ins>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End of Grid Item -->
                <div class="grid-item grid-item-widget">
                    <div class="product product-widget">
                        <figure class="product-media">
                            <a href="product-default.html">
                                <img src="assets/images/demos/demo5/products/2-6.jpg" alt="Product" width="300"
                                    height="338">
                            </a>
                        </figure>
                        <div class="product-details">
                            <h4 class="product-name">
                                <a href="product-default.html">Dumbells</a>
                            </h4>
                            <div class="ratings-container">
                                <div class="ratings-full">
                                    <span class="ratings" style="width: 100%;"></span>
                                    <span class="tooltiptext tooltip-top"></span>
                                </div>
                            </div>
                            <div class="product-price">
                                <ins class="new-price">$59.00</ins>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End of Grid Item -->
                <div class="grid-item grid-item-widget">
                    <div class="product product-widget">
                        <figure class="product-media">
                            <a href="product-default.html">
                                <img src="assets/images/demos/demo5/products/2-7.jpg" alt="Product" width="300"
                                    height="338">
                            </a>
                        </figure>
                        <div class="product-details">
                            <h4 class="product-name">
                                <a href="product-default.html">Professional Perfect Camera</a>
                            </h4>
                            <div class="ratings-container">
                                <div class="ratings-full">
                                    <span class="ratings" style="width: 100%;"></span>
                                    <span class="tooltiptext tooltip-top"></span>
                                </div>
                            </div>
                            <div class="product-price">
                                <ins class="new-price">$123.00</ins>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End of Grid Item -->
                <div class="grid-item grid-item-widget">
                    <div class="product product-widget">
                        <figure class="product-media">
                            <a href="product-default.html">
                                <img src="assets/images/demos/demo5/products/2-8.jpg" alt="Product" width="300"
                                    height="338">
                            </a>
                        </figure>
                        <div class="product-details">
                            <h4 class="product-name">
                                <a href="product-default.html">Soft Sound Marker</a>
                            </h4>
                            <div class="ratings-container">
                                <div class="ratings-full">
                                    <span class="ratings" style="width: 100%;"></span>
                                    <span class="tooltiptext tooltip-top"></span>
                                </div>
                            </div>
                            <div class="product-price">
                                <ins class="new-price">$39.99</ins>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End of Grid Item -->
                <div class="grid-item grid-item-widget">
                    <div class="product product-widget">
                        <figure class="product-media">
                            <a href="product-default.html">
                                <img src="assets/images/demos/demo5/products/2-9.jpg" alt="Product" width="300"
                                    height="338">
                            </a>
                        </figure>
                        <div class="product-details">
                            <h4 class="product-name">
                                <a href="product-default.html">Roller Skates</a>
                            </h4>
                            <div class="ratings-container">
                                <div class="ratings-full">
                                    <span class="ratings" style="width: 100%;"></span>
                                    <span class="tooltiptext tooltip-top"></span>
                                </div>
                            </div>
                            <div class="product-price">
                                <ins class="new-price">$66.99</ins>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End of Grid Item -->
            </div>
        </div>
    </section> --}}
    <!-- End of Grey Section -->

    <div class="container mt-10 pt-2">
        <div class="banner banner-simple appear-animate br-sm mb-10"
            style="background-image: url(assets/images/demos/demo5/banners/1.jpg);
            background-color: #414548;">
            <div class="banner-content align-items-center">
                <div class="banner-price-info">
                    <div class="discount text-secondary font-weight-bolder ls-25 lh-1">
                        40<sup class="font-weight-bold p-relative">%</sup>
                        <sub class="font-weight-bold text-uppercase p-relative ls-normal">Off</sub>
                    </div>
                    <p class="text-white font-weight-bolder text-capitalize mb-0 ls-10">2021 Collection</p>
                </div>
                <hr class="divider bg-white">
                <div class="banner-info mb-0">
                    <h3 class="banner-title text-white font-weight-normal ls-25">
                        We are the Leading<br>
                        <strong>Ski Tool Saler in US</strong>
                    </h3>
                    <a href="shop-banner-sidebar.html" class="btn btn-primary btn-link btn-underline btn-icon-right">
                        Discover Now<i class="w-icon-long-arrow-right"></i></a>
                </div>
            </div>
            <figure class="skrollable">
                <img src="assets/images/demos/demo5/banners/ski.png" alt="Banner"
                    data-bottom-top="transform: translateY(5vh);" data-top-bottom="transform: translateY(-5vh);">
            </figure>
        </div>
        <!-- End of Banner Simple -->

        <div class="title-link-wrapper appear-animate mb-4">
            <h2 class="title title-link pt-1">Apparels &amp; Clothings</h2>
            <a href="shop-boxed-banner.html">More Products<i class="w-icon-long-arrow-right"></i></a>
        </div>
        <div class="swiper-container swiper-theme products-apparel appear-animate mb-7"
            data-swiper-options="{
            'spaceBetween': 20,
            'slidesPerView': 2,
            'breakpoints': {
                '576': {
                    'slidesPerView': 3
                },
                '768': {
                    'slidesPerView': 4
                },
                '992': {
                    'slidesPerView': 5
                }
            }
        }">
            <div class="swiper-wrapper row cols-lg-5 cols-md-4 cols-sm-3 cols-2">
                @foreach ($featuredproducts as $product)
                    <x-products.card :product="$product" />
                @endforeach

                <!-- End of Product Wrap -->
            </div>
            <div class="swiper-pagination"></div>
        </div>
        <div class="title-link-wrapper appear-animate mb-4">
            <h2 class="title title-link pt-1">Apparels &amp; Clothings</h2>
            <a href="shop-boxed-banner.html">More Products<i class="w-icon-long-arrow-right"></i></a>
        </div>
        <div class="swiper-container swiper-theme products-apparel appear-animate mb-7"
            data-swiper-options="{
            'spaceBetween': 20,
            'slidesPerView': 2,
            'breakpoints': {
                '576': {
                    'slidesPerView': 3
                },
                '768': {
                    'slidesPerView': 4
                },
                '992': {
                    'slidesPerView': 5
                }
            }
        }">
            <div class="swiper-wrapper row cols-lg-5 cols-md-4 cols-sm-3 cols-2">

                <div class="swiper-slide product-wrap">
                    <div class="product text-center">
                        <figure class="product-media">
                            <a href="product-default.html">
                                <img src="assets/images/demos/demo5/products/3-1-1.jpg" alt="Product" width="300"
                                    height="338">
                                <img src="assets/images/demos/demo5/products/3-1-2.jpg" alt="Product" width="300"
                                    height="338">
                            </a>
                            <div class="product-action-vertical">
                                <a href="#" class="btn-product-icon btn-cart w-icon-cart" title="Add to cart"></a>
                                <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                    title="Add to wishlist"></a>
                                <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                    title="Quickview"></a>
                                <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                    title="Add to Compare"></a>
                            </div>
                        </figure>
                        <div class="product-details">
                            <h4 class="product-name"><a href="product-default.html">Multi Function Watch</a>
                            </h4>
                            <div class="ratings-container">
                                <div class="ratings-full">
                                    <span class="ratings" style="width: 80%;"></span>
                                    <span class="tooltiptext tooltip-top"></span>
                                </div>
                                <a href="product-default.html" class="rating-reviews">(1 Reviews)</a>
                            </div>
                            <div class="product-price">
                                <ins class="new-price">$170.00</ins>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End of Product Wrap -->
                <div class="swiper-slide product-wrap">
                    <div class="product text-center">
                        <figure class="product-media">
                            <a href="product-default.html">
                                <img src="assets/images/demos/demo5/products/3-2.jpg" alt="Product" width="300"
                                    height="338">
                            </a>
                            <div class="product-action-vertical">
                                <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                    title="Add to cart"></a>
                                <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                    title="Add to wishlist"></a>
                                <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                    title="Quickview"></a>
                                <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                    title="Add to Compare"></a>
                            </div>
                        </figure>
                        <div class="product-details">
                            <h4 class="product-name"><a href="product-default.html">Men's Suede Belt</a></h4>
                            <div class="ratings-container">
                                <div class="ratings-full">
                                    <span class="ratings" style="width: 60%;"></span>
                                    <span class="tooltiptext tooltip-top"></span>
                                </div>
                                <a href="product-default.html" class="rating-reviews">(1 Reviews)</a>
                            </div>
                            <div class="product-price">
                                <ins class="new-price">$39.00</ins>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End of Product Wrap -->
                <div class="swiper-slide product-wrap">
                    <div class="product text-center">
                        <figure class="product-media">
                            <a href="product-default.html">
                                <img src="assets/images/demos/demo5/products/3-3.jpg" alt="Product" width="300"
                                    height="338">
                            </a>
                            <div class="product-action-vertical">
                                <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                    title="Add to cart"></a>
                                <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                    title="Add to wishlist"></a>
                                <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                    title="Quickview"></a>
                                <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                    title="Add to Compare"></a>
                            </div>
                        </figure>
                        <div class="product-details">
                            <h4 class="product-name"><a href="product-default.html">Gold Watch</a></h4>
                            <div class="ratings-container">
                                <div class="ratings-full">
                                    <span class="ratings" style="width: 100%;"></span>
                                    <span class="tooltiptext tooltip-top"></span>
                                </div>
                                <a href="product-default.html" class="rating-reviews">(5 Reviews)</a>
                            </div>
                            <div class="product-price">
                                <ins class="new-price">$210.00</ins>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End of Product Wrap -->
                <div class="swiper-slide product-wrap">
                    <div class="product text-center">
                        <figure class="product-media">
                            <a href="product-default.html">
                                <img src="assets/images/demos/demo5/products/3-4-1.jpg" alt="Product" width="300"
                                    height="338">
                                <img src="assets/images/demos/demo5/products/3-4-2.jpg" alt="Product" width="300"
                                    height="338">
                            </a>
                            <div class="product-action-vertical">
                                <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                    title="Add to cart"></a>
                                <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                    title="Add to wishlist"></a>
                                <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                    title="Quickview"></a>
                                <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                    title="Add to Compare"></a>
                            </div>
                        </figure>
                        <div class="product-details">
                            <h4 class="product-name"><a href="product-default.html">Portable Charger</a></h4>
                            <div class="ratings-container">
                                <div class="ratings-full">
                                    <span class="ratings" style="width: 100%;"></span>
                                    <span class="tooltiptext tooltip-top"></span>
                                </div>
                                <a href="product-default.html" class="rating-reviews">(8 Reviews)</a>
                            </div>
                            <div class="product-price">
                                <ins class="new-price">$25.00</ins>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End of Product Wrap -->
                <div class="swiper-slide product-wrap">
                    <div class="product text-center">
                        <figure class="product-media">
                            <a href="product-default.html">
                                <img src="assets/images/demos/demo5/products/3-5.jpg" alt="Product" width="300"
                                    height="338">
                            </a>
                            <div class="product-action-vertical">
                                <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                    title="Add to cart"></a>
                                <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                    title="Add to wishlist"></a>
                                <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                    title="Quickview"></a>
                                <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                    title="Add to Compare"></a>
                            </div>
                        </figure>
                        <div class="product-details">
                            <h4 class="product-name"><a href="product-default.html">Headkerchief</a></h4>
                            <div class="ratings-container">
                                <div class="ratings-full">
                                    <span class="ratings" style="width: 80%;"></span>
                                    <span class="tooltiptext tooltip-top"></span>
                                </div>
                                <a href="product-default.html" class="rating-reviews">(4 Reviews)</a>
                            </div>
                            <div class="product-price">
                                <ins class="new-price">$28.99</ins>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End of Product Wrap -->
            </div>
            <div class="swiper-pagination"></div>
        </div>
        <!-- End of Prodcut Wrapper -->

        <div class="row grid grid-float appear-animate">
            <div class="col-lg-6 grid-item height-x2 grid-item-lg">
                <div class="banner banner-fixed br-sm">
                    <figure>
                        <img src="assets/images/demos/demo5/banners/2-1.jpg" alt="Banner" width="680"
                            height="420" style="background-color: #242529;" />
                    </figure>
                    <div class="banner-content text-center x-50 w-100 pl-4 pr-4">
                        <h5 class="banner-subtitle text-uppercase text-secondary font-weight-bold ls-25 mb-1">
                            From Samsung</h5>
                        <h3 class="banner-title text-capitalize text-white mb-0">Introducing Galaxy Note 10
                        </h3>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 grid-item height-x1 grid-item-md">
                <div class="banner banner-fixed br-sm">
                    <figure>
                        <img src="assets/images/demos/demo5/banners/2-2.jpg" alt="Banner" width="680"
                            height="200" style="background-color: #EEEEF0;" />
                    </figure>
                    <div class="banner-content y-50">
                        <h5 class="banner-subtitle font-weight-normal text-uppercase mb-0">New Arrivals</h5>
                        <h3 class="banner-title text-capitalize ls-25">Gymnastic Apparatus</h3>
                        <div class="banner-price-info text-default font-weight-normal">
                            Up to <strong class="text-primary text-uppercase">25% Off</strong>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 grid-item height-x1 grid-item-sm">
                <div class="banner banner-fixed br-sm">
                    <figure>
                        <img src="assets/images/demos/demo5/banners/2-3.jpg" alt="Banner" width="330"
                            height="200" style="background-color: #519DD9;" />
                    </figure>
                    <div class="banner-content text-center x-50 y-50 w-100">
                        <h3 class="banner-title text-white text-uppercase mb-1 font-weight-bolder">Hey!</h3>
                        <p class="text-white mb-0">Spend $60 and get Free US main-land delivery</p>
                        <p class="text-white mb-0">(Order under $60 only /$4.75)</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 grid-item height-x1 grid-item-sm">
                <div class="banner banner-fixed br-sm">
                    <figure>
                        <img src="assets/images/demos/demo5/banners/2-4.jpg" alt="Banner" width="330"
                            height="200" style="background-color: #5F5657;" />
                    </figure>
                    <div class="banner-content y-50">
                        <h3 class="banner-title text-white text-capitalize ls-25">Men's<br>Accessories</h3>
                        <del class="old-price text-white">$499.99</del>
                        <div class="new-price text-secondary ls-25">$299.99</div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End of Grid -->

        <div class="title-link-wrapper appear-animate mt-10 mb-4">
            <h2 class="title title-link pt-1">Consumer Electronics</h2>
            <a href="#" class="ls-normal">More Products<i class="w-icon-long-arrow-right"></i></a>
        </div>
        <div class="swiper-container swiper-theme appear-animate mb-9"
            data-swiper-options="{
            'spaceBetween': 20,
            'slidesPerView': 2,
            'breakpoints': {
                '576': {
                    'slidesPerView': 3
                },
                '768': {
                    'slidesPerView': 4
                },
                '992': {
                    'slidesPerView': 5
                }
            }
        }">
            <div class="swiper-wrapper row cols-lg-5 cols-md-4 cols-sm-3 cols-2">

                <div class="swiper-slide product-wrap">
                    <div class="product text-center">
                        <figure class="product-media">
                            <a href="product-default.html">
                                <img src="assets/images/demos/demo5/products/4-1-1.jpg" alt="Product" width="300"
                                    height="338">
                                <img src="assets/images/demos/demo5/products/4-1-2.jpg" alt="Product" width="300"
                                    height="338">
                            </a>
                            <div class="product-action-vertical">
                                <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                    title="Add to cart"></a>
                                <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                    title="Add to wishlist"></a>
                                <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                    title="Quickview"></a>
                                <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                    title="Add to Compare"></a>
                            </div>
                        </figure>
                        <div class="product-details">
                            <h4 class="product-name"><a href="product-default.html">Red Cap Sound Marker</a>
                            </h4>
                            <div class="ratings-container">
                                <div class="ratings-full">
                                    <span class="ratings" style="width: 80%;"></span>
                                    <span class="tooltiptext tooltip-top"></span>
                                </div>
                                <a href="product-default.html" class="rating-reviews">(1 Reviews)</a>
                            </div>
                            <div class="product-price">
                                <ins class="new-price">$65.89 - $69.99</ins>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End of Product Wrap -->
                <div class="swiper-slide product-wrap">
                    <div class="product text-center">
                        <figure class="product-media">
                            <a href="product-default.html">
                                <img src="assets/images/demos/demo5/products/4-2.jpg" alt="Product" width="300"
                                    height="338">
                            </a>
                            <div class="product-action-vertical">
                                <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                    title="Add to cart"></a>
                                <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                    title="Add to wishlist"></a>
                                <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                    title="Quickview"></a>
                                <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                    title="Add to Compare"></a>
                            </div>
                        </figure>
                        <div class="product-details">
                            <h4 class="product-name"><a href="product-default.html">Men's Black Watch</a></h4>
                            <div class="ratings-container">
                                <div class="ratings-full">
                                    <span class="ratings" style="width: 60%;"></span>
                                    <span class="tooltiptext tooltip-top"></span>
                                </div>
                                <a href="product-default.html" class="rating-reviews">(1 Reviews)</a>
                            </div>
                            <div class="product-price">
                                <ins class="new-price">$75.00</ins><del class="old-price">$79.00</del>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End of Product Wrap -->
                <div class="swiper-slide product-wrap">
                    <div class="product text-center">
                        <figure class="product-media">
                            <a href="product-default.html">
                                <img src="assets/images/demos/demo5/products/4-3.jpg" alt="Product" width="300"
                                    height="338">
                            </a>
                            <div class="product-action-vertical">
                                <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                    title="Add to cart"></a>
                                <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                    title="Add to wishlist"></a>
                                <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                    title="Quickview"></a>
                                <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                    title="Add to Compare"></a>
                            </div>
                        </figure>
                        <div class="product-details">
                            <h4 class="product-name"><a href="product-default.html">Fabulous Sound Speaker</a>
                            </h4>
                            <div class="ratings-container">
                                <div class="ratings-full">
                                    <span class="ratings" style="width: 100%;"></span>
                                    <span class="tooltiptext tooltip-top"></span>
                                </div>
                                <a href="product-default.html" class="rating-reviews">(5 Reviews)</a>
                            </div>
                            <div class="product-price">
                                <ins class="new-price">$62.00</ins>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End of Product Wrap -->
                <div class="swiper-slide product-wrap">
                    <div class="product text-center">
                        <figure class="product-media">
                            <a href="product-default.html">
                                <img src="assets/images/demos/demo5/products/4-4-1.jpg" alt="Product" width="300"
                                    height="338">
                                <img src="assets/images/demos/demo5/products/4-4-2.jpg" alt="Product" width="300"
                                    height="338">
                            </a>
                            <div class="product-action-vertical">
                                <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                    title="Add to cart"></a>
                                <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                    title="Add to wishlist"></a>
                                <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                    title="Quickview"></a>
                                <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                    title="Add to Compare"></a>
                            </div>
                        </figure>
                        <div class="product-details">
                            <h4 class="product-name"><a href="product-default.html">Mini Wireless Earphone</a>
                            </h4>
                            <div class="ratings-container">
                                <div class="ratings-full">
                                    <span class="ratings" style="width: 100%;"></span>
                                    <span class="tooltiptext tooltip-top"></span>
                                </div>
                                <a href="product-default.html" class="rating-reviews">(8 Reviews)</a>
                            </div>
                            <div class="product-price">
                                <ins class="new-price">$49.99</ins>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End of Product Wrap -->
                <div class="swiper-slide product-wrap">
                    <div class="product text-center">
                        <figure class="product-media">
                            <a href="product-default.html">
                                <img src="assets/images/demos/demo5/products/4-5.jpg" alt="Product" width="300"
                                    height="338">
                            </a>
                            <div class="product-action-vertical">
                                <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                    title="Add to cart"></a>
                                <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                    title="Add to wishlist"></a>
                                <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                    title="Quickview"></a>
                                <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                    title="Add to Compare"></a>
                            </div>
                        </figure>
                        <div class="product-details">
                            <h4 class="product-name"><a href="product-default.html">Good-Performance
                                    Humidifier</a>
                            </h4>
                            <div class="ratings-container">
                                <div class="ratings-full">
                                    <span class="ratings" style="width: 80%;"></span>
                                    <span class="tooltiptext tooltip-top"></span>
                                </div>
                                <a href="product-default.html" class="rating-reviews">(4 Reviews)</a>
                            </div>
                            <div class="product-price">
                                <ins class="new-price">$79.00</ins>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End of Product Wrap -->
            </div>
            <div class="swiper-pagination"></div>
        </div>
        <!-- End of Products -->

        <h2 class="title text-left title-client  mb-5 appear-animate">Our Clients</h2>
        <div class="swiper-container swiper-theme  brands-wrapper br-sm mb-10 appear-animate"
            data-swiper-options="{
            'autoplay': false,
            'autoplayTimeout': 4000,
            'loop': true,
            'spaceBetween': 20,
            'slidesPerView': 2,
            'breakpoints': {
                '576': {
                    'slidesPerView': 3
                },
                '768': {
                    'slidesPerView': 4
                },
                '992': {
                    'slidesPerView': 6
                },
                '1200': {
                    'slidesPerView': 8
                }
            }
        }">
            <div class="swiper-wrapper row cols-xl-8 cols-lg-6 cols-md-4 cols-sm-3 cols-2">

                <div class="swiper-slide">
                    <figure>
                        <img src="assets/images/demos/demo5/brands/1.png" alt="Brand" width="310"
                            height="180" />
                    </figure>
                </div>
                <div class="swiper-slide">
                    <figure>
                        <img src="assets/images/demos/demo5/brands/2.png" alt="Brand" width="310"
                            height="180" />
                    </figure>
                </div>
                <div class="swiper-slide">
                    <figure>
                        <img src="assets/images/demos/demo5/brands/3.png" alt="Brand" width="310"
                            height="180" />
                    </figure>
                </div>
                <div class="swiper-slide">
                    <figure>
                        <img src="assets/images/demos/demo5/brands/4.png" alt="Brand" width="310"
                            height="180" />
                    </figure>
                </div>
                <div class="swiper-slide">
                    <figure>
                        <img src="assets/images/demos/demo5/brands/5.png" alt="Brand" width="310"
                            height="180" />
                    </figure>
                </div>
                <div class="swiper-slide">
                    <figure>
                        <img src="assets/images/demos/demo5/brands/6.png" alt="Brand" width="310"
                            height="180" />
                    </figure>
                </div>
                <div class="swiper-slide">
                    <figure>
                        <img src="assets/images/demos/demo5/brands/7.png" alt="Brand" width="310"
                            height="180" />
                    </figure>
                </div>
                <div class="swiper-slide">
                    <figure>
                        <img src="assets/images/demos/demo5/brands/8.png" alt="Brand" width="310"
                            height="180" />
                    </figure>
                </div>
            </div>
        </div>
        <!-- End of Brands Wrapper -->

        <div class="title-link-wrapper appear-animate mb-4">
            <h2 class="title title-link title-blog">From Our Blog</h2>
            <a href="blog-listing.html" class="font-weight-bold font-size-normal ls-normal">View All
                Articles</a>
        </div>
        <div class="swiper-container swiper-theme post-wrapper appear-animate mb-3"
            data-swiper-options="{
            'slidesPerView': 4,
            'spaceBetween': 20,
            'slidesPerView': 1,
            'breakpoints': {
                '576': {
                    'slidesPerView': 2
                },
                '768': {
                    'slidesPerView': 3
                },
                '992': {
                    'slidesPerView': 4
                }
            }
        }">
            <div class="swiper-wrapper row cols-lg-4 cols-md-3 cols-sm-2 cols-1">
                <div class="swiper-slide post text-center overlay-zoom">
                    <figure class="post-media br-sm">
                        <a href="post-single.html">
                            <img src="assets/images/demos/demo5/blogs/1.jpg" alt="Post" width="280"
                                height="180" style="background-color: #828896;" />
                        </a>
                    </figure>
                    <div class="post-details">
                        <div class="post-meta">
                            by <a href="#" class="post-author">John Doe</a>
                            - <a href="#" class="post-date mr-0">03.05.2021</a>
                        </div>
                        <h4 class="post-title"><a href="post-single.html">Aliquam tincidunt mauris eurisus</a>
                        </h4>
                        <a href="post-single.html" class="btn btn-link btn-dark btn-underline">Read More<i
                                class="w-icon-long-arrow-right"></i></a>
                    </div>
                </div>
                <div class="swiper-slide post text-center overlay-zoom">
                    <figure class="post-media br-sm">
                        <a href="post-single.html">
                            <img src="assets/images/demos/demo5/blogs/2.jpg" alt="Post" width="280"
                                height="180" style="background-color: #C7C7C5;" />
                        </a>
                    </figure>
                    <div class="post-details">
                        <div class="post-meta">
                            by <a href="#" class="post-author">John Doe</a>
                            - <a href="#" class="post-date mr-0">03.05.2021</a>
                        </div>
                        <h4 class="post-title"><a href="post-single.html">Cras ornare tristique elit</a></h4>
                        <a href="post-single.html" class="btn btn-link btn-dark btn-underline">Read More<i
                                class="w-icon-long-arrow-right"></i></a>
                    </div>
                </div>
                <div class="swiper-slide post text-center overlay-zoom">
                    <figure class="post-media br-sm">
                        <a href="post-single.html">
                            <img src="assets/images/demos/demo5/blogs/3.jpg" alt="Post" width="280"
                                height="180" style="background-color: #BDBDB5;" />
                        </a>
                    </figure>
                    <div class="post-details">
                        <div class="post-meta">
                            by <a href="#" class="post-author">John Doe</a>
                            - <a href="#" class="post-date mr-0">03.05.2021</a>
                        </div>
                        <h4 class="post-title"><a href="post-single.html">Vivamus vestibulum ntulla nec
                                ante</a>
                        </h4>
                        <a href="post-single.html" class="btn btn-link btn-dark btn-underline">Read More<i
                                class="w-icon-long-arrow-right"></i></a>
                    </div>
                </div>
                <div class="swiper-slide post text-center overlay-zoom">
                    <figure class="post-media br-sm">
                        <a href="post-single.html">
                            <img src="assets/images/demos/demo5/blogs/4.jpg" alt="Post" width="280"
                                height="180" style="background-color: #546B73;" />
                        </a>
                    </figure>
                    <div class="post-details">
                        <div class="post-meta">
                            by <a href="#" class="post-author">John Doe</a>
                            - <a href="#" class="post-date mr-0">03.05.2021</a>
                        </div>
                        <h4 class="post-title"><a href="post-single.html">Fusce lacinia arcuet nulla</a></h4>
                        <a href="post-single.html" class="btn btn-link btn-dark btn-underline">Read More<i
                                class="w-icon-long-arrow-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="swiper-pagination"></div>
        </div>
        <!-- Post Wrapper -->

        <div class="title-link-wrapper appear-animate mb-4">
            <h2 class="title title-link title-viewed">Recently Viewed</h2>
            <a href="shop-list.html" class="font-weight-bold font-size-normal ls-normal">
                More Products<i class="w-icon-long-arrow-right"></i></a>
        </div>
        <div class="swiper-container swiper-theme shadow-swiper appear-animate pb-4 mb-8"
            data-swiper-options="{
            'nav': false,
            'dots': true,
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
                },
                '1200': {
                    'slidesPerView': 8
                }
            }
        }">
            <div class="swiper-wrapper row cols-xl-8 cols-lg-6 cols-md-4 cols-2">
                <div class="swiper-slide product-wrap">
                    <div class="product text-center product-absolute">
                        <figure class="product-media">
                            <a href="https://www.portotheme.com/html/wolmart/product-defaproduct-default.html">
                                <img src="assets/images/demos/demo5/products/3-5.jpg" alt="Category image"
                                    width="130" height="146" style="background-color: #fff" />
                            </a>
                        </figure>
                        <h4 class="product-name">
                            <a href="product-default.html">Headkerchief</a>
                        </h4>
                    </div>
                </div>
                <!-- End of Product Wrap -->
                <div class="swiper-slide product-wrap">
                    <div class="product text-center product-absolute">
                        <figure class="product-media">
                            <a href="https://www.portotheme.com/html/wolmart/product-defaproduct-default.html">
                                <img src="assets/images/demos/demo5/products/1-1-1.jpg" alt="Category image"
                                    width="130" height="146" style="background-color: #fff" />
                            </a>
                        </figure>
                        <h4 class="product-name">
                            <a href="product-default.html">Leather Stripe Watch</a>
                        </h4>
                    </div>
                </div>
                <!-- End of Product Wrap -->
                <div class="swiper-slide product-wrap">
                    <div class="product text-center product-absolute">
                        <figure class="product-media">
                            <a href="https://www.portotheme.com/html/wolmart/product-defaproduct-default.html">
                                <img src="assets/images/demos/demo5/products/4-1-1.jpg" alt="Category image"
                                    width="130" height="146" style="background-color: #fff" />
                            </a>
                        </figure>
                        <h4 class="product-name">
                            <a href="product-default.html">Red Cap Sound Marker</a>
                        </h4>
                    </div>
                </div>
                <!-- End of Product Wrap -->
                <div class="swiper-slide product-wrap">
                    <div class="product text-center product-absolute">
                        <figure class="product-media">
                            <a href="https://www.portotheme.com/html/wolmart/product-defaproduct-default.html">
                                <img src="assets/images/demos/demo5/products/2-3.jpg" alt="Category image"
                                    width="130" height="146" style="background-color: #fff" />
                            </a>
                        </figure>
                        <h4 class="product-name">
                            <a href="product-default.html">Smartphone Electronic Charger</a>
                        </h4>
                    </div>
                </div>
                <!-- End of Product Wrap -->
                <div class="swiper-slide product-wrap">
                    <div class="product text-center product-absolute">
                        <figure class="product-media">
                            <a href="https://www.portotheme.com/html/wolmart/product-defaproduct-default.html">
                                <img src="assets/images/demos/demo5/products/2-5.jpg" alt="Category image"
                                    width="130" height="146" style="background-color: #fff" />
                            </a>
                        </figure>
                        <h4 class="product-name">
                            <a href="product-default.html">Blue Ski Boots</a>
                        </h4>
                    </div>
                </div>
                <!-- End of Product Wrap -->
                <div class="swiper-slide product-wrap">
                    <div class="product text-center product-absolute">
                        <figure class="product-media">
                            <a href="https://www.portotheme.com/html/wolmart/product-defaproduct-default.html">
                                <img src="assets/images/demos/demo5/products/2-8.jpg" alt="Category image"
                                    width="130" height="146" style="background-color: #fff" />
                            </a>
                        </figure>
                        <h4 class="product-name">
                            <a href="product-default.html">Soft Sound Marker</a>
                        </h4>
                    </div>
                </div>
                <!-- End of Product Wrap -->
                <div class="swiper-slide product-wrap">
                    <div class="product text-center product-absolute">
                        <figure class="product-media">
                            <a href="https://www.portotheme.com/html/wolmart/product-defaproduct-default.html">
                                <img src="assets/images/demos/demo5/products/3-1-1.jpg" alt="Category image"
                                    width="130" height="146" style="background-color: #fff" />
                            </a>
                        </figure>
                        <h4 class="product-name">
                            <a href="product-default.html">Multi function Watch</a>
                        </h4>
                    </div>
                </div>
                <!-- End of Product Wrap -->
                <div class="swiper-slide product-wrap">
                    <div class="product text-center product-absolute">
                        <figure class="product-media">
                            <a href="https://www.portotheme.com/html/wolmart/product-defaproduct-default.html">
                                <img src="assets/images/demos/demo5/products/1-2.jpg" alt="Category image"
                                    width="130" height="146" style="background-color: #fff" />
                            </a>
                        </figure>
                        <h4 class="product-name">
                            <a href="product-default.html">Running Machine</a>
                        </h4>
                    </div>
                </div>
                <!-- End of Product Wrap -->
            </div>
            <div class="swiper-pagination"></div>
        </div>
        <!-- End of Reviewed Producs -->
    </div>
</x-app>
