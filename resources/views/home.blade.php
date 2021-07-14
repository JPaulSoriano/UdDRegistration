@extends('layouts.app')

@section('content')
<div class="container">

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                    <a href="{{ route('fyear') }}" type="button" class="btn btn-lg btn-block btn-primary p-5"><h3>First year</h3><h1 class="font-weight-bold text-info">{{ $registrations}}</h1></a>

</div>
@endsection
