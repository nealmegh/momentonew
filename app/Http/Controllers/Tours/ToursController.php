<?php namespace App\Http\Controllers\Tours;

use Illuminate\Pagination\LengthAwarePaginator;
use App\Entity\RatingType;
use App\Entity\Tour\TourFeature;
use App\Entity\Tour\Tour;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Tours\ToursRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Laracasts\Flash\Flash;
use Intervention\Image\Facades\Image;
use App\Images;
use App\Entity\Booking;
use App\Entity\Tour\TourBooking;

class ToursController extends Controller {

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('admin.tours.tour-index');
    }

    /**
     * Frontend Index page
     */

    public function tours()
    {
        $tours = Tour::where('status', 1)->get();
        //dd($tours);
        return view('tours.index', compact('tours'));
    }

    public function manageTour()
    {
        $tours = Tour::paginate(15);
        return view('admin.tours.tour-manage', compact('tours'));
    }

    public function tourDetail($tourID)
    {
        $tour = Tour::findOrFail($tourID);
        $randomTours = Tour::orderByRaw("RAND()")->take(3)->get();
        $ratingTypes = RatingType::all();
        return view('tours.template.tour-detail', compact('tour', 'ratingTypes', 'randomTours'));
    }


    public function create()
    {
        return view('admin.tours.create-tour');
    }

    /**
     * @param ToursRequest $request
     * @return Redirect
     */
    public function store(ToursRequest $request)
    {
        $tour = $request->except('tour_date', 'date_from', 'date_to');
//        $tour_date = date("Y-m-d", strtotime($request->tour_date));
        $date_from = date("Y-m-d", strtotime($request->date_from));
        $date_to = date("Y-m-d", strtotime($request->date_to));
//        $tour = array_add($tour, 'tour_date', $tour_date);
        $tour = array_add($tour, 'date_from', $date_from);
        $tour = array_add($tour, 'date_to', $date_to);
        Tour::create($tour);
        Flash::success('Tour Added Successfully!');
        return Redirect::back();
    }

    /**
     * Display the specified resource.
     * @param $tour_id
     * @return \Illuminate\View\View
     */
    public function show($tour_id)
    {
        $tour = Tour::findOrfail($tour_id);
        return view('admin.tours.detail', compact('tour'));
    }

    /**
     * Show the form for editing the specified resource
     * @param $tour_id
     * @return \Illuminate\View\View
     */
    public function edit($tour_id)
    {
        $tour = Tour::findOrfail($tour_id);
        return view('admin.tours.edit-tour', compact('tour'));
    }

    /**
     * Update the specified resource in storage.
     * @param ToursRequest $request
     * @param $tour_id
     * @return Redirect
     */
    public function update(ToursRequest $request, $tour_id)
    {
        $tourInput = $request->except('tour_date', 'date_from', 'date_to');
        $tour_date = date("Y-m-d", strtotime($request->tour_date));
        $date_from = date("Y-m-d", strtotime($request->date_from));
        $date_to = date("Y-m-d", strtotime($request->date_to));
        $tourInput = array_add($tourInput, 'tour_date', $tour_date);
        $tourInput = array_add($tourInput, 'date_from', $date_from);
        $tourInput = array_add($tourInput, 'date_to', $date_to);
        $tour = Tour::findOrFail($tour_id);
        $tour->update($tourInput);
        Flash::success('Tour Update Successfully!');
        return Redirect::back();
    }

    /**
     * Remove the specified resource from storage.
     * @param $request
     * @return Redirect
     */
    public function destroy( $request )
    
    {
    	$tour = Tour::findOrFail($request);
    	
    	$tourBookings = TourBooking::where('tour_id', '=', $tour->id);
    	
    	 foreach($tourBookings as $tourBooking)
        {
        
        $bookings = Booking::where('booking_no', '=', $tourBooking->booking_no);
        
        if($bookings->route == 'tour')
        {
     		 $bookings->delete();
        }
        }
      
        TourFeature::where('tour_id', '=', $request)->delete();
        
       foreach($tour->images as $image)
        {
        Images::destroy($image->id);
        if(file_exists($image->path.'/'.$image->name))
        {
        unlink($image->path.'/'.$image->name);
        }
        if(file_exists($image->path.'/thumbnail/'.$image->name))
        {
        unlink($image->path.'/thumbnail/'.$image->name);
        }
        }
        if (file_exists('images/tours/gallery/'.$tour->id.'/thumbnail')) {
        rmdir('images/tours/gallery/'.$tour->id.'/thumbnail');
        }
        if (file_exists('images/tours/gallery/'.$tour->id)) {
        rmdir('images/tours/gallery/'.$tour->id);
        }
        $tour->delete();
        
        Flash::success('Tour Deleted successfully!');
        return redirect('admin/tours/manage');
    }

    /**
     * @param Request $request
     * @return \Illuminate\View\View
     * @internal param Request $request
     */
    public function tourSearch(Request $request, $option = 'all-tours')
    {
        if($option == 'all-tours') {
            $type = $option;
            $tours = Tour::latest()->paginate(9);
            $ctours = Tour::all();
            //$hotels->appends( Input::get('searchable') );
            $count = 0;
            foreach($tours as $tour)
            {
                /**get average rate from room type and show 2 decimal point */

                $image = $tour->images()->where('type','=','gallery')->first();
                $tours[$count] = array_add($tours[$count], 'image', $image);
                $count++;
            }

            $currency_symbol = 'Tk.';
            $results = count($ctours);

            return view('tours.template.tour-grid-view', compact('tours', 'currency_symbol', 'type', 'results'));
        }elseif($option == 'result') {
            $type = $option;
            $placeOrHotel = Input::get('placeOrHotel');
            $allTours = Tour::where('name', 'LIKE', '%' . $placeOrHotel . '%')->orWhere('city', 'LIKE', '%' . $placeOrHotel . '%')->orWhere('location', 'LIKE', '%' . $placeOrHotel . '%')->get();
            $count = 0;
            $checkIn = date("Y-m-d", strtotime($request->get('date_from')));
            $checkOut = date("Y-m-d", strtotime($request->get('date_to')));
            $adult = $request->get('num_of_adult');
            $child = $request->get('num_of_child');
            $fromCheck = $request->get('date_from');
            $toCheck = $request->get('date_to');
            $currency_symbol = 'Tk.';

            $toursAvailable = null ;
            foreach ($allTours as $tour)
            {
                $image = $tour->images()->where('type', '=', 'gallery')->first();

                $allTours[$count] = array_add($allTours[$count], 'image', $image);
                $count++;
                if (!empty($fromCheck) || !empty($toCheck))
                {
                            if($tour->date_from == $checkIn || $tour->date_to == $checkOut)
                            {
                                $toursAvailable [] = $tour ;
                            }
                }
                else
                {
                    $toursAvailable [] = $tour ;
                }

            }

            $results = count($toursAvailable);

            $tours = null;
            if($toursAvailable != null)
            {
                $page = Input::get('page',1); // Get the current page or default to 1, this is what you miss!
                $perPage = 9;
                $offset = ($page * $perPage) - $perPage;

                $tours =  new LengthAwarePaginator(array_slice($toursAvailable, $offset, $perPage, true), count($toursAvailable), $perPage, $page, ['path' => $request->url(), 'query' => $request->query()]);

            }

            return view('tours.template.tour-grid-view', compact('tours', 'currency_symbol', 'type', 'results'));

        }



    }

}