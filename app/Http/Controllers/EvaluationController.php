<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EvaluationController extends Controller
{
    public function store(Request $request)
	{
		$params = $request->validate([
			'evaluation_id' => 'required',
			'evaluationed_id' => 'required',
			'evaluation' => 'required',
		]);

		Post::create($params);

		return redirect()->route('detail');
	}
}
