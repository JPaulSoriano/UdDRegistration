@extends('layouts.publicapp')

@section('content')

<div class="container">
@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p class="text-center h1">{{ $message }}</p>
    </div>
@endif
    <div class="row mt-5">
        <div class="col-lg-12">
            <div class="jumbotron ">
            <h1 class="display-4">Welcome to </br> <span class="font-weight-bold">Colegio de Dagupan!</span></h1>
            <p class="lead">Please select the service you wish to process.</p>
            <hr class="my-4">
            <a href="/process" type="button" class="btn btn-lg btn-block btn-primary">Online Registration</a>
            <a href="{{ route('status') }}" type="button" class="btn btn-lg btn-block btn-primary">Enrollment Status</a>
            </div>
        </div>
    </div>


</div>
@endsection
