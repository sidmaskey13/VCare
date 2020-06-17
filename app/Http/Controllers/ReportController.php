<?php

namespace App\Http\Controllers;

use App\Report;
use App\Image;
use App\Patient;
use DB;
use Sentinel;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $p_id=Sentinel::getUser()->id;
        $pat=Patient::where('user_id',$p_id)->first()->id;
        $reports= Report::where('patient_id',$pat)->get();
//        $things = Report::all();
//        $reports = $things->groupBy('title');

//        $reports=DB::table('reports')->distinct()->select('title')->get();

        return view('report.index',compact('reports'));
    }
//
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('report.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $title=request('title');
        $t=new Report;
        $t->title=$title;
        $t->patient_id=request('patient');
        $t->save();

        $insertedId = $t->id;
        $files = $request->file('file');
        if($request->hasFile('file'))
        {
            foreach ($request->file('file') as $file) {
                $randVal = rand(1111,9999);
                $filenametostore=$randVal.time().$file->getClientOriginalName();
                $path=$file->move(public_path().'/images/'.'GalleryImage',$filenametostore);
                $p=new Image;
                $p->report_id=$insertedId;
                $p->image=$filenametostore;
                $p->save();
            }
        }
        return redirect('/dashboard')->with('success','Report Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function show(Report $report)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function edit(Report $report)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Report $report)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function destroy(Report $report)
    {
        $report->delete();
        return back();
    }
}
