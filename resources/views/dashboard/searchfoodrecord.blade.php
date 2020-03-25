@extends('layouts.main')

@section('content') 
<div class="content">
    <div class="container-fluid">
        <div class="row">
                <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Search Food Record</h4>
                                <p class="category">Based on data transmission</p>
                                <div class="content table-responsive table-full-width search">
                                <form action="{{ action('FoodRecordController@searchFoodRecord') }}" method="POST" role="search">
                                    {{ csrf_field() }}
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="key" placeholder="Please enter the EAcode"> 
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
                @if(isset($foodweighing))
                    @if($foodweighing->count() > 0)   
                        <div class="col-md-12">
                                <div class="card">
                                    <div class="header">
                                            <div style="margin-left: 5vmin !important;">
                                                <button type="button" class="btn btn-secondary pull-right" data-toggle="modal" data-target="#foodrecordmodal_1">
                                                        Check All Form 7.2
                                                </button>
                                            </div>
                                            <div>
                                                <button type="button" class="btn btn-secondary pull-right" data-toggle="modal" data-target="#membership">
                                                        Check All Form 6.1
                                                </button>
                                            </div>
                                        <h4 class="title">List of households</h4>
                                        <p class="category">Based on data table 6.3</p>
                                    </div>
                                <div> <br>
                                        <table class="summarytransmitted">
                                            <thead>
                                                <th>Total number of households</th>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                <td id="totalcount">{{$count}}</td>
                                                </tr>    
                                            </tbody>
                                        </table>
                                    </div>   
                                    <div class="content table-responsive table-full-width">
                                        <table class="table table-hover table-striped auto-index">
                                            <thead>
                                                <th>No.</th>
                                                <th>EAcode</th>
                                                <th>Hcn</th>
                                                <th>Shsn</th>
                                                <th>Household Membership</th>
                                                <th>Food Record</th>
                                                <th>Food Recall</th>
                                            </thead>
                                            <tbody>
                                                @foreach ($foodweighing as $value)
                                                <tr>
                                                    <td></td>
                                                    <td>{{ $value->eacode }}</td>
                                                    <td>{{ $value->hcn }}</td>
                                                    <td>{{ $value->shsn }}</td>
                                                    <td>  
                                                        <a href="{{ route('membership', ['eacode'=>$value->eacode, 'hcn'=>$value->hcn, 'shsn'=>$value->shsn])}}">
                                                                <button type="submit" class="btn btn-secondary">
                                                                    <i class="pe-7s-id"></i> Form 6.1
                                                                </button>
                                                            </a>
                                                    </td>
                                                    <td>  
                                                        <a href="{{ route('record', ['eacode'=>$value->eacode, 'hcn'=>$value->hcn, 'shsn'=>$value->shsn])}}">
                                                            <button type="submit" class="btn btn-secondary">
                                                                <i class="pe-7s-home"></i> Form 6.3
                                                            </button>
                                                        </a>
                                                    </td>
                                                    <td> 
                                                        <a href="{{ route('members', ['eacode'=>$value->eacode, 'hcn'=>$value->hcn, 'shsn'=>$value->shsn])}}">
                                                            <button type="submit" class="btn btn-secondary">
                                                                <i class="pe-7s-add-user"></i> Form 7.2
                                                            </button>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div> 
                        @else
                        <div class="col-md-12">
                                <div class="card">
                                    <div class="header">
                                        <h5 class="alert alert-warning">No records to display</h5><hr>
                                        <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#foodrecordmodal_1">
                                                Check the Individuals
                                        </button>
                                        <hr>
                                </div>  
                            </div>
                        </div> 
                    @endif
                @endif  
            </div>
        </div>             
    </div>

@endsection
