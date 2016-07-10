<?php namespace App\Http\Requests\Hotel;

use App\Http\Requests\Request;

class HotelBookingRequest extends Request {

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
            'special_requirements'=>'min:255',
            'hotel_id'=>'required|integer',
            'hotel_room_group_id'=>'required|integer',
            'rooms'=>'',
            'adults'=>'required|integer',
            'kids'=>'integer',
            'child_ages'=>'integer',
            'room_price'=>'integer',
            'date_from'=>'required|date',
            'date_to'=>'required|date',
            'pin_code'=>'',
            'booking_no'=>'required|unique:booking,booking_no',
            'status'=>'',
            'mail_sent'=>'',
            'other'=>''
		];
	}

}
