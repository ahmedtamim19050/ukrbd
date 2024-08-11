@php
    $route = route('shops');
@endphp

<div class="header-bottom sticky-content fix-top sticky-header has-dropdown"
    style="background-color: #007cc5 !important; ">
    <div class="container">
        <div class="inner-wrap">
            <div class="header-left">
                <div class="dropdown category-dropdown @if (url('/') == url()->current()) show-dropdown @endif"
                    data-visible="false">
                    <a href="#" class="text-white category-toggle" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="true" data-display="static" title="Browse Categories"
                        style="background-color: #2A9CF5 !important;">
                        <i class="w-icon-category"></i>
                        <span>Browse Categories</span>
                    </a>


                    <div class="dropdown-box">
                        <ul class="menu vertical-menu category-menu">
                            @foreach ($categories as $category)
                                    <li>
                                        <!-- Update the link here for parent categories -->
                                        <a id="categoryId" href="javascript:void(0)"
                                            onclick='updateSearchParams("category","{{ $category->slug }}","{{ $route }}")'>
                                            <i class=""></i>{{ $category->name }}
                                        </a>
                                        @if ($category->childrens->count() > 0)
                                        <ul class="megamenu">
                                            
                                            @foreach ($category->childrens as $item)
                                                <li>
                                                   
                                                            <a id="categoryId" class="menu-item-line" style="font-weight: 400"
                                                            href="javascript:void(0)"
                                                            onclick='updateSearchParams("category","{{ $item->slug }}","{{ $route }}")'>
                                                            {{ $item->name }}
                                                        </a>
                                                        </li> 
                                            @endforeach
                                        </ul>
                                        @endif
                                    </li>
                               
                            @endforeach
                            {{-- <li>
                                <a href="#" class="font-weight-bold text-uppercase ls-25">
                                    View All Categories<i class="w-icon-angle-right"></i>
                                </a>
                            </li> --}}
                        </ul>

                    </div>
                </div>

                <nav class="main-nav">
                    <ul class="menu active-underline">
                        <li class="{{url()->current() == url('/') ? 'active' : '' }}">
                            <a href="{{ route('homepage') }}">Home</a>
                        </li>
                        <li class="{{ url()->current() == url('/shops') ? 'active' : '' }}">
                            <a href="{{ route('shops') }}">Shop</a>


                        </li>
                        <li class="{{ url()->current() == url('/vendors') ? 'active' : '' }}">
                            <a href="{{ route('vendors') }}">Vendors</a>


                        </li>


                    </ul>
                </nav>
            </div>
            {{-- <div class="header-right">
                <a href="#" class="d-xl-show" style="color: #ffff"><i class="w-icon-map-marker mr-1"
                        style="color: #ffff"></i>Track Order</a>
                <a href="#" style="color: #ffff"><i class="w-icon-sale" style="color: #ffff"></i>Daily Deals</a>
            </div> --}}
        </div>
    </div>
</div>
