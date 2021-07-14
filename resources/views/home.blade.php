@extends('layouts.app')

@section('content')
<div class="container">
@if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
@endif

<div class="row">
<div class="col-sm-4">
<a href="{{ route('fyear') }}" type="button" class="btn btn-lg btn-block btn-primary p-5"><h3>First year</h3><h1 class="font-weight-bold text-info">{{ $fyear}}</h1></a>
</div>
<div class="col-sm-4">
<a href="{{ route('rtoday') }}" type="button" class="btn btn-lg btn-block btn-primary p-5"><h3>Registered Today</h3><h1 class="font-weight-bold text-info">{{ $rtoday}}</h1></a>
</div>
<div class="col-sm-4">
<a href="{{ route('registrations.index') }}" type="button" class="btn btn-lg btn-block btn-primary p-5"><h3>Total</h3><h1 class="font-weight-bold text-info">{{ $total}}</h1></a>
</div>
</div>
</div>
@endsection
