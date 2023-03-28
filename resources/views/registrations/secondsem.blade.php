@extends('layouts.app')

@section('content')
<div class="row">
<div class="col-lg-12">

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-striped table-borderless table-responsive table-sm" style="font-size: 12px" id="registration">
        <thead class="bg-primary text-white text-center">
        <tr>
            <th>Date Registered</th>
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
            <th>Last School Attended</th>
            <th>Payment Method</th>
            <th>Payment Reference No</th>
            <th>Screenshot</th>
            <th>Or No</th>
            @role('Sao|Super Admin')
            <th>Admission Action</th>
            @endrole
            @role('Cashier|Super Admin|Sao')
            <th>Payment Action</th>
            @endrole
            @role('Dean|Super Admin|Sao|Acad')
            <th>Enroll Action</th>
            @endrole

        </tr>
        </thead>
        <tbody>
        @foreach ($secondsem as $registration)
	    <tr>
            <td>{{ $registration->created_at }}</td>
            <td>{{ $registration->reg_ref }}</td>
            <td>{{ $registration->year }}</td>
            <td>
            @if($registration->semester == 0)
            First
            @endif
            @if($registration->semester == 1)
            Second
            @endif
            @if($registration->semester == 2)
            Summer
            @endif
            </td>
            <td>
            @if($registration->stud_type == 0)
            New
            @endif
            @if($registration->stud_type == 1)
            Old
            @endif
            @if($registration->stud_type == 2)
            Transferee
            @endif
            </td>
            <td id="studentNo">{{ $registration->stud_no }}</td>
            <td>{{ $registration->full_name }}</td>
            <td>{{ $registration->email }}</td>
            <td>{{ $registration->phone }}</td>
            <td>{{ $registration->course->name }}</td>
            <td>{{ $registration->year_level }}</td>
            <td>{{ $registration->last_school }}</td>
            <td>{{ $registration->payment_method }}</td>
            <td>{{ $registration->payment_ref }}</td>
            <td>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-sm btn-primary btn-block" data-toggle="modal" data-target="#modal-{{ $registration->id }}">
            @if($registration->image == null)
              No Screenshot Provided
            @else
              View
            @endif
            </button>
            {{ $registration->image }}
            </td>
            <td id="or">{{ $registration->or_no }}</td>

                @role('Sao|Super Admin')
                    <td>
                    @if($registration->status_admission == 1)
                    <form action="{{ route('registrations.unadmit', $registration) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger btn-block">Unadmit</button>
                    </form>
                    @else
                    <!-- <a href="{{ route('registrations.admit', $registration) }}"
                        class="btn btn-sm btn-primary btn-block">Admit</a> -->
                        <button class="btn btn-sm btn-primary admit btn-block" data-id="{{ $registration->id }}">Admit</button>
                    @endif
                        @if($registration->status_enrollment == 0)
                            <a href="#" class="btn btn-secondary btn-sm admit btn-block" data-id="{{ $registration->id }}">Temp Stud No</a>
                        @endif
                    </td>
                @endrole



                @role('Cashier|Super Admin|Sao')
                    <td>

                        @if($registration->status == 1)
                        <form action="{{ route('registrations.unverify', $registration) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger btn-block">Unverify</button>
                        </form>
                        @else
                        <!-- <a href="{{ route('registrations.verify', $registration) }}"
                            class="btn btn-sm btn-primary">Verify</a> -->
                        <button type="button" class="btn btn-sm btn-primary orno btn-block" data-id="{{ $registration->id }}">Verify</button>
                        @endif
                        @if($registration->or_no)
                        <a href="#" class="btn btn-secondary btn-sm orno btn-block" data-id="{{ $registration->id }}">OR No</a>
                        @endif

                    </td>
                @endrole

                @role('Dean|Super Admin|Sao|Acad')
                    <td>
                      @if($registration->status_enrollment == 1)
                      <form action="{{ route('registrations.unenroll', $registration) }}" method="POST">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-sm btn-danger btn-block">Unenroll</button>
                      </form>
                      @else
                      <!-- <a href="{{ route('registrations.enroll', $registration) }}"
                          class="btn btn-sm btn-primary">Enroll</a> -->
                      <button class="btn btn-sm btn-primary enrol btn-block" data-id="{{ $registration->id }}">Enroll</button>
                      @endif
                      <a href="#" class="btn btn-secondary btn-sm enrol btn-block" data-id="{{ $registration->id }}">Stud No</a>
                    </td>
                @endrole
	    </tr>
        @endforeach
        </tbody>
    </table>

    @foreach ($secondsem as $registration)
        <!-- Modal -->
        <div class="modal fade" id="modal-{{ $registration->id }}" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
            <div class="modal-body">
            @if(!$registration->image)
           <p class="text-center h2">No Payment Yet</p>
            @else
            <img src="{{asset('storage/'.$registration->image)}}" style="height: 35vw; width: 100%;" class="img-fluid" alt="{{ $registration->payment_ref }}">
                @if(!$registration->auth_first_name)
                    <p class="h4 font-weight-bold my-3">Student Process the Payment himself</p>
                @else
                <p class="h4 font-weight-bold my-3">Payment Authorization: <span class="font-weight-light">{{ $registration->auth_last_name }}, {{ $registration->auth_first_name }} {{ $registration->auth_middle_name }}</span></p>
                @endif
            @endif
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

<!-- Modal -->
<div class="modal fade" id="orNoModal" tabindex="-1" aria-labelledby="orNoModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="orNoModalLabel">Update Or No</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="#" method="post" id="orForm">
            @csrf
            @method('put')
            <label for="or_no">Or No: </label>
            <input type="text" id="or_no" name="or_no" class="form-control">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="event.preventDefault();document.getElementById('orForm').submit();">Save changes</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="studNoModal" tabindex="-1" aria-labelledby="studNoModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="studNoModalLabel">Update Student No.</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="#" method="post" id="studForm">
            @csrf
            @method('put')
            <label for="stud_no">Student Number: </label>
            <input type="text" id="stud_no" name="stud_no" class="form-control">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="event.preventDefault();document.getElementById('studForm').submit();">Save changes</button>
      </div>
    </div>
  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="tempstudNoModal" tabindex="-1" aria-labelledby="tempstudNoModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tempstudNoModalLabel">Temp Student No.</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="#" method="post" id="tempstudForm">
            @csrf
            @method('put')
            <label for="stud_no">Temp Student Number: </label>
            <input type="text" name="stud_no" class="form-control">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="event.preventDefault();document.getElementById('tempstudForm').submit();">Save changes</button>
      </div>
    </div>
  </div>
</div>

@endsection
@section('scripts')
<script>
    $(document).ready(function() {

        $(document).on('click', '.orno', function(e){
            e.preventDefault();
            jQuery.noConflict();
            var id = $(this).data('id');
            var tdParent = $(this).closest('td').closest('tr');
            var url = "{{ url('/update-or') }}/" + id;
            var orNo = tdParent.find("#or").text();
            var modal = $('#orNoModal');

            $('#orForm').attr('action', url);
            $('#or_no').val(orNo);
            modal.modal('show');
        });

        $(document).on('click', '.enrol', function(e){
            e.preventDefault();
            jQuery.noConflict();
            var id = $(this).data('id');
            var tdParent = $(this).closest('td').closest('tr');
            var url = "{{ url('/update-stud-no') }}/" + id;
            var studentNo = tdParent.find("#studentNo").text();
            var modal = $('#studNoModal');

            $('#studForm').attr('action', url);
            $('#stud_no').val(studentNo);
            modal.modal('show');
        });



        $(document).on('click', '.admit', function(e){
            e.preventDefault();
            jQuery.noConflict();
            var id = $(this).data('id');
            var tdParent = $(this).closest('td').closest('tr');
            var url = "{{ url('/temp-stud-no') }}/" + id;
            var modal = $('#tempstudNoModal');

            $('#tempstudForm').attr('action', url);
            modal.modal('show');
        });



        $('#registration').DataTable({
            order: [[0, 'desc']],
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
