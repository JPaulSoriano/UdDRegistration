@extends('layouts.publicapp')


@section('content')
<div class="container">
    <div class="row my-3">
        <div class="col-lg-12">
 


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

       
                <form action="{{ route('registrations.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="card border-0 shadow-sm my-3">
                                <div class="card-header bg-primary text-white">For</div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-xs-4 col-sm-4 col-md-4">
                                                <div class="form-group">
                                                    <label>School Year</label>
                                                    <input type="text" name="year" class="form-control" placeholder="Year">
                                                </div>
                                                <div class="mt-0">
                                                    <p class="text-lead">Example: 2020-2021</p>
                                                </div>
                                            </div>
                                            <div class="col-xs-4 col-sm-4 col-md-4">
                                            <div class="form-group">
                                                        <label>Semester</label>
                                                        <select class="form-control" name="semester">
                                                            <option value="0">First Semester</option>
                                                            <option value="1">Second Semester</option>
                                                            <option value="2">Summer</option>
                                                        </select>
                                            </div>
                                        </div>
                                        </div>
                                </div>
                            </div>


                            <div class="mt-5">
                                <p class="text-lead">Note: You can only use one email per registration. For old students, please use your official CdD Gmail Account.</p>
                            </div>

                            <div class="card border-0 shadow-sm">
                                    <div class="card-header bg-primary text-white">Registrtation</div>
                                <div class="card-body">
                                    <div class="row">

                                        <div class="col-xs-4 col-sm-4 col-md-4">
                                            <div class="form-group">
                                                        <label>Enrollment Type</label>
                                                        <select class="form-control" name="stud_type">
                                                            <option value="New">New</option>
                                                            <option value="Old">Old</option>
                                                            <option value="Transferee">Transferee</option>
                                                        </select>
                                            </div>
                                        </div>

                                        <div class="col-xs-4 col-sm-4 col-md-4">
                                            <div class="form-group">
                                                        <label>Course</label>
                                                        <select class="form-control" name="course_id">
                                                            @foreach ($courses as $course)
                                                                <option value="{{ $course->id }}">{{ $course->name }}</option>
                                                            @endforeach
                                                        </select>
                                            </div>
                                        </div>

                                        <div class="col-xs-4 col-sm-4 col-md-4">
                                            <div class="form-group">
                                                        <label>Year</label>
                                                        <select class="form-control" name="year_level">
                                                            <option value="1">First Year</option>
                                                            <option value="2">Second Year</option>
                                                            <option value="3">Third Year</option>
                                                            <option value="4">Fourth Year</option>
                                                            <option value="5">Fift Year</option>
                                                        </select>
                                            </div>
                                        </div>

                                        <div class="col-xs-3 col-sm-3 col-md-3">
                                            <div class="form-group">
                                                <label>Student Number:</label>
                                                <input type="text" name="stud_no" class="form-control" placeholder="Student Number">
                                            </div>
                                        </div>

                                        <div class="col-xs-3 col-sm-3 col-md-3">
                                            <div class="form-group">
                                                <label>First Name:</label>
                                                <input type="text" name="first_name" class="form-control" placeholder="First Name">
                                            </div>
                                        </div>
                                        <div class="col-xs-3 col-sm-3 col-md-3">
                                            <div class="form-group">
                                                <label>Last Name:</label>
                                                <input type="text" name="last_name" class="form-control" placeholder="Last Name">
                                            </div>
                                        </div>
                                        <div class="col-xs-3 col-sm-3 col-md-3">
                                            <div class="form-group">
                                                <label>Middle Name:</label>
                                                <input type="text" name="middle_name" class="form-control" placeholder="Middle Name">
                                            </div>
                                        </div>


                                        <div class="col-xs-6 col-sm-6 col-md-6">
                                            <div class="form-group">
                                                <label>Phone Number:</label>
                                                <input type="number" name="phone" class="form-control" placeholder="Phone Number">
                                            </div>
                                        </div>

                                        <div class="col-xs-6 col-sm-6 col-md-6">
                                            <div class="form-group">
                                                <label>Email:</label>
                                                <input type="email" name="email" class="form-control" placeholder="Email">
                                            </div>
                                        </div>

                                        
                                    </div>

                                </div>
                            </div>

                            <div class="mt-5">
                                <p class="text-lead">Note: The following details are to be provided in order to finalize your registration. </br>You Can leave this blank and pay later. We will be sending you an email to finalize your registration after you pay.</p>
                            </div>

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

                            <div class="mt-5">
                                <p class="text-lead">Provide payee information in case the enrollee didn't process the payment himself</p>
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
    </div>
</div>
@endsection