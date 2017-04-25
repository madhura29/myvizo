
@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="list-group">
              <a href="{{ url("/payment") }}" class="list-group-item">Payment</a>
              <a href="{{ url("/all-users") }}" class="list-group-item">Candidate Management</a>
            </div>
        </div>
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">Welcome to Dashboard</div>

                <div class="panel-body">
                   Dashoard.......!!
                </div>
            </div>
        </div>
    </div>
   
</div>
@endsection


    