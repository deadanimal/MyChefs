<?php

use App\Http\Controllers\AdminRestaurantController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\WebRestaurantController;
use Illuminate\Support\Facades\Route;


Route::get('', [WebRestaurantController::class, 'show_home']);

Route::get('/terms', [SiteController::class, 'show_terms']);
Route::get('/privacy', [SiteController::class, 'show_privacy']);
Route::get('/about', [SiteController::class, 'show_about']);

Route::get('/restaurants', [WebRestaurantController::class, 'show_restaurants']);
Route::get('/restaurants/{uuid}', [WebRestaurantController::class, 'show_restaurant']);
Route::get('/restaurants/{uuid}/tables', [WebRestaurantController::class, 'show_tables']);
Route::get('/menus/{uuid}', [WebRestaurantController::class, 'show_menu']);
Route::get('/menu-items/{uuid}', [WebRestaurantController::class, 'show_menu_item']);
Route::get('/tables/{uuid}', [WebRestaurantController::class, 'show_table']);

Route::middleware('auth')->group(function () {

    # Restaurant Routes
 
    Route::put('/restaurants/{uuid}', [WebRestaurantController::class, 'update_restaurant']);
    Route::post('/restaurants/{uuid}/menus', [WebRestaurantController::class, 'create_menus']);
    Route::put('/menus/{uuid}', [WebRestaurantController::class, 'update_menus']);
    Route::post('/menu-items', [WebRestaurantController::class, 'create_menu_item']);
    Route::put('/menu-items/{uuid}', [WebRestaurantController::class, 'update_menu_item']);    
    Route::post('/restaurants/{uuid}/tables', [WebRestaurantController::class, 'create_tables']);    
    Route::put('/tables/{uuid}', [WebRestaurantController::class, 'update_table']);
    
    Route::get('/restaurants/{uuid}/reservations', [WebRestaurantController::class, 'show_reservations']);
    Route::get('/restaurants/{uuid}/orders', [WebRestaurantController::class, 'show_orders']);

    Route::post('/rooms', [WebRestaurantController::class, 'create_room']);
    Route::get('/rooms', [WebRestaurantController::class, 'get_rooms']);
    Route::get('/rooms/{uuid}', [WebRestaurantController::class, 'get_room']);
    Route::put('/rooms/{uuid}', [WebRestaurantController::class, 'update_room']);     
    Route::post('/rooms/{uuid}/message', [WebRestaurantController::class, 'create_room_message']);  
    
    Route::post('/vouchers', [WebRestaurantController::class, 'create_voucher']);
    Route::get('/vouchers', [WebRestaurantController::class, 'get_vouchers']);
    Route::get('/vouchers/{uuid}', [WebRestaurantController::class, 'get_voucher']);
    Route::put('/vouchers/{uuid}', [WebRestaurantController::class, 'update_voucher']);   
    
    Route::post('/invoices', [WebRestaurantController::class, 'create_invoice']);
    Route::get('/invoices', [WebRestaurantController::class, 'get_invoices']);
    Route::get('/invoices/{uuid}', [WebRestaurantController::class, 'get_invoice']);
    Route::put('/invoices/{uuid}', [WebRestaurantController::class, 'update_invoice']);  

    # User Routes

    Route::post('/reservations', [WebRestaurantController::class, 'create_reservation']);
    Route::get('/reservations', [WebRestaurantController::class, 'get_reservations']);
    Route::get('/reservations/{uuid}', [WebRestaurantController::class, 'get_reservation']);
    Route::put('/reservations/{uuid}', [WebRestaurantController::class, 'update_reservation']);

    Route::post('/orders', [WebRestaurantController::class, 'create_order']);
    Route::get('/orders', [WebRestaurantController::class, 'get_orders']);
    Route::get('/orders/{uuid}', [WebRestaurantController::class, 'get_order']);
    Route::put('/orders/{uuid}', [WebRestaurantController::class, 'update_order']);  
    
    Route::post('/order-items', [WebRestaurantController::class, 'create_order_item']);
    Route::get('/order-items', [WebRestaurantController::class, 'get_order_items']);
    Route::get('/order-items/{uuid}', [WebRestaurantController::class, 'get_order_item']);
    Route::put('/order-items/{uuid}', [WebRestaurantController::class, 'update_order_item']);     

    Route::post('/reviews', [WebRestaurantController::class, 'create_review']);
    Route::put('/reviews/{uuid}', [WebRestaurantController::class, 'update_review']);
    Route::post('/reviews/{uuid}/response', [WebRestaurantController::class, 'create_review_response']);
    
    Route::post('/conversations', [WebRestaurantController::class, 'create_conversation']);
    Route::get('/conversations', [WebRestaurantController::class, 'get_conversations']);
    Route::get('/conversations/{uuid}', [WebRestaurantController::class, 'get_conversation']);
    Route::put('/conversations/{uuid}', [WebRestaurantController::class, 'update_conversation']);     
    Route::post('/conversations/{uuid}/message', [WebRestaurantController::class, 'create_conversation_message']);
    
    
    Route::get('/home', [WebRestaurantController::class, 'show_second_home']);

});

Route::middleware('AdminAccess')->prefix('admin')->group(function () {

    Route::get('', [AdminRestaurantController::class, 'show_dashboard']);

});