<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hari;
use App\Jadwallab;
use App\Makul;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $lab = Jadwallab::all();
        $jadwallab1= DB::table('jadwallab')
        ->join('makul','jadwallab.makul_id','=','makul.id')
        ->join('hari','jadwallab.hari_id','=','hari.id')
        ->select('jadwalaslab.*','makul.nama_makul as nama')
        ->where('jadwallab.jampel','1')
        ->orderBy('hari.id')
        ->get();
        $lab2= DB::table('jadwallab')
        ->join('makul','jadwallab.makul_id','=','makul.id')
        ->join('hari','jadwallab.hari_id','=','hari.id')
        ->select('jadwalaslab.*','makul.nama_makul as nama')
        ->where('jadwallab.jampel','2')
        ->orderBy('hari.id')
        ->get();
        $lab3= DB::table('jadwallab')
        ->join('makul','jadwallab.makul_id','=','makul.id')
        ->join('hari','jadwallab.hari_id','=','hari.id')
        ->select('jadwalaslab.*','makul.nama_makul as nama')
        ->where('jadwallab.jampel','3')
        ->orderBy('hari.id')
        ->get();
        $lab4= DB::table('jadwallab')
        ->join('makul','jadwallab.makul_id','=','makul.id')
        ->join('hari','jadwallab.hari_id','=','hari.id')
        ->select('jadwalaslab.*','makul.nama_makul as nama')
        ->where('jadwallab.jampel','4')
        ->orderBy('hari.id')
        ->get();

        return view('home', compact('jadwallab1','lab2','lab3','lab4'));
    }
}
