<?php namespace App\Http\Controllers\Super\Discount;


use App\Entity\Car\Car;
use App\Entity\Flight\Flight;
use App\Entity\Hotel\Hotel;
use App\Entity\Tour\Tour;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class DiscountController extends Controller {


    public function index($service, $id)
    {
        if($service == 'hotels') {
            $service = Hotel::findOrFail($id);
        }

        if($service == 'tours') {
            $service = Tour::findOrFail($id);
        }

        if($service == 'cars') {
            $service = Car::findOrFail($id);
        }

        if($service == 'flights') {
            $service = Flight::findOrFail($id);
        }

        return view('admin.common.discount', compact('service'));
    }


    public function store($service, $id, Request $request)
    {
        if($service == 'hotels') {
            $service = Hotel::findOrFail($id);
        }

        if($service == 'tours') {
            $service = Tour::findOrFail($id);
        }

        if($service == 'cars') {
            $service = Car::findOrFail($id);
        }

        if($service == 'flights') {
            $service = Flight::findOrFail($id);
        }

        $service->discount()->create($request->all());
        return redirect()->back();
    }


    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param $roomType
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update( $service, $id, Request $request  )
    {
        if($service == 'hotels') {
            $service = Hotel::findOrFail($id)->discount();
        }

        if($service == 'tours') {
            $service = Tour::findOrFail($id)->discount();
        }

        if($service == 'cars') {
            $service = Car::findOrFail($id)->discount();
        }

        if($service == 'flights') {
            $service = Flight::findOrFail($id)->discount();
        }
//        dd($request->amount);
        $service->update(['amount'=>$request->amount]);
        return redirect()->back();
    }



}