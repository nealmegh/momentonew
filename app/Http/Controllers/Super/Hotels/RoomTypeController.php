<?php namespace App\Http\Controllers\Super\Hotels;


use App\Entity\Hotel\Hotel	;
use App\Entity\Hotel\Room\RoomType;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Entity\Hotel\Room\Room;
use App\Http\Requests\Hotel\Room\RoomTypeRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Intervention\Image\Facades\Image;
use Laracasts\Flash\Flash;

class RoomTypeController extends Controller {


    public function index(Request $request)
    {
        if($request->has('hotel')) {
            $hotelID = $request->get('hotel');
            $hotel = Hotel::findOrFail($hotelID);
            $roomTypes = $hotel->roomTypes;
        }else {
            $roomTypes = RoomType::all();
        }

        $action = 'v';
        return view('admin.hotels.template.room-type', compact('roomTypes', 'action', 'hotel'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create(Request $request)
    {
        $action = 'c';
        $hotelID = $request->get('hotel');
        $roomTypes = RoomType::all();
        $hotel = Hotel::findOrFail($hotelID);
  //      $roomTypes = RoomType::all()->lists('name', 'id');
        return view('admin.hotels.template.room-type', compact('action', 'roomTypes', 'hotel'));
    }

    /**
     * Store a newly created resource in storages
     * @param RoomTypeRequest $request
     * @return
     */
    public function store(RoomTypeRequest $request)
    {
        //dd($request->all());
        $roomType = RoomType::create($request->all());

        $file = $request->file('file');

        if (!file_exists('images/hotels/room/'.$roomType->id)) {
            mkdir('images/hotels/room/'.$roomType->id);
        }

        if($request->hasFile('file')) {
            $filename = $roomType->first_name.'.jpg';
            $destinationPath = 'images/users/' . $roomType->id;
            $galleryImage = Image::make($file)->fit(230, 160);
            $galleryImage->save($destinationPath . '/' . $filename);
            $roomType->roomImage()->create(['path' => $destinationPath, 'name' => $filename, 'type' => 'room']);
        }else {
            $roomType->roomImage()->create(['path' => 'images', 'name' => 'no-image.png', 'type' => 'room']);
        }

        Flash::success('Room Type Add Successfully for '.$roomType->hotel->name);
        return redirect('admin/hotels/room-type?hotel='.$roomType->hotel->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * @param $id
     * @return \Illuminate\View\View
     */
    public function edit($id, Request $request)
    {
        $action = 'e';
        $roomType= RoomType::findOrFail($id);
        $hotelID = $request->get('hotel');
        $roomTypes = RoomType::all();
        $hotel = Hotel::findOrFail($hotelID);

        return view('admin.hotels.template.room-type', compact('action', 'roomTypes', 'roomType', 'hotel'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param $roomType
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $roomType)
    {
        $roomType  = RoomType::findOrFail($roomType);
        $roomType->update($request->all());

        $file = $request->file('file');

        if (!file_exists('images/hotels/room/'.$roomType->id)) {
            mkdir('images/hotels/room/'.$roomType->id);
        }

        if($request->hasFile('file')) {
            $filename = $roomType->first_name.'.jpg';
            $destinationPath = 'images/hotels/room/' . $roomType->id;
            $galleryImage = Image::make($file)->fit(230, 160);
            $galleryImage->save($destinationPath . '/' . $filename);
            $roomType->roomImage()->update(['path' => $destinationPath, 'name' => $filename, 'type' => 'room']);
        }

        Flash::success($roomType->room_type.' Update Successfully');
        return redirect('admin/hotels/room-type?hotel='.$roomType->hotel->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //dd($id);
        //
        $roomVacancy = Room::where('hotel_room_group_id', '=', $id );
        $roomVacancy->delete();
 
        $room = RoomType::findOrFail($id);
        
        //if($room->images)
        //{
         // foreach($room->images as $image)
       // {
       // Images::destroy($image->id);
        //unlink($image->path.'/'.$image->name);
       
      //  }
      
       // rmdir('images/hotels/room/'.$room->id);
       // }
        
        $room->delete();
        
        return Redirect::back();
    }

}