<?php

namespace App\Http\Controllers;

use App\Emergency;
use App\User;
use App\Doctor;
use Sentinel;
use Illuminate\Http\Request;

class EmergencyController extends Controller
{
    public function request(Request $request)
    {
        $p = new Emergency;
        $p->patient_id=request('patient');
        $p->doctor_id=request('doctor');
        $p->message=request('message');
        $p->date=request('date');
        $p->save();
        return redirect('/dashboard')->with('success','Permission Asked');
    }
    public function requestshow()
    {
//        $doctor = Doctor::where('user_id',Sentinel::check()->id)->first();
//        $emergency=Emergency::where('doctor_id',$doctor)->get();
        $emergency=Emergency::all();
        return view('emergency.accept',compact('emergency'));
    }
    public function requestaccept(Request $request,$id)
    {
        $p=Emergency::find($id);
        $status=request('approve');
        $p->status=$status;
        $p->save();
        if($status==1){

            return view('conference.video',compact('p'));
        }
        else{
            $e = Emergency::find($id);
            $e->delete();
            return redirect('/dashboard');
        }

        return view('emergency.accept',compact('emergency'));
    }
    public function emergency()
    {
        $u=User::where('account',1)->where('status',1)->get();
        $online=Doctor::whereIn('user_id',$u->pluck('id'))->get();

        return view('emergency.allonline',compact('online'));
    }

}
