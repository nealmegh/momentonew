<?php namespace App\Http\Requests\Admin;

use App\Http\Requests\Request;

class CreateHotelManagerRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return \Auth::user()->userType->id == 1; //Admin only allowed to make the request
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'name' => 'required|min:3',
            'password' => 'required|min:8',
            'email'=> 'required|email|unique:users'
		];
	}

}
