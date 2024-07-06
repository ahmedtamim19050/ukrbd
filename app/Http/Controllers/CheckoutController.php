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
            'address' => 'required',
            'city' => 'required',
            'zone' => 'required',
            'area' => 'required',
            'order-notes' => 'nullable',
            'shipping' => 'required',
            'payment_method' => 'required',
            'order.shipping' => 'required',
            'order.subtotal' => 'required',
            'order.total' => 'required',
        ]);

        if (
            $request->order['shipping'] != session('order_payment_info')['shipping'] ||
            $request->order['subtotal'] != session('order_payment_info')['subtotal'] ||
            $request->order['total'] != session('order_payment_info')['total']
        ) {
            abort(403, 'Serverside calculation is not same');
        }


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
        try {
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
            'quantity' => null,
            'vendor_total' => null,
            // 'payment_method' => $request->payment_method[0],
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

            $response = PathaoCourier::order()->priceCalculation([
                "store_id" => $item->attributes['store_id'],
                "item_type" => 2,
                "delivery_type" => 48,
                "item_weight" => $item->attributes['weight'] * $item->quantity,
                "recipient_city" => $shipping['city']['id'],
                "recipient_zone" => $shipping['zone']['id']
            ]);
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
                'shipping_total' => $response->final_price,
                'platform_fee' => 0,
                'total' => Sohoj::round_num(($item->price * $item->quantity) + $response->final_price),
                'quantity' => $item->quantity,
                'vendor_total' => $item->model->vendor_price * $item->quantity,
                // 'payment_method' => $request->payment_method[0],
                'product_price' => $item->price,
            ]);
       
        }
        $childOrders = $order->childs;

        foreach ($childOrders as $childOrder) {
            $childOrder->update(['status' => 1]);
            Earning::create([
                'order_id'=>$childOrder->id,
                'shop_id'=>$childOrder->shop->id,
                'shop_earn'=>Sohoj::shopWoned($childOrder),
                'admin_earn'=>Sohoj::adminOwned($childOrder),
            ]);
            $childOrder->shop->update([
                'total_own'=>$childOrder->shop->total_own + Sohoj::shopWoned($childOrder),
            ]);

            if ($childOrder->shop->email) {

                Mail::to($childOrder->shop->email)->send(new OrderPlaced($childOrder));
            }
        }

      


        Mail::to($order->user->email ?? $shipping['email'])->send(new OrderPlaced($order));
        $this->decreaseQuantities();

        Cart::clear();

        session()->forget('order_payment_info');

            if (session()->has('discount_code')) {
                Coupon::where('code', session('discount_code'))->first()->used();
            }
            session()->forget('discount');
            session()->forget('discount_code');
            $charge = $order->initializePayment($request->payment_method);
        
            DB::commit();
            if ($charge->method != 'cod') {
                return redirect($charge->url);
            } else {
                return redirect()->route('thankyou');
            }
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors($e->getMessage());
        } catch (Error $e) {
            DB::rollBack();
            return redirect()->back()->withErrors($e->getMessage());
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
