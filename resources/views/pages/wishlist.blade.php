<x-app>
    <x-slot name="css">
        <link rel="preload" href="assets/vendor/fontawesome-free/webfonts/fa-regular-400.woff2" as="font"
            type="font/woff2" crossorigin="anonymous">
        <link rel="preload" href="assets/vendor/fontawesome-free/webfonts/fa-solid-900.woff2" as="font"
            type="font/woff2" crossorigin="anonymous">
        <link rel="preload" href="assets/vendor/fontawesome-free/webfonts/fa-brands-400.woff2" as="font"
            type="font/woff2" crossorigin="anonymous">
        <link rel="preload" href="assets/fonts/wolmart87d5.woff?png09e" as="font" type="font/woff"
            crossorigin="anonymous">

        <!-- Vendor CSS -->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/fontawesome-free/css/all.min.css') }}">
        <link rel="stylesheet" type="text/css"
            href="{{ asset('assets/vendor/magnific-popup/magnific-popup.min.css') }}">

        <!-- Plugin CSS -->
        <link rel="stylesheet" type="text/css"
            href="{{ asset('assets/vendor/magnific-popup/magnific-popup.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}">

        <!-- Default CSS -->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.min.css') }}">
    </x-slot>

    <main class="main wishlist-page container">
        <!-- Start of Page Header -->
        <div class="page-header">
            <div class="container">
                <h1 class="page-title mb-0">Wishlist</h1>
            </div>
        </div>
        <!-- End of Page Header -->

        <!-- Start of Breadcrumb -->
        <nav class="breadcrumb-nav mb-10">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="demo1.html">Home</a></li>
                    <li>Wishlist</li>
                </ul>
            </div>
        </nav>
        <!-- End of Breadcrumb -->

        <!-- Start of PageContent -->
        <div class="page-content">
            <div class="container">
                <h3 class="wishlist-title">My wishlist</h3>
                @if ($products->count() > 0)
                    <table class="shop-table wishlist-table">
                        <thead>
                            <tr>
                                <th class="product-name"><span>Product</span></th>
                                <th></th>
                                <th class="product-price"><span>Price</span></th>
                                <th class="product-stock-status"><span>Stock Status</span></th>
                                <th class="wishlist-action">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <x-products.wishlist :product="$product" />
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <div class="row">
                        <div class="col-md-12">
                            <h3 class="m-4 poppins text-center " style="height: 40vh;"> No Products in Wishlist</h3>
                        </div>
                    </div>
                @endif
                <div class="social-links">
                    <label>Share On:</label>
                    <div class="social-icons social-no-color border-thin">
                        <a href="#" class="social-icon social-facebook w-icon-facebook"></a>
                        <a href="#" class="social-icon social-twitter w-icon-twitter"></a>
                        <a href="#" class="social-icon social-pinterest w-icon-pinterest"></a>
                        <a href="#" class="social-icon social-email far fa-envelope"></a>
                        <a href="#" class="social-icon social-whatsapp fab fa-whatsapp"></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- End of PageContent -->
    </main>


    <x-slot name="js">
        <script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
        <script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/vendor/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
        <script src="{{ asset('assets/vendor/magnific-popup/jquery.magnific-popup.min.js') }}"></script>
        <script src="{{ asset('assets/js/main.min.js') }}"></script>
    </x-slot>
</x-app>
