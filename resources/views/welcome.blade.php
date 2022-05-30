@extends('layouts.publicapp')

@section('content')

<div class="container">
@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p class="text-center h1">{{ $message }}</p>
    </div>
@endif
    <div class="row justify-content-center mt-5">
        <div class="col-lg-8 text-center">
            <div class="jumbotron ">
            {{-- <img src="{{ asset('images/logo.png') }}" class="img-responsive center-block d-block mx-auto my-3" style="height: 150px"> --}}
            <h1 class="text-primary font-weight-bold text-center">Universidad de Dagupan</h1>
            <h3 class="text-primary font-weight-bold text-center">Online Registration</h3>
            <hr class="my-4">
            <p class="lead">Please select the service you wish to process.</p>
            <a href="/process" type="button" class="btn btn-lg btn-primary my-1">Online Registration</a>
            <a href="{{ route('status') }}" type="button" class="btn btn-lg btn-primary my-1">Enrollment Status</a>
            <a href="{{ route('search.index') }}" type="button" class="btn btn-lg btn-primary my-1">Search Your Gsuite Accounts</a>
            </div>
        </div>
    </div>


</div>
@endsection
