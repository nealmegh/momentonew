<?php namespace App\Http\Requests\Hotel;

use App\Http\Requests\Request;

class CreateNewHotelRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
        //Admin, Agent and Manager only allowed to make the request
        return (\Auth::check() && \Auth::user()->userType->id <= 3);

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
            'category_id' => 'required|numeric',
            'grade_id' => 'required|numeric',
            'address' => 'required|min:10',
            'country' => 'required|min:2',
            'state' => 'min:2',
            'city' => 'required',
            'zip' => 'required|min:5|numeric',
            'email' => 'email',
            'fax' => '',
            'phone' => 'required|min:7',
            'cell' => 'required|min:10',
            'distance_from_airport' => 'required|numeric',
            'distance_from_market' => 'required|numeric',
            'pet_allowed' => 'required|numeric',
            'google_map' => 'required',
            'general_information' => '',
            'service_information' => '',
            'other_information' => '',
            'policy' => '',
            'terms' => '',
            'privacy' => '',
            'facilities' => 'array',
		];
	}

}
