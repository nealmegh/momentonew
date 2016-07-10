<?php namespace App\Http\Controllers;


use App\Entity\Hotel\Hotel;
use App\Entity\Tour\Tour;
use Auth;
use Zizaco\Entrust\Entrust;

class WelcomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Welcome Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders the "marketing page" for the application and
	| is configured to only allow guests. Like most of the other sample
	| controllers, you are free to modify or remove it as you desire.
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
//	public function __construct()
//	{
//		$this->middleware('guest');
//	}

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		$hotels = Hotel::where('status', 1)->latest()->take(8)->get();
        $tours = Tour::latest()->take(12)->get();

       // dd(Entrust::hasRole('owner'));
		return view('home.index', compact('hotels', 'tours'));
	}


}
