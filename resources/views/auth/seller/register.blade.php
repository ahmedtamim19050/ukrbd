  <x-app>
    <x-slot name="css">
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

    <section class="ec-page-content  " style="margin:50px 0">
        <div class="container">
            <div class="row">
               
                <div class=" " style="max-width: 730px;margin:0 auto;box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px; padding:20px">
                    <div class="ec-login-container ">
                        <p class="nav-link" style="font-size: 20px">Vendor as Register </p>
                        <div class="ec-login-form">
                            <form method="POST" action="{{ route('register') }}">
                                @csrf
                                <div class="row">
                                    <span class="ec-login-wrap col-md-6 mb-3">
                                        <label for="name">First Name <span class="text-danger">*</span></label>
                                        <input id="name" type="text" placeholder="First name"
                                            class="form-control bg-light @error('name') is-invalid @enderror" name="name"
                                            value="{{ old('name') }}" required autocomplete="name" autofocus>

                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </span>

                                    <span class="ec-login-wrap col-md-6 mb-3">
                                        <label for="l_name">Last Name <span class="text-danger">*</span></label>
                                        <input id="l_name" type="text" placeholder="{{ __('Last Name') }}"
                                            class="form-control bg-light @error('l_name') is-invalid @enderror"
                                            name="l_name" value="{{ old('l_name') }}" required autocomplete="name"
                                            autofocus>

                                        @error('l_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </span>
                                </div>
                                <div class="row">
                                    <span class="ec-login-wrap col-md-12 mb-3">
                                        <label for="email">Email Address<span class="text-danger">*</span></label>
                                        <input id="email" type="email" placeholder="{{ __('Email Address') }}"
                                            class="form-control bg-light @error('email') is-invalid @enderror"
                                            name="email" value="{{ old('email') }}" required autocomplete="email"
                                            autofocus>

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </span>
            
                                </div>
                                
                                <div class="row">
                                    <span class="ec-login-wrap col-md-6 mb-3">
                                        <label for="password">Password <span class="text-danger">*</span></label>
                                        <input id="password" type="password" placeholder="{{ __('Password') }}"
                                            class="form-control bg-light @error('password') is-invalid @enderror"
                                            name="password" required autocomplete="current-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </span>
                                    <span class="ec-login-wrap col-md-6 mb-3">
                                        <label for="password-confirm">Confirm Password<span
                                                class="text-danger">*</span></label>
                                        <input id="password-confirm" type="password"
                                            placeholder="{{ __('Confirm Password') }}" class="form-control bg-light"
                                            name="password_confirmation" required autocomplete="new-password">
                                    </span>
                                </div>
                                <input type="hidden" value="vendor" name="role">
                                <div class="d-flex mb-3">

                                    <input type="checkbox" required class="@error('terms') is-invalid @enderror"
                                        id="terms" style="width: 25px;" value="1" name="terms"
                                        required><a href="{{url('page/policies')}}" style="" target="_banl" class="mt-0 ml-2">I have
                                        read and agree to the <span>Terms &amp; Conditions of
                                            AhroMart</span></a><span class="checked"></span>
                                    @error('terms')
                                        <span class="invalid-feedback " role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <span class="ec-login-wrap ec-login-btn">
                                    <div class="col-md-12 ">
                                        <button type="submit" class="btn btn-dark rounded rounded-4">
                                            {{ __('Register') }}
                                        </button>

                                </span>
                                
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app>