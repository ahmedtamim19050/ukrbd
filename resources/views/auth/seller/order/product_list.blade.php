<x-seller>
    <div class="ec-shop-rightside col-lg-9 col-md-12">
        <div class="ec-vendor-dashboard-card space-bottom-30 shadow-sm" style="border-radius: 12px !important;">
            <div class="ec-vendor-card-header">
                <h5> Order Products</h5>
                {{-- <div class="d-flex">
                    <div class="ec-header-btn">
                        <input class="form-control ec-search-bar" placeholder="Search products..." type="text">

                    </div>
                    <div class="ec-header-btn">
                        <a class="btn  btn-outline-dark" style="height: 47px;line-height: 48px; border:1px solid black"
                            href="#"><i class="fi-rr-filter"></i> Filter</a>
                    </div>


                </div> --}}

            </div>
            <div class="ec-vendor-card-body">
                <div class="row row-cols-1">
                    @foreach($orders as $order )
                    @php
                        
                        $product=App\Models\Product::find($order->product_id);
                        $shipping=json_decode($order->shipping);
                    @endphp
                    <div class="card my-2 border-dark ">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-2 text-center d-flex align-items-center justify-content-center">
                                    <img src="{{ Voyager::image($product->getImage()) }}" height="200px"
                                        style="object-fit: cover" alt="">
                                </div>
                                <div class="col-md-5 d-flex justify-content-between flex-column">
                                    <h6 class=" pb-2 mb-2 border-bottom border-dark">Order Details: </h6>
                                    <div>
                                        <p class="text-secondary">#{{ $order->id }}</p>
                                        <p class="mt-2 h6">{{ $product->name }} X {{ $order->quantity }}
                                        </p>
                                        <p>
                                        <ul>
                                            @if ($product->variations)
                                                @foreach ($order->product->variations as $varition => $value)
                                                    <li>
                                                        {{ $varition }} : {{ $value }}
                                                    </li>
                                                @endforeach
                                            @endif
                                            <li>
                                                SKU : {{ $product->sku }}
                                            </li>
                                        </ul>
                                        </p>
                                        <p class="h4 mt-3">
                                            {{ Sohoj::price($order->total + $order->platform_fee) }}
                                        </p>
                                    </div>

                                    <p class="mt-3">Order Date : {{ Carbon\Carbon::parse($order->created_at)->format('d-m-Y') }}
                                    </p>
                                </div>
                                <div class="col-md-5 d-flex justify-content-between flex-column">
                                    <h6 class=" pb-2 mb-2 border-bottom border-dark">Delivery Details: </h6>
                                    
                               
                                    <p>
                                        <strong>{{ $shipping->name }} </strong>
                                        <br>
                                        <a href="mailto:{{ $shipping->email }}">{{ $shipping->email }}</a>
                                        <br>
                                        <a href="tel:{{ $shipping->phone }}">{{ $shipping->phone }}</a>
                                        <br>
                                        <br>
                                        {{ $shipping->zone->name }}, {{ $shipping->area->name }}, {{ $shipping->city->name }}
                                        {{ $shipping->post_code }}
                                        <br>
                                        {{ $shipping->address }}
                                    </p>
                                    <p>
                                        Delivered At : N/A
                                    </p>
                                </div>
                            </div>


                        </div>
                        <div class="card-footer bg-transparent">
                            {{-- @if ($order->status == 1)
                                <a href="{{ route('vendor.order.pickup', $order->id) }}" class="btn btn-link"
                                    style="float:right;"> Ready for pickup <i class="fa fa-truck"></i> </a>
                            @endif
                            <a href="{{ route('vendor.invoice', $order->id) }}" class="btn btn-link"
                                style="float:right;">Invoice</a> --}}
                            <div class="d-flex justify-content-end gap-2">
                                @if (in_array($order->status, [0, 1]))
                                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" 
                                            data-bs-target="#changeProductModal{{ $order->id }}">
                                        <i class="fas fa-exchange-alt"></i> Change Product
                                    </button>
                                @endif
                                @if ($order->status == 1)
                                    <a href="{{ route('vendor.order.cancel', $order->id) }}" class="btn btn-link">
                                        Cancel Order
                                    </a>
                                @endif
                            </div>
                        </div>
                        @if($order->status == 0)
                        <span class="badge"
                            style="background-color:#cd5c5c;position:absolute;top:-8px;right:-5px">
                            Pending
                        </span>
                        @endif
                        @if($order->status == 1)
                        <span class="badge"
                            style="background-color:#ffa500;position:absolute;top:-8px;right:-5px">
                            Processing
                        </span>
                        @endif
                        @if($order->status == 2)
                        <span class="badge"
                            style="background-color:#0000ff;position:absolute;top:-8px;right:-5px">
                            On it's way
                        </span>
                        @endif
                        
                        @if($order->status == 3)
                        <span class="badge"
                            style="background-color:#ff0000;position:absolute;top:-8px;right:-5px">
                           Cenceled
                        </span>
                        @endif
                 
                 
                        @if($order->status == 4)
                        <span class="badge"
                            style="background-color:#008000;position:absolute;top:-8px;right:-5px">
                            Delivered
                        </span>
                        @endif
                        @if($order->status == 5)
                        <span class="badge"
                            style="background-color:#cd5c5c;position:absolute;top:-8px;right:-5px">
                            Refund Request
                        </span>
                        @endif

                    </div>
                    @endforeach

                    <!-- Change Product Modal for each order -->
                    @foreach($orders as $order)
                        @if (in_array($order->status, [0, 1]))
                        @php
                            $currentProduct = App\Models\Product::find($order->product_id);
                        @endphp
                        <div class="modal fade" id="changeProductModal{{ $order->id }}" tabindex="-1" aria-labelledby="changeProductModalLabel{{ $order->id }}" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="changeProductModalLabel{{ $order->id }}">Change Product - Order #{{ $order->id }}</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="{{ route('vendor.order.changeProduct', $order->id) }}" method="POST">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label for="productSearch{{ $order->id }}" class="form-label">Search Product</label>
                                                <input type="text" class="form-control" id="productSearch{{ $order->id }}" 
                                                       placeholder="Search by name or SKU..." autocomplete="off">
                                                <div id="productResults{{ $order->id }}" class="mt-2" style="max-height: 300px; overflow-y: auto;"></div>
                                            </div>
                                            
                                            <div class="mb-3">
                                                <label for="selectedProduct{{ $order->id }}" class="form-label">Selected Product</label>
                                                <div id="selectedProduct{{ $order->id }}" class="border p-3 rounded bg-light" style="display: none;">
                                                    <p class="mb-0"><strong id="selectedProductName{{ $order->id }}"></strong></p>
                                                    <p class="mb-0 text-muted small">SKU: <span id="selectedProductSku{{ $order->id }}"></span></p>
                                                    <p class="mb-0">Price: <span id="selectedProductPrice{{ $order->id }}"></span></p>
                                                </div>
                                                <input type="hidden" name="product_id" id="productId{{ $order->id }}" required>
                                            </div>
                                            
                                            <div class="mb-3">
                                                <label for="quantity{{ $order->id }}" class="form-label">Quantity</label>
                                                <input type="number" class="form-control" name="quantity" id="quantity{{ $order->id }}" 
                                                       value="{{ $order->quantity }}" min="1" required>
                                            </div>
                                            
                                            <div class="alert alert-info">
                                                <strong>Current Product:</strong> {{ $currentProduct->name ?? 'N/A' }} (Qty: {{ $order->quantity }})
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                            <button type="submit" class="btn btn-primary">Change Product</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @endif
                    @endforeach

                </div>
            </div>

        </div>
    </div>


    <x-slot name="js">
        <script>
            // Global function to select product
            window.selectProduct = function(orderId, productId, name, sku, price, imageUrl) {
                const productIdInput = document.getElementById('productId' + orderId);
                const productNameSpan = document.getElementById('selectedProductName' + orderId);
                const productSkuSpan = document.getElementById('selectedProductSku' + orderId);
                const productPriceSpan = document.getElementById('selectedProductPrice' + orderId);
                const selectedDiv = document.getElementById('selectedProduct' + orderId);
                const resultsDiv = document.getElementById('productResults' + orderId);
                const searchInput = document.getElementById('productSearch' + orderId);
                
                if (!productIdInput) return;
                
                productIdInput.value = productId;
                productNameSpan.textContent = name;
                productSkuSpan.textContent = sku;
                productPriceSpan.textContent = new Intl.NumberFormat('en-BD', {style: 'currency', currency: 'BDT'}).format(price);
                selectedDiv.style.display = 'block';
                resultsDiv.innerHTML = '';
                searchInput.value = '';
            };

            @foreach($orders as $order)
                @if (in_array($order->status, [0, 1]))
                (function() {
                    const orderId = {{ $order->id }};
                    const searchInput = document.getElementById('productSearch' + orderId);
                    const resultsDiv = document.getElementById('productResults' + orderId);
                    let searchTimeout;

                    if (!searchInput) return;

                    searchInput.addEventListener('input', function() {
                        clearTimeout(searchTimeout);
                        const search = this.value.trim();
                        
                        if (search.length < 2) {
                            resultsDiv.innerHTML = '';
                            return;
                        }

                        searchTimeout = setTimeout(() => {
                            fetch('{{ route("vendor.order.searchProducts") }}?search=' + encodeURIComponent(search))
                                .then(response => response.json())
                                .then(products => {
                                    if (products.length === 0) {
                                        resultsDiv.innerHTML = '<div class="alert alert-warning">No products found</div>';
                                        return;
                                    }

                                    resultsDiv.innerHTML = products.map(product => {
                                        const price = product.sale_price > 0 ? product.sale_price : product.price;
                                        const imageUrl = product.image ? '{{ Voyager::image("") }}' + product.image : '/placeholder.jpg';
                                        const productName = product.name.replace(/'/g, "\\'").replace(/"/g, '&quot;');
                                        return `
                                            <div class="border rounded p-2 mb-2 product-item" 
                                                 style="cursor: pointer; transition: background-color 0.2s;"
                                                 onmouseover="this.style.backgroundColor='#f0f0f0'"
                                                 onmouseout="this.style.backgroundColor='white'"
                                                 onclick="selectProduct(${orderId}, ${product.id}, '${productName}', '${product.sku}', ${price}, '${imageUrl}')">
                                                <div class="d-flex align-items-center">
                                                    <img src="${imageUrl}" style="width: 50px; height: 50px; object-fit: cover; margin-right: 10px;" alt="">
                                                    <div>
                                                        <strong>${product.name}</strong><br>
                                                        <small class="text-muted">SKU: ${product.sku}</small><br>
                                                        <small class="text-primary">Price: ${new Intl.NumberFormat('en-BD', {style: 'currency', currency: 'BDT'}).format(price)}</small>
                                                    </div>
                                                </div>
                                            </div>
                                        `;
                                    }).join('');
                                })
                                .catch(error => {
                                    console.error('Error:', error);
                                    resultsDiv.innerHTML = '<div class="alert alert-danger">Error searching products</div>';
                                });
                        }, 300);
                    });
                })();
                @endif
            @endforeach
        </script>
    </x-slot>
</x-seller>
