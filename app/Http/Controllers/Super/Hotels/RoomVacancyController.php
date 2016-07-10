<?php namespace App\Http\Controllers\Super\Hotels;

use App\Entity\Hotel\Hotel;
use App\Entity\Hotel\Room\Room;
use App\Entity\Hotel\Room\RoomType;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\Hotel\Room\RoomRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class RoomVacancyController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
        if($request->has('hotel')) {
            $hotelID = $request->get('hotel');
            $hotelVacancies = Room::where('hotel_id', '=' , $hotelID)->get();
            $hotel = Hotel::findOrFail($hotelID);
        }else {
            $hotelVacancies = Room::all();
            $hotel = 'All';
        }

        $action = 'v';
		return view('admin.hotels.template.hotel-vacancy', compact('hotelVacancies', 'hotel' , 'action'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create(Request $request)
	{
		$action = 'c';
        $hotelID = $request->get('hotel');
        $roomTypeID = $request->get('roomType');
        $hotelVacancies = Room::where('hotel_id', '=' , $hotelID)->get();
        $hotel = Hotel::findOrFail($hotelID);
        $roomTypes = RoomType::where('hotel_id', '=', $hotelID)->lists( 'room_type', 'id');
		return view('admin.hotels.template.hotel-vacancy', compact('action', 'hotelVacancies', 'roomTypes', 'hotel'));
	}

    /**
     * Store a newly created resource in storage.
     * @param RoomRequest $request
     * @return Redirect
     */
	public function store(RoomRequest $request)
	{
        $roomVacancy = $request->except('date_from', 'date_to');
        $roomVacancy['date_from'] = date("Y-m-d", strtotime($request->date_from));
        $roomVacancy['date_to'] = date("Y-m-d", strtotime($request->date_to));
        $room = Room::create($roomVacancy);
		return redirect('admin/hotels/vacancy?hotel='.$room->hotel->id);
	}

	/**
	 * Display the specified resource.
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * @param $id
	 * @return \Illuminate\View\View
	 */
	public function edit($id, Request $request)
	{
		$action = 'e';
        $hotelID = $request->get('hotel');
        $hotelVacancies = Room::all();
		$hotelVacancy= Room::findOrFail($id);
        $hotel = Hotel::findOrFail($hotelID);
        $roomTypeID = $request->get('roomType');
        $roomTypes = RoomType::where('id', '=', $roomTypeID)->lists('room_type', 'id');

      //dd($roomTypes);
		return view('admin.hotels.template.hotel-vacancy', compact('action', 'hotelVacancies', 'hotelVacancy', 'hotel', 'roomTypes'));
	}

	/**
	 * Update the specified resource in storage.
	 * @param Request $request
	 * @param $hotelVacancy
	 * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
	 */
	public function update(Request $request, $hotelVacancy)
	{
        $roomVacancy = $request->except('date_from', 'date_to');
        $roomVacancy['date_from'] = date("Y-m-d", strtotime($request->date_from));
        $roomVacancy['date_to'] = date("Y-m-d", strtotime($request->date_to));
		$hotelVacancy  = Room::findOrFail($hotelVacancy);
		$hotelVacancy->update($roomVacancy);
		return Redirect::back();
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$room = Room::findOrFail($id);
        //dd($room);
        $room->delete();
		return redirect('admin/hotels/vacancy?hotel='.$room->hotel->id);
	}

}
