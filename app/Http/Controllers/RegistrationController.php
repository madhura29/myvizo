<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;

use App\Mail\Welcomemail;
use mail;


class RegistrationController extends Controller
{
    //

    public function registerform()
    {
        return view('auth.registerform');
    }


    public function register_user()
    {
              
               // post method to get data from the registration form 

               $name = request('name');
               $email = request('email');
               $password = bcrypt(request('password'));
              //$password_confirmation = request('password_confirmation');
               $organisation_name = request('organisation_name');
               $contact_no = request('contact_no');
               $address = request('address');

               $user = ['name' =>$name,
                         'email' => $email,'password' =>$password,
                         'organisation_name' => $organisation_name,
                         'contact_no' => $contact_no,
                         'address' => $address];
              
                // form validation 
                 $this->validate(request(),[
                    'name' => 'required|min:6|max:10',
                    'password' => 'required',
                    'password_confirmation' => 'required',
                    'organisation_name' => 'required',
                 ]);
                 
             // insert data into users table
                DB::table('users')->insert(
               ['name' => $name, 'email' => $email, 'password' => $password, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),'organisation_name' => $organisation_name, 'contact_no' => $contact_no,'address' =>$address]
               );

                //mail sending
              \Mail :: to ($email)->send(new Welcomeemail);

              return view('auth.register1');
    }

}
