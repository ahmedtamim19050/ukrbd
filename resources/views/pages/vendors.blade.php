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
                    <ul class="breadcrumb mb-8">
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Vendor</a></li>


                    </ul>
                </div>
            </nav>
            <!-- End of Breadcrumb -->

            <!-- Start of Pgae Contetn -->
            <div class="page-content mb-4">
                <div class="container">
                    <div class="row cols-xl-3 cols-lg-5 cols-md-4 cols-sm-3 cols-2">
                        @foreach ($shops as $shop)
                        {{-- @dd($shop->products) --}}
                            <div class="vendor-brand-wrap mb-8">
                                <div class="vendor-brand">
                                    <x-shop.card :shop="$shop" />
                                </div>
                            </div>
                        @endforeach

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
