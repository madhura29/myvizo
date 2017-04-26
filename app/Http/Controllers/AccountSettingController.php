<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\User;

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
    public function change_password(Request $request)
    {
    	
         $user_id = Auth::user()->id;

         $user_password = Auth::user()->password;
         
            $this->validate($request,[
            'password' => 'required|confirmed',
            'password_confirmation' => 'required',
            'old_password' => 'required'
        ]);

        if (Hash::check($request->old_password, $user_password)) { 
            $user_password = Hash::make($request->password);
            //$user = new User;
            //$user->save();
             DB::table('users')
                    ->where('id', $user_id)  // find your user by their user id
                    ->limit(1)  // optional - to ensure only one record is updated.
                    ->update(array('password' => $user_password));
            return Redirect::to('change-password')->withFlashMessage('Password changed Sucessfully');
           
        }else{
              
            return Redirect::to('change-password')->withFlashMessage('Your old Password is incorrect');   
        }


           /*        // form validation 
              $this->validate(request(),[
                'old-password' => 'required|max:20',
                'new_password' => 'required|max:20',
                //'password_confirm' => 'required|max:20',
                 'password_confirm' => 'required',
             ]);

              if(Hash::check($old_password, $user_password )){
                    
                    //update query to change password 
                    DB::table('users')
                    ->where('id', $user_id)  // find your user by their user id
                    ->limit(1)  // optional - to ensure only one record is updated.
                    ->update(array('password' => $new_password));
                    //return view('auth.change-password');
                    return Redirect::to('change-password')->withFlashMessage('Password changed Sucessfully');
                }
                else {
                    return Redirect::to('change-password')->withFlashMessage('Your old Password is incorrect');
                }*/

             
         }


 }
