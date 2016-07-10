<?php namespace App\Http\Controllers\Super\Cars;

use App\Entity\Car\Car;
use App\Entity\Car\CarFacility;
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
        $car = Car::findOrFail($request->car);
        $facilities = FacilityType::all();
        return view('admin.cars.car-feature', compact('action', 'car'));
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{

		CarFacility::create($request->all());
		return Redirect::back();
	}



	/**
	 * Show the form for editing the specified resource.
	 *
	 */
	public function edit(Request $request, $carFacility)
	{
        $action = 'e';
        $car = Car::findOrFail($request->car);
        $facilities = FacilityType::all();
        return view('admin.cars.car-feature', compact('action', 'car', 'facilities'));
	}

    /**
     * Update the specified resource in storage.
     */
	public function update($carFacility, Request $request)
	{
	//dd($carFacility);
        $carFacility = CarFacility::findOrFail($carFacility);
       // dd($carFacility);
        $carFacility->update($request->all());
        return redirect('admin/cars/feature?car='.$carFacility->car_id);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($request)
	{
		CarFacility::destroy($request);
		Flash::success('Car Facility Delete successfully!');
		return redirect()->back();
	}

}