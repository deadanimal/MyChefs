<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminRestaurantController extends Controller
{
    public function show_dashboard(Request $request) {
        return view('admin.dashboard');
    }

    public function show_restaurants(Request $request) {}

    public function show_restaurant(Request $request) {}

    public function update_restaurant(Request $request) {}
}
