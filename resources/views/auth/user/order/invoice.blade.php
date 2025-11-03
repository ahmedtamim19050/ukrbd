@php

    $shipping = json_decode($order->shipping);
    $shop = App\Models\Shop::find($order->shop_id);
    $parentOrder = App\Models\Order::where('parent_id', $order->parent_id)->first();
@endphp
<x-app>

    <x-slot name="css">
        <!-- Vendor CSS -->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/fontawesome-free/css/all.min.css') }}">
        <!-- Plugins CSS -->
        <link rel="stylesheet" href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/animate/animate.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/magnific-popup/magnific-popup.min.css') }}">

        <!-- Default CSS -->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/demo5.min.css') }}">
        <style>
            /* Minimal Black & White with margins */
            * { color: #000 !important; }
            .invoice { display: flex; justify-content: center; align-items: center; }
            .invoice-container { margin: 0 auto; padding: 24px; background: #fff; font-family: Arial, sans-serif; border: 1px solid #000; box-shadow: none; max-width: 900px; }
            .invoice-header { margin-bottom: 16px; border-bottom: 1px solid #000; padding-bottom: 8px; }
            .invoice-header h2 { font-size: 20px; margin: 0; }
            .invoice-info { display: flex; justify-content: space-between; gap: 16px; margin-bottom: 16px; }
            .invoice-info p { margin: 0; }
            table { width: 100%; border-collapse: collapse; }
            th, td { border: 1px solid #000; padding: 6px 8px; text-align: left; font-size: 14px; }
            thead th { border-bottom: 2px solid #000; }
            tfoot td { font-weight: 700; }
            .btn { border: 1px solid #000; background: #fff; }
            .section-title { font-weight: 700; text-transform: uppercase; letter-spacing: .5px; margin: 0 0 6px 0; }
            @page { margin: 15mm; }
            @media print { .btn, .print-hide { display: none !important; } .invoice { margin: 0; } .invoice-container { border: none; box-shadow: none; max-width: 100%; padding: 0; } }
            @media print {
                thead { display: table-header-group; }
                tfoot { display: table-row-group; }
                tr { page-break-inside: avoid; }
            }
        </style>
    </x-slot>


    <div class="invoice mt-5 mb-5">
        <div class="col-lg-9 col-md-12">
        
        
        
        
        <div class="d-flex justify-content-start mb-2">
            <button onclick="printDiv('printableArea')" class="btn btn-primary">Print this page</button>
        
        </div>
        
        <div id="printableArea">
            <div class="container">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                                <h2>INVOICE #{{ $order->id }}</h2>
                            </div>
                            <div class="col-md-4">
                                <h3>{{ $order->created_at->format('d M, Y') }}</h3>
                                <h4 style="color:#000 !important;text-transform:uppercase">{{$order->getStatus()['label']}}</h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
        
                                <br>
        
                                <p style="font-size: 14px;">{{ $shipping->name }}
                                    <br>
                                    {{ $shipping->email }}
                                    <br>
                                    {{ $shipping->phone }}
                                    <br>
                                    <br>
                                    {{ $shipping->area->name }}, {{ $shipping->zone->name }}, {{ $shipping->city->name }}
                                    <br>
                                    {{ $shipping->address }}, {{ $shipping->post_code }}
                                </p>
        
                            </div>
                            <div class="col-md-6">
                                <br>
                                <p style="font-size: 14px;">UKRBD
                                    <br>
                                    info@urkbd.com
                                    <br>
                                    +8801877774081
                                    <br>
                                    <br>
                                    Barishal Sadar
                                    <br>
                                    Barishal, 8200
                                </p>
        
                            </div>
                        </div>
                        <br>
                        <br>
                        <div class="row">
                            <div class="col-12">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>
                                                E-Shop
                                            </th>
                                            <th>Title</th>
                                            <th>Qty</th>
                                            <th>Price</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                   
                                            @php
                                                $product = App\Models\Product::find($order->product_id);
                                                $orderProduct = App\Models\OrderProduct::where('order_id', $order->id)->first();
                                                if ($orderProduct) {
                                                    $variation = $orderProduct->variation
                                                        ? json_decode($orderProduct->variation)
                                                        : null;
                                                } else {
                                                    $variation = null;
                                                }
                                            @endphp
                                            <tr>
                                                <td>
                                                    <a
                                                        href="{{ route('voyager.shops.show', $order->shop) }}">{{ $order->shop->name }}</a>
                                                    <br>
                                                    <a href="mailto:{{ $order->shop->email }}">{{ $order->shop->email }}</a>
                                                    <br>
                                                    <a href="tel:{{ $order->shop->phone }}">{{ $order->shop->phone }}</a>
                                                </td>
                                                <td>
                                                    {{ $product->name }}
        
                                                </td>
                                                <td>
                                                    {{ $order->quantity }}
                                                </td>
                                                <td>
                                                    {{ Sohoj::price($product->price) }}
                                                </td>
                                                <td>{{ Sohoj::price($order->subtotal) }}</td>
                                            </tr>
                                    
                                    </tbody>
                                    <tfoot>
        
                                        <tr>
                                            <td colspan="3"></td>
                                            <td>Subtotal</td>
                                            <td>
                                                {{ Sohoj::price($order->subtotal) }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3"></td>
                                            <td>Shipping</td>
                                            <td>
                                                {{ Sohoj::price($order->shipping_total) }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3"></td>
                                            <td>Total</td>
                                            <td>
                                                {{ Sohoj::price($order->total + $order->shipping_total) }}
                                            </td>
                                        </tr>
        
        
        
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        
        </div>
        <script type="text/javascript">
            function printDiv(divName) {
                var printContents = document.getElementById(divName).innerHTML;
                var originalContents = document.body.innerHTML;
        
                document.body.innerHTML = printContents;
        
                window.print();
        
                document.body.innerHTML = originalContents;
            }
        </script>
        
        </div>
    </div>

</x-app>
