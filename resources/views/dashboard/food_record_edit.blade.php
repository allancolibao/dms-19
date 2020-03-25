@extends('layouts.main')

@section('content') 
<div class="content">
        <div class="container-fluid">
            <div class="row">
                @if(isset($records))
                    @if($records->count() > 0)
                        <div class="col-md-12">
                            <div class="card">
                                <div class="header">
                                    <h4 class="title">Form 6.3 - Household Food Record</h4>
                                    <p class="category"> 
                                        Eacode : {{$eacode}}<br>
                                        Hcn : {{$hcn}} - 
                                        Shsn : {{$shsn}}<br>
                                        {{-- Household Head : {{$hhead->GIVENNAME}}&nbsp;&nbsp;{{$hhead->SURNAME}} {{ number_format($hhead->AGE, 2) }} --}}
                                    </p>

                                    <div  style="padding-bottom:2vmin; padding-top:1vmin;">
                                            <a href="{{ route('insert_record', ['eacode'=>$eacode, 'hcn'=>$hcn, 'shsn'=>$shsn])}}">
                                            <button type="submit" class="btn btn-secondary">
                                                Insert Food Record
                                            </button>
                                        </a>
                                    </div>
                                </div>
                                <div class="container-fluid">
                                        <div class="table-responsive-foodrecall">
                                            <div class="content table-full-width">
                                                <div>
                                                    @include('inc.messages')
                                                </div>
                                                    <table class="table table-hover table-striped">
                                                        <thead>
                                                                {{-- <th>EDIT</th> --}}
                                                                {{-- <th>DELETE</th> --}}
                                                                <th>LINE NO </th>
                                                                <th>FOOD ITEM &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                                                <th>FOOD DESCRIPTION &nbsp;&nbsp;&nbsp;&nbsp;</th>
                                                                <th>FOOD BRAND&nbsp;&nbsp;&nbsp;</th>
                                                                <th>MAIN INGREDIENT &nbsp;&nbsp;&nbsp;&nbsp;</th>
                                                                <th>BRAND CODE &nbsp;&nbsp;</th>
                                                                <th>MEAL CODE &nbsp;&nbsp;</th>
                                                                <th>WR CODE &nbsp;&nbsp;</th>
                                                                <th>RF CODE &nbsp;&nbsp;</th>
                                                                <th>FOODEX &nbsp;&nbsp;</th>
                                                                {{-- <th>FOOD CODE</th> --}}
                                                                <th>FOOD CODE LIST &nbsp;&nbsp;&nbsp;&nbsp;</th>
                                                                <th>FOOD WEIGHT &nbsp;&nbsp;&nbsp;&nbsp;</th>
                                                                <th>RCC &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                                                <th>CMC &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                                                <th>SUPPLY CODE &nbsp;&nbsp;</th>
                                                                <th>SOURCE CODE &nbsp;&nbsp;</th>
                                                                <th>OTHER SOURCE &nbsp;&nbsp;&nbsp;</th>
                                                                <th>PW WGT &nbsp;&nbsp;&nbsp;</th>
                                                                <th>PW RCC &nbsp;&nbsp;&nbsp;</th>
                                                                <th>PW CMC &nbsp;&nbsp;&nbsp;</th>
                                                                <th>PUR CODE &nbsp;&nbsp;&nbsp;</th>
                                                                <th>GO WGT &nbsp;&nbsp;&nbsp;</th>
                                                                <th>GO RCC &nbsp;&nbsp;&nbsp;</th>
                                                                <th>GO CMC &nbsp;&nbsp;&nbsp;</th>
                                                                <th>LO WGT &nbsp;&nbsp;&nbsp;</th>
                                                                <th>LO RCC &nbsp;&nbsp;&nbsp;</th>
                                                                <th>LO CMC &nbsp;&nbsp;&nbsp;</th>
                                                                <th>UNIT COST &nbsp;&nbsp;&nbsp;</th>
                                                                <th>UNIT WGT &nbsp;&nbsp;&nbsp;</th>
                                                                <th>UNIT MEAS &nbsp;&nbsp;&nbsp;</th>
                                                        
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($records as $record)
                                                            <form class="update_form" method="post" action="{{action('FoodRecordController@updatefoodrecord', $record->id)}}">
                                                                {{csrf_field()}}
                                                            <input type="hidden" name="_method" value="PATCH" />
                                                            <input type="hidden" name="id[]" value="{{$record->id}}" />
                                                            <tr>
                                                                {{-- <td> 
                                                                    <a href="{{ route('record_edit', ['eacode'=>$eacode, 'hcn'=>$hcn, 'shsn'=>$shsn, 'id'=>$record->id, 'edit'])}}">
                                                                        <button type="submit" class="btn btn-simple">
                                                                            <i class="pe-7s-pen"></i>
                                                                        </button>
                                                                    </a>
                                                                </td>
                                                                <td>
                                                                    <a href="#">
                                                                        <button type="submit" class="btn btn-simple" style="background:#ff001e !important;">
                                                                            <i class="pe-7s-trash"></i>
                                                                        </button>
                                                                    </a>
                                                                </td> --}}
                                                                <td>
                                                                    <input type="text" class="form-control" name="LINENO[]" id="LINENO" placeholder="Line no" value="{{$record->LINENO}}"/>
                                                                </td>
                                                                <td>
                                                                    <input type="text"class="form-control" name="FOODITEM[]" id="FOODITEM" placeholder="Food item" value="{{$record->FOODITEM}}"/>
                                                                </td>
                                                                <td>
                                                                    <input type="text"  class="form-control" name="DESCRIPTION[]" id="DESCRIPTION" placeholder="Food description" value="{{$record->DESCRIPTION}}"/>
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" name="BRANDNAME[]" id="BRANDNAME" placeholder="Brand" value="{{$record->BRANDNAME}}"/>
                                                                </td>
                                                                <td>
                                                                    <input type="text"class="form-control" name="MAINIGNT[]" id="MAINIGNT" placeholder="Main ingredient" value="{{$record->MAINIGNT}}"/>
                                                                </td>
                                                                <td>
                                                                    <input type="text"  class="form-control" name="BRANDCODE[]" id="BRANDCODE" placeholder="Brand Code" value="{{$record->BRANDCODE}}"/>
                                                                </td>
                                                                <td>
                                                                    <select type="text" class="form-control" name="MEALCD[]" id="MEALCD" placeholder="Meal Code" value="{{$record->MEALCD}}">
                                                                        <option value=""   <?php if($record["MEALCD"] == ''){ echo "selected";} ?>  >0 - Blank</option>
                                                                        <option value="1"   <?php if($record["MEALCD"] == '1'){ echo "selected";} ?>  >1 - Breakfast</option>
                                                                        <option value="2"   <?php if($record["MEALCD"] == '2'){ echo "selected";} ?>  >2 - AM Snack</option>
                                                                        <option value="3"   <?php if($record["MEALCD"] == '3'){ echo "selected";} ?>  >3 - Lunch</option>
                                                                        <option value="4"   <?php if($record["MEALCD"] == '4'){ echo "selected";} ?>  >4 - PM Snack</option>
                                                                        <option value="5"   <?php if($record["MEALCD"] == '5'){ echo "selected";} ?>  >5 - Supper</option>
                                                                        <option value="6"   <?php if($record["MEALCD"] == '6'){ echo "selected";} ?>  >6 - Late PM Snack</option>
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    <select type="text"class="form-control" name="WRCODE[]" id="WRCODE" placeholder="WRCODE" value="{{$record->WRCODE}}">
                                                                        <option value=""   <?php if($record["WRCODE"] == ''){ echo "selected";} ?>  >0 - Blank</option>
                                                                        <option value="1"   <?php if($record["WRCODE"] == '1'){ echo "selected";} ?>  >1 - Weighed</option>
                                                                        <option value="2"   <?php if($record["WRCODE"] == '2'){ echo "selected";} ?>  >2 - Recalled</option>
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    <select type="text"  class="form-control" name="RFCODE[]" id="RFCODE" placeholder="RFCODE" value="{{$record->RFCODE}}">
                                                                        <option value=""   <?php if($record["RFCODE"] == ''){ echo "selected";} ?>  >0 - Blank</option>
                                                                        <option value="1"   <?php if($record["RFCODE"] == '1'){ echo "selected";} ?>  >1 - Single Food Item</option>
                                                                        <option value="2"   <?php if($record["RFCODE"] == '2'){ echo "selected";} ?>  >2 - Mixed Dish</option>
                                                                        <option value="3"   <?php if($record["RFCODE"] == '3'){ echo "selected";} ?>  >3 - Composite Ingredient</option>
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" name="FOODEX[]" id="FOODEX" placeholder="FOODEX" value="{{$record->FOODEX}}"/>
                                                                </td>
                                                                {{-- <td>
                                                                    {{ $record->FOODCODE}}
                                                                </td> --}}
                                                                <td>
                                                                    <input type="text" list="fct" class="form-control" name="FOODDESC[]" id="FOODDESC" placeholder="FOODDESC" value="{{$record->FOODDESC}}"/>
                                                                        <datalist id="fct" >
                                                                            @foreach ($fct as $value)
                                                                            <option >{{$value->foodcode.' - '.$value->fooddesc}}</option>
                                                                            @endforeach                                         
                                                                        </datalist>
                                                                </td>
                                                                <td>
                                                                    <input type="number" step="any" class="form-control" name="FOODWEIGHT[]" id="FOODWEIGHT" placeholder="FOODWEIGHT" value="{{$record->FOODWEIGHT}}"/>
                                                                </td>
                                                                <td>
                                                                    <select type="text" class="form-control" name="RCC[]" id="RCC" placeholder="RCC" value="{{$record->RCC}}">
                                                                        <option value=""   <?php if($record["RCC"] == ''){ echo "selected";} ?>  >0 - Blank</option>
                                                                        <option value="1"   <?php if($record["RCC"] == '1'){ echo "selected";} ?>  >1 - Raw as purchased</option>
                                                                        <option value="2"   <?php if($record["RCC"] == '2'){ echo "selected";} ?>  >2 - Raw edible portion</option>
                                                                        <option value="3"   <?php if($record["RCC"] == '3'){ echo "selected";} ?>  >3 - Cooked as purchased</option>
                                                                        <option value="4"   <?php if($record["RCC"] == '4'){ echo "selected";} ?>  >4 - Cooked edible portion</option>
                                                                        <option value="5"   <?php if($record["RCC"] == '5'){ echo "selected";} ?>  >5 - Cleaned and Drawn fresh fish</option>
                                                                        <option value="6"   <?php if($record["RCC"] == '6'){ echo "selected";} ?>  >6 - Cleaned and Drawn cooked fish</option>
                                                                        <option value="-"   <?php if($record["RCC"] == '-'){ echo "selected";} ?>  >88 - NONE </option>
                                                                    </select> 
                                                                </td>
                                                                <td>
                                                                    <select type="text" class="form-control" name="CMC[]" id="CMC" placeholder="CMC" value="{{$record->CMC}}">
                                                                        <option value=""   <?php if($record["CMC"] == ''){ echo "selected";} ?>  >0 - Blank</option>
                                                                        <option value="1"   <?php if($record["CMC"] == '1'){ echo "selected";} ?>  >1 - Boiled</option>
                                                                        <option value="2"   <?php if($record["CMC"] == '2'){ echo "selected";} ?>  >2 - Fried</option>
                                                                        <option value="3"   <?php if($record["CMC"] == '3'){ echo "selected";} ?>  >3 - Sauteed</option>
                                                                        <option value="4"   <?php if($record["CMC"] == '4'){ echo "selected";} ?>  >4 - Broiled</option>
                                                                        <option value="5"   <?php if($record["CMC"] == '5'){ echo "selected";} ?>  >5 - Scambled</option>
                                                                        <option value="6"   <?php if($record["CMC"] == '6'){ echo "selected";} ?>  >6 - Raw</option>
                                                                        <option value="-"   <?php if($record["CMC"] == '-'){ echo "selected";} ?>  >88 - NONE </option>
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    <select type="text" class="form-control" name="SUPCODE[]" id="SUPCODE" placeholder="SUPCODE" value="{{$record->SUPCODE}}">
                                                                        <option value=""   <?php if($record["SUPCODE"] == ''){ echo "selected";} ?>  >0 - Blank</option>
                                                                        <option value="1"   <?php if($record["SUPCODE"] == '1'){ echo "selected";} ?>  >1 - Bought</option>
                                                                        <option value="2"   <?php if($record["SUPCODE"] == '2'){ echo "selected";} ?>  >2 - Barter</option>
                                                                        <option value="3"   <?php if($record["SUPCODE"] == '3'){ echo "selected";} ?>  >3 - Given</option>
                                                                        <option value="4"   <?php if($record["SUPCODE"] == '4'){ echo "selected";} ?>  >4 - Own Produced</option>
                                                                        <option value="9"   <?php if($record["SUPCODE"] == '9'){ echo "selected";} ?>  >9 - NA</option>
                                                                        <option value="-"   <?php if($record["SUPCODE"] == '-'){ echo "selected";} ?>  >88 - NONE </option>
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    <select type="text" class="form-control" name="SRCCODE[]" id="SRCCODE" placeholder="SRCCODE" value="{{$record->SRCCODE}}">
                                                                        <option value=""   <?php if($record["SRCCODE"] == ''){ echo "selected";} ?>  >0 - Blank</option>
                                                                        <option value="1"   <?php if($record["SRCCODE"] == '1'){ echo "selected";} ?>  >1 - Fastfood</option>
                                                                        <option value="2"   <?php if($record["SRCCODE"] == '2'){ echo "selected";} ?>  >2 - Carinderia / Turo-turo</option>
                                                                        <option value="3"   <?php if($record["SRCCODE"] == '3'){ echo "selected";} ?>  >3 - Canteen/Cafeteria</option>
                                                                        <option value="4"   <?php if($record["SRCCODE"] == '4'){ echo "selected";} ?>  >4 - Restaurant</option>
                                                                        <option value="5"   <?php if($record["SRCCODE"] == '5'){ echo "selected";} ?>  >5 - Market / Talipapa</option>
                                                                        <option value="6"   <?php if($record["SRCCODE"] == '6'){ echo "selected";} ?>  >6 - Sari-sari Store</option>
                                                                        <option value="7"   <?php if($record["SRCCODE"] == '7'){ echo "selected";} ?>  >7 - Supermarket</option>
                                                                        <option value="8"   <?php if($record["SRCCODE"] == '8'){ echo "selected";} ?>  >8 - Grocery</option>
                                                                        <option value="9"   <?php if($record["SRCCODE"] == '9'){ echo "selected";} ?>  >9 - Convenience Store</option>
                                                                        <option value="10"   <?php if($record["SRCCODE"] == '10'){ echo "selected";} ?>  >10 - Mobile Vendor</option>
                                                                        <option value="11"   <?php if($record["SRCCODE"] == '11'){ echo "selected";} ?>  >11 - Specialty Store</option>
                                                                        <option value="12"   <?php if($record["SRCCODE"] == '12'){ echo "selected";} ?>  >12 - Home prepared</option>
                                                                        <option value="13"   <?php if($record["SRCCODE"] == '13'){ echo "selected";} ?>  >13 - Food Aid</option>
                                                                        <option value="14"   <?php if($record["SRCCODE"] == '14'){ echo "selected";} ?>  >14 - Homeyard garden, livestock, fishpen</option>
                                                                        <option value="15"   <?php if($record["SRCCODE"] == '15'){ echo "selected";} ?>  >15 - Farm garden, farmstock, fishpen</option>
                                                                        <option value="16"   <?php if($record["SRCCODE"] == '16'){ echo "selected";} ?>  >16 - Water from deepwell, rainfall and spring</option>
                                                                        <option value="17"   <?php if($record["SRCCODE"] == '17'){ echo "selected";} ?>  >17 - Water from waterworks like NAWASA and Maynilad</option>
                                                                        <option value="18"   <?php if($record["SRCCODE"] == '18'){ echo "selected";} ?>  >18 - Pharmacy / Clinic</option>
                                                                        <option value="19"   <?php if($record["SRCCODE"] == '19'){ echo "selected";} ?>  >19 - Others</option>
                                                                        <option value="-"   <?php if($record["SRCCODE"] == '-'){ echo "selected";} ?>  >88 - NONE</option>
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" name="OTH_SRC[]" id="OTH_SRC" placeholder="OTH_SRC" value="{{$record->OTH_SRC}}"/>
                                                                </td>
                                                                <td >
                                                                    <input  style="background: #f9ebff;" type="number" step="any" class="form-control" name="PW_WGT[]" id="PW_WGT" placeholder="PW_WGT" value="{{$record->PW_WGT}}"/>
                                                                </td>
                                                                <td>
                                                                    <select style="background: #f9ebff;" type="text"  class="form-control" name="PW_RCC[]" id="PW_RCC" placeholder="PW_RCC" value="{{$record->PW_RCC}}">
                                                                        <option value=""   <?php if($record["PW_RCC"] == ''){ echo "selected";} ?>  >0 - Blank</option>
                                                                        <option value="1"   <?php if($record["PW_RCC"] == '1'){ echo "selected";} ?>  >1 - Raw as purchased</option>
                                                                        <option value="2"   <?php if($record["PW_RCC"] == '2'){ echo "selected";} ?>  >2 - Raw edible portion</option>
                                                                        <option value="3"   <?php if($record["PW_RCC"] == '3'){ echo "selected";} ?>  >3 - Cooked as purchased</option>
                                                                        <option value="4"   <?php if($record["PW_RCC"] == '4'){ echo "selected";} ?>  >4 - Cooked edible portion</option>
                                                                        <option value="5"   <?php if($record["PW_RCC"] == '5'){ echo "selected";} ?>  >5 - Cleaned and Drawn fresh fish</option>
                                                                        <option value="6"   <?php if($record["PW_RCC"] == '6'){ echo "selected";} ?>  >6 - Cleaned and Drawn cooked fish</option>
                                                                        <option value="-"   <?php if($record["PW_RCC"] == '-'){ echo "selected";} ?>  >88 - NONE </option>
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    <select style="background: #f9ebff;" type="text" class="form-control" name="PW_CMC[]" id="PW_CMC" placeholder="PW_CMC" value="{{$record->PW_CMC}}">
                                                                        <option value=""   <?php if($record["PW_CMC"] == ''){ echo "selected";} ?>  >0 - Blank</option>
                                                                        <option value="1"   <?php if($record["PW_CMC"] == '1'){ echo "selected";} ?>  >1 - Boiled</option>
                                                                        <option value="2"   <?php if($record["PW_CMC"] == '2'){ echo "selected";} ?>  >2 - Fried</option>
                                                                        <option value="3"   <?php if($record["PW_CMC"] == '3'){ echo "selected";} ?>  >3 - Sauteed</option>
                                                                        <option value="4"   <?php if($record["PW_CMC"] == '4'){ echo "selected";} ?>  >4 - Broiled</option>
                                                                        <option value="5"   <?php if($record["PW_CMC"] == '5'){ echo "selected";} ?>  >5 - Scambled</option>
                                                                        <option value="6"   <?php if($record["PW_CMC"] == '6'){ echo "selected";} ?>  >6 - Raw</option>
                                                                        <option value="-"   <?php if($record["PW_CMC"] == '-'){ echo "selected";} ?>  >88 - NONE </option>
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    <select style="background: #f9ebff;" type="text" class="form-control" name="PURCODE[]" id="PURCODE" placeholder="PURCODE" value="{{$record->PURCODE}}">
                                                                        <option value=""   <?php if($record["PURCODE"] == ''){ echo "selected";} ?>  >0 - Blank</option>
                                                                        <option value="1"   <?php if($record["PURCODE"] == '1'){ echo "selected";} ?>  >1 - Fed to pets</option>
                                                                        <option value="2"   <?php if($record["PURCODE"] == '2'){ echo "selected";} ?>  >2 - Discarded</option>
                                                                        <option value="-"   <?php if($record["PURCODE"] == '-'){ echo "selected";} ?>  >88 - NONE </option>
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    <input style="background: #efffeb;" type="number" step="any" class="form-control" name="GO_WGT[]" id="GO_WGT" placeholder="GO_WGT" value="{{$record->GO_WGT}}">
                                                                </td>
                                                                <td>
                                                                    <select  style="background: #efffeb;" type="text"   class="form-control" name="GO_RCC[]" id="GO_RCC" placeholder="GO_RCC" value="{{$record->GO_RCC}}">
                                                                        <option value=""   <?php if($record["GO_RCC"] == ''){ echo "selected";} ?>  >0 - Blank</option>
                                                                        <option value="1"   <?php if($record["GO_RCC"] == '1'){ echo "selected";} ?>  >1 - Raw as purchased</option>
                                                                        <option value="2"   <?php if($record["GO_RCC"] == '2'){ echo "selected";} ?>  >2 - Raw edible portion</option>
                                                                        <option value="3"   <?php if($record["GO_RCC"] == '3'){ echo "selected";} ?>  >3 - Cooked as purchased</option>
                                                                        <option value="4"   <?php if($record["GO_RCC"] == '4'){ echo "selected";} ?>  >4 - Cooked edible portion</option>
                                                                        <option value="5"   <?php if($record["GO_RCC"] == '5'){ echo "selected";} ?>  >5 - Cleaned and Drawn fresh fish</option>
                                                                        <option value="6"   <?php if($record["GO_RCC"] == '6'){ echo "selected";} ?>  >6 - Cleaned and Drawn cooked fish</option>
                                                                        <option value="-"   <?php if($record["GO_RCC"] == '-'){ echo "selected";} ?>  >88 - NONE </option>
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    <select  style="background: #efffeb;" type="text" class="form-control" name="GO_CMC[]" id="GO_CMC" placeholder="GO_CMC" value="{{$record->GO_CMC}}">
                                                                        <option value=""   <?php if($record["GO_CMC"] == ''){ echo "selected";} ?>  >0 - Blank</option>
                                                                        <option value="1"   <?php if($record["GO_CMC"] == '1'){ echo "selected";} ?>  >1 - Boiled</option>
                                                                        <option value="2"   <?php if($record["GO_CMC"] == '2'){ echo "selected";} ?>  >2 - Fried</option>
                                                                        <option value="3"   <?php if($record["GO_CMC"] == '3'){ echo "selected";} ?>  >3 - Sauteed</option>
                                                                        <option value="4"   <?php if($record["GO_CMC"] == '4'){ echo "selected";} ?>  >4 - Broiled</option>
                                                                        <option value="5"   <?php if($record["GO_CMC"] == '5'){ echo "selected";} ?>  >5 - Scambled</option>
                                                                        <option value="6"   <?php if($record["GO_CMC"] == '6'){ echo "selected";} ?>  >6 - Raw</option>
                                                                        <option value="-"   <?php if($record["GO_CMC"] == '-'){ echo "selected";} ?>  >88 - NONE </option>
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    <input style="background: #ebf3ff;" type="number" step="any" class="form-control" name="LO_WGT[]" id="LO_WGT" placeholder="LO_WGT" value="{{$record->LO_WGT}}"/>
                                                                </td>
                                                                <td>
                                                                    <select style="background: #ebf3ff;" type="text"  class="form-control" name="LO_RCC[]" id="LO_RCC" placeholder="LO_RCC" value="{{$record->LO_RCC}}">
                                                                        <option value=""   <?php if($record["LO_RCC"] == ''){ echo "selected";} ?>  >0 - Blank</option>
                                                                        <option value="1"   <?php if($record["LO_RCC"] == '1'){ echo "selected";} ?>  >1 - Raw as purchased</option>
                                                                        <option value="2"   <?php if($record["LO_RCC"] == '2'){ echo "selected";} ?>  >2 - Raw edible portion</option>
                                                                        <option value="3"   <?php if($record["LO_RCC"] == '3'){ echo "selected";} ?>  >3 - Cooked as purchased</option>
                                                                        <option value="4"   <?php if($record["LO_RCC"] == '4'){ echo "selected";} ?>  >4 - Cooked edible portion</option>
                                                                        <option value="5"   <?php if($record["LO_RCC"] == '5'){ echo "selected";} ?>  >5 - Cleaned and Drawn fresh fish</option>
                                                                        <option value="6"   <?php if($record["LO_RCC"] == '6'){ echo "selected";} ?>  >6 - Cleaned and Drawn cooked fish</option>
                                                                        <option value="-"   <?php if($record["LO_RCC"] == '-'){ echo "selected";} ?>  >88 - NONE </option>
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    <select style="background: #ebf3ff;" type="text" class="form-control" name="LO_CMC[]" id="LO_CMC" placeholder="LO_CMC" value="{{$record->LO_CMC}}">
                                                                        <option value=""   <?php if($record["LO_CMC"] == ''){ echo "selected";} ?>  >0 - Blank</option>
                                                                        <option value="1"   <?php if($record["LO_CMC"] == '1'){ echo "selected";} ?>  >1 - Boiled</option>
                                                                        <option value="2"   <?php if($record["LO_CMC"] == '2'){ echo "selected";} ?>  >2 - Fried</option>
                                                                        <option value="3"   <?php if($record["LO_CMC"] == '3'){ echo "selected";} ?>  >3 - Sauteed</option>
                                                                        <option value="4"   <?php if($record["LO_CMC"] == '4'){ echo "selected";} ?>  >4 - Broiled</option>
                                                                        <option value="5"   <?php if($record["LO_CMC"] == '5'){ echo "selected";} ?>  >5 - Scambled</option>
                                                                        <option value="6"   <?php if($record["LO_CMC"] == '6'){ echo "selected";} ?>  >6 - Raw</option>
                                                                        <option value="-"   <?php if($record["LO_CMC"] == '-'){ echo "selected";} ?>  >88 - NONE </option>
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    <input type="number"  step="any" class="form-control" name="UNITCOST[]" id="UNITCOST" placeholder="Unit Cost" value="{{$record->UNITCOST}}"/>
                                                                </td>
                                                                <td>
                                                                    <input type="number"  step="any"  class="form-control" name="UNITWGT[]" id="UNITWGT" placeholder="Unit Weight" value="{{$record->UNITWGT}}"/>
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" name="UNIT[]" id="UNIT" placeholder="Unit Measurment" value="{{$record->UNIT}}"/>
                                                                </td>
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
                    @else
                    <div class="col-md-12">
                            <div class="card">
                                <div class="header">
                                        <h4 class="title">Form 6.3 - Household Food Record</h4>
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