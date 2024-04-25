<div class="header-middle">
    <div class="container">
        <div class="header-left mr-md-4">
            <a href="#" class="mobile-menu-toggle  w-icon-hamburger" aria-label="menu-toggle">
            </a>
            <a href="{{ route('homepage') }}" class="logo ml-lg-0">
                <img src="{{ Voyager::image(setting('site.logo')) }}" alt="logo" width="145" height="45" />
            </a>
            <form method="get" action="#"
                class="header-search hs-expanded hs-round d-none d-md-flex input-wrapper">
                <div class="select-box">
                    <select id="category" name="category">
                        <option value="">All Categories</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->slug }}">{{ $category->name }}</option>
                        @endforeach

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
                        <a href="#" class="text-capitalize">Call Us Now</a> :
                    </h4>
                    <a href="#" class="phone-number font-weight-bolder ls-50">0(800)123-456</a>
                </div>
            </div>
            <div class="dropdown">
                <button class="wishlist label-down link d-xs-show" data-toggle="dropdown"
                    style=" border: none; background-color: white;">
                    <i class="w-icon-user" style="font-weight: 600;"></i>
                    <span class="wishlist-label d-lg-show">user</span>
                </button>
                <div class="dropdown-menu " style="width: 165px; padding-left: 20px; padding-top: 10px; padding-bottom: 10px">
                    @if (auth()->check())
                        @if (auth()->user()->role_id == 2)
                            <a class="dropdown-item wishlist-label d-lg-show pt-2" href="{{ route('user.dashboard') }}"
                                style="font-size: small">My Account</a>
                            <form action="{{ route('logout') }}" method="post">
                                @csrf
                                <button type="submit" class="dropdown-item wishlist-label d-lg-show"
                                    style="font-size: small">
                                    Logout</button>

                            </form>
                        @elseif(auth()->user()->role_id == 3)
                            <a class="dropdown-item wishlist-label d-lg-show pt-2" href="{{ route('vendor.dashboard') }}"
                                style="font-size: small">My Account</a>
                            <form action="{{ route('logout') }}" method="post">
                                @csrf
                                <button type="submit" class="dropdown-item wishlist-label d-lg-show bg-none border-0"
                                    style="font-size: small">
                                    Logout</button>

                            </form>
                        @elseif(auth()->user()->role_id == 1)
                            <a class="dropdown-item wishlist-label d-lg-show pt-2" href="{{ route('vendor.dashboard') }}"
                                style="font-size: small">My Account</a>
                            <form action="{{ route('logout') }}" method="post">
                                @csrf
                                <button type="submit" class="dropdown-item wishlist-label d-lg-show bg-none border-0 m-2"
                                    style="font-size: small;background:none;border:none">
                                    Logout</button>

                            </form>
                        @endif
                    @else
                        <a class="dropdown-item wishlist-label d-lg-show" href="{{ route('login') }}"
                            style="font-size: small">Login</a>
                        <a class="dropdown-item wishlist-label d-lg-show" href="{{ route('register') }}"
                            style="font-size: small">Register as user</a>
                        <a class="dropdown-item wishlist-label d-lg-show" href="{{ route('vendor.create') }}"
                            style="font-size: small">Register as vendor </a>
                       
                    @endif
                </div>
            </div>
            <a class="wishlist label-down link d-xs-show" href="{{ route('wishlist.index') }}"
                style="text-decoration: none;">
                <i class="w-icon-heart"></i>
                <span class="wishlist-label d-lg-show">Wishlist</span>
            </a>

            <div
                class="dropdown cart-dropdown cart-offcanvas mr-0 mr-lg-2 {{ request()->cart == 'opened' ? 'opened' : '' }}">
                <div class="cart-overlay"></div>

                <a href="{{ url()->current() }}?cart=opened" class=" label-down link" style="text-decoration: none;">
                    <i class="w-icon-cart">
                        <span class="cart-count" id="cartQty2">0</span>
                    </i>
                    <span class="cart-label">Cart</span>
                </a>
                <div class="dropdown-box d-flex flex-column h-100 justify-content-between   ">
                    <div>
                        <div class="d-flex justify-content-between ">
                            <span style="font-size: 18px">Shopping Cart</span>
                            <a href="{{ url()->current() }}" class="" style="font-size: 15px">Close<i
                                    class="w-icon-long-arrow-right"></i></a>
                        </div>

                        <div class="products">
                            @foreach (Cart::getContent() as $product)
                                <div class="product product-cart">
                                    <div class="product-detail">
                                        <a href="#" class="product-name">{{ $product->name }}</a>
                                        <div class="price-box">
                                            <span class="product-quantity">{{ Sohoj::price($product->price) }}</span>
                                            <span class="product-price">{{ $product->quantity }}</span>
                                        </div>
                                    </div>

                                    <figure class="product-media">
                                        <a href="#">
                                            <img src="{{ Voyager::image($product->model->image) }}" alt="product"
                                                height="84" width="94" />
                                        </a>
                                    </figure>
                                    <button class="btn btn-link btn-close" aria-label="button">
                                        <a href="{{ url('/cart-destroy/' . $product->id) }}"><i
                                                class="fas fa-times"></i></a>
                                    </button>
                                </div>
                            @endforeach
                        </div>


                    </div>
                    <div class="">
                        <div class="cart-total">
                            <strong>Subtotal:</strong>
                            <span class="price">${{ Cart::getSubTotal() }}</span>
                        </div>

                        <div class="cart-action justify-content-end">
                            <a href="{{ route('cart') }}" class="btn btn-dark btn-outline btn-rounded">View Cart</a>
                            <a href="{{ route('checkout') }}" class="btn btn-primary  btn-rounded">Checkout</a>
                        </div>
                    </div>
                </div>
                <!-- End of Dropdown Box -->
            </div>
        </div>
    </div>
</div>
