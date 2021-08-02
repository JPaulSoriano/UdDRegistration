@extends('layouts.app')


@section('content')
<div class="container">
<div class="row justify-content-center my-3">
    <div class="col-lg-8">
            @can('role-create')
            <a class="btn btn-primary" href="{{ route('roles.create') }}"><i class="bi bi-plus-lg"></i></a>
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
    @foreach ($roles as $key => $role)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $role->name }}</td>
        <td>
            <form action="{{ route('roles.destroy',$role->id) }}" method="POST">
                @can('role-edit')
                    <a class="btn btn-primary" href="{{ route('roles.edit',$role->id) }}"><i class="bi bi-pencil-fill"></i></a>
                @endcan


                        @csrf
                        @method('DELETE')
                        @can('role-delete')
                        <button type="submit" class="btn btn-danger my-2"><i class="bi bi-trash2-fill"></i></button>
                        @endcan
            </form>
        </td>
    </tr>
    @endforeach
</table>


{!! $roles->render() !!}

</div>
</div>
</div>
@endsection