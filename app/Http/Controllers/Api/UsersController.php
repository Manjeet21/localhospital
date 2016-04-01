<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    public function show($id)
    {
    	return ['status'=>$id];
    }

    public function register()
    {
		 // validate feilds
        $rules = array(
            'name' => 'required',
            'mobile' => 'required|Integer|between:1,10',
            'email' => 'required|email|unique:user',
            'password' => 'required',
            'address' => 'required',
            'user_type' => 'required',
            'gender' => 'required',
            'dob' => 'required'
        );

        //check validator
        $valid = \Validator::make(Input::all(), $rules);
        if($valid->passes())
        {
            return ['status'=>'new'];
        }
        // if validator fails then bad request
        else {
            return \Response::make($valid->messages(), 400);
        }
    }
}
