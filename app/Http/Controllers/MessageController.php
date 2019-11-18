<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function message(Request $request){
		$user = Auth::User();
		return view('message',['user' => $user]);
	}
}
