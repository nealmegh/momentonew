<?php namespace App\Http\Controllers\Super\Reviews;

use App\Entity\Comment;
use App\Entity\Hotel\Hotel;
use App\Entity\Tour\Tour;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ReviewsController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Response
     */
	public function index(Request $request)
	{
        $filter = $request->get('filter');

        switch ($filter) {
            case 'hotel':
                $comments = Comment::where('commentable_type', '=', 'App\Entity\Hotel\Hotel')->paginate(10);
                return view('admin.reviews.index', compact('comments' , 'filter'));
                break;
            case 'tour':
                $comments = Comment::where('commentable_type', '=', 'App\Entity\Tour\Tour')->paginate(10);
                return view('admin.reviews.index', compact('comments' , 'filter'));
                break;
            default :
                $comments = Comment::paginate(10);
                return view('admin.reviews.index', compact('comments' , 'filter'));
                break;
        }
	}

	/**
	 * Show the form for creating a new resource.
	 * Create form frontend
	 * @return Response
	 */
	public function create()
	{
		//
	}

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
	public function store(Request $request)
	{
//        dd($request->all());
        $filter = $request->service;
//        dd($filter);
        switch ($filter) {
            case 'hotel':
                $hotel = Hotel::findOrFail($request->hotel_id);
                $request = array_add($request, 'status', '1');
                $comment = $hotel->comments()->create($request->all());
                foreach($request->ratings as $rating) {
                    $rating = array_add($rating, 'comment_id', $comment->id);
                    $hotel->ratings()->create($rating);
                }
                break;
            case 'tour':
                $tour = Tour::findOrFail($request->tour_id);
                $request = array_add($request, 'status', '1');
                $comment     = $tour->comments()->create($request->all());
                foreach($request->ratings as $rating) {
                    $rating = array_add($rating, 'comment_id', $comment->id);
                    $tour->ratings()->create($rating);
                }
                break;
        }

        return Redirect::back();
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
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
