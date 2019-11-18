<?php

namespace App\Http\Controllers;

use App\User;
use App\Connection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class DetailController extends Controller
{
    public function index(Request $request) {
		if($request->has('keyword')) {
            $users = User::where('name', 'like', '%'.$request->get('keyword').'%')->paginate(10);
        }
        else{
            $users = User::paginate(10);
        }
        $user = Auth::user();   #ログインユーザー情報を取得します。
        return view('detail',['user' => $user],['users' => $users]);
    }
	public function follow(Request $request) {
		$user = Auth::user();   #ログインユーザー情報を取得します。
		$connection = Connection::where('user_id', '=', $user->id)->with('users')->get();
		$connections = Connection::where('connection_user_id', '=', $user->id)->with('users')->get();
        return view('follow',['user' => $user],['connection' => $connection,'connections' => $connections]);
    }
	public function notice(Request $request) {
		$user = Auth::user();
		//$connections = DB::table('connections')->get();
		$connections = Connection::where('connection_user_id', '=', 3)->get();
        return view('notice',['connections' => $connections],['user' => $user]);
    }
	
	public function detail(User $user){
		$user = Auth::user();
		return view('detail', ['user' => $user]);        
   	}
}