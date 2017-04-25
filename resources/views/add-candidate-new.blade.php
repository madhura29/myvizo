@extends('layouts.app')
@section('content')

<div class="container">
<a href="{{ url('/all-users') }}"><button type="button" class="btn btn-primary" style="float: left;">Back</button></a>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
             <div class="panel panel-default">
                    <div class="panel-heading">Add Candidate</div>
                       <div class="panel-body">
                        <form  class="form-horizontal"  id="fields" name="fields">
                            
                            <div id="formMainDiv">
                                   <div class="form-group" id="formDiv">
                                        <div class="col-md-6 col-md-offset-2">
                                            <label for="name">Name</label>
                                            <input type="text" class="form-control" name="name[]" id="name" required autofocus>
                                        </div>
                                    </div>
                                 
                                    <div class="form-group" id="formDiv">
                                        <div class="col-md-6 col-md-offset-2">
                                            <label for="email">Email</label>
                                            <input type="email" class="form-control" name="email[]" id="email" required>
                                        </div>
                                    </div>
                                  
                                    <div class="form-group" id="formDiv">
                                         <div class="col-md-6 col-md-offset-2">
                                                 <label for="phone">Phone</label>
                                                 <input type="text" class="form-control" name="phone[]" id="phone" required>
                                        </div>
                                    </div>
                            </div>
                        </form>
                   
                
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-2">
                                <input type="button" name="submit" value="Submit" class="btn btn-success" id="sbmt" />
                                <button id="addMore" class="btn btn-primary"> Add More</button>
                                <button id="removeButton" class="btn btn-danger"> Remove</button><br><br>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>



<!------------------------------------------------- -->

<!-- <div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Add Candidate</div>
                <div class="panel-body">
               
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('add-candidate-new') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('candidate_name') ? ' has-error' : '' }}">
                            <label for="candidate_name" class="col-md-4 control-label">Candidate Name</label>

                            <div class="col-md-6">
                                <input id="candidate_name" type="text" class="form-control" name="candidate_name[]" value="<?php  if (isset($users[0]->candidate_name))
            													    {{ echo $users[0]->candidate_name; }}
        													 ?>" autofocus>

                                @if ($errors->has('candidate_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('candidate_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('candidate_email') ? ' has-error' : '' }}">
                            <label for="candidate_email" class="col-md-4 control-label">Candidate E-Mail </label>

                            <div class="col-md-6">
                                <input id="candidate_email[]" type="email" class="form-control" name="candidate_email" value="{{ old('candidate_email') }}" >

                                @if ($errors->has('candidate_email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('candidate_email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('candidate_mobile') ? ' has-error' : '' }}">
                            <label for="candidate_mobile" class="col-md-4 control-label">Candidate Mobile</label>

                            <div class="col-md-6">
                                <input id="candidate_mobile[]" type="text" class="form-control" name="candidate_mobile" value="{{ old('candidate_mobile') }}" >

                                @if ($errors->has('candidate_mobile'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('candidate_mobile') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Save
                                </button>
                                &nbsp;&nbsp;
                                <a href="{{ url('/all-users') }}"><button type="button" class="btn btn-primary">Back</button></a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> -->

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/sweetalert2/6.6.1/sweetalert2.min.js"></script>

<script type="text/javascript">
 $(document).ready(function(){

    var counter = 1;
    $('#addMore').click(function(e){
        
        if(counter>4){
            alert("Only 5 textboxes allow");
            return false;
         }

         e.preventDefault();
        

        $('#fields').append(
                `
                    <br><br>
                    <div id="formMainDiv">
                                   <div class="form-group" id="formDiv">
                                        <div class="col-md-6 col-md-offset-2">
                                            <label for="name">Name</label>
                                            <input type="text" class="form-control" name="name[]" id="name" required>
                                        </div>
                                    </div>
                                 
                                    
                                    
                                    <div class="form-group" id="formDiv">
                                        <div class="col-md-6 col-md-offset-2">
                                            <label for="email">Email</label>
                                            <input type="email" class="form-control" name="email[]" id="email" required>
                                        </div>
                                    </div>
                                    
                                    
                                    <div class="form-group" id="formDiv">
                                         <div class="col-md-6 col-md-offset-2">
                                                 <label for="phone">Phone</label>
                                                 <input type="text" class="form-control" name="phone[]" id="phone" required>
                                        </div>
                                    </div>
                            </div>
                `
            );

        counter++;

          


        });//end of addMore button click

                // remove text field

                    $("#removeButton").click(function () {
                         //alert(counter);
                        if(counter==1){
                              swal({
                                      title: 'No more forms to remove !',
                                      width: 600,
                                      padding: 100,
                                      background: '#fff url(//bit.ly/1Nqn9HU)'
                                })
                              
                              return false;

                           }

                        counter--;
                            
                             $("#formMainDiv").remove();

                     });
                       
                    /*form vaidations

                        $("form[name='fields']").validate({
                    // Specify validation rules
                    rules: {
                      // The key name on the left side is the name attribute
                      // of an input field. Validation rules are defined
                      // on the right side
                      
                      email: {
                        required: true,
                        // Specify that email should be validated
                        // by the built-in "email" rule
                        email: true
                      },
                     phone: {
                        required: true,
                        minlength: 10
                      }
                    },
                    // Specify validation error messages
                    messages: {
                      email: "Please enter a valid email address",
                      phone: {
                        required: "Please provide a password",
                        minlength: "Your password must be at least 5 characters long"
                      },
                      
                    },
                    // Make sure the form is submitted to the destination defined
                    // in the "action" attribute of the form when valid
                    submitHandler: function(form) {
                      form.submit();
                    }
                  });*/ 

        /// end of form validations
         $("#sbmt").click(function(e){
            var names =  document.getElementsByName('name[]');
          var emails = document.getElementsByName('email[]');
          var phones = document.getElementsByName('phone[]');
          var candidate = [];
          var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

              for(var i = 0; i < names.length; i++) {
                let c = {
                  name: names[i].value,
                  email: emails[i].value,
                  phone: phones[i].value
                };
                 candidate.push(c);
            }// end of for loops
            
            let host = "http://localhost:8000";
              $.ajax({
                    type: "POST",
                    url: host + '/add-candidate',
                    headers: { 
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    },
                    data: {
                            "_token": "{{ csrf_token() }}",
                            candidates: candidate
                        },
                    success: function( msg ) {

                        swal('Candidate record is saved sucessfully!')
                         window.location = host + '/add-candidate'
                    }

             });
        
        });
    });

   

</script>
<!----------------------------- -->
@endsection
