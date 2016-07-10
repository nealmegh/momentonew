<?php namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\User;

class UsersRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
//		return [
//            'email' => 'required|email|unique:users',
//            'first_name' => 'required',
//            'last_name' => '',
//            'country_code' => '', //new add
//            'phone_no' => 'required',
//            'birth_date' => 'date',
//            'address' => 'required',
//            'city' => 'required',
//            'zip' => 'integer',
//            'country' => 'required',
//            'about' => 'max:160'
//		];

        $user = User::find($this->users);

        switch($this->method())
        {
            case 'GET':
            case 'DELETE':
            {
                return [];
            }
            case 'POST':
            {
                return [
                    'email' => 'required|email|unique:users',
                    'first_name' => 'required',
                    'last_name' => '',
                    'country_code' => '', //new add
                    'phone_no' => 'required',
                    'birth_date' => 'date',
                    'address' => 'required',
                    'city' => 'required',
                    'zip' => 'integer',
                    'country' => 'required',
                    'about' => 'max:160'
                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                return [
                    'email'      => 'required|email|unique:users,email,'.$user->id,
                    'first_name' => 'required',
                    'last_name' => '',
                    'country_code' => '', //new add
                    'phone_no' => 'required',
                    'birth_date' => 'date',
                    'address' => 'required',
                    'city' => 'required',
                    'zip' => 'integer',
                    'country' => 'required',
                    'about' => 'max:160'
                ];
            }
            default:break;
        }
	}

}
