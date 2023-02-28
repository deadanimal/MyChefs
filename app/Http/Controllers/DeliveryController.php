<?php

namespace App\Http\Controllers;

use App\Models\Delivery;
use Illuminate\Http\Request;

class DeliveryController extends Controller
{
    public function api_create_delivery(Request $request) {}

    public function api_show_deliveries(Request $request) {}

    public function api_show_delivery(Request $request) {}
    
    public function api_update_delivery(Request $request) {}




    public function app_create_delivery(Request $request) {
        $delivery = Delivery::create([

        ]);
        return back();
    }

    public function app_show_deliveries(Request $request) {
        $deliveries = Delivery::all();
        return view('delivery_list', compact('deliveries'));
    }

    public function app_show_delivery(Request $request) {}
    
}
