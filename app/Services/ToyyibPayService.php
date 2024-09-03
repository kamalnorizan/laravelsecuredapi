<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\RequestException;

class ToyyibPayService
{
    protected $apiKey;
    protected $endpoint;

    public function __construct()
    {
        $this->apiKey = config('toyyibpay.api_key');
        $this->endpoint = rtrim(config('toyyibpay.endpoint'), '/');
    }

    public function createBill($data)
    {
        $url = $this->endpoint . '/index.php/api/createBill';

        try {
            $response = Http::post($url, array_merge($data, [
                'userSecretKey' => $this->apiKey,
            ]));

            $response->throw(); // Throws an exception for HTTP errors

            return $response->json();
        } catch (RequestException $e) {
            \Log::error('Request failed: ' . $e->getMessage());
            return ['error' => 'Request failed, check the log for details.'];
        }
    }
}
