@extends('layouts.publicapp')

@section('content')
<div class="container">

@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p class="text-center h1">{{ $message }}</p>
    </div>
@endif

<div class="jumbotron shadow">
<p class="font-weight-bold text-center">Important Notice: Please Save your Reference Number!</p>
<hr class="my-4">
<p class="font-weight-bold text-center h1">Regisration Reference Number: </p>
<p class="font-weight-light h2 text-center">{{ $registration->reg_ref }}</p>
<hr class="my-4">
<p class="font-weight-bold text-center">this reference number is important. you can use it to check the status of your registration.</p>
</div>



</div>
@endsection
