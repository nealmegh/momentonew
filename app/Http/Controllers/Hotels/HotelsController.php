<?php namespace App\Http\Controllers\Hotels;

use App\Entity\Booking;
use App\Entity\FacilityType;
use App\Entity\Hotel\Hotel;
use App\Entity\Hotel\Category;
use App\Entity\Hotel\Grade;
use App\Entity\Hotel\Room\RoomType;
use App\Entity\RatingType;
use App\Http\Controllers\Controller;
use App\Http\Requests\HotelRequest;
use App\Services\Pagination;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\PaginationServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Laracasts\Flash\Flash;
use Intervention\Image\Facades\Image;
use App\Entity\Hotel\Room\Room;
use App\Entity\Hotel\HotelBooking;
use App\Images;



class HotelsController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $hotels = Hotel::all();
        $bookings = Booking::where('route', '=', 'hotel')->get();
      // dd($bookings);
        return view('admin.hotels.template.hotel-index', compact('hotels', 'bookings'));
    }

    public function hotel()
    {
        $hotels = Hotel::where('status', 1)->get();

        $count = 0;
        foreach($hotels as $hotel)
        {
            /**get average rate from room type and show 2 decimal point */
            $avg = number_format($hotel->roomTypes()->min('price'), 2);
            $image = $hotel->images()->where('type','=','gallery')->first();
            $hotels[$count] = array_add($hotels[$count], 'avg', $avg);
            $hotels[$count] = array_add($hotels[$count], 'image', $image);
            $count++;
        }
        //dd($hotels[0]->image->path);
        $currency_symbol = 'Tk.';
        return view('hotels.index', compact('hotels', 'currency_symbol'));
    }


    public function manageHotel()
    {
        $hotels = Hotel::where('status', 1)->paginate(15);

        return view('admin.hotels.template.manage-hotel',  compact('hotels'));
    }


    public function hotelDetail($hotelID, Request $request)
    {
        /**
         * Rating Type for review
         */
        $ratingTypes = RatingType::all();

        if($request->get('search') == 'room')
        {
            $hotel = Hotel::findOrfail($hotelID);

            $availableRoomType = RoomType::where('hotel_id', $hotelID)->get();
            $gallery = $hotel->images()->where('type','gallery')->get();
            $logo = $hotel->images()->where('type','logo')->get();
            $avg = number_format($hotel->roomTypes()->min('price'), 2);


            $checkIn =  date('Y-m-d', strtotime($request->date_from));
            $checkOut =  date('Y-m-d', strtotime($request->date_to));
            $adult = Input::get('num_of_adult');
            $child = Input::get('num_of_child');
            $totalRoom = Input::get('num_of_room');
            $diff = date_diff(date_create($request->date_from), date_create($request->date_to));
            $dayCount = $diff->format("%a");
            $checkDay = ['checkIn' => $checkIn, 'checkOut' => $checkOut, 'adult' => $adult, 'child' => $child];
            $availableRooms=[];
//            $dates = array($checkIn);
//            while ($checkIn!= $checkOut) {
//                $checkIn = date('Y-m-d', strtotime($checkIn . ' +1 day'));
//                $dates[] = $checkIn;
//                $dayCount++;
//            }
//            echo $checkIn.' '.$checkOut;
//            $roomAvailableBaseOnDate = $hotel->rooms()->where('date_from','<=', $checkIn)->where('date_to', '>=', $checkOut)->where('total_available_room', '>=', $totalRoom)->get();
            $roomAvailableBaseOnDate = $hotel->rooms()->where('date_from','<=', $checkIn)->where('date_to', '>=', $checkOut)->get();

//            dd($roomAvailableBaseOnDate);
            $roomTypeStatus = null;
            if(! $roomAvailableBaseOnDate->isEmpty() )
            {

                foreach($roomAvailableBaseOnDate as $rooms) {

                    $totalAvailableDay = $rooms->total_available_room;

                    $roomTypes[$rooms->hotel_room_group_id] = $rooms->roomType()->where('adult_allowed', '>=', $adult)->where('child_allowed', '>=', $child)->get();
                    // echo $roomTypes[$rooms->hotel_room_group_id];
                    foreach($roomTypes[$rooms->hotel_room_group_id] as $roomType)
                    {

                        $booking = $roomType->booking()
                            ->whereBetween('date_from', [$checkIn, $checkOut])
                            ->orWhere(function($query)
                            {
                                $checkIn =  date("Y-m-d", strtotime(Input::get('date_from')));
                                $checkOut =  date("Y-m-d", strtotime(Input::get('date_to')));
                                $query->whereBetween('date_to', [$checkIn, $checkOut])
                                    ->orWhere(function($query){
                                        $checkIn =  date("Y-m-d", strtotime(Input::get('date_from')));
                                        $checkOut =  date("Y-m-d", strtotime(Input::get('date_to')));
                                        $query->where('date_from','>', $checkIn)
                                            ->where('date_to','<', $checkOut);
                                    });

                            })->get();
                        if($booking->count() < $totalAvailableDay )
                        {
                            /* Set Available room price info */
                            $roomTypeStatus[$rooms->hotel_room_group_id] = 't';
                            $roomTypePrice[$rooms->hotel_room_group_id] = $rooms->price_per_room ;
                            $availableRooms[] = $rooms->hotel_room_group_id;
//                              $roomTypeStatus = array_add($roomTypeStatus, $rooms->hotel_room_group_id, 't' );
                        }

                    }


                }
//                 dd($availableRooms);
               $unavailableRooms = $hotel->roomTypes()->whereNotIn('id', $availableRooms)->get();
                foreach($unavailableRooms as $unavailableRoom) {
                     $roomTypeStatus[$unavailableRoom->id] = 'f';
                }

            }else
            {
                $unavailableRooms = $hotel->roomTypes()->whereNotIn('id', $availableRooms)->get();
                foreach($unavailableRooms as $unavailableRoom) {
                    $roomTypeStatus[$unavailableRoom->id] = 'f';
                }
            }
            /**
             * similar hotel listings
             */
            $similar_hotels = Hotel::where('status', 1)->where('city', '=', $hotel->city)->where('id', '!=', $hotel->id)->Limit(3)->get();
            return view('hotels.template.hotel-detail', compact('hotel', 'roomTypeStatus', 'availableRoomType', 'gallery', 'logo', 'galleryThumb', 'avg', 'roomTypePrice', 'dayCount', 'totalRoom', 'checkDay', 'similar_hotels', 'ratingTypes'));
        }else
        {
            $hotel = Hotel::findOrfail($hotelID);
           // $roomAvailable = [];
            $availableRoomType = RoomType::where('hotel_id', $hotelID)->get();
            $gallery = $hotel->images()->where('type','gallery')->get();
            $logo = $hotel->images()->where('type','logo')->get();
            $avg = number_format($hotel->roomTypes()->min('price'), 2);
            foreach($availableRoomType as $roomType) {
                $roomTypeStatus[$roomType->id] = 'n';
            }
            /**
             * similar hotel listings
             */
            $similar_hotels = Hotel::where('status', 1)->where('city', '=', $hotel->city)->where('id', '!=', $hotel->id)->Limit(3)->get();

            return view('hotels.template.hotel-detail', compact('hotel', 'roomTypeStatus', 'availableRoomType', 'gallery', 'logo', 'galleryThumb', 'avg', 'similar_hotels', 'ratingTypes'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $hotel_category = Category::all()->lists('name', 'id');
        $hotel_grade = Grade::all()->lists('name','id');
        $hotel_facility = FacilityType::all();
        return view('admin.hotels.template.add-hotel', compact('hotel_category','hotel_grade', 'hotel_facility'));
    }

    /**
     * Store a newly created resource in storage.
     * @param HotelsRequestRequest|HotelRequest $request
     * @return Response
     */
    public function store(HotelRequest $request)
    {
        $hotel = Hotel::create($request->except('logo'));

        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $destinationPath = 'images/hotels/logo/'.$hotel->id;
            if (!file_exists('images/hotels/logo/'.$hotel->id)) {
                mkdir('images/hotels/logo/'.$hotel->id);
            }
            $filename = $file->getClientOriginalName();
            $galleryImage = Image::make($file)->fit(240, 150);
            $galleryImage->save($destinationPath.'/'.$filename);

            $hotel->images()->create(['path' => $destinationPath,'name' => $filename, 'type' => 'logo']);
        } else {
            $destinationPath = 'images/hotels';
            $hotel->images()->create(['path' => $destinationPath,'name' => 'no-image.png', 'type' => 'logo']);
        }


        Flash::success('Hotel added Successfully!');
        return redirect('admin/hotels/manage');
    }

    /**
     * Display the specified resource.
     * @param Hotel $hotel
     * @return \Illuminate\View\View
     */
    public function show($hotel)
    {
        $hotel = Hotel::findOrfail($hotel);

        if (Request::is('admin/*')) {
            return view('admin.hotels.template.detail', compact('hotel'));
        }

        if (Request::is('agents/*')) {
            return view('admin.agents.detail', compact('hotel'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     * @param $hotel
     * @return \Illuminate\View\View
     * @internal param Hotel $hotel
     */
    public function edit($hotel)
    {
        $hotel = Hotel::findOrfail($hotel);
        $hotel_category = Category::all()->lists('name', 'id');
        $hotel_grade = Grade::all()->lists('name','id');
        $hotel_facility = FacilityType::all();
        
        return view('admin.hotels.template.edit-hotel', compact('hotel', 'hotel_category','hotel_grade', 'hotel_facility'));
    }

    /**
     * Update the specified resource in storage.
     * @param HotelRequest $request
     * @param $id
     * @return Redirect
     */
    public function update(HotelRequest $request, $id)
    {
        $hotel = Hotel::findOrFail($id);
        $hotel->update($request->except('logo'));
        $logo = $hotel->images()->where('type', '=', 'logo')->get();
        $count = count($logo);
       // dd($count);
	if($count>0)
	{
	
        if (file_exists($logo[0]->path . '/' . $logo[0]->name)) {
            unlink($logo[0]->path . '/' . $logo[0]->name);
        }
        }
        
        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $destinationPath = $logo[0]->path;
            if (!file_exists('images/hotels/logo/'.$hotel->id)) {
                mkdir('images/hotels/logo/'.$hotel->id);
            }
            $filename = $file->getClientOriginalName();
            $galleryImage = Image::make($file)->widen(200);
            $galleryImage->save($destinationPath.'/'.$filename);
            $hotel->images()->where('id','=', $logo[0]->id)->update(['path' => $destinationPath, 'name' => $filename, 'type' => 'logo']);
        }
        return redirect('admin/hotels/manage');
    }

    /**
     * Remove the specified resource from storage.
     * @param $request
     * @return Redirect
     */
    public function destroy( $request )
    {
        $hotel = Hotel::findOrFail($request);
        $hotel->delete();
     
        
        Flash::success('Hotel Delete successfully!');
        return redirect('admin/hotels/manage');
    }

    /**
     * @return \Illuminate\View\View
     * @internal param Request $request
     */
    public function hotelSearch(Request $request, $option = 'all-hotels')
    {
        if($option == 'all-hotels') {
            $type = $option;
            $hotels = Hotel::where('status', 1)->latest()->paginate(9);
            $chotels = Hotel::where('status', 1)->get();
            //$hotels->appends( Input::get('searchable') );
            $count = 0;
            foreach($hotels as $hotel)
            {
                /**get average rate from room type and show 2 decimal point */
                $avg = number_format($hotel->roomTypes()->avg('price'), 2);
                $image = $hotel->images()->where('type','=','gallery')->first();
                $hotels[$count] = array_add($hotels[$count], 'avg', $avg);
                $hotels[$count] = array_add($hotels[$count], 'image', $image);
                $count++;
            }
            //dd($hotels[0]->image->path);
            $currency_symbol = 'Tk.';
            $results = count($chotels);
            $hotels_p = $hotels;

            return view('hotels.template.hotel-view', compact('hotels_p', 'currency_symbol', 'type', 'results'));
        }elseif($option == 'result') {
            $type = $option;
            $placeOrHotel = Input::get('placeOrHotel');
            $allHotels = Hotel::where('name', 'LIKE', '%' . $placeOrHotel . '%')->orWhere('city', 'LIKE', '%' . $placeOrHotel . '%')->get();
            $count = 0;
            $checkIn = date("Y-m-d", strtotime($request->get('date_from')));
            $checkOut = date("Y-m-d", strtotime($request->get('date_to')));
            $adult = $request->get('num_of_adult');
            $child = $request->get('num_of_child');
            $totalRoom = $request->get('num_of_room');
            $currency_symbol = 'Tk.';

            $dayCount = 1;
            $checkDay = ['checkIn' => $checkIn, 'checkOut' => $checkOut, 'adult' => $adult, 'child' => $child];
            $availableRooms = [];

//            $dates = array($checkIn);
//            while ($checkIn != $checkOut) {
//                $checkIn = date('Y-m-d', strtotime($checkIn . ' +1 day'));
//                $dates[] = $checkIn;
//                $dayCount++;
//            }

            $hotels = '';
            foreach ($allHotels as $hotel) {

                $hotelRoomAvailable = "";
                $availableRoomType = RoomType::where('hotel_id', $hotel->id)->get();
                $roomAvailableBaseOnDate = $hotel->rooms()->where('date_from', '<=', $checkIn)->where('date_to', '>=', $checkOut)->get();


                /**get average rate from room type and show 2 decimal point */
                $avg = number_format($hotel->roomTypes()->avg('price'), 2);
                $image = $hotel->images()->where('type', '=', 'gallery')->first();
                $allHotels[$count] = array_add($allHotels[$count], 'avg', $avg);
                $allHotels[$count] = array_add($allHotels[$count], 'image', $image);
                $count++;

                $roomAvailableBaseOnDate = $hotel->rooms()->where('date_from', '<=', $checkIn)->where('date_to', '>=', $checkOut)->where('total_available_room', '>=', $totalRoom)->get();
                if (!$roomAvailableBaseOnDate->isEmpty()) {
                    foreach ($roomAvailableBaseOnDate as $rooms) {
                        $totalAvailableRoom = $rooms->total_available_room;
                        $roomTypes[$rooms->hotel_room_group_id] = $rooms->roomType()->where('adult_allowed', '>=', $adult)->where('child_allowed', '>=', $child)->get();
                        // echo $roomTypes[$rooms->hotel_room_group_id];

                            foreach ($roomTypes[$rooms->hotel_room_group_id] as $roomType) {

                                $booking = $roomType->booking()
                                    ->whereBetween('date_from', [$checkIn, $checkOut])
                                    ->orWhere(function ($query) {
                                        $checkIn = date("Y-m-d", strtotime(Input::get('date_from')));
                                        $checkOut = date("Y-m-d", strtotime(Input::get('date_to')));
                                        $query->whereBetween('date_to', [$checkIn, $checkOut])
                                            ->orWhere(function ($query) {
                                                $checkIn = date("Y-m-d", strtotime(Input::get('date_from')));
                                                $checkOut = date("Y-m-d", strtotime(Input::get('date_to')));
                                                $query->where('date_from', '>', $checkIn)
                                                    ->where('date_to', '<', $checkOut);
                                            });

                                    })->get();
                                if (!empty($booking)) {
                                    if (!empty($totalAvailableRoom)) {
                                        if ($booking->count() < $totalAvailableRoom) {
                                            break;
                                        }
                                    }
                                }

                            }

                        if (!empty($booking)) {
                            if (!empty($totalAvailableRoom)) {
                                if ($booking->count() < $totalAvailableRoom) {
                                    break;
                                }
                            }
                        }

                    }

                    if (!empty($booking)) {
                        if (!empty($totalAvailableRoom)) {
                            if ($booking->count() < $totalAvailableRoom) {
                                $hotels[] = $hotel;
                               //  print_r($hotels);
                            }
                        }
                    }

                }


            }

            $results = count($hotels);
            $hotels_p = null;
            if($hotels != null)
            {
                $page = Input::get('page',1); // Get the current page or default to 1, this is what you miss!
                $perPage = 9;
                $offset = ($page * $perPage) - $perPage;
                $hotels_p =  new LengthAwarePaginator(array_slice($hotels, $offset, $perPage, true), count($hotels), $perPage, $page, ['path' => $request->url(), 'query' => $request->query()]);

            }

            return view('hotels.template.hotel-view', compact('hotels_p','results', 'currency_symbol', 'type' ));

            }
        }

    }