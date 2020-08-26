<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Str;
use App\http\Requests;
use App\Encoding;
use App\Booklet9;
use App\Members;
use App\Booklet10;
use App\F60;
use App\FCT;
use App\FNO;
use Exception;
use Validator;
use Response;
use DB;
use Carbon\Carbon;


class FoodRecordController extends Controller
{
    /**
     * Show the update page page
     */
    public function index()
    {
        return view('food-record.index');
    }


    /**
     * Search per EACODE
     */
    public function searchFoodRecord(Request $request)
    {
        
        $rules = array
        (
            'key' => 'required|digits:12'
        );
    
        $validator = Validator::make ( Input::all(), $rules);

        if ($validator->fails()) {

            return redirect()->back()->with('error', 'Please re-enter the eacode it must be a number and 12 characters');
        
        } else {

            $key = Input::get ('key');

            return redirect()->route('search.key', [$key]);
        }   
    }


    /**
     * Get the household based on the EACODE
     */
    public function searchFoodRecordRedirect($key)
    {
        $households = Encoding::where('eacode', 'LIKE','%'.$key.'%')
                        ->distinct()
                        ->get(['eacode','hcn','shsn']);

        $count = $households->count();

        return view('food-record.search-food-record', compact('households','count'));
    }



     /**
     * Get the individual food recall
     */
    public function individual($eacode, $hcn, $shsn)
    {       

        $hhead = DB::table('d_f11')
                 ->select('SURNAME','GIVENNAME','AGE')
                 ->where('eacode', $eacode)
                 ->where('hcn', $hcn)
                 ->where('shsn', $shsn)
                 ->where('MEMBER_CODE', '01')
                 ->first(); 

        $foodrecall = DB::table('d_f71')
            ->join('d_f11', function ($join) {
            $join->on('d_f11.eacode', '=', 'd_f71.eacode')
                 ->On('d_f11.hcn', '=', 'd_f71.hcn')
                 ->On('d_f11.shsn', '=', 'd_f71.shsn')
                 ->On('d_f11.MEMBER_CODE', '=', 'd_f71.MEMBER_CODE');
                })
                 ->where('d_f71.eacode', $eacode)
                 ->where('d_f71.hcn', $hcn)
                 ->where('d_f71.shsn', $shsn)
                 ->distinct()
                 ->get(['d_f71.eacode','d_f71.hcn','d_f71.shsn','d_f71.MEMBER_CODE','d_f11.SURNAME','d_f11.GIVENNAME','d_f11.AGE']);

        $indivCount = $foodrecall->count();   
      
        return view('food-recall.index', compact('foodrecall', 'indivCount','eacode','hcn','shsn','hhead'));
    }


    /**
     * Get the specific individual food recall
     */
    public function recall($eacode, $hcn, $shsn, $member, $givenname ,$surname, $age)
    {       
        return view('food-recall.indiv-recall',compact( 'eacode','hcn','shsn','member','givenname','surname','age'));
    }


    /**
     * Fetch recall day 1 or 2 based on selection
     */
    public function indivRecallEdit($eacode, $hcn, $shsn, $member, $givenname ,$surname, $age, $recday)
    {    
        $fct = FCT::all();

        $lines = Booklet10::where('eacode', $eacode)
                            ->where('hcn', $hcn)
                            ->where('shsn', $shsn)
                            ->where('MEMBER_CODE',$member)
                            ->where('RECDAY', $recday)
                            ->orderByRaw('LENGTH(LINENO)', 'ASC')
                            ->orderBy('LINENO', 'ASC')
                            ->get();

        $l1 = Booklet10::where('eacode', $eacode)
                            ->where('hcn', $hcn)
                            ->where('shsn', $shsn)
                            ->where('MEMBER_CODE', $member)
                            ->where('RECDAY', $recday)
                            ->where('LINENO', '=' ,'01')
                            ->orWhere('eacode', $eacode)
                            ->where('hcn', $hcn)
                            ->where('shsn', $shsn)
                            ->where('MEMBER_CODE', $member)
                            ->where('RECDAY', $recday)
                            ->where('LINENO', '=' ,'1')
                            ->get();

        return view('food-recall.indiv-recall-edit', compact('fct','eacode','hcn','shsn','member','givenname','surname','age','recday','lines','l1'));
    }



    /**
     * get insert f72 food recall line number page
     */
     public function insertFoodRecall($eacode, $hcn, $shsn, $member, $givenname ,$surname, $age, $recday)
     {
         $fct = DB::table('fct')->select('foodcode', 'fooddesc')->get();
         return view('food-recall.insert-food-recall', compact('fct','eacode','hcn','shsn','member','givenname','surname','age','recday'));
     }



    /**
     * insert f72 food recall line number
     */
    public function insertRecall(Request $request)
    {

        $foodRecall = [
            'eacode' => $request['eacode'],
            'hcn' => $request['hcn'],
            'shsn' => $request['shsn'],
            'MEMBER_CODE' => $request['MEMBER_CODE'],
            'RECDAY' => $request['RECDAY'],
            'LINENO' => $request["LINENO"],
            'FOOD_ITEM' => $request["FOOD_ITEM"],
            'FOODDESC' => $request["FOODDESC"],
            'FOODBRND' => $request["FOODBRND"],
            'FOODMAINING' => $request["FOODMAINING"],
            'FOODBRNDCD' => $request["FOODBRNDCD"],
            'FVS' => $request["FVS"],
            'ISFORTIFIED' => $request["ISFORTIFIED"],
            'VITA' => $request["VITA"],
            'IRON' => $request["IRON"],
            'OTHF' => $request["OTHF"],
            'MEALCD' => $request["MEALCD"],
            'RFCODE' => $request["RFCODE"],
            'FOODEX' => $request["FOODEX"],
            'FIC' => Str::substr($request['FOODCODE'], 0, 4),
            'FOODCODE' => $request["FOODCODE"],
            'FOODWEIGHT' => $request["FOODWEIGHT"],
            'RCC' => $request["RCC"],
            'CMC' => $request["CMC"],
            'SUPCODE' => $request["SUPCODE"],
            'SRCCODE' => $request["SRCCODE"],
            'OTH_SRC' => $request["OTH_SRC"],
            'CPC' => $request["CPC"],
            'UNITCOST' => $request["UNITCOST"],
            'UNITWGT' => $request["UNITWGT"],
            'UNITMEAS' => $request["UNITMEAS"],
        ];

        Booklet10::insertIgnore($foodRecall);

        return redirect()->back()->with('success', 'Data successfully inserted');
        
     }



     /**
     * update f72 food recall line number
     */
    public function updateRecall(Request $request, $id)
    {

        $data = $request->all();

        $rowId = array_reverse($data['id']);
        $lineNumber = array_reverse($data['LINENO']);
        $foodItem = array_reverse($data['FOOD_ITEM']);
        $foodDesc = array_reverse($data['FOODDESC']);
        $foodBrand = array_reverse($data['FOODBRND']);
        $mainIng = array_reverse($data['FOODMAINING']);
        $foodBrandCode = array_reverse($data['FOODBRNDCD']);
        $fvs = array_reverse($data['FVS']);
        $isFortified = array_reverse($data['ISFORTIFIED']);
        $vitA = array_reverse($data['VITA']);
        $iron = array_reverse($data['IRON']);
        $othF = array_reverse($data['OTHF']);
        $mealCode = array_reverse($data['MEALCD']);
        $rfCode = array_reverse($data['RFCODE']);
        $foodEx = array_reverse($data['FOODEX']);
        $foodCode = array_reverse($data['FOODCODE']);
        $foodWeight = array_reverse($data['FOODWEIGHT']);
        $rcc = array_reverse($data['RCC']);
        $cmc = array_reverse($data['CMC']);
        $supCode = array_reverse($data['SUPCODE']);
        $srcCode = array_reverse($data['SRCCODE']);
        $othSrc = array_reverse($data['OTH_SRC']);
        $cpc = array_reverse($data['CPC']);
        $unitCost = array_reverse($data['UNITCOST']);
        $unitWeight = array_reverse($data['UNITWGT']);
        $unit = array_reverse($data['UNITMEAS']);

        if(count($lineNumber) > 0)
        {
            foreach($lineNumber as $input => $value)
            {
                $foodRecall = [
                'LINENO' => $lineNumber[$input],
                'FOOD_ITEM' => $foodItem[$input],
                'FOODDESC' => $foodDesc[$input],
                'FOODBRND' => $foodBrand[$input],
                'FOODMAINING' => $mainIng[$input],
                'FOODBRNDCD' => $foodBrandCode[$input],
                'FVS' => $fvs[$input],
                'ISFORTIFIED' => $isFortified[$input],
                'VITA' => $vitA[$input],
                'IRON' => $iron[$input],
                'OTHF' => $othF[$input],
                'MEALCD' => $mealCode[$input],
                'RFCODE' => $rfCode[$input],
                'FOODEX' => $foodEx[$input],
                'FIC' => Str::substr($foodCode[$input], 0, 4),
                'FOODCODE' => $foodCode[$input],
                'FOODWEIGHT' => $foodWeight[$input],
                'RCC' => $rcc[$input],
                'CMC' => $cmc[$input],
                'SUPCODE' => $supCode[$input],
                'SRCCODE' => $srcCode[$input],
                'OTH_SRC' => $othSrc[$input],
                'CPC' => $cpc[$input],
                'UNITCOST' => $unitCost[$input],
                'UNITWGT' => $unitWeight[$input],
                'UNITMEAS' => $unit[$input],
                ];

            
                try {

                    Booklet10::where('id', $rowId[$input])->update($foodRecall); 

                } catch (Exception $error) {

                    return redirect()->back()->with('error', 'Unable to update! Duplicate entry on line number ' .$lineNumber[$input]);

                }
            }
        }

        return redirect()->back()->with('success', 'Data successfully updated');
        
     }


    /**
     * update f72 food recall ref
     */
     public function updateFoodRecallRef(Request $request, $id)
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


     /**
     * Retrieve form 6.1 record
     */
    public function membership($eacode, $hcn, $shsn)
    {

    $memberships = Members::where('eacode', $eacode)
                 ->where('hcn', $hcn)
                 ->where('shsn', $shsn)
                 ->orderBy('MEMBER_CODE', 'ASC')
                 ->get();

    $f60 = F60::where('eacode', $eacode)
                 ->where('hcn', $hcn)
                 ->where('shsn', $shsn)
                 ->get();

    return view('food-record.membership', compact('eacode','hcn','shsn', 'memberships', 'f60'));
    }


    /**
     * Update f60 record
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



    /**
     * form 61 edit page
     */
    public function membershipEdit($eacode, $hcn, $shsn, $memcode, $id)
    {
        $member = Members::find ($id);
        return view('food-record.membership-edit', compact('id','eacode','hcn','shsn','memcode', 'member'));
    }


    /**
     * update form 61
     */
    public function updateMembership(Request $request, $id)
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


     /**
     * form 63
     */
    public function record($eacode, $hcn, $shsn)
    {
        $fct = DB::table('fct')->select('foodcode', 'fooddesc')->get();

        $records = Booklet9::where('eacode', $eacode)
                 ->where('hcn', $hcn)
                 ->where('shsn', $shsn)
                 ->orderByRaw('LENGTH(LINENO)', 'ASC')
                 ->orderBy('LINENO', 'ASC')
                 ->get();

        return view('food-record.food-record-edit', compact('eacode','hcn','shsn','records','fct'));
    }


    /**
     * update form 63 for specific household
     */
    public function updateFoodRecord(Request $request, $id)
    {

        $data = $request->all();

        $rowId = array_reverse($data['id']);
        $lineNumber = array_reverse($data['LINENO']);
        $foodItem = array_reverse($data['FOODITEM']);
        $description = array_reverse($data['DESCRIPTION']);
        $brandName = array_reverse($data['BRANDNAME']);
        $mainIng = array_reverse($data['MAINIGNT']);
        $brandCode = array_reverse($data['BRANDCODE']);
        $mealCode = array_reverse($data['MEALCD']);
        $wrCode = array_reverse($data['WRCODE']);
        $rfCode = array_reverse($data['RFCODE']);
        $foodEx = array_reverse($data['FOODEX']);
        $foodDesc = array_reverse($data['FOODDESC']);
        $foodWeight = array_reverse($data['FOODWEIGHT']);
        $rcc = array_reverse($data['RCC']);
        $cmc = array_reverse($data['CMC']);
        $supCode = array_reverse($data['SUPCODE']);
        $srcCode = array_reverse($data['SRCCODE']);
        $othSrc = array_reverse($data['OTH_SRC']);
        $pwWeight = array_reverse($data['PW_WGT']);
        $pwRcc = array_reverse($data['PW_RCC']);
        $pwCmc = array_reverse($data['PW_CMC']);
        $purCode = array_reverse($data['PURCODE']);
        $goWeight = array_reverse($data['GO_WGT']);
        $goRcc = array_reverse($data['GO_RCC']);
        $goCmc = array_reverse($data['GO_CMC']);
        $loWeight = array_reverse($data['LO_WGT']);
        $loRcc = array_reverse($data['LO_RCC']);
        $loCmc = array_reverse($data['LO_CMC']);
        $unitCost = array_reverse($data['UNITCOST']);
        $unitWeight = array_reverse($data['UNITWGT']);
        $unit = array_reverse($data['UNIT']);

        if(count($lineNumber) > 0)
        {
            foreach($lineNumber as $input => $value)
            {
                $foodRecord = array(
                    'LINENO' => $lineNumber[$input],
                    'FOODITEM' => $foodItem[$input],
                    'DESCRIPTION' => $description[$input],
                    'BRANDNAME' => $brandName[$input],
                    'MAINIGNT' => $mainIng[$input],
                    'BRANDCODE' => $brandCode[$input],
                    'MEALCD' => $mealCode[$input],
                    'WRCODE' => $wrCode[$input],
                    'RFCODE' => $rfCode[$input],
                    'FOODEX' => $foodEx[$input],
                    'FOODCODE' => Str::substr($foodDesc[$input], 0, 4),
                    'FOODDESC' => $foodDesc[$input],
                    'FOODWEIGHT' => $foodWeight[$input],
                    'RCC' => $rcc[$input],
                    'CMC' => $cmc[$input],
                    'SUPCODE' => $supCode[$input],
                    'SRCCODE' => $srcCode[$input],
                    'OTH_SRC' => $othSrc[$input],
                    'PW_WGT' => $pwWeight[$input],
                    'PW_RCC' => $pwRcc[$input],
                    'PW_CMC' => $pwCmc[$input],
                    'PURCODE' => $purCode[$input],
                    'GO_WGT' => $goWeight[$input],
                    'GO_RCC' => $goRcc[$input],
                    'GO_CMC' => $goCmc[$input],
                    'LO_WGT' => $loWeight[$input],
                    'LO_RCC' => $loRcc[$input],
                    'LO_CMC' => $loCmc[$input],
                    'UNITCOST' => $unitCost[$input],
                    'UNITWGT' => $unitWeight[$input],
                    'UNIT' => $unit[$input],
                );

                try {

                    Booklet9::where('id', $rowId[$input])->update($foodRecord); 

                } catch (Exception $error) {

                    return redirect()->back()->with('error', 'Unable to update! Duplicate entry on line number ' .$lineNumber[$input]);

                }
            }
        }

        return redirect()->back()->with('success', 'Food Record successfully updated');
        
     }


    /**
    * insert food record data page
    */
    public function insertFoodRecord($eacode, $hcn, $shsn)
    {
        $fct = DB::table('fct')->select('foodcode', 'fooddesc')->get();

        return view('food-record.insert-food-record', compact('fct','eacode','hcn','shsn'));
    }


    public function addRecord(Request $request)
    {
      
        $foodRecord = [
            'eacode' => $request['eacode'],
            'hcn' => $request['hcn'],
            'shsn' => $request['shsn'],
            'LINENO' => $request['LINENO'],
            'FOODITEM' => $request['FOODITEM'],
            'DESCRIPTION' => $request['DESCRIPTION'],
            'BRANDNAME' => $request['BRANDNAME'],
            'MAINIGNT' => $request['MAINIGNT'],
            'BRANDCODE' => $request['BRANDCODE'],
            'MEALCD' => $request['MEALCD'],
            'WRCODE' => $request['WRCODE'],
            'RFCODE' => $request['RFCODE'],
            'FOODEX' => $request['FOODEX'],
            'FOODCODE' => Str::substr($request['FOODDESC'], 0, 4),
            'FOODDESC' => $request['FOODDESC'],
            'FOODWEIGHT' => $request['FOODWEIGHT'],
            'RCC' => $request['RCC'],
            'CMC' => $request['CMC'],
            'SUPCODE' => $request['SUPCODE'],
            'SRCCODE' => $request['SRCCODE'],
            'OTH_SRC' => $request['OTH_SRC'],
            'PW_WGT' => $request['PW_WGT'],
            'PW_RCC' => $request['PW_RCC'],
            'PW_CMC' => $request['PW_CMC'],
            'PURCODE' => $request['PURCODE'],
            'GO_WGT' => $request['GO_WGT'],
            'GO_RCC' => $request['GO_RCC'],
            'GO_CMC' => $request['GO_CMC'],
            'LO_WGT' => $request['LO_WGT'],
            'LO_RCC' => $request['LO_RCC'],
            'LO_CMC' => $request['LO_CMC'],
            'UNITCOST' => $request['UNITCOST'],
            'UNITWGT' => $request['UNITWGT'],
            'UNIT' => $request['UNIT'],
        ];

        Booklet9::insertIgnore($foodRecord);

        return redirect()->back()->with('success', 'Data successfully inserted');
    }


    /**
     * Insert Form 6.1 visitor
     *
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

