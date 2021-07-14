@extends('layouts.app')
 
@section('content')
<div class="container-fluid">

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <h1 class="text-center font-weight-bold text-primary">First Year</h1>

    <table class="table table-bordered table-responsive" id="fyear">
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
    @foreach ($fyear as $fyears)
        <tr>
        <td>{{ $fyears->created_at }}</td>
            <td>{{ $fyears->reg_ref }}</td>
            <td>{{ $fyears->year }}</td>
            <td>
            @if($fyears->semester == 0)
            First
            @endif
            @if($fyears->semester == 1)
            Second
            @endif
            @if($fyears->semester == 2)
            Summer
            @endif
            </td>
            <td>
            @if($fyears->stud_type == 0)
            New
            @endif
            @if($fyears->stud_type == 1)
            Old
            @endif
            @if($fyears->stud_type == 2)
            Transferee
            @endif
            </td>
            <td>{{ $fyears->stud_no }}</td>
            <td>{{ $fyears->full_name }}</td>
            <td>{{ $fyears->email }}</td>
            <td>{{ $fyears->phone }}</td>
            <td>{{ $fyears->course->name }}</td>
            <td>{{ $fyears->year_level }}</td>
            <td>{{ $fyears->last_school }}</td>
        </tr>
        @endforeach
    </tbody>
    </table>
  
</div>   



@endsection
@section('scripts')
<script>
$('#fyear').DataTable({
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