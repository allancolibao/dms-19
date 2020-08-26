@extends('layouts.main')

@section('content') 
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <div class="text-center">
                            <h1 class="text-bold text-warning">No Internet :(</h1>
                            <img src="{{ asset('asset/undraw_server_down_s4lk.svg') }}" style="width:100%">
                        </div>
                        <br/>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
