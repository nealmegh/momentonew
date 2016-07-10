<?php namespace App\Http\Controllers\Auth;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Auth\Guard;
use Illuminate\Http\Request;

class RedirectController extends Controller {

//    protected $auth;
//
//    public function __construct(Guard $auth)
//    {
//        $this->auth = $auth;
//        $this->middleware('auth');
//	}

    public function home()
    {
        //make decision which home need to send based on user type
        switch($this->auth->user()->userType->id) {
            case 1: //admin
                return redirect()->route('admin_dashboard_path');
                break;
            case 2: //agent
                break;
            case 3: //manager
                return redirect()->route('manager_dashboard_path');
                break;
            case 4: // clients
                return redirect()->route('user_dashboard_path');
                break;
        }

        return view('errors.503');
    }
}
