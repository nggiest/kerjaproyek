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

        return view('home', compact('lab1','lab2','lab3','lab4','lab5','lab6','lab7','lab8','lab9','lab10'));
    }
}
