@extends('layouts.main')

@section('content') 
<div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Updating Membership</h4>
                            <p class="category"> 
                                Please double check before click the Update button
                            </p>
                            <div  style="padding-bottom:2vmin; padding-top:1vmin;">

                                <a href="{{ route('membership', ['eacode'=>$eacode, 'hcn'=>$hcn, 'shsn'=>$shsn])}}">
                                    <button type="submit" class="btn btn-secondary">
                                        <i class="pe-7s-back"></i> Go back to membership table
                                    </button>
                                </a>
                            </div>
                        @include('inc.messages')
                        </div>
                        <div class="content">
                            <form class="update_form" method="post" action="{{action('FoodRecordController@updatemembership', $member->id)}}">
                                {{csrf_field()}}
                                <input type="hidden" name="_method" value="PATCH" />   
                                <div class="row">
                                        <div class="col-md-1">
                                            <div class="form-group">
                                            <label>Member no.</label>
                                            <input type="text" class="form-control" name="MEMBER_CODE" id="MEMBER_CODE" placeholder="Member no." value="{{$member->MEMBER_CODE}}"/>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>First name</label>
                                            <input type="text"class="form-control" name="GIVENNAME" id="GIVENNAME" placeholder="First name" value="{{$member->GIVENNAME}}"/>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Last name</label>
                                            <input type="text"  class="form-control" name="SURNAME" id="SURNAME" placeholder="Last name" value="{{$member->SURNAME}}"/>
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                            <div class="form-group">
                                            <label>Age</label>
                                            <input type="text" class="form-control" name="AGE" id="AGE" placeholder="Age" value="{{$member->AGE}}"/>
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="form-group">
                                            <label>Sex</label>
                                            <input type="text"class="form-control" name="SEX" id="SEX" placeholder="Sex" value="{{$member->SEX}}"/>
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="form-group">
                                            <label>PSC</label>
                                            <input type="text"  class="form-control" name="PSC" id="PSC" placeholder="PSC" value="{{$member->PSC}}"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                            <label>Meal planner</label>
                                            <input type="text" class="form-control" name="MP" id="MP" placeholder="Meal planner" value="{{$member->MP}}"/>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Breakfast</label>
                                            <input type="text"class="form-control" name="BF" id="BF" placeholder="Breakfast" value="{{$member->BF}}"/>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>AM snack</label>
                                            <input type="text"  class="form-control" name="AMSNCK" id="AMSNCK" placeholder="AM snack" value="{{$member->AMSNCK}}"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                            <label>Lunch</label>
                                            <input type="text" class="form-control" name="LUNCH" id="LUNCH" placeholder="Lunch" value="{{$member->LUNCH}}"/>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>PM snack</label>
                                            <input type="text"class="form-control" name="PMSNCK" id="PMSNCK" placeholder="PM snack" value="{{$member->PMSNCK}}"/>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Supper</label>
                                            <input type="text"  class="form-control" name="SUPPER" id="SUPPER" placeholder="Supper" value="{{$member->SUPPER}}"/>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Late PM Snack</label>
                                            <input type="text"  class="form-control" name="LATESNCK" id="LATESNCK" placeholder="Late PM snack" value="{{$member->LATESNCK}}"/>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" value="edit" class="btn btn-secondary pull-right">Update</button>
                                <div class="clearfix"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection                        