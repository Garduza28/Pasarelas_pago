<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\MercadoPagoService;

class MercadopagoController extends Controller
{
    protected $mercadoPagoService;

    public function __construct(MercadoPagoService $mercadoPagoService)
    {
        $this->mercadoPagoService = $mercadoPagoService;
    }

    public function createPreference(Request $request)
    {
        $itemData = [
            'title' => 'algo X',
            'quantity' => 1,
            'unit_price' => 100.00
        ];

        try {
            $preferenceId = $this->mercadoPagoService->createPreference($itemData);
            return response()->json(['preference_id' => $preferenceId]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function success(Request $request)
    {
        $data = [
            'message' => 'Pago exitoso',
            'details' => $request->only(['collection_id', 'collection_status', 'external_reference', 'preference_id', 'payment_type', 'merchant_order_id'])
        ];

        return view('payment.success', ['data' => $data]);
    }

    public function failure(Request $request)
    {
        $data = [
            'message' => 'Pago fallido',
            'details' => $request->all()
        ];

        return view('payment.failure', ['data' => $data]);
    }

    public function pending(Request $request)
    {
        $data = [
            'message' => 'Pago pendiente',
            'details' => $request->all()
        ];

        return view('payment.pending', ['data' => $data]);
    }

    public function listAllTransactions()
    {
        $transactions = $this->mercadoPagoService->listAllTransactions();

        return view('mercadopago.index', ['transactions' => $transactions]);
    }
}
