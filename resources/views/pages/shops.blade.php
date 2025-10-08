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
          <!-- Default CSS -->
          <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.min.css') }}">

          <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/demo5.min.css') }}?v={{ uniqid() }}">
          <style>
              .rating-input {
                  margin-right: 8px;
                  transform: scale(1.5);
                  height: 13px;
                  width: 13px;
                  accent-color: #f93;
              }

              .category-height {
                  height: 70vh;
                  overflow-y: scroll;
              }

              .category-height::-webkit-scrollbar {
                  width: 12px;
              }

              .category-height::-webkit-scrollbar-track {
                  background: #f1f1f1;
              }

              .category-height::-webkit-scrollbar-thumb {
                  background: #888;
                  border-radius: 6px;
              }

              .category-height::-webkit-scrollbar-thumb:hover {
                  background: #555;
              }

              .category-height {
                  scrollbar-width: thin;
                  scrollbar-color: #eca09a #f1f1f1;
              }

              .category-height {
                  -ms-overflow-style: -ms-autohiding-scrollbar;
              }

              main {
                  background-color: #EEEEEE;
              }

              .sticky-sidebar {
                  padding: 0 10px
              }
              .select-box select, .select-menu select{
                  height: 100% !important;
              }

              /* Loading spinner styles */
              .spinner-border {
                  width: 3rem;
                  height: 3rem;
                  border-width: 0.3em;
              }

              #loading-indicator, #end-message {
                  padding: 2rem 0;
                  margin: 2rem 0;
              }

              #loading-indicator .spinner-border {
                  color: #007bff;
              }
          </style>
      </x-slot>

      <nav class="breadcrumb-nav">
          <div class="container">
              <ul class="breadcrumb" style="margin-top:5px">
                  <li><a href="{{ route('homepage') }}">Home</a></li>
                  <li><a href="#">Shops</a></li>
              </ul>
          </div>
      </nav>
      <div class="page-content mt-5">
          @if ($parent)
              <div style="position: relative; height: 250px;">
                  <img src="{{ Storage::url($parent->cover) }}" style="height: 100%; width: 100%;" alt="">
                  <div
                      style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; display: flex; justify-content: center; align-items: center;">
                      <h1 style="color: white; text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);">
                          {{ $parent->name }}
                      </h1>
                  </div>
              </div>

              <br>
              <br>
          @endif
          <div class="container">
              @if (request()->filled('parent') && $categories->count())
                  <x-pages.home.categories param="category" :categories="$categories" :route="route('shops')" />
              @endif
              <div class="shop-content row gutter-lg mb-10">
                  <aside class="sidebar shop-sidebar sticky-sidebar-wrapper sidebar-fixed">
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
                              <div class="widget widget-collapsible category-height">
                                  <h3 class="widget-title"><label>All Categories</label></h3>
                                  <ul class="widget-body filter-items search-ul">
                                      @foreach ($categories as $category)
                                          <li><a style="text-transform: capitalize" href="javascript::void(0)"
                                                  onclick='updateSearchParams("category","{{ $category->slug }}","{{ $route }}")'>{{ $category->name }}
                                                  <small>({{ $category->products_count }})</small></a>
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
                                          <li><a href="javascript::void(0)"`
                                                  onclick='updateSearchParams("","","{{ $route }}","1000","5000")'>1000.00
                                                  Tk - 5000.00 Tk</a></li>
                                          <li><a href="javascript::void(0)"
                                                  onclick='updateSearchParams("","","{{ $route }}","5000","10000")'>5000.00
                                                  Tk - 10000.00 Tk</a></li>
                                          <li><a href="javascript::void(0)"
                                                  onclick='updateSearchParams("","","{{ $route }}","10000","")'>10000.00
                                                  Tk +</a></li>
                                      </ul>

                                  </div>
                              </div>
                              <!-- End of Collapsible Widget -->
                              @if ($filters)
                                  @foreach ($filters as $filter)
                                      <div class="widget widget-collapsible">
                                          <h3 class="widget-title"><label>{{ $filter->name }}</label></h3>


                                          <ul class="widget-body filter-items item-check mt-1">
                                              @foreach ($filter->getValue() as $value)
                                                  <li class="" style="margin:10px 0;">
                                                      <label>
                                                          <input class="input" onchange="filterAttributes(this)"
                                                              type="checkbox"
                                                              name="filter[{{ $filter->name }}][{{ $loop->index }}]"
                                                              value="{{ $value }}"
                                                              {{ in_array($value, @request()->filter[$filter->name] ?? []) ? 'checked' : '' }}>
                                                          {{ $value }}
                                                      </label>
                                                  </li>
                                              @endforeach
                                          </ul>

                                      </div>
                                  @endforeach
                              @endif
                              <!-- Start of Collapsible Widget -->
                              <div class="widget widget-collapsible">
                                  <h3 class="widget-title"><label>Rating</label></h3>


                                  <form id="ratingForm" action="{{ $route }}" method="GET">
                                      <ul class="widget-body filter-items item-check mt-1">
                                          @foreach ([5, 4, 3, 2, 1] as $rating)
                                              <li class="{{ request()->ratings == $rating ? 'active' : '' }}"
                                                  style="margin:10px 0;">
                                                  <label>
                                                      <input class="rating-input" type="checkbox" name="ratings"
                                                          value="{{ $rating }}"
                                                          {{ request()->ratings == $rating ? 'checked' : '' }}>
                                                      @for ($i = 0; $i < 5; $i++)
                                                          @if ($i < $rating)
                                                              <i class="fas fa-star" style="color: #f93"></i>
                                                          @else
                                                              <i class="far fa-star" style="color: #f93"></i>
                                                          @endif
                                                      @endfor
                                                  </label>
                                              </li>
                                          @endforeach
                                      </ul>
                                  </form>
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
                                  class="btn  btn-outline btn-rounded left-sidebar-toggle 
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
                      <div class="product-wrapper row cols-md-3 cols-sm-2 cols-2" id="products-container">
                          @include('partials.products', ['products' => $products])
                      </div>

                      <!-- Loading indicator -->
                      <div id="loading-indicator" class="text-center mt-4" style="display: none;">
                          <div class="spinner-border text-primary" role="status">
                              <span class="sr-only">Loading...</span>
                          </div>
                          <p class="mt-2">Loading more products...</p>
                      </div>

                      <!-- End of products message -->
                      <div id="end-message" class="text-center mt-4" style="display: none;">
                          <p class="text-muted">No more products to load.</p>
                      </div>

                      <!-- Debug button -->
                      {{-- <div class="text-center mt-4">
                          <button onclick="loadMoreProducts()" class="btn btn-primary">Test Load More Products</button>
                          <button onclick="console.log('Current state:', {currentPage, isLoading, hasMoreProducts})" class="btn btn-secondary">Log State</button>
                      </div> --}}



                  </div>
                  <!-- End of Shop Main Content -->
              </div>
              <!-- End of Shop Content -->
          </div>
      </div>
      <!-- End of Page Content -->

      <script>
          let currentPage = 1;
          let isLoading = false;
          let hasMoreProducts = true;
          let observer = null;

          // Function to get current URL parameters
          function getCurrentUrlParams() {
              const urlParams = new URLSearchParams(window.location.search);
              return urlParams.toString();
          }

          // Function to load more products
          function loadMoreProducts() {
              if (isLoading || !hasMoreProducts) {
                  console.log('Skipping load - isLoading:', isLoading, 'hasMoreProducts:', hasMoreProducts);
                  return;
              }

              console.log('Loading more products, current page:', currentPage);
              isLoading = true;
              document.getElementById('loading-indicator').style.display = 'block';

              const nextPage = currentPage + 1;
              const urlParams = getCurrentUrlParams();
              const url = `{{ route('shops') }}?page=${nextPage}&${urlParams}`;

              console.log('Fetching URL:', url);

              fetch(url, {
                  method: 'GET',
                  headers: {
                      'X-Requested-With': 'XMLHttpRequest',
                      'Accept': 'application/json',
                      'Content-Type': 'application/json',
                  }
              })
              .then(response => {
                  console.log('Response status:', response.status);
                  if (!response.ok) {
                      throw new Error(`HTTP error! status: ${response.status}`);
                  }
                  return response.json();
              })
              .then(data => {
                  console.log('Received data:', data);
                  if (data.products && data.products.trim() !== '') {
                      // Append new products to the container
                      document.getElementById('products-container').insertAdjacentHTML('beforeend', data.products);
                      currentPage = data.nextPage - 1;
                      hasMoreProducts = data.hasMore;
                      
                      console.log('Updated currentPage:', currentPage, 'hasMoreProducts:', hasMoreProducts);
                      
                      if (!hasMoreProducts) {
                          document.getElementById('end-message').style.display = 'block';
                          // Stop observing when no more products
                          if (observer) {
                              observer.disconnect();
                              observer = null;
                          }
                      }
                  } else {
                      console.log('No products received or empty response');
                      hasMoreProducts = false;
                      document.getElementById('end-message').style.display = 'block';
                  }
              })
              .catch(error => {
                  console.error('Error loading more products:', error);
                  hasMoreProducts = false;
              })
              .finally(() => {
                  isLoading = false;
                  document.getElementById('loading-indicator').style.display = 'none';
              });
          }

          // Simple scroll-based infinite scroll
          function initializeScrollListener() {
              console.log('Initializing scroll listener');
              
              window.addEventListener('scroll', function() {
                  // Check if we're near the bottom of the page
                  const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
                  const windowHeight = window.innerHeight;
                  const documentHeight = document.documentElement.scrollHeight;
                  
                  // Trigger when user is 300px from bottom
                  if (scrollTop + windowHeight >= documentHeight - 300) {
                      console.log('Near bottom of page, checking if should load more');
                      if (hasMoreProducts && !isLoading) {
                          console.log('Scroll triggered load more');
                          loadMoreProducts();
                      }
                  }
              });
          }

          // Reset pagination when filters change
          function resetPagination() {
              console.log('Resetting pagination');
              currentPage = 1;
              hasMoreProducts = true;
              document.getElementById('end-message').style.display = 'none';
              
              // Clear existing products and reload with current filters
              document.getElementById('products-container').innerHTML = '';
              
              // Load first page with current filters
              const urlParams = getCurrentUrlParams();
              const url = `{{ route('shops') }}?page=1&${urlParams}`;
              
              console.log('Loading filtered products from:', url);
              
              fetch(url, {
                  method: 'GET',
                  headers: {
                      'X-Requested-With': 'XMLHttpRequest',
                      'Accept': 'application/json',
                      'Content-Type': 'application/json',
                  }
              })
              .then(response => response.json())
              .then(data => {
                  console.log('Filtered products response:', data);
                  if (data.products) {
                      document.getElementById('products-container').innerHTML = data.products;
                      currentPage = 1;
                      hasMoreProducts = data.hasMore;
                      
                      console.log('Filtered products loaded, hasMore:', hasMoreProducts);
                      
                      if (!hasMoreProducts) {
                          document.getElementById('end-message').style.display = 'block';
                      }
                  }
              })
              .catch(error => {
                  console.error('Error loading filtered products:', error);
              });
          }

          // Override the existing updateSearchParams function to use AJAX instead of redirect
          if (typeof updateSearchParams === 'function') {
              const originalUpdateSearchParams = updateSearchParams;
              updateSearchParams = function(param, value, route, min, max, target) {
                  if (target === "_self" || target === undefined) {
                      // Use AJAX for infinite scroll
                      const url = new URL(window.location.href);
                      url.searchParams.set(param, value);
                      
                      if (min !== undefined && min !== null) {
                          url.searchParams.set('priceMin', min);
                      }
                      if (max !== undefined && max !== null) {
                          url.searchParams.set('priceMax', max);
                      }
                      
                      // Update URL without reloading
                      window.history.pushState({}, '', url.href);
                      
                      // Reset pagination and load new results
                      resetPagination();
                  } else {
                      // Use original function for other targets
                      originalUpdateSearchParams(param, value, route, min, max, target);
                  }
              };
          }

          // Override filterAttributes to use AJAX
          if (typeof filterAttributes === 'function') {
              const originalFilterAttributes = filterAttributes;
              filterAttributes = function(element) {
                  const name = element.getAttribute('name');
                  const value = element.value;
                  const isChecked = element.checked;
                  
                  const url = new URL(window.location.href);
                  
                  if (isChecked) {
                      url.searchParams.set(name, value);
                  } else {
                      url.searchParams.delete(name);
                  }
                  
                  // Update URL without reloading
                  window.history.pushState({}, '', url.href);
                  
                  // Reset pagination and load new results
                  resetPagination();
              };
          }

          // Reset pagination when rating filter changes
          document.addEventListener('change', function(e) {
              if (e.target.name === 'ratings') {
                  setTimeout(resetPagination, 100);
              }
          });

          // Initialize infinite scroll
          document.addEventListener('DOMContentLoaded', function() {
              console.log('DOM Content Loaded');
              const productContainer = document.getElementById('products-container');
              
              if (productContainer) {
                  const productCount = productContainer.children.length;
                  console.log('Initial product count:', productCount);
                  
                  // Set initial state based on product count
                  // If we have 20+ products, assume there are more pages
                  hasMoreProducts = productCount >= 20;
                  console.log('Initial hasMoreProducts:', hasMoreProducts);
                  
                  // Initialize the scroll listener
                  initializeScrollListener();
                  
                  // If there are no products initially, try to load some
                  if (productCount === 0) {
                      console.log('No products found, loading initial products');
                      loadMoreProducts();
                  }
              }
              
              // Trigger infinite scroll if the page is already scrolled down
              if (window.scrollY > 0) {
                  setTimeout(() => {
                      if (hasMoreProducts && !isLoading) {
                          console.log('Page already scrolled, triggering load');
                          loadMoreProducts();
                      }
                  }, 500);
              }
          });
      </script>

  </x-app>
