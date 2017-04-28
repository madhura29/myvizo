<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notifications\InvoicePaid;


use DB;
use auth;
use App\User;
use Redirect;
use Session;
use App\Candidate;
use Alert;

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
         $tasks = DB::table('tbl_candidate')->orderBy('id','desc')->paginate(10);
         return view('all-user')->with(['users' => $tasks]);
    }

   
    public function listCandidate(){
            return view('add-candidate-new');
    }

    public function addCandidate(Request $request) {

             $candidates = ($request->candidates); //Get all candidates

                       
                foreach ($candidates as $key => $value) { //loop via each candidate
                    $c = new Candidate; //create new candidate object
                    $c->candidate_name = $value['name'];
                    $c->candidate_email = $value['email'];
                    $c->candidate_mobile = $value['phone'];
                    //$c->notify(new InvoicePaid($invoice));
                    //Notification::send($c->candidate_email, new InvoicePaid($invoice));

                    $c->save(); //save candidate
                }
                return response()->json(['msg' => 'Candidates inserted']);
     }

         public function delCandidate($id){
            DB::delete('delete from tbl_candidate where id = ?',[$id]);
             \Session::flash('message', 'Candidate Deleted Successfully!'); //flash message
             // Alert::message('Robots are working!');
             return redirect('/all-users');
            
            
         }

         public function showCandidate($id)
         {      $users = DB::select('select * from tbl_candidate where id = ?',[$id]);
                return view('candidate-update',['users'=>$users]);
         }

         public function updateCandidate(Request $request,$id)
        {
              // form validation 
                 $this->validate(request(),[
                    'candidate_name' => 'required|max:20',
                    'candidate_email' =>'required|email',
                    'candidate_mobile' => 'required|min:10|max:11'
                    
                 ]);
              $candidate_name = $request->input('candidate_name');
              $candidate_email = $request->input('candidate_email');
              $candidate_mobile = $request->input('candidate_mobile');
              DB::update('update tbl_candidate set candidate_name = ?,candidate_email = ? ,candidate_mobile = ?  where id = ?',[$candidate_name,$candidate_email,$candidate_mobile,$id]);
              
              \Session::flash('message', 'Candidate Updated Successfully!');
              return redirect('/all-users');
              
         }

    }
