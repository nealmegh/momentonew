<?php namespace App\Http\Controllers\Super\Flights;

use App\Entity\Flight\Flight;
use App\Entity\FacilityType;
use App\Entity\Flight\FlightSchedule;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;
use Illuminate\Support\Facades\Redirect;

class ScheduleController extends Controller {

	/**
	 * Display a listing of the resource.
	 * @return Response
	 */
	public function index(Request $request)
	{
		$action = 'c';

        $flight = Flight::findOrFail($request->flight);
        return view('admin.flights.flight-schedule', compact('action', 'flight'));
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		FlightSchedule::create($request->all());
		return Redirect::back();
	}



	/**
	 * Show the form for editing the specified resource.
	 *
	 */
	public function edit(Request $request, $schedule)
	{
        $action = 'e';
        $flight = Flight::findOrFail($request->flight);
        return view('admin.flights.flight-schedule', compact('action', 'flight'));
	}

    /**
     * Update the specified resource in storage.
     */
	public function update($scheduleId, Request $request)
	{
	//dd($flightFacility);
        $schedule = FlightSchedule::findOrFail($scheduleId);
       // dd($flightFacility);
        $schedule->update($request->all());
        return redirect('admin/flights/schedule?flight='.$schedule->flight_id);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($request)
	{
		FlightSchedule::destroy($request);
		Flash::success('Flight Schedule Delete successfully!');
		return redirect()->back();
	}

}