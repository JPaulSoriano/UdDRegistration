@extends('layouts.publicapp')

@section('content')
<div class="container">

        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif



<form action="{{ route('registrations.update', $registration->id) }}" method="POST" enctype="multipart/form-data">
    	@csrf
        @method('PUT')

        <div class="card border-0 shadow-sm my-3">
                <div class="card-header bg-primary text-white">Payment</div>
            <div class="card-body">
                <div class="row">
                    <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="form-group">
                            <label>Payment Method</label>
                            <input type="text" name="payment_method" class="form-control" placeholder="Payment Method">
                        </div>
                    </div>

                    <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="form-group">
                            <label>Ref No</label>
                            <input type="text" name="payment_ref" class="form-control" placeholder="Payment Reference No">
                        </div>
                    </div>

                    <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="form-group">
                            <label>Screenshot | Picture</label>
                            <input  class="form-control" type="file" name="image">
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="card border-0 shadow-sm my-3">
            <div class="card-header bg-primary text-white">Payment Authorization</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-xs-4 col-sm-4 col-md-4">
                            <div class="form-group">
                                <label>First Name</label>
                                <input type="text" name="auth_first_name" class="form-control" placeholder="First Name">
                            </div>
                        </div>

                        <div class="col-xs-4 col-sm-4 col-md-4">
                            <div class="form-group">
                                <label>Middle Name</label>
                                <input type="text" name="auth_middle_name" class="form-control" placeholder="Middle Name">
                            </div>
                        </div>

                        <div class="col-xs-4 col-sm-4 col-md-4">
                            <div class="form-group">
                                <label>Last Name</label>
                                <input type="text" name="auth_last_name" class="form-control" placeholder="Last Name">
                            </div>
                        </div>


                    </div>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
</form>


</div>
@endsection
