<?php namespace App\Http\Controllers\Flights;

use App\Entity\Flight\Flight;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Entity\RatingType;
use App\Entity\Flight\FlightFacility;
use App\Http\Controllers\Controller;
use App\Http\Requests\Flights\FlightsRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Laracasts\Flash\Flash;
use Intervention\Image\Facades\Image;
use App\Images;
use App\Entity\Booking;
use App\Entity\Flight\FlightBooking;

class FlightsController extends Controller {

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('admin.flights.flight-index');
    }

    /**
     * Frontend Index page
     * by kabir
     */

    public function flights()
    {
        $flights = Flight::all();
        $featuredFlights = Flight::where('featured', 1)->take(3)->get();

        return view('flights.index', compact('flights', 'featuredFlights'));
    }

    public function manageFlight()
    {
        $flights = Flight::paginate(15);
        return view('admin.flights.flight-manage', compact('flights'));
    }

    /**
     * @param $tourID
     * @return \Illuminate\View\View
     * by Kabir
     */
    public function flightDetail($flightID)
    {
        $flight = Flight::find($flightID);
//        dd($flight->schedule);
        $logo = $flight->images()->where('type', '=', 'logo')->first();
        $gallery = $flight->images()->where('type', '=', 'gallery')->first();
        $ratingTypes = RatingType::all();
        return view('flights.template.flight-detail', compact('flight', 'ratingTypes', 'logo', 'gallery'));
    }


    public function create()
    {
        return view('admin.flights.create-flight');
    }

    /**
     * @param FlightsRequest $request
     * @return Redirect
     */
    public function store(FlightsRequest $request)
    {
//        dd($request->all());
        $flight = Flight::create($request->all());

        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $destinationPath = 'images/flights/logo/'.$flight->id;
            if (!file_exists('images/flights/logo/'.$flight->id)) {
                mkdir('images/flights/logo/'.$flight->id);
            }
            $filename = $file->getClientOriginalName();
            $galleryImage = Image::make($file)->fit(240, 150);
            $galleryImage->save($destinationPath.'/'.$filename);

            $flight->images()->create(['path' => $destinationPath,'name' => $filename, 'type' => 'logo']);
        } else {
            $destinationPath = 'images/flights/logo';
            $flight->images()->create(['path' => $destinationPath,'name' => 'no-image-flight.png', 'type' => 'logo']);
        }

        if ($request->hasFile('gallery')) {
            $file = $request->file('gallery');
            $destinationPath = 'images/flights/gallery/'.$flight->id;
            if (!file_exists('images/flights/gallery/'.$flight->id)) {
                mkdir('images/flights/gallery/'.$flight->id);
            }
            $filename = $file->getClientOriginalName();
            $galleryImage = Image::make($file)->fit(870, 495);
            $galleryImage->save($destinationPath.'/'.$filename);

            $flight->images()->create(['path' => $destinationPath,'name' => $filename, 'type' => 'gallery']);
        } else {
            $destinationPath = 'images/flights/gallery';
            $flight->images()->create(['path' => $destinationPath, 'name' => 'no-image-flight.png', 'type' => 'gallery']);
        }

        Flash::success('Flight Added Successfully!');
        return Redirect::back();
    }

    /**
     * Display the specified resource.
     * @param $tour_id
     * @return \Illuminate\View\View
     */
    public function show($flight_id)
    {
        $flight = Flight::findOrfail($flight_id);
        return view('admin.flights.detail', compact('flight'));
    }

    /**
     * Show the form for editing the specified resource
     * @param $tour_id
     * @return \Illuminate\View\View
     */
    public function edit($flight_id)
    {
        $flight = Flight::findOrfail($flight_id);
        return view('admin.flights.edit-flight', compact('flight'));
    }

    /**
     * Update the specified resource in storage.
     * @param FlightsRequest $request
     * @param $tour_id
     * @return Redirect
     */
    public function update(FlightsRequest $request, $flight_id)
    {
        $flight = Flight::findOrFail($flight_id);
        $flight->update($request->all());
        if( $flight->images == null || count($flight->images) <= 0) {
            $flight->images()->create(['path' => 'images/flights/logo','name' => 'no-image-flight.png', 'type' => 'logo']);
            $flight->images()->create(['path' => 'images/flights/gallery', 'name' => 'no-image-flight.png', 'type' => 'gallery']);
        }

        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $destinationPath = 'images/flights/logo/'.$flight->id;
            if (!file_exists('images/flights/logo/'.$flight->id)) {
                mkdir('images/flights/logo/'.$flight->id);
            }
            $filename = $file->getClientOriginalName();
            $galleryImage = Image::make($file)->fit(240, 150);
            $galleryImage->save($destinationPath.'/'.$filename);

            $flightImage = $flight->images()->where('type', '=', 'logo')->first();
            $flightImage->update(['path' => $destinationPath,'name' => $filename]);
        }

        if ($request->hasFile('gallery')) {
            $file = $request->file('gallery');
            $destinationPath = 'images/flights/gallery/'.$flight->id;
            if (!file_exists('images/flights/gallery/'.$flight->id)) {
                mkdir('images/flights/gallery/'.$flight->id);
            }
            $filename = $file->getClientOriginalName();
            $galleryImage = Image::make($file)->fit(870, 495);
            $galleryImage->save($destinationPath.'/'.$filename);

            $flightImage = $flight->images()->where('type', '=', 'gallery')->first();
            $flightImage->update(['path' => $destinationPath,'name' => $filename]);
        }



        Flash::success('Flight Update Successfully!');
        return Redirect::back();
    }

    /**
     * Remove the specified resource from storage.
     * @param $request
     * @return Redirect
     */
    public function destroy( $request )
    
    {
    	$flight = Flight::findOrFail($request);
        $flight->delete();
        
        Flash::success('Flight Deleted successfully!');
        return redirect('admin/flights/manage');
    }

    /**
     * @param Request $request
     * @return \Illuminate\View\View
     * @internal param Request $request
     */
    public function flightSearch(FlightsRequest $request, $option = 'all-flights')
    {
        if($option == 'all-flights') {
            $flights = Flight::paginate(10);
            return view('flights.template.flight-list-view', compact('flights'));
        }elseif($option == 'result') {
            $flights = Flight::where('passenger','=>', $request->adult)->orWhere('type', '=', $request->type)->paginate(10);
            return view('flights.template.flight-list-view', compact('flights'));
        }

    }

}