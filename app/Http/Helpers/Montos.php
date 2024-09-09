<?php
namespace App\Http\Helpers;
class Montos{
    static function toHumman(int $n):string{
        return number_format($n,2,'.',',');
    }
}
