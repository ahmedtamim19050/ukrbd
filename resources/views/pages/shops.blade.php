  <x-app>
      @php
          $route = route('shops');
      @endphp
      <x-slot name="css">
          <!-- Vendor CSS -->
          <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/fontawesome-free/css/all.min.css') }}">
          <!-- Plugins CSS -->
          <link rel="stylesheet" href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}">
          <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/animate/animate.min.css') }}">
          <link rel="stylesheet" type="text/css"
              href="{{ asset('assets/vendor/magnific-popup/magnific-popup.min.css') }}">
          <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/demo5.min.css') }}">
          <!-- Default CSS -->
          <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.min.css') }}">
      </x-slot>

      <nav class="breadcrumb-nav">
          <div class="container">
              <ul class="breadcrumb" style="background-color: #ffff">
                  <li><a href="{{ route('homepage') }}">Home</a></li>
                  <li><a href="#">Shops</a></li>
              </ul>
          </div>
      </nav>
      <!-- End of Breadcrumb -->

      <!-- Start of Page Content -->
      <div class="page-content mt-5">
          <div class="container">
              <!-- Start of Shop Banner -->
              {{-- <div class="shop-default-banner banner d-flex align-items-center mb-5 br-xs"
                style="background-image: url(assets/images/shop/banner1.jpg); background-color: #FFC74E;">
                <div class="banner-content">
                    <h4 class="banner-subtitle font-weight-bold">Accessories Collection</h4>
                    <h3 class="banner-title text-white text-uppercase font-weight-bolder ls-normal">Smart Wrist
                        Watches</h3>
                    <a href="shop-banner-sidebar.html" class="btn btn-dark btn-rounded btn-icon-right">Discover
                        Now<i class="w-icon-long-arrow-right"></i></a>
                </div>
            </div> --}}
              <!-- End of Shop Banner -->

              {{-- <div class="shop-default-brands mb-5">
                <div class="brands-swiper swiper-container swiper-theme "
                    data-swiper-options="{
                        'slidesPerView': 2,
                        'breakpoints': {
                            '576': {
                                'slidesPerView': 3
                            },
                            '768': {
                                'slidesPerView': 4
                            },
                            '992': {
                                'slidesPerView': 6
                            },
                            '1200': {
                                'slidesPerView': 7
                            }
                        },
                        'autoplay': {
                            'delay': 4000,
                            'disableOnInteraction': false
                        }
                    }">
                    <div class="swiper-wrapper row gutter-no cols-xl-7 cols-lg-6 cols-md-4 cols-sm-3 cols-2">
                        <div class="swiper-slide">
                            <figure>
                                <img src="assets/images/brands/category/1.png" alt="Brand" width="160" height="90" />
                            </figure>
                        </div>
                        <div class="swiper-slide">
                            <figure>
                                <img src="assets/images/brands/category/2.png" alt="Brand" width="160" height="90" />
                            </figure>
                        </div>
                        <div class="swiper-slide">
                            <figure>
                                <img src="assets/images/brands/category/3.png" alt="Brand" width="160" height="90" />
                            </figure>
                        </div>
                        <div class="swiper-slide">
                            <figure>
                                <img src="assets/images/brands/category/4.png" alt="Brand" width="160" height="90" />
                            </figure>
                        </div>
                        <div class="swiper-slide">
                            <figure>
                                <img src="assets/images/brands/category/5.png" alt="Brand" width="160" height="90" />
                            </figure>
                        </div>
                        <div class="swiper-slide">
                            <figure>
                                <img src="assets/images/brands/category/6.png" alt="Brand" width="160" height="90" />
                            </figure>
                        </div>
                        <div class="swiper-slide">
                            <figure>
                                <img src="assets/images/brands/category/7.png" alt="Brand" width="160" height="90" />
                            </figure>
                        </div>
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div> --}}
              <!-- End of Shop Brands-->

              <!-- Start of Shop Category -->
              {{-- <div class="shop-default-category category-ellipse-section mb-6">
                <div class="swiper-container swiper-theme shadow-swiper"
                    data-swiper-options="{
                    'spaceBetween': 20,
                    'slidesPerView': 2,
                    'breakpoints': {
                        '480': {
                            'slidesPerView': 3
                        },
                        '576': {
                            'slidesPerView': 4
                        },
                        '768': {
                            'slidesPerView': 6
                        },
                        '992': {
                            'slidesPerView': 7
                        },
                        '1200': {
                            'slidesPerView': 8,
                            'spaceBetween': 30
                        }
                    }
                }">
                    <div class="swiper-wrapper row gutter-lg cols-xl-8 cols-lg-7 cols-md-6 cols-sm-4 cols-xs-3 cols-2">
                        <div class="swiper-slide category-wrap">
                            <div class="category category-ellipse">
                                <figure class="category-media">
                                    <a href="shop-banner-sidebar.html">
                                        <img src="assets/images/categories/category-4.jpg" alt="Categroy"
                                            width="190" height="190" style="background-color: #5C92C0;" />
                                    </a>
                                </figure>
                                <div class="category-content">
                                    <h4 class="category-name">
                                        <a href="shop-banner-sidebar.html">Sports</a>
                                    </h4>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide category-wrap">
                            <div class="category category-ellipse">
                                <figure class="category-media">
                                    <a href="shop-banner-sidebar.html">
                                        <img src="assets/images/categories/category-5.jpg" alt="Categroy"
                                            width="190" height="190" style="background-color: #B8BDC1;" />
                                    </a>
                                </figure>
                                <div class="category-content">
                                    <h4 class="category-name">
                                        <a href="shop-banner-sidebar.html">Babies</a>
                                    </h4>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide category-wrap">
                            <div class="category category-ellipse">
                                <figure class="category-media">
                                    <a href="shop-banner-sidebar.html">
                                        <img src="assets/images/categories/category-6.jpg" alt="Categroy"
                                            width="190" height="190" style="background-color: #99C4CA;" />
                                    </a>
                                </figure>
                                <div class="category-content">
                                    <h4 class="category-name">
                                        <a href="shop-banner-sidebar.html">Sneakers</a>
                                    </h4>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide category-wrap">
                            <div class="category category-ellipse">
                                <figure class="category-media">
                                    <a href="shop-banner-sidebar.html">
                                        <img src="assets/images/categories/category-7.jpg" alt="Categroy"
                                            width="190" height="190" style="background-color: #4E5B63;" />
                                    </a>
                                </figure>
                                <div class="category-content">
                                    <h4 class="category-name">
                                        <a href="shop-banner-sidebar.html">Cameras</a>
                                    </h4>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide category-wrap">
                            <div class="category category-ellipse">
                                <figure class="category-media">
                                    <a href="shop-banner-sidebar.html">
                                        <img src="assets/images/categories/category-8.jpg" alt="Categroy"
                                            width="190" height="190" style="background-color: #D3E5EF;" />
                                    </a>
                                </figure>
                                <div class="category-content">
                                    <h4 class="category-name">
                                        <a href="shop-banner-sidebar.html">Games</a>
                                    </h4>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide category-wrap">
                            <div class="category category-ellipse">
                                <figure class="category-media">
                                    <a href="shop-banner-sidebar.html">
                                        <img src="assets/images/categories/category-9.jpg" alt="Categroy"
                                            width="190" height="190" style="background-color: #65737C;" />
                                    </a>
                                </figure>
                                <div class="category-content">
                                    <h4 class="category-name">
                                        <a href="shop-banner-sidebar.html">Kitchen</a>
                                    </h4>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide category-wrap">
                            <div class="category category-ellipse">
                                <figure class="category-media">
                                    <a href="shop-banner-sidebar.html">
                                        <img src="assets/images/categories/category-20.jpg" alt="Categroy"
                                            width="190" height="190" style="background-color: #E4E4E4;" />
                                    </a>
                                </figure>
                                <div class="category-content">
                                    <h4 class="category-name">
                                        <a href="shop-banner-sidebar.html">Watches</a>
                                    </h4>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide category-wrap">
                            <div class="category category-ellipse">
                                <figure class="category-media">
                                    <a href="shop-banner-sidebar.html">
                                        <img src="assets/images/categories/category-21.jpg" alt="Categroy"
                                            width="190" height="190" style="background-color: #D3D8DE;" />
                                    </a>
                                </figure>
                                <div class="category-content">
                                    <h4 class="category-name">
                                        <a href="shop-banner-sidebar.html">Clothes</a>
                                    </h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div> --}}
              <!-- End of Shop Category -->

              <!-- Start of Shop Content -->
              <div class="shop-content row gutter-lg mb-10">
                  <!-- Start of Sidebar, Shop Sidebar -->
                  <aside class="sidebar shop-sidebar sticky-sidebar-wrapper sidebar-fixed">
                      <!-- Start of Sidebar Overlay -->
                      <div class="sidebar-overlay"></div>
                      <a class="sidebar-close" href="#"><i class="close-icon"></i></a>

                      <!-- Start of Sidebar Content -->
                      <div class="sidebar-content scrollable">
                          <!-- Start of Sticky Sidebar -->
                          <div class="sticky-sidebar">
                              <div class="filter-actions">
                                  <label>Filter :</label>
                                  <a href="{{ route('shops') }}" class="btn btn-dark btn-link ">Clean All</a>
                              </div>
                              <!-- Start of Collapsible widget -->
                              <div class="widget widget-collapsible">
                                  <h3 class="widget-title"><label>All Categories</label></h3>
                                  <ul class="widget-body filter-items search-ul">
                                      @foreach ($categories as $category)
                                          <li><a href="javascript::void(0)"
                                                  onclick='updateSearchParams("category","{{ $category->slug }}","{{ $route }}")'>{{ $category->name }}</a>
                                          </li>
                                      @endforeach

                                  </ul>
                              </div>
                              <!-- End of Collapsible Widget -->

                              <!-- Start of Collapsible Widget -->
                              <div class="widget widget-collapsible">
                                  <h3 class="widget-title"><label>Price</label></h3>
                                  <div class="widget-body">
                                      <ul class="filter-items search-ul">
                                          <li><a href="javascript::void(0)"
                                                  onclick='updateSearchParams("","","{{ $route }}","0","500")'>0.00
                                                  Tk - 500.00 Tk</a></li>
                                          <li><a href="javascript::void(0)"
                                                  onclick='updateSearchParams("","","{{ $route }}","500","1000")'>500.00
                                                  TK - 1000.00 Tk</a></li>
                                          <li><a href="javascript::void(0)"
                                                  onclick='updateSearchParams("","","{{ $route }}","1000","5000")'>1000.00
                                                  Tk - 5000.00 Tk</a></li>
                                          <li><a href="javascript::void(0)"
                                                  onclick='updateSearchParams("","","{{ $route }}","5000","10000")'>5000.00
                                                  Tk - 10000.00 Tk</a></li>
                                          <li><a href="javascript::void(0)"
                                                  onclick='updateSearchParams("","","{{ $route }}","10000","")'>10000.00
                                                  Tk +</a></li>
                                      </ul>
                                      {{-- <form class="price-range">
                                        <input type="number" name="min_price" class="min_price text-center"
                                            placeholder="$min"><span class="delimiter">-</span><input
                                            type="number" name="max_price" class="max_price text-center"
                                            placeholder="$max"><a href="#"
                                            class="btn btn-primary btn-rounded">Go</a>
                                    </form> --}}
                                  </div>
                              </div>
                              <!-- End of Collapsible Widget -->

                              <!-- Start of Collapsible Widget -->
                              <div class="widget widget-collapsible">
                                  <h3 class="widget-title"><label>Rating</label></h3>
                                  <ul class="widget-body filter-items item-check mt-1">
                                      <li class="{{ request()->ratings == 5 ? 'active' : '' }}">
                                          <a href="javascript::void(0)"
                                              onclick='updateSearchParams("ratings","5","{{ $route }}")'>
                                              <i class="fas fa-star" style="color: #f93"></i>
                                              <i class="fas fa-star" style="color: #f93"></i>
                                              <i class="fas fa-star" style="color: #f93"></i>
                                              <i class="fas fa-star" style="color: #f93"></i>
                                              <i class="fas fa-star" style="color: #f93"></i>
                                          </a>
                                      </li>
                                      <li class="{{ request()->ratings == 4 ? 'active' : '' }}">
                                          <a href="javascript::void(0)"
                                              onclick='updateSearchParams("ratings","4","{{ $route }}")'>

                                              <i class="fas fa-star" style="color: #f93"></i>
                                              <i class="fas fa-star" style="color: #f93"></i>
                                              <i class="fas fa-star" style="color: #f93"></i>
                                              <i class="fas fa-star" style="color: #f93"></i>
                                              <i class="far fa-star" style="color: #f93"></i>
                                          </a>
                                      </li>
                                      <li class="{{ request()->ratings == 3 ? 'active' : '' }}">
                                          <a href="javascript::void(0)"
                                              onclick='updateSearchParams("ratings","3","{{ $route }}")'>
                                              <i class="fas fa-star" style="color: #f93"></i>
                                              <i class="fas fa-star" style="color:  #f93"></i>
                                              <i class="fas fa-star" style="color: #f93"></i>
                                              <i class="far fa-star" style="color: #f93"></i>
                                              <i class="far fa-star" style="color: #f93"></i>
                                          </a>
                                      </li>
                                      <li class="{{ request()->ratings == 2 ? 'active' : '' }}">
                                          <a href="javascript::void(0)"
                                              onclick='updateSearchParams("ratings","2","{{ $route }}")'>
                                              <i class="fas fa-star" style="color: #f93"></i>
                                              <i class="fas fa-star" style="color: #f93"></i>
                                              <i class="far fa-star" style="color: #f93"></i>
                                              <i class="far fa-star" style="color: #f93"></i>
                                              <i class="far fa-star" style="color: #f93"></i>
                                          </a>
                                      </li>
                                      <li class="{{ request()->ratings == 1 ? 'active' : '' }}">
                                          <a href="javascript::void(0)"
                                              onclick='updateSearchParams("ratings","1","{{ $route }}")'>
                                              <i class="fas fa-star" style="color: #f93"></i>
                                              <i class="far fa-star" style="color: #f93"></i>
                                              <i class="far fa-star" style="color: #f93"></i>
                                              <i class="far fa-star" style="color: #f93"></i>
                                              <i class="far fa-star" style="color: #f93"></i>
                                          </a>
                                      </li>
                                  </ul>
                              </div>
                              <!-- End of Collapsible Widget -->




                          </div>
                          <!-- End of Sidebar Content -->
                      </div>
                      <!-- End of Sidebar Content -->
                  </aside>
                  <!-- End of Shop Sidebar -->

                  <!-- Start of Shop Main Content -->
                  <div class="main-content">
                      <nav class="toolbox sticky-toolbox sticky-content fix-top">
                          <div class="toolbox-left">
                              <a href="#"
                                  class="btn btn-primary btn-outline btn-rounded left-sidebar-toggle 
                                btn-icon-left d-block d-lg-none"><i
                                      class="w-icon-category"></i><span>Filters</span></a>
                              <div class="toolbox-item toolbox-sort select-box text-dark">
                                  <label>Sort By :</label>
                                  <select name="orderby" class="form-control"
                                      onchange='updateSearchParams("filter_products",this.value,"{{ $route }}")'>
                                      <option value="default" selected="selected">Default sorting</option>
                                      <option value="most-sold"
                                          {{ request()->filter_products == 'most-sold' ? 'selected' : '' }}>Sort by
                                          popularity</option>
                                      <option value="price-low-high"
                                          {{ request()->filter_products == 'price-low-high' ? 'selected' : '' }}>Sort
                                          by pric: low to high</option>
                                      <option value="price-high-low"
                                          {{ request()->filter_products == 'price-high-low' ? 'selected' : '' }}>Sort
                                          by price: high to low</option>
                                  </select>
                              </div>
                          </div>
                          {{-- <div class="toolbox-right">
                              <div class="toolbox-item toolbox-show select-box">
                                  <select name="count" class="form-control">
                                      <option value="9">Show 9</option>
                                      <option value="12" selected="selected">Show 12</option>
                                      <option value="24">Show 24</option>
                                      <option value="36">Show 36</option>
                                  </select>
                              </div>
                              <div class="toolbox-item toolbox-layout">
                                  <a href="shop-banner-sidebar.html" class="icon-mode-grid btn-layout active">
                                      <i class="w-icon-grid"></i>
                                  </a>
                                  <a href="shop-list.html" class="icon-mode-list btn-layout">
                                      <i class="w-icon-list"></i>
                                  </a>
                              </div>
                          </div> --}}
                      </nav>
                      <div class="product-wrapper row cols-md-3 cols-sm-2 cols-2">

                          @foreach ($products as $product)
                              <x-products.card :product="$product" />
                          @endforeach

                      </div>

                      <div class="toolbox toolbox-pagination justify-content-between">
                          <p class="showing-info mb-2 mb-sm-0">
                              Showing<span>1-12 of 60</span>Products
                          </p>
                          <ul class="pagination">
                              <li class="prev disabled">
                                  <a href="#" aria-label="Previous" tabindex="-1" aria-disabled="true">
                                      <i class="w-icon-long-arrow-left"></i>Prev
                                  </a>
                              </li>
                              <li class="page-item active">
                                  <a class="page-link" href="#">1</a>
                              </li>
                              <li class="page-item">
                                  <a class="page-link" href="#">2</a>
                              </li>
                              <li class="next">
                                  <a href="#" aria-label="Next">
                                      Next<i class="w-icon-long-arrow-right"></i>
                                  </a>
                              </li>
                          </ul>
                      </div>
                  </div>
                  <!-- End of Shop Main Content -->
              </div>
              <!-- End of Shop Content -->
          </div>
      </div>
      <!-- End of Page Content -->

  </x-app>
