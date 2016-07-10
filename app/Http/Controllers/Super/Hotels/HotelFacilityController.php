<?php namespace App\Http\Controllers\Super\Hotels;

use App\Entity\Hotel\Facility;
use App\Entity\Hotel\Hotel;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Entity\FacilityType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class HotelFacilityController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
        if ($request->has('hotel')) {
            $hotel = Hotel::findOrFail($request->get('hotel'));
            $hotelFacilities = $hotel->facilities;
            $facilitiesType = FacilityType::all();
            return view('admin.hotels.template.hotel-facility', compact( 'hotel', 'hotelFacilities', 'facilitiesType'));
        }
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
        $hotel = Hotel::findOrFail($request->hotel_id);
        foreach($hotel->facilities as $facility) {
             $facility->delete();
        }

        foreach($request->facility_id as $facilityType)
         {
             Facility::create(['hotel_id' => $request->hotel_id, 'facility_type_id' => $facilityType]);
         }

		return Redirect::back();
	}


}
