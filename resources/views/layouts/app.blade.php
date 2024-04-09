<!DOCTYPE html>
<html lang="en">



<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">

    <title>UKRBD</title>

    <meta name="keywords" content="Marketplace ecommerce responsive HTML5 Template" />
    <meta name="description"
        content="Wolmart is powerful marketplace &amp; ecommerce responsive Html5 Template.">
    <meta name="author" content="D-THEMES">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{asset('assets/images/icons/favicon.png')}}">

    <!-- WebFont.js -->
    <script>
        WebFontConfig = {
            google: { families: ['Poppins:400,500,600,700,800'] }
        };
        (function (d) {
            var wf = d.createElement('script'), s = d.scripts[0];
            wf.src = 'assets/js/webfont.js';
            wf.async = true;
            s.parentNode.insertBefore(wf, s);
        })(document);
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="preload" href="assets/vendor/fontawesome-free/webfonts/fa-regular-400.woff2" as="font" type="font/woff2"
        crossorigin="anonymous">
    <link rel="preload" href="assets/vendor/fontawesome-free/webfonts/fa-solid-900.woff2" as="font" type="font/woff2"
        crossorigin="anonymous">
    <link rel="preload" href="assets/vendor/fontawesome-free/webfonts/fa-brands-400.woff2" as="font" type="font/woff2"
        crossorigin="anonymous">
    <link rel="preload" href="assets/fonts/wolmart87d5.woff?png09e" as="font" type="font/woff" crossorigin="anonymous">

    <!-- Vendor CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/vendor/fontawesome-free/css/all.min.css')}}">

    <!-- Plugins CSS -->
    <link rel="stylesheet" href="{{asset('assets/vendor/swiper/swiper-bundle.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/vendor/animate/animate.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/vendor/magnific-popup/magnific-popup.min.css')}}">

    <!-- Default CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/demo5.min.css')}}">
    @yield('css')
</head>

<body class="home">
    <div class="page-wrapper">
        {{-- <h1 class="d-none">Wolmart - Responsive Marketplace HTML Template</h1> --}}
        <!-- Start of Header -->
        <header class="header">
            {{-- <div class="header-top">
                <div class="container">
                    <div class="header-left">
                        <p class="welcome-msg">Welcome to Wolmart Store message or remove it!</p>
                    </div>
                    <div class="header-right">
                        <div class="dropdown">
                            <a href="#currency">USD</a>
                            <div class="dropdown-box">
                                <a href="#USD">USD</a>
                                <a href="#EUR">EUR</a>
                            </div>
                        </div>
                        <!-- End of DropDown Menu -->

                        <div class="dropdown">
                            <a href="#language"><img src="assets/images/flags/eng.png" alt="ENG Flag" width="14"
                                    height="8" class="dropdown-image" /> ENG</a>
                            <div class="dropdown-box">
                                <a href="#ENG">
                                    <img src="assets/images/flags/eng.png" alt="ENG Flag" width="14" height="8"
                                        class="dropdown-image" />
                                    ENG
                                </a>
                                <a href="#FRA">
                                    <img src="assets/images/flags/fra.png" alt="FRA Flag" width="14" height="8"
                                        class="dropdown-image" />
                                    FRA
                                </a>
                            </div>
                        </div>
                        <!-- End of Dropdown Menu -->
                        <span class="divider d-lg-show"></span>
                        <a href="#" class="d-lg-show">Blog</a>
                        <a href="#" class="d-lg-show">Contact Us</a>
                        <a href="#" class="d-lg-show">My Account</a>
                        <a href="assets/ajax/login.html" class="d-lg-show login sign-in"><i
                                class="w-icon-account"></i>Sign In</a>
                        <span class="delimiter d-lg-show">/</span>
                        <a href="assets/ajax/login.html" class="ml-0 d-lg-show login register">Register</a>
                    </div>
                </div>
            </div> --}}
            <!-- End of Header Top -->

            <div class="header-middle">
                <div class="container">
                    <div class="header-left mr-md-4">
                        <a href="#" class="mobile-menu-toggle  w-icon-hamburger" aria-label="menu-toggle">
                        </a>
                        <a href="#" class="logo ml-lg-0">
                            <img src="assets/images/demos/demo5/logo-ukr-1.png" alt="logo" width="145" height="45" />
                        </a>
                        <form method="get" action="#"
                            class="header-search hs-expanded hs-round d-none d-md-flex input-wrapper">
                            <div class="select-box">
                                <select id="category" name="category">
                                    <option value="">All Categories</option>
                                    <option value="4">Fashion</option>
                                    <option value="5">Furniture</option>
                                    <option value="6">Shoes</option>
                                    <option value="7">Sports</option>
                                    <option value="8">Games</option>
                                    <option value="9">Computers</option>
                                    <option value="10">Electronics</option>
                                    <option value="11">Kitchen</option>
                                    <option value="12">Clothing</option>
                                </select>
                            </div>
                            <input type="text" class="form-control" name="search" id="search" placeholder="Search in..."
                                required />
                            <button class="btn btn-search" type="submit"><i class="w-icon-search"></i>
                            </button>
                        </form>
                    </div>
                    <div class="header-right ml-4">
                        <div class="header-call d-xs-show d-lg-flex align-items-center">
                            <a href="#" class="w-icon-call"></a>
                            <div class="call-info d-lg-show">
                                <h4 class="chat font-weight-normal font-size-md text-normal ls-normal text-light mb-0">
                                    <a href="#" class="text-capitalize">Call Us Now</a> :</h4>
                                <a href="#" class="phone-number font-weight-bolder ls-50">0(800)123-456</a>
                            </div>
                        </div>
                        <a class="wishlist label-down link d-xs-show" href="#">
                            <i class="w-icon-heart"></i>
                            <span class="wishlist-label d-lg-show">Wishlist</span>
                        </a>
                        <a class="compare label-down link d-xs-show" href="#">
                            <i class="w-icon-compare"></i>
                            <span class="compare-label d-lg-show">Compare</span>
                        </a>
                        <div class="dropdown cart-dropdown cart-offcanvas mr-0 mr-lg-2">
                            <div class="cart-overlay"></div>
                            <a href="#" class="cart-toggle label-down link">
                                <i class="w-icon-cart">
                                    <span class="cart-count">2</span>
                                </i>
                                <span class="cart-label">Cart</span>
                            </a>
                            <div class="dropdown-box">
                                <div class="cart-header">
                                    <span>Shopping Cart</span>
                                    <a href="#" class="btn-close">Close<i class="w-icon-long-arrow-right"></i></a>
                                </div>

                                <div class="products">
                                    <div class="product product-cart">
                                        <div class="product-detail">
                                            <a href="#" class="product-name">Beige knitted
                                                elas<br>tic
                                                runner shoes</a>
                                            <div class="price-box">
                                                <span class="product-quantity">1</span>
                                                <span class="product-price">$25.68</span>
                                            </div>
                                        </div>
                                        <figure class="product-media">
                                            <a href="#">
                                                <img src="assets/images/cart/product-1.jpg" alt="product" height="84"
                                                    width="94" />
                                            </a>
                                        </figure>
                                        <button class="btn btn-link btn-close" aria-label="button">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>

                                    <div class="product product-cart">
                                        <div class="product-detail">
                                            <a href="#" class="product-name">Blue utility
                                                pina<br>fore
                                                denim dress</a>
                                            <div class="price-box">
                                                <span class="product-quantity">1</span>
                                                <span class="product-price">$32.99</span>
                                            </div>
                                        </div>
                                        <figure class="product-media">
                                            <a href="#">
                                                <img src="assets/images/cart/product-2.jpg" alt="product" width="84"
                                                    height="94" />
                                            </a>
                                        </figure>
                                        <button class="btn btn-link btn-close" aria-label="button">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </div>

                                <div class="cart-total">
                                    <label>Subtotal:</label>
                                    <span class="price">$58.67</span>
                                </div>

                                <div class="cart-action">
                                    <a href="#" class="btn btn-dark btn-outline btn-rounded">View Cart</a>
                                    <a href="#" class="btn btn-primary  btn-rounded">Checkout</a>
                                </div>
                            </div>
                            <!-- End of Dropdown Box -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- End of Header Middle -->

            <div class="header-bottom sticky-content fix-top sticky-header has-dropdown" style="background-color: #007cc5">
                <div class="container">
                    <div class="inner-wrap">
                        <div class="header-left">
                            <div class="dropdown category-dropdown show-dropdown" data-visible="true">
                                <a href="#" class="text-white category-toggle" role="button" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="true" data-display="static"
                                    title="Browse Categories">
                                    <i class="w-icon-category"></i>
                                    <span>Browse Categories</span>
                                </a>

                                <div class="dropdown-box">
                                    <ul class="menu vertical-menu category-menu">
                                        <li>
                                            <a href="#">
                                                <i class="w-icon-tshirt2"></i>Fashion
                                            </a>
                                            <ul class="megamenu">
                                                <li>
                                                    <h4 class="menu-title">Women</h4>
                                                    <hr class="divider">
                                                    <ul>
                                                        <li><a href="#">New Arrivals</a>
                                                        </li>
                                                        <li><a href="#">Best Sellers</a>
                                                        </li>
                                                        <li><a href="#">Trending</a></li>
                                                        <li><a href="#">Clothing</a></li>
                                                        <li><a href="#">Shoes</a></li>
                                                        <li><a href="#">Bags</a></li>
                                                        <li><a href="#">Accessories</a>
                                                        </li>
                                                        <li><a href="#">Jewlery &
                                                                Watches</a></li>
                                                    </ul>
                                                </li>
                                                <li>
                                                    <h4 class="menu-title">Men</h4>
                                                    <hr class="divider">
                                                    <ul>
                                                        <li><a href="#">New Arrivals</a>
                                                        </li>
                                                        <li><a href="#">Best Sellers</a>
                                                        </li>
                                                        <li><a href="#">Trending</a></li>
                                                        <li><a href="#">Clothing</a></li>
                                                        <li><a href="#">Shoes</a></li>
                                                        <li><a href="#">Bags</a></li>
                                                        <li><a href="#">Accessories</a>
                                                        </li>
                                                        <li><a href="#">Jewlery &
                                                                Watches</a></li>
                                                    </ul>
                                                </li>
                                                <li>
                                                    <div class="banner-fixed menu-banner menu-banner2">
                                                        <figure>
                                                            <img src="assets/images/menu/banner-2.jpg" alt="Menu Banner"
                                                                width="235" height="347" />
                                                        </figure>
                                                        <div class="banner-content">
                                                            <div class="banner-price-info mb-1 ls-normal">Get up to
                                                                <strong
                                                                    class="text-primary text-uppercase">20%Off</strong>
                                                            </div>
                                                            <h3 class="banner-title ls-normal">Hot Sales</h3>
                                                            <a href="#"
                                                                class="btn btn-dark btn-sm btn-link btn-slide-right btn-icon-right">
                                                                Shop Now<i class="w-icon-long-arrow-right"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="w-icon-home"></i>Home & Garden
                                            </a>
                                            <ul class="megamenu">
                                                <li>
                                                    <h4 class="menu-title">Bedroom</h4>
                                                    <hr class="divider">
                                                    <ul>
                                                        <li><a href="#">Beds, Frames &
                                                                Bases</a></li>
                                                        <li><a href="#">Dressers</a></li>
                                                        <li><a href="#">Nightstands</a>
                                                        </li>
                                                        <li><a href="#">Kid's Beds &
                                                                Headboards</a></li>
                                                        <li><a href="#">Armoires</a></li>
                                                    </ul>

                                                    <h4 class="menu-title mt-1">Living Room</h4>
                                                    <hr class="divider">
                                                    <ul>
                                                        <li><a href="#">Coffee Tables</a>
                                                        </li>
                                                        <li><a href="#">Chairs</a></li>
                                                        <li><a href="#">Tables</a></li>
                                                        <li><a href="#">Futons & Sofa
                                                                Beds</a></li>
                                                        <li><a href="#">Cabinets &
                                                                Chests</a></li>
                                                    </ul>
                                                </li>
                                                <li>
                                                    <h4 class="menu-title">Office</h4>
                                                    <hr class="divider">
                                                    <ul>
                                                        <li><a href="#">Office Chairs</a>
                                                        </li>
                                                        <li><a href="#">Desks</a></li>
                                                        <li><a href="#">Bookcases</a></li>
                                                        <li><a href="#">File Cabinets</a>
                                                        </li>
                                                        <li><a href="#">Breakroom
                                                                Tables</a></li>
                                                    </ul>

                                                    <h4 class="menu-title mt-1">Kitchen & Dining</h4>
                                                    <hr class="divider">
                                                    <ul>
                                                        <li><a href="#">Dining Sets</a>
                                                        </li>
                                                        <li><a href="#">Kitchen Storage
                                                                Cabinets</a></li>
                                                        <li><a href="#">Bashers Racks</a>
                                                        </li>
                                                        <li><a href="#">Dining Chairs</a>
                                                        </li>
                                                        <li><a href="#">Dining Room
                                                                Tables</a></li>
                                                        <li><a href="#">Bar Stools</a></li>
                                                    </ul>
                                                </li>
                                                <li>
                                                    <div class="menu-banner banner-fixed menu-banner3">
                                                        <figure>
                                                            <img src="assets/images/menu/banner-3.jpg" alt="Menu Banner"
                                                                width="235" height="461" />
                                                        </figure>
                                                        <div class="banner-content">
                                                            <h4
                                                                class="banner-subtitle font-weight-normal text-white mb-1">
                                                                Restroom</h4>
                                                            <h3
                                                                class="banner-title font-weight-bolder text-white ls-normal">
                                                                Furniture Sale</h3>
                                                            <div
                                                                class="banner-price-info text-white font-weight-normal ls-25">
                                                                Up to <span
                                                                    class="text-secondary text-uppercase font-weight-bold">25%
                                                                    Off</span></div>
                                                            <a href="#"
                                                                class="btn btn-white btn-link btn-sm btn-slide-right btn-icon-right">
                                                                Shop Now<i class="w-icon-long-arrow-right"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="w-icon-electronics"></i>Electronics
                                            </a>
                                            <ul class="megamenu">
                                                <li>
                                                    <h4 class="menu-title">Laptops &amp; Computers</h4>
                                                    <hr class="divider">
                                                    <ul>
                                                        <li><a href="#">Desktop
                                                                Computers</a></li>
                                                        <li><a href="#">Monitors</a></li>
                                                        <li><a href="#">Laptops</a></li>
                                                        <li><a href="#">Hard Drives &amp;
                                                                Storage</a></li>
                                                        <li><a href="#">Computer
                                                                Accessories</a></li>
                                                    </ul>

                                                    <h4 class="menu-title mt-1">TV &amp; Video</h4>
                                                    <hr class="divider">
                                                    <ul>
                                                        <li><a href="#">TVs</a></li>
                                                        <li><a href="#">Home Audio
                                                                Speakers</a></li>
                                                        <li><a href="#">Projectors</a></li>
                                                        <li><a href="#">Media Streaming
                                                                Devices</a></li>
                                                    </ul>
                                                </li>
                                                <li>
                                                    <h4 class="menu-title">Digital Cameras</h4>
                                                    <hr class="divider">
                                                    <ul>
                                                        <li><a href="#">Digital SLR
                                                                Cameras</a></li>
                                                        <li><a href="#">Sports & Action
                                                                Cameras</a></li>
                                                        <li><a href="#">Camera Lenses</a>
                                                        </li>
                                                        <li><a href="#">Photo Printer</a>
                                                        </li>
                                                        <li><a href="#">Digital Memory
                                                                Cards</a></li>
                                                    </ul>

                                                    <h4 class="menu-title mt-1">Cell Phones</h4>
                                                    <hr class="divider">
                                                    <ul>
                                                        <li><a href="#">Carrier Phones</a>
                                                        </li>
                                                        <li><a href="#">Unlocked Phones</a>
                                                        </li>
                                                        <li><a href="#">Phone & Cellphone
                                                                Cases</a></li>
                                                        <li><a href="#">Cellphone
                                                                Chargers</a></li>
                                                    </ul>
                                                </li>
                                                <li>
                                                    <div class="menu-banner banner-fixed menu-banner4">
                                                        <figure>
                                                            <img src="assets/images/menu/banner-4.jpg" alt="Menu Banner"
                                                                width="235" height="433" />
                                                        </figure>
                                                        <div class="banner-content">
                                                            <h4 class="banner-subtitle font-weight-normal">Deals Of The
                                                                Week</h4>
                                                            <h3 class="banner-title text-white">Save On Smart EarPhone
                                                            </h3>
                                                            <div
                                                                class="banner-price-info text-secondary font-weight-bolder text-uppercase text-secondary">
                                                                20% Off</div>
                                                            <a href="#"
                                                                class="btn btn-white btn-outline btn-sm btn-rounded">Shop
                                                                Now</a>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="w-icon-furniture"></i>Furniture
                                            </a>
                                            <ul class="megamenu type2">
                                                <li class="row">
                                                    <div class="col-md-3 col-lg-3 col-6">
                                                        <h4 class="menu-title">Furniture</h4>
                                                        <hr class="divider" />
                                                        <ul>
                                                            <li><a href="#">Sofas & Couches</a>
                                                            </li>
                                                            <li><a href="#">Armchairs</a></li>
                                                            <li><a href="#">Bed Frames</a></li>
                                                            <li><a href="#">Beside Tables</a>
                                                            </li>
                                                            <li><a href="#">Dressing Tables</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-md-3 col-lg-3 col-6">
                                                        <h4 class="menu-title">Lighting</h4>
                                                        <hr class="divider" />
                                                        <ul>
                                                            <li><a href="#">Light Bulbs</a>
                                                            </li>
                                                            <li><a href="#">Lamps</a></li>
                                                            <li><a href="#">Celling Lights</a>
                                                            </li>
                                                            <li><a href="#">Wall Lights</a>
                                                            </li>
                                                            <li><a href="#">Bathroom
                                                                    Lighting</a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-md-3 col-lg-3 col-6">
                                                        <h4 class="menu-title">Home Accessories</h4>
                                                        <hr class="divider" />
                                                        <ul>
                                                            <li><a href="#">Decorative
                                                                    Accessories</a></li>
                                                            <li><a href="#">Candals &
                                                                    Holders</a></li>
                                                            <li><a href="#">Home Fragrance</a>
                                                            </li>
                                                            <li><a href="#">Mirrors</a></li>
                                                            <li><a href="#">Clocks</a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-md-3 col-lg-3 col-6">
                                                        <h4 class="menu-title">Garden & Outdoors</h4>
                                                        <hr class="divider" />
                                                        <ul>
                                                            <li><a href="#">Garden
                                                                    Furniture</a></li>
                                                            <li><a href="#">Lawn Mowers</a>
                                                            </li>
                                                            <li><a href="#">Pressure
                                                                    Washers</a></li>
                                                            <li><a href="#">All Garden
                                                                    Tools</a></li>
                                                            <li><a href="#">Outdoor Dining</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </li>
                                                <li class="row">
                                                    <div class="col-6">
                                                        <div class="banner banner-fixed menu-banner5 br-xs">
                                                            <figure>
                                                                <img src="assets/images/menu/banner-5.jpg" alt="Banner"
                                                                    width="410" height="123"
                                                                    style="background-color: #D2D2D2;" />
                                                            </figure>
                                                            <div class="banner-content text-right y-50">
                                                                <h4
                                                                    class="banner-subtitle font-weight-normal text-default text-capitalize">
                                                                    New Arrivals</h4>
                                                                <h3
                                                                    class="banner-title font-weight-bolder text-capitalize ls-normal">
                                                                    Amazing Sofa</h3>
                                                                <div
                                                                    class="banner-price-info font-weight-normal ls-normal">
                                                                    Starting at <strong>$125.00</strong></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="banner banner-fixed menu-banner5 br-xs">
                                                            <figure>
                                                                <img src="assets/images/menu/banner-6.jpg" alt="Banner"
                                                                    width="410" height="123"
                                                                    style="background-color: #9F9888;" />
                                                            </figure>
                                                            <div class="banner-content y-50">
                                                                <h4
                                                                    class="banner-subtitle font-weight-normal text-white text-capitalize">
                                                                    Best Seller</h4>
                                                                <h3
                                                                    class="banner-title font-weight-bolder text-capitalize text-white ls-normal">
                                                                    Chair &amp; Lamp</h3>
                                                                <div
                                                                    class="banner-price-info font-weight-normal ls-normal text-white">
                                                                    From <strong>$165.00</strong></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="w-icon-heartbeat"></i>Healthy & Beauty
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="w-icon-gift"></i>Gift Ideas
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="w-icon-gamepad"></i>Toy & Games
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="w-icon-ice-cream"></i>Cooking
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="w-icon-ios"></i>Smart Phones
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="w-icon-camera"></i>Cameras & Photo
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="w-icon-ruby"></i>Accessories
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#"
                                                class="font-weight-bold text-uppercase ls-25">
                                                View All Categories<i class="w-icon-angle-right"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <nav class="main-nav">
                                <ul class="menu active-underline">
                                    <li class="active">
                                        <a href="#">Home</a>
                                    </li>
                                    <li>
                                        <a href="#">Shop</a>

                                        <!-- Start of Megamenu -->
                                        <ul class="megamenu">
                                            <li>
                                                <h4 class="menu-title">Shop Pages</h4>
                                                <ul>
                                                    <li><a href="#">Banner With Sidebar</a></li>
                                                    <li><a href="#">Boxed Banner</a></li>
                                                    <li><a href="#">Full Width Banner</a></li>
                                                    <li><a href="#">Horizontal Filter<span
                                                                class="tip tip-hot">Hot</span></a></li>
                                                    <li><a href="#">Off Canvas Sidebar<span
                                                                class="tip tip-new">New</span></a></li>
                                                    <li><a href="#">Infinite Ajax Scroll</a>
                                                    </li>
                                                    <li><a href="#">Right Sidebar</a></li>
                                                    <li><a href="#">Both Sidebar</a></li>
                                                </ul>
                                            </li>
                                            <li>
                                                <h4 class="menu-title">Shop Layouts</h4>
                                                <ul>
                                                    <li><a href="#">3 Columns Mode</a></li>
                                                    <li><a href="">4 Columns Mode</a></li>
                                                    <li><a href="">5 Columns Mode</a></li>
                                                    <li><a href="">6 Columns Mode</a></li>
                                                    <li><a href="">7 Columns Mode</a></li>
                                                    <li><a href="">8 Columns Mode</a></li>
                                                    <li><a href="">List Mode</a></li>
                                                    <li><a href="#">List Mode With Sidebar</a></li>
                                                </ul>
                                            </li>
                                            <li>
                                                <h4 class="menu-title">Product Pages</h4>
                                                <ul>
                                                    <li><a href="#">Variable Product</a></li>
                                                    <li><a href="#">Featured &amp; Sale</a></li>
                                                    <li><a href="#">Data In Accordion</a></li>
                                                    <li><a href="#">Data In Sections</a></li>
                                                    <li><a href="#">Image Swatch</a></li>
                                                    <li><a href="#">Extended Info</a>
                                                    </li>
                                                    <li><a href="#">Without Sidebar</a></li>
                                                    <li><a href="#">360<sup>o</sup> &amp; Video<span
                                                                class="tip tip-new">New</span></a></li>
                                                </ul>
                                            </li>
                                            <li>
                                                <h4 class="menu-title">Product Layouts</h4>
                                                <ul>
                                                    <li><a href="#">Default<span
                                                                class="tip tip-hot">Hot</span></a></li>
                                                    <li><a href="#">Vertical Thumbs</a></li>
                                                    <li><a href="#">Grid Images</a></li>
                                                    <li><a href="#">Masonry</a></li>
                                                    <li><a href="#">Gallery</a></li>
                                                    <li><a href="#">Sticky Info</a></li>
                                                    <li><a href="#">Sticky Thumbs</a></li>
                                                    <li><a href="#">Sticky Both</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                        <!-- End of Megamenu -->
                                    </li>
                                    <li>
                                        <a href="#">Vendor</a>
                                        <ul>
                                            <li>
                                                <a href="vendor-dokan-store-list.html">Store Listing</a>
                                                <ul>
                                                    <li><a href=">Store listing 1</a></li>
                                                    <li><a href="">Store listing 2</a></li>
                                                    <li><a href="">Store listing 3</a></li>
                                                    <li><a href="">Store listing 4</a></li>
                                                </ul>
                                            </li>
                                            <li>
                                                <a href="#">Vendor Store</a>
                                                <ul>
                                                    <li><a href="#">Vendor Store 1</a></li>
                                                    <li><a href="">Vendor Store 2</a>
                                                    </li>
                                                    <li><a href="">Vendor Store 3</a>
                                                    </li>
                                                    <li><a href="">Vendor Store 4</a>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="#">Blog</a>
                                        <ul>
                                            <li><a href="#">Classic</a></li>
                                            <li><a href="blog-listing.html">Listing</a></li>
                                            <li>
                                                <a href="#">Grid</a>
                                                <ul>
                                                    <li><a href="#">Grid 2 columns</a></li>
                                                    <li><a href="#">Grid 3 columns</a></li>
                                                    <li><a href="#">Grid 4 columns</a></li>
                                                    <li><a href="#">Grid sidebar</a></li>
                                                </ul>
                                            </li>
                                            <li>
                                                <a href="#">Masonry</a>
                                                <ul>
                                                    <li><a href="#">Masonry 2 columns</a></li>
                                                    <li><a href="#">Masonry 3 columns</a></li>
                                                    <li><a href="#">Masonry 4 columns</a></li>
                                                    <li><a href="#">Masonry sidebar</a></li>
                                                </ul>
                                            </li>
                                            <li>
                                                <a href="#">Mask</a>
                                                <ul>
                                                    <li><a href="#">Blog mask grid</a></li>
                                                    <li><a href="blog-mask-masonry.html">Blog mask masonry</a></li>
                                                </ul>
                                            </li>
                                            <li>
                                                <a href="#">Single Post</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="#">Pages</a>
                                        <ul>

                                            <li><a href="#">About Us</a></li>
                                            <li><a href="#">Become A Vendor</a></li>
                                            <li><a href="#">Contact Us</a></li>
                                            <li><a href="#">FAQs</a></li>
                                            <li><a href="#">Error 404</a></li>
                                            <li><a href="#">Coming Soon</a></li>
                                            <li><a href="#">Wishlist</a></li>
                                            <li><a href="#">Cart</a></li>
                                            <li><a href="#">Checkout</a></li>
                                            <li><a href="#">My Account</a></li>
                                            <li><a href="#">Compare</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="#">Elements</a>
                                        <ul>
                                            <li><a href="#">Accordions</a></li>
                                            <li><a href="#">Alert &amp; Notification</a></li>
                                            <li><a href="#">Blog Posts</a></li>
                                            <li><a href="#">Buttons</a></li>
                                            <li><a href="#">Call to Action</a></li>
                                            <li><a href="#">Icons</a></li>
                                            <li><a href="#">Icon Boxes</a></li>
                                            <li><a href="#">Instagrams</a></li>
                                            <li><a href="#">Product Category</a></li>
                                            <li><a href="#">Products</a></li>
                                            <li><a href="#">Tabs</a></li>
                                            <li><a href="#">Testimonials</a></li>
                                            <li><a href="#">Titles</a></li>
                                            <li><a href="#">Typography</a></li>

                                            <li><a href="#">Vendors</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                        <div class="header-right">
                            <a href="#" class="d-xl-show"><i class="w-icon-map-marker mr-1"></i>Track Order</a>
                            <a href="#"><i class="w-icon-sale"></i>Daily Deals</a>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- End of Header -->

        <!-- Start of Main-->
        <main class="main">
            @yield('content')
        </main>
        <!-- End of Main -->

        <!-- Start of Footer -->
        <footer class="footer appear-animate" data-animation-options="{
            'name': 'fadeIn'
        }">
            <div class="container">
                <div class="footer-newsletter">
                    <div class="row justify-content-center align-items-center">
                        <div class="col-xl-3 col-lg-2">
                            <a href="#" class="logo-footer">
                                <img src="assets/images/demos/demo5/logo-ukr-1.png" alt="logo-footer" width="145"
                                    height="45" />
                            </a>
                        </div>
                        <div class="col-xl-4 col-lg-5">
                            <div class="swiper-slide icon-box icon-box-side text-dark">
                                <div class="icon-box-icon d-inline-flex">
                                    <i class="w-icon-envelop3"></i>
                                </div>
                                <div class="icon-box-content">
                                    <h4 class="icon-box-title text-uppercase font-weight-bold">Subscribe To Our
                                        Newsletter</h4>
                                    <p>Get all the latest information on Events, Sales and Offers.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-5 col-lg-5 col-md-9 mt-4 mt-lg-0 ">
                            <form action="#" method="get"
                                class="input-wrapper input-wrapper-inline input-wrapper-rounded">
                                <input type="email" class="form-control mr-2 bg-white text-default" name="email"
                                    id="email" placeholder="Your E-mail Address" />
                                <button class="btn btn-primary btn-rounded" type="submit">Subscribe<i
                                        class="w-icon-long-arrow-right"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="footer-top">
                    <div class="row">
                        <div class="col-lg-5 col-sm-6">
                            <div class="widget widget-about">
                                <div class="widget-body">
                                    <p class="widget-about-title">Got Question? Call us 24/7</p>
                                    <a href="18005707777" class="widget-about-call">1-800-570-7777</a>
                                    <p class="widget-about-desc">Facilisi nullam vehicula ipsum a arcu cursus vitae
                                        congue. Pretium quam,
                                        elit ut aliquam purus sit. Porttitor rhoncus dolor purus non enim.
                                    </p>
                                    <label class="label-social d-block text-dark">Social Media</label>
                                    <div class="social-icons social-icons-colored">
                                        <a href="#" class="social-icon social-facebook w-icon-facebook"></a>
                                        <a href="#" class="social-icon social-twitter w-icon-twitter"></a>
                                        <a href="#" class="social-icon social-instagram w-icon-instagram"></a>
                                        <a href="#" class="social-icon social-youtube w-icon-youtube"></a>
                                        <a href="#" class="social-icon social-pinterest w-icon-pinterest"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2 col-sm-6">
                            <div class="widget">
                                <h3 class="widget-title">Company</h3>
                                <ul class="widget-body">
                                    <li><a href="#">About Us</a></li>
                                    <li><a href="#">Team Member</a></li>
                                    <li><a href="#">Career</a></li>
                                    <li><a href="#">Contact Us</a></li>
                                    <li><a href="#">Affilate</a></li>
                                    <li><a href="#">Order History</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-2 col-sm-6">
                            <div class="widget">
                                <h4 class="widget-title">My Account</h4>
                                <ul class="widget-body">
                                    <li><a href="#">Track My Order</a></li>
                                    <li><a href="#">View Cart</a></li>
                                    <li><a href="#">Sign In</a></li>
                                    <li><a href="#">Help</a></li>
                                    <li><a href="#">My Wishlist</a></li>
                                    <li><a href="#">Privacy Policy</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-2 col-sm-6">
                            <div class="widget">
                                <h4 class="widget-title">Customer Service</h4>
                                <ul class="widget-body">
                                    <li><a href="#">Payment Methods</a></li>
                                    <li><a href="#">Money-back guarantee!</a></li>
                                    <li><a href="#">Product Returns</a></li>
                                    <li><a href="#">Support Center</a></li>
                                    <li><a href="#">Shipping</a></li>
                                    <li><a href="#">Term and Conditions</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <div class="container">
                    <div class="footer-left">
                        <p class="copyright">Copyright © 2024 UKRBD Store. All Rights Reserved.</p>
                    </div>
                    <div class="footer-right">
                        <span class="payment-label mr-lg-8">We're using safe payment for</span>
                        <figure class="payment">
                            <img src="assets/images/payment.png" alt="payment" width="159" height="25" />
                        </figure>
                    </div>
                </div>
            </div>
        </footer>
        <!-- End of Footer -->
    </div>
    <!-- End of Page Wrapper -->

    <!-- Start of Sticky Footer -->
    <div class="sticky-footer sticky-content fix-bottom">
        <a href="#" class="sticky-link active">
            <i class="w-icon-home"></i>
            <p>Home</p>
        </a>
        <a href="#" class="sticky-link">
            <i class="w-icon-category"></i>
            <p>Shop</p>
        </a>
        <a href="#" class="sticky-link">
            <i class="w-icon-account"></i>
            <p>Account</p>
        </a>
        <div class="cart-dropdown dir-up">
            <a href="#" class="sticky-link">
                <i class="w-icon-cart"></i>
                <p>Cart</p>
            </a>
            <div class="dropdown-box">
                <div class="products">
                    <div class="product product-cart">
                        <div class="product-detail">
                            <h3 class="product-name">
                                <a href="#">Beige knitted elas<br>tic
                                    runner shoes</a>
                            </h3>
                            <div class="price-box">
                                <span class="product-quantity">1</span>
                                <span class="product-price">$25.68</span>
                            </div>
                        </div>
                        <figure class="product-media">
                            <a href="#">
                                <img src="assets/images/cart/product-1.jpg" alt="product" height="84" width="94" />
                            </a>
                        </figure>
                        <button class="btn btn-link btn-close" aria-label="button">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>

                    <div class="product product-cart">
                        <div class="product-detail">
                            <h3 class="product-name">
                                <a href="#">Blue utility pina<br>fore
                                    denim dress</a>
                            </h3>
                            <div class="price-box">
                                <span class="product-quantity">1</span>
                                <span class="product-price">$32.99</span>
                            </div>
                        </div>
                        <figure class="product-media">
                            <a href="#">
                                <img src="assets/images/cart/product-2.jpg" alt="product" width="84" height="94" />
                            </a>
                        </figure>
                        <button class="btn btn-link btn-close" aria-label="button">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>

                <div class="cart-total">
                    <label>Subtotal:</label>
                    <span class="price">$58.67</span>
                </div>

                <div class="cart-action">
                    <a href="#" class="btn btn-dark btn-outline btn-rounded">View Cart</a>
                    <a href="#" class="btn btn-primary  btn-rounded">Checkout</a>
                </div>
            </div>
            <!-- End of Dropdown Box -->
        </div>

        <div class="header-search hs-toggle dir-up">
            <a href="#" class="search-toggle sticky-link">
                <i class="w-icon-search"></i>
                <p>Search</p>
            </a>
            <form action="#" class="input-wrapper">
                <input type="text" class="form-control" name="search" autocomplete="off" placeholder="Search"
                    required />
                <button class="btn btn-search" type="submit">
                    <i class="w-icon-search"></i>
                </button>
            </form>
        </div>
    </div>
    <!-- End of Sticky Footer -->

    <!-- Start of Scroll Top -->
    <a id="scroll-top" class="scroll-top" href="#top" title="Top" role="button"> <i class="w-icon-angle-up"></i> <svg
            version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 70 70">
            <circle id="progress-indicator" fill="transparent" stroke="#000000" stroke-miterlimit="10" cx="35" cy="35"
                r="34" style="stroke-dasharray: 16.4198, 400;"></circle>
        </svg> </a>
    <!-- End of Scroll Top -->

    <!-- Start of Mobile Menu -->
    <div class="mobile-menu-wrapper">
        <div class="mobile-menu-overlay"></div>
        <!-- End of .mobile-menu-overlay -->

        <a href="#" class="mobile-menu-close"><i class="close-icon"></i></a>
        <!-- End of .mobile-menu-close -->

        <div class="mobile-menu-container scrollable">
            <form action="#" method="get" class="input-wrapper">
                <input type="text" class="form-control" name="search" autocomplete="off" placeholder="Search"
                    required />
                <button class="btn btn-search" type="submit">
                    <i class="w-icon-search"></i>
                </button>
            </form>
            <!-- End of Search Form -->
            <div class="tab">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a href="#main-menu" class="nav-link active">Main Menu</a>
                    </li>
                    <li class="nav-item">
                        <a href="#categories" class="nav-link">Categories</a>
                    </li>
                </ul>
            </div>
            <div class="tab-content">
                <div class="tab-pane active" id="main-menu">
                    <ul class="mobile-menu">
                        <li><a href="#">Home</a></li>
                        <li>
                            <a href="#">Shop</a>
                            <ul>
                                <li>
                                    <a href="#">Shop Pages</a>
                                    <ul>
                                        <li><a href="#">Banner With Sidebar</a></li>
                                        <li><a href="#">Boxed Banner</a></li>
                                        <li><a href="#">Full Width Banner</a></li>
                                        <li><a href="#">Horizontal Filter<span
                                                    class="tip tip-hot">Hot</span></a></li>
                                        <li><a href="#">Off Canvas Sidebar<span
                                                    class="tip tip-new">New</span></a></li>
                                        <li><a href="#">Infinite Ajax Scroll</a></li>
                                        <li><a href="#">Right Sidebar</a></li>
                                        <li><a href="#">Both Sidebar</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">Shop Layouts</a>
                                    <ul>
                                        <li><a href="#">3 Columns Mode</a></li>
                                        <li><a href="#">4 Columns Mode</a></li>
                                        <li><a href="#">5 Columns Mode</a></li>
                                        <li><a href="#">6 Columns Mode</a></li>
                                        <li><a href="#">7 Columns Mode</a></li>
                                        <li><a href="#">8 Columns Mode</a></li>
                                        <li><a href="#">List Mode</a></li>
                                        <li><a href="#">List Mode With Sidebar</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">Product Pages</a>
                                    <ul>
                                        <li><a href="#">Variable Product</a></li>
                                        <li><a href="#">Featured &amp; Sale</a></li>
                                        <li><a href="#">Data In Accordion</a></li>
                                        <li><a href="#">Data In Sections</a></li>
                                        <li><a href="#">Image Swatch</a></li>
                                        <li><a href="#">Extended Info</a>
                                        </li>
                                        <li><a href="#">Without Sidebar</a></li>
                                        <li><a href="#">360<sup>o</sup> &amp; Video<span
                                                    class="tip tip-new">New</span></a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">Product Layouts</a>
                                    <ul>
                                        <li><a href="#">Default<span
                                                    class="tip tip-hot">Hot</span></a></li>
                                        <li><a href="#">Vertical Thumbs</a></li>
                                        <li><a href="#">Grid Images</a></li>
                                        <li><a href="#">Masonry</a></li>
                                        <li><a href="#">Gallery</a></li>
                                        <li><a href="#">Sticky Info</a></li>
                                        <li><a href="#">Sticky Thumbs</a></li>
                                        <li><a href="#">Sticky Both</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">Vendor</a>
                            <ul>
                                <li>
                                    <a href="#">Store Listing</a>
                                    <ul>
                                        <li><a href="#">Store listing 1</a></li>
                                        <li><a href="#">Store listing 2</a></li>
                                        <li><a href="#">Store listing 3</a></li>
                                        <li><a href="#">Store listing 4</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">Vendor Store</a>
                                    <ul>
                                        <li><a href="#">Vendor Store 1</a></li>
                                        <li><a href="#">Vendor Store 2</a></li>
                                        <li><a href="#">Vendor Store 3</a></li>
                                        <li><a href="#">Vendor Store 4</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">Blog</a>
                            <ul>
                                <li><a href="#">Classic</a></li>
                                <li><a href="#">Listing</a></li>
                                <li>
                                    <a href="#">Grid</a>
                                    <ul>
                                        <li><a href="#">Grid 2 columns</a></li>
                                        <li><a href="#">Grid 3 columns</a></li>
                                        <li><a href="#">Grid 4 columns</a></li>
                                        <li><a href="#">Grid sidebar</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">Masonry</a>
                                    <ul>
                                        <li><a href="#">Masonry 2 columns</a></li>
                                        <li><a href="#">Masonry 3 columns</a></li>
                                        <li><a href="#">Masonry 4 columns</a></li>
                                        <li><a href="#">Masonry sidebar</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">Mask</a>
                                    <ul>
                                        <li><a href="#">Blog mask grid</a></li>
                                        <li><a href="#">Blog mask masonry</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">Single Post</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">Pages</a>
                            <ul>

                                <li><a href="#">About Us</a></li>
                                <li><a href="#">Become A Vendor</a></li>
                                <li><a href="#">Contact Us</a></li>
                                <li><a href="#">Login</a></li>
                                <li><a href="#">FAQs</a></li>
                                <li><a href="#">Error 404</a></li>
                                <li><a href="#">Coming Soon</a></li>
                                <li><a href="#">Wishlist</a></li>
                                <li><a href="#">Cart</a></li>
                                <li><a href="#">Checkout</a></li>
                                <li><a href="#">My Account</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">Elements</a>
                            <ul>
                                <li><a href="#">Products</a></li>
                                <li><a href="#">Titles</a></li>
                                <li><a href="#">Typography</a></li>
                                <li><a href="#">Product Category</a></li>
                                <li><a href="#">Buttons</a></li>
                                <li><a href="#">Accordions</a></li>
                                <li><a href="#">Alert &amp; Notification</a></li>
                                <li><a href="#">Tabs</a></li>
                                <li><a href="#">Testimonials</a></li>
                                <li><a href="#">Blog Posts</a></li>
                                <li><a href="#">Instagrams</a></li>
                                <li><a href="#">Call to Action</a></li>
                                <li><a href="#">Vendors</a></li>
                                <li><a href="#">Icon Boxes</a></li>
                                <li><a href="#">Icons</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="tab-pane" id="categories">
                    <ul class="mobile-menu">
                        <li>
                            <a href="#">
                                <i class="w-icon-tshirt2"></i>Fashion
                            </a>
                            <ul>
                                <li>
                                    <a href="#">Women</a>
                                    <ul>
                                        <li><a href="#">New Arrivals</a>
                                        </li>
                                        <li><a href="#">Best Sellers</a>
                                        </li>
                                        <li><a href="#">Trending</a></li>
                                        <li><a href="#">Clothing</a></li>
                                        <li><a href="#">Shoes</a></li>
                                        <li><a href="#">Bags</a></li>
                                        <li><a href="#">Accessories</a>
                                        </li>
                                        <li><a href="#">Jewlery &
                                                Watches</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">Men</a>
                                    <ul>
                                        <li><a href="#">New Arrivals</a>
                                        </li>
                                        <li><a href="#">Best Sellers</a>
                                        </li>
                                        <li><a href="#">Trending</a></li>
                                        <li><a href="#">Clothing</a></li>
                                        <li><a href="#">Shoes</a></li>
                                        <li><a href="#">Bags</a></li>
                                        <li><a href="#">Accessories</a>
                                        </li>
                                        <li><a href="#">Jewlery &
                                                Watches</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">
                                <i class="w-icon-home"></i>Home & Garden
                            </a>
                            <ul>
                                <li>
                                    <a href="#">Bedroom</a>
                                    <ul>
                                        <li><a href="#">Beds, Frames &
                                                Bases</a></li>
                                        <li><a href="#">Dressers</a></li>
                                        <li><a href="#">Nightstands</a>
                                        </li>
                                        <li><a href="#">Kid's Beds &
                                                Headboards</a></li>
                                        <li><a href="#">Armoires</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">Living Room</a>
                                    <ul>
                                        <li><a href="#">Coffee Tables</a>
                                        </li>
                                        <li><a href="#">Chairs</a></li>
                                        <li><a href="#">Tables</a></li>
                                        <li><a href="#">Futons & Sofa
                                                Beds</a></li>
                                        <li><a href="#">Cabinets &
                                                Chests</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">Office</a>
                                    <ul>
                                        <li><a href="#">Office Chairs</a>
                                        </li>
                                        <li><a href="#">Desks</a></li>
                                        <li><a href="#">Bookcases</a></li>
                                        <li><a href="#">File Cabinets</a>
                                        </li>
                                        <li><a href="#">Breakroom
                                                Tables</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">Kitchen & Dining</a>
                                    <ul>
                                        <li><a href="#">Dining Sets</a>
                                        </li>
                                        <li><a href="#">Kitchen Storage
                                                Cabinets</a></li>
                                        <li><a href="#">Bashers Racks</a>
                                        </li>
                                        <li><a href="#">Dining Chairs</a>
                                        </li>
                                        <li><a href="#">Dining Room
                                                Tables</a></li>
                                        <li><a href="#">Bar Stools</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">
                                <i class="w-icon-electronics"></i>Electronics
                            </a>
                            <ul>
                                <li>
                                    <a href="#">Laptops &amp; Computers</a>
                                    <ul>
                                        <li><a href="#">Desktop
                                                Computers</a></li>
                                        <li><a href="#">Monitors</a></li>
                                        <li><a href="#">Laptops</a></li>
                                        <li><a href="#">Hard Drives &amp;
                                                Storage</a></li>
                                        <li><a href="#">Computer
                                                Accessories</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">TV &amp; Video</a>
                                    <ul>
                                        <li><a href="#">TVs</a></li>
                                        <li><a href="#">Home Audio
                                                Speakers</a></li>
                                        <li><a href="#">Projectors</a></li>
                                        <li><a href="#">Media Streaming
                                                Devices</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">Digital Cameras</a>
                                    <ul>
                                        <li><a href="#">Digital SLR
                                                Cameras</a></li>
                                        <li><a href="#">Sports & Action
                                                Cameras</a></li>
                                        <li><a href="#">Camera Lenses</a>
                                        </li>
                                        <li><a href="#">Photo Printer</a>
                                        </li>
                                        <li><a href="#">Digital Memory
                                                Cards</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">Cell Phones</a>
                                    <ul>
                                        <li><a href="#">Carrier Phones</a>
                                        </li>
                                        <li><a href="#">Unlocked Phones</a>
                                        </li>
                                        <li><a href="#">Phone & Cellphone
                                                Cases</a></li>
                                        <li><a href="#">Cellphone
                                                Chargers</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">
                                <i class="w-icon-furniture"></i>Furniture
                            </a>
                            <ul>
                                <li>
                                    <a href="#">Furniture</a>
                                    <ul>
                                        <li><a href="#">Sofas & Couches</a>
                                        </li>
                                        <li><a href="#">Armchairs</a></li>
                                        <li><a href="#">Bed Frames</a></li>
                                        <li><a href="#">Beside Tables</a>
                                        </li>
                                        <li><a href="#">Dressing Tables</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">Lighting</a>
                                    <ul>
                                        <li><a href="#">Light Bulbs</a>
                                        </li>
                                        <li><a href="#">Lamps</a></li>
                                        <li><a href="#">Celling Lights</a>
                                        </li>
                                        <li><a href="#">Wall Lights</a>
                                        </li>
                                        <li><a href="#">Bathroom
                                                Lighting</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">Home Accessories</a>
                                    <ul>
                                        <li><a href="#">Decorative
                                                Accessories</a></li>
                                        <li><a href="#">Candals &
                                                Holders</a></li>
                                        <li><a href="#">Home Fragrance</a>
                                        </li>
                                        <li><a href="#">Mirrors</a></li>
                                        <li><a href="#">Clocks</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">Garden & Outdoors</a>
                                    <ul>
                                        <li><a href="#">Garden
                                                Furniture</a></li>
                                        <li><a href="#">Lawn Mowers</a>
                                        </li>
                                        <li><a href="#">Pressure
                                                Washers</a></li>
                                        <li><a href="#">All Garden
                                                Tools</a></li>
                                        <li><a href="#">Outdoor Dining</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">
                                <i class="w-icon-heartbeat"></i>Healthy & Beauty
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="w-icon-gift"></i>Gift Ideas
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="w-icon-gamepad"></i>Toy & Games
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="w-icon-ice-cream"></i>Cooking
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="w-icon-ios"></i>Smart Phones
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="w-icon-camera"></i>Cameras & Photo
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="w-icon-ruby"></i>Accessories
                            </a>
                        </li>
                        <li>
                            <a href="#"
                                class="font-weight-bold text-primary text-uppercase ls-25">
                                View All Categories<i class="w-icon-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End of Mobile Menu -->

    <!-- Start of Newsletter popup -->
    {{-- <div class="newsletter-popup mfp-hide">
        <div class="newsletter-content">
            <h4 class="text-uppercase font-weight-normal ls-25">Get Up to<span class="text-primary">25% Off</span></h4>
            <h2 class="ls-25">Sign up to Wolmart</h2>
            <p class="text-light ls-10">Subscribe to the Wolmart market newsletter to
                receive updates on special offers.</p>
            <form action="#" method="get" class="input-wrapper input-wrapper-inline input-wrapper-round">
                <input type="email" class="form-control email font-size-md" name="email" id="email2"
                    placeholder="Your email address" required="">
                <button class="btn btn-dark" type="submit">SUBMIT</button>
            </form>
            <div class="form-checkbox d-flex align-items-center">
                <input type="checkbox" class="custom-checkbox" id="hide-newsletter-popup" name="hide-newsletter-popup"
                    required="">
                <label for="hide-newsletter-popup" class="font-size-sm text-light">Don't show this popup again.</label>
            </div>
        </div>
    </div> --}}
    <!-- End of Newsletter popup -->

    <!-- Start of Quick View -->
    <div class="product product-single product-popup">
        <div class="row gutter-lg">
            <div class="col-md-6 mb-4 mb-md-0">
                <div class="product-gallery product-gallery-sticky">
                    <div class="swiper-container product-single-swiper swiper-theme nav-inner">
                        <div class="swiper-wrapper row cols-1 gutter-no">
                            <div class="swiper-slide">
                                <figure class="product-image">
                                    <img src="assets/images/products/popup/1-440x494.jpg"
                                        data-zoom-image="assets/images/products/popup/1-800x900.jpg"
                                        alt="Water Boil Black Utensil" width="800" height="900">
                                </figure>
                            </div>
                            <div class="swiper-slide">
                                <figure class="product-image">
                                    <img src="assets/images/products/popup/2-440x494.jpg"
                                        data-zoom-image="assets/images/products/popup/2-800x900.jpg"
                                        alt="Water Boil Black Utensil" width="800" height="900">
                                </figure>
                            </div>
                            <div class="swiper-slide">
                                <figure class="product-image">
                                    <img src="assets/images/products/popup/3-440x494.jpg"
                                        data-zoom-image="assets/images/products/popup/3-800x900.jpg"
                                        alt="Water Boil Black Utensil" width="800" height="900">
                                </figure>
                            </div>
                            <div class="swiper-slide">
                                <figure class="product-image">
                                    <img src="assets/images/products/popup/4-440x494.jpg"
                                        data-zoom-image="assets/images/products/popup/4-800x900.jpg"
                                        alt="Water Boil Black Utensil" width="800" height="900">
                                </figure>
                            </div>
                        </div>
                        <button class="swiper-button-next"></button>
                        <button class="swiper-button-prev"></button>
                    </div>
                    <div class="product-thumbs-wrap swiper-container" data-swiper-options="{
                        'navigation': {
                            'nextEl': '.swiper-button-next',
                            'prevEl': '.swiper-button-prev'
                        }
                    }">
                        <div class="product-thumbs swiper-wrapper row cols-4 gutter-sm">
                            <div class="product-thumb swiper-slide">
                                <img src="assets/images/products/popup/1-103x116.jpg" alt="Product Thumb" width="103"
                                    height="116">
                            </div>
                            <div class="product-thumb swiper-slide">
                                <img src="assets/images/products/popup/2-103x116.jpg" alt="Product Thumb" width="103"
                                    height="116">
                            </div>
                            <div class="product-thumb swiper-slide">
                                <img src="assets/images/products/popup/3-103x116.jpg" alt="Product Thumb" width="103"
                                    height="116">
                            </div>
                            <div class="product-thumb swiper-slide">
                                <img src="assets/images/products/popup/4-103x116.jpg" alt="Product Thumb" width="103"
                                    height="116">
                            </div>
                        </div>
                        <button class="swiper-button-next"></button>
                        <button class="swiper-button-prev"></button>
                    </div>
                </div>
            </div>
            <div class="col-md-6 overflow-hidden p-relative">
                <div class="product-details scrollable pl-0">
                    <h2 class="product-title">Electronics Black Wrist Watch</h2>
                    <div class="product-bm-wrapper">
                        <figure class="brand">
                            <img src="assets/images/products/brand/brand-1.jpg" alt="Brand" width="102" height="48" />
                        </figure>
                        <div class="product-meta">
                            <div class="product-categories">
                                Category:
                                <span class="product-category"><a href="#">Electronics</a></span>
                            </div>
                            <div class="product-sku">
                                SKU: <span>MS46891340</span>
                            </div>
                        </div>
                    </div>

                    <hr class="product-divider">

                    <div class="product-price">$40.00</div>

                    <div class="ratings-container">
                        <div class="ratings-full">
                            <span class="ratings" style="width: 80%;"></span>
                            <span class="tooltiptext tooltip-top"></span>
                        </div>
                        <a href="#" class="rating-reviews">(3 Reviews)</a>
                    </div>

                    <div class="product-short-desc">
                        <ul class="list-type-check list-style-none">
                            <li>Ultrices eros in cursus turpis massa cursus mattis.</li>
                            <li>Volutpat ac tincidunt vitae semper quis lectus.</li>
                            <li>Aliquam id diam maecenas ultricies mi eget mauris.</li>
                        </ul>
                    </div>

                    <hr class="product-divider">

                    <div class="product-form product-variation-form product-color-swatch">
                        <label>Color:</label>
                        <div class="d-flex align-items-center product-variations">
                            <a href="#" class="color" style="background-color: #ffcc01"></a>
                            <a href="#" class="color" style="background-color: #ca6d00;"></a>
                            <a href="#" class="color" style="background-color: #1c93cb;"></a>
                            <a href="#" class="color" style="background-color: #ccc;"></a>
                            <a href="#" class="color" style="background-color: #333;"></a>
                        </div>
                    </div>
                    <div class="product-form product-variation-form product-size-swatch">
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

                    <div class="product-form">
                        <div class="product-qty-form">
                            <div class="input-group">
                                <input class="quantity form-control" type="number" min="1" max="10000000">
                                <button class="quantity-plus w-icon-plus"></button>
                                <button class="quantity-minus w-icon-minus"></button>
                            </div>
                        </div>
                        <button class="btn btn-primary btn-cart">
                            <i class="w-icon-cart"></i>
                            <span>Add to Cart</span>
                        </button>
                    </div>

                    <div class="social-links-wrapper">
                        <div class="social-links">
                            <div class="social-icons social-no-color border-thin">
                                <a href="#" class="social-icon social-facebook w-icon-facebook"></a>
                                <a href="#" class="social-icon social-twitter w-icon-twitter"></a>
                                <a href="#" class="social-icon social-pinterest fab fa-pinterest-p"></a>
                                <a href="#" class="social-icon social-whatsapp fab fa-whatsapp"></a>
                                <a href="#" class="social-icon social-youtube fab fa-linkedin-in"></a>
                            </div>
                        </div>
                        <span class="divider d-xs-show"></span>
                        <div class="product-link-wrapper d-flex">
                            <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"><span></span></a>
                            <a href="#"
                                class="btn-product-icon btn-compare btn-icon-left w-icon-compare"><span></span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End of Quick view -->

    <!-- Plugin JS File -->
    @yield('script')
    <script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="{{asset('assets/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('assets/vendor/jquery.plugin/jquery.plugin.min.js')}}"></script>
    <script src="{{asset('assets/vendor/parallax/parallax.min.js')}}"></script>
    <script src="{{asset('assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
    <script src="{{asset('assets/vendor/imagesloaded/imagesloaded.pkgd.min.js')}}"></script>
    <script src="{{asset('assets/vendor/jquery.countdown/jquery.countdown.min.js')}}"></script>
    {{-- <script src="{{asset('assets/vendor/magnific-popup/jquery.magnific-popup.min.js')}}"></script> --}}
    <script src="{{asset('assets/vendor/floating-parallax/parallax.min.js')}}"></script>
    <script src="{{asset('assets/vendor/zoom/jquery.zoom.js')}}"></script>
    <script src="{{asset('assets/vendor/skrollr/skrollr.min.js')}}"></script>

    <script src="{{asset('assets/js/main.min.js')}}"></script>
</body>