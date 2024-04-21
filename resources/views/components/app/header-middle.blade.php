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
                                @if ($category->childrens->count() > 0)
                                    <li>
                                        <a href="#">
                                            <i class=""></i>{{ $category->name }}
                                        </a>

                                        <ul class="megamenu">
                                            @foreach ($category->childrens as $item)
                                                <li>
                                                    @if ($item->childrens->count() > 0)
                                                        <h4 class="menu-title"><a href="">{{ $item->name }}</a>
                                                        </h4>
                                                    @else
                                                        <a href="" class="d-block">{{ $item->name }}</a>
                                                    @endif
                                                    <hr class="divider">
                                                    @if ($item->childrens)
                                                        <x-categories.child :childs="$item->childrens" />
                                                    @endif

                                                </li>
                                            @endforeach

                                        </ul>
                                    </li>
                                @endif
                            @endforeach
                            <li>
                                <a href="#" class="font-weight-bold text-uppercase ls-25">
                                    View All Categories<i class="w-icon-angle-right"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <nav class="main-nav">
                    <ul class="menu active-underline">
                        <li class="{{ request()->route()->uri == '/' ? 'active' : '' }}">
                            <a href="{{ route('homepage') }}">Home</a>
                        </li>
                        <li class="{{ request()->route()->uri == 'shops' ? 'active' : '' }}">
                            <a href="{{ route('shops') }}">Shop</a>


                        </li>
                        <li class="{{ request()->route()->uri == 'vendors' ? 'active' : '' }}">
                            <a href="{{ route('vendors') }}">Vendors</a>


                        </li>


                    </ul>
                </nav>
            </div>
            <div class="header-right">
                <a href="#" class="d-xl-show" style="color: #ffff"><i class="w-icon-map-marker mr-1"
                        style="color: #ffff"></i>Track Order</a>
                <a href="#" style="color: #ffff"><i class="w-icon-sale" style="color: #ffff"></i>Daily Deals</a>
            </div>
        </div>
    </div>
</div>
