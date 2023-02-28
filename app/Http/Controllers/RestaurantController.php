<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\Restaurant;
use Carbon\Carbon;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{

    public function api_create_restaurant(Request $request) {
        
        $restaurant = [];

        return response()->json([
            'data' => $restaurant,
            'api' => 'restaurant/create_restaurant',
            'ts' => Carbon::now()->timestamp
        ], 201);    

    }

    public function app_create_restaurant(Request $request) {
        $restaurant = Restaurant::create([

        ]);
        Alert::success('','');
        return back();
    }

    public function api_show_restaurants(Request $request) {

        $restaurants = [];

        return response()->json([
            'data' => $restaurants,
            'api' => 'restaurant/show_restaurants',
            'ts' => Carbon::now()->timestamp
        ], 200);

    }

    public function app_show_restaurants(Request $request) {
        $restaurants = Restaurant::all();
        return view('restaurant_list', compact('restaurants'));
    }    

    public function api_show_restaurant(Request $request) {

        $restaurant = [];

        return response()->json([
            'data' => $restaurant,
            'api' => 'restaurant/show_restaurant',
            'ts' => Carbon::now()->timestamp
        ], 200);

    }

    public function app_show_restaurant(Request $request) {
        $id = (int) $request->route('restaurant_id');  
        $restaurant = Restaurant::find($id);
        return view('restaurant_detail', compact('restaurant'));
    }       
    
    public function api_update_restaurant(Request $request) {

        $restaurant = [];

        return response()->json([
            'data' => $restaurant,
            'api' => 'restaurant/update_restaurant',
            'ts' => Carbon::now()->timestamp
        ], 204);

    }

    public function app_update_restaurant(Request $request) {
        $id = (int) $request->route('restaurant_id');  
        $restaurant = Restaurant::find($id);
        $restaurant->update([]);
        return back();
    }  




    public function api_create_food(Request $request) {

        $food = [];

        return response()->json([
            'data' => $food,
            'api' => 'restaurant/create_food',
            'ts' => Carbon::now()->timestamp
        ], 201);

    }

    public function app_create_food(Request $request) {
        $food = Food::create([

        ]);
        Alert::success('','');
        return back();
    }      

    public function api_show_foods(Request $request) {

        $foods = [];

        return response()->json([
            'data' => $foods,
            'api' => 'restaurant/show_foods',
            'ts' => Carbon::now()->timestamp
        ], 200);

    }       

    public function api_show_food(Request $request) {

        $food = [];

        return response()->json([
            'data' => $food,
            'api' => 'restaurant/show_food',
            'ts' => Carbon::now()->timestamp
        ], 200);

    }

    public function app_show_food(Request $request) {
        $id = (int) $request->route('food_id');  
        $food = Food::find($id);
        return view('food_detail', compact('food'));
    }       
    
    public function api_update_food(Request $request) {

        $food = [];

        return response()->json([
            'data' => $food,
            'api' => 'restaurant/update_food',
            'ts' => Carbon::now()->timestamp
        ], 201);        

    }

    public function api_upload_food_media(Request $request) {

        $food_media = [];

        return response()->json([
            'data' => $food_media,
            'api' => 'restaurant/upload_food_media',
            'ts' => Carbon::now()->timestamp
        ], 201);        

    }
}
