<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SearchController extends Controller
{
    public function index(){
		return view('search');
	}
	public function search(Request $request){
		$Authusers = Auth::user();   #ログインユーザー情報を取得します。
        if($request->has('keyword')) {
            $users = User::where('name', 'like', '%'.$request->get('keyword').'%')->paginate(10);
        }
        else{
            $users = User::paginate(10);
        }
        return view('search', ['users' => $users],['Authusers' => $Authusers]);
    }
	public function searchrank(Request $request){
		$Authusers = Auth::user();   #ログインユーザー情報を取得します。
        if($request->has('keywordrank')) {
            $users = User::where('rank', 'like', '%'.$request->get('keywordrank').'%')->paginate(10);
        }
        else{
            $users = User::paginate(10);
        }
        return view('search', ['users' => $users],['Authusers' => $Authusers]);
    }	
}
