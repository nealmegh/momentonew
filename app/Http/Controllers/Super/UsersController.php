<?php namespace App\Http\Controllers\Super;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\UsersRequest;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Intervention\Image\Facades\Image;
use Laracasts\Flash\Flash;
use Mail;

class UsersController extends Controller {

	/**
	 * Display a listing of the resource.
	 * @return Response
	 */
	public function index(Request $request)
	{
		$users = User::all()->sortByDesc('created_at');
    //    $users[0]->role;

        if($request->has('manage')){
            $page = Input::get('manage');
            switch($page) {
                case "admins":
                    return view('admin.users.admin-users.index', compact('users'));
                    break;
                case "agents":
                    return view('admin.users.agents.index', compact('users'));
                    break;
                case "customers":
                    return view('admin.users.customers.index', compact('users'));
                    break;
                case "user-roles":
                    if($request->has('assign') == 'role') {
                        $user = User::findORFail($request->get('user_id'));
                        return view('admin.users.roles.role-assign', compact('user'));
                    } else {
                        return view('admin.users.roles.user-roles', compact('users'));
                    }
                    break;
            }
        }else{
            return view('admin.users.index', compact('users'));
        }
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('admin.users.create-user');
	}

	public function store(UsersRequest $request)
	{
        $birth_date = date("d-m-Y", strtotime($request->date.'-'.$request->month.'-'.$request->year));
        $request = array_add($request, 'birth_date', $birth_date);

        $user =	User::create($request->all());
        // or eloquent's original technique
        $user->roles()->attach(5); // Register User ID = 5
        $file = Input::file('file');
        if (!file_exists('images/users/'.$user->id)) {
            mkdir('images/users/'.$user->id);
        }

        if(isset($file)) {
            $filename = $user->first_name . '.jpg';
            $destinationPath = 'images/users/' . $user->id;
            $galleryImage = Image::make($file)->fit(270, 265);
            $galleryImage->save($destinationPath . '/' . $filename);
            $user->profilePicture()->create(['path' => $destinationPath, 'name' => $filename, 'type' => 'profile']);
        }else {
            $user->profilePicture()->create(['path' => 'images', 'name' => 'no-image.png', 'type' => 'profile']);
        }
            $mail_details = array('name'=>$user->first_name, 'email'=> $user->email, 'password'=> $request->password, 'p_message'=>'Thank you for registration');

        Mail::send('emails.welcome', $mail_details, function($message) use ($mail_details)
        {
            $message->to($mail_details['email'], $mail_details['name'])->subject('Welcome! to Momento');
        });
		Flash::success('User Created Successfully!');
		return redirect('admin/users/'.$user->id);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param    $user
	 * @return Response
	 */
	public function show($user)
	{
		$user = User::findOrFail($user);
		return view('admin.users.user-profile', compact('user'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $user
	 * @return Response
	 */
	public function edit($user)
	{
		$user = User::findOrfail($user);
		return view('admin.users.edit-user', compact('user'));
	}

	/**
	 * @param User $user
	 * @param UserRequest $request
	 * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
	public function update($user, UsersRequest $request)
	{
//        dd($request->all());
		$user = User::findOrFail($user);
        $file = Input::file('file');

        if (!file_exists('images/users/'.$user->id)) {
            mkdir('images/users/'.$user->id);
        }

        if(isset($file)) {
            $filename = $user->first_name . '.jpg';
            $destinationPath = 'images/users/' . $user->id;
            $galleryImage = Image::make($file)->fit(270, 265);
            $galleryImage->save($destinationPath . '/' . $filename);
            $user->profilePicture()->create(['path' => $destinationPath, 'name' => $filename, 'type' => 'profile']);
        }

		$user->update($request->all());
		Flash::success('User Updated Successfully!');

		return redirect('admin/users/'.$user->id);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $user
	 * @return Response
	 */
	public function destroy($user)
	{
		User::destroy($user);
		Flash::success('User deleted Successfully!');
		return Redirect::back();
	}

    public function UserProfile()
    {
        $user_id = Auth::id();
        $user = User::findOrFail($user_id);
        return view('admin.users.user-profile', compact('user'));
    }

    public function roleUpdate(Request $request)
    {
        $user = User::findOrFail($request->user_id);
        $roles = Role::all();

        foreach ($roles as $role) {
            $userRole =$user->roles()->where('role_id', '=', $role->id)->get();
          //  echo $userRole;

            if(count($userRole) <= 0) {
                if($request->has($role->name)) {
                    $user->attachRole($role);
                }
            } else {
                if(!$request->has($role->name)) {
                    $user->detachRole($role);
                }
            }
        }

//        dd($request->all());
//
//
//        $owner =$user->roles()->where('role_id', '=', $request->owner)->get();
//        $admin =$user->roles()->where('role_id', '=', $request->admin)->get();
//        $agent =$user->roles()->where('role_id', '=', $request->agent)->get();
//        $manager =$user->roles()->where('role_id', '=', $request->manager)->get();
//        $register =$user->roles()->where('role_id', '=', $request->register)->get();
//
//
//
//
//        if($owner->count() > 0) {
//            $user->detachRole($owner);
//        }else {
//            $user->attachRole($owner);
//        }
//
//        if($admin->count() > 0) {
//            $user->detachRole($admin);
//        }else {
//            $user->attachRole($admin);
//        }
//
//        if($agent->count() > 0) {
//            $user->detachRole($agent);
//        }else {
//            $user->attachRole($agent);
//        }
//
//        if($manager->count() > 0) {
//            $user->detachRole($manager);
//        }else {
//            $user->attachRole($manager);
//        }
//
//        if($register->count() > 0) {
//            $user->detachRole($register);
//        }else {
//            $user->attachRole($register);
//        }

        Flash::success('Assign Roles Successfully!');
        return Redirect::back();

    }

}
