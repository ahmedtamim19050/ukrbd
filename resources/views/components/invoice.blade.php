@php

    $shipping = json_decode($orders->first()->shipping);
    $shop = App\Models\Shop::find($orders->first()->shop_id);
    $parentOrder = App\Models\Order::where('parent_id', $orders->first()->parent_id)->first();
@endphp



<div class="d-flex justify-content-start mb-2 print-hide">
    <button onclick="printDiv('printableArea')" class="btn btn-primary" style="border:1px solid #000;background:#fff;color:#000">Print this page</button>

</div>

<div id="printableArea">
    <div class="container">
            <div class="invoice-container" style="border:1px solid #000;padding:16px">
            <div>
                <div class="row">
                    <div class="col-md-8">
                        <h2>INVOICE #{{ $orders->first()->id }}</h2>
                    </div>
                    <div class="col-md-4">
                        <h3>{{ $orders->first()->created_at->format('d M, Y') }}</h3>
                        <h4 style="color:#000 !important;text-transform:uppercase">{{$orders->first()->getStatus()['label']}}</h4>
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
                        <table style="width:100%;border-collapse:collapse">
                            <thead>
                                <tr>
                                    <th style="border:1px solid #000;padding:6px 8px;text-align:left">Title</th>
                                    <th style="border:1px solid #000;padding:6px 8px;text-align:left">Qty</th>
                                    <th style="border:1px solid #000;padding:6px 8px;text-align:left">Price</th>
                                    <th style="border:1px solid #000;padding:6px 8px;text-align:left">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
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
                                        <td style="border:1px solid #000;padding:6px 8px;">
                                            {{ $product->name }}

                                        </td>
                                        <td style="border:1px solid #000;padding:6px 8px;">
                                            {{ $order->quantity }}
                                        </td>
                                        <td style="border:1px solid #000;padding:6px 8px;">
                                            {{ Sohoj::price($product->price) }}
                                        </td>
                                        <td style="border:1px solid #000;padding:6px 8px;">{{ Sohoj::price($order->subtotal) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>

                                <tr>
                                    <td colspan="2" style="border:none"></td>
                                    <td style="border:1px solid #000;padding:6px 8px;">Subtotal</td>
                                    <td style="border:1px solid #000;padding:6px 8px;">
                                        {{ Sohoj::price($orders->sum('subtotal')) }}
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="border:none"></td>
                                    <td style="border:1px solid #000;padding:6px 8px;">Shipping</td>
                                    <td style="border:1px solid #000;padding:6px 8px;">
                                        {{ Sohoj::price($orders->sum('shipping_total')) }}
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="border:none"></td>
                                    <td style="border:1px solid #000;padding:6px 8px;">Total</td>
                                    <td style="border:1px solid #000;padding:6px 8px;">
                                        {{ Sohoj::price($orders->sum('total')) }}
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
