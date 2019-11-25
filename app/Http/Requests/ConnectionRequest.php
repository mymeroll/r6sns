<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ConnectionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
	public function rules()
		{
			return [
				'user_id' => 'required|min:2',
			];
		/*	return [
				'hoge' => [
					'required',
					'string',
				],
				'table' => [
					'required',
					Rule::unique('users')
						->where('col1', $foo)
						->where('col2', $bar),
				],
			];*/
		}
}
