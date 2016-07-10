<?php namespace App\Http\Controllers\Super\Hotels;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Entity\FacilityType;
use Illuminate\Http\Request;

class FacilityTypeController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$facilities = FacilityType::paginate(15);
		$action = 'v';
		return view('admin.hotels.template.facility-type', compact('facilities', 'action'));
	}

	/**
	 * Show the form for creating a new resource.
	 * @return Response
	 */
	public function create()
	{
		$action = 'c';
		$facilities = FacilityType::all();
		return view('admin.hotels.template.facility-type', compact('action', 'facilities'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{

		FacilityType::create($request->all());
		return redirect('admin/hotels/facility');
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
		$facilities = FacilityType::all();
		$facility= FacilityType::findOrFail($id);
		return view('admin.hotels.template.facility-type', compact('action', 'facilities', 'facility'));
	}

	/**
	 * Update the specified resource in storage.
	 * @param Request $request
	 * @param FacilityType $facility
	 * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
	 */
	public function update(Request $request, $facility)
	{

		$facility  = FacilityType::findOrFail($facility);
		$facility->update($request->all());
		return redirect('admin/hotels/facility');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		FacilityType::destroy($id);
		return redirect('admin/hotels/facility');
	}

}
