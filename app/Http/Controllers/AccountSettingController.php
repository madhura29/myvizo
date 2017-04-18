<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
class AccountSettingController extends Controller
{
    //// change password functionality 

    public function index(){

    	return view('auth.change-password');
    }
    public function change_password()
    {
    	//dd(request()->all());
         $user_id = Auth::user()->id;
         $old_password = bcrypt(request('old-password'));
         $new_password = bcrypt(request('password'));
         $password_confirm = bcrypt(request('password_confirm'));
       		
	     //update query to change password 
	     DB::table('users')
	    ->where('id', $user_id)  // find your user by their email
	    ->limit(1)  // optional - to ensure only one record is updated.
	    ->update(array('password' => $new_password));
	    return view('auth.change-password');

    }
}
