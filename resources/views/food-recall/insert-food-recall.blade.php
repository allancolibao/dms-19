<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Insert Food Recall</h4>
                        <p class="category"> 
                            Please double check before click the Save button
                        </p>
                    </div>
                    <div class="content"> 
                        <form class="insert_form" method="post" action="{{ route('insert.recall')}}">
                            {{csrf_field()}} 
                            <input type="hidden" class="form-control" name="eacode" id="eacode" placeholder="" value="{{$eacode}}"/>
                            <input type="hidden" class="form-control" name="hcn" id="hcn" placeholder="" value="{{$hcn}}"/>  
                            <input type="hidden" class="form-control" name="shsn" id="shsn" placeholder="" value="{{$shsn}}"/>  
                            <input type="hidden" class="form-control" name="MEMBER_CODE" id="MEMBER_CODE" placeholder="" value="{{$member}}"/>  
                            <input type="hidden" class="form-control" name="RECDAY" id="RECDAY" placeholder="" value="{{$recday}}"/>                       
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Line no.</label>
                                    <input type="number" step="any" class="form-control" name="LINENO" id="LINENO" placeholder="Line no" value="" required/>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Food Item</label>
                                        <input type="text"class="form-control" name="FOOD_ITEM" id="FOOD_ITEM" placeholder="Food item" value=""/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Food Description</label>
                                        <input type="text"  class="form-control" name="FOODDESC" id="FOODDESC" placeholder="Food description" value=""/>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Brand</label>
                                    <input type="text" class="form-control" name="FOODBRND" id="FOODBRND" placeholder="Brand" value=""/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Main ingredient</label>
                                        <input type="text"class="form-control" name="FOODMAINING" id="FOODMAINING" placeholder="Main ingredient" value=""/>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Brand Code</label>
                                        <input type="text"  class="form-control" name="FOODBRNDCD" id="FOODBRNDCD" placeholder="Brand Code" value=""/>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>FVS</label>
                                        <input type="text" class="form-control" name="FVS" id="FVS" placeholder="FVS" value=""/>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Fortified</label>
                                            <input type="text"class="form-control" name="ISFORTIFIED" id="ISFORTIFIED" placeholder="Fortified" value=""/>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Vitamin A</label>
                                            <input type="text"  class="form-control" name="VITA" id="VITA" placeholder="Vitamin A" value=""/>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                            <div class="form-group">
                                                <label>Iron</label>
                                            <input type="text" class="form-control" name="IRON" id="IRON" placeholder="Iron" value=""/>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                                <label>Other</label>
                                            <input type="text" class="form-control" name="OTHF" id="OTHF" placeholder="Other" value=""/>
                                        </div>
                                    </div>
                                </div>


                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Meal Code</label>
                                        <select type="text" class="form-control" name="MEALCD" id="MEALCD" placeholder="Meal code" value="">
                                            <option value=""  >0 - Blank</option>
                                            <option value="1" >1 - Breakfast</option>
                                            <option value="2" >2 - AM Snack</option>
                                            <option value="3" >3 - Lunch</option>
                                            <option value="4" >4 - PM Snack</option>
                                            <option value="5" >5 - Supper</option>
                                            <option value="6" >6 - Late PM Snack</option>
                                            <option value="-" >88 - NONE </option>
                                        </select>   
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>RF Code</label>
                                    <select type="text" class="form-control" name="RFCODE" id="RFCODE" placeholder="RF code" value="">
                                            <option value=""   >0 - Blank</option>
                                            <option value="1"  >1 - Single food item</option>
                                            <option value="2"  >2 - Mixed Dish</option>
                                            <option value="3"  >3 - Composite Ingridient</option>
                                            <option value="4"  >4 - Water</option>
                                            <option value="5"  >5 - Water added to conc/powdered Beverage</option>
                                            <option value="6"  >6 - Water used for cooking</option>
                                            <option value="7"  >7 - Beverage</option>
                                            <option value="8"  >8 - Other liquids, specify..</option>
                                            <option value="9"  >9 - NONE </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Food Ex</label>
                                            <input type="text" class="form-control" name="FOODEX" id="FOODEX" placeholder="Food ex" value=""/>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>FIC</label>
                                        <input type="text" list="fct" class="form-control" name="FOODCODE" id="FOODCODE" placeholder="FIC" value=""/>
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
                                        <input type="number" step="any" class="form-control" name="FOODWEIGHT" id="FOODWEIGHT" placeholder="Food weight" value=""/>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>RCC</label>
                                            <select type="text"class="form-control" name="RCC" id="RCC" placeholder="RCC" value="">
                                                <option value=""  >0 - Blank</option>
                                                <option value="1" >1 - Raw as purchased</option>
                                                <option value="2" >2 - Raw edible portion</option>
                                                <option value="3" >3 - Cooked as purchased</option>
                                                <option value="4" >4 - Cooked edible portion</option>
                                                <option value="5" >5 - Cleaned and Drawn fresh fish </option>
                                                <option value="6" >6 - Cleaned and Drawn cooked fish</option>
                                                <option value="-" >88 - NONE </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>CMC</label>
                                            <select type="text"  class="form-control" name="CMC" id="CMC" placeholder="CMC" value="">
                                                <option value=""   >0 - Blank</option>
                                                <option value="1"  >1 - Boiled</option>
                                                <option value="2"  >2 - Fried</option>
                                                <option value="3"  >3 - Sauteed</option>
                                                <option value="4"  >4 - Broiled</option>
                                                <option value="5"  >5 - Scambled</option>
                                                <option value="6"  >6 - Raw</option>
                                                <option value="-"  >88 - NONE</option>
                                            </select>    
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                            <div class="form-group">
                                                <label>SUP</label>
                                            <select type="text" class="form-control" name="SUPCODE" id="SUPCODE" placeholder="SUP" value="">
                                                <option value=""   >0 - Blank</option>
                                                <option value="1"  >1 - Bought</option>
                                                <option value="2"  >2 - Barter</option>
                                                <option value="3"  >3 - Given</option>
                                                <option value="4"  >4 - Own Produced</option>
                                                <option value="9"  >9 - NA</option>
                                                <option value="-"  >88 - NONE</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                                <label>SRC</label>
                                            <select type="text" class="form-control" name="SRCCODE" id="SRCCODE" placeholder="SRC" value="">
                                                <option value=""     >0 - Blank</option>
                                                <option value="1"    >1 - Fastfood</option>
                                                <option value="2"    >2 - Carinderia / Turo-turo</option>
                                                <option value="3"    >3 - Canteen/Cafeteria</option>
                                                <option value="4"    >4 - Restaurant</option>
                                                <option value="5"    >5 - Market / Talipapa</option>
                                                <option value="6"    >6 - Sari-sari Store</option>
                                                <option value="7"    >7 - Supermarket</option>
                                                <option value="8"    >8 - Grocery</option>
                                                <option value="8"    >9 - Convenience Store</option>
                                                <option value="10"   >10 - Mobile Vendor</option>
                                                <option value="11"   >11 - Specialty Store</option>
                                                <option value="12"   >12 - Home prepared</option>
                                                <option value="13"   >13 - Food Aid</option>
                                                <option value="14"   >14 - Homeyard garden, livestock, fishpen</option>
                                                <option value="15"   >15 - Farm garden, farmstock, fishpen</option>
                                                <option value="16"   >16 - Water from deepwell, rainfall and spring</option>
                                                <option value="17"   >17 - Water from waterworks like NAWASA and Maynilad</option>
                                                <option value="18"   >18 - Pharmacy / Clinic</option>
                                                <option value="19"   >19 - Others</option>
                                                <option value="-"    >88 - NONE</option>
                                            </select>
                                            </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Oth SRC</label>
                                            <input type="text" class="form-control" name="OTH_SRC" id="OTH_SRC" placeholder="SRC" value=""/>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>CPC</label>
                                            <select type="text" class="form-control" name="CPC" id="CPC" placeholder="CPC" value="">
                                                <option value="" >0 - Blank</option>
                                                <option value="1">1 - Home-cooked, eaten at home</option>
                                                <option value="2">2 - Home-cooked, eaten away from home</option>
                                                <option value="3">3 - Bought, eaten at home</option>
                                                <option value="4">4 - Bought, eaten away from home</option>
                                                <option value="5">5 - Ready to eat, eaten at home</option>
                                                <option value="6">6 - Ready to eat, eaten away from home</option>
                                                <option value="99">99 - Not Applicable</option>
                                                <option value="-">88- none </option>
                                            </select>    
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Unit Cost</label>
                                                <input type="text"class="form-control" name="UNITCOST" id="UNITCOST" placeholder="Unit Cost" value=""/>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Unit Weight</label>
                                                <input type="text"  class="form-control" name="UNITWGT" id="UNITWGT" placeholder="Unit Weight" value=""/>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Unit Measurment</label>
                                                <input type="text" class="form-control" name="UNITMEAS" id="UNITMEAS" placeholder="Unit Measurment" value=""/>
                                            </div>
                                        </div>
                                    </div>
                                <button type="submit" value="edit" class="btn btn-secondary pull-right">Save</button>
                            <div class="clearfix"></div>                             
                        </form>                       
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>