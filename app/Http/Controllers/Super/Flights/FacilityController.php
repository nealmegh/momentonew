<?php namespace App\Http\Controllers\Super\Flights;

use App\Entity\Flight\Flight;
use App\Entity\Flight\FlightFacility;
use App\Entity\FacilityType;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;
use Illuminate\Support\Facades\Redirect;

class FacilityController extends Controller {

	/**
	 * Display a listing of the resource.
	 * @return Response
	 */
	public function index(Request $request)
	{
		$action = 'c';

        $flight = Flight::findOrFail($request->flight);
        $facilities = FacilityType::all();
        return view('admin.flights.flight-feature', compact('action', 'flight'));
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		FlightFacility::create($request->all());
		return Redirect::back();
	}



	/**
	 * Show the form for editing the specified resource.
	 *
	 */
	public function edit(Request $request, $flightFacility)
	{
        $action = 'e';
        $flight = Flight::findOrFail($request->flight);
        $facilities = FacilityType::all();
        return view('admin.flights.flight-feature', compact('action', 'flight', 'facilities'));
	}

    /**
     * Update the specified resource in storage.
     */
	public function update($flightFacility, Request $request)
	{
	//dd($flightFacility);
        $flightFacility = FlightFacility::findOrFail($flightFacility);
       // dd($flightFacility);
        $flightFacility->update($request->all());
        return redirect('admin/flights/feature?flight='.$flightFacility->flight_id);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($request)
	{
		FlightFacility::destroy($request);
		Flash::success('Flight Facility Delete successfully!');
		return redirect()->back();
	}

}