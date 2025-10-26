<x-seller>
    <div class="ec-shop-rightside col-lg-9 col-md-12">
        <div class="ec-vendor-dashboard-card space-bottom-30 shadow-sm" style="border-radius: 12px !important;">
            <div class="ec-vendor-card-header">
                <h5>Customer Orders</h5>
                <div class="d-flex">
                    <div class="ec-header-btn">
                        <input class="form-control ec-search-bar" placeholder="Search products..." type="text">

                    </div>
                    <div class="ec-header-btn">
                        <a class="btn  btn-outline-dark" style="height: 47px;line-height: 48px; border:1px solid black"
                            href="#"><i class="fi-rr-filter"></i> Filter</a>
                    </div>


                </div>

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
                                    <small>
                                        {{ $firstOrder->zone }}, {{ $firstOrder->area }},
                                    </small>
                                    <br>
                                    <h6>
                                        {{ $firstOrder->city }},
                                        {{ $firstOrder->post_code }}
                                    </h6>
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
                            <h6 class="mt-4">Items</h6>

                            <table class="table">
                                {{-- <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Product</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                    </tr>
                                </thead> --}}
                                <tbody>
                                    @foreach ($order as $item )
                                        <tr>
                                            <td>
                                                <h4>  # {{$item->id}} </h4>
                                            </td>
                                            <td>
                                                <h6>{{ $item->product->name }} X {{ $item->quantity }}</h6>
                                                <small class="text-muted">{{ $item->product->sku }}</small>
                                            </td>
                                            <td>
                                                <small style="color:{{ $item->getStatus()['color'] }};text-transform:uppercase">{{ $item->getStatus()['label'] }}</small>
                                            </td>
                                            <td>
                                                <h4>{{ Sohoj::price($item->total) }}</h4>
                                            </td>
                                         
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
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
</x-seller>
