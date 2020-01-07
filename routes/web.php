<?php
use App\Hari;
use App\Jadwallab;
use App\Makul;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
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
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('/user', 'UserController');
Route::get('/user/cp/{id}', 'UserController@changepassword')->name('user.change');
Route::match(['put', 'patch'], '/user/cp/{id}', 'UserController@gantipwd')->name('user.ganti');
Route::resource('/lab','JadwallabController');
Route::resource('/inventaris','InventarisController');
Route::resource('/aslab','JadwalAslabController');
Route::resource('/report','ReportController');
Route::resource('/daily','ReportDailyController');