<?php

namespace App\Http\Controllers;

use App\User;
use App\Connection;
use App\Comment;
use App\Evaluation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class DetailController extends Controller
{
    public function index(Request $request) {
		$connections = DB::table('connections')->get();
		$evaluation = DB::table('evaluations')->orderBy('evaluation', 'DESC')->take(1)->get();
		$a = DB::table('users')->get();
		if($request->has('keyword')) {
            $users = User::where('name', 'like', '%'.$request->get('keyword').'%')->paginate(10);
        }
        else{
            $users = User::paginate(10);
        }
        $user = Auth::user();   #ログインユーザー情報を取得します。
		function get_similairty($person1,$person2)
		{
			$set_person1 = DB::table('evaluations')->where('evaluation_id', '=',$person1)->get();
			$set_person2 = DB::table('evaluations')->where('evaluation_id', '=',$person2)->get();
			$set_both = set_person1.intersection(set_person2);	
		}
        return view('detail',['user' => $user,'users' => $users,'connections' => $connections, 'a'=> $a],['evaluation' => $evaluation]);
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
		$users = Auth::user();#ログインユーザー情報を取得します。
		$user = Auth::user();
		$Authusers = Auth::user(); 
		$users = User::where('id', '!=', $Authusers->id)->get();
		$connection = Connection::where('user_id', '=', $user->id)->with('user')->get();
		$connections = Connection::where('connection_user_id', '=', $user->id)->with('user')->get();
        return view('follow',['users' => $users],['user' => $user],['connection' => $connection],['connections' => $connections]);
    }
	public function notice(Request $request){
		$user = Auth::user();
		$connection = Connection::orwhere('connection_user_id', '=', $user->id)->where('notice', '=', 0)->with('user')->get();
		$connection2 = Connection::orwhere('connection_user_id', '=', $user->id)->where('notice', '=', 0)->with('user')->get();
		$comments = Comment::with('user')->get();
		//$connection->user_id = Auth::user()->id;
		//$connection->connection_user_id = $request->connection_user_id;
		//$connection->is_cheaked = false;
		//$connection->notice = false;
		return view('notice', ['user' => $user],['comments' => $comments],['connection' => $connection , 'connection2' => $connection2]);
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

		return view('profile-show', ['profile' => $profile],['user' => $user]);
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

		public function ev($user_id)
	{
		$user = Auth::user();
		$profile = User::findOrFail($user_id);

		return view('ev',['profile' => $profile],['user' => $user]);
	}
	public function evaluation_store(Request $request)
	{
		$user = Auth::user();
		//$evaluations = Evaluation::where('evaluation_id', '=', $user->id)->orwhere('evaluationed_id', '=', $profile->user_id);
		$connections = Connection::where('connection_user_id', '=', $user->id)->with('user')->get();
		$evaluation = new Evaluation();
		$evaluation->evaluation_id = Auth::user()->id;
		$evaluation->evaluationed_id = $request->evaluationed_id;
		$evaluation->evaluation = $request->evaluation;
		$evaluation->save();
		return redirect('/search');
	}
}