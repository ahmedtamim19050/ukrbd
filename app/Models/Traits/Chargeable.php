<?php

namespace App\Models\Traits;

use App\Models\Charge;
use App\Payment\Library\SslCommerz\SslCommerzNotification;
use App\Payment\Payment;
use Illuminate\Database\Eloquent\Relations\MorphOne;

trait Chargeable
{

    public function charge(): MorphOne
    {
        return $this->morphOne(Charge::class, 'chargeable');
    }

    public function initializePayment($method = 'cod')
    {

        // dd($this->orderProducts->map(fn($product)=> $product->name .'X'.));
        $charge = $this->charge()->create([
            'uniqid' => uniqid(),
            'method' => $method,
            'amount' => $this->total
        ]);



        if ($method == 'cod') {
            
            return redirect()->route('thankyou');
        } else {


            $sslc = new SslCommerzNotification();

            $payment_options = $sslc->makePayment([
                'cus_name' => json_decode($this->shipping)->name,
                'cus_phone' => json_decode($this->shipping)->phone,
                'cus_email' => json_decode($this->shipping)->email ? json_decode($this->shipping)->email : 'guest@customer.com',
                'cus_country' => "Bangladesh",
                'product_name' => 'Order #' . $this->id,
                'product_category' => 'physical-goods',
                'product_profile' => implode('', $this->orderProducts->map(fn($product) => $product->product->name . ' X ' . $product->quantity . ' | ')->toArray()),
                'tran_id' => uniqid(),
                'currency' => 'BDT',
                'total_amount' => $charge->amount,
                'shipping_method' => 'NO',
                'tran_id' => $charge->uniqid,
            ], 'hosted');
            if (!is_array($payment_options)) {
                print_r($payment_options);
                $payment_options = array();
            }
        }


        // if ($charge->method != 'cod') {
        //     $charge->update([
        //         'uniqid' => $payment->id,
        //         'url' => $payment->url,
        //     ]);
        // }

        return $charge;
    }
}
