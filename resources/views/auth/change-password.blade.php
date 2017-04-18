@extends('layouts.app')

@section('content')
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="//code.jquery.com/jquery-1.9.1.js"></script>
<script type="text/javascript" src="{!! asset('js/jquery.validate.min.js') !!}"></script>

<script type="text/javascript">
 $(function() {
     alert('okkkk');  
    $("#accountForm").validate({
    	alert('okkkkkkkkkkkkkkkk');
         // Specify the validation rules
        rules: {
            password: {
                required: true,
                minlength: 5
            },
            password_confirm: {
                required: true,
                minlength: 5
            }
        },
        
        // Specify the validation error messages
        messages: {
            password: {
                required: "Please provide a password",
                minlength: "Your password must be at least 5 characters long"
            },
            password_confirm: {
            	required: "please provide a password",
            	minlength: "Your password must be at least 5 characters long",
			}
          },
        
        submitHandler: function(form) {
            form.submit();
        }
    });

  });
 

</script>



<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                <div class="panel-body">
                    <form class="form-horizontal" name="accountForm" id="accountForm" role="form" method="POST" action="{{ route('change-password-setting') }}">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="old-password" class="col-md-4 control-label">Old Password</label>

                            <div class="col-md-6">
                                <input id="old-password" type="password" class="form-control" name="old-password">
                            </div>
                        </div>
							
							<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password_confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password_confirm" type="password" class="form-control" name="password_confirm">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                   Submit
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
