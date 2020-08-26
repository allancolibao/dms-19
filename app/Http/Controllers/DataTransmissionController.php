<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Validator;
use DB;
use App\LocalSurveyAreas;
use App\Booklet10;
use App\F60;
use App\Members;
use App\Booklet9;

class DataTransmissionController extends Controller
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
        
        return view('dashboard.trans');
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
            'key' => 'required|min:4|max:12'
        );
    
        $validator = Validator::make ( Input::all(), $rules);
        if ($validator->fails())
        return redirect('/trans')->with('error', 'Please re-enter the eacode [ 4-12 digits required ], Thank you');
        
        else 
        {
        $key = Input::get ('key');

        $areas = Localsurveyareas::where('eacode','LIKE','%'.$key.'%')->get();

        return view('dashboard.trans_area',compact('areas'));
        }   
    }

    public function transHousehold($eacode)
    {
        
        $connected = @fsockopen("www.google.com", 80); 
                                       
        if ($connected){

            $is_conn = true; 

            // Get data and send it to the live server f60
            $f60 = F60::where('eacode', $eacode)->exclude('id')->get()->toArray();
            $insert_f60 = DB::connection('mysqlsec')->table('d_f60')->insertIgnore($f60);

            
            // Get data and send it to the live server f61
            $f61 = Members::where('eacode', $eacode)->exclude('id')->get()->toArray();
            $insert_f61 = DB::connection('mysqlsec')->table('d_f61')->insertIgnore($f61);

            // dd($f61);

            // Get data and send it to the live server f63
            $f63 = Booklet9::where('eacode',$eacode)->exclude('id')->get()->toArray();
            $insert_f63 = DB::connection('mysqlsec')->table('d_f63')->insertIgnore($f63);
            

            return redirect('/trans')->with('success', 'Data trasmitted successfully!');


            fclose($connected);

        } else {

            $is_conn = false; 
            
            return redirect('/trans')->with('error', 'Please check your internet connection!');

        }
    }

    public function transIndividual($eacode)
    {
        
        $connected = @fsockopen("www.google.com", 80); 
                                       
        if ($connected){

            $is_conn = true;    

            // Get data and send it to the live server f71
            $f71 = Booklet10::where('eacode', $eacode)->exclude('id')->get()->toArray();

            // dd($f71);
            
            $insert_f71 = DB::connection('mysqlsec')->table('d_f71')->insertIgnore($f71);


            return redirect('/trans')->with('success', 'Data trasmitted successfully!');


            fclose($connected);

        } else {

            $is_conn = false; 


            return redirect('/trans')->with('error', 'Please check your internet connection!');

        }
    }

}
