@extends('layouts.app')


@section('content')
<div class="container">

<div class="row justify-content-center">
<div class="col-lg-8">

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif


    <table class="table table-borderless table-sm">
    <thead class="bg-primary text-white text-center">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Department</th>
            <th width="280px">Action</th>
        </tr>
    </thead>
	    @foreach ($courses as $course)
	    <tr>
	        <td>{{ ++$i }}</td>
	        <td>{{ $course->name }}</td>
            <td>{{ $course->department->name }}</td>
	        <td>
            <a class="btn btn-sm btn-primary btn-block" href="{{ route('categorize', $course) }}">Registrations</a>
	        </td>
	    </tr>
	    @endforeach
    </table>

    </div>
</div>
</div>
@endsection