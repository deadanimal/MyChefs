<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    public function api_create_order(Request $request) {

        $order = [];

        return response()->json([
            'data' => $order,
            'api' => 'order/create_order',
            'ts' => Carbon::now()->timestamp
        ], 201);  
        
        
    }

    public function api_show_orders(Request $request) {

        $orders = [];

        return response()->json([
            'data' => $orders,
            'api' => 'order/show_orders',
            'ts' => Carbon::now()->timestamp
        ], 200);  
           
    }

    public function api_show_order(Request $request) {

        $order = [];

        return response()->json([
            'data' => $order,
            'api' => 'order/show_order',
            'ts' => Carbon::now()->timestamp
        ], 200);          

    }
    
    public function api_update_order(Request $request) {

        $order = [];

        return response()->json([
            'data' => $order,
            'api' => 'order/update_order',
            'ts' => Carbon::now()->timestamp
        ], 204);          

    }  

    public function api_update_cart(Request $request) {

        $order = [];

        return response()->json([
            'data' => $order,
            'api' => 'order/update_order',
            'ts' => Carbon::now()->timestamp
        ], 204);          

    }    



    public function api_create_booking(Request $request) {

        $booking = [];

        return response()->json([
            'data' => $booking,
            'api' => 'order/create_booking',
            'ts' => Carbon::now()->timestamp
        ], 201);          

    }

    public function api_show_bookings(Request $request) {

        $bookings = [];

        return response()->json([
            'data' => $bookings,
            'api' => 'order/show_bookings',
            'ts' => Carbon::now()->timestamp
        ], 200);          

    }

    public function api_show_booking(Request $request) {

        $booking = [];

        return response()->json([
            'data' => $booking,
            'api' => 'order/show_booking',
            'ts' => Carbon::now()->timestamp
        ], 200);                 

    }
    
    public function api_update_booking(Request $request) {

        $booking = [];

        return response()->json([
            'data' => $booking,
            'api' => 'order/update_booking',
            'ts' => Carbon::now()->timestamp
        ], 204);     

    }     
}
