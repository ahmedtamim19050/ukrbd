<x-app>
    <x-slot name="css">
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


    </x-slot>
    <main class="main checkout container">
        <!-- Start of Breadcrumb -->
        <nav class="breadcrumb-nav">
            <div class="container">
                <ul class="breadcrumb shop-breadcrumb bb-no">
                    <li class="passed"><a href="{{ route('cart') }}">Shopping Cart</a></li>
                    <li class="active"><a href="{{ route('checkout') }}">Checkout</a></li>
                    <li><a href="#">Order Complete</a></li>
                </ul>
            </div>
        </nav>
        <!-- End of Breadcrumb -->


        <!-- Start of PageContent -->
        <div class="page-content">
            <div class="container">
                @if(!Auth()->check())
                <div class="">
                    Returning customer? <a href="{{ route('login') }}"
                        class=" font-weight-bold text-uppercase text-dark">Login</a>
                </div>
                @endif

                @if (!session()->has('discount'))
                <div class="coupon-toggle"> Have a coupon?
                    <a href="#" class="show-coupon font-weight-bold text-uppercase text-dark">Enter your code</a>
                </div>

                <div class="coupon-content mb-4">
                    <p>If you have a coupon code, please apply it below.</p>

                        <form action="{{ route('coupon') }}" method="POST">
                            @csrf
                            <div class="input-wrapper-inline">
                                <input type="text" name="coupon_code" class="form-control form-control-md mr-1 mb-2"
                                    placeholder="Coupon code" id="coupon_code">
                                <button type="submit" class="btn button btn-rounded btn-coupon mb-2">Apply
                                    Coupon</button>
                            </div>
                        </form>
                
                </div>
                @endif

                <form class="form checkout-form" action="{{ route('checkout.store') }}" method="POST">
                    @csrf
                    <div class="row mb-9">
                        <div class="col-lg-7 pr-lg-4 mb-4">
                            <h3 class="title billing-title text-uppercase ls-10 pt-1 pb-3 mb-0">
                                Billing Details
                            </h3>
                            <div class="row gutter-sm">
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        <label>First name *</label>
                                        <input type="text"
                                            class="form-control form-control-md @error('first_name') is-invalid @enderror"
                                            name="first_name" required value="{{ old('first_name') }}"
                                            autocomplete="first_name" autofocus>
                                        @error('first_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        <label>Last name *</label>
                                        <input type="text"
                                            class="form-control form-control-md @error('last_name') is-invalid @enderror"
                                            name="last_name" required value="{{ old('last_name') }}"
                                            autocomplete="last_name" autofocus>
                                        @error('last_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Street address *</label>
                                <input type="text" placeholder="House number and street name"
                                    class="form-control form-control-md mb-2 @error('address_1') is-invalid @enderror"
                                    name="address_1" required value="{{ old('address_1') }}" autocomplete="address_1"
                                    autofocus>
                                @error('address_1')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                            <div class="row gutter-sm">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Town / City *</label>
                                        <select id="city" class="form-control"@error('city')is invalid @enderror
                                            name="city" placeholder="city">
                                            @error('city')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            {{-- <option selected>Open this select menu</option> --}}
                                            <option value="Dhaka" selected>Dhaka</option>
                                            <option value="Barguna">Barguna</option>
                                            <option value="Barishal">Barishal</option>
                                            <option value="Bhola">Bhola</option>
                                            <option value="Jhalokati">Jhalokati</option>
                                            <option value="Patuakhali">Patuakhali</option>
                                            <option value="Pirojpur">Pirojpur</option>
                                            <option value="Bandarban">Bandarban</option>
                                            <option value="Brahmanbaria">Brahmanbaria</option>
                                            <option value="Chandpur">Chandpur</option>
                                            <option value="Chittagong">Chittagong</option>
                                            <option value="Comilla">Comilla</option>
                                            <option value="Cox's Bazar">Cox's Bazar</option>
                                            <option value="Feni">Feni</option>
                                            <option value="Khagrachhari">Khagrachhari</option>
                                            <option value="Lakshmipur">Lakshmipur</option>
                                            <option value="Noakhali">Noakhali</option>
                                            <option value="Rangamati">Rangamati</option>

                                            <option value="Faridpur">Faridpur</option>
                                            <option value="Gazipur">Gazipur</option>
                                            <option value="Gopalganj">Gopalganj</option>
                                            <option value="Kishoreganj">Kishoreganj</option>
                                            <option value="Madaripur">Madaripur</option>
                                            <option value="Manikganj">Manikganj</option>
                                            <option value="Munshiganj">Munshiganj</option>
                                            <option value="Narayanganj">Narayanganj</option>
                                            <option value="Narsingdi">Narsingdi</option>
                                            <option value="Rajbari">Rajbari</option>
                                            <option value="Shariatpur">Shariatpur</option>
                                            <option value="Tangail">Tangail</option>
                                            <option value="Bagerhat">Bagerhat</option>
                                            <option value="Chuadanga">Chuadanga</option>
                                            <option value="Jashore">Jashore</option>
                                            <option value="Jhenaidah">Jhenaidah</option>
                                            <option value="Khulna">Khulna</option>
                                            <option value="Kushtia">Kushtia</option>
                                            <option value="Magura">Magura</option>
                                            <option value="Meherpur">Meherpur</option>
                                            <option value="Narail">Narail</option>
                                            <option value="Satkhira">Satkhira</option>
                                            <option value="Jamalpur">Jamalpur</option>
                                            <option value="Mymensingh">Mymensingh</option>
                                            <option value="Netrokona">Netrokona</option>
                                            <option value="Sherpur">Sherpur</option>
                                            <option value="Bogura">Bogura</option>
                                            <option value="Joypurhat">Joypurhat</option>
                                            <option value="Naogaon">Naogaon</option>
                                            <option value="Natore">Natore</option>
                                            <option value="Chapai Nawabganj">Chapai Nawabganj</option>
                                            <option value="Pabna">Pabna</option>
                                            <option value="Rajshahi">Rajshahi</option>
                                            <option value="Sirajganj">Sirajganj</option>
                                            <option value="Dinajpur">Dinajpur</option>
                                            <option value="Gaibandha">Gaibandha</option>
                                            <option value="Kurigram">Kurigram</option>
                                            <option value="Lalmonirhat">Lalmonirhat</option>
                                            <option value="Nilphamari">Nilphamari</option>
                                            <option value="Panchagarh">Panchagarh</option>
                                            <option value="Rangpur">Rangpur</option>
                                            <option value="Thakurgaon">Thakurgaon</option>
                                            <option value="Habiganj">Habiganj</option>
                                            <option value="Moulvibazar">Moulvibazar</option>
                                            <option value="Sunamganj">Sunamganj</option>
                                            <option value="Sylhet">Sylhet</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>ZIP (optional)*</label>
                                        <input type="text"
                                            class="form-control form-control-md @error('post_code') is-invalid @enderror"
                                            name="post_code" value="{{ old('post_code') }}" autocomplete="post_code"
                                            autofocus>
                                        @error('post_code')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>State *</label>
                                        <input type="text"
                                            class="form-control form-control-md @error('state') is-invalid @enderror"
                                            name="state" value="{{ old('state') }}" autocomplete="state"
                                            autofocus>
                                        @error('state')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Phone *</label>
                                        <input type="text"
                                            class="form-control form-control-md @error('phone') is-invalid @enderror"
                                            name="phone" required value="{{ old('phone') }}" autocomplete="phone"
                                            autofocus>
                                        @error('phone')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-7">
                                <label>Email address *</label>
                                <input type="email"
                                    class="form-control form-control-md @error('email') is-invalid @enderror"
                                    name="email" required value="{{ old('email') }}" autocomplete="email"
                                    autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                            <div class="form-group mt-3">
                                <label for="order-notes">Order notes (optional)</label>
                                <textarea class="form-control mb-0" id="order-notes" name="order-notes" cols="30" rows="4"
                                    placeholder="Notes about your order, e.g special notes for delivery"></textarea>
                            </div>
                        </div>
                        <div class="col-lg-5 mb-4 sticky-sidebar-wrapper">
                            <div class="order-summary-wrapper sticky-sidebar">
                                <h3 class="title text-uppercase ls-10">Your Order</h3>
                                <div class="order-summary">
                                    <table class="order-table">
                                        <thead>
                                            <tr>
                                                <th colspan="2">
                                                    <b>Product</b>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach (Cart::getContent() as $item)
                                                
                                            <tr class="bb-no">
                                                <td class="product-name">{{$item->name}}<i
                                                        class="fas fa-times"></i> <span
                                                        class="product-quantity">{{$item->quantity}}</span></td>
                                                <td class="product-total">{{Sohoj::price($item->price)}}</td>
                                            </tr>
                                            @endforeach
                                        
                                            <tr class="cart-subtotal">
                                                <td>
                                                    Subtotal
                                                </td>
                                                <td>
                                                   {{ Sohoj::price(Cart::getSubTotal()) }}
                                                </td>
                                            </tr>
                                            @if (session()->has('discount'))
                                            <tr class="cart-subtotal">
                                                <td>
                                                    Discount <a href="{{route('coupon.destroy')}}" class="text-danger ml-2" style="text-decoration: underline;font-size:12px;color:red">Delete</a>
                                                </td>
                                                <td>
                                                    {{ Sohoj::price(Sohoj::discount()) }}
                                                </td>
                                            </tr>
                                            @endif
                                              
                                            <tr class="cart-subtotal bb-no">
                                                <td>
                                                    <b>Total</b>
                                                </td>
                                                <td>
                                                    <b>{{ Sohoj::price(Sohoj::newSubtotal()) }}</b>
                                                </td>
                                            </tr>
                                        </tbody>
                                        {{-- <tfoot>
                                            <tr class="shipping-methods">
                                                <td colspan="2" class="text-left">
                                                    <h4 class="title title-simple bb-no mb-1 pb-0 pt-3">Shipping
                                                    </h4>
                                                    <ul id="shipping-method" class="mb-4">
                                                        <li>
                                                            <div class="custom-radio">
                                                                <input type="radio" id="free-shipping"
                                                                    class="custom-control-input" name="shipping">
                                                                <label for="free-shipping"
                                                                    class="custom-control-label color-dark">Free
                                                                    Shipping</label>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="custom-radio">
                                                                <input type="radio" id="local-pickup"
                                                                    class="custom-control-input" name="shipping">
                                                                <label for="local-pickup"
                                                                    class="custom-control-label color-dark">Local
                                                                    Pickup</label>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="custom-radio">
                                                                <input type="radio" id="flat-rate"
                                                                    class="custom-control-input" name="shipping">
                                                                <label for="flat-rate"
                                                                    class="custom-control-label color-dark">Flat
                                                                    rate: $5.00</label>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </td>
                                            </tr>
                                            <tr class="order-total">
                                                <th>
                                                    <b>Total</b>
                                                </th>
                                                <td>
                                                    <b>$100.00</b>
                                                </td>
                                            </tr>
                                        </tfoot> --}}
                                    </table>

                                    {{-- <div class="payment-methods" id="payment_method">
                                        <h4 class="title font-weight-bold ls-25 pb-0 mb-1">Payment Methods</h4>
                                        <div class="accordion payment-accordion">
                                            <div class="card">
                                                <div class="card-header">
                                                    <a href="#cash-on-delivery" class="collapse">Direct Bank
                                                        Transfor</a>
                                                </div>
                                                <div id="cash-on-delivery" class="card-body expanded">
                                                    <p class="mb-0">
                                                        Make your payment directly into our bank account.
                                                        Please use your Order ID as the payment reference.
                                                        Your order will not be shipped until the funds have cleared in
                                                        our account.
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="card-header">
                                                    <a href="#payment" class="expand">Check Payments</a>
                                                </div>
                                                <div id="payment" class="card-body collapsed">
                                                    <p class="mb-0">
                                                        Please send a check to Store Name, Store Street, Store Town,
                                                        Store State / County, Store Postcode.
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="card-header">
                                                    <a href="#delivery" class="expand">Cash on delivery</a>
                                                </div>
                                                <div id="delivery" class="card-body collapsed">
                                                    <p class="mb-0">
                                                        Pay with cash upon delivery.
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="card p-relative">
                                                <div class="card-header">
                                                    <a href="#paypal" class="expand">Paypal</a>
                                                </div>
                                                <a href="https://www.paypal.com/us/webapps/mpp/paypal-popup"
                                                    class="text-primary paypal-que"
                                                    onclick="javascript:window.open('https://www.paypal.com/us/webapps/mpp/paypal-popup','WIPaypal',
                                                    'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=yes, width=1060, height=700'); 
                                                    return false;">What
                                                    is PayPal?
                                                </a>
                                                <div id="paypal" class="card-body collapsed">
                                                    <p class="mb-0">
                                                        Pay via PayPal, you can pay with your credit cart if you
                                                        don't have a PayPal account.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div> --}}

                                    <div class="form-group place-order pt-6">
                                        <button type="submit" class="btn btn-dark btn-block btn-rounded">Place
                                            Order</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- End of PageContent -->
    </main>
    <x-slot name="js">
        <script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
        <script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/vendor/sticky/sticky.js') }}"></script>
        <script src="{{ asset('assets/vendor/magnific-popup/jquery.magnific-popup.min.js') }}"></script>
        <script src="{{ asset('assets/js/main.min.js') }}"></script>


        <script>
            const stripe = Stripe("{{ env('STRIPE_KEY') }}");

            const elements = stripe.elements();
            const cardElement = elements.create('card');

            cardElement.mount('#card-element');

            const cardHolderName = document.getElementById('card-holder-name');
            const cardButton = document.getElementById('card-button');
            const clientSecret = cardButton.dataset.secret;

            cardButton.addEventListener('click', async (e) => {
                const {
                    setupIntent,
                    error
                } = await stripe.confirmCardSetup(
                    clientSecret, {
                        payment_method: {
                            card: cardElement,
                            billing_details: {
                                name: cardHolderName.value
                            }
                        }
                    }
                );

                if (error) {
                    if (error?.setupIntent) {
                        document.getElementById('paymentmethod').value = error.setupIntent.payment_method
                        document.getElementById('paymentmethod').checked = true
                        document.getElementById('card-button').style.display = 'none'
                        toastr.success('Card added');
                    } else {
                        toastr.error('Something went wrong. Try again letter');
                    }

                } else {
                    document.getElementById('paymentmethod').value = setupIntent.payment_method
                    document.getElementById('paymentmethod').checked = true
                    document.getElementById('card-button').style.display = 'none'
                    toastr.success('Card added');
                }
            });
        </script>
    </x-slot>
</x-app>
