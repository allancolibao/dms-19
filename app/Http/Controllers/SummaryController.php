<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TransmissionLog;
use Validator;
use Response;
use Illuminate\Support\Facades\Input;
use App\http\Requests;
use App\Encoding;
use App\Booklet9;
use App\Booklet10;
use DB;

class SummaryController extends Controller
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

    
    public function summary(){
        $summary = TransmissionLog::where('areaname','LIKE','1339%')->orderBy('id', 'ASC')->paginate(12);
        return view('transmitted.summary',compact('summary'));
    }

    public function summary1(){
        $summary = TransmissionLog::where('areaname','LIKE','0215%')->orderBy('id', 'ASC')->paginate(12);
        return view('transmitted.summary1',compact('summary'));
    }

    public function summary2(){
        $summary = TransmissionLog::where('areaname','LIKE','0314%')->orderBy('id', 'ASC')->paginate(12);
        return view('transmitted.summary2',compact('summary'));
    }

    public function summary3(){
        $summary = TransmissionLog::where('areaname','LIKE','0826%')->orderBy('id', 'ASC')->paginate(12);
        return view('transmitted.summary3',compact('summary'));
    }
    public function summary4(){
        $summary = TransmissionLog::where('areaname','LIKE','137607%')->orderBy('id', 'ASC')->paginate(12);
        return view('transmitted.summary4',compact('summary'));
    }
    public function summary5(){
        $summary = TransmissionLog::where('areaname','LIKE','1401%')->orderBy('id', 'ASC')->paginate(12);
        return view('transmitted.summary5',compact('summary'));
    }
    public function summary6(){
        $summary = TransmissionLog::where('areaname','LIKE','037107%')->orderBy('id', 'ASC')->paginate(12);
        return view('transmitted.summary6',compact('summary'));
    }
    public function summary7(){
        $summary = TransmissionLog::where('areaname','LIKE','063022%')->orderBy('id', 'ASC')->paginate(12);
        return view('transmitted.summary7',compact('summary'));
    }
    public function summary8(){
        $summary = TransmissionLog::where('areaname','LIKE','0972%')->orderBy('id', 'ASC')->paginate(12);
        return view('transmitted.summary8',compact('summary'));
    }
    public function summary9(){
        $summary = TransmissionLog::where('areaname','LIKE','104305%')->orderBy('id', 'ASC')->paginate(12);
        return view('transmitted.summary9',compact('summary'));
    }
    public function summary10(){
        $summary = TransmissionLog::where('areaname','LIKE','137404%')->orderBy('id', 'ASC')->paginate(12);
        return view('transmitted.summary10',compact('summary'));
    }
    public function summary11(){
        $summary = TransmissionLog::where('areaname','LIKE','0250%')->orderBy('id', 'ASC')->paginate(12);
        return view('transmitted.summary11',compact('summary'));
    }
    public function summary12(){
        $summary = TransmissionLog::where('areaname','LIKE','0434%')->orderBy('id', 'ASC')->paginate(12);
        return view('transmitted.summary12',compact('summary'));
    }
    public function summary13(){
        $summary = TransmissionLog::where('areaname','LIKE','083747%')->orderBy('id', 'ASC')->paginate(12);
        return view('transmitted.summary13',compact('summary'));
    }
    public function summary14(){
        $summary = TransmissionLog::where('areaname','LIKE','0848%')->orderBy('id', 'ASC')->paginate(12);
        return view('transmitted.summary14',compact('summary'));
    }
    public function summary15(){
        $summary = TransmissionLog::where('areaname','LIKE','1538%')->orderBy('id', 'ASC')->paginate(12);
        return view('transmitted.summary15',compact('summary'));
    }
    public function summary16(){
        $summary = TransmissionLog::where('areaname','LIKE','%EXCLUDING%')->orderBy('id', 'ASC')->paginate(12);
        return view('transmitted.summary16',compact('summary'));
    }
    public function summary17(){
        $summary = TransmissionLog::where('areaname','LIKE','072230%')->orderBy('id', 'ASC')->paginate(12);
        return view('transmitted.summary17',compact('summary'));
    }
    public function summary18(){
        $summary = TransmissionLog::where('areaname','LIKE','137601%')->orderBy('id', 'ASC')->paginate(12);
        return view('transmitted.summary18',compact('summary'));
    }
    public function summary19(){
        $summary = TransmissionLog::where('areaname','LIKE','1444%')->orderBy('id', 'ASC')->paginate(12);
        return view('transmitted.summary19',compact('summary'));
    }
    public function summary20(){
        $summary = TransmissionLog::where('areaname','LIKE','1752%')->orderBy('id', 'ASC')->paginate(12);
        return view('transmitted.summary20',compact('summary'));
    }
    public function summary21(){
        $summary = TransmissionLog::where('areaname','LIKE','0516%')->orderBy('id', 'ASC')->paginate(12);
        return view('transmitted.summary21',compact('summary'));
    }
    public function summary22(){
        $summary = TransmissionLog::where('areaname','LIKE','1265%')->orderBy('id', 'ASC')->paginate(12);
        return view('transmitted.summary22',compact('summary'));
    }
    public function summary23(){
        $summary = TransmissionLog::where('areaname','LIKE','137401%')->orderBy('id', 'ASC')->paginate(12);
        return view('transmitted.summary23',compact('summary'));
    }
    public function summary24(){
        $summary = TransmissionLog::where('areaname','LIKE','137405%')->orderBy('id', 'ASC')->paginate(12);
        return view('transmitted.summary24',compact('summary'));
    }
    public function summary25(){
        $summary = TransmissionLog::where('areaname','LIKE','0231%')->orderBy('id', 'ASC')->paginate(12);
        return view('transmitted.summary25',compact('summary'));
    }
    public function summary26(){
        $summary = TransmissionLog::where('areaname','LIKE','0562%')->orderBy('id', 'ASC')->paginate(12);
        return view('transmitted.summary26',compact('summary'));
    }
    public function summary27(){
        $summary = TransmissionLog::where('areaname','LIKE','0604%')->orderBy('id', 'ASC')->paginate(12);
        return view('transmitted.summary27',compact('summary'));
    }
    public function summary28(){
        $summary = TransmissionLog::where('areaname','LIKE','099701%')->orderBy('id', 'ASC')->paginate(12);
        return view('transmitted.summary28',compact('summary'));
    }
    public function summary29(){
        $summary = TransmissionLog::where('areaname','LIKE','141102%')->orderBy('id', 'ASC')->paginate(12);
        return view('transmitted.summary29',compact('summary'));
    }
    public function summary30(){
        $summary = TransmissionLog::where('areaname','LIKE','0371%')->orderBy('id', 'ASC')->paginate(12);
        return view('transmitted.summary30',compact('summary'));
    }
    public function summary31(){
        $summary = TransmissionLog::where('areaname','LIKE','0761%')->orderBy('id', 'ASC')->paginate(12);
        return view('transmitted.summary31',compact('summary'));
    }
    public function summary32(){
        $summary = TransmissionLog::where('areaname','LIKE','0860%')->orderBy('id', 'ASC')->paginate(12);
        return view('transmitted.summary32',compact('summary'));
    }
    public function summary33(){
        $summary = TransmissionLog::where('areaname','LIKE','137501%')->orderBy('id', 'ASC')->paginate(12);
        return view('transmitted.summary33',compact('summary'));
    }
    public function summary34(){
        $summary = TransmissionLog::where('areaname','LIKE','160202%')->orderBy('id', 'ASC')->paginate(12);
        return view('transmitted.summary34',compact('summary'));
    }
    public function summary35(){
        $summary = TransmissionLog::where('areaname','LIKE','0619%')->orderBy('id', 'ASC')->paginate(12);
        return view('transmitted.summary35',compact('summary'));
    }
    public function summary36(){
        $summary = TransmissionLog::where('areaname','LIKE','1018%')->orderBy('id', 'ASC')->paginate(12);
        return view('transmitted.summary36',compact('summary'));
    }
    public function summary37(){
        $summary = TransmissionLog::where('areaname','LIKE','112402%')->orderBy('id', 'ASC')->paginate(12);
        return view('transmitted.summary37',compact('summary'));
    }
    public function summary38(){
        $summary = TransmissionLog::where('areaname','LIKE','1186%')->orderBy('id', 'ASC')->paginate(12);
        return view('transmitted.summary38',compact('summary'));
    }
    public function summary39(){
        $summary = TransmissionLog::where('areaname','LIKE','137602%')->orderBy('id', 'ASC')->paginate(12);
        return view('transmitted.summary39',compact('summary'));
    }
}
