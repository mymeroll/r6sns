<?php

namespace App\Http\Controllers;

use App\User;
use App\Connection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ConnectionController extends Controller
{
	public function connection(Request $request){
		$user = Auth::user();
		$connection = new Connection();
		$connection->user_id = Auth::user()->id;
		$connection->connection_user_id = $request->connection_user_id;
		$connection->is_cheaked = false;
		$connection->notice = false;
		// インスタンスの状態をデータベースに書き込む
		$connection->save();
		//「投稿する」をクリックしたら投稿情報表示ページへリダイレクト 
		//return redirect()->route('posts.detail', [
          // 'id' => $post->id,
        //]);
		return redirect()->route('detail', ['connection_user_id' => $connection->connection_user_id]);
	}
}
