<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Encoder;
use App\User;

class CreateUserController extends Controller
{
    public function  __construct(Encoder $encoder){

        $this->encoder = $encoder;   
    }


    public function createUser() {
        $encoders = $this->encoder->getAllTheEncoders();

        if(sizeof($encoders) > 0){
            foreach($encoders as $encoder){

                User::create([
                    'first_name' => $encoder['first_name'],
                    'last_name' => $encoder['last_name'],
                    'name' => 'DVE-'.$encoder['last_name'],
                    'email' => 'user@dvms.namd',
                    'password' => bcrypt('DVMSNAMD'),
                    'is_admin' => 0,
                ]);

            }
        }

        return redirect()->back()->with('success', 'User successfully created');
        
    }
   

}
