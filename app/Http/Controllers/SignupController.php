<?php

namespace App\Http\Controllers;

use App\Field;
use App\User;
use Illuminate\Http\Request;
use Sentinel;
use Activation;

class SignupController extends Controller
{
    public function signup(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required|min:6'
        ]);

        $credentials = [
            'account' => $request->account,
            'email'    => $request->email,
            'password' => $request->password,
        ];
        $user = Sentinel::registerAndActivate($credentials);


        if($user->account == 0)
        {
            $user=User::latest()->first();

           return view('patient.create',compact('user'));
        }
        elseif($user->account == 2)
        {
            return view('auth.login');
        }
        elseif ($user->account == 1)
        {
            $fields=Field::all();
            $user=User::latest()->first();

            return view('doctor.create',compact('fields','user'));
        }else{
            dd('wrong');
        }




    }
}
