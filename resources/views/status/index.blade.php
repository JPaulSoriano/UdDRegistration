@extends('layouts.publicapp')


@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-lg-8">
            <form action="{{ route('status') }}" method="GET">
                <div class="row">

                    <div class="col-xs-10 col-sm-10 col-md-10">
                        <div class="form-group">
                            <input class="form-control" type="text" placeholder="Registration Reference Number" name="status"/>
                        </div>
                    </div>

                    <div class="col-xs-2 col-sm-2 col-md-2">
                        <button class="btn btn-primary" type="submit">CHECK</button>
                    </div>
                </div>
            </form>
        </div>
    </div>






    <div class="row justify-content-center">
        <div class="col-lg-8">


            @if($registrations->isNotEmpty())
                @foreach ($registrations as $registration)
                    <div class="row">
                        <div class="col-sm-6">
                            <p><span class="font-weight-bold">Name:</span> {{ $registration->full_name }}</p>
                        </div>
                        <div class="col-sm-6">
                            <p><span class="font-weight-bold">Course:</span> {{ $registration->course->name }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <p><span class="font-weight-bold">Year:</span> {{ $registration->year_level }}</p>
                        </div>
                        <div class="col-sm-6">
                            <p><span class="font-weight-bold">Payment Method:</span> {{ $registration->payment_method }}</p>
                        </div>

                         @if(!$registration->payment_ref)
                         <div class="col-xs-12 col-sm-12 col-md-12 my-3 text-center">
                            <p class="text-danger font-weight-bold h4">You have not yet paid for registration <span class="mx-2"><a href="{{ route('registrations.edit', $registration->id) }}" class="btn btn-sm btn-primary" type="submit">Pay Now</a></span></p>
                        </div>
                        @else
                        @endif
                        
                    </div>


                    @if($registration->status == 1 && $registration->status_admission == 0 && $registration->status_enrollment == 0)
                    <div class="progress" style="height: 60px; font-size:15px">
                        <div class="progress-bar bg-success" role="progressbar" style="width: 33.3%;" aria-valuenow="33.3" aria-valuemin="0" aria-valuemax="100">Payment Verified</div>
                        <div class="progress-bar bg-secondary" role="progressbar" style="width: 33.3%;" aria-valuenow="33.3" aria-valuemin="0" aria-valuemax="100">Admission Processing</div>
                        <div class="progress-bar bg-secondary" role="progressbar" style="width: 33.3%;" aria-valuenow="33.3" aria-valuemin="0" aria-valuemax="100">Enrollment Processing</div>
                    </div>
                    @elseif($registration->status == 1 && $registration->status_admission == 1 && $registration->status_enrollment == 0)
                    <div class="progress" style="height: 60px; font-size:15px">
                        <div class="progress-bar bg-success" role="progressbar" style="width: 33.3%;" aria-valuenow="33.3" aria-valuemin="0" aria-valuemax="100">Payment Verified</div>
                        <div class="progress-bar bg-success" role="progressbar" style="width: 33.3%;" aria-valuenow="33.3" aria-valuemin="0" aria-valuemax="100">Admission Verified</div>
                        <div class="progress-bar bg-secondary" role="progressbar" style="width: 33.3%;" aria-valuenow="33.3" aria-valuemin="0" aria-valuemax="100">Enrollment Processing</div>
                    </div>
                    @elseif($registration->status == 1 && $registration->status_admission == 1 && $registration->status_enrollment == 1)
                    <div class="progress" style="height: 60px; font-size:15px">
                        <div class="progress-bar bg-success" role="progressbar" style="width: 33.3%;" aria-valuenow="33.3" aria-valuemin="0" aria-valuemax="100">Payment Verified</div>
                        <div class="progress-bar bg-success" role="progressbar" style="width: 33.3%;" aria-valuenow="33.3" aria-valuemin="0" aria-valuemax="100">Admission Verified</div>
                        <div class="progress-bar bg-success" role="progressbar" style="width: 33.3%;" aria-valuenow="33.3" aria-valuemin="0" aria-valuemax="100">Enrollment Verified</div>
                    </div>

                    @elseif($registration->status == 0 && $registration->status_admission == 1 && $registration->status_enrollment == 0)
                    <div class="progress" style="height: 60px; font-size:15px">
                        <div class="progress-bar bg-secondary" role="progressbar" style="width: 33.3%;" aria-valuenow="33.3" aria-valuemin="0" aria-valuemax="100">Payment Processing</div>
                        <div class="progress-bar bg-success" role="progressbar" style="width: 33.3%;" aria-valuenow="33.3" aria-valuemin="0" aria-valuemax="100">Admission Verified</div>
                        <div class="progress-bar bg-secondary" role="progressbar" style="width: 33.3%;" aria-valuenow="33.3" aria-valuemin="0" aria-valuemax="100">Enrollment Processing</div>
                    </div>

                    @elseif($registration->status == 0 && $registration->status_admission == 0 && $registration->status_enrollment == 1)
                    <div class="progress" style="height: 60px; font-size:15px">
                        <div class="progress-bar bg-secondary" role="progressbar" style="width: 33.3%;" aria-valuenow="33.3" aria-valuemin="0" aria-valuemax="100">Payment Processing</div>
                        <div class="progress-bar bg-secondary" role="progressbar" style="width: 33.3%;" aria-valuenow="33.3" aria-valuemin="0" aria-valuemax="100">Admission Processing</div>
                        <div class="progress-bar bg-success" role="progressbar" style="width: 33.3%;" aria-valuenow="33.3" aria-valuemin="0" aria-valuemax="100">Enrollment Verified</div>
                    </div>

                    @elseif($registration->status == 0 && $registration->status_admission == 1 && $registration->status_enrollment == 1)
                    <div class="progress" style="height: 60px; font-size:15px">
                        <div class="progress-bar bg-secondary" role="progressbar" style="width: 33.3%;" aria-valuenow="33.3" aria-valuemin="0" aria-valuemax="100">Payment Processing</div>
                        <div class="progress-bar bg-success" role="progressbar" style="width: 33.3%;" aria-valuenow="33.3" aria-valuemin="0" aria-valuemax="100">Admission Verified</div>
                        <div class="progress-bar bg-success" role="progressbar" style="width: 33.3%;" aria-valuenow="33.3" aria-valuemin="0" aria-valuemax="100">Enrollment Verified</div>
                    </div>


                    @elseif($registration->status == 1 && $registration->status_admission == 0 && $registration->status_enrollment == 1)
                    <div class="progress" style="height: 60px; font-size:15px">
                        <div class="progress-bar bg-success" role="progressbar" style="width: 33.3%;" aria-valuenow="33.3" aria-valuemin="0" aria-valuemax="100">Payment Verified</div>
                        <div class="progress-bar bg-secondary" role="progressbar" style="width: 33.3%;" aria-valuenow="33.3" aria-valuemin="0" aria-valuemax="100">Admission Processing</div>
                        <div class="progress-bar bg-success" role="progressbar" style="width: 33.3%;" aria-valuenow="33.3" aria-valuemin="0" aria-valuemax="100">Enrollment Verified</div>
                    </div>

                    @else
                    <div class="progress" style="height: 60px; font-size:15px">
                        <div class="progress-bar bg-secondary" role="progressbar" style="width: 33.3%;" aria-valuenow="33.3" aria-valuemin="0" aria-valuemax="100">Payment Processing</div>
                        <div class="progress-bar bg-secondary" role="progressbar" style="width: 33.3%;" aria-valuenow="33.3" aria-valuemin="0" aria-valuemax="100">Admission Processing</div>
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