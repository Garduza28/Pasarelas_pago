<?php
namespace App\Http\Controllers\PagarInterfaces;

use Illuminate\Http\Request;

interface PagarInterfaces{
    public function pagar(Request $r);

    public function checkout();
}
