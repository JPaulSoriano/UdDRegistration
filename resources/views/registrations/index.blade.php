@extends('layouts.app')
@section('content')
<div class="row">
<div class="col-lg-12">

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif


    <table class="table table-responsive table-bordered" id="registration">
        <thead>
        <tr>
            <th>Reference No</th>
            <th>Year</th>
            <th>Semester</th>
            <th>Type</th>
            <th>Student No</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Course</th>
            <th>Year</th>
            <th>Payment Method</th>
            <th>Payment Reference No</th>
            <th>Screenshot</th>
            <th>Payment Action</th>
            <th>Admission Action</th>
            <th>Enroll Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($registrations as $registration)
	    <tr>
            <td>{{ $registration->reg_ref }}</td>
            <td>{{ $registration->year }}</td>
            <td>{{ $registration->semester }}</td>
            <td>{{ $registration->stud_type }}</td>
            <td>{{ $registration->stud_no }}</td>
            <td>{{ $registration->full_name }}</td>
            <td>{{ $registration->email }}</td>
            <td>{{ $registration->phone }}</td>
            <td>{{ $registration->course->name }}</td>
            <td>{{ $registration->year_level }}</td>
            <td>{{ $registration->payment_method }}</td>
            <td>{{ $registration->payment_ref }}</td>
            <td>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-{{ $registration->id }}">
            View
            </button>
            </td>

            <td>
                @if($registration->status == 1)
                <form action="{{ route('registrations.unverify', $registration) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger">Unverify</button>
                </form>
                @else
                <a href="{{ route('registrations.verify', $registration) }}"
                    class="btn btn-sm btn-primary">Verify</a>
                @endif
            </td>


            <td>
            @if($registration->status_admission == 1)
            <form action="{{ route('registrations.unadmit', $registration) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-danger">Unadmit</button>
            </form>
            @else
            <a href="{{ route('registrations.admit', $registration) }}"
                class="btn btn-sm btn-primary">Admit</a>
            @endif
            </td>


            <td>
            @if($registration->status_enrollment == 1)
            <form action="{{ route('registrations.unenroll', $registration) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-danger">Unenroll</button>
            </form>
            @else
            <a href="{{ route('registrations.enroll', $registration) }}"
                class="btn btn-sm btn-primary">Enroll</a>
            @endif
            </td>

	    </tr>
        @endforeach
        </tbody>
    </table>
    @foreach ($registrations as $registration)
        <!-- Modal -->
        <div class="modal fade" id="modal-{{ $registration->id }}" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
            <div class="modal-body">
            <img src="{{asset('storage/'.$registration->image)}}" style="height: 35vw; width: 100%;" class="img-fluid" alt="{{ $registration->payment_ref }}">
            </div>
            <div class="modal-footer border-0">
                <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
        </div>
    @endforeach



    </div>
</div>

@endsection
@section('scripts')
<script>
    $(document).ready(function() {

        $('#registration').DataTable({
            dom: 'Bfrtip',
            buttons: [{
                responsive: true,
                    extend: 'copyHtml5',
                    exportOptions: {
                        columns: [0, ':visible']
                    }
                },
                {
                    extend: 'csv',
                    exportOptions: {
                        columns: ':visible'
                    }
                },

                {
                    
                    extend: 'print',


                    exportOptions: {
                        columns: ':visible'
                    }
                },
                'colvis'
            ]
        });

    });
</script>
@endsection