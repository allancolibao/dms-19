<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ConnectionController extends Controller
{
    public function connection(){

    try {
            DB::connection()->getPdo();

        } catch (\Exception $connection) {

            return view('error.error');
        }

        return view('index');
    }
}
