<?php

namespace App\Services;

use Openpay\Data\Openpay;

class OpenPayService
{
    protected $openpay;

    public function __construct()
    {
        $merchantId = env('OPENPAY_MERCHANT_ID');
        $privateKey = env('OPENPAY_PRIVATE_KEY');
        $country = env('OPENPAY_COUNTRY', 'MX');
        $publicIp = request()->ip();

        $this->openpay = Openpay::getInstance($merchantId, $privateKey, $country, $publicIp);
    }

    public function createCharge(array $data)
    {
        $customer = [
            'name' => $data['name'],
            'last_name' => $data['last_name'],
            'phone_number' => $data['phone_number'],
            'email' => $data['email']
        ];

        $chargeRequest = [
            'method' => 'card',
            'amount' => $data['amount'],
            'description' => $data['description'] ?? 'Descripción del cargo',
            'customer' => $customer,
            'send_email' => false,
            'confirm' => false,
            'redirect_url' => $data['redirect_url']
        ];

        return $this->openpay->charges->create($chargeRequest);
    }


    public function getChargeById($chargeId)
{
    try {
        
        $charge = $this->openpay->charges->get($chargeId);
        return $charge;
    } catch (OpenpayApiTransactionError $e) {
        throw new \Exception('Transaction error: ' . $e->getMessage());
    } catch (OpenpayApiRequestError $e) {
        throw new \Exception('Request error: ' . $e->getMessage());
    } catch (OpenpayApiConnectionError $e) {
        throw new \Exception('Connection error: ' . $e->getMessage());
    } catch (OpenpayApiAuthError $e) {
        throw new \Exception('Auth error: ' . $e->getMessage());
    } catch (OpenpayApiError $e) {
        throw new \Exception('OpenPay error: ' . $e->getMessage());
    }
}

    public function getTransactions()
    {
        return $this->openpay->charges->getList([]);
    }
}
