
@php
$shipping=json_decode($orders->first()->shipping);
$shop=App\Models\Shop::find($orders->first()->shop_id);
$parentOrder=App\Models\Order::where('parent_id',$orders->first()->parent_id)->first();
@endphp



<div class="d-flex justify-content-start mb-2">
    <button onclick="printDiv('printableArea')" class="btn btn-primary">Print this page</button>
   
</div>


<div id="printableArea">
    <div class="invoice-container">
        <div class="invoice-info row">
            <div class="shop-info col-md-6">
                <h4>Invoice</h4>
                <h6> {{ $shipping->name }}</h6>
                <p>{{ Carbon\Carbon::parse($orders->first()->created_at)->format('d-m-Y') }}</p>
                <p> Order No: {{ $orders->first()->id }}</p>
            </div>
            <div class="customer-info col-md-6">
                <h5>UKRBD</h5>

                <p>Barisal, Bangladesh</p>
                {{-- <p>+1 (518) 653-8997</p> --}}
                <p> Info@ukrbd.com</p>

            </div>
        </div>

        <table class="invoice-table ">
            <thead>
                <tr>

                    <th class="text-start">Description</th>
                    <th class="text-start">Price</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>

                 @foreach($orders as $order)
                 @php
                     $product=App\Models\Product::find($order->product_id);
                     $orderProduct=App\Models\OrderProduct::where('order_id',$order->id)->first();
                     if($orderProduct){

                         $variation = $orderProduct->variation ? json_decode($orderProduct->variation) : null;
                     }else{
                        $variation=null;
                     }
                 @endphp
                <tr>

                    <td>{{ $order->quantity }} x {{ $product->name }},
        
                        @if($variation)
                        @foreach ($variation as $key=> $item)
                            {{$key}} : {{$item}}
                        @endforeach
                        @endif


                    </td>

                    <td>{{ Sohoj::price($order->subtotal) }}</td>
                </tr>
                @endforeach

            </tbody>
            <tfoot>

                <tr style="border-top: 2px solid black">
                    <td colspan="1"></td>
                    <td colspan="">Subtotal</td>
                    <td class="text-center">
                        {{ Sohoj::price($parentOrder->total) }}
                    </td>
                </tr>
                <tr style="border-top: 2px solid black">
                    <td colspan="1"></td>
                    <td colspan="">Shipping Cost</td>
                    <td class="text-center">
                        {{ Sohoj::price($parentOrder->shipping_total) }}
                    </td>
                </tr>
                <tr style="border-top: 2px solid black">
                    <td colspan="1"></td>
                    <td colspan="">Total</td>
                    <td class="text-center">
                        {{ Sohoj::price($parentOrder->total + $parentOrder->shipping_total) }}
                    </td>
                </tr>



            </tfoot>
        </table>

        <div class="row shop" style="
        margin-top: 120px;">
            <div class="col-md-6">
                <h6>Shop</h6>
                <p>{{ $shop->name }}</p>
            </div>
            {{-- <div class="col-md-3">
                <h6>Id</h6>
                <p>{{ $shop->id }}</p>
            </div> --}}
            <div class="col-md-3">
                <h6>Address</h6>
                <p>{{ $shop->city }}, {{ $shop->state }}</p>
            </div>
        </div>
        <div class=" mt-5 p-3" style="border: 1px solid black">
            <table class="invoice-table">
                <thead>
                    <tr>
                        <th class="text-start">Additional Information:</th>
                        <th class="text-end">Total Paid:</th>
                    </tr>
                </thead>
                <tbody>
                    
                    <tr style="border-top: 2px solid black">
                        <td class="p-1 d-flex align-items-center">
                            <div class="cricle">


                            </div>
                            <span class="ms-1">Thank You! -UKRBD</span>
                        </td>
                        <td class="text-end " style="text-transform:uppercase">{{ Sohoj::price($parentOrder->total + $parentOrder->shipping_total) }}</td>
                    </tr>
                </tbody>
            </table>
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
