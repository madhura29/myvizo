<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use Hash;
use Redirect;
use Session;
class AccountSettingController extends Controller
{
    //// change password functionality 

    public function index(){

    	return view('auth.change-password');
    }
    public function change_password()
    {
    	
         $user_id = Auth::user()->id;
         $user_password = Auth::user()->password;
         $old_password = request('old-password');
         $new_password = bcrypt(request('password'));
         $password_confirm = bcrypt(request('password_confirm'));


            /* // form validation 
             $this->validate(request(),[
                'old_password' => 'required|max:20',
                'new_password' => 'required|max:20',
                'password_confirm' => 'required|max:20',
             ]);*/

             if(!Hash::check($old_password, $user_password )){
                
                 return Redirect::to('change-password')->withFlashMessage('Your old Password is incorrect');
             }
             else{
               
                //update query to change password 
                DB::table('users')
                ->where('id', $user_id)  // find your user by their user id
                ->limit(1)  // optional - to ensure only one record is updated.
                ->update(array('password' => $new_password));
                //return view('auth.change-password');
                return Redirect::to('change-password')->withFlashMessage('Password changed Sucessfully');
               }
         }


 }
