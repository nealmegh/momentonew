<?php namespace App\Http\Requests\Hotel\Room;

use App\Http\Requests\Request;

class RoomRequest extends Request {

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
            'date_from'=>'date|required',
            'date_to'=>'date|required',
            'hotel_id'=>'required',
            'hotel_room_group_id'=>'required',
            'total_available_room'=>'required|integer',
            'room_number'=>'integer',
            'price_per_room'=>'required|integer',
            'child_price'=>'integer',
            'other'=>''
		];
	}

}
