<?php namespace App\Http\Requests\Tours;

use App\Http\Requests\Request;

class ToursRequest extends Request {

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
			'title' => 'required',
            'description' => 'required',
            'short_description' => 'required',
            'location' => 'required',
            'city' => 'required',
            'country' => 'required',
            'tour_date' => '',
            'date_from' => 'date',
            'date_to' => 'date',
            'total_days' => 'required',
            'price_per_adult' => 'required',
            'price_per_child' => '',
            'google_map' => ''

		];
	}

}