<?php namespace App\Http\Requests\Hotel\Room;

use App\Http\Requests\Request;

class RoomTypeRequest extends Request {

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
            'hotel_id'=>'required',
            'room_type'=>'required',
            'check_in_time'=>'',
            'check_out_time'=>'',
            'adult_allowed'=>'required',
            'child_allowed'=>'integer',
            'total_bed'=>'required|integer',
            'extra_bed'=>'integer',
            'extra_bed_charge'=>'integer',
            'price'=>'required|integer',
            'description'
		];
	}

}
