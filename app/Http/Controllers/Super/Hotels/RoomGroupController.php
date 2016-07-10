<?php namespace App\Http\Controllers\Super\Hotels;


use App\Entity\FacilityType;
use App\Entity\Hotel\Room\RoomGroup;
use App\Entity\Hotel\Room\RoomType;
use App\Entity\Hotel\Hotel	;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class RoomGroupController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$roomGroups = RoomGroup::all();
		$action = null;
		return view('admin.hotels.template.room-group', compact('roomGroups', 'action'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$action = 'c';
		$roomGroups = RoomGroup::all();
		$hotels = Hotel::all()->lists('name', 'id');
		$roomTypes = RoomType::all()->lists('name', 'id');
        $facilitiesType = FacilityType::all();
		return view('admin.hotels.template.room-group', compact('action', 'roomGroups', 'hotels', 'roomTypes', 'facilitiesType'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		RoomGroup::create($request->all());
		return redirect('admin/hotels/room-group');
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
	 * @param $id
	 * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$action = 'e';
		$roomGroups = RoomGroup::all();
		$roomGroup= RoomGroup::findOrFail($id);
		$hotels = Hotel::all()->lists('name', 'id');
		$roomTypes = RoomType::all()->lists('name', 'id');
		return view('admin.hotels.template.room-group', compact('action', 'roomGroups', 'roomGroup', 'hotels', 'roomTypes'));
	}

	/**
	 * Update the specified resource in storage.
	 * @param Request $request
	 * @param $roomGroup
	 * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
	 */
	public function update(Request $request, $roomGroup)
	{
		$roomGroup  = RoomGroup::findOrFail($roomGroup);
		$roomGroup->update($request->all());
		return redirect('admin/hotels/room-group');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		RoomGroup::destroy($id);
		return redirect('admin/hotels/room-group');
	}

}
