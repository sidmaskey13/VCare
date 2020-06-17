<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Sentinel;
use App\User;

class LoginController extends Controller
{
    public function login(Request $request)
    {
//        dd($request->all());

        $userr = Sentinel::authenticate($request->all());
        $user = User::where('id', $userr->id)->first();
        $user->status = 1;

        $user->save();
        return view('dashboard');
    }

    public function logout()
    {
        $s = Sentinel::check();
//        Sentinel::check();
        $user = User::where('id', $s->id)->first();
        $user->status = 0;
        $user->save();
        Sentinel::logout();

        return redirect('/');
    }
}
