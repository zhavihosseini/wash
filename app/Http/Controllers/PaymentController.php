<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Evryn\LaravelToman\CallbackRequest;
class PaymentController extends Controller
{
    public function callback(CallbackRequest $request)
    {
        $request->transactionId() ;
        $request->orderId();
        $payment = $request->verify();
        if ($payment->successful()) {
            // Store the successful transaction details
            $referenceId = $payment->referenceId();
        }

        if ($payment->alreadyVerified()) {

        }

        if ($payment->failed()) {
            // ...
        }
    }
}
