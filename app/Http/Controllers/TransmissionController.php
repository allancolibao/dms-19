<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TransmissionLog;
use Validator;
use Response;
use Illuminate\Support\Facades\Input;
use App\http\Requests;
use DB;

class TransmissionController extends Controller
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

    
    public function index(){
        $areanames = DB::table('localsurveyareas_2018')->select('eacode', 'areaname as selectareas')->get();
        return view('dashboard.transmission',compact('areanames'));
    }

    public function addLog(Request $request)
    {
      $rules = array(
        'name' => 'required',
        'areaname' => 'required|unique:transmissionlog',
        'status' => 'required',
        'dstarted' => 'required',
        'dfinished' => 'required',
      );

    $validator = Validator::make ( Input::all(), $rules);
    if ($validator->fails())
    return redirect('/transmission')->with('error', 'Please fill up the required fields. Thank you');
    
    else {

        TransmissionLog::create([
        'name' => $request['name'],
        'areaname' => $request['areaname'],
        'status' => $request['status'],
        'dstarted' => $request['dstarted'],
        'dfinished' => $request['dfinished']   
    ]);

      return redirect('/transmission')->with('success', 'Data successfully saved');
    }
    }
}
