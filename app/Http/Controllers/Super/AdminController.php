<?php namespace App\Http\Controllers\Super;


use App\BookingStatus;
use App\Entity\Agent\Agent;
use App\Entity\Agent\AgentsMarkup;
use App\Entity\Booking;
use App\Entity\Hotel\Manager;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreateHotelManagerRequest;
use App\Role;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;


class AdminController extends Controller {

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

    public function index()
    {
        $bookings = Booking::paginate(10);
//        dd('Hello');
        return view('admin.index', compact('bookings'));
    }

    public function getChangePassword()
    {
        return view('admin.users.change-password');
    }


    /**
     * Create new hotel from admin interface
     *
     * @Route("admin_new_hotel_manager_path")
     *
     * @return \Illuminate\View\View
     */
    public function newHotelManager()
    {
        return view('admin.hotels.manager.new');
    }

    /**
     * Save new hotel manager
     * @param CreateHotelManagerRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     * @Route("admin_new_hotel_manager_path")
     */
    public function newHotelManagerSave(CreateHotelManagerRequest $request)
    {
        $manager = $request->all();

        $user = new User();
        $user->name = $manager['name'];
        $user->email = $manager['email'];
        $user->password = $manager['password'];

        //user type 3 == manager of a hotel
        $user->user_type = 3;
        if ( $user->save() ) {
            $this->sendEmail($manager);
            return \Redirect::route('dashboard_path');
        }
        else {
            flash()->error('Opps!! Error in creating new manager. It seems like system fault.');
            return \Redirect::back();
        }
    }

    /**
     * All managers
     */
    public function managers()
    {
        $managers = Manager::all();
    }

    private function sendEmail($data, $emailType = "onCreateNewManager")
    {
        switch($emailType) {
            case "onCreateNewManager":
                \Mail::send('emails.admin.hotels.manager.new', $data, function($message) use ($data)
                {
                    $message->to($data['email'], $data['name'])
                            ->subject('Welcome! to Holiday Hotel Manager Portal.');
                });
                break;
        }
    }


    public function billing()
    {

        $role = Role::where('name','=', 'agent')->first();
        $agents = $role->users;
//        $T_price =    null;
//        $F_agents  = null;
//        foreach($agents as $agent)
//        {
//
//            foreach ($agent->hotelBookings as $hotelBookings){
////            {dd($hotelBookings->booking);
//                foreach ($hotelBookings->booking as $bookings)
//                {
//                    if ($bookings->status == 2 && $bookings->agent_id != 0 )
//                    {
//
//                        $id = $agent->user_id;
//                        if(!isset($F_agents[$id]))
//                        {
//                            $F_agents[$id] = $agent;
//                        }
//
//
//                        $markup [$id] = AgentsMarkup::where('agent_id', '=', $id)->first();
//                        if(isset($T_price[$id]))
//                        {
//                            $T_price[$id] += $bookings->total_price;
//                        }
//                        else
//                        {
//                            $T_price[$id] = $bookings->total_price;
//                        }
//                       if(isset($markup[$id]))
//                        $prices[$id] = ($T_price[$id] + $markup[$id]->markup);
//                        else
//                        {
//                            $prices[$id] = $T_price[$id];
//                        }
//
//                    }
//                }
//            }
//        }

//        return view('admin.billing.billing', compact('F_agents', 'prices', 'markup'));
//        dd($agents[0]->agentBooking);
        return view('admin.billing.billing', compact('agents'));
    }

    public function agentBill($user_id, Request $request)
    {
        $agent = User::findOrFail($user_id);;

        if(isset($request->from) && isset($request->to) ) {
            $bookings = $agent->agentBooking()->whereBetween('created_at', [$request->from, $request->to])->get();
        }else {
            $bookings = $agent->agentBooking()->whereBetween('created_at', [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()])->get();
        }

        return view('admin/billing/agent-detail-bill', compact('agent', 'bookings'));
    }
}
