<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\TokenEvent;
use App\Models\User;
use App\Models\UserRole;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Throwable;

class ProfileController extends Controller
{
    
    public function api_register(Request $request) {

        try {

            $data = $request->validate([
                'name' => 'required|string',
                'email' => 'required|string|unique:users,email',
                'password' => 'required|string|confirmed',
                'user_role' => 'required|string',
            ]);
    
            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => bcrypt($data['password'])
            ]);

            if($request->user_role == 'staff') {
                $role = Role::find(1);
            } else if ($request->user_role == 'restaurant') {
                $role = Role::find(2);
            } else {
                $role = Role::find(3);
            }

            $user->roles()->attach($role);
    
            $token = $user->createToken('apiToken')->plainTextToken;
    
            $registration = [
                'user' => $user,
                'token' => $token
            ];

            return response()->json([
                'data' => $registration,
                'api' => 'profile/register',
                'ts' => Carbon::now()->timestamp
            ], 201);  

        } catch (Throwable $error_message) {
            report($error_message);
     
            return response()->json([
                'error' => $error_message,
                'api' => 'profile/register',
                'ts' => Carbon::now()->timestamp
            ], 500);  
        }
        
    }

    public function api_create_token(Request $request) {

        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'device_name' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();


        if (!$user || !Hash::check($request->password, $user->password)) {

            return response()->json([
                'error' => 'Credentials provided is incorrect',
                'api' => 'profile/create_token',
                'ts' => Carbon::now()->timestamp
            ], 401);            
        }

        return response()->json([
            'token' => $user->createToken($request->device_name)->plainTextToken,
            'api' => 'profile/create_token',
            'ts' => Carbon::now()->timestamp
        ], 201);              
    }

    public function api_update_profile(Request $request) {}

    public function api_update_picture(Request $request) {}



    public function app_add_role(Request $request) {
        UserRole::create([
            'user_id' => $request->user_id,
            'role_id' => $request->role_id,
        ]);
        Alert::success('','');
        return back();
    }

    public function app_remove_role(Request $request) {}

    public function app_add_group(Request $request) {}

    public function app_remove_group(Request $request) {}    

    public function api_reload_token(Request $request) {
        $token_event = TokenEvent::create([
            'model' => $request->model,
            'model_id' => $request->model_id,
            'event' => 'reload',
            'amount' => $request->amount,
            'product' => 'reload'
        ]);

    }

    public function api_utilise_token(Request $request) {
        $token_event = TokenEvent::create([
            'model' => $request->model,
            'model_id' => $request->model_id,            
            'event' => 'utilisation',
            'amount' => $request->amount,
            'product' => ''
        ]);        
    }

    public function update_device_id() {}

    public function pair_user_to_device() {}

    public function login_via_passwordless() {}
}
