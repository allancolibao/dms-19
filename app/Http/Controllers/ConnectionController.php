<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ConnectionController extends Controller
{
    public function connection(){

        // Test database connection
    try {
        DB::connection()->getPdo();
        } catch (\Exception $connection) {
        die("
        <style>
        html {
        font-size: 62.5%;
        }
        body {
        display: flex;
        flex-direction: column;
    
        align-items: center;
        }
        
        .dms{
            font-family: Arial, Helvetica, sans-serif;
            font-size:55px;
            font-weight:normal;
            color:#5dbf06;
    
         }
    
        .message {
        width: 60rem;
        padding: 1rem 2rem;
        border-radius: .8rem;
        color: hsl(0, 0%, 100%);
        background: #ff9100;
        box-shadow: .4rem .4rem 2.4rem .2rem hsla(236, 50%, 50%, 0.3);
        position: relative;
    
        }
        .details {
        text-align: center;
        margin-bottom: 4rem;
    
        border-bottom: 1px solid hsla(0, 0%, 100%, .4);
        }
        .title {
        font-size: 3.2rem;
        }
        .description {
        margin-top: 2rem;
        font-size: 1.6rem;
        font-style: italic;
        }
        .txt {
        padding: 0 4rem;
        margin-bottom: 4rem;
        font-size: 1.6rem;
        line-height: 2;
        }
        </style>
        <h1 class='dms'>Dietary Monitoring System</h1>
        <div class='container'>
            <div class='message'>
                <div class='details'>
                    <h1 class='title'>Error</h1>
                    <p class='description'>The server is offline, Please contact the administrator.</p>
                </div>
            </div>
        </div>
        ");
        }
        return view('welcome');
    }
}
