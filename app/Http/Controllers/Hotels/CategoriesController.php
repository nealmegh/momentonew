<?php namespace App\Http\Controllers\Hotels;

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
		$categories = Category::paginate(15);
		$action = null;
		return view('admin.hotels.template.category', compact('categories', 'action'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
	
		$action = 'c';
		$categories = Category::all();
		return view('admin.hotels.template.category', compact('action', 'categories'));
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
		return redirect('admin/hotels/category');
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
		$action = 'e';
		$categories = Category::all();
		$category= Category::findOrFail($category);
		return view('admin.hotels.template.category', compact('action', 'categories', 'category'));
	}

	/**
	 * Update the specified resource in storage.
	 * @param Request $request
	 * @param $category
	 * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
	 */
	public function update(Request $request, $category)
	{
		$category  = Category::findOrFail($category);
		$category->update($request->all());
		return redirect('admin/hotels/category');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Category::destroy($id);
		return redirect('admin/hotels/category');
	}

}
