<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

class PaymentController extends Controller
{

    public function api_show_payments(Request $request) {

        $payments = [];

        return response()->json([
            'data' => $payments,
            'api' => 'payment/show_payments',
            'ts' => Carbon::now()->timestamp
        ], 200); 
        
        
    }

    public function api_show_payment(Request $request) {

        $payment = [];

        return response()->json([
            'data' => $payment,
            'api' => 'payment/show_payment',
            'ts' => Carbon::now()->timestamp
        ], 200);        

    }
    
    public function api_pay_for_order(Request $request) {

        $payment = [];

        return response()->json([
            'data' => $payment,
            'api' => 'payment/pay_for_order',
            'ts' => Carbon::now()->timestamp
        ], 200);   

    }

    public function api_refund_order(Request $request) {}

    public function api_clear_payments(Request $request) {}
}
