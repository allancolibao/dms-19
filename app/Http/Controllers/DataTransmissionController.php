<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Validator;
use Auth;
use App\LocalSurveyAreas;
use App\TransmissionLog;
use App\Encoding;
use App\Booklet10;
use App\Members;
use App\Booklet9;
use App\F60;
use App\F76;
use DB;

class DataTransmissionController extends Controller
{
    public function  __construct(
        Booklet9 $f63, 
        Booklet10 $f71 
    ){
        $this->f63 = $f63;
        $this->f71 = $f71;       
    }
    /**
     * Check the connection
     */
    public function checkConnection(){

        $connected = @fsockopen("www.google.com", 80); 

        if(!$connected){
            return false;
        }
        return true;

        fclose($connected);
    }

    /**
     * Handle the index page
     * 
     * 
     */
    public function index()
    {
        $conn = $this->checkConnection();

         if(!$conn) {
            return view('error.no-internet');
         }
        
        return view('trans.index');
    }


    /**
     * Search function
     * 
     * 
     */
    public function searchArea(Request $request)
    {
        
        $rules = array
        (
            'key' => 'required|digits:12'
        );
    
        $validator = Validator::make ( Input::all(), $rules);
        if ($validator->fails())
            return redirect('/trans')->with('error', 'Please re-enter the 12 digits eacode, Thank you');
        
        else 
        {
            $key = Input::get ('key');

            return redirect()->route('get.trans-redirect', [$key]);
        }   
    }


    /**
     * Get the eacode based on the input of the user
     */
    public function getTransRedirect($eacode)
    {

        $areas = LocalSurveyAreas::where('eacode', $eacode)->get();

        return view('trans.trans-area', compact('areas'));

    }


    /**
     * 
     * Household Level Data Transmission
     * 
     */
    public function transHousehold($eacode)
    {
        $conn = $this->checkConnection();

         if(!$conn) {
            return view('error.no-internet');
         }


        $i = 0;
        $transCat = 1;
        $fullName = Auth::user()->first_name.' '.Auth::user()->last_name;

         if ($eacode !== null) {

         /**
         * Get the list of household from f11
         */
        $households = Encoding::where('eacode', $eacode)
                ->distinct()
                ->get(['eacode','hcn','shsn'])
                ->toArray();

            if(sizeof($households) > 0) {

                foreach($households as $value) {

                    $hcn = $value['hcn'];
                    $shsn = $value['shsn'];


                     /**
                     * Get data and send it to the live server
                     */
                    $f60 = F60::where('eacode', $eacode)
                            ->where('hcn', $hcn)
                            ->where('shsn', $shsn)
                            ->exclude('id')->get()->toArray();
                    $f60Count = count($f60);

                    if ($f60 && $f60Count > 0) {
                        $insertF60 = F60::on('mysqltrd')->insertIgnore($f60);
                    }


                    $f61 = Members::where('eacode', $eacode)
                            ->where('hcn', $hcn)
                            ->where('shsn', $shsn)
                            ->exclude('id')->get()->toArray();
                    $f61Count = count($f61);

                    if ($f61 && $f61Count > 0) {
                        $insertF61 = Members::on('mysqltrd')->insertIgnore($f61);
                    }

            
                    $f63 = Booklet9::where('eacode',$eacode)
                            ->where('hcn', $hcn)
                            ->where('shsn', $shsn)
                            ->exclude('id')->get()->toArray();
                    $f63Count = count($f63);
                    $f63HouseholdCount = $this->f63->getTheForm63PerEacode($eacode, $hcn, $shsn);

                    if ($f63 && $f63Count > 0) {
                        $insertF63 = Booklet9::on('mysqltrd')->insertIgnore($f63);
                    }


                    /**
                     * Creating Logs for dashboard
                     */
                    if (($f60 && $f60Count > 0) || 
                        ($f61 && $f61Count > 0) || 
                        ($f63  && $f63Count > 0)
                    ){

                        $i++;

                        $data = [
                            'full_name' => $fullName,
                            'eacode' => $eacode,
                            'hcn' => $hcn,
                            'shsn' => $shsn,
                            'trans_cat' => $transCat,
                            'f60_count' => $f60Count,
                            'f61_count' => $f61Count,
                            'f63_count' => $f63Count,
                            'f63_hh_count' => $f63HouseholdCount,
                            'created_at' => now(), 
                            'updated_at' => now()
                        ];

                        $dataInserted = TransmissionLog::upsert($data, $data);

                    }

                }

                return redirect()->route('get.trans-redirect', [$eacode])->with('success', 'All Data trasmitted successfully! Total of ' .$i. ' households (including 10A). 👏');
            }
        
        }

        return redirect()->route('get.trans-redirect', [$eacode])->with('error', 'Oooops! Please enter a valid EACODE. 😥');
    }


    /**
     * 
     * Individual Level Data Transmission
     * 
     */
    public function transIndividual($eacode)
    {
        $conn = $this->checkConnection();

         if(!$conn) {
            return view('error.no-internet');
         }


        $i = 0;
        $transCat = 2;
        $fullName = Auth::user()->first_name.' '.Auth::user()->last_name;

         if ($eacode !== null) {

         /**
         * Get the list of household from f11
         */
        $households = Encoding::where('eacode', $eacode)
                ->distinct()
                ->get(['eacode','hcn','shsn'])
                ->toArray();

            if(sizeof($households) > 0) {

                foreach($households as $value) {

                    $hcn = $value['hcn'];
                    $shsn = $value['shsn'];


                     /**
                     * Get data and send it to the live server
                     */
                    $f71 = Booklet10::where('eacode', $eacode)
                            ->where('hcn', $hcn)
                            ->where('shsn', $shsn)
                            ->exclude('id')->get()->toArray();
                    $f71Count = count($f71);
                    $f71IndivCount = $this->f71->getTheForm71PerEacode($eacode, $hcn, $shsn);

                    if ($f71 && $f71Count > 0) {
                        $insertF71 = Booklet10::on('mysqltrd')->insertIgnore($f71);
                    }

                    
                    $f76 = F76::where('eacode', $eacode)
                            ->where('hcn', $hcn)
                            ->where('shsn', $shsn)
                            ->exclude('id')->get()->toArray();
                    $f76Count = count($f76);

                    if ($f76 && $f76Count > 0) {
                        $insertF76 = F76::on('mysqltrd')->insertIgnore($f76);
                    }


                    /**
                     * Creating Logs for dashboard
                     */
                    if (($f71  && $f71Count > 0) || 
                        ($f76  && $f76Count > 0) 
                    ){

                        $i++;

                        $data = [
                            'full_name' => $fullName,
                            'eacode' => $eacode,
                            'hcn' => $hcn,
                            'shsn' => $shsn,
                            'trans_cat' => $transCat,
                            'f71_count' => $f71Count,
                            'f71_indiv_count' => $f71IndivCount,
                            'f76_count' => $f76Count,
                            'created_at' => now(), 
                            'updated_at' => now()
                        ];

                        $dataInserted = TransmissionLog::upsert($data, $data);
 
                    }

                }

                return redirect()->route('get.trans-redirect', [$eacode])->with('success', 'All Data trasmitted successfully! Total of ' .$i. ' individuals (including 10A). 👏');
            }
        
        }

        return redirect()->route('get.trans-redirect', [$eacode])->with('error', 'Oooops! Please enter a valid EACODE. 😥');
    }


    /**
     * 
     * All Level Data Transmission
     * 
     */
    public function transAll($eacode)
    {   
        
        $conn = $this->checkConnection();

         if(!$conn) {
            return view('error.no-internet');
         }


        $i = 0;
        $transCat = 3;
        $fullName = Auth::user()->first_name.' '.Auth::user()->last_name;

         if ($eacode !== null) {

         /**
         * Get the list of household from f11
         */
        $households = Encoding::where('eacode', $eacode)
                ->distinct()
                ->get(['eacode','hcn','shsn'])
                ->toArray();

            if(sizeof($households) > 0) {

                foreach($households as $value) {

                    $hcn = $value['hcn'];
                    $shsn = $value['shsn'];


                     /**
                     * Get data and send it to the live server
                     */
                    $f60 = F60::where('eacode', $eacode)
                            ->where('hcn', $hcn)
                            ->where('shsn', $shsn)
                            ->exclude('id')->get()->toArray();
                    $f60Count = count($f60);

                    if ($f60 && $f60Count > 0) {
                        $insertF60 = F60::on('mysqltrd')->insertIgnore($f60);
                    }


                    $f61 = Members::where('eacode', $eacode)
                            ->where('hcn', $hcn)
                            ->where('shsn', $shsn)
                            ->exclude('id')->get()->toArray();
                    $f61Count = count($f61);

                    if ($f61 && $f61Count > 0) {
                        $insertF61 = Members::on('mysqltrd')->insertIgnore($f61);
                    }

            
                    $f63 = Booklet9::where('eacode',$eacode)
                            ->where('hcn', $hcn)
                            ->where('shsn', $shsn)
                            ->exclude('id')->get()->toArray();
                    $f63Count = count($f63);
                    $f63HouseholdCount = $this->f63->getTheForm63PerEacode($eacode, $hcn, $shsn);

                    if ($f63 && $f63Count > 0) {
                        $insertF63 = Booklet9::on('mysqltrd')->insertIgnore($f63);
                    }


                    $f71 = Booklet10::where('eacode', $eacode)
                            ->where('hcn', $hcn)
                            ->where('shsn', $shsn)
                            ->exclude('id')->get()->toArray();
                    $f71Count = count($f71);
                    $f71IndivCount = $this->f71->getTheForm71PerEacode($eacode, $hcn, $shsn);

                    if ($f71 && $f71Count > 0) {
                        $insertF71 = Booklet10::on('mysqltrd')->insertIgnore($f71);
                    }


                    $f76 = F76::where('eacode', $eacode)
                            ->where('hcn', $hcn)
                            ->where('shsn', $shsn)
                            ->exclude('id')->get()->toArray();
                    $f76Count = count($f76);

                    if ($f76 && $f76Count > 0) {
                        $insertF76 = F76::on('mysqltrd')->insertIgnore($f76);
                    }


                    /**
                     * Creating Logs for dashboard
                     */
                    if (($f60 && $f60Count > 0) || 
                        ($f61 && $f61Count > 0) || 
                        ($f63  && $f63Count > 0) || 
                        ($f71  && $f71Count > 0) || 
                        ($f76  && $f76Count > 0) 
                    ){

                        $i++;

                        $data = [
                            'full_name' => $fullName,
                            'eacode' => $eacode,
                            'hcn' => $hcn,
                            'shsn' => $shsn,
                            'trans_cat' => $transCat,
                            'f60_count' => $f60Count,
                            'f61_count' => $f61Count,
                            'f63_count' => $f63Count,
                            'f63_hh_count' => $f63HouseholdCount,
                            'f71_count' => $f71Count,
                            'f71_indiv_count' => $f71IndivCount,
                            'f76_count' => $f76Count,
                            'created_at' => now(), 
                            'updated_at' => now()
                        ];

                        $dataInserted = TransmissionLog::upsert($data, $data);

                        
                    }

                }

                return redirect()->route('get.trans-redirect', [$eacode])->with('success', 'All Data trasmitted successfully! Total of ' .$i. ' households (including 10A). 👏');
            }
        
        }

        return redirect()->route('get.trans-redirect', [$eacode])->with('error', 'Oooops! Please enter a valid EACODE. 😥');
    }


    /**
     * 
     * View list of All Household
     * 
     */
    public function perHousehold($eacode)
    { 

        $households = Encoding::where('eacode', 'LIKE','%'.$eacode.'%')
                        ->distinct()
                        ->get(['eacode','hcn','shsn']);

        return view('trans.per-household', compact('households'));
    }


    /**
     * 
     * Send data per household
     * 
     */
    public function transPerHousehold($eacode, $hcn, $shsn)
    { 

        // $households = Encoding::where('eacode', 'LIKE','%'.$eacode.'%')
        //                 ->distinct()
        //                 ->get(['eacode','hcn','shsn']);

        return response()->json(['ID'=>  ''.$eacode.''.$hcn.''.$shsn.'']);
    }

}





