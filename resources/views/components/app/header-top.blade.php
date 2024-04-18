<div class="header-middle">
    <div class="container">
        <div class="header-left mr-md-4">
            <a href="#" class="mobile-menu-toggle  w-icon-hamburger" aria-label="menu-toggle">
            </a>
            <a href="{{route('homepage')}}" class="logo ml-lg-0">
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
                        <a href="#" class="text-capitalize">Call Us Now</a> :
                    </h4>
                    <a href="#" class="phone-number font-weight-bolder ls-50">0(800)123-456</a>
                </div>
            </div>
            <a class="wishlist label-down link d-xs-show" href="{{ route('wishlist.index') }}">
                <i class="w-icon-heart"></i>
                <span class="wishlist-label d-lg-show">Wishlist</span>
            </a>
            <a class="compare label-down link d-xs-show" href="#">
                <i class="w-icon-compare"></i>
                <span class="compare-label d-lg-show">Compare</span>
            </a>
            <div class="dropdown cart-dropdown cart-offcanvas mr-0 mr-lg-2">
                <div class="cart-overlay"></div>
                <a href="" class="cart-toggle label-down link">
                    <i class="w-icon-cart">

                        <span class="cart-count" id="cartQty2">0</span>
                    </i>
                    <span class="cart-label">Cart</span>
                </a>
                <div class="dropdown-box">
                    <div class="cart-header">
                        <span>Shopping Cart</span>
                        <a href="" class="btn-close">Close<i class="w-icon-long-arrow-right"></i></a>
                    </div>

                    <div class="products">
                        @foreach (Cart::getContent() as $product)
                            <div class="product product-cart">
                                <div class="product-detail">
                                    <a href="#" class="product-name">{{$product->name}}</a>
                                    <div class="price-box">
                                        <span class="product-quantity">{{Sohoj::price($product->price)}}</span>
                                        <span class="product-price">{{ $product->quantity }}</span>
                                    </div>
                                </div>
                                <figure class="product-media">
                                    <a href="#">
                                        <img src="{{Voyager::image($product->model->image)}}" alt="product" height="84"
                                            width="94" />
                                    </a>
                                </figure>
                                <button class="btn btn-link btn-close" aria-label="button">
                                    <a href="{{ url('/cart-destroy/' . $product->id) }}"><i class="fas fa-times"></i></a>
                                </button>
                            </div>
                        @endforeach
                    </div>

                    <div class="cart-total">
                        <label>Subtotal:</label>
                        <span class="price">${{ Cart::getSubTotal() }}</span>
                    </div>

                    <div class="cart-action">
                        <a href="{{ route('cart') }}" class="btn btn-dark btn-outline btn-rounded">View Cart</a>
                        <a href="{{ route('checkout') }}" class="btn btn-primary  btn-rounded">Checkout</a>
                    </div>
                </div>
                <!-- End of Dropdown Box -->
            </div>
        </div>
    </div>
</div>
