<?php namespace App\Http\Controllers\Cars;

use App\Entity\Tour\Tour;
use App\Http\Controllers\Controller;
use App\Http\Requests\Request;
use App\Images;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;
use Laracasts\Flash\Flash;
use Intervention\Image\Facades\Image;

class TourGalleryController extends Controller {

    public function index() {
        //
    }

    public function show($tourID)
    {
        $tour = Tour::findOrFail($tourID);
        return view('admin.tours.tour-gallery', compact('tour'));
    }


	public function store()
	{
        $files = Input::file('files');
        $id = Input::get('tour_id');
        $tour = Tour::find($id);
        $json = array(
            'files' => array()
        );
        if (!file_exists('images/tours/gallery/'.$tour->id)) {
            mkdir('images/tours/gallery/'.$tour->id);
            mkdir('images/tours/gallery/'.$tour->id.'/thumbnail');
        }
        foreach( $files as $file ):
            $filename = uniqid().'.jpg';
            $destinationPath = 'images/tours/gallery/'.$tour->id;
            $galleryImage = Image::make($file)->fit(900, 500);
            $galleryImage->save($destinationPath.'/'.$filename);

            $thumbImage = Image::make($file)->fit(200, 200);
            $thumbImage->save($destinationPath.'/thumbnail/'.$filename);

            $image = $tour->images()->create(['path' => $destinationPath, 'name' => $filename, 'type' => 'gallery']);
            $image_id = $image->id;

            $json['files'][] = array(
                'name' => $filename,
                'size' => $file->getSize(),
                'type' => $file->getMimeType(),
                'url' => 'images/tours/gallery/'.$tour->id.'/'.$filename,
                'thumbnailUrl' =>  '/'.$destinationPath.'/thumbnail/'.$filename,
                'deleteType' => 'DELETE',
                'deleteUrl' => '/admin/tours/gallery',
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
        return redirect('admin/tours/gallery/'.$image->imageable_id);
	}

}
