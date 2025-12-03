<x-seller>
    <div class="ec-shop-rightside col-lg-9 col-md-12">
        <div class="ec-vendor-dashboard-card space-bottom-30 shadow-sm" style="border-radius: 12px !important;">
            <div class="ec-vendor-card-header">
                <h5>Customer Orders</h5>
                <form method="GET" action="{{ route('vendor.ordersIndex') }}" id="filterForm">
                    <div class="d-flex flex-wrap gap-2 align-items-end">
                        <div class="ec-header-btn">
                            <label class="form-label mb-1" style="font-size: 12px;">From Date</label>
                            <input class="form-control" name="from_date" type="date" 
                                value="{{ request('from_date') }}" 
                                style="height: 47px;line-height: 48px;">
                        </div>
                        <div class="ec-header-btn">
                            <label class="form-label mb-1" style="font-size: 12px;">To Date</label>
                            <input class="form-control" name="to_date" type="date" 
                                value="{{ request('to_date') }}" 
                                style="height: 47px;line-height: 48px;">
                        </div>
                        <div class="ec-header-btn">
                            <button type="submit" class="btn btn-outline-dark" 
                                style="height: 47px;line-height: 48px; border:1px solid black">
                                <i class="fi-rr-filter"></i> Filter
                            </button>
                        </div>
                        <div class="ec-header-btn">
                            <a class="btn btn-secondary" 
                                href="{{ route('vendor.ordersIndex') }}"
                                style="height: 47px;line-height: 48px;">
                                <i class="fi-rr-cross"></i> Clear
                            </a>
                        </div>
                        <div class="ec-header-btn">
                            <a class="btn btn-success" 
                                href="{{ route('vendor.orders.exportDelivered', ['from_date' => request('from_date'), 'to_date' => request('to_date')]) }}"
                                style="height: 47px;line-height: 48px;">
                                <i class="fi-rr-file-excel"></i> Export Completed Orders
                            </a>
                        </div>
                        <div class="ec-header-btn">
                            <a class="btn btn-outline-success" 
                                href="{{ route('vendor.orders.exportSalesReport', ['from_date' => request('from_date'), 'to_date' => request('to_date')]) }}"
                                style="height: 47px;line-height: 48px;">
                                <i class="fi-rr-file-excel"></i> Sales Report
                            </a>
                        </div>
                    </div>
                </form>
            </div>

            <div class="ec-vendor-card-body">


                @foreach ($latest_orders as $order)
                    @php
                        $firstOrder = $order->first();
                    @endphp

                    <div class="card my-2">
                        <div class="card-header bg-white">
                            <div class="d-flex justify-content-between">


                                <div class="d-flex gap-3">
                                    <a class="text-primary btn-link"
                                        href="{{ route('vendor.order.products') }}?ids={{ json_encode($order->pluck('id')) }}&parent={{ $order->first()->parent_id }}">
                                        View
                                    </a>

                                    <a href="{{ route('vendor.invoice') }}?ids={{ json_encode($order->pluck('id')) }}&parent={{ $order->first()->parent_id }}"
                                        class="text-primary btn-link">
                                        Invoice
                                    </a>
                                    @if ($firstOrder->status != 4 || $firstOrder->status != 3)
                                    <a href="{{ route('vendor.complete.order') }}?ids={{ json_encode($order->pluck('id')) }}&parent={{ $order->first()->parent_id }}"
                                            class="text-primary btn-link">
                                            Complete Order
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <small>
                                        {{ $firstOrder->created_at->format('d M, Y') }}
                                    </small>
                                    <h6>
                                        {{ $firstOrder->created_at->format('h:i A') }}
                                    </h6>
                                </div>
                                <div class="col-md-6">
                                    @if ($firstOrder->zone && $firstOrder->area && $firstOrder->city && $firstOrder->post_code)
                                        <small>
                                            {{ $firstOrder->zone }}, {{ $firstOrder->area }},
                                        </small>
                                        <br>
                                        <h6>
                                            {{ $firstOrder->city }},
                                            {{ $firstOrder->post_code }}
                                        </h6>
                                    @else
                                        <small>
                                            {{ $firstOrder->address }} , {{ $firstOrder->post_code }}
                                        </small>
                                    @endif


                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-md-6">
                                    <h6>
                                        {{ $firstOrder->full_name }}
                                    </h6>
                                    <div class="d-flex flex-column">
                                        <a href="mailto:{{ $firstOrder->email }}">
                                            Email: {{ $firstOrder->email }}
                                        </a>
                                        <a href="tel:{{ $firstOrder->phone }}">
                                            Phone: {{ $firstOrder->phone }}
                                        </a>
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <small>
                                        Total :
                                    </small>
                                    <br>
                                    <h3>
                                        {{ Sohoj::price($firstOrder->parent->total) }}
                                    </h3>
                                </div>
                            </div>
                            {{-- <h6 class="mt-4">Items</h6>

                            <table class="table">
                            
                                <tbody>
                                    @foreach ($order as $item)
                                        <tr>
                                            <td>
                                                <h4> # {{ $item->id }} </h4>
                                            </td>
                                            <td>
                                                <h6>{{ $item->product->name }} X {{ $item->quantity }}</h6>
                                                <small class="text-muted">{{ $item->product->sku }}</small>
                                            </td>
                                            <td>
                                                <small
                                                    style="color:{{ $item->getStatus()['color'] }};text-transform:uppercase">{{ $item->getStatus()['label'] }}</small>
                                            </td>
                                            <td>
                                                <h4>{{ Sohoj::price($item->total) }} </h4>
                                            </td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table> --}}
                        </div>
                    </div>
                @endforeach



            </div>
        </div>


        <x-slot name="js">
            <script>
                var exampleModal = document.getElementById('exampleModal')
                exampleModal.addEventListener('show.bs.modal', function(event) {
                    var button = event.relatedTarget
                    var recipient = button.getAttribute('data-bs-id')
                    var modalBodyInput = exampleModal.querySelector('#orderId')

                    modalBodyInput.value = recipient
                })
            </script>
        </x-slot>

        <a href="{{ route('vendor.orders.custom.create') }}" class="btn btn-primary" title="Create Custom Order"
            style="
            position: fixed;
            right: 24px;
            bottom: 24px;
          
            z-index: 1000;
        ">
            + Custom Order
        </a>
</x-seller>
