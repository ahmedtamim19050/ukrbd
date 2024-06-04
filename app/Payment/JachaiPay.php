<?php

namespace App\Payment;

use App\Models\Order;

class JachaiPay
{
    const BASE_URL = "https://dgpay.ekshop.gov.bd/api/";
    public Order $order;

    public function __construct(Order $order)
    {
        $this->order = $order;
    }


    public static function init(Order $order)
    {
        return new self($order);
    }

    public function getPaymentLink()
    {
        dd($this->order);
    }
}
