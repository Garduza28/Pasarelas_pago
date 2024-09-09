<?php

namespace App\Http\Controllers\StripeController;

use App\Http\Controllers\PagarInterfaces\PagarInterfaces;
use Illuminate\Http\Request;

class StripeController implements PagarInterfaces
{

    public function __construct()
    {
    }

    public function pagar(Request $r)
    {
        return "https://stripe/checkout MONTO:$r->monto";
    }

    public function checkout()
    {
        return "https://stripechecout.com/checkout";
    }
}
