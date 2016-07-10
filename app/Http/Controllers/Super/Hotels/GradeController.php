<?php namespace App\Http\Controllers\Super\Hotels;

use App\Entity\Hotel\Grade;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class GradeController extends Controller {

	public function index()
	{
		$grades = Grade::paginate(15);
		$action = null;
		return view('admin.hotels.template.grade', compact('grades', 'action'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$action = 'c';
		$grades = Grade::all();
		return view('admin.hotels.template.grade', compact('action', 'grades'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		Grade::create($request->all());
		return redirect('admin/hotels/grade');
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
		$grades = Grade::all();
		$grade= Grade::findOrFail($id);
		return view('admin.hotels.template.grade', compact('action', 'grades', 'grade'));
	}

	/**
	 * Update the specified resource in storage.
	 * @param Request $request
	 * @param Grade $grade
	 * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
	 */
	public function update(Request $request, $grade)
	{
		$grade  = Grade::findOrFail($grade);
		$grade->update($request->all());
		return redirect('admin/hotels/grade');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Grade::destroy($id);
		return redirect('admin/hotels/grade');
	}

}
