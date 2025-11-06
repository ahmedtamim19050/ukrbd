<x-seller>
    <div class="ec-shop-rightside col-lg-9 col-md-12">
        <div class="ec-vendor-dashboard-card space-bottom-30 shadow-sm" style="border-radius: 12px !important;">
            <div class="ec-vendor-card-header d-flex justify-content-between align-items-center">
                <h5>Create Custom Order</h5>
                <a class="btn btn-outline-dark" href="{{ route('vendor.ordersIndex') }}">Back to Orders</a>
            </div>
            <div class="ec-vendor-card-body">
                <form id="customOrderForm" action="{{ route('vendor.orders.custom.store') }}" method="POST"
                    data-search-url="{{ route('vendor.order.searchProducts') }}">
                    @csrf

                    <div class="row">
                        <div class="col-md-12 mb-4">
                            <h6 class="mb-3">Customer & Shipping Information</h6>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label">Name <span class="text-danger">*</span></label>
                                    <input type="text" name="name" class="form-control" required />
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Email (optional)</label>
                                    <input type="email" name="email" class="form-control" />
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Phone (optional)</label>
                                    <input type="text" name="phone" class="form-control" />
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Post Code (optional)</label>
                                    <input type="text" name="post_code" class="form-control" />
                                </div>
                                <div class="col-md-12">
                                    <label class="form-label">Address <span class="text-danger">*</span></label>
                                    <input type="text" name="address" class="form-control" required />
                                </div>
                                <div class="col-md-12">
                                    <label class="form-label">Order Notes</label>
                                    <textarea name="order_notes" class="form-control" rows="2"></textarea>
                                </div>
                                <input type="hidden" name="order[shipping]" id="orderShippingHidden" value="0" />
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <h6 class="mb-0">Items</h6>
                                <div class="d-flex gap-2">
                                    <input type="text" id="globalProductSearch" class="form-control"
                                        placeholder="Search product by name or SKU" style="max-width: 300px;"
                                        autocomplete="off" />
                                </div>
                            </div>
                            <div id="productSearchResults" class="border rounded p-2 mb-2"
                                style="display:none; max-height: 280px; overflow-y: auto;"></div>

                            <div class="table-responsive">
                                <table class="table align-middle">
                                    <thead>
                                        <tr>
                                            <th style="width: 42%">Product</th>
                                            <th style="width: 12%">Qty</th>
                                            <th style="width: 18%">Price</th>
                                            <th style="width: 18%">Line Total</th>
                                            <th style="width: 10%"></th>
                                        </tr>
                                    </thead>
                                    <tbody id="itemsTableBody"></tbody>
                                </table>
                            </div>

                            <div class="d-flex justify-content-end">
                                <div class="card p-3" style="min-width: 320px;">
                                    <div class="d-flex justify-content-between"><span>Subtotal</span><strong
                                            id="subtotalText">0.00</strong></div>
                                    <div class="d-flex justify-content-between"><span>Shipping</span><strong
                                            id="shippingText">0.00</strong></div>
                                    <div class="d-flex justify-content-between align-items-center gap-2 mt-2">
                                        <span>Discount</span>
                                        <input type="number" min="0" step="0.01" name="discount" id="discountInput" class="form-control" style="max-width: 140px;" value="0">
                                    </div>
                                    <div class="d-flex justify-content-between border-top mt-2 pt-2">
                                        <span>Total</span><strong id="totalText">0.00</strong>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 mt-4 d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">Create Order</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @push('script')
        <script>
            (function() {
                const searchInput = document.getElementById('globalProductSearch');
                const resultsDiv = document.getElementById('productSearchResults');
                const itemsBody = document.getElementById('itemsTableBody');
                // const addEmptyRowBtn = document.getElementById('addEmptyRowBtn');
                const subtotalText = document.getElementById('subtotalText');
                const shippingText = document.getElementById('shippingText');
                const totalText = document.getElementById('totalText');
                const discountInput = document.getElementById('discountInput');
                const orderShippingHidden = document.getElementById('orderShippingHidden');
                const searchUrl = document.getElementById('customOrderForm').dataset.searchUrl;

                let rowIndex = 0;
                let searchTimeout;

                function formatCurrency(amount) {
                    try {
                        return new Intl.NumberFormat('en-BD', {
                            style: 'currency',
                            currency: 'BDT'
                        }).format(amount);
                    } catch (e) {
                        return amount.toFixed(2);
                    }
                }

                function calculateTotals() {
                    let subtotal = 0;
                    itemsBody.querySelectorAll('tr').forEach(tr => {
                        const lineInput = tr.querySelector('.item-line-input');
                        let line = parseFloat(lineInput ? lineInput.value : '0');
                        if (!isFinite(line) || line < 0) {
                            const qty = parseFloat(tr.querySelector('.item-qty')?.value || '0');
                            const price = parseFloat(tr.querySelector('.item-price')?.value || '0');
                            line = Math.max(0, qty) * Math.max(0, price);
                            if (lineInput) lineInput.value = line.toFixed(2);
                        }
                        subtotal += line;
                    });
                    const shipping = parseFloat(orderShippingHidden.value || '0');
                    const discount = Math.max(0, parseFloat(discountInput.value || '0'));
                    subtotalText.textContent = formatCurrency(subtotal);
                    shippingText.textContent = formatCurrency(shipping);
                    totalText.textContent = formatCurrency(Math.max(0, subtotal + shipping - discount));
                }

                function addRowFromProduct(p) {
                    const price = (p.sale_price && p.sale_price > 0) ? p.sale_price : p.price;
                    const tr = document.createElement('tr');
                    tr.innerHTML = `
                <td>
                    <div class=\"d-flex align-items-center\">
                        <img src=\"https://ukrbd.com/storage/${p.image}\" style=\"width:48px;height:48px;object-fit:cover;\" class=\"me-2 rounded\" alt=\"\"/>
                        <div>
                            <div class=\"fw-semibold\">${p.name}</div>
                            <small class=\"text-muted\">SKU: ${p.sku || ''}</small>
                        </div>
                    </div>
                    <input type=\"hidden\" name=\"items[${rowIndex}][product_id]\" value=\"${p.id}\" />
                </td>
                <td>
                    <input type=\"number\" class=\"form-control item-qty\" min=\"0.01\" step=\"0.01\" value=\"1\" name=\"items[${rowIndex}][quantity]\" />
                </td>
                <td>
                    <input type=\"number\" class=\"form-control item-price\" min=\"0\" step=\"0.01\" value=\"${price}\" name=\"items[${rowIndex}][price]\" />
                </td>
                <td>
                    <input type=\"number\" class=\"form-control item-line-input\" min=\"0\" step=\"0.01\" value=\"${price}\" name=\"items[${rowIndex}][total]\" />
                </td>
                <td class=\"text-end\">
                    <button type=\"button\" class=\"btn btn-sm btn-outline-danger remove-row\">Remove</button>
                </td>
            `;
                    itemsBody.appendChild(tr);

                    tr.querySelector('.item-qty').addEventListener('input', function() {
                        const qty = parseFloat(this.value || '0');
                        const priceInput = tr.querySelector('.item-price');
                        const lineInput = tr.querySelector('.item-line-input');
                        const priceVal = parseFloat(priceInput.value || '0');
                        const line = Math.max(0, qty) * Math.max(0, priceVal);
                        lineInput.value = isFinite(line) ? line.toFixed(2) : 0;
                        calculateTotals();
                    });
                    tr.querySelector('.item-price').addEventListener('input', function() {
                        const qty = parseFloat(tr.querySelector('.item-qty').value || '0');
                        const priceVal = parseFloat(this.value || '0');
                        const lineInput = tr.querySelector('.item-line-input');
                        const line = Math.max(0, qty) * Math.max(0, priceVal);
                        lineInput.value = isFinite(line) ? line.toFixed(2) : 0;
                        calculateTotals();
                    });
                    tr.querySelector('.item-line-input').addEventListener('input', function() {
                        // Do not change price when line total changes; just refresh totals
                        calculateTotals();
                    });
                    tr.querySelector('.item-line-input').addEventListener('input', function() {
                        // Do not change price when line total changes; just refresh totals
                        calculateTotals();
                    });
                    tr.querySelector('.remove-row').addEventListener('click', function() {
                        tr.remove();
                        calculateTotals();
                    });

                    rowIndex++;
                    calculateTotals();
                }

                // Removed manual empty row addition

                searchInput.addEventListener('input', function() {
                    clearTimeout(searchTimeout);
                    const term = this.value.trim();
                    if (term.length < 2) {
                        resultsDiv.style.display = 'none';
                        resultsDiv.innerHTML = '';
                        return;
                    }
                    searchTimeout = setTimeout(() => {
                        fetch(searchUrl + `?search=${encodeURIComponent(term)}`, {
                                headers: {
                                    'Accept': 'application/json'
                                },
                                cache: 'no-store'
                            })
                            .then(r => r.json())
                            .then(products => {
                                if (!Array.isArray(products) || products.length === 0) {
                                    resultsDiv.innerHTML =
                                        '<div class="alert alert-warning mb-0">No products found</div>';
                                    resultsDiv.style.display = 'block';
                                    return;
                                }
                                resultsDiv.innerHTML = products.map(p => {
                                    const price = (p.sale_price && p.sale_price > 0) ? p
                                        .sale_price : p.price;

                                    const safeName = (p.name || '')
                                        .replace(/&/g, '&amp;')
                                        .replace(/</g, '&lt;')
                                        .replace(/>/g, '&gt;')
                                        .replace(/"/g, '&quot;');
                                    return `
                                <div class="border rounded p-2 mb-2 product-item" style="cursor:pointer"
                                     data-id="${p.id}"
                                     data-name="${safeName}"
                                     data-sku="${p.sku || ''}"
                                     data-price="${price}"
                                     data-image="${p.image || ''}">
                                    <div class="d-flex align-items-center">
                                        <img src="https://ukrbd.com/storage/${p.image}" style="width: 42px; height: 42px; object-fit: cover; margin-right: 10px;" alt="">
                                        <div>
                                            <strong>${safeName}</strong><br>
                                            <small class="text-muted">SKU: ${p.sku || ''}</small>
                                       
                                            <small class="ms-2 text-primary">${formatCurrency(price)}</small>
                                            <br>
                                                 <small class="text-warning fw-bold">Stock: ${p.quantity || ''}</small>
                                        </div>
                                    </div>
                                </div>`;
                                }).join('');
                                resultsDiv.style.display = 'block';
                                resultsDiv.querySelectorAll('.product-item').forEach(el => {
                                    el.addEventListener('click', function() {
                                        const data = {
                                            id: this.getAttribute('data-id'),
                                            name: this.getAttribute('data-name'),
                                            sku: this.getAttribute('data-sku'),
                                            price: parseFloat(this.getAttribute(
                                                'data-price') || '0'),
                                            image: this.getAttribute('data-image')
                                        };
                                        addRowFromProduct(data);
                                        resultsDiv.style.display = 'none';
                                        resultsDiv.innerHTML = '';
                                        searchInput.value = '';
                                    });
                                });
                            })
                            .catch(() => {
                                resultsDiv.innerHTML =
                                    '<div class="alert alert-danger mb-0">Error searching products</div>';
                                resultsDiv.style.display = 'block';
                            });
                    }, 300);
                });

                // removed empty row button and default row
                discountInput.addEventListener('input', calculateTotals);

                // Basic client-side validation to ensure at least one item with product_id
                document.getElementById('customOrderForm').addEventListener('submit', function(e) {
                    const rows = itemsBody.querySelectorAll('tr');
                    if (rows.length === 0) {
                        e.preventDefault();
                        alert('Please add at least one item.');
                        return;
                    }
                    let valid = true;
                    rows.forEach(tr => {
                        const hidden = tr.querySelector(
                            'input[type="hidden"][name^="items["][name$="][product_id]"]');
                        if (!hidden || !hidden.value) {
                            valid = false;
                        }
                    });
                    if (!valid) {
                        e.preventDefault();
                        alert('Each row must have a product selected or a product ID entered.');
                    }
                });
            })();
        </script>
    @endpush
</x-seller>
