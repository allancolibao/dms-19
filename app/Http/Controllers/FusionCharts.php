<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Encoding;
use Validator;
use Response;
use Illuminate\Support\Facades\Input;
use App\http\Requests;
use App\TransmissionLog;
use App\Booklet9;
use App\Members;
use App\Booklet10;
use DB;

class FusionCharts extends Controller
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

    
    public function home(){
        $manila = Booklet10::where('eacode','LIKE','1339%')->distinct('eacode')->count('eacode');
        $mnl = $manila / 132 * 100;

        $qc = Booklet10::where('eacode','LIKE','137404%')->distinct('eacode')->count('eacode');
        $qcc = $qc / 131 * 100;

        $sanjuan = Booklet10::where('eacode','LIKE','137405%')->distinct('eacode')->count('eacode');
        $sj = $sanjuan / 49 * 100;

        $laguna = Booklet10::where('eacode','LIKE','0434%')->distinct('eacode')->count('eacode');
        $lag = $laguna / 131 * 100;

        $cagayan = Booklet10::where('eacode','LIKE','0215%')->distinct('eacode')->count('eacode');
        $cag = $cagayan / 107 * 100;

        $bulacan = Booklet10::where('eacode','LIKE','0314%')->distinct('eacode')->count('eacode');
        $bul = $bulacan / 101 * 100;

        $eastern = Booklet10::where('eacode','LIKE','0826%')->distinct('eacode')->count('eacode');
        $east = $eastern / 122 * 100;

        $taguig = Booklet10::where('eacode','LIKE','137607%')->distinct('eacode')->count('eacode');
        $tag = $taguig / 125 * 100;

        $abra = Booklet10::where('eacode','LIKE','1401%')->distinct('eacode')->count('eacode');
        $abr = $abra / 117 * 100;

        $olongapo = Booklet10::where('eacode','LIKE','037107%')->distinct('eacode')->count('eacode');
        $olong = $olongapo / 87 * 100;

        $iloilocity = Booklet10::where('eacode','LIKE','063022%')->distinct('eacode')->count('eacode');
        $ilocity = $iloilocity / 140 * 100;

        $zamdnorte = Booklet10::where('eacode','LIKE','0972%')->distinct('eacode')->count('eacode');
        $zdn = $zamdnorte / 105 * 100;

        $cagdocity = Booklet10::where('eacode','LIKE','104305%')->distinct('eacode')->count('eacode');
        $cdoc = $cagdocity / 133 * 100;

        $nuevavizcaya = Booklet10::where('eacode','LIKE','0250%')->distinct('eacode')->count('eacode');
        $nv = $nuevavizcaya / 99 * 100;

        $taclobancity = Booklet10::where('eacode','LIKE','083747%')->distinct('eacode')->count('eacode');
        $tc = $taclobancity / 147 * 100;

        $norsamar = Booklet10::where('eacode','LIKE','0848%')->distinct('eacode')->count('eacode');
        $ns = $norsamar / 120 * 100;

        $maguin = Booklet10::where('eacode','LIKE','1538%')->distinct('eacode')->count('eacode');
        $mag = $maguin / 112 * 100;

        $iloilo = Booklet10::where('eacode','LIKE','0630%')->distinct('eacode')->count('eacode');
        $ilo = ( $iloilo - $iloilocity )  / 106 * 100;

        $mancity = Booklet10::where('eacode','LIKE','072230%')->distinct('eacode')->count('eacode');
        $man = $mancity / 137 * 100;

        $laspinas = Booklet10::where('eacode','LIKE','137601%')->distinct('eacode')->count('eacode');
        $las = $laspinas / 132 * 100;

        $mtprovince = Booklet10::where('eacode','LIKE','1444%')->distinct('eacode')->count('eacode');
        $mtp = $mtprovince / 111 * 100;

        $ormin = Booklet10::where('eacode','LIKE','1752%')->distinct('eacode')->count('eacode');
        $or = $ormin / 97 * 100;

        $camnorte = Booklet10::where('eacode','LIKE','0516%')->distinct('eacode')->count('eacode');
        $cn = $camnorte / 98 * 100;

        $sultankudarat = Booklet10::where('eacode','LIKE','1265%')->distinct('eacode')->count('eacode');
        $sk = $sultankudarat / 99 * 100;

        $mandaluyong = Booklet10::where('eacode','LIKE','137401%')->distinct('eacode')->count('eacode');
        $manda = $mandaluyong / 131 * 100;

        $isabela = Booklet10::where('eacode','LIKE','0231%')->distinct('eacode')->count('eacode');
        $isa = $isabela / 102 * 100;

        $sorsogon = Booklet10::where('eacode','LIKE','0562%')->distinct('eacode')->count('eacode');
        $sor = $sorsogon / 100 * 100;

        $aklan = Booklet10::where('eacode','LIKE','0604%')->distinct('eacode')->count('eacode');
        $ak = $aklan / 102 * 100;

        $cofisabela = Booklet10::where('eacode','LIKE','099701%')->distinct('eacode')->count('eacode');
        $coisbl = $cofisabela / 50 * 100;

        $baguiocity = Booklet10::where('eacode','LIKE','141102%')->distinct('eacode')->count('eacode');
        $bc = $baguiocity / 129 * 100;

        $zambales = Booklet10::where('eacode','LIKE','0371%')->distinct('eacode')->count('eacode');
        $zam = ( $zambales - $olongapo ) / 99  * 100;

        $siquijor = Booklet10::where('eacode','LIKE','0761%')->distinct('eacode')->count('eacode');
        $siq = $siquijor / 57 * 100;

        $westsamar = Booklet10::where('eacode','LIKE','0860%')->distinct('eacode')->count('eacode');
        $ws = $westsamar / 131 * 100;

        $caloocancity = Booklet10::where('eacode','LIKE','137501%')->distinct('eacode')->count('eacode');
        $cc = $caloocancity / 127 * 100;

        $butuan = Booklet10::where('eacode','LIKE','160202%')->distinct('eacode')->count('eacode');
        $but = $butuan / 130 * 100;

        $capiz = Booklet10::where('eacode','LIKE','0619%')->distinct('eacode')->count('eacode');
        $cap = $capiz / 99 * 100;

        $camiguin = Booklet10::where('eacode','LIKE','1018%')->distinct('eacode')->count('eacode');
        $camig = $camiguin / 49 * 100;

        $davaocity = Booklet10::where('eacode','LIKE','112402%')->distinct('eacode')->count('eacode');
        $davc = $davaocity / 128 * 100;

        $davaoocc = Booklet10::where('eacode','LIKE','1186%')->distinct('eacode')->count('eacode');
        $dvoc = $davaoocc / 97 * 100;

        $makaticity = Booklet10::where('eacode','LIKE','137602%')->distinct('eacode')->count('eacode');
        $makati = $makaticity / 125 * 100;

        return view('dashboard.home',compact(
            'mnl',
            'qcc',
            'sj',
            'lag',
            'cag',
            'bul',
            'east',
            'tag',
            'abr',
            'olong',
            'ilocity',
            'zdn',
            'cdoc',
            'nv',
            'tc',
            'ns',
            'mag',
            'ilo',
            'man',
            'las',
            'mtp',
            'or',
            'cn',
            'sk',
            'manda',
            'isa',
            'sor',
            'ak',
            'coisbl',
            'bc',
            'zam',
            'siq',
            'ws',
            'cc',
            'but',
            'cap',
            'camig',
            'davc',
            'dvoc',
            'makati'
        ));
    }
}
