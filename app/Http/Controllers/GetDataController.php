<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\LocalSurveyAreas;
use Validator;
use App\F60;
use App\Members;
use App\Booklet9;
use App\Booklet10;
use App\F76;

class GetDataController extends Controller
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
     * Show the get data page
     */
    public function index()
    {
         $conn = $this->checkConnection();

         if(!$conn) {
            return view('error.no-internet');
         }

        return view('get-data.index');
    }


    /**
     * Get the eacode based on the input of the user
     */
    public function getData(Request $request)
    {
       
        $rules = [
            'key' => 'required|min:4|max:12'
        ];
    
        $validator = Validator::make ( Input::all(), $rules);

        if ($validator->fails()) {

            return redirect()->back()->with('error', 'Please re-enter the eacode it must be a number and 4-12 characters');
        
        } else {

            $key = Input::get ('key');

            return redirect()->route('get.data.redirect', [$key]);
        }

    }

    /**
     * Get the eacode based on the input of the user
     */
    public function getDataRedirect($eacode)
    {

        $areas = LocalSurveyAreas::where('eacode', 'LIKE', '%'.$eacode.'%')->get();

        return view('get-data.select', compact('areas'));

    }


    /**
     * Get the data from the live server based on the EACODE
     * 
     * Household Level
     * 
     */
    public function getHousehold($eacode){

        $conn = $this->checkConnection();

        if(!$conn) {
           return view('error.no-internet');
        }

        // Get data from server and insert on local database ( per form ) 

        $f60 = F60::on('mysqlsec')->where('eacode', $eacode)->exclude('id')->get()->toArray();
        $insertF60 = F60::insertIgnore($f60);


        $f61 = Members::on('mysqlsec')->where('eacode', $eacode)->exclude('id')->get()->toArray();
        $insertF61 = Members::insertIgnore($f61);

 
        $f63 = Booklet9::on('mysqlsec')->where('eacode',$eacode)->exclude('id')->get()->toArray();
        $insertF63 = Booklet9::insertIgnore($f63);

        return redirect()->route('get.data.redirect', [$eacode])->with('success', 'Data successfully downloaded!');

        
    }


    /**
     * Get the data from the live server based on the EACODE
     * 
     * Individual Level
     * 
     */
    public function getIndividual($eacode){

        $conn = $this->checkConnection();

        if(!$conn) {
           return view('error.no-internet');
        }

        // Get data from server and insert on local database ( per form ) 

        $f71 = Booklet10::on('mysqlsec')->where('eacode', $eacode)->exclude('id')->get()->toArray();
        $insertF71 = Booklet10::insertIgnore($f71);

        $f76 = F76::on('mysqlsec')->where('eacode', $eacode)->exclude('id')->get()->toArray();
        $insertF76 = F76::insertIgnore($f76);

        return redirect()->route('get.data.redirect', [$eacode])->with('success', 'Data successfully downloaded!');
    
    }


    /**
     * Get the data from the live server based on the EACODE
     * 
     * ALL
     * 
     */
    public function getAll($eacode){

        $conn = $this->checkConnection();

        if(!$conn) {
           return view('error.no-internet');
        }

        // Get data from server and insert on local database ( per form ) 

        $f60 = F60::on('mysqlsec')->where('eacode', $eacode)->exclude('id')->get()->toArray();
        $insertF60 = F60::insertIgnore($f60);


        $f61 = Members::on('mysqlsec')->where('eacode', $eacode)->exclude('id')->get()->toArray();
        $insertF61 = Members::insertIgnore($f61);

 
        $f63 = Booklet9::on('mysqlsec')->where('eacode',$eacode)->exclude('id')->get()->toArray();
        $insertF63 = Booklet9::insertIgnore($f63);


        $f71 = Booklet10::on('mysqlsec')->where('eacode', $eacode)->exclude('id')->get()->toArray();
        $insertF71 = Booklet10::insertIgnore($f71);

        $f76 = F76::on('mysqlsec')->where('eacode', $eacode)->exclude('id')->get()->toArray();
        $insertF76 = F76::insertIgnore($f76);

        return redirect()->route('get.data.redirect', [$eacode])->with('success', 'Data successfully downloaded!');
    
    }
}
