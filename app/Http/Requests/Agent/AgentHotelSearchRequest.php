<?php namespace App\Http\Requests\Agent;

use App\Http\Requests\Request;

class AgentHotelSearchRequest extends Request {

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
			'placeOrHotel' => 'alpha',
            'date_from' => 'required',
            'date_to' => 'required',
            'num_of_adult' => 'required',
            'num_of_child' => '',
            'num_of_room' => 'required'
		];
	}

}
