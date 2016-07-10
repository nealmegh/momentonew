<?php namespace App\Http\Controllers\Super\Tours;

use App\Entity\Tour\Tour;
use App\Entity\Tour\TourFeature;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;
use Illuminate\Support\Facades\Redirect;

class FeatureController extends Controller {

	/**
	 * Display a listing of the resource.
	 * @return Response
	 */
	public function index(Request $request)
	{
		$action = 'c';
        $tour = Tour::findOrFail($request->tour);
		return view('admin.tours.tour-feature', compact('action', 'tour'));
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		TourFeature::create($request->all());
		return Redirect::back();
	}



	/**
	 * Show the form for editing the specified resource.
	 *
	 */
	public function edit(Request $request, $tourFeature)
	{
        $action = 'e';
        $tour = Tour::findOrFail($request->tour);
        $tourFeature = TourFeature::findOrFail($tourFeature);
        return view('admin.tours.tour-feature', compact('action', 'tour', 'tourFeature'));
	}

    /**
     * Update the specified resource in storage.
     */
	public function update($tourFeature, Request $request)
	{
	//dd($tourFeature);
        $tourFeature = TourFeature::findOrFail($tourFeature);
       // dd($tourFeature);
        $tourFeature->update($request->all());
        return redirect('admin/tours/feature?tour='.$tourFeature->tour_id);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($request)
	{
		TourFeature::destroy($request);
		Flash::success('Tour Feature Delete successfully!');
		return redirect()->back();
	}

}