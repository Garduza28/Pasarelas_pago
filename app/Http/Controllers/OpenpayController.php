<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Services\OpenPayService;


class OpenpayController extends Controller
{
    protected $openPayService;

    public function __construct(OpenPayService $openPayService)
    {
        $this->openPayService = $openPayService;
    }


    

    public function createCharge(Request $request)
    {
        $data = $request->only(['name', 'last_name', 'phone_number', 'email', 'amount']);

        try {
            $charge = $this->openPayService->createCharge([
                'name' => $data['name'],
                'last_name' => $data['last_name'],
                'phone_number' => $data['phone_number'],
                'email' => $data['email'],
                'amount' => $data['amount'],
                'description' => 'Descripción del cargo',
                'redirect_url' => route('payment.charge')
            ]);

            

            if ($charge->payment_method->type == 'redirect') {
                return redirect()->to($charge->payment_method->url);
            }
        } catch (\Exception $e) {
            return back()->withErrors(['error' => $e->getMessage()]);
        }
}

public function handleCharge(Request $request)
{
    $chargeId = $request->query('id');

    try {
        
        $charge = $this->openPayService->getChargeById($chargeId);
      
        if ($charge->status == 'completed') {
            return view('payment.completed', ['charge' => $charge]);
        }
        return view('payment.failed', ['message' => 'Cargo no completado']);
        
    } catch (\Exception $e) {
        
        return response()->json(['error' => $e->getMessage()], 500);
    }
}



public function listTransactions()
{
    $transactions = $this->openPayService->getTransactions();
    return view('openpay.index', compact('transactions'));
}
}

