@extends('layouts.main')

@section('content') 
<div class="content">
    <div class="container-fluid">
        <div class="row">
                <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Search the EACODE you want to transmit</h4>
                                <p class="category">Note: Please make sure the eacode is validated before you hit send *</p>
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
                @if(isset($areas))
                    @if($areas->count() > 0)   
                        <div class="col-md-12">
                                <div class="card"> 
                                    <div class="content table-responsive table-full-width">
                                        <table class="table table-hover table-striped auto-index">
                                            <thead>
                                                <th>NO.</th>
                                                <th>AREA NAME</th>
                                                <th>HOUSEHOLD</th>
                                                <th>INDIVIDUALS</th>
                                            </thead>
                                            <tbody>
                                                @foreach ($areas as $value)
                                                <tr>
                                                    <td></td>
                                                    <td>{{ $value->eacode }} - {{ $value->areaname }}</td>
                                                    <td>  
                                                        <a href="{{ route('trans-hh', ['eacode'=>$value->eacode])}}">
                                                                <button type="submit" class="btn btn-secondary send">
                                                                    <i class="pe-7s-plane"></i> SEND
                                                                </button>
                                                            </a>
                                                    </td>
                                                    <td>  
                                                        <a href="{{ route('trans-indiv', ['eacode'=>$value->eacode])}}">
                                                            <button type="submit" class="btn btn-secondary send">
                                                                <i class="pe-7s-plane"></i> SEND
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
                                        <h5 class="alert alert-warning">Please double check the EACODE, Thank you!</h5><hr>
                                        <hr>
                                </div>  
                            </div>
                        </div> 
                    @endif
                @endif  
            </div>
        </div>             
    </div>

    {{-- Loading Spinner --}}
    <div id="loading" class="overlay" style="display:none">
        <div class="overlay__inner">
            <div class="overlay__content">
                <span class="spinner"></span>
            </div>
        </div>
    </div>

@endsection
