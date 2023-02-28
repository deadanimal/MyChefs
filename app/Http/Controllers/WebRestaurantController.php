<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Menu;
use App\Models\MenuItem;
use App\Models\Restaurant;
use App\Models\RestaurantMenu;
use App\Models\RestaurantMenuItem;
use App\Models\RestaurantTable;
use Carbon\Carbon;
use Exception;

class WebRestaurantController extends Controller
{
    public function show_home(Request $request) {
        $ip = $request->ip();

        ## TODO: find restaurants that are promoting on the page, divided by area, 5-10mins, 10-30mins, 30-60mins, distance...

        $restaurants = [];//Restaurant::all();

        return view('home', compact('restaurants'));
    }

    public function show_second_home(Request $request) {
        $ip = $request->ip();

        $restaurants = [];//Restaurant::all();

        return view('home', compact('restaurants'));
    }    

    public function show_restaurants(Request $request) {
        $restaurants = Restaurant::all();
        return view('restaurants', compact('restaurants'));
    }

    public function show_restaurant(Request $request) {                
        try {
            $uuid = $request->route('uuid');  
            $restaurant = Restaurant::where('uuid', $uuid)->firstOrFail();
            return view('restaurant', compact('restaurant')); 
        }        
        catch(Exception $e) {
            echo 'Message: ' .$e->getMessage();
        }       
    }

    public function show_tables(Request $request) {
        try {
            $uuid = $request->route('uuid');  
            $restaurant = Restaurant::where('uuid', $uuid)->firstOrFail();
            $tables = RestaurantTable::where('restaurant_id', $restaurant->id)->get();
            
            return view('restaurant_tables', compact('restaurant', 'tables')); 
        }        
        catch(Exception $e) {
            echo 'Message: ' .$e->getMessage();
        }           
    }

    public function show_menu(Request $request) {
        try {
            $uuid = $request->route('uuid');  
            $menu = RestaurantMenu::where('uuid', $uuid)->firstOrFail();            
            return view('restaurant_menu', compact('menu')); 
        }        
        catch(Exception $e) {
            echo 'Message: ' .$e->getMessage();
        }          
    }

    public function show_menu_item(Request $request) {
        try {
            $uuid = $request->route('uuid');  
            $menu_item = RestaurantMenuItem::where('uuid', $uuid)->firstOrFail();            
            return view('restaurant_menu', compact('menu_item'));
        }        
        catch(Exception $e) {
            echo 'Message: ' .$e->getMessage();
        }              
    }

    public function show_table(Request $request) {
        try {
            $uuid = $request->route('uuid');  
            $table = RestaurantTable::where('uuid', $uuid)->firstOrFail();            
            return view('restaurant_table', compact('table'));
        }        
        catch(Exception $e) {
            echo 'Message: ' .$e->getMessage();
        }            
    }

    public function update_restaurant(Request $request) {}

    public function create_menus(Request $request) {}

    public function update_menus(Request $request) {}

    public function create_menu_item(Request $request) {}

    public function update_menu_item(Request $request) {}

    public function create_tables(Request $request) {}

    public function update_table(Request $request) {}

    public function show_reservations(Request $request) {}

    public function show_orders(Request $request) {}

    public function create_room(Request $request) {}

    public function get_rooms(Request $request) {}

    public function get_room(Request $request) {}

    public function update_room(Request $request) {}

    public function create_room_message(Request $request) {}

    public function create_voucher(Request $request) {}

    public function get_vouchers(Request $request) {}

    public function get_voucher(Request $request) {}

    public function update_voucher(Request $request) {}

    public function create_invoice(Request $request) {}

    public function get_invoices(Request $request) {}

    public function get_invoice(Request $request) {}

    public function update_invoice(Request $request) {}

    public function create_reservation(Request $request) {}

    public function get_reservations(Request $request) {}

    public function get_reservation(Request $request) {}

    public function update_reservation(Request $request) {}

    public function create_order(Request $request) {}

    public function get_orders(Request $request) {}

    public function get_order(Request $request) {}

    public function update_order(Request $request) {}

    public function create_order_item(Request $request) {}

    public function get_order_items(Request $request) {}

    public function get_order_item(Request $request) {}

    public function update_order_item(Request $request) {}

    public function create_review(Request $request) {}

    public function update_review(Request $request) {}

    public function create_review_response(Request $request) {}

    public function create_conversation(Request $request) {}

    public function get_conversations(Request $request) {}

    public function get_conversation(Request $request) {}

    public function update_conversation(Request $request) {}

    public function create_conversation_message(Request $request) {}

}
