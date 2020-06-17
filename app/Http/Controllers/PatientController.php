<?php

namespace App\Http\Controllers;

use App\Patient;
use App\Doctor;
use App\User;
use Illuminate\Http\Request;
use Sentinel;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $patients = Patient::where('user_id',Sentinel::check()->id)->get();
        return view('patient.index',compact('patients'));
    }

    public function adminshowall()
    {
        $patients = Patient::all();
        return view('patient.adminshow',compact('patients'));
    }
    public function adminshowone($id)
    {
        $patient = Patient::findOrFail($id);
        return view('patient.adminshowone',compact('patient'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('patient.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $p = new Patient;
        if ($request->hasFile('image')) {
            $randVal = rand(1111, 9999);
            $image = $request->image;
            $img = $randVal . time() . $image->getClientOriginalName();
            $image->move(public_path() . '/images/' . 'GalleryImage', $img);
        } else {
            $img = 'no jpg';
        }
        $p->name = request('name');
        $p->user_id = request('patient');
        $p->address = request('address');
        $p->occupation = request('occupation');
        $p->contact = request('contact');
        $p->dob = request('dob');
        $p->gender = request('gender');
        $p->image = $img;
        $p->save();
        return redirect('/login')->with('success','Patient Profile Created');;
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function show(Patient $patient)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function edit(Patient $patient)
    {
        return view('patient.edit',compact('patient'));
    }




    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Patient $patient)
    {
        $p = Patient::find($patient->id);
        if ($request->image != null) {
            $randVal = rand(1111, 9999);
            $image = $request->image;
            $img = $randVal . time() . $image->getClientOriginalName();
            $image->move(public_path() . '/images/' . 'galleryImage', $img);
        } else {
            $img = $request->oldimage;
        }
        $p['name'] = request('name');
        $p['user_id'] = Sentinel::check()->id;
        $p['address'] = request('address');
        $p['occupation'] = request('occupation');
        $p['contact'] = request('contact');
        $p['dob'] = request('dob');
        $p['gender'] = request('gender');
        $p['image'] = $img;
        $p->save();

        return redirect('/dashboard')->with('success','Profile Edited');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function destroy(Patient $patient)
    {
        //
    }
}
