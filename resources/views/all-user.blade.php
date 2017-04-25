@extends('layouts.app')
@section('content')
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 
    <script type="text/javascript">
      $(document).ready(function() {
        // show the alert
        setTimeout(function() {
            $(".alert").alert('close');
        }, 2000);
    });


    </script>
    @if (Session::has('message'))
        <div class="alert alert-success alert-dismissable" style="text-align: center;">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>{!! session('message') !!}</strong> 
        </div>
    @endif

        <div class="container">
            <a href="{{ url('/home') }}"><button type="button" class="btn btn-primary" style="float: left;">Back to Home</button></a>
            
             <a href="{{ url('/add-candidate') }}"><button type="button" class="btn btn-success" style="float: right;">Add New</button></a>
            <div class="row">
            <div class="col-md-8 col-md-offset-2">

                    <div class="panel panel-default">
                     <div class="panel-heading" style="text-align: center;"><strong>Candidates</strong></div>
                      <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr class="success">
                                        <th>Sr.No</th>
                                        <th>Candidate Name</th>
                                        <th>Email</th>
                                        <th>Mobile No</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                
                                     @foreach ($users as $task)
                                        <tr class="info">
                                            <td>{{ $task->id }}</td>
                                            <td>{{ $task->candidate_name }}</td>
                                            <td>{{ $task->candidate_email }}</td>
                                            <td>{{ $task->candidate_mobile}}</td>
                                            <td><a href="{{ route('del-candidate',[$task->id]) }}" onclick="return confirm('Are you sure to delete this candidate?');" ><span class="glyphicon glyphicon-trash"></span></a>
                                            &nbsp;&nbsp; &nbsp;&nbsp;
                                            <a href="{{ route('edit-candidate',[$task->id]) }}" ><span class="glyphicon glyphicon-pencil"></span></a></td>  
                                            
                                        </tr>
                                    @endforeach
                                </tbody>
                                </table>
                               </div>
                            </div>
                       </div>
                   </div>
              </div>

              <div class="col-md-8 col-md-offset-7"><strong>{{ $users->render() }}</strong></div>
    @endsection
    


