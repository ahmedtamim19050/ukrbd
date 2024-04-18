<div class="header-bottom sticky-content fix-top sticky-header has-dropdown" style="background-color: #007cc5 !important; ">
    <div class="container">
        <div class="inner-wrap">
            <div class="header-left">
                <div class="dropdown category-dropdown show-dropdown" data-visible="true">
                    <a href="#" class="text-white category-toggle" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="true" data-display="static" title="Browse Categories" style="background-color: #2A9CF5 !important;">
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
                        <li class="active">
                            <a href="#">Home</a>
                        </li>
                        <li>
                            <a href="#">Shop</a>

                            <!-- Start of Megamenu -->
                            <ul class="megamenu">
                                <li>
                                    <h4 class="menu-title">Shop Pages</h4>
                                    <ul>
                                        <li><a href="#">Banner With Sidebar</a></li>
                                        <li><a href="#">Boxed Banner</a></li>
                                        <li><a href="#">Full Width Banner</a></li>
                                        <li><a href="#">Horizontal Filter<span class="tip tip-hot">Hot</span></a>
                                        </li>
                                        <li><a href="#">Off Canvas Sidebar<span class="tip tip-new">New</span></a>
                                        </li>
                                        <li><a href="#">Infinite Ajax Scroll</a>
                                        </li>
                                        <li><a href="#">Right Sidebar</a></li>
                                        <li><a href="#">Both Sidebar</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <h4 class="menu-title">Shop Layouts</h4>
                                    <ul>
                                        <li><a href="#">3 Columns Mode</a></li>
                                        <li><a href="">4 Columns Mode</a></li>
                                        <li><a href="">5 Columns Mode</a></li>
                                        <li><a href="">6 Columns Mode</a></li>
                                        <li><a href="">7 Columns Mode</a></li>
                                        <li><a href="">8 Columns Mode</a></li>
                                        <li><a href="">List Mode</a></li>
                                        <li><a href="#">List Mode With Sidebar</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <h4 class="menu-title">Product Pages</h4>
                                    <ul>
                                        <li><a href="#">Variable Product</a></li>
                                        <li><a href="#">Featured &amp; Sale</a></li>
                                        <li><a href="#">Data In Accordion</a></li>
                                        <li><a href="#">Data In Sections</a></li>
                                        <li><a href="#">Image Swatch</a></li>
                                        <li><a href="#">Extended Info</a>
                                        </li>
                                        <li><a href="#">Without Sidebar</a></li>
                                        <li><a href="#">360<sup>o</sup> &amp; Video<span
                                                    class="tip tip-new">New</span></a></li>
                                    </ul>
                                </li>
                                <li>
                                    <h4 class="menu-title">Product Layouts</h4>
                                    <ul>
                                        <li><a href="#">Default<span class="tip tip-hot">Hot</span></a></li>
                                        <li><a href="#">Vertical Thumbs</a></li>
                                        <li><a href="#">Grid Images</a></li>
                                        <li><a href="#">Masonry</a></li>
                                        <li><a href="#">Gallery</a></li>
                                        <li><a href="#">Sticky Info</a></li>
                                        <li><a href="#">Sticky Thumbs</a></li>
                                        <li><a href="#">Sticky Both</a></li>
                                    </ul>
                                </li>
                            </ul>
                            <!-- End of Megamenu -->
                        </li>
                        
                    
                    </ul>
                </nav>
            </div>
            <div class="header-right">
                <a href="#" class="d-xl-show" style="color: #ffff"><i class="w-icon-map-marker mr-1" style="color: #ffff"></i>Track Order</a>
                <a href="#" style="color: #ffff"><i class="w-icon-sale" style="color: #ffff"></i>Daily Deals</a>
            </div>
        </div>
    </div>
</div>
