<?php namespace App\Http\Controllers\Agents;


use App\Entity\Agent\Agent;
use App\Entity\Agent\AgentsMarkup;
use App\Entity\Booking;
use App\Entity\Hotel\Hotel;
use App\Entity\Hotel\Room\RoomType;
use App\Entity\PaymentMethod;
use App\Http\Controllers\Controller;
use App\Http\Requests\Agent\AgentHotelRequest;
use App\Http\Requests\UsersRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Pagination\LengthAwarePaginator;


class AgentsController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

    public function index(Request $request)
    {
        $user = Auth::user();
        $agent = $user;

        if($user->hasRole('agent')) {
            $hotels_pss = $user->agentHotels;
            $hotels_p = null;
            $count_array = count($hotels_pss);

            if($count_array>0 )
            {
                foreach($hotels_pss as $hotels_ps )
                {
                    $hotels_p [] = $hotels_ps->hotelInfo ;
                }
            }
            $bookings = Booking::where('agent_id', $user->id)->where('status', 3)->orderBy('created_at', 'DESC')->get();
            $action = '0';
            $users = User::all();
//            $hotels = null;
//            if($hotels_p != null)
//            {
//                $page = Input::get('page',1); // Get the current page or default to 1, this is what you miss!
//                $perPage = 10;
//                $offset = ($page * $perPage) - $perPage;
//
//                $hotels =  new LengthAwarePaginator(array_slice($hotels_p, $offset, $perPage, true), count($hotels_p), $perPage, $page, ['path' => $request->url(), 'query' => $request->query()]);
//
//            }
            $hotels = $user->agentHotels;
//            dd($hotels[0]->hotelInfo);

            return view('agents.index', compact('bookings', 'hotels', 'action',  'users', 'agent'));
        }
    }

    public function profileUpdate($user, UsersRequest $request)
    {
        $user = User::findOrFail($user);
        $file = $request->file('file');
        if (!file_exists('images/users/'.$user->id)) {
            mkdir('images/users/'.$user->id);
        }

        if($file != null) {
            $filename = $user->first_name . '.jpg';
            $destinationPath = 'images/users/' . $user->id;
            $galleryImage = Image::make($file)->fit(270, 265);
            $galleryImage->save($destinationPath . '/' . $filename);
            $user->profilePicture()->update(['path' => $destinationPath, 'name' => $filename, 'type' => 'profile']);
        }

        $user->update($request->all());
        Flash::success('User Updated Successfully!');
        return redirect('agents/#profile');
    }

    public function adminIndex(Request $request) {
        $users = User::all();

        foreach($users as $user) {
            if($user->hasRole('agent')) {
                $agents[] =  $user;
            }
        }
        $agents_p = null;
        if($agents != null)
        {
            $page = Input::get('page',1); // Get the current page or default to 1, this is what you miss!
            $perPage = 15;
            $offset = ($page * $perPage) - $perPage;

            $agents_p =  new LengthAwarePaginator(array_slice($agents, $offset, $perPage, true), count($agents), $perPage, $page, ['path' => $request->url(), 'query' => $request->query()]);

        }
        return view('admin.agents.index', compact('agents', 'agents_p'));
    }

    public function adminAssignHotelsForAgents(Request $request) {
        $action = 'c';
        $user = User::findOrFail($request->for);
        $agentHotels = Agent::all()->lists('hotel_id');
        $hotels = Hotel::whereNotIn('id', $agentHotels)->lists('name', 'id');
//        dd($user->agentHotels);
        return view('admin.agents.hotels.index', compact('action', 'user', 'hotels'));
    }

    public function storeAssignHotel(AgentHotelRequest $request) {
        Agent::create($request->all());
        return Redirect::back();
    }

    public function deleteAssignHotel($hotel_id) {

        $assignHotel = Agent::where('hotel_id', $hotel_id)->firstOrFail();

        $assignHotel->delete();
        return Redirect::back();
    }

    public function agentsBookingSearch(Request $request)
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
                return view('agents.agents-booking');
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
        $currency_symbol = $settings->currency;
        return view('agents.agents-booking', compact('hotels', 'currency_symbol'));
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
            return view('agents.agents-booking')->withErrors($validator);;
        }else {

            $placeOrHotel = $request->get('placeOrHotel');
            $allHotels = Hotel::where('name', 'LIKE', '%' . $placeOrHotel . '%')->orWhere('city', 'LIKE', '%' . $placeOrHotel . '%')->get();
            $count = 0;
            $checkIn = date("Y-m-d", strtotime($request->get('date_from')));
            $checkOut = date("Y-m-d", strtotime($request->get('date_to')));
            $adult = $request->get('num_of_adult');
            $child = $request->get('num_of_child');
            $totalRoom = $request->get('num_of_room');
            $currency_symbol = $settings->currency;

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

            return view('agents.agents-booking', compact('hotels', 'currency_symbol', 'request', 'totalDays'));
        }
    }

    public function agentsBooking($HoteID, Request $request)
    {
        $hotel = Hotel::findOrFail($HoteID);
        $bookingInfo = $request->all();
        $checkIn = date("Y-m-d", strtotime($request->get('checkIn')));
        $checkOut = date("Y-m-d", strtotime($request->get('checkOut')));
        $bookingInfo['checkIn'] = $checkIn;
        $bookingInfo['checkOut'] = $checkOut;
        $paymentMethods = PaymentMethod::all()->lists('name', 'id');
        return view('agents.hotels.confirm',compact('hotel', 'bookingInfo', 'paymentMethods'));
    }

    public function markup(Request $request)
    {
        $agent = AgentsMarkup::where('agent_id', '=', $request->agent_id)->first();

        if(!isset($agent)) {
            AgentsMarkup::create($request->all());
        }else {
            $agent->update($request->all());
        }
        return redirect()->to('agents#markup');
    }

    public function agentCommission($agentId)
    {
        $agent = AgentsMarkup::where('agent_id', '=', $agentId)->first();
//        dd($agent);
        return view('admin.agents.commission.index', compact('agent'));
    }

    public function agentCommissionUpdate($agentId, Request $request)
    {
        $agent = AgentsMarkup::where('agent_id', '=', $agentId)->first();
        if(!isset($agent)) {
            AgentsMarkup::create($request->all());
        }else {
//            dd($agent);

            $agent->update($request->all());
        }
        return redirect()->to('admin/agents/commission/'.$agentId);
    }
    
}
