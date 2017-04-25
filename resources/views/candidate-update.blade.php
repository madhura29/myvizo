@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Update Candidate</div>
                <div class="panel-body">
               
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('edit-candidate-new',[$users[0]->id]) }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('candidate_name') ? ' has-error' : '' }}">
                            <label for="candidate_name" class="col-md-4 control-label">Candidate Name</label>

                            <div class="col-md-6">
                                <input id="candidate_name" type="text" class="form-control" name="candidate_name" value="<?php  if (isset($users[0]->candidate_name))
            													    {{ echo $users[0]->candidate_name; }}
        													 ?>" >

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
                                <input id="candidate_email" type="email" class="form-control" name="candidate_email" value="<?php  if (isset($users[0]->candidate_name))
                                                                    {{ echo $users[0]->candidate_email; }}
                                                             ?>" >

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
                                <input id="candidate_mobile" type="text" class="form-control" name="candidate_mobile" value="<?php  if (isset($users[0]->candidate_name))
                                                                    {{ echo $users[0]->candidate_mobile; }}
                                                             ?>" >

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
                                    Update
                                </button>

                                <a href="{{ url('/all-users') }}"><button type="button" class="btn btn-primary">Back</button></a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
