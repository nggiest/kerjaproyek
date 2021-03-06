<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Report;
use App\ReportDaily;
use Alert;
use Auth;
use DB;
use Validator;
use Illuminate\Support\Facades\Input;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$reportdaily = ReportDaily::all();
        $report=Report::all();
        $reportdaily = ReportDaily::all();
        $user = User::all();
        if (Auth::User()->role == 1)
        {
            $reportdaily = DB::table('reportdaily')
            ->join('report', 'reportdaily.report_id','=', 'report.id')
            ->join('users','report.users_id','=','users.id')
            ->select('reportdaily.*','report.tanggal as tanggal','users.name as nama')
            ->orderBy('report.tanggal')
            ->get();
        }
        else 
        {
            $reportdaily = DB::table('reportdaily')
            ->join('report', 'reportdaily.report_id','=', 'report.id')
            ->select('reportdaily.*','report.tanggal as tanggal')
            ->orderBy('report.tanggal')
            ->get();

        }
        return view('reports.index', compact ('reportdaily','report'));
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
                //return $request;
                // Interacting with the database
                $report = Report::create([
                    'users_id' => Auth::user()->id,
                    'tanggal' => $request['tanggal'],
                ]);
                $id = $report->id;
                $data = [] ;
                foreach($request['activities'] as $repact) {
                    array_push($data, 
                            [
                                'report_id'=>$report->id,
                                'report_note' => $repact['report_note'],
                            ]);
                    } 
                    ReportDaily::insert($data);
                DB::commit();    // Commiting  ==> There is no problem whatsoever
            } catch (Exception $e) {
                DB::rollback();   // rollbacking  ==> Something went wrong
            }
            // Alert::message('Report created successfully','Success');
          }  
    
          catch(\Illuminate\Database\QueryException $ex){ 
            Alert::error('Report Duplicated', 'Error'); 
            // Note any method of class PDOException can be called on $ex.
          }
           
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
        $reportdaily = ReportDaily::findOrFail($id);
        $report = Report::all();
        return view('reports.edit', compact('reportdaily','report'));
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
