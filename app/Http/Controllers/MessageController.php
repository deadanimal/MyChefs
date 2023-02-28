<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use App\Models\Room;
use App\Models\RoomMessage;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function api_show_rooms(Request $request) {}

    public function api_show_room(Request $request) {}

    public function api_start_message(Request $request) {}

    public function api_send_message(Request $request) {}



    public function app_show_rooms(Request $request) {
        $rooms = Room::all();
        return view('room_list', compact('rooms'));
    }

    public function app_show_room(Request $request) {
        $id = (int) $request->route('room_id');  
        $room = Room::find($id);
        return view('room_detail', compact('room'));        
    }

    public function app_start_message(Request $request) {
        $user = $request->user();

        $restaurant = Restaurant::find($request->restaurant_id);    

        $room = Room::create([]);
        $room->users()->attach($user);
        $room->users()->attach($restaurant->user_id);
        
        return view('room_detail', compact('room'));    
    }

    public function app_send_message(Request $request) {
        $user = $request->user();

        $id = (int) $request->route('room_id');  
        $room = Room::find($id);
        
        RoomMessage::create([            
            'message' => $request->message,
            'room_id' => $room->id,
            'user_id' => $user->id,
        ]);
        return back();
    }
}
