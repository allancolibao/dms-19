@extends('layouts.main')

@section('content') 
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                @include('inc.messages')
                <div class="card">
                    <div class="header">
                        <h2 class="title">Get Data 📥</h2><br/>
                        <p class="category">Please enter the 4-12 digits eacode</p>
                        <div class="content table-responsive table-full-width search">
                            <form action="{{ route('get.data') }}" method="POST" role="search">
                                {{ csrf_field() }}
                                <div class="input-group">
                                    <input type="number" step="any" class="form-control" name="key" placeholder="143201002000" autofocus required> 
                                    <span class="input-group-btn">
                                        <button type="submit" class="btn btnsearch">
                                                <i class="pe-7s-download"></i> Get Data
                                        </button>
                                    </span>
                                </div>
                            </form>
                            <br/>
                        </div>
                    </div>
                </div>
            </div>
                @if(isset($areas))
                    @if($areas->count() > 0)   
                        <div class="col-md-12">
                                <div class="card"> 
                                    <div class="content table-responsive table-full-width">
                                        <table class="table table-hover table-striped">
                                            <thead>
                                                <tr>
                                                    <th style="background:#858585;" colspan="1"></th>
                                                    <th style="background:#e6e6e6; color: #2a2a2b;" colspan="3">GET DATA PER CATEGORY</th>
                                                </tr>
                                                <tr>
                                                    <th>AREA NAME</th>
                                                    <th>HOUSEHOLD</th>
                                                    <th>INDIVIDUALS</th>
                                                    <th>ALL</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($areas as $value)
                                                <tr>
                                                    <td class="text-left">{{ $value->eacode }} - {{ $value->areaname }}</td>
                                                    <td>  
                                                        <a href="{{ route('get.hh', ['eacode'=> $value->eacode])}}">
                                                            <button type="submit" style="background:#aa26af;" class="btn btn-secondary send">
                                                                HOUSEHOLD
                                                            </button>
                                                        </a>
                                                    </td>

                                                    <td>  
                                                        <a href="{{ route('get.indiv', ['eacode'=> $value->eacode])}}">
                                                            <button type="submit" style="background:#26af92;" class="btn btn-secondary send">
                                                                INDIVIDUAL
                                                            </button>
                                                        </a>
                                                    </td>

                                                    <td>  
                                                        <a href="{{ route('get.all', ['eacode'=> $value->eacode])}}">
                                                            <button type="submit" style="background:#2248c5;" class="btn btn-primary send">
                                                                GET ALL
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
                            <h5 class="alert alert-warning">No data to display, please double check the EACODE. Thank you!</h5>
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
