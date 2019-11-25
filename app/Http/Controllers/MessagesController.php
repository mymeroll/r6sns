<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Http\Requests\MessageRequest;
use App\Message;
use App\Conversation;
use Validator;
use Auth;
 
class MessagesController extends Controller
{
    public function index()
    {   
		$user = Auth::user(); 
        return view('message',['user' => $user,]);
    }	
}