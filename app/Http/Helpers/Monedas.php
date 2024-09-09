<?php
namespace App\Http\Helpers;

class Monedas{
    static function fromID(int $id){
        $monedas = ["MXN","USD","EUR"];
        return $monedas[$id] ?? "MXN";
    }
}
