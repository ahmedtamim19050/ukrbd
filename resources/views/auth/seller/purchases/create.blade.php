<x-seller>
    <div class="ec-shop-rightside col-lg-9 col-md-12">
        <div class="ec-vendor-dashboard-card space-bottom-30 shadow-sm" style="border-radius: 12px !important;">
            <div class="ec-vendor-card-header d-flex justify-content-between align-items-center">
                <h5>Record Purchases (Stock In)</h5>
                <a class="btn btn-outline-dark" href="{{ route('vendor.products') }}">Back to Products</a>
            </div>
            <div class="ec-vendor-card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if (session('success_msg'))
                    <div class="alert alert-success">{{ session('success_msg') }}</div>
                @endif

                <form id="purchaseForm" action="{{ route('vendor.purchases.store') }}" method="POST"
                    data-search-url="{{ route('vendor.order.searchProducts') }}">
                    @csrf

                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label">Reference</label>
                                    <input type="text" name="reference" class="form-control" maxlength="100" />
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Note</label>
                                    <input type="text" name="note" class="form-control" maxlength="1000" />
                                </div>
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
                                            <th style="width: 18%">Qty</th>
                                            <th style="width: 18%">Cost Price</th>
                                            <th style="width: 18%">Line Cost</th>
                                            <th style="width: 4%"></th>
                                        </tr>
                                    </thead>
                                    <tbody id="itemsTableBody"></tbody>
                                </table>
                            </div>

                            <div class="d-flex justify-content-end">
                                <div class="card p-3" style="min-width: 320px;">
                                    <div class="d-flex justify-content-between"><span>Total Quantity</span><strong
                                            id="totalQtyText">0</strong></div>
                                    <div class="d-flex justify-content-between"><span>Total Cost</span><strong
                                            id="totalCostText">0.00</strong></div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 mt-4 d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">Save Purchases</button>
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
                const totalQtyText = document.getElementById('totalQtyText');
                const totalCostText = document.getElementById('totalCostText');
                const searchUrl = document.getElementById('purchaseForm').dataset.searchUrl;

                let rowIndex = 0;
                let searchTimeout;

                function formatCurrency(amount) {
                    try {
                        return new Intl.NumberFormat('en-BD', { style: 'currency', currency: 'BDT' }).format(amount);
                    } catch (e) {
                        return (Number(amount) || 0).toFixed(2);
                    }
                }

                function updateLineCost(tr) {
                    const qty = parseFloat(tr.querySelector('.item-qty')?.value || '0');
                    const cost = parseFloat(tr.querySelector('.item-cost')?.value || '0');
                    const lineInput = tr.querySelector('.item-line-cost');
                    const line = Math.max(0, qty) * Math.max(0, cost);
                    if (lineInput) lineInput.value = isFinite(line) ? line.toFixed(2) : '0.00';
                }

                function recalcTotals() {
                    let totalQty = 0;
                    let totalCost = 0;
                    itemsBody.querySelectorAll('tr').forEach(tr => {
                        const qty = parseFloat(tr.querySelector('.item-qty')?.value || '0');
                        const lineInput = tr.querySelector('.item-line-cost');
                        const line = parseFloat(lineInput?.value || '0');
                        totalQty += Math.max(0, qty);
                        totalCost += Math.max(0, isFinite(line) ? line : 0);
                    });
                    totalQtyText.textContent = (Number(totalQty) || 0);
                    totalCostText.textContent = formatCurrency(totalCost);
                }

                function addRowFromProduct(p) {
                    const tr = document.createElement('tr');
                    tr.innerHTML = `
                        <td>
                            <div class="d-flex align-items-center">
                                <img src="https://ukrbd.com/storage/${p.image}" style="width:48px;height:48px;object-fit:cover;" class="me-2 rounded" alt=""/>
                                <div>
                                    <div class="fw-semibold">${(p.name || '').replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;')}</div>
                                    <small class="text-muted">SKU: ${p.sku || ''}</small>
                                </div>
                            </div>
                            <input type="hidden" name="items[${rowIndex}][product_id]" value="${p.id}" />
                        </td>
                        <td>
                            <input type="number" class="form-control item-qty" min="0.01" step="0.01" value="1" name="items[${rowIndex}][quantity]" />
                        </td>
                        <td>
                            <input type="number" class="form-control item-cost" min="0" step="0.01" value="${p.vendor_price || p.price || 0}" name="items[${rowIndex}][cost_price]" />
                        </td>
                        <td>
                            <input type="number" class="form-control item-line-cost" min="0" step="0.01" value="${(p.vendor_price || p.price || 0).toFixed ? (p.vendor_price || p.price || 0).toFixed(2) : p.vendor_price || p.price || 0}" />
                        </td>
                        <td class="text-end">
                            <button type="button" class="btn btn-sm btn-outline-danger remove-row">Remove</button>
                        </td>
                    `;
                    itemsBody.appendChild(tr);

                    tr.querySelector('.item-qty').addEventListener('input', function(){ updateLineCost(tr); recalcTotals(); });
                    tr.querySelector('.item-cost').addEventListener('input', function(){ updateLineCost(tr); recalcTotals(); });
                    tr.querySelector('.item-line-cost').addEventListener('input', function(){ /* manual override shouldn't affect cost */ recalcTotals(); });
                    tr.querySelector('.remove-row').addEventListener('click', function(){ tr.remove(); recalcTotals(); });

                    rowIndex++;
                    recalcTotals();
                }

                searchInput.addEventListener('input', function () {
                    clearTimeout(searchTimeout);
                    const term = this.value.trim();
                    if (term.length < 2) {
                        resultsDiv.style.display = 'none';
                        resultsDiv.innerHTML = '';
                        return;
                    }
                    searchTimeout = setTimeout(() => {
                        fetch(searchUrl + `?search=${encodeURIComponent(term)}`, { headers: { 'Accept': 'application/json' }, cache: 'no-store' })
                            .then(r => r.json())
                            .then(products => {
                                if (!Array.isArray(products) || products.length === 0) {
                                    resultsDiv.innerHTML = '<div class="alert alert-warning mb-0">No products found</div>';
                                    resultsDiv.style.display = 'block';
                                    return;
                                }
                                resultsDiv.innerHTML = products.map(p => {
                                    const price = (p.vendor_price || p.price || 0);
                                    const safeName = (p.name || '').replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;').replace(/"/g, '&quot;');
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
                                                    <small class="text-muted">Current Stock: ${p.quantity ?? ''}</small>
                                                </div>
                                            </div>
                                        </div>`;
                                }).join('');
                                resultsDiv.style.display = 'block';
                                resultsDiv.querySelectorAll('.product-item').forEach(el => {
                                    el.addEventListener('click', function(){
                                        const data = {
                                            id: this.getAttribute('data-id'),
                                            name: this.getAttribute('data-name'),
                                            sku: this.getAttribute('data-sku'),
                                            price: parseFloat(this.getAttribute('data-price') || '0'),
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
                                resultsDiv.innerHTML = '<div class="alert alert-danger mb-0">Error searching products</div>';
                                resultsDiv.style.display = 'block';
                            });
                    }, 300);
                });

                document.getElementById('purchaseForm').addEventListener('submit', function(e){
                    if (itemsBody.querySelectorAll('tr').length === 0) {
                        e.preventDefault();
                        alert('Please add at least one product.');
                    }
                });
            })();
        </script>
    @endpush
</x-seller>


