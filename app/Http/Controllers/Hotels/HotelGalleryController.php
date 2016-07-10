<?php namespace App\Http\Controllers\Hotels;

use App\Entity\Hotel\Hotel;
use App\Http\Controllers\Controller;
use App\Http\Requests\Request;
use App\Images;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;
use Laracasts\Flash\Flash;
use Intervention\Image\Facades\Image;

class HotelGalleryController extends Controller {

    function show($hotel_id)
    {
        $hotel = Hotel::findOrFail($hotel_id);
        $images = $hotel->images()->where('type','gallery')->get();
        return view('admin.hotels.template.hotel-gallery', compact('hotel', 'images'));
    }


	public function store()
	{
        $files = Input::file('files');
        $id = Input::get('hotel_id');
        $hotel = Hotel::find($id);
        $json = array(
            'files' => array()
        );
        if (!file_exists('images/hotels/gallery/'.$hotel->id)) {
            mkdir('images/hotels/gallery/'.$hotel->id);
            mkdir('images/hotels/gallery/'.$hotel->id.'/thumbnail');
        }
        foreach( $files as $file ):
            $filename = uniqid().'.jpg';
            $destinationPath = 'images/hotels/gallery/'.$hotel->id;
            $galleryImage = Image::make($file)->fit(900, 500);
            $galleryImage->save($destinationPath.'/'.$filename);

            $thumbImage = Image::make($file)->fit(200, 200);
            $thumbImage->save($destinationPath.'/thumbnail/'.$filename);

            $image = $hotel->images()->create(['path' => $destinationPath, 'name' => $filename, 'type' => 'gallery']);
            $image_id = $image->id;

            $json['files'][] = array(
                'name' => $filename,
                'size' => $file->getSize(),
                'type' => $file->getMimeType(),
                'url' => 'images/hotels/gallery/'.$hotel->id.'/'.$filename,
                'thumbnailUrl' =>  '/'.$destinationPath.'/thumbnail/'.$filename,
                'deleteType' => 'DELETE',
                'deleteUrl' => '/admin/hotels/gallery',
                'ImageID' => $image_id,

            );
         //   $file->move( $destinationPath , $filename );
        endforeach;

        return Response::json($json);
	}


    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy( $request )
	{
        $image = Images::findOrFail($request);
		Images::destroy($request);
        unlink($image->path.'/'.$image->name);
        unlink($image->path.'/thumbnail/'.$image->name);
        Flash::success('Image Delete Successfully!');
        return redirect('admin/hotels/gallery/'.$image->imageable_id);
	}

}
