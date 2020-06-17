<?php

namespace App\Http\Controllers;

use App\Appointment;
use App\Doctor;
use App\Patient;
use App\Field;
use App\Work;
use App\Approved;
use App\Report;
use App\User;
//use App\Approval;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Sentinel;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $patient = Patient::where('user_id',Sentinel::check()->id)->first();
        $appointments = Appointment::where('patient_id',$patient->id)->orderBy('date')->get();
//        $approved=Approved::whereIn('appointment_id',$appointments->pluck('id'))->get();
        $approved=Approved::all();
        return view('appointment.index',compact('appointments','approved'));
    }

    public function showall()
    {
        $doctor = Doctor::where('user_id',Sentinel::check()->id)->first();
        $appointments = Appointment::where('doctor_id',$doctor->id)->orderby('id','DESC')->get();
        return view('appointment.showall',compact('appointments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $doctor=Doctor::all();
        $field=Field::all();
        $work=Work::all();
        $p_id=Sentinel::getUser()->id;
        $pat=Patient::where('user_id',$p_id)->first()->id;
        $report=Report::where('patient_id',$pat)->get();
        return view('appointment.create',compact('doctor','field','work','report'));
    }
    public function accept($id)
    {
        $p=Appointment::find($id);
        $p->message=request('message');
        $approved=request('approve');
        $p->status=$approved;
        $p->save();
        if($approved==1) {
//        dd($approved);
            $a = new Approved;
            $a->appointment_id = $id;
            $a->time = request('time');
            $a->date = request('date');
            $a->remarks = request('remarks');
            $a->save();
        }
        else{
            return redirect('/myappointment');
        }
        return redirect('/myappointment')->with('success','Appointment Accepted');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $a = new Appointment();


        $a->field_id=request('field');;
        $a->doctor_id=request('doctor');
        $a->patient_id=request('patient');
        $a->date=request('date');
        $a->time='1';
        $a->purpose=request('purpose');
        $a->diagnosis=request('diagnosis');
        $a->report_id=request('report');
        $a->save();
        return redirect('/dashboard')->with('success','Appointment Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function show(Appointment $appointment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function edit(Appointment $appointment)
    {
        return view('appointment.edit',compact('appointment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Appointment $appointment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $appointment = Appointment::findOrFail($id);
        $appointment->delete();
        return redirect('/appointment')->with('success','Rejected Appointment Deleted');;
    }
}
