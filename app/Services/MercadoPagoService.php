<?php

namespace App\Services;

use MercadoPago\SDK;
use MercadoPago\Preference;
use MercadoPago\Item;
use Illuminate\Support\Facades\Http;

class MercadoPagoService
{
    public function __construct()
    {
        SDK::setAccessToken(env('MERCADOPAGO_ACCESS_TOKEN'));
    }

    public function createPreference(array $itemData)
    {
        $preference = new Preference();

        $item = new Item();
        $item->title = $itemData['title'];
        $item->quantity = $itemData['quantity'];
        $item->unit_price = $itemData['unit_price'];
        $preference->items = [$item];

        $preference->back_urls = [
            'success' => route('payment.success'),
            'failure' => route('payment.failure'),
            'pending' => route('payment.pending'),
        ];

        $preference->auto_return = 'approved';

        $preference->save();

        return $preference->id;
    }

    public function listAllTransactions()
    {
        $accessToken = env('MERCADOPAGO_ACCESS_TOKEN');

        $response = Http::withToken($accessToken)
            ->get('https://api.mercadopago.com/v1/payments/search', [
                'sort' => 'date_created',
                'criteria' => 'desc',
                'range' => 'date_created',
                'begin_date' => now()->subMonth()->toDateString() . 'T00:00:00Z',
                'end_date' => now()->toDateString() . 'T23:59:59Z',
            ]);

        if ($response->ok()) {
            return $response->json('results');
        } else {
            return [];
        }
    }
}