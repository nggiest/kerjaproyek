<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jadwallab;
use App\Hari;
use App\Makul;
use App\Dosen;
use App\Kelas;
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
     {
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        $jadwallab = Jadwallab::all();
        $this->validate($request, [
            'jenis_barang' => 'required|string|min:2|max:128',
            'jumlah' => 'required',
        ]);

       $jadwallab =  Jadwallab::create([
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
        $jadwallab=Jadwallab::findOrFail($id);
        $makul = Makul::All();
        $dosen = Dosen::all();
        $hari = Hari::All();
        $kelas = Kelas::All();
        // $jadwallab=DB::table('jadwallab')
        //             ->join('makul','jadwallab.makul_id','=','makul.id')
        //             ->join('hari','jadwallab.hari_id','=','hari.id')
        //             ->join('kelas','jadwallab.kelas_id','=','kelas.id')
        //             ->join('dosen','jadwallab.dosen_id','=','dosen.id')
        //             ->select('jadwallab.*','hari.id as hari','makul.id as makul','kelas.id as kelas','dosen.id as dosen')
        //             ->get();
        return view('jadwallabs.detail', compact('jadwallab','dosen','makul','kelas','hari'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jadwallab=Jadwallab::findOrFail($id);
        $makul=Makul::all();
        $dosen=Dosen::all();
        $hari=Hari::all();
        $kelas=Kelas::all();
        return view('jadwallabs.edit', compact("jadwallab","makul","dosen","hari","kelas"));

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
        $jadwallab=Jadwallab::findOrFail($id);
        $jadwallab->update([
            'makul_id' => $request['makul_id'],
            'dosen_id' => $request['dosen_id'],
            'kelas_id' => $request['kelas_id'],
            
            ]);
            // return $request;
        return redirect()->route('lab.index');
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
