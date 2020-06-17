<?php

namespace App\Http\Controllers;

use App\Work;
use Illuminate\Http\Request;

class WorkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $work=Work::all();
        return view('work.index',compact('work'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('work.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $day=$_POST['day'];
        $start=$_POST['start_time'];
        $end=$_POST['end_time'];
        $doctor=request('doctor');
        $count=count($day);

        for($i=0;$i<$count;$i++){
            $work=new Work;
            $work->day=$day[$i];
            $work->time_start=$start[$i];
            $work->time_end=$end[$i];
            $work->doctor_id=$doctor;
            $work->save();
    }
//        foreach ($ss as $s) {
//            echo $s."<br>";
//        }
//        die;
//        $work=new Work;
//        $work->day=request('day');
//        $work->time_start=request('start_time');
//        $work->time_end=request('end_time');
//        $work->doctor_id=request('doctor');
//        $work->save();
        return redirect('/dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Work  $work
     * @return \Illuminate\Http\Response
     */
    public function show(Work $work)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Work  $work
     * @return \Illuminate\Http\Response
     */
    public function edit(Work $work)
    {
        return view('work.edit',compact('work'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Work  $work
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $work=Work::find($id);
        $work->day=request('day');
        $work->time_start=request('start_time');
        $work->time_end=request('end_time');
        $work->doctor_id=request('doctor');
        $work->save();

    return redirect('/work');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Work  $work
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $work = Work::findOrFail($id);
        $work->delete();
        return redirect('/work');
    }
}
