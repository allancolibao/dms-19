@extends('layouts.main')

@section('content') 

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                    <h4 class="title">Please enter the eacode and start the search</h4>
                        <p class="category">Update household membership, food record, food recall</p>
                        <div class="content table-responsive table-full-width search">
                        @include('inc.messages')
                        <form action="{{ action('FoodRecordController@searchFoodRecord') }}" method="POST" role="search">
                            {{ csrf_field() }}
                            <div class="input-group">
                                <input type="text" class="form-control" name="key" placeholder="Please enter the EAcode" autofocus> 
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
@endsection
