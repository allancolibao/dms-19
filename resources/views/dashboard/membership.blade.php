@extends('layouts.main')

@section('content') 
<div class="content">
    <div class="container-fluid">
        <div class="row">
            @if(isset($memberships))
                @if($memberships->count() > 0)
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Form 6.1 - Household Membership</h4>
                                <p class="category"> 
                                    Eacode : {{$eacode}}<br>
                                    Hcn : {{$hcn}} - 
                                    Shsn : {{$shsn}}<br>
                                    {{-- Household Head : {{$hhead->GIVENNAME}}&nbsp;&nbsp;{{$hhead->SURNAME}} {{ number_format($hhead->AGE, 2) }} --}}
                                </p>
                                
                                
                                    <div class="content table-responsive table-full-width">
                                        <div>
                                            @include('inc.messages')
                                        </div>
                                        <table class="table">
                                            <thead>
                                                <th>Reference date ( Month - Date - Year )</th>
                                                <th>Reference day</th>
                                                <th>Meal Pattern</th>
                                                <th>Presence of Pets</th>
                                                <th>Interview Status</th>
                                                <th>Update</th>
                                            </thead>
                                            <tbody>
                                                 @foreach ($f60 as $value)
                                                <tr>
                                                    <form class="update_form" method="post" action="{{action('FoodRecordController@updatef60', $value->id)}}">
                                                    {{csrf_field()}}
                                                    <input type="hidden" name="_method" value="PATCH" />
                                                    <td>
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <input type="text" class="form-control-f60" name="monthref" id="monthref" placeholder="Month" value="{{ $value->monthref}}"/>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <input type="text" class="form-control-f60" name="dayref" id="dayref" placeholder="Day" value="{{ $value->dayref}}"/>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <input type="text" class="form-control-f60" name="yearref" id="yearref" placeholder="Year" value="{{ $value->yearref}}"/>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">
                                                            <input type="text" class="form-control-f60" name="REFDAY" id="REFDAY" placeholder="REF DAY" value="{{ $value->REFDAY }}"/>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">
                                                            <input type="text" class="form-control-f60" name="MEALPATTERN" id="MEALPATTERN" placeholder="MEAL PATTERN" value="{{ $value->MEALPATTERN }}"/>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">
                                                            <input type="text" class="form-control-f60" name="PETS" id="PETS" placeholder="PETS" value="{{ $value->PETS }}"/>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">
                                                            <select type="text" class="form-control-f60-dropdown" name="INTERVIEW_STATUS" id="INTERVIEW_STATUS" placeholder="INTERVIEW STATUS" value="{{$value->INTERVIEW_STATUS}}">
                                                                <option value=""  {{$value->INTERVIEW_STATUS == ''  ? 'selected' : ''}}  >Please select</option>
                                                                <option value="1" {{$value->INTERVIEW_STATUS == 1  ? 'selected' : ''}}  >1 - Completed</option>
                                                                <option value="2" {{$value->INTERVIEW_STATUS == 2  ? 'selected' : ''}}  >2 - Partly Completed</option>
                                                                <option value="3" {{$value->INTERVIEW_STATUS == 3  ? 'selected' : ''}}  >3 - Respondent Incapacitated</option>
                                                                <option value="4" {{$value->INTERVIEW_STATUS == 4  ? 'selected' : ''}}  >4 - Refused</option>
                                                                <option value="5" {{$value->INTERVIEW_STATUS == 5  ? 'selected' : ''}}  >5 - Not at Home (Away during the survey period)</option>
                                                                <option value="6" {{$value->INTERVIEW_STATUS == 6  ? 'selected' : ''}}  >6 - Away from an Extended Period of time working/Schooling (LOCAL)</option>
                                                                <option value="7" {{$value->INTERVIEW_STATUS == 7  ? 'selected' : ''}}  >7 - Away from an Extended Period of time working/Schooling (ABROAD)</option>
                                                                <option value="11" {{$value->INTERVIEW_STATUS == '11'  ? 'selected' : ''}}  >11 - Others </option>
                                                            </select>   
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <button type="submit" class="btn btn-simple">
                                                            Update
                                                        </button>
                                                    </td>
                                                @endforeach
                                                </form>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped ">
                                        <thead>
                                            <th>Edit</th>
                                            <th>Member no.</th>
                                            <th>Name</th>
                                            <th>Age</th>
                                            <th>Sex</th>
                                            <th>PSC</th>
                                            <th>Meal Planner</th>
                                            <th>Breakfast</th>
                                            <th>AM Snack</th>
                                            <th>Lunch</th>
                                            <th>PM Snack</th>
                                            <th>Supper</th>
                                            <th>Late PM Snack</th>
                                            <th></th>
                                        </thead>
                                        <tbody>
                                            @foreach ($memberships as $membership)
                                        <tr>
                                            <td> 
                                                <a href="{{ route('membership_edit', ['eacode'=>$membership->eacode, 'hcn'=>$membership->hcn, 'shsn'=>$membership->shsn, 'MEMBER_CODE'=>$membership->MEMBER_CODE, 'GIVENNAME'=>$membership->id, 'edit'])}}">
                                                    <button type="submit" class="btn btn-simple">
                                                        <i class="pe-7s-pen"></i>
                                                    </button>
                                                </a>
                                            </td>
                                            <td>{{ $membership->MEMBER_CODE }}</td>
                                            <td>{{ $membership->GIVENNAME }}&nbsp;&nbsp;&nbsp;{{ $membership->SURNAME }}</td>
                                            <td>{{ number_format($membership->AGE, 2) }}</td>
                                            <td>{{ $membership->SEX }}</td>
                                            <td>{{ $membership->PSC }}</td>
                                            <td>{{ $membership->MP }}</td>
                                            <td>{{ $membership->BF }}</td>
                                            <td>{{ $membership->AMSNCK }}</td>
                                            <td>{{ $membership->LUNCH }}</td>
                                            <td>{{ $membership->PMSNCK }}</td>
                                            <td>{{ $membership->SUPPER }}</td>
                                            <td>{{ $membership->LATESNCK }}</td>
                                            <td></td>
                                        
                                        </tr>
                                        
                                            @endforeach
                                            <thead>
                                                <th>Member no.</th>
                                                <th>Givenname</th>
                                                <th>Surname</th>
                                                <th>Age</th>
                                                <th>Sex</th>
                                                <th>PSC</th>
                                                <th>Meal Planner</th>
                                                <th>Breakfast</th>
                                                <th>AM Snack</th>
                                                <th>Lunch</th>
                                                <th>PM Snack</th>
                                                <th>Supper</th>
                                                <th>Late PM Snack</th>
                                                <th></th>
                                            </thead>
                                            <tr>
                                               <form class="insert_form" method="post" action="{{action ('FoodRecordController@insertVisitor')}}">
                                                    {{csrf_field()}}  
                                                    <input type="hidden" class="form-control" name="eacode"  value="{{$eacode}}" />
                                                    <input type="hidden" class="form-control" name="hcn"  value="{{$hcn}}" />
                                                    <input type="hidden" class="form-control" name="shsn"  value="{{$shsn}}" />
                                                    <input type="hidden" class="form-control" name="VISITOR"  value="1" />
                                               
                                                    <td>
                                                        <input type="number" step="any" class="form-control" name="MEMBER_CODE" id="MEMBER_CODE" placeholder="MEMBER_CODE" value=""/>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="GIVENNAME" id="GIVENNAME" placeholder="GIVENNAME" value=""/>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="SURNAME" id="SURNAME" placeholder="SURNAME" value=""/>
                                                    </td>
                                                    <td>
                                                        <input type="number" step="any" class="form-control" name="AGE" id="AGE" placeholder="AGE" value=""/>
                                                    </td>
                                                    <td>
                                                        <input type="number" step="any" class="form-control" name="SEX" id="SEX" placeholder="SEX" value=""/>
                                                    </td>
                                                    <td>
                                                        <input type="number" step="any" class="form-control" name="PSC" id="PSC" placeholder="PSC" value=""/>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="MP" id="MP" placeholder="MP" value=""/>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="BF" id="BF" placeholder="BF" value=""/>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="AMSNCK" id="AMSNCK" placeholder="AMSNCK" value=""/>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="LUNCH" id="LUNCH" placeholder="LUNCH" value=""/>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="PMSNCK" id="PMSNCK" placeholder="PMSNCK" value=""/>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="SUPPER" id="SUPPER" placeholder="SUPPER" value=""/>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="LATESNCK" id="LATESNCK" placeholder="LATESNCK" value=""/>
                                                    </td>
                                                    <td>
                                                        <button type="submit" class="btn btn-simple">
                                                            <i class="pe-7s-plus"></i> Add
                                                        </button>
                                                    </td> 
                                                </form>
                                            </tr>
                                        </tbody>
                                </table>
                            </div>
                    </div>
                </div>
                @else
                <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                    <h4 class="title">Form 6.1 - Household Membership for Dietary</h4>
                                    <p class="category"></p>
                                    <h5 class="alert alert-info">No members</h5><hr>
                        </div>  
                    </div>
                </div> 
            @endif
        @endif  
    </div>
</div>
</div>

@endsection
