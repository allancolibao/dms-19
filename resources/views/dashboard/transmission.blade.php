@extends('layouts.main')

@section('content') 
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="carduser">
                    <div class="header">
                        <h4 class="title">Transmission Log<span><p class="category">All fields are required</p></span></h4> 
                    </div>
                   
                    <div class="content">
                        @include('inc.messages')
                        <form method="POST" action="{{ action('TransmissionController@addLog') }}" accept-charset="UTF-8">
                            <div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Name of Validator</label> *
                                        <input type="text" class="form-control" name="name" placeholder="Name" value="" autofocus>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label >EA code / Area name</label> * 
                                            <input type="text" list="areanames" class="form-control" name="areaname">
                                            <datalist id="areanames" >
                                                @foreach ($areanames as $areaname)
                                                <option >{{$areaname->eacode.' - '.$areaname->selectareas}}</option>
                                                @endforeach                                         
                                            </datalist>
                                    </div>
                                </div>
                               <div class="col-md-12">
                                    <div class="form-group">
                                        <label >Status</label> * 
                                            <select class="form-control" name="status">   
                                                <option value="">Please select</option>
                                                <option value="Transmitted">Transmitted</option>
                                                <option value="Not covered">Not covered</option>                                     
                                        </select>
                                    </div>
                                </div>
                                <div class="">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Date started</label> *
                                                <input type="date" class="form-control"  name="dstarted" placeholder="" value="">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Date finished</label> *
                                                <input type="date" class="form-control" name="dfinished" placeholder="" value="">
                                            </div>
                                       </div>
                                </div>        
                            </div>
                            <button type="submit" value="store" class="btn btn-secondary pull-right ">Save now</button>
                            <div class="clearfix"></div>
                            <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection


