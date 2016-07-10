<?php namespace App\Http\Requests\Flights;

use App\Http\Requests\Request;

class FlightsRequest extends Request {

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
//			'title' => 'required',
//            'description' => 'required',
//            'short_description' => 'required|max: 150',
//            'location' => 'required',
//            'city' => 'required',
//            'country' => 'required',
//            'tour_date' => 'date',
//            'date_from' => 'date',
//            'date_to' => 'date',
//            'total_days' => 'required',
//            'price_per_adult' => 'required',
//            'price_per_child' => '',
//            'google_map' => ''

		];
	}

}