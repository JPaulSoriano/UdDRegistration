@extends('layouts.app')
 
@section('content')
<div class="container-fluid">

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <h1 class="text-center font-weight-bold text-primary">Registered Today</h1>

    <table class="table table-bordered table-responsive" id="rtoday">
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
        </tr>
    </thead>
    <tbody>
    @foreach ($rtoday as $rtoday)
        <tr>
        <td>{{ $rtoday->created_at }}</td>
            <td>{{ $rtoday->reg_ref }}</td>
            <td>{{ $rtoday->year }}</td>
            <td>
            @if($rtoday->semester == 0)
            First
            @endif
            @if($rtoday->semester == 1)
            Second
            @endif
            @if($rtoday->semester == 2)
            Summer
            @endif
            </td>
            <td>
            @if($rtoday->stud_type == 0)
            New
            @endif
            @if($rtoday->stud_type == 1)
            Old
            @endif
            @if($rtoday->stud_type == 2)
            Transferee
            @endif
            </td>
            <td>{{ $rtoday->stud_no }}</td>
            <td>{{ $rtoday->full_name }}</td>
            <td>{{ $rtoday->email }}</td>
            <td>{{ $rtoday->phone }}</td>
            <td>{{ $rtoday->course->name }}</td>
            <td>{{ $rtoday->year_level }}</td>
            <td>{{ $rtoday->last_school }}</td>
        </tr>
        @endforeach
    </tbody>
    </table>
  
</div>   



@endsection
@section('scripts')
<script>
$('#rtoday').DataTable({
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
    </script>
    @endsection