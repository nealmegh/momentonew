<?php namespace App\Http\Controllers\Reviews;

use App\Entity\RatingType;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RatingTypesController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
        $action = 'c';
        $ratingTypes = RatingType::paginate(15);
		return view('admin.reviews.types.index', compact('action', 'ratingTypes'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$action = 'c';
        $ratingTypes = RatingType::all();
        return view('admin.reviews.types.index', compact('action', 'ratingTypes'));
    }

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
        //dd('up');
		RatingType::create($request->all());
        return redirect('admin/reviews/types');
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
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        $action = 'e';
        $ratingTypes = RatingType::all();
        $rating = RatingType::findOrFail($id);
      //  dd($rating);
        return view('admin.reviews.types.index', compact('action', 'ratingTypes', 'rating'));
	}

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @param Request $request
     * @return Response
     */
	public function update($id, Request $request)
	{
        //dd($request->all());
        $ratingType = RatingType::findOrFail($id);
        $ratingType->update($request->all());
        return redirect('admin/reviews/types');
    }

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		RatingType::destroy($id);
        return redirect('admin/reviews/types');
    }

}
