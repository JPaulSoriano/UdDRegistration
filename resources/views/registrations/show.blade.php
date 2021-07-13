@extends('layouts.publicapp')

@section('content')
<div class="container">

@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p class="text-center h1">{{ $message }}</p>
    </div>
@endif

<div class="jumbotron shadow">
<h4 class="font-weight-bold text-center text-danger">Important Notice: Please Save your Reference Number!</h4>
<hr class="my-4">
<p class="font-weight-bold text-center h1">Registration Reference Number: </p>
<p class="font-weight-light h2 text-center">{{ $registration->reg_ref }}</p>
<hr class="my-4">
<p class="font-weight-bold text-center">We sent an email. Please always check your email! Also check your spam incase you did not receive in primary mail.</p>
<p class="font-weight-bold text-center">This reference number is important. You can use it to check the status of your registration.</p>
</div>



</div>
@endsection
