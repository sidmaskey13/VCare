<?php

namespace App\Http\Controllers;

use App\Doctor;
use App\Field;
use Sentinel;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $doctors = Doctor::where('user_id',Sentinel::check()->id)->get();
        return view('doctor.index',compact('doctors'));
    }
    public function adminshowall()
    {
        $doctors = Doctor::all();
        return view('doctor.adminshow',compact('doctors'));
    }
    public function adminshowone($id)
    {
        $doctor = Doctor::findOrFail($id);
        return view('doctor.adminshowone',compact('doctor'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('doctor.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $d = new Doctor;
        if($request->hasFile('image')){
            $rand=rand(1111,9999);
            $image=$request->image;
            $img=$rand.time().$image->getClientOriginalName();
            $image->move(public_path().'/media/'.'galleryimage',$img);
        }
        else{
            $img='noimage';
        }
        $d->name=request('name');
        $d->user_id=request('doctor');
        $d->gender=request('gender');
        $d->dob=request('dob');
        $d->citizenship=request('citizenship');
        $d->status=request('status');
        $d->address=request('address');
        $d->contact=request('contact');
        $d->field_id=request('field_id');
        $d->image=$img;
        $d->save();
        return redirect('/login')->with('success','Doctor Profile Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function show(Doctor $doctor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function edit(Doctor $doctor)
    {
        $fields=Field::all();
        return view('doctor.edit',compact('doctor','fields'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Doctor $doctor)
    {
//        dd(Sentinel::check());
        $d =Doctor::find($doctor->id);
        if($request->image != null){
            $rand=rand(1111,9999);
            $image=$request->image;
            $img=$rand.time().$image->getClientOriginalName();
            $image->move(public_path().'/images/'.'galleryimage',$img);
        }
        else{
            $img=$request->oldimage;
        }
        $d['name']=request('name');
        $d['user_id']=Sentinel::check()->id;
        $d['gender']=request('gender');
        $d['dob']=request('dob');
        $d['citizenship']=request('citizenship');
        $d['status']=request('status');
        $d['address']=request('address');
        $d['contact']=request('contact');
        $d['field_id']=request('field_id');
        $d['image']=$img;
        $d->save();
        return redirect('/dashboard');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Doctor $doctor)
    {
        //
    }
}
