<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->with('user')->get();
		$posts = Post::orderBy('created_at', 'desc')->paginate(10);
        return view('posts.index', ['posts' => $posts]);
    }
	public function create()
	{
		$user = Auth::user(); 
		return view('posts.create',['user' => $user]);
	}

	public function store(Request $request)
	{
		$params = $request->validate([
			'user_id' => 'required',
			'title' => 'required|max:50',
			'contents' => 'max:2000',
		]);

		Post::create($params);

		return redirect()->route('top');
	}
	public function show($post_id)
	{
		$user = Auth::user();
		$post = Post::findOrFail($post_id);

		return view('posts.show', ['post' => $post,],['user' => $user]);
	}
	public function edit($post_id)
	{
		$post = Post::findOrFail($post_id);

		return view('posts.edit', [
			'post' => $post,
		]);
	}
	public function update($post_id, Request $request)
	{
		$params = $request->validate([
			'title' => 'required|max:50',
			'contents' => 'required|max:2000',
		]);

		$post = Post::findOrFail($post_id);
		$post->fill($params)->save();

		return redirect()->route('posts.show', ['post' => $post]);
	}
	public function destroy($post_id)
	{
		$post = Post::findOrFail($post_id);

		\DB::transaction(function () use ($post) {
			$post->comments()->delete();
			$post->delete();
		});

		return redirect()->route('top');
	}
	public function searchpost(Request $request) {
		if($request->has('keyword')) {
            $posts = Post::where('title', 'like', '%'.$request->get('keyword').'%')->with('user')->paginate(10);
        }
        else{
            $users = Post::paginate(10);
        }
        $user = Auth::user();   #ログインユーザー情報を取得します。
        return view('posts.index',['user' => $user,'posts' => $posts]);
    }	
}