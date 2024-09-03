<?php

namespace App\Http\Controllers;

use App\Services\ToyyibPayService;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    protected $toyyibPayService;

    public function __construct(ToyyibPayService $toyyibPayService)
    {
        $this->toyyibPayService = $toyyibPayService;
    }

    public function createBill(Request $request)
    {
        $data = $request->all();
        $response = $this->toyyibPayService->createBill($data);

        if ($response['status'] == 'success') {
            return redirect($response['billURL']);
        } else {
            return back()->withErrors(['msg' => 'Unable to create bill.']);
        }
    }

    public function checkBill($billCode)
    {
        $response = $this->toyyibPayService->checkBill($billCode);

        return view('payment.status', ['response' => $response]);
    }

    public function testPayment()
    {
        $data = [
            'billcode' => 'TEST1234',  // Replace with a valid test bill code if needed
            'amount' => 100,            // Replace with a valid test amount
            'phone' => '0123456789',    // Replace with a valid test phone number
            'email' => 'test@example.com', // Replace with a valid test email
            // Add other required parameters for the ToyyibPay API
        ];

        $response = $this->toyyibPayService->createBill($data);

        return view('payment.test', ['response' => $response]);
    }
}
