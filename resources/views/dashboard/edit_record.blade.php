@extends('layouts.main')

@section('content') 
<div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Updating Food Record</h4>
                            <p class="category"> 
                                Please double check before click the Update button
                            </p>
                            <div  style="padding-bottom:2vmin; padding-top:1vmin;">
                                <a href="{{ route('record', ['eacode'=>$eacode, 'hcn'=>$hcn, 'shsn'=>$shsn])}}">
                                <button type="submit" class="btn btn-secondary">
                                    <i class="pe-7s-back"></i> Go back to Food Record Table
                                </button>
                            </a>
                        </div>
                        @include('inc.messages')
                        </div>
                        <div class="content"> 
                                <form class="update_form" method="post" action="{{action('FoodRecordController@updatefoodrecord', $line->id)}}">
                                   {{csrf_field()}}
                                   <input type="hidden" name="_method" value="PATCH" />                          
                                   <div class="row">
                                       <div class="col-md-2">
                                           <div class="form-group">
                                               <label>Line no.</label>
                                           <input type="text" class="form-control" name="LINENO" id="LINENO" placeholder="Line no" value="{{$line->LINENO}}"/>
                                           </div>
                                       </div>
                                       <div class="col-md-4">
                                           <div class="form-group">
                                               <label>Food Item</label>
                                               <input type="text"class="form-control" name="FOODITEM" id="FOODITEM" placeholder="Food item" value="{{$line->FOODITEM}}"/>
                                           </div>
                                       </div>
                                       <div class="col-md-6">
                                           <div class="form-group">
                                               <label>Food Description</label>
                                               <input type="text"  class="form-control" name="DESCRIPTION" id="DESCRIPTION" placeholder="Food description" value="{{$line->DESCRIPTION}}"/>
                                           </div>
                                       </div>
                                   </div>
       
                                   <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Brand</label>
                                                <input type="text" class="form-control" name="BRANDNAME" id="BRANDNAME" placeholder="Brand" value="{{$line->BRANDNAME}}"/>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Main ingredient</label>
                                                <input type="text"class="form-control" name="MAINIGNT" id="MAINIGNT" placeholder="Main ingredient" value="{{$line->MAINIGNT}}"/>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>Brand Code</label>
                                                <input type="text"  class="form-control" name="BRANDCODE" id="BRANDCODE" placeholder="Brand Code" value="{{$line->BRANDCODE}}"/>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Meal Code</label>
                                                    <select type="text" class="form-control" name="MEALCD" id="MEALCD" placeholder="Meal Code" value="{{$line->MEALCD}}">
                                                        <option value=""   <?php if($line["MEALCD"] == ''){ echo "selected";} ?>  >0 - Blank</option>
                                                        <option value="1"   <?php if($line["MEALCD"] == '1'){ echo "selected";} ?>  >1 - Breakfast</option>
                                                        <option value="2"   <?php if($line["MEALCD"] == '2'){ echo "selected";} ?>  >2 - AM Snack</option>
                                                        <option value="3"   <?php if($line["MEALCD"] == '3'){ echo "selected";} ?>  >3 - Lunch</option>
                                                        <option value="4"   <?php if($line["MEALCD"] == '4'){ echo "selected";} ?>  >4 - PM Snack</option>
                                                        <option value="5"   <?php if($line["MEALCD"] == '5'){ echo "selected";} ?>  >5 - Supper</option>
                                                        <option value="6"   <?php if($line["MEALCD"] == '6'){ echo "selected";} ?>  >6 - Late PM Snack</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>WRCODE</label>
                                                    <select type="text"class="form-control" name="WRCODE" id="WRCODE" placeholder="WRCODE" value="{{$line->WRCODE}}">
                                                        <option value=""   <?php if($line["WRCODE"] == ''){ echo "selected";} ?>  >0 - Blank</option>
                                                        <option value="1"   <?php if($line["WRCODE"] == '1'){ echo "selected";} ?>  >1 - Weighed</option>
                                                        <option value="2"   <?php if($line["WRCODE"] == '2'){ echo "selected";} ?>  >2 - Recalled</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>RFCODE</label>
                                                    <select type="text"  class="form-control" name="RFCODE" id="RFCODE" placeholder="RFCODE" value="{{$line->RFCODE}}">
                                                        <option value=""   <?php if($line["RFCODE"] == ''){ echo "selected";} ?>  >0 - Blank</option>
                                                        <option value="1"   <?php if($line["RFCODE"] == '1'){ echo "selected";} ?>  >1 - Single Food Item</option>
                                                        <option value="2"   <?php if($line["RFCODE"] == '2'){ echo "selected";} ?>  >2 - Mixed Dish</option>
                                                        <option value="3"   <?php if($line["RFCODE"] == '3'){ echo "selected";} ?>  >3 - Composite Ingredient</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label>FOODEX</label>
                                                    <input type="text" class="form-control" name="FOODEX" id="FOODEX" placeholder="FOODEX" value="{{$line->FOODEX}}"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>FIC</label>
                                                    <input type="text" list="fct" class="form-control" name="FOODDESC" id="FOODDESC" placeholder="FOODDESC" value="{{$line->FOODDESC}}"/>
                                                    <datalist id="fct" >
                                                            @foreach ($fct as $value)
                                                            <option >{{$value->foodcode.' - '.$value->fooddesc}}</option>
                                                            @endforeach                                         
                                                    </datalist>
                                                </div>
                                            </div>
                                        </div>
                                   <div class="row">
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>FOODWEIGHT</label>
                                                <input type="text" class="form-control" name="FOODWEIGHT" id="FOODWEIGHT" placeholder="FOODWEIGHT" value="{{$line->FOODWEIGHT}}"/>
                                            </div>
                                        </div>
                                       <div class="col-md-2">
                                           <div class="form-group">
                                               <label>RCC</label>
                                               <select type="text" class="form-control" name="RCC" id="RCC" placeholder="RCC" value="{{$line->RCC}}">
                                                    <option value=""   <?php if($line["RCC"] == ''){ echo "selected";} ?>  >0 - Blank</option>
                                                    <option value="1"   <?php if($line["RCC"] == '1'){ echo "selected";} ?>  >1 - Raw as purchased</option>
                                                    <option value="2"   <?php if($line["RCC"] == '2'){ echo "selected";} ?>  >2 - Raw edible portion</option>
                                                    <option value="3"   <?php if($line["RCC"] == '3'){ echo "selected";} ?>  >3 - Cooked as purchased</option>
                                                    <option value="4"   <?php if($line["RCC"] == '4'){ echo "selected";} ?>  >4 - Cooked edible portion</option>
                                                    <option value="5"   <?php if($line["RCC"] == '5'){ echo "selected";} ?>  >5 - Cleaned and Drawn fresh fish</option>
                                                    <option value="6"   <?php if($line["RCC"] == '6'){ echo "selected";} ?>  >6 - Cleaned and Drawn cooked fish</option>
                                                    <option value="-"   <?php if($line["RCC"] == '-'){ echo "selected";} ?>  >88 - NONE </option>
                                                </select>   
                                           </div>
                                       </div>
                                       <div class="col-md-2">
                                            <div class="form-group">
                                                <label>CMC</label>
                                                <select type="text" class="form-control" name="CMC" id="CMC" placeholder="CMC" value="{{$line->CMC}}">
                                                    <option value=""   <?php if($line["CMC"] == ''){ echo "selected";} ?>  >0 - Blank</option>
                                                    <option value="1"   <?php if($line["CMC"] == '1'){ echo "selected";} ?>  >1 - Boiled</option>
                                                    <option value="2"   <?php if($line["CMC"] == '2'){ echo "selected";} ?>  >2 - Fried</option>
                                                    <option value="3"   <?php if($line["CMC"] == '3'){ echo "selected";} ?>  >3 - Sauteed</option>
                                                    <option value="4"   <?php if($line["CMC"] == '4'){ echo "selected";} ?>  >4 - Broiled</option>
                                                    <option value="5"   <?php if($line["CMC"] == '5'){ echo "selected";} ?>  >5 - Scambled</option>
                                                    <option value="6"   <?php if($line["CMC"] == '6'){ echo "selected";} ?>  >6 - Raw</option>
                                                    <option value="-"   <?php if($line["CMC"] == '-'){ echo "selected";} ?>  >88 - NONE </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>SUPCODE</label>
                                                <select type="text" class="form-control" name="SUPCODE" id="SUPCODE" placeholder="SUPCODE" value="{{$line->SUPCODE}}">
                                                    <option value=""   <?php if($line["SUPCODE"] == ''){ echo "selected";} ?>  >0 - Blank</option>
                                                    <option value="1"   <?php if($line["SUPCODE"] == '1'){ echo "selected";} ?>  >1 - Bought</option>
                                                    <option value="2"   <?php if($line["SUPCODE"] == '2'){ echo "selected";} ?>  >2 - Barter</option>
                                                    <option value="3"   <?php if($line["SUPCODE"] == '3'){ echo "selected";} ?>  >3 - Given</option>
                                                    <option value="4"   <?php if($line["SUPCODE"] == '4'){ echo "selected";} ?>  >4 - Own Produced</option>
                                                    <option value="9"   <?php if($line["SUPCODE"] == '9'){ echo "selected";} ?>  >9 - NA</option>
                                                    <option value="-"   <?php if($line["SUPCODE"] == '-'){ echo "selected";} ?>  >88 - NONE </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                                <div class="form-group">
                                                    <label>SRCCODE</label>
                                                    <select type="text" class="form-control" name="SRCCODE" id="SRCCODE" placeholder="SRCCODE" value="{{$line->SRCCODE}}">
                                                        <option value=""   <?php if($line["SRCCODE"] == ''){ echo "selected";} ?>  >0 - Blank</option>
                                                        <option value="1"   <?php if($line["SRCCODE"] == '1'){ echo "selected";} ?>  >1 - Fastfood</option>
                                                        <option value="2"   <?php if($line["SRCCODE"] == '2'){ echo "selected";} ?>  >2 - Carinderia / Turo-turo</option>
                                                        <option value="3"   <?php if($line["SRCCODE"] == '3'){ echo "selected";} ?>  >3 - Canteen/Cafeteria</option>
                                                        <option value="4"   <?php if($line["SRCCODE"] == '4'){ echo "selected";} ?>  >4 - Restaurant</option>
                                                        <option value="5"   <?php if($line["SRCCODE"] == '5'){ echo "selected";} ?>  >5 - Market / Talipapa</option>
                                                        <option value="6"   <?php if($line["SRCCODE"] == '6'){ echo "selected";} ?>  >6 - Sari-sari Store</option>
                                                        <option value="7"   <?php if($line["SRCCODE"] == '7'){ echo "selected";} ?>  >7 - Supermarket</option>
                                                        <option value="8"   <?php if($line["SRCCODE"] == '8'){ echo "selected";} ?>  >8 - Grocery</option>
                                                        <option value="9"   <?php if($line["SRCCODE"] == '9'){ echo "selected";} ?>  >9 - Convenience Store</option>
                                                        <option value="10"   <?php if($line["SRCCODE"] == '10'){ echo "selected";} ?>  >10 - Mobile Vendor</option>
                                                        <option value="11"   <?php if($line["SRCCODE"] == '11'){ echo "selected";} ?>  >11 - Specialty Store</option>
                                                        <option value="12"   <?php if($line["SRCCODE"] == '12'){ echo "selected";} ?>  >12 - Home prepared</option>
                                                        <option value="13"   <?php if($line["SRCCODE"] == '13'){ echo "selected";} ?>  >13 - Food Aid</option>
                                                        <option value="14"   <?php if($line["SRCCODE"] == '14'){ echo "selected";} ?>  >14 - Homeyard garden, livestock, fishpen</option>
                                                        <option value="15"   <?php if($line["SRCCODE"] == '15'){ echo "selected";} ?>  >15 - Farm garden, farmstock, fishpen</option>
                                                        <option value="16"   <?php if($line["SRCCODE"] == '16'){ echo "selected";} ?>  >16 - Water from deepwell, rainfall and spring</option>
                                                        <option value="17"   <?php if($line["SRCCODE"] == '17'){ echo "selected";} ?>  >17 - Water from waterworks like NAWASA and Maynilad</option>
                                                        <option value="18"   <?php if($line["SRCCODE"] == '18'){ echo "selected";} ?>  >18 - Pharmacy / Clinic</option>
                                                        <option value="19"   <?php if($line["SRCCODE"] == '19'){ echo "selected";} ?>  >19 - Others</option>
                                                        <option value="-"   <?php if($line["SRCCODE"] == '-'){ echo "selected";} ?>  >88 - NONE</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label>OTH_SRC</label>
                                                    <input type="text" class="form-control" name="OTH_SRC" id="OTH_SRC" placeholder="OTH_SRC" value="{{$line->OTH_SRC}}"/>
                                                </div>
                                             </div>
                                        </div>
                                        <div class="row">
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label>PW_WGT</label>
                                                        <input type="text"class="form-control" name="PW_WGT" id="PW_WGT" placeholder="PW_WGT" value="{{$line->PW_WGT}}"/>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label>PW_RCC</label>
                                                        <select type="text"  class="form-control" name="PW_RCC" id="PW_RCC" placeholder="PW_RCC" value="{{$line->PW_RCC}}">
                                                            <option value=""   <?php if($line["PW_RCC"] == ''){ echo "selected";} ?>  >0 - Blank</option>
                                                            <option value="1"   <?php if($line["PW_RCC"] == '1'){ echo "selected";} ?>  >1 - Raw as purchased</option>
                                                            <option value="2"   <?php if($line["PW_RCC"] == '2'){ echo "selected";} ?>  >2 - Raw edible portion</option>
                                                            <option value="3"   <?php if($line["PW_RCC"] == '3'){ echo "selected";} ?>  >3 - Cooked as purchased</option>
                                                            <option value="4"   <?php if($line["PW_RCC"] == '4'){ echo "selected";} ?>  >4 - Cooked edible portion</option>
                                                            <option value="5"   <?php if($line["PW_RCC"] == '5'){ echo "selected";} ?>  >5 - Cleaned and Drawn fresh fish</option>
                                                            <option value="6"   <?php if($line["PW_RCC"] == '6'){ echo "selected";} ?>  >6 - Cleaned and Drawn cooked fish</option>
                                                            <option value="-"   <?php if($line["PW_RCC"] == '-'){ echo "selected";} ?>  >88 - NONE </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label>PW_CMC</label>
                                                        <select type="text" class="form-control" name="PW_CMC" id="PW_CMC" placeholder="PW_CMC" value="{{$line->PW_CMC}}">
                                                            <option value=""   <?php if($line["PW_CMC"] == ''){ echo "selected";} ?>  >0 - Blank</option>
                                                            <option value="1"   <?php if($line["PW_CMC"] == '1'){ echo "selected";} ?>  >1 - Boiled</option>
                                                            <option value="2"   <?php if($line["PW_CMC"] == '2'){ echo "selected";} ?>  >2 - Fried</option>
                                                            <option value="3"   <?php if($line["PW_CMC"] == '3'){ echo "selected";} ?>  >3 - Sauteed</option>
                                                            <option value="4"   <?php if($line["PW_CMC"] == '4'){ echo "selected";} ?>  >4 - Broiled</option>
                                                            <option value="5"   <?php if($line["PW_CMC"] == '5'){ echo "selected";} ?>  >5 - Scambled</option>
                                                            <option value="6"   <?php if($line["PW_CMC"] == '6'){ echo "selected";} ?>  >6 - Raw</option>
                                                            <option value="-"   <?php if($line["PW_CMC"] == '-'){ echo "selected";} ?>  >88 - NONE </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                        <div class="form-group">
                                                        <label>PURCODE</label>
                                                        <select type="text" class="form-control" name="PURCODE" id="PURCODE" placeholder="PURCODE" value="{{$line->PURCODE}}">
                                                            <option value=""   <?php if($line["PURCODE"] == ''){ echo "selected";} ?>  >0 - Blank</option>
                                                            <option value="1"   <?php if($line["PURCODE"] == '1'){ echo "selected";} ?>  >1 - Fed to pets</option>
                                                            <option value="2"   <?php if($line["PURCODE"] == '2'){ echo "selected";} ?>  >2 - Discarded</option>
                                                            <option value="-"   <?php if($line["PURCODE"] == '-'){ echo "selected";} ?>  >88 - NONE </option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>GO_WGT</label>
                                                            <input type="text"class="form-control" name="GO_WGT" id="GO_WGT" placeholder="GO_WGT" value="{{$line->GO_WGT}}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>GO_RCC</label>
                                                            <select type="text"  class="form-control" name="GO_RCC" id="GO_RCC" placeholder="GO_RCC" value="{{$line->GO_RCC}}">
                                                                <option value=""   <?php if($line["GO_RCC"] == ''){ echo "selected";} ?>  >0 - Blank</option>
                                                                <option value="1"   <?php if($line["GO_RCC"] == '1'){ echo "selected";} ?>  >1 - Raw as purchased</option>
                                                                <option value="2"   <?php if($line["GO_RCC"] == '2'){ echo "selected";} ?>  >2 - Raw edible portion</option>
                                                                <option value="3"   <?php if($line["GO_RCC"] == '3'){ echo "selected";} ?>  >3 - Cooked as purchased</option>
                                                                <option value="4"   <?php if($line["GO_RCC"] == '4'){ echo "selected";} ?>  >4 - Cooked edible portion</option>
                                                                <option value="5"   <?php if($line["GO_RCC"] == '5'){ echo "selected";} ?>  >5 - Cleaned and Drawn fresh fish</option>
                                                                <option value="6"   <?php if($line["GO_RCC"] == '6'){ echo "selected";} ?>  >6 - Cleaned and Drawn cooked fish</option>
                                                                <option value="-"   <?php if($line["GO_RCC"] == '-'){ echo "selected";} ?>  >88 - NONE </option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>GO_CMC</label>
                                                            <select type="text" class="form-control" name="GO_CMC" id="GO_CMC" placeholder="GO_CMC" value="{{$line->GO_CMC}}">
                                                                <option value=""   <?php if($line["GO_CMC"] == ''){ echo "selected";} ?>  >0 - Blank</option>
                                                                <option value="1"   <?php if($line["GO_CMC"] == '1'){ echo "selected";} ?>  >1 - Boiled</option>
                                                                <option value="2"   <?php if($line["GO_CMC"] == '2'){ echo "selected";} ?>  >2 - Fried</option>
                                                                <option value="3"   <?php if($line["GO_CMC"] == '3'){ echo "selected";} ?>  >3 - Sauteed</option>
                                                                <option value="4"   <?php if($line["GO_CMC"] == '4'){ echo "selected";} ?>  >4 - Broiled</option>
                                                                <option value="5"   <?php if($line["GO_CMC"] == '5'){ echo "selected";} ?>  >5 - Scambled</option>
                                                                <option value="6"   <?php if($line["GO_CMC"] == '6'){ echo "selected";} ?>  >6 - Raw</option>
                                                                <option value="-"   <?php if($line["GO_CMC"] == '-'){ echo "selected";} ?>  >88 - NONE </option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>LO_WGT</label>
                                                                <input type="text"class="form-control" name="LO_WGT" id="LO_WGT" placeholder="LO_WGT" value="{{$line->LO_WGT}}"/>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>LO_RCC</label>
                                                                <select type="text"  class="form-control" name="LO_RCC" id="LO_RCC" placeholder="LO_RCC" value="{{$line->LO_RCC}}">
                                                                    <option value=""   <?php if($line["LO_RCC"] == ''){ echo "selected";} ?>  >0 - Blank</option>
                                                                    <option value="1"   <?php if($line["LO_RCC"] == '1'){ echo "selected";} ?>  >1 - Raw as purchased</option>
                                                                    <option value="2"   <?php if($line["LO_RCC"] == '2'){ echo "selected";} ?>  >2 - Raw edible portion</option>
                                                                    <option value="3"   <?php if($line["LO_RCC"] == '3'){ echo "selected";} ?>  >3 - Cooked as purchased</option>
                                                                    <option value="4"   <?php if($line["LO_RCC"] == '4'){ echo "selected";} ?>  >4 - Cooked edible portion</option>
                                                                    <option value="5"   <?php if($line["LO_RCC"] == '5'){ echo "selected";} ?>  >5 - Cleaned and Drawn fresh fish</option>
                                                                    <option value="6"   <?php if($line["LO_RCC"] == '6'){ echo "selected";} ?>  >6 - Cleaned and Drawn cooked fish</option>
                                                                    <option value="-"   <?php if($line["LO_RCC"] == '-'){ echo "selected";} ?>  >88 - NONE </option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label>LO_CMC</label>
                                                                <select type="text" class="form-control" name="LO_CMC" id="LO_CMC" placeholder="LO_CMC" value="{{$line->LO_CMC}}">
                                                                    <option value=""   <?php if($line["LO_CMC"] == ''){ echo "selected";} ?>  >0 - Blank</option>
                                                                    <option value="1"   <?php if($line["LO_CMC"] == '1'){ echo "selected";} ?>  >1 - Boiled</option>
                                                                    <option value="2"   <?php if($line["LO_CMC"] == '2'){ echo "selected";} ?>  >2 - Fried</option>
                                                                    <option value="3"   <?php if($line["LO_CMC"] == '3'){ echo "selected";} ?>  >3 - Sauteed</option>
                                                                    <option value="4"   <?php if($line["LO_CMC"] == '4'){ echo "selected";} ?>  >4 - Broiled</option>
                                                                    <option value="5"   <?php if($line["LO_CMC"] == '5'){ echo "selected";} ?>  >5 - Scambled</option>
                                                                    <option value="6"   <?php if($line["LO_CMC"] == '6'){ echo "selected";} ?>  >6 - Raw</option>
                                                                    <option value="-"   <?php if($line["LO_CMC"] == '-'){ echo "selected";} ?>  >88 - NONE </option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label>Unit Cost</label>
                                                                    <input type="text"class="form-control" name="UNITCOST" id="UNITCOST" placeholder="Unit Cost" value="{{$line->UNITCOST}}"/>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label>Unit Weight</label>
                                                                    <input type="text"  class="form-control" name="UNITWGT" id="UNITWGT" placeholder="Unit Weight" value="{{$line->UNITWGT}}"/>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                    <div class="form-group">
                                                                    <label>Unit Measurement</label>
                                                                    <input type="text" class="form-control" name="UNIT" id="UNIT" placeholder="Unit Measurment" value="{{$line->UNIT}}"/>
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