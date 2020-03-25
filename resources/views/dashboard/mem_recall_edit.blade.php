@extends('layouts.main')

@section('content') 
<div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Form 7.2 - Food Recall - Member Food Item</h4>
                            <p class="category"> 
                                Eacode : {{$eacode}}<br>
                                Hcn : {{$hcn}} - Shsn : {{$shsn}}<br>
                                Member : {{$member}} - {{$givenname}} {{$surname}}<br>
                                Age : {{$age}}<br>
                                Day : {{$recday}}
                            </p>
                            <div class="row">
                                <div class="col-md-1">
                                    <a href="{{ route('mem_recall', ['eacode'=>$eacode, 'hcn'=>$hcn, 'shsn'=>$shsn, 'MEMBER_CODE'=>$member, 'GIVENNAME'=>$givenname, 'SURNAME'=>$surname, 'AGE'=>$age])}}">
                                            <button type="submit" class="btn btn-secondary">
                                                <i class="pe-7s-back"></i> Go back
                                            </button>
                                        </a>
                                </div>
                                <div  class="col-md-1">
                                    <a href="{{ route('insertrecall', ['eacode'=>$eacode, 'hcn'=>$hcn, 'shsn'=>$shsn, 'MEMBER_CODE'=>$member, 'GIVENNAME'=>$givenname, 'SURNAME'=>$surname, 'AGE'=>$age, 'recday'=>$recday])}}">
                                        <button type="submit" class="btn btn-secondary">
                                            Insert Food Recall
                                        </button>
                                    </a>
                                </div>
                            </div>
                            <br>
                            <div class="content table-responsive table-full-width">
                                <div>
                                    @include('inc.messages')
                                </div>
                                <table class="table">
                                    <thead>
                                        <th>Reference date ( Month - Date - Year )</th>
                                        <th>Reference day</th>
                                        <th>Interview Status</th>
                                        <th>Update</th>
                                    </thead>
                                    <tbody>
                                         @foreach ($l1 as $value)
                                        <tr>
                                            <form class="update_form" method="post" action="{{action('FoodRecordController@updateLineOne', $value->id)}}">
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
                                                    <input type="text" class="form-control-f60" name="refday" id="refday" placeholder="REF DAY" value="{{ $value->refday }}"/>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="col-md-12">
                                                    <select type="text" class="form-control-f60-dropdown" name="status" id="status" placeholder="status" value="{{$value->status}}">
                                                        <option value=""  {{$value->status == ''  ? 'selected' : ''}}  >Please select</option>
                                                        <option value="1" {{$value->status == 1  ? 'selected' : ''}}  >1 - Completed</option>
                                                        <option value="2" {{$value->status == 2  ? 'selected' : ''}}  >2 - Partly Completed</option>
                                                        <option value="3" {{$value->status == 3  ? 'selected' : ''}}  >3 - Respondent Incapacitated</option>
                                                        <option value="4" {{$value->status == 4  ? 'selected' : ''}}  >4 - Refused</option>
                                                        <option value="5" {{$value->status == 5  ? 'selected' : ''}}  >5 - Not at Home (Away during the survey period)</option>
                                                        <option value="6" {{$value->status == 6  ? 'selected' : ''}}  >6 - Away from an Extended Period of time working/Schooling (LOCAL)</option>
                                                        <option value="7" {{$value->status == 7  ? 'selected' : ''}}  >7 - Away from an Extended Period of time working/Schooling (ABROAD)</option>
                                                        <option value="11" {{$value->status == '11'  ? 'selected' : ''}}  >11 - Others </option>
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
                        <hr>
                        <div class="container-fluid">
                            <div class="table-responsive-foodrecall">
                                
                                <div class="content table-full-width">
                                        <table class="table table-hover table-striped">
                                            <thead>
                                                    {{-- <th>EDIT</th> --}}
                                                    <th>LINE NO</th>
                                                    <th>FOOD ITEM</th>
                                                    <th>FOOD DESCRIPTION</th>
                                                    <th>FOOD BRAND</th>
                                                    <th>MAIN INGREDIENT</th>
                                                    <th>BRAND CODE</th>
                                                    <th style="padding-right:5vmin;">FVS</th>
                                                    <th>FORTIFIED</th>
                                                    <th>VITAMIN A</th>
                                                    <th style="padding-right:4vmin;">IRON</th>
                                                    <th>OTHER</th>
                                                    <th>MEAL CODE</th>
                                                    <th>RF CODE</th>
                                                    <th>FOODEX</th>
                                                    <th>FOOD CODE LIST</th>
                                                    <th>FOOD WEIGHT</th>
                                                    <th style="padding-right:5vmin;">RCC</th>
                                                    <th style="padding-right:5vmin;">CMC</th>
                                                    <th>SUPPLY CODE </th>
                                                    <th>SOURCE CODE </th>
                                                    <th>OTHER SOURCE </th>
                                                    <th style="padding-right:5vmin;">CPC</th>
                                                    <th>UNIT COST</th>
                                                    <th>UNIT WEIGHT</th>
                                                    <th>MEASUREMENT UNIT</th>
                                                    {{-- <th>Update</th> --}}
                                            </thead>
                                            
                                            @foreach ($lines as $value)
                                            <form class="update_form" method="post" action="{{action('FoodRecordController@update', $value->id)}}">
                                                {{csrf_field()}}
                                            <tbody>
                                                
                                                <tr>
                                                <input type="hidden" name="_method" value="PATCH" />
                                                <input type="hidden" name="id[]" value="{{$value->id}}" />
                                                                               
                                                    <td>
                                                        <input type="text" class="form-control" name="LINENO[]" placeholder="Line no" value="{{$value->LINENO}}"/>
                                                    </td>
                                                    <td>
                                                        <input type="text"class="form-control" name="FOOD_ITEM[]" placeholder="Food item" value="{{$value->FOOD_ITEM}}"/>
                                                    </td>
                                                    <td>
                                                        <input type="text"  class="form-control" name="FOODDESC[]" placeholder="Food description" value="{{$value->FOODDESC}}"/>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="FOODBRND[]" placeholder="Brand" value="{{$value->FOODBRND}}"/>
                                                    </td>
                                                    <td>
                                                        <input type="text"class="form-control" name="FOODMAINING[]"  placeholder="Main ingredient" value="{{$value->FOODMAINING}}"/>
                                                    </td>
                                                    <td>
                                                        <input type="text"  class="form-control" name="FOODBRNDCD[]" placeholder="Brand Code" value="{{$value->FOODBRNDCD}}"/>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="FVS[]" placeholder="FVS" value="{{$value->FVS}}"/>
                                                    </td>
                                                    <td>
                                                        <input type="text"class="form-control" name="ISFORTIFIED[]" placeholder="Fortified" value="{{$value->ISFORTIFIED}}"/>
                                                    </td>
                                                    <td>
                                                        <input type="text"  class="form-control" name="VITA[]" placeholder="Vitamin A" value="{{ $value->VITA}}"/>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="IRON[]" placeholder="Iron" value="{{$value->IRON}}"/>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="OTHF[]" placeholder="Other" value="{{$value->OTHF}}"/>
                                                    </td>
                                                    <td>
                                                        <select type="text" class="form-control" name="MEALCD[]" placeholder="Meal code" value="{{$value->MEALCD}}">
                                                            <option value=""   <?php if($value["MEALCD"] == ''){ echo "selected";} ?>  >0 - Blank</option>
                                                            <option value="1"   <?php if($value["MEALCD"] == '1'){ echo "selected";} ?>  >1 - Breakfast</option>
                                                            <option value="2"   <?php if($value["MEALCD"] == '2'){ echo "selected";} ?>  >2 - AM Snack</option>
                                                            <option value="3"   <?php if($value["MEALCD"] == '3'){ echo "selected";} ?>  >3 - Lunch</option>
                                                            <option value="4"   <?php if($value["MEALCD"] == '4'){ echo "selected";} ?>  >4 - PM Snack</option>
                                                            <option value="5"   <?php if($value["MEALCD"] == '5'){ echo "selected";} ?>  >5 - Supper</option>
                                                            <option value="6"   <?php if($value["MEALCD"] == '6'){ echo "selected";} ?>  >6 - Late PM Snack</option>
                                                            <option value="-"   <?php if($value["MEALCD"] == '-'){ echo "selected";} ?>  >88 - NONE </option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <select type="text" class="form-control" name="RFCODE[]" placeholder="RF code" value="{{$value->RFCODE}}">
                                                            <option value=""   <?php if($value["RFCODE"] == ''){ echo "selected";} ?>  >0 - Blank</option>
                                                            <option value="1"   <?php if($value["RFCODE"] == '1'){ echo "selected";} ?>  >1 - Single food item</option>
                                                            <option value="2"   <?php if($value["RFCODE"] == '2'){ echo "selected";} ?>  >2 - Mixed Dish</option>
                                                            <option value="3"   <?php if($value["RFCODE"] == '3'){ echo "selected";} ?>  >3 - Composite Ingridient</option>
                                                            <option value="4"   <?php if($value["RFCODE"] == '4'){ echo "selected";} ?>  >4 - Water</option>
                                                            <option value="5"   <?php if($value["RFCODE"] == '5'){ echo "selected";} ?>  >5 - Water added to conc/powdered Beverage</option>
                                                            <option value="6"   <?php if($value["RFCODE"] == '6'){ echo "selected";} ?>  >6 - Water used for cooking</option>
                                                            <option value="7"   <?php if($value["RFCODE"] == '7'){ echo "selected";} ?>  >7 - Beverage</option>
                                                            <option value="8"   <?php if($value["RFCODE"] == '8'){ echo "selected";} ?>  >8 - Other liquids, specify..</option>
                                                            <option value="9"   <?php if($value["RFCODE"] == '9'){ echo "selected";} ?>  >9 - NONE </option>
                                                        </select>
                                                    </td>
                                                    <td><input type="text" class="form-control" name="FOODEX[]"  placeholder="Food ex" value="{{$value->FOODEX}}"/></td>
                                                    <td>
                                                        <input type="text" list="fct" class="form-control" name="FOODCODE[]"  placeholder="FIC" value="{{$value->FOODCODE}}"/>
                                                        <datalist id="fct" >
                                                                @foreach ($fct as $f)
                                                                <option >{{$f->foodcode.' - '.$f->fooddesc}}</option>
                                                                @endforeach                                         
                                                        </datalist>
                                                    </td>
                                                    <td><input type="number"  step="any" class="form-control" name="FOODWEIGHT[]"  placeholder="Food weight" value="{{$value->FOODWEIGHT}}"/></td>
                                                    <td>
                                                        <select type="text"class="form-control" name="RCC[]"  placeholder="RCC" value="{{$value->RCC}}">
                                                            <option value=""   <?php if($value["RCC"] == ''){ echo "selected";} ?>  >0 - Blank</option>
                                                            <option value="1"   <?php if($value["RCC"] == '1'){ echo "selected";} ?>  >1 - Raw as purchased</option>
                                                            <option value="2"   <?php if($value["RCC"] == '2'){ echo "selected";} ?>  >2 - Raw edible portion</option>
                                                            <option value="3"   <?php if($value["RCC"] == '3'){ echo "selected";} ?>  >3 - Cooked as purchased</option>
                                                            <option value="4"   <?php if($value["RCC"] == '4'){ echo "selected";} ?>  >4 - Cooked edible portion</option>
                                                            <option value="5"   <?php if($value["RCC"] == '5'){ echo "selected";} ?>  >5 - Cleaned and Drawn fresh fish </option>
                                                            <option value="6"   <?php if($value["RCC"] == '6'){ echo "selected";} ?>  >6 - Cleaned and Drawn cooked fish</option>
                                                            <option value="-"   <?php if($value["RCC"] == '-'){ echo "selected";} ?>  >88 - NONE </option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <select type="text"  class="form-control" name="CMC[]"  placeholder="CMC" value="{{$value->CMC}}">
                                                            <option value=""   <?php if($value["CMC"] == ''){ echo "selected";} ?>  >0 - Blank</option>
                                                            <option value="1"   <?php if($value["CMC"] == '1'){ echo "selected";} ?>  >1 - Boiled</option>
                                                            <option value="2"   <?php if($value["CMC"] == '2'){ echo "selected";} ?>  >2 - Fried</option>
                                                            <option value="3"   <?php if($value["CMC"] == '3'){ echo "selected";} ?>  >3 - Sauteed</option>
                                                            <option value="4"   <?php if($value["CMC"] == '4'){ echo "selected";} ?>  >4 - Broiled</option>
                                                            <option value="5"   <?php if($value["CMC"] == '5'){ echo "selected";} ?>  >5 - Scambled</option>
                                                            <option value="6"   <?php if($value["CMC"] == '6'){ echo "selected";} ?>  >6 - Raw</option>
                                                            <option value="-"   <?php if($value["CMC"] == '-'){ echo "selected";} ?>  >88 - NONE</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <select type="text" class="form-control" name="SUPCODE[]"  placeholder="SUP" value="{{$value->SUPCODE}}">
                                                            <option value=""   <?php if($value["SUPCODE"] == ''){ echo "selected";} ?>  >0 - Blank</option>
                                                            <option value="1"   <?php if($value["SUPCODE"] == '1'){ echo "selected";} ?>  >1 - Bought</option>
                                                            <option value="2"   <?php if($value["SUPCODE"] == '2'){ echo "selected";} ?>  >2 - Barter</option>
                                                            <option value="3"   <?php if($value["SUPCODE"] == '3'){ echo "selected";} ?>  >3 - Given</option>
                                                            <option value="4"   <?php if($value["SUPCODE"] == '4'){ echo "selected";} ?>  >4 - Own Produced</option>
                                                            <option value="9"   <?php if($value["SUPCODE"] == '9'){ echo "selected";} ?>  >9 - NA</option>
                                                            <option value="-"   <?php if($value["SUPCODE"] == '-'){ echo "selected";} ?>  >88 - NONE</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <select type="text" class="form-control" name="SRCCODE[]"  placeholder="SRC" value="{{$value->SRCCODE}}">
                                                            <option value=""   <?php if($value["SRCCODE"] == ''){ echo "selected";} ?>  >0 - Blank</option>
                                                            <option value="1"   <?php if($value["SRCCODE"] == '1'){ echo "selected";} ?>  >1 - Fastfood</option>
                                                            <option value="2"   <?php if($value["SRCCODE"] == '2'){ echo "selected";} ?>  >2 - Carinderia / Turo-turo</option>
                                                            <option value="3"   <?php if($value["SRCCODE"] == '3'){ echo "selected";} ?>  >3 - Canteen/Cafeteria</option>
                                                            <option value="4"   <?php if($value["SRCCODE"] == '4'){ echo "selected";} ?>  >4 - Restaurant</option>
                                                            <option value="5"   <?php if($value["SRCCODE"] == '5'){ echo "selected";} ?>  >5 - Market / Talipapa</option>
                                                            <option value="6"   <?php if($value["SRCCODE"] == '6'){ echo "selected";} ?>  >6 - Sari-sari Store</option>
                                                            <option value="7"   <?php if($value["SRCCODE"] == '7'){ echo "selected";} ?>  >7 - Supermarket</option>
                                                            <option value="8"   <?php if($value["SRCCODE"] == '8'){ echo "selected";} ?>  >8 - Grocery</option>
                                                            <option value="9"   <?php if($value["SRCCODE"] == '9'){ echo "selected";} ?>  >9 - Convenience Store</option>
                                                            <option value="10"   <?php if($value["SRCCODE"] == '10'){ echo "selected";} ?>  >10 - Mobile Vendor</option>
                                                            <option value="11"   <?php if($value["SRCCODE"] == '11'){ echo "selected";} ?>  >11 - Specialty Store</option>
                                                            <option value="12"   <?php if($value["SRCCODE"] == '12'){ echo "selected";} ?>  >12 - Home prepared</option>
                                                            <option value="13"   <?php if($value["SRCCODE"] == '13'){ echo "selected";} ?>  >13 - Food Aid</option>
                                                            <option value="14"   <?php if($value["SRCCODE"] == '14'){ echo "selected";} ?>  >14 - Homeyard garden, livestock, fishpen</option>
                                                            <option value="15"   <?php if($value["SRCCODE"] == '15'){ echo "selected";} ?>  >15 - Farm garden, farmstock, fishpen</option>
                                                            <option value="16"   <?php if($value["SRCCODE"] == '16'){ echo "selected";} ?>  >16 - Water from deepwell, rainfall and spring</option>
                                                            <option value="17"   <?php if($value["SRCCODE"] == '17'){ echo "selected";} ?>  >17 - Water from waterworks like NAWASA and Maynilad</option>
                                                            <option value="18"   <?php if($value["SRCCODE"] == '18'){ echo "selected";} ?>  >18 - Pharmacy / Clinic</option>
                                                            <option value="19"   <?php if($value["SRCCODE"] == '19'){ echo "selected";} ?>  >19 - Others</option>
                                                            <option value="-"   <?php if($value["SRCCODE"] == '-'){ echo "selected";} ?>  >88 - NONE</option>
                                                        </select>
                                                    </td>
                                                    <td><input type="text" class="form-control" name="OTH_SRC[]"  placeholder="SRC" value="{{$value->OTH_SRC}}"/></td>
                                                    <td>
                                                        <select type="text" class="form-control" name="CPC[]"  placeholder="CPC" value="{{$value->CPC}}">
                                                            <option value=""   <?php if($value["CPC"] == ''){ echo "selected";} ?>  >0 - Blank</option>
                                                            <option value="1"   <?php if($value["CPC"] == '1'){ echo "selected";} ?>  >1 - Home-cooked, eaten at home</option>
                                                            <option value="2"   <?php if($value["CPC"] == '2'){ echo "selected";} ?>  >2 - Home-cooked, eaten away from home</option>
                                                            <option value="3"   <?php if($value["CPC"] == '3'){ echo "selected";} ?>  >3 - Bought, eaten at home</option>
                                                            <option value="4"   <?php if($value["CPC"] == '4'){ echo "selected";} ?>  >4 - Bought, eaten away from home</option>
                                                            <option value="5"   <?php if($value["CPC"] == '5'){ echo "selected";} ?>  >5 - Ready to eat, eaten at home</option>
                                                            <option value="6"   <?php if($value["CPC"] == '6'){ echo "selected";} ?>  >6 - Ready to eat, eaten away from home</option>
                                                            <option value="99"   <?php if($value["CPC"] == '99'){ echo "selected";} ?>  >99 - Not Applicable</option>
                                                            <option value="-"   <?php if($value["CPC"] == '-'){ echo "selected";} ?>  >88 - NONE</option>
                                                        </select> 
                                                    </td>
                                                    <td> <input type="text"class="form-control" name="UNITCOST[]"  placeholder="Unit Cost" value="{{$value->UNITCOST}}"/></td>
                                                    <td> <input type="text"  class="form-control" name="UNITWGT[]" placeholder="Unit Weight" value="{{$value->UNITWGT}}"/></td>
                                                    <td><input type="text" class="form-control" name="UNITMEAS[]" placeholder="Unit Measurment" value="{{$value->UNITMEAS}}"/></td>                                               
                                                </tr>
                                           
                                                @endforeach
                                                <tr>
                                                    <td>
                                                        <button type="submit" class="btn btn-simple">
                                                            <i class="pe-7s-refresh"> Update</i>
                                                        </button>
                                                    </td>
                                                </tr>
                                                </form>
                                            </tbody>
                                    </table>
                               
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection