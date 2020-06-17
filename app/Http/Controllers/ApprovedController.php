<?php

namespace App\Http\Controllers;

use App\Approved;
use App\Appointment;
use App\Doctor;
use Sentinel;
use Illuminate\Http\Request;
use DB;

class ApprovedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $doctor = Doctor::where('user_id',Sentinel::check()->id)->first();
        $appointments = Appointment::where('doctor_id',$doctor->id)->orderby('id','DESC')->get();
        $approved = Approved::whereIn('appointment_id',$appointments->pluck('id'))->orderBy('date')->get();
        return view('approved.index',compact('approved'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Approved  $approved
     * @return \Illuminate\Http\Response
     */
    public function show(Approved $approved)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Approved  $approved
     * @return \Illuminate\Http\Response
     */
    public function edit(Approved $approved)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Approved  $approved
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Approved $approved)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Approved  $approved
     * @return \Illuminate\Http\Response
     */
    public function destroy(Approved $approved)
    {
        //
    }
}
