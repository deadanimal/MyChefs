<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function app_show_home(Request $request) {
        return view('home');
    }
}
