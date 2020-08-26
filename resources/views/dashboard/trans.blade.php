@extends('layouts.main')

@section('content') 
<div class="content">
    <div class="container-fluid">
        <div class="row">
                <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Search the EACODE you want to transmit</h4>
                                <p class="category">Note: Please make sure the eacode is validated before you hit send*</p>
                                <div class="content table-responsive table-full-width search">
                                    @include('inc.messages')
                                <form action="{{ action('DataTransmissionController@searchArea') }}" method="POST" role="search">
                                    {{ csrf_field() }}
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="key" placeholder="Please enter the EACODE..."> 
                                        <span class="input-group-btn">
                                            <button type="submit" class="btn btnsearch">
                                                    <i class="pe-7s-search"></i>
                                            </button>
                                        </span>
                                    </div>
                                </form><br> 
                            </div>                           
                        </div>                         
                    </div>
                </div>
            </div>
        </div>             
    </div>

@endsection
