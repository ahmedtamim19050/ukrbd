<x-app>
    <x-slot name="css">
        <!-- Vendor CSS -->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/fontawesome-free/css/all.min.css') }}">
        <!-- Plugins CSS -->
        <link rel="stylesheet" href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/animate/animate.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/magnific-popup/magnific-popup.min.css') }}">

        <!-- Default CSS -->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.min.css') }}">
    </x-slot>

    <!-- Start of Pgae Contetn -->
    <div class="page-content mb-8">
        <div class="container">
            <div class="row gutter-lg">
                <aside class="sidebar left-sidebar vendor-sidebar sticky-sidebar-wrapper sidebar-fixed">
                    <!-- Start of Sidebar Overlay -->
                    <div class="sidebar-overlay"></div>
                    <a class="sidebar-close" href="#"><i class="close-icon"></i></a>
                    <a href="#" class="sidebar-toggle"><i class="fas fa-chevron-right"></i></a>
                    <div class="sidebar-content">
                        <div class="sticky-sidebar">
                            <div class="widget widget-collapsible widget-categories">
                                <h3 class="widget-title"><span>All Categories</span></h3>
                                <ul class="widget-body filter-items search-ul">
                                    <li><a href="#">Clothing</a></li>
                                    <li><a href="#">Computers</a></li>
                                    <li><a href="#">Electronics</a></li>
                                    <li><a href="#">Fashion</a></li>
                                    <li><a href="#">Furniture</a></li>
                                    <li><a href="#">Games</a></li>
                                    <li><a href="#">Kitchen</a></li>
                                    <li><a href="#">Shoes</a></li>
                                    <li><a href="#">Sports</a></li>
                                </ul>
                            </div>
                            <!-- End of Widget -->
                            <div class="widget widget-collapsible widget-contact">
                                <h3 class="widget-title"><span>Contact Vendor</span></h3>
                                <div class="widget-body">
                                    <a href="{{route('massage.create', ['id' => $shop->id])}}" class="btn btn-dark btn-rounded">Send Message</a>
                                </div>
                            </div>
                            <!-- End of Widget -->
                            <div class="widget widget-collapsible widget-time">
                                <h3 class="widget-title"><span>Store Time</span></h3>
                                <ul class="widget-body">
                                    <li><label>Sunday</label></li>
                                    <li><label>Monday</label></li>
                                    <li><label>Tuesday</label></li>
                                    <li><label>Wednesday</label></li>
                                    <li><label>Thursday</label></li>
                                    <li><label>Friday</label></li>
                                    <li><label>Saturday</label></li>
                                </ul>
                            </div>
                            <!-- End of Widget -->
                            <div class="widget widget-collapsible widget-products">
                                <h3 class="widget-title"><span>Best Selling</span></h3>
                                <div class="widget-body">
                                    <div class="product product-widget">
                                        <figure class="product-media">
                                            <a href="product-default.html">
                                                <img src="assets/images/shop/1.jpg" alt="Product" width="100" height="106" />
                                            </a>
                                        </figure>
                                        <div class="product-details">
                                            <h4 class="product-name">
                                                <a href="product-default.html">3D Television</a>
                                            </h4>
                                            <div class="ratings-container">
                                                <div class="ratings-full">
                                                    <span class="ratings" style="width: 80%;"></span>
                                                    <span class="tooltiptext tooltip-top"></span>
                                                </div>
                                            </div>
                                            <div class="product-price">$220.00</div>
                                        </div>
                                    </div>
                                    <div class="product product-widget">
                                        <figure class="product-media">
                                            <a href="product-default.html">
                                                <img src="assets/images/shop/2-1.jpg" alt="Product" width="100" height="106" />
                                            </a>
                                        </figure>
                                        <div class="product-details">
                                            <h4 class="product-name">
                                                <a href="product-default.html">Alarm Clock With Lamp</a>
                                            </h4>
                                            <div class="ratings-container">
                                                <div class="ratings-full">
                                                    <span class="ratings" style="width: 80%;"></span>
                                                    <span class="tooltiptext tooltip-top"></span>
                                                </div>
                                            </div>
                                            <div class="product-price">
                                                <ins class="new-price">$30.00</ins><del class="old-price">$60.00</del>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product product-widget">
                                        <figure class="product-media">
                                            <a href="product-default.html">
                                                <img src="assets/images/shop/3.jpg" alt="Product" width="100" height="106" />
                                            </a>
                                        </figure>
                                        <div class="product-details">
                                            <h4 class="product-name">
                                                <a href="product-default.html">Apple Laptop</a>
                                            </h4>
                                            <div class="ratings-container">
                                                <div class="ratings-full">
                                                    <span class="ratings" style="width: 60%;"></span>
                                                    <span class="tooltiptext tooltip-top"></span>
                                                </div>
                                            </div>
                                            <div class="product-price">$1,000.00</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End of Widget -->
                            <div class="widget widget-collapsible widget-products">
                                <h3 class="widget-title"><span>Top Rated</span></h3>
                                <div class="widget-body">
                                    <div class="product product-widget">
                                        <figure class="product-media">
                                            <a href="product-default.html">
                                                <img src="assets/images/shop/12.jpg" alt="Product" width="100" height="106" />
                                            </a>
                                        </figure>
                                        <div class="product-details">
                                            <h4 class="product-name">
                                                <a href="product-default.html">Classic Simple Backpack</a>
                                            </h4>
                                            <div class="ratings-container">
                                                <div class="ratings-full">
                                                    <span class="ratings" style="width: 100%;"></span>
                                                    <span class="tooltiptext tooltip-top"></span>
                                                </div>
                                            </div>
                                            <div class="product-price">$85.00</div>
                                        </div>
                                    </div>
                                    <div class="product product-widget">
                                        <figure class="product-media">
                                            <a href="product-default.html">
                                                <img src="assets/images/shop/13.jpg" alt="Product" width="100" height="106" />
                                            </a>
                                        </figure>
                                        <div class="product-details">
                                            <h4 class="product-name">
                                                <a href="product-default.html">Smart Watch</a>
                                            </h4>
                                            <div class="ratings-container">
                                                <div class="ratings-full">
                                                    <span class="ratings" style="width: 100%;"></span>
                                                    <span class="tooltiptext tooltip-top"></span>
                                                </div>
                                            </div>
                                            <div class="product-price">$90.00</div>
                                        </div>
                                    </div>
                                    <div class="product product-widget">
                                        <figure class="product-media">
                                            <a href="product-default.html">
                                                <img src="assets/images/shop/20.jpg" alt="Product" width="100" height="106" />
                                            </a>
                                        </figure>
                                        <div class="product-details">
                                            <h4 class="product-name">
                                                <a href="product-default.html">Pencil Case</a>
                                            </h4>
                                            <div class="ratings-container">
                                                <div class="ratings-full">
                                                    <span class="ratings" style="width: 100%;"></span>
                                                    <span class="tooltiptext tooltip-top"></span>
                                                </div>
                                            </div>
                                            <div class="product-price">$54.00</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End of Widget -->
                        </div>
                    </div>
                </aside>
                <!-- End of Sidebar -->

                <div class="main-content">
                    <div class="store store-banner mb-4">
                        <figure class="store-media">
                            <img src="{{ asset($shop->banner) }}" alt="Vendor" width="930" height="446" style="background-color: #414960;" />
                        </figure>
                        <div class="store-content">
                            <figure class="seller-brand">
                                <img src="{{ $shop->logo }}" alt="Brand" width="80" height="80" />
                            </figure>
                            <h4 class="store-title">{{$shop->name}}</h4>
                            <ul class="seller-info-list list-style-none mb-6">
                                <li class="store-address">
                                    <i class="w-icon-map-marker"></i>
                                    {{$shop->city}}, {{$shop->state}}, {{$shop->country}}
                                </li>
                                <li class="store-phone">
                                    <a href="tel:1234567890">
                                        <i class="w-icon-phone"></i>
                                        {{$shop->phone}}
                                    </a>
                                </li>
                                <li class="store-rating">
                                    <i class="w-icon-star-full"></i>
                                    4.33 rating from 3 reviews
                                </li>
                                <li class="store-open">
                                    <i class="w-icon-cart"></i>
                                    {{$shop->status === 1? 'Store Open': 'Store Closed'}}
                                </li>
                            </ul>
                            <div class="social-icons social-no-color border-thin">
                                <a href="{{$shop->facebook}}" class="social-icon social-facebook w-icon-facebook"></a>
                                <!-- <a href="#" class="social-icon social-google w-icon-google"></a> -->
                                <a href="{{$shop->twitter}}" class="social-icon social-twitter w-icon-twitter"></a>
                                <!-- <a href="#" class="social-icon social-pinterest w-icon-pinterest"></a> -->
                                <!-- <a href="#" class="social-icon social-youtube w-icon-youtube"></a> -->
                                <a href="{{$shop->instagram}}" class="social-icon social-instagram w-icon-instagram"></a>
                            </div>
                        </div>
                    </div>
                    <!-- End of Store Banner -->

                    <h2 class="title vendor-product-title mb-4"><a href="#">Products</a></h2>

                    <div class="product-wrapper row cols-md-3 cols-sm-2 cols-2">

                        @foreach ($shop->products as $product)
                        <x-products.card :product="$product" />
                        @endforeach
                    </div>
                </div>
                <!-- End of Main Content -->
            </div>
        </div>
    </div>
    <!-- End of Page Content -->
</x-app>