<?php namespace App\Http\Controllers\Super\Cars;

use App\Entity\Hotel\Category;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class CategoriesController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{

		$action = null;
		return view('admin.tours.tour-category');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{

		return view('admin.tours.category');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		Category::create($request->all());
		return redirect('admin/tour/category');
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
	 * @param Request $request
	 * @param $category
	 * @return Response
	 * @internal param int $id
	 */
	public function edit(Request $request, $category)
	{

		return view('admin.tours.category');
	}

	/**
	 * Update the specified resource in storage.
	 * @param Request $request
	 * @param $category
	 * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
	 */
	public function update(Request $request, $category)
	{

		return redirect('admin/tour/category');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{

		return redirect('admin/tour/category');
	}

}
