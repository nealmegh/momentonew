<?php namespace App\Http\Requests\Agent;

use App\Http\Requests\Request;

class AgentHotelRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'user_id' => 'required',
            'hotel_id' => 'required|unique:agents,hotel_id'
		];
	}


}
