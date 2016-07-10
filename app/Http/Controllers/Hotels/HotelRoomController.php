<?php namespace App\Http\Controllers\Hotels;

use App\Entity\Hotel\Hotel;
use App\Entity\Hotel\Room\Room;
use App\Entity\Hotel\Room\RoomType;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class HotelRoomController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$hotelRooms = Room::all();
		$action = null;
		return view('admin.hotels.template.hotel-room', compact('hotelRooms', 'action'));
	}

	/**
	 * Show the form for creating a new resource.
	 * @return Response
	 */
	public function create()
	{
		$action = 'c';
		$hotelRooms = Room::all();
		$hotels = Hotel::all()->lists('name', 'id');
		$roomGroups = RoomType::all()->lists('name', 'id');
		return view('admin.hotels.template.hotel-room', compact('action', 'hotelRooms', 'hotels', 'roomGroups'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		Room::create($request->all());
		return redirect('admin/hotels/hotel-room');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$action = 'e';
		$roomGroups = Room::all();
		$roomGroup= Room::findOrFail($id);
		$hotels = Hotel::all()->lists('name', 'id');
		$roomTypes = RoomType::all()->lists('name', 'id');
		return view('admin.hotels.template.room-group', compact('action', 'roomGroups', 'roomGroup', 'hotels', 'roomTypes'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
