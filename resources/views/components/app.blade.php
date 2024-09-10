@php

    $categories = Cache::remember('main_categories', 100, function () {
    return App\Models\Prodcat::with('childrens')->where('parent_id', null)->limit(11)->get();
});

@endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">

    <title>UKRBD</title>

    <meta name="keywords" content="{{ env('APP_NAME') }}" />
    <meta name="description" content="{{ env('APP_NAME') }}">


    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('assets/images/icons/favicon.png') }}">

    <!-- WebFont.js -->
    <script>
        WebFontConfig = {
            google: {
                families: ['Poppins:400,500,600,700,800']
            }
        };
        (function(d) {
            var wf = d.createElement('script'),
                s = d.scripts[0];
            wf.src = 'assets/js/webfont.js';
            wf.async = true;
            s.parentNode.insertBefore(wf, s);
        })(document);
    </script>
    <script>
        const base_url = "{{ url('/') }}"
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="preload" href="assets/vendor/fontawesome-free/webfonts/fa-regular-400.woff2" as="font"
        type="font/woff2" crossorigin="anonymous">
    <link rel="preload" href="assets/vendor/fontawesome-free/webfonts/fa-solid-900.woff2" as="font"
        type="font/woff2" crossorigin="anonymous">
    <link rel="preload" href="assets/vendor/fontawesome-free/webfonts/fa-brands-400.woff2" as="font"
        type="font/woff2" crossorigin="anonymous">
    <link rel="preload" href="assets/fonts/wolmart87d5.woff?png09e" as="font" type="font/woff"
        crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/css/star-rating.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/toastr.css') }}">
    <style>
        #division-select{
            border: none;
            font-size: 16px;
            color: #000;
            font-weight: 600;
            padding-left: 40px !important;
        }
        /* Dropdown button */
        .dropdown .wishlist.label-down.link.d-xs-show {
            border: none;
            background-color: white;
        }

        .dropdown .wishlist.label-down.link.d-xs-show i.w-icon-user {
            font-weight: 600;
        }

        /* Dropdown menu */
        .dropdown .dropdown-menu {
            display: none;
            position: absolute;
            background-color: #fff;
            min-width: 100px;
            z-index: 1000;
        }

        .dropdown:hover .dropdown-menu {
            display: block;
        }

        .dropdown-menu .dropdown-item {
            font-size: small;
        }

        .dropdown-menu .dropdown-item.wishlist-label.d-lg-show {
            display: block;
        }

        .dropdown-menu .dropdown-item.wishlist-label.d-lg-show:last-child {
            margin-bottom: 0;
        }

        .dropdown-menu .dropdown-item.wishlist-label.d-lg-show:hover {
            background-color: #f8f9fa;
        }

        .logout-button {
            border-radius: 0;
            margin: 0;
            font-family: inherit;
            font-size: inherit;
            line-height: inherit;
            overflow: visible;
            text-transform: none;
            -webkit-appearance: button;
            -webkit-transition: all 0.3s ease 0s;
            transition: all 0.3s ease 0s;
            text-decoration: none;
            background-color: transparent;
            border: 0;
            cursor: pointer;
        }

        .logout-button:hover {
            background-color: #f8f9fa;
            color: #007cc;
        }
        .slider-image{
            aspect-ratio: 4/2 !important;
        }
    </style>
    {{ $css ?? null }}
    @stack('css')
</head>

<body class="home">
    <div class="page-wrapper">
        <!-- Start of Header -->
        <header class="header">

            <!-- End of Header Top -->

            <x-app.header-top :categories="$categories" />
            <!-- End of Header Middle -->

            <x-app.header-middle :categories="$categories" />
        </header>
        <!-- End of Header -->

        <!-- Start of Main-->
        <main class="main">
            {{ $slot }}
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
                                <img src="{{ Voyager::image(setting('site.logo')) }}" alt="logo-footer" width="145"
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
                            <form action="{{ route('subscribe') }}" method="POST"
                                class="input-wrapper input-wrapper-inline input-wrapper-rounded">
                                @csrf
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
                                    <a href="#" class="widget-about-call">{{ setting('site.phone') }}</a>
                                    <p class="widget-about-desc">{{ setting('site.description') }}
                                    </p>
                                    <label class="label-social d-block text-dark">Social Media</label>
                                    <div class="social-icons social-icons-colored">
                                        <a href="{{ setting('social.fb_link') }}"
                                            class="social-icon social-facebook w-icon-facebook"></a>
                                        <a href="{{ setting('social.youtube_link') }}"
                                            class="social-icon social-youtube w-icon-youtube"></a>
                                        {{-- <a href="#" class="social-icon social-twitter w-icon-twitter"></a>
                                        <a href="#" class="social-icon social-instagram w-icon-instagram"></a>
                                        <a href="#" class="social-icon social-pinterest w-icon-pinterest"></a> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2 col-sm-6">
                            <div class="widget">
                                <h4 class="widget-title">My Account</h4>
                                <ul class="widget-body">
                                    {!! menu('leftside', 'bootstrap') !!}
                                </ul>
                            </div>
                        </div>


                        <div class="col-lg-2 col-sm-6">
                            <div class="widget">
                                <h4 class="widget-title">Customer Service</h4>
                                <ul class="widget-body">
                                    {!! menu('middle', 'bootstrap') !!}
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-2 col-sm-6">
                            <div class="widget">
                                <h3 class="widget-title">Company</h3>
                                <ul class="widget-body">
                                    {!! menu('main', 'bootstrap') !!}
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
        <a href="{{ route('homepage') }}" class="sticky-link active">
            <i class="w-icon-home"></i>
            <p>Home</p>
        </a>
        <a href="{{ route('shops') }}" class="sticky-link">
            <i class="w-icon-category"></i>
            <p>E-Shops</p>
        </a>
        <a href="{{auth()->check() ? route('user.dashboard') : route('login')}}" class="sticky-link">
            <i class="w-icon-account"></i>
            <p>Account</p>
        </a>
        {{-- <div class="cart-dropdown dir-up"> --}}
            <a href="{{route('cart')}}" class="sticky-link">
                <i class="w-icon-cart"></i>
                <p>Cart</p>
            </a>
            {{-- <div class="dropdown-box">
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
            </div> --}}
            <!-- End of Dropdown Box -->
        {{-- </div> --}}

        {{-- <div class="header-search hs-toggle dir-up">
            <a href="#" class="search-toggle sticky-link">
                <i class="w-icon-search"></i>
                <p>Search</p>
            </a>
            <form action="{{route('shops')}}" class="input-wrapper">
                <input type="text" class="form-control" name="search" autocomplete="off" placeholder="Search"
                    required />
                <button class="btn btn-search" type="submit">
                    <i class="w-icon-search"></i>
                </button>
            </form>
        </div> --}}
    </div>
    <!-- End of Sticky Footer -->

    <!-- Start of Scroll Top -->
    <a id="scroll-top" class="scroll-top" href="#top" title="Top" role="button"> <i
            class="w-icon-angle-up"></i> <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 70 70">
            <circle id="progress-indicator" fill="transparent" stroke="#000000" stroke-miterlimit="10"
                cx="35" cy="35" r="34" style="stroke-dasharray: 16.4198, 400;"></circle>
        </svg> </a>
    <!-- End of Scroll Top -->

    <!-- Start of Mobile Menu -->
    <div class="mobile-menu-wrapper">
        <div class="mobile-menu-overlay"></div>
        <!-- End of .mobile-menu-overlay -->

        <a href="#" class="mobile-menu-close"><i class="close-icon"></i></a>
        <!-- End of .mobile-menu-close -->

        <div class="mobile-menu-container scrollable">
            <form action="{{ route('shops') }}" method="get" class="input-wrapper">
                <input type="text" class="form-control" name="search" autocomplete="off" placeholder="Search"
                    required />
                <button class="btn btn-search" type="submit">
                    <i class="w-icon-search"></i>
                </button>
            </form>
            <!-- End of Search Form -->
            {{-- <div class="tab">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a href="#main-menu" class="nav-link active">Main Menu</a>
                    </li>
                    <li class="nav-item">
                        <a href="#categories" class="nav-link">Categories</a>
                    </li>
                </ul>
            </div> --}}
            <div class="tab-content">
                <div class="tab-pane active" id="main-menu">
                    <ul class="mobile-menu">
                        <li><a href="{{ route('homepage') }}">Home</a></li>
                        <li>
                            <a href="{{ route('shops') }}">Shop</a>

                        </li>
                        <li>
                            <a href="{{ route('vendors') }}">E-shops</a>

                        </li>

                        <li>
                            <a href="#">
                                User

                            </a>
                            <ul>
                                @if (!auth()->check())
                                    <li><a href="{{ route('login') }}">Login</a></li>
                                    <li><a href="{{ route('register') }}">Register</a></li>
                                    <li><a href="{{ route('vendor.create') }}">Register as a vendor</a></li>
                                @elseif(auth()->user()->role_id == 3)
                                    <li><a href="{{ route('vendor.dashboard') }}">My Account</a></li>

                                    <li>
                                        <form action="{{ route('logout') }}" method="post">
                                            @csrf
                                            <button type="submit" class="logout-button ml-4 "
                                                style="font-size: small">
                                                Logout</button>

                                        </form>
                                    </li>
                                @elseif(auth()->user()->role_id == 1)
                                    <li><a href="{{ url('/admin') }}">My Account</a></li>
                                    <li>
                                        <form action="{{ route('logout') }}" method="post">
                                            @csrf
                                            <button type="submit" class=" ml-4 " style="font-size: small">
                                                Logout</button>

                                        </form>
                                    </li>
                                @else
                                    <li><a href="{{ route('user.dashboard') }}">My Account</a></li>
                                    <li>
                                        <form action="{{ route('logout') }}" method="post">
                                            @csrf
                                            <button type="submit" class=" ml-4 " style="font-size: small">
                                                Logout</button>

                                        </form>
                                    </li>
                                @endif
                            </ul>
                        </li>
                        
                    </ul>
                </div>
             
            </div>
        </div>
    </div>
    <!-- End of Mobile Menu -->

  

    <!-- Start of Quick View -->
    <div class="product product-single product-popup">
        <div class="row gutter-lg" id="quick_view">

        </div>
    </div>

    <!-- End of Quick view -->

    <!-- Plugin JS File -->

    <script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/jquery.plugin/jquery.plugin.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/parallax/parallax.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/jquery.countdown/jquery.countdown.min.js') }}"></script>
    {{-- <script src="{{asset('assets/vendor/magnific-popup/jquery.magnific-popup.min.js')}}"></script> --}}
    <script src="{{ asset('assets/vendor/floating-parallax/parallax.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/zoom/jquery.zoom.js') }}"></script>
    <script src="{{ asset('assets/vendor/skrollr/skrollr.min.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
    </script>

    <script src="{{ asset('assets/js/main.min.js') }}"></script>
    <script src="{{ asset('assets/js/star-rating.js') }}"></script>
    <script src="{{ asset('assets/js/filter.js') }}"></script>

    @yield('script')
    <script>
        function cartQnty() {
            $.ajax({
                type: 'get',
                url: '/cart-qty',
                success: function(response) {
                    console.log(response);

                    $('#cartQty').text(response);
                    $('#cartQty2').text(response);
                    if (response == 0) {
                        $('#cartQty').hide();
                    } else {
                        $('#cartQty').show();
                    }
                },
                error: function(xhr) {
                    // Handle the error response
                    console.log(xhr.responseText);
                }
            });
        }

        cartQnty();
        console.log(cartQnty())
        $(document).ready(function() {
            $('.cart-store').click(function() {
                var addToCartBtn = $(this);
                var productId = $(this).data('product-id');
                var quantity = $('.addToCartForm_' + productId).find('.qty').val();
                var oldQty = "{{ Cart::getTotalQuantity() }}";
                var parentDiv = $(this).closest('.ec-product-inner');

                $.ajax({
                    type: 'POST',
                    url: '/add-cart',
                    data: {
                        _token: '{{ csrf_token() }}',
                        product_id: productId,
                        quantity: quantity
                    },
                    success: function(response) {
                        // Handle the success response
                        console.log(response);
                        cartQnty();
                        addToCartBtn.attr('disabled', true);
                        addToCartBtn.css('background-color', '#2A9CF5 !important').attr(
                            'disabled', true);
                        addToCartBtn.attr('title', 'added');


                    },
                    error: function(xhr) {
                        // Handle the error response
                        console.log(xhr.responseText);
                    }
                });
            });
        });
    </script>

    <script>
        function quickView(id) {

            $.ajax({
                url: '/quickview',
                method: 'GET',
                data: {
                    product_id: id
                },
                success: function(response) {
                    // $('#ec_quickview_modal').modal('show')
                    $('#quick_view').html(response)
                },

            });
        }
    </script>

    <script>
        function wishlist(id) {

            $.ajax({
                url: '/wishlist/add',
                method: 'GET',
                data: {
                    productId: id
                },
                success: function() {
                    var element = $('.add-wish-new_' + id);
                    if (element.hasClass('fa-solid')) {
                        element.addClass('fa-regular').removeClass('fa-solid text-success');
                    } else {
                        element.addClass('fa-solid text-success').removeClass('fa-regular ');
                    }


                }

            });
        }
    </script>
    <script>
        var shopUrl = "{{ route('shops') }}";

        $(document).ready(function() {
            $('#ratingForm input[type="checkbox"]').on('change', function() {
                if ($(this).is(':checked')) {
                    updateSearchParams("ratings", $(this).val(), shopUrl);
                } else {

                    removeSearchParam("ratings", shopUrl);
                }
            });

          

        });

        function updateSearchParams(searchParam, searchValue, route, priceMin, priceMax) {
            var url;

            if (window.location.pathname !== "/shops" || (new URL(route)).pathname == '/vendors') {
                url = new URL(route);
            } else {
                url = new URL(window.location.href);
            }

            url.searchParams.set(searchParam, searchValue);

            // Set the price range parameters if provided
            if (priceMin !== undefined) {
                url.searchParams.set('priceMin', priceMin);
            }

            if (priceMax !== undefined) {
                url.searchParams.set('priceMax', priceMax);
            }

            var existingParams = new URLSearchParams(window.location.search);
            existingParams.delete(searchParam);

            // Remove existing price range parameters
            existingParams.delete('priceMin');
            existingParams.delete('priceMax');

            existingParams.forEach(function(value, key) {
                url.searchParams.set(key, value);
            });

            var newUrl = url.href;
            window.location = newUrl;
        }

        function removeSearchParam(searchParam, route) {
            var url;

            if (window.location.pathname !== "/shops" || (new URL(route)).pathname == '/vendors') {
                url = new URL(route);
            } else {
                url = new URL(window.location.href);
            }

            var existingParams = new URLSearchParams(window.location.search);
            existingParams.delete(searchParam);

            var newUrl = url.href.split('?')[0] + '?' + existingParams.toString();
            window.location = newUrl;
        }
    </script>

    <script>
        $("#product_rating").rating({
            showCaption: true
        });
        $(".published_rating").rating({
            showCaption: false,
            readonly: true,
        });
    </script>

    <script src="{{ asset('assets/js/toastr.js') }}"></script>
    <script>
        toastr.options = {
            "newestOnTop": true,
            "positionClass": "toast-bottom-left",
            "preventDuplicates": true,
            "showDuration": "150",
            "hideDuration": "200",
            "timeOut": "4500",
            "extendedTimeOut": "500",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const lazyImages = document.querySelectorAll('img[loading="lazy"]');
            const imageObserver = new IntersectionObserver(function(entries, observer) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        const lazyImage = entry.target;
                        lazyImage.src = lazyImage.dataset.src;
                        lazyImage.onload = function() {
                            lazyImage.removeAttribute("data-src");
                            lazyImage.removeAttribute("loading");
                        };
                        observer.unobserve(lazyImage);
                    }
                });
            });

            lazyImages.forEach(function(lazyImage) {
                imageObserver.observe(lazyImage);
            });
        });
    </script>
    {{-- <x-alert/> --}}
    @stack('script')
    @if (session()->has('success_msg'))
        <x-alert.success />
    @endif
    @if (session()->has('error'))
        <x-alert.error />
    @endif

    <script>
            $(document).ready(function() {
        $('#division-select').change(function() {
            var selectedDivision = $(this).val();

            if (selectedDivision) {
                $.ajax({
                    url: '{{ url('select/division') }}', // The route to hit
                    method: 'GET', // You could also use POST if needed
                    data: {
                        division: selectedDivision,
                    },
                    success: function(response) {
                        // Handle the response if needed
                        window.location.reload(); 
                    },
                    error: function(xhr, status, error) {
                        console.log('Error:', error);
                    }
                });
            }
        });
    });
    </script>
</body>
