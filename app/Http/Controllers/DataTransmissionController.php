<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Validator;
use App\LocalSurveyAreas;
use App\TransmissionLog;
use App\Booklet10;
use App\Members;
use App\Booklet9;
use App\F60;
use App\F76;
use DB;

class DataTransmissionController extends Controller
{
    /**
     * Check the connection
     */
    public function checkConnection(){

        $connected = @fsockopen("www.google.com", 80); 

        if(!$connected){
            return false;
        }
        return true;
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
         

        // Get data and send it to the live server

        $f60 = F60::where('eacode', $eacode)->exclude('id')->get()->toArray();
        $insertF60 = F60::on('mysqltrd')->insertIgnore($f60);


        $f61 = Members::where('eacode', $eacode)->exclude('id')->get()->toArray();
        $insertF61 = Members::on('mysqltrd')->insertIgnore($f61);

 
        $f63 = Booklet9::where('eacode',$eacode)->exclude('id')->get()->toArray();
        $insertF63 = Booklet9::on('mysqltrd')->insertIgnore($f63);
        

        return redirect()->route('get.trans-redirect', [$eacode])->with('success', 'Household Data trasmitted successfully!');


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


         // Get data and send it to the live server

         $f71 = Booklet10::where('eacode', $eacode)->exclude('id')->get()->toArray();
         $insertF71 = Booklet10::on('mysqltrd')->insertIgnore($f71);
 
         $f76 = F76::where('eacode', $eacode)->exclude('id')->get()->toArray();
         $insertF76 = F76::on('mysqltrd')->insertIgnore($f76);


        return redirect()->route('get.trans-redirect', [$eacode])->with('success', 'Individual Data trasmitted successfully!');

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
         

         // Get data and send it to the live server

        $f60 = F60::where('eacode', $eacode)->exclude('id')->get()->toArray();
        $insertF60 = F60::on('mysqltrd')->insertIgnore($f60);


        $f61 = Members::where('eacode', $eacode)->exclude('id')->get()->toArray();
        $insertF61 = Members::on('mysqltrd')->insertIgnore($f61);

 
        $f63 = Booklet9::where('eacode',$eacode)->exclude('id')->get()->toArray();
        $insertF63 = Booklet9::on('mysqltrd')->insertIgnore($f63);


        $f71 = Booklet10::where('eacode', $eacode)->exclude('id')->get()->toArray();
        $insertF71 = Booklet10::on('mysqltrd')->insertIgnore($f71);

        $f76 = F76::where('eacode', $eacode)->exclude('id')->get()->toArray();
        $insertF76 = F76::on('mysqltrd')->insertIgnore($f76);


        return redirect()->route('get.trans-redirect', [$eacode])->with('success', 'All Data trasmitted successfully!');

    }

}
