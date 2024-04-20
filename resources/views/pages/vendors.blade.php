@php
    $route = route('shops');
@endphp
<x-app>

    <x-slot name="css">

        <link rel="preload" href="assets/vendor/fontawesome-free/webfonts/fa-regular-400.woff2" as="font"
            type="font/woff2" crossorigin="anonymous">
        <link rel="preload" href="assets/vendor/fontawesome-free/webfonts/fa-solid-900.woff2" as="font"
            type="font/woff2" crossorigin="anonymous">
        <!-- Vendor CSS -->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/fontawesome-free/css/all.min.css') }}">
        <!-- Plugins CSS -->
        <link rel="stylesheet" href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/animate/animate.min.css') }}">
        <link rel="stylesheet" type="text/css"
            href="{{ asset('assets/vendor/magnific-popup/magnific-popup.min.css') }}">

        <!-- Default CSS -->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.min.css') }}">
    </x-slot>

    <div class="container">
        <main class="main">
            <!-- Start of Breadcrumb -->
            <nav class="breadcrumb-nav">
                <div class="container">
                    <ul class="breadcrumb bb-no">
                        <li><a href="demo1.html">Home</a></li>
                        <li><a href="#">Vendor</a></li>
                        <li><a href="#">WC Marketplace</a></li>
                        <li>Store</li>
                    </ul>
                </div>
            </nav>
            <!-- End of Breadcrumb -->

            <!-- Start of Pgae Contetn -->
            <div class="page-content mb-8">
                <div class="container">
                    <div class="row gutter-lg">
                        <aside class="sidebar left-sidebar vendor-sidebar sticky-sidebar-wrapper sidebar-fixed">
                            <!-- Start of Sidebar Overlay -->
                            <div class="sidebar-overlay"></div>
                            <a class="sidebar-close" href="#"><i class="close-icon"></i></a>
                            <div class="sidebar-content">
                                <div class="sticky-sidebar">
                                    <div class="widget widget-collapsible widget-categories">
                                        <h3 class="widget-title"><span>All Categories</span></h3>
                                        <ul class="widget-body filter-items search-ul">
                                            <li>
                                                <a href="#">Clothing</a>
                                                <ul>
                                                    <li><a href="#">Accessories</a></li>
                                                    <li><a href="#">Babyclothes</a></li>
                                                    <li><a href="#">Dressers &amp; Shirts</a></li>
                                                    <li><a href="#">Jeans</a></li>
                                                    <li><a href="#">Jumpers</a></li>
                                                    <li><a href="#">Knitewears</a></li>
                                                    <li><a href="#">Lounge &amp; Underwear</a></li>
                                                    <li><a href="#">Shoes</a></li>
                                                    <li><a href="#">T-shirts</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="#">Cosmetics</a></li>
                                            <li><a href="#">Electronics</a></li>
                                            <li><a href="#">Furniture</a></li>
                                            <li><a href="#">Kitchen</a></li>
                                            <li><a href="#">Technologies</a></li>
                                        </ul>
                                    </div>
                                    <!-- End of Widget -->
                                    <div class="widget widget-collapsible widget-wcmp-contact">
                                        <h3 class="widget-title"><span>Contact Vendor</span></h3>
                                        <div class="widget-body">
                                            <input type="text" class="form-control" name="name" id="name"
                                                placeholder="Name" />
                                            <input type="text" class="form-control" name="subject" id="subject"
                                                placeholder="Subject" />
                                            <input type="text" class="form-control" name="email" id="email_1"
                                                placeholder="Email" />
                                            <textarea name="message" maxlength="1000" cols="25" rows="6" placeholder="Message" class="form-control"
                                                required="required"></textarea>
                                            <a href="#" class="btn btn-dark btn-rounded">Submit</a>
                                        </div>
                                    </div>
                                    <!-- End of Widget -->
                                    <div class="widget widget-collapsible widget-search-products">
                                        <h3 class="widget-title"><span>Search Vendor Products</span></h3>
                                        <div class="widget-body">
                                            <form method="get" class="input-wrapper-inline">
                                                <input type="search" id="search_1" class="form-control"
                                                    placeholder="Search products..." required>
                                                <a href="#" class="btn btn-rounded">Search</a>
                                            </form>
                                        </div>
                                    </div>
                                    <!-- End of Widget -->
                                    <div class="widget widget-collapsible widget-products">
                                        <h3 class="widget-title"><span>Vendor Top Rated Products</span></h3>
                                        <div class="widget-body">
                                            <div class="product product-widget">
                                                <figure class="product-media">
                                                    <a href="product-default.html">
                                                        <img src="assets/images/shop/1.jpg" alt="Product"
                                                            width="100" height="106" />
                                                    </a>
                                                </figure>
                                                <div class="product-details">
                                                    <h4 class="product-name">
                                                        <a href="product-default.html">3D Television</a>
                                                    </h4>
                                                    <div class="ratings-container">
                                                        <div class="ratings-full">
                                                            <span class="ratings" style="width: 100%;"></span>
                                                            <span class="tooltiptext tooltip-top"></span>
                                                        </div>
                                                    </div>
                                                    <div class="product-price">$220.00</div>
                                                </div>
                                            </div>
                                            <div class="product product-widget">
                                                <figure class="product-media">
                                                    <a href="product-default.html">
                                                        <img src="assets/images/shop/2-1.jpg" alt="Product"
                                                            width="100" height="106" />
                                                    </a>
                                                </figure>
                                                <div class="product-details">
                                                    <h4 class="product-name">
                                                        <a href="product-default.html">Alarm Clock With Lamp</a>
                                                    </h4>
                                                    <div class="ratings-container">
                                                        <div class="ratings-full">
                                                            <span class="ratings" style="width: 100%;"></span>
                                                            <span class="tooltiptext tooltip-top"></span>
                                                        </div>
                                                    </div>
                                                    <div class="product-price">
                                                        <ins class="new-price">$30.00</ins><del
                                                            class="old-price">$60.00</del>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product product-widget">
                                                <figure class="product-media">
                                                    <a href="product-default.html">
                                                        <img src="assets/images/shop/3.jpg" alt="Product"
                                                            width="100" height="106" />
                                                    </a>
                                                </figure>
                                                <div class="product-details">
                                                    <h4 class="product-name">
                                                        <a href="product-default.html">Apple Laptop</a>
                                                    </h4>
                                                    <div class="ratings-container">
                                                        <div class="ratings-full">
                                                            <span class="ratings" style="width: 100%;"></span>
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
                                        <h3 class="widget-title"><span>Vendor On Sale Products</span></h3>
                                        <div class="widget-body">
                                            <div class="product product-widget">
                                                <figure class="product-media">
                                                    <a href="product-default.html">
                                                        <img src="assets/images/shop/12.jpg" alt="Product"
                                                            width="100" height="106" />
                                                    </a>
                                                </figure>
                                                <div class="product-details">
                                                    <h4 class="product-name">
                                                        <a href="product-default.html">Classic Simple Backpack</a>
                                                    </h4>
                                                    <div class="product-price">$85.00</div>
                                                </div>
                                            </div>
                                            <div class="product product-widget">
                                                <figure class="product-media">
                                                    <a href="product-default.html">
                                                        <img src="assets/images/shop/13.jpg" alt="Product"
                                                            width="100" height="106" />
                                                    </a>
                                                </figure>
                                                <div class="product-details">
                                                    <h4 class="product-name">
                                                        <a href="product-default.html">Smart Watch</a>
                                                    </h4>
                                                    <div class="product-price">$90.00</div>
                                                </div>
                                            </div>
                                            <div class="product product-widget">
                                                <figure class="product-media">
                                                    <a href="product-default.html">
                                                        <img src="assets/images/shop/20.jpg" alt="Product"
                                                            width="100" height="106" />
                                                    </a>
                                                </figure>
                                                <div class="product-details">
                                                    <h4 class="product-name">
                                                        <a href="product-default.html">Pencil Case</a>
                                                    </h4>
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
                            <div class="store store-wcmp-banner">
                                {{-- @foreach ($shops as $shop)
                                    <div class="product-wrap">
                                        <div class="product text-center">
                                            <x-shop.card :shop="$shop" />
                                        </div>
                                    </div>
                                @endforeach --}}
                                <figure class="store-media">
                                    <img src="assets/images/vendor/wcmp/7.jpg" alt="Vendor" width="930"
                                        height="390" style="background-color: #ECE7E3;" />
                                </figure>
                                <div class="store-content">
                                    <figure class="seller-brand">
                                        <img src="assets/images/vendor/brand/1-100x100.png" alt="Brand"
                                            width="100" height="100" />
                                    </figure>
                                    <h4 class="store-title">Vendor 1</h4>
                                    <div class="seller-info-list">
                                        <div class="store-address">
                                            <i class="w-icon-map-marker"></i>
                                            Street1, Street2, Great Area, Afghanistan, 12345
                                        </div>
                                        <div class="store-phone">
                                            <a href="tel:123456789">
                                                <i class="w-icon-phone"></i>
                                                12321123
                                            </a>
                                        </div>
                                        <div class="store-rating">
                                            <i class="w-icon-star-full"></i>
                                            5 Rating From 1 Review
                                        </div>
                                        <div class="store-email">
                                            <a href="email:#">
                                                <i class="w-icon-envelope"></i>
                                                <span class="__cf_email__"
                                                    data-cfemail="6f180003020e1d1b190a010b001d5e2f0a020e0603410c0002">[email&#160;protected]</span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="social-icons social-icons-colored border-thin">
                                        <a href="#" class="social-icon social-facebook w-icon-facebook"></a>
                                        <a href="#" class="social-icon social-twitter w-icon-twitter"></a>
                                        <a href="#" class="social-icon social-linkedin fab fa-linkedin"></a>
                                        <a href="#" class="social-icon social-youtube w-icon-youtube"></a>
                                        <a href="#" class="social-icon social-instagram w-icon-instagram"></a>
                                    </div>
                                </div>
                            </div>
                            <!-- End of Store WCMP Banner -->

                            <div class="tab tab-nav-underline tab-nav-boxed type2 tab-vendor-products">
                                <ul class="nav nav-tabs">
                                    <li class="nav-item">
                                        <a href="#tab-1" class="nav-link active">Products</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#tab-2" class="nav-link">Reviews</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab-1">
                                        <nav class="toolbox sticky-toolbox sticky-content fix-top">
                                            <div class="toolbox-left">
                                                <a href="#"
                                                    class="btn btn-primary btn-outline btn-rounded left-sidebar-toggle 
                                                    btn-icon-left d-block d-lg-none"><i
                                                        class="w-icon-category"></i><span>Filters</span></a>
                                                <div class="toolbox-item toolbox-sort select-box text-dark">
                                                    <label>Sort By :</label>
                                                    <select name="orderby" class="form-control">
                                                        <option value="default" selected="selected">Relevance</option>
                                                        <option value="popularity">Sort by popularity</option>
                                                        <option value="rating">Sort by average rating</option>
                                                        <option value="date">Sort by latest</option>
                                                        <option value="price-low">Sort by pric: low to high</option>
                                                        <option value="price-high">Sort by price: high to low</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="toolbox-right">
                                                <div class="toolbox-item toolbox-show select-box">
                                                    <select name="count" class="form-control">
                                                        <option value="9">Show 9</option>
                                                        <option value="12" selected="selected">Show 12</option>
                                                        <option value="24">Show 24</option>
                                                        <option value="36">Show 36</option>
                                                    </select>
                                                </div>
                                                {{-- <div class="toolbox-item toolbox-layout">
                                                    <a href="vendor-wcmp-store-product-grid.html"
                                                        class="icon-mode-grid btn-layout active">
                                                        <i class="w-icon-grid"></i>
                                                    </a>
                                                    <a href="vendor-wcmp-store-product-list.html"
                                                        class="icon-mode-list btn-layout">
                                                        <i class="w-icon-list"></i>
                                                    </a>
                                                </div> --}}
                                            </div>
                                        </nav>
                                        <div class="product-wrapper row cols-md-3 cols-sm-2 cols-2">
                                            @foreach ($shops as $shop)
                                                <div class="product-wrap">
                                                    <div class="product text-center">
                                                        <x-shop.card :shop="$shop" />
                                                    </div>
                                                </div>
                                            @endforeach

                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tab-2">
                                        <h4 class="title review-title pt-6 mb-0">1 review for Vendor 1</h4>
                                        <ul class="comments list-style-none">
                                            <li class="comment">
                                                <div class="comment-body">
                                                    <figure class="comment-avatar">
                                                        <img src="assets/images/agents/2-100x100.png" alt="Avatar"
                                                            width="100" height="100" />
                                                    </figure>
                                                    <div class="comment-content">
                                                        <div class="ratings-container">
                                                            <div class="ratings-full">
                                                                <span class="ratings" style="width: 100%;"></span>
                                                                <span class="tooltiptext tooltip-top"></span>
                                                            </div>
                                                        </div>
                                                        <h4 class="comment-author">
                                                            Johnson Doe
                                                            <span class="comment-date">- March 26, 2021</span>
                                                        </h4>
                                                        <p>Great vendor with high quality products and service </p>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End of Main Content -->
                    </div>
                </div>
            </div>
            <!-- End of Page Content -->
        </main>
    </div>

    <x-slot name="js">
        <script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
        <script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/vendor/jquery.plugin/jquery.plugin.min.js') }}"></script>
        <script src="{{ asset('assets/vendor/sticky/sticky.min.js') }}"></script>
        <script src="{{ asset('assets/vendor/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
        <script src="{{ asset('assets/vendor/jquery.countdown/jquery.countdown.min.js') }}"></script>
        <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
        <script src="{{ asset('assets/vendor/magnific-popup/jquery.magnific-popup.min.js') }}"></script>
        <script src="{{ asset('assets/vendor/jquery.gmap/jquery.gmap.min.js') }}"></script>

        <!-- Main JS -->
        <script src="{{ asset('assets/js/main.min.js') }}"></script>



    </x-slot>
</x-app>
