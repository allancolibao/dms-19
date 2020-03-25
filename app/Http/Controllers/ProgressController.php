<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\http\Requests;
use App\TransmissionLog;
use App\Encoding;
use App\Booklet9;
use App\Booklet10;
use Validator;
use Response;
use DB;



class ProgressController extends Controller
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

        $encoded = Encoding::distinct('eacode')->count('eacode');
        $total = DB::table('localsurveyareas_2018')->count();
        $notencoded =  $total - $encoded;

        return view('dashboard.progress',compact('encoded','notencoded'));
    
        } 
}

