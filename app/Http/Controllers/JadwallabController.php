<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jadwallab;
use App\Hari;
use App\Makul;
use DB;
use Validator;

class JadwallabController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lab = Jadwallab::all();
        $lab1= DB::table('jadwallab')
        ->join('makul','jadwallab.makul_id','=','makul.id')
        ->join('hari','jadwallab.hari_id','=','hari.id')
        ->select('jadwallab.*','makul.nama_makul as nama')
        ->where('jadwallab.jampel','1')
        ->orderBy('hari.id')
        ->get();
        $lab2= DB::table('jadwallab')
        ->join('makul','jadwallab.makul_id','=','makul.id')
        ->join('hari','jadwallab.hari_id','=','hari.id')
        ->select('jadwallab.*','makul.nama_makul as nama')
        ->where('jadwallab.jampel','2')
        ->orderBy('hari.id')
        ->get();
        $lab3= DB::table('jadwallab')
        ->join('makul','jadwallab.makul_id','=','makul.id')
        ->join('hari','jadwallab.hari_id','=','hari.id')
        ->select('jadwallab.*','makul.nama_makul as nama')
        ->where('jadwallab.jampel','3')
        ->orderBy('hari.id')
        ->get();
        $lab4= DB::table('jadwallab')
        ->join('makul','jadwallab.makul_id','=','makul.id')
        ->join('hari','jadwallab.hari_id','=','hari.id')
        ->select('jadwallab.*','makul.nama_makul as nama')
        ->where('jadwallab.jampel','4')
        ->orderBy('hari.id')
        ->get();
        $lab5= DB::table('jadwallab')
        ->join('makul','jadwallab.makul_id','=','makul.id')
        ->join('hari','jadwallab.hari_id','=','hari.id')
        ->select('jadwallab.*','makul.nama_makul as nama')
        ->where('jadwallab.jampel','5')
        ->orderBy('hari.id')
        ->get();
        $lab6= DB::table('jadwallab')
        ->join('makul','jadwallab.makul_id','=','makul.id')
        ->join('hari','jadwallab.hari_id','=','hari.id')
        ->select('jadwallab.*','makul.nama_makul as nama')
        ->where('jadwallab.jampel','6')
        ->orderBy('hari.id')
        ->get();
        $lab7= DB::table('jadwallab')
        ->join('makul','jadwallab.makul_id','=','makul.id')
        ->join('hari','jadwallab.hari_id','=','hari.id')
        ->select('jadwallab.*','makul.nama_makul as nama')
        ->where('jadwallab.jampel','7')
        ->orderBy('hari.id')
        ->get();
        $lab8= DB::table('jadwallab')
        ->join('makul','jadwallab.makul_id','=','makul.id')
        ->join('hari','jadwallab.hari_id','=','hari.id')
        ->select('jadwallab.*','makul.nama_makul as nama')
        ->where('jadwallab.jampel','8')
        ->orderBy('hari.id')
        ->get();
        $lab9= DB::table('jadwallab')
        ->join('makul','jadwallab.makul_id','=','makul.id')
        ->join('hari','jadwallab.hari_id','=','hari.id')
        ->select('jadwallab.*','makul.nama_makul as nama')
        ->where('jadwallab.jampel','9')
        ->orderBy('hari.id')
        ->get();
        $lab10= DB::table('jadwallab')
        ->join('makul','jadwallab.makul_id','=','makul.id')
        ->join('hari','jadwallab.hari_id','=','hari.id')
        ->select('jadwallab.*','makul.nama_makul as nama')
        ->where('jadwallab.jampel','10')
        ->orderBy('hari.id')
        ->get();

        return view('jadwallabs.index', compact('lab1','lab2','lab3','lab4','lab5','lab6','lab7','lab8','lab9','lab10'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jadwallab = Jadwallab::all();
        $this->validate($request, [
            'jenis_barang' => 'required|string|min:2|max:128',
            'jumlah' => 'required',
        ]);

       $inventaris =  Inventaris::create([
            'jenis_barang' => $request['jenis_barang'],
            'jumlah' => $request['jumlah'],
            'update_by' => $request['update_by'],
            ]);
            
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
