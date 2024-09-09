<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Pagar extends Controller
{
    public function pagar(Request $r, $code){
        $pagarController = new PagarController($r, $code);
        return $pagarController->pagar();
    }
    public function checkout(Request $r, $code){
        $pagarController = new PagarController($r, $code);
        return $pagarController->checkout();
    }
}
