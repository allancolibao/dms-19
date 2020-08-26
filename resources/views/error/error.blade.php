@extends('layouts.app')

@section('content') 
<div class="container" >
    <div class="col-md-12 text-center">
        <h1 class="text-bold text-warning">Something went wrong with the database</h1>
        <img src="{{ asset('asset/undraw_server_down_s4lk.svg') }}" style="width:100%">
    </div>
</div>
@endsection