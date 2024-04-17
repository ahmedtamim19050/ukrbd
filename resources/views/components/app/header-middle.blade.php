<div class="header-bottom sticky-content fix-top sticky-header has-dropdown" style="background-color: #007cc5">
    <div class="container">
        <div class="inner-wrap">
            <div class="header-left">
                <div class="dropdown category-dropdown show-dropdown" data-visible="true">
                    <a href="#" class="text-white category-toggle" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="true" data-display="static" title="Browse Categories">
                        <i class="w-icon-category"></i>
                        <span>Browse Categories</span>
                    </a>

                    <div class="dropdown-box">
                        <ul class="menu vertical-menu category-menu">

                            @foreach ($prodcats as $prodcat)
                                @if ($prodcat->childrens->count() > 0)
                                    <li>
                                        <a href="#">
                                            <i class=""></i>{{ $prodcat->name }}
                                        </a>

                                        <ul class="megamenu">
                                            @foreach ($prodcat->childrens as $item)
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
                        <li>
                            <a href="#">Vendor</a>
                            <ul>
                                <li>
                                    <a href="vendor-dokan-store-list.html">Store Listing</a>
                                    <ul>
                                        <li><a
                                                href=">Store listing 1</a></li>
                                    <li><a href=">Store
                                                listing 2</a></li>
                                        <li><a href="">Store listing 3</a></li>
                                        <li><a href="">Store listing 4</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">Vendor Store</a>
                                    <ul>
                                        <li><a href="#">Vendor Store 1</a></li>
                                        <li><a href="">Vendor Store 2</a>
                                        </li>
                                        <li><a href="">Vendor Store 3</a>
                                        </li>
                                        <li><a href="">Vendor Store 4</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">Blog</a>
                            <ul>
                                <li><a href="#">Classic</a></li>
                                <li><a href="blog-listing.html">Listing</a></li>
                                <li>
                                    <a href="#">Grid</a>
                                    <ul>
                                        <li><a href="#">Grid 2 columns</a></li>
                                        <li><a href="#">Grid 3 columns</a></li>
                                        <li><a href="#">Grid 4 columns</a></li>
                                        <li><a href="#">Grid sidebar</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">Masonry</a>
                                    <ul>
                                        <li><a href="#">Masonry 2 columns</a></li>
                                        <li><a href="#">Masonry 3 columns</a></li>
                                        <li><a href="#">Masonry 4 columns</a></li>
                                        <li><a href="#">Masonry sidebar</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">Mask</a>
                                    <ul>
                                        <li><a href="#">Blog mask grid</a></li>
                                        <li><a href="blog-mask-masonry.html">Blog mask masonry</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">Single Post</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">Pages</a>
                            <ul>

                                <li><a href="#">About Us</a></li>
                                <li><a href="#">Become A Vendor</a></li>
                                <li><a href="#">Contact Us</a></li>
                                <li><a href="#">FAQs</a></li>
                                <li><a href="#">Error 404</a></li>
                                <li><a href="#">Coming Soon</a></li>
                                <li><a href="#">Wishlist</a></li>
                                <li><a href="#">Cart</a></li>
                                <li><a href="#">Checkout</a></li>
                                <li><a href="#">My Account</a></li>
                                <li><a href="#">Compare</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">Elements</a>
                            <ul>
                                <li><a href="#">Accordions</a></li>
                                <li><a href="#">Alert &amp; Notification</a></li>
                                <li><a href="#">Blog Posts</a></li>
                                <li><a href="#">Buttons</a></li>
                                <li><a href="#">Call to Action</a></li>
                                <li><a href="#">Icons</a></li>
                                <li><a href="#">Icon Boxes</a></li>
                                <li><a href="#">Instagrams</a></li>
                                <li><a href="#">Product Category</a></li>
                                <li><a href="#">Products</a></li>
                                <li><a href="#">Tabs</a></li>
                                <li><a href="#">Testimonials</a></li>
                                <li><a href="#">Titles</a></li>
                                <li><a href="#">Typography</a></li>

                                <li><a href="#">Vendors</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="header-right">
                <a href="#" class="d-xl-show"><i class="w-icon-map-marker mr-1"></i>Track Order</a>
                <a href="#"><i class="w-icon-sale"></i>Daily Deals</a>
            </div>
        </div>
    </div>
</div>
