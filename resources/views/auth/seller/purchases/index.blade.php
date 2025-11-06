<x-seller>
    <div class="ec-shop-rightside col-lg-9 col-md-12">
        <div class="ec-vendor-dashboard-card space-bottom-30 shadow-sm" style="border-radius: 12px !important;">
            <div class="ec-vendor-card-header">
                <h5>Purchases</h5>
                
             
            </div>
            <form method="GET" action="{{ route('vendor.purchases.index') }}" class="mt-2">
                <div class="d-flex flex-wrap gap-2 align-items-end">
                    <div class="ec-header-btn">
                        <label class="form-label mb-1" style="font-size: 12px;">From Date</label>
                        <input class="form-control" name="from_date" type="date" value="{{ request('from_date') }}" style="height: 47px;line-height: 48px;">
                    </div>
                    <div class="ec-header-btn">
                        <label class="form-label mb-1" style="font-size: 12px;">To Date</label>
                        <input class="form-control" name="to_date" type="date" value="{{ request('to_date') }}" style="height: 47px;line-height: 48px;">
                    </div>
                    <div class="ec-header-btn">
                        <button type="submit" class="btn btn-outline-dark" style="height: 47px;line-height: 48px; border:1px solid black">
                            <i class="fi-rr-filter"></i> Filter
                        </button>
                    </div>
                    <div class="ec-header-btn">
                        <a class="btn btn-secondary" href="{{ route('vendor.purchases.index') }}" style="height: 47px;line-height: 48px;">
                            <i class="fi-rr-cross"></i> Clear
                        </a>
                    </div>
                    <div class="ec-header-btn">
                        <a class="btn btn-success" href="{{ route('vendor.purchases.export', ['from_date' => request('from_date'), 'to_date' => request('to_date')]) }}" style="height: 47px;line-height: 48px;">
                            <i class="fi-rr-file-excel"></i> Export Purchases
                        </a>
                    </div>
                    <div class="ms-auto ec-header-btn">
                        <a class="btn btn-primary" href="{{ route('vendor.purchases.create') }}">+ Record Purchase</a>
                    </div>
                </div>
            </form>
            <div class="ec-vendor-card-body">
                <div class="table-responsive">
                    <table class="table align-middle">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Product</th>
                                <th>Qty</th>
                                <th>Cost Price</th>
                                <th>Line Cost</th>
                                <th>Reference</th>
                                <th>Note</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($purchases as $purchase)
                                <tr>
                                    <td>{{ $purchase->created_at->format('d M, Y h:i A') }}</td>
                                    <td>
                                        @if($purchase->product)
                                            <div class="d-flex align-items-center">
                                                @if($purchase->product->image)
                                                    <img src="https://ukrbd.com/storage/{{ $purchase->product->image }}" style="width:36px;height:36px;object-fit:cover;" class="me-2 rounded" alt=""/>
                                                @endif
                                                <div>
                                                    <div class="fw-semibold">{{ $purchase->product->name }}</div>
                                                    <small class="text-muted">SKU: {{ $purchase->product->sku }}</small>
                                                </div>
                                            </div>
                                        @else
                                            <span class="text-muted">Product deleted</span>
                                        @endif
                                    </td>
                                    <td>{{ number_format($purchase->quantity, 2) }}</td>
                                    <td>{{ number_format($purchase->cost_price, 2) }}</td>
                                    <td>{{ number_format(($purchase->quantity * ($purchase->cost_price ?? 0)), 2) }}</td>
                                    <td>{{ $purchase->reference }}</td>
                                    <td>{{ $purchase->note }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center text-muted">No purchases found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div>
                    {{ $purchases->links() }}
                </div>
            </div>
        </div>
    </div>
</x-seller>


