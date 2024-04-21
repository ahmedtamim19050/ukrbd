@php
    $images = json_decode($product->images) ?? [];

@endphp
<x-app>
    <x-slot name="css">
        <!-- Vendor CSS -->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/fontawesome-free/css/all.min.css') }}">

        <!-- Plugin CSS -->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/magnific-popup/magnific-popup.min.css') }}">

        <!-- Default CSS -->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.min.css') }}">

        <!-- Plugins CSS -->
        <link rel="stylesheet" href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/animate/animate.min.css') }}">
        <!-- Default CSS -->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/demo5.min.css') }}">

        <style>
            .radio-container {
                display: flex;
                flex-direction: column;
                position: relative;
            }

            input[type="radio"] {

                position: absolute;
                opacity: 0;
                left: 24px;
           
            }

            input[type="radio"]+label {
                font-size: 10px;
                cursor: pointer;
                margin-bottom: 10px;
            }

            input[type="radio"]+label:before {
                content: "";
                display: inline-block;
                width: 10px;
                height: 10px;
                border: 1px solid #4CACF7;
                border-radius: 50%;
                margin-right: 8px;
                vertical-align: middle;
            }

            input[type="radio"]:checked+label:before {
                background-color: #4CACF7;
                /* Change background color when checked */
            }
            .rating-container .rating-stars{
                height: 20px;
            }
        </style>
    </x-slot>



    <nav class="breadcrumb-nav container">
        <ul class="breadcrumb bb-no">
            <li><a href="{{ route('homepage') }}">Home</a></li>
            <li>Products</li>
        </ul>
        <ul class="product-nav list-style-none">
            <li class="product-nav-prev">
                <a href="#">
                    <i class="w-icon-angle-left"></i>
                </a>
                <span class="product-nav-popup">
                    <img src="{{ asset('assets/images/products/product-nav-prev.jpg') }}" alt="Product" width="110"
                        height="110" />
                    <span class="product-name">Soft Sound Maker</span>
                </span>
            </li>
            <li class="product-nav-next">
                <a href="#">
                    <i class="w-icon-angle-right"></i>
                </a>
                <span class="product-nav-popup">
                    <img src="{{ asset('assets/images/products/product-nav-next.jpg') }}" alt="Product" width="110"
                        height="110" />
                    <span class="product-name">Fabulous Sound Speaker</span>
                </span>
            </li>
        </ul>
    </nav>
    <!-- End of Breadcrumb -->

    <!-- Start of Page Content -->
    <div class="page-content">
        <div class="container">
            <div class="row gutter-lg">
                <div class="main-content">
                    <div class="product product-single row">
                        <div class="col-md-6 mb-6">
                            <div class="product-gallery product-gallery-sticky">
                                <div class="swiper-container product-single-swiper swiper-theme nav-inner"
                                    data-swiper-options="{
                                    'navigation': {
                                        'nextEl': '.swiper-button-next',
                                        'prevEl': '.swiper-button-prev'
                                    }
                                }">
                                    <div class="swiper-wrapper row cols-1 gutter-no">
                                        <div class="swiper-slide">
                                            <figure class="product-image">
                                                <img src="{{ Voyager::image($product->image) }}"
                                                    data-zoom-image="{{ Voyager::image($product->image) }}"
                                                    alt="Electronics Black Wrist Watch" width="800" height="900">
                                            </figure>
                                        </div>
                                        @if ($images)
                                            @foreach ($images as $image)
                                                <div class="swiper-slide">
                                                    <figure class="product-image">
                                                        <img src="{{ Voyager::image($image) }}"
                                                            data-zoom-image="{{ Voyager::image($image) }}"
                                                            alt="Electronics Black Wrist Watch" width="488"
                                                            height="549">
                                                    </figure>
                                                </div>
                                            @endforeach
                                        @endif

                                    </div>
                                    <button class="swiper-button-next"></button>
                                    <button class="swiper-button-prev"></button>
                                    <a href="#" class="product-gallery-btn product-image-full"><i
                                            class="w-icon-zoom"></i></a>
                                </div>
                                <div class="product-thumbs-wrap swiper-container"
                                    data-swiper-options="{
                                    'navigation': {
                                        'nextEl': '.swiper-button-next',
                                        'prevEl': '.swiper-button-prev'
                                    }
                                }">
                                    <div class="product-thumbs swiper-wrapper row cols-4 gutter-sm">
                                        @if ($images)
                                            @foreach ($images as $image)
                                                <div class="product-thumb swiper-slide">
                                                    <img src="{{ Voyager::image($image) }}" alt="Product Thumb"
                                                        width="800" height="900">
                                                </div>
                                            @endforeach
                                        @endif

                                        <div class="product-thumb swiper-slide">
                                            <img src="{{ Voyager::image($product->image) }}" alt="Product Thumb"
                                                width="800" height="900">
                                        </div>

                                    </div>
                                    <button class="swiper-button-next"></button>
                                    <button class="swiper-button-prev"></button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4 mb-md-6">
                            <div class="product-details" data-sticky-options="{'minWidth': 767}">
                                <h1 class="product-title">{{ $product->name }}</h1>
                                <div class="product-bm-wrapper">
                                    <figure class="brand">
                                        <img src="{{ $product->shop->logo ? Voyager::image($product->shop->logo) : asset('assets/images/defult.png') }}"
                                            alt="Brand" width="102" height="48" />
                                    </figure>
                                    <div class="product-meta">
                                        <div class="product-categories">
                                            Category:
                                            <span class="product-category">
                                                @if ($product->prodcats->count() > 0)
                                                    @foreach ($product->prodcats as $category)
                                                        <a href="#">{{ $category->name }} ,</a>
                                                    @endforeach

                                                @endif
                                            </span>
                                        </div>
                                        <div class="product-sku">
                                            SKU: <span>{{ $product->sku }}</span>
                                        </div>
                                    </div>
                                </div>

                                <hr class="product-divider">

                                <div class="product-price"><ins
                                        class="new-price">{{ Sohoj::price($product->price) }}</ins></div>

                                <div class="ratings-container">
                                    <input value="{{ Sohoj::average_rating($product->ratings) }}" class="rating published_rating" data-size="sm">
                                    <a href="#product-tab-reviews" class="rating-reviews scroll-to">{{$product->ratings->count()}}</a>
                                </div>

                                <div class="product-short-desc">
                                    {!! $product->short_description !!}
                                </div>

                                <hr class="product-divider">
                                <form class="" action="{{ route('cart.boynow') }}" method="POST">
                                    @csrf
                                    @if ($product->is_variable_product && count($product->subproductsuser) > 0)
                                        @foreach ($product->attributes as $attribute)
                                            <div
                                                class=" mt-2 pt-2 w-100 mb-2  product-variation-form product-size-swatc">
                                                <div class="form-group col-md-12 pl-0 ">
                                                    <h5 class="ms-3">{{ str_replace('_', ' ', $attribute->name) }}
                                                        </h4>
                                                        <div class="" role="group">
                                                            @foreach ($attribute->value as $value)
                                                                <input type="radio"
                                                                    class="btn-check {{ str_replace(' ', '_', $attribute->name) }}"
                                                                    name="variable_attribute[{{ $attribute->name }}]"
                                                                    id="{{ str_replace(' ', '_', $value) }}"
                                                                    value="{{ $value }}" required
                                                                    onclick="change_variable()">
                                                                <label class="btn btn-info p-2"
                                                                    style="padding: 5px 12px;"
                                                                    for="{{ str_replace(' ', '_', $value) }}">{{ str_replace('_', ' ', $value) }}</label>
                                                            @endforeach
                                                        </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif



                                    {{-- <div class="product-form product-variation-form product-size-swatch">
                                    <label class="mb-1">Size:</label>
                                    <div class="flex-wrap d-flex align-items-center product-variations">
                                        <a href="#" class="size">Small</a>
                                        <a href="#" class="size">Medium</a>
                                        <a href="#" class="size">Large</a>
                                        <a href="#" class="size">Extra Large</a>
                                    </div>
                                    <a href="#" class="product-variation-clean">Clean All</a>
                                </div> --}}

                                    {{-- <div class="product-variation-price">
                                    <span></span>
                                </div> --}}

                                    <div class="fix-bottom sticky-content">
                                        <div class="product-form container">
                                            {{-- <div class="product-qty-form">
                                            <form method="POST" action="{{ route('cart.update') }}">
                                                @csrf
                                                <div class="input-group">
                                                    <input type="hidden" name="product_id" value="{{ $product->id }}" />

                                                    <input value="{{ $product->quantity }}" min="1"
                                                        class=" form-control" type="number" name="quantity">
                                                    <button type="submit" class=" btn-apply bg-dark text-white">update</button>
                                                   
                                                </div>
                                            </form>
                                        </div> --}}
                                            <div class="product-qty-form">


                                                <input type="hidden" class="form-control qty" value="1"
                                                    min="1" name="quantity">
                                                <input type="hidden" name="product_id"
                                                    value="{{ $product->id }}" />

                                                <button type="submit" class="btn btn-primary" id="add_to_card">
                                                    <i class="w-icon-cart"></i>
                                                    <span>Add to Cart</span>
                                                </button>

                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <div class="social-links-wrapper">
                                    <div class="social-links">
                                        <div class="social-icons social-no-color border-thin">
                                            <a href="#" class="social-icon social-facebook w-icon-facebook"></a>
                                            <a href="#" class="social-icon social-twitter w-icon-twitter"></a>
                                            <a href="#"
                                                class="social-icon social-pinterest fab fa-pinterest-p"></a>
                                            <a href="#" class="social-icon social-whatsapp fab fa-whatsapp"></a>
                                            <a href="#"
                                                class="social-icon social-youtube fab fa-linkedin-in"></a>
                                        </div>
                                    </div>
                                    <span class="divider d-xs-show"></span>
                                    <div class="product-link-wrapper d-flex">
                                        <a href="javascript:void(0)" onclick="wishlist({{ $product->id }})"
                                            class="btn-product-icon btn-wishlist w-icon-heart"><span></span></a>
                                        {{-- <a href="#"
                                            class="btn-product-icon btn-compare btn-icon-left w-icon-compare"><span></span></a> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="frequently-bought-together mt-5">
                        <h2 class="title title-underline">Frequently Bought Together</h2>
                        <div class="bought-together-products row mt-8 pb-4">
                            <div class="product product-wrap text-center">
                                <figure class="product-media">
                                    <img src="{{asset('assets/images/products/default/bought-1.jpg')}}" alt="Product"
                                        width="138" height="138" />
                                    <div class="product-checkbox">
                                        <input type="checkbox" class="custom-checkbox" id="product_check1"
                                            name="product_check1">
                                        <label></label>
                                    </div>
                                </figure>
                                <div class="product-details">
                                    <h4 class="product-name">
                                        <a href="#">Electronics Black Wrist Watch</a>
                                    </h4>
                                    <div class="product-price">$40.00</div>
                                </div>
                            </div>
                            <div class="product product-wrap text-center">
                                <figure class="product-media">
                                    <img src="{{asset('assets/images/products/default/bought-2.jpg')}}" alt="Product"
                                        width="138" height="138" />
                                    <div class="product-checkbox">
                                        <input type="checkbox" class="custom-checkbox" id="product_check2"
                                            name="product_check2">
                                        <label></label>
                                    </div>
                                </figure>
                                <div class="product-details">
                                    <h4 class="product-name">
                                        <a href="#">Apple Laptop</a>
                                    </h4>
                                    <div class="product-price">$1,800.00</div>
                                </div>
                            </div>
                            <div class="product product-wrap text-center">
                                <figure class="product-media">
                                    <img src="{{asset('assets/images/products/default/bought-3.jpg')}}" alt="Product"
                                        width="138" height="138" />
                                    <div class="product-checkbox">
                                        <input type="checkbox" class="custom-checkbox" id="product_check3"
                                            name="product_check3">
                                        <label></label>
                                    </div>
                                </figure>
                                <div class="product-details">
                                    <h4 class="product-name">
                                        <a href="#">White Lenovo Headphone</a>
                                    </h4>
                                    <div class="product-price">$34.00</div>
                                </div>
                            </div>
                            <div class="product-button">
                                <div class="bought-price font-weight-bolder text-primary ls-50">$1,874.00</div>
                                <div class="bought-count">For 3 items</div>
                                <a href="cart.html" class="btn btn-dark btn-rounded">Add All To Cart</a>
                            </div>
                        </div>
                    </div> --}}
                <div class="tab tab-nav-boxed tab-nav-underline product-tabs">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a href="#product-tab-description" class="nav-link active">Description</a>
                        </li>
                        {{-- <li class="nav-item">
                            <a href="#product-tab-specification" class="nav-link">Specification</a>
                        </li> --}}
                        <li class="nav-item">
                            <a href="#product-tab-vendor" class="nav-link">Vendor Info</a>
                        </li>
                        <li class="nav-item">
                            <a href="#product-tab-reviews" class="nav-link">Customer Reviews {{ $product->ratings->count() > 0 ? $product->ratings->count() : ''  }}</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="product-tab-description">
                            <div class="row mb-4">
                                <div class="col-md-12 mb-5">
                                    {!! $product->description!!}
                                </div>
                              
                            </div>
                            {{-- <div class="row cols-md-3">
                                <div class="mb-3">
                                    <h5 class="sub-title font-weight-bold"><span class="mr-3">1.</span>Free
                                        Shipping &amp; Return</h5>
                                    <p class="detail pl-5">We offer free shipping for products on orders
                                        above 50$ and offer free delivery for all orders in US.</p>
                                </div>
                                <div class="mb-3">
                                    <h5 class="sub-title font-weight-bold"><span>2.</span>Free and Easy
                                        Returns</h5>
                                    <p class="detail pl-5">We guarantee our products and you could get back
                                        all of your money anytime you want in 30 days.</p>
                                </div>
                                <div class="mb-3">
                                    <h5 class="sub-title font-weight-bold"><span>3.</span>Special Financing
                                    </h5>
                                    <p class="detail pl-5">Get 20%-50% off items over 50$ for a month or
                                        over 250$ for a year with our special credit card.</p>
                                </div>
                            </div> --}}
                        </div>
                        {{-- <div class="tab-pane" id="product-tab-specification">
                            <ul class="list-none">
                                <li>
                                    <label>Model</label>
                                    <p>Skysuite 320</p>
                                </li>
                                <li>
                                    <label>Color</label>
                                    <p>Black</p>
                                </li>
                                <li>
                                    <label>Size</label>
                                    <p>Large, Small</p>
                                </li>
                                <li>
                                    <label>Guarantee Time</label>
                                    <p>3 Months</p>
                                </li>
                            </ul>
                        </div> --}}
                        <div class="tab-pane" id="product-tab-vendor">
                            <div class="row mb-3">
                                <div class="col-md-6 mb-4">
                                    <figure class="vendor-banner br-sm">
                                        <img src="{{ $product->shop->banner ? Voyager::image($product->shop->banner) : asset('assets/images/defult.png') }}"
                                            alt="Vendor Banner" width="610" height="295"
                                            style="background-color: #353B55;" />
                                    </figure>
                                </div>
                                <div class="col-md-6 pl-2 pl-md-6 mb-4">
                                    <div class="vendor-user">
                                        <figure class="vendor-logo mr-4">
                                            <a href="#">
                                                <img src="{{ $product->shop->logo ? Voyager::image($product->shop->logo) : asset('assets/images/defult.png') }}"
                                                    alt="Vendor Logo" width="80" height="80" />
                                            </a>
                                        </figure>
                                        <div>
                                            <div class="vendor-name"><a href="#">{{$product->shop->user->name}}</a></div>
                                            <div class="ratings-container">
                                                <div class="ratings-full">
                                                    <span class="ratings" style="width: 90%;"></span>
                                                    <span class="tooltiptext tooltip-top"></span>
                                                </div>
                                                <a href="#" class="rating-reviews">(32 Reviews)</a>
                                            </div>
                                        </div>
                                    </div>
                                    <ul class="vendor-info list-style-none">
                                        <li class="store-name">
                                            <label>Store Name:</label>
                                            <span class="detail">{{$product->shop->name}}</span>
                                        </li>
                                        <li class="store-address">
                                            <label>Address:</label>
                                            <span class="detail">{{$product->shop->post_code}}, {{$product->shop->city}}</span>
                                        </li>
                                        <li class="store-phone">
                                            <label>Phone:</label>
                                            <a href="#tel:">{{$product->shop->phone}}</a>
                                        </li>
                                        <li class="store-phone">
                                            <label>Email:</label>
                                            <a href="#tel:">{{$product->shop->email}}</a>
                                        </li>
                                    </ul>
                                    <a href="{{route('store_front',$product->shop->slug)}}"
                                        class="btn btn-dark btn-link btn-underline btn-icon-right">Visit
                                        Store<i class="w-icon-long-arrow-right"></i></a>
                                </div>
                            </div>
                             {!! $product->shop->description !!}
                        </div>
                        <div class="tab-pane" id="product-tab-reviews">
                            <div class="row mb-4">
                                <div class="col-xl-4 col-lg-5 mb-4">
                                    <div class="ratings-wrapper">
                                        <div class="avg-rating-container">
                                            <h4 class="avg-mark font-weight-bolder ls-50">{{Sohoj::average_rating($product->ratings)}}.1</h4>
                                            <div class="avg-rating">
                                                <p class="text-dark mb-1">Average Rating</p>
                                                <div class="ratings-container">
                                                    <input value="{{ Sohoj::average_rating($product->ratings) }}" class="rating published_rating" data-size="sm">
                                                    <a href="#" class="rating-reviews">({{$product->ratings->count()}} Reviews)</a>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- <div class="ratings-value d-flex align-items-center text-dark ls-25">
                                            <span class="text-dark font-weight-bold">66.7%</span>Recommended<span
                                                class="count">(2 of 3)</span>
                                        </div> --}}
                                        {{-- <div class="ratings-list">
                                            <div class="ratings-container">
                                                <div class="ratings-full">
                                                    <span class="ratings" style="width: 100%;"></span>
                                                    <span class="tooltiptext tooltip-top"></span>
                                                </div>
                                                <div class="progress-bar progress-bar-sm ">
                                                    <span></span>
                                                </div>
                                                <div class="progress-value">
                                                    <mark>70%</mark>
                                                </div>
                                            </div>
                                            <div class="ratings-container">
                                                <div class="ratings-full">
                                                    <span class="ratings" style="width: 80%;"></span>
                                                    <span class="tooltiptext tooltip-top"></span>
                                                </div>
                                                <div class="progress-bar progress-bar-sm ">
                                                    <span></span>
                                                </div>
                                                <div class="progress-value">
                                                    <mark>30%</mark>
                                                </div>
                                            </div>
                                            <div class="ratings-container">
                                                <div class="ratings-full">
                                                    <span class="ratings" style="width: 60%;"></span>
                                                    <span class="tooltiptext tooltip-top"></span>
                                                </div>
                                                <div class="progress-bar progress-bar-sm ">
                                                    <span></span>
                                                </div>
                                                <div class="progress-value">
                                                    <mark>40%</mark>
                                                </div>
                                            </div>
                                            <div class="ratings-container">
                                                <div class="ratings-full">
                                                    <span class="ratings" style="width: 40%;"></span>
                                                    <span class="tooltiptext tooltip-top"></span>
                                                </div>
                                                <div class="progress-bar progress-bar-sm ">
                                                    <span></span>
                                                </div>
                                                <div class="progress-value">
                                                    <mark>0%</mark>
                                                </div>
                                            </div>
                                            <div class="ratings-container">
                                                <div class="ratings-full">
                                                    <span class="ratings" style="width: 20%;"></span>
                                                    <span class="tooltiptext tooltip-top"></span>
                                                </div>
                                                <div class="progress-bar progress-bar-sm ">
                                                    <span></span>
                                                </div>
                                                <div class="progress-value">
                                                    <mark>0%</mark>
                                                </div>
                                            </div>
                                        </div> --}}
                                    </div>
                                </div>
                                @php
                                $user = Auth()->id();
                                $rating = App\Models\Rating::where('user_id', $user)
                                ->where('product_id', $product->id)
                                ->get();
                           

                                @endphp
                                @if (Auth::check())
                                @if ( $rating->count() == 0)
                                <div class="col-xl-8 col-lg-7 mb-4">
                                    <div class="review-form-wrapper">
                                        <h3 class="title tab-pane-title font-weight-bold mb-1">Submit Your
                                            Review</h3>
                                        <p class="mb-3">Your email address will not be published. Required
                                            fields are marked *</p>
                                        <form action="{{ route('rating', ['product_id' => $product->id]) }}" method="POST" class="review-form">
                                            @csrf
                                            <div class="rating-form">
                                                <label for="rating">Your Rating Of This Product :</label>
                                                <input value="1" name="rating" class="rating product_rating" data-size="xs">

                                                {{-- <select name="rating" id="rating" required=""
                                                    style="display: none;">
                                                    <option value="">Rate…</option>
                                                    <option value="5">Perfect</option>
                                                    <option value="4">Good</option>
                                                    <option value="3">Average</option>
                                                    <option value="2">Not that bad</option>
                                                    <option value="1">Very poor</option>
                                                </select> --}}
                                            </div>
                                            <textarea name="review" cols="30" rows="6" placeholder="Write Your Review Here..." class="form-control"
                                                id="review"></textarea required>
                                            <div class="row gutter-md">
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control"
                                                        placeholder="Your Name" id="name" name="name">
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control"
                                                        placeholder="Your Email" id="email" name="email">
                                                </div>
                                            </div>
                                            {{-- <div class="form-group">
                                                <input type="checkbox" class="custom-checkbox" id="save-checkbox">
                                                <label for="save-checkbox">Save my name, email, and website
                                                    in this browser for the next time I comment.</label>
                                            </div> --}}
                                            <button type="submit" class="btn btn-dark">Submit
                                                Review</button>
                                        </form>
                                    </div>
                                </div>
                                @endif
                                @endif
                            </div>

                            <div class="tab tab-nav-boxed tab-nav-outline tab-nav-center">
                                {{-- <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item">
                                        <a href="#show-all" class="nav-link active">Show All</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#helpful-positive" class="nav-link">Most Helpful
                                            Positive</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#helpful-negative" class="nav-link">Most Helpful
                                            Negative</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#highest-rating" class="nav-link">Highest Rating</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#lowest-rating" class="nav-link">Lowest Rating</a>
                                    </li>
                                </ul> --}}
                                <div class="tab-content">
                                    <div class="tab-pane active" id="show-all">
                                        <ul class="comments list-style-none">
                                            @foreach ($product->ratings as $rating)
                                                
                                            <li class="comment">
                                                <div class="comment-body">
                                                    <figure class="comment-avatar">
                                                        <img src="{{ asset('assets/images/agents/1-100x100.png') }}"
                                                            alt="Commenter Avatar" width="90" height="90">
                                                    </figure>
                                                    <div class="comment-content">
                                                        <h4 class="comment-author">
                                                            <a href="#">{{$rating->name}}</a>
                                                            <span class="comment-date">{{$rating->created_at->format('d M, y')}}</span>
                                                        </h4>
                                                        <div class="ratings-container comment-rating">
                                                            <input value="{{$rating->rating}}" class="rating published_rating" data-size="sm">
                                                        </div>
                                                        <p>{{$rating->review}}</p>
                                                        {{-- <div class="comment-action">
                                                            <a href="#"
                                                                class="btn btn-secondary btn-link btn-underline sm btn-icon-left font-weight-normal text-capitalize">
                                                                <i class="far fa-thumbs-up"></i>Helpful (1)
                                                            </a>
                                                            <a href="#"
                                                                class="btn btn-dark btn-link btn-underline sm btn-icon-left font-weight-normal text-capitalize">
                                                                <i class="far fa-thumbs-down"></i>Unhelpful
                                                                (0)
                                                            </a>
                                                            <div class="review-image">
                                                                <a href="#">
                                                                    <figure>
                                                                        <img src="{{ asset('assets/images/products/default/review-img-1.jpg') }}"
                                                                            width="60" height="60"
                                                                            alt="Attachment image of John Doe's review on Electronics Black Wrist Watch"
                                                                            data-zoom-image="{{ asset('assets/images/products/default/review-img-1-800x900.jpg') }}" />
                                                                    </figure>
                                                                </a>
                                                            </div>
                                                        </div> --}}
                                                    </div>
                                                </div>
                                            </li>
                                            @endforeach
                                        
                                    </div>
                                
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <section class="vendor-product-section">
                    <div class="title-link-wrapper title-deals appear-animate mb-4">
                        <h2 class="title title-link">Related Products</h2>
                        <div class="product-countdown-container font-size-sm text-white  align-items-center mr-auto">
                            {{-- <label>Offer Ends in: </label>
                            <div class="product-countdown countdown-compact ml-1 font-weight-bold" data-until="+10d"
                                data-relative="true" data-compact="true">10days,00:00:00</div> --}}
                        </div>
                        <a href="" class="ml-0">More Products<i class="w-icon-long-arrow-right"></i></a>
                    </div>
                    <div class="swiper-container swiper-theme appear-animate mb-6"
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
                            @foreach ($related_products as $product)
                                <x-products.card :product="$product" />
                            @endforeach

                            <!-- End of Product Wrap -->
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </section>
                {{-- <section class="related-product-section">
                    <div class="title-link-wrapper mb-4">
                        <h4 class="title">Related Products</h4>
                        <a href="#" class="btn btn-dark btn-link btn-slide-right btn-icon-right">More
                            Products<i class="w-icon-long-arrow-right"></i></a>
                    </div>
                    <div class="swiper-container swiper-theme"
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
                                    'slidesPerView': 3
                                }
                            }
                        }">
                        <div class="swiper-wrapper row cols-lg-3 cols-md-4 cols-sm-3 cols-2">
                            <div class="swiper-slide product">
                                <figure class="product-media">
                                    <a href="product-default.html">
                                        <img src="{{asset('assets/images/products/default/5.jpg')}}" alt="Product" width="300"
                                            height="338" />
                                    </a>
                                    <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                            title="Add to cart"></a>
                                        <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                            title="Add to wishlist"></a>
                                        <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                            title="Add to Compare"></a>
                                    </div>
                                    <div class="product-action">
                                        <a href="#" class="btn-product btn-quickview" title="Quick View">Quick
                                            View</a>
                                    </div>
                                </figure>
                                <div class="product-details">
                                    <h4 class="product-name"><a href="product-default.html">Drone</a></h4>
                                    <div class="ratings-container">
                                        <div class="ratings-full">
                                            <span class="ratings" style="width: 100%;"></span>
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                        <a href="product-default.html" class="rating-reviews">(3 reviews)</a>
                                    </div>
                                    <div class="product-pa-wrapper">
                                        <div class="product-price">$632.00</div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide product">
                                <figure class="product-media">
                                    <a href="product-default.html">
                                        <img src="{{asset('assets/images/products/default/6.jpg')}}" alt="Product" width="300"
                                            height="338" />
                                    </a>
                                    <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                            title="Add to cart"></a>
                                        <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                            title="Add to wishlist"></a>
                                        <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                            title="Add to Compare"></a>
                                    </div>
                                    <div class="product-action">
                                        <a href="#" class="btn-product btn-quickview" title="Quick View">Quick
                                            View</a>
                                    </div>
                                </figure>
                                <div class="product-details">
                                    <h4 class="product-name"><a href="product-default.html">Official Camera</a>
                                    </h4>
                                    <div class="ratings-container">
                                        <div class="ratings-full">
                                            <span class="ratings" style="width: 100%;"></span>
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                        <a href="product-default.html" class="rating-reviews">(3 reviews)</a>
                                    </div>
                                    <div class="product-pa-wrapper">
                                        <div class="product-price">
                                            <ins class="new-price">$263.00</ins><del class="old-price">$300.00</del>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide product">
                                <figure class="product-media">
                                    <a href="product-default.html">
                                        <img src="{{asset('assets/images/products/default/7-1.jpg')}}" alt="Product"
                                            width="300" height="338" />
                                        <img src="{{asset('assets/images/products/default/7-2.jpg')}}" alt="Product"
                                            width="300" height="338" />
                                    </a>
                                    <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                            title="Add to cart"></a>
                                        <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                            title="Add to wishlist"></a>
                                        <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                            title="Add to Compare"></a>
                                    </div>
                                    <div class="product-action">
                                        <a href="#" class="btn-product btn-quickview" title="Quick View">Quick
                                            View</a>
                                    </div>
                                </figure>
                                <div class="product-details">
                                    <h4 class="product-name"><a href="product-default.html">Phone Charge Pad</a>
                                    </h4>
                                    <div class="ratings-container">
                                        <div class="ratings-full">
                                            <span class="ratings" style="width: 80%;"></span>
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                        <a href="product-default.html" class="rating-reviews">(8 reviews)</a>
                                    </div>
                                    <div class="product-pa-wrapper">
                                        <div class="product-price">$23.00</div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide product">
                                <figure class="product-media">
                                    <a href="product-default.html">
                                        <img src="{{asset('assets/images/products/default/8.jpg')}}" alt="Product" width="300"
                                            height="338" />
                                    </a>
                                    <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                            title="Add to cart"></a>
                                        <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                            title="Add to wishlist"></a>
                                        <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                            title="Add to Compare"></a>
                                    </div>
                                    <div class="product-action">
                                        <a href="#" class="btn-product btn-quickview" title="Quick View">Quick
                                            View</a>
                                    </div>
                                </figure>
                                <div class="product-details">
                                    <h4 class="product-name"><a href="product-default.html">Fashionalble
                                            Pencil</a></h4>
                                    <div class="ratings-container">
                                        <div class="ratings-full">
                                            <span class="ratings" style="width: 100%;"></span>
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                        <a href="product-default.html" class="rating-reviews">(9 reviews)</a>
                                    </div>
                                    <div class="product-pa-wrapper">
                                        <div class="product-price">$50.00</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section> --}}

                <!-- End of Main Content -->
                {{-- <aside class="sidebar product-sidebar sidebar-fixed right-sidebar sticky-sidebar-wrapper">
                    <div class="sidebar-overlay"></div>
                    <a class="sidebar-close" href="#"><i class="close-icon"></i></a>
                    <a href="#" class="sidebar-toggle d-flex d-lg-none"><i
                            class="fas fa-chevron-left"></i></a>
                    <div class="sidebar-content scrollable">
                        <div class="sticky-sidebar">
                            <div class="widget widget-icon-box mb-6">
                                <div class="icon-box icon-box-side">
                                    <span class="icon-box-icon text-dark">
                                        <i class="w-icon-truck"></i>
                                    </span>
                                    <div class="icon-box-content">
                                        <h4 class="icon-box-title">Free Shipping & Returns</h4>
                                        <p>For all orders over $99</p>
                                    </div>
                                </div>
                                <div class="icon-box icon-box-side">
                                    <span class="icon-box-icon text-dark">
                                        <i class="w-icon-bag"></i>
                                    </span>
                                    <div class="icon-box-content">
                                        <h4 class="icon-box-title">Secure Payment</h4>
                                        <p>We ensure secure payment</p>
                                    </div>
                                </div>
                                <div class="icon-box icon-box-side">
                                    <span class="icon-box-icon text-dark">
                                        <i class="w-icon-money"></i>
                                    </span>
                                    <div class="icon-box-content">
                                        <h4 class="icon-box-title">Money Back Guarantee</h4>
                                        <p>Any back within 30 days</p>
                                    </div>
                                </div>
                            </div>
                            <!-- End of Widget Icon Box -->

                            <div class="widget widget-banner mb-9">
                                <div class="banner banner-fixed br-sm">
                                    <figure>
                                        <img src="{{asset('assets/images/shop/banner3.jpg')}}" alt="Banner" width="266"
                                            height="220" style="background-color: #1D2D44;" />
                                    </figure>
                                    <div class="banner-content">
                                        <div class="banner-price-info font-weight-bolder text-white lh-1 ls-25">
                                            40<sup class="font-weight-bold">%</sup><sub
                                                class="font-weight-bold text-uppercase ls-25">Off</sub>
                                        </div>
                                        <h4 class="banner-subtitle text-white font-weight-bolder text-uppercase mb-0">
                                            Ultimate Sale</h4>
                                    </div>
                                </div>
                            </div>
                            <!-- End of Widget Banner -->

                            <div class="widget widget-products">
                                <div class="title-link-wrapper mb-2">
                                    <h4 class="title title-link font-weight-bold">More Products</h4>
                                </div>

                                <div class="swiper nav-top">
                                    <div class="swiper-container swiper-theme nav-top"
                                        data-swiper-options = "{
                                        'slidesPerView': 1,
                                        'spaceBetween': 20,
                                        'navigation': {
                                            'prevEl': '.swiper-button-prev',
                                            'nextEl': '.swiper-button-next'
                                        }
                                    }">
                                        <div class="swiper-wrapper">
                                            <div class="widget-col swiper-slide">
                                                <div class="product product-widget">
                                                    <figure class="product-media">
                                                        <a href="#">
                                                            <img src="{{asset('assets/images/shop/13.jpg')}}" alt="Product"
                                                                width="100" height="113" />
                                                        </a>
                                                    </figure>
                                                    <div class="product-details">
                                                        <h4 class="product-name">
                                                            <a href="#">Smart Watch</a>
                                                        </h4>
                                                        <div class="ratings-container">
                                                            <div class="ratings-full">
                                                                <span class="ratings" style="width: 100%;"></span>
                                                                <span class="tooltiptext tooltip-top"></span>
                                                            </div>
                                                        </div>
                                                        <div class="product-price">$80.00 - $90.00</div>
                                                    </div>
                                                </div>
                                                <div class="product product-widget">
                                                    <figure class="product-media">
                                                        <a href="#">
                                                            <img src="{{asset('assets/images/shop/14.jpg')}}" alt="Product"
                                                                width="100" height="113" />
                                                        </a>
                                                    </figure>
                                                    <div class="product-details">
                                                        <h4 class="product-name">
                                                            <a href="#">Sky Medical Facility</a>
                                                        </h4>
                                                        <div class="ratings-container">
                                                            <div class="ratings-full">
                                                                <span class="ratings" style="width: 80%;"></span>
                                                                <span class="tooltiptext tooltip-top"></span>
                                                            </div>
                                                        </div>
                                                        <div class="product-price">$58.00</div>
                                                    </div>
                                                </div>
                                                <div class="product product-widget">
                                                    <figure class="product-media">
                                                        <a href="#">
                                                            <img src="{{asset('assets/images/shop/15.jpg')}}" alt="Product"
                                                                width="100" height="113" />
                                                        </a>
                                                    </figure>
                                                    <div class="product-details">
                                                        <h4 class="product-name">
                                                            <a href="#">Black Stunt Motor</a>
                                                        </h4>
                                                        <div class="ratings-container">
                                                            <div class="ratings-full">
                                                                <span class="ratings" style="width: 60%;"></span>
                                                                <span class="tooltiptext tooltip-top"></span>
                                                            </div>
                                                        </div>
                                                        <div class="product-price">$374.00</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="widget-col swiper-slide">
                                                <div class="product product-widget">
                                                    <figure class="product-media">
                                                        <a href="#">
                                                            <img src="{{asset('assets/images/shop/16.jpg')}}" alt="Product"
                                                                width="100" height="113" />
                                                        </a>
                                                    </figure>
                                                    <div class="product-details">
                                                        <h4 class="product-name">
                                                            <a href="#">Skate Pan</a>
                                                        </h4>
                                                        <div class="ratings-container">
                                                            <div class="ratings-full">
                                                                <span class="ratings" style="width: 100%;"></span>
                                                                <span class="tooltiptext tooltip-top"></span>
                                                            </div>
                                                        </div>
                                                        <div class="product-price">$278.00</div>
                                                    </div>
                                                </div>
                                                <div class="product product-widget">
                                                    <figure class="product-media">
                                                        <a href="#">
                                                            <img src="{{asset('assets/images/shop/17.jpg')}}" alt="Product"
                                                                width="100" height="113" />
                                                        </a>
                                                    </figure>
                                                    <div class="product-details">
                                                        <h4 class="product-name">
                                                            <a href="#">Modern Cooker</a>
                                                        </h4>
                                                        <div class="ratings-container">
                                                            <div class="ratings-full">
                                                                <span class="ratings" style="width: 80%;"></span>
                                                                <span class="tooltiptext tooltip-top"></span>
                                                            </div>
                                                        </div>
                                                        <div class="product-price">$324.00</div>
                                                    </div>
                                                </div>
                                                <div class="product product-widget">
                                                    <figure class="product-media">
                                                        <a href="#">
                                                            <img src="{{asset('assets/images/shop/18.jpg')}}" alt="Product"
                                                                width="100" height="113" />
                                                        </a>
                                                    </figure>
                                                    <div class="product-details">
                                                        <h4 class="product-name">
                                                            <a href="#">CT Machine</a>
                                                        </h4>
                                                        <div class="ratings-container">
                                                            <div class="ratings-full">
                                                                <span class="ratings" style="width: 100%;"></span>
                                                                <span class="tooltiptext tooltip-top"></span>
                                                            </div>
                                                        </div>
                                                        <div class="product-price">$236.00</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <button class="swiper-button-next"></button>
                                        <button class="swiper-button-prev"></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </aside> --}}
                <!-- End of Sidebar -->
            </div>
        </div>
    </div>

</x-app>
