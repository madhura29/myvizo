<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use auth;
use App\User;
use Redirect;
use Session;


class CandidateManagementController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function all_users()
    {
         $tasks = DB::table('tbl_candidate')->get();
         return view('all-user')->with(['users' => $tasks, 'candidates' => '']);
    }

   
    public function listCandidate(){
            //return redirect('add-candidate');
    	    return view('add-candidate-new');
    }

    public function addCandidate() {
             
               $candidate_name = request('candidate_name');
               $candidate_email = request('candidate_email');
               $candidate_mobile = request('candidate_mobile');
              
                // form validation 
                 $this->validate(request(),[
                    'candidate_name' => 'required|max:20',
                    'candidate_email' => 'required',
                    'candidate_mobile' => 'required|min:10|max:11'
                 ]);
                 
             // insert data into candidate table
                DB::table('tbl_candidate')->insert([
                    'candidate_name' => $candidate_name, 
                    'candidate_email' => $candidate_email,  
                    'created_at' => date('Y-m-d H:i:s'), 
                    'updated_at' => date('Y-m-d H:i:s'),
                    'candidate_mobile' => $candidate_mobile ]);

            
                $tasks = DB::table('tbl_candidate')->get();
                \Session::flash('message', 'Candidate Created Successfully!');
                return view('all-user')->with(['users' => $tasks]);
        }

         public function delCandidate($id){
            DB::delete('delete from tbl_candidate where id = ?',[$id]);
            $tasks = DB::table('tbl_candidate')->get();
             \Session::flash('message', 'Candidate Deleted Successfully!');
            return view('all-user')->with(['users' => $tasks]);
         }

         public function showCandidate($id)
         {      $users = DB::select('select * from tbl_candidate where id = ?',[$id]);
                return view('candidate-update',['users'=>$users]);
         }

         public function updateCandidate(Request $request,$id)
         {
              $candidate_name = $request->input('candidate_name');
              $candidate_email = $request->input('candidate_email');
              $candidate_mobile = $request->input('candidate_mobile');
              DB::update('update tbl_candidate set candidate_name = ?,candidate_email = ? ,candidate_mobile = ?  where id = ?',[$candidate_name,$candidate_email,$candidate_mobile,$id]);
              $tasks = DB::table('tbl_candidate')->get();
              \Session::flash('message', 'Candidate Updated Successfully!');
              return view('all-user')->with(['users' => $tasks]);
         }

    }
