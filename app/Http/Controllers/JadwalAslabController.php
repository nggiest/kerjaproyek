<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Hari;
use App\JadwalAslab;
use App\AslabJab;
use DB;
use Auth;
use Validator;
use Alert;

class JadwalAslabController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jadwalaslab = JadwalAslab::all();
        $jadwalaslab1= DB::table('jadwalaslab')
        ->join('aslabjab','jadwalaslab.aslabjab','=','aslabjab.id')
        ->join('users','jadwalaslab.users_id','=','users.id')
        ->join('hari','jadwalaslab.hari_id','=','hari.id')
        ->select('jadwalaslab.*','users.name as nama')
        ->where('jadwalaslab.aslabjab','1')
        ->orderBy('hari.id')
        ->get();
        $jadwalaslab2= DB::table('jadwalaslab')
        ->join('aslabjab','jadwalaslab.aslabjab','=','aslabjab.id')
        ->join('users','jadwalaslab.users_id','=','users.id')
        ->join('hari','jadwalaslab.hari_id','=','hari.id')
        ->select('jadwalaslab.*','users.name as nama')
        ->where('jadwalaslab.aslabjab','2')
        ->orderBy('hari.id')
        ->get();
        $hari = Hari::all();
       
        $aslabjab = AslabJab::all();
       
        return view('jadwalaslabs.index',compact('jadwalaslab1','hari','aslabjab','jadwalaslab2'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $hari=Hari::all();
        $user=User::where('role','=', 2 )->get();
        $hari=Hari::all();
        $aslabjab=AslabJab::all();
        return view('jadwalaslabs.create', compact('hari','user','aslabjab'));

        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $jadwalaslab=JadwalAslab::all($id);
        // return $request;
        $jadwalaslab->create([
            'users_id' => $request['users_id'],
            'aslabjab' => $request['aslabjab'],
            'hari_id' => $request['hari_id'],
        ]);

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
        $jadwalaslab=JadwalAslab::findOrFail($id);
        $user=User::where('role','=', 2 )->get();
        $hari=Hari::all();
        $aslabjab=AslabJab::all();
        return view('jadwalaslabs.edit',compact('jadwalaslab', 'user', 'hari','aslabjab'));
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
        $jadwalaslab=JadwalAslab::findOrFail($id);
        // return $request;
        $jadwalaslab->update([
            'users_id' => $request['users_id'],
            'aslabjab' => $request['aslabjab'],
        ]);

        return redirect()->route('aslab.index');
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
