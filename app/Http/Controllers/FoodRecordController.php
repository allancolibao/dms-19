<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Str;
use App\http\Requests;
use App\TransmissionLog;
use App\Encoding;
use App\Booklet9;
use App\Members;
use App\Booklet10;
use App\F60;
use App\FCT;
use App\FNO;
use Validator;
use Response;
use DB;
use Carbon\Carbon;


class FoodRecordController extends Controller
{
      /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
  
    public function index()
    {
        
        return view('dashboard.foodrecord');
    }


    // Search function //
    public function searchFoodRecord(Request $request)
    {
        
        $rules = array
        (
            'key' => 'required|min:4|max:12'
        );
    
        $validator = Validator::make ( Input::all(), $rules);
        if ($validator->fails())
        return redirect('/foodrecord')->with('error', 'Please re-enter the eacode [ 4-12 digits required ], Thank you');
        
        else 
        {
        $key = Input::get ('key');

        $foodweighing = Booklet9::where('eacode','LIKE','%'.$key.'%')->distinct()->get(['eacode','hcn','shsn']);
        $count = Booklet9::where('eacode','LIKE','%'.$key.'%')->distinct()->get(['eacode','hcn','shsn'])->count();

        $foodrecall = DB::table('d_f71')
        ->join('d_f11', function ($join) {
            $join->on('d_f11.eacode', '=', 'd_f71.eacode')
                 ->On('d_f11.hcn', '=', 'd_f71.hcn')
                 ->On('d_f11.shsn', '=', 'd_f71.shsn')
                 ->On('d_f11.MEMBER_CODE', '=', 'd_f71.MEMBER_CODE');
                })
                 ->where('d_f71.eacode','LIKE','%'.$key.'%')
                 ->distinct()
                 ->get(['d_f71.eacode','d_f71.hcn','d_f71.shsn','d_f71.MEMBER_CODE','d_f11.SURNAME','d_f11.GIVENNAME','d_f11.AGE']);

        $countrecall = Booklet10::where('eacode','LIKE','%'.$key.'%')->distinct()->get(['eacode','hcn','shsn','MEMBER_CODE'])->count();

        $form61 = Members::where('eacode','LIKE','%'.$key.'%')
                ->orderBy('hcn', 'ASC')
                ->orderBy('shsn', 'ASC')
                ->orderBy('MEMBER_CODE', 'ASC')
                ->get();

        $countmem = Members::where('eacode','LIKE','%'.$key.'%')->distinct()->get(['eacode','hcn','shsn','MEMBER_CODE'])->count();

        return view('dashboard.searchfoodrecord',compact('count','foodweighing','foodrecall','countrecall','form61','countmem'));
        }   
    }


    // Get the members of the hh //
    public function members($eacode, $hcn, $shsn)
    {       

      
        $countrecall = Booklet10::where('eacode','LIKE','%'.$eacode.'%')
                                ->where('hcn','LIKE','%'.$hcn.'%')
                                ->where('shsn','LIKE','%'.$shsn.'%')
                                ->distinct()
                                ->get(['eacode','hcn','shsn','MEMBER_CODE'])
                                ->count();

        $foodrecall = DB::table('d_f71')
        ->join('d_f11', function ($join) {
            $join->on('d_f11.eacode', '=', 'd_f71.eacode')
                 ->On('d_f11.hcn', '=', 'd_f71.hcn')
                 ->On('d_f11.shsn', '=', 'd_f71.shsn')
                 ->On('d_f11.MEMBER_CODE', '=', 'd_f71.MEMBER_CODE');
                })
                 ->where('d_f71.eacode','LIKE','%'.$eacode.'%')
                 ->where('d_f71.hcn','LIKE','%'.$hcn.'%')
                 ->where('d_f71.shsn','LIKE','%'.$shsn.'%')
                 ->distinct()
                 ->get(['d_f71.eacode','d_f71.hcn','d_f71.shsn','d_f71.MEMBER_CODE','d_f11.SURNAME','d_f11.GIVENNAME','d_f11.AGE']);

        $members = Booklet10::where('eacode','LIKE','%'.$eacode.'%')
                 ->where('hcn','LIKE','%'.$hcn.'%')
                 ->where('shsn','LIKE','%'.$shsn.'%')
                 ->distinct()->get(['eacode','hcn','shsn','MEMBER_CODE'])->count();   
                 
        $hhead = DB::table('d_f11')
                 ->select('SURNAME','GIVENNAME','AGE')
                 ->where('eacode','LIKE','%'.$eacode.'%')
                 ->where('hcn','LIKE','%'.$hcn.'%')
                 ->where('shsn','LIKE','%'.$shsn.'%')
                 ->where('MEMBER_CODE','=','01')
                 ->first();           

        return view('dashboard.member',compact('foodrecall','members','eacode','hcn','shsn','hhead','countrecall'));
    }


    // Get the information of household member //
    public function recall($eacode, $hcn, $shsn, $member, $givenname ,$surname, $age)
    {       
        return view('dashboard.mem_recall',compact( 'eacode','hcn','shsn','member','givenname','surname','age'));
    }


    // Fetch recall day 1 or 2 based on selection //
    public function memrecall($eacode, $hcn, $shsn, $member, $givenname ,$surname, $age, $recday)
    {    
        $fct = FCT::all();

        $lines = Booklet10::where('eacode','LIKE','%'.$eacode.'%')
                            ->where('hcn','LIKE','%'.$hcn.'%')
                            ->where('shsn','LIKE','%'.$shsn.'%')
                            ->where('MEMBER_CODE','LIKE','%'.$member.'%')
                            ->where('RECDAY','LIKE','%'.$recday.'%')
                            ->orderByRaw('LENGTH(LINENO)', 'ASC')
                            ->orderBy('LINENO', 'ASC')
                            ->get();

        $l1 = Booklet10::where('eacode','LIKE','%'.$eacode.'%')
                            ->where('hcn','LIKE','%'.$hcn.'%')
                            ->where('shsn','LIKE','%'.$shsn.'%')
                            ->where('MEMBER_CODE','LIKE','%'.$member.'%')
                            ->where('RECDAY','LIKE','%'.$recday.'%')
                            ->where('LINENO', '=' ,'01')
                            ->orWhere('eacode','LIKE','%'.$eacode.'%')
                            ->where('hcn','LIKE','%'.$hcn.'%')
                            ->where('shsn','LIKE','%'.$shsn.'%')
                            ->where('MEMBER_CODE','LIKE','%'.$member.'%')
                            ->where('RECDAY','LIKE','%'.$recday.'%')
                            ->where('LINENO', '=' ,'1')
                            ->get();

        return view('dashboard.mem_recall_edit',compact('fct','eacode','hcn','shsn','member','givenname','surname','age','recday','lines','l1'));
    }


    // Retrieve recall line no data for edit //
    public function editline($eacode, $hcn, $shsn, $member, $givenname ,$surname, $age, $recday, $id)
    {
        $fct = DB::table('xfctx2017')->select('foodcode', 'fooddesc')->get();
        $line = Booklet10::find ($id);
        return view('dashboard.edit_line', compact('line','id', 'fct','eacode','hcn','shsn','member','givenname','surname','age','recday'));
    }


     // Insert Food record  line no data for edit //
     public function insertFoodRecall($eacode, $hcn, $shsn, $member, $givenname ,$surname, $age, $recday)
     {
         $fct = DB::table('xfctx2017')->select('foodcode', 'fooddesc')->get();
         return view('dashboard.insert_food_recall', compact('fct','eacode','hcn','shsn','member','givenname','surname','age','recday'));
     }


    // Insert Form 7.2  line no //

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function insertRecall(Request $request)
    {
        $line = new Booklet10;
        $line->eacode = $request->get('eacode');
        $line->hcn = $request->get('hcn');
        $line->shsn = $request->get('shsn');
        $line->MEMBER_CODE = $request->get('MEMBER_CODE');
        $line->RECDAY = $request->get('RECDAY');
        $line->LINENO = $request->get("LINENO");
        $line->FOOD_ITEM = $request->get("FOOD_ITEM");
        $line->FOODDESC = $request->get("FOODDESC");
        $line->FOODBRND = $request->get("FOODBRND");
        $line->FOODMAINING = $request->get("FOODMAINING");
        $line->FOODBRNDCD = $request->get("FOODBRNDCD");
        $line->FVS = $request->get("FVS");
        $line->ISFORTIFIED = $request->get("ISFORTIFIED");
        $line->VITA = $request->get("VITA");
        $line->IRON = $request->get("IRON");
        $line->OTHF = $request->get("OTHF");
        $line->MEALCD = $request->get("MEALCD");
        $line->RFCODE = $request->get("RFCODE");
        $line->FOODEX = $request->get("FOODEX");
        $line->FIC = Str::substr($request->get('FOODCODE'), 0, 4);
        $line->FOODCODE = $request->get("FOODCODE");
        $line->FOODWEIGHT = $request->get("FOODWEIGHT");
        $line->RCC = $request->get("RCC");
        $line->CMC = $request->get("CMC");
        $line->SUPCODE = $request->get("SUPCODE");
        $line->SRCCODE = $request->get("SRCCODE");
        $line->OTH_SRC = $request->get("OTH_SRC");
        $line->CPC = $request->get("CPC");
        $line->UNITCOST = $request->get("UNITCOST");
        $line->UNITWGT = $request->get("UNITWGT");
        $line->UNITMEAS = $request->get("UNITMEAS");
        $line->save();

        return redirect()->back()->with('success', 'Data successfully inserted');
        
     }


    // Update Form 7.2  line no //

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $line = Booklet10::find($id);
        // $line->LINENO = $request->get("LINENO");
        // $line->FOOD_ITEM = $request->get("FOOD_ITEM");
        // $line->FOODDESC = $request->get("FOODDESC");
        // $line->FOODBRND = $request->get("FOODBRND");
        // $line->FOODMAINING = $request->get("FOODMAINING");
        // $line->FOODBRNDCD = $request->get("FOODBRNDCD");
        // $line->FVS = $request->get("FVS");
        // $line->ISFORTIFIED = $request->get("ISFORTIFIED");
        // $line->VITA = $request->get("VITA");
        // $line->IRON = $request->get("IRON");
        // $line->OTHF = $request->get("OTHF");
        // $line->MEALCD = $request->get("MEALCD");
        // $line->RFCODE = $request->get("RFCODE");
        // $line->FOODEX = $request->get("FOODEX");
        // $line->FIC = Str::substr($request->get('FOODCODE'), 0, 4);
        // $line->FOODCODE = $request->get("FOODCODE");
        // $line->FOODWEIGHT = $request->get("FOODWEIGHT");
        // $line->RCC = $request->get("RCC");
        // $line->CMC = $request->get("CMC");
        // $line->SUPCODE = $request->get("SUPCODE");
        // $line->SRCCODE = $request->get("SRCCODE");
        // $line->OTH_SRC = $request->get("OTH_SRC");
        // $line->CPC = $request->get("CPC");
        // $line->UNITCOST = $request->get("UNITCOST");
        // $line->UNITWGT = $request->get("UNITWGT");
        // $line->UNITMEAS = $request->get("UNITMEAS");
        // $line->save();

        $data = $request->all();

        if(count($request->LINENO) > 0)
        {
            foreach($request->LINENO as $input => $value)
            {
                $foodRecall = array(
                'LINENO' => $request->LINENO[$input],
                'FOOD_ITEM' => $request->FOOD_ITEM[$input],
                'FOODDESC' => $request->FOODDESC[$input],
                'FOODBRND' => $request->FOODBRND[$input],
                'FOODMAINING' => $request->FOODMAINING[$input],
                'FOODBRNDCD' => $request->FOODBRNDCD[$input],
                'FVS' => $request->FVS[$input],
                'ISFORTIFIED' => $request->ISFORTIFIED[$input],
                'VITA' => $request->VITA[$input],
                'IRON' => $request->IRON[$input],
                'OTHF' => $request->OTHF[$input],
                'MEALCD' => $request->MEALCD[$input],
                'RFCODE' => $request->RFCODE[$input],
                'FOODEX' => $request->FOODEX[$input],
                'FIC' => Str::substr($request->FOODCODE[$input], 0, 4),
                'FOODCODE' => $request->FOODCODE[$input],
                'FOODWEIGHT' => $request->FOODWEIGHT[$input],
                'RCC' => $request->RCC[$input],
                'CMC' => $request->CMC[$input],
                'SUPCODE' => $request->SUPCODE[$input],
                'SRCCODE' => $request->SRCCODE[$input],
                'OTH_SRC' => $request->OTH_SRC[$input],
                'CPC' => $request->CPC[$input],
                'UNITCOST' => $request->UNITCOST[$input],
                'UNITWGT' => $request->UNITWGT[$input],
                'UNITMEAS' => $request->UNITMEAS[$input],
                );

                Booklet10::where('id', $request->id[$input])->update($foodRecall);
            }
        }

        return redirect()->back()->with('success', 'Data successfully updated');
        
     }


     public function updateLineOne(Request $request, $id)
    {
        $line = Booklet10::find($id);
        $line->status = $request->get("status");
        $line->refday = $request->get("refday");
        $line->monthref = $request->get("monthref");
        $line->dayref = $request->get("dayref");
        $line->yearref = $request->get("yearref");
        $line->save();

        return redirect()->back()->with('success', 'Data successfully updated');
        
     }


   // Retrieve form 6.1 record //
   public function membership($eacode, $hcn, $shsn)
   {

    // $hhead = DB::table('d_f11')
    //              ->select('SURNAME','GIVENNAME','AGE')
    //              ->where('eacode','LIKE','%'.$eacode.'%')
    //              ->where('hcn','LIKE','%'.$hcn.'%')
    //              ->where('shsn','LIKE','%'.$shsn.'%')
    //              ->where('MEMBER_CODE','=','01')
    //              ->first();

    $memberships = Members::where('eacode','LIKE','%'.$eacode.'%')
                 ->where('hcn','LIKE','%'.$hcn.'%')
                 ->where('shsn','LIKE','%'.$shsn.'%')
                 ->orderBy('MEMBER_CODE', 'ASC')
                 ->get();

    $f60 = F60::where('eacode','LIKE','%'.$eacode.'%')
                 ->where('hcn','LIKE','%'.$hcn.'%')
                 ->where('shsn','LIKE','%'.$shsn.'%')
                 ->get();

    return view('dashboard.membership', compact('eacode','hcn','shsn', 'memberships', 'f60'));
    }


    // Update Membership F60 //

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updatef60(Request $request, $id)
    {
        $line = F60::find($id);
        $line->monthref = $request->get("monthref");
        $line->dayref = $request->get("dayref");
        $line->yearref = $request->get("yearref");
        $line->REFDAY = $request->get("REFDAY");
        $line->MEALPATTERN = $request->get("MEALPATTERN");
        $line->PETS = $request->get("PETS");
        $line->INTERVIEW_STATUS = $request->get("INTERVIEW_STATUS");
        $line->save();

        return redirect()->back()->with('success', 'Data successfully updated');
        
     }



    // Retrieve Form 6.1 data for edit //
    public function membershipedit($eacode, $hcn, $shsn, $memcode, $id)
    {
        $member = Members::find ($id);
        return view('dashboard.membership_edit', compact('id','eacode','hcn','shsn','memcode', 'member'));
    }

        // Update Membership Form 6.1 //

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updatemembership(Request $request, $id)
    {
        $member = Members::find($id);
        $member->MEMBER_CODE = $request->get("MEMBER_CODE");
        $member->SURNAME = $request->get("SURNAME");
        $member->GIVENNAME = $request->get("GIVENNAME");
        $member->AGE = $request->get("AGE");
        $member->SEX = $request->get("SEX");
        $member->PSC = $request->get("PSC");
        $member->MP = $request->get("MP");
        $member->BF = $request->get("BF");
        $member->AMSNCK = $request->get("AMSNCK");
        $member->LUNCH = $request->get("LUNCH");
        $member->PMSNCK = $request->get("PMSNCK");
        $member->SUPPER = $request->get("SUPPER");
        $member->LATESNCK = $request->get("LATESNCK");
        $member->save();

        return redirect()->back()->with('success', 'Data successfully updated');
        
     }


     // Retrieve Form 6.3 data for edit //
    public function record($eacode, $hcn, $shsn)
    {
        $fct = DB::table('xfctx2017')->select('foodcode', 'fooddesc')->get();

        // $hhead = DB::table('d_f11')
        //          ->select('SURNAME','GIVENNAME','AGE')
        //          ->where('eacode','LIKE','%'.$eacode.'%')
        //          ->where('hcn','LIKE','%'.$hcn.'%')
        //          ->where('shsn','LIKE','%'.$shsn.'%')
        //          ->where('MEMBER_CODE','=','01')
        //          ->first();

        $records = Booklet9::where('eacode','LIKE','%'.$eacode.'%')
                 ->where('hcn','LIKE','%'.$hcn.'%')
                 ->where('shsn','LIKE','%'.$shsn.'%')
                 ->orderByRaw('LENGTH(LINENO)', 'ASC')
                 ->orderBy('LINENO', 'ASC')
                 ->get();

        return view('dashboard.food_record_edit', compact('eacode','hcn','shsn','records','fct'));
    }


    // Retrieve Food record  line no data for edit //
    public function editrecord($eacode, $hcn, $shsn, $id)
    {
        $fct = DB::table('xfctx2017')->select('foodcode', 'fooddesc')->get();
        $line = Booklet9::find ($id);
        return view('dashboard.edit_record', compact('fct','line','id', 'eacode','hcn','shsn'));
    }


    // Update Membership Form 6.3 //

  /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updatefoodrecord(Request $request, $id)
    {

        // $record = Booklet9::find($id);
        // $record->LINENO = $request->get('LINENO');
        // $record->FOODITEM = $request->get('FOODITEM');
        // $record->DESCRIPTION = $request->get('DESCRIPTION');
        // $record->BRANDNAME = $request->get('BRANDNAME');
        // $record->MAINIGNT = $request->get('MAINIGNT');
        // $record->BRANDCODE = $request->get('BRANDCODE');
        // $record->MEALCD = $request->get('MEALCD');
        // $record->WRCODE = $request->get('WRCODE');
        // $record->RFCODE = $request->get('RFCODE');
        // $record->FOODEX = $request->get('FOODEX');
        // $record->FOODCODE = Str::substr($request->get('FOODDESC'), 0, 4);
        // $record->FOODDESC = $request->get('FOODDESC');
        // $record->FOODWEIGHT = $request->get('FOODWEIGHT');
        // $record->RCC = $request->get('RCC');
        // $record->CMC = $request->get('CMC');
        // $record->SUPCODE = $request->get('SUPCODE');
        // $record->SRCCODE = $request->get('SRCCODE');
        // $record->OTH_SRC = $request->get('OTH_SRC');
        // $record->PW_WGT = $request->get('PW_WGT');
        // $record->PW_RCC = $request->get('PW_RCC');
        // $record->PW_CMC = $request->get('PW_CMC');
        // $record->PURCODE = $request->get('PURCODE');
        // $record->GO_WGT = $request->get('GO_WGT');
        // $record->GO_RCC = $request->get('GO_RCC');
        // $record->GO_CMC = $request->get('GO_CMC');
        // $record->LO_WGT = $request->get('LO_WGT');
        // $record->LO_RCC = $request->get('LO_RCC');
        // $record->LO_CMC = $request->get('LO_CMC');
        // $record->UNITCOST = $request->get('UNITCOST');
        // $record->UNITWGT = $request->get('UNITWGT');
        // $record->UNIT = $request->get('UNIT');
        // $record->save();


        // return redirect()->back()->with('success', 'Data successfully updated');


        $data = $request->all();

        if(count($request->LINENO) > 0)
        {
            foreach($request->LINENO as $input => $value)
            {
                $foodRecord = array(
                    'LINENO' => $request->LINENO[$input],
                    'FOODITEM' => $request->FOODITEM[$input],
                    'DESCRIPTION' => $request->DESCRIPTION[$input],
                    'BRANDNAME' => $request->BRANDNAME[$input],
                    'MAINIGNT' => $request->MAINIGNT[$input],
                    'BRANDCODE' => $request->BRANDCODE[$input],
                    'MEALCD' => $request->MEALCD[$input],
                    'WRCODE' => $request->WRCODE[$input],
                    'RFCODE' => $request->RFCODE[$input],
                    'FOODEX' => $request->FOODEX[$input],
                    'FOODCODE' => Str::substr($request->FOODDESC[$input], 0, 4),
                    'FOODDESC' => $request->FOODDESC[$input],
                    'FOODWEIGHT' => $request->FOODWEIGHT[$input],
                    'RCC' => $request->RCC[$input],
                    'CMC' => $request->CMC[$input],
                    'SUPCODE' => $request->SUPCODE[$input],
                    'SRCCODE' => $request->SRCCODE[$input],
                    'OTH_SRC' => $request->OTH_SRC[$input],
                    'PW_WGT' => $request->PW_WGT[$input],
                    'PW_RCC' => $request->PW_RCC[$input],
                    'PW_CMC' => $request->PW_CMC[$input],
                    'PURCODE' => $request->PURCODE[$input],
                    'GO_WGT' => $request->GO_WGT[$input],
                    'GO_RCC' => $request->GO_RCC[$input],
                    'GO_CMC' => $request->GO_CMC[$input],
                    'LO_WGT' => $request->LO_WGT[$input],
                    'LO_RCC' => $request->LO_RCC[$input],
                    'LO_CMC' => $request->LO_CMC[$input],
                    'UNITCOST' => $request->UNITCOST[$input],
                    'UNITWGT' => $request->UNITWGT[$input],
                    'UNIT' => $request->UNIT[$input],
                );

                Booklet9::where('id', $request->id[$input])->update($foodRecord);
            }
        }

        return redirect()->back()->with('success', 'Food Record successfully updated');
        
     }


     // Insert Food record  line no data for edit //
    public function insertFoodRecord($eacode, $hcn, $shsn)
    {
        $fct = DB::table('xfctx2017')->select('foodcode', 'fooddesc')->get();
        return view('dashboard.insert_food_record', compact('fct','eacode','hcn','shsn'));
    }


    public function addRecord(Request $request)
    {
      
        $record = new Booklet9;
        $record->eacode = $request->get('eacode');
        $record->hcn = $request->get('hcn');
        $record->shsn = $request->get('shsn');
        $record->LINENO = $request->get('LINENO');
        $record->FOODITEM = $request->get('FOODITEM');
        $record->DESCRIPTION = $request->get('DESCRIPTION');
        $record->BRANDNAME = $request->get('BRANDNAME');
        $record->MAINIGNT = $request->get('MAINIGNT');
        $record->BRANDCODE = $request->get('BRANDCODE');
        $record->MEALCD = $request->get('MEALCD');
        $record->WRCODE = $request->get('WRCODE');
        $record->RFCODE = $request->get('RFCODE');
        $record->FOODEX = $request->get('FOODEX');
        $record->FOODCODE = Str::substr($request->get('FOODDESC'), 0, 4);
        $record->FOODDESC = $request->get('FOODDESC');
        $record->FOODWEIGHT = $request->get('FOODWEIGHT');
        $record->RCC = $request->get('RCC');
        $record->CMC = $request->get('CMC');
        $record->SUPCODE = $request->get('SUPCODE');
        $record->SRCCODE = $request->get('SRCCODE');
        $record->OTH_SRC = $request->get('OTH_SRC');
        $record->PW_WGT = $request->get('PW_WGT');
        $record->PW_RCC = $request->get('PW_RCC');
        $record->PW_CMC = $request->get('PW_CMC');
        $record->PURCODE = $request->get('PURCODE');
        $record->GO_WGT = $request->get('GO_WGT');
        $record->GO_RCC = $request->get('GO_RCC');
        $record->GO_CMC = $request->get('GO_CMC');
        $record->LO_WGT = $request->get('LO_WGT');
        $record->LO_RCC = $request->get('LO_RCC');
        $record->LO_CMC = $request->get('LO_CMC');
        $record->UNITCOST = $request->get('UNITCOST');
        $record->UNITWGT = $request->get('UNITWGT');
        $record->UNIT = $request->get('UNIT');
        $record->save();

      return redirect()->back()->with('success', 'Data successfully inserted');
    }


    public function count(Request $request) 
    {

        $today = Carbon::now()->toDateString();

        $count = DB::table('localsurveyareas_2018') ->get(['eacode','areaname']);
                // ->join('localsurveyareas_2018', function ($join) {
                //     $join->on('localsurveyareas_2018.eacode', '=', 'd_f71.eacode');
                // })
                // ->distinct()
                // ->orderBy('d_f71.eacode', 'ASC')
               

        $filename = "Count Report $today.csv";
        $handle = fopen($filename, 'w+');
        fputcsv($handle, array('FNO', 'EACODE', 'AREANAME','HOUSEHOLD COUNTs', 'INDIVIDUAL COUNTs', 'ACTUAL COUNTs'));

        foreach($count as $row) {

            $eacode = $row->eacode;

            $fno = FNO::where('AREACODE','=', $eacode)->pluck('FOLDERNO')->first();

            $hh = DB::table('d_f63')
                    ->where('eacode', '=',$eacode)
                    ->distinct()
                    ->get(['eacode','hcn','shsn'])->count();

            $counts = DB::table('d_f71')
                    ->where('eacode', '=',$eacode)
                    ->distinct()
                    ->get(['eacode','hcn','shsn','MEMBER_CODE'])->count();
             

            fputcsv($handle, array($fno ,$eacode, $row->areaname, $hh , $counts ));
        }

        fclose($handle);

        $headers = array(
            'Content-Type' => 'csv',
        );
        

        return Response::download($filename, "Count Report  $today.csv", $headers)->deleteFileAfterSend(true);        

    }


    // Insert Form 6.1 visitor  line no //

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function insertVisitor(Request $request)
    {
        $visitor = new Members;
        $visitor->eacode = $request->get("eacode");
        $visitor->hcn = $request->get("hcn");
        $visitor->shsn = $request->get("shsn");
        $visitor->MEMBER_CODE = $request->get("MEMBER_CODE");
        $visitor->SURNAME = $request->get("SURNAME");
        $visitor->GIVENNAME = $request->get("GIVENNAME");
        $visitor->AGE = $request->get("AGE");
        $visitor->SEX = $request->get("SEX");
        $visitor->PSC = $request->get("PSC");
        $visitor->MP = $request->get("MP");
        $visitor->BF = $request->get("BF");
        $visitor->AMSNCK = $request->get("AMSNCK");
        $visitor->LUNCH = $request->get("LUNCH");
        $visitor->PMSNCK = $request->get("PMSNCK");
        $visitor->SUPPER = $request->get("SUPPER");
        $visitor->LATESNCK = $request->get("LATESNCK");
        $visitor->VISITOR = $request->get("VISITOR");
        $visitor->save();

        return redirect()->back()->with('success', 'Data successfully inserted');
        
     }
}

