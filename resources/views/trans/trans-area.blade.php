@extends('layouts.main')

@section('content') 
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                @include('inc.messages')
                <div class="card">
                    <div class="header">
                        <h2 class="title">Transmit Data 🚀</h2><br/>
                        <p class="category">Please enter the 12 digits eacode and click search</p>
                        <div class="content table-responsive table-full-width search">
                            <form action="{{ route('search.area') }}" method="POST" role="search">
                                {{ csrf_field() }}
                                <div class="input-group">
                                    <input type="number" step="any" class="form-control" name="key" placeholder="143201002000" autofocus required> 
                                    <span class="input-group-btn">
                                        <button type="submit" class="btn btnsearch">
                                                <i class="pe-7s-download"></i> Search
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
                                    <div class="content table-responsive">
                                        <table class="table table-hover table-striped">
                                            <thead>
                                                <tr>
                                                    <th style="background:#858585;" colspan="1"></th>
                                                    <th style="background:#e6e6e6; color: #2a2a2b;" colspan="4">CATEGORY</th>
                                                </tr>
                                                <tr>
                                                    <th style="background:#858585;" colspan="1"></th>
                                                    <th style="background:#ff3f79; color: #ffffff;">PER</th>
                                                    <th style="background:#4ec9ae; color: #ffffff;" colspan="3">WHOLE</th>
                                                </tr>
                                                <tr>
                                                    <th>AREA NAME</th>
                                                    <th>PER HOUSEHOLD</th>
                                                    <th>HOUSEHOLD</th>
                                                    <th>INDIVIDUALS</th>
                                                    <th>ALL</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($areas as $value)
                                                <tr>
                                                    <td>{{ $value->eacode }} - {{ $value->areaname }}</td>
                                                    <td>  
                                                        <button data-path="{{ route('per.household', ['eacode'=>$value->eacode])}}" style="background:#fd145a;" class="btn btn-secondary open-modal">
                                                                VIEW LIST
                                                        </button>
                                                    </td>
                                                    <td>  
                                                        <a href="{{ route('trans.hh', ['eacode'=>$value->eacode])}}">
                                                            <button type="submit" style="background:#aa26af;" class="btn btn-secondary send">
                                                                <i class="pe-7s-plane"></i> SEND
                                                            </button>
                                                        </a>
                                                    </td>

                                                    <td>  
                                                        <a href="{{ route('trans.indiv', ['eacode'=>$value->eacode])}}">
                                                            <button type="submit" style="background:#26af92;" class="btn btn-secondary send">
                                                                <i class="pe-7s-plane"></i> SEND
                                                            </button>
                                                        </a>
                                                    </td>

                                                    <td>  
                                                        <a href="{{ route('trans.all', ['eacode'=>$value->eacode])}}">
                                                            <button type="submit" style="background:#2248c5;" class="btn btn-secondary send">
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
                            <h5 class="alert alert-warning">Please double check the EACODE, Thank you!</h5>
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
