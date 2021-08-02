@extends('layouts.app')


@section('content')
<div class="container">

    <div class="row justify-content-center my-3">
        <div class="col-lg-8">
                @can('department-create')
                <a class="btn btn-primary" href="{{ route('departments.create') }}"><i class="bi bi-plus-lg"></i></a>
                @endcan
        </div>
    </div>

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
            <th width="280px">Action</th>
        </tr>
    </thead>
	    @foreach ($departments as $department)
	    <tr>
	        <td>{{ ++$i }}</td>
	        <td>{{ $department->name }}</td>
	        <td>
                <form action="{{ route('departments.destroy',$department->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    @can('department-delete')
                    <button type="submit" class="btn btn-danger"><i class="bi bi-trash2-fill"></i></button>
                    @endcan
                </form>
	        </td>
	    </tr>
	    @endforeach
    </table>


    {!! $departments->links() !!}


    </div>
</div>
</div>
@endsection