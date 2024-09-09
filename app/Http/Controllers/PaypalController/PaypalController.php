<?php

namespace App\Http\Controllers\PaypalController;

use App\Http\Controllers\PagarInterfaces\PagarInterfaces;
use App\Http\Helpers\Monedas;
use App\Http\Helpers\Montos;
use Illuminate\Http\Request;

class PaypalController implements PagarInterfaces
{

    public function __construct()
    {
    }

    public function pagar(Request $r)
    {
        $monto = Montos::toHumman($r->monto);
        $moneda = Monedas::fromID($r->moneda);

        return "https://paypay.com/checkout?r=$monto&moneda=$moneda";
    }

    public function checkout()
    {
        return "https://checkoutpaypal.com/checkout";
    }
}
