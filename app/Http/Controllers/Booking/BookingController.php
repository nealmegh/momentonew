<?php namespace App\Http\Controllers\Booking;

use App\BookingStatus;
use App\Entity\Booking;
use App\Entity\Car\Car;
use App\Entity\Car\CarBooking;
use App\Entity\Flight\Flight;
use App\Entity\Flight\FlightBooking;
use App\Entity\Hotel\Hotel;
use App\Entity\Hotel\HotelBooking;
use App\Entity\Guest;
use App\Entity\Hotel\Room\RoomType;
use App\Entity\PaymentMethod;
use App\Entity\Tour\Tour;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Entity\Tour\TourBooking;
use App\Http\Requests\Booking\BookingConfirmRequest;
use App\Http\Requests\Hotel\HotelBookingRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Validator;
use Laracasts\Flash\Flash;
use Mail;

class BookingController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $bookings = Booking::orderBy('created_at', 'desc')->paginate(10);
        $hotelBookings = Booking::where('route', '=', 'hotel')->orderBy('created_at', 'desc')->paginate(10);
        $tourBookings = Booking::where('route', '=', 'tour')->orderBy('created_at', 'desc')->paginate(10);
//        dd($bookings);
        return view('admin.booking.index', compact('bookings', 'hotelBookings', 'tourBookings'));
	}


    public function bookingDetail($no)
    {
        $booking = Booking::where('booking_no','=', $no)->first();
        $status = BookingStatus::all()->lists('status_name', 'id');
        $paymentMethod = PaymentMethod::all()->lists('name', 'id');
        return view('admin.booking.detail', compact('booking', 'status', 'paymentMethod'));
    }

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function storeHotelBook (HotelBookingRequest $request)
	{
        $birth_date = date("d-m-Y", strtotime($request->date.'-'.$request->month.'-'.$request->year));
        $request = array_add($request, 'birth_date', $birth_date);
        $guest = Guest::create($request->all());
        $hotelBooking = HotelBooking::create($request->all());

        if (Auth::user() != null)
        {
            if(Auth::user()->hasRole('agent') == true) {
                $agent = Auth::user()->id;
            } else {
                $agent = 0;
            }

            if(Auth::user()->hasRole('register') == true ) {
                $userID = Auth::user()->id;
            } else {
                $userID = 0;
            }
        }
        else
        {
                $agent  = 0;
                $userID = 0;
        }

        $booking = $hotelBooking->booking()->create([
            'user_id'=>$userID,
            'guest_id'=>$guest->id,
            'agent_id'=>$agent,
            'status'=> ($request->status != '') ? $request->status : 1,
            'other'=>$request->special_requirements,
            'booking_no'=>$request->booking_no,
            'tax'=>$request->tax,
            'total_price'=>$request->total_price,
            'currency_code' => $request->currency_code,
            'deposit_price' => $request->deposit_price,
            'route' => $request->route,
            'payment_method' => $request->payment_method,
            'pin_code'=>$request->pin_code
        ]);
        $mail_details = array('name'=>$request->first_name, 'email'=> $request->email, 'booking_no'=> $request->booking_no, 'pin'=>$booking->pin_code, 'p_message'=>'Thank you for Booking with Momento');

        Mail::send('emails.hotel-booking', $mail_details, function($message) use ($mail_details)
        {
            $message->to($mail_details['email'], $mail_details['name'])->subject('Welcome! to Momento');
        });

        if($request->redirect == 'admin') {
            return redirect()->to('admin/booking/detail/'.$booking->booking_no.'/print-preview');
        }elseif($request->redirect == 'agent') {
            return redirect()->to('agent/booking/'.$booking->booking_no.'/print-preview');
        }else {
            return redirect()->to('hotels/booking/confirm/'.$booking->booking_no);
        }
	}

	/**
	 * Display the specified resource.
	 * @param  int  $id
	 * @return Response
	 */
	public function showHotelBook($id)
	{
        $hotel =  Hotel::findOrFail($id);
        $bookingInfo = Input::all();
        $roomType = $hotel->roomTypes()->where('id', '=', $bookingInfo['room_type'])->get();
        return view('hotels.template.booking.hotel-booking', compact('hotel', 'bookingInfo', 'roomType'));
	}

    /*-------------Tour---------------*/

    /**
     * @param Request $request
     * @return Redirect
     */
    public function storeTourBook (Request $request)
    {
        $birth_date = date("d-m-Y", strtotime($request->date.'-'.$request->month.'-'.$request->year));
        $request = array_add($request, 'birth_date', $birth_date);
        $guest = Guest::create($request->all());
        $tourBooking = TourBooking::create($request->all());
        $booking = $tourBooking->booking()->create([
            'user_id'=>'0',
            'guest_id'=>$guest->id,
            'other'=>$request->special_requirements,
            'booking_no'=>$request->booking_no,
            'pin_code'=>$request->pin_code,
            'tax'=>$request->tax,
            'total_price'=>$request->total_price,
            'currency_code' => $request->currency_code,
            'deposit_price' => $request->deposit_price,
            'payment_method' => '0',
            'route' => $request->route

        ]);
        $mail_details = array('name'=>$request->first_name, 'email'=> $request->email, 'pin'=>$booking->pin_code, 'booking_no'=> $request->booking_no, 'p_message'=>'Thank you for Booking with Momento');

        Mail::send('emails.tour-booking', $mail_details, function($message) use ($mail_details)
        {
            $message->to($mail_details['email'], $mail_details['name'])->subject('Welcome! to Momento');
        });
        return redirect('tours/booking/confirm/'.$booking->booking_no);
    }

    /**
     * Display the specified resource.
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function showTourBook( Request $request)
    {
        $tour =  Tour::findOrFail($request->tour);
        $bookingInfo = $request->all();
        return view('tours.template.booking.tour-booking', compact('tour', 'bookingInfo'));
    }

    /**
     * Display the specified resource.
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function showCarBook( Request $request)
    {
        $car =  Car::findOrFail($request->car);
        $bookingInfo = $request->all();
        return view('cars.template.booking.car-booking', compact('car', 'bookingInfo', 'request'));
    }


    /**
     * @param Request $request
     * @return Redirect
     */
    public function storeCarBook (Request $request)
    {
        $birth_date = Carbon::now();
        $request = array_add($request, 'birth_date', $birth_date);
        $guest = Guest::create($request->all());
        $tourBooking = CarBooking::create($request->all());
        $booking = $tourBooking->booking()->create([
            'user_id'=>'0',
            'guest_id'=>$guest->id,
            'other'=>$request->special_requirements,
            'booking_no'=>$request->booking_no,
            'tax'=>$request->tax,
            'total_price'=>$request->total_price,
            'currency_code' => $request->currency_code,
            'deposit_price' => $request->deposit_price,
            'payment_method' => '0',
            'route' => $request->route
        ]);
        $mail_details = array('name'=>$request->first_name, 'email'=> $request->email, 'booking_no'=> $request->booking_no, 'p_message'=>'Thank you for Booking with Momento');

        Mail::send('emails.tour-booking', $mail_details, function($message) use ($mail_details)
        {
            $message->to($mail_details['email'], $mail_details['name'])->subject('Welcome! to Momento');
        });
        return redirect('cars/booking/confirm/'.$booking->booking_no);
    }



    /**
     * Display the specified resource.
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function showFlightBook( Request $request)
    {
        $flight =  Flight::findOrFail($request->flight);

        return view('flights.template.booking.flight-booking', compact('flight', 'request', 'request'));
    }


    /**
     * @param Request $request
     * @return Redirect
     */
    public function storeFlightBook (Request $request)
    {
        $birth_date = Carbon::now();
        $request = array_add($request, 'birth_date', $birth_date);
        $guest = Guest::create($request->all());
        $tourBooking = FlightBooking::create($request->all());
        $booking = $tourBooking->booking()->create([
            'user_id'=>'0',
            'guest_id'=>$guest->id,
            'other'=>$request->special_requirements,
            'booking_no'=>$request->booking_no,
            'tax'=>$request->tax,
            'total_price'=>$request->total_price,
            'currency_code' => $request->currency_code,
            'deposit_price' => $request->deposit_price,
            'payment_method' => '0',
            'route' => $request->route
        ]);
        $mail_details = array('name'=>$request->first_name, 'email'=> $request->email, 'booking_no'=> $request->booking_no, 'p_message'=>'Thank you for Booking with Momento');

        Mail::send('emails.tour-booking', $mail_details, function($message) use ($mail_details)
        {
            $message->to($mail_details['email'], $mail_details['name'])->subject('Welcome! to Momento');
        });
        return redirect('cars/booking/confirm/'.$booking->booking_no);
    }

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, Request $request)
	{
        $booking = Booking::findOrFail($id);
        $booking->update($request->all());
        return Redirect::back();
	}

    public function paymentHistory($id, Request $request)
    {
        $booking = Booking::findOrFail($id);
        $booking->payment()->create($request->all());
//                dd($booking->payment);

        return Redirect::back();
    }

	/**
	 * Remove the specified resource from storage.
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$booking = Booking::findOrFail($id);
		$bookableID = $booking->bookable_id ;
		$route = $booking->route; 
		if($route == 'hotel')
		{
		    $hotelBookingdelete = HotelBooking::destroy($bookableID);
		}
		if($route == 'tour')
		{
		    $hotelBookingdelete = TourBooking::destroy($bookableID);
		}
	
		$delete = Booking::destroy($id);

    	//$item = $booking;
        //$item->destroy();
        $check = Booking::findOrFail($id);
        if($check)
        {
        	dd($check);
        }
        return Redirect::back();
	}

    public function bookingCheck()
    {
        return view('pages.booking-check');
    }

    public function reconfirm (Request $request)
    {

        $booking = Booking::where('booking_no', '=', $request->booking_no)->first();
        if($booking->isEmpty) {
            return Redirect::back();
        }else {

            if($booking->route == 'hotel') { return redirect('hotels/booking/confirm/'.$booking->booking_no); }
            if($booking->route == 'tour') { return redirect('tours/booking/confirm/'.$booking->booking_no); }
        }
    }

    public function confirm($booking_no)
    {
		$booking = Booking::where('booking_no', '=', $booking_no)->first();

        $route = $booking->route;

        $mail_details = array('name'=>$booking->guest->first_name, 'email'=> $booking->guest->email, 'booking_no'=> $booking->booking_no, 'type'=> $booking->route, 'p_message'=>'Thank you for confirming the booking. Your booking will shortly Approved');

//        Mail::send('emails.complete-booking', $mail_details, function($message) use ($mail_details)
//        {
//            $message->to($mail_details['email'], $mail_details['name'])->subject('Welcome! to Momento');
//        });

        switch ($route) {
            case 'hotel':
                return view ('hotels.template.booking.confirm',compact('booking'));
                break;
            case 'tour':
                return view ('tours.template.booking.confirm',compact('booking'));
                break;
            case 'car':
                return view ('cars.template.booking.confirm',compact('booking'));
                break;
        }
    }

    public function complete($booking_no, Request $request)
    {
//        $booking = Booking::where('booking_no', '=', $booking_no)->where('pin_code', '=', $request->get('pin'))->first();

        if ($request->has('pin')) {
            $booking = Booking::where('booking_no', '=', $booking_no)->where('pin_code', '=', $request->get('pin'))->first();
            if($booking != null) {
                $route = $booking->route;
            }
        }
        $status = BookingStatus::all()->lists('status_name', 'status_id');
        $paymentMethod = PaymentMethod::where('name', '!=', 'COD')->lists('name', 'id');
        return view ('booking.template.complete',compact('booking', 'route', 'status', 'paymentMethod'));
    }

    public function postComplete($booking_no, Request $request) {
        $booking = Booking::where('booking_no', '=', $booking_no)->first();
        if(in_array($request->payment_method, [2, 3])) {
            $booking->paymentInformation()->create(['booking_no'=>$booking_no, 'pament_method'=>$request->payment_method, 'phone_no'=> $request->no, 'transaction_no'=>$request->transaction_no]);
        }
        $booking->update(['status'=>'3']);

        Flash::success('Your booking Confirm Successfully');
        return Redirect::to($booking->route.'s/booking/confirm/'.$booking_no);

    }

    public function bookingComplete($booking_no , BookingConfirmRequest $request)
    {
        $booking = Booking::where('booking_no', '=', $booking_no)->first();
        $status = BookingStatus::all()->lists('status_name', 'status_id');
        $paymentMethod = PaymentMethod::all()->lists('name', 'id');
        return view ('booking.template.complete',compact('booking', 'status', 'paymentMethod'));

    }

    public function printPreview($no)
    {
        $booking = Booking::where('booking_no','=', $no)->first();
        $status = BookingStatus::all()->lists('status_name', 'id');
        $paymentMethod = PaymentMethod::all()->lists('name', 'id');
        //dd($status);
        return view('common.print-preview', compact('booking', 'status', 'paymentMethod'));
    }

    /**
     * PDF download function
     */
    public function pdfDownload($no)
    {
        $booking = Booking::where('booking_no','=', $no)->first();
        $status = BookingStatus::all()->lists('status_name', 'id');
        $paymentMethod = PaymentMethod::all()->lists('name', 'id');

        $pdf = App::make('dompdf');
        $pdf->loadView('common.print-preview', compact('booking', 'status', 'paymentMethod'));

        return $pdf->stream();
    }

    public function newBooking(Request $request)
    {
        $searchable = Input::get('searchable');
        switch ($searchable) {
            case 'allHotels':
                return $this->allHotels();
                break;
            case 'hotel':
                return $this->hotel(Input::all(), $request);
                break;
            default:
                return view('admin.booking.create-invoice');
                break;
        }
    }

    private function allHotels() {
        $hotels = Hotel::all();
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
        return view('admin.booking.create-invoice', compact('hotels', 'currency_symbol'));
    }

    public function hotel($input, Request $request) {

        $rules = [
            'placeOrHotel' => '',
            'date_from' => 'required',
            'date_to' => 'required',
            'num_of_adult' => 'required',
            'num_of_child' => '',
            'num_of_room' => 'required'
        ];

        $input['date_from'] = date("Y-m-d", strtotime($input['date_from']));
        $input['date_to'] = date("Y-m-d", strtotime($input['date_from']));

        $validator = Validator::make($input, $rules);

        if ($validator->fails()) {
            return view('admin.booking.create-invoice')->withErrors($validator);;
        }else {

            $placeOrHotel = $request->get('placeOrHotel');
            $allHotels = Hotel::where('name', 'LIKE', '%' . $placeOrHotel . '%')->orWhere('city', 'LIKE', '%' . $placeOrHotel . '%')->get();
            $count = 0;
            $checkIn = date("Y-m-d", strtotime($request->get('date_from')));
            $checkOut = date("Y-m-d", strtotime($request->get('date_to')));
            $adult = $request->get('num_of_adult');
            $child = $request->get('num_of_child');
            $totalRoom = $request->get('num_of_room');
            $currency_symbol = 'Tk.';

            $checkIn = date_create($checkIn);
            $checkOut = date_create($checkOut);
            $totalDays = date_diff($checkOut, $checkIn);

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

            return view('admin.booking.create-invoice', compact('hotels', 'currency_symbol', 'request', 'totalDays'));
        }
    }

    public function adminBooking($HoteID, Request $request)
    {
        $hotel = Hotel::findOrFail($HoteID);
        $bookingInfo = $request->all();
        $checkIn = date("Y-m-d", strtotime($request->get('checkIn')));
        $checkOut = date("Y-m-d", strtotime($request->get('checkOut')));
        $bookingInfo['checkIn'] = $checkIn;
        $bookingInfo['checkOut'] = $checkOut;
        $paymentMethods = PaymentMethod::all()->lists('name', 'id');
        return view('admin.booking-confirm',compact('hotel', 'bookingInfo', 'paymentMethods'));
    }

    public function modTraveler($booking_no)
    {
        $booking = Booking::where('booking_no', '=', $booking_no )->first();
        //$booking_guest = $booking->guest ;
        if($booking->route == 'hotel')
        {
            return view ('hotels.template.booking.mod-traveler', compact('booking'));
        }
        if($booking->route == 'tour')
        {
            return view ('tours.template.booking.mod-traveler', compact('booking'));
        }

    }

    /**
     * @param $booking_no
     * @param Request $request
     */
    public function updateTraveler($booking_no, Request $request)
    {
        $id = $request->guest_id;

        $guest = Guest::findorFail($id);
        $guest->update($request->all());


        return redirect()->to('check-bookings/confirmation?booking_no='.$booking_no);
    }

}