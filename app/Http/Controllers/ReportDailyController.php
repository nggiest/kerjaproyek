<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Report;
use App\ReportDaily;
use App\User;
use Validator;
use DB;
use Auth;
use Illuminate\Support\Facades\Input;


class ReportDailyController extends Controller
{
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
            ->where('report.users_id','=',Auth::User()->id)
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
        $reportdaily=ReportDaily::all();
        return view('reports.create',compact('report','reportdaily'));

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
           return redirect()->route('daily.index');
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
        $tanggal = DB::table('report')
                 ->join('reportdaily','report.id','=','reportdaily.report_id')
                 ->select('report.tanggal as tanggal')
                 ->get();
        return view('reports.edit', compact('reportdaily','tanggal'));
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
        $reportdaily = ReportDaily::findOrFail($id);
        $reportdaily->update([
            'report_note' => $request['report_note'],
        ]);
        
       return redirect()->route('daily.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $reportdaily=ReportDaily::findOrFail($id);
        $reportdaily->delete();
        return redirect()->route('daily.index');
    }
}
