@extends('layouts.main')

@section('content') 
<div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Updating Food Recall</h4>
                            <p class="category"> 
                                Please double check before click the Update button
                            </p>
                            <div  style="padding-bottom:2vmin; padding-top:1vmin;">
                                <a href="{{ route('mem_recall_edit', ['eacode'=>$eacode, 'hcn'=>$hcn, 'shsn'=>$shsn, 'MEMBER_CODE'=>$member, 'GIVENNAME'=>$givenname, 'SURNAME'=>$surname, 'AGE'=>$age, 'recday'=>$recday])}}">
                                <button type="submit" class="btn btn-secondary">
                                    <i class="pe-7s-back"></i> Go back to recall table
                                </button>
                            </a>
                        </div>
                        @include('inc.messages')
                        </div>
                        <div class="content"> 
                                <form class="update_form" method="post" action="{{action('FoodRecordController@update', $line->id)}}">
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
                                               <input type="text"class="form-control" name="FOOD_ITEM" id="FOOD_ITEM" placeholder="Food item" value="{{$line->FOOD_ITEM}}"/>
                                           </div>
                                       </div>
                                       <div class="col-md-6">
                                           <div class="form-group">
                                               <label>Food Description</label>
                                               <input type="text"  class="form-control" name="FOODDESC" id="FOODDESC" placeholder="Food description" value="{{$line->FOODDESC}}"/>
                                           </div>
                                       </div>
                                   </div>
       
                                   <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Brand</label>
                                                <input type="text" class="form-control" name="FOODBRND" id="FOODBRND" placeholder="Brand" value="{{$line->FOODBRND}}"/>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Main ingredient</label>
                                                <input type="text"class="form-control" name="FOODMAINING" id="FOODMAINING" placeholder="Main ingredient" value="{{$line->FOODMAINING}}"/>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>Brand Code</label>
                                                <input type="text"  class="form-control" name="FOODBRNDCD" id="FOODBRNDCD" placeholder="Brand Code" value="{{$line->FOODBRNDCD}}"/>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label>FVS</label>
                                                    <input type="text" class="form-control" name="FVS" id="FVS" placeholder="FVS" value="{{$line->FVS}}"/>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label>Fortified</label>
                                                    <input type="text"class="form-control" name="ISFORTIFIED" id="ISFORTIFIED" placeholder="Fortified" value="{{$line->ISFORTIFIED}}"/>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label>Vitamin A</label>
                                                    <input type="text"  class="form-control" name="VITA" id="VITA" placeholder="Vitamin A" value="{{$line->VITA}}"/>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label>Iron</label>
                                                        <input type="text" class="form-control" name="IRON" id="IRON" placeholder="Iron" value="{{$line->IRON}}"/>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                        <label>Other</label>
                                                    <input type="text" class="form-control" name="OTHF" id="OTHF" placeholder="Other" value="{{$line->OTHF}}"/>
                                                </div>
                                            </div>
                                        </div>
 
       
                                   <div class="row">
                                       <div class="col-md-4">
                                           <div class="form-group">
                                               <label>Meal Code</label>
                                               <select type="text" class="form-control" name="MEALCD" id="MEALCD" placeholder="Meal code" value="{{$line->MEALCD}}">
                                                    <option value=""   <?php if($line["MEALCD"] == ''){ echo "selected";} ?>  >0 - Blank</option>
                                                    <option value="1"   <?php if($line["MEALCD"] == '1'){ echo "selected";} ?>  >1 - Breakfast</option>
                                                    <option value="2"   <?php if($line["MEALCD"] == '2'){ echo "selected";} ?>  >2 - AM Snack</option>
                                                    <option value="3"   <?php if($line["MEALCD"] == '3'){ echo "selected";} ?>  >3 - Lunch</option>
                                                    <option value="4"   <?php if($line["MEALCD"] == '4'){ echo "selected";} ?>  >4 - PM Snack</option>
                                                    <option value="5"   <?php if($line["MEALCD"] == '5'){ echo "selected";} ?>  >5 - Supper</option>
                                                    <option value="6"   <?php if($line["MEALCD"] == '6'){ echo "selected";} ?>  >6 - Late PM Snack</option>
                                                    <option value="-"   <?php if($line["MEALCD"] == '-'){ echo "selected";} ?>  >88 - NONE </option>
                                                </select>   
                                           </div>
                                       </div>
                                       <div class="col-md-4">
                                            <div class="form-group">
                                                <label>RF Code</label>
                                            <select type="text" class="form-control" name="RFCODE" id="RFCODE" placeholder="RF code" value="{{$line->RFCODE}}">
                                                    <option value=""   <?php if($line["RFCODE"] == ''){ echo "selected";} ?>  >0 - Blank</option>
                                                    <option value="1"   <?php if($line["RFCODE"] == '1'){ echo "selected";} ?>  >1 - Single food item</option>
                                                    <option value="2"   <?php if($line["RFCODE"] == '2'){ echo "selected";} ?>  >2 - Mixed Dish</option>
                                                    <option value="3"   <?php if($line["RFCODE"] == '3'){ echo "selected";} ?>  >3 - Composite Ingridient</option>
                                                    <option value="4"   <?php if($line["RFCODE"] == '4'){ echo "selected";} ?>  >4 - Water</option>
                                                    <option value="5"   <?php if($line["RFCODE"] == '5'){ echo "selected";} ?>  >5 - Water added to conc/powdered Beverage</option>
                                                    <option value="6"   <?php if($line["RFCODE"] == '6'){ echo "selected";} ?>  >6 - Water used for cooking</option>
                                                    <option value="7"   <?php if($line["RFCODE"] == '7'){ echo "selected";} ?>  >7 - Beverage</option>
                                                    <option value="8"   <?php if($line["RFCODE"] == '8'){ echo "selected";} ?>  >8 - Other liquids, specify..</option>
                                                    <option value="-"   <?php if($line["RFCODE"] == '-'){ echo "selected";} ?>  >88 - NONE </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Food Ex</label>
                                                    <input type="text" class="form-control" name="FOODEX" id="FOODEX" placeholder="Food ex" value="{{$line->FOODEX}}"/>
                                            </div>
                                        </div>
                                   </div>
                                   <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label>FIC</label>
                                                <input type="text" list="fct" class="form-control" name="FOODCODE" id="FOODCODE" placeholder="FIC" value="{{$line->FOODCODE}}"/>
                                                <datalist id="fct" >
                                                        @foreach ($fct as $value)
                                                        <option >{{$value->foodcode.' - '.$value->fooddesc}}</option>
                                                        @endforeach                                         
                                                </datalist>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Food weight</label>
                                                <input type="text" class="form-control" name="FOODWEIGHT" id="FOODWEIGHT" placeholder="Food weight" value="{{$line->FOODWEIGHT}}"/>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label>RCC</label>
                                                    <select type="text"class="form-control" name="RCC" id="RCC" placeholder="RCC" value="{{$line->RCC}}">
                                                        <option value=""   <?php if($line["RCC"] == ''){ echo "selected";} ?>  >0 - Blank</option>
                                                        <option value="1"   <?php if($line["RCC"] == '1'){ echo "selected";} ?>  >1 - Raw as purchased</option>
                                                        <option value="2"   <?php if($line["RCC"] == '2'){ echo "selected";} ?>  >2 - Raw edible portion</option>
                                                        <option value="3"   <?php if($line["RCC"] == '3'){ echo "selected";} ?>  >3 - Cooked as purchased</option>
                                                        <option value="4"   <?php if($line["RCC"] == '4'){ echo "selected";} ?>  >4 - Cooked edible portion</option>
                                                        <option value="5"   <?php if($line["RCC"] == '5'){ echo "selected";} ?>  >5 - Cleaned and Drawn fresh fish </option>
                                                        <option value="6"   <?php if($line["RCC"] == '6'){ echo "selected";} ?>  >6 - Cleaned and Drawn cooked fish</option>
                                                        <option value="-"   <?php if($line["RCC"] == '-'){ echo "selected";} ?>  >88 - NONE </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label>CMC</label>
                                                    <select type="text"  class="form-control" name="CMC" id="CMC" placeholder="CMC" value="{{$line->CMC}}">
                                                        <option value=""   <?php if($line["CMC"] == ''){ echo "selected";} ?>  >0 - Blank</option>
                                                        <option value="1"   <?php if($line["CMC"] == '1'){ echo "selected";} ?>  >1 - Boiled</option>
                                                        <option value="2"   <?php if($line["CMC"] == '2'){ echo "selected";} ?>  >2 - Fried</option>
                                                        <option value="3"   <?php if($line["CMC"] == '3'){ echo "selected";} ?>  >3 - Sauteed</option>
                                                        <option value="4"   <?php if($line["CMC"] == '4'){ echo "selected";} ?>  >4 - Broiled</option>
                                                        <option value="5"   <?php if($line["CMC"] == '5'){ echo "selected";} ?>  >5 - Scambled</option>
                                                        <option value="6"   <?php if($line["CMC"] == '6'){ echo "selected";} ?>  >6 - Raw</option>
                                                        <option value="-"   <?php if($line["CMC"] == '-'){ echo "selected";} ?>  >88 - NONE</option>
                                                    </select>    
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label>SUP</label>
                                                    <select type="text" class="form-control" name="SUPCODE" id="SUPCODE" placeholder="SUP" value="{{$line->SUPCODE}}">
                                                        <option value=""   <?php if($line["SUPCODE"] == ''){ echo "selected";} ?>  >0 - Blank</option>
                                                        <option value="1"   <?php if($line["SUPCODE"] == '1'){ echo "selected";} ?>  >1 - Bought</option>
                                                        <option value="2"   <?php if($line["SUPCODE"] == '2'){ echo "selected";} ?>  >2 - Barter</option>
                                                        <option value="3"   <?php if($line["SUPCODE"] == '3'){ echo "selected";} ?>  >3 - Given</option>
                                                        <option value="4"   <?php if($line["SUPCODE"] == '4'){ echo "selected";} ?>  >4 - Own Produced</option>
                                                        <option value="9"   <?php if($line["SUPCODE"] == '9'){ echo "selected";} ?>  >9 - NA</option>
                                                        <option value="-"   <?php if($line["SUPCODE"] == '-'){ echo "selected";} ?>  >88 - NONE</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                        <label>SRC</label>
                                                    <select type="text" class="form-control" name="SRCCODE" id="SRCCODE" placeholder="SRC" value="{{$line->SRCCODE}}">
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
                                                    <label>Oth SRC</label>
                                                    <input type="text" class="form-control" name="OTH_SRC" id="OTH_SRC" placeholder="SRC" value="{{$line->OTH_SRC}}"/>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label>CPC</label>
                                                    <select type="text" class="form-control" name="CPC" id="CPC" placeholder="CPC" value="{{$line->CPC}}">
                                                        <option value=""   <?php if($line["CPC"] == ''){ echo "selected";} ?>  >0 - Blank</option>
                                                        <option value="1"   <?php if($line["CPC"] == '1'){ echo "selected";} ?>  >1 - Home-cooked, eaten at home</option>
                                                        <option value="2"   <?php if($line["CPC"] == '2'){ echo "selected";} ?>  >2 - Home-cooked, eaten away from home</option>
                                                        <option value="3"   <?php if($line["CPC"] == '3'){ echo "selected";} ?>  >3 - Bought, eaten at home</option>
                                                        <option value="4"   <?php if($line["CPC"] == '4'){ echo "selected";} ?>  >4 - Bought, eaten away from home</option>
                                                        <option value="5"   <?php if($line["CPC"] == '5'){ echo "selected";} ?>  >5 - Ready to eat, eaten at home</option>
                                                        <option value="6"   <?php if($line["CPC"] == '6'){ echo "selected";} ?>  >6 - Ready to eat, eaten away from home</option>
                                                        <option value="99"   <?php if($line["CPC"] == '99'){ echo "selected";} ?>  >99 - Not Applicable</option>
                                                        <option value="-"   <?php if($line["CPC"] == '-'){ echo "selected";} ?>  >88 - NONE</option>
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
                                                            <label>Unit Measurment</label>
                                                        <input type="text" class="form-control" name="UNITMEAS" id="UNITMEAS" placeholder="Unit Measurment" value="{{$line->UNITMEAS}}"/>
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