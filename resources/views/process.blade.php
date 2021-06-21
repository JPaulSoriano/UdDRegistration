@extends('layouts.publicapp')

@section('content')

<div class="container">

    <div class="row mt-5">
        <div class="col-lg-12">
            <div class="jumbotron ">
            <h1 class="display-4">Registration Process</h1>
            <p class="lead">To complete the registration process, a photo/screenshot of your transaction of your registration fee (Php 500.00) through bank or remittance center is needed. Please check the following instructions and details for the payment options:</p>
            <h4 class="font-weight-bold">A. BPI BANK</h4>
            <p><span class="font-weight-bold">Account Name:</span> Colegio de Dagupan, Inc. or Colegio de Dagupan</br>
            <span class="font-weight-bold">Account Number:</span> 000555-2338-84</br>
            <span class="font-weight-bold">Branch:</span> Dagupan City
            </p>
            <h4 class="font-weight-bold">B. REMITTANCE CENTERS (Palawan Express / Cebuana Lhullier / LBC / Western Union)</h4>
            <p>Fill-out correctly and completely the transaction information at the remittance center. Send your payment to:</br>
            <span class="font-weight-bold">Name:</span> JERWIN BUSTAMANTE FAJARDO</br>
            <span class="font-weight-bold">Address:</span> COLEGIO DE DAGUPAN</br>
            <span class="font-weight-bold"> Mobile No. :</span> 0916-463-1374
            <p>
            <p>Mr. FAJARDO was authorized by our College President to process our transactions and to collect the payments sent through remittance centers.</p>
            <hr class="my-4">
            <a href="{{ route('registrations.create') }}" type="button" class="btn btn-lg btn-block btn-primary">Proceed</a>
            </div>
        </div>
    </div>


</div>
@endsection
