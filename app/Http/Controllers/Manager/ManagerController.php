<?php namespace App\Http\Controllers\Manager;

use App\Entity\FacilityType;
use App\Entity\Hotel\Category;
use App\Entity\Hotel\Facility;
use App\Entity\Hotel\Grade;
use App\Entity\Hotel\Hotel;
use App\Entity\Hotel\Manager;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\Hotel\CreateNewHotelRequest;
use Illuminate\Http\Request;

class ManagerController extends Controller {

    public function __construct()
    {
        $this->middleware('manager.user');
    }

    public function dashboard()
    {
        return view('hotel.manager.dashboard');
    }

    public function newHotel()
    {
        $viewData = array(
            'facilities'  => FacilityType::all(),
            'categories'  => Category::all(),
            'grades'      => Grade::all()
        );

        return view('hotel.new')->with('data', $viewData);
    }

    /**
     * @param CreateNewHotelRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function saveHotel(CreateNewHotelRequest $request)
    {
        $hotelData = $request->all();
        $facilities = $request->get('facilities', array());
        unset($hotelData['facilities']);
        unset($hotelData['_token']);

        $hotel = new Hotel($hotelData);
        if ($hotel->save()) {
            //assign this hotel to manager
            $manager = new Manager([
                'user_id' => \Auth::id(),
                'hotel_id'=> $hotel->id,
            ]);
            if(!$manager->save()) {
                Manager::destroy($hotel->id);
                flash()->error('Opps!! Error Assigning Hotel to this manager, Hotel creation reverted.');
                return redirect()->back();
            }
            //create facilities
            foreach($facilities as $facility) {
                if ($facility > 0) {
                    Facility::create([
                        'hotel_id' => $hotel->id,
                        'facility_type_id' => $facility
                    ]);
                }
            }
        }
        else {
            flash()->error('Opps!! Error Creating Hotel');
        }

        return redirect()->back();
    }
}
