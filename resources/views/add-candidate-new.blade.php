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
                                   <div class="form-group  {{ $errors->has('name') ? ' has-error' : '' }} " id="formDiv">
                                        <div class="col-md-6 col-md-offset-2">
                                            <label for="name">Name</label>
                                            <input type="text" class="form-control" name="name[]" id="name" required>

                                             @if ($errors->has('name'))
                                              <span class="help-block">
                                                  <strong>{{ $errors->first('name') }}</strong>
                                              </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group" id="formDiv">
                                        <div class="col-md-6 col-md-offset-2">
                                            <label for="candidate_email">Email</label>
                                            <input type="email" class="form-control" name="candidate_email[]" id="candidate_email" required>
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
<div>
@foreach ($errors->all() as $error)
    {{ $error }}<br/>
@endforeach
</div>
<!-- sweet alert js -->
<script src="https://cdn.jsdelivr.net/sweetalert2/6.6.1/sweetalert2.min.js"></script>
<!-- jquery js -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>

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
                                   <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}" id="formDiv">
                                        <div class="col-md-6 col-md-offset-2">
                                            <label for="name">Name</label>
                                            <input type="text" class="form-control" name="name[]" id="name" required>

                                            @if ($errors->has('name'))
                                              <span class="help-block">
                                                  <strong>{{ $errors->first('name') }}</strong>
                                              </span>
                                            @endif
                                        </div>
                                    </div>
                                 
                                    
                                    
                                    <div class="form-group" id="formDiv">
                                        <div class="col-md-6 col-md-offset-2">
                                            <label for="candidate_email">Email</label>
                                            <input type="email" class="form-control" name="candidate_email[]" id="candidate_email" required>
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
                       
           $("#sbmt").click(function(e){
          var names =  document.getElementsByName('name[]');
          var emails = document.getElementsByName('candidate_email[]');
          var phones = document.getElementsByName('phone[]');
          var candidate = [];
          var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
           


              for(var i = 0; i < names.length; i++) {
                 if (!names[i].value || !emails[i].value || !phones[i].value) {

                   
                       swal({
                              title: 'Opps! fill all the fields',
                              width: 600,
                              padding: 100,
                              background: '#fff url(//bit.ly/1Nqn9HU)'
                        })
                  
                 }

                if((names[i].value !=null) && (emails[i].value != null) && (phones[i].value != null)){
                     let c = {
                        name: names[i].value,
                        email: emails[i].value,
                        phone: phones[i].value
                      };

                     candidate.push(c);
                } 

              
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

@endsection
