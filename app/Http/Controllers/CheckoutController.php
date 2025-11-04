<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Mail\OrderPlaced;
use App\Models\Address;
use App\Models\Coupon;
use App\Models\Earning;
use App\Models\Notification;
use Sohoj;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use App\Models\Shop;
use App\Models\User;
use Cart;
use Codeboxr\PathaoCourier\Facade\PathaoCourier;
use Error;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Voyager;

class CheckoutController extends Controller
{

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|max:60|string',
            'email' => 'nullable|max:40|email',
            'phone' => 'required|regex:/^(?:\+?88)?01[3-9]\d{8}$/',
            'address' => 'required|min:10',
            'city' => 'required',
            'zone' => 'required',
            'area' => 'required',
            'order_notes' => 'nullable|max:120',
            'shipping' => 'required',
            'payment_method' => 'nullable',
            'order.shipping' => 'required',
            'order.subtotal' => 'required',
            'order.total' => 'required',
        ]);


        // if (
        //     $request->order['shipping'] != session('order_payment_info')['shipping'] ||
        //     $request->order['subtotal'] != session('order_payment_info')['subtotal'] ||
        //     $request->order['total'] != session('order_payment_info')['total']
        // ) {
        //     abort(403, 'Serverside calculation is not same');
        // }


        // $address = Address::find($request->prevoius_address);

        $shipping = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'post_code' => $request->post_code,
            'city' => ['id' => (int) explode('-', $request->city)[0], 'name' => explode('-', $request->city)[1]],
            'zone' => ['id' => (int) explode('-', $request->zone)[0], 'name' => explode('-', $request->zone)[1]],
            'area' => ['id' => (int) explode('-', $request->area)[0], 'name' => explode('-', $request->area)[1]]
        ];

        if ($this->productsAreNoLongerAvailable()) {

            return back()->withErrors('Sorry! One of the items in your cart is no longer Available!');
        }
        // try {
        DB::beginTransaction();
        $platform_fee = 0;
        $total = (Sohoj::newSubtotal() + $platform_fee);

        $order = Order::create([
            'user_id' => auth()->user() ? auth()->user()->id : null,
            'shop_id' => null,
            'product_id' => null,
            'shipping' => json_encode($shipping),
            'subtotal' => Cart::getSubTotal(),
            'discount' => Sohoj::round_num(Sohoj::discount()),
            'discount_code' => Sohoj::discount_code(),
            'tax' => null,
            'shipping_total' => Sohoj::round_num($request->order['shipping']),
            'platform_fee' => $platform_fee,
            'total' => Sohoj::round_num($total),
            'quantity' => Cart::getTotalQuantity(),
            'vendor_total' => null,
            'shipping_method' => $request->shipping,
            'payment_method' => $request->payment_method,
            'customer_note' => $request->order_notes
        ]);
        session(['guest_order_id' => $order->id]);


        foreach (Cart::getContent() as $item) {

            OrderProduct::create([
                'quantity' => $item->quantity,
                'order_id' => $order->id,
                'product_id' => $item->model->id,
                'price' => $item->price,
                'total_price' => $item->price * $item->quantity,
                'variation' => $item->model->variations,
                'shop_id' => $item->model->shop_id,
            ]);
            $shipping_total = 0;
            if (!session()->get('division')) {

                $response = PathaoCourier::order()->priceCalculation([
                    "store_id" => $item->attributes['store_id'],
                    "item_type" => 2,
                    "delivery_type" => 48,
                    "item_weight" =>  minValue($item->attributes['weight'], 0.1) * $item->quantity,
                    "recipient_city" => $shipping['city']['id'],
                    "recipient_zone" => $shipping['zone']['id']
                ]);
                // $shipping_total= $response->final_price;
                $shipping_total = 0;
            }

            $childOrder = Order::create([
                'user_id' => auth()->user() ? auth()->user()->id : null,
                'parent_id' => $order->id,
                'shop_id' => $item->model->shop_id,
                'product_id' => $item->id,
                'shipping' => json_encode($shipping),

                'subtotal' => $item->price * $item->quantity,
                'discount' => null,
                'discount_code' => null,
                'tax' => null,
                'shipping_total' => $shipping_total,
                'platform_fee' => 0,
                'total' => Sohoj::round_num(($item->price * $item->quantity) + $shipping_total),
                'quantity' => $item->quantity,
                'vendor_total' => $item->model->vendor_price * $item->quantity,
                // 'payment_method' => $request->payment_method[0],
                'product_price' => $item->price,
            ]);
        }

        $childOrders = $order->childs;

        foreach ($childOrders as $childOrder) {
            $childOrder->update(['status' => 0]);
            Earning::create([
                'order_id' => $childOrder->id,
                'shop_id' => $childOrder->shop->id,
                'retailer_id' => $childOrder->shop->referral_id,
                'shop_earn' => Sohoj::shopWoned($childOrder),
                'admin_earn' => Sohoj::adminOwned($childOrder),
                'retailer_earn' => Sohoj::marchentigerOwned($childOrder),
            ]);
            $childOrder->shop->update([
                'total_own' => $childOrder->shop->total_own + Sohoj::shopWoned($childOrder),
            ]);
            if ($childOrder->shop->retailer) {

                $childOrder->shop->retailer->update([
                    'total_own' => $childOrder->shop->retailer->total_own + Sohoj::marchentigerOwned($childOrder),
                ]);
            }

            if ($childOrder->shop->email) {

                // Mail::to($childOrder->shop->email)->send(new OrderPlaced($childOrder));
            }
        }




        // Mail::to($order->user->email ?? $shipping['email'])->send(new OrderPlaced($order));
        $this->decreaseQuantities();

        Cart::clear();

        session()->forget('order_payment_info');

        if (session()->has('discount_code')) {
            Coupon::where('code', session('discount_code'))->first()->used();
        }
        session()->forget('discount');
        session()->forget('discount_code');

        DB::commit();
        $charge = $order->initializePayment($request->payment_method);
        return $charge;
        // if ($charge->method != 'cod') {
        //     return redirect($charge->url);
        // } else {
        //     return redirect()->route('thankyou');
        // }

    }

    public function customCreate()
    {
        if (function_exists('view') && view()->exists('auth.seller.custom-create')) {
            return view('auth.seller.custom-create');
        }
        return response('Custom order create endpoint is ready. Add view resources/views/auth/seller/custom-create.blade.php to render UI.', 200);
    }

    public function customStore(Request $request)
    {
        $request->validate([
            'name' => 'required|max:60|string',
            'email' => 'nullable|max:40|email',
            'phone' => 'nullable|string',
            'address' => 'required|min:3',
            'city' => 'nullable|string',
            'zone' => 'nullable|string',
            'area' => 'nullable|string',
            'order_notes' => 'nullable|max:120',
            'shipping' => 'nullable',
            'payment_method' => 'nullable',
            'items' => 'required|array|min:1',
            'items.*.product_id' => 'required|integer|exists:products,id',
            'items.*.quantity' => 'required|numeric|min:0.01',
            'items.*.price' => 'required|numeric|min:0',
        ]);

        $shipping = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'post_code' => $request->post_code,
            'city' => ['id' => null, 'name' => $request->city],
            'zone' => ['id' => null, 'name' => $request->zone],
            'area' => ['id' => null, 'name' => $request->area]
        ];

        // Ensure vendor has a shop when creating from vendor dashboard
        if (!auth()->check() || !auth()->user()->shop) {
            abort(403, 'Only vendors with a shop can create custom orders.');
        }

        // Check stock availability
        foreach ($request->items as $lineItem) {
            $product = Product::find($lineItem['product_id']);
            if ($product->shop_id !== auth()->user()->shop->id) {
                abort(403, 'You can only create orders for your own products.');
            }
        
        }

        DB::beginTransaction();
        try {
            $platform_fee = 0;
            $subtotal = collect($request->items)->sum(function ($i) {
                return (float) $i['total'];
            });
            $shipping_total = Sohoj::round_num($request->input('order.shipping', 0));
            $total = $subtotal + $platform_fee + $shipping_total;

            $order = Order::create([
                'status' => 1,
                'user_id' => auth()->id(),
                'shop_id' => null,
                'product_id' => null,
                'shipping' => json_encode($shipping),
                'subtotal' => Sohoj::round_num($subtotal),
                'discount' => null,
                'discount_code' => null,
                'tax' => null,
                'shipping_total' => Sohoj::round_num($shipping_total),
                'platform_fee' => $platform_fee,
                'total' => Sohoj::round_num($total),
                'quantity' => (float) collect($request->items)->sum('quantity'),
                'vendor_total' => null,
                'shipping_method' => $request->shipping,
                'payment_method' => $request->payment_method ?? 'cod',
                'customer_note' => $request->order_notes
            ]);

            foreach ($request->items as $lineItem) {

                $product = Product::find($lineItem['product_id']);

                OrderProduct::create([
                    'quantity' => (float) $lineItem['quantity'],
                    'order_id' => $order->id,
                    'product_id' => $product->id,
                    'price' => (float) $lineItem['price'],
                    'total_price' => (float) $lineItem['total'],
                    'variation' => $product->variations,
                    'shop_id' => $product->shop_id,
                ]);

                $childOrder = Order::create([
                    'status' => 1,
                    'user_id' => auth()->id(),
                    'parent_id' => $order->id,
                    'shop_id' => $product->shop_id,
                    'product_id' => $product->id,
                    'shipping' => json_encode($shipping),
                    'subtotal' => (float) $lineItem['total'],
                    'discount' => null,
                    'discount_code' => null,
                    'tax' => null,
                    'shipping_total' => 0,
                    'platform_fee' => 0,
                    'total' => (float) $lineItem['total'],
                    'quantity' => (float) $lineItem['quantity'],
                    'vendor_total' => (float) $lineItem['total'],
                    'product_price' => (float) $lineItem['price'],
                ]);
            }

            $childOrders = $order->childs;
            foreach ($childOrders as $childOrder) {
                $childOrder->update(['status' => 1]);
                Earning::create([
                    'order_id' => $childOrder->id,
                    'shop_id' => $childOrder->shop->id,
                    'retailer_id' => $childOrder->shop->referral_id,
                    'shop_earn' => Sohoj::shopWoned($childOrder),
                    'admin_earn' => Sohoj::adminOwned($childOrder),
                    'retailer_earn' => Sohoj::marchentigerOwned($childOrder),
                ]);
                $childOrder->shop->update([
                    'total_own' => $childOrder->shop->total_own + Sohoj::shopWoned($childOrder),
                ]);
                if ($childOrder->shop->retailer) {
                    $childOrder->shop->retailer->update([
                        'total_own' => $childOrder->shop->retailer->total_own + Sohoj::marchentigerOwned($childOrder),
                    ]);
                }
            }

            $this->decreaseQuantitiesForItems($request->items);

            DB::commit();
            return redirect()->route('vendor.ordersIndex')->with('success', 'Custom order created');
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    protected function decreaseQuantitiesForItems(array $items)
    {
        foreach ($items as $item) {
            $product = Product::find($item['product_id']);
            if ($product) {
                $product->increment('total_sale');
                $product->update(['quantity' => $product->quantity - (int) $item['quantity']]);
            }
        }
    }

    protected function decreaseQuantities()
    {
        foreach (Cart::getContent() as $item) {
            $product = Product::find($item->model->id);
            $product->increment('total_sale');
            $product->update(['quantity' => $product->quantity - $item->quantity]);
        }
    }
    protected function notification($user, $shop)
    {
        Notification::create([
            'url' => env('APP_URL') . '/vendor/dashboard/orders/index',
            'title' => 'Order Created',
            'shop_id' => $shop,
        ]);
    }

    protected function productsAreNoLongerAvailable()
    {
        foreach (Cart::getContent() as $item) {
            $product = Product::find($item->model->id);
            if ($product->quantity < $item->quantity) {
                return true;
            }
        }
        return false;
    }
    public function userAddress(Request $request)
    {

        Address::create([
            'address_1' => $request->address_1,
            'address_2' => $request->address_2,
            'country' => $request->country,
            'state' => $request->state,
            'city' => $request->city,
            'post_code' => $request->post_code,
            'user_id' => auth()->id(),
        ]);
        return redirect()->back()->with('success_msg', 'Address create successfull ');
    }
}
