<?php

namespace App\Http\Controllers;

use App\User;
use App\Follower;
use App\Connection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ConnectionRequest;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ConnectionController extends Controller
{
	public function connection(Request $request){	
		$user = Auth::user();
		$connection = new Connection();
		$connection->user_id = Auth::user()->id;
		$connection->connection_user_id = $request->connection_user_id;
		$connection->is_checked = false;
		$connection->notice = false;
		// インスタンスの状態をデータベースに書き込む
		$connection->save();
		//「投稿する」をクリックしたら投稿情報表示ページへリダイレクト 
		//return redirect()->route('posts.detail', [
          // 'id' => $post->id,
        //]);
		$validate_rule = [
			'connection_user_id' => 'email',	
		];
		$this->valiate($request,$validate_rule);	
		return redirect()->route('detail', ['connection_user_id' => $connection->connection_user_id]);
	}
	public function notice(Request $request){
		$user = Auth::user();
		$connection = Connection::orwhere('connection_user_id', '=', $user->id)->where('notice', '=', 0)->with('user')->get();
		$connection2 = Connection::orwhere('connection_user_id', '=', $user->id)->where('notice', '=', 0)->with('user')->get();
		//$connection->user_id = Auth::user()->id;
		//$connection->connection_user_id = $request->connection_user_id;
		//$connection->is_cheaked = false;
		//$connection->notice = false;
		return view('notice', ['user' => $user],['connection' => $connection , 'connection2' => $connection2]);
	}
	public function update(Request $request)
	{
		$param = [
			'user_id' => $request->user_id,
			'connection_user_id' => $request->connection_user_id,
			'is_checked' => $request->is_checked,
			'notice' => $request->notice,
		];
		$user = Auth::user();
		DB::table('connections')->where('user_id', '=', $request->user_id)->where('connection_user_id', '=', $user->id)->update($param);
		return redirect('/notice');
	}	
	 public function follow(User $user)
    {
        $follower = auth()->user();
        // フォローしているか
        $is_following = $follower->isFollowing($user->id);
        if(!$is_following) {
            // フォローしていなければフォローする
            $follower->follow($user->id);
            return back();
        }
    }

    // フォロー解除
    public function unfollow(User $user)
    {
        $follower = auth()->user();
        // フォローしているか
        $is_following = $follower->isFollowing($user->id);
        if($is_following) {
            // フォローしていればフォローを解除する
            $follower->unfollow($user->id);
            return back();
        }
    }
	 public function evaluation(User $user)
    {
        $evaluater = auth()->user();
        // フォローしているか
        $is_evaluation = $evaluater->isEvaluation($user->id);
		 
        if(!$is_evaluation) {
            // フォローしていなければフォローする
            $evaluater->evaluation($user->id);
            return back();
        }
    }

    // フォロー解除
    public function unevaluation(User $user)
    {
        $evaluater = auth()->user();
        // フォローしているか
        $is_evaluation = $evaluater->isEvaluation($user->id);
        if($is_evaluation) {
            // フォローしていればフォローを解除する
            $evaluater->unevaluation($user->id);
            return back();
        }
    }	
}
