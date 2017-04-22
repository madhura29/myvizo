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
    @if (Session::has('flash_message'))
        <div class="alert alert-warning alert-dismissable" style="text-align: center;">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>{{ Session::get('flash_message') }}</strong> 
        </div>
    @endif

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                <div class="panel-body">
                    <form class="form-horizontal" name="accountForm" id="accountForm" role="form" method="POST" action="{{ route('change-password-setting') }}">
                        {{ csrf_field() }}

                        <div class="form-group {{ $errors->has('old_password') ? ' has-error' : '' }}">
                            <label for="old-password" class="col-md-4 control-label">Old Password</label>

                            <div class="col-md-6">
                                <input id="old-password" type="password" class="form-control" name="old-password">

                                 @if ($errors->has('old_password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('old_password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
							
						  <div class="form-group{{ $errors->has('new_password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password">

                                @if ($errors->has('new_password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('new_password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('new_password') ? ' has-error' : '' }}">
                            <label for="password_confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password_confirm" type="password" class="form-control" name="password_confirm">

                                @if ($errors->has('password_confirm'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirm') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                   Save
                                </button>
                                
                               <a href="{{ url('/home') }}"><button type="button" class="btn btn-primary">Back</button></a>
                            </div>
                            
                        </div>
                    </form>
                  
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
