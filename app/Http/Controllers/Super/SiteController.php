<?php namespace App\Http\Controllers\Super;

use App\Entity\Setting;
use App\GlobalConfig;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;


class SiteController extends Controller {

	/**
	 * Display a listing of the resource.
	 * @return Response
	 */
	public function index()
	{
		$globalConfiguration = GlobalConfig::first();
     //   dd($globalConfigeration);
        return view('admin.site.setting', compact('globalConfiguration'));
	}

    public function update(Request $request)
    {
         //dd($request->all());
        $globalConfiguration = GlobalConfig::first();
        $globalConfiguration->update($request->all());
        return Redirect::back();
    }


}
