@extends('layouts.app')

@section('content')

<div class="container">
@if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
@endif
@role('Super Admin')
    <div class="row justify-content-center">
            <div class="col-sm-4 my-3">
                <a href="{{ route('fyear') }}" type="button" class="btn btn-lg btn-block btn-primary p-5"><h3>First year</h3><h1 class="font-weight-bold text-info">{{ $fyear}}</h1></a>
            </div>
            <div class="col-sm-4 my-3">
                <a href="{{ route('rtoday') }}" type="button" class="btn btn-lg btn-block btn-primary p-5"><h3>Registered Today</h3><h1 class="font-weight-bold text-info">{{ $rtoday}}</h1></a>
            </div>
            <div class="col-sm-4 my-3">
                <a href="{{ route('total') }}" type="button" class="btn btn-lg btn-block btn-primary p-5"><h3>Total</h3><h1 class="font-weight-bold text-info">{{ $total}}</h1></a>
            </div>
            <div class="col-sm-4 my-3">
                <a href="{{ route('verified') }}" type="button" class="btn btn-lg btn-block btn-primary p-5"><h3>Not Yet Verified</h3><h1 class="font-weight-bold text-info">{{ $verified}}</h1></a>
            </div>
            <div class="col-sm-4 my-3">
                <a href="{{ route('admission') }}" type="button" class="btn btn-lg btn-block btn-primary p-5"><h3>Not Yet Admitted</h3><h1 class="font-weight-bold text-info">{{ $admission}}</h1></a>
            </div>
            <div class="col-sm-4 my-3">
                <a href="{{ route('enrollment') }}" type="button" class="btn btn-lg btn-block btn-primary p-5"><h3>Not Yet Enrolled</h3><h1 class="font-weight-bold text-info">{{ $enrollment}}</h1></a>
            </div>
            <div class="col-sm-4 my-3">
                <a href="{{ route('screenshot') }}" type="button" class="btn btn-lg btn-block btn-primary p-5"><h3>No Screenshot</h3><h1 class="font-weight-bold text-info">{{ $screenshot}}</h1></a>
            </div>
        </div>
    </div>
@endrole

@role('Sao|Dean|Cashier')
<div class="row justify-content-center">
    <div class="col-sm-8">
        <div class="jumbotron">
            <img src="{{ asset('images/logo.png') }}" class="img-responsive center-block d-block mx-auto my-3" style="height: 150px">
            <h3 class="text-primary font-weight-bold text-center">CdD Online Registration</h3>
            <hr class="my-4">
                <div class="h1 text-center font-weight-bold text-primary">
                WELCOME {{ Auth::user()->name }}!
                </div>
        </div>
    </div>
</div>
@endrole
</div>
@endsection
