@extends('layouts.publicapp')


@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-lg-6">
            <form action="{{ route('status') }}" method="GET">
                <div class="row">

                    <div class="col-xs-10 col-sm-10 col-md-10">
                        <div class="form-group">
                            <input class="form-control" type="text" placeholder="Registration Reference Number" name="status"/>
                        </div>
                    </div>

                    <div class="col-xs-2 col-sm-2 col-md-2">
                        <button class="btn btn-primary" type="submit">Check</button>
                    </div>
                </div>
            </form>
        </div>
    </div>






    <div class="row justify-content-center">
        <div class="col-lg-6">
            @if($registrations->isNotEmpty())

                @foreach ($registrations as $registration)
                    <div class="row">
                        @if(!$registration->payment_ref)
                        <div class="col-sm-12 text-center">
                            <div class="alert alert-danger" role="alert">
                            You have not yet paid for registration <span class="mx-2"><a href="{{ route('registrations.edit', $registration->id) }}" class="btn btn-sm btn-primary" type="submit">Pay Now</a></span>
                            </div>
                        </div>
                        @else
                        @endif
                    </div>       
                    <div class="card mb-3">
                        <div class="card-header bg-primary text-white">Information</div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <p><span class="font-weight-bold badge badge-primary">Name:</span> {{ $registration->full_name }}</p>
                                </div>
                                <div class="col-sm-12">
                                    <p><span class="font-weight-bold badge badge-primary">Student Number:</span> {{ $registration->stud_no }}</p>
                                </div>
                                <div class="col-sm-12">
                                    <p><span class="font-weight-bold badge badge-primary">Course:</span> {{ $registration->course->name }}</p>
                                </div>
                                <div class="col-sm-12">
                                    <p><span class="font-weight-bold badge badge-primary">Year:</span> {{ $registration->year_level }}</p>
                                </div>

                                <div class="col-sm-12">
                                    <p><span class="font-weight-bold badge badge-primary">Payment Method:</span> {{ $registration->payment_method }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                            

                    @if($registration->status == 1 && $registration->status_admission == 0 && $registration->status_enrollment == 0)
                    <div class="progress" style="height: 60px; font-size:15px">
                        <div class="progress-bar bg-secondary" role="progressbar" style="width: 33.3%;" aria-valuenow="33.3" aria-valuemin="0" aria-valuemax="100">Admission Processing</div>
                        <div class="progress-bar bg-success" role="progressbar" style="width: 33.3%;" aria-valuenow="33.3" aria-valuemin="0" aria-valuemax="100">Payment Verified</div>
                        <div class="progress-bar bg-secondary" role="progressbar" style="width: 33.3%;" aria-valuenow="33.3" aria-valuemin="0" aria-valuemax="100">Enrollment Processing</div>
                    </div>
                    @elseif($registration->status == 1 && $registration->status_admission == 1 && $registration->status_enrollment == 0)
                    <div class="progress" style="height: 60px; font-size:15px">
                        <div class="progress-bar bg-success" role="progressbar" style="width: 33.3%;" aria-valuenow="33.3" aria-valuemin="0" aria-valuemax="100">Admission Verified</div>
                        <div class="progress-bar bg-success" role="progressbar" style="width: 33.3%;" aria-valuenow="33.3" aria-valuemin="0" aria-valuemax="100">Payment Verified</div>
                        <div class="progress-bar bg-secondary" role="progressbar" style="width: 33.3%;" aria-valuenow="33.3" aria-valuemin="0" aria-valuemax="100">Enrollment Processing</div>
                    </div>
                    @elseif($registration->status == 1 && $registration->status_admission == 1 && $registration->status_enrollment == 1)
                    <div class="progress" style="height: 60px; font-size:15px">
                        <div class="progress-bar bg-success" role="progressbar" style="width: 33.3%;" aria-valuenow="33.3" aria-valuemin="0" aria-valuemax="100">Admission Verified</div>
                        <div class="progress-bar bg-success" role="progressbar" style="width: 33.3%;" aria-valuenow="33.3" aria-valuemin="0" aria-valuemax="100">Payment Verified</div>
                        <div class="progress-bar bg-success" role="progressbar" style="width: 33.3%;" aria-valuenow="33.3" aria-valuemin="0" aria-valuemax="100">Enrollment Verified</div>
                    </div>

                    @elseif($registration->status == 0 && $registration->status_admission == 1 && $registration->status_enrollment == 0)
                    <div class="progress" style="height: 60px; font-size:15px">
                        <div class="progress-bar bg-success" role="progressbar" style="width: 33.3%;" aria-valuenow="33.3" aria-valuemin="0" aria-valuemax="100">Admission Verified</div>
                        <div class="progress-bar bg-secondary" role="progressbar" style="width: 33.3%;" aria-valuenow="33.3" aria-valuemin="0" aria-valuemax="100">Payment Processing</div>
                        <div class="progress-bar bg-secondary" role="progressbar" style="width: 33.3%;" aria-valuenow="33.3" aria-valuemin="0" aria-valuemax="100">Enrollment Processing</div>
                    </div>

                    @elseif($registration->status == 0 && $registration->status_admission == 0 && $registration->status_enrollment == 1)
                    <div class="progress" style="height: 60px; font-size:15px">
                        <div class="progress-bar bg-secondary" role="progressbar" style="width: 33.3%;" aria-valuenow="33.3" aria-valuemin="0" aria-valuemax="100">Admission Processing</div>
                        <div class="progress-bar bg-secondary" role="progressbar" style="width: 33.3%;" aria-valuenow="33.3" aria-valuemin="0" aria-valuemax="100">Payment Processing</div>
                        <div class="progress-bar bg-success" role="progressbar" style="width: 33.3%;" aria-valuenow="33.3" aria-valuemin="0" aria-valuemax="100">Enrollment Verified</div>
                    </div>

                    @elseif($registration->status == 0 && $registration->status_admission == 1 && $registration->status_enrollment == 1)
                    <div class="progress" style="height: 60px; font-size:15px">
                        <div class="progress-bar bg-success" role="progressbar" style="width: 33.3%;" aria-valuenow="33.3" aria-valuemin="0" aria-valuemax="100">Admission Verified</div>
                        <div class="progress-bar bg-secondary" role="progressbar" style="width: 33.3%;" aria-valuenow="33.3" aria-valuemin="0" aria-valuemax="100">Payment Processing</div>
                        <div class="progress-bar bg-success" role="progressbar" style="width: 33.3%;" aria-valuenow="33.3" aria-valuemin="0" aria-valuemax="100">Enrollment Verified</div>
                    </div>


                    @elseif($registration->status == 1 && $registration->status_admission == 0 && $registration->status_enrollment == 1)
                    <div class="progress" style="height: 60px; font-size:15px">
                        <div class="progress-bar bg-secondary" role="progressbar" style="width: 33.3%;" aria-valuenow="33.3" aria-valuemin="0" aria-valuemax="100">Admission Processing</div>
                        <div class="progress-bar bg-success" role="progressbar" style="width: 33.3%;" aria-valuenow="33.3" aria-valuemin="0" aria-valuemax="100">Payment Verified</div>
                        <div class="progress-bar bg-success" role="progressbar" style="width: 33.3%;" aria-valuenow="33.3" aria-valuemin="0" aria-valuemax="100">Enrollment Verified</div>
                    </div>

                    @else
                    <div class="progress" style="height: 60px; font-size:15px">
                        <div class="progress-bar bg-secondary" role="progressbar" style="width: 33.3%;" aria-valuenow="33.3" aria-valuemin="0" aria-valuemax="100">Admission Processing</div>
                        <div class="progress-bar bg-secondary" role="progressbar" style="width: 33.3%;" aria-valuenow="33.3" aria-valuemin="0" aria-valuemax="100">Payment Processing</div>
                        <div class="progress-bar bg-secondary" role="progressbar" style="width: 33.3%;" aria-valuenow="33.3" aria-valuemin="0" aria-valuemax="100">Enrollment Processing</div>
                    </div>
                    @endif


                @endforeach
            @else 
                <div class="row justify-content-center">
                <div class="col-lg-12 text-center">
                <h3 class="font-weight-bold">No Result</h3>
                </div>
                </div>
            @endif


        </div>
    </div>
</div>

@endsection