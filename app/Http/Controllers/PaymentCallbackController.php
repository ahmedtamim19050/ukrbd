<?php

namespace App\Http\Controllers;

use App\Models\Charge;
use App\Payment\Library\SslCommerz\SslCommerzNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PaymentCallbackController extends Controller
{
    // public function success(Request $request)
    // {
    //     $charge = Charge::where('uniqid', $request->transId)->first()->success();
    //     return redirect()->route('thankyou', ['status' => 'success', 'charge' => $charge->uniqid]);
    // }

    public function success(Request $request)
    {

        $tran_id = $request->input('tran_id');
        $amount = $request->input('amount');
        $currency = $request->input('currency');
        $sslc = new SslCommerzNotification();
        #Check order status in order tabel against the transaction id or order id.
        $bill = Charge::where('uniqid', $tran_id)->first();


        if ($bill->status == 'Pending') {
            $validation = $sslc->orderValidate($request->all(), $tran_id, $amount, $currency);

            if ($validation) {
                /*
                That means IPN did not work or IPN URL was not set in your merchant panel. Here you need to update order status
                in order table as Processing or Complete.
                Here you can also sent sms or email for successfull transaction to customer
                */
                $bill->payment_details = [
                    "account_no" => $request->card_no,
                    "payment_method" => $request->card_type,
                ];

                $bill->status = 'Paid';
                $bill->save();


                return redirect()->route('thankyou');
            }
        } else if ($bill->status == 'Paid') {
            /*
             That means through IPN Order status already updated. Now you can just show the customer that transaction is completed. No need to udate database.
             */
            return redirect()->route('thankyou');
        } else {
            #That means something wrong happened. You can redirect customer to your product page.
            abort(405, 'Payment is not completed');
        }
    }


    public function canceled(Request $request)
    {

        $charge =  Charge::where('uniqid', $request->transId)->first()->canceled();
        return redirect()->route('thankyou', ['status' => 'success', 'charge' => $charge->uniqid]);
    }

    public function cancel(Request $request)
    {
        $tran_id = $request->input('tran_id');

        $bill = Charge::where('uniqid', $tran_id)->first()->canceled();
        return redirect()->route('thankyou', ['status' => 'success', 'charge' => $bill->uniqid]);


        // if ($bill->status == 'PENDING') {
        //     return redirect()->route('thankyou', ['status' => 'failed', 'charge' => $bill->uniqid]);
        // } else if ($bill->status == 'PAID') {
        //     return redirect()->route('thankyou', ['status' => 'success', 'charge' => $bill->uniqid]);
        // } else {
        //     return redirect()->route('thankyou', ['status' => 'failed', 'charge' => $bill->uniqid]);

        // }
    }


    public function failed(Request $request)
    {
        $tran_id = $request->input('tran_id');
        $bill = Charge::where('uniqid', $tran_id)->first()->failed();
        return redirect()->route('thankyou', ['status' => 'success', 'charge' => $bill->uniqid]);
    }

    // public function ipn(Request $request)
    // {
    //     Log::info($request->all());
    //     $charge = Charge::where('uniqid', $request['trnx_info']['trnx_id'])->firstOrFail();
    //     $charge->update(['payment_details'  => $request->all()]);
    //     Log::success('Charge updated successfully ' . $charge->id);
    // }


    public function ipn(Request $request)
    {
        Log::info($request->all());
        #Received all the payement information from the gateway
        if ($request->input('tran_id')) #Check transation id is posted or not.
        {

            $tran_id = $request->input('tran_id');

            #Check order status in order tabel against the transaction id or order id.
            $bill = Charge::where('uniqid', $tran_id)->firstOrFail();

            if ($bill->status == 'Paid') {
                $sslc = new SslCommerzNotification();
                $validation = $sslc->orderValidate($request->all(), $tran_id, $bill->amount, 'BDT');
                if ($validation == TRUE) {
                    /*
                    That means IPN worked. Here you need to update order status
                    in order table as Processing or Complete.
                    Here you can also sent sms or email for successful transaction to customer
                    */

                    $bill->payment_details = [
                        "account_no" => $request->card_no,
                        "payment_method" => $request->card_type,
                    ];

                    $bill->status = 'Paid';
                    $bill->save();

                    Log::success('Charge updated successfully ' . $bill->id);
                    return redirect()->route('thankyou', ['status' => 'success', 'charge' => $bill->uniqid]);
                }
            } else if ($bill->status == 'Pending') {

                #That means Order status already updated. No need to udate database.
                return redirect()->route('thankyou', ['status' => 'success', 'charge' => $bill->uniqid]);
            } else {
                return redirect()->route('thankyou', ['status' => 'success', 'charge' => $bill->uniqid]);
            }
        } else {
            return redirect()->route('thankyou')->withErrors('Envalid Data');
        }
    }
    // public function refund(Request $request)
    // {
    //     dd($request->all());
    // }
}
