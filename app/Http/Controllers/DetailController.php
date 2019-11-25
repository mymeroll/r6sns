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
		$connections = DB::table('connections')->get();
		if($request->has('keyword')) {
            $users = User::where('name', 'like', '%'.$request->get('keyword').'%')->paginate(10);
        }
        else{
            $users = User::paginate(10);
        }
        $user = Auth::user();   #ログインユーザー情報を取得します。
        return view('detail',['user' => $user,'users' => $users,'connections' => $connections]);
    }
    public function searchuser(Request $request) {
		$connections = DB::table('connections')->get();
		if($request->has('keyword')) {
            $users = User::where('name', 'like', '%'.$request->get('keyword').'%')->paginate(10);
        }
        else{
            $users = User::paginate(10);
        }
        $user = Auth::user();   #ログインユーザー情報を取得します。
        return view('search-user',['user' => $user,'users' => $users,'connections' => $connections]);
    }	
	public function follow(Request $request) {
		$user = Auth::user();   #ログインユーザー情報を取得します。
		$connection = Connection::where('user_id', '=', $user->id)->with('user')->get();
		$connections = Connection::where('connection_user_id', '=', $user->id)->with('user')->get();
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
	public function edit(Request $request)
	{
		$user = Auth::user();
		return view('detail-edit', [
			'user' => $user,
		]);
	}
	public function show($user_id)
	{
		$user = Auth::user();
		$profile = User::findOrFail($user_id);

		return view('profile-show', ['profile' => $profile,],['user' => $user]);
	}
	public function update(Request $request)
	{
		$param = [
			'name' => $request->name,
			'rank' => $request->rank,
			'password' => $request->password,
			'profile' => $request->profile,
		];
		$user = Auth::user();
		DB::table('users')->where('id', '=', $user->id)->update($param);
		return redirect('/detail');
	}
}