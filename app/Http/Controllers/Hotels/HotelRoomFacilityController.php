<?php namespace App\Http\Controllers\Hotels;


use App\Entity\Hotel\Room\RoomType;
use App\Entity\Hotel\Room\RoomGroupFacility;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Entity\FacilityType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class HotelRoomFacilityController extends Controller {


	public function index(Request $request)
	{

        $roomType = RoomType::findOrFail($request->hotel_room_group_id);
        $facilityTypes = FacilityType::all();

        return view('admin.hotels.template.hotel-room-facility', compact( 'roomType', 'facilityTypes'));
	}

	public function store(Request $request)
	{


        $roomType = RoomType::findOrFail($request->hotel_room_group_id);
        foreach($roomType->facilities as $facility) {
            $facility->delete();
        }

        foreach($request->facility_type_id as $facilityType)
        {
            RoomGroupFacility::create([ 'hotel_room_group_id' => $request->hotel_room_group_id , 'facility_type_id' => $facilityType]);
        }

        return Redirect::back();
	}



}
