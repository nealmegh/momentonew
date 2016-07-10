<?php namespace App\Http\Controllers\Cars;

use App\Entity\Car\Car;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Entity\RatingType;
use App\Entity\Car\CarFacility;
use App\Http\Controllers\Controller;
use App\Http\Requests\Cars\CarsRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Laracasts\Flash\Flash;
use Intervention\Image\Facades\Image;
use App\Images;
use App\Entity\Booking;
use App\Entity\Car\CarBooking;

class CarsController extends Controller {

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('admin.cars.car-index');
    }

    /**
     * Frontend Index page
     * by kabir
     */

    public function cars()
    {
        $cars = Car::all();
        $featuredCars = Car::where('featured', 1)->take(4)->get();
        $randomCars = Car::orderByRaw("RAND()")->take(3)->get();
        return view('cars.index', compact('cars', 'featuredCars', 'randomCars'));
    }

    public function manageCar()
    {
        $cars = Car::paginate(15);
        return view('admin.cars.car-manage', compact('cars'));
    }

    /**
     * @param $tourID
     * @return \Illuminate\View\View
     * by Kabir
     */
    public function carDetail($carID)
    {
        $car = Car::find($carID);
        $logo = $car->images()->where('type', '=', 'logo')->first();
        $gallery = $car->images()->where('type', '=', 'gallery')->first();
        $ratingTypes = RatingType::all();
        return view('cars.template.car-detail', compact('car', 'ratingTypes', 'logo', 'gallery'));
    }


    public function create()
    {
        return view('admin.cars.create-car');
    }

    /**
     * @param CarsRequest $request
     * @return Redirect
     */
    public function store(CarsRequest $request)
    {
//        dd($request->all());
        $car = Car::create($request->all());

        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $destinationPath = 'images/cars/logo/'.$car->id;
            if (!file_exists('images/cars/logo/'.$car->id)) {
                mkdir('images/cars/logo/'.$car->id);
            }
            $filename = $file->getClientOriginalName();
            $galleryImage = Image::make($file)->fit(240, 150);
            $galleryImage->save($destinationPath.'/'.$filename);

            $car->images()->create(['path' => $destinationPath,'name' => $filename, 'type' => 'logo']);
        } else {
            $destinationPath = 'images/cars/logo';
            $car->images()->create(['path' => $destinationPath,'name' => 'no-image-car.png', 'type' => 'logo']);
        }

        if ($request->hasFile('gallery')) {
            $file = $request->file('gallery');
            $destinationPath = 'images/cars/gallery/'.$car->id;
            if (!file_exists('images/cars/gallery/'.$car->id)) {
                mkdir('images/cars/gallery/'.$car->id);
            }
            $filename = $file->getClientOriginalName();
            $galleryImage = Image::make($file)->fit(870, 495);
            $galleryImage->save($destinationPath.'/'.$filename);

            $car->images()->create(['path' => $destinationPath,'name' => $filename, 'type' => 'gallery']);
        } else {
            $destinationPath = 'images/cars/gallery';
            $car->images()->create(['path' => $destinationPath, 'name' => 'no-image-car.png', 'type' => 'gallery']);
        }

        Flash::success('Car Added Successfully!');
        return Redirect::back();
    }

    /**
     * Display the specified resource.
     * @param $tour_id
     * @return \Illuminate\View\View
     */
    public function show($car_id)
    {
        $car = Car::findOrfail($car_id);
        return view('admin.cars.detail', compact('car'));
    }

    /**
     * Show the form for editing the specified resource
     * @param $tour_id
     * @return \Illuminate\View\View
     */
    public function edit($car_id)
    {
        $car = Car::findOrfail($car_id);
        return view('admin.cars.edit-car', compact('car'));
    }

    /**
     * Update the specified resource in storage.
     * @param CarsRequest $request
     * @param $tour_id
     * @return Redirect
     */
    public function update(CarsRequest $request, $car_id)
    {
        $car = Car::findOrFail($car_id);
        $car->update($request->all());

        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $destinationPath = 'images/cars/logo/'.$car->id;
            if (!file_exists('images/cars/logo/'.$car->id)) {
                mkdir('images/cars/logo/'.$car->id);
            }
            $filename = $file->getClientOriginalName();
            $galleryImage = Image::make($file)->fit(240, 150);
            $galleryImage->save($destinationPath.'/'.$filename);

            $carImage = $car->images()->where('type', '=', 'logo')->first();
            $carImage->update(['path' => $destinationPath,'name' => $filename]);
        }

        if ($request->hasFile('gallery')) {
            $file = $request->file('gallery');
            $destinationPath = 'images/cars/gallery/'.$car->id;
            if (!file_exists('images/cars/gallery/'.$car->id)) {
                mkdir('images/cars/gallery/'.$car->id);
            }
            $filename = $file->getClientOriginalName();
            $galleryImage = Image::make($file)->fit(870, 495);
            $galleryImage->save($destinationPath.'/'.$filename);

            $carImage = $car->images()->where('type', '=', 'gallery')->first();
            $carImage->update(['path' => $destinationPath,'name' => $filename]);
        }

        Flash::success('Car Update Successfully!');
        return Redirect::back();
    }

    /**
     * Remove the specified resource from storage.
     * @param $request
     * @return Redirect
     */
    public function destroy( $request )
    
    {
    	$car = Car::findOrFail($request);
        $car->delete();
        
        Flash::success('Car Deleted successfully!');
        return redirect('admin/cars/manage');
    }

    /**
     * @param Request $request
     * @return \Illuminate\View\View
     * @internal param Request $request
     */
    public function carSearch(CarsRequest $request, $option = 'all-cars')
    {
        if($option == 'all-cars') {
            $cars = Car::paginate(10);
            return view('cars.template.car-list-view', compact('cars'));
        }elseif($option == 'result') {
            $cars = Car::where('passenger','=>', $request->adult)->orWhere('type', '=', $request->type)->paginate(10);
            return view('cars.template.car-list-view', compact('cars'));
        }
    }

}