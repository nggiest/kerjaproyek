<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Report;
use App\ReportActivity;
use Auth;
use DB;
use Validator;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::User()->role == 1)
        {
            $report = Report::all();
            foreach ($report as $reports) {
            $reports->repact = DB::table('report')
                ->join('reportdaily', 'report.id','=', 'reportdaily.report_id')
                ->select('report.*','reportdaily.report_note as reported')
                ->orderBy('date')
                ->get();
            }
        }
        else 
        {
            $report = Report::select('*')->where('user', Auth::user()->id)->get();
            foreach ($report as $reports) {
                $reports->repact=DB::table('report')
                ->join('reportdaily', 'report.id','=', 'reportdaily.report_id')
                ->select('report.*','reportdaily.report_note as reported')
                ->get();
            }

        }
        return view('reports.index', compact ('report'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $report=Report::all();
        return view('reports.create',compact('report'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
    
            try {
                // Interacting with the database
                $report = Report::create([
                    'user' => Auth::user()->id,
                    'date' => $request['date'],
                ]);
                $id = $report->id;
                $data = [] ;
                foreach($request['activities'] as $repact) {
                    array_push($data, 
                            [
                                'report_note' => $repact['report_note'],
                            ]);
                    } 
                    ReportActivity::insert($data);
                DB::commit();    // Commiting  ==> There is no problem whatsoever
            } catch (Exception $e) {
                DB::rollback();   // rollbacking  ==> Something went wrong
            }
            Alert::message('Report created successfully','Success');
          }  
    
          catch(\Illuminate\Database\QueryException $ex){ 
            Alert::error('Report Duplicated', 'Error'); 
            // Note any method of class PDOException can be called on $ex.
          }
                return redirect('/report');
           
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
