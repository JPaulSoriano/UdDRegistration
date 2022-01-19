@extends('layouts.app')


@section('content')
<div class="container">
<div class="row justify-content-center my-3">
    <div class="col-lg-8">
            @can('user-create')
            <a class="btn btn-primary" href="{{ route('users.create') }}"><i class="bi bi-plus-lg"></i></a>
            @endcan
    </div>
</div>

<div class="row justify-content-center my-3">
<div class="col-lg-8">

@if ($message = Session::get('success'))
<div class="alert alert-success">
  <p>{{ $message }}</p>
</div>
@endif


<table class="table table-borderless table-responsive table-sm">
<thead class="bg-primary text-white text-center">
 <tr>
   <th>No</th>
   <th>Name</th>
   <th>Email</th>
   <th>Roles</th>
   <th width="280px">Action</th>
 </tr>
</thead>
 @foreach ($data as $key => $user)
  <tr>
    <td>{{ ++$i }}</td>
    <td>{{ $user->name }}</td>
    <td>{{ $user->email }}</td>
    <td>
      @if(!empty($user->getRoleNames()))
        @foreach($user->getRoleNames() as $v)
           <label class="badge badge-primary">{{ $v }}</label>
        @endforeach
      @endif
    </td>
    <td>
        <form action="{{ route('users.destroy',$user->id) }}" method="POST">
          @can('user-edit')
          <a class="btn btn-primary my-2" href="{{ route('users.edit',$user->id) }}"><i class="bi bi-pencil-fill"></i></a>
          @endcan

          @csrf
          @method('DELETE')
          @can('user-delete')
          <button type="submit" class="btn btn-danger my-2"><i class="bi bi-trash2-fill"></i></button>
          @endcan
          
          </form>
    </td>
  </tr>
 @endforeach
</table>


{!! $data->render() !!}

</div>
</div>
</div>
@endsection